<?php if ( !defined( 'FW' ) ) die( 'Forbidden' ); ?>



<?php
$icon = $before_btn = $after_btn = '';

foreach ( $atts['button_settings'] as $btn ):

	if(isset($btn['inline'])){
		$display = ' '.$btn['inline'];
	}else{
		$display = ' ';
	}

	if ( $btn['icon'] != '' ) {
		$icon_position = $btn['icon_position'];
		$icon = '<i class="' . $btn['icon_position'] . ' ' . $btn['icon'] . '"></i>';
	}

	if ( isset( $btn['btn_alignment'] ) && $btn['btn_alignment'] != '' ) {
		$before_btn = '<div class="' . $btn['btn_alignment'] . $display . '">';
		$after_btn = '</div>';
	}
	?>
	<?php echo   $before_btn; ?>
<a href="<?php echo esc_url($btn['link']) ?>" target="<?php echo esc_attr($btn['target']); ?>"  class="btn btn-<?php echo   $btn['style']; ?> btn-<?php echo   $btn['size']; ?>" title="<?php echo esc_attr($btn['label']); ?>">
		<?php echo   $icon; ?> <?php echo  esc_html($btn['label']); ?>
	</a>
	<?php
	echo   $after_btn;
endforeach;
