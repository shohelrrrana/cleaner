<?php
/**
 * Cleaning_Books_Table class for Cleaning Books Table
 *
 * @package cleaner
 */

namespace Theme\Database;

use Theme\Traits\Singleton;

class Cleaning_Books {
    use Singleton;
    public static $table_name;

    public function __construct() {
        global $wpdb;
        self::$table_name = $wpdb->prefix . 'cleaning_books';
        $this->create_table();
    }

    public function create_table() {
        global $wpdb;

        $query = $wpdb->prepare( 'SHOW TABLES LIKE %s', self::$table_name );

        if ( $wpdb->get_var( $query ) == self::$table_name ) {
            return;
        }

        $sql = "CREATE TABLE IF NOT EXISTS " . self::$table_name . " ( ";
        $sql .= "  `id`  int(11)   NOT NULL auto_increment, ";
        $sql .= "  `email`  varchar(128)   NOT NULL, ";
        $sql .= "  `phone`  varchar(128)   NOT NULL, ";
        $sql .= "  `service`  varchar(128)   NOT NULL, ";
        $sql .= "  `area`  varchar(128)   NOT NULL, ";
        $sql .= "  `location`  varchar(128)   NOT NULL, ";
        $sql .= "  `date_time`  varchar(128)   NOT NULL, ";
        $sql .= "  `created_at`  varchar(128)   NOT NULL, ";
        $sql .= "  PRIMARY KEY (`id`) ";
        $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ; ";
        if ( !function_exists( 'dbDelta' ) ) {
            require_once ABSPATH . '/wp-admin/includes/upgrade.php';
        }
        dbDelta( $sql );
    }

    public static function get_all( $args = [] ) {
        $defaults = [
            'per_page' => 20,
            'orderby'  => 'id',
            'order'    => 'desc',
            'offset'   => 0,
            'search'   => '',
        ];
        $args = wp_parse_args( $args, $defaults );
        global $wpdb;
        if ( $args['search'] ) {
            $data = $wpdb->get_results( "SELECT * FROM " . self::$table_name . " WHERE email LIKE '%{$args['search']}%' ORDER BY {$args['orderby']} {$args['order']} LIMIT {$args['per_page']} OFFSET {$args['offset']}" );
            return $data;
        } else {
            $data = $wpdb->get_results( "SELECT * FROM " . self::$table_name . " ORDER BY {$args['orderby']} {$args['order']} LIMIT {$args['per_page']} OFFSET {$args['offset']}" );
            return $data;
        }
    }

    public function get( $id ) {
        global $wpdb;
        $data = $wpdb->get_results( "SELECT * FROM " . self::$table_name . " WHERE id = {$id}" );
        return $data;
    }

    public static function insert( $data = [] ) {
        global $wpdb;
        if ( !empty( $data ) ) {
            $inserted = $wpdb->insert( self::$table_name, $data );
            if ( $inserted ) {
                return true;
            }
        }
        return false;
    }

    public static function delete( $id ) {
        global $wpdb;
        $deleted = $wpdb->query( "DELETE FROM " . self::$table_name . " WHERE id = {$id}" );
        if ( $deleted ) {
            return true;
        }
        return false;
    }

    public static function total() {
        global $wpdb;
        $total = $wpdb->get_var( "SELECT COUNT(*) FROM " . self::$table_name );
        return $total;
    }

}
