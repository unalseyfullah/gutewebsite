<?php
if (!defined('FW')) {
    die('Forbidden');
}
$bg_color = $bg_image = $section_extra_classes = $height_classes = $bg_video_data_attr = $overlay = $space = $data_height = $extra_height = $height = $overlay_fast = $overlay_last = '';
$id = uniqid('section-');


$space = $atts['default_spacing'];

$bg_options = $atts['background_options']['background'];
if ($bg_options == 'color') {
    $bg_color = 'background-color:' . $atts['background_options']['color']['background_color'] . ';';
}


if ($bg_options == 'image') {
    $bg_image = 'background:url(' . esc_url($atts['background_options']['image']['background_image']['data']['icon']) . ') no-repeat center top fixed;-moz-background-size: cover;background-size: cover;-webkit-background-size: cover;-o-background-size: cover;width: 100%;overflow: hidden;';
    $section_extra_classes = 'parallax-section';


    $overlay_option = $atts['background_options']['image']['overlay_options']['overlay'];
    if ($overlay_option === 'yes') {
        $overlays = $atts['background_options']['image']['overlay_options']['yes']['background'];
        $overlay = "style='background-color:$overlays;z-index:3;position:absolute; width:100%;height:100%;left: 0;top: 0;'";
//        $overlay_fast = "<div class='overlay' style='background-color:$overlays'>";
//        $overlay_last = "</div>";
    }
}


if ($bg_options == 'video') {
    $filetype = wp_check_filetype($atts['background_options']['video']['video']);
    $filetypes = array('mp4' => 'mp4', 'ogv' => 'ogg', 'webm' => 'webm', 'jpg' => 'poster');
    $filetype = array_key_exists((string) $filetype['ext'], $filetypes) ? $filetypes[$filetype['ext']] : 'video';
    $bg_video_data_attr = 'data-wallpaper-options="' . fw_htmlspecialchars(json_encode(array('source' => array($filetype => $atts['background_options']['video']['video'])))) . '"';
    $section_extra_classes .= ' background-video';
    $overlays = $atts['background_options']['video']['overlay_options']['yes']['background'];
    $overlay = "style='background-color:$overlays;z-index:3;position:relative;'";
//    $overlay_fast = "<div class='overlay' style='background-color:$overlays'>";
//    $overlay_last = "</div>";
}

if ($atts['height'] != 'auto' && $atts['height'] != 'fw-section-height-sm' && $atts['height'] != 'fw-section-height-md' && $atts['height'] != 'fw-section-height-lg') {

    $height = (int) $atts['height'];
    $extra_height = 'height: ' . $height . 'px; ';
} else {
    $height_classes = ' ' . $atts['height'];
}

$container_class = ( isset($atts['is_fullwidth']) && $atts['is_fullwidth'] ) ? 'fw-container-fluid' : 'fw-container';

$custom_class = $atts['class'];


global $wellnesscenter_intro;
if ($wellnesscenter_intro == 'y') {
    $section_extra_classes .= ' onepage-home intro-full-screen';
}
?>


<section id="<?php echo $id; ?>" class="fw-main-row <?php echo $space ?> <?php echo esc_attr($section_extra_classes) ?> <?php echo $height_classes ?> <?php echo esc_attr($custom_class); ?>"  style="<?php echo $bg_color; ?> <?php echo $bg_image; ?> <?php echo $extra_height; ?> position:relative" <?php echo $bg_video_data_attr; ?> >

    <div <?php echo $overlay; ?>></div>
    <div class="<?php echo $container_class; ?>">
        <?php echo do_shortcode($content); ?>
        <?php if ($wellnesscenter_intro == 'y'): ?>
            <a class="scroll-down scroll-next-btn" href="#next"><i class="fa fa-angle-down"></i></a>  
            <?php endif; ?>

    </div>
</section>
