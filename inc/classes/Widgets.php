<?php

namespace Newbees\classes;

use Timber\Timber;

/**
 * Handles widget registration and integration with Timber.
 */
class Widgets {

    /**
     * Constructor to initialize hooks and filters.
     */
    public function __construct() {
        add_action( 'widgets_init', [ $this, 'register_widgets' ] );
        add_filter( 'timber/context', [ $this, 'add_to_context' ] );
    }

    /**
     * Registers sidebars (widget areas) for the theme.
     */
    public function register_widgets() {
        $widget_areas = [
            [
                'name'        => __( 'Primary Sidebar', 'newbees' ),
                'id'          => 'primary-sidebar',
                'description' => __( 'The main sidebar used across the theme.', 'newbees' ),
            ],
            [
                'name'        => __( 'Footer Column 1', 'newbees' ),
                'id'          => 'footer-col-1',
                'description' => __( 'The sidebar used for footer column 1.', 'newbees' ),
            ],
            [
                'name'        => __( 'Footer Column 2', 'newbees' ),
                'id'          => 'footer-col-2',
                'description' => __( 'The sidebar used for footer column 2.', 'newbees' ),
            ],
            [
                'name'        => __( 'Footer Column 3', 'newbees' ),
                'id'          => 'footer-col-3',
                'description' => __( 'The sidebar used for footer column 3.', 'newbees' ),
            ],
        ];

        foreach ( $widget_areas as $area ) {
            register_sidebar( [
                'name'          => $area['name'],
                'id'            => $area['id'],
                'description'   => $area['description'],
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            ] );
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
        $context['primary_sidebar'] = Timber::get_widgets( 'primary-sidebar' );
        $context['footer_col_1'] = Timber::get_widgets( 'footer-col-1' );
        $context['footer_col_2'] = Timber::get_widgets( 'footer-col-2' );
        $context['footer_col_3'] = Timber::get_widgets( 'footer-col-3' );

        return $context;
    }
}
