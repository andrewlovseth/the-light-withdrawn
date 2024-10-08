<?php

// Handle the password form via AJAX and validate the password
function wp_validate_password_ajax() {
    if (isset($_POST['password'])) {
        $entered_password = str_replace('&', '', sanitize_text_field($_POST['password']));  // Remove '&' for validation
        $correct_password = get_field('protected_content_password', 'options');

        if ($entered_password === $correct_password) {
            // Set a cookie to indicate the correct password was entered
            setcookie('site_password', 'entered', time() + (86400 * 30), "/");  // 30-day expiration
            wp_send_json_success(['message' => 'Success! You can now view the content.']);
        } else {
            wp_send_json_error(['message' => 'Incorrect password. Please try again.']);
        }
    } else {
        wp_send_json_error(['message' => 'Password field is empty.']);
    }
}

add_action('wp_ajax_nopriv_validate_password', 'wp_validate_password_ajax');
add_action('wp_ajax_validate_password', 'wp_validate_password_ajax');

// Template tag for checking if content is protected
function is_protected_content() {
    // Check if the 'site_password' cookie is set
    return !(isset($_COOKIE['site_password']) && $_COOKIE['site_password'] === 'entered');
}

// Shortcode to display the password form
function wp_custom_password_form() {
    // Check if the 'site_password' cookie is already set
    if (isset($_COOKIE['site_password']) && $_COOKIE['site_password'] === 'entered') {
        return '<div class="password-form__message success">You have already entered the correct password.</div>';  // Don't show the form
    }

    ob_start(); ?>
    
    <form id="password-form" class="password-form">
        <div class="password-form__wrapper">
            <input class="password-form__input" name="password" id="password" type="text" placeholder="Type here (case-sensitive)" required />
            <button class="password-form__btn" type="submit">Enter</button>
        </div>
        <div class="password-form__message" id="message"></div>
    </form>

    <script>
document.getElementById('password-form').addEventListener('submit', function(e) {
    e.preventDefault();  // Prevent the default form submission behavior
    let password = document.getElementById('password').value;

    // Remove the '&' character before submitting the password
    password = password.replace(/&/g, '');

    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `action=validate_password&password=${encodeURIComponent(password)}`
    })
    .then(response => response.json())
    .then(data => {
        const messageDiv = document.getElementById('message');
        const formDiv = document.querySelector('.password-form__wrapper');
        const modalDIV = document.querySelector('.password-protected-modal');
        
        if (messageDiv) {
            messageDiv.innerHTML = data.data ? data.data.message : 'Unexpected error';  // Safely handle if the message is undefined

            messageDiv.classList.remove('success', 'error');  // Clear previous classes
            if (data.success) {
                messageDiv.classList.add('success');  // Add success class
                console.log('Password validation success.');

                // Remove the modal and form
                formDiv.remove();
                if (modalDIV) {
                    modalDIV.remove();
                }

                // Reload the page to show protected content
                location.reload();  // Reload the page to update content from server-side cookies
            } else {
                messageDiv.classList.add('error');  // Add error class
            }

            // Make sure the message is visible
            messageDiv.style.opacity = 1;
        }
    })
    .catch(error => console.error('Error:', error));
});
    </script>

    <?php
    return ob_get_clean();
}
add_shortcode('bearsmith_password_form', 'wp_custom_password_form');

// Disable caching for protected pages
function no_cache_for_protected_pages() {
    if (is_page_template(array('single-photo-gallery.php', 'templates/photo-gallery-main.php')) && isset($_COOKIE['site_password'])) {
        // Disable caching
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Pragma: no-cache');
    }
}
add_action('template_redirect', 'no_cache_for_protected_pages');