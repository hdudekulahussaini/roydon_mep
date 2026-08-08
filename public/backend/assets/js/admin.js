document.addEventListener('DOMContentLoaded', function () {

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
             * Remove open state from arrows
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
     * Automatically open About Section
     * when Story / Values / Metrics page
     * is currently active.
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


                if (menu) {
                    menu.classList.add('open');
                }


                if (toggle) {
                    toggle.classList.add('open');
                }

            }

        });

});