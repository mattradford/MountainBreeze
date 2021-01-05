<?php

namespace App\Theme;

/**
 * Enqueue scripts, styles and fonts.
 *
 * @category Theme
 * @package  MountainGoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/ WTFPL
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 */
class Enqueue
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'style'], 100);
        add_action('wp_enqueue_scripts', [$this, 'scripts'], 100);
        add_action('wp_enqueue_scripts', [$this, 'jquery'], 100);
        add_action('login_enqueue_scripts', [$this, 'login'], 100);
        add_filter('style_loader_src', [$this, 'removeWpVersion'], 9999);
        add_filter('script_loader_src', [$this, 'removeWpVersion'], 9999);
    }

    /**
     * CSS
     *
     * @return void
     */
    public function style()
    {
        wp_enqueue_style(
            'mg-main',
            get_template_directory_uri() . mgAssetPath('/css/main.css'),
            '',
            false,
            'screen'
        );
    }

    /**
     * JavaScript
     *
     * @return void
     */
    public function scripts()
    {
        wp_enqueue_script('mg-main', get_stylesheet_directory_uri() . mgAssetPath('/js/main.js'), '', '', true);
        // if (is_single() && comments_open() && get_option('thread_comments')) {
        //     wp_enqueue_script('comment-reply');
        // }
    }

    /**
     * Conditionally load jQuery
     *
     * @return void
     */
    public function jquery()
    {
        if (enablejQuery()) {
            wp_enqueue_script('mg-legacy', get_stylesheet_directory_uri() . mgAssetPath('/js/legacy.js'), ['jquery'], '', 'true');
        } else {
            wp_deregister_script('jquery');
        }
    }

     /**
      * CSS for wp-login
      *
      * @return void
      */
    public function login()
    {
        wp_enqueue_style('mg-login', get_stylesheet_directory_uri() . mgAssetPath('/css/login.css'), ['login']);
    }

    /**
     * Google Fonts
     *
     * Now with support for font-display
     *
     * @link https://css-tricks.com/font-display-masses/
     *
     * @return void
     */
    public function googleFont()
    {
        wp_enqueue_style('mg-google-font', 'https://fonts.googleapis.com/css?family=Open+Sans&display=swap', false);
    }

    /**
     * Remove WP version query strings from scripts and stylesheets
     *
     * @param string $src Url of external resource being called into the page
     *
     * @return string
     */
    public function removeWpVersion($src)
    {
        if (strpos($src, 'ver=')) {
            return remove_query_arg('ver', $src);
        }
        return $src;
    }
}
