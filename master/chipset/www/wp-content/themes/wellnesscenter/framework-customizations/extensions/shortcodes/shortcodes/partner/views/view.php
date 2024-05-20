<?php if (!defined('FW')) die('Forbidden'); ?>

<?php
$partner_img = '';
if ($atts['partner_img']) {
    $partner_img = $atts['partner_img']['url'];
}
$partner_link = $atts['partner_link'];
?>


<div class="client-wrapper2 wow fadeIn animated" data-wow-offset="120" data-wow-duration="1.5s">
    <?php if ($partner_link): ?>
	<a href="<?php echo esc_url($partner_link); ?>"> <img alt="client" src="<?php echo esc_url($partner_img); ?>"></a>
    <?php else :
        ?>
        <img alt="client" src="<?php echo esc_url($partner_img); ?>">
    <?php endif; ?>
</div>
