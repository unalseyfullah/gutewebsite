<?php
if (!defined('FW')) {
    die('Forbidden');
}

if ($atts['divider_size']['size'] == 'custom') {
    $size = '';
    $custom_spacing = 'padding-top:' . (int) $atts['divider_size']['custom']['margin_top'] . 'px;' . ' margin-bottom:' . (int) $atts['divider_size']['custom']['margin_bottom'] . 'px;';
} else {
    $size = $atts['divider_size']['size'];
    $custom_spacing = '';
}


$bg_color = $link_id = $border_class = '';

$divider_color = $atts['bg_color'];
if ($divider_color != '') {
    $bg_color = 'border-color:' . $divider_color . ';';
}

if ($atts['link_id'] != '') {
    $link_id = 'id="' . $atts['link_id'] . '"';
}

if (isset($atts['is_fullwidth']) && $atts['is_fullwidth'] == 1) {
    $atts['class'] .= ' fw-divider-full-width';
}

if ($atts['type'] == 'fw-divider-space') {
    $line_class = '';
} else {
    $line_class = 'fw-divider-line';
}

?>
<div <?php echo esc_attr($link_id); ?> class="<?php echo esc_attr($atts['class']); ?> <?php echo esc_attr($atts['type']); ?> <?php echo esc_attr($line_class); ?> <?php echo esc_attr($size); ?> <?php echo esc_attr($border_class); ?>" <?php echo 'style="width:100%; ' . esc_attr($custom_spacing) . ' ' . $bg_color . '"'; ?> ></div>