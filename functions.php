<?php
/**
 * Functions, main entry file.
 * php version 7.0.0
 *
 * @category Theme
 * @package  MountainGoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/ WTFPL
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 **/

/**
 * If this file is accessed directly, or if Wesley Crusher is present, then abort.
 *
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
 *
 * @return bool
 */
function enablejQuery()
{
    return false;
}

/**
 * Boot the theme and all core functionality
 */
add_action(
    'init', function () {
        new \App\Inc\RegisterServiceProviders;
    }
);

