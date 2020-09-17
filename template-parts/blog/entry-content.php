<?php
    /**
     * Template for entry Cpntent
     *
     * @package aquila
     */
?>
<div class="entry-content mb-3">
    <?php
        if ( is_home() ) {
            if ( has_excerpt( get_the_ID() ) ) {
                the_excerpt();

            } else {
                echo substr( get_the_content(), 0, 255 );
            }
        } else {
            the_content();
        }
    ?>
<?php if ( is_home() && !is_single() ): ?>
        <button class="btn btn-primary my-3">
            <a href="<?php echo get_the_permalink(); ?>" class="text-light">Read More</a>
        </button>
    <?php endif;?>
</div>