<?php
/**
 * Kirki Setup class file
 *
 * @package cleaner
 */

namespace Theme\Customizer;

use Theme\Customizer\Panels\Theme_Options;
use Theme\Traits\Singleton;
use \Theme\Customizer\Panels\Front_Page;

class Customizer {
    protected $config = 'customizer_config';
    use Singleton;

    public function __construct() {
        if ( !class_exists( 'Kirki' ) ) {
            return;
        }
        //Load the class methods
        $this->setup_config();
        $this->load_panels();
        $this->load_sections();
    }

    public function setup_config() {
        \Kirki::add_config( $this->config, [
            'capability'  => 'edit_theme_options',
            'option_type' => 'option',
        ] );
    }

    public function load_panels() {
        //Load Panels
        Theme_Options::get_instance();
        Front_Page::get_instance();
    }

    public function load_sections() {
        
        //Load theme option sections
        \Theme\Customizer\Sections\Theme_Options\Typography::get_instance();
        \Theme\Customizer\Sections\Theme_Options\Social_Links::get_instance();

        //Load front page sections
        \Theme\Customizer\Sections\Front_Page\Sortable::get_instance();
        \Theme\Customizer\Sections\Front_Page\Hero::get_instance();
        \Theme\Customizer\Sections\Front_Page\Work::get_instance();
        \Theme\Customizer\Sections\Front_Page\Cta::get_instance();
        \Theme\Customizer\Sections\Front_Page\Choose_Us::get_instance();
        \Theme\Customizer\Sections\Front_Page\Cleaners::get_instance();
        \Theme\Customizer\Sections\Front_Page\Reviews::get_instance();
    }

}