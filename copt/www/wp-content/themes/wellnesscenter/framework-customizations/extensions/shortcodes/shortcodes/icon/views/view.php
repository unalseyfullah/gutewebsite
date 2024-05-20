<?php
if (!defined('FW')) {
    die('Forbidden');
}

/**
 * @var array $atts
 */
?>
<div class="fw-inline-icon-warper">
<?php
$icons = $atts['icons'];

foreach($icons as $icon): ?>
<a class="wow fadeInLeft animated inline-icon" data-wow-offset="10" data-wow-duration="1.5s" title="<?php echo esc_attr($icon['title']); ?>" href="<?php echo esc_url($icon['link']); ?>" target="<?php echo esc_attr($icon['target']); ?>">
    <i class="<?php echo   $icon['icon'] ?>"></i>
</a>
<?php endforeach; ?>
</div>