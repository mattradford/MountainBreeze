<?php

namespace App\Theme;

/**
 * Enqueue scripts, styles and fonts.
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
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
        // add_action('admin_init', [$this, 'adminStyle'], 100);
        // add_action('admin_init', [$this, 'adminScript'], 100);
        // add_action('wp_enqueue_scripts', [$this, 'removeBlockCSS'], 100);
        // add_action('enqueue_block_editor_assets', [$this, 'blockEditorStyle'], 1, 1);
        // add_action('enqueue_block_editor_assets', [$this, 'blockEditorScript'], 1, 1);
        // add_action('admin_init', [$this, 'classicEditorStyle'], 100);
        // add_action('wp_enqueue_scripts', [$this, 'googleFont'], 99);
        // add_action('wp_enqueue_scripts', [$this, 'typekitFont'], 100);
        add_filter('style_loader_src', [$this, 'removeWpVersion'], 9999);
        add_filter('script_loader_src', [$this, 'removeWpVersion'], 9999);
    }

    /**
     * CSS for front end
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
     * JavaScript for front end
     *
     * @return void
     */
    public function scripts()
    {
        wp_enqueue_script('mg-main', get_stylesheet_directory_uri() . mgAssetPath('/js/main.js'), '', '', true);
        if (is_single() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    /**
     * jQuery
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
     * CSS for wp-admin
     *
     * @return void
     */
    public function adminStyle()
    {
        wp_enqueue_style('mg-admin', get_stylesheet_directory_uri() . mgAssetPath('/css/admin.css'), '', '', 'screen');
    }

    /**
     * JavaScript for wp-admin
     *
     * @return void
     */
    public function adminScript()
    {
        wp_enqueue_script('mg-admin', get_stylesheet_directory_uri() . mgAssetPath('/js/admin.js'), '', '', true);
    }
    /**
     * JavaScript for wp-admin
     *
     * @return void
     */
    public function login()
    {
        wp_enqueue_style('mg-login', get_stylesheet_directory_uri() . mgAssetPath('/css/login.css'), ['login']);
    }

    /**
     * Remove the default block styles
     *
     * @return void
     */
    public function removeBlockCSS()
    {
        wp_dequeue_style('wp-block-library');
    }

    /**
     * CSS for Block Editor
     *
     * @return void
     */
    public function blockEditorStyle()
    {
        wp_enqueue_style('mg-editor-block-style', get_stylesheet_directory_uri() . mgAssetPath('/css/editor-block.css'), '', '', 'screen');
    }

    /**
     * JavaScript for Block Editor
     *
     * @return void
     */
    public function blockEditorScript()
    {
        wp_enqueue_script('mg-editor-block-script', get_stylesheet_directory_uri() . mgAssetPath('/js/editor-block.js'), ['wp-blocks', 'wp-dom','wp-edit-post'], '', true);
    }

    /**
     * CSS for Classic Editor
     *
     * @return void
     */
    public function classicEditorStyle()
    {
        add_editor_style(get_stylesheet_directory_uri() . mgAssetPath('/css/classic-editor.css'));
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
