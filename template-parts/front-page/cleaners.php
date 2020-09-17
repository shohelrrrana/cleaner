<?php
    /**
     * template part for front page
     *
     * @package cleaner
     */
    $cleaners_section    = get_option( 'front_page_cleaners_section', [] );
    if ( empty( $cleaners_section ) ) {
        return;
    }
    $section_subtitle    = $cleaners_section['section_subtitle'] ?? '';
    $section_title       = $cleaners_section['section_title'] ?? '';
    $section_description = $cleaners_section['section_description'] ?? '';
    $cleaners            = $cleaners_section['cleaners'] ?? [];
?>
<section id="cleaners">
    <div class="section m-0 dark">
        <div class="container">
            <div class="heading-block center mx-auto" style="max-width: 700px">
                <h5 class="font-weight-normal text-uppercase ls2 section-subtitle text-center">
                    <?php echo esc_html( $section_subtitle ) ?>
                </h5>
                <h2 class="mb-2 nott ls0 section-title text-center">
                    <?php echo esc_html( $section_title ) ?>
                </h2>
                <span class="section-description text-center">
                    <?php echo wp_kses_post( $section_description ) ?>
                </span>
            </div>
        </div>
    </div>

    <div class="negetive-margin">
        <div class="container">
            <div id="cleaner-carousel" class="owl-carousel carousel-widget" data-margin="30" data-nav="true"
                data-pagi="true" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4"
                data-items-xl="4">
                <?php if(!empty($cleaners)): ?>
                    <?php foreach ($cleaners as $cleaner):
                            $image_id = $cleaner['image'] ?? '';
                            $name = $cleaner['name'] ?? '';
                            $description = $cleaner['description'] ?? '';
                         ?>
                        <div class="card border-0 shadow-sm">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url($image_id, 'large')); ?>"
                                class="card-img-top" alt="Cleaner Photo" />
                            <div class="card-body second-bg-color rounded-bottom p-4">
                                <h4 class="card-title"><?php echo esc_html( $name ); ?></h4>
                                <p class="card-text">
                                    <?php echo esc_html( $description ); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>