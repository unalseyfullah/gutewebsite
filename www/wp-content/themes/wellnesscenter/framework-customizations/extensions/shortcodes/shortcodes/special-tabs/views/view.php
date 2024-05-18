<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'tab-' );
if ( empty( $atts['tabs'] ) ) {
	return;
}
?>


<!-- Tab Content start -->
<div class="tab-content">

    <div role="tabpanel">
        <!-- Nav Tabs start  -->
        <div class="tab-content-nav">
            <ul class="nav nav-tabs" role="tablist">
        <?php $counter = 1;
        foreach ( $atts['tabs'] as $tab ) : ?>
            <li <?php echo ($counter == 1) ? 'class="active"' : '';?>>
                <a href="#<?php echo   $id.'-'.$counter;?>" data-toggle="tab" aria-controls="<?php echo   $id.'-'.$counter;?>"  role="tab" >
                    <?php echo wellnesscenter_theme_translate(esc_html($tab['tab_title'])); ?>
                </a>
            </li>
                <?php $counter++;
        endforeach; ?>
            </ul>
        </div>
        <!-- Nav Tabs end  -->

        <!-- Tab Panes Start -->
        <div class="tab-content">
        <?php $cnt = 1;
        foreach ( $atts['tabs'] as $tab ) : ?>

        <?php
            $cimg = '<div class="col-md-5"> <div class="tab-content-img"> <img src="'. esc_url(wellnesscenter_get_image($tab['tab_content_image'], '', true)).'" alt="'.wellnesscenter_theme_translate(esc_attr($tab['tab_content_title'])).'" class="img-responsive"/> </div> </div>';
        ?>
            <div id="<?php echo   $id.'-'.$cnt;?>" class="tab-pane fade <?php echo ($cnt == 1) ? 'in active' : '';?>">
                <div class="row">
                    <?php if ($cnt % 2 != 0) { echo   $cimg; } ?>
                    <div class="col-md-7">
                        <?php if(!empty($tab['tab_content_title'])):?>
                            <h3><?php echo wellnesscenter_theme_translate(esc_html($tab['tab_content_title'])); ?></h3>
                        <?php endif;?>

                        <?php if(!empty($tab['tab_content_sub_title'])):?>
                            <h4><?php echo wellnesscenter_theme_translate(esc_html($tab['tab_content_sub_title'])); ?></h4>
                        <?php endif;?>

                        <?php if(!empty($tab['tab_content'])):?>
                            <?php echo wellnesscenter_theme_translate(wellnesscenter_editor_data(do_shortcode($tab['tab_content']) ));?>
                        <?php endif;?>
                    </div>
                    <?php if ($cnt % 2 == 0) { echo   $cimg; } ?>
                </div>
            </div>
        <?php $cnt++; endforeach; ?>

        </div>
        <!-- Tab Panes End -->
    </div>
</div>
