export function setupPasswordModal() {
    if (document.body.classList.contains("single-photo-gallery")) {
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("password-protected-modal");
            const closeModalBtn = document.getElementById("close-btn");
            const dismissModalBtn = document.getElementById("dismiss-btn");

            if (modal) {
                // Check if the modal should be shown
                if (!sessionStorage.getItem("modalDismissed")) {
                    modal.showModal();
                }

                // Close the modal when the close button is clicked
                closeModalBtn.addEventListener("click", function () {
                    modal.close();
                });

                // Dismiss the modal for the rest of the session and keep showing watermarked content
                dismissModalBtn.addEventListener("click", function (event) {
                    event.preventDefault();

                    sessionStorage.setItem("modalDismissed", "true");
                    modal.close();
                });

                // Close the modal if the user clicks outside of it
                modal.addEventListener("cancel", function () {
                    modal.close();
                });
            }
        });
    }
}
