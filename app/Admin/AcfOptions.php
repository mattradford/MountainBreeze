<?php

namespace App\Admin;

/**
 * ACF Options
 *
 * Hides ACF menu from unspecified users
 * Allows ACF licence to be defined
 *
 * @category Theme
 * @package  MountainGoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/ WTFPL
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 */
class AcfOptions
{
    /**
     * Define the email domains that are allowed access to
     * the acf settings in the dashboard
     *
     * @var array $allowedDomains Users with this domain in their
     * email will be allowed to view the ACF dashboard menu
     */
    private $allowedDomains = [
        'mattrad.co.uk',
        'mattrad.uk',
    ];

    /**
     * Constructor
     */
    public function __construct()
    {
        if (\class_exists('acf')) {
            add_action('admin_init', [$this, 'hideAcfFromMenu']);
            add_action('after_switch_theme', [$this, 'setLicenseKey']);
        }
    }

    /**
     * Hides ACF from menu
     *
     * Remove ACF from dashboard
     *
     * @return void
     */
    public function hideAcfFromMenu()
    {
        $current_user = wp_get_current_user();
        if ($this->notAllowedToSeeAcf($current_user)) {
            remove_menu_page('edit.php?post_type=acf-field-group');
        }
    }

    /**
     * Check if user is not allowed to see ACF menu
     *
     * Users that cannot see ACF menu
     *
     * @param WP_User $user User object
     *
     * @return bool
     */
    protected function notAllowedToSeeAcf($user)
    {
        $domain = $this->getDomainFromEmail($user->user_email);
        return !in_array($domain, $this->allowedDomains);
    }

    /**
     * Gets domain from email
     *
     * @param string $email Users email
     *
     * @return string Domain name of the email
     */
    protected function getDomainFromEmail($email)
    {
        return substr(strrchr($email, "@"), 1);
    }

    /**
     * Set ACF 5 license key on theme activation
     *
     * @return void;
     */
    public function setLicenseKey()
    {
        if (!get_option('acf_pro_license') && defined('ACF_5_KEY')) {
            $save = array(
                'key' => ACF_5_KEY,
                'url' => home_url()
            );
            $save = maybe_serialize($save);
            $save = base64_encode($save);
            update_option('acf_pro_license', $save);
        }
    }
}
