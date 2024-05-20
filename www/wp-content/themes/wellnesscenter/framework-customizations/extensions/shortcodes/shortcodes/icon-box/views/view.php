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
<div class="fw-iconbox clearfix">
	<i class="<?php echo   $atts['icon']; ?>"></i>
	<h4><?php echo esc_html($atts['title']); ?></h4>
	<p><?php echo esc_textarea($atts['content']); ?></p>
<?php
	if ($atts['use_button']['option']=='yes') :
		$btn = $atts['use_button']['yes'];
?>
    <a href="<?php echo esc_url($btn['link']) ?>" target="<?php echo esc_attr($btn['target']); ?>"  class="btn btn-<?php echo   $btn['style']; ?> btn-<?php echo   $btn['size']; ?>" title="<?php echo esc_attr($btn['label']); ?>">
        <?php echo esc_html($btn['label']); ?>
    </a>
<?php endif; ?>
</div>