<?php
/**
 * Template part when there is no content
 *
 * Used in index.php and 404.php
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 **/
?>
<div class="alert">
    <p><?php _e('Sorry, nothing was found. Try a search?', '@textdomain'); ?></p>
</div>
<?php get_search_form();
