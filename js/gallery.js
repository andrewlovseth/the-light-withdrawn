export function setupPhotoGalleryHeroReveal() {
    window.addEventListener("load", function () {
        function setRevealContainerHeight() {
            const revealContainer = document.querySelector(".hero__enhanced-wrapper");
            const colorImageHeight = document.querySelector(".hero__enhanced-wrapper img").offsetHeight;
            revealContainer.style.height = `${colorImageHeight}px`;
        }

        setTimeout(setRevealContainerHeight, 2000);
        window.addEventListener("resize", setRevealContainerHeight);
    });
}

export function adjustGalleryPadding() {
    function adjustPadding() {
        const div1 = document.querySelector(".hero__info");
        const div2 = document.querySelector("section.gallery");
        const div1Height = div1.offsetHeight;
        div2.style.paddingTop = `${div1Height / 2}px`;
    }

    window.addEventListener("load", adjustPadding);
    window.addEventListener("resize", adjustPadding);
}
