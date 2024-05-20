<?php
if ( !defined( 'FW' ) )
	die( 'Forbidden' );
/**
 * @var $atts
 */

$style = "";

if ($atts['color'] != "") {
	$style .= "style=\"color:".esc_attr( $atts['color'] ).";\" " ;
}

?>
<<?php echo esc_attr($atts['heading']); ?> class="fw-title wow fadeInTop animated <?php echo esc_attr($atts['position']); ?>" data-wow-duration="1.5s" <?php echo   $style; ?>><?php echo esc_html($atts['title']); ?></<?php echo esc_attr($atts['heading']); ?>>