<?php
if (!defined('FW')) {
    die('Forbidden');
}
?>
<div class="row fw-call-to-action">
<div class="col-md-12 text-center">
<?php
$style = $button = '';

$color = $atts['text_color'];

if ($color!='') {
    $style = ' style="color: '.$color.';"';
}

if($atts['title'] != ""){
    echo '<h3'.$style.'>'.esc_html($atts['title']).'</h3>';
}

if($atts['bottom_title'] != ""){
    echo '<h2'.$style.'>'.esc_html($atts['bottom_title']).'</h2>';
}

if (isset($atts['action_button']['use_popup']) && $atts['action_button']['use_popup']=='yes') {
    echo '<button class="btn btn-lg btn-success show-appointment-modal button--wapasha" data-service="Oil Massage"><i class="fa fa-calendar"></i> '.esc_html($atts['label']).'</button>';
}else{
    echo '<a href="'.esc_url($atts['action_button']['no']['link']).'" target="'.esc_attr($atts['action_button']['no']['target']).'" class="btn btn-lg btn-success button--wapasha"><i class="fa fa-calendar"></i> '.esc_html($atts['label']).'</a>';
}
?>
</div>
</div>
