<?php
/**
 * Page template
 * php version 7.0.0
 *
 * @category Theme
 * @package  MountainGoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/ WTFPL
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 **/
while (have_posts()) :
    the_post();
    get_template_part('partials/page', 'content');
endwhile;
