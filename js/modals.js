export function setupModals() {
    document.addEventListener("DOMContentLoaded", function () {
        const anchors = document.querySelectorAll(".note__feature-anchor");
        const closeButtons = document.querySelectorAll(".note__feature-modal-close");

        // Proceed only if there are anchors or close buttons on the page
        if (anchors.length > 0 && closeButtons.length > 0) {
            function openModal(modal) {
                closeAllModals();
                modal.classList.add("active");
                document.body.classList.add("modal-open");
                addOutsideClickListener(modal);
            }

            function closeModal(modal) {
                modal.classList.remove("active");
                document.body.classList.remove("modal-open");
            }

            function closeAllModals() {
                document.querySelectorAll(".note__feature-modal.active").forEach((modal) => {
                    closeModal(modal);
                });
            }

            anchors.forEach((anchor) => {
                anchor.addEventListener("click", function (event) {
                    event.preventDefault();
                    const feature = anchor.closest(".note__feature");
                    const modal = feature.querySelector(".note__feature-modal");
                    if (modal) {
                        openModal(modal);
                    }
                });
            });

            closeButtons.forEach((button) => {
                button.addEventListener("click", function (event) {
                    event.preventDefault();
                    const modal = button.closest(".note__feature-modal");
                    if (modal) {
                        closeModal(modal);
                    }
                });
            });

            function addOutsideClickListener(modal) {
                function handleOutsideClick(event) {
                    if (!modal.contains(event.target) && !event.target.closest(".note__feature-anchor")) {
                        closeModal(modal);
                        document.removeEventListener("click", handleOutsideClick);
                    }
                }
                document.addEventListener("click", handleOutsideClick);
            }

            document.addEventListener("keydown", function (event) {
                if (event.key === "Escape") {
                    closeAllModals();
                }
            });
        }
    });
}
