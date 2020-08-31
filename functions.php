<?php
/**
 * Functions, main entry file.
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 **/

/**
 * If this file is accessed directory, then abort.
 */
if (!defined('WPINC') || defined('Wesley_Crusher')) {
    die;
}

/**
 * Composer
 */
require __DIR__ . '/vendor/autoload.php';

/**
 * Global helpers
 */
foreach (glob(get_template_directory() . '/app/Helpers/*.php') as $filename) {
    include_once $filename;
}

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('main', get_stylesheet_directory_uri() . '/dist/css/main.css');
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/dist/js/main.js');
    if (!function_exists('enablejQuery') || !enablejQuery()) {
        wp_deregister_script('jquery');
    } else {
        wp_enqueue_script('legacy', get_stylesheet_directory_uri() . '/dist/js/legacy.js', ['jquery'], '', 'true');
    }
});

/**
 * Boot the theme and all core functionality
 */
add_action('init', function () {
    new \App\Inc\RegisterServiceProviders;
});

