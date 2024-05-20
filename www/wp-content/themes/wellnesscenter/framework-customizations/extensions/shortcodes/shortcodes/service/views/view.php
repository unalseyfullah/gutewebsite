<?php
if ( !defined( 'FW' ) ) {
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

<div class="features-img text-center wow fadeInLeft animated" data-wow-duration="2s" data-wow-offset="200" style="visibility: visible; animation-duration: 2s; animation-name: fadeInLeft;">
    <div class="feature-img">
        <img src="<?php echo esc_url(wellnesscenter_get_image($atts['image'], '', true)); ?>" alt="<?php echo esc_attr( $atts['title'] ); ?>" class="img-responsive">
    </div>
    <h3><?php echo esc_html( $atts['title'] ); ?></h3>

    <p class="feature-content"><?php echo wp_kses_post($atts['content']); ?></p>
<?php
	if ($atts['use_button']['option']=='yes') :
		$btn = $atts['use_button']['yes'];
?>
    <a href="<?php echo esc_url($btn['link']) ?>" target="<?php echo esc_attr($btn['target']); ?>"  class="btn btn-<?php echo   $btn['style']; ?> btn-<?php echo   $btn['size']; ?>" title="<?php echo esc_attr($btn['label']); ?>">
        <?php echo esc_html($btn['label']); ?>
    </a>
<?php endif; ?>
</div>