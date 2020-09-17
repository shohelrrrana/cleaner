<?php
/**
 * Banner class file for customizer
 *
 * @package cleaner
 */

namespace Theme\Customizer\Sections\Theme_Options;

use Theme\Customizer\Panels\Theme_Options;

class Typography extends Theme_Options {
    protected $section     = 'typography_section';
    protected $option_name = 'typography_section';

    public function __construct() {
        //Load section & fields
        $this->register_section();
        $this->register_fields();
    }

    public function register_section() {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Typography', 'cleaner' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields() {
        \Kirki::add_field( $this->config, [
            'type'      => 'typography',
            'settings'  => 'body_typography',
            'label'     => __( 'Body Text', 'cleaner' ),
            'section'   => $this->section,
            'priority'  => 10,
            'default'   => [
                'font-family'    => 'Roboto',
                'variant'        => 'regular',
                'font-size'      => '14px',
                'line-height'    => '1.5',
                'letter-spacing' => '0',
                'color'          => '#333333',
                'text-transform' => 'none',
            ],
            'transport' => 'auto',
            'output'    => [
                [
                    'element' => 'body',
                ],
            ],
        ] );

        \Kirki::add_field( $this->config, [
            'type'      => 'typography',
            'settings'  => 'heading_typography',
            'label'     => __( 'Heading text', 'cleaner' ),
            'section'   => $this->section,
            'priority'  => 10,
            'default'   => [
                'font-family'    => 'Roboto',
                'variant'        => 'regular',
                'line-height'    => '1.1',
                'letter-spacing' => '0',
                'color'          => '#333333',
                'text-transform' => 'none',
                'text-align'     => 'left',
            ],
            'transport' => 'auto',
            'output'    => [
                [
                    'element' => ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
                ],
            ],
        ] );

    }

}