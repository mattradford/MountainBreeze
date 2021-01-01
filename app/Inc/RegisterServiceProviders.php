<?php

namespace App\Inc;
use App\Inc\ServiceProvider;

/**
 * Registers service providers
 *
 * @category Theme
 * @package  MountainGoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/ WTFPL
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 */
class RegisterServiceProviders extends ServiceProvider
{
    /**
     * Register your service providers here.
     *
     * @var array
     */
    protected $classes = [
        '\App\Providers\ThemeServiceProvider',
        '\App\Providers\AdminServiceProvider',
    ];
}
