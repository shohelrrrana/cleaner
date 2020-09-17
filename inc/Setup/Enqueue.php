<?php
/**
 * Enqueue class file
 *
 * @package cleaner
 */

 namespace Theme\Setup;
 use Theme\Traits\Singleton;

 class Enqueue{
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }
    
    public function setup_hooks() {
        //Action
        add_action('wp_enqueue_scripts', [$this, 'enqueue_css']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_js']);
    }

    public function enqueue_css() {
        wp_enqueue_style('cleaner-google-font', '//fonts.googleapis.com/css?family=Heebo:400,500,700', [], THEME_VERSION);
        wp_enqueue_style('cleaner-bootstrap', THEME_URI . '/assets/css/bootstrap.min.css', [], THEME_VERSION);
        wp_enqueue_style('cleaner-font-awesome', THEME_URI . '/assets/font-awesome/css/font-awesome.min.css', [], THEME_VERSION);
        wp_enqueue_style('cleaner-style', THEME_URI . '/assets/css/style.css', [], THEME_VERSION);
        wp_enqueue_style('cleaner-dark', THEME_URI . '/assets/css/dark.css', [], THEME_VERSION);
        wp_enqueue_style('cleaner-font-icons', THEME_URI . '/assets/css/font-icons.css', [], THEME_VERSION);
        wp_enqueue_style('cleaner-animate', THEME_URI . '/assets/css/animate.css', [], THEME_VERSION);
        wp_enqueue_style('cleaner-magnific-popup', THEME_URI . '/assets/css/magnific-popup.css', [], THEME_VERSION);
        wp_enqueue_style('cleaner-custom', THEME_URI . '/assets/css/custom.css', [], THEME_VERSION);
        wp_enqueue_style('cleaner-daterangepicker', THEME_URI . '/assets/css/components/daterangepicker.css', [], THEME_VERSION);
        wp_enqueue_style('cleaner-rangeslider', THEME_URI . '/assets/css/components/ion.rangeslider.css', [], THEME_VERSION);
        wp_enqueue_style('cleaner-colors', THEME_URI . '/assets/css/colors.css', [], THEME_VERSION);
        wp_enqueue_style('cleaner-demos-fonts', THEME_URI . '/assets/demos/cleaner/css/fonts.css', [], THEME_VERSION);
        wp_enqueue_style('cleaner-demos-cleaner', THEME_URI . '/assets/demos/cleaner/css/cleaner.css', [], THEME_VERSION);
        wp_enqueue_style('cleaner-theme-style', get_stylesheet_uri(), [], THEME_VERSION);
    }

    public function enqueue_js() {
        wp_enqueue_script('cleaner-bootstrap', THEME_URI . '/assets/js/bootstrap.min.js', ['jquery'], THEME_VERSION, true);
        wp_enqueue_script('cleaner-plugins', THEME_URI . '/assets/plugins.min.js', ['jquery'], THEME_VERSION, true);
        wp_enqueue_script('cleaner-moment', THEME_URI . '/assets/components/moment.js', ['jquery'], THEME_VERSION, true);
        wp_enqueue_script('cleaner-daterangepicker', THEME_URI . '/assets/js/components/daterangepicker.js', ['jquery'], THEME_VERSION, true);
        wp_enqueue_script('cleaner-rangeslider', THEME_URI . '/assets/js/components/rangeslider.min.js', ['jquery'], THEME_VERSION, true);
        wp_enqueue_script('cleaner-functions', THEME_URI . '/assets/js/functions.js', ['jquery'], THEME_VERSION, true);
        wp_enqueue_script('cleaner-cleaning-book', THEME_URI . '/assets/js/cleaning-book.js', ['jquery'], THEME_VERSION, true);
        wp_enqueue_script('cleaner-main', THEME_URI . '/assets/js/main.js', ['jquery'], THEME_VERSION, true);
    }
 }