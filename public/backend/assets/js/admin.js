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

});