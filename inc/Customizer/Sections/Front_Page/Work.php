<?php
/**
 * Work class file for customizer
 *
 * @package cleaner
 */

namespace Theme\Customizer\Sections\Front_Page;

use Theme\Customizer\Panels\Front_Page;

class Work extends Front_Page {
    protected $section     = 'front_page_work_section';
    protected $option_name = 'front_page_work_section';

    public function __construct() {
        //Load the class methods
        $this->register_section();
        $this->register_fields();
    }

    public function register_section() {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Work Section', 'cleaner' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields() {
        \Kirki::add_field( $this->config, [
            'type'      => 'background',
            'settings'  => 'front_page_work_section_background',
            'label'     => esc_html__( 'Set section background', 'cleaner' ),
            'section'   => $this->section,
            'priority'  => 10,
            'default'   => [
                'background-color'      => '#fff',
                'background-repeat'     => 'no-repeat',
                'background-position'   => 'center center',
                'background-size'       => 'cover',
                'background-attachment' => 'scroll',
            ],
            'transport' => 'auto',
            'output'    => [
                [
                    'element' => '#work',
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'text',
            'settings'        => 'section_title',
            'label'           => esc_html__( 'Section title', 'cleaner' ),
            'section'         => $this->section,
            'priority'        => 10,
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'section_title' => [
                    'selector'        => '#work .section-title',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['section_title'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'editor',
            'settings'        => 'section_description',
            'label'           => esc_html__( 'Section description', 'cleaner' ),
            'section'         => $this->section,
            'priority'        => 10,
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'section_description' => [
                    'selector'        => '#work .section-description',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['section_description'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'         => 'repeater',
            'label'        => esc_html__( 'Work items', 'cleaner' ),
            'section'      => $this->section,
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'field' => 'title',
            ],
            'button_label' => esc_html__( '"Add new', 'cleaner' ),
            'settings'     => 'work_items',
            'option_name'  => $this->option_name,
            'fields'       => [
                'image' => [
                    'type'        => 'image',
                    'label'       => esc_html__( 'Image', 'cleaner' ),
                ],
                'title' => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Title', 'cleaner' ),
                ],
                'description'  => [
                    'type'        => 'textarea',
                    'label'       => esc_html__( 'Description', 'cleaner' ),
                ],
            ],
            'partial_refresh' => [
                $this->section . 'work_items' => [
                    'selector'        => '#work .work-items',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['work_items'];
                    },
                ],
            ],
        ] );
    }

}