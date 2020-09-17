<?php
/**
 * Sidebars class file
 *
 * @package cleaner
 */

namespace Theme\Setup;
use Theme\Traits\Singleton;

class Sidebars {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    public function setup_hooks() {
        //Action
        add_action( 'widgets_init', [$this, 'register_sidebars'] );
    }

    public function register_sidebars() {
        register_sidebar( [
            'name'          => __( 'Shop Sidebar', 'cleaner' ),
            'id'            => 'shop-sidebar',
            'description'   => __( 'Widgets in this area will be shown on shop page.', 'cleaner' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
        ] );
        register_sidebar( [
            'name'          => __( 'Blog Sidebar', 'cleaner' ),
            'id'            => 'blog-sidebar',
            'description'   => __( 'Widgets in this area will be shown on blog page.', 'cleaner' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
        ] );

        register_sidebar( [
            'name'          => __( 'Header top', 'cleaner' ),
            'id'            => 'header-top',
            'description'   => __( 'Widgets in this area will be shown on header top left', 'cleaner' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer #1', 'cleaner' ),
            'id'            => 'footer-1',
            'description'   => __( 'Widgets in this area will be shown on footer area', 'cleaner' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer #2', 'cleaner' ),
            'id'            => 'footer-2',
            'description'   => __( 'Widgets in this area will be shown on footer area', 'cleaner' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer #3', 'cleaner' ),
            'id'            => 'footer-3',
            'description'   => __( 'Widgets in this area will be shown on footer area', 'cleaner' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer #4', 'cleaner' ),
            'id'            => 'footer-4',
            'description'   => __( 'Widgets in this area will be shown on footer area', 'cleaner' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
        ] );

        register_sidebar( [
            'name'          => __( 'Copyright area', 'cleaner' ),
            'id'            => 'copyright',
            'description'   => __( 'Widgets in this area will be shown on footer bottom area', 'cleaner' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widgettitle">',
            'after_title'   => '</h4>',
        ] );
    }
}