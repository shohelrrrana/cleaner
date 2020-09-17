<?php
    /**
     * The main template file
     *
     * @package cleaner
     */

    get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center py-3 my-5">
                    <?php single_post_title(); ?>
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-<?php echo is_active_sidebar('blog-sidebar') ? esc_attr(8) : ''; ?> col-sm-12">
                <?php if(have_posts()): ?>
                    <div class="row">
                        <?php while(have_posts()): the_post(); ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <?php get_template_part('template-parts/content'); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-5">
                            <?php 
                                $args = [
                                    'before_page_number' => '<span class="btn border border-secondary btn-link">',
                                    'after_page_number' => '</span>'
                                ];
                                echo paginate_links($args);
                            ?>
                        </div>
                    </div>
                <?php 
                    else:
                        get_template_part( 'template-parts/content-none' );
                    endif; 
                ?>

            </div>
            <?php if(is_active_sidebar('blog-sidebar')): ?>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
</main>

<?php
get_footer();
