<?php
    /**
     * The front page template file
     *
     * @package cleaner
     */

    get_header();
    $sortable_sections    = get_option( 'sortable_front_page_sections', [] );
    $display_hero_section = get_option( 'display_front_page_hero_section' );
?>

        <?php
            if ( $display_hero_section ) {
                get_template_part( 'template-parts/front-page/hero' );
            }
        ?>
        <div id="content">
            <div class="content-wrap pt-4 pb-0">
                <?php
                    if ( !empty( $sortable_sections ) ) {
                        foreach ( $sortable_sections as $section ) {
                            get_template_part( 'template-parts/front-page/' . $section );
                        }
                    }
                ?>
            </div>
        </div>

        <div class="position-relative" style="background-color: rgba(51, 94, 238, 0.08)">
            <svg class="svg-separator" viewBox="0 0 1440 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none">
                <path d="M0 24H1440V0C722.5 52 0 0 0 0V24Z" fill="#335EEE"></path>
            </svg>
        </div>


<?php
get_footer();
