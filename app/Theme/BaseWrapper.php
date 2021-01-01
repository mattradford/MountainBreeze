<?php

namespace App\Theme;

/**
 * Theme wrapper
 *
 * @category Theme
 * @package  MountainGoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/ WTFPL
 * @link     https://github.com/mattradford/mountaingoat
 * @link     http://roots.io/an-introduction-to-the-roots-theme-wrapper/
 * @link     http://scribu.net/wordpress/theme-wrappers.html
 * @since    1.0.0
 */
class BaseWrapper
{
    // Store the full path to the main template file
    static $main_template;

    // Store the base name of the template file; e.g. 'page' for 'page.php' etc.
    static $base;

    /**
     * Constructor
     *
     * @param string $template Template slug
     */
    public function __construct($template = 'base.php')
    {
        $this->slug = basename($template, '.php');
        $this->templates = array( $template );
        if (self::$base) {
            $str = substr($template, 0, -4);
            array_unshift($this->templates, sprintf($str . '-%s.php', self::$base));
        }
    }

    /**
     * String representation
     *
     * @return string
     */
    public function __toString()
    {
        $this->templates = apply_filters('mg/wrap_' . $this->slug, $this->templates);
        return locate_template($this->templates);
    }

    /**
     * Allow a different base-templatename.php to be used
     *
     * @param [type] $main Insert comment
     *
     * @return BaseWrapper
     */
    static function wrap($main)
    {
        self::$main_template = $main;
        self::$base = basename(self::$main_template, '.php');
        if ('index' === self::$base) {
              self::$base = false;
        }
        return new BaseWrapper();
    }
}

add_filter('template_include', array( 'App\Theme\BaseWrapper', 'wrap' ), 99);
