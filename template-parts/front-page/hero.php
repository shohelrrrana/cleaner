<?php
    /**
     * template part for front page
     *
     * @package cleaner
     */
    $hero_section        = get_option( 'front_page_hero_section' );
    if ( empty( $hero_section ) ) {
        return;
    }
    $section_title       = $hero_section['section_title'] ?? '';
    $section_description = $hero_section['section_description'] ?? '';
    $form_btn_title      = $hero_section['form_btn_title'] ?? __( "Book Now", 'cleaner' );
    $display_section     = $hero_section['display_section'] ?? 1 ;
?>
<?php if ( $display_section ): ?>
<section id="hero" class="slider slider-element">
    <div class="vertical-middle">
        <div class="container">
            <div class="row py-5">
                <div class="col-xl-6 col-lg-5 col-md-2"></div>
                <div class="col-xl-6 col-lg-7 col-md-10">
                    <div class="slider-title dark">
                        <h1 class="section-title">
                            <?php echo esc_html( $section_title ); ?>
                        </h1>
                        <div class="section-description mb-4">
                            <?php echo wp_kses_post( $section_description ); ?>
                        </div>
                    </div>
                    <div class="card border-0 p-3 shadow-lg"
                        style="background-color: rgba(255, 255, 255, 0.85)">
                        <div class="form-widget card-body" data-alert-type="inline">

                            <div class="form-result"></div>

                            <form id="cleaning-book" name="cleaning-book" action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>"
                                method="post" class="row form-cleaning mb-0">
                                <?php wp_nonce_field('cleaning_book_action'); ?>
                                <div class="form-process">
                                    <div class="form-cleaning-loader css3-spinner" style="position: absolute">
                                        <div class="css3-spinner-double-bounce1"></div>
                                        <div class="css3-spinner-double-bounce2"></div>
                                    </div>
                                </div>

                                <div class="col-sm-6 input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-color text-white">
                                            <img src="http://themes.semicolonweb.com/html/canvas/demos/cleaner/images/icons/cleaner2.svg"
                                                alt="" width="20" />
                                        </span>
                                    </div>
                                    <select class="required custom-select" name="service"
                                        id="form-cleaning-service">
                                        <option value="" disabled selected>
                                            <?php _e('-- Select Your Service --', 'cleaner'); ?>
                                        </option>
                                        <option value="Home Cleaning">Home Cleaning</option>
                                        <option value="Office Cleaning">
                                            <?php _e('Office Cleaning', 'cleaner'); ?>
                                        </option>
                                        <option value="Window Cleaning">
                                            <?php _e('Window Cleaning', 'cleaner'); ?>
                                        </option>
                                        <option value="Garden Maintenance">
                                            <?php _e('Garden Maintenance', 'cleaner'); ?>
                                        </option>
                                    </select>
                                </div>

                                <div class="col-sm-6 input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-color text-white"><i
                                                class="fa fa-map"></i></span>
                                    </div>
                                    <input type="text" name="location" id="form-cleaning-location"
                                        class="form-control required" value="" placeholder="Location" />
                                </div>

                                <div class="col-sm-6 input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-color text-white"><i
                                                class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="text"
                                        class="form-control cleaning-date datetimepicker-input required"
                                        name="date-time" id="form-cleaning-date"
                                        value="Select your Date & Time" />
                                </div>

                                <div class="col-sm-6 form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-color text-white"><i
                                                class="fa fa-area-chart"></i></span>
                                    </div>
                                    <input type="number" name="area" min="200"
                                        id="form-cleaning-area" class="form-control required" value=""
                                        placeholder="Area (sqft.)" />
                                </div>

                                <div class="col-sm-6 input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-color text-white"><i
                                                class="fa fa-envelope"></i></span>
                                    </div>
                                    <input type="email" name="email" id="form-cleaning-email"
                                        class="form-control required" value="" placeholder="Your Email" />
                                </div>

                                <div class="col-sm-6 input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-color text-white"><i
                                                class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="phone" id="form-cleaning-phone"
                                        class="form-control required" value="" placeholder="Contact Number" />
                                </div>
                                
                                <input type="hidden" name="action" value="cleaning_book_action" />

                                <div class="col-12">
                                    <button type="submit" name="cleaning-submit"
                                        class="btn btn-lg bg-color text-white font-weight-semibold btn-block mt-2">
                                        <?php echo esc_html( $form_btn_title ); ?>
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="svg-separator">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2273 390" fill="#FFF">
                <path d="M0,211.28s373-254,1119-205,765,173,1154,0v384H0Z" />
            </svg>
        </div>
    </div>
</section>
<?php endif;?>