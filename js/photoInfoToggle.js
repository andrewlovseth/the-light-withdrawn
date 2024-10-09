export function setupPhotoInfoToggle() {
    document.addEventListener("DOMContentLoaded", function () {
        // Elements we need to toggle
        const highResDownloadEl = document.getElementById("high-res-download");

        // Check if the password has been entered (via cookie or localStorage)
        const passwordEnteredInCookie = document.cookie.split("; ").find((row) => row.startsWith("site_password="));
        const passwordEnteredInLocalStorage = localStorage.getItem("site_password") === "entered";

        // If either the cookie or localStorage indicates the password has been entered
        if (passwordEnteredInCookie || passwordEnteredInLocalStorage) {
            if (highResDownloadEl) {
                highResDownloadEl.style.display = "inline-block"; // Show download link
            }
        } else {
            if (highResDownloadEl) {
                highResDownloadEl.style.display = "none"; // Hide download link
            }
        }
    });
}
