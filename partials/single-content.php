<?php
/**
 * Template part for displaying post content in single.php
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 **/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('container p-4 md:px-0 prose'); ?>>
    <?php get_template_part('partials/single', 'header'); ?>
    <section>
        <?php the_content(); ?>
    </section>
</article>
