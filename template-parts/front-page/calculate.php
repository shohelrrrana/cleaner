<?php
    /**
     * template part for front page
     *
     * @package cleaner
     */
    $calculate_section   = get_option( 'front_page_calculate_section', [] );
    if(empty($calculate_section)){
        return;
    }
    $section_title       = $calculate_section['section_title'] ?? '';
    $section_description = $calculate_section['section_description'] ?? '';
    $features            = $calculate_section['features'] ?? [];
    $pricing_faqs        = $calculate_section['pricing_faqs'] ?? [];
?>
<section id="calculate">
    <div id="section-price" class="section mb-0 topmargin-lg"
        style="padding-bottom: 100px; overflow: visible">
        <div class="svg-separator top">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2273 390" fill="#F9F9F9">
                    <path d="M0,211.28s373-254,1119-205,765,173,1154,0v384H0Z" />
                </svg>
            </div>
        </div>
        <div class="container">
            <div class="form-widget">
                <div class="form-result"></div>
                <form id="cleaner-form" name="cleaner-form" action="include/form.php" method="post"
                    class="cleaner-form mb-0" enctype="multipart/form-data">
                    <div class="form-process"></div>
                    <div class="row gutter-40">
                        <div class="col-lg-8">
                            <div class="heading-block border-bottom-0">
                                <h2 class="mb-3 nott ls0 section-title">
                                    <?php echo esc_html( $section_title ); ?>
                                </h2>
                                <div class="section-description">
                                    <?php echo esc_html( $section_description ); ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="cleaner-form-area" class="mb-3"><?php _e( 'Select Area:', 'cleaner' );?></label><br />
                                    <input id="cleaner-form-area" name="cleaner-form-area"
                                        class="clean-area required input-range-slider" />
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="cleaner-form-rooms" class="mb-3"><?php _e( 'Select Rooms:', 'cleaner' );?></label><br />
                                    <input id="cleaner-form-rooms" name="cleaner-form-rooms"
                                        class="clean-rooms required input-range-slider" />
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="cleaner-form-bathrooms" class="mb-3"><?php _e( 'Select Bathrooms:', 'cleaner' );?></label><br />
                                    <input id="cleaner-form-bathrooms" name="clean-form-bathrooms"
                                        class="clean-bathrooms required input-range-slider" />
                                </div>

                                <div class="col-md-6 form-group">
                                    <label for="cleaner-form-livingrooms" class="mb-3"><?php _e( 'Select Living Rooms:', 'cleaner' );?></label><br />
                                    <input id="cleaner-form-livingrooms" name="clean-form-livingrooms"
                                        class="clean-livingrooms required input-range-slider" />
                                </div>

                                <div class="col-12 form-group mb-4">
                                    <label class="mb-3">Others Requirment:
                                        <small class="nott ls0 text-black-50"><?php _e( '(Select Multiples)*', 'cleaner' );?></small></label><br />
                                    <div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                                        <label for="clean-form-others-clean-garden"
                                            class="btn btn-outline-secondary px-4 font-weight-semibold ls0 nott">
                                            <input type="checkbox" name="clean-form-others[]"
                                                class="form-check-input" id="clean-form-others-clean-garden"
                                                data-price="4" value="Clean Garden" />
                                            <?php _e( 'Clean Garden:', 'cleaner' );?>
                                        </label>
                                        <label for="clean-form-others-play-room"
                                            class="btn btn-outline-secondary px-4 font-weight-semibold ls0 nott">
                                            <input type="checkbox" name="clean-form-others[]"
                                                class="form-check-input" id="clean-form-others-play-room"
                                                data-price="5" value="Play Room" />
                                            <?php _e( 'Play Room', 'cleaner' );?>
                                        </label>
                                        <label for="clean-form-others-garage"
                                            class="btn btn-outline-secondary px-4 font-weight-semibold ls0 nott">
                                            <input type="checkbox" name="clean-form-others[]"
                                                class="form-check-input" id="clean-form-others-garage"
                                                data-price="5.4" value="Garage" />
                                            <?php _e( 'Garage', 'cleaner' );?>
                                        </label>
                                        <label for="clean-form-others-gym"
                                            class="btn btn-outline-secondary px-4 font-weight-semibold ls0 nott">
                                            <input type="checkbox" name="clean-form-others[]"
                                                class="form-check-input" id="clean-form-others-gym"
                                                data-price="4.2" value="Gym" />
                                            <?php _e( 'Gym', 'cleaner' );?>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group mb-4">
                                    <label for="clean-form-name"><?php _e( 'Name:', 'cleaner' );?></label>
                                    <input type="text" name="clean-form-name" id="clean-form-name"
                                        class="form-control required" value=""
                                        placeholder="Enter your Full Name" />
                                </div>
                                <div class="col-6 form-group mb-4">
                                    <label for="clean-form-email"><?php _e( 'Email:', 'cleaner' );?></label>
                                    <input type="email" name="clean-form-email" id="clean-form-email"
                                        class="form-control required" value=""
                                        placeholder="Enter your Email" />
                                </div>

                                <div class="col-12">
                                    <label for="clean-form-message"><?php _e( 'Additional Message', 'cleaner' );?>
                                        <small class="nott ls0 text-black-50"><?php _e( '(Optional):', 'cleaner' );?></small></label>
                                    <textarea name="clean-form-message" id="clean-form-message"
                                        class="form-control" cols="30" rows="6"></textarea>
                                </div>

                                <input type="text" class="d-none" id="clean-form-botcheck"
                                    name="clean-form-botcheck" value="" />
                                <input type="hidden" name="prefix" value="clean-form-" />
                                <input type="hidden" name="subject" value="Cleaner Cost Estimate Request" />
                                <input type="hidden" name="html_title" value="Cleaner Cost Estimation" />
                                <input type="hidden" id="clean-form-price" name="website-cost-total-price"
                                    value="" />
                            </div>
                        </div>
                        <div class="col-lg-4 mt-4 mt-md-0">
                            <div class="card text-center border-0 shadow-sm">
                                <div class="card-body pt-4 pb-0">
                                    <h4 class="card-title font-weight-semibold text-uppercase mb-0">
                                        <?php _e( 'Final Cost', 'cleaner' );?>
                                    </h4>
                                    <!-- Price Value -->
                                    <div class="total-price color font-weight-bold py-3"></div>
                                </div>
                                <div class="line my-1"></div>
                                <div class="card-body py-4">
                                    <?php if(!empty($features)): ?>
                                        <ul class="iconlist ml-0 op-08">
                                            <?php 
                                                foreach($features as $item): 
                                                    $feature = $item['feature'];
                                            ?>
                                                <li class="mb-2"><?php echo esc_html($feature); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <button type="submit" name="clean-form-submit"
                                        class="button button-rounded button-light button-large second-bg-color text-dark btn-block ls0 m-0">
                                        <?php _e('Book Now', 'cleaner'); ?>
                                    </button>
                                </div>
                            </div>

                            <div class="fancy-title title-border mt-5">
                                <h4 class="font-weight-semibold"><?php _e( 'Pricing FAQs', 'cleaner' );?></h4>
                            </div>

                            <?php if(!empty($pricing_faqs)): ?>
                                <?php 
                                foreach($pricing_faqs as $faq): 
                                    $title = $faq['title'] ?? '';
                                    $description = $faq['description'] ?? '';
                                ?>
                                    <div class="toggle">
                                        <div class="toggle-header justify-content-between">
                                            <div class="toggle-icon">
                                                <i class="toggle-closed  fa fa-plus-circle" aria-hidden="true"></i>
                                                <i class="toggle-open fa fa-minus-circle" aria-hidden="true"></i>

                                            </div>
                                            <div class="toggle-title font-weight-semibold">
                                               <?php echo esc_html( $title ); ?>
                                            </div>
                                        </div>
                                        <div class="toggle-content text-black-50">
                                            <?php echo esc_html( $description ); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>