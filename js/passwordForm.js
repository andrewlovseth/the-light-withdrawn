export function setupPasswordForm() {
    const passwordForm = document.getElementById("password-form");

    if (passwordForm) {
        passwordForm.addEventListener("submit", function (e) {
            e.preventDefault(); // Prevent default form submission

            let password = document.getElementById("password").value;

            // Remove the '&' character before submitting the password
            password = password.replace(/&/g, "");

            const ajaxUrl = typeof ajaxurl !== "undefined" ? ajaxurl : "/wp-admin/admin-ajax.php";

            fetch(ajaxUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: `action=validate_password&password=${encodeURIComponent(password)}`,
            })
                .then((response) => response.json()) // Parse the response as JSON
                .then((data) => {
                    const messageDiv = document.getElementById("message");
                    const formDiv = document.querySelector(".password-form__wrapper");
                    const modalDIV = document.querySelector(".password-protected-modal");

                    if (messageDiv) {
                        messageDiv.innerHTML = data.data ? data.data.message : "Unexpected error"; // Safely handle if the message is undefined

                        messageDiv.classList.remove("success", "error"); // Clear previous classes
                        if (data.success) {
                            messageDiv.classList.add("success"); // Add success class

                            if (data.data && data.data.setLocalStorage) {
                                // Make sure we access 'setLocalStorage' inside 'data.data'
                                localStorage.setItem("site_password", "entered");
                            }

                            // Remove the modal and form
                            formDiv.remove();
                            if (modalDIV) {
                                modalDIV.remove();
                            }

                            // Optionally, reload the page to show protected content
                            location.reload();
                        } else {
                            messageDiv.classList.add("error"); // Add error class
                        }

                        // Make sure the message is visible
                        messageDiv.style.opacity = 1;
                    }
                })
                .catch((error) => console.error("Error:", error));
        });
    }
}
