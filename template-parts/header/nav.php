<?php
    /**
     * The header for our theme
     *
     * @package cleaner
     */

$menu_class = Theme\Setup\Menus::get_instance();
$primary_menu_items = wp_get_nav_menu_items( 'primary-menu' );
?>

        <!-- Header
		============================================= -->
        <header id="header" class="full-header header-size-md border-0" data-sticky-shrink="false">
            <div id="header-wrap">
                <div class="container-fluid pr-0">
                    <div class="header-row">
                        <!-- Logo
						============================================= -->
                        <div id="logo" class="col col-sm-auto">
                        <?php
                            if ( has_custom_logo() ) {
                                the_custom_logo();
                            } else {
                        ?>
                                <a class="standard-logo" href="<?php echo home_url(); ?>">
                                    <?php echo get_bloginfo( 'blogname' ); ?>
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- #logo end -->

                        <div id="primary-menu-trigger">
                            <svg class="svg-trigger" viewBox="0 0 100 100">
                                <path
                                    d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                                </path>
                                <path d="m 30,50 h 40"></path>
                                <path
                                    d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                                </path>
                            </svg>
                        </div>

                        <!-- Primary Navigation
						============================================= -->
                        <nav class="primary-menu">
                            <ul class="menu-container border-right-0 mr-0">
                            <?php if ( is_array( $primary_menu_items ) && !empty( $primary_menu_items ) ): ?>
                                <?php
                                    foreach ( $primary_menu_items as $menu_item ):
                                        $child_menu_items = $menu_class->get_child_menu_items( $primary_menu_items, $menu_item->ID );
                                    ?>
                                    <?php if ( empty( $child_menu_items ) && intval( $menu_item->menu_item_parent ) === 0 ): ?>
                                        <li class="menu-item">
                                            <a href="<?php echo esc_url( $menu_item->url ); ?>" class="menu-link" >
                                                <div><?php echo esc_html( $menu_item->title ); ?></div>
                                            </a>
                                        </li>

                                    <?php endif?>
                                <?php endforeach;?>
                            <?php endif;?>
                            </ul>
                        </nav>
                        <!-- #primary-menu end -->
                    </div>
                </div>
            </div>

            <div class="header-wrap-clone"></div>
        </header>
        <!-- #header end -->