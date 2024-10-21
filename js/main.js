import { setActiveNavLinks, setActivePaginationLinks } from "./nav.js?v=1.2";
import { setupPhotoGalleryHeroReveal, adjustGalleryPadding } from "./gallery.js?v=1.2";
import { setupNoteModals } from "./noteModals.js?v=1.2";
import { setupPhotoTabs } from "./photoTabs.js?v=1.2";
import { setupPasswordModal } from "./passwordModal.js?v=1.2";
import { setupMobileNav } from "./mobileNav.js?v=1.2";
import { setupPaginationTabs } from "./paginationTabs.js?v=1.3";
import { setupToggleExtraCopy } from "./toggleExtraCopy.js?v=1.2";
import { setupbuyBookModal } from "./buyBookModal.js?v=1.2";
import { setupPhotoVisibilityToggle } from "./photoVisibility.js?v=1.2";
import { setupPasswordForm, checkPassword } from "./passwordForm.js?v=1.6";
import { setupPhotoInfoToggle } from "./photoInfoToggle.js?v=1.2";
import { setupPasswordVisibilityOnLoad } from "./passwordVisibility.js?v=1.1"; // Assuming it's in a separate file
import { praiseCarousel } from "./swiper.js?v=1.2";

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

// Initialize the visibility check on page load
setupPasswordVisibilityOnLoad();

// Initialize other modules...
setupPhotoInfoToggle(); // Initialize the photo info toggle logic

// Initialize photo visibility toggle logic for watermark vs enhanced image
setupPhotoVisibilityToggle();

// Initialize password form submission
setupPasswordForm();

// Check if the password has already been entered on page load
checkPassword();

// Initialize swiper
praiseCarousel();
