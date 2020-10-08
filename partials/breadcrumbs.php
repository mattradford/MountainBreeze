<?php
/**
 * Yoast breadcrumbs
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 **/
if (function_exists('yoast_breadcrumb') && !is_home()) {
    yoast_breadcrumb('<div class="breadcrumbs container content prose"><div class="prose-sm">', '</div></div>');
}
