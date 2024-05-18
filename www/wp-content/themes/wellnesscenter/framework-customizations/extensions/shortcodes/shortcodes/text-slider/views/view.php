<?php
if (!defined('FW'))
    die('Forbidden');
/**
 * @var $atts
 */
$style = "";

if ($atts['color'] != "") {
    $style .= "style=\"color:" . esc_attr($atts['color']) . ";\" ";
}
?>
<div class="home-title-slider text-center">

    <div class="cd-intro">
        <h1 <?php echo $style; ?> class="cd-headline slide <?php echo $atts['position']; ?>">
<?php echo esc_html($atts['before_text']); ?>

            <!--Word Slider start-->

<?php if (!empty($atts['slider_text'])) : $i = 0; ?>
                <span class="cd-words-wrapper">
                <?php foreach ($atts['slider_text'] as $item) : ?>
                        <b class="<?php
                        echo ($i < 1) ? ('is-visible') : (' ');
                        $i++;
                        ?>" >
                        <?php echo esc_html($item['title']); ?>
                        </b>
                           <?php endforeach; ?>
                </span>
                <?php endif; ?>

            <!--Word Slider end-->

<?php echo esc_html($atts['after_text']); ?>
        </h1>

    </div>
    <p><?php echo esc_html($atts['subtitle']); ?></p>
</div>