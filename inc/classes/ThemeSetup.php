<?php

namespace Newbees\classes;

/**
 * Handles theme setup and asset management.
 */
class ThemeSetup {
    /**
     * Initializes the theme setup.
     */
    public function init() {
        add_action( 'after_setup_theme', [ $this, 'theme_supports' ] );
        add_action( 'widgets_init', [ $this, 'register_sidebars' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
    }

    /**
     * Registers theme support features.
     */
    public function theme_supports() {
        add_theme_support( 'custom-logo' );
    }

    /**
     * Enqueues styles and scripts.
     */
    public function enqueue_assets() {
        // Styles.
        wp_enqueue_style( 'newbees-style', NEWBEES_URL . 'dist/css/style.css', [], NEWBEES_VERSION );

        // Scripts.
        wp_enqueue_script( 'newbees-scripts', NEWBEES_URL . 'assets/js/scripts.js', [ 'jquery' ], NEWBEES_VERSION, true );
    }
}