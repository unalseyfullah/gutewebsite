<?php
if (!defined('FW')) {
    die('Forbidden');
}
?>
<blockquote class="fw-quote <?php echo esc_attr($atts['text_align']); ?> <?php echo esc_attr($atts['font_size']); ?> <?php echo esc_attr($atts['class']); ?>">
    <?php echo wellnesscenter_editor_data($atts['text']); ?>
<?php if ($atts['author'] != '') : ?>
        <small class="fw-quote-author">
            <span>
                <?php if ($atts['author_link'] != '') : ?>
                    <a class="anchor scroll-to" href="<?php echo esc_url($atts['author_link']); ?>"><?php echo wellnesscenter_theme_translate(esc_html($atts['author'])); ?></a>
                <?php else : ?>
                    <?php echo wellnesscenter_theme_translate(esc_html($atts['author'])); ?>
    <?php endif; ?>
            </span>
        </small>
<?php endif; ?>
</blockquote>