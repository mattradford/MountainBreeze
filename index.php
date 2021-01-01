<?php
/**
 * Index template
 * php version 7.0.0
 *
 * @category Theme
 * @package  MountainGoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/ WTFPL
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 **/
if (!have_posts()) :
    get_template_part('partials/no', 'content');
endif;

while (have_posts()) :
    the_post();
    get_template_part('partials/content');
endwhile;

if ($wp_query->max_num_pages > 1) {
    mgPagination();
}
