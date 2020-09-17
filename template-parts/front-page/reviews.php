<?php
    /**
     * template part for front page
     *
     * @package cleaner
     */
    $reviews_section           = get_option( 'front_page_reviews_section', [] );
    if ( empty( $reviews_section ) ) {
        return;
    }
    $section_image             = $reviews_section['section_image'] ?? '';
    $section_title             = $reviews_section['section_title'] ?? '';
    $section_description       = $reviews_section['section_description'] ?? '';
    $total_completed           = $reviews_section['total_completed'] ?? __( "1100+", 'cleaner' );
    $completed_description     = $reviews_section['completed_description'] ?? '';
    $total_review_rating       = $reviews_section['total_review_rating'] ?? __( "4.9/5.0", 'cleaner' );
    $review_rating_description = $reviews_section['review_rating_description'] ?? '';
    $reviews                   = $reviews_section['reviews'] ?? [];
?>
<section id="reviews" class="section bg-transparent">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-5 center">
                <img class="section-image" src="<?php echo esc_url( $section_image ); ?>"
                    alt="Review Image" width="400" />
                <div class="row mt-5">
                    <div class="col-6">
                        <h3 class="color font-weight-normal h1 mb-3 total-completed">
                            <?php echo esc_html( $total_completed ); ?>
                        </h3>
                        <h5 class="text-muted font-weight-normal completed-description">
                            <?php echo esc_html( $completed_description ); ?>
                        </h5>
                    </div>

                    <div class="col-6">
                        <h3 class="color font-weight-normal h1 mb-3 total-review-rating">
                            <?php echo esc_html( $total_review_rating ); ?>
                        </h3>
                        <h5 class="text-muted font-weight-normal review-rating-description">
                            <?php echo esc_html( $review_rating_description ); ?>
                        </h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-7">
                <div class="heading-block">
                    <h2 class="mb-2 nott ls0 section-title">
                       <?php echo esc_html( $section_title ); ?>
                    </h2>
                    <span class="section-description">
                        <?php echo wp_kses_post( $section_description ); ?>
                    </span>
                </div>

                <div id="oc-testi" class="owl-carousel testimonials-carousel carousel-widget"
                    data-margin="10" data-nav="false" data-pagi="true" data-items="1"
                    data-autoplay="5000" data-loop="true">
                    <?php if ( !empty( $reviews ) ): ?>
                        <?php foreach ( $reviews as $review ):
                                $name        = $review['name'] ?? '';
                                $image_id    = $review['image'] ?? '';
                                $company     = $review['company'] ?? '';
                                $description = $review['description'] ?? '';
                            ?>
	                        <div class="oc-item">
	                            <div class="testimonial bg-transparent p-4 shadow-sm">
	                                <div class="testi-image">
	                                    <a href="#"><img src="<?php echo esc_url(wp_get_attachment_image_url($image_id)); ?>"
	                                            alt="Customer Testimonails" /></a>
	                                </div>
	                                <div class="testi-content">
	                                    <h4 class="font-weight-normal">
	                                        <?php echo esc_html( $description  ); ?>
	                                    </h4>
	                                    <div class="testi-meta">
                                            <?php echo esc_html( $name ); ?>
                                            <span><?php echo esc_html( $company ); ?></span>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <?php endforeach;?>
                        <?php endif;?>

                </div>
            </div>
        </div>
    </div>
</section>
