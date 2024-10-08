export function setupPhotoGalleryHeroReveal() {
    window.addEventListener("load", function () {
        function setRevealContainerHeight() {
            const revealContainer = document.querySelector(".gallery-hero__enhanced-wrapper");
            const colorImage = document.querySelector(".gallery-hero__enhanced-wrapper img");

            // Ensure the container and image exist before trying to access them
            if (revealContainer && colorImage) {
                const colorImageHeight = colorImage.offsetHeight;
                revealContainer.style.height = `${colorImageHeight}px`;
            }
        }

        // Set height after a delay and on window resize
        setTimeout(setRevealContainerHeight, 2000);
        window.addEventListener("resize", setRevealContainerHeight);
    });
}

export function adjustGalleryPadding() {
    function adjustPadding() {
        const div1 = document.querySelector(".gallery-hero__info");
        const div2 = document.querySelector("section.gallery");

        // Ensure both elements exist before attempting to adjust padding
        if (div1 && div2) {
            const div1Height = div1.offsetHeight;
            div2.style.paddingTop = `${div1Height / 2}px`;
        }
    }

    // Adjust padding on page load and on window resize
    window.addEventListener("load", adjustPadding);
    window.addEventListener("resize", adjustPadding);
}
