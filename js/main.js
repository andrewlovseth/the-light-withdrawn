import { setActiveNavLinks, setActivePaginationLinks } from "./nav.js?v=1.1";
import { setupPhotoGalleryHeroReveal, adjustGalleryPadding } from "./gallery.js?v=1.1";
import { setupNoteModals } from "./noteModals.js?v=1.1";
import { setupPhotoTabs } from "./photoTabs.js?v=1.1";
import { setupPasswordModal } from "./passwordModal.js?v=1.1";
import { setupMobileNav } from "./mobileNav.js?v=1.1";
import { setupPaginationTabs } from "./paginationTabs.js?v=1.1";
import { setupToggleExtraCopy } from "./toggleExtraCopy.js?v=1.1";
import { setupbuyBookModal } from "./buyBookModal.js?v=1.1";
import { setupPhotoVisibilityToggle } from "./photoVisibility.js?v=1.1";
import { setupPasswordForm } from "./passwordForm.js?v=1.1";
import { setupPhotoInfoToggle } from "./photoInfoToggle.js?v=1.1";

// Initialize navigation logic
setActiveNavLinks();
setActivePaginationLinks();

// Initialize gallery reveal and padding adjustment
setupPhotoGalleryHeroReveal();
adjustGalleryPadding();

// Initialize modals
setupNoteModals();

// Initialize photo tab switching
setupPhotoTabs();

// Initialize password modal logic
setupPasswordModal();

// Initialize mobile navigation logic
setupMobileNav();

// Initialize pagination tabs logic
setupPaginationTabs();

// Initialize toggle extra copy logic
setupToggleExtraCopy();

// Initialize buy book modal logic
setupbuyBookModal();

// Initialize photo visibility toggle logic for watermark vs enhanced image
setupPhotoVisibilityToggle();

// Initialize password form submission
setupPasswordForm();

// Initialize other modules...
setupPhotoInfoToggle(); // Initialize the photo info toggle logic
