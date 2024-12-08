( function ( $ ) {
    function mobileMenuToggle() {
        const menuToggle = document.getElementById( 'mobile-menu-toggle' );
        const navMobile = document.getElementById( 'nav-mobile' );

        menuToggle.addEventListener( 'click', () => {
            const isExpanded = menuToggle.getAttribute( 'aria-expanded') === 'true' ;

            // Toggle the menu visibility and accessibility attributes.
            menuToggle.setAttribute( 'aria-expanded', ! isExpanded );
            navMobile.classList.toggle( 'hidden' );
        } );
    }

    function mobileSubMenuToggle() {
        const toggles = document.querySelectorAll( '.submenu-toggle' );

        toggles.forEach( toggle => {
            toggle.addEventListener( 'click', () => {
                const subMenu = toggle.closest( 'li' ).querySelector( '.sub-menu' );
                const isExpanded = toggle.getAttribute( 'aria-expanded' ) === 'true';

                // Toggle attributes and classes.
                toggle.setAttribute( 'aria-expanded', ! isExpanded );
                subMenu.classList.toggle( 'hidden' );
            } );
        } );
    }

    $( document ).ready( function () {
        mobileMenuToggle();
        mobileSubMenuToggle();
    } );
} )( jQuery );