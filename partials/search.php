<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x('Search for:', 'label'); ?></span>
        <input type="search" class="md:w-1/2 appearance-none border border-gray-700 rounded py-2 px-3 placeholder-current leading-tight placeholder-current focus:outline-none focus:ring" placeholder="<?php echo esc_attr_x('Type your search text', 'placeholder'); ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Type your search text', 'label') ?>" />
    </label>
    <input type="submit" class="mt-2 sm:mt-0 bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:ring" value="<?php echo esc_attr_x('Search', 'submit button'); ?>" />
</form>
