<?php
/**
 * Template part for displaying post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('container p-4 md:px-0 prose'); ?>>
    <?php get_template_part('partials/single', 'header'); ?>
    <section>
        <?php the_content(); ?>
    </section>
</article>
