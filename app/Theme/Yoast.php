<?php

namespace App\Theme;

/**
 * Yoast social integration
 *
 * @category Theme
 * @package  MountainGoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/ WTFPL
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

    }

    /**
     * Get social link options for Yoast SEO
     *
     * @return array $options Array of social network options
     */
    public static function getSocialLinkOptions()
    {
        $options = array(
            'facebook' => array(
                'key' => 'facebook_site',
                'icon' => td_get_svg('social-icons/facebook.svg'),
            ),
            'twitter' => array(
                'key' => 'twitter_site',
                'prepend' => 'https://twitter.com/',
                'icon' => td_get_svg('social-icons/twitter.svg'),
            ),
            'instagram' => array(
                'key' => 'instagram_url',
                'icon' => td_get_svg('social-icons/instagram.svg'),
            ),
            'linkedin' => array(
                'key' => 'linkedin_url',
                'icon' => td_get_svg('social-icons/linkedin.svg'),
            ),
            'pinterest' => array(
                'key' => 'pinterest_url',
                'icon' => td_get_svg('social-icons/pinterest.svg'),
            ),
            'youtube' => array(
                'key' => 'youtube_url',
                'icon' => td_get_svg('social-icons/youtube.svg'),
            ),
            'googleplus' => array(
                'key' => 'google_plus_url',
                'icon' => '',
            )
        );

        return $options;
    }


}
