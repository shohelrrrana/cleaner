<?php
/**
 * Calculate class file for customizer
 *
 * @package cleaner
 */

namespace Theme\Customizer\Sections\Front_Page;

use Theme\Customizer\Panels\Front_Page;

class Calculate extends Front_Page {
    protected $section     = 'front_page_calculate_section';
    protected $option_name = 'front_page_calculate_section';

    public function __construct() {
        //Load the class methods
        $this->register_section();
        $this->register_fields();
    }

    public function register_section() {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Calculate Section', 'cleaner' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields() {
        \Kirki::add_field( $this->config, [
            'type'      => 'background',
            'settings'  => 'front_page_calculate_section_background',
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
                    'element' => '#calculate',
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'text',
            'settings'        => 'section_title',
            'label'           => esc_html__( 'Section title', 'cleaner' ),
            'section'         => $this->section,
            'priority'        => 10,
            'default'         => esc_html__( "Cleaning Cost Calculator", 'cleaner' ),
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'section_title' => [
                    'selector'        => '#calculate .section-title',
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
            'default'         => esc_html__( "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate vero esse ea hic quod veniam quam accusamus laboriosam ipsam provident.", 'cleaner' ),
            'partial_refresh' => [
                $this->section . 'section_description' => [
                    'selector'        => '#calculate .section-description',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['section_description'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'         => 'repeater',
            'label'        => esc_html__( 'Features', 'cleaner' ),
            'section'      => $this->section,
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'field' => 'feature',
            ],
            'button_label' => esc_html__( '"Add new', 'cleaner' ),
            'settings'     => 'features',
            'option_name'  => $this->option_name,
            'fields'       => [
                'feature' => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Feature text', 'cleaner' ),
                ],
            ],
            'partial_refresh' => [
                $this->section . 'features' => [
                    'selector'        => '#calculate .features',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['features'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'         => 'repeater',
            'label'        => esc_html__( 'Pricing FAQs', 'cleaner' ),
            'section'      => $this->section,
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'field' => 'title',
            ],
            'button_label' => esc_html__( '"Add new', 'cleaner' ),
            'settings'     => 'pricing_faqs',
            'option_name'  => $this->option_name,
            'fields'       => [
                'title' => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Title', 'cleaner' ),
                ],
                'description' => [
                    'type'        => 'textarea',
                    'label'       => esc_html__( 'Description', 'cleaner' ),
                ],
            ],
            'partial_refresh' => [
                $this->section . 'pricing_faqs' => [
                    'selector'        => '#calculate .pricing-faqs',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['pricing_faqs'];
                    },
                ],
            ],
        ] );
    }

}