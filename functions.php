<?php
/**
 * Theme functions and setup for Newbees.
 *
 * @package Newbees
 */

// Define theme constants for versioning and paths.
define( 'NEWBEES_VERSION', wp_get_theme()->get( 'Version' ) );
define( 'NEWBEES_URL', get_template_directory_uri() . '/' );
define( 'NEWBEES_PATH', get_template_directory() . '/' );
define( 'NEWBEES_INC_PATH', NEWBEES_PATH . 'inc' );

/**
 * Autoload Composer dependencies.
 *
 * If the `vendor/autoload.php` file exists, include it to load
 * any Composer dependencies (e.g., Timber library).
 */
if ( file_exists( NEWBEES_PATH . '/vendor/autoload.php' ) ) {
    require_once NEWBEES_PATH . '/vendor/autoload.php';
}

/**
 * Include modular theme files.
 *
 * Files included here handle core theme functionality, such as
 * theme setup, menu registration, or custom utility classes.
 */
$theme_includes = [
    'src/StarterSite.php',
    'inc/classes/Menus.php',
    'inc/classes/Widgets.php',
    'inc/classes/ThemeSetup.php',
    'inc/acf/ACFCore.php',
    'inc/acf/ThemeOptions.php',
    'inc/acf/Shared.php',
    'inc/acf/SocialIcons.php',
    'inc/acf/ContactPage.php',
];

// Dynamically include each modular file if it exists.
foreach ( $theme_includes as $file ) {
    if ( file_exists( NEWBEES_PATH . $file ) ) {
        require_once NEWBEES_PATH . $file;
    }
}

// Initialize Timber.
Timber\Timber::init();

/**
 * Set Timber template directories.
 *
 * Defines where Timber will look for Twig templates within the theme.
 * You can organize templates inside the `templates` and `views` directories.
 */
Timber::$dirname = [ 'templates', 'views' ];

// Initialize core theme classes.
//use Newbees\acf\ACFCore;
//add_action( 'acf/init', [ACFCore::class, 'registerFieldGroups'] );

new StarterSite();
( new Newbees\classes\ThemeSetup() )->init();
new Newbees\classes\Menus();
new \Newbees\classes\Widgets();
new \Newbees\acf\ACFCore();