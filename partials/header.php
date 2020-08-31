<header class="header w-full z-30 top-0 p-4 md:px-0 bg-gray-300 text-gray-800"
    x-data="{ isOpen: false }">
    <div class="container flex">
        <div class="logo" itemscope itemtype="http://schema.org/Organization">
            <a itemprop="url" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Return Home">
                <?php
                if (has_custom_logo()) :
                    $customLogoId = get_theme_mod('custom_logo');
                    $imageMarkup = wp_get_attachment_image($customLogoId , 'full');
                    echo $imageMarkup;
                else :
                    echo '<span>'. get_bloginfo('name') . '</span>';
                endif;
                ?>
                <span class="sr-only"><?php echo get_bloginfo('name'); ?></span>
            </a>
        </div>
        <button
            @click="isOpen = !isOpen"
            class="btn--menu" aria-controls="nav-primary" :aria-expanded="!isOpen ? false : true" aria-label="<?php esc_html_e('Toggle Menu', '@textdomain'); ?>">
            <span x-text="!isOpen ? 'Menu' : 'Close'"></span>
        </button>

    </div>
    <nav class="container mt-4"
        x-cloak
        x-show.transition.opacity="isOpen"
        @click.away="isOpen = false"
    >
    <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary_navigation',
                'container'      => '',
                'container_id'   => 'nav-primary',
                'depth'          => 5,
                'menu_class'     => ''
            )
        );
        ?>
    </nav>
</header>
