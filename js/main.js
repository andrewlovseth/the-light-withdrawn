// Active Nav Links
document.addEventListener("DOMContentLoaded", function () {
    // Get all anchor tags inside the .site-nav div
    const navLinks = document.querySelectorAll(".site-nav a");

    // Get the current URL path
    const currentUrl = window.location.pathname;

    navLinks.forEach((link) => {
        // Get the href attribute of the link
        const linkUrl = new URL(link.href);

        // Check if the current URL is the same or a subpage of the link
        if (currentUrl === linkUrl.pathname || currentUrl.startsWith(linkUrl.pathname)) {
            // Add the 'active' class to the link
            link.classList.add("active");
        }
    });
});

// Photo gallery hero reveal
window.addEventListener("load", function () {
    setTimeout(function () {
        const revealContainer = document.querySelector(".hero__enhanced-wrapper");

        // Get the height of the color image
        const colorImageHeight = document.querySelector(".hero__enhanced-wrapper img").offsetHeight;

        // Set the reveal container height to the full height of the image, triggering the unfurl effect
        revealContainer.style.height = `${colorImageHeight}px`;
    }, 2000);
});

// Function to adjust padding based on the height of div1
function adjustPadding() {
    // Get the first div
    const div1 = document.querySelector(".hero__info");
    const div2 = document.querySelector("section.gallery");

    // Get the height of div1
    const div1Height = div1.offsetHeight;

    // Set half of div1's height as padding-top for div2
    div2.style.paddingTop = `${div1Height / 2}px`;
}

// Run the function on page load
window.addEventListener("load", adjustPadding);

// Recalculate and adjust padding when the window is resized
window.addEventListener("resize", adjustPadding);

// Active Nav Links
document.addEventListener("DOMContentLoaded", function () {
    // Get all anchor tags inside the .site-nav div
    const paginationLinks = document.querySelectorAll(".gallery__pagination-link");

    // Get the current URL path
    const currentUrl = window.location.pathname;

    paginationLinks.forEach((link) => {
        // Get the href attribute of the link
        const linkUrl = new URL(link.href);

        // Check if the current URL is the same or a subpage of the link
        if (currentUrl === linkUrl.pathname || currentUrl.startsWith(linkUrl.pathname)) {
            // Add the 'active' class to the link
            link.classList.add("active");
        }
    });
});
