<?php

namespace App\Admin;

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
        // add_action('admin_init', [$this, 'adminStyle'], 100);
        // add_action('admin_init', [$this, 'adminScript'], 100);
        // add_action('wp_enqueue_scripts', [$this, 'removeBlockCSS'], 100);
        // add_action('enqueue_block_editor_assets', [$this, 'blockEditorStyle'], 1, 1);
        // add_action('enqueue_block_editor_assets', [$this, 'blockEditorScript'], 1, 1);
        // add_action('admin_init', [$this, 'classicEditorStyle'], 100);
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
}
