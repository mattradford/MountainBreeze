<?php
/**
 * Template part for post header in single.php
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 **/
?>
<header class="prose content">
    <h1><?php the_title(); ?></h1>
    <div class="meta">
        <?php echo __('Written by', '@textdomain'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></span> on <time class="published" datetime="<?php echo get_post_time('c', true); ?>"><?php echo get_the_date(); ?></time><span>&nbsp;
    </div>
</header>