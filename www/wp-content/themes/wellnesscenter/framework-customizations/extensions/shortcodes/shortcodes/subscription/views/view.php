<?php if ( !defined( 'FW' ) ) die( 'Forbidden' ); ?>

<div class="row newsletter-simple">
    <div class="col-md-12"><div class="alert kk" id="newsletter-form-msg"></div></div>
    <div class="col-md-6 wow fadeInLeft">
        <!--newsletter-call-to-action start-->
        <div class="newsletter-call-out text-left">
            <i class="fa fa-gift"></i>
            <h2><?php echo esc_html($atts['newsletter_title']) ?></h2>
            <p><?php echo esc_html($atts['newsletter_subtitle']) ?></p>
        </div>
        <!--newsletter-call-to-action end-->
    </div>
    <div class="col-md-6 wow fadeInRight">
        <form action="<?php echo esc_url(WELLNESSCENTER_PHPSCRIPTS . '/subscribe.php' );?>" method="post" id="newsletter-form">
            <input type="hidden" name="action" value="send_newsletter_form">
            <div class="input-group">
                <input name="email" type="email" class="newsletter-email form-control" placeholder="<?php echo esc_attr($atts['email_text']) ?>">
    <span class="input-group-btn">
                    <button type="submit" class="btn btn-default btn-gray newsletter-submit"><?php echo esc_html($atts['button_text']) ?> <i class="fa fa-caret-right"></i></button>
    </span>
            </div>
        </form>
    </div>
</div>