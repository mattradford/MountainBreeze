<?php
/**
 * Template part for the footer
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 **/
?>
<footer class="footer bg-gray-300 border-t p-4 md:px-0" role="contentinfo">
    <?php if (has_nav_menu('footer_navigation')) {
        wp_nav_menu(
            [
            'container'      => 'nav',
            'container_class'      => 'nav -footer container',
            'container_id'   => 'nav-footer',
            'theme_location' => 'footer_navigation',
            'depth' => 1
            ]
        );
    } ?>
    <div id="footer" class="copyright container">
        <p><?php echo '&copy;&nbsp;2009 - ' . date('Y') . '&nbsp;' . get_bloginfo('name'); ?>.</p>
        <p><?php esc_html_e('Mountain Goat by', '@textdomain'); ?>&nbsp;<a href="https://mattrad.uk" rel="nofollow"><?php esc_html_e('Matt Radford', '@textdomain'); ?>.</a></p>
    </div>
</footer>

<?php wp_footer();
