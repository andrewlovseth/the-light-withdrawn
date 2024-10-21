import Swiper from "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs";

export function praiseCarousel() {
    const swiper = new Swiper(".swiper", {
        // Optional parameters
        direction: "horizontal",
        loop: true,
        speed: 3000,
        autoplay: {
            delay: 10000,
        },
        effect: "fade",
        fadeEffect: {
            crossFade: true,
        },
        // If we need pagination
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
}
