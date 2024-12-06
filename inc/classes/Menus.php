<?php

namespace Newbees\classes;

use Timber\Timber;

/**
 * Handles menu registration and integration with Timber.
 *
 * This class registers WordPress navigation menus and makes them
 * available in the Timber context for use in Twig templates.
 */
class Menus {

    /**
     * Constructor to initialize hooks and filters.
     */
    public function __construct() {
        add_action( 'init', [ $this, 'register_menus' ] );
        add_filter( 'timber/context', [ $this, 'add_to_context' ] );
    }

    /**
     * Registers navigation menus for the theme.
     *
     * This function defines menu locations with their respective labels,
     * making them available for assignment in the WordPress admin.
     *
     * @return void
     */
    public function register_menus() {
        register_nav_menus(
            [
                'primary_menu' => __( 'Primary Menu', 'newbees' ),
                'footer_menu'  => __( 'Footer Menu', 'newbees' ),
            ]
        );
    }

    /**
     * Adds registered menus to the Timber context.
     *
     * This function loops through all registered menu locations, checks
     * if a menu is assigned to the location, and adds it to the context
     * for use in Twig templates.
     *
     * @param array $context The default Timber context.
     * @return array The modified Timber context with menus.
     */
    public function add_to_context( $context ) {
        foreach ( array_keys( get_registered_nav_menus() ) as $location ) {
            if ( ! has_nav_menu( $location ) ) {
                continue;
            }

            // Retrieve the menu and add it to the context.
            $menu = Timber::get_menu( $location );

            $context[ $location ] = $menu;
        }

        return $context;
    }
}