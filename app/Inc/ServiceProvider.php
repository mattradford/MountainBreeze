<?php

namespace App\Inc;

/**
 * Service provider base class
 *
 * @category Theme
 * @package  MountainGoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/ WTFPL
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 */
abstract class ServiceProvider
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->call();
    }

    /**
     * Instantiate an instance of each class (service)
     *
     * @return void
     */
    public function call()
    {
        foreach ($this->classes as $class) {
            new $class;
        }
    }
}
