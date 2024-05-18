<?php
if ( !defined( 'FW' ) )
	die( 'Forbidden' );
/**
 * @var $atts
 */


$title = $atts['title'];
$class = $atts['class'];

$style = '';

if ($atts['color'] != "") {
	$style .= "style=\"color:".esc_attr( $atts['color'] ).";\" " ;
}

?>

<header class="fw-heading section-header <?php echo esc_attr( $atts['spacing'] ); echo esc_attr( ' subtitle-'.$atts['subtitle_position'] ); echo ' ' . esc_attr( $atts['position'] ); ?> fw-heading-<?php echo esc_attr( $atts['heading'] ); ?> <?php echo $class?> wow fadeIn" data-wow-offset="120" data-wow-duration="1.5s" <?php echo   $style; ?>>
	<?php echo "<{$atts['heading']} class='fw-special-title'>";
	if($atts['subtitle_position']=='bottom'){ echo esc_html($title) . '<span class="bottom-subtitle-spacing"></span>'; }

	if ( !empty( $atts['subtitle'] ) ): ?>
		<small><?php echo esc_html( $atts['subtitle'] ); ?></small>
	<?php endif;


	if($atts['subtitle_position']=='top'){ echo '<span class="top-subtitle-spacing"></span>' . esc_html($title); }
	echo "</{$atts['heading']}>"; ?>
</header>