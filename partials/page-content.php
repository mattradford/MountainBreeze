<?php
/**
 * Template part for displaying page content in page.php
 *
 * @category Theme
 * @package  MountainGoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/ WTFPL
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 **/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('container content prose'); ?>>
    <header>
        <h1><?php the_title(); ?></h1>
    </header>
    <?php
    if (has_post_thumbnail()) {
        the_post_thumbnail('large');
    }
    ?>
    <section class="prose content clearfix">
        <?php the_content(); ?>
    </section>
</article>
