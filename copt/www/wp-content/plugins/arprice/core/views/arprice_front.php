<?php

if (!function_exists('arp_get_pricing_table_string')) {

    function arp_get_pricing_table_string($table_id, $pricetable_name = "", $is_tbl_preview = 0) {

        $font_awesome_match = array();
        $arp_inc_effect_css = array();

        wp_enqueue_script('arprice_js');

        
        wp_enqueue_style('arprice_front_css');

        global $wpdb, $arprice_form, $arp_mainoptionsarr, $arp_pricingtable, $arp_templateresponsivearr, $arp_template_column_radius, $arprice_version, $arprice_images_css_version, $arprice_default_settings, $arprice_old_template_css, $arp_animate_price,$arprice_fonts;
        $arp_responsive_arr = $arprice_default_settings->arprice_responsive_width_array();
        $arp_mainoptionsarr = $arp_pricingtable->arp_mainoptions();
        $arp_templateresponsivearr = $arp_pricingtable->arp_template_responsive_type_array();
        $arp_col_wrapper_height = $arprice_default_settings->arprice_column_wrapper_height();
        $arp_col_wrapper_highlighted_height = $arprice_default_settings->arprice_default_highlighted_column_height_with_hover_effect();
        $arp_col_wrapper_default_height = $arprice_default_settings->arprice_column_wrapper_default_height();


        $id = $table_id;
        $name = $pricetable_name;

        if ($is_tbl_preview && $is_tbl_preview == 1) {
            if (isset($_REQUEST['optid']) && $_REQUEST['optid'] != '') {
                $post_values = get_option($_REQUEST['optid']);
                $post_values = json_decode(stripslashes_deep($post_values['filtered_data']), true);
                $get_preview_data = $arprice_form->get_preview_table($post_values);

                //update_option( $_REQUEST['optid'], '' );
                $id = $table_id = $get_preview_data['table_id'];
                $is_template = $get_preview_data['is_template'];
                $is_animated = $get_preview_data['is_animated'];
                $opts = maybe_unserialize($get_preview_data['table_options']);
                $general_option = maybe_unserialize($get_preview_data['general_options']);

                $arp_template_name = $get_preview_data['template_name'];
            }
        } else {
            $sql = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE ID = %d AND status = %s ", $id, 'published'));
            $table_id = $sql->ID;
            $sql_opt = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice_options WHERE table_id = %d ", $table_id));
            $is_template = $sql->is_template;
            $is_animated = $sql->is_animated;
            $opts = maybe_unserialize($sql_opt[0]->table_options);
            $general_option = maybe_unserialize($sql->general_options);
            $arp_template_name = $sql->template_name;
        }

        $table_cols = array();
        $table_cols = $table_cols_new = $opts['columns'];

        if (isset($is_template) && !empty($is_template) && $is_template == 1) {
            wp_register_style('arptemplate_' . $table_id . '_v' . $arprice_images_css_version . '_css', PRICINGTABLE_URL . '/css/templates/arptemplate_' . $table_id . '_v' . $arprice_images_css_version . '.css', array(), $arprice_version);
            wp_enqueue_style('arptemplate_' . $table_id . '_v' . $arprice_images_css_version . '_css');
        } else {
            wp_register_style('arptemplate_' . $table_id . '_css', PRICINGTABLE_UPLOAD_URL . '/css/arptemplate_' . $table_id . '.css', array(), $arprice_version);

            wp_enqueue_style('arptemplate_' . $table_id . '_css');
        }

        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

        $maxrowcount = 0;
        if (is_array($table_cols)) {
            foreach ($table_cols as $countcol) {
                if (isset($countcol['rows']) && count($countcol['rows']) > $maxrowcount)
                    $maxrowcount = count($countcol['rows']);
            }
            $maxrowcount--;
        }

        $arp_tablet_view_width = $arp_mainoptionsarr['general_options']['template_options']['arp_tablet_view_width'];

        $opts['columns'] = $table_cols;

        $column_animation = $general_option['column_animation'];

        $is_animation = $column_animation['is_animation'];

        $column_settings = $general_option['column_settings'];

        $hover_type = $column_settings['column_highlight_on_hover'];



        $disable_hover_effect = $column_settings['disable_hover_effect'];
        $arp_global_button_class = '';
        $arp_global_button_type = isset($column_settings['arp_global_button_type']) ? $column_settings['arp_global_button_type'] : 'flat';
        $arp_global_button_class_array = $arprice_default_settings->arp_button_type();
        $arp_global_button_size = $arprice_default_settings->arp_button_size_new();

        if (isset($column_settings['disable_button_hover_effect']) && $column_settings['disable_button_hover_effect'] == 1) {
            $arp_global_button_class = @$arp_global_button_class_array[$arp_global_button_type]['class'] . ' arp_button_hover_disable';
        } else {
            $arp_global_button_class = @$arp_global_button_class_array[$arp_global_button_type]['class'];
        }


        $template_settings = $general_option['template_setting'];

        $general_settings = $general_option['general_settings'];

        $template_type = $template_settings['template_type'];

        $template = $template_settings['template'];

        $template_id = $template_settings['template'];

        $ref_template = $general_settings['reference_template'];

        $is_responsive = $general_option['column_settings']['is_responsive'];

        $template_feature = $arp_mainoptionsarr['general_options']['template_options']['features'][$ref_template];

        $hide_blank_row = isset($general_option['column_settings']['column_hide_blank_rows']) ? $general_option['column_settings']['column_hide_blank_rows'] : '';
        $informative_cls = '';
        if ($is_tbl_preview == 1 || ( isset($_REQUEST['home_view']) && $_REQUEST['home_view'] == 1 )) {
            if ($is_template == 1) {
                do_action('enqueue_preview_style', $arp_template_name, $arp_template_name, 0, $is_template);
            } else {
                do_action('enqueue_preview_style', $id, $id, 0, $is_template);
            }
        }

        $hostname = $_SERVER["HTTP_HOST"];
        global $arprice_class;
        $setact = 0;
        global $arpriceplugin;
        $setact = $arprice_class->$arpriceplugin();
        

        if ($is_tbl_preview != 0) {
            $setact = 1;
        }

        global $arp_has_tooltip;
        if ($setact != 1) {
            $arp_has_tooltip = 1;
        }


        $tablestring = "";


        if ($column_settings['column_border_radius_top_left'] > 0 or $column_settings['column_border_radius_top_right'] > 0 or $column_settings['column_border_radius_bottom_right'] > 0 or $column_settings['column_border_radius_bottom_left'] > 0) {

            $tablestring .= "<style type='text/css' media='all'>";

            if ($is_animated == 0) {

                if ($ref_template == 'arptemplate_10')
                    $tablestring .= ".arptemplate_$table_id .ArpPricingTableColumnWrapper .arpplan {";
                else
                    $tablestring .= ".arptemplate_$table_id .arp_column_content_wrapper {";

                $tablestring .= "border-radius:{$column_settings['column_border_radius_top_left']}px {$column_settings['column_border_radius_top_right']}px {$column_settings['column_border_radius_bottom_right']}px {$column_settings['column_border_radius_bottom_left']}px !important;";

                $tablestring .= " -moz-border-radius: {$column_settings['column_border_radius_top_left']}px {$column_settings['column_border_radius_top_right']}px {$column_settings['column_border_radius_bottom_right']}px {$column_settings['column_border_radius_bottom_left']}px !important;";

                $tablestring .= "-webkit-border-radius:{$column_settings['column_border_radius_top_left']}px {$column_settings['column_border_radius_top_right']}px {$column_settings['column_border_radius_bottom_right']}px {$column_settings['column_border_radius_bottom_left']}px !important;";

                $tablestring .= "-o-border-radius: {$column_settings['column_border_radius_top_left']}px {$column_settings['column_border_radius_top_right']}px {$column_settings['column_border_radius_bottom_right']}px {$column_settings['column_border_radius_bottom_left']}px !important;";

                if ($ref_template != 'arptemplate_10') {
                    $tablestring .= "overflow:hidden !important;";
                }

                $tablestring .= "}";

                if ($ref_template == 'arptemplate_6' or $ref_template == 'arptemplate_9') {

                    $tablestring .= ".arptemplate_$table_id .maincaptioncolumn .arpcaptiontitle {";

                    $tablestring .= " border-radius:{$column_settings['column_border_radius_top_left']}px {$column_settings['column_border_radius_top_right']}px 0 0 !important;";

                    $tablestring .= " -webkit-border-radius:{$column_settings['column_border_radius_top_left']}px {$column_settings['column_border_radius_top_right']}px 0 0 !important;";

                    $tablestring .= " -moz-border-radius:{$column_settings['column_border_radius_top_left']}px {$column_settings['column_border_radius_top_right']}px 0 0 !important;";

                    $tablestring .= " -o-border-radius:{$column_settings['column_border_radius_top_left']}px {$column_settings['column_border_radius_top_right']}px 0 0 !important;";

                    $tablestring .= "}";
                }
            } else {

                $tablestring .= ".arptemplate_$table_id .ArpPricingTableColumnWrapper { ";

                $tablestring .= "border-radius:{$column_settings['column_border_radius_top_left']}px {$column_settings['column_border_radius_top_right']}px {$column_settings['column_border_radius_bottom_right']}px {$column_settings['column_border_radius_bottom_left']}px !important;overflow:hidden !important;";

                $tablestring .= " -moz-border-radius: {$column_settings['column_border_radius_top_left']}px {$column_settings['column_border_radius_top_right']}px {$column_settings['column_border_radius_bottom_right']}px {$column_settings['column_border_radius_bottom_left']}px !important;overflow:hidden !important;";

                $tablestring .= "-webkit-border-radius:{$column_settings['column_border_radius_top_left']}px {$column_settings['column_border_radius_top_right']}px {$column_settings['column_border_radius_bottom_right']}px {$column_settings['column_border_radius_bottom_left']}px !important;overflow:hidden !important;";

                $tablestring .= "-o-border-radius: {$column_settings['column_border_radius_top_left']}px {$column_settings['column_border_radius_top_right']}px {$column_settings['column_border_radius_bottom_right']}px {$column_settings['column_border_radius_bottom_left']}px !important;overflow:hidden !important;";

                $tablestring .= "}";
            }

            $tablestring .= "</style>";
        }


        $title_cls = "";

        if ($column_animation['is_animation'] == 'yes') {
            $animation_margin = 'margin-bottom:45px;';
        } else {
            $animation_margin = '';
        }

        //pre render action
        do_action('arp_predisplay_pt_action', $table_id);
        do_action('arp_predisplay_pt_action' . $table_id, $table_id);

        $tablestring = apply_filters('arp_predisplay_pricingtable_filter', $tablestring, $table_id);

        $tablestring .= "<div class='arp_responsive_array_front' style='display:none;'>" . json_encode($arp_templateresponsivearr) . "</div>";





        if ($column_animation['is_animation'] == 'yes' and $column_animation['pagi_nav_btn'] == 'pagination_top')
            $tablestring .= "<div class='arp_pagination arp_pagination_top arp_paging_style_1' id='arp_slider_" . $id . "_paginatio_top'></div>";



        if ($column_settings['column_wrapper_width_txtbox'] != '') {
            $container_width = $column_settings['column_wrapper_width_txtbox'] . 'px;';
        } else {
            $container_width = $arp_mainoptionsarr['general_options']['wrapper_width'] . 'px;';
        }
        $cart_url = '';
        if (is_plugin_active('woocommerce/woocommerce.php')) {
            global $woocommerce;
            if (!empty($woocommerce) && method_exists($woocommerce->cart, 'get_cart_url')) {
                $cart_url = $woocommerce->cart->get_cart_url();
                if (( isset($_GET['added-to-cart']) and ! empty($_GET['added-to-cart']) ) or ( isset($_GET['add-to-cart']) and ! empty($_GET['add-to-cart']) )) {

                    
                            $tablestring .= "<input type='hidden' id='arp_carturl' name='arp_carturl' value='" . $cart_url . "' />";
                    
                }
            }
        }

        $display_column_mobile = isset($column_settings['display_col_mobile']) ? $column_settings['display_col_mobile'] : '';
        $display_column_tablet = isset($column_settings['display_col_tablet']) ? $column_settings['display_col_tablet'] : '';
        $display_column_desktop = isset($column_settings['display_col_desktop']) ? $column_settings['display_col_desktop'] : '';

        $general_option['column_settings']['toggle_column_animation'] = isset($general_option['column_settings']['toggle_column_animation']) ? $general_option['column_settings']['toggle_column_animation'] : '';
        $cart_url = isset($cart_url) ? $cart_url : '';
        
        if ($is_template == 1) {
            $template_name = $arp_template_name;
        } else {
            $template_name = $table_id;
        }
        /* tooltip changes start*/
        $tltp_bgcolor = $arprice_form->hex2rgb($general_option['tooltip_settings']['background_color']);


        if ($general_option['tooltip_settings']['style'] == 'normal' || $general_option['tooltip_settings']['style'] == 'drop') {
            $tooltip_bg_color = 'rgb(' . $tltp_bgcolor['red'] . ',' . $tltp_bgcolor['green'] . ',' . $tltp_bgcolor['blue'] . ')';
        } else if ($general_option['tooltip_settings']['style'] == 'glass') {
            $tooltip_bg_color = 'rgba(' . $tltp_bgcolor['red'] . ',' . $tltp_bgcolor['green'] . ',' . $tltp_bgcolor['blue'] . ',0.9)';
        } else if ($general_option['tooltip_settings']['style'] == 'alert') {
            $tooltip_bg_color = 'rgba(' . $tltp_bgcolor['red'] . ',' . $tltp_bgcolor['green'] . ',' . $tltp_bgcolor['blue'] . ',0.7)';
        }

        if ($general_option['tooltip_settings']['tooltip_width'] == '')
            $tooltip_max_width = 'null';
        else
            $tooltip_max_width = $general_option['tooltip_settings']['tooltip_width'];

        if ($general_option['tooltip_settings']['animation']) {
            $tooltip_animation = $general_option['tooltip_settings']['animation'];
        } else {
            $tooltip_animation = 'grow';
        }

        $tooltip_option = "";

        $animation_settings = "";

        $tooltip_width = $general_option['tooltip_settings']['tooltip_width'];

        $default_tooltip_width = $arp_mainoptionsarr['general_options']['tooltipsetting']['width'];

        if ($tooltip_width == '' or $tooltip_width == 0) {
            
            if ($default_tooltip_width == '') {
                $tooltip_width = '\'auto\'';
            } else {
                $tooltip_width = $default_tooltip_width;
            }
        } else {

            $tooltip_width = $tooltip_width;
        }


       
        if ($tooltip_animation == 'grow') {
            $animation_in = "zoomIn";
            $animation_out = "zoomOut";
        } else if ($tooltip_animation == 'fade') {
            $animation_in = "fadeIn";
            $animation_out = "fadeOut";
        } else if ($tooltip_animation == 'swing') {
            $animation_in = "swing";
            $animation_out = "fadeOut";
        } else if ($tooltip_animation == 'slide') {
            $animation_in = "fadeInLeftBig";
            $animation_out = "fadeOutLeftBig";
        } else if ($tooltip_animation == 'fall') {
            $animation_in = "fadeInDownBig";
            $animation_out = "fadeOutUpBig";
        }

        $tooltip_trigger_type = $general_option['tooltip_settings']['tooltip_trigger_type'];

        $tooltip_icon_position = isset($general_option['tooltip_settings']['tooltip_icon_position']) ? $general_option['tooltip_settings']['tooltip_icon_position'] : '';

        $tooltip_display_style = $general_option['tooltip_settings']['tooltip_display_style'];

        $tooltip_informative_icon = $general_option['tooltip_settings']['tooltip_informative_icon'];


        
        
        $tablestring .= "<div class='arp_template_main_container' id='arp_template_main_container' style='width:{$container_width}text-align:center;' data-hide-blank-rows='{$hide_blank_row}' data-is-tempalte='{$is_template}' data-woocomerce-cart-url='{$cart_url}' data-is-display-tooltip='{$setact}' data-mobile-width='" . get_option('arp_mobile_responsive_size') . "' data-is-responsive='{$general_option['column_settings']['is_responsive']}' data-is-animated='{$is_animated}' data-arp-template='arptemplate_{$table_id}' data-template-type='{$template_type}' data-table-preview='{$is_tbl_preview}' data-reference-template='{$ref_template}' data-hover-type='{$hover_type}' data-column-mobile='{$display_column_mobile}' data-column-tablet='{$display_column_tablet}' data-column-desktop='{$display_column_desktop}' data-all-column-width='{$column_settings['all_column_width']}' data-tablet-width='" . get_option('arp_tablet_responsive_size') . "' data-space-columns='{$column_settings['column_space']}' data-responsive-width-arr='" . json_encode($arp_responsive_arr[$ref_template]) . "' data-column-wrapper-width-arr='" . json_encode($arp_col_wrapper_height[$ref_template]) . "' data-is-price-animation='{$general_option['column_settings']['toggle_column_animation']}' data-column-wrapper-highlighted-height='".json_encode($arp_col_wrapper_highlighted_height[$ref_template])."' data-column-wrapper-default-height='".json_encode($arp_col_wrapper_default_height[$ref_template])."'  data-enable-analytics='".get_option('arp_enable_analytics',0)."'>";

        $tablestring .= "<div class='ArpTemplate_main' id=\"ArpTemplate_main\" style='clear:both;float:left;" . $animation_margin . "'>";
        
        $tablestring .= "<input type='hidden' id='ajaxurl' name='ajaxurl' value='" . admin_url('admin-ajax.php') . "' />";
        $column_ord = str_replace('\'', '"', $general_settings['column_order']);

        $col_ord_arr = json_decode($column_ord, true);



        if ($is_tbl_preview == 1 || $is_tbl_preview == 2) {
            if ($ref_template == 'arptemplate_5' || $ref_template == 'arptemplate_7') {
                $googlemap = 0;
                if ($opts['columns']) {
                    foreach ($opts['columns'] as $columns) {
                        $columns['is_new_window_actual'] = isset($columns['is_new_window_actual']) ? $columns['is_new_window_actual'] : '';

                        $html_content_shortcode = isset($columns['arp_header_shortcode']) ? $columns['arp_header_shortcode'] : "";
                        $html_content_sceond_shortcode = isset($columns['arp_header_shortcode_sceond']) ? $columns['arp_header_shortcode_sceond'] : "";
                        $html_content_third_shortcode = isset($columns['arp_header_shortcode_third ']) ? $columns['arp_header_shortcode_third '] : "";

                        if (preg_match('/arp_googlemap/', $html_content_shortcode))
                            $googlemap = 1;
                        if (preg_match('/arp_googlemap/', $html_content_sceond_shortcode))
                            $googlemap = 1;
                        if (preg_match('/arp_googlemap/', $html_content_third_shortcode))
                            $googlemap = 1;
                    }
                }

                if ($googlemap) {
                    $tablestring .= '<script type="text/javascript" language="javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>';
                    $tablestring .='<script type="text/javascript" language="javascript" src="' . PRICINGTABLE_URL . '/js/jquery.gomap-1.3.2.min.js"></script>';
                }
            }
        }

        $arp_default_character_arr = get_option('arp_css_character_set');
        $arp_subset = (isset($arp_default_character_arr) and ! empty($arp_default_character_arr)) ? "&subset=" . implode(',', $arp_default_character_arr) : '';

        if (is_ssl())
            $googlefontbaseurl = "https://fonts.googleapis.com/css?family=";
        else
            $googlefontbaseurl = "http://fonts.googleapis.com/css?family=";

        $default_fonts = $arprice_fonts->get_default_fonts();

        $including_google_fonts = array();        

        $tooltip_font_family = isset($general_option['tooltip_settings']['tooltip_font_family'])?$general_option['tooltip_settings']['tooltip_font_family']:'';
        if (!in_array($tooltip_font_family, $default_fonts) && $tooltip_font_family != '') {
            if (!in_array($tooltip_font_family, $including_google_fonts)) {
                $including_google_fonts[] = $tooltip_font_family;
            }
        }
         $general_column_settings = isset($general_option['column_settings'])?$general_option['column_settings']:array();
        if (!in_array($general_column_settings['price_font_family_global'], $default_fonts) && $general_column_settings['price_font_family_global'] != '') {
            if (!in_array($general_column_settings['price_font_family_global'], $including_google_fonts)) {
                $including_google_fonts[] = $general_column_settings['price_font_family_global'];
            }
        }
        if (!in_array($general_column_settings['header_font_family_global'], $default_fonts) && $general_column_settings['header_font_family_global'] != '') {
            if (!in_array($general_column_settings['header_font_family_global'], $including_google_fonts)) {
                $including_google_fonts[] = $general_column_settings['header_font_family_global'];
            }
        }
        if (!in_array($general_column_settings['body_font_family_global'], $default_fonts) && $general_column_settings['body_font_family_global'] != '') {
            if (!in_array($general_column_settings['body_font_family_global'], $including_google_fonts)) {
                $including_google_fonts[] = $general_column_settings['body_font_family_global'];
            }
        }
        if (!in_array($general_column_settings['footer_font_family_global'], $default_fonts) && $general_column_settings['footer_font_family_global'] != '') {
            if (!in_array($general_column_settings['footer_font_family_global'], $including_google_fonts)) {
                $including_google_fonts[] = $general_column_settings['footer_font_family_global'];
            }
        }
        if (!in_array($general_column_settings['button_font_family_global'], $default_fonts) && $general_column_settings['button_font_family_global'] != '') {
            if (!in_array($general_column_settings['button_font_family_global'], $including_google_fonts)) {
                $including_google_fonts[] = $general_column_settings['button_font_family_global'];
            }
        }
        if (!in_array($general_column_settings['description_font_family_global'], $default_fonts) && $general_column_settings['description_font_family_global'] != '') {
            if (!in_array($general_column_settings['description_font_family_global'], $including_google_fonts)) {
                $including_google_fonts[] = $general_column_settings['description_font_family_global'];
            }
        }

        
        $toggle_title_font_family = isset($general_option['general_settings']['toggle_title_font_family'])?$general_option['general_settings']['toggle_title_font_family']:'';
        if (isset($toggle_title_font_family) && !in_array($toggle_title_font_family, $default_fonts) && $toggle_title_font_family != '') {
            if (!in_array($toggle_title_font_family, $including_google_fonts)) {
                $including_google_fonts[] = $toggle_title_font_family;
            }
        }
           $toggle_button_font_family = isset($general_option['general_settings']['toggle_button_font_family'])?$general_option['general_settings']['toggle_button_font_family']:'';     
                if (isset($toggle_button_font_family) && !in_array($toggle_button_font_family, $default_fonts) && $toggle_button_font_family != '') {
            if (!in_array($toggle_button_font_family, $including_google_fonts)) {
                $including_google_fonts[] = $toggle_button_font_family;
            }
        }
        
        if (isset($including_google_fonts) and is_array($including_google_fonts) and ! empty($including_google_fonts)) {
            foreach ($including_google_fonts as $google_fonts) {
                $tablestring .=  '<link rel="stylesheet" type="text/css" href="' . $googlefontbaseurl . urlencode(trim($google_fonts)) . $arp_subset . '">';
            }
        }

        $tablestring .= "<style type='text/css' media='all'>";

        $tablestring .= $arprice_form->arp_render_customcss($template_name, $general_option, $is_tbl_preview, $opts, $is_animated);


        if (isset($column_settings['arp_load_first_time_after_migration']) ? $column_settings['arp_load_first_time_after_migration'] : '') {
            $old_template_css_array = $arprice_old_template_css->arprice_old_template_css_array();
            $old_css = $old_template_css_array[$ref_template][0];
            $css_new = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $table_id, $old_css);
            $tablestring .= $css_new;
        }

        if ($general_option['tooltip_settings']['style'] == 'normal') {
            $tablestring .= " .arp_tooltip_" . $id . " {
			border-radius:4px !important;
				-moz-border-radius:4px !important;
				-webkit-border-radius:4px !important;
				-o-border-radius:4px !important;
		}";
        } else if ($general_option['tooltip_settings']['style'] == 'glass') {
            $tablestring .= " .arp_tooltip_" . $id . " {
			border-radius:10px !important;
				-moz-border-radius:10px !important;
				-webkit-border-radius:10px !important;
				-o-border-radius:10px !important;
			box-shadow:0px 0px 20px rgba(0,0,0,0.3);
				-moz-box-shadow:0px 0px 20px rgba(0,0,0,0.3);
				-webkit-box-shadow:0px 0px 20px rgba(0,0,0,0.3);
				-o-box-shadow:0px 0px 20px rgba(0,0,0,0.3);			 
		}";
        } else if ($general_option['tooltip_settings']['style'] == 'alert') {
            $tablestring .= " .arp_tooltip_" . $id . " {
			border-radius:0px !important;
				-moz-border-radius:0px !important;
				-webkit-border-radius:0px !important;
				-o-border-radius:0px !important;
			box-shadow:0px 0px 20px rgba(0,0,0,0.3);
				-moz-box-shadow:0px 0px 20px rgba(0,0,0,0.3);
				-webkit-box-shadow:0px 0px 20px rgba(0,0,0,0.3);
				-o-box-shadow:0px 0px 20px rgba(0,0,0,0.3);			 
		}";
        } else if ($general_option['tooltip_settings']['style'] == 'drop') {
            $tablestring .= ".arp_tooltip_" . $id . " {
			border-radius:20px;
				-moz-border-radius:20px;
				-webkit-border-radius:20px;
				-o-border-radius:20px;
			padding:10px;
			text-align:center;
		}";
        }

        $arprice_hide_section_array = $arprice_default_settings->arprice_hide_section_array();
        $arprice_hide_section_array = $arprice_hide_section_array[$ref_template];

        if (isset($column_settings['hide_footer_global']) && $column_settings['hide_footer_global'] == '1') {
            foreach ($arprice_hide_section_array['arp_footer'] as $css_classs) {
                $tablestring .= ".arptemplate_" . $template_name . " " . $css_classs . " {display : none !important;}";
            }
        }
        $hide_header = false;
        if (isset($column_settings['hide_header_global']) && $column_settings['hide_header_global'] == '1') {
            foreach ($arprice_hide_section_array['arp_header'] as $css_classs) {
                $tablestring .= ".arptemplate_" . $template_name . "  " . $css_classs . " {display : none !important;}";
            }
            if ($ref_template === 'arptemplate_23') {
                $tablestring .= ".arptemplate_" . $template_name . " .arppricetablecolumntitle{display:none !important;}";
            }
            $hide_header = true;
        }
        $hide_price = false;
        if (isset($column_settings['hide_price_global']) && $column_settings['hide_price_global'] == '1') {
            foreach ($arprice_hide_section_array['arp_price'] as $css_classs) {
                $tablestring .= ".arptemplate_" . $template_name . "  " . $css_classs . "  {display : none !important;}";
            }
            $hide_price = true;
        }

        if ($hide_header == true && $hide_price == true && $ref_template === 'arptemplate_10') {
            $tablestring .= ".arptemplate_" . $template_name . " .planContainer.arp_ribbon_2 .arp_ribbon_container{ top:-33px !important; }";
        }

        if (isset($column_settings['hide_feature_global']) && $column_settings['hide_feature_global'] == '1') {
            foreach ($arprice_hide_section_array['arp_feature'] as $css_classs) {
                $tablestring .= ".arptemplate_" . $template_name . "  " . $css_classs . " {display : none !important;}";
            }
        }
        if (isset($column_settings['hide_description_global']) && $column_settings['hide_description_global'] == '1') {

            foreach ($arprice_hide_section_array['arp_description'] as $css_classs) {

                $tablestring .= ".arptemplate_" . $template_name . "  " . $css_classs . "  {display : none !important;}";
            }
        }
        if (isset($column_settings['hide_header_shortcode_global']) && $column_settings['hide_header_shortcode_global'] == '1') {
            foreach ($arprice_hide_section_array['arp_header_shortcode'] as $css_classs) {
                $tablestring .= ".arptemplate_" . $template_name . "  " . $css_classs . "  {display : none !important;}";
            }
        }
        $tablestring .= get_option('arp_global_custom_css');

        $tablestring .= isset($general_settings['arp_custom_css']) ? $general_settings['arp_custom_css'] : "";

        if (get_option('arp_desktop_responsive_size') and get_option('arp_desktop_responsive_size') > 0 and $general_option['column_settings']['is_responsive'] == 1) {
            $tablestring .= ".arp_template_main_container{ max-width:" . get_option('arp_desktop_responsive_size') . "px !important; }";
        }

        if (get_option('arp_mobile_responsive_size') and get_option('arp_mobile_responsive_size') > 0 and $general_option['column_settings']['is_responsive'] == 1) {
            $tablestring .= "
			@media all and (max-width:" . get_option('arp_mobile_responsive_size') . "px){";
            $tablestring .= ".arptemplate_" . $template_name . " .ArpPricingTableColumnWrapper.no_animation.maincaptioncolumn, .arptemplate_" . $template_name . " .ArpPricingTableColumnWrapper.no_animation, .arptemplate_" . $template_name . " .ArpPricingTableColumnWrapper.maincaptioncolumn, .arptemplate_" . $template_name . " .ArpPricingTableColumnWrapper{";
            //$tablestring .= "max-width:100% !important;";
            if ($is_animation) {
                $tablestring .= "width:100%;";
            } else {
                $tablestring .= "width:100%;";
            }
        
            $tablestring .= "}";

            $tablestring .= ".ArpTemplate_main ,";
            $tablestring .= ".arptemplate_" . $template_name . " .arp_inner_wrapper_all_columns ,";
            $tablestring .= ".arptemplate_" . $template_name . " .arp_allcolumnsdiv {";
            $tablestring .= "width:100%;";
            $tablestring .= "}";

            $tablestring .= "}";
        }

        if (get_option('arp_mobile_responsive_size') and get_option('arp_mobile_responsive_size') > 0) {
            $tablestring .= "@media all and (max-width:" . get_option('arp_mobile_responsive_size') . "px){";


            if ($ref_template == 'arptemplate_12') {
                $tablestring .= ".arptemplate_" . $template_name . " .maincaptioncolumn .arpplan{";
                $tablestring .= "border-right:1px solid #E0E0E0;";
                $tablestring .= "}";
            }

            if ($ref_template == 'arptemplate_9') {
                $tablestring .= ".arptemplate_" . $template_name . " .maincaptioncolumn .arpcolumnheader  .arpcaptiontitle{";

                $tablestring .= "border-radius: 2px 2px 0px 0px;
										-moz-border-radius: 2px 2px 0px 0px;
										-webkit-border-radius: 2px 2px 0px 0px;
										-o-border-radius: 2px 2px 0px 0px;";

                $tablestring .= "}";
                $tablestring .= ".arptemplate_" . $template_name . " .maincaptioncolumn .arppricingtablebodycontent{";

                $tablestring .= "}";
            }




            $tablestring .= "}";
        }



        $tablestring .= "</style>";

        $template_id = $template_settings['template'];
        $color_scheme = 'arp' . $template_settings['skin'];

        $hover_class = '';
        if (!$disable_hover_effect) {
            $hover_class = $hover_type;
        }
        if (!in_array($hover_class, array('hover_effect', 'shadow_effect')) && (!$disable_hover_effect)) {
            $hover_class .= ' arp_hover_animated_effect';
            $arp_inc_effect_css[] = 1;
        }

        if ($is_animation != "" && $is_animation == 'yes') {
            $animation_class = 'has_animation';
            $hover_class .= ' no_effect';
        } else {
            $animation_class = 'no_animation';
        }

        /* Disable Hover Effect */
        $disable_hover_effect_class = '';
        if ($disable_hover_effect) {
            $disable_hover_effect_class = 'arp_disable_hover';
        }
        /* Disable Hover Effect */
        $global_column_width = "";
      


        if ($column_animation['is_animation'] == 'yes') {
            global $arp_is_animation;
            $arp_is_animation = 1;
        }

        if ($column_animation['is_animation'] == 'yes' and $column_animation['pagi_nav_btn'] != 'navigation') {
            $slider_pagination_container = 'arp_slider_pagination';
            if ($column_animation['pagi_nav_btn'] == 'pagination_top') {
                $slider_pagination_container .= ' Top';
            } else if ($column_animation['pagi_nav_btn'] == 'pagination_bottom' or $column_animation['pagi_nav_btn'] == 'both') {
                $slider_pagination_container .= ' Bottom';
            }
        } else {
            $slider_pagination_container = '';
        }


        /* Navigation button for animation */
        $navigation = "";
        if ($column_animation['is_animation'] == 'yes') {
            $navigation = ( $column_animation['navi_nav_btn'] == 'navigation' ) ? 1 : 0;
        }
        if ($navigation) {
            $tablestring .= "<div class='arp_prev_div'>";
            $tablestring .= "<div id='arp_prev_btn_" . $template_name . "' class='arp_prev_btn arp_nav_style_1'></div>";
            $tablestring .= "</div>";
        }

        /* Navigation button for animation */
        $col_array = array();
        foreach ($opts['columns'] as $j => $columns) {
            if (isset($columns['is_caption']) && $columns['is_caption'] == 1)
                $col_array[] = 1;
            else
                $col_array[] = 0;
        }
//$tablestring .= "<div class='ArpPriceTable arp_price_table_".$table_id." arp_template_".$id." ".$color_scheme." ".$slider_pagination_container."'";
        $tablestring .= "<div class='ArpPriceTable arp_outer_wrapper_all_columns arp_price_table_" . $template_name . " arp_price_ref_table_" . $ref_template . " arptemplate_" . $template_name . " " . $color_scheme . " " . $slider_pagination_container . "'";

        /* If Table has Animation */
        if (isset($column_animation['is_animation']) and $column_animation['is_animation'] == 'yes') {
            global $arp_pricingtable;
            $arp_pricingtable->arp_pricing_table_main_settings();
            global $arp_mainoptionsarr;
            $data_items = $column_animation['visible_column'] ? $column_animation['visible_column'] : 1;
            $scrolling_columns = $column_animation['scrolling_columns'] ? $column_animation['scrolling_columns'] : 1;
            $navigation = ( $column_animation['navi_nav_btn'] == 'navigation' ) ? 1 : 0;
            $transition_speed = $column_animation['transition_speed'] ? $column_animation['transition_speed'] : '500';
            //$hide_caption		= $column_animation['hide_caption'] ? $column_animation['hide_caption'] : 0;
            $hide_caption = ( $column_settings['hide_caption_column'] == 1 ) ? 1 : 0;
            //$infinite			= $column_animation['is_infinite'] ? $column_animation['is_infinite'] : 0;
            $autoplay = ( $column_animation['autoplay'] == 1 ) ? 1 : 0;
            $infinite = $autoplay ? 1 : 0;

            $sticky_caption = ( in_array(1, $col_array) and $column_animation['sticky_caption'] == 1 ) ? 'true' : 'false';

            $sliding_effect = (in_array($column_animation['sliding_effect'], $arp_mainoptionsarr['general_options']['column_animation']['sliding_effect'])) ? $column_animation['sliding_effect'] : 'slide';
            $easing_effect = (in_array($column_animation['sliding_effect'], $arp_mainoptionsarr['general_options']['column_animation']['easing_effect'])) ? $column_animation['sliding_effect'] : 'swing';


            $tablestring .= " data-animate='true' data-id='" . $template_name . "' data-items='" . $data_items . "' data-scroll='" . $scrolling_columns . "' data-autoplay='" . $autoplay . "' data-effect='" . $sliding_effect . "' data-speed='" . $transition_speed . "' data-caption='" . $hide_caption . "' data-infinite='" . $infinite . "' data-sticky-caption='" . $sticky_caption . "' data-easing='" . $easing_effect . "' style='display:table-cell;'";
        }
        $tablestring .= ">";

        $tablestring .= "<div class='arp_inner_wrapper_all_columns'  id='ArpPricingTableColumns'";
        if ($navigation) {
            $tablestring .= " style='display:table-cell;'";
        }

        $tablestring .= ">";
        $one_toggle_selected = $two_toggle_selected = $three_toggle_selected = '';
        $one_toggle_selected = ' toggle_selected ';
        if ($general_settings['enable_toggle_price'] == 1) {
            $toggle_style = $general_settings['arp_toggle_main'];
            $toggle_step_count = $general_settings['arp_step_main'];
            $switch_counter = ( $toggle_step_count == 3 ) ? 'arp_three_switch' : 'arp_two_switch';
            $toggle_wrapper_style = ( $toggle_style == 1 ) ? 'arp_radio_style_switch' : 'arp_button_style_switch';
            $toggle_label_position = $general_settings['arp_label_position_main'];
            $toggle_label_yearly = $general_settings['togglestep_yearly'];
            $toggle_label_monthly = $general_settings['togglestep_monthly'];
            $toggle_label_quarterly = $general_settings['togglestep_quarterly'];
            $toggle_sub_label_yearly = isset($general_settings['togglestep_sub_yearly']) ? $general_settings['togglestep_sub_yearly'] : '';
            $toggle_sub_label_monthly = isset($general_settings['togglestep_sub_monthly']) ? $general_settings['togglestep_sub_monthly'] : '';
            $toggle_sub_label_quarterly = isset($general_settings['togglestep_sub_quarterly']) ? $general_settings['togglestep_sub_quarterly'] : '';
            $setas_default_toggle = $general_settings['setas_default_toggle'];

            $one_toggle_selected = $two_toggle_selected = $three_toggle_selected = '';
            $yearly_toggle_selected = $monthly_toggle_selected = $quarterly_toggle_selected = '';
            $one_selected_fa_class = $two_selected_fa_class = $three_selected_fa_class = 'fa fa-circle-thin fa-lg';
            if ($setas_default_toggle == 1) {
                $monthly_toggle_selected = ' selected ';
                $two_toggle_selected = ' toggle_selected ';
                $toggle_content_default_value = 'two_step_two';
                $two_selected_fa_class = "fa fa-dot-circle-o fa-lg";
            } else if ($setas_default_toggle == 2) {
                $quarterly_toggle_selected = ' selected ';
                $three_toggle_selected = ' toggle_selected ';
                $toggle_content_default_value = 'two_step_three';
                $three_selected_fa_class = "fa fa-dot-circle-o fa-lg";
            } else {
                $yearly_toggle_selected = ' selected ';
                $one_toggle_selected = ' toggle_selected ';
                $toggle_content_default_value = 'two_step_one';
                $one_selected_fa_class = "fa fa-dot-circle-o fa-lg";
            }

            if ($toggle_label_position == 0) {
                $toggle_wrapper_cls = 'arp_toggle_left_position';
            } else if ($toggle_label_position == 1) {
                $toggle_wrapper_cls = 'arp_toggle_top_position';
            } else {
                $toggle_wrapper_cls = 'arp_toggle_right_position';
            }

            $animated_template = ( $is_animated == 1 ) ? 'toggle_animated_template' : '';

            $tablestring .= "<div class='toggle_content_wrapper $animated_template $toggle_wrapper_style $toggle_wrapper_cls arptemplate_" . $template_name . "_arp_toogle_wrapper' id='arptemplate_" . $template_name . "_arp_toogle_wrapper'>";

            $tablestring .= "<div class='toggle_content_title $switch_counter'>";
            $tablestring .= $general_settings['toggle_label_content'];
            $tablestring .= "</div>";
            $tablestring .= "<div class='toggle_content_switches $switch_counter'>";
            if ($toggle_wrapper_style == 'arp_radio_style_switch') {

                $tablestring .= "<div class='radio_button_box " . $yearly_toggle_selected . "' id='" . esc_html($toggle_label_yearly) . "' data-value='two_step_one'>";
                $tablestring .= "<span class='" . $one_selected_fa_class . "'></span>";
                $tablestring .= "<label class='toggle_content_label_txt'>" . $toggle_label_yearly . "</label><span class='toggle_content_label_sub_text'>" . $toggle_sub_label_yearly . "</span>";
                $tablestring .= "</div>";

                $tablestring .= "<div class='radio_button_box " . $monthly_toggle_selected . "' id='" . esc_html($toggle_label_monthly) . "' data-value='two_step_two'>";
                $tablestring .= "<span class='" . $two_selected_fa_class . "'></span>";
                $tablestring .= "<label class='toggle_content_label_txt'>" . $toggle_label_monthly . "</label><span class='toggle_content_label_sub_text'>" . $toggle_sub_label_monthly . "</span>";
                $tablestring .= "</div>";

                if ($toggle_step_count == 3) {
                    $tablestring .= "<div class='radio_button_box " . $quarterly_toggle_selected . "' id='" . $toggle_label_quarterly . "' data-value='two_step_three'>";
                    $tablestring .= "<span class='" . $three_selected_fa_class . "'></span>";
                    $tablestring .= "<label class='toggle_content_label_txt'>" . $toggle_label_quarterly . "</label><span class='toggle_content_label_sub_text'>" . $toggle_sub_label_quarterly . "</span>";
                    $tablestring .= "</div>";
                }
            } else {


                $tablestring .= "<div class='button_switch_box $switch_counter $yearly_toggle_selected' id='" . esc_html($toggle_label_yearly) . "' data-value='two_step_one'>";
                $tablestring .= $toggle_label_yearly;
                $tablestring .= "</div>";

                $tablestring .= "<div class='button_switch_box $switch_counter $monthly_toggle_selected' id='" . esc_html($toggle_label_monthly) . "' data-value='two_step_two'>";
                $tablestring .= $toggle_label_monthly;
                $tablestring .= "</div>";

                if ($toggle_step_count == 3) {
                    $tablestring .= "<div class='button_switch_box $switch_counter $quarterly_toggle_selected' id='" . esc_html($toggle_label_quarterly) . "' data-value='two_step_three'>";
                    $tablestring .= $toggle_label_quarterly;
                    $tablestring .= "</div>";
                }
                $tablestring .= "<div class='button_switch_box button_switch_box_selected'></div>";
            }

            $tablestring .= "<input type='hidden' name='arprice_toggle_content_value' id='arprice_toggle_content_value' class='switch_front_radio_btn' value='" . $toggle_content_default_value . "'/>";
            $tablestring .= "</div>";
            $tablestring .= "</div>";
        }

        $x = 0;
        if ($opts['columns'] and count($opts['columns']) > 0) {
            /* Caption Column */
            $header_img = array();
            foreach ($opts['columns'] as $j => $columns) {
                $header_img[] = 0;
                if (isset($columns['arp_header_shortcode']) && $columns['arp_header_shortcode'] != '')
                    $header_img[] = 1;

                if (isset($columns['arp_header_shortcode_second']) && $columns['arp_header_shortcode_second'] != '')
                    $header_img[] = 1;

                if (isset($columns['arp_header_shortcode_third']) && $columns['arp_header_shortcode_third'] != '')
                    $header_img[] = 1;
            }

            foreach ($opts['columns'] as $j => $columns) {

                if (isset($columns['column_width']) && $columns['column_width'] != '' && $columns['column_width'] > 0) {
                    $inline_column_width[] = 1;
                } else {
                    $inline_column_width[] = 0;
                }
            }


            $margin_top_all_div = "";
            if (isset($column_animation['is_animation']) and $column_animation['is_animation'] == 'yes') {
                if ($ref_template == 'arptemplate_10' || $ref_template == 'arptemplate_13' || $ref_template == 'arptemplate_14' || $ref_template == 'arptemplate_15' || $ref_template == 'arptemplate_16') {
                    $margin_top_all_div = 'padding-top:36px;';
                } else {
                    $margin_top_all_div = 'padding-top:22px;';
                }
            }


            $tablestring .= "<div class='arp_allcolumnsdiv' style='" . $margin_top_all_div . "'>";
            $style_ = 0;
            foreach ($opts['columns'] as $j => $columns) {

                if (@$columns['is_caption'] == 1 and $template_feature['caption_style'] == 'default') {
                    $inlinecolumnwidth = "";
                    if ($columns["column_width"] != "")
                        $inlinecolumnwidth = 'width:' . $columns["column_width"] . 'px';
                    $column_highlight = $opts['columns'][$j]['column_highlight'];
                    if ($column_highlight && $column_highlight == 1)
                        $highlighted_column = 'column_highlight';

                    if ($columns['column_width'] != '') {
                        $has_custom_column_width = 'data-has_custom_column_width="true"';
                        $has_custom_width = '';
                    } else {
                        $has_custom_column_width = 'data-has_custom_column_width="false"';
                        $has_custom_width = '';
                    }

                    if (isset($column_settings['space_between_column']) and $column_settings['space_between_column'] == 'yes' and $column_settings['column_space'] > 0) {
                        $has_column_space = 'data-has_column_space="' . $column_settings['column_space'] . '" data-is_column_space="true"';
                    } else {
                        $has_column_space = 'data-has_column_space="false" data-is_column_space="false"';
                    }

                    $footer_hover_class = "";

                    if ($columns['footer_content'] != '' and $template_feature['has_footer_content'] == 1) {

                        $footer_hover_class .= ' has_footer_content';
                        if ($columns['footer_content_position'] == 0) {
                            $footer_hover_class .= " footer_below_content";
                        } else {
                            $footer_hover_class .= " footer_above_content";
                        }
                    } else {
                        $footer_hover_class = "";
                    }

                    $column_settings['hide_caption_column'] = isset($column_settings['hide_caption_column']) ? $column_settings['hide_caption_column'] : "";

                    if (!empty($general_option['column_settings']['column_box_shadow_effect']) && $general_option['column_settings']['column_border_radius_top_left'] == 0 && $general_option['column_settings']['column_border_radius_top_right'] == 0 && $general_option['column_settings']['column_border_radius_bottom_right'] == 0 && $general_option['column_settings']['column_border_radius_bottom_left'] == 0) {
                        if ($general_option['column_settings']['column_box_shadow_effect'] == 'shadow_style_1')
                            $shadow_default_class = 'shadow_style_1';
                        else if ($general_option['column_settings']['column_box_shadow_effect'] == 'shadow_style_2')
                            $shadow_default_class = 'shadow_style_2';
                        else if ($general_option['column_settings']['column_box_shadow_effect'] == 'shadow_style_3')
                            $shadow_default_class = 'shadow_style_3';
                        else if ($general_option['column_settings']['column_box_shadow_effect'] == 'shadow_style_4')
                            $shadow_default_class = 'shadow_style_4';
                        else if ($general_option['column_settings']['column_box_shadow_effect'] == 'shadow_style_5')
                            $shadow_default_class = 'shadow_style_5';
                        else
                            $shadow_default_class = 'arp_none';
                    } else {
                        $shadow_default_class = '';
                    }

                    if ($shadow_default_class == 'shadow_style_5' && $columns['is_caption'] == 1 && ( $ref_template == 'arptemplate_6' || $ref_template == 'arptemplate_9' )) {
                        $shadow_default_class = 'shadow_style_none';
                    }
//echo "width_test ====>". $inlinecolumnwidth . "<br>";
                    if( $column_settings['hide_caption_column'] ){
                        $hide_caption_column = ' arp_hidden_captioncolumn ';
                    } else {
                        $hide_caption_column = '  ';
                    }
                    $tablestring .= "<div id='main_" . $j . "' " . $has_custom_column_width . " " . $has_column_space . " data-order='main_column_" . $style_ . "' class='$shadow_default_class ArpPricingTableColumnWrapper arppricingtablecaptioncolumn ".$hide_caption_column." " . $has_custom_width . " style_" . $j . " maincaptioncolumn  " . $animation_class . " arp_style_$style_ $disable_hover_effect_class' style='";

                    if ($column_settings['hide_caption_column'] == 1) {
                        $tablestring .= "display:none;";
                    }
                    if ($columns['column_width'] != '' && $columns['column_width'] > 0) {
                        $tablestring .= $inlinecolumnwidth;
                    } else {
                        if ($is_responsive != 1) {
                            $tablestring .= $global_column_width;
                        }
                    } $tablestring .= "'";
                    $tablestring.= " >";
                    $new_clickable_class = "";
                    if (isset($column_settings['full_column_clickable']) && $column_settings['full_column_clickable'] == '1') {
                        $new_clickable_class = "is_column_clickable";
                    }



                    $tablestring .= "<div class='arpplan " . $new_clickable_class . " ";
                    if ($columns['is_caption'] == 1) {
                        $tablestring .= "maincaptioncolumn ";
                    } else {
                        $tablestring .= $j . " ";
                    } if ($x % 2 == 0) {
                        $tablestring .= " arpdark-bg ArpPriceTablecolumndarkbg";
                    }


                    $tablestring .= "' style='";
                    if ($column_settings['hide_caption_column'] == 1) {
                        $tablestring .= "display:none;";
                    }
                    $tablestring .= "' >";



                    if ($ref_template == 'arptemplate_15')
                        $tablestring .= "<div class='arp_template_rocket'><div></div></div>";
                    $tablestring .= "<div class='planContainer'>";
                    if (!empty($columns['column_background_image']) && $ref_template === 'arptemplate_21') {
                        $column_level_bgi_class = ' hide_col_bg_img ';
                    } else {
                        $column_level_bgi_class = '';
                    }
                    $tablestring .= "<div class='arp_column_content_wrapper $column_level_bgi_class'>";
                    if (( $template == 'arptemplate_4' || $template == 'arptemplate_12') && in_array(1, $header_img))
                        $header_cls = 'has_header_code';

                    $tablestring .= "<div class='arpcolumnheader " . (isset($header_cls) ? $header_cls : "") . "'>";

                    if ($columns['is_caption'] == 1) {
                        if ($template_feature['caption_title'] == 'default') {
                            if ($template == 'arptemplate_1' && in_array(1, $header_img))
                                $header_cls = 'has_header_code';
                            else
                                $header_cls = '';

                            $tablestring .= "<div class='arpcaptiontitle " . $header_cls . "'>";
                            $tablestring .= "<div class='html_content_first toggle_step_first $one_toggle_selected'>" . do_shortcode(@$columns['html_content']) . "</div>";
                            $tablestring .= "<div class='html_content_second toggle_step_second $two_toggle_selected'>" . do_shortcode(@$columns['html_content_second']) . "</div>";
                            $tablestring .= "<div class='html_content_third toggle_step_third $three_toggle_selected'>" . do_shortcode(@$columns['html_content_third']) . "</div>";
                            $tablestring .= "</div>";
                        }
                        else if ($template_feature['caption_title'] == 'style_1') {
                            $tablestring .= "<div class='arpcaptiontitle'>
                                            	
                                                <div class='arpcaptiontitle_style_1'>" . do_shortcode(stripslashes_deep($columns['html_content'])) . "</div>
                                            </div>";
                        }
                    } else {
                        $tablestring .= "<div class='arppricetablecolumntitle'>
											<div class='bestPlanTitle'>" . do_shortcode(stripslashes_deep($columns['package_title'])) . "</div>
										</div>
										<div class='arppricetablecolumnprice " . $template_feature['amount_style'] . "'>" . do_shortcode(stripslashes_deep($columns['html_content'])) . "</div>";
                    }

                    $tablestring .= "</div>
                        <div class='arpbody-content arppricingtablebodycontent'>
                            <ul class='arp_opt_options arppricingtablebodyoptions' id='column_" . $x . "' style='text-align:" . $columns['body_text_alignment'] . "' >";

                    $r = 0;

                    $row_order = isset($opts['columns'][$j]['row_order']) ? $opts['columns'][$j]['row_order'] : array();
                    if ($row_order && is_array($row_order)) {
                        $rows = array();
                        asort($row_order);
                        $ji = 0;
                        $maxorder = max($row_order) ? max($row_order) : 0;
                        foreach ($opts['columns'][$j]['rows'] as $rowno => $row) {
                            $row_order[$rowno] = isset($row_order[$rowno]) ? $row_order[$rowno] : ($maxorder + 1);
                        }
                        foreach ($row_order as $row_id => $order_id) {
                            if ($opts['columns'][$j]['rows'][$row_id]) {
                                $rows['row_' . $ji] = $opts['columns'][$j]['rows'][$row_id];
                                $ji++;
                            }
                        }
                        $opts['columns'][$j]['rows'] = $rows;
                    }


                    for ($ri = 0; $ri <= $maxrowcount; $ri++) {
                        $rows = isset($opts['columns'][$j]['rows']['row_' . $ri]) ? $opts['columns'][$j]['rows']['row_' . $ri] : array();

                        if ($columns['is_caption'] == 1) {
                            if (($ri + 1) % 2 == 0) {
                                $cls = 'rowlightcolorstyle';
                            } else {
                                $cls = '';
                            }
                        } else {
                            if ($x % 2 == 0) {
                                if (($ri + 1) % 2 == 0) {
                                    $cls = 'rowdarkcolorstyle';
                                } else {
                                    $cls = '';
                                }
                            } else {
                                if (($ri + 1) % 2 == 0) {
                                    $cls = 'rowlightcolorstyle';
                                } else {
                                    $cls = '';
                                }
                            }
                        }

                        if (($ri + 1 ) % 2 == 0) {
                            $cls .= " arp_even_row";
                        } else {
                            $cls .= " arp_odd_row";
                        }
                        $rows['row_tooltip'] = isset($rows['row_tooltip']) ? $rows['row_tooltip'] : '';
                        $rows['row_tooltip_second'] = isset($rows['row_tooltip_second']) ? $rows['row_tooltip_second'] : '';
                        $rows['row_description_second'] = isset($rows['row_description_second']) ? $rows['row_description_second'] : '';
                        $rows['row_description_third'] = isset($rows['row_description_third']) ? $rows['row_description_third'] : '';
                        $rows['row_tooltip_third'] = isset($rows['row_tooltip_third']) ? $rows['row_tooltip_third'] : '';
                        if ($rows['row_tooltip'] != '' || $rows['row_tooltip_second'] != "" || $rows['row_tooltip_third'] != "") {
                            global $arp_has_tooltip;
                            $arp_has_tooltip = 1;
                        }


                        $li_class = $ref_template . '_' . $j . '_row_' . $ri;
                        $row_inline_script_old = isset($rows['row_custom_css']) ? $rows['row_custom_css'] : '';
                        $row_inline_script_old = trim($row_inline_script_old);
                        $row_inline_script_old = str_replace("/\r|\n/", "", $row_inline_script_old);
                        $row_inline_script_old = explode(';', $row_inline_script_old);
                        $row_inline_script = '';
                        if (!empty($row_inline_script_old)) {
                            foreach ($row_inline_script_old as $new_css) {
                                if ($new_css != '') {
                                    $new_css = explode(':', $new_css);
                                    if (isset($new_css[0]) && isset($new_css[1])) {

                                        $row_inline_script .= trim($new_css[0]) . ' : ' . trim(str_replace("!important", "", $new_css[1])) . ' ;';
                                    }
                                }
                            }
                        }

                        $tablestring .= "<li style='" . $row_inline_script . "' class='" . $cls . " " . $li_class . "' id='arp_" . $j . '_row_' . $ri . "'>";


                        // first step description
                        $tablestring .= "<div class='row_description_first_step arp_row_description_text  toggle_step_first $one_toggle_selected ";
                        if ($rows['row_tooltip'] != "" and ( isset($rows['row_description']) && $rows['row_description'] != '' )) {
                            $tablestring .= "arp_tooltip";
                            if ($tooltip_trigger_type == 'click') {
                                $tablestring .= " on_click";
                            }
                            if ($tooltip_display_style == 'informative') {
                                $tablestring .= " arp_informative_tooltip arp_tooltip ";
                                if ($tooltip_icon_position == 'right_align') {
                                    $tablestring .= " arp_informative_right_align ";
                                } else {
                                    $tablestring .= " arp_informative_float_to_content ";
                                }
                            }
                        }

                        $tablestring .= "' data-tipso='";
                        if ($rows['row_tooltip'] != "" and $tooltip_display_style == 'default' and ( isset($rows['row_description']) && $rows['row_description'] != '' )) {
                            $tablestring .= esc_html($rows['row_tooltip']);
                        } $tablestring .= "'>" . (( isset($rows['row_description']) && $rows['row_description'] != '' ) ? stripslashes_deep($rows['row_description']) : '');

                        if ($tooltip_display_style == 'informative' and $rows['row_tooltip'] != '' and ( isset($rows['row_description']) && $rows['row_description'] != '' )) {
                            if ($tooltip_trigger_type == 'click') {
                                $informative_cls = " on_click";
                            }
                            $tablestring .= "<label class='arp_informative_tooltip $informative_cls' data-tipso='" . esc_html($rows['row_tooltip']) . "'><span>" . stripslashes($tooltip_informative_icon) . "</span></label>";
                        }
                        $tablestring .= "</div>";

                        // second step description
                        $tablestring .= "<div  class='row_description_second_step arp_row_description_text toggle_step_second $two_toggle_selected";
                        if ($rows['row_tooltip_second'] != "" and ( isset($rows['row_description_second']) && $rows['row_description_second'] != '' )) {
                            $tablestring .= " arp_tooltip";
                            if ($tooltip_trigger_type == 'click') {
                                $tablestring .= " on_click";
                            }
                            if ($tooltip_display_style == 'informative') {
                                $tablestring .= " arp_informative_tooltip arp_tooltip ";
                                if ($tooltip_icon_position == 'right_align') {
                                    $tablestring .= " arp_informative_right_align ";
                                } else {
                                    $tablestring .= " arp_informative_float_to_content ";
                                }
                            }
                        }
                        $tablestring .= "' data-tipso='";
                        if ($rows['row_tooltip_second'] != "" and $tooltip_display_style == 'default' and ( isset($rows['row_description_second']) && $rows['row_description_second'] != '' )) {
                            $tablestring .= esc_html($rows['row_tooltip_second']);
                        } $tablestring .= "'>" . (( isset($rows['row_description_second']) && $rows['row_description_second'] != '' ) ? stripslashes_deep($rows['row_description_second']) : '');

                        if ($tooltip_display_style == 'informative' and $rows['row_tooltip_second'] != '' and ( isset($rows['row_description_second']) && $rows['row_description_second'] != '' )) {
                            if ($tooltip_trigger_type == 'click') {
                                $informative_cls = " on_click";
                            }
                            $tablestring .= "<label class='arp_informative_tooltip $informative_cls' data-tipso='" . esc_html($rows['row_tooltip_second']) . "'><span>" . stripslashes($tooltip_informative_icon) . "</span></label>";
                        }
                        $tablestring .= "</div>";

                        // third step description
                        $tablestring .= "<div  class='row_description_third_step arp_row_description_text toggle_step_third $three_toggle_selected ";
                        if ($rows['row_tooltip_third'] != "" and ( isset($rows['row_description_third']) && $rows['row_description_third'] != '' )) {
                            $tablestring .= " arp_tooltip";
                            if ($tooltip_trigger_type == 'click') {
                                $tablestring .= " on_click";
                            }
                            if ($tooltip_display_style == 'informative') {
                                $tablestring .= " arp_informative_tooltip arp_tooltip ";
                                if ($tooltip_icon_position == 'right_align') {
                                    $tablestring .= " arp_informative_right_align ";
                                } else {
                                    $tablestring .= " arp_informative_float_to_content ";
                                }
                            }
                        }
                        $tablestring .= "' data-tipso='";
                        if ($rows['row_tooltip_third'] != "" and $tooltip_display_style == 'default' and ( isset($rows['row_description_third']) && $rows['row_description_third'] != '' )) {
                            $tablestring .= esc_html($rows['row_tooltip_third']);
                        } $tablestring .= "'>" . (( isset($rows['row_description_third']) && $rows['row_description_third'] != '' ) ? stripslashes_deep($rows['row_description_third']) : '');

                        if ($tooltip_display_style == 'informative' and $rows['row_tooltip_third'] != '' and ( isset($rows['row_description_third']) && $rows['row_description_third'] != '' )) {
                            if ($tooltip_trigger_type == 'click') {
                                $informative_cls = " on_click";
                            }
                            $tablestring .= "<label class='arp_informative_tooltip $informative_cls' data-tipso='" . esc_html($rows['row_tooltip_third']) . "'><span>" . stripslashes($tooltip_informative_icon) . "</span></label>";
                        }
                        $tablestring .= "</div>";

                        $tablestring .= "</li>";
                        array_push($font_awesome_match, $rows['row_description']);
                        array_push($font_awesome_match, $rows['row_description_second']);
                        array_push($font_awesome_match, $rows['row_description_third']);
                        array_push($font_awesome_match, $rows['row_tooltip']);
                        array_push($font_awesome_match, $rows['row_tooltip_second']);
                        array_push($font_awesome_match, $rows['row_tooltip_third']);
                        array_push($font_awesome_match, $rows['row_label']);
                    }

                    $tablestring .= "</ul>
                        </div>";


                    if ($template_feature['button_position'] == 'default') {


                        $tablestring .= "<div class='arpcolumnfooter $footer_hover_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . "'>";
                        $footer_content_below_btn = "";
                        if ($columns['footer_content'] != '' and $template_feature['has_footer_content'] == 1)
                            $footer_content_above_btn = "display:block;";
                        else
                            $footer_content_above_btn = "display:none;";
                        if ($template_feature['has_footer_content'] == 1) {
                            $tablestring .= "<div class='arp_footer_content arp_btn_before_content' style='{$footer_content_above_btn}'>";
                            $tablestring .= "<span class='footer_caption_content_first_step arp_footer_content_text toggle_step_first $one_toggle_selected'>";
                            $tablestring .= @$columns['footer_content'];
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_caption_content_second_step arp_footer_content_text toggle_step_second $two_toggle_selected'>";
                            $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_caption_content_third_step arp_footer_content_text toggle_step_third $three_toggle_selected'>";
                            $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                            $tablestring .= "</span>";
                            $tablestring .= "</div>";
                        }
                        if (@$columns['button_text'] == '' && empty($columns['btn_img'])) {
                            $hide_default_btn_true = "";
                            if (@$columns['hide_default_btn'] == 1) {
                                $hide_default_btn_true = 'hide_default_btn_true';
                            }
                            $tablestring .= "<div class='arppricetablebutton " . $hide_default_btn_true . "'>&nbsp;</div>";
                        } else {
                            if (@$columns['paypal_code'] != '') {
                                $columns['paypal_code'] = do_shortcode($columns['paypal_code']);
                                $paypal_btn = 1;
                            } else {
                                $paypal_btn = 0;
                            }
                            if (@$columns['paypal_code_second'] != '') {
                                $columns['paypal_code_second'] = do_shortcode($columns['paypal_code_second']);
                                $paypal_btn_second = 1;
                            } else {
                                $paypal_btn_second = 0;
                            }
                            if (@$columns['paypal_code_third'] != '') {
                                $columns['paypal_code_third'] = do_shortcode($columns['paypal_code_third']);
                                $paypal_btn_third = 1;
                            } else {
                                $paypal_btn_third = 0;
                            }
                            $hide_default_btn_true = "";
                            if (@$columns['hide_default_btn'] == 1) {
                                $hide_default_btn_true = 'hide_default_btn_true';
                            }
                            $tablestring .= "<div class='arppricetablebutton toggle_step_first $one_toggle_selected $hide_default_btn_true' style='text-align:center;'>";

                            $tablestring .= "<button type='button'  class='bestPlanButton $arp_global_button_class toggle_step_first $one_toggle_selected " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . "' data-is-post-variables='" . $columns['is_post_variables'] . "' data-post-variables='" . stripslashes(@$columns['post_variables_content']) . "' ";
                            if (@$columns['btn_img'] != "" && $columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . $columns['btn_img'] . ") no-repeat !important; width:" . $columns['btn_img_width'] . "px;height:" . $columns['btn_img_height'] . "px;'";
                            }
                            if (@$columns['hide_default_btn'] == 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= " onclick='arp_redirect(\"" . @$columns['button_url'] . "\", \"";
                            if (@$columns['is_new_window'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",\"";
                            if (@$columns['is_new_window_actual'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",";
                            $tablestring .= "\"" . $paypal_btn . "\",this,\"" . $table_id . "\",\"main_" . $j . "\");'>";
                            if (@$columns['btn_img'] == "") {
                                $tablestring .= "<span class='btn_content_first_step bestPlanButton_text'>";
                                $tablestring .= stripslashes_deep($columns['button_text']);
                                $tablestring .= "</span>";
                            } $tablestring .= "</button>";

                            $tablestring .= "<div class='arp_paypal_form' id='paypal_form_first_$j' ";
                            if ($columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= ">";
                            $tablestring .= do_shortcode($columns['paypal_code']);
                            $tablestring .= "</div>";
                            $tablestring .= "</div>";
                            $tablestring .= "<div class='arppricetablebutton toggle_step_second $two_toggle_selected $hide_default_btn_true' style='text-align:center;'>";
                            $tablestring .= "<button type='button'  class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : "") . "' data-is-post-variables='{$columns['is_post_variables']}' data-post-variables='" . stripslashes($columns['post_variables_content_second']) . "' ";
                            if ($columns['btn_img'] != "" && $columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . $columns['btn_img'] . ") no-repeat !important; width:" . $columns['btn_img_width'] . "px;height:" . $columns['btn_img_height'] . "px;'";
                            }
                            if ($columns['hide_default_btn'] == 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= " onclick='arp_redirect(\"" . $columns['button_url_second'] . "\", \"";
                            if ($columns['is_new_window'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",\"";
                            if ($columns['is_new_window_actual'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",";
                            $tablestring .= "\"" . $paypal_btn_second . "\",this,\"" . $table_id . "\",\"main_" . $j . "\");'>";
                            if ($columns['btn_img'] == "") {
                                $tablestring .= "<span class='btn_content_second_step bestPlanButton_text'>";
                                $tablestring .= stripslashes_deep($columns['btn_content_second']);
                                $tablestring .= "</span>";
                            } $tablestring .= "</button>";

                            $tablestring .= "<div class='arp_paypal_form' id='paypal_form_second_$j' ";
                            if ($columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= ">";
                            $tablestring .= do_shortcode($columns['paypal_code_second']);
                            $tablestring .= "</div>";

                            $tablestring .= "</div>";
                            $tablestring .= "<div class='arppricetablebutton toggle_step_third $three_toggle_selected $hide_default_btn_true' style='text-align:center;'>";

                            $tablestring .= "<button type='button'  class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : "") . "' data-is-post-variables='{$columns['is_post_variables']}' data-post-variables='" . stripslashes($columns['post_variables_content_third']) . "' ";
                            if ($columns['btn_img'] != "" && $columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . $columns['btn_img'] . ") no-repeat !important; width:" . $columns['btn_img_width'] . "px;height:" . $columns['btn_img_height'] . "px;'";
                            }
                            if ($columns['hide_default_btn'] == 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= " onclick='arp_redirect(\"" . $columns['button_url_third'] . "\", \"";
                            if ($columns['is_new_window'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",\"";
                            if ($columns['is_new_window_actual'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",";
                            $tablestring .= "\"" . $paypal_btn_third . "\",this,\"" . $table_id . "\",\"main_" . $j . "\");'>";
                            if ($columns['btn_img'] == "") {
                                $tablestring .= "<span class='btn_content_third_step bestPlanButton_text'>";
                                $tablestring .= stripslashes_deep($columns['btn_content_third']);
                                $tablestring .= "</span>";
                            } $tablestring .= "</button>";

                            $tablestring .= "<div class='arp_paypal_form' id='paypal_form_third_$j' ";
                            if ($columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= ">";
                            $tablestring .= do_shortcode($columns['paypal_code_third']);
                            $tablestring .= "</div>";

                            $tablestring .= "</div>";
                        }

                        $tablestring .= "</div>";
                    }


                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    //echo $tablestring;
                    $x++;
                    $style_++;
                } //only for caption column
                else if (@$columns['is_caption'] == 1 and $template_feature['caption_style'] == 'style_1') {
                    for ($i = 0; $i <= $maxrowcount; $i++) {
                        $rows = isset($opts['columns'][$j]['rows']['row_' . $i]) ? $opts['columns'][$j]['rows']['row_' . $i] : array();
                        $caption_li[$i] = stripslashes_deep($rows['row_description']);
                    }
                } else if (@$columns['is_caption'] == 1 and $template_feature['caption_style'] == 'style_2') {
                    for ($i = 0; $i <= $maxrowcount; $i++) {
                        $rows = isset($opts['columns'][$j]['rows']['row_' . $i]) ? $opts['columns'][$j]['rows']['row_' . $i] : array();
                        $caption_li[$i] = stripslashes_deep($rows['row_description']);
                    }
                }
                $columns['html_content'] = isset($columns['html_content']) ? $columns['html_content'] : '';
                $columns['html_content_second'] = isset($columns['html_content_second']) ? $columns['html_content_second'] : '';
                $columns['html_content_third'] = isset($columns['html_content_third']) ? $columns['html_content_third'] : '';
                $columns['footer_content'] = isset($columns['footer_content']) ? $columns['footer_content'] : '';
                $columns['footer_content_second'] = isset($columns['footer_content_second']) ? $columns['footer_content_second'] : '';
                $columns['footer_content_third'] = isset($columns['footer_content_third']) ? $columns['footer_content_third'] : '';
                array_push($font_awesome_match, $columns['html_content']);
                array_push($font_awesome_match, $columns['html_content_second']);
                array_push($font_awesome_match, $columns['html_content_third']);
                array_push($font_awesome_match, $columns['footer_content']);
                array_push($font_awesome_match, $columns['footer_content_second']);
                array_push($font_awesome_match, $columns['footer_content_third']);
            }

            $c = $x;
            if ($c == 0) {
                $c = $x = 1;
            }
            //$counter = 1;

            $new_arr = array();
            if (is_array($col_ord_arr) && count($col_ord_arr) > 0) {
                foreach ($col_ord_arr as $key => $value) {
                    $new_value = str_replace('main_', '', $value);
                    $new_col_id = $new_value;
                    foreach ($opts['columns'] as $j => $columns) {
                        if ($new_col_id == $j) {
                            $new_arr['columns'][$new_col_id] = $columns;
                        }
                    }
                }
            } else {
                $new_arr = $opts;
            }

            if (in_array(1, $col_array) and $column_animation['sticky_caption'] == 1 && $is_animation == 'yes') {
                $tablestring .= "<div class='arp_allcolumnsdiv_sticky'>";
            }

            foreach ($new_arr['columns'] as $j => $columns) {
                $shortcode_class = '';
                $shortcode_class_array = $arprice_default_settings->arp_shortcode_custom_type();
                if (isset($columns['arp_shortcode_customization_style'])) {
                    $shortcode_class = @$columns['arp_shortcode_customization_size'] . ' ' . @$shortcode_class_array[$columns['arp_shortcode_customization_style']]['class'];
                }
                if (@$columns['is_caption'] == 0) {
                    $inlinecolumnwidth = "";
                    if ($columns["column_width"] != "")
                        $inlinecolumnwidth = 'width:' . $columns["column_width"] . 'px';
                    $column_highlight = $opts['columns'][$j]['column_highlight'];
                    if ($column_highlight && $column_highlight == 1)
                        $highlighted_column = 'column_highlight ';
                    else
                        $highlighted_column = '';

                    if ($columns['column_width'] != '' /* or ( $global_column_width != '' and $is_responsive != 1 ) */) {
                        $has_custom_column_width = 'data-has_custom_column_width="true"';
//			$has_custom_width = 'has_custom_width';
                        $has_custom_width = '';
                    } else {
                        $has_custom_column_width = 'data-has_custom_column_width="false"';
                        $has_custom_width = '';
                    }

                    $footer_hover_class = "";

                    if (@$columns['footer_content'] != '' and $template_feature['has_footer_content'] == 1) {

                        $footer_hover_class .= ' has_footer_content';
                        if ($columns['footer_content_position'] == 0) {
                            $footer_hover_class .= " footer_below_content";
                        } else {
                            $footer_hover_class .= " footer_above_content";
                        }
                    } else {
                        $footer_hover_class = "";
                    }

                    if (@$column_settings['space_between_column'] == 'yes' and $column_settings['column_space'] > 0) {
                        $has_column_space = 'data-has_column_space="' . $column_settings['column_space'] . '" data-is_column_space="true"';
                    } else {
                        $has_column_space = 'data-has_column_space="false" data-is_column_space="false"';
                    }
                    if ($is_animation == 'yes') {
                        $has_custom_width = '';
                    }
                    if (!empty($general_option['column_settings']['column_box_shadow_effect']) && $general_option['column_settings']['column_border_radius_top_left'] == 0 && $general_option['column_settings']['column_border_radius_top_right'] == 0 && $general_option['column_settings']['column_border_radius_bottom_right'] == 0 && $general_option['column_settings']['column_border_radius_bottom_left'] == 0) {
                        if ($general_option['column_settings']['column_box_shadow_effect'] == 'shadow_style_1')
                            $shadow_default_class = 'shadow_style_1';
                        else if ($general_option['column_settings']['column_box_shadow_effect'] == 'shadow_style_2')
                            $shadow_default_class = 'shadow_style_2';
                        else if ($general_option['column_settings']['column_box_shadow_effect'] == 'shadow_style_3')
                            $shadow_default_class = 'shadow_style_3';
                        else if ($general_option['column_settings']['column_box_shadow_effect'] == 'shadow_style_4')
                            $shadow_default_class = 'shadow_style_4';
                        else if ($general_option['column_settings']['column_box_shadow_effect'] == 'shadow_style_5')
                            $shadow_default_class = 'shadow_style_5';
                        else
                            $shadow_default_class = 'arp_none';
                    } else {
                        $shadow_default_class = '';
                    }

                    if ($ref_template == 'arptemplate_2') {
                        
                    }
//echo "width ====>". $inlinecolumnwidth . "<br>";;

                    $tablestring .= "<div id='main_" . $j . "' " . $has_custom_column_width . " " . $has_column_space . " data-order='main_column_" . $style_ . "'   class='$shadow_default_class  " . $highlighted_column . " ArpPricingTableColumnWrapper arpricemaincolumn style_" . $j . " " . $hover_class . " " . $animation_class . " " . $has_custom_width . " arp_style_$style_ $disable_hover_effect_class'  style='";
                   
                    if ($c == 0) {
                        $tablestring .= "border-left:1px solid #DADADA;";
                    } if ($columns['column_width'] != '' && $columns['column_width'] > 0) {
                        $tablestring .= $inlinecolumnwidth;
                    } else {
                        if ($is_responsive != 1) {
                            $tablestring .= $global_column_width;
                        }
                    } $tablestring .= "'";
                    $tablestring .= " data-column-footer-position='{$columns['footer_content_position']}'";
                    $tablestring.= ">";


                    $new_clickable_class = "";
                    if (isset($column_settings['full_column_clickable']) && $column_settings['full_column_clickable'] == '1') {
                        $new_clickable_class = "is_column_clickable";
                    }


                    $tablestring .= "<div class='arpplan " . $new_clickable_class . " ";
                    if ($columns['is_caption'] == 1) {
                        $tablestring .= "maincaptioncolumn";
                    } else {
                        $tablestring .= "column_" . $c;
                    } if ($x % 2 == 0) {
                        $tablestring .= " arpdark-bg ArpPriceTablecolumndarkbg";
                    } $tablestring .= "'>";
                    if ($ref_template == 'arptemplate_15')
                        $tablestring .= "<div class='arp_template_rocket'><div></div></div>";

                    $columns['ribbon_setting']['arp_ribbon'] = isset($columns['ribbon_setting']['arp_ribbon']) ? $columns['ribbon_setting']['arp_ribbon'] : "";
                    $tablestring .= "<div class='planContainer " . $columns['ribbon_setting']['arp_ribbon'] . " '>";

                    $header_cls = '';
                    if (isset($columns['arp_header_shortcode']) && $columns['arp_header_shortcode'] != '')
                        $header_cls = 'has_arp_shortcode';
                    if (isset($columns['arp_header_shortcode_second']) && $columns['arp_header_shortcode_second'] != '')
                        $header_cls = 'has_arp_shortcode';
                    if (isset($columns['arp_header_shortcode_third']) && $columns['arp_header_shortcode_third'] != '')
                        $header_cls = 'has_arp_shortcode';

                    $columns_custom_ribbon_position = '';
                    if (isset($columns['ribbon_setting']) && $columns['ribbon_setting'] and $columns['ribbon_setting']['arp_ribbon'] != '' and ( $columns['ribbon_setting']['arp_ribbon_content'] != '' || $columns['ribbon_setting']['arp_ribbon_content_second'] != '' || $columns['ribbon_setting']['arp_ribbon_content_third'] != '' || $columns['ribbon_setting']['arp_custom_ribbon'] != '' || $columns['ribbon_setting']['arp_custom_ribbon_second'] || $columns['ribbon_setting']['arp_custom_ribbon'] != '' || $columns['ribbon_setting']['arp_custom_ribbon_third'])) {
                        if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6') {
                            if ($columns['ribbon_setting']['arp_ribbon_position'] == 'left') {
                                $columns_custom_ribbon_position = "left:{$columns['ribbon_setting']['arp_ribbon_custom_position_rl']}px;top:{$columns['ribbon_setting']['arp_ribbon_custom_position_top']}px;";
                            } else {
                                $columns_custom_ribbon_position = "right:{$columns['ribbon_setting']['arp_ribbon_custom_position_rl']}px;top:{$columns['ribbon_setting']['arp_ribbon_custom_position_top']}px;";
                            }
                        }
                        $basic_col = $arp_mainoptionsarr['general_options']['arp_basic_colors'];
                        $ribbon_bg_col = $columns['ribbon_setting']['arp_ribbon_bgcol'];
                        $base_color = $ribbon_bg_col;
                        $base_color_key = array_search($base_color, $basic_col);
                        $gradient_color = $arp_mainoptionsarr['general_options']['arp_basic_colors_gradient'][$base_color_key];
                        $ribbon_border_color = $arp_mainoptionsarr['general_options']['arp_ribbon_border_color'][$base_color_key];
                        if ($columns['ribbon_setting']['arp_ribbon'] != 'arp_ribbon_6') {
                            $tablestring .= "<style type='text/css'>";
                            if (in_array($base_color, $basic_col)) {
                                if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_1') {
                                    $tablestring .= ".arp_price_table_" . $template_name . " #main_" . $j . " .arp_ribbon_content:before, .arp_price_table_" . $template_name . " #main_" . $j . " .arp_ribbon_content:after{";
                                    $tablestring .= "border-top-color:" . $gradient_color . " !important;";
                                    $tablestring .= "}";
                                }
                                if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3') {
                                    $tablestring .= ".arp_price_table_" . $template_name . " #main_" . $j . " .arp_ribbon_content:before, .arp_price_table_" . $template_name . " #main_" . $j . " .arp_ribbon_content:after{";
                                    $tablestring .= "border-top-color:" . $base_color . " !important;";
                                    $tablestring .= "}";
                                    $tablestring .= ".arp_price_table_" . $template_name . " #main_" . $j . " .arp_ribbon_content{";
                                    $tablestring .= "border-top:75px solid " . $base_color . ";";
                                    $tablestring .= "color:" . $columns['ribbon_setting']['arp_ribbon_txtcol'] . ";";
                                    $tablestring .= "}";
                                } else {
                                    if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_1') {
                                        $tablestring .= ".arp_price_table_" . $template_name . " #main_" . $j . " .arp_ribbon_content{";
                                        $tablestring .= "background:" . $gradient_color . ";";
                                        $tablestring .= "background-color:" . $gradient_color . ";";
                                        $tablestring .= "background-image:-moz-linear-gradient(0deg," . $gradient_color . "," . $base_color . "," . $gradient_color . ")";
                                        $tablestring .= "background-image:-webkit-gradient(linear, 0 0, 0 0, color-stop(0%," . $gradient_color . "), color-stop(50%," . $base_color . "), color-stop(100%," . $gradient_color . "));";
                                        $tablestring .= "background-image:-webkit-linear-gradient(left," . $gradient_color . " 0%, " . $base_color . " 51%, " . $gradient_color . " 100%);";
                                        $tablestring .= "background-image:-o-linear-gradient(left," . $gradient_color . " 0%, " . $base_color . " 51%, " . $gradient_color . " 100%);";
                                        $tablestring .= "background-image:linear-gradient(90deg," . $gradient_color . "," . $base_color . ", " . $gradient_color . ");";
                                        $tablestring .= "background-image:-ms-linear-gradient(left," . $gradient_color . "," . $base_color . ", " . $gradient_color . ");";
                                        $tablestring .= "filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='" . $base_color . "', endColorstr='" . $gradient_color . "', GradientType=1);";
                                        $tablestring .= '-ms-filter: "progid:DXImageTransform.Microsoft.gradient (startColorstr="' . $base_color . '", endColorstr="' . $gradient_color . '", GradientType=1)";';
                                        $tablestring .= "background-repeat:repeat-x;";
                                        $tablestring .= "border-top:1px solid {$ribbon_border_color};";
                                        $tablestring .= "box-shadow:13px 1px 2px rgba(0,0,0,0.6);";
                                        $tablestring .= "color:" . $columns['ribbon_setting']['arp_ribbon_txtcol'] . ";";
                                        $tablestring .= "text-shadow:0 0 1px rgba(0,0,0,0.4);";
                                        $tablestring .= "}";
                                    } else {
                                        $tablestring .= ".arp_price_table_" . $template_name . " #main_" . $j . " .arp_ribbon_content{";
                                        $tablestring .= "background:" . $base_color . ";";
                                        $tablestring .= "background-color:" . $base_color . ";";
                                        $tablestring .= "background-image:-moz-linear-gradient(top, " . $base_color . ", " . $gradient_color . ");";
                                        $tablestring .= "background-image:-webkit-gradient(linear, 0 0, 0 100%, from(" . $base_color . "), to(" . $gradient_color . "));";
                                        $tablestring .= "background-image:-webkit-linear-gradient(top, " . $base_color . ", " . $gradient_color . ");";
                                        $tablestring .= "background-image:-o-linear-gradient(top, " . $base_color . ", " . $gradient_color . ");";
                                        $tablestring .= "background-image:linear-gradient(to bottom, " . $base_color . ", " . $gradient_color . ");";
                                        $tablestring .= "background-repeat:repeat-x;";
                                        $tablestring .= "filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='" . $base_color . "', endColorstr='" . $gradient_color . "', GradientType=0);";
                                        $tablestring .= '-ms-filter: "progid:DXImageTransform.Microsoft.gradient (startColorstr="' . $base_color . '", endColorstr="' . $gradient_color . '", GradientType=0)";';
                                        if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_2') {
                                            $tablestring .= "box-shadow:0 -1px 1px rgba(0,0,0,0.4);";
                                        } else if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_5') {
                                            $tablestring .= "box-shadow:-2px 2px 1px rgba(0, 0, 0, 0.3);";
                                        } else {
                                            $tablestring .= "box-shadow:0 0 3px rgba(0,0,0,0.3);";
                                        }
                                        $tablestring .= "color:" . $columns['ribbon_setting']['arp_ribbon_txtcol'] . ";";
                                        $tablestring .= "}";
                                    }
                                }
                            } else {
                                if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_1' or $columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3') {
                                    $tablestring .= ".arp_price_table_" . $template_name . " #main_" . $j . " .arp_ribbon_content:before,#main_" . $j . " .arp_ribbon_content:after{";
                                    $tablestring .= "border-top-color:" . $base_color . "  !important;";
                                    $tablestring .= "}";
                                }
                                if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3') {
                                    $tablestring .= ".arp_price_table_" . $template_name . " #main_" . $j . " .arp_ribbon_content{";
                                    $tablestring .= "border-top:75px solid " . $base_color . ";";
                                    $tablestring .= "color:" . $columns['ribbon_setting']['arp_ribbon_txtcol'] . ";";
                                    $tablestring .= "}";
                                } else {
                                    $tablestring .= ".arp_price_table_" . $template_name . " #main_" . $j . " .arp_ribbon_content{";
                                    $tablestring .= "background:" . $base_color . ";";
                                    $tablestring .= "color:" . $columns['ribbon_setting']['arp_ribbon_txtcol'] . ";";
                                    $tablestring .= "}";
                                }
                            }
                            $tablestring .= "</style>";
                        }

                        if (($columns['ribbon_setting']['arp_ribbon_content'] != '' && $columns['ribbon_setting']['arp_ribbon'] != 'arp_ribbon_6') || ($columns['ribbon_setting']['arp_custom_ribbon'] != '' && $columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6')) {
                            $tablestring .= "<div  class='arp_ribbon_container $one_toggle_selected toggle_step_first arp_ribbon_" . strtolower($columns['ribbon_setting']['arp_ribbon_position']) . " " . $columns['ribbon_setting']['arp_ribbon'] . " ' style='" . $columns_custom_ribbon_position . "' >";

                            $tablestring .= "<div class='arp_ribbon_content arp_ribbon_" . strtolower($columns['ribbon_setting']['arp_ribbon_position']) . "'>";
                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3')
                                $tablestring .= "<span>";
                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6')
                                $tablestring .= "<img src='" . $columns['ribbon_setting']['arp_custom_ribbon'] . "' alt='custom_ribbon' />";
                            else
                                $tablestring .= stripcslashes($columns['ribbon_setting']['arp_ribbon_content']);
                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3')
                                $tablestring .= "</span>";
                            $tablestring .= "</div>";

                            $tablestring .= "</div>";
                        }
                        if (($columns['ribbon_setting']['arp_ribbon_content_second'] != '' && $columns['ribbon_setting']['arp_ribbon'] != 'arp_ribbon_6') || ($columns['ribbon_setting']['arp_custom_ribbon_second'] != '' && $columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6')) {
                            $tablestring .= "<div  class='arp_ribbon_container toggle_step_second $two_toggle_selected arp_ribbon_" . strtolower($columns['ribbon_setting']['arp_ribbon_position']) . " " . $columns['ribbon_setting']['arp_ribbon'] . " ' style='" . $columns_custom_ribbon_position . "' >";

                            $tablestring .= "<div class='arp_ribbon_content arp_ribbon_" . strtolower($columns['ribbon_setting']['arp_ribbon_position']) . "'>";
                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3')
                                $tablestring .= "<span>";
                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6')
                                $tablestring .= "<img src='" . $columns['ribbon_setting']['arp_custom_ribbon_second'] . "' />";
                            else
                                $tablestring .= stripcslashes($columns['ribbon_setting']['arp_ribbon_content_second']);
                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3')
                                $tablestring .= "</span>";
                            $tablestring .= "</div>";

                            $tablestring .= "</div>";
                        }
                        if (($columns['ribbon_setting']['arp_ribbon_content_third'] != '' && $columns['ribbon_setting']['arp_ribbon'] != 'arp_ribbon_6') || ($columns['ribbon_setting']['arp_custom_ribbon_third'] != '' && $columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6')) {
                            $tablestring .= "<div  class='arp_ribbon_container toggle_step_third $three_toggle_selected arp_ribbon_" . strtolower($columns['ribbon_setting']['arp_ribbon_position']) . " " . $columns['ribbon_setting']['arp_ribbon'] . " ' style='" . $columns_custom_ribbon_position . "' >";

                            $tablestring .= "<div class='arp_ribbon_content arp_ribbon_" . strtolower($columns['ribbon_setting']['arp_ribbon_position']) . "'>";
                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3')
                                $tablestring .= "<span>";
                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6')
                                $tablestring .= "<img src='" . $columns['ribbon_setting']['arp_custom_ribbon_third'] . "' />";
                            else
                                $tablestring .= stripcslashes($columns['ribbon_setting']['arp_ribbon_content_third']);
                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3')
                                $tablestring .= "</span>";
                            $tablestring .= "</div>";

                            $tablestring .= "</div>";
                        }
                    }

                    if (!empty($columns['column_background_image']) && $ref_template === 'arptemplate_24') {
                        $column_level_bgi_class = ' hide_col_bg_img ';
                    } else {
                        $column_level_bgi_class = '';
                    }
                    $tablestring .= "<div class='arp_column_content_wrapper $column_level_bgi_class'>";

                    $tablestring .= "<div class='arpcolumnheader " . $header_cls . "'>";

                    if ( $template_feature['header_shortcode_position'] == 'position_1') {
                        $tablestring .= "<div class='arp_header_shortcode toggle_step_first $one_toggle_selected'>";
                        if ($template_feature['header_shortcode_type'] == 'normal')
                            $tablestring .= do_shortcode($columns['arp_header_shortcode']);
                        else if ($template_feature['header_shortcode_type'] == 'rounded_corner') {
                            $tablestring .= "<div class='rounded_corner_wrapper $shortcode_class'>";
                            $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode($columns['arp_header_shortcode']) . "</div>";
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='arp_header_shortcode toggle_step_second $two_toggle_selected'>";
                        if ($template_feature['header_shortcode_type'] == 'normal')
                            $tablestring .= do_shortcode(@$columns['arp_header_shortcode_second']);
                        else if ($template_feature['header_shortcode_type'] == 'rounded_corner') {
                            $tablestring .= "<div class='rounded_corner_wrapper $shortcode_class'>";
                            $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode(@$columns['arp_header_shortcode_second']) . "</div>";
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='arp_header_shortcode toggle_step_third $three_toggle_selected'>";
                        if ($template_feature['header_shortcode_type'] == 'normal')
                            $tablestring .= do_shortcode(@$columns['arp_header_shortcode_third']);
                        else if ($template_feature['header_shortcode_type'] == 'rounded_corner') {
                            $tablestring .= "<div class='rounded_corner_wrapper $shortcode_class'>";
                            $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode(@$columns['arp_header_shortcode_third']) . "</div>";
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                    }

                    if (@$columns['is_caption'] == 1) {
                        $tablestring .= "<div class='arpcaptiontitle'>" . do_shortcode(stripslashes_deep(@$columns['html_content'])) . "</div>";
                    } else {

                        $tablestring .= "<div class='arppricetablecolumntitle'>";

                        $tablestring .= "<div class='bestPlanTitle " . $title_cls . " package_title_first toggle_step_first $one_toggle_selected'>" . do_shortcode(stripslashes_deep(@$columns['package_title'])) . "</div>";
                        $tablestring .= "<div class='bestPlanTitle " . $title_cls . " package_title_second toggle_step_second $two_toggle_selected'>" . do_shortcode(stripslashes_deep(isset($columns['package_title_second']) ? $columns['package_title_second'] : '')) . "</div>";
                        $tablestring .= "<div class='bestPlanTitle " . $title_cls . " package_title_third toggle_step_third $three_toggle_selected'>" . do_shortcode(stripslashes_deep(isset($columns['package_title_third']) ? $columns['package_title_third'] : '')) . "</div>";

                        if ($template_feature['column_description'] == 'enable' && $template_feature['column_description_style'] == 'style_1') {
                            $tablestring .= "<div class='column_description " . $title_cls . " column_description_first_step toggle_step_first $one_toggle_selected'>" . stripslashes_deep(@$columns['column_description']) . "</div>";
                            $tablestring .= "<div class='column_description " . $title_cls . " column_description_second_step toggle_step_second $two_toggle_selected'>" . stripslashes_deep(@$columns['column_description_second']) . "</div>";
                            $tablestring .= "<div class='column_description " . $title_cls . " column_description_third_step toggle_step_third $three_toggle_selected'>" . stripslashes_deep(@$columns['column_description_third']) . "</div>";
                        }

                        $tablestring .= "</div>";

                        if ($template_feature['column_description'] == 'enable' && $template_feature['column_description_style'] == 'style_3') {
                            $tablestring .= "<div class='column_description " . $title_cls . " column_description_first_step toggle_step_first $one_toggle_selected'>" . stripslashes_deep(@$columns['column_description']) . "</div>";
                            $tablestring .= "<div class='column_description " . $title_cls . " column_description_second_step toggle_step_second $two_toggle_selected'>" . stripslashes_deep(@$columns['column_description_second']) . "</div>";
                            $tablestring .= "<div class='column_description " . $title_cls . " column_description_third_step toggle_step_third $three_toggle_selected'>" . stripslashes_deep(@$columns['column_description_third']) . "</div>";
                        }

                        if ($template_feature['button_position'] == 'position_2') {
                            $columns['paypal_code'] = isset($columns['paypal_code']) ? $columns['paypal_code'] : "";
                            $columns['btn_img'] = isset($columns['btn_img']) ? $columns['btn_img'] : "";

                            if ($columns['paypal_code'] != '') {
                                $columns['paypal_code'] = do_shortcode($columns['paypal_code']);
                                $paypal_btn = 1;
                            } else {
                                $paypal_btn = 0;
                            }
                            if (@$columns['paypal_code_second'] != '') {
                                $columns['paypal_code_second'] = do_shortcode(@$columns['paypal_code_second']);
                                $paypal_btn_second = 1;
                            } else {
                                $paypal_btn_second = 0;
                            }
                            if (@$columns['paypal_code_third'] != '') {
                                $columns['paypal_code_third'] = do_shortcode(@$columns['paypal_code_third']);
                                $paypal_btn_third = 1;
                            } else {
                                $paypal_btn_third = 0;
                            }

                            $tablestring .= "<div class='arpcolumnfooter $footer_hover_class'>";
                            $hide_default_btn_true = "";
                            if (@$columns['hide_default_btn'] == 1) {
                                $hide_default_btn_true = 'hide_default_btn_true';
                            }

                            $footer_content_below_btn = "";
                            if (@$columns['footer_content'] != '' and @ $columns['footer_content_position'] == 1 and $template_feature['has_footer_content'] == 1)
                                $footer_content_above_btn = "display:block;";
                            else
                                $footer_content_above_btn = "display:none;";
                            if ($template_feature['has_footer_content'] == 1) {
                                $tablestring .= "<div class='arp_footer_content arp_btn_before_content' style='{$footer_content_above_btn}'>";

                                $tablestring .= "<span class='footer_content_first_step arp_footer_content_text toggle_step_first $one_toggle_selected'>";
                                $tablestring .= @$columns['footer_content'];
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_second_step arp_footer_content_text toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_third_step arp_footer_content_text toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                                $tablestring .= "</span>";

                                $tablestring .= "</div>";
                            }

                            if (@$columns['button_background_color'] != '') {
                                $button_background_color = @$columns['button_background_color'];
                            } else {
                                $button_background_color = '';
                            }

                            $tablestring .= "<div class='arppricetablebutton toggle_step_first $one_toggle_selected " . $hide_default_btn_true . "' style='text-align:center;'>";

                            $tablestring .= "<button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . "' data-is-post-variables='" . @$columns['is_post_variables'] . "' data-post-variables='" . stripslashes(@$columns['post_variables_content']) . "' ";
                            if (@$columns['btn_img'] != "" && @$columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='background:" . @$columns['button_background_color'] . " url(" . @$columns['btn_img'] . ") no-repeat !important;width:" . @$columns['btn_img_width'] . "px;height:" . @$columns['btn_img_height'] . "px;'";
                            }
                            if (@$columns['hide_default_btn'] == 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= " onclick='arp_redirect(\"" . $columns['button_url'] . "\", \"";
                            if (@$columns['is_new_window'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",\"";
                            if (@$columns['is_new_window_actual'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",";
                            $tablestring .= "\"" . $paypal_btn . "\",this,\"" . $table_id . "\",\"main_" . $j . "\"); '>";
                            if (@$columns['btn_img'] == "") {
                                $tablestring .= "<span class='btn_content_first_step bestPlanButton_text'>";
                                $tablestring .= stripslashes_deep(@$columns['button_text']);
                                $tablestring .= "</span>";
                            } $tablestring .= "</button>";
                            $tablestring .= "<div class='arp_paypal_form' id='paypal_form_first_$j' ";
                            if (@$columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= ">";
                            $tablestring .= do_shortcode(@$columns['paypal_code']);
                            $tablestring .= "</div>";

                            $tablestring .= "</div>";

                            $tablestring .= "<div class='arppricetablebutton toggle_step_second $two_toggle_selected " . $hide_default_btn_true . "' style='text-align:center;'>";
                            $tablestring .= "<button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . "' data-is-post-variables='" . @$columns['is_post_variables'] . "' data-post-variables='" . stripslashes(@$columns['post_variables_content_second']) . "' ";
                            if (@$columns['btn_img'] != "" && @$columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='background:" . @$columns['button_background_color'] . " url(" . @$columns['btn_img'] . ") no-repeat !important;width:" . @$columns['btn_img_width'] . "px;height:" . @$columns['btn_img_height'] . "px;'";
                            }
                            if (@$columns['hide_default_btn'] == 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= " onclick='arp_redirect(\"" . @$columns['button_url_second'] . "\", \"";
                            if (@$columns['is_new_window'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",\"";
                            if (@$columns['is_new_window_actual'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",";
                            $tablestring .= "\"" . $paypal_btn_second . "\",this,\"" . $table_id . "\",\"main_" . $j . "\"); '>";
                            if (@$columns['btn_img'] == "") {
                                $tablestring .= "<span class='btn_content_second_step bestPlanButton_text'>";
                                $tablestring .= stripslashes_deep(@$columns['btn_content_second']);
                                $tablestring .= "</span>";
                                /* w3c validator */
//                                $tablestring .= "</span>";
                            } $tablestring .= "</button>";
                            $tablestring .= "<div class='arp_paypal_form' id='paypal_form_second_$j' ";
                            if (@$columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= ">";
                            $tablestring .= do_shortcode(@$columns['paypal_code_second']);
                            $tablestring .= "</div>";

                            $tablestring .= "</div>";
                            $tablestring .= "<div class='arppricetablebutton toggle_step_third $three_toggle_selected $hide_default_btn_true' style='text-align:center;'>";
                            $tablestring .= "<button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . "' data-is-post-variables='" . @$columns['is_post_variables'] . "' data-post-variables='" . stripslashes(@$columns['post_variables_content_third']) . "' ";
                            if (@$columns['btn_img'] != "" && @$columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='background:" . @$columns['button_background_color'] . " url(" . @$columns['btn_img'] . ") no-repeat !important;width:" . @$columns['btn_img_width'] . "px;height:" . @$columns['btn_img_height'] . "px;'";
                            }
                            if (@$columns['hide_default_btn'] == 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= " onclick='arp_redirect(\"" . @$columns['button_url_third'] . "\", \"";
                            if (@$columns['is_new_window'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",\"";
                            if (@$columns['is_new_window_actual'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",";
                            $tablestring .= "\"" . $paypal_btn_third . "\",this,\"" . $table_id . "\",\"main_" . $j . "\"); '>";
                            if (@$columns['btn_img'] == "") {
                                $tablestring .= "<span class='btn_content_third_step bestPlanButton_text'>";
                                $tablestring .= stripslashes_deep(@$columns['btn_content_third']);
                                $tablestring .= "</span>";
                            } $tablestring .= "</button>";
                            $tablestring .= "<div class='arp_paypal_form' id='paypal_form_third_$j' ";
                            if (@$columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= ">";
                            $tablestring .= do_shortcode(@$columns['paypal_code_third']);
                            $tablestring .= "</div>";

                            $tablestring .= "</div>";
                            $footer_content_below_btn = "";
                            if ($columns['footer_content'] != '' and $columns['footer_content_position'] == 0)
                                $footer_content_below_btn = "display:block;";
                            else
                                $footer_content_below_btn = "display:none;";
                            if ($template_feature['has_footer_content'] == 1) {
                                $tablestring .= "<div class='arp_footer_content arp_btn_after_content' style='{$footer_content_below_btn}'>";

                                $tablestring .= "<span class='footer_content_first_step arp_footer_content_text toggle_step_first $one_toggle_selected'>";
                                $tablestring .= $columns['footer_content'];
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_second_step arp_footer_content_text toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['footer_content_second']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_third_step arp_footer_content_text toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['footer_content_third']);
                                $tablestring .= "</span>";

                                $tablestring .= "</div>";
                            }
                            $tablestring .= "</div>";
                        }

                        if ($template_feature['header_shortcode_position'] == 'default') {
                            if ( $template_feature['header_shortcode_type'] == 'normal') {
                                $tablestring .= "<div class='arp_header_shortcode toggle_step_first $one_toggle_selected'>" . do_shortcode(@$columns['arp_header_shortcode']) . "</div>";
                                $tablestring .= "<div class='arp_header_shortcode toggle_step_second $two_toggle_selected'>" . do_shortcode(@$columns['arp_header_shortcode_second']) . "</div>";
                                $tablestring .= "<div class='arp_header_shortcode toggle_step_third $three_toggle_selected'>" . do_shortcode(@$columns['arp_header_shortcode_third']) . "</div>";
                            } else if ($template_feature['header_shortcode_type'] == 'rounded_border') {
                                $tablestring .= "<div class='arp_rounded_first arp_rounded_shortcode_wrapper toggle_step_first $one_toggle_selected'>";
                                $tablestring .= "<div class='rounded_corner_wrapper $shortcode_class'>";
                                $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode(@$columns['arp_header_shortcode']) . "</div>";
                                $tablestring .= "</div>";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='arp_rounded_second arp_rounded_shortcode_wrapper toggle_step_second $two_toggle_selected'>";
                                $tablestring .= "<div class='rounded_corner_wrapper $shortcode_class'>";
                                $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode(@$columns['arp_header_shortcode_second']) . "</div>";
                                $tablestring .= "</div>";
                                $tablestring .= "</div>";
                                $tablestring .= "<div class='arp_rounded_third arp_rounded_shortcode_wrapper toggle_step_third $three_toggle_selected'>";
                                $tablestring .= "<div class='rounded_corner_wrapper $shortcode_class'>";
                                $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode(@$columns['arp_header_shortcode_third']) . "</div>";
                                $tablestring .= "</div>";
                                $tablestring .= "</div>";
                            }

                            //$tablestring .= "<div class='arp_header_shortcode'>".do_shortcode( $columns['arp_header_shortcode'] )."</div>";
                        }
                        if ($template_feature['amount_style'] != 'style_3') {
                            if (!empty($columns['column_background_image']) && $ref_template == 'arptemplate_21') {
                                $column_bgi_class = ' hide_col_bg_img ';
                            } else {
                                $column_bgi_class = '';
                            }

                            $tablestring .= "<div class='arppricetablecolumnprice $column_bgi_class" . $template_feature['amount_style'] . "'>";

                            if ($template_feature['amount_style'] == 'default') {
                                if ($ref_template == 'arptemplate_4') {
                                    $tablestring .="<div class='rounded_corner_wrapper $shortcode_class'>";
                                    $tablestring .= "<div class='arp_price_wrapper rounded_corder $shortcode_class' data-column='main_" . $j . "'>";
                                } else {
                                    $tablestring .= "<div class='arp_price_wrapper' data-column='main_" . $j . "'>";
                                }

                                if ($ref_template == 'arptemplate_1' || $ref_template == 'arptemplate_21' || $ref_template == 'arptemplate_22' || $ref_template == 'arptemplate_23' || $ref_template == 'arptemplate_24' || $ref_template == 'arptemplate_10' || $ref_template == 'arptemplate_16' || $ref_template == 'arptemplate_14' || $ref_template == 'arptemplate_13' || $ref_template == 'arptemplate_11' || $ref_template == 'arptemplate_8' || $ref_template == 'arptemplate_6' || $ref_template == 'arptemplate_4' || $ref_template == 'arptemplate_2' || $ref_template == 'arptemplate_20' || $ref_template == 'arptemplate_7' || $ref_template == 'arptemplate_5' || $ref_template == 'arptemplate_9' || $ref_template == 'arptemplate_15') {

                                    $tablestring .= "<span class='price_text_first_step arp_price_wrapper_text toggle_step_first $one_toggle_selected'>";
                                    $tablestring .= @$columns['price_text'];
                                    $tablestring .= '</span>';

                                    $tablestring .= "<span class='price_text_second_step arp_price_wrapper_text toggle_step_second $two_toggle_selected'>";
                                    $tablestring .= @$columns['price_text_two_step'];
                                    $tablestring .= '</span>';

                                    $tablestring .= "<span class='price_text_third_step arp_price_wrapper_text toggle_step_third $three_toggle_selected'>";
                                    $tablestring .= @$columns['price_text_three_step'];
                                    $tablestring .= '</span>';
                                    if ($ref_template == 'arptemplate_4') {
                                        $tablestring .= "</div>";
                                    }
                                } else if ($ref_template == 'arptemplate_4') {

                                    $tablestring .= "<div class='arpmain_price'>";
                                    $tablestring .= "<div class='arp_pricerow $column_bgi_class'>";
                                    $tablestring .= "<span class=\"arp_price_value\">";
                                    $tablestring .= "<span class='price_text_first_step arp_price_value_text toggle_step_first $one_toggle_selected'>";
                                    $tablestring .= $columns['price_text'];
                                    $tablestring .= '</span>';

                                    $tablestring .= "<span class='price_text_second_step arp_price_value_text toggle_step_second $two_toggle_selected'>";
                                    $tablestring .= @$columns['price_text_two_step'];
                                    $tablestring .= '</span>';

                                    $tablestring .= "<span class='price_text_third_step arp_price_value_text toggle_step_third $three_toggle_selected'>";
                                    $tablestring .= @$columns['price_text_three_step'];
                                    $tablestring .= '</span>';
                                    $tablestring .= "</span>";

                                    $tablestring .= "<span class=\"arp_price_duration\">";
                                    $tablestring .= "<span class='price_text_first_step arp_price_duration_text toggle_step_first $one_toggle_selected'>";
                                    $tablestring .= @$columns['price_label'];
                                    $tablestring .= '</span>';

                                    $tablestring .= "<span class='price_text_second_step arp_price_duration_text toggle_step_second $two_toggle_selected'>";
                                    $tablestring .= @$columns['price_text_input_two_step_label'];
                                    $tablestring .= '</span>';

                                    $tablestring .= "<span class='price_text_third_step arp_price_duration_text toggle_step_third $three_toggle_selected'>";
                                    $tablestring .= @$columns['price_text_input_three_step_label'];
                                    $tablestring .= '</span>';
                                    $tablestring .= "</span>";
                                    $tablestring .= "</div>";
                                    $tablestring .= "</div>";
                                } else {
                                    $tablestring .= "<span class=\"arp_price_value\">";
                                    $tablestring .= "<span class='price_text_first_step arp_price_value_text toggle_step_first $one_toggle_selected'>";
                                    $tablestring .= @$columns['price_text'];
                                    $tablestring .= '</span>';

                                    $tablestring .= "<span class='price_text_second_step arp_price_value_text toggle_step_second $two_toggle_selected'>";
                                    $tablestring .= isset($columns['price_text_two_step']) ? $columns['price_text_two_step'] : '';
                                    $tablestring .= '</span>';

                                    $tablestring .= "<span class='price_text_third_step arp_price_value_text toggle_step_third $three_toggle_selected'>";
                                    $tablestring .= isset($columns['price_text_three_step']) ? $columns['price_text_three_step'] : '';
                                    $tablestring .= '</span>';
                                    $tablestring .= "</span>";

                                    $tablestring .= "<span class=\"arp_price_duration\">";
                                    $tablestring .= "<span class='price_text_first_step arp_price_duration_text toggle_step_first $one_toggle_selected'>";
                                    $tablestring .= @$columns['price_label'];
                                    $tablestring .= '</span>';

                                    $tablestring .= "<span class='price_text_second_step arp_price_duration_text toggle_step_second $two_toggle_selected'>";
                                    $tablestring .= isset($columns['price_text_input_two_step_label']) ? $columns['price_text_input_two_step_label'] : '';
                                    $tablestring .= '</span>';

                                    $tablestring .= "<span class='price_text_third_step arp_price_duration_text toggle_step_third $three_toggle_selected'>";
                                    $tablestring .= @$columns['price_text_input_three_step_label'];
                                    $tablestring .= '</span>';
                                    $tablestring .= "</span>";
                                }
                                $tablestring .= "</div>";

                                $tablestring .= isset($columns['html_content']) ? $columns['html_content'] : "";
                            } else if ($template_feature['amount_style'] == 'style_1') {
                                $tablestring .= "<div class='arp_pricename'>";
                                $tablestring .= "<div class='arp_price_wrapper' data-column='main_" . $j . "'>";
//                                $tablestring .= "<span class=\"arp_price_value\">";
                                $tablestring .= "<span class='price_text_first_step arp_price_value_text toggle_step_first $one_toggle_selected'>";
                                $tablestring .= @$columns['price_text'];
                                $tablestring .= '</span>';

                                $tablestring .= "<span class='price_text_second_step arp_price_value_text toggle_step_second $two_toggle_selected'>";
                                $tablestring .= @$columns['price_text_two_step'];
                                $tablestring .= '</span>';

                                $tablestring .= "<span class='price_text_third_step arp_price_value_text toggle_step_third $three_toggle_selected'>";
                                $tablestring .= @$columns['price_text_three_step'];
                                $tablestring .= '</span>';
                                $tablestring .= "</div>";
                                $tablestring .= "</div>";
                            } else if ($template_feature['amount_style'] == 'style_2') {
                                //$tablestring .= "<div class='arppricetablecolumnprice style_2' data-column='main_".$j."' data-template_id='".$template_id."' data-level='pricing_level_options' data-type='other_columns_buttons'>";
                                $tablestring .= "<div class='arp_price_wrapper' data-column='main_" . $j . "'>";
                                $tablestring .= "<span class=\"arp_price_duration\">";
                                $tablestring .= "<span class='price_text_first_step arp_price_duration_text toggle_step_first $one_toggle_selected'>";
                                $tablestring .= @$columns['price_label'];
                                $tablestring .= '</span>';

                                $tablestring .= "<span class='price_text_second_step arp_price_duration_text toggle_step_second $two_toggle_selected'>";
                                $tablestring .= @$columns['price_text_input_two_step_label'];
                                $tablestring .= '</span>';

                                $tablestring .= "<span class='price_text_third_step arp_price_duration_text toggle_step_third $three_toggle_selected'>";
                                $tablestring .= @$columns['price_text_input_three_step_label'];
                                $tablestring .= '</span>';
                                $tablestring .= "</span>";

                                $tablestring .= "<span class=\"arp_price_value\">";
                                $tablestring .= "<span class='price_text_first_step arp_price_value_text toggle_step_first $one_toggle_selected'>";
                                $tablestring .= @$columns['price_text'];
                                $tablestring .= '</span>';

                                $tablestring .= "<span class='price_text_second_step arp_price_value_text toggle_step_second $two_toggle_selected'>";
                                $tablestring .= @$columns['price_text_two_step'];
                                $tablestring .= '</span>';

                                $tablestring .= "<span class='price_text_third_step arp_price_value_text toggle_step_third $three_toggle_selected'>";
                                $tablestring .= @$columns['price_text_three_step'];
                                $tablestring .= '</span>';
                                $tablestring .= "</span>";
                                $tablestring .= "</div>";
                                $tablestring .= do_shortcode(isset($columns['html_content']) ? $columns['html_content'] : "" );
                            }

                            if ($ref_template == 'arptemplate_12')
                                $tablestring .= "<div class='custom_seperator_1'></div>";

                            if ($template_feature['column_description'] == 'enable' && $template_feature['column_description_style'] == 'style_2') {
                                $tablestring .= "<div class='custom_ribbon_wrapper'>";
                                $tablestring .= "<div class='column_description column_description_first_step toggle_step_first $one_toggle_selected'>" . stripslashes_deep(@$columns['column_description']) . "</div>";
                                $tablestring .= "<div class='column_description column_description_second_step toggle_step_second $two_toggle_selected'>" . stripslashes_deep(@$columns['column_description_second']) . "</div>";
                                $tablestring .= "<div class='column_description column_description_third_step toggle_step_third $three_toggle_selected'>" . stripslashes_deep(@$columns['column_description_third']) . "</div>";
                                $tablestring .= "</div>";
                            }

                            if ($template_feature['column_description'] == 'enable' && $template_feature['column_description_style'] == 'style_4') {
                                $first_desc_blank = $second_desc_blank = $third_desc_blank = '';
                                $first_desc_blank = empty($columns['column_description']) ? ' desc_content_blank' : '';
                                $second_desc_blank = empty($columns['column_description_second']) ? ' desc_content_blank' : '';
                                $third_desc_blank = empty($columns['column_description_third']) ? ' desc_content_blank' : '';

                                $tablestring .= "<div class='column_description column_description_first_step toggle_step_first $one_toggle_selected " . $first_desc_blank . "'>" . stripslashes_deep(@$columns['column_description']) . "</div>";
                                $tablestring .= "<div class='column_description column_description_second_step toggle_step_second $two_toggle_selected $second_desc_blank'>" . stripslashes_deep(@$columns['column_description_second']) . "</div>";
                                $tablestring .= "<div class='column_description column_description_third_step toggle_step_third $three_toggle_selected $third_desc_blank'>" . stripslashes_deep(@$columns['column_description_third']) . "</div>";
                            }


                            if ($template_feature['button_position'] == 'position_1') {
                                $columns['paypal_code'] = isset($columns['paypal_code']) ? $columns['paypal_code'] : "";
                                $columns['btn_img'] = isset($columns['btn_img']) ? $columns['btn_img'] : "";
                                if (@$columns['paypal_code'] != '') {
                                    $columns['paypal_code'] = do_shortcode(@$columns['paypal_code']);
                                    $paypal_btn = 1;
                                } else {
                                    $paypal_btn = 0;
                                }
                                if (@$columns['paypal_code_second'] != '') {
                                    $columns['paypal_code_second'] = do_shortcode(@$columns['paypal_code_second']);
                                    $paypal_btn_second = 1;
                                } else {
                                    $paypal_btn_second = 0;
                                }
                                if (@$columns['paypal_code_third'] != '') {
                                    $columns['paypal_code_third'] = do_shortcode(@$columns['paypal_code_third']);
                                    $paypal_btn_third = 1;
                                } else {
                                    $paypal_btn_third = 0;
                                }

                                $tablestring .= "<div class='arpcolumnfooter $footer_hover_class'>";
                                $hide_default_btn_true = "";
                                if (@$columns['hide_default_btn'] == 1) {
                                    $hide_default_btn_true = 'hide_default_btn_true';
                                }
                                $footer_content_above_btn = "";
                                if (@$columns['footer_content'] != '' and $columns['footer_content_position'] == 1)
                                    $footer_content_above_btn = "display:block;";
                                else
                                    $footer_content_above_btn = "display:none;";
                                if ($template_feature['has_footer_content'] == 1) {
                                    $tablestring .= "<div class='arp_footer_content arp_btn_before_content' style='{$footer_content_above_btn}'>";

                                    $tablestring .= "<span class='footer_content_first_step arp_footer_content_text toggle_step_first $one_toggle_selected'>";
                                    $tablestring .= @$columns['footer_content'];
                                    $tablestring .= "</span>";

                                    $tablestring .= "<span class='footer_content_second_step arp_footer_content_text toggle_step_second $two_toggle_selected'>";
                                    $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                                    $tablestring .= "</span>";

                                    $tablestring .= "<span class='footer_content_third_step arp_footer_content_text toggle_step_third $three_toggle_selected'>";
                                    $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                                    $tablestring .= "</span>";

                                    $tablestring .= "</div>";
                                }
                                $tablestring .= "<div class='arppricetablebutton toggle_step_first $one_toggle_selected " . $hide_default_btn_true . "' style='text-align:center;'>";

                                $tablestring .= "<button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : "") . "' data-is-post-variables='" . @$columns['is_post_variables'] . "' data-post-variables='" . stripslashes($columns['post_variables_content']) . "' ";
                                if (@$columns['btn_img'] != "" && $columns['hide_default_btn'] != 1) {
                                    $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . @$columns['btn_img'] . ") no-repeat !important;width:" . @$columns['btn_img_width'] . "px;height:" . @$columns['btn_img_height'] . "px;'";
                                }
                                if (@$columns['hide_default_btn'] == 1) {
                                    $tablestring .= "style='display:none;'";
                                }
                                $tablestring .= " onclick='arp_redirect(\"" . @$columns['button_url'] . "\", \"";
                                if (@$columns['is_new_window'] == 1) {
                                    $tablestring .= "1";
                                } else {
                                    $tablestring .= "0";
                                } $tablestring .="\",\"";
                                if (@$columns['is_new_window_actual'] == 1) {
                                    $tablestring .= "1";
                                } else {
                                    $tablestring .= "0";
                                } $tablestring .="\",";
                                $tablestring .= "\"" . $paypal_btn . "\",this,\"" . $table_id . "\",\"main_" . $j . "\"); '>";
                                if (@$columns['btn_img'] == "") {
                                    $tablestring .= "<span class='btn_content_first_step bestPlanButton_text'>";
                                    $tablestring .= stripslashes_deep($columns['button_text']);
                                    $tablestring .= "</span>";
                                } $tablestring .= "</button>";
                                $tablestring .= "<div class='arp_paypal_form' id='paypal_form_first_$j' ";
                                if (@$columns['hide_default_btn'] != 1) {
                                    $tablestring .= "style='display:none;'";
                                }
                                $tablestring .= ">";
                                $tablestring .= do_shortcode(@$columns['paypal_code']);
                                $tablestring .= "</div>";
//				}
                                $tablestring .= "</div>";

                                $tablestring .= "<div class='arppricetablebutton toggle_step_second $two_toggle_selected $hide_default_btn_true' style='text-align:center;'>";

                                $tablestring .= "<button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . "' data-is-post-variables='" . @$columns['is_post_variables'] . "' data-post-variables='" . stripslashes(@$columns['post_variables_content_second']) . "' ";
                                if (@$columns['btn_img'] != "" && $columns['hide_default_btn'] != 1) {
                                    $tablestring .= "style='background:" . @$columns['button_background_color'] . " url(" . @$columns['btn_img'] . ") no-repeat !important;width:" . @$columns['btn_img_width'] . "px;height:" . @$columns['btn_img_height'] . "px;'";
                                }
                                if (@$columns['hide_default_btn'] == 1) {
                                    $tablestring .= "style='display:none;'";
                                }
                                $tablestring .= " onclick='arp_redirect(\"" . @$columns['button_url_second'] . "\", \"";
                                if (@$columns['is_new_window'] == 1) {
                                    $tablestring .= "1";
                                } else {
                                    $tablestring .= "0";
                                } $tablestring .="\",\"";
                                if (@$columns['is_new_window_actual'] == 1) {
                                    $tablestring .= "1";
                                } else {
                                    $tablestring .= "0";
                                } $tablestring .="\",";
                                $tablestring .= "\"" . $paypal_btn_second . "\",this,\"" . $table_id . "\",\"main_" . $j . "\"); '>";
                                if (@$columns['btn_img'] == "") {
                                    $tablestring .= "<span class='btn_content_second_step bestPlanButton_text'>";
                                    $tablestring .= stripslashes_deep(@$columns['btn_content_second']);
                                    $tablestring .= "</span>";
                                } $tablestring .= "</button>";
                                $tablestring .= "<div class='arp_paypal_form' id='paypal_form_second_$j' ";
                                if (@$columns['hide_default_btn'] != 1) {
                                    $tablestring .= "style='display:none;'";
                                }
                                $tablestring .= ">";
                                $tablestring .= do_shortcode(@$columns['paypal_code_second']);
                                $tablestring .= "</div>";
//				}
                                $tablestring .= "</div>";

                                $tablestring .= "<div class='arppricetablebutton toggle_step_third $three_toggle_selected $hide_default_btn_true' style='text-align:center'>";

                                $tablestring .= "<button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . "' data-is-post-variables='" . @$columns['is_post_variables'] . "' data-post-variables='" . stripslashes(@$columns['post_variables_content_third']) . "' ";
                                if (@$columns['btn_img'] != "" && @$columns['hide_default_btn'] != 1) {
                                    $tablestring .= "style='background:" . @$columns['button_background_color'] . " url(" . @$columns['btn_img'] . ") no-repeat !important;width:" . @$columns['btn_img_width'] . "px;height:" . @$columns['btn_img_height'] . "px;'";
                                }
                                if (@$columns['hide_default_btn'] == 1) {
                                    $tablestring .= "style='display:none;'";
                                }
                                $tablestring .= " onclick='arp_redirect(\"" . @$columns['button_url_third'] . "\", \"";
                                if (@$columns['is_new_window'] == 1) {
                                    $tablestring .= "1";
                                } else {
                                    $tablestring .= "0";
                                } $tablestring .="\",\"";
                                if (@$columns['is_new_window_actual'] == 1) {
                                    $tablestring .= "1";
                                } else {
                                    $tablestring .= "0";
                                } $tablestring .="\",";
                                $tablestring .= "\"" . $paypal_btn_third . "\",this,\"" . $table_id . "\",\"main_" . $j . "\"); '>";
                                if ($columns['btn_img'] == "") {
                                    $tablestring .= "<span class='btn_content_third_step bestPlanButton_text'>";
                                    $tablestring .= stripslashes_deep(@$columns['btn_content_third']);
                                    $tablestring .= "</span>";
                                } $tablestring .= "</button>";
                                $tablestring .= "<div class='arp_paypal_form' id='paypal_form_third_$j' ";
                                if (@$columns['hide_default_btn'] != 1) {
                                    $tablestring .= "style='display:none;'";
                                }
                                $tablestring .= ">";
                                $tablestring .= do_shortcode(@$columns['paypal_code_third']);
                                $tablestring .= "</div>";
//				}
                                $tablestring .= "</div>";
                                $footer_content_below_btn = "";
                                if (@$columns['footer_content'] != '' and $columns['footer_content_position'] == 0)
                                    $footer_content_below_btn = "display:block;";
                                else
                                    $footer_content_below_btn = "display:none;";
                                if ($template_feature['has_footer_content'] == 1) {
                                    $tablestring .= "<div class='arp_footer_content arp_btn_after_content' style='{$footer_content_below_btn}'>";

                                    $tablestring .= "<span class='footer_content_first_step arp_footer_content_text toggle_step_first $one_toggle_selected'>";
                                    $tablestring .= @$columns['footer_content'];
                                    $tablestring .= "</span>";

                                    $tablestring .= "<span class='footer_content_second_step arp_footer_content_text toggle_step_second $two_toggle_selected'>";
                                    $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                                    $tablestring .= "</span>";

                                    $tablestring .= "<span class='footer_content_third_step arp_footer_content_text toggle_step_third $three_toggle_selected'>";
                                    $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                                    $tablestring .= "</span>";

                                    $tablestring .= "</div>";
                                }
                                $tablestring.= "</div>";
                            }

                            $tablestring .= "</div>";
                        }
                    }
                    if ( $template_feature['header_shortcode_position'] == 'position_2') {
                        $tablestring .= "<div class='arp_header_shortcode toggle_step_first $one_toggle_selected'>";
                        if ($template_feature['header_shortcode_type'] == 'normal')
                            $tablestring .= do_shortcode($columns['arp_header_shortcode']);
                        else if ($template_feature['header_shortcode_type'] == 'rounded_corner') {
                            $tablestring .= "<div class='rounded_corner_wrapper'>";
                            $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode($columns['arp_header_shortcode']) . "</div>";
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='arp_header_shortcode toggle_step_second $two_toggle_selected'>";
                        if ($template_feature['header_shortcode_type'] == 'normal')
                            $tablestring .= do_shortcode($columns['arp_header_shortcode_second']);
                        else if ($template_feature['header_shortcode_type'] == 'rounded_corner') {
                            $tablestring .= "<div class='rounded_corner_wrapper'>";
                            $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode($columns['arp_header_shortcode_second']) . "</div>";
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='arp_header_shortcode toggle_step_third $three_toggle_selected'>";
                        if ($template_feature['header_shortcode_type'] == 'normal')
                            $tablestring .= do_shortcode($columns['arp_header_shortcode_third']);
                        else if ($template_feature['header_shortcode_type'] == 'rounded_corner') {
                            $tablestring .= "<div class='rounded_corner_wrapper'>";
                            $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode($columns['arp_header_shortcode_third']) . "</div>";
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                    }

                    $tablestring .= "</div>";



                    $tablestring .= "<div class='arpbody-content arppricingtablebodycontent'>";
                    if ($template_feature['button_position'] == 'position_3') {
                        $tablestring .= "<div class='column_description " . $title_cls . " column_description_first_step toggle_step_first $one_toggle_selected'>" . stripslashes_deep(@$columns['column_description']) . "</div>";
                        $tablestring .= "<div class='column_description " . $title_cls . " column_description_second_step toggle_step_second $two_toggle_selected'>" . stripslashes_deep(@$columns['column_description_second']) . "</div>";
                        $tablestring .= "<div class='column_description " . $title_cls . " column_description_third_step toggle_step_third $three_toggle_selected'>" . stripslashes_deep(@$columns['column_description_third']) . "</div>";

                        $columns['btn_img'] = isset($columns['btn_img']) ? $columns['btn_img'] : "";

                        $tablestring .= "<div class='arpcolumnfooter " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : "") . " $footer_hover_class' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='button_options' data-type='other_columns_buttons'>";
                        if (@$columns['paypal_code'] != '') {
                            $columns['paypal_code'] = do_shortcode(@$columns['paypal_code']);
                            $paypal_btn = 1;
                        } else {
                            $paypal_btn = 0;
                        }
                        if (@$columns['paypal_code_second'] != '') {
                            $columns['paypal_code_second'] = do_shortcode(@$columns['paypal_code_second']);
                            $paypal_btn_second = 1;
                        } else {
                            $paypal_btn_second = 0;
                        }
                        if (@$columns['paypal_code_third'] != '') {
                            $columns['paypal_code_third'] = do_shortcode(@$columns['paypal_code_third']);
                            $paypal_btn_third = 1;
                        } else {
                            $paypal_btn_third = 0;
                        }
                        $hide_default_btn_true = "";
                        if (@$columns['hide_default_btn'] == 1) {
                            $hide_default_btn_true = 'hide_default_btn_true';
                        }
                        $footer_content_above_btn = "";
                        if (@$columns['footer_content'] != '' and $columns['footer_content_position'] == 1)
                            $footer_content_above_btn = "display:block;";
                        else
                            $footer_content_above_btn = "display:none;";
                        if (@$template_feature['has_footer_content'] == 1) {
                            $tablestring .= "<div class='arp_footer_content arp_btn_before_content' style='{$footer_content_above_btn}'>";

                            $tablestring .= "<span class='footer_content_first_step arp_footer_content_text toggle_step_first $one_toggle_selected'>";
                            $tablestring .= @$columns['footer_content'];
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_second_step arp_footer_content_text toggle_step_second $two_toggle_selected'>";
                            $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_third_step arp_footer_content_text toggle_step_third $three_toggle_selected'>";
                            $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                            $tablestring .= "</span>";

                            $tablestring .= "</div>";
                        }
                        $tablestring .= "<div class='arppricetablebutton toggle_step_first $one_toggle_selected " . $hide_default_btn_true . "' data-column='main_" . $j . "' style='text-align:center;'>";

                        $tablestring .= "<button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : "") . "'  data-is-post-variables='{$columns['is_post_variables']}' data-post-variables='" . stripslashes($columns['post_variables_content']) . "' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='button_options' data-type='other_columns_buttons' ";
                        if ($columns['btn_img'] != "" && $columns['hide_default_btn'] != 1) {
                            $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . $columns['btn_img'] . ") no-repeat !important;width:" . $columns['btn_img_width'] . "px;height:" . $columns['btn_img_height'] . "px;'";
                        }
                        if (@$columns['hide_default_btn'] == 1) {
                            $tablestring .= "style='display:none;'";
                        }
                        $tablestring .= "onclick='arp_redirect(\"" . $columns['button_url'] . "\", \"";
                        if (@$columns['is_new_window'] == 1) {
                            $tablestring .= "1";
                        } else {
                            $tablestring .= "0";
                        } $tablestring .="\",\"";
                        if (@$columns['is_new_window_actual'] == 1) {
                            $tablestring .= "1";
                        } else {
                            $tablestring .= "0";
                        } $tablestring .="\",";
                        $tablestring .="\"" . $paypal_btn . "\",this,\"" . $table_id . "\",\"main_" . $j . "\");'>";
                        if (@$columns['btn_img'] == "") {
                            $tablestring .= "<span class='btn_content_first_step bestPlanButton_text'>";
                            $tablestring .= stripslashes_deep($columns['button_text']);
                            $tablestring .= "</span>";
                        } $tablestring .= "</button>";
                        $tablestring .= "<div class='arp_paypal_form' id='paypal_form_first_$j' ";
                        if (@$columns['hide_default_btn'] != 1) {
                            $tablestring .= "style='display:none;'";
                        }
                        $tablestring .= ">";
                        $tablestring .= do_shortcode(@$columns['paypal_code']);
                        $tablestring .= "</div>";
                        $tablestring .= "</div>";

                        $tablestring .= "<div class='arppricetablebutton toggle_step_second $two_toggle_selected $hide_default_btn_true' data-column='main_" . $j . "' style='text-align:center;'>";

                        $tablestring .= "<button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . "'  data-is-post-variables='" . @$columns['is_post_variables'] . "' data-post-variables='" . stripslashes(@$columns['post_variables_content_second']) . "' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='button_options' data-type='other_columns_buttons' ";
                        if (@$columns['btn_img'] != "" && $columns['hide_default_btn'] != 1) {
                            $tablestring .= "style='background:" . @$columns['button_background_color'] . " url(" . @$columns['btn_img'] . ") no-repeat !important;width:" . @$columns['btn_img_width'] . "px;height:" . @$columns['btn_img_height'] . "px;'";
                        }
                        if (@$columns['hide_default_btn'] == 1) {
                            $tablestring .= "style='display:none;'";
                        }
                        $tablestring .= "onclick='arp_redirect(\"" . @$columns['button_url_second'] . "\", \"";
                        if (@$columns['is_new_window'] == 1) {
                            $tablestring .= "1";
                        } else {
                            $tablestring .= "0";
                        } $tablestring .="\",\"";
                        if (@$columns['is_new_window_actual'] == 1) {
                            $tablestring .= "1";
                        } else {
                            $tablestring .= "0";
                        } $tablestring .="\",";
                        $tablestring .="\"" . $paypal_btn_second . "\",this,\"" . $table_id . "\",\"main_" . $j . "\");'>";
                        if (@$columns['btn_img'] == "") {
                            $tablestring .= "<span class='btn_content_second_step bestPlanButton_text'>";
                            $tablestring .= stripslashes_deep(@$columns['btn_content_second']);
                            $tablestring .= "</span>";
                        } $tablestring .= "</button>";
                        $tablestring .= "<div class='arp_paypal_form' id='paypal_form_second_$j' ";
                        if (@$columns['hide_default_btn'] != 1) {
                            $tablestring .= "style='display:none;'";
                        }
                        $tablestring .= ">";
                        $tablestring .= do_shortcode(@$columns['paypal_code_second']);
                        $tablestring .= "</div>";
                        $tablestring .= "</div>";

                        $tablestring .= "<div class='arppricetablebutton toggle_step_third $three_toggle_selected $hide_default_btn_true' data-column='main_" . $j . "' style='text-align:center;'>";

                        $tablestring .= "<button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . "'  data-is-post-variables='" . @$columns['is_post_variables'] . "' data-post-variables='" . stripslashes(@$columns['post_variables_content_third']) . "' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='button_options' data-type='other_columns_buttons' ";
                        if (@$columns['btn_img'] != "" && $columns['hide_default_btn'] != 1) {
                            $tablestring .= "style='background:" . @$columns['button_background_color'] . " url(" . @$columns['btn_img'] . ") no-repeat !important;width:" . @$columns['btn_img_width'] . "px;height:" . @$columns['btn_img_height'] . "px;'";
                        }
                        if (@$columns['hide_default_btn'] == 1) {
                            $tablestring .= "style='display:none;'";
                        }
                        $tablestring .= "onclick='arp_redirect(\"" . @$columns['button_url_third'] . "\", \"";
                        if (@$columns['is_new_window'] == 1) {
                            $tablestring .= "1";
                        } else {
                            $tablestring .= "0";
                        } $tablestring .="\",\"";
                        if (@$columns['is_new_window_actual'] == 1) {
                            $tablestring .= "1";
                        } else {
                            $tablestring .= "0";
                        } $tablestring .="\",";
                        $tablestring .="\"" . $paypal_btn_third . "\",this,\"" . $table_id . "\",\"main_" . $j . "\");'>";
                        if (@$columns['btn_img'] == "") {
                            $tablestring .= "<span class='btn_content_third_step bestPlanButton_text'>";
                            $tablestring .= stripslashes_deep(@$columns['btn_content_third']);
                            $tablestring .= "</span>";
                        } $tablestring .= "</button>";
                        $tablestring .= "<div class='arp_paypal_form' id='paypal_form_third_$j' ";
                        if (@$columns['hide_default_btn'] != 1) {
                            $tablestring .= "style='display:none;'";
                        }
                        $tablestring .= ">";
                        $tablestring .= do_shortcode(@$columns['paypal_code_third']);
                        $tablestring .= "</div>";

                        $tablestring .= "</div>";
                        $footer_content_below_btn = "";
                        if (@$columns['footer_content'] != '' and @ $columns['footer_content_position'] == 0)
                            $footer_content_below_btn = "display:block;";
                        else
                            $footer_content_below_btn = "display:none;";
                        if ($template_feature['has_footer_content'] == 1) {
                            $tablestring .= "<div class='arp_footer_content arp_btn_after_content' style='{$footer_content_below_btn}'>";

                            $tablestring .= "<span class='footer_content_first_step arp_footer_content_text toggle_step_first $one_toggle_selected'>";
                            $tablestring .= @$columns['footer_content'];
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_second_step arp_footer_content_text toggle_step_second $two_toggle_selected'>";
                            $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_third_step arp_footer_content_text toggle_step_third $three_toggle_selected'>";
                            $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                            $tablestring .= "</span>";

                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                    }




                    $tablestring .= "<ul class='arp_opt_options arppricingtablebodyoptions' id='" . $x . "' style='text-align:" . $columns['body_text_alignment'] . "'>";

                    $r = 0;

                    $row_order = isset($opts['columns'][$j]['row_order']) ? $opts['columns'][$j]['row_order'] : array();
                    if ($row_order && is_array($row_order)) {
                        $rows = array();
                        asort($row_order);
                        $ji = 0;
                        $maxorder = max($row_order) ? max($row_order) : 0;
                        foreach ($opts['columns'][$j]['rows'] as $rowno => $row) {
                            $row_order[$rowno] = isset($row_order[$rowno]) ? $row_order[$rowno] : ($maxorder + 1);
                        }

                        foreach ($row_order as $row_id => $order_id) {
                            if ($opts['columns'][$j]['rows'][$row_id]) {
                                $rows['row_' . $ji] = $opts['columns'][$j]['rows'][$row_id];
                                $ji++;
                            }
                        }

                        $opts['columns'][$j]['rows'] = $rows;
                    }
$last_li_cls = '';
                    for ($ri = 0; $ri <= $maxrowcount; $ri++) {
                        $rows = isset($opts['columns'][$j]['rows']['row_' . $ri]) ? $opts['columns'][$j]['rows']['row_' . $ri] : array();

                        if ($columns['is_caption'] == 1) {
                            if (($ri + 1) % 2 == 0) {
                                $cls = 'rowlightcolorstyle';
                            } else {
                                $cls = '';
                            }
                        } else {
                            if ($x % 2 == 0) {
                                if (($ri + 1) % 2 == 0) {
                                    $cls = 'rowdarkcolorstyle';
                                } else {
                                    $cls = '';
                                }
                            } else {
                                if (($ri + 1) % 2 == 0) {
                                    $cls = 'rowlightcolorstyle';
                                } else {
                                    $cls = '';
                                }
                            }
                        }

                        if (($ri + 1 ) % 2 == 0) {
                            $cls .= " arp_even_row";
                        } else {
                            $cls .= " arp_odd_row";
                        }
                        //$caption_li

                        if (@$rows['row_tooltip'] != '' || @$rows['row_tooltip_second'] != "" || @$rows['row_tooltip_third'] != "") {
                            global $arp_has_tooltip;
                            $arp_has_tooltip = 1;
                        }

                        $fa_pattern = '/class\=\'(fa)\s(.*?)\'/i';

                        $columns['column_title'] = isset($columns['column_title']) ? $columns['column_title'] : "";
                        $columns['html_content'] = isset($columns['html_content']) ? $columns['html_content'] : "";

                        $row_inline_script_old = isset($rows['row_custom_css']) ? $rows['row_custom_css'] : '';
                        $row_inline_script_old = trim($row_inline_script_old);
                        $row_inline_script_old = str_replace("/\r|\n/", "", $row_inline_script_old);
                        $row_inline_script_old = explode(';', $row_inline_script_old);
                        $row_inline_script = '';

                        if (!empty($row_inline_script_old)) {
                            foreach ($row_inline_script_old as $new_css) {
                                if ($new_css != '') {
                                    $new_css = explode(':', $new_css);
                                    if (isset($new_css[0]) && isset($new_css[1])) {

                                        $row_inline_script .= trim(@$new_css[0]) . ' : ' . trim(str_replace("!important", "", @$new_css[1])) . ' ;';
                                    }
                                }
                            }
                        }

                        if ($template_feature['caption_style'] == 'style_1' and $template_feature['list_alignment'] != 'default') {
                            $tablestring .= "<li class='" . $cls;
                            if ($rows['row_tooltip'] != "" || $rows['row_tooltip_second'] != "" || $rows['row_tooltip_third'] != "") {
                                $tablestring .= " arp_tooltip_li";
                            }
                            $li_class = $ref_template . '_' . $j . '_row_' . $ri;
                            $tablestring .= " " . $li_class . "' id='arp_" . $j . '_row_' . $ri . "' style='" . $row_inline_script . "'>";
                            $tablestring .= "<span class='caption_li' >";
                            $tablestring .= "<div  class='row_label_first_step arp_caption_li_text toggle_step_first $one_toggle_selected'>" . (( isset($rows['row_label']) && $rows['row_label'] != '' ) ? stripslashes_deep($rows['row_label']) : '') . "</div>";
                            $tablestring .= "<div class='row_label_second_step arp_caption_li_text toggle_step_second $two_toggle_selected'>" . (( isset($rows['row_label_second']) && $rows['row_label_second'] != '' ) ? stripslashes_deep($rows['row_label_second']) : '') . "</div>";
                            $tablestring .= "<div  class='row_label_third_step arp_caption_li_text toggle_step_third $three_toggle_selected'>" . (( isset($rows['row_label_third']) && $rows['row_label_third'] != '' ) ? stripslashes_deep($rows['row_label_third']) : '') . "</div>";
                            $tablestring .= "</span>";

                            $tablestring .= "<span  class='caption_detail'>";
                            // first step description
                            $tablestring .= "<div  class='row_description_first_step arp_caption_detail_text toggle_step_first $one_toggle_selected ";
                            if ($rows['row_tooltip'] != "" and ( isset($rows['row_description']) && $rows['row_description'] != '' )) {
                                $tablestring .= " arp_tooltip";
                                if ($tooltip_trigger_type == 'click') {
                                    $tablestring .= " on_click";
                                }
                                if ($tooltip_display_style == 'informative') {
                                    $tablestring .= " arp_informative_tooltip arp_tooltip ";
                                    if ($tooltip_icon_position == 'right_align') {
                                        $tablestring .= " arp_informative_right_align ";
                                    } else {
                                        $tablestring .= " arp_informative_float_to_content ";
                                    }
                                }
                            }
                            $tablestring .= "' data-tipso='";
                            if ($rows['row_tooltip'] != "" and $tooltip_display_style == 'default' and ( isset($rows['row_description']) && $rows['row_description'] != '' )) {
                                $tablestring .= esc_html($rows['row_tooltip']);
                            } $tablestring .= "'>" . (( isset($rows['row_description']) && $rows['row_description'] != '' ) ? stripslashes_deep($rows['row_description']) : '');

                            if ($tooltip_display_style == 'informative' and $rows['row_tooltip'] != '' and ( isset($rows['row_description']) && $rows['row_description'] != '' )) {
                                if ($tooltip_trigger_type == 'click') {
                                    $informative_cls = " on_click";
                                }
                                $tablestring .= "<label class='arp_informative_tooltip $informative_cls' data-tipso='" . esc_html($rows['row_tooltip']) . "'><span>" . stripslashes($tooltip_informative_icon) . "</span></label>";
                            }
                            $tablestring .= "</div>";

                            // second step description
                            $tablestring .= "<div  class='row_description_second_step arp_caption_detail_text toggle_step_second $two_toggle_selected";
                            if ($rows['row_tooltip_second'] != "" and ( isset($rows['row_description_second']) && $rows['row_description_second'] != '' )) {
                                $tablestring .= " arp_tooltip";
                                if ($tooltip_trigger_type == 'click') {
                                    $tablestring .= " on_click";
                                }
                                if ($tooltip_display_style == 'informative') {
                                    $tablestring .= " arp_informative_tooltip arp_tooltip ";
                                    if ($tooltip_icon_position == 'right_align') {
                                        $tablestring .= " arp_informative_right_align ";
                                    } else {
                                        $tablestring .= " arp_informative_float_to_content ";
                                    }
                                }
                            }
                            $tablestring .= "' data-tipso='";
                            if ($rows['row_tooltip_second'] != "" and $tooltip_display_style == 'default' and ( isset($rows['row_description_second']) && $rows['row_description_second'] != '' )) {
                                $tablestring .= esc_html($rows['row_tooltip_second']);
                            } $tablestring .= "'>" . (( isset($rows['row_description_second']) && $rows['row_description_second'] != '' ) ? stripslashes_deep($rows['row_description_second']) : '');

                            if ($tooltip_display_style == 'informative' and $rows['row_tooltip_second'] != '' and ( isset($rows['row_description_second']) && $rows['row_description_second'] != '' )) {
                                if ($tooltip_trigger_type == 'click') {
                                    $informative_cls = " on_click";
                                }
                                $tablestring .= "<label class='arp_informative_tooltip $informative_cls' data-tipso='" . esc_html($rows['row_tooltip_second']) . "'><span>" . stripslashes($tooltip_informative_icon) . "</span></label>";
                            }
                            $tablestring .= "</div>";

                            // third step description
                            $tablestring .= "<div class='row_description_third_step arp_caption_detail_text toggle_step_third $three_toggle_selected ";
                            if ($rows['row_tooltip_third'] != "" and ( isset($rows['row_description_third']) && $rows['row_description_third'] != '' )) {
                                $tablestring .= " arp_tooltip";
                                if ($tooltip_trigger_type == 'click') {
                                    $tablestring .= " on_click";
                                }
                                if ($tooltip_display_style == 'informative') {
                                    $tablestring .= " arp_informative_tooltip arp_tooltip ";
                                    if ($tooltip_icon_position == 'right_align') {
                                        $tablestring .= " arp_informative_right_align ";
                                    } else {
                                        $tablestring .= " arp_informative_float_to_content ";
                                    }
                                }
                            }
                            $tablestring .= "' data-tipso='";
                            if ($rows['row_tooltip_third'] != "" and $tooltip_display_style == 'default' and ( isset($rows['row_description_third']) && $rows['row_description_third'] != '' )) {
                                $tablestring .= esc_html($rows['row_tooltip_third']);
                            } $tablestring .= "'>" . (( isset($rows['row_description_third']) && $rows['row_description_third'] != '' ) ? stripslashes_deep($rows['row_description_third']) : '');

                            if ($tooltip_display_style == 'informative' and $rows['row_tooltip_third'] != '' and ( isset($rows['row_description_third']) && $rows['row_description_third'] != '' )) {
                                if ($tooltip_trigger_type == 'click') {
                                    $informative_cls = " on_click";
                                }
                                $tablestring .= "<label class='arp_informative_tooltip $informative_cls' data-tipso='" . esc_html($rows['row_tooltip_third']) . "'><span>" . stripslashes($tooltip_informative_icon) . "</span></label>";
                            }
                            $tablestring .= "</div>";

                            $tablestring .= "</span>
                            						</li>";
                        } else if ($template_feature['caption_style'] == 'style_2') {

                            $tablestring .= "<li class='" . $cls;
                            if ($rows['row_tooltip'] != "" || $rows['row_tooltip_second'] != "" || $rows['row_tooltip_third'] != "") {
                                $tablestring .= " arp_tooltip_li";
                            }
                            $li_class = $ref_template . '_' . $j . '_row_' . $ri;
                            $tablestring .= " " . $li_class . "' id='arp_" . $j . '_row_' . $ri . "'";

                            $tablestring .= " style='" . $row_inline_script . "'>";
                            $tablestring .= "<span  class='caption_detail'>";

                            // first step description
                            $tablestring .= "<div  class='row_description_first_step arp_caption_detail_text toggle_step_first $one_toggle_selected";
                            if ($rows['row_tooltip'] != "" and ( isset($rows['row_description']) && $rows['row_description'] != '' )) {
                                $tablestring .= " arp_tooltip";
                                if ($tooltip_trigger_type == 'click') {
                                    $tablestring .= " on_click";
                                }
                                if ($tooltip_display_style == 'informative') {
                                    $tablestring .= " arp_informative_tooltip arp_tooltip ";
                                    if ($tooltip_icon_position == 'right_align') {
                                        $tablestring .= " arp_informative_right_align ";
                                    } else {
                                        $tablestring .= " arp_informative_float_to_content ";
                                    }
                                }
                            }
                            $tablestring .= "' data-tipso='";
                            if ($rows['row_tooltip'] != "" and $tooltip_display_style == 'default' and ( isset($rows['row_description']) && $rows['row_description'] != '' )) {
                                $tablestring .= esc_html($rows['row_tooltip']);
                            } $tablestring .= "'>" . (( isset($rows['row_description']) && $rows['row_description'] != '' ) ? stripslashes_deep($rows['row_description']) : '');

                            $tablestring .= "</div>";

                            // second step description
                            $tablestring .= "<div  class='row_description_second_step arp_caption_detail_text toggle_step_second $two_toggle_selected";
                            if ($rows['row_tooltip_second'] != "" and ( isset($rows['row_description_second']) && $rows['row_description_second'] != '' )) {
                                $tablestring .= " arp_tooltip";
                                if ($tooltip_trigger_type == 'click') {
                                    $tablestring .= " on_click";
                                }
                                if ($tooltip_display_style == 'informative') {
                                    $tablestring .= " arp_informative_tooltip arp_tooltip ";
                                    if ($tooltip_icon_position == 'right_align') {
                                        $tablestring .= " arp_informative_right_align ";
                                    } else {
                                        $tablestring .= " arp_informative_float_to_content ";
                                    }
                                }
                            }
                            $tablestring .= "' data-tipso='";
                            if ($rows['row_tooltip_second'] != "" and $tooltip_display_style == 'default' and ( isset($rows['row_description_second']) && $rows['row_description_second'] != '' )) {
                                $tablestring .= esc_html($rows['row_tooltip_second']);
                            } $tablestring .= "'>" . (( isset($rows['row_description_second']) && $rows['row_description_second'] != '' ) ? stripslashes_deep($rows['row_description_second']) : '');


                            $tablestring .= "</div>";

                            // third step description
                            $tablestring .= "<div  class='row_description_third_step arp_caption_detail_text toggle_step_third $three_toggle_selected";
                            if ($rows['row_tooltip_third'] != "" and ( isset($rows['row_description_third']) && $rows['row_description_third'] != '' )) {
                                $tablestring .= " arp_tooltip";
                                if ($tooltip_trigger_type == 'click') {
                                    $tablestring .= " on_click";
                                }
                                if ($tooltip_display_style == 'informative') {
                                    $tablestring .= " arp_informative_tooltip arp_tooltip ";
                                    if ($tooltip_icon_position == 'right_align') {
                                        $tablestring .= " arp_informative_right_align ";
                                    } else {
                                        $tablestring .= " arp_informative_float_to_content ";
                                    }
                                }
                            }
                            $tablestring .= "' data-tipso='";
                            if ($rows['row_tooltip_third'] != "" and $tooltip_display_style == 'default' and ( isset($rows['row_description_third']) && $rows['row_description_third'] != '' )) {
                                $tablestring .= esc_html($rows['row_tooltip_third']);
                            } $tablestring .= "'>" . (( isset($rows['row_description_third']) && $rows['row_description_third'] != '' ) ? stripslashes_deep($rows['row_description_third']) : '');

                            $tablestring .= "</div>";

                            $tablestring .= "</span>";

                            $tablestring .= "<span  class='caption_li'>";
                            $tablestring .= "<div  class='row_label_first_step arp_caption_li_text toggle_step_first $one_toggle_selected'>" . (( isset($rows['row_label']) && $rows['row_label'] != '' ) ? stripslashes_deep($rows['row_label']) : '') . "</div>";
                            $tablestring .= "<div  class='row_label_second_step arp_caption_li_text toggle_step_second $two_toggle_selected'>" . (( isset($rows['row_label_second']) && $rows['row_label_second'] != '' ) ? stripslashes_deep($rows['row_label_second']) : '') . "</div>";
                            $tablestring .= "<div  class='row_label_third_step arp_caption_li_text toggle_step_third $three_toggle_selected'>" . (( isset($rows['row_label_third']) && $rows['row_label_third'] != '' ) ? stripslashes_deep($rows['row_label_third']) : '') . "</div>";
                            $tablestring .= "</span>";
                            $informative_cls = '';
                            if ($tooltip_display_style == 'informative' and $rows['row_tooltip'] != '' and ( isset($rows['row_description']) && $rows['row_description'] != '' )) {
                                if ($tooltip_trigger_type == 'click') {
                                    $informative_cls = " on_click";
                                }

                                if ($tooltip_icon_position == 'right_align') {
                                    $informative_cls .= " arp_informative_right_align arp_tooltip_individual";
                                } else {
                                    $informative_cls .= " arp_informative_float_to_content arp_tooltip_individual";
                                }
                                $tablestring .= "<label class='arp_informative_tooltip $informative_cls toggle_step_first $one_toggle_selected' data-tipso='" . esc_html($rows['row_tooltip']) . "'><span>" . stripslashes($tooltip_informative_icon) . "</span></label>";
                            }
                            $informative_cls = '';
                            if ($tooltip_display_style == 'informative' and $rows['row_tooltip_second'] != '' and ( isset($rows['row_description_second']) && $rows['row_description_second'] != '' )) {
                                if ($tooltip_trigger_type == 'click') {
                                    $informative_cls = " on_click";
                                }

                                if ($tooltip_icon_position == 'right_align') {
                                    $informative_cls .= " arp_informative_right_align arp_tooltip_individual";
                                } else {
                                    $informative_cls .= " arp_informative_float_to_content arp_tooltip_individual";
                                }
                                $tablestring .= "<label class='arp_informative_tooltip $informative_cls toggle_step_second $two_toggle_selected' data-tipso='" . esc_html($rows['row_tooltip_second']) . "'><span>" . stripslashes($tooltip_informative_icon) . "</span></label>";
                            }
                            $informative_cls = '';
                            if ($tooltip_display_style == 'informative' and $rows['row_tooltip_third'] != '' and ( isset($rows['row_description_third']) && $rows['row_description_third'] != '' )) {
                                if ($tooltip_trigger_type == 'click') {
                                    $informative_cls = " on_click";
                                }

                                if ($tooltip_icon_position == 'right_align') {
                                    $informative_cls .= " arp_informative_right_align arp_tooltip_individual";
                                } else {
                                    $informative_cls .= " arp_informative_float_to_content arp_tooltip_individual";
                                }
                                $tablestring .= "<label class='arp_informative_tooltip $informative_cls toggle_step_third $three_toggle_selected' data-tipso='" . esc_html($rows['row_tooltip_third']) . "'><span>" . stripslashes($tooltip_informative_icon) . "</span></label>";
                            }

                            $tablestring .= "</li>";
                        } else if ($template_feature['list_alignment'] != 'default') {
                            $tablestring .= "<li class='" . $cls;
                            if (@$rows['row_tooltip'] != "" || @$rows['row_tooltip_second'] != "" || @$rows['row_tooltip_third'] != "") {
                                $tablestring .= " arp_tooltip_li";
                            }
                            if ($tooltip_trigger_type == 'click') {
                                $tablestring .= " on_click";
                            }
                            $li_class = $ref_template . '_' . $j . '_row_' . $ri;
                            $tablestring .= " " . $li_class . "' id='arp_" . $j . '_row_' . $ri . "' style='text-align:" . $template_feature['list_alignment'] . ';' . $row_inline_script . "' >";


                            // first step description
                            $tablestring .= "<div  class='row_description_first_step arp_row_description_text toggle_step_first $one_toggle_selected ";
                            if ($rows['row_tooltip'] != "" and ( isset($rows['row_description']) && $rows['row_description'] != '' )) {
                                $tablestring .= " arp_tooltip";
                                if ($tooltip_trigger_type == 'click') {
                                    $tablestring .= " on_click";
                                }
                                if ($tooltip_display_style == 'informative') {
                                    $tablestring .= " arp_informative_tooltip arp_tooltip ";
                                    if ($tooltip_icon_position == 'right_align') {
                                        $tablestring .= " arp_informative_right_align ";
                                    } else {
                                        $tablestring .= " arp_informative_float_to_content ";
                                    }
                                }
                            }
                            $tablestring .= "' data-tipso='";
                            if ($rows['row_tooltip'] != "" and $tooltip_display_style == 'default' and ( isset($rows['row_description']) && $rows['row_description'] != '' )) {
                                $tablestring .= esc_html($rows['row_tooltip']);
                            } $tablestring .= "'>" . (( isset($rows['row_description']) && $rows['row_description'] != '' ) ? stripslashes_deep($rows['row_description']) : '');

                            if ($tooltip_display_style == 'informative' and $rows['row_tooltip'] != '' and ( isset($rows['row_description']) && $rows['row_description'] != '' )) {
                                if ($tooltip_trigger_type == 'click') {
                                    $informative_cls = " on_click";
                                }
                                $tablestring .= "<label class='arp_informative_tooltip $informative_cls' data-tipso='" . esc_html($rows['row_tooltip']) . "'><span>" . stripslashes($tooltip_informative_icon) . "</span></label>";
                            }
                            $tablestring .= "</div>";

                            // second step description
                            $tablestring .= "<div  class='row_description_second_step arp_row_description_text toggle_step_second $two_toggle_selected";
                            if (@$rows['row_tooltip_second'] != "" and ( isset($rows['row_description_second']) && $rows['row_description_second'] != '' )) {
                                $tablestring .= " arp_tooltip";
                                if ($tooltip_trigger_type == 'click') {
                                    $tablestring .= " on_click";
                                }
                                if ($tooltip_display_style == 'informative') {
                                    $tablestring .= " arp_informative_tooltip arp_tooltip ";
                                    if ($tooltip_icon_position == 'right_align') {
                                        $tablestring .= " arp_informative_right_align ";
                                    } else {
                                        $tablestring .= " arp_informative_float_to_content ";
                                    }
                                }
                            }
                            $tablestring .= "' data-tipso='";
                            if (@$rows['row_tooltip_second'] != "" and $tooltip_display_style == 'default' and ( isset($rows['row_description_second']) && $rows['row_description_second'] != '' )) {
                                $tablestring .= esc_html($rows['row_tooltip_second']);
                            } $tablestring .= "'>" . (( isset($rows['row_description_second']) && $rows['row_description_second'] != '' ) ? stripslashes_deep($rows['row_description_second']) : '');

                            if ($tooltip_display_style == 'informative' and $rows['row_tooltip_second'] != '' and ( isset($rows['row_description_second']) && $rows['row_description_second'] != '' )) {
                                if ($tooltip_trigger_type == 'click') {
                                    $informative_cls = " on_click";
                                }
                                $tablestring .= "<label class='arp_informative_tooltip $informative_cls' data-tipso='" . esc_html($rows['row_tooltip_second']) . "'><span>" . stripslashes($tooltip_informative_icon) . "</span></label>";
                            }
                            $tablestring .= "</div>";

                            // third step description
                            $tablestring .= "<div  class='row_description_third_step arp_row_description_text toggle_step_third $three_toggle_selected ";
                            if (@$rows['row_tooltip_third'] != "" and ( isset($rows['row_description_third']) && $rows['row_description_third'] != '' )) {
                                $tablestring .= " arp_tooltip";
                                if ($tooltip_trigger_type == 'click') {
                                    $tablestring .= " on_click";
                                }
                                if ($tooltip_display_style == 'informative') {
                                    $tablestring .= " arp_informative_tooltip arp_tooltip ";
                                    if ($tooltip_icon_position == 'right_align') {
                                        $tablestring .= " arp_informative_right_align ";
                                    } else {
                                        $tablestring .= " arp_informative_float_to_content ";
                                    }
                                }
                            }
                            $tablestring .= "' data-tipso='";
                            if (@$rows['row_tooltip_third'] != "" and $tooltip_display_style == 'default' and ( isset($rows['row_description_third']) && $rows['row_description_third'] != '' )) {
                                $tablestring .= esc_html($rows['row_tooltip_third']);
                            } $tablestring .= "'>" . (( isset($rows['row_description_third']) && $rows['row_description_third'] != '' ) ? stripslashes_deep($rows['row_description_third']) : '');

                            if ($tooltip_display_style == 'informative' and $rows['row_tooltip_third'] != '' and ( isset($rows['row_description_third']) && $rows['row_description_third'] != '' )) {
                                if ($tooltip_trigger_type == 'click') {
                                    $informative_cls = " on_click";
                                }
                                $tablestring .= "<label class='arp_informative_tooltip $informative_cls' data-tipso='" . esc_html($rows['row_tooltip_third']) . "'><span>" . stripslashes($tooltip_informative_icon) . "</span></label>";
                            }
                            $tablestring .= "</div>";

                            $tablestring .= "</li>";
                        } else {
                            $tablestring .= "<li class='" . $cls;
                            if (@$rows['row_tooltip'] != "" || @$rows['row_tooltip_second'] != "" || @$rows['row_tooltip_third'] != "") {
                                $tablestring .= " arp_tooltip_li";
                            }
                            if ($tooltip_trigger_type == 'click') {
                                $tablestring .= " on_click";
                            }
                            $li_class = $ref_template . '_' . $j . '_row_' . $ri;
                            $tablestring .= " " . $li_class . "' id='arp_" . $j . '_row_' . $ri . "' style='" . $row_inline_script . "' >";




                            // first step description                            
                            $tablestring .= "<div  class='row_description_first_step arp_row_description_text toggle_step_first $one_toggle_selected";
                            if (@$rows['row_tooltip'] != "" and ( isset($rows['row_description']) && $rows['row_description'] != '' )) {
                                $tablestring .= " arp_tooltip ";
                                if ($tooltip_trigger_type == 'click') {
                                    $tablestring .= " on_click";
                                }
                                if ($tooltip_display_style == 'informative') {
                                    $tablestring .= " arp_informative_tooltip arp_tooltip ";
                                    if ($tooltip_icon_position == 'right_align') {
                                        $tablestring .= " arp_informative_right_align ";
                                    } else {
                                        $tablestring .= " arp_informative_float_to_content ";
                                    }
                                }
                            }
                            $tablestring .= "' data-tipso='";
                            if (@$rows['row_tooltip'] != "" and $tooltip_display_style == 'default' and ( isset($rows['row_description']) && $rows['row_description'] != '' )) {
                                $tablestring .= esc_html($rows['row_tooltip']);
                            } $tablestring .= "'>" . (( isset($rows['row_description']) && $rows['row_description'] != '' ) ? stripslashes_deep($rows['row_description']) : '');

                            if ($tooltip_display_style == 'informative' and $rows['row_tooltip'] != '' and ( isset($rows['row_description']) && $rows['row_description'] != '' )) {
                                if ($tooltip_trigger_type == 'click') {
                                    $informative_cls = " on_click";
                                }
                                $tablestring .= "<label class='arp_informative_tooltip $informative_cls' data-tipso='" . esc_html($rows['row_tooltip']) . "'><span>" . stripslashes($tooltip_informative_icon) . "</span></label>";
                            }
                            $tablestring .= "</div>";

                            // second step description
                            $tablestring .= "<div  class='row_description_second_step arp_row_description_text toggle_step_second $two_toggle_selected";
                            if (@$rows['row_tooltip_second'] != "" and ( isset($rows['row_description_second']) && $rows['row_description_second'] != '' )) {
                                $tablestring .= " arp_tooltip ";
                                if ($tooltip_trigger_type == 'click') {
                                    $tablestring .= " on_click";
                                }
                                if ($tooltip_display_style == 'informative') {
                                    $tablestring .= " arp_informative_tooltip arp_tooltip ";
                                    if ($tooltip_icon_position == 'right_align') {
                                        $tablestring .= " arp_informative_right_align ";
                                    } else {
                                        $tablestring .= " arp_informative_float_to_content ";
                                    }
                                }
                            }
                            $tablestring .= "' data-tipso='";
                            if (@$rows['row_tooltip_second'] != "" and $tooltip_display_style == 'default' and ( isset($rows['row_description_second']) && $rows['row_description_second'] != '' )) {
                                $tablestring .= esc_html(@$rows['row_tooltip_second']);
                            } $tablestring .= "'>" . (( isset($rows['row_description_second']) && $rows['row_description_second'] != '' ) ? stripslashes_deep($rows['row_description_second']) : '');

                            if ($tooltip_display_style == 'informative' and @ $rows['row_tooltip_second'] != '' and ( isset($rows['row_description_second']) && $rows['row_description_second'] != '' )) {
                                if ($tooltip_trigger_type == 'click') {
                                    $informative_cls = " on_click";
                                }
                                $tablestring .= "<label class='arp_informative_tooltip $informative_cls' data-tipso='" . esc_html($rows['row_tooltip_second']) . "'><span>" . stripslashes($tooltip_informative_icon) . "</span></label>";
                            }
                            $tablestring .= "</div>";

                            // third step description
                            $tablestring .= "<div  class='row_description_third_step arp_row_description_text toggle_step_third $three_toggle_selected";
                            if (@$rows['row_tooltip_third'] != "" and ( isset($rows['row_description_third']) && $rows['row_description_third'] != '' )) {
                                $tablestring .= " arp_tooltip ";
                                if ($tooltip_trigger_type == 'click') {
                                    $tablestring .= " on_click";
                                }
                                if ($tooltip_display_style == 'informative') {
                                    $tablestring .= " arp_informative_tooltip arp_tooltip ";
                                    if ($tooltip_icon_position == 'right_align') {
                                        $tablestring .= " arp_informative_right_align ";
                                    } else {
                                        $tablestring .= " arp_informative_float_to_content ";
                                    }
                                }
                            }
                            $tablestring .= "' data-tipso='";
                            if (@$rows['row_tooltip_third'] != "" and $tooltip_display_style == 'default' and ( isset($rows['row_description_third']) && $rows['row_description_third'] != '' )) {
                                $tablestring .= esc_html($rows['row_tooltip_third']);
                            } $tablestring .= "'>" . (( isset($rows['row_description_third']) && $rows['row_description_third'] != '' ) ? stripslashes_deep($rows['row_description_third']) : '');

                            if ($tooltip_display_style == 'informative' and $rows['row_tooltip_third'] != '' and ( isset($rows['row_description_third']) && $rows['row_description_third'] != '' )) {
                                if ($tooltip_trigger_type == 'click') {
                                    $informative_cls = " on_click";
                                }
                                $tablestring .= "<label class='arp_informative_tooltip $informative_cls' data-tipso='" . esc_html($rows['row_tooltip_third']) . "'><span>" . stripslashes($tooltip_informative_icon) . "</span></label>";
                            }
                            $tablestring .= "</div>";

                            $tablestring .= "</li>";
                        }
                        $last_li_cls = $cls;
                        array_push($font_awesome_match, @$rows['row_label']);
                        array_push($font_awesome_match, @$rows['row_label_second']);
                        array_push($font_awesome_match, @$rows['row_label_third']);
                        array_push($font_awesome_match, @$rows['row_tooltip']);
                        array_push($font_awesome_match, @$rows['row_tooltip_second']);
                        array_push($font_awesome_match, @$rows['row_tooltip_third']);
                        array_push($font_awesome_match, @$rows['row_description']);
                        array_push($font_awesome_match, @$rows['row_description_second']);
                        array_push($font_awesome_match, @$rows['row_description_third']);
                    }
                    if ($template_feature['button_position'] != 'default') {
                        $tablestring .= "<li class='arp_last_list_item " . $last_li_cls . "'></li>";
                    }
                    $tablestring .= "</ul>";
                    $tablestring .= "</div>";



                    if ($template_feature['amount_style'] == 'style_3') {
                        $tablestring .= "<div class='arppricetablecolumnprice " . $template_feature['amount_style'] . "' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='pricing_level_options' data-type='other_columns_buttons' >";
                        $tablestring .= "<div class='arp_price_wrapper' data-column='main_" . $j . "'>";
                        $tablestring .= "<span class='price_text_first_step arp_price_value_text toggle_step_first $one_toggle_selected'>";
                        $tablestring .= @$columns['price_text'];
                        $tablestring .= '</span>';

                        $tablestring .= "<span class='price_text_second_step arp_price_value_text toggle_step_second $two_toggle_selected'>";
                        $tablestring .= @$columns['price_text_two_step'];
                        $tablestring .= '</span>';

                        $tablestring .= "<span class='price_text_third_step arp_price_value_text toggle_step_third $three_toggle_selected'>";
                        $tablestring .= @$columns['price_text_three_step'];
                        $tablestring .= '</span>';




                        $tablestring .= "</div>";
                        $tablestring .= do_shortcode($columns['html_content']);


                        if ($template_feature['button_position'] == 'position_4') {

                            $tablestring .= "<div class='arpcolumnfooter " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . " $footer_hover_class'  data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='button_options' data-type='other_columns_buttons'>";
                            
                            $columns['btn_img'] = isset($columns['btn_img']) ? $columns['btn_img'] : "";
                            $hide_default_btn_true = "";
                            if (@$columns['hide_default_btn'] == 1) {
                                $hide_default_btn_true = 'hide_default_btn_true';
                            }
                            $footer_content_above_btn = "";
                            if (@$columns['footer_content'] != '' and @ $columns['footer_content_position'] == 1)
                                $footer_content_above_btn = "display:block;";
                            else
                                $footer_content_above_btn = "display:none;";
                            if ($template_feature['has_footer_content'] == 1) {
                                $tablestring .= "<div class='arp_footer_content arp_btn_before_content' style='{$footer_content_above_btn}'>";

                                $tablestring .= "<span class='footer_content_first_step arp_footer_content_text toggle_step_first $one_toggle_selected'>";
                                $tablestring .= @$columns['footer_content'];
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_second_step arp_footer_content_text toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_third_step arp_footer_content_text toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                                $tablestring .= "</span>";

                                $tablestring .= "</div>";
                            }
                            $tablestring .= "<div class='arppricetablebutton toggle_step_first $one_toggle_selected " . $hide_default_btn_true . "' data-column='main_" . $j . "' style='text-align:center;'>";
                            if (@$columns['paypal_code'] != '') {
                                @$columns['paypal_code'] = do_shortcode(@$columns['paypal_code']);
                                $paypal_btn = 1;
                            } else {
                                $paypal_btn = 0;
                            }

                            $tablestring .= "<button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . "'  data-is-post-variables='" . @$columns['is_post_variables'] . "' data-post-variables='" . stripslashes(@$columns['post_variables_content']) . "' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='button_options' data-type='other_columns_buttons' ";
                            if (@$columns['btn_img'] != "" && @$columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='background:" . @$columns['button_background_color'] . " url(" . @$columns['btn_img'] . ") no-repeat !important;width:" . @$columns['btn_img_width'] . "px;height:" . @$columns['btn_img_height'] . "px;'";
                            }
                            if (@$columns['hide_default_btn'] == 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= "onclick='arp_redirect(\"" . @$columns['button_url'] . "\", \"";
                            if (@$columns['is_new_window'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",\"";
                            if (@$columns['is_new_window_actual'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",";
                            $tablestring .="\"" . $paypal_btn . "\",this,\"" . $table_id . "\",\"main_" . $j . "\");'>";
                            if (@$columns['btn_img'] == "") {
                                $tablestring .= "<span class='btn_content_first_step bestPlanButton_text'>";
                                $tablestring .= stripslashes_deep(@$columns['button_text']);
                                $tablestring .= "</span>";
                            } $tablestring .= "</button>";
                            $tablestring .= "<div class='arp_paypal_form' id='paypal_form_first_$j' ";
                            if (@$columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= ">";
                            $tablestring .= do_shortcode(@$columns['paypal_code']);
                            $tablestring .= "</div>";

                            $tablestring .= "</div>";
                            $tablestring .= "<div class='arppricetablebutton toggle_step_second $two_toggle_selected $hide_default_btn_true' data-column='main_" . $j . "' style='text-align:center;'>";
                            if (@$columns['paypal_code_second'] != '') {
                                $columns['paypal_code_second'] = do_shortcode(@$columns['paypal_code_second']);
                                $paypal_btn_second = 1;
                            } else {
                                $paypal_btn_second = 0;
                            }
                            $tablestring .= "<button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . "'  data-is-post-variables='" . @$columns['is_post_variables'] . "' data-post-variables='" . stripslashes(@$columns['post_variables_content_second']) . "' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='button_options' data-type='other_columns_buttons' ";
                            if (@$columns['btn_img'] != "" && @$columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='background:" . @$columns['button_background_color'] . " url(" . @$columns['btn_img'] . ") no-repeat !important;width:" . @$columns['btn_img_width'] . "px;height:" . @$columns['btn_img_height'] . "px;'";
                            }
                            if (@$columns['hide_default_btn'] == 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= "onclick='arp_redirect(\"" . @$columns['button_url_second'] . "\", \"";
                            if (@$columns['is_new_window'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",\"";
                            if (@$columns['is_new_window_actual'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",";
                            $tablestring .="\"" . $paypal_btn_second . "\",this,\"" . $table_id . "\",\"main_" . $j . "\");'>";
                            if (@$columns['btn_img'] == "") {
                                $tablestring .= "<span class='btn_content_second_step bestPlanButton_text toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['btn_content_second']);
                                $tablestring .= "</span>";
                            } $tablestring .= "</button>";
                            $tablestring .= "<div class='arp_paypal_form' id='paypal_form_second_$j' ";
                            if (@$columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= ">";
                            $tablestring .= do_shortcode(@$columns['paypal_code_second']);
                            $tablestring .= "</div>";

                            $tablestring .= "</div>";

                            $tablestring .= "<div class='arppricetablebutton toggle_step_third $three_toggle_selected $hide_default_btn_true' data-column='main_" . $j . "' style='text-align:center;'>";
                            if (@$columns['paypal_code_third'] != '') {
                                $columns['paypal_code_third'] = do_shortcode(@$columns['paypal_code_third']);
                                $paypal_btn_third = 1;
                            } else {
                                $paypal_btn_third = 0;
                            }

                            $tablestring .= "<button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . "' data-is-post-variables='" . @$columns['is_post_variables'] . "' data-post-variables='" . stripslashes(@$columns['post_variables_content_third']) . "' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='button_options' data-type='other_columns_buttons' ";
                            if (@$columns['btn_img'] != "" && $columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='background:" . @$columns['button_background_color'] . " url(" . @$columns['btn_img'] . ") no-repeat !important;width:" . @$columns['btn_img_width'] . "px;height:" . @$columns['btn_img_height'] . "px;'";
                            }
                            if (@$columns['hide_default_btn'] == 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= "onclick='arp_redirect(\"" . @$columns['button_url_third'] . "\", \"";
                            if (@$columns['is_new_window'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",\"";
                            if (@$columns['is_new_window_actual'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",";
                            $tablestring .="\"" . $paypal_btn_third . "\",this,\"" . $table_id . "\",\"main_" . $j . "\");'>";
                            if (@$columns['btn_img'] == "") {
                                $tablestring .= "<span class='btn_content_third_step bestPlanButton_text toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['btn_content_third']);
                                $tablestring .= "</span>";
                            } $tablestring .= "</button>";
                            $tablestring .= "<div class='arp_paypal_form' id='paypal_form_third_$j' ";
                            if (@$columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= ">";
                            $tablestring .= do_shortcode(@$columns['paypal_code_third']);
                            $tablestring .= "</div>";

                            $tablestring .= "</div>";
                            $footer_content_below_btn = "";
                            if (@$columns['footer_content'] != '' and @ $columns['footer_content_position'] == 0)
                                $footer_content_below_btn = "display:block;";
                            else
                                $footer_content_below_btn = "display:none;";
                            if ($template_feature['has_footer_content'] == 1) {
                                $tablestring .= "<div class='arp_footer_content arp_btn_before_content' style='{$footer_content_below_btn}'>";

                                $tablestring .= "<span class='footer_content_first_step arp_footer_content_text toggle_step_first $one_toggle_selected'>";
                                $tablestring .= @$columns['footer_content'];
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_second_step arp_footer_content_text toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_third_step arp_footer_content_text toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                                $tablestring .= "</span>";

                                $tablestring .= "</div>";
                            }
                            $tablestring .= "</div>";
                        }

                        $tablestring .= "</div>";
                    }

                    if ($template_feature['button_position'] == 'default') {
                        $tablestring .= "<div class='arpcolumnfooter " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . " $footer_hover_class'>";

                        if ($template_feature['second_btn'] == true && $columns['button_s_text'] != '') {
                            $has_s_btn = 'has_second_btn';
                        } else {
                            $has_s_btn = 'no_second_btn';
                        }
                        $hide_default_btn_true = "";
                        if (@$columns['hide_default_btn'] == 1) {
                            $hide_default_btn_true = 'hide_default_btn_true';
                        }
                        $footer_content_above_btn = "";
                        if (@$columns['footer_content'] != '' and $columns['footer_content_position'] == 1)
                            $footer_content_above_btn = "display:block;";
                        else
                            $footer_content_above_btn = "display:none;";
                        if (isset($template_feature['has_footer_content']) && $template_feature['has_footer_content'] == 1) {
                            $tablestring .= "<div class='arp_footer_content arp_btn_before_content' style='{$footer_content_above_btn}'>";

                            $tablestring .= "<span class='footer_content_first_step arp_footer_content_text toggle_step_first $one_toggle_selected'>";
                            $tablestring .= @$columns['footer_content'];
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_second_step arp_footer_content_text toggle_step_second $two_toggle_selected'>";
                            $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_third_step arp_footer_content_text toggle_step_third $three_toggle_selected'>";
                            $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                            $tablestring .= "</span>";

                            $tablestring .= "</div>";
                        }
                        $tablestring .= "<div class='arppricetablebutton toggle_step_first $one_toggle_selected $hide_default_btn_true' style='text-align:center;'>";

                        if (isset($columns['paypal_code']) && $columns['paypal_code'] != '') {
                            $columns['paypal_code'] = do_shortcode($columns['paypal_code']);
                            $paypal_btn = 1;
                        } else {
                            $paypal_btn = 0;
                        }
                        $columns['btn_img'] = isset($columns['btn_img']) ? $columns['btn_img'] : "";

                        $tablestring .= "<button type='button'  data-is-post-variables='{$columns['is_post_variables']}' data-post-variables='" . stripslashes($columns['post_variables_content']) . "' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . " " . $has_s_btn . "' ";
                        if ($columns['btn_img'] != "" && $columns['hide_default_btn'] != 1) {
                            $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . $columns['btn_img'] . ") no-repeat !important;width:" . $columns['btn_img_width'] . "px;height:" . $columns['btn_img_height'] . "px; '";
                        }
                        if (@$columns['hide_default_btn'] == 1) {
                            $tablestring .= "style='display:none;'";
                        }
                        $tablestring .= "onclick='arp_redirect(\"" . @$columns['button_url'] . "\", \"";
                        if (@$columns['is_new_window'] == 1) {
                            $tablestring .= "1";
                        } else {
                            $tablestring .= "0";
                        } $tablestring .="\",\"";
                        if (@$columns['is_new_window_actual'] == 1) {
                            $tablestring .= "1";
                        } else {
                            $tablestring .= "0";
                        } $tablestring .="\",";

                        $tablestring .="\"" . $paypal_btn . "\",this,\"" . $table_id . "\",\"main_" . $j . "\");'>";
                        if (@$columns['btn_img'] == "") {
                            $tablestring .= "<span class='btn_content_first_step bestPlanButton_text '>";
                            $tablestring .= stripslashes_deep(@$columns['button_text']);
                            $tablestring .= "</span>";
                        } $tablestring .="</button>";
                        $tablestring .= "<div class='arp_paypal_form' id='paypal_form_first_$j' ";
                        if (@$columns['hide_default_btn'] != 1) {
                            $tablestring .= "style='display:none;'";
                        }
                        $tablestring .= ">";
                        $tablestring .= isset($columns['paypal_code']) ? do_shortcode($columns['paypal_code']) : "";
                        $tablestring .= "</div>";


                        if ($template_feature['second_btn'] == true && $columns['button_s_text'] != '') {
                            if ($columns['paypal_s_code'] != '') {
                                $paypal_s_btn = 1;
                            } else {
                                $paypal_s_btn = 0;
                            }
                            if ($columns['button_text'] != '') {
                                $has_f_btn = 'has_first_btn';
                            } else {
                                $has_f_btn = 'no_first_btn';
                            }

                            $tablestring .= "<button type='button'  data-is-post-variables='{$columns['is_post_variables']}' data-post-variables='" . stripslashes($columns['post_variables_content']) . "' class='bestPlanButton $arp_global_button_class arp_" . strtolower($columns['button_s_size']) . "_btn SecondBestPlanButton " . $has_f_btn . "' ";
                            if ($columns['button_s_img'] != "" && $columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . $columns['button_s_img'] . ") no-repeat !important;width:" . $columns['btn_s_img_width'] . "px;height:" . $columns['btn_s_img_height'] . "px;' ";
                            }
                            if ($columns['hide_default_btn'] == 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= "onclick='arp_redirect(\"" . $columns['button_url'] . "\", \"";
                            if ($columns['s_is_new_window'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",\"" . $paypal_s_btn . "\",this,\"" . $table_id . "\",\"main_" . $j . "\");'>";
                            if ($columns['button_s_img'] == "") {
                                $tablestring .= "<span class='btn_content_first_step toggle_step_first $one_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['button_text']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='btn_content_second_step toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['btn_content_second']);
                                $tablestring .= "</span>";
                                $tablestring .= "<span class='btn_content_third_step toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['btn_content_third']);
                                $tablestring .= "</span>";
                            } $tablestring .="</button>";
                            $tablestring .= "<div class='arp_paypal_form' id='paypal_form_second_$j' style='display:none;'>";
                            $tablestring .= do_shortcode($columns['paypal_s_code']);
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";

                        $tablestring .= "<div class='arppricetablebutton toggle_step_second $two_toggle_selected $hide_default_btn_true' style='text-align:center;'>";
                        if (isset($columns['paypal_code_second']) && $columns['paypal_code_second'] != '') {
                            $columns['paypal_code_second'] = do_shortcode($columns['paypal_code_second']);
                            $paypal_btn_second = 1;
                        } else {
                            $paypal_btn_second = 0;
                        }
                        $columns['btn_img'] = isset($columns['btn_img']) ? $columns['btn_img'] : "";

                        $tablestring .= "<button type='button'  data-is-post-variables='{$columns['is_post_variables']}' data-post-variables='" . stripslashes(@$columns['post_variables_content_second']) . "' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . " " . $has_s_btn . "' ";
                        if (@$columns['btn_img'] != "" && $columns['hide_default_btn'] != 1) {
                            $tablestring .= "style='background:" . @$columns['button_background_color'] . " url(" . @$columns['btn_img'] . ") no-repeat !important;width:" . @$columns['btn_img_width'] . "px;height:" . @$columns['btn_img_height'] . "px; '";
                        }
                        if (@$columns['hide_default_btn'] == 1) {
                            $tablestring .= "style='display:none;'";
                        }
                        $tablestring .= "onclick='arp_redirect(\"" . @$columns['button_url_second'] . "\", \"";
                        if (@$columns['is_new_window'] == 1) {
                            $tablestring .= "1";
                        } else {
                            $tablestring .= "0";
                        } $tablestring .="\",\"";
                        if (@$columns['is_new_window_actual'] == 1) {
                            $tablestring .= "1";
                        } else {
                            $tablestring .= "0";
                        } $tablestring .="\",";
                        $tablestring .="\"" . $paypal_btn_second . "\",this,\"" . $table_id . "\",\"main_" . $j . "\");'>";
                        if (@$columns['btn_img'] == "") {
                            $tablestring .= "<span class='btn_content_second_step bestPlanButton_text '>";
                            $tablestring .= stripslashes_deep(@$columns['btn_content_second']);
                            $tablestring .= "</span>";
                        } $tablestring .="</button>";
                        $tablestring .= "<div class='arp_paypal_form' id='paypal_form_second_$j' ";
                        if (@$columns['hide_default_btn'] != 1) {
                            $tablestring .= "style='display:none;'";
                        }
                        $tablestring .= ">";
                        $tablestring .= isset($columns['paypal_code_second']) ? do_shortcode($columns['paypal_code_second']) : "";
                        $tablestring .= "</div>";


                        if ($template_feature['second_btn'] == true && $columns['button_s_text'] != '') {
                            if ($columns['paypal_s_code'] != '') {
                                $paypal_s_btn = 1;
                            } else {
                                $paypal_s_btn = 0;
                            }
                            if ($columns['button_text'] != '') {
                                $has_f_btn = 'has_first_btn';
                            } else {
                                $has_f_btn = 'no_first_btn';
                            }

                            $tablestring .= "<button type='button'  data-is-post-variables='{$columns['is_post_variables']}' data-post-variables='" . stripslashes($columns['post_variables_content']) . "' class='bestPlanButton $arp_global_button_class arp_" . strtolower($columns['button_s_size']) . "_btn SecondBestPlanButton " . $has_f_btn . "' ";
                            if ($columns['button_s_img'] != "" && $columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . $columns['button_s_img'] . ") no-repeat !important;width:" . $columns['btn_s_img_width'] . "px;height:" . $columns['btn_s_img_height'] . "px;' ";
                            }
                            if ($columns['hide_default_btn'] == 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= "onclick='arp_redirect(\"" . $columns['button_url'] . "\", \"";
                            if ($columns['s_is_new_window'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            }
                            $tablestring .="\",\"" . $paypal_s_btn . "\",this,\"" . $table_id . "\",\"main_" . $j . "\");'>";
                            if ($columns['button_s_img'] == "") {
                                $tablestring .= "<span class='btn_content_first_step toggle_step_first $one_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['button_text']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='btn_content_second_step toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['btn_content_second']);
                                $tablestring .= "</span>";
                                $tablestring .= "<span class='btn_content_third_step toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['btn_content_third']);
                                $tablestring .= "</span>";
                            } $tablestring .="</button>";
                            $tablestring .= "<div class='arp_paypal_form' id='paypal_form_third_$j' style='display:none;'>";
                            $tablestring .= do_shortcode($columns['paypal_s_code']);
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='arppricetablebutton toggle_step_third $three_toggle_selected $hide_default_btn_true' style='text-align:center;'>";

                        if (isset($columns['paypal_code_third']) && $columns['paypal_code_third'] != '') {
                            $columns['paypal_code_third'] = do_shortcode($columns['paypal_code_third']);
                            $paypal_btn_third = 1;
                        } else {
                            $paypal_btn_third = 0;
                        }
                        $columns['btn_img'] = isset($columns['btn_img']) ? $columns['btn_img'] : "";

                        $tablestring .= "<button type='button'  data-is-post-variables='" . @$columns['is_post_variables'] . "' data-post-variables='" . stripslashes(@$columns['post_variables_content_third']) . "' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . " " . $has_s_btn . "' ";
                        if (@$columns['btn_img'] != "" && $columns['hide_default_btn'] != 1) {
                            $tablestring .= "style='background:" . @$columns['button_background_color'] . " url(" . @$columns['btn_img'] . ") no-repeat !important;width:" . @$columns['btn_img_width'] . "px;height:" . @$columns['btn_img_height'] . "px; '";
                        }
                        if (@$columns['hide_default_btn'] == 1) {
                            $tablestring .= "style='display:none;'";
                        }
                        $tablestring .= "onclick='arp_redirect(\"" . @$columns['button_url_third'] . "\", \"";
                        if (@$columns['is_new_window'] == 1) {
                            $tablestring .= "1";
                        } else {
                            $tablestring .= "0";
                        } $tablestring .="\",\"";
                        if (@$columns['is_new_window_actual'] == 1) {
                            $tablestring .= "1";
                        } else {
                            $tablestring .= "0";
                        } $tablestring .="\",";
                        $tablestring .="\"" . $paypal_btn_third . "\",this,\"" . $table_id . "\",\"main_" . $j . "\");'>";
                        if (@$columns['btn_img'] == "") {
                            $tablestring .= "<span class='btn_content_third_step bestPlanButton_text '>";
                            $tablestring .= stripslashes_deep(@$columns['btn_content_third']);
                            $tablestring .= "</span>";
                        } $tablestring .="</button>";
                        $tablestring .= "<div class='arp_paypal_form' id='paypal_form_third_$j' ";
                        if (@$columns['hide_default_btn'] != 1) {
                            $tablestring .= "style='display:none;'";
                        }
                        $tablestring .= ">";
                        $tablestring .= isset($columns['paypal_code_third']) ? do_shortcode($columns['paypal_code_third']) : "";
                        $tablestring .= "</div>";
                        if ($template_feature['second_btn'] == true && $columns['button_s_text'] != '') {
                            if ($columns['paypal_s_code'] != '') {
                                $paypal_s_btn = 1;
                            } else {
                                $paypal_s_btn = 0;
                            }
                            if ($columns['button_text'] != '') {
                                $has_f_btn = 'has_first_btn';
                            } else {
                                $has_f_btn = 'no_first_btn';
                            }

                            $tablestring .= "<button type='button'  data-is-post-variables='{$columns['is_post_variables']}' data-post-variables='" . stripslashes($columns['post_variables_content']) . "' class='bestPlanButton $arp_global_button_class arp_" . strtolower($columns['button_s_size']) . "_btn SecondBestPlanButton " . $has_f_btn . "' ";
                            if ($columns['button_s_img'] != "" && $columns['hide_default_btn'] != 1) {
                                $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . $columns['button_s_img'] . ") no-repeat !important;width:" . $columns['btn_s_img_width'] . "px;height:" . $columns['btn_s_img_height'] . "px;' ";
                            }
                            if ($columns['hide_default_btn'] == 1) {
                                $tablestring .= "style='display:none;'";
                            }
                            $tablestring .= "onclick='arp_redirect(\"" . $columns['button_url'] . "\", \"";
                            if ($columns['s_is_new_window'] == 1) {
                                $tablestring .= "1";
                            } else {
                                $tablestring .= "0";
                            } $tablestring .="\",\"" . $paypal_s_btn . "\",this,\"" . $table_id . "\",\"main_" . $j . "\");'>";
                            if ($columns['button_s_img'] == "") {
                                $tablestring .= "<span class='btn_content_first_step toggle_step_first $one_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['button_text']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='btn_content_second_step toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['btn_content_second']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='btn_content_third_step toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['btn_content_third']);
                                $tablestring .= "</span>";
                            } $tablestring .="</button>";
                            $tablestring .= "<div class='arp_paypal_form' id='paypal_form_third_$j' style='display:none;'>";
                            $tablestring .= do_shortcode($columns['paypal_s_code']);
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                        //button div ends here 
                        $footer_content_below_btn = '';
                        if ($columns['footer_content'] != '' and $columns['footer_content_position'] == 0)
                            $footer_content_below_btn = "display:block;";
                        else
                            $footer_content_below_btn = "display:none;";
                        if (isset($template_feature['has_footer_content']) && $template_feature['has_footer_content'] == 1) {
                            $tablestring .= "<div class='arp_footer_content arp_btn_after_content' style='{$footer_content_below_btn}'>";

                            $tablestring .= "<span class='footer_content_first_step arp_footer_content_text toggle_step_first $one_toggle_selected'>";
                            $tablestring .= @$columns['footer_content'];
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_second_step arp_footer_content_text toggle_step_second $two_toggle_selected'>";
                            $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_third_step arp_footer_content_text toggle_step_third $three_toggle_selected'>";
                            $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                            $tablestring .= "</span>";

                            $tablestring .= "</div>";
                        }
                        if ($ref_template == 'arptemplate_16') {
                            $tablestring .= "<div class='arp_bottom_image'>";
                            $tablestring .= "<ul class='arp_boat_img'><li></li></ul>";
                            $tablestring .= "<ul class='arp_water_imgs'>";
                            $tablestring .= "<li class='arp_water_img_1'></li>";
                            $tablestring .= "<li class='arp_water_img_2'></li>";
                            $tablestring .= "</ul>";
                            $tablestring .= "</div>";
                        }

                        $tablestring .= "</div>";
                        if ($template_feature['column_description'] == 'enable' and $template_feature['column_description_style'] == 'after_button') {
                            $tablestring .= "<div class='column_description " . $title_cls . " column_description_first_step toggle_step_first $one_toggle_selected'>" . stripslashes_deep(@$columns['column_description']) . "</div>";
                            $tablestring .= "<div class='column_description " . $title_cls . " column_description_second_step toggle_step_second $two_toggle_selected'>" . stripslashes_deep(@$columns['column_description_second']) . "</div>";
                            $tablestring .= "<div class='column_description " . $title_cls . " column_description_third_step toggle_step_third $three_toggle_selected'>" . stripslashes_deep(@$columns['column_description_third']) . "</div>";
                        }
                    }

                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    $c++;
                    if ($x % 5 == 0) {
                        $c = 1;
                    }
                    $x++;
                    $style_++;
                }
                array_push($font_awesome_match, @$columns['ribbon_setting']['arp_ribbon_content']);
                array_push($font_awesome_match, @$columns['html_content']);
                array_push($font_awesome_match, @$columns['package_title']);
                array_push($font_awesome_match, @$columns['package_title_second']);
                array_push($font_awesome_match, @$columns['package_title_third']);
                array_push($font_awesome_match, @$columns['column_description']);
                array_push($font_awesome_match, @$columns['column_description_second']);
                array_push($font_awesome_match, @$columns['column_description_third']);
                array_push($font_awesome_match, @$columns['arp_header_shortcode']);
                array_push($font_awesome_match, @$columns['arp_header_shortcode_second']);
                array_push($font_awesome_match, @$columns['arp_header_shortcode_third']);
                array_push($font_awesome_match, @$columns['footer_content']);
                array_push($font_awesome_match, @$columns['footer_content_second']);
                array_push($font_awesome_match, @$columns['footer_content_third']);
                array_push($font_awesome_match, @$columns['button_text']);
                array_push($font_awesome_match, @$columns['btn_content_second']);
                array_push($font_awesome_match, @$columns['btn_content_third']);
                array_push($font_awesome_match, @$columns['price_text']);
                array_push($font_awesome_match, @$columns['price_text_two_step']);
                array_push($font_awesome_match, @$columns['price_text_three_step']);
                array_push($font_awesome_match, @$columns['price_text_two_step']);
                array_push($font_awesome_match, @$columns['price_text_three_step']);
                array_push($font_awesome_match, @$columns['price_label']);
                array_push($font_awesome_match, @$columns['price_text_input_two_step_label']);
                array_push($font_awesome_match, @$columns['price_text_input_three_step_label']);
            }

            if (in_array(1, $col_array) and $column_animation['sticky_caption'] == 1 && $is_animation == 'yes') {
                $tablestring .= "</div>";
            }

            $tablestring .= "</div>";
            $tablestring .= "<div class='arp_video_content'></div>";
        } else {
            $tablestring .= __('Please select valid table', ARP_PT_TXTDOMAIN);
        }

        if ($setact != 1) {
            $tablestring .= "<div><span style='color:#FF0000; font-size:12px !important; text-align:center; display:block !important;'>Powered by <a href='http://codecanyon.net/item/arprice-ultimate-compare-pricing-table-plugin/10049883?ref=reputeinfosystems' target='_blank'>ARPrice</a></span></div>";
            $tablestring .= "<div><span style='color:#FF0000; font-size:12px !important; text-align:center; display:block !important;'>&nbsp;&nbsp;(Unlicensed)</span></div>";
        }

        $tablestring .= "</div>";
        $tablestring .= "</div>";
        /* Navigation button for animation */
        if ($navigation) {
            $tablestring .= "<div class='arp_next_div'>";
            $tablestring .= "<div id='arp_next_btn_" . $template_name . "' class='arp_next_btn arp_nav_style_1'></div>";
            $tablestring .= "</div>";
        }
        /* Navigation button for animation */
        $tablestring .= "</div>";
        $tablestring .= "</div>";



        if ($column_animation['is_animation'] == 'yes' and ( $column_animation['pagi_nav_btn'] == 'pagination_bottom' ))
            $tablestring .= "<div class='arp_pagination arp_pagination_top arp_paging_style_1' id='arp_slider_" . $id . "_paginatio_top'></div>";


        $tablestring = apply_filters('arp_postdisplay_pricingtable_filter', $tablestring, $table_id);

//post render action
        do_action('arp_postdisplay_pt_action', $table_id);
        do_action('arp_postdisplay_pt_action' . $table_id, $table_id);

        global $arp_has_tooltip;

        if ($arp_has_tooltip == 1)
            $arp_inc_effect_css[] = 1;

        if($arp_has_tooltip==1){
             $tablestring .= '<input type="hidden" id="arp_tooltip_settings_arptemplate_'.$table_id.'" class="arp_tooltip_settings"  data-tooltip-bgcolor="'.$tooltip_bg_color.'" data-tooltip-width="'.$tooltip_width.'" data-tooltip-color="'.$general_option['tooltip_settings']['text_color'].'" data-tooltip-trigger-type="'.$tooltip_trigger_type.'" data-tooltip-position="'.$general_option['tooltip_settings']['position'].'" data-template-id="'.$table_id.'" data-animation-in="'.$animation_in.'" data-animation-out="'.$animation_out.'" data-tooltip-display-style="'.$tooltip_display_style.'"/>';
        }   

        
        $inbuild = "";
        if ($setact == 0) {
            $inbuild = " (U)";
        }

        // Pattern to check if font awesome is in pricing table or not.
        $fa_pattern = '/class\=(\'|")(fa)\s(.*?)(\'|")/i'; 
        
        // Pattern to check if material icons is in pricing table or not.
        $mi_pattern = '/class\=(\'|")(material-icons)\s(.*?)(\'|")/i';
        
        // Pattern to check if material icons is in pricing table or not.
        $ti_pattern = '/class\=(\'|")(typcn)\s(.*?)(\'|")/i';
        
        // Pattern to check if material icons is in pricing table or not.
        $ic_pattern = '/class\=(\'|")(icon)\s(.*?)(\'|")/i';
        
        // Remove Empty array elements of content which may have font awesome class.
        $filtered_font_awesome_match = array_values(array_filter($font_awesome_match));
        
        /* Check for Font Awesome Icons in Pricing Table */
        if (preg_grep($fa_pattern, $filtered_font_awesome_match) || $tooltip_display_style == 'informative' ) {
            global $arp_has_fontawesome;
            $arp_has_fontawesome = 1;
        }
        
        /* Check for Material Icons in Pricing Table */
        if( preg_grep($mi_pattern,$filtered_font_awesome_match)){
            global $arp_has_material_icons;
            $arp_has_material_icons = 1;
        }
        
        /* Check For Typicons in Pricing Table */
        if( preg_grep($ti_pattern,$filtered_font_awesome_match)){
            global $arp_has_typicons;
            $arp_has_typicons = 1;
        }
        
        /* Check For Ionicons in Pricing Table */
        if( preg_grep($ic_pattern,$filtered_font_awesome_match)){
            global $arp_has_ionicons;
            $arp_has_ionicons = 1;
        }
        
        if (!empty($arp_inc_effect_css) && in_array('1', $arp_inc_effect_css)) {
            global $arp_effect_css;
            $arp_effect_css = 1;
        }

        $whole_table = $tablestring;
        $animate_num_pattern = "/(arp_price_amount)/";
        preg_match($animate_num_pattern, $whole_table, $matches);

        if (intval($general_settings['enable_toggle_price']) === 1 && in_array('arp_price_amount', $matches)) {
            $arp_animate_price = 1;
        }

        $tablestring .= "<div style='clear:both;'></div>";

        $tablestring .= '  
<!--Plugin Name: ARPrice	
	Plugin Version: ' . get_option('arprice_version') . ' ' . $inbuild . '
	Developed By: Repute Infosystems
	Developer URL: http://www.reputeinfosystems.com/
-->';

// changes for replace \n for remove p tag   08jan2015
        $tablestring = preg_replace("~\r?~", "", $tablestring);
        $tablestring = preg_replace("~\r\n?~", "", $tablestring);
        $tablestring = preg_replace("/\n\n+/", "", $tablestring);
        $tablestring = preg_replace("|\n|", "", $tablestring);
        $tablestring = preg_replace("~\n~", "", $tablestring);

        $tablestring = $arp_pricingtable->arprice_font_icon_size_parser($tablestring);

        return $tablestring; // return table string
    }

}
?>
