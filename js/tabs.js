export function setupPhotoTabs() {
    document.addEventListener("DOMContentLoaded", function () {
        // Select the elements
        const enhancedTab = document.querySelector(".photo__preview-enhanced-tab");
        const originalTab = document.querySelector(".photo__preview-original-tab");
        const enhancedPhoto = document.getElementById("enhanced-photo");
        const originalPhoto = document.getElementById("original-photo");
        const enhancedCopy = document.getElementById("enhanced-copy");
        const originalCopy = document.getElementById("original-copy");

        // Check if all necessary elements exist
        if (enhancedTab && originalTab && enhancedPhoto && originalPhoto && enhancedCopy && originalCopy) {
            // Initially show the original photo and copy, hide the enhanced
            enhancedPhoto.style.display = "none";
            enhancedCopy.style.display = "none";

            // Function to toggle between tabs
            function showPhotoAndCopy(selectedPhoto, selectedCopy, otherPhoto, otherCopy) {
                selectedPhoto.style.display = "block";
                selectedCopy.style.display = "block";
                otherPhoto.style.display = "none";
                otherCopy.style.display = "none";
            }

            // Enhanced tab click event
            enhancedTab.addEventListener("click", function (e) {
                e.preventDefault();
                enhancedTab.classList.add("active");
                originalTab.classList.remove("active");
                showPhotoAndCopy(enhancedPhoto, enhancedCopy, originalPhoto, originalCopy);
            });

            // Original tab click event
            originalTab.addEventListener("click", function (e) {
                e.preventDefault();
                originalTab.classList.add("active");
                enhancedTab.classList.remove("active");
                showPhotoAndCopy(originalPhoto, originalCopy, enhancedPhoto, enhancedCopy);
            });
        }
    });
}
