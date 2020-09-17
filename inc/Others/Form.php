<?php
/**
 * Form class file for handle all form
 *
 * @package cleaner
 */

namespace Theme\Others;

use Theme\Database\Cleaning_Books;
use Theme\Traits\Singleton;

class Form {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //Actions
        add_action( 'wp_ajax_cleaning_book_action', [$this, 'cleaning_book_form'] );
        add_action( 'wp_ajax_nopriv_cleaning_book_action', [$this, 'cleaning_book_form'] );
    }

    public function response( $type, $message ) {
        $response = [
            'type'    => $type,
            'message' => __( $message, 'cleaner' ),
        ];
        return json_encode( $response );
    }

    public function cleaning_book_form() {
        if ( !wp_verify_nonce( $_POST['_wpnonce'], 'cleaning_book_action' ) ) {
            echo $this->response( 'danger', 'The request is illigel.' );
            die;
        }
        $service   = filter_input( INPUT_POST, 'service', FILTER_SANITIZE_STRING );
        $location  = filter_input( INPUT_POST, 'location', FILTER_SANITIZE_STRING );
        $date_time = filter_input( INPUT_POST, 'date-time', FILTER_SANITIZE_STRING );
        $area      = filter_input( INPUT_POST, 'area', FILTER_SANITIZE_STRING );
        $email     = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_STRING );
        $phone     = filter_input( INPUT_POST, 'phone', FILTER_SANITIZE_STRING );

        if ( empty( $service ) || empty( $location ) || empty( $date_time ) || empty( $area ) || empty( $email ) || empty( $phone ) ) {
            echo $this->response( 'danger', 'Please filled out all fields.' );
            die;
        }

        $data = [
            'email'      => $email,
            'phone'      => $phone,
            'service'    => $service,
            'area'       => $area,
            'location'   => $location,
            'date_time'  => $date_time,
            'created_at' => time(),
        ];

        if ( Cleaning_Books::insert( $data ) ) {
            echo $this->response( 'success', 'Successfully received your message and will get back to you as soon as possible.' );
            die;
        }
        echo $this->response( 'danger', 'Something went wrong' );
        die;
    }
}