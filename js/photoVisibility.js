export function setupPhotoVisibilityToggle() {
    document.addEventListener("DOMContentLoaded", function () {
        // Ensure the elements exist on the page before proceeding
        const watermarkEl = document.querySelector(".photo__preview-enhanced-watermark");
        const enhancedEl = document.querySelector(".photo__preview-enhanced-full");

        if (watermarkEl && enhancedEl) {
            // Check if the password has already been entered (via cookie or localStorage)
            const passwordEnteredInCookie = document.cookie.split("; ").find((row) => row.startsWith("site_password="));
            const passwordEnteredInLocalStorage = localStorage.getItem("site_password") === "entered";

            // If either cookie or localStorage indicates the password has been entered
            if (passwordEnteredInCookie || passwordEnteredInLocalStorage) {
                // Remove 'active' class from the watermarked image
                watermarkEl.classList.remove("active");
                // Add 'active' class to the enhanced image
                enhancedEl.classList.add("active");
            } else {
                // Default state: watermarked image should have the 'active' class
                watermarkEl.classList.add("active");
                enhancedEl.classList.remove("active");
            }
        }
    });
}
