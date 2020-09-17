<?php
/**
 * Social_Links class file for customizer
 *
 * @package cleaner
 */

namespace Theme\Customizer\Sections\Theme_Options;

use Theme\Customizer\Panels\Theme_Options;

class Social_Links extends Theme_Options {
    protected $section     = 'theme_social_links';
    protected $option_name = 'theme_social_links';

    public function __construct() {
        //Load section & fields
        $this->register_section();
        $this->register_fields();
    }

    public function register_section() {
        \Kirki::add_section( $this->section, [
            'title'    => esc_html__( 'Social Links', 'cleaner' ),
            'panel'    => $this->panel,
            'priority' => 160,
        ] );
    }

    public function register_fields() {
        \Kirki::add_field( $this->config, [
            'type'        => 'text',
            'settings'    => 'facebook',
            'label'       => __( 'Facebook link', 'cleaner' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'priority'    => 10,
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'text',
            'settings'    => 'twitter',
            'label'       => __( 'Twitter link', 'cleaner' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'priority'    => 10,
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'text',
            'settings'    => 'dribbble',
            'label'       => __( 'Dribbble link', 'cleaner' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'priority'    => 10,
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'text',
            'settings'    => 'github',
            'label'       => __( 'Github link', 'cleaner' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'priority'    => 10,
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'text',
            'settings'    => 'pinterest',
            'label'       => __( 'Pinterest link', 'cleaner' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'priority'    => 10,
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'text',
            'settings'    => 'phone',
            'label'       => __( 'Phone number', 'cleaner' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'priority'    => 10,
        ] );

        \Kirki::add_field( $this->config, [
            'type'        => 'text',
            'settings'    => 'email',
            'label'       => __( 'Email address', 'cleaner' ),
            'section'     => $this->section,
            'option_name' => $this->option_name,
            'priority'    => 10,
        ] );
    }

}