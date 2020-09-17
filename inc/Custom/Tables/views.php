<?php
    /**
     * Cleaning Books Table frontend
     *
     * @package cleaner
     */
?>
<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'Cleaning Books', 'cleaner' )?></h1>
    <?php if ( isset( $_GET['cleaning-book-deleted'] ) && $_GET['cleaning-book-deleted'] == 'true' ): ?>
        <div id="message" class="notice notice-success is-dismissible">
            <p><?php _e( 'Cleaning book has been deleted succesfully', 'cleaner' )?></p>
            <button type="button" class="notice-dismiss">
                <span class="screen-reader-text"><?php _e( 'Dismiss this notice.', 'cleaner' )?></span>
            </button>
        </div>
    <?php endif?>
    <form action="<?php echo esc_url( admin_url( 'admin.php' ) ) ?>" method="get">
        <input type="hidden" name="page" value="cleaning-book-list">
        <?php \Theme\Custom\Tables\Cleaning_Book_List::get_instance();?>
    </form>
</div>