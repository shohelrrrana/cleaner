<?php
    /**
     * Template for entry Meta
     *
     * @package aquila
     */
?>
<div class="entry-meta mb-3">
    <span><?php _e('Posted on: '); ?></span>
    <time class="entry-time">
        <a href="<?php echo get_the_permalink(); ?>" class="text-dark">
            <?php echo get_the_date('dS F Y');?>
        </a>
    </time>
    <span>
    <?php _e('By '); ?>
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
            <?php echo get_the_author_meta('display_name') ?>
        </a>
    </span>
</div>