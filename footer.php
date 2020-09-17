<?php
    /**
     * The template for displaying the footer
     *
     * @package cleaner
     */
?>

<!-- Footer
		============================================= -->
        <footer id="footer" class="border-0 dark bg-color">
            <div class="container">
                <!-- Footer Widgets
				============================================= -->
                <div class="footer-widgets-wrap">
                    <div class="row">
                        <?php if(is_active_sidebar('footer-1')): ?>
                            <div class="col-6 col-lg-4">
                                <?php dynamic_sidebar('footer-1'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(is_active_sidebar('footer-2')): ?>
                            <div class="col-6 col-lg-3">
                                <?php dynamic_sidebar('footer-2'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(is_active_sidebar('footer-3')): ?>
                            <div class="col-6 col-lg-3 mt-5 mt-lg-0">
                                <?php dynamic_sidebar('footer-3'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if(is_active_sidebar('footer-4')): ?>
                            <div class="col-6 col-lg-2 mt-5 mt-lg-0">
                                <?php dynamic_sidebar('footer-4'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- .footer-widgets-wrap end -->
            </div>
            <!-- Copyrights
			============================================= -->
            <div id="copyrights" class="dark">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-6 text-white-50">
                            <?php 
                                if(is_active_sidebar('copyright')){
                                    dynamic_sidebar('copyright');
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #copyrights end -->
        </footer>
        <!-- #footer end -->

</div>
<!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="rounded-circle bg-color h-bg-dark"><i class="fa fa-arrow-up"></i></div>


<script src="<?php echo THEME_URI . '/assets/js/components/moment.js'; ?>"></script>
<?php wp_footer();?>
<script src="<?php echo THEME_URI . '/assets/js/plugins.min.js'; ?>"></script>
    
<script>
        jQuery(document).ready(function () {
            jQuery(".cleaning-date").daterangepicker({
                buttonClasses:
                    "button button-rounded button-mini nott ls0 font-weight-semibold",
                applyClass: "button-color m-0 ml-1",
                cancelClass: "bg-danger m-0 text-light",
                singleDatePicker: true,
                startDate: moment().startOf("hour"),
                minDate: moment().startOf("date"),
                timePicker: true,
                timePickerSeconds: false,
                locale: {
                    format: "DD/MM/YYYY h:mm a",
                },
                timePickerIncrement: 10,
            });

            jQuery(".cleaning-date").val("Select Date & Time");

            jQuery(".form-cleaning").on("formSubmitSuccess", function () {
                jQuery(".cleaning-date").val("Select Date & Time");
            });

            // Calculator
            var pricingAREA = 0,
                pricingROOMS = 0,
                pricingBATHROOMS = 0,
                pricingLIVINGROOMS = 0,
                pricingOTHERS = 0,
                elementAREA = $(".clean-area"),
                elementROOMS = $(".clean-rooms"),
                elementBATHROOMS = $(".clean-bathrooms"),
                elementLIVINGROOMS = $(".clean-livingrooms"),
                elementOTHERS = $("input[name='clean-form-others[]']"),
                elementPRICE = $("#clean-form-price");

            elementAREA.ionRangeSlider({
                min: 0,
                max: 5000,
                from: 0,
                step: 10,
                max_postfix: "sqft.",
                onStart: function (data) {
                    pricingAREA = data.from;
                },
            });

            elementAREA.on("change", function () {
                pricingAREA = $(this).prop("value");
                calculatePrice(
                    pricingAREA,
                    pricingROOMS,
                    pricingBATHROOMS,
                    pricingLIVINGROOMS,
                    pricingOTHERS
                );
            });

            elementROOMS.ionRangeSlider({
                min: 0,
                max: 10,
                from: 0,
                step: 1,
                onStart: function (data) {
                    pricingROOMS = data.from;
                },
            });

            elementROOMS.on("onStart change", function () {
                pricingROOMS = $(this).prop("value");
                calculatePrice(
                    pricingAREA,
                    pricingROOMS,
                    pricingBATHROOMS,
                    pricingLIVINGROOMS,
                    pricingOTHERS
                );
            });

            elementBATHROOMS.ionRangeSlider({
                min: 0,
                max: 10,
                from: 0,
                step: 1,
                onStart: function (data) {
                    pricingBATHROOMS = data.from;
                },
            });

            elementBATHROOMS.on("onStart change", function () {
                pricingBATHROOMS = $(this).prop("value");
                calculatePrice(
                    pricingAREA,
                    pricingROOMS,
                    pricingBATHROOMS,
                    pricingLIVINGROOMS,
                    pricingOTHERS
                );
            });

            elementLIVINGROOMS.ionRangeSlider({
                min: 0,
                max: 5,
                from: 0,
                step: 1,
                onStart: function (data) {
                    pricingLIVINGROOMS = data.from;
                },
            });

            elementLIVINGROOMS.on("onStart change", function () {
                pricingLIVINGROOMS = $(this).prop("value");
                calculatePrice(
                    pricingAREA,
                    pricingROOMS,
                    pricingBATHROOMS,
                    pricingLIVINGROOMS,
                    pricingOTHERS
                );
            });

            elementOTHERS.change(function () {
                var pricingOTHERS = 0;
                elementOTHERS.each(function () {
                    if ($(this).is(":checked")) {
                        pricingOTHERS += parseFloat($(this).attr("data-price"));
                        calculatePrice(
                            pricingAREA,
                            pricingROOMS,
                            pricingBATHROOMS,
                            pricingLIVINGROOMS,
                            pricingOTHERS
                        );
                    } else {
                        calculatePrice(
                            pricingAREA,
                            pricingROOMS,
                            pricingBATHROOMS,
                            pricingLIVINGROOMS,
                            pricingOTHERS
                        );
                    }
                });
            });

            calculatePrice(
                pricingAREA,
                pricingROOMS,
                pricingBATHROOMS,
                pricingLIVINGROOMS,
                pricingOTHERS
            );

            function calculatePrice(area, rooms, bathrooms, livingrooms, extra) {
                var TotalPriceValue =
                    Number(area) * 0.2 +
                    Number(rooms) * 4 +
                    Number(bathrooms) * 3 +
                    Number(livingrooms) * 5 +
                    Number(extra);
                jQuery(".total-price").html("$" + TotalPriceValue);
                elementPRICE.val(TotalPriceValue).change();
            }
        });
    </script>
</body>
</html>
