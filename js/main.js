import { setActiveNavLinks, setActivePaginationLinks } from "./nav.js";
import { setupPhotoGalleryHeroReveal, adjustGalleryPadding } from "./gallery.js";
import { setupModals } from "./modals.js";

// Initialize navigation logic
setActiveNavLinks();
setActivePaginationLinks();

// Initialize gallery reveal and padding adjustment
setupPhotoGalleryHeroReveal();
adjustGalleryPadding();

// Initialize modals
setupModals();
