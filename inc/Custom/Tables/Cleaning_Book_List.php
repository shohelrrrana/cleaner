<?php
/**
 * Cleaning_Books_Table class for Cleaning Books Table
 *
 * @package cleaner
 */

namespace Theme\Custom\Tables;

use Theme\Database\Cleaning_Books;
use Theme\Traits\Singleton;

if ( !class_exists( 'WP_List_Table' ) ) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
    require_once ABSPATH . 'wp-admin/includes/screen.php';
    require_once ABSPATH . 'wp-admin/includes/class-wp-screen.php';
    require_once ABSPATH . 'wp-admin/includes/template.php';
}

class Cleaning_Book_List extends \WP_List_Table {
    use Singleton;

    public function __construct() {
        parent::__construct( [
            'singular' => "Cleaning Books",
            'plural'   => "Cleaning Book",
            'ajax'     => false,
        ] );
        $this->prepare_items();
        $this->search_box( 'Search', 'search' );
        $this->get_bulk_actions();
        $this->display();
        $this->delete_column();
    }

    public function prepare_items() {
        $columns  = $this->get_columns();
        $hidden   = [];
        $sortable = $this->get_sortable_columns();

        $this->_column_headers = [$columns, $hidden, $sortable];

        $per_page     = 10;
        $current_page = $this->get_pagenum();
        $offset       = ( $current_page - 1 ) * $per_page;
        $args         = [
            'orderby'  => $_GET['orderby'] ?? 'id',
            'order'    => $_GET['order'] ?? 'desc',
            'per_page' => $per_page,
            'offset'   => $offset,
            'search'   => $_GET['s'] ?? '',
        ];

        $data        = Cleaning_Books::get_all( $args );
        $this->items = $data;

        $total_items = Cleaning_Books::total();
        $this->set_pagination_args( [
            'total_items' => $total_items,
            'per_page'    => $per_page,
        ] );
    }

    public function get_columns() {
        $columns = [
            'cb'         => '<input type="checkbox" />',
            'email'      => __( 'Email', 'cleaner' ),
            'phone'      => __( 'Phone', 'cleaner' ),
            'service'    => __( 'Service', 'cleaner' ),
            'area'       => __( 'Area', 'cleaner' ),
            'location'   => __( 'Loacation', 'cleaner' ),
            'date_time'  => __( 'Booking Date', 'cleaner' ),
            'created_at' => __( 'Date', 'cleaner' ),
        ];
        return $columns;
    }

    public function get_sortable_columns() {
        $sortable_columns = [
            'email'      => ['email', true],
            'created_at' => ['created_at', true],
        ];
        return $sortable_columns;
    }

    protected function column_default( $item, $column_name ) {
        if ( $column_name === 'created_at' ) {
            return date( 'dS M Y, h:m:i', $item->$column_name );
        }
        return isset( $item->$column_name ) ? $item->$column_name : '';
    }

    public function column_cb( $item ) {
        return sprintf(
            '<input type="checkbox" name="book_id[]", value="%s">',
            $item->email
        );
    }

    public function column_email( $item ) {
        $actions           = [];
        $actions['delete'] = sprintf(
            '<a href="%s" onclick="return confirm(\'Are you sure to delete?\')"><strong>Delete</strong></a>',
            admin_url( 'admin.php?page=cleaning-book-list&action=delete&id=' . $item->id )
        );
        return sprintf(
            '<strong>%s</strong>%s',
            $item->email, $this->row_actions( $actions )
        );
    }

    public function delete_column() {
        if ( isset( $_GET['action'] ) && isset( $_GET['id'] ) && $_GET['action'] == 'delete' ) {
            $id = intval( sanitize_text_field( $_GET['id'] ) );
            if ( Cleaning_Books::delete( $id ) ) {
                wp_redirect( admin_url( 'admin.php?page=cleaning-book-list&cleaning-book-deleted=true' ) );
                exit;
            } else {
                wp_redirect( admin_url( 'admin.php?page=cleaning-book-list&cleaning-book-deleted=false' ) );
                exit;
            }
        }
    }

    public function get_bulk_actions() {
        $actions = [
            'delete' => 'Delete',
        ];
        return $actions;
    }

}