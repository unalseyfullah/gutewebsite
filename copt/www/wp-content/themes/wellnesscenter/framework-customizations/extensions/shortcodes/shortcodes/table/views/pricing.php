<?php
if (!defined('FW')) {
    die('Forbidden');
}

/**
 * @var array $atts
 */
$class_width = 'fw-col-md-' . ceil(12 / count($atts['table']['cols']));
?>
<div class="pricing-table">

    <?php foreach ($atts['table']['cols'] as $col_key => $col): ?>
        <div class="pricing-table-offer <?php echo   $class_width . ' ' . $col['name']; ?> ">
                <?php foreach ($atts['table']['rows'] as $row_key => $row): ?>
                    <?php if ($row['name'] === 'heading-row'): ?>
                        <?php $heading = esc_html($atts['table']['content'][$row_key][$col_key]['heading']); ?>
                        <?php $sub_heading = esc_html($atts['table']['content'][$row_key][$col_key]['sub_heading']); ?>
                        <div class="offer-title">
                           <?php echo (empty($heading) && $col['name'] === 'desc-col') ? '&nbps;' : $heading; ?> <small><?php echo (empty($sub_heading) && $col['name'] === 'desc-col') ? '&nbps;' : $sub_heading; ?></small>
                        </div>


                    <?php elseif ($row['name'] == 'switch-row') : ?>
                        <?php $button_text = esc_html($atts['table']['content'][$row_key][$col_key]['button_text']); ?>
                        <div class="offer-action">
                            <button class="btn btn-lg show-appointment-modal" data-service=""><?php echo (empty($button_text) && $col['name'] === 'desc-col') ? '&nbps;' : $button_text; ?></button>
                        </div>


                    <?php elseif ($row['name'] == 'button-row') : ?>
                        <?php $button = fw_ext('shortcodes')->get_shortcode('button'); ?>
                        <div class="offer-action">
                            <?php if (false === empty($atts['table']['content'][$row_key][$col_key]['button']) and false === empty($button)) : ?>
                                <?php echo   $button->render($atts['table']['content'][$row_key][$col_key]['button']); ?>
                            <?php else : ?>
                                <span>&nbsp;</span>
                            <?php endif; ?>
                        </div>


                    <?php elseif ($row['name'] == 'pricing-row') : ?>
                        <?php $currency = esc_html($atts['table']['content'][$row_key][$col_key]['currency']); ?>
                        <?php $amount = esc_html($atts['table']['content'][$row_key][$col_key]['amount']); ?>
                        <?php $description = esc_html($atts['table']['content'][$row_key][$col_key]['description']); ?>
                        <div class="offer-price">
                            <span class="currency"><?php echo (empty($currency) && $col['name'] === 'desc-col') ? '&nbps;' : $currency; ?></span>
                            <span class="price"><?php echo (empty($amount) && $col['name'] === 'desc-col') ? '&nbps;' : $amount; ?></span>
                            <span class="duration"><?php echo (empty($description) && $col['name'] === 'desc-col') ? '&nbps;' : $description; ?></span>
                        </div>


                    <?php elseif ($row['name'] === 'default-row') : ?>
                        <div class="fw-default-row">
                            <?php $value = $atts['table']['content'][$row_key][$col_key]['textarea']; ?>
                            <?php echo esc_html($value) ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

    <div class="clearfix"></div>
</div>