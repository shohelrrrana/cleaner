<?php
/**
 * Sortable class file for customizer
 *
 * @package cleaner
 */

namespace Theme\Customizer\Sections\Front_Page;

use Theme\Customizer\Panels\Front_Page;

class Sortable extends Front_Page {
	protected $section     = 'sortable_front_page_sections';

    public function __construct( ) {

        //Load section & fields
        $this->register_section();
        $this->register_fields();
    }

    public function register_section() {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Ordering and Visibility Sections', 'cleaner' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields() {
        \Kirki::add_field( $this->config, [
            'type'     => 'sortable',
            'settings' => 'sortable_front_page_sections',
            'label'    => esc_html__( 'Ordering and Visibility', 'cleaner' ),
            'section'  => $this->section,
            'priority' => 10,
            'default'  => [
                'work',
                'cta',
                'choose-us',
                'cleaners',
                'reviews',
            ],
            'choices'  => [
                'work' => esc_html__( 'Work Section', 'cleaner' ),
                'cta' => esc_html__( 'Cta Section', 'cleaner' ),
                'choose-us' => esc_html__( 'Choose Us Section', 'cleaner' ),
                'cleaners' => esc_html__( 'Cleaners Section', 'cleaner' ),
                'reviews' => esc_html__( 'Reviews Section', 'cleaner' ),
            ],
        ] );
    }

}