<?php

add_action('wp_head', '_action_wellnesscenter_hook_css', 100);

function _action_wellnesscenter_hook_css() {
    if (defined('FW')) {
        
        /*
         * GOOGLE FONT USE
         */
         //home subtitle style
        $body = wellnesscenter_get_option('body_font', array('family' => 'Roboto', 'style'=> 'normal'));
        $titleBgSrc = wellnesscenter_get_image('title_bg', WELLNESSCENTER_IMAGES . '/cta-background.png');

        if ($body != '') {
            $style = $body['style'];
            if($style == ""){
                $style = '300';
            }
            if ($style === 'regular') {
                $style = '400';
            }
            if ($style == 'italic') {
                $style = '400italic';
            }
            $font_style = ( strpos($style, 'italic') ) ? 'font-style: italic;' : '';
            $font_weight = 'font-weight: ' . intval($style) . '! important;';

            $font = "body { font-family: '".$body['family']."', sans-serif;  ".$font_style." ".$font_weight." }";
        }
            $titleBg = '#teaser-blog { background-image: url('.$titleBgSrc.'); }';
        
        
        //custom css
        $custom_css = wellnesscenter_get_option('custom_css');
        $output = "<style type='text/css'>"
                . $titleBg
                . $font
                . $custom_css
                . "</style>";
        echo wellnesscenter_return($output);
    }
}



add_action('wp_head', '_action_wellnesscenter_hook_color', 110);

function _action_wellnesscenter_hook_color() {
    if (defined('FW')) {
		
		$styling_group = wellnesscenter_get_option('general_styling_header', array('main_color' => '#7d3c93'));
		$mainColor = $styling_group['main_color'];
		$lightColor = wellnesscenter_colorFeq($mainColor, 0.5);

        echo '<style type="text/css"> #appointmentModal .modal-dialog .modal-content .modal-body .service-and-date .input-group-addon,#appointmentModal .modal-dialog .modal-content .modal-header,#page-preloader,#teaser-blog,.btn.btn-color1,.btn.btn-primary,.btn.btn-success,.call-to-action,.error-page form .input-group-addon,.gallery .gallery-container .gallery-thumbnail-container .gallery-thumbnail-overlay,.label-default,.meta-featured-post,.newsletter-simple form .newsletter-submit:hover,.pagination .page-numbers li.active,.pricing-table .pricing-table-offer.highlight-col .offer-action button,.pricing-table .pricing-table-offer.highlight-col .offer-title,.review-slider .carousel-indicators li,.sidebar .widget .tagcloud a,.tooltip .tooltip-inner,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{background-color:' . $mainColor . '}.about-us-large .person:hover .person-img .person-img-background,.btn.btn-color1:hover,.btn.btn-primary:hover,.btn.btn-success:hover,.pricing-table .pricing-table-offer.highlight-col .offer-price,.pricing-table .pricing-table-offer:hover .offer-action button:hover,.pricing-table .pricing-table-offer:hover .offer-price,.search-form form .input-group-addon, a.more-link{background-color:' . $lightColor . '}#appointmentModal .modal-dialog .modal-content .modal-body .newsletter-checkbox input[type=checkbox]:checked.label:before,#appointmentModal .modal-dialog .modal-content .modal-body .service-and-date .service-select select,#appointmentModal .modal-dialog .modal-content .modal-body .service-and-date .service-select:after,#appointmentModal .modal-dialog .modal-content .modal-body .service-and-date .time-select:after,#appointmentModal .modal-dialog .modal-content .modal-body h2,#appointmentModal .modal-dialog .modal-content .modal-body h3,#footer-bar h2,.about-us-large .person .person-socialmedia li a:hover,.about-us-large .person h3,.about-us-large h2 small,.author-post .author-content h2,.blog-post.blog-card .post-title a,.btn.navbar-btn:hover,.call-to-action .btn,.contact-form-gmap .contact-info .address-icon,.contact-form-gmap .contact-info .phone-icon,.contact-form-gmap h2 small,.contact-info .address-icon,.contact-info .phone-icon,.content-img-right h3,.error-page form .input-group input,.error-page h3,.features-img h3,.fw-list.list-icon li i,.fw-quote small:before,.fw-tabs-left.fw-tabs-minimal .nav-tabs>li.active>a,.fw-tabs-left.fw-tabs-minimal .nav-tabs>li.active>a:focus,.fw-tabs-left.fw-tabs-minimal .nav-tabs>li.active>a:hover,.fw-tabs-minimal .nav-tabs>li.active>a,.fw-tabs-minimal .nav-tabs>li.active>a:focus,.fw-tabs-minimal .nav-tabs>li.active>a:hover,.fw-tabs-minimal .nav-tabs>li>a:hover,.fw-team .fw-team-socials a:hover,.intro-full-screen h1,.my-tooltip,.navigation-top .navbar-nav li a.btn:hover,.navigation-top .navbar-nav li a:hover,.pagination .page-numbers li a,.pricing-table .pricing-table-offer.highlight-col .offer-price,.pricing-table .pricing-table-offer.highlight-col .offer-price .currency,.pricing-table .pricing-table-offer:hover .offer-action button,.pricing-table .pricing-table-offer:hover .offer-price,.pricing-table .pricing-table-offer:hover .offer-title,.pricing-table h2 small,.product-info h3,.product-info ul li i,.review-slider .reviews-author,.review-slider .reviews-header,.search-form form .input-group input,.section-header .fw-special-title small,.sidebar .widget ul li i,.sidebar .widget-title,.single .meta-featured-post,.single-post-tags li:first-of-type,.tab-content .nav-tabs li a:hover,.tab-content .nav-tabs li.active a,.tab-content .tab-content h4,.tab-content h2 small,a,a:active,a:hover,a:visited, .gallery-pl, .bt-slide-title{color:' . $mainColor . '}.about-us-large .person .person-socialmedia li a::before,.contact-form-gmap .contact-info .address-icon,.contact-form-gmap .contact-info .phone-icon,.contact-info .address-icon,.contact-info .phone-icon,.fw-quote small:before,.fw-tabs-left.fw-tabs-minimal .nav-tabs>li.active>a,.fw-tabs-left.fw-tabs-minimal .nav-tabs>li.active>a:focus,.fw-tabs-left.fw-tabs-minimal .nav-tabs>li.active>a:hover,.fw-tabs-minimal .nav-tabs>li.active>a,.fw-tabs-minimal .nav-tabs>li.active>a:focus,.fw-tabs-minimal .nav-tabs>li.active>a:hover,.fw-tabs-minimal .nav-tabs>li>a:hover,.my-tooltip,.pricing-table .pricing-table-offer:hover .offer-action button,.review-slider .carousel-indicators .active,.tab-content .nav-tabs li a:hover,.tab-content .nav-tabs li.active a,.tab-content .tab-content .tab-content-img,.tooltip .tooltip-arrow,ol.comments li div.vcard img.photo, .btn.navbar-btn::before,.blog-post blockquote{border-color:' . $mainColor . '}.blog-post .post-attachment,.features-img .feature-img{border-color:' . $lightColor . '} .navigation-top .navbar-nav li a.btn:hover, #appointmentModal .modal-dialog .modal-content .modal-body .service-and-date .service-select, .wp-calendar td#today, .pricing-table .pricing-table-offer.highlight-col .offer-action button:hover{color: ' . $mainColor . '!important; }::selection{background:' . $mainColor . '}::-moz-selection{background:' . $mainColor . '} #page-preloader { background-color: '.$mainColor.'; position: absolute; width: 100%; height: 100%; z-index: 9999; padding-top: 8%; top: 0; }'
                . '.woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce button.button.alt, .woocommerce .cart .button, .woocommerce .cart input.button,.woocommerce input.button, .woocommerce input.button.alt{background: '.$mainColor.';}.woocommerce-cart .wc-proceed-to-checkout a:hover.checkout-button, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{background: '.$mainColor.';}.woocommerce span.onsale {background-color: '.$mainColor.';}.woocommerce div.product p.price, .woocommerce div.product span.price {color: '.$mainColor.';}.woocommerce .woocommerce-message, .woocommerce .woocommerce-info {border-top-color: '.$mainColor.';}.woocommerce .woocommerce-message:before, .woocommerce .star-rating span:before {color: '.$mainColor.';}.woocommerce #respond input#submit, .fw-shortcode-calendar .day-highlight {background: '.$mainColor.';}.widget_product_search .search-form input[type=\'submit\'],a.button.add_to_cart_button.product_type_simple, .widget_product_search input[type=\'submit\'] {background-color:'.$mainColor.';}#sidebar .buttons a{background-color:'.$mainColor.';} </style>';
    }
}



//header .navbar-default .navbar-collapse {border: 14px solid '.$mainColor.';}
add_action('wp_footer', '_action_wellnesscenter_hook_js', 1);

function _action_wellnesscenter_hook_js() {
    $styling_group = wellnesscenter_get_option('general_styling_header', array('main_color' => '#7d3c93'));
    $main_color = $styling_group['main_color'];
    $config = "\nvar wellnessSettings = { \n";  

    $config .= "color :      '".'.$mainColor.'."', \n";
    $config .= "onScroll :   '".wellnesscenter_get_option('onScroll', 'yes')."', \n";

    $config .= '};';
    //custom css
    $custom_js = wellnesscenter_get_option('custom_js');
    $output = "<script type='text/javascript'>"
            . $config
            . "\n\r\n\r"
            . $custom_js
            . "</script> \n";
    echo wellnesscenter_return($output);
}


