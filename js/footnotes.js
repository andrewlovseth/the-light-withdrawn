export function toggleFootnotes() {
    document.addEventListener("DOMContentLoaded", function () {
        const toggleButton = document.querySelector(".toggle-footnotes");
        const footnotesList = document.querySelector(".wp-block-footnotes");
        const footnoteLinks = document.querySelectorAll(".fn a");

        // Set initial button text
        if (toggleButton) {
            toggleButton.innerHTML += `
                <span class="toggle-footnotes__btn">
                <svg width="26" height="10" viewBox="0 0 26 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.61851 10C9.36107 10 11.5732 7.76967 11.6183 5.08089C11.9847 4.94955 12.3711 4.88263 12.7603 4.88311C13.1021 4.88311 13.5159 4.93688 13.9024 5.08089C13.9475 7.79702 16.1596 10 18.9022 10C21.5012 10 23.6235 8.03035 23.8842 5.52158H24.9542C25.3589 5.52158 25.5207 5.27868 25.5207 4.946V4.6042C25.5207 4.26241 25.3589 4.02862 24.9542 4.02862H23.8208C23.3623 1.74452 21.3389 0 18.9017 0C16.5638 0 14.6033 1.60962 14.055 3.77706C13.6412 3.61528 13.1554 3.56104 12.7599 3.56104C12.3643 3.56104 11.8785 3.61528 11.4652 3.77706C10.9073 1.60962 8.94727 0 6.61805 0C4.18129 0 2.15786 1.74452 1.69895 4.02862H0.566468C0.152668 4.02862 0 4.26241 0 4.6042V4.946C0 5.27868 0.152668 5.52158 0.566468 5.52158H1.63651C1.76672 6.75175 2.34786 7.89013 3.26784 8.71712C4.18782 9.54411 5.38147 10.0011 6.61851 10ZM6.61851 8.65105C6.13892 8.65147 5.66396 8.55731 5.2208 8.37396C4.77764 8.19061 4.37499 7.92166 4.03589 7.58252C3.69679 7.24338 3.4279 6.8407 3.24461 6.39752C3.06131 5.95434 2.96721 5.47936 2.96769 4.99977C2.96769 2.98546 4.60375 1.34941 6.61805 1.34941C8.62371 1.34941 10.2693 2.98546 10.2693 4.99977C10.2713 5.47977 10.1781 5.95539 9.99537 6.39923C9.81258 6.84306 9.54375 7.24632 9.20436 7.58575C8.86497 7.92518 8.46174 8.19407 8.01793 8.37691C7.57412 8.55975 7.0985 8.65292 6.61851 8.65105ZM18.9022 8.65105C18.4222 8.65292 17.9465 8.55975 17.5027 8.37691C17.0589 8.19407 16.6557 7.92518 16.3163 7.58575C15.9769 7.24632 15.7081 6.84306 15.5253 6.39923C15.3425 5.95539 15.2494 5.47977 15.2513 4.99977C15.2501 4.52002 15.3437 4.04477 15.5268 3.60131C15.7098 3.15785 15.9787 2.75494 16.318 2.41573C16.6572 2.07652 17.0602 1.80769 17.5037 1.62469C17.9471 1.4417 18.4224 1.34814 18.9022 1.34941C20.9165 1.34941 22.5534 2.98546 22.5534 4.99977C22.5538 5.47938 22.4597 5.95437 22.2763 6.39755C22.093 6.84073 21.8241 7.24341 21.4849 7.58255C21.1458 7.92169 20.7431 8.19062 20.2999 8.37397C19.8567 8.55731 19.3818 8.65147 18.9022 8.65105Z" fill="black"/>
                </svg>

                <span class="toggle-footnotes__btn-label">View</span>
                </span>
            `;
        }

        const btnLabel = toggleButton.querySelector(".toggle-footnotes__btn-label");

        // Update button label based on visibility
        if (btnLabel) {
            // Update button text when clicked
            toggleButton.addEventListener("click", () => {
                btnLabel.textContent = footnotesList.style.display === "block" ? "Hide" : "View";
            });
        }

        // Check if elements exist before proceeding
        if (toggleButton && footnotesList) {
            // Initially hide the footnotes
            footnotesList.style.display = "none";

            toggleButton.addEventListener("click", function (e) {
                e.preventDefault();
                // Toggle visibility using height and opacity for smooth transitions
                if (footnotesList.style.display === "none") {
                    footnotesList.style.display = "block";
                    btnLabel.textContent = "Hide";
                } else {
                    footnotesList.style.display = "none";
                    btnLabel.textContent = "View";
                }
            });
        }

        // Add click handlers for individual footnote links
        if (footnoteLinks) {
            footnoteLinks.forEach((link) => {
                link.addEventListener("click", function (e) {
                    // Show footnotes list if hidden
                    if (footnotesList.style.display === "none") {
                        footnotesList.style.display = "block";
                        btnLabel.textContent = "Hide";
                    }
                });
            });
        }
    });
}
