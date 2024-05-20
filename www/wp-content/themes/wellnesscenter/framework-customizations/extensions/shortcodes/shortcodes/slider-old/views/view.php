<?php
if (!defined('FW')) {
    die('Forbidden');
}

$id = uniqid('image-slider-');
//fw_print();

$indicators = $activeClass = "";
$i = 0;
?>
<div id="carousel-<?php echo $id ?>" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

        <!--Review Item 1 start-->
        <?php
        $slides = $atts['bt_slider'];
        foreach ($slides as $slide):

            $activeClass = ($i < 1) ? ('active') : (' ');
            ?>
            <div class="item <?php echo $activeClass; ?>">
                <img src="<?php echo esc_url($slide['author_image']['url']) ?>" alt="<?php echo esc_attr($slide['slide_title']) ?>"/>
                <div class="home-title-slider"> <!--slider-overlay -->
                    <div class="carousel-caption">
                        <h1 class="bt-slide-title" style=" color: <?php
                        if (isset($atts['bt_slider_color'])) {
                            echo $atts['bt_slider_color'];
                        }
                        ?>;"><?php echo esc_html($slide['slide_title']) ?></h1>
                        <p style=" color: <?php
                    if (isset($atts['bt_slider_sub_color'])) {
                        echo $atts['bt_slider_sub_color'];
                    }
                    ?>;"><?php echo esc_html($slide['slide_subtitle']) ?></p>
                    </div>
                </div>
            </div>
            <?php
            $indicators .='<li data-target="#carousel-' . $id . '" data-slide-to="' . $i . '" class="' . $activeClass . '"></li>';
            $i++;
            ?>
<?php endforeach; ?>
        <!--Review Item 1 end-->
        <a class="left carousel-control" href="#carousel-<?php echo $id ?>" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-<?php echo $id ?>" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Indicators -->
    <ol class="carousel-indicators"><?php echo $indicators; ?></ol>
</div>