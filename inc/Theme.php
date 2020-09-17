<?php
/**
 * Theme Main class file
 *
 * @package cleaner
 */

namespace Theme;

use Theme\Customizer\Customizer;
use Theme\Custom\Admin_Menus;
use Theme\Custom\Post_Types;
use Theme\Database\Cleaning_Books;
use Theme\Others\Form;
use Theme\Setup\Enqueue;
use Theme\Setup\Menus;
use Theme\Setup\Setup;
use Theme\Setup\Sidebars;

class Theme {
    static $boot;

    public function __construct() {
        //Load Methods
        $this->include_files();

        //Get Instance Classes
        Setup::get_instance();
        Enqueue::get_instance();
        Customizer::get_instance();
        Menus::get_instance();
        Sidebars::get_instance();
        Post_Types::get_instance();
        Cleaning_Books::get_instance();
        Form::get_instance();
        Admin_Menus::get_instance();
    }

    public function include_files() {
        require_once get_template_directory() . '/inc/Helpers/helper.php';
        require_once get_template_directory() . '/inc/Helpers/template-tags.php';
        require_once get_template_directory() . '/inc/Plugins/Kirki_Installer_Section.php';
        require_once get_template_directory() . '/inc/Helpers/plugin_activation.php';
        require_once get_template_directory() . '/demo-data/demo-data.php';
    }

    static public function boot() {
        if ( !static::$boot ) {
            static::$boot = new Theme();
        }
        return static::$boot;
    }
}