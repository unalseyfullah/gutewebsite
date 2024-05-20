<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $atts
 */
?>
<?php
/*
 * `.fw-iconbox` supports 3 styles:
 * `fw-iconbox-1`, `fw-iconbox-2` and `fw-iconbox-3`
 */
?>
<div class="contact-info clearfix">
    <div class="address-icon">
        <i class="<?php echo esc_attr($atts['icon']); ?>"></i>
    </div>
    <?php echo wellnesscenter_editor_data($atts['content']); ?>
</div>
