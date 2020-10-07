<?php

namespace App\Admin;

/**
 * Rearrange the admin menu items
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 */
class MenuOrder
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_filter('custom_menu_order', '__return_true');
        add_filter('menu_order', [$this, 'moveMenuItems']);
    }

    /**
     * Set the new admin menu item order
     *
     * @return array List of menu items in their new order
     */
    public function moveMenuItems()
    {
        return array(
            'index.php',
            'separator1',
            'wpengine-common',
            'edit.php?post_type=page',
            'edit.php'
        );
    }
}
