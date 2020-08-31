<?php
if (function_exists('yoast_breadcrumb') && !is_home()) {
    yoast_breadcrumb('<div class="breadcrumbs container p-4 md:px-0 prose"><div class="prose-sm">', '</div></div>');
}
