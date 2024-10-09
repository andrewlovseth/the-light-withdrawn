export function setupPasswordForm() {
    document.addEventListener("DOMContentLoaded", function () {
        const passwordForm = document.getElementById("password-form");
        const correctPassword = "SimonSchuster"; // Hardcoded password

        // Check if the form exists
        if (passwordForm) {
            passwordForm.addEventListener("submit", function (e) {
                e.preventDefault(); // Prevent default form submission

                const passwordInput = document.getElementById("password");

                if (passwordInput) {
                    let password = passwordInput.value;

                    // Remove the '&' character before checking the password
                    password = password.replace(/&/g, "");

                    const messageDiv = document.getElementById("message");
                    const modalDIV = document.querySelector(".password-protected-modal"); // Select modal

                    // Check if the entered password is correct (Client-side validation)
                    if (password === correctPassword) {
                        // Set a cookie (expires in 30 days)
                        document.cookie = "site_password=entered; path=/; max-age=" + 86400 * 30;

                        // Set localStorage for additional protection
                        localStorage.setItem("site_password", "entered");

                        // Hide the form and show a success message
                        const formDiv = document.querySelector(".password-form__wrapper");
                        formDiv.remove();

                        if (messageDiv) {
                            messageDiv.textContent = "You have successfully entered the password."; // Success message
                            messageDiv.classList.add("success");
                            messageDiv.style.opacity = 1;
                        }

                        // Hide the modal if present
                        if (modalDIV) {
                            modalDIV.close(); // Close the modal using dialog's close method
                            modalDIV.remove(); // Remove the modal from the DOM if needed

                            // Show the growl-style success notification
                            showGrowlNotification("Success! You have entered the correct password.");

                            // Dynamically toggle the photo visibility (Update watermark/full-res image)
                            togglePhotoVisibility();
                        }
                    } else {
                        // Use the messageDiv to show a custom error message
                        if (messageDiv) {
                            messageDiv.textContent = "Incorrect password. Please try again."; // Custom error message
                            messageDiv.classList.remove("success"); // Ensure the success class is removed
                            messageDiv.classList.add("error"); // Add the error class for styling
                            messageDiv.style.opacity = 1; // Make sure the message is visible
                        }
                    }
                }
            });
        }
    });
}
// Function to show the growl notification
function showGrowlNotification(message) {
    // Create the notification element
    const growl = document.createElement("div");
    growl.className = "growl-notification";
    growl.textContent = message;

    // Append it to the body (or another container)
    document.body.appendChild(growl);

    // Automatically fade out after 3 seconds
    setTimeout(() => {
        growl.style.opacity = "0"; // Start fade out
        setTimeout(() => {
            growl.remove(); // Remove from the DOM
        }, 500); // Wait for the fade-out animation to complete
    }, 3000); // Show the notification for 3 seconds
}

// Function to toggle watermark and full-resolution photo visibility
function togglePhotoVisibility() {
    const watermarkEl = document.querySelector(".photo__preview-enhanced-watermark");
    const enhancedEl = document.querySelector(".photo__preview-enhanced-full");
    const highResDownloadEl = document.getElementById("high-res-download");

    if (watermarkEl && enhancedEl && highResDownloadEl) {
        // Remove 'active' class from the watermark and add it to the full-resolution image
        watermarkEl.classList.remove("active");
        enhancedEl.classList.add("active");
        highResDownloadEl.style.display = "inline-block"; // Show download link
    }
}

export function checkPassword() {
    const passwordEnteredInCookie = document.cookie.split("; ").find((row) => row.startsWith("site_password="));
    const passwordEnteredInLocalStorage = localStorage.getItem("site_password") === "entered";

    // Get the form wrapper and message div
    const formDiv = document.querySelector(".password-form__wrapper");
    const messageDiv = document.getElementById("message");

    // If the password has been entered, hide the form and show a success message
    if (passwordEnteredInCookie || passwordEnteredInLocalStorage) {
        if (formDiv) formDiv.remove(); // Remove the form

        // Show the success message after page reload
        if (messageDiv) {
            messageDiv.textContent = "You have successfully entered the password."; // Show success message
            messageDiv.classList.add("success"); // Add the success class for styling
            messageDiv.style.opacity = 1; // Make sure the message is visible
        }
    }
}
