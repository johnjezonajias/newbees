<?php

namespace Newbees\acf;

/**
 * Class ACFCore
 *
 * This class handles the registration of all ACF field groups for the theme.
 *
 * @package Newbees\acf
 */
class ACFCore {

    /**
     * Constructor to initialize hooks and filters.
     */
    public function __construct() {
        add_action( 'acf/init', [ $this, 'register_field_groups' ] );
        add_filter( 'timber/context', [ $this, 'add_to_context' ] );
    }

    /**
     * Registers all ACF field groups.
     *
     * This method checks if ACF is available and, if so, proceeds to register
     * all field groups required by the theme, including those for theme options,
     * contact page, and social icons.
     *
     * @return void
     */
    public function register_field_groups(): void {
        // Check if the ACF function is available before proceeding.
        if ( ! function_exists( 'acf_add_local_field_group' ) ) {
            // ACF is not active, so we can't register the field groups.
            return;
        }

        // Register the Theme Options field group.
        if ( class_exists( 'Newbees\acf\ThemeOptions' ) ) {
            ThemeOptions::register();
        }

        // Register the Contact Page field group.
        if ( class_exists( 'Newbees\acf\ContactPage' ) ) {
            ContactPage::register();
        }

        // Register the Social Icons field group.
        if ( class_exists( 'Newbees\acf\SocialIcons' ) ) {
            SocialIcons::register();
        }
    }

    /**
     * Adds registered widget areas to the Timber context.
     *
     * This function loops through all registered widget areas, retrieves their
     * content using `Timber::get_widgets`, and adds them to the context.
     *
     * @param array $context The default Timber context.
     * @return array The modified Timber context with widget areas.
     */
    public function add_to_context( $context ) {
        $context['social_links'] = get_field( 'social_links', 'option' );

        return $context;
    }
}
