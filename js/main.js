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
