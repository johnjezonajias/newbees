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
        //add_theme_support( 'custom-logo' );
        add_theme_support(
            'custom-logo',
            apply_filters( 'custom_logo_args',
                [
                    'width'       => 200,
                    'height'      => 40,
                    'flex-height' => true,
                    'flex-width'  => true
                ]
            )
        );
    }

    /**
     * Registers sidebars.
     */
    public function register_sidebars() {
        register_sidebar( [
            'name'          => __( 'Primary Sidebar', 'newbees' ),
            'id'            => 'primary-sidebar',
            'description'   => __( 'The main sidebar used across the theme.', 'newbees' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer Column 1', 'newbees' ),
            'id'            => 'footer-col-1',
            'description'   => __( 'The sidebar used for footer column.', 'newbees' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer Column 2', 'newbees' ),
            'id'            => 'footer-col-2',
            'description'   => __( 'The sidebar used for footer column.', 'newbees' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer Column 3', 'newbees' ),
            'id'            => 'footer-col-3',
            'description'   => __( 'The sidebar used for footer column.', 'newbees' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ] );
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