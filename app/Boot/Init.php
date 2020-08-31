<?php

namespace App\Boot;

/**
 * Set up some defaults, add theme supports, textdomain, excerpt niceness, etc.
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 */
class Init
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * Init
     *
     * @return void
     */
    public function init()
    {
        /*
         * Make theme available for translation
         */
        load_theme_textdomain('@textdomain', get_template_directory() . '/lang');

        /*
         * Enable plugins to manage the document title
         *
         * @link https://github.com/roots/roots/pull/1234/files
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
         */
        add_theme_support('title-tag');

        /*
         * Post thumbnail support
         */
        add_theme_support('post-thumbnails');

        /*
         * WooCommerce support
         */
        add_theme_support('woocommerce');

        /*
         * Selective Refresh Support for Widgets
         *
         * @link https://make.wordpress.org/core/2016/03/22/implementing-selective-refresh-support-for-widgets/
         */
        add_theme_support('customize-selective-refresh-widgets');

        /*
         * Custom logo
         */
        add_theme_support('custom-logo');

        /*
         * Editor style support
         *
         * Optionally enable dark mode for editor styles
         *
         * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#editor-styles
         * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#dark-backgrounds
         */
        add_theme_support('editor-styles');
        // add_theme_support( 'dark-editor-style' );

        /*
         * Block Editor wide image
         * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment
         */
        add_theme_support('align-wide');

        /*
         * Block Editor disable custom colors in block Color Palettes
         * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-font-sizes
         */
        add_theme_support('disable-custom-font-sizes');

        /*
         * Block Editor disable custom font sizes
         * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-custom-colors-in-block-color-palettes
         */
        add_theme_support('disable-custom-font-sizes');

        /*
         * Custom image sizes
         */
        // add_image_size( 'td-60', 60, 60, true );

        /*
         * Responsive embedded content
         * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#responsive-embedded-content
         */
        add_theme_support('responsive-embeds');

         /*
         * Disable custom editor colour palette
         * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
         */
        add_theme_support('disable-custom-colors');

        /*
         * HTML5 support
         *
         * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
         */
        add_theme_support('html5', ['script', 'style', 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);

        /*
         * Post formats
         */
        // add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

        /*
         * Clean up the_excerpt()
         */
        add_filter('excerpt_more', function () {
            return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', '@textdomain') . '</a>';
        });
        /*
         * Excerpt length in words
         *
         * @param  integer $length
         * @return integer
         */
        add_filter('excerpt_length', function ($length) {
            return 10;
        }, 999);
    }
}
