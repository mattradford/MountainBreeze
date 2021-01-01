<?php
/**
 * Base template
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
<!doctype html>

<html class="no-js" <?php language_attributes(); ?>>

    <?php get_template_part('partials/head'); ?>

    <body <?php body_class(); ?>>

        <?php wp_body_open(); ?>

        <a href="#main" class="sr-only"><?php esc_html_e('Skip to main content', '@textdomain'); ?></a>
        <a href="#footer" class="sr-only"><?php esc_html_e('Skip to footer', '@textdomain'); ?></a>

        <?php
            do_action('get_header');
            get_template_part('partials/header');
        ?>

        <main id="main">
            <?php
                get_template_part('partials/breadcrumbs');
                require \App\Theme\BaseWrapper::$main_template;
            ?>
        </main>

        <?php get_template_part('partials/footer'); ?>

    </body>

</html>
