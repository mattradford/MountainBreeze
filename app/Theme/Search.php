<?php

namespace App\Theme;

 /**
  * Search template
  *
  * @category Theme
  * @package  MountainGoat
  * @author   Matt Radford <matt@mattrad.uk>
  * @license  http://www.wtfpl.net/about/ WTFPL
  * @link     https://github.com/mattradford/mountaingoat
  * @since    1.0.0
  */
class Search
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_filter('get_search_form', [$this, 'setSearchTemplate']);
    }

    /**
     * Use searchform.php from the templates/ directory
     *
     * @param string $form A form
     *
     * @return string $form
     */
    public function setSearchTemplate($form)
    {
        $form = '';
        locate_template('/partials/search.php', true, false);
        return $form;
    }
}
