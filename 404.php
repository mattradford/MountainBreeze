<?php
/**
 * 404 template
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 **/
?>
<div class="wrapper">

    <?php
    get_template_part('partials/page', 'header');
    if ($option_text = get_option('options_404_error_page_text')) :
        esc_html_e($option_text);
    else :
        echo '<div>';
        esc_html_e('Sorry, that page does not exist.', '@textdomain');
        echo '</div>';
    endif;

    get_search_form();
    ?>

</div>
