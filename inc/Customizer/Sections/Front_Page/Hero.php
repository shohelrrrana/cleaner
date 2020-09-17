<?php
/**
 * Hero class file for customizer
 *
 * @package cleaner
 */

namespace Theme\Customizer\Sections\Front_Page;

use Theme\Customizer\Panels\Front_Page;

class Hero extends Front_Page {
    protected $section     = 'front_page_hero_section';
    protected $option_name = 'front_page_hero_section';

    public function __construct() {
        //Load the class methods
        $this->register_section();
        $this->register_fields();
    }

    public function register_section() {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Hero Section', 'cleaner' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields() {
        \Kirki::add_field( $this->config, [
            'type'            => 'toggle',
            'settings'        => 'display_front_page_hero_section',
            'label'           => esc_html__( 'Display Hero Section', 'cleaner' ),
            'section'   => $this->section,
            'priority'        => 10,
            'default'         => 1,
        ] );

        \Kirki::add_field( $this->config, [
            'type'      => 'background',
            'settings'  => 'front_page_hero_section_background',
            'label'     => esc_html__( 'Set section background', 'cleaner' ),
            'section'   => $this->section,
            'priority'  => 10,
            'default'   => [
                'background-color'      => '#ddd',
                'background-repeat'     => 'no-repeat',
                'background-position'   => 'center center',
                'background-size'       => 'cover',
                'background-attachment' => 'scroll',
            ],
            'transport' => 'auto',
            'output'    => [
                [
                    'element' => '#hero',
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
                    'selector'        => '#hero .section-title',
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
                    'selector'        => '#hero .section-description',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['section_description'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'text',
            'settings'        => 'form_btn_title',
            'label'           => esc_html__( 'Form button title', 'cleaner' ),
            'section'         => $this->section,
            'priority'        => 10,
            'default'         => esc_html__( "Book Now", 'cleaner' ),
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'form_btn_title' => [
                    'selector'        => '#hero form .btn',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['form_btn_title'];
                    },
                ],
            ],
        ] );
    }

}