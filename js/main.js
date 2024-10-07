import { setActiveNavLinks, setActivePaginationLinks } from "./nav.js";
import { setupPhotoGalleryHeroReveal, adjustGalleryPadding } from "./gallery.js";
import { setupModals } from "./modals.js";
import { setupPhotoTabs } from "./tabs.js";
import { setupPasswordModal } from "./passwordModal.js";

// Initialize navigation logic
setActiveNavLinks();
setActivePaginationLinks();

// Initialize gallery reveal and padding adjustment
setupPhotoGalleryHeroReveal();
adjustGalleryPadding();

// Initialize modals
setupModals();

// Initialize photo tab switching
setupPhotoTabs();

// Initialize password modal logic
setupPasswordModal();
