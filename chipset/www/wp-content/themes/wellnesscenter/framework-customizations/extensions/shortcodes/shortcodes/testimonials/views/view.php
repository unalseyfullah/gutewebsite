<?php
if (!defined('FW')) {
    die('Forbidden');
}

$id = uniqid('review-slider-');

$indicators = $activeClass = "";
$i = 0;
?>
<!-- Reviews Info start -->
<section class="review-slider wow fadeIn" data-wow-offset="100" id="<?php echo $id ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div id="carousel-<?php echo $id ?>" class="carousel slide" data-ride="carousel" data-interval="6000">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <!--Review Item 1 start-->
                        <?php
                        $testimonials = $atts['testimonials'];
                        foreach ($testimonials as $testimonial):

                            $activeClass = ($i < 1) ? ('active') : (' ');
                            ?>
                            <div class="item <?php echo $activeClass; ?>">
                                <div class="reviews-image">
                                    <img src="<?php echo esc_url($testimonial['author_image']['url']) ?>" alt="<?php echo esc_attr($testimonial['author_name']) ?>"/>
                                </div>
                                <p class="reviews-author"><?php echo esc_html($testimonial['author_name']) ?>
                                    <small>
                                        <i class="fa fa-map-marker"></i> <?php echo esc_html($testimonial['author_title']) ?>
                                        <span class="reviews-author-rating">
                                            <?php
                                            for ($x = 1; $x <= 5; $x++) {
                                                if (intval($testimonial['rating']) >= $x) {
                                                    echo '<i class="fa fa-star"></i>';
                                                } else {
                                                    echo '<i class="fa fa-star-o"></i>';
                                                }
                                            }
                                            ?>
                                        </span>
                                    </small>
                                </p>
                                <p class="reviews-content"><?php echo esc_textarea($testimonial['content']) ?></p>
                            </div>
                            <?php
                            $indicators .='<li data-target="#carousel-' . $id . '" data-slide-to="' . $i . '" class="' . $activeClass . '"></li>';
                            $i++;
                            ?>
                        <?php endforeach; ?>
                        <!--Review Item 1 end-->
                    </div>

                    <!-- Indicators -->
                    <ol class="carousel-indicators"><?php echo $indicators; ?></ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Reviews Info end -->