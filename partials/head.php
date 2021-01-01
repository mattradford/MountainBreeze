<?php
/**
 * Template part for <head>
 *
 * @category Theme
 * @package  MountainGoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/ WTFPL
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 **/
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <link rel="alternate" type="application/rss+xml" title="<?php esc_html_e(get_bloginfo('name')); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
</head>
