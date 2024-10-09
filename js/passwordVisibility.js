export function setupPasswordVisibilityOnLoad() {
    document.addEventListener("DOMContentLoaded", function () {
        const messageDiv = document.getElementById("message");
        const formDiv = document.querySelector(".password-form__wrapper");
        const modalDIV = document.querySelector(".password-protected-modal");

        // Check if password has been entered via cookies or localStorage
        const passwordEnteredInCookie = document.cookie.split("; ").find((row) => row.startsWith("site_password="));
        const passwordEnteredInLocalStorage = localStorage.getItem("site_password") === "entered";

        // If the password has already been entered
        if (passwordEnteredInCookie || passwordEnteredInLocalStorage) {
            // Hide the form, if it's there
            if (formDiv) {
                formDiv.remove();
            }

            // Show the success message
            if (messageDiv) {
                messageDiv.textContent = "You have successfully entered the password.";
                messageDiv.classList.add("success");
                messageDiv.style.opacity = 1;
            }

            // Close the modal, if it's present
            if (modalDIV) {
                modalDIV.close();
                modalDIV.remove();
            }
        }
    });
}
