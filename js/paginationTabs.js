export function setupPaginationTabs() {
    document.addEventListener("DOMContentLoaded", function () {
        const page1 = document.getElementById("page-1");
        const page2 = document.getElementById("page-2");
        const page1Link = document.querySelector('a[href="#page-1"]');
        const page2Link = document.querySelector('a[href="#page-2"]');

        // Check if all required elements exist
        if (page1 && page2 && page1Link && page2Link) {
            // Ensure both links do not start with the 'active' class
            page1Link.classList.remove("active");
            page2Link.classList.remove("active");

            // Initially set page-1 as active
            page1.style.display = "block"; // Show page-1
            page2.style.display = "none"; // Hide page-2
            page1Link.classList.add("active"); // Set active class for page-1 tab

            // Function to toggle pages
            function showPage(pageToShow, pageToHide, activeLink, inactiveLink) {
                pageToShow.style.display = "block";
                pageToHide.style.display = "none";

                activeLink.classList.add("active");
                inactiveLink.classList.remove("active");
            }

            // Event listener for page-1 link
            page1Link.addEventListener("click", function (e) {
                e.preventDefault();
                showPage(page1, page2, page1Link, page2Link);
            });

            // Event listener for page-2 link
            page2Link.addEventListener("click", function (e) {
                e.preventDefault();
                showPage(page2, page1, page2Link, page1Link);
            });
        }
    });
}
