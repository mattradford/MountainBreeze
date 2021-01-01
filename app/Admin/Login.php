<?php

namespace App\Admin;

/**
 * Login page customisations
 *
 * @category Theme
 * @package  MountainGoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/ WTFPL
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 */
class Login
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_filter('login_headerurl', [$this, 'logoUrl']);
        add_filter('login_headertext', [$this, 'logoUrlTitle']);
        add_action('login_head', [$this, 'siteLogo']);
        add_action('login_footer', [$this, 'rememberMeChecked']);
    }

    /**
     * Change login link. Note home_url not site_url
     *
     * @return string $url Home URL
     */
    public function logoUrl()
    {
        return home_url();
    }

    /**
     * Logo title login page
     *
     * @return string $name Blog name
     */
    public function logoUrlTitle()
    {
        return get_bloginfo('name');
    }

    /**
     * Use site logo, if set
     *
     * @return void
     */
    public function siteLogo()
    {
        if (has_custom_logo()) :
            $customLogoId = get_theme_mod('custom_logo');
            $customLogoUrl = wp_get_attachment_image_url($customLogoId);
            ?>
            <style>
            .login h1 a {
                background-image: url(<?php echo $customLogoUrl; ?>);
                padding-bottom: 30px;
                width: 250px;
                background-size: cover;
            }
            </style>
            <?php
        endif;
    }

    /**
     * Make sure Remember Me is checked = fewer password resets!
     *
     * @return void
     */
    public function rememberMeChecked()
    {
        echo "<script>document.getElementById('rememberme').checked = true;</script>";
    }
}
