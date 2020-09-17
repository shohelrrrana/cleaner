<?php
/**
 * Menu class file
 *
 * @package cleaner
 */

namespace Theme\Setup;
use Theme\Traits\Singleton;

class Menus {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //Actions & filters
        add_action( 'init', [$this, 'register_menus'] );
        //add_filter( 'nav_menu_css_class', [$this, 'add_class_to_all_menu_lists'] );
        //add_filter( 'nav_menu_link_attributes', [$this, 'add_class_to_all_menu_anchors'] );

    }

    public function register_menus() {
        register_nav_menus( [
            'primary-menu' => __( 'Primary Menu', 'cleaner' ),
            'footer-menu'  => __( 'Footer Menu', 'cleaner' ),
        ] );
    }

    public function add_class_to_all_menu_lists( $classes ) {
        $classes[] = 'nav-item';
        return $classes;
    }

    function add_class_to_all_menu_anchors( $atts ) {
        $atts['class'] = 'nav-link';
        return $atts;
    }

    public function get_child_menu_items( $menu_array, $parent_id ) {
        $child_menu_items = [];
        if ( !empty( $menu_array ) && is_array( $menu_array ) ) {
            foreach ( $menu_array as $menu ) {
                if ( intval( $menu->menu_item_parent ) === intval( $parent_id ) ) {
                    array_push( $child_menu_items, $menu );
                }
            }
        }
        return $child_menu_items;
    }
}