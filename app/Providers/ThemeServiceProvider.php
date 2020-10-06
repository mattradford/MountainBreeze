<?php

namespace App\Providers;

use App\Inc\ServiceProvider;

/**
 * Registers main theme services
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 */
class ThemeServiceProvider extends ServiceProvider
{
    /**
     * List the classes that need to be booted on every request
     *
     * @var array
     */
    protected $classes = [
        '\App\Theme\Supports',
        '\App\Theme\BaseWrapper',
        '\App\Theme\CleanUp',
        '\App\Theme\Enqueue',
    ];
}
