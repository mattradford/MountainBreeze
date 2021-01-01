<?php
/**
 * Numeric page navigation, adapted from Bones.
 *
 * @category Theme
 * @package  MountainGoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/ WTFPL
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 * @return   void
 */
function mgPagination()
{
    global $wp_query;
    $bignum = 999999999;
    if ($wp_query->max_num_pages <= 1) {
        return;
    }

    echo '<nav class="pagination container content">';

    echo paginate_links(
        array(
            'base' => str_replace($bignum, '%#%', esc_url(get_pagenum_link($bignum))),
            'format' => '',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'prev_text' => '&larr;',
            'next_text' => '&rarr;',
            'type' => 'list',
            'end_size' => 3,
            'mid_size' => 3,
        )
    );

    echo '</nav>';
}
