<?php

// Start the session early in the lifecycle using the 'init' hook
function start_session() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();  // Start the session if it hasn't been started
    }
}
add_action('init', 'start_session', 1);

// Handle the password form via AJAX and validate the password
function wp_validate_password_ajax() {
    if (isset($_POST['password'])) {
        $entered_password = sanitize_text_field($_POST['password']);
        $correct_password = get_field('protected_content_password', 'options');  // Retrieve the correct password from ACF or another method

        if ($entered_password === $correct_password) {
            // Set a session flag to indicate the correct password was entered
            $_SESSION['site_password'] = 'entered';
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
    return !(isset($_SESSION['site_password']) && $_SESSION['site_password'] === 'entered');
}

// Shortcode to display the password form
function wp_custom_password_form() {
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
    const password = document.getElementById('password').value;

    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `action=validate_password&password=${password}`
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
                modalDIV.remove();

                // Reload the page to show protected content
                location.reload();  // Reload the page to update content from server-side session
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