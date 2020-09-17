<?php
/**
 * Reviews class file for customizer
 *
 * @package cleaner
 */

namespace Theme\Customizer\Sections\Front_Page;

use Theme\Customizer\Panels\Front_Page;

class Reviews extends Front_Page {
    protected $section     = 'front_page_reviews_section';
    protected $option_name = 'front_page_reviews_section';

    public function __construct() {
        //Load the class methods
        $this->register_section();
        $this->register_fields();
    }

    public function register_section() {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Reviews Section', 'cleaner' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields() {
        \Kirki::add_field( $this->config, [
            'type'      => 'background',
            'settings'  => 'front_page_reviews_section_background',
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
                    'element' => '#reviews',
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'      => 'image',
            'settings'  => 'section_image',
            'label'     => esc_html__( 'Set section image', 'cleaner' ),
            'section'   => $this->section,
            'priority'  => 10,
            'option_name'     => $this->option_name,
            'transport' => 'auto',
            'output'    => [
                [
                    'element' => '#reviews .section-image',
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
                    'selector'        => '#reviews .section-title',
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
                    'selector'        => '#reviews .section-description',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['section_description'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'text',
            'settings'        => 'total_completed',
            'label'           => esc_html__( 'Total Completed', 'cleaner' ),
            'section'         => $this->section,
            'priority'        => 10,
            'option_name'     => $this->option_name,
            'default'         => esc_html__( "1100+", 'cleaner' ),
            'partial_refresh' => [
                $this->section . 'total_completed' => [
                    'selector'        => '#reviews .total-completed',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['total_completed'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'textarea',
            'settings'        => 'completed_description',
            'label'           => esc_html__( 'Completed description', 'cleaner' ),
            'section'         => $this->section,
            'priority'        => 10,
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'completed_description' => [
                    'selector'        => '#reviews .completed-description',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['completed_description'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'text',
            'settings'        => 'total_review_rating',
            'label'           => esc_html__( 'Total review rating', 'cleaner' ),
            'section'         => $this->section,
            'priority'        => 10,
            'option_name'     => $this->option_name,
            'default'         => esc_html__( "4.9/5.0", 'cleaner' ),
            'partial_refresh' => [
                $this->section . 'total_review_rating' => [
                    'selector'        => '#reviews .total-review-rating',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['total_review_rating'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'            => 'textarea',
            'settings'        => 'review_rating_description',
            'label'           => esc_html__( 'Completed description', 'cleaner' ),
            'section'         => $this->section,
            'priority'        => 10,
            'option_name'     => $this->option_name,
            'partial_refresh' => [
                $this->section . 'review_rating_description' => [
                    'selector'        => '#reviews .review-rating-description',
                    'render_callback' => function () {
                        return get_option( $this->option_name )['review_rating_description'];
                    },
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'         => 'repeater',
            'label'        => esc_html__( 'reviews', 'cleaner' ),
            'section'      => $this->section,
            'priority'     => 10,
            'row_label'    => [
                'type'  => 'field',
                'field' => 'name',
            ],
            'button_label' => esc_html__( '"Add new', 'cleaner' ),
            'settings'     => 'reviews',
            'option_name'  => $this->option_name,
            'fields'       => [
                'image' => [
                    'type'        => 'image',
                    'label'       => esc_html__( 'Image', 'cleaner' ),
                ],
                'name' => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Name', 'cleaner' ),
                ],
                'company' => [
                    'type'        => 'text',
                    'label'       => esc_html__( 'Company', 'cleaner' ),
                ],
                'description' => [
                    'type'        => 'textarea',
                    'label'       => esc_html__( 'Description', 'cleaner' ),
                ],
            ],
        ] );
    }

}