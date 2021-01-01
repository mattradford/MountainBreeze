<?php
/**
 * 404 template
 * php version 7.0.0
 *
 * @category Theme
 * @package  MountainGoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/ WTFPL
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 **/
?>
<div class="content">

    <?php
    get_template_part('partials/page', 'header');
    if ($option_text = get_option('options_404_error_page_text')) :
        esc_html_e($option_text);
    else :
        get_template_part('partials/no', 'content');
    endif;
    ?>

</div>
