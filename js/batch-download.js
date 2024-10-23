export function initBatchDownload() {
    const form = document.getElementById("batch-download-form");
    const downloadBtn = document.querySelector(".batch-download-btn");
    const checkboxes = form ? form.querySelectorAll('input[name="selected_docs[]"]') : [];
    const selectAllLink = document.querySelector(".select-all-docs");
    const deselectAllLink = document.querySelector(".deselect-all-docs");

    function updateButtonState() {
        const checkedBoxes = form.querySelectorAll('input[name="selected_docs[]"]:checked');
        downloadBtn.disabled = checkedBoxes.length === 0;
    }

    if (form && downloadBtn && checkboxes.length > 0) {
        // Add event listeners to all checkboxes
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", updateButtonState);
        });

        // Initial button state
        updateButtonState();

        downloadBtn.addEventListener("click", function (e) {
            e.preventDefault();
            const selectedDocs = form.querySelectorAll('input[name="selected_docs[]"]:checked');

            if (selectedDocs.length === 0) {
                alert("Please select at least one document to download.");
                return;
            }

            form.submit();
        });

        // Add functionality for Select All and Deselect All
        if (selectAllLink && deselectAllLink) {
            selectAllLink.addEventListener("click", function (e) {
                e.preventDefault();
                checkboxes.forEach((checkbox) => (checkbox.checked = true));
                updateButtonState();
            });

            deselectAllLink.addEventListener("click", function (e) {
                e.preventDefault();
                checkboxes.forEach((checkbox) => (checkbox.checked = false));
                updateButtonState();
            });
        }
    }
}
