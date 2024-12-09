<?php

namespace Newbees\acf;

/**
 * Class ThemeOptions
 *
 * Registers the theme options page and subpages in the WordPress admin menu using ACF.
 * It creates a main options page as well as subpages for Global Settings and Social Accounts.
 *
 * @package Newbees\acf
 */
class ThemeOptions {

    /**
     * Registers the theme options page and subpages.
     *
     * This method checks if the ACF function `acf_add_options_page` is available.
     * It then registers the main options page and two subpages: Global Settings and Social Accounts.
     * These pages allow users to manage theme settings through ACF.
     *
     * @return void
     */
    public static function register(): void {
        // Check if the ACF function is available.
        if ( function_exists( 'acf_add_options_page' ) ) {

            // Register the main theme options page.
            acf_add_options_page( [
                'page_title' => 'Newbees Theme Options',
                'menu_title' => 'Theme Options',
                'menu_slug'  => 'theme-options',
                'capability' => 'edit_posts',
                'redirect'   => true
            ] );

            // Register the Global Settings subpage under the main options page.
            acf_add_options_sub_page( [
                'page_title'  => 'Global Settings',
                'menu_title'  => 'Global Settings',
                'parent_slug' => 'theme-options',
                'menu_slug'   => 'theme-options-global-settings',
                'capability'  => 'edit_posts'
            ] );

            // Register the Social Accounts subpage under the main options page.
            acf_add_options_sub_page( [
                'page_title'  => 'Social Accounts',
                'menu_title'  => 'Social Accounts',
                'parent_slug' => 'theme-options',
                'menu_slug'   => 'theme-options-social-accounts',
                'capability'  => 'edit_posts'
            ] );
        }
    }
}
