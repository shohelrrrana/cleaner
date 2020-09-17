<?php
/**
 * Post_Types class file for register custom post type
 *
 * @package cleaner
 */

namespace Theme\Custom;
use Theme\Traits\Singleton;

class Post_Types {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //Actions & filters
        //add_action( 'init', [$this, 'register_custom_post_types'], 0 );

    }

    public function register_custom_post_types() {
        // Register Custom Post Type Cleaning Book
        $labels = [
            'name'                  => _x( 'Cleaning Books', 'Post Type General Name', 'cleaner' ),
            'singular_name'         => _x( 'Cleaning Book', 'Post Type Singular Name', 'cleaner' ),
            'menu_name'             => _x( 'Cleaning Books', 'Admin Menu text', 'cleaner' ),
            'name_admin_bar'        => _x( 'Cleaning Book', 'Add New on Toolbar', 'cleaner' ),
            'archives'              => __( 'Cleaning Book Archives', 'cleaner' ),
            'attributes'            => __( 'Cleaning Book Attributes', 'cleaner' ),
            'parent_item_colon'     => __( 'Parent Cleaning Book:', 'cleaner' ),
            'all_items'             => __( 'All Cleaning Books', 'cleaner' ),
            'add_new_item'          => __( 'Add New Cleaning Book', 'cleaner' ),
            'add_new'               => __( 'Add New', 'cleaner' ),
            'new_item'              => __( 'New Cleaning Book', 'cleaner' ),
            'edit_item'             => __( 'Edit Cleaning Book', 'cleaner' ),
            'update_item'           => __( 'Update Cleaning Book', 'cleaner' ),
            'view_item'             => __( 'View Cleaning Book', 'cleaner' ),
            'view_items'            => __( 'View Cleaning Books', 'cleaner' ),
            'search_items'          => __( 'Search Cleaning Book', 'cleaner' ),
            'not_found'             => __( 'Not found', 'cleaner' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'cleaner' ),
            'featured_image'        => __( 'Featured Image', 'cleaner' ),
            'set_featured_image'    => __( 'Set featured image', 'cleaner' ),
            'remove_featured_image' => __( 'Remove featured image', 'cleaner' ),
            'use_featured_image'    => __( 'Use as featured image', 'cleaner' ),
            'insert_into_item'      => __( 'Insert into Cleaning Book', 'cleaner' ),
            'uploaded_to_this_item' => __( 'Uploaded to this Cleaning Book', 'cleaner' ),
            'items_list'            => __( 'Cleaning Books list', 'cleaner' ),
            'items_list_navigation' => __( 'Cleaning Books list navigation', 'cleaner' ),
            'filter_items_list'     => __( 'Filter Cleaning Books list', 'cleaner' ),
        ];
        $args = [
            'label'               => __( 'Cleaning Book', 'cleaner' ),
            'description'         => __( '', 'cleaner' ),
            'labels'              => $labels,
            'menu_icon'           => 'dashicons-email-alt',
            'supports'            => [],
            'taxonomies'          => [],
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 5,
            'show_in_admin_bar'   => false,
            'show_in_nav_menus'   => false,
            'can_export'          => false,
            'has_archive'         => false,
            'hierarchical'        => false,
            'exclude_from_search' => false,
            'show_in_rest'        => true,
            'publicly_queryable'  => false,
            'capability_type'     => 'post',
        ];
        register_post_type( 'Cleaning book', $args );

    }

}