<?php
    /**
     * template part for front page
     *
     * @package cleaner
     */
    $choose_us_section   = get_option( 'front_page_choose_us_section', [] );
    if ( empty( $choose_us_section ) ) {
        return;
    }
    $section_title       = $choose_us_section['section_title'] ?? '';
    $section_description = $choose_us_section['section_description'] ?? '';
    $choose_us_items     = $choose_us_section['choose_us_items'] ?? [];
?>
<section id="choose-us">
    <div class="container topmargin bottommargin-lg">
        <div class="heading-block center mx-auto" style="max-width: 700px">
            <h2 class="mb-2 nott ls0 section-title text-center">
                <?php echo esc_html( $section_title ); ?>
            </h2>
            <span class="section-description">
                <?php echo wp_kses_post( $section_description ); ?>
            </span>
        </div>
        <div class="clear"></div>
        <?php if ( !empty( $choose_us_items ) ): ?>
        <div class="row col-mb-50 mt-3 choose-us-items">
	            <div class="col-lg-4 center order-lg-last">
	                <img src="http://themes.semicolonweb.com/html/canvas/demos/cleaner/images/cleaner-icon.svg"
	                    alt="Cleaner" width="340" />
	                <small class="d-block tright"><a href="http://www.freepik.com" style="color: #ddd">Designed
	                        by macrovector / Freepik</a></small>
	            </div>
            <?php
                $i = 0;
                foreach ( $choose_us_items as $choose_us_item ):
                    $i++;
                    $image_id    = $choose_us_item['image'] ?? '';
                    $title       = $choose_us_item['title'] ?? '';
                    $description = $choose_us_item['description'] ?? '';
                ?>
                    <?php 
                        if($i % 3 === 1){
                            echo '<div class="col-lg-4 col-md-6 pb-0">';
                        } 
                    ?>
                        <div class="feature-box fbox-plain bottommargin">
                            <div class="fbox-icon">
                                <img src="<?php echo esc_url( wp_get_attachment_image_url( $image_id ) ); ?>"
                                    alt="Cleaner Icon" />
                            </div>
                            <div class="fbox-content">
                                <h3 class="nott font-weight-semibold ls0">
                                    <?php echo esc_html( $title ); ?>
                                </h3>
                                <p>
                                    <?php echo esc_html( $description ); ?>
                                </p>
                            </div>
                        </div>
                    <?php
                        if ( $i  % 3 === 0 ) {
                            echo '</div>';
                        }
                    ?>
                <?php endforeach;?>
        </div>
        <?php endif;?>
    </div>
</section>

<div class="clear"></div>