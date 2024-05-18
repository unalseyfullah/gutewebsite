<?php if (!defined('FW')) die('Forbidden'); ?>

<?php

$slides = $atts['screenshot_images'];

?>

<div class="gallery">
    <div class="row gallery-container wow fadeIn" data-wow-offset="120" data-wow-duration="1.5s">
        <?php
        foreach ($slides as $slide) :
            $large_images = $small_images = $iframeClass = '';

            if (!empty($slide['large_images'])) {
                $large_images = $slide['large_images']['url'];
            }
            if (!empty($slide['small_images'])) {
                $small_images = $slide['small_images']['url'];
            }
            if (!empty($slide['video_link'])) {
                $videoID = wellnesscenter_getYoutubeIdFromUrl($slide['video_link']);
                $large_images = 'http://www.youtube.com/embed/'.$videoID.'?autoplay=1';
                $iframeClass = 'fancybox.iframe gal-video';
            }
            ?>
            <!--Gallery Item-->
            <div class="col-md-4">
                <div class="gallery-thumbnail-container">
                    <a class="fancybox <?php echo  $iframeClass; ?>" rel="gallery1" href="<?php echo esc_url($large_images); ?>" title="<?php echo esc_html($slide['title']); ?>">
                        <img class="img-responsive gallery-thumbnail" src="<?php echo esc_url($small_images); ?>" alt="<?php echo esc_html($slide['title']); ?>">
                        <div class="gallery-thumbnail-overlay">
                            <div class="gallery-img-title"><?php echo esc_html($slide['title']); ?></div>
                            <div class="gallery-img-subtitle"><?php echo esc_html($slide['sub_title']); ?></div>
                        </div>
                        <i class="fa gallery-pl fa-play-circle-o "></i>
                    </a>
                </div>
            </div>

    <?php endforeach; ?>
    </div>
</div>