<?php

namespace App\Admin;

/**
 * Add a menu page for reusable blocks.
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 */
class ReusableBlockMenu
{
    /**
     * The name used on the edit page.
     *
     * @var string
     */
    public $page_title = 'Reusable Blocks';


    /**
     * The name used in the menu.
     *
     * @var string
     */
    public $menu_title = 'Reusable Blocks';


    /**
     * The dashicon used in the menu.
     *
     * @var string
     */
    public $icon = 'dashicons-controls-repeat';


    /**
     * Add the admin menu action.
     */
    public function __construct()
    {
        add_action('admin_menu', [$this, 'addMenuPage']);
    }


    /**
     * Add the reuseable blocks page to the menu.
     *
     * @return void
     */
    public function addMenuPage()
    {
        add_menu_page($this->page_title, $this->menu_title, 'edit_posts', 'edit.php?post_type=wp_block', '', $this->icon, 1);
    }
}
