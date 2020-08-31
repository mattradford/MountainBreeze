<?php
/**
 * Single template
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 **/
while (have_posts()) :
    the_post();
    get_template_part('partials/single', 'content');
    get_template_part('partials/comments');
endwhile;
