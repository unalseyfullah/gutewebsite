<?php 
/**
 * footer.php
 *
 * The template for displaying the footer.
 */
?>
<div class="clearfix"></div>
<!-- Footer Simple start -->
<footer class="footer-simple wow fadeIn" id="footer-simple-1">
    <div id="sidebarRow">
        <div class="container">
            <div id="footer-sidebar">
                <?php
                $col = 12 / 4;
                for ($count = 1; $count <= 4; $count++): ?>
                    <div class="col-lg-<?php echo $col; ?> col-md-<?php echo $col; ?> col-sm-6 col-xs-12">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('custom_footer_ahmet_' . $count) ) : ?>
                            <?php dynamic_sidebar( 'custom_footer_ahmet_' . $count ); ?>
                        <?php endif; ?>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
    <hr style="border-top: 2px solid white; margin-top: 0px; margin-bottom: 0px;">
    <div id="copyrightRow">
        <div class="container">
            <div class="col-md-7">
                <p><?php echo wellnesscenter_editor_data(wellnesscenter_get_option('footer_text', 'Copyright Book. All Rights Reserved.')); ?></p>
            </div>
            <div class="col-md-3">
                <ul class="social-media">
                    <?php
                    if (defined('FW')) {

                        $socials = wellnesscenter_get_option('socials');
                        foreach ($socials as $social):
                            ?>
                            <li>
                                <a href="<?php echo esc_url($social['social-link']); ?>" target="_blank">
                                    <i class="<?php echo esc_attr($social['icon_class']); ?>"></i>
                                </a>
                            </li>
                            <?php
                        endforeach;
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-2">
                IMPRESSUM
            </div>
        </div>
    </div>
</footer>
<!-- Footer Simple end -->


<a href="#" class="scroll-up-btn hidden-xs"><i class="fa fa-angle-up"></i></a>

<!-- Appointment Modal Start -->
<div class="modal fade ool" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

                <!-- Modal header start -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="appointmentModalLabel"><?php echo esc_html(wellnesscenter_get_option('modal_title', 'Request an Appointment')); ?></h4>
                </div>
                <!-- Modal header end -->

                <!-- Modal body start -->
                <div class="modal-body">
                    <!-- Appointment Info start -->
                    <div class="info-box">
                        <h3><i class="fa fa-info-circle"></i> <?php echo esc_html(wellnesscenter_get_option('modal_sub_title', 'Upon completing this booking, you will receive a booking confirmation!')); ?></h3>
                    </div>
                    <!-- Appointment Info end -->

                <?php
                    if(wellnesscenter_get_option('booking_method', 'vfb') == 'vfb'){
                        echo do_shortcode('[vfb id=1]');
                    }else{
                        echo do_shortcode('[booked-calendar]');
                    }

                   ?>
                </div>
        </div>
    </div>
</div>

<!-- Appointment Modal end -->

<div class="hidden" id="xs_form_success"><div class="vfb-form-success"><?php echo wellnesscenter_editor_data(wellnesscenter_get_option('booking_success_text', 'Your information was successfully submitted.')); ?></div></div>
<?php wp_footer(); ?>
</body>
</html>