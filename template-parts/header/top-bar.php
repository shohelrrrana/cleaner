<?php
    /**
     * top header for our theme
     *
     * @package cleaner
     */
    $social_links = get_option( 'theme_social_links', [] );
?>
<!-- Top Bar
		============================================= -->
        <div id="top-bar">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-auto left">
                       <?php
                        if(is_active_sidebar('header-top')){
                            dynamic_sidebar('header-top');
                        }
                       ?>
                    </div>

                    <div class="col-12 col-md-auto">
                        <!-- Top Social
						============================================= -->
                        <ul id="top-social">
                            <?php if(!empty($social_links)): ?>
                                <?php foreach($social_links as $key => $value): ?>
                                    <?php if($key == 'phone'): ?>
                                        <li>
                                            <a href="tel:<?php echo esc_attr( $value ); ?>" class="si-call">
                                            <span class="ts-icon">
                                                <i class="fa fa-phone"></i>
                                            </span>
                                            <span class="ts-text"><?php echo esc_html( $value ); ?></span></a>
                                        </li>
                                    <?php elseif($key == 'email'): ?>
                                        <li>
                                            <a href="tel:<?php echo esc_attr( $value ); ?>" class="si-call">
                                            <span class="ts-icon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <span class="ts-text"><?php echo esc_html( $value ); ?></span></a>
                                        </li>
                                    <?php else: ?>
                                    <li>
                                        <a href="<?php echo esc_url( $value ); ?>" class="si-<?php echo esc_attr($key); ?>">
                                            <span class="ts-icon">
                                                <i class="fa fa-<?php echo esc_attr( $key ); ?>"></i>
                                            </span>
                                            <span class="ts-text"><?php echo esc_html( ucwords($key) ); ?></span>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                        <!-- #top-social end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- #top-bar end -->