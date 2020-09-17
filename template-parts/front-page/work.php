<?php
    /**
     * template part for front page
     *
     * @package cleaner
     */
    $work_section        = get_option( 'front_page_work_section', [] );
    if ( empty( $work_section ) ) {
        return;
    }
    $section_title       = $work_section['section_title'] ?? '';
    $section_description = $work_section['section_description'] ?? '';
    $work_items          = $work_section['work_items'] ?? [];
?>
<section id="work">
    <div class="container">
        <div class="heading-block center mx-auto" style="max-width: 700px">
            <h2 class="mb-2 nott ls0 section-title text-center">
                <?php echo esc_html( $section_title ); ?>
            </h2>
            <span class="section-description">
                <?php echo wp_kses_post( $section_description ); ?>
            </span>
        </div>
        <?php if ( !empty( $work_items ) ): ?>
        <div class="row justify-content-center col-mb-50 work-items">

            <?php
                $i = 0;
                foreach ( $work_items as $work_item ):
                    $i++;
                    $image_id    = $work_item['image'] ?? '';
                    $title       = $work_item['title'] ?? '';
                    $description = $work_item['description'] ?? '';
                ?>
	            <div class="col-md-4">
	                <div class="feature-box mx-0 fbox-small fbox-center border-0">
	                    <div class="fbox-img position-relative">
	                        <img src="<?php echo esc_url( wp_get_attachment_image_url( $image_id ) ); ?>"
	                            alt="Book Icon" height="160" />
	                    </div>
	                    <h2 class="topmargin-sm h5 mb-3 nott font-weight-semibold ls0">
	                        <span><?php echo esc_html( $i ); ?>.</span>
	                        <?php echo esc_html( $title ); ?>
	                    </h2>
	                    <p>
	                        <?php echo esc_html( $description ); ?>
	                    </p>
	                </div>
	            </div>
	            <?php endforeach;?>

        </div>
            <?php endif;?>
    </div>
</section>

<div class="clear"></div>