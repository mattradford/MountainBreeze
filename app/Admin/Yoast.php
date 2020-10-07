<?php

namespace App\Admin;

/**
 * Cleanup
 *
 * Remove unecessary functionality
 *
* @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 */
class Yoast
{
    /**
     * Constructor
     */
    public function __construct()
    {
        if (\class_exists('WPSEO_Options')) {
            add_action('add_meta_boxes', [$this, 'removeYoastMetaBoxForNon'], 99);
            add_action('add_meta_boxes', [$this, 'removeYoastMetaBoxForPostType'], 99);
            add_filter('wpseo_metabox_prio', [$this, 'moveYoastToBottomOfEditPage']);
            add_filter('admin_head', [$this, 'hideDeadSocialNetworksInYoastSocial']);
        }
    }

    /**
     * Remove Yoast SEO meta from users below Editor
     *
     * @return void
     */
    public function removeYoastMetaBoxForNon()
    {
        if (!current_user_can('edit_posts')) {
            remove_meta_box('wpseo_meta', 'page', 'normal');
            remove_meta_box('wpseo_meta', 'post', 'normal');
        }
    }

    /**
     * Remove Yoast SEO meta for specified post types
     *
     * @return void
     */
    public function removeYoastMetaBoxForPostType()
    {
        remove_meta_box('wpseo_meta', 'testimonial', 'normal');
    }

    /**
     * Yoast SEO to bottom of edit screen
     *
     * @return string $position
     */
    public function moveYoastToBottomOfEditPage()
    {
        return 'low';
    }

    /**
     * CSS away social networks that flopped
     *
     * @return string CSS
     */
    public function hideDeadSocialNetworksInYoastSocial()
    {
        ob_start(); ?>
        <style>
        #myspace_url,
        label[for="myspace_url"],
        #myspace_url + br {
            display: none!important;//RIP Tom
        }
        </style>
        <?php
        echo ob_get_clean();
    }
}
