export function setupPasswordModal() {
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("password-protected-modal");
        const closeModalBtn = document.getElementById("close-btn");
        const dismissModalBtn = document.getElementById("dismiss-btn");
        const passwordForm = document.getElementById("password-form");
        const body = document.body;

        // Check if the page has a body with the class 'postid-200'
        if (body.classList.contains("postid-200")) {
            return; // Do nothing and exit the function
        }

        // Check if the modal exists
        if (modal) {
            // Check if the password has already been entered (via cookie or localStorage)
            const passwordEnteredInCookie = document.cookie.split("; ").find((row) => row.startsWith("site_password="));
            const passwordEnteredInLocalStorage = localStorage.getItem("site_password") === "entered";

            // If the password is not entered and the modal is not dismissed, show the modal
            if (
                !passwordEnteredInCookie &&
                !passwordEnteredInLocalStorage &&
                !sessionStorage.getItem("modalDismissed")
            ) {
                modal.showModal();
            }

            // Add event listener to the close button, if it exists
            if (closeModalBtn) {
                closeModalBtn.addEventListener("click", function () {
                    modal.close();
                });
            }

            // Add event listener to the dismiss button, if it exists
            if (dismissModalBtn) {
                dismissModalBtn.addEventListener("click", function (event) {
                    event.preventDefault();
                    sessionStorage.setItem("modalDismissed", "true");
                    modal.close();
                });
            }

            // Handle password form submission within the modal
            if (passwordForm) {
                passwordForm.addEventListener("submit", function (e) {
                    e.preventDefault(); // Prevent default form submission

                    const passwordInput = document.getElementById("password").value;
                    const correctPassword = "SimonSchuster"; // Example hardcoded password

                    // Check if the entered password is correct
                    if (passwordInput === correctPassword) {
                        // Set cookie (expires in 30 days)
                        document.cookie = "site_password=entered; path=/; max-age=" + 86400 * 30;

                        // Set localStorage
                        localStorage.setItem("site_password", "entered");

                        // Close the modal after successful password entry
                        modal.close();

                        // Refresh the page to reflect the new content visibility (optional)
                        location.reload();
                    }
                });
            }

            // Close the modal if the user clicks outside of it
            modal.addEventListener("cancel", function () {
                modal.close();
            });
        }
    });
}
