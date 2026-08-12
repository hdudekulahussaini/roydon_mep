document.addEventListener('DOMContentLoaded', function () {

    /*
     * Sidebar Dropdowns
     */
    const dropdownToggles = document.querySelectorAll(
        '.sidebar-dropdown-toggle'
    );


    dropdownToggles.forEach(function (toggle) {

        toggle.addEventListener('click', function (event) {

            event.preventDefault();

            const dropdown =
                this.nextElementSibling;

            if (!dropdown) {
                return;
            }


            /*
             * Check current state
             */
            const isOpen =
                dropdown.classList.contains('open');


            /*
             * Close all dropdowns
             */
            document
                .querySelectorAll('.sidebar-dropdown-menu')
                .forEach(function (menu) {

                    menu.classList.remove('open');

                });


            /*
             * Remove open state from arrows/buttons
             */
            document
                .querySelectorAll('.sidebar-dropdown-toggle')
                .forEach(function (button) {

                    button.classList.remove('open');

                });


            /*
             * Open clicked dropdown
             */
            if (!isOpen) {

                dropdown.classList.add('open');

                this.classList.add('open');

            }

        });

    });


    /*
     * Automatically open the dropdown
     * when one of its child pages is active.
     *
     * This works for:
     *
     * About Section
     * - Story Section
     * - Company Values
     * - Metrics
     *
     * Offices
     * - Office Locations
     * - Pan-India Coverage
     */
    document
        .querySelectorAll('.sidebar-dropdown')
        .forEach(function (dropdown) {

            const activeSubLink =
                dropdown.querySelector(
                    '.sidebar-sub-link.active'
                );


            if (activeSubLink) {

                const menu =
                    dropdown.querySelector(
                        '.sidebar-dropdown-menu'
                    );

                const toggle =
                    dropdown.querySelector(
                        '.sidebar-dropdown-toggle'
                    );


                /*
                 * Open dropdown
                 */
                if (menu) {

                    menu.classList.add('open');

                }


                /*
                 * Rotate / activate toggle
                 */
                if (toggle) {

                    toggle.classList.add('open');

                }

            }

        });

    /*
     * Global Image File Input Live Preview & Direct Old Image Replacement Handler
     */
    document.addEventListener('change', function (e) {
        if (e.target && e.target.matches('input[type="file"]')) {
            const input = e.target;
            const parent = input.closest('.mb-3, .col-12, .col-md-6, .col-md-12, .form-group, div') || input.parentNode;

            if (!input.files || !input.files.length) return;

            const firstFile = input.files[0];
            if (!firstFile.type.startsWith('image/')) return;

            // Check if there is an existing image element in the form group (Edit page case)
            const existingImg = parent.querySelector('img:not(.sidebar-logo-img):not(.admin-avatar)');
            const existingContainer = document.getElementById('preview-container-' + input.id) ||
                                      parent.querySelector('.current-image-container, .existing-image-box, .old-image-preview');

            const reader = new FileReader();
            reader.onload = function (event) {
                const newSrc = event.target.result;

                // 1. If an existing <img> tag is present (Edit page case), swap src directly!
                if (existingImg) {
                    if (!existingImg.dataset.originalSrc) {
                        existingImg.dataset.originalSrc = existingImg.src;
                    }
                    existingImg.src = newSrc;
                    existingImg.classList.add('preview-trigger-img');

                    if (existingContainer) {
                        existingContainer.style.display = 'block';
                    }

                    let badge = parent.querySelector('.replaced-image-badge');
                    if (!badge) {
                        badge = document.createElement('span');
                        badge.className = 'replaced-image-badge badge bg-success mt-2 d-inline-block';
                        badge.innerHTML = '<i class="fa-solid fa-arrows-rotate me-1"></i> New Image Selected (Replaced)';
                        if (existingImg.parentNode) {
                            existingImg.parentNode.appendChild(badge);
                        } else {
                            parent.appendChild(badge);
                        }
                    }
                    return;
                }

                // 2. Otherwise create a new live preview container (Create page case)
                let previewBox = parent.querySelector('.live-image-preview-container');
                if (!previewBox) {
                    previewBox = document.createElement('div');
                    previewBox.className = 'live-image-preview-container d-flex flex-wrap align-items-center gap-3 mt-3 p-3 bg-light border rounded-3';
                    input.parentNode.appendChild(previewBox);
                }
                previewBox.innerHTML = '';

                Array.from(input.files).forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const fileReader = new FileReader();
                        fileReader.onload = function (evt) {
                            const wrapper = document.createElement('div');
                            wrapper.className = 'position-relative d-inline-block border rounded-3 overflow-hidden shadow-sm bg-white';
                            wrapper.style.cssText = 'width: 120px; height: 120px; cursor: pointer; transition: transform 0.2s;';
                            wrapper.innerHTML = `
                                <img src="${evt.target.result}" alt="New Preview" class="w-100 h-100 preview-trigger-img" style="object-fit: cover;" title="Click to view full image preview">
                                <span class="position-absolute top-0 start-0 bg-success text-white px-2 py-1 small fw-bold" style="font-size: 9px; border-bottom-right-radius: 6px;">NEW</span>
                                <span class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white px-1 text-truncate text-center" style="font-size: 9px; line-height: 1.4;">${file.name}</span>
                            `;
                            previewBox.appendChild(wrapper);
                        };
                        fileReader.readAsDataURL(file);
                    }
                });
            };

            reader.readAsDataURL(firstFile);
        }
    });

    /*
     * Global Image Click to View Fullscreen Lightbox Modal
     */
    document.addEventListener('click', function (e) {
        const img = e.target.closest('img');
        if (img && (img.classList.contains('preview-trigger-img') || img.closest('.table') || img.closest('.card') || img.closest('.form-group') || img.closest('.mb-3'))) {
            if (img.classList.contains('sidebar-logo-img') || img.classList.contains('admin-avatar')) return;

            const modalImg = document.getElementById('globalModalPreviewImage');
            const modalEl = document.getElementById('imagePreviewModal');
            if (modalImg && modalEl && img.src) {
                modalImg.src = img.src;
                const bsModal = new bootstrap.Modal(modalEl);
                bsModal.show();
            }
        }
    });

});