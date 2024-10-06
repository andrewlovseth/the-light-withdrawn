export function setActiveNavLinks() {
    document.addEventListener("DOMContentLoaded", function () {
        const navLinks = document.querySelectorAll(".site-nav a");
        const currentUrl = window.location.pathname;

        navLinks.forEach((link) => {
            const linkUrl = new URL(link.href);
            if (currentUrl === linkUrl.pathname || currentUrl.startsWith(linkUrl.pathname)) {
                link.classList.add("active");
            }
        });
    });
}

export function setActivePaginationLinks() {
    document.addEventListener("DOMContentLoaded", function () {
        const paginationLinks = document.querySelectorAll(".gallery__pagination-link");
        const currentUrl = window.location.pathname;

        paginationLinks.forEach((link) => {
            const linkUrl = new URL(link.href);
            if (currentUrl === linkUrl.pathname || currentUrl.startsWith(linkUrl.pathname)) {
                link.classList.add("active");
            }
        });
    });
}
