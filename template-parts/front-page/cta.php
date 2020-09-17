<?php
/**
 * template part for front page
 *
 * @package cleaner
 */
$cta_section        = get_option( 'front_page_cta_section', [] );
if ( empty( $cta_section ) ) {
    return;
}
$section_title       = $cta_section['section_title'] ?? '';
$section_description = $cta_section['section_description'] ?? '';
?>
<section id="cta" class="hero-diagonal">
    <div class="center dark topmargin-lg bottommargin-lg" style="padding: 170px 0">
        <div class="container" style="max-width: 760px">
            <h2 class="mb-4 h1 font-weight-normal section-title text-center">
                <?php echo esc_html( $section_title ); ?>
            </h2>
            <span class="lead section-description">
                <?php echo wp_kses_post( $section_description ); ?>
            </span>
        </div>
    </div>
</section>

<div class="clear"></div>