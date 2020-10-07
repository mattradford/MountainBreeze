<?php

namespace App\Admin;

/**
 * Add custom CSS properties to block editor colour palette
 *
 * @todo Tailwind CSS
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 */
class EditorFontSizes
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->addFontSizes();
    }

    /**
     * Set the custom font sizes for text-based blocks
     *
     * @return void
     */
    public function addFontSizes()
    {
        add_theme_support(
            'editor-font-sizes',
            [
                [
                    'name'  => __('Small', '@textdomain'),
                    'slug'  => 'small',
                    'size' => 12
                ],
                [
                    'name'  => __('Normal', '@textdomain'),
                    'slug'  => 'normal',
                    'size' => 16
                ],
                [
                    'name'  => __('Large', '@textdomain'),
                    'slug'  => 'large',
                    'size' => 24
                ]
            ]
        );
    }
}
