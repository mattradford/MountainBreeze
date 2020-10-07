<?php

namespace App\Admin;

/**
 * ACFImporter
 *
 * Add a page to import ACF fields, based on their group key
 * This allows you to go from PHP-defined field groups back to groups
 * that can be edited in the ACF UI.
 *
 * @category Theme
 * @package  mattradford/mountaingoat
 * @author   Matt Radford <matt@mattrad.uk>
 * @license  http://www.wtfpl.net/about/
 * @link     https://github.com/mattradford/mountaingoat
 * @since    1.0.0
 */
class AcfImporter
{
    /**
     * Page Name in URL
     *
     * @var string
     */
    public $pageName = 'acf-importer';

    /**
     * Name of the page the importer is housed under
     *
     * @var string
     */
    public $parentPage = 'edit.php?post_type=acf-field-group';

    /**
     * Constructor
     */
    public function __construct()
    {
        if (\class_exists('acf')) {
            add_action('admin_menu', [$this, 'addPage']);
        }
    }

    /**
     * Add the page to the WordPress admin area under "Tools"
     *
     * @return void
     */
    public function addPage()
    {
        if (function_exists('acf_add_local_field_group')) {
            add_submenu_page(
                $this->parentPage,
                "Field Group Importer",
                "Field Group Importer",
                'manage_options',
                $this->pageName,
                array($this, 'create_admin_page')
            );
        }
    }


    /**
     * Import an ACF field Group
     *
     * @param string $key An ACF field group key
     *
     * @return array        Imported field group
     */
    public function importFieldGroup($key)
    {
        $group = acf_get_local_field_group($key);

        $fields = acf_get_fields($group['key']); // Get the groups fields - recursively

        $group['fields'] = $fields;

        // Setting the ID tells the importer that the group already exists
        $post = acf_get_field_group_post($key);
        if ($post) {
            $group['ID'] = $post->ID;
        }

        $fieldGroup = acf_import_field_group($group);

        return $fieldGroup;
    }

    /**
     * Create the page
     *
     * @return void
     */
    public function create_admin_page()
    {
        $notice = "";
        $key = $_POST['group_key'];

        if (!$key) {
            $notice = "Please enter an ACF field group key.";
        } elseif (!acf_get_field_group($key)) {
            $notice = "ACF field group key isn't valid.";
        } else {
            $fieldGroup = $this->importFieldGroup($key);
            $notice = 'ACF field group "' . $fieldGroup['title'] . '" imported.';
        }

        ?>
        <div class="wrap">
            <h1>ACF Field Group Importer</h1>
            <div id="col-left">
                <div class="col-wrap">
                    <form method="post" action="<?php echo $this->parentPage . '&page=' . $this->pageName ?>">
                        <div class="form-wrap">
                            <div class="form-field">
                                <label for="group_key">ACF Field Group Key</label>
                                <input type="text" name="group_key" id="group_key">
                            </div>
                            <p class="submit">
                                <button class="button button-primary">Import</button>
                            </p>
                            <p><?php echo $notice; ?></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
}
