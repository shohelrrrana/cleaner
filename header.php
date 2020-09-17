<?php
    /**
     * The header for our theme
     *
     * @package cleaner
     */
?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta <?php echo bloginfo('charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('stretched'); ?>>
<?php wp_body_open(); ?>
<div id="wrapper" class="clearfix">

<?php get_template_part('template-parts/header/top-bar'); ?>
<?php get_template_part('template-parts/header/nav'); ?>


