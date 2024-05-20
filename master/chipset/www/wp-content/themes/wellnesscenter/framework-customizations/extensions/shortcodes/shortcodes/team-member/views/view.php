<?php
if (!defined('FW')) {
    die('Forbidden');
}

if (empty($atts['image'])) {
    $image = fw_get_framework_directory_uri('/static/img/no-image.png');
} else {
    $image = $atts['image']['url'];
}
?>
<div class="fw-team team-member <?php echo esc_attr($atts['class']); ?> wow fadeInTop animated" data-wow-offset="120" data-wow-duration="1.5s">
    <div class="fw-ratio-container fw-ratio-1">
        <div class="fw-team-image"><img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($atts['name']); ?>"/></div>
    </div>
    
    <div class="fw-team-inner">
        <div class="fw-team-name">
            <?php if ($atts['name'] != '') : ?>
                <h2><?php echo wellnesscenter_theme_translate(esc_html($atts['name'])); ?></h2>
            <?php endif; ?>
            <?php if ($atts['job'] != '') : ?>
                <h5><?php echo wellnesscenter_theme_translate(esc_html($atts['job'])); ?></h5>
            <?php endif; ?>
        </div>
        <?php if ($atts['desc'] != '') : ?>
            <div class="fw-team-text"><?php echo wellnesscenter_theme_translate(wellnesscenter_editor_data($atts['desc'])); ?></div>
        <?php endif; ?>
        <?php if (!empty($atts['socials'])) : ?>
            <div class="fw-team-socials clearfix">
                <?php foreach ($atts['socials'] as $item) : ?>
                    <a target="_blank" href="<?php echo esc_url($item['social-link']); ?>">
                        <?php
                        
                            if (!empty($item['icon_class'])) {
                              echo   $icon = '<i class="' . $item['icon_class'] . '"></i>';
                            }
                        ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>