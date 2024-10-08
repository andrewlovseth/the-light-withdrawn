export function setupbuyBookModal() {
    document.addEventListener("DOMContentLoaded", function () {
        const anchors = document.querySelectorAll(".js-buy-link");
        const closeButton = document.querySelector("#buy-close-btn");
        const modal = document.querySelector("#buy-book-modal");

        function openModal(modal) {
            modal.classList.add("active");
            document.body.classList.add("modal-open");
            addOutsideClickListener(modal);
        }

        function closeModal(modal) {
            modal.classList.remove("active");
            document.body.classList.remove("modal-open");
        }

        anchors.forEach((anchor) => {
            anchor.addEventListener("click", function (event) {
                event.preventDefault();
                openModal(modal);
            });
        });

        closeButton.addEventListener("click", function (event) {
            event.preventDefault();
            closeModal(modal);
        });

        function addOutsideClickListener(modal) {
            function handleOutsideClick(event) {
                if (!modal.contains(event.target) && !event.target.closest(".js-buy-link")) {
                    closeModal(modal);
                    document.removeEventListener("click", handleOutsideClick);
                }
            }
            document.addEventListener("click", handleOutsideClick);
        }

        document.addEventListener("keydown", function (event) {
            if (event.key === "Escape") {
                closeModal();
            }
        });
    });
}
