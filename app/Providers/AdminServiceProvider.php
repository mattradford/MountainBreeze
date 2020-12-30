<?php

namespace App\Providers;

use App\Inc\ServiceProvider;

/**
 * Registers admin services
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 */
class AdminServiceProvider extends ServiceProvider
{
    /**
     * List the admin specific classes that need to be booted on every request
     *
     * @var array
     */
    protected $classes = [
        '\App\Admin\Login',
        '\App\Admin\CleanUp',
        '\App\Admin\Yoast',
        '\App\Admin\MenuOrder',
        '\App\Admin\ReusableBlockMenu',
        '\App\Admin\SetAllowedBlocks',
        '\App\Admin\AcfOptions',
        '\App\Admin\AcfImporter',
        '\App\Admin\Enqueue'
        // '\App\Admin\EditorColourPalette',
        // '\App\Admin\EditorFontSizes',
    ];
}
