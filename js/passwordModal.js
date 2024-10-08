export function setupPasswordModal() {
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("password-protected-modal");
        const closeModalBtn = document.getElementById("close-btn");
        const dismissModalBtn = document.getElementById("dismiss-btn");

        // Check if the modal exists
        if (modal) {
            // Check if the modal should be shown
            if (!sessionStorage.getItem("modalDismissed")) {
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

            // Close the modal if the user clicks outside of it
            modal.addEventListener("cancel", function () {
                modal.close();
            });
        }
    });
}
