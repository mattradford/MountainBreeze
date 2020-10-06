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
 * If this file is accessed directly, or if Wesley Crusher is present, then abort.
 * @link https://jerz.setonhill.edu/resources/humor/crusher.htm
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

/**
 * Enable jQuery
 *
 * False by default; return true to enable jQuery
 */
function enablejQuery()
{
    return false;
}

/**
 * Boot the theme and all core functionality
 */
add_action('init', function () {
    new \App\Inc\RegisterServiceProviders;
});

