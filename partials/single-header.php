<?php
/**
 * Template part for post header in single.php
 *
 * @category Theme
 * @package  MountainGoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/ WTFPL
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 **/
?>
<header class="prose content">
    <h1><?php the_title(); ?></h1>
    <div class="meta">
        <span><?php echo __('Written by', '@textdomain'); ?></span>
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn">
            <?php echo get_the_author(); ?>
        </a>
        <span><?php echo __('on', '@textdomain'); ?></span>
        <time class="published" datetime="<?php echo get_post_time('c', true); ?>">
        <?php echo get_the_date(); ?>
        </time>
    </div>
    <?php
    if (has_post_thumbnail()) {
        the_post_thumbnail('large');
    }
    ?>
</header>