// toggleExtraCopy.js

export function setupToggleExtraCopy() {
    if (document.body.classList.contains("page-template-home")) {
        document.addEventListener("DOMContentLoaded", function () {
            const moreLink = document.querySelector(".home-about__more-link");
            const moreContent = document.getElementById("more");

            // Initially hide the "more" content
            moreContent.style.display = "none";

            // Function to toggle the extra copy
            moreLink.addEventListener("click", function (e) {
                e.preventDefault();

                // Check if the content is currently visible
                if (moreContent.style.display === "none") {
                    moreContent.style.display = "block"; // Show the content
                    moreLink.textContent = "Show Less <<"; // Change link text
                } else {
                    moreContent.style.display = "none"; // Hide the content
                    moreLink.textContent = "Keep Reading >>"; // Reset link text
                }
            });
        });
    }
}
