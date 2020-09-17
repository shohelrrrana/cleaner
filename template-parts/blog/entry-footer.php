<?php
    /**
     * Template for entry Footer
     *
     * @package aquila
     */
    $post_terms = wp_get_post_terms(get_the_ID(), ['category']);
    if( !is_array($post_terms) || empty($post_terms) ){
        return;
    }
?>
<div class="entry-footer mb-3">
    <?php foreach ($post_terms as $key => $post_term): ?>
        <button class="btn border border-secondary mb-2 mr-2">
            <a href="<?php echo get_term_link($post_term); ?>" class="entry-footer-link text-secondary">
                <?php echo esc_html($post_term->name); ?>
            </a>
        </button>
    <?php endforeach; ?>
</div>