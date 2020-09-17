<?php
/**
 * Post_Types class file for register custom post type
 *
 * @package cleaner
 */

namespace Theme\Custom;
use Theme\Traits\Singleton;

class Admin_Menus {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //Actions & filters
        add_action( 'admin_menu', [$this, 'register_cleaning_books_page'] );
    }

    public function register_cleaning_books_page() {
        add_menu_page(
            'Cleaning Books',
            'Cleaning Books',
            'manage_options',
            'cleaning-book-list',
            function () {
                include_once THEME_PATH . '/inc/views/cleaning-book-list.php';
            },
            'dashicons-admin-multisite'
        );
    }

}