<?php

namespace App\Theme;

/**
 * Remove bloat from front end
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 */
class CleanUp
{
    /**
     * Initialize the object
     */
    public function __construct()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        add_filter('feed_links_show_comments_feed', '__return_false');
        add_filter('excerpt_more', [$this, 'excerptReadMore']);
        add_filter('excerpt_length', [$this, 'excerptLength']);
    }

    /**
     * Text and link after the_excerpt()
     **/
    public function excerptReadMore() {
        return ' &hellip;&nbsp;<a href="' . get_permalink() . '">' . __('Continued', '@textdomain') . '</a>';
    }

    /**
     * Limit the_excerpt() length, in words
     **/
    public function excerptLength() {
        return 10;
    }
}
