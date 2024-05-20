<?php

if (!function_exists('arp_get_pricing_table_string_editor')) {

    function arp_get_pricing_table_string_editor($table_id, $pricetable_name = "", $is_tbl_preview = 0, $general_option = '', $opts = '', $is_clone = '') {

        global $wpdb, $arprice_form, $arprice_fonts, $arprice_version, $arprice_font_awesome_icons, $arp_pricingtable;
        $id = $table_id;
        $name = esc_html($pricetable_name);

        if (is_ssl()) {
            $googlefontpreviewurl = "https://www.google.com/fonts/specimen/";
        } else {
            $googlefontpreviewurl = "http://www.google.com/fonts/specimen/";
        }

        global $arp_tempbuttonsarr, $arp_mainoptionsarr, $arprice_form, $arprice_fonts, $arprice_default_settings;

        $hostname = $_SERVER["HTTP_HOST"];
        global $arprice_class;
        $setact = 0;
        global $arpriceplugin;
        $setact = $arprice_class->$arpriceplugin();
        
		
        $tablestring = "";
        $title_cls = "";
        $header_cls = "";

        $tablestring .= "   <style type='text/css'>
	    body { overflow-x: hidden;} 
		.tooltipster-content{
			font-family: 'Open Sans' !important;
			font-size: 13px;
			font-weight: normal;
			line-height: normal !important;
			padding: 5px 10px !important;
		}
		.tooltipster-base{
			width:auto !important;
			border:none;
			border-radius:2px;
				-moz-border-radius:2px;
				-webkit-border-radius:2px;
				-o-border-radius:2px;
			min-height:30px;
			box-shadow:0 1px 2px rgba(0, 0, 0, 0.5);
				-moz-box-shadow:0 1px 2px rgba(0, 0, 0, 0.5);
				-webkit-box-shadow:0 1px 2px rgba(0, 0, 0, 0.5);
				-o-box-shadow:0 1px 2px rgba(0, 0, 0, 0.5);
			background:#43B4FB;
			color:#ffffff;
		}
	</style>";

        if (isset($_REQUEST['arp_action']) && $_REQUEST['arp_action'] == 'edit') {

            $tablestring .= "<script type='text/javascript' language='javascript'>
			jQuery(document).ready(function(){
				var right_side_tooltip_options = '';
				var left_side_tooltip_options = '';

				
		
                                jQuery('.arp_btn:not(\'.selected\')').tipso({
                                    position:'bottom',
                                    background:'#43B4FB',
                                    width:'auto',
                                });
				
			});
		</script>";
        }
        if ($is_tbl_preview && $is_tbl_preview == 1) {
            if (isset($_REQUEST['optid']) && $_REQUEST['optid'] != '') {
                $post_values = get_option($_REQUEST['optid']);
                $get_preview_data = $arprice_form->get_preview_table($post_values);
                //update_option( $_REQUEST['optid'], '' );
                $id = $table_id = $get_preview_data['table_id'];
                $is_animated = $get_preview_data['is_animated'];
                $opts = maybe_unserialize($get_preview_data['table_options']);
                $general_option = maybe_unserialize($get_preview_data['general_options']);
            }
        } else if ($is_tbl_preview && $is_tbl_preview == 3) {
            $opts = maybe_unserialize($opts);
            $general_option = maybe_unserialize($general_option);
        } else {
            $sql = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE ID = %d AND status = %s ", $id, 'published'));
            $table_id = $sql->ID;
            $sql_opt = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice_options WHERE table_id = %d ", $table_id));
            $is_animated = $sql->is_animated;
            $opts = maybe_unserialize($sql_opt[0]->table_options);
            $general_option = maybe_unserialize($sql->general_options);
            $is_template = $sql->is_template;
            apply_filters('arp_append_googlemap_js', $table_id);
        }

        $table_cols = array();
        $table_cols = $table_cols_new = $opts['columns'];

        $maxrowcount = 0;
        if (is_array($table_cols)) {
            foreach ($table_cols as $countcol) {
                if (isset($countcol['rows']) && count($countcol['rows']) > $maxrowcount)
                    $maxrowcount = count($countcol['rows']);
            }
            $maxrowcount--;
        }

        $opts['columns'] = $table_cols;

        $total_columns = count($table_cols);

        $column_animation = $general_option['column_animation'];

        $is_animation = $column_animation['is_animation'];

        $column_settings = $general_option['column_settings'];

        $hover_type = $column_settings['column_highlight_on_hover'];

        $template_settings = $general_option['template_setting'];

        $general_settings = $general_option['general_settings'];

        $template_type = $template_settings['template_type'];

        $template = $template_settings['template'];

        $ref_template = $general_settings['reference_template'];

        $template_id = $template_settings['template'];

        $tooltip_settings = $general_option['tooltip_settings'];

        $arp_template_skin = $template_settings['skin'];

        $is_responsive = $general_option['column_settings']['is_responsive'];

        $arp_template_custom_color = isset($template_settings['custom_color_code']) ? $template_settings['custom_color_code'] : '';

        $reference_template = $general_settings['reference_template'];

        $arp_global_button_type = isset($column_settings['arp_global_button_type']) ? $column_settings['arp_global_button_type'] : 'flat';
        $arp_global_button_class = '';
        $arp_global_button_class_array = $arprice_default_settings->arp_button_type();
        $arp_global_button_size = $arprice_default_settings->arp_button_size_new();
        if ($arp_global_button_type !== 'none') {
            if (isset($column_settings['disable_button_hover_effect']) && $column_settings['disable_button_hover_effect'] == 1) {
                $arp_global_button_class = @$arp_global_button_class_array[$arp_global_button_type]['class'] . ' arp_button_hover_disable arp_editor';
            } else {
                $arp_global_button_class = @$arp_global_button_class_array[$arp_global_button_type]['class'] . ' arp_editor';
            }
        }


        $shadow_style = '';
        if ($column_settings['column_border_radius_top_left'] == 0 && $column_settings['column_border_radius_top_right'] == 0 && $column_settings['column_border_radius_bottom_right'] == 0 && $column_settings['column_border_radius_bottom_left'] == 0) {
            $shadow_style = $column_settings['column_box_shadow_effect'];
        }


        $caption_col = array();

        if (is_array($opts['columns'])) {
            foreach ($opts['columns'] as $key => $val) {
                if (isset($val['is_caption']) && $val['is_caption'] == 1) {
                    $caption_col[] = 1;
                } else {
                    $caption_col[] = 0;
                }
            }
        }
        $tablestring .= "<div class='pricingtable_menu_belt' style='display:block;'>";

        $tablestring .= "<div class='pricingtable_menu_inner'>";

        $tablestring .= "<div class='pricing_table_main'>";

        $tablestring .= "<div class='pt_table_main_cnt'>";
        $tablestring .= "<div class='arprice_logo_box'>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='header_table_name enable' data-image='" . PRICINGTABLE_IMAGES_URL . "/icons/edit-icon_hover.png' id='main_pricing_table_name'>";
        $tablestring .= "<input type='text' name='pricing_table_main' id='pricing_table_main' class='arp_pricing_table_name' value='" . $name . "'>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $arp_load_after_migration = ( isset($column_settings['arp_load_first_time_after_migration']) && $column_settings['arp_load_first_time_after_migration'] != "") ? $column_settings['arp_load_first_time_after_migration'] : 0;

        $tablestring .= "<input type='hidden' name='arprice_load_after_migrate' value='" . $arp_load_after_migration . "' id='arprice_load_after_migration' />";

        $tablestring .= "</div>";

        $tablestring .= "<div class='pricing_table_btns'>";

        $display = ( empty($id) or $is_clone == 1 ) ? 'display:none;' : '';

        $shortcode_txt = (!empty($id) ) ? '<div id="arp_shortcode_value" style="float:right;" >[ARPrice id=' . $id . ']</div>' : '<div id="arp_shortcode_value" style="float:right;"></div>';

        $tablestring .= "<div id='arp_shortcode' class='arp_shortcode_main arp_shortcode' style='" . $display . "' >";

        //$tablestring .= "<div class='general_choose_template arp_shortcode'>";

        $tablestring .= "<label style='float:left'>" . __('Shortcode', ARP_PT_TXTDOMAIN) . ' : </label>' . $shortcode_txt;

        //$tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='btn_field' style='float:right;' >";

        $tablestring .= "<div class='savebtn enable arp_save_btn' id='save_btn' title=''>";

        $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/save_icon.png' />";

        $tablestring .= __('Save', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='savebtn arp_preview_btn' data-src='" . $arprice_form->get_direct_link() . "' id='preview_btn' onClick='arp_preview_new(\"" . $arprice_form->get_direct_link() . "\");' >";
        $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/preview_icon_small.png' />";
        $tablestring .= __('Preview', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='savebtn arp_cancel_btn' id='template_close_btn' onClick='javascript:location.href=\"admin.php?page=arprice\"'>";

        $tablestring .= "&nbsp;&nbsp;";

        $tablestring .= __('Cancel', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $arp_template = isset($arp_template) ? $arp_template : '';
        $arp_template_skin = ($arp_template_skin) ? $arp_template_skin : '';
        $arptemplate_1 = ($id) ? 'arptemplate_' . $id : '';
        $tablestring .= "<input type='hidden' name='arp_template' id='arp_template' value='" . $arptemplate_1 . "' />";
        $tablestring .= "<input type='hidden' name='arp_template_old' id='arp_template_old' value='" . $arp_template . "' />";
        $tablestring .= "<input type='hidden' name='arp_template_skin_editor' class='arp_template_skin' id='arp_template_skin' value='" . $arp_template_skin . "' />";

        $tablestring .= "<input type='hidden' name='arp_custom_color_code' id='arp_custom_color_code' value='" . $arp_template_custom_color . "' />";

        $arp_template_is_custom_color = isset($arp_template_is_custom_color) ? $arp_template_is_custom_color : '';
        $tablestring .= "<input type='hidden' name='is_custom_color' id='is_custom_color' value='" . $arp_template_is_custom_color . "' />";

        $arp_template_column_bg_color = $general_option['custom_skin_colors']['arp_column_bg_custom_color'];
        $arp_template_column_desc_bg_color = $general_option['custom_skin_colors']['arp_column_desc_bg_custom_color'];
        $arp_template_header_bg_color = $general_option['custom_skin_colors']['arp_header_bg_custom_color'];
        $arp_template_pricing_bg_color = $general_option['custom_skin_colors']['arp_pricing_bg_custom_color'];
        $arp_template_odd_row_bg_color = $general_option['custom_skin_colors']['arp_body_odd_row_bg_custom_color'];
        $arp_template_even_row_bg_color = $general_option['custom_skin_colors']['arp_body_even_row_bg_custom_color'];
        $arp_template_footer_content_bg_color = $general_option['custom_skin_colors']['arp_footer_content_bg_color'];
        $arp_template_button_bg_color = $general_option['custom_skin_colors']['arp_button_bg_custom_color'];
        $arp_column_bg_hover_color = $general_option['custom_skin_colors']['arp_column_bg_hover_color'];
        $arp_button_bg_hover_color = $general_option['custom_skin_colors']['arp_button_bg_hover_color'];
        $arp_header_bg_hover_color = $general_option['custom_skin_colors']['arp_header_bg_hover_color'];
        $arp_price_bg_hover_color = $general_option['custom_skin_colors']['arp_price_bg_hover_color'];
        $arp_template_odd_row_hover_bg_color = $general_option['custom_skin_colors']['arp_body_odd_row_hover_bg_custom_color'];
        $arp_template_even_row_hover_bg_color = $general_option['custom_skin_colors']['arp_body_even_row_hover_bg_custom_color'];
        $arp_footer_hover_background_color = $general_option['custom_skin_colors']['arp_footer_content_hover_bg_color'];
        $arp_template_column_desc_hover_bg_color = $general_option['custom_skin_colors']['arp_column_desc_hover_bg_custom_color'];
        $arp_header_font_custom_color_input = $general_option['custom_skin_colors']['arp_header_font_custom_color'];
        $arp_header_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_header_font_custom_hover_color'];
        $arp_price_font_custom_color_input = $general_option['custom_skin_colors']['arp_price_font_custom_color'];
        $arp_price_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_price_font_custom_hover_color'];

        $arp_desc_font_custom_color_input = $general_option['custom_skin_colors']['arp_desc_font_custom_color'];
        $arp_desc_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_desc_font_custom_hover_color'];
        $arp_body_label_font_custom_color_input = $general_option['custom_skin_colors']['arp_body_label_font_custom_color'];
        $arp_body_label_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_body_label_font_custom_hover_color'];
        $arp_body_font_custom_color_input = $general_option['custom_skin_colors']['arp_body_font_custom_color'];
        $arp_body_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_body_font_custom_hover_color'];
        $arp_body_even_font_custom_color_input = $general_option['custom_skin_colors']['arp_body_even_font_custom_color'];
        $arp_body_even_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_body_even_font_custom_hover_color'];

        $arp_footer_font_custom_color_input = $general_option['custom_skin_colors']['arp_footer_font_custom_color'];
        $arp_footer_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_footer_font_custom_hover_color'];
        $arp_button_font_custom_color_input = $general_option['custom_skin_colors']['arp_button_font_custom_color'];
        $arp_button_font_custom_hover_color_input = $general_option['custom_skin_colors']['arp_button_font_custom_hover_color'];

        $arp_shortocode_background = @$general_option['custom_skin_colors']['arp_shortocode_background'];
        $arp_shortocode_font_color = @$general_option['custom_skin_colors']['arp_shortocode_font_color'];
        $arp_shortcode_bg_hover_color = @$general_option['custom_skin_colors']['arp_shortcode_bg_hover_color'];
        $arp_shortcode_font_hover_color = @$general_option['custom_skin_colors']['arp_shortcode_font_hover_color'];


        $tablestring .= "<input type='hidden' name='arp_column_background_color' id='arp_column_background_color_input' value='" . $arp_template_column_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_column_desc_background_color' id='arp_column_desc_background_color_input' value='" . $arp_template_column_desc_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_header_background_color' id='arp_header_background_color_input' value='" . $arp_template_header_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_pricing_background_color' id='arp_pricing_background_color_input' value='" . $arp_template_pricing_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_body_odd_row_background_color' id='arp_body_odd_row_background_color' value='" . $arp_template_odd_row_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_body_even_row_background_color' id='arp_body_even_row_background_color' value='" . $arp_template_even_row_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_footer_content_background_color' id='arp_footer_content_background_color' value='" . $arp_template_footer_content_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_button_background_color' id='arp_button_background_color_input' value='" . $arp_template_button_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_column_bg_hover_color' class='arp_column_bg_hover_color' id='arp_column_bg_hover_color' value='" . $arp_column_bg_hover_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_header_bg_hover_color' class='arp_header_bg_hover_color' id='arp_header_bg_hover_color' value='" . $arp_header_bg_hover_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_button_bg_hover_color' class='arp_button_bg_hover_color' id='arp_button_bg_hover_color' value='" . $arp_button_bg_hover_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_price_bg_hover_color' class='arp_price_bg_hover_color' id='arp_price_bg_hover_color' value='" . $arp_price_bg_hover_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_body_odd_row_hover_background_color' id='arp_body_odd_row_hover_background_color' class='arp_body_odd_row_hover_background_color' value='" . $arp_template_odd_row_hover_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_body_even_row_hover_background_color' id='arp_body_even_row_hover_background_color' class='arp_body_even_row_hover_background_color' value='" . $arp_template_even_row_hover_bg_color . "' />";
        $tablestring .= "<input type='hidden' name='arp_footer_content_hover_background_color' id='arp_footer_hover_bg_color' class='arp_footer_hover_background_color' value='" . $arp_footer_hover_background_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_column_desc_hover_background_color' class='arp_column_desc_hover_background_color_input' id='arp_column_desc_hover_background_color_input' value='" . $arp_template_column_desc_hover_bg_color . "' />";

        $tablestring .= "<input type='hidden' name='arp_header_font_custom_color_input' class='arp_header_font_custom_color_input' id='arp_header_font_custom_color_input' value='" . $arp_header_font_custom_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_header_font_custom_hover_color_input' class='arp_header_font_custom_hover_color_input' id='arp_header_font_custom_hover_color_input' value='" . $arp_header_font_custom_hover_color_input . "' />";
        $tablestring .= "<input type='hidden' name='arp_price_font_custom_color_input' class='arp_price_font_custom_color_input' id='arp_price_font_custom_color_input' value='" . $arp_price_font_custom_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_price_font_custom_hover_color_input' class='arp_price_font_custom_hover_color_input' id='arp_price_font_custom_hover_color_input' value='" . $arp_price_font_custom_hover_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_desc_font_custom_color_input' class='arp_desc_font_custom_color_input' id='arp_desc_font_custom_color_input' value='" . $arp_desc_font_custom_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_desc_font_custom_hover_color_input' class='arp_desc_font_custom_hover_color_input' id='arp_desc_font_custom_hover_color_input' value='" . $arp_desc_font_custom_hover_color_input . "' />";
        $tablestring .= "<input type='hidden' name='arp_body_label_font_custom_color_input' class='arp_body_label_font_custom_color_input' id='arp_body_label_font_custom_color_input' value='" . $arp_body_label_font_custom_color_input . "' />";
        $tablestring .= "<input type='hidden' name='arp_body_label_font_custom_hover_color_input' class='arp_body_label_font_custom_hover_color_input' id='arp_body_label_font_custom_hover_color_input' value='" . $arp_body_label_font_custom_hover_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_body_font_custom_color_input' class='arp_body_font_custom_color_input' id='arp_body_font_custom_color_input' value='" . $arp_body_font_custom_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_body_font_custom_hover_color_input' class='arp_body_font_custom_hover_color_input' id='arp_body_font_custom_hover_color_input' value='" . $arp_body_font_custom_hover_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_body_even_font_custom_color_input' class='arp_body_even_font_custom_color_input' id='arp_body_even_font_custom_color_input' value='" . $arp_body_even_font_custom_color_input . "' />";
        $tablestring .= "<input type='hidden' name='arp_body_even_font_custom_hover_color_input' class='arp_body_even_font_custom_hover_color_input' id='arp_body_even_font_custom_hover_color_input' value='" . $arp_body_even_font_custom_hover_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_footer_font_custom_color_input' class='arp_footer_font_custom_color_input' id='arp_footer_font_custom_color_input' value='" . $arp_footer_font_custom_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_footer_font_custom_hover_color_input' class='arp_footer_font_custom_hover_color_input' id='arp_footer_font_custom_hover_color_input' value='" . $arp_footer_font_custom_hover_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_button_font_custom_color_input' class='arp_button_font_custom_color_input' id='arp_button_font_custom_color_input' value='" . $arp_button_font_custom_color_input . "' />";

        $tablestring .= "<input type='hidden' name='arp_button_font_custom_hover_color_input' class='arp_button_font_custom_hover_color_input' id='arp_button_font_custom_hover_color_input' value='" . $arp_button_font_custom_hover_color_input . "' />";
        $tablestring .= "<input type='hidden' name='arp_shortocode_background_color' id='arp_shortocode_background_color_input' value='" . $arp_shortocode_background . "' />";
        $tablestring .= "<input type='hidden' name='arp_shortocode_font_custom_color_input' class='arp_shortocode_font_custom_color_input' id='arp_shortocode_font_custom_color_input' value='" . $arp_shortocode_font_color . "' />";
        $tablestring .= "<input type='hidden' name='arp_shortcode_font_custom_hover_color_input' class='arp_shortcode_font_custom_hover_color_input' id='arp_shortcode_font_custom_hover_color_input' value='" . $arp_shortcode_font_hover_color . "' />";
        $tablestring .= "<input type='hidden' name='arp_shortcode_bg_hover_color' class='arp_shortcode_bg_hover_color' id='arp_shortcode_bg_hover_color' value='" . $arp_shortcode_bg_hover_color . "' />";


        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        /**
         * New Belt Design
         * 
         * @since ARPrice 2.0
         */
        $tablestring .= "<div class='arprice_options_menu_belt'>";

        $tablestring .= "<div class='arprice_top_belt_menu_option' id='column_options'>";
        $tablestring .= "<div class='arprice_top_belt_inner_container'>";
        $tablestring .= "<div class='column_options_img'></div>";
        $tablestring .= "<label class='arprice_top_belt_label'>" . __('Column Options', ARP_PT_TXTDOMAIN) . "</label>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arprice_top_belt_menu_option' id='column_effects'>";
        $tablestring .= "<div class='arprice_top_belt_inner_container'>";
        $tablestring .= "<div class='column_effects_img'></div>";
        $tablestring .= "<label class='arprice_top_belt_label'>" . __('Effects', ARP_PT_TXTDOMAIN) . "</label>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arprice_top_belt_menu_option' id='all_font_options'>";
        $tablestring .= "<div class='arprice_top_belt_inner_container'>";
        $tablestring .= "<div class='font_options_img'></div>";
        $tablestring .= "<label class='arprice_top_belt_label'>" . __('Fonts', ARP_PT_TXTDOMAIN) . "</label>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arprice_top_belt_menu_option' id='tootip_options'>";
        $tablestring .= "<div class='arprice_top_belt_inner_container'>";
        $tablestring .= "<div class='tooltip_options_img'></div>";
        $tablestring .= "<label class='arprice_top_belt_label'>" . __('Tooltip', ARP_PT_TXTDOMAIN) . "</label>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arprice_top_belt_menu_option' id='custom_css_options'>";
        $tablestring .= "<div class='arprice_top_belt_inner_container'>";
        $tablestring .= "<div class='custom_css_options_img'></div>";
        $tablestring .= "<label class='arprice_top_belt_label'>" . __('Custom CSS', ARP_PT_TXTDOMAIN) . "</label>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arprice_top_belt_menu_option' id='toggle_content_options'>";
        $tablestring .= "<div class='arprice_top_belt_inner_container'>";
        $tablestring .= "<div class='toggle_content_options_img'></div>";
        $tablestring .= "<label class='arprice_top_belt_label'>" . __('Toggle Price', ARP_PT_TXTDOMAIN) . "</label>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";



        $tablestring .= "<div class='arprice_top_belt_menu_right'>";

        $tablestring .= "<div class='arprice_top_right_belt_inner container_width'>";

        if ($column_settings['column_wrapper_width_txtbox'] != '') {
            $wrapper_width_value = $column_settings['column_wrapper_width_txtbox'];
        } else {
            $wrapper_width_value = $arp_mainoptionsarr['general_options']['wrapper_width'];
        }

        $tablestring .= "<label for='column_wrapper_width_txtbox'>" . __('Width', ARP_PT_TXTDOMAIN) . "</label>&nbsp;&nbsp;";

        $tablestring .= "<div class='arprice_container_width_wrapper'>";
        $tablestring .= "<input type='text' id='column_wrapper_width_txtbox' value='$wrapper_width_value' class='arp_tab_txt' name='column_wrapper_width_txtbox'>";

        $tablestring .= "<span>px</span>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arprice_top_right_belt_inner general_color_opts enable'>";

        $tablestring .= "<label>" . __('Color', ARP_PT_TXTDOMAIN) . "</label>";

        if ($reference_template == '')
            $reference_template = 'arptemplate_1';

        $key = array_search($arp_template_skin, $arp_mainoptionsarr['general_options']['template_options']['skins'][$reference_template]);

        $default_skins = $arprice_default_settings->arprice_default_template_skins();
        $postarr['action'] = "arprice_default_template_skins";
        $postarr['table_id'] = $table_id;
        $postarr['reference_template'] = $reference_template;
        $skins = $arprice_default_settings->arp_change_default_template_skins($default_skins, $postarr);
        $data_skin = json_encode($skins[$reference_template]['skin']);
        $data_array = json_encode($skins[$reference_template]['color']);

        $tablestring .= "<div class='arprice_container_width_wrapper general_color_box_div' id='general_color_box_div' target-div='template_color_scheme'";
        $tablestring .= "data-skins='" . $data_skin . "'";
        $tablestring .= "data-array='" . json_encode($skins[$reference_template]['color']) . "'";
        $tablestring .= ">";

        if ($arp_mainoptionsarr['general_options']['template_options']['skins'][$reference_template][$key] == 'multicolor')
            $cls = 'multi-color-small-icon';
        else
            $cls = '';

        if ($arp_mainoptionsarr['general_options']['template_options']['skins'][$reference_template][$key] != 'multicolor') {
            $color = '#' . $arp_mainoptionsarr['general_options']['template_options']['skin_color_code'][$reference_template][$key];
        } else {
            $color = '';
        }

        if ($template_settings['skin'] == 'custom' || $template_settings['skin'] == 'custom_skin') {
            $custom_skin_key = $arprice_default_settings->arp_custom_css_selected_bg_color();
            $custom_skin_key = $custom_skin_key[$reference_template];
            $color = $general_option['custom_skin_colors'][$custom_skin_key];
        }

        $tablestring .= "<div style='background:$color' id='general_color_box' class='general_color_box $cls'></div>";

        $tablestring .= "<div class='general_color_box_img'>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        /**
         * ARPrice Column Options Menu New Design.
         * 
         * @since 2.0
         */
        /* Start */

        $tablestring .= "<div class='general_options_bar arp_hidden'>";

        $tablestring .= "<div class='general_options_bar_content'>";

        $tablestring .= "<div class='arprice_toggle_menu_options'></div>";


        /* Column Options Start */

        $tablestring .= "<div class='general_column_options_tab enable global_opts' id='column_options'>";

        $tablestring .= "<div class='arprice_option_belt_title'>";

        $tablestring .= __('Column Options', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_option_dropdown' id='column_option_dropdown'>";


        // Column Width \\
        $tablestring .= "<div class='column_content_light_row column_opt_row'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Column Width', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        $column_width_readonly = '';


        $tablestring .= "<span class='arp_col_px'>px</span>";

        $tablestring .= "<input type='text' " . $column_width_readonly . " name='all_column_width' class='arp_tab_txt' value='" . $column_settings['all_column_width'] . "' id='all_column_width' />";


        $tablestring .= "</div>";

        $tablestring .= "</div>";
        // Column Width End \\
        // Responsive Column\\ 
        $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Responsive column', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        $tablestring .= "<input type='checkbox' name='is_responsive' id='is_responsive' class='arp_checkbox light_bg' value='1' " . checked($column_settings['is_responsive'], 1, false) . " />";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        // Responsive Column End\\ 
        // Display Columns\\ 

        $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

        $tablestring .= "<div class='column_opt_label'>";

        $tablestring .= __('Display Columns', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";




        // Mobile \\
        $tablestring .= "<div class='column_opt_opts'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . __('Mobile', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        $tablestring .= "<input type='hidden' name='arp_display_columns_mobile' id='arp_display_columns_mobile' value='" . $column_settings['display_col_mobile'] . "' />";

        $tablestring .= "<dl id='arp_display_columns_mobile' class='arp_selectbox' data-id='arp_display_columns_mobile' data-name='arp_display_columns_mobile' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        if ($column_settings['display_col_mobile']) {
            $display_col_mobile = $column_settings['display_col_mobile'];
        } else {
            $display_col_mobile = __('Choose Option', ARP_PT_TXTDOMAIN);
        }
        $tablestring .= "<dt><span>" . $display_col_mobile . "</span><input type='text' style='display:none;' value='" . $display_col_mobile . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_display_columns_mobile' data-id='arp_display_columns_mobile'>";
        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . __('All', ARP_PT_TXTDOMAIN) . "' data-label='" . __('All', ARP_PT_TXTDOMAIN) . "'>" . __('All', ARP_PT_TXTDOMAIN) . "</li>";
        for ($i = 1; $i <= $total_columns; $i++) {
            $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $i . "'>" . $i . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        // Mobile End \\
        // Tablet \\
        $tablestring .= "<div class='column_opt_opts'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label two_cols'>" . __('Tablet', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        $tablestring .= "<input type='hidden' name='arp_display_columns_tablet' id='arp_display_columns_tablet' value='" . $column_settings['display_col_tablet'] . "' />";

        $tablestring .= "<dl id='arp_display_columns_tablet' class='arp_selectbox' data-id='arp_display_columns_tablet' data-name='arp_display_columns_tablet' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        if ($column_settings['display_col_tablet']) {
            $display_col_tablet = $column_settings['display_col_tablet'];
        } else {
            $display_col_tablet = __('Choose Option', ARP_PT_TXTDOMAIN);
        }
        $tablestring .= "<dt><span>" . $display_col_tablet . "</span><input type='text' style='display:none;' value='" . $display_col_tablet . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_display_columns_tablet' data-id='arp_display_columns_tablet'>";
        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . __('All', ARP_PT_TXTDOMAIN) . "' data-label='" . __('All', ARP_PT_TXTDOMAIN) . "'>" . __('All', ARP_PT_TXTDOMAIN) . "</li>";
        for ($i = 1; $i <= $total_columns; $i++) {
            $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $i . "'>" . $i . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        // Tablet End \\

        $tablestring .= "</div>";



        // Display Columns End\\ 
        // Space between Columns\\
        $tablestring .= "<div class='column_content_light_row column_opt_row'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Space between Columns', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        $tablestring .= "<span class='arp_col_px'>px</span>";

        $tablestring .= "<input type='text' name='column_space' class='arp_tab_txt' value='" . $column_settings['column_space'] . "' id='column_space' />";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        // Space between Columns End \\
        //Full Column Clickable\\
        if (in_array(1, $caption_col))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        if ($reference_template == "arptemplate_25") {
            $arp_temp_25 = 'display:none;';
        } else {
            $arp_temp_25 = '';
        }
        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $arp_temp_25 . "'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Full Column Clickable', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";


        $column_settings['full_column_clickable'] = isset($column_settings['full_column_clickable']) ? $column_settings['full_column_clickable'] : "";
        $tablestring .= "<input type='checkbox' name='full_column_clickable' id='full_column_clickable' class='arp_checkbox light_bg' value='1' " . checked($column_settings['full_column_clickable'], 1, false) . " />";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        //Column Radius\\
        $allow_border_radius = $arprice_default_settings->arprice_allow_border_radius();
        $column_border_radius_top_left = $column_border_radius_top_right = $column_border_radius_bottom_right = $column_border_radius_bottom_left = '';

        if ($allow_border_radius[$reference_template]) {

            $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

            $tablestring .= "<div class='column_opt_label two_cols' style='line-height:70px'>" . __('Column Radius (px)', ARP_PT_TXTDOMAIN) . "</div>";

            $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

            if ($column_settings['column_box_shadow_effect'] == 'shadow_style_none' || $column_settings['column_box_shadow_effect'] == '') {
                $arp_tab_column_radius_txt_disabled = '';
            } else {
                $arp_tab_column_radius_txt_disabled = 'readonly="readonly"';
            }

            if ($column_settings['column_border_radius_top_left'] != '' || $column_settings['column_border_radius_top_left'] == 0) {
                $column_border_radius_top_left = $column_settings['column_border_radius_top_left'];
            } else {
                $column_border_radius_top_left = $arp_mainoptionsarr['general_options']['default_column_radius_value'][$reference_template]['top_left'];
            }

            if ($column_settings['column_border_radius_top_right'] != '' || $column_settings['column_border_radius_top_right'] == 0) {
                $column_border_radius_top_right = $column_settings['column_border_radius_top_right'];
            } else {
                $column_border_radius_top_right = $arp_mainoptionsarr['general_options']['default_column_radius_value'][$reference_template]['top_right'];
            }
            if ($column_settings['column_border_radius_bottom_right'] != '' || $column_settings['column_border_radius_bottom_right'] == 0) {
                $column_border_radius_bottom_right = $column_settings['column_border_radius_bottom_right'];
            } else {
                $column_border_radius_bottom_right = $arp_mainoptionsarr['general_options']['default_column_radius_value'][$reference_template]['bottom_right'];
            }
            if ($column_settings['column_border_radius_bottom_left'] != '' || $column_settings['column_border_radius_bottom_left'] == 0) {
                $column_border_radius_bottom_left = $column_settings['column_border_radius_bottom_left'];
            } else {
                $column_border_radius_bottom_left = $arp_mainoptionsarr['general_options']['default_column_radius_value'][$reference_template]['bottom_left'];
            }

            $tablestring .= "<div class='arp_column_radius_main'>";

            $tablestring .= "<div>";
            $tablestring .= "<span>Left</span>";
            $tablestring .= "<input type='text' id='column_border_radius_top_left' value='$column_border_radius_top_left' class='arp_tab_txt arp_tab_column_radius_txt' name='column_border_radius_top_left' onBlur=\"arp_update_column_border_radius(this.value,jQuery('#column_border_radius_top_right').val(),jQuery('#column_border_radius_bottom_right').val(), jQuery('#column_border_radius_bottom_left').val(),$is_animated)\" } $arp_tab_column_radius_txt_disabled />";
            $tablestring .= "</div>";

            $tablestring .= "<div>";
            $tablestring .= "<span>Right</span>";
            $tablestring .= "<input type='text' id='column_border_radius_top_right' value='$column_border_radius_top_right' class='arp_tab_txt arp_tab_column_radius_txt' name='column_border_radius_top_right' onBlur=\"arp_update_column_border_radius(jQuery('#column_border_radius_top_left').val(),this.value,jQuery('#column_border_radius_bottom_right').val(), jQuery('#column_border_radius_bottom_left').val(),$is_animated)\" $arp_tab_column_radius_txt_disabled />";
            $tablestring .= "</div>";


            $tablestring .= "<div>";
            $tablestring .= "<span>Left</span>";
            $tablestring .= "<input type='text' id='column_border_radius_bottom_left' value='$column_border_radius_bottom_left' class='arp_tab_txt arp_tab_column_radius_txt' name='column_border_radius_bottom_left' onBlur=\"arp_update_column_border_radius(jQuery('#column_border_radius_top_left').val(), jQuery('#column_border_radius_top_right').val(), jQuery('#column_border_radius_bottom_right').val(), this.value, $is_animated)\" $arp_tab_column_radius_txt_disabled />";
            $tablestring .= "</div>";

            $tablestring .= "<div>";
            $tablestring .= "<span>Right</span>";
            $tablestring .= "<input type='text' id='column_border_radius_bottom_right' value='$column_border_radius_bottom_right' class='arp_tab_txt arp_tab_column_radius_txt' name='column_border_radius_bottom_right' onBlur=\"arp_update_column_border_radius(jQuery('#column_border_radius_top_left').val(), jQuery('#column_border_radius_top_right').val(), this.value, jQuery('#column_border_radius_bottom_left').val(),$is_animated)\" $arp_tab_column_radius_txt_disabled />";
            $tablestring .= "</div>";

            $tablestring .= "</div>";


            $tablestring .= "<div class='arp_column_radius_main'>";
            $tablestring .= "<div class='arp_column_radius_bottom'>";
            $tablestring .= "<span>Top</span>";
            $tablestring .= "</div>";
            $tablestring .= "<div class='arp_column_radius_bottom'>";
            $tablestring .= "<span>Bottom</span>";
            $tablestring .= "</div>";
            $tablestring .= "</div>";

            $tablestring .= "</div>";

            $tablestring .= "</div>";
        }
        //Column Radius End \\
        //Hide Caption Column \\
        if (in_array(1, $caption_col))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        $tablestring .= "<div class='column_content_light_row column_opt_row' id='column_content_hide_caption_column' style='" . $style . "'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Hide Caption Column', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        $column_settings['hide_caption_column'] = isset($column_settings['hide_caption_column']) ? $column_settings['hide_caption_column'] : "";
        $tablestring .= "<input type='checkbox' name='hide_caption_column' id='hide_caption_column' class='arp_checkbox light_bg' value='1' " . checked($column_settings['hide_caption_column'], 1, false) . " />";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        // Hide Caption Column End \\
        // Hide Blank Rows \\\
        $column_settings['column_hide_blank_rows'] = isset($column_settings['column_hide_blank_rows']) ? $column_settings['column_hide_blank_rows'] : '';
        $tablestring .= "<div class='column_content_light_row column_opt_row'><div class='column_opt_label two_cols'>" . __('Hide blank rows from bottom', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";
        $tablestring .= "<input type='checkbox' name='hide_blank_rows' id='hide_blank_rows' value='yes' " . checked($column_settings['column_hide_blank_rows'], 'yes', false) . " class='arp_checkbox light_bg' />";
        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_label_help'>(" . __('Only bottom rows will hide and shown in preview and front end.', ARP_PT_TXTDOMAIN) . ")</div>";
        $tablestring .= "</div>";

        // Hide Blank Rows End \\   


        /* hide section wise */
        $hide_section_array = $arprice_default_settings->arprice_hide_section_array();
        $hide_section_array = $hide_section_array[$ref_template];

        /* Hide Header Section */
        $tablestring .= "<div class='column_content_light_row column_opt_row' id='arp_hide_show_section'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Hide Column Sections', ARP_PT_TXTDOMAIN) . "</div>";

        /* Hide Header Section */
        if (array_key_exists('arp_header', $hide_section_array))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        $tablestring .= "<div class='column_opt_opts' style='" . $style . "'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . __('Hide Header', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        $column_settings['hide_header_global'] = isset($column_settings['hide_header_global']) ? $column_settings['hide_header_global'] : "";
        $tablestring .= "<input type='checkbox' data-hide-section='arp_header' name='hide_header_global' id='hide_header_global' class='arp_checkbox light_bg' value='1' " . checked($column_settings['hide_header_global'], 1, false) . " />";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        if (array_key_exists('arp_header_shortcode', $hide_section_array))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        $tablestring .= "<div class='column_opt_opts' style='" . $style . "'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . __('Hide Shortcode Section', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        $column_settings['hide_header_shortcode_global'] = isset($column_settings['hide_header_shortcode_global']) ? $column_settings['hide_header_shortcode_global'] : "";
        $tablestring .= "<input type='checkbox' data-hide-section='arp_header_shortcode' name='hide_header_shortcode_global' id='hide_header_shortcode_global' class='arp_checkbox light_bg' value='1' " . checked($column_settings['hide_header_shortcode_global'], 1, false) . " />";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        if (array_key_exists('arp_price', $hide_section_array))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        $tablestring .= "<div class='column_opt_opts' style='" . $style . "'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . __('Hide Price', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        $column_settings['hide_price_global'] = isset($column_settings['hide_price_global']) ? $column_settings['hide_price_global'] : "";
        $tablestring .= "<input type='checkbox' data-hide-section='arp_price' name='hide_price_global' id='hide_price_global' class='arp_checkbox light_bg' value='1' " . checked($column_settings['hide_price_global'], 1, false) . " />";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        if (array_key_exists('arp_feature', $hide_section_array))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        $tablestring .= "<div class='column_opt_opts' style='" . $style . "'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . __('Hide Body', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        $column_settings['hide_feature_global'] = isset($column_settings['hide_feature_global']) ? $column_settings['hide_feature_global'] : "";
        $tablestring .= "<input type='checkbox' data-hide-section='arp_feature' name='hide_feature_global' id='hide_feature_global' class='arp_checkbox light_bg' value='1' " . checked($column_settings['hide_feature_global'], 1, false) . " />";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        if (array_key_exists('arp_description', $hide_section_array))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        $tablestring .= "<div class='column_opt_opts' style='" . $style . "'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . __('Hide Description', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        $column_settings['hide_description_global'] = isset($column_settings['hide_description_global']) ? $column_settings['hide_description_global'] : "";
        $tablestring .= "<input type='checkbox' data-hide-section='arp_description' name='hide_description_global' id='hide_description_global' class='arp_checkbox light_bg' value='1' " . checked($column_settings['hide_description_global'], 1, false) . " />";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        if (array_key_exists('arp_footer', $hide_section_array))
            $style = 'display:block;';
        else
            $style = 'display:none;';

        $tablestring .= "<div class='column_opt_opts' style='" . $style . "'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . __('Hide Button', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        $column_settings['hide_footer_global'] = isset($column_settings['hide_footer_global']) ? $column_settings['hide_footer_global'] : "";
        $tablestring .= "<input type='checkbox' data-hide-section='arp_footer' name='hide_footer_global' id='hide_footer_global' class='arp_checkbox light_bg' value='1' " . checked($column_settings['hide_footer_global'], 1, false) . " />";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_label_help'>(" . __('Effect will shown in preview and front end only.', ARP_PT_TXTDOMAIN) . ")</div>";
        $tablestring .= "</div>";
//
//        $tablestring .= "</div>";
        //Opacity \\
        if (in_array(1, $caption_col))
            $cls = 'column_content_dark_row';
        else
            $cls = 'column_content_light_row';

        if ($is_animation == 1 or $is_animation == 'yes')
            $display = 'display:none;';
        else
            $display = 'display:block';

        $tablestring .= "<div class='" . $cls . " column_opt_row' id='column_content_opacity' style='" . $display . ";' > ";

        $tablestring .= "<div class='column_opt_label  two_cols'>" . __('Opacity', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        $tablestring .= "<input type='hidden' name='column_opacity' id='column_opacity' value='" . $column_settings['column_opacity'] . "' />";

        $tablestring .= "<dl class='arp_selectbox' id='column_opacity_dd' data-name='column_opacity' data-id='column_opacity' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        if ($column_settings['column_opacity']) {
            $arp_selectbox_placeholder = $column_settings['column_opacity'];
        } else {
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);
        }

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $column_settings['column_opacity'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_column_opacity' data-id='column_opacity'>";

        foreach ($arp_mainoptionsarr['general_options']['column_opacity'] as $column_opacity) {
            $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . $column_opacity . "' data-label='" . $column_opacity . "'>" . $column_opacity . "</li>";
        }
        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</di>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_label_help' style='margin: -2px 0 0;'>(" . __('Opacity will be shown in preview and frontend only.', ARP_PT_TXTDOMAIN) . ")</div>";

        $tablestring .= "</div>";

        //Opacity End\\
        //start column level border
        $column_border_style = '';
        if ($reference_template == 'arptemplate_23' || $reference_template == 'arptemplate_21') {
            $column_border_style = 'display: none;';
        }
        $tablestring .= "<div class='column_content_dark_row column_opt_row' style='" . $column_border_style . "'>";

        $tablestring .= "<div class='column_opt_label'>";

        $tablestring .= __('Column Borders', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        // border-size row level start \\
        $tablestring .= "<div class='column_opt_opts'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . __('Border Size', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";
        $column_settings['arp_column_border_size'] = isset($column_settings['arp_column_border_size']) ? $column_settings['arp_column_border_size'] : '';
        $tablestring .= "<input type='hidden' name='arp_column_border_size' id='arp_column_border_size' value='" . $column_settings['arp_column_border_size'] . "' />";

        $tablestring .= "<dl id='arp_column_border_size' class='arp_selectbox' data-id='arp_column_border_size' data-name='arp_column_border_size' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        if ($column_settings['arp_column_border_size']) {
            $selected_border_size = $column_settings['arp_column_border_size'];
        } else {
            $selected_border_size = "0";
        }
        $tablestring .= "<dt><span>" . $selected_border_size . "</span><input type='text' style='display:none;' value='" . $selected_border_size . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_column_border_size' data-id='arp_column_border_size'>";
        for ($i = 0; $i <= 10; $i++) {
            $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $i . "'>" . $i . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        // border-size row level end \\
        // border-type row level start \\
        $tablestring .= "<div class='column_opt_opts'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label two_cols'>" . __('Border Type', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";
        $column_settings['arp_column_border_type'] = isset($column_settings['arp_column_border_type']) ? $column_settings['arp_column_border_type'] : '';
        $tablestring .= "<input type='hidden' name='arp_column_border_type' id='arp_column_border_type' value='" . $column_settings['arp_column_border_type'] . "' />";

        $tablestring .= "<dl id='arp_column_border_type' class='arp_selectbox' data-id='arp_column_border_type' data-name='arp_column_border_type' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        if ($column_settings['arp_column_border_type']) {
            $selected_border_type = $column_settings['arp_column_border_type'];
        } else {
            $selected_border_type = __('Choose Option', ARP_PT_TXTDOMAIN);
        }
        $tablestring .= "<dt><span>" . $selected_border_type . "</span><input type='text' style='display:none;' value='" . $selected_border_type . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_column_border_type' data-id='arp_column_border_type'>";

        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='solid' data-label='solid'>Solid</li>";
        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='dotted' data-label='dotted'>Dotted</li>";
        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='dashed' data-label='dashed'>Dashed</li>";

        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        // border-type row level end \\
        // border-color starts
        $tablestring .= "<div class='column_opt_opts'>";
        $tablestring .= "<div class='column_opt_label column_opt_sub_label two_cols'>" . __('Border Color', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='column_opt_opts two_cols'>";
        $column_settings['arp_column_border_color'] = isset($column_settings['arp_column_border_color']) ? $column_settings['arp_column_border_color'] : "#c9c9c9";
        $tablestring .= "<div class='color_picker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_column_border_color)\",valueElement:arp_column_border_color_hidden}' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_column_border_color)' jscolor-valueelement='arp_column_border_color_hidden' data-id='arp_column_border_color_hidden' data-column-id='arp_column_border_color' id='arp_column_border_color' style='background:" . $column_settings['arp_column_border_color'] . ";' data-color='" . $column_settings['arp_column_border_color'] . "' >";

        $tablestring .= "</div>";
        $tablestring .= "<input type='hidden' id='arp_column_border_color_hidden' name='arp_column_border_color' value='" . $column_settings['arp_column_border_color'] . "' />";
        $tablestring .= "</div>";

        $tablestring .= "</div>";
        // border-color ends
        // borders checkbox starts

        $tablestring .= "<div class='column_opt_label column_opt_sub_label two_cols'>" . __('Borders', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";
        $tablestring .= "<div class='arp_column_radius_main'>";



        $tablestring .= "<div>";
        $tablestring .= "<span>Left</span>";
        $column_settings['arp_column_border_left'] = isset($column_settings['arp_column_border_left']) ? $column_settings['arp_column_border_left'] : '';
        $tablestring .= "<input type='checkbox' name='arp_column_border_left' id='arp_column_border_left' class='arp_checkbox light_bg' value='1' " . checked($column_settings['arp_column_border_left'], 1, false) . " style='position:relative;'  />";
        $tablestring .= "</div>";

        $tablestring .= "<div>";
        $tablestring .= "<span>Right</span>";
        $column_settings['arp_column_border_right'] = isset($column_settings['arp_column_border_right']) ? $column_settings['arp_column_border_right'] : '';
        $tablestring .= "<input type='checkbox' name='arp_column_border_right' id='arp_column_border_right' class='arp_checkbox light_bg' value='1' " . checked($column_settings['arp_column_border_right'], 1, false) . " style='position:relative;'  />";
        $tablestring .= "</div>";

        $tablestring .= "<div>";
        $tablestring .= "<span>Top</span>";
        $column_settings['arp_column_border_top'] = isset($column_settings['arp_column_border_top']) ? $column_settings['arp_column_border_top'] : '';
        $tablestring .= "<input type='checkbox' name='arp_column_border_top' id='arp_column_border_top' class='arp_checkbox light_bg' value='1' " . checked($column_settings['arp_column_border_top'], 1, false) . " style='position:relative;'  />";
        $tablestring .= "</div>";

        $tablestring .= "<div>";
        $tablestring .= "<span>Bottom</span>";
        $column_settings['arp_column_border_bottom'] = isset($column_settings['arp_column_border_bottom']) ? $column_settings['arp_column_border_bottom'] : '';
        $tablestring .= "<input type='checkbox' name='arp_column_border_bottom' id='arp_column_border_bottom' class='arp_checkbox light_bg' value='1' " . checked($column_settings['arp_column_border_bottom'], 1, false) . " style='position:relative;'  />";
        $tablestring .= "</div>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";
        // borders checkbox ends

        $tablestring .= "</div>";

        //end column level border
        //start row level border

        $row_border_style = '';
        if ($reference_template == 'arptemplate_21') {
            $row_border_style = 'display: none;';
        }
        $tablestring .= "<div class='column_content_dark_row column_opt_row' style='" . $row_border_style . "'>";

        $tablestring .= "<div class='column_opt_label'>";

        $tablestring .= __('Row Borders', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        // border-size row level start \\
        $tablestring .= "<div class='column_opt_opts'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . __('Border Size', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";
        $column_settings['arp_row_border_size'] = isset($column_settings['arp_row_border_size']) ? $column_settings['arp_row_border_size'] : '';
        $tablestring .= "<input type='hidden' name='arp_row_border_size' id='arp_row_border_size' value='" . $column_settings['arp_row_border_size'] . "' />";

        $tablestring .= "<dl id='arp_row_border_size' class='arp_selectbox' data-id='arp_row_border_size' data-name='arp_row_border_size' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        if ($column_settings['arp_row_border_size']) {
            $selected_border_size = $column_settings['arp_row_border_size'];
        } else {
            $selected_border_size = "0";
        }
        $tablestring .= "<dt><span>" . $selected_border_size . "</span><input type='text' style='display:none;' value='" . $selected_border_size . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_row_border_size' data-id='arp_row_border_size'>";
        for ($i = 0; $i <= 10; $i++) {
            $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $i . "'>" . $i . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        // border-size row level end \\
        // border-type row level start \\
        $tablestring .= "<div class='column_opt_opts'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label two_cols'>" . __('Border Type', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";
        $column_settings['arp_row_border_type'] = isset($column_settings['arp_row_border_type']) ? $column_settings['arp_row_border_type'] : '';
        $tablestring .= "<input type='hidden' name='arp_row_border_type' id='arp_row_border_type' value='" . $column_settings['arp_row_border_type'] . "' />";

        $tablestring .= "<dl id='arp_row_border_type' class='arp_selectbox' data-id='arp_row_border_type' data-name='arp_row_border_type' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        if ($column_settings['arp_row_border_type']) {
            $selected_border_type = $column_settings['arp_row_border_type'];
        } else {
            $selected_border_type = __('Choose Option', ARP_PT_TXTDOMAIN);
        }
        $tablestring .= "<dt><span>" . $selected_border_type . "</span><input type='text' style='display:none;' value='" . $selected_border_type . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_row_border_type' data-id='arp_row_border_type'>";

        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='solid' data-label='solid'>Solid</li>";
        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='dotted' data-label='dotted'>Dotted</li>";
        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='dashed' data-label='dashed'>Dashed</li>";

        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        // border-type row level end \\
        // border-color starts        
        $tablestring .= "<div class='column_opt_opts'>";
        $tablestring .= "<div class='column_opt_label column_opt_sub_label two_cols'>" . __('Border Color', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";
        $column_settings['arp_row_border_color'] = isset($column_settings['arp_row_border_color']) ? $column_settings['arp_row_border_color'] : '';
        $tablestring .= "<div class='color_picker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_row_border_color)\",valueElement:arp_row_border_color_hidden}' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_row_border_color)' jscolor-valueelement='arp_row_border_color_hidden' data-id='arp_row_border_color_hidden' id='arp_row_border_color' style='background:" . $column_settings['arp_row_border_color'] . ";' data-color='" . $column_settings['arp_row_border_color'] . "' data-column-id='arp_row_border_color'>";
        $tablestring .= "<input type='hidden' id='arp_row_border_color_hidden' data-column-id='arp_row_border_color' data-id='arp_row_border_color' name='arp_row_border_color' value='" . $column_settings['arp_row_border_color'] . "' />";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "</div>";
        // border-color ends

        $tablestring .= "</div>";
        // end row level border
        //
              /* Button Customization */

        $style = '';
        if ($reference_template == 'arptemplate_20' || $reference_template == 'arptemplate_5' || $reference_template == 'arptemplate_25' || $reference_template == 'arptemplate_26' || $reference_template == 'arptemplate_21') {
            $style = 'display:none';
        } else {
            $style = 'display:block';
        }

        $tablestring .= "<div class='column_content_light_row column_opt_row arp_no_border' style='" . $style . ";margin-bottom:15px;'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Button Style Options', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts' style='display:none;'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . __('Border Width', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols' >";

        if (isset($column_settings['global_button_border_width'])) {
            $arp_global_button_border_width = $column_settings['global_button_border_width'];
        } else {
            $arp_global_button_border_width = 0;
        }

        $tablestring .= "<input type='hidden' name='arp_global_button_border_width' id='arp_global_button_border_width' value='" . $arp_global_button_border_width . "' />";

        $tablestring .= "<dl id='arp_global_button_border_width' class='arp_selectbox' data-id='arp_global_button_border_width' data-name='arp_global_button_border_width' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        $tablestring .= "<dt><span>" . $arp_global_button_border_width . "</span><input type='text' style='display:none;' value='" . $arp_global_button_border_width . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_global_button_border_width' data-id='arp_global_button_border_width'>";

        for ($i = 0; $i <= 10; $i++) {
            $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $i . "'>" . $i . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $border_style = array('solid', 'dotted', 'dashed');
        $tablestring .= "<div class='column_opt_opts' style='display:none;'>";
        if (isset($column_settings['global_button_border_type'])) {
            $arp_global_button_border_style = $column_settings['global_button_border_type'];
        } else {
            $arp_global_button_border_style = __('solid', ARP_PT_TXTDOMAIN);
        }

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . __('Border Style', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols' >";

        $tablestring .= "<input type='hidden' name='arp_global_button_border_style' id='arp_global_button_border_style' value='" . $arp_global_button_border_style . "' />";

        $tablestring .= "<dl id='arp_global_button_border_style' class='arp_selectbox' data-id='arp_global_button_border_style' data-name='arp_global_button_border_style' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        $tablestring .= "<dt><span>" . $arp_global_button_border_style . "</span><input type='text' style='display:none;' value='" . $arp_global_button_border_style . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_global_button_border_style' data-id='arp_global_button_border_style'>";

        foreach ($border_style as $i) {
            $tablestring .= "<li style='margin:0px' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $i . "'>" . $i . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        if (isset($column_settings['global_button_border_color']) && $column_settings['global_button_border_color']) {
            $arp_global_button_border_color = $column_settings['global_button_border_color'];
        } else {
            $arp_global_button_border_color = '#c9c9c9';
        }

        $tablestring .= "<div class='column_opt_opts' style='height: 50px;display:none;'>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . __('Border Color', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols' style='margin-top:10px;'>";

        $tablestring .= "<div class='color_picker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_global_button_border_color)\",valueElement:arp_global_button_border_color_hidden}' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_global_button_border_color)' jscolor-valueelement='arp_global_button_border_color_hidden' data-id='arp_global_button_border_color_hidden' data-column-id='arp_global_button_border_color' id='arp_global_button_border_color' style='background:" . $arp_global_button_border_color . ";' data-color='" . $arp_global_button_border_color . "' >";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<input type='hidden' id='arp_global_button_border_color_hidden' name='arp_global_button_border_color' value='" . $arp_global_button_border_color . "' />";

        $tablestring .= "</div>";


        $arp_global_button_border_type = isset($column_settings['arp_global_button_type']) ? $column_settings['arp_global_button_type'] : 'flat';
        if ($reference_template == 'arptemplate_5' || $reference_template == 'arptemplate_25') {
            $button_button_type = 'display : none;';
        } else {
            $button_button_type = 'display : block;';
        }

        $button_type = $arprice_default_settings->arp_button_type();
        unset($button_type['none']);
        $tablestring .= "<div class='column_opt_opts' style='" . $button_button_type . "'>";
        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols' >" . __('Button Type', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_opts two_cols' >";
        $tablestring .= "<input type='hidden' name='arp_global_button_type' id='arp_global_button_border_type' value='" . $arp_global_button_border_type . "' />";

        $tablestring .= "<dl id='arp_global_button_border_type' class='arp_selectbox' data-id='arp_global_button_border_type' data-name='arp_global_button_border_type' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        $tablestring .= "<dt><span>" . @$button_type[$arp_global_button_border_type]['name'] . "</span><input type='text' style='display:none;' value='" . @$button_type[$arp_global_button_border_type]['name'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_global_button_border_type' data-id='arp_global_button_border_type'>";

        foreach ($button_type as $i => $value) {
            $tablestring .= "<li style='margin:0px' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $value['name'] . "'>" . $value['name'] . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts' style=''>";

        $tablestring .= "<div class='column_opt_label column_opt_sub_label  two_cols'>" . __('Border Radius', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        if (isset($column_settings['global_button_border_radius_top_left']) && $column_settings['global_button_border_radius_top_left'] != '') {
            $global_button_border_radius_top_left = $column_settings['global_button_border_radius_top_left'];
        } else {
            $global_button_border_radius_top_left = 0;
        }

        if (isset($column_settings['global_button_border_radius_top_right']) && $column_settings['global_button_border_radius_top_right'] != '') {
            $global_button_border_radius_top_right = $column_settings['global_button_border_radius_top_right'];
        } else {
            $global_button_border_radius_top_right = 0;
        }
        if (isset($column_settings['global_button_border_radius_bottom_left']) && $column_settings['global_button_border_radius_bottom_left'] != '') {
            $global_button_border_radius_bottom_left = $column_settings['global_button_border_radius_bottom_left'];
        } else {
            $global_button_border_radius_bottom_left = 0;
        }
        if (isset($column_settings['global_button_border_radius_bottom_right']) && $column_settings['global_button_border_radius_bottom_right'] != '') {
            $global_button_border_radius_bottom_right = $column_settings['global_button_border_radius_bottom_right'];
        } else {
            $global_button_border_radius_bottom_right = 0;
        }

        $tablestring .= "<div class='column_opt_opts two_cols'>";


        $tablestring .= "<div class='arp_button_radius_main'>";

        $tablestring .= "<div>";
        $tablestring .= "<span>Left</span>";
        $tablestring .= "<input type='text' id='global_button_border_radius_top_left' value='$global_button_border_radius_top_left' class='arp_tab_txt arp_tab_column_radius_txt' name='global_button_border_radius_top_left' onBlur=\"arp_update_button_border_radius(this.value,jQuery('#global_button_border_radius_top_right').val(),jQuery('#global_button_border_radius_bottom_right').val(), jQuery('#global_button_border_radius_bottom_left').val())\" />";
        $tablestring .= "</div>";

        $tablestring .= "<div>";
        $tablestring .= "<span>Right</span>";
        $tablestring .= "<input type='text' id='global_button_border_radius_top_right' value='$global_button_border_radius_top_right' class='arp_tab_txt arp_tab_column_radius_txt' name='global_button_border_radius_top_right' onBlur=\"arp_update_button_border_radius(jQuery('#global_button_border_radius_top_left').val(),this.value,jQuery('#global_button_border_radius_bottom_right').val(), jQuery('#global_button_border_radius_bottom_left').val())\" />";
        $tablestring .= "</div>";


        $tablestring .= "<div>";
        $tablestring .= "<span>Left</span>";
        $tablestring .= "<input type='text' id='global_button_border_radius_bottom_left' value='$global_button_border_radius_bottom_left' class='arp_tab_txt arp_tab_column_radius_txt' name='global_button_border_radius_bottom_left' onBlur=\"arp_update_button_border_radius(jQuery('#global_button_border_radius_top_left').val(), jQuery('#global_button_border_radius_top_right').val(), jQuery('#global_button_border_radius_bottom_right').val(), this.value)\" />";
        $tablestring .= "</div>";

        $tablestring .= "<div>";
        $tablestring .= "<span>Right</span>";
        $tablestring .= "<input type='text' id='global_button_border_radius_bottom_right' value='$global_button_border_radius_bottom_right' class='arp_tab_txt arp_tab_column_radius_txt' name='global_button_border_radius_bottom_right' onBlur=\"arp_update_button_border_radius(jQuery('#global_button_border_radius_top_left').val(), jQuery('#global_button_border_radius_top_right').val(), this.value, jQuery('#global_button_border_radius_bottom_left').val())\" />";
        $tablestring .= "</div>";

        $tablestring .= "</div>";


//        $tablestring .= "<div class='arp_column_radius_main'>";
        $tablestring .= "<div class='arp_button_radius_main'>";
        $tablestring .= "<div class='arp_column_radius_bottom'>";
        $tablestring .= "<span>Top</span>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='arp_column_radius_bottom'>";
        $tablestring .= "<span>Bottom</span>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_label_help' style='" . $button_button_type . "' >(" . __('You can see button hover effect at front end.', ARP_PT_TXTDOMAIN) . ")</div>";
        $tablestring .= "</div>";


        /* Button Customization */

//=================================================
//=================================================



        $tablestring .= "</div>";

        $tablestring .= "</div>";

        /* Column Options End */

        /* Column Effects Start */

        $tablestring .= "<div class='general_animation_tab enable global_opts' id='column_effects' >";

        $tablestring .= "<div class='animation_dropdown'>";

        $tablestring .= "<div class='arprice_option_belt_title'>" . __("Effects", ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_option_animation_dropdown' id='column_option_animation_dropdown'>";

        $tablestring .= "<div class='column_content_light_row column_opt_row'>";

        $tablestring .= "<div class='column_opt_label two_cols' style='padding-left : 0px !important;'>" . __('Hover Effects', ARP_PT_TXTDOMAIN);


        $tablestring .= "</div>";
        $tablestring .= "</div>";

        //disable hover effect

        $tablestring .= "<div class='column_content_light_row column_opt_row arp_allow_animation'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Disable Hover Effect', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";


        $column_settings['disable_hover_effect'] = isset($column_settings['disable_hover_effect']) ? $column_settings['disable_hover_effect'] : "";
//        $tablestring .= "<input type='checkbox' name='disable_hover_effect' id='disable_hover_effect' class='arp_switch_toogle' value='1' " . checked($column_settings['disable_hover_effect'], 1, false) . " />";
        $tablestring .= "<input type='checkbox' name='disable_hover_effect' id='disable_hover_effect' class='arp_switch arp_disable_hover_effect_switch' value='1'  " . checked($column_settings['disable_hover_effect'], 1, false) . " />";

        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_label_help'>(" . __('Active column effects and hover color changes will be disabled.', ARP_PT_TXTDOMAIN) . ")</div>";
        $tablestring .= "</div>";

//disable hover effect
        $tablestring .= "<div class='column_content_light_row column_opt_row arp_allow_animation' style='$button_button_type'>";

        $tablestring .= "<div class='column_opt_label  two_cols '>" . __('Disable Button Hover Effect', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right' >";
        $tablestring .= "<input type='checkbox' name='disable_button_hover_effect' id='disable_button_hover_effect' value='1' " . checked(@$column_settings['disable_button_hover_effect'], 1, false) . " class='arp_switch light_bg' />";
        $tablestring .= "</div>";


        $tablestring .= "</div>";

        $tablestring .= "<div class='column_content_light_row column_opt_row arp_allow_animation'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Active Column', ARP_PT_TXTDOMAIN);


        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        $tablestring .= "<div class='column_hover_effect'>";

        $tablestring .= "<input type='hidden' id='column_high_on_hover' name='column_high_on_hover' value='" . $column_settings['column_highlight_on_hover'] . "' >";
        $temp_class = '';
        if ($column_settings['disable_hover_effect'] == 1) {
            $temp_class = 'arp_disabled';
        }

        $tablestring .= "<dl class='arp_selectbox $temp_class' id='column_high_on_hover_dd' data-name='column_high_on_hover' data-id='column_high_on_hover' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        if (isset($arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$column_settings['column_highlight_on_hover']]) && $arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$column_settings['column_highlight_on_hover']] != '') {
            $arp_selectbox_placeholder = $column_settings['column_highlight_on_hover'];
            $arp_selectbox_placeholder = $arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$arp_selectbox_placeholder];
        } else {
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);
        }

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . @$arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$column_settings['column_highlight_on_hover']] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $tablestring .= "<ul data-id='column_high_on_hover' class='arp_active_column'>";
        
        $template_no_hover_effect = array('arptemplate_25');
        
        foreach ($arp_mainoptionsarr['general_options']['highlightcolumnonhover'] as $j => $hover_effect) {

            if ( ($is_animated == 1 || in_array($reference_template,$template_no_hover_effect) ) && $hover_effect == 'Hover Effect') {
                
            } else {
                if ($hover_effect == 'Shadow effect') {
                    if ($reference_template != 'arptemplate_23') {
                        if ($column_settings['column_box_shadow_effect'] == 'shadow_style_none' || $column_settings['column_box_shadow_effect'] == '') {
                            $tablestring .= "<li class='arp_selectbox_option arp_shadow_effect' data-value='" . $j . "' data-label='" . $hover_effect . "'>" . $hover_effect . "</li>";
                        } else {
                            $tablestring .= "<li id='arp_shadow_effect' class='arp_selectbox_option arp_shadow_effect arp_shadow_effect_disabled' data-value='" . $j . "' data-label='" . $hover_effect . "'>" . $hover_effect . "</li>";
                        }
                    }
                } else {
                    $tablestring .= "<li class='arp_selectbox_option' data-value='" . $j . "' data-label='" . $hover_effect . "'>" . $hover_effect . "</li>";
                }
            }
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_label_help'>(" . __('Effect will be shown in preview and frontend only.', ARP_PT_TXTDOMAIN) . ")</div>";

        $tablestring .= "</div>";


        // Column Shadow \\

        if (in_array(1, $caption_col))
            $cls = 'column_content_light_row';
        else
            $cls = 'column_content_dark_row';


        if (isset($template_settings['features']['is_animated']) && $template_settings['features']['is_animated'] == 0 && $ref_template != 'arptemplate_23' && $ref_template != 'arptemplate_21') {

//        $arp_selectbox_disabled_class = ($arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$column_settings['column_highlight_on_hover']] == 'Shadow effect') ? 'arp_selectbox_disabled' : '';

            if (@$arp_mainoptionsarr['general_options']['highlightcolumnonhover'][$column_settings['column_highlight_on_hover']] == 'Shadow effect') {
                $arp_selectbox_disabled = "disabled='disabled'";
                $arp_selectbox_disabled_class = 'arp_selectbox_disabled';
            } else {
                $arp_selectbox_disabled = '';
                $arp_selectbox_disabled_class = '';
            }

            $tablestring .= "<div id='column_box_shadow_effect' class='$cls column_opt_row'>";

            $tablestring .= "<div class='column_opt_label  two_cols'>" . __('Column Shadow', ARP_PT_TXTDOMAIN);


            $tablestring .= "</div>";

            $tablestring .= "<div id='column_box_shadow_options' class='column_opt_opts two_cols'>";

            if ($column_settings['column_box_shadow_effect'] != '') {
                $column_box_shadow_effect = $column_settings['column_box_shadow_effect'];
            } else {
                $column_box_shadow_effect = 'shadow_style_none';
            }

            $tablestring .= "<input type='hidden' name='column_box_shadow_effect' class='arp_box_shadow_change' id='column_box_shadow_effect' value='" . $column_box_shadow_effect . "' />";


            if ($column_settings['column_box_shadow_effect'] == 'shadow_style_1') {
                $shadow_span_text = 'Style 1';
            } else if ($column_settings['column_box_shadow_effect'] == 'shadow_style_2') {
                $shadow_span_text = 'Style 2';
            } else if ($column_settings['column_box_shadow_effect'] == 'shadow_style_3') {
                $shadow_span_text = 'Style 3';
            } else if ($column_settings['column_box_shadow_effect'] == 'shadow_style_4') {
                $shadow_span_text = 'Style 4';
            } else if ($column_settings['column_box_shadow_effect'] == 'shadow_style_5') {
                $shadow_span_text = 'Style 5';
            } else {
                $shadow_span_text = 'None';
            }

            $tablestring .= '<dl name="column_box_shadow_effect" style="width:141px;margin-top:18px;margin-right:15px;float:right;" id="column_box_shadow_effect" class="arp_selectbox">'
                    . '<dt id="column_box_shadow_dt" class="' . $arp_selectbox_disabled_class . '" ' . $arp_selectbox_disabled . ' ><span>' . $shadow_span_text . '</span><input type="text" class="arp_autocomplete" value="None" style="display:none;"><i class="fa fa-caret-down fa-lg"></i></dt>'
                    . '<dd><ul data-id="column_box_shadow_effect" class="column_box_shadow_effect" id="column_box_shadow_effect1">';

            foreach ($arp_mainoptionsarr['general_options']['column_box_shadow_effect'] as $key => $column_box_shadow_effect) {

                $tablestring .= '<li data-label="' . $column_box_shadow_effect . '" data-value="' . $key . '" class="arp_selectbox_option" style="margin:0">' . $column_box_shadow_effect . '</li>';
            }

            $tablestring .= '</ul>'
                    . '</dd>'
                    . '</dl>';

            $tablestring .= "</div>";

            $tablestring .= "<div class='column_opt_label_help' style='margin: -2px 0 0;'>(" . __('Column shadow will not apply with column border radius and Active Column Shadow Effect.', ARP_PT_TXTDOMAIN) . ")</div>";

            $tablestring .= '</div>';
        }

        // Column Shadow End \\

        $toggle_column_animation_style = '';
        if ($reference_template == 'arptemplate_25' || $reference_template == 'arptemplate_26') {
            $toggle_column_animation_style = 'display:none;';
        }

        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $toggle_column_animation_style . "'>";

        $tablestring .= "<div class='column_opt_label two_cols' style='padding-left : 0px !important;'>" . __('Toggle Button', ARP_PT_TXTDOMAIN);


        $tablestring .= "</div>";
        $tablestring .= "</div>";


        $tablestring .= "<div class='column_content_dark_row column_opt_row arp_allow_animation' style='" . $toggle_column_animation_style . "'>";


        $tablestring .= "<div class='column_opt_label two_cols' style='line-height:1.5;'>" . __('Price(Number) Spin Effect On <br>Toggle', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";
        $column_settings['toggle_column_animation'] = isset($column_settings['toggle_column_animation']) ? $column_settings['toggle_column_animation'] : '';
        $temp_style = '';
        $temp_class = '';
        if ($general_settings['enable_toggle_price'] != 1) {
            $temp_style = 'disabled=disabled;';
            $temp_class = 'arp_disabled';
        }

        $tablestring .= "<input type='checkbox' name='toggle_column_animation' id='toggle_column_animation' class='arp_checkbox light_bg $temp_class' value='1' " . checked($column_settings['toggle_column_animation'], 1, false) . " $temp_style />";

        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_label_help'>(" . __('Wrap your pricing number with class <b>.arp_price_amount</b> with span tag. It will animate numbers of pricing while toggle.', ARP_PT_TXTDOMAIN) . ")</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Column Rotation', ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        $animation_option_disable = '';
        if ($column_animation['is_animation'] == 'yes') {
            $checked = "checked='checked'";
            $arp_selectbox_placeholder = 'arp_switch_on';
            $arp_check_box_disable = '';
        } else {
            $checked = '';
            $arp_selectbox_placeholder = 'arp_switch_off';
            $animation_option_disable = 'arp_disabled';
            $arp_check_box_disable = 'disabled="disabled"';
        }
        $tablestring .= "<input type='checkbox' " . $checked . " class='light_bg arp_switch arp_column_rotation_switch " . $arp_selectbox_placeholder . "' name='is_animation' id='is_animation' value='yes' />";



        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_label_help'>(" . __('Rotation effect will be shown in preview and frontend only.', ARP_PT_TXTDOMAIN) . ")</div>";

        $tablestring .= "</div>";



        $tablestring .= "<div class='column_content_light_row column_opt_row arp_allow_animation'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Visible Columns', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols' style=''>";

        $vcols_readonly = '';

        if ($column_animation['is_animation'] == 'yes')
            $vcols_readonly = '';
        else
            $vcols_readonly = 'readonly="readonly"';

        $tablestring .= "<input type='text' " . $vcols_readonly . " name='visible_columns' class='arp_tab_txt' value='" . $column_animation['visible_column'] . "' id='visible_columns' />";

        $tablestring .= "</div>";

        $tablestring .= "</div>";



        $tablestring .= "<div class='column_content_dark_row column_opt_row arp_allow_animation'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Column to scroll', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";
        $scols_readonly = '';
        if ($column_animation['is_animation'] == 'yes')
            $scols_readonly = '';
        else
            $scols_readonly = 'readonly="readonly"';
        $tablestring .= "<input type='text' " . $scols_readonly . " name='column_to_scroll' class='arp_tab_txt' value='" . $column_animation['scrolling_columns'] . "' id='column_to_scroll' />";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_content_light_row column_opt_row arp_allow_animation'>";

        $tablestring .= "<div class='column_opt_label two_cols arp_fix_height'>" . __('Transition Speed', ARP_PT_TXTDOMAIN);

        $tablestring .= "<div class='column_opt_label_help'>(" . __('Millisecond', ARP_PT_TXTDOMAIN) . ")</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";
        $anim_speed = '';
        if ($column_animation['is_animation'] == 'yes')
            $anim_speed = '';
        else
            $anim_speed = 'readonly="readonly"';
        $tablestring .= "<input type='text' " . $anim_speed . " name='slide_transition_speed' class='arp_tab_txt' value='" . $column_animation['transition_speed'] . "' id='slide_transition_speed' />";

        $tablestring .= "</div>";

        $tablestring .= "</div>";



        $tablestring .= "<div class='column_content_dark_row column_opt_row arp_allow_animation'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Autoplay', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        if ($column_animation['autoplay'] == 1)
            $checked = "checked='checked'";
        else
            $checked = '';

        $tablestring .= "<input type='checkbox' name='is_autoplay' class='arp_checkbox light_bg $animation_option_disable' id='is_autoplay' value='1' " . $checked . " " . $arp_check_box_disable . " />";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        if (in_array(1, $caption_col))
            $sticky = 'display:block;';
        else
            $sticky = 'display:none;';

        $tablestring .= "<div class='column_content_light_row column_opt_row arp_allow_animation' style='{$sticky};'>";

        $tablestring .= "<div class='column_opt_label two_cols'>";
        $tablestring .= __('Sticky Caption Column', ARP_PT_TXTDOMAIN);
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        if (@$column_animation['sticky_caption'] == 1)
            $ch_sticky = "checked='checked'";
        else
            $ch_sticky = '';

        $tablestring .= "<input type='checkbox' name='sticky_caption' class='arp_checkbox light_bg $animation_option_disable' id='sticky_column' value='1' " . $ch_sticky . " " . $arp_check_box_disable . " />";

        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_label_help' >(" . __('This will apply only in desktop and tablet.', ARP_PT_TXTDOMAIN) . ")</div>";

        $tablestring .= "</div>";



        // Navigation \\
        if (in_array(1, $caption_col))
            $cls = 'column_content_dark_row';
        else
            $cls = 'column_content_light_row';

        $tablestring .= "<div class='{$cls} column_opt_row arp_allow_animation'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Navigation Button', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        $default = $column_animation['navi_nav_btn'];

        //$option = $arp_mainoptionsarr['general_options']['column_animation']['navi_nav_btns'][$default];

		$option = isset($arp_mainoptionsarr['general_options']['column_animation']['pagi_nav_btns'][$default]) ? $arp_mainoptionsarr['general_options']['column_animation']['pagi_nav_btns'][$default] : 'On';

        $tablestring .= "<div class='column_animation_easing_effect'>";

        $tablestring .= "<input type='hidden' name='navigation_buttons' id='navigation_buttons' value='" . $default . "' />";

        $tablestring .= "<dl class='arp_selectbox $animation_option_disable' id='navi_nav_btns' data-name='navi_nav_btns' data-id='navigation_buttons' style='width:95px;margin-top:18px;margin-right:15px;float:right;'>";

        $tablestring .= "<dt><span style='width:89%;float:left;'>" . $option . "</span><input type='text' value='" . $option . "' style='display:none;' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";

        $tablestring .= '<dd>';

        $tablestring .= "<ul class='arp_column_pagination_navigation' data-id='navigation_buttons' style='max-height:80px;'>";


        foreach ($arp_mainoptionsarr['general_options']['column_animation']['navi_nav_btns'] as $x => $btns) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $x . "' data-label='" . $btns . "' >" . $btns . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        // Navigation End \\
        // Pagination \\
        if (in_array(1, $caption_col))
            $cls = 'column_content_dark_row';
        else
            $cls = 'column_content_light_row';

        $tablestring .= "<div class='{$cls} column_opt_row arp_allow_animation'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Pagination Button', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        $default = $column_animation['pagi_nav_btn'];

        $option = isset($arp_mainoptionsarr['general_options']['column_animation']['pagi_nav_btns'][$default]) ? $arp_mainoptionsarr['general_options']['column_animation']['pagi_nav_btns'][$default] : 'pagination_top';

        $tablestring .= "<div class='column_animation_easing_effect'>";

        $tablestring .= "<input type='hidden' name='pagination_navigation_buttons' id='pagination_navigation_buttons' value='" . $default . "' />";

        $tablestring .= "<dl class='arp_selectbox $animation_option_disable' id='pagi_nav_btns' data-name='pagi_nav_btns' data-id='pagination_navigation_buttons' style='width:95px;margin-top:18px;margin-right:15px;float:right;'>";

        $tablestring .= "<dt><span style='width:89%;float:left;'>" . $option . "</span><input type='text' value='" . $option . "' style='display:none;' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";

        $tablestring .= '<dd>';

        $tablestring .= "<ul class='arp_column_pagination_navigation' data-id='pagination_navigation_buttons' style='max-height:80px;'>";

        foreach ($arp_mainoptionsarr['general_options']['column_animation']['pagi_nav_btns'] as $x => $btns) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $x . "' data-label='" . $btns . "' >" . $btns . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        // Pagination End \\










        if (in_array(1, $caption_col))
            $cls = 'column_content_light_row';
        else
            $cls = 'column_content_dark_row';

        $tablestring .= "<div class='{$cls} column_opt_row arp_no_border arp_allow_animation'>";

        $navigation_effect = array();
        $navigation_effect = array_merge($arp_mainoptionsarr['general_options']['column_animation']['easing_effect'], $arp_mainoptionsarr['general_options']['column_animation']['sliding_effect']);

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Navigation effect', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        $tablestring .= "<div class='column_animation_sliding_effect'>";

        $tablestring .= "<input type='hidden' id='sliding_effect' name='sliding_effect' value='" . $column_animation['sliding_effect'] . "' />";

        $tablestring .= "<dl class='arp_selectbox $animation_option_disable' id='sliding_effect_dd' data-name='sliding_effect' data-id='sliding_effect' style='width:95px;margin-top:18px;margin-right:15px;float:right;'>";

        if ($column_animation['sliding_effect'])
            $arp_selectbox_placeholder = $column_animation['sliding_effect'];
        elseif ($column_animation['easing_effect'])
            $arp_selectbox_placeholder = $column_animation['easing_effect'];
        else
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $column_animation['sliding_effect'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_column_sliding_effect' data-id='sliding_effect' style='max-height:80px;'>";
        foreach ($navigation_effect as $effect) {
            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $effect . "' data-label='" . $effect . "'>" . $effect . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        //

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        /* Column Effects End */

        /* Column Tooltip Start */

        $tablestring .= "<div class='general_tooltip_tab enable global_opts' id='tootip_options' >";

        $tablestring .= "<div class='tooltip_dropdown'>";

        $tablestring .= "<div class='arprice_option_belt_title'>" . __('Tooltip', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_option_tooltip_dropdown' id='column_option_tooltip_dropdown'>";





        $tablestring .= "<div class='column_content_light_row column_opt_row'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Color', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";


        $tablestring .= "<div style='float:left; width:50%;'>";
        $tablestring .= "<div class='color_picker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,tooltip_bgcolor_div)\",valueElement:tooltip_bgcolor_hidden}' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,tooltip_bgcolor_div)' jscolor-valueelement='tooltip_bgcolor_hidden' data-id='tooltip_bgcolor_hidden' id='tooltip_bgcolor_div' style='background:" . $tooltip_settings['background_color'] . ";' data-color='" . $tooltip_settings['background_color'] . "' >";
        $tablestring .= "</div>";
        $tablestring .= "<span style='float:left; text-align:center; width:100%;'>" . __('Background', ARP_PT_TXTDOMAIN) . "</span>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='float:left; width:50%;'>";
        //$tablestring .= "<div class='color_picker color_picker_round' data-id='tooltip_bgcolor' id='tooltip_bgcolor_div' style='background:" . $tooltip_settings['background_color'] . ";' data-color='" . $tooltip_settings['background_color'] . "' >";
        $tablestring .= "<div class='color_picker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,tooltip_txtcolor_div)\",valueElement:tooltip_txtcolor_hidden}' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,tooltip_txtcolor_div)' jscolor-valueelement='tooltip_txtcolor_hidden' data-id='tooltip_txtcolor_hidden' id='tooltip_txtcolor_div' style='background:" . $tooltip_settings['text_color'] . ";' data-color='" . $tooltip_settings['text_color'] . "' >";
        $tablestring .= "</div>";
        $tablestring .= "<span style='float:left; text-align:center; width:100%;'>" . __('Text', ARP_PT_TXTDOMAIN) . "</span>";
        $tablestring .= "</div>";

        $tablestring .= "<input type='hidden' id='tooltip_bgcolor_hidden' name='tooltip_bgcolor' value='" . $tooltip_settings['background_color'] . "' />";
        $tablestring .= "<input type='hidden' id='tooltip_txtcolor_hidden' name='tooltip_txtcolor' value='" . $tooltip_settings['text_color'] . "' />";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        // Display Style \\
        $tablestring .= "<div class='column_content_light_row column_opt_row' >";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Display Style', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        $tablestring .= "<input type='hidden' id='tooltip_style' name='tooltip_style' value='" . $tooltip_settings['style'] . "' />";

        $tablestring .= "<dl class='arp_selectbox' id='tooltip_style_dd' data-name='tooltip_style' data-id='tooltip_style' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        if ($tooltip_settings['style'])
            $arp_selectbox_placeholder = $tooltip_settings['style'];
        else
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $tooltip_settings['style'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $tablestring .= "<ul data-id='tooltip_style'>";

        foreach ($arp_mainoptionsarr['general_options']['tooltipsetting']['style'] as $tooltip_style) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $tooltip_style . "' data-label='" . $tooltip_style . "'>" . $tooltip_style . "</li>";
        }
        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        // Display Style End\\
        // Tooltip Display Style \\

        if ($tooltip_settings['tooltip_display_style']) {
            $arp_tooltip_display_style = $tooltip_settings['tooltip_display_style'];
        } else {
            $arp_tooltip_display_style = $arp_mainoptionsarr['general_options']['tooltipsetting']['tooltip_display_style'][0];
        }

        $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

        $tablestring .= "<div class='column_opt_label two_cols'>";

        $tablestring .= __("Show Info Icon", ARP_PT_TXTDOMAIN);

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        //  default informative

        $tablestring .= "<input type='hidden' id='tooltip_display_style' name='tooltip_display_style' value='" . $arp_tooltip_display_style . "'  />";

        $tablestring .= "<input type='checkbox' name='show_info_icon' id='arp_show_info_icon' class='arp_checkbox light_bg' value='1' " . checked($arp_tooltip_display_style, 'informative', false) . " />";


        $tablestring .= "</div>";

        $tablestring .= "</div>";

        // Tooltip Display Style End \\
        // Tooltip Icon \\

        if ($tooltip_settings['tooltip_informative_icon'])
            $arp_selectbox_placeholder = $tooltip_settings['tooltip_informative_icon'];
        else
            $arp_selectbox_placeholder = $arp_mainoptionsarr['general_options']['tooltipsetting']['informative_tootip_icon'][0];


        $arp_tooltip_icon_display = ($arp_tooltip_display_style == 'informative') ? 'style="display:block";' : 'style="display:none";';

        $tablestring .= "<div class='column_content_light_row column_opt_row' id='arp_tooltip_icon_main' {$arp_tooltip_icon_display}>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Tooltip Icon', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        $tablestring .="<div class='arp_informative_tooltip_icon'>";

        $tablestring .= '<textarea style="display:none" id="tooltip_informative_icon" name="tooltip_informative_icon">' . $arp_selectbox_placeholder . '</textarea>';

        $tablestring .= "<span class='arp_informative_tooltip_icon_display'>" . $arp_selectbox_placeholder . "</span>";

        $tablestring .="</div>";

        $tablestring .= "<button id='arp_informative_tooltip_fontawesome'  type='button' class='arp_informative_tooltip_fontawesome col_opt_btn align_right' data-insert='tooltip_informative_icon' >";

        $tablestring .="<img src='" . PRICINGTABLE_URL . "/images/icons/font-awesome-icon_white.png' >";

        $tablestring .= "</button>";

        $tablestring .= "<div class='arp_tooltip_icons_container'>";
        $tablestring .= "<div class='arp_tooltip_icons_container_arrow left_position'></div>";
        $tablestring .= "<div class='arp_tooltip_icon_list'>";

        $tablestring .= "<div id='fa-exclamation' class='arp_fainsideimge add_informative_icon' title='Exclamation Icon 1'><i class='fa fa-exclamation'></i></div>";
        $tablestring .= "<div id='fa-exclamation-circle' class='arp_fainsideimge add_informative_icon' title='Exclamation Icon 2'><i class='fa fa-exclamation-circle'></i></div>";
        $tablestring .= "<div id='fa-exclamation-triangle' class='arp_fainsideimge add_informative_icon' title='Exclamation Icon 3'><i class='fa fa-exclamation-triangle'></i></div>";
        $tablestring .= "<div id='fa-info' class='arp_fainsideimge add_informative_icon' title='Exclamation Icon 4'><i class='fa fa-info'></i></div>";
        $tablestring .= "<div id='fa-info-circle' class='arp_fainsideimge add_informative_icon' title='Exclamation Icon 5'><i class='fa fa-info-circle'></i></div>";
        $tablestring .= "<div id='fa-info-circle' class='arp_fainsideimge add_informative_icon' title='Exclamation Icon 6'><i class='fa fa-question'></i></div>";
        $tablestring .= "<div id='fa-question-circle' class='arp_fainsideimge add_informative_icon' title='Exclamation Icon 7'><i class='fa fa-question-circle'></i></div>";

        $tablestring .="</div>";

        $tablestring .="</div>";



//        $tablestirng .="</div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        // Tooltip Icon End\\
        // Icons Position \\
        $tooltip_settings['tooltip_icon_position'] = isset($tooltip_settings['tooltip_icon_position']) ? $tooltip_settings['tooltip_icon_position'] : 'float_to_content';
        $tablestring .= "<div class='column_content_dark_row column_opt_row' id='arp_tooltip_icon_position' $arp_tooltip_icon_display>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Icon Position', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";
        $tablestring .= "<input type='hidden' id='tooltip_icon_position' name='tooltip_icon_position' value='" . @$tooltip_settings['tooltip_icon_position'] . "'  />";
        //dl
        $tablestring .= "<dl class='arp_selectbox' data-name='tooltip_icon_position' data-id='tooltip_icon_position' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        if (isset($tooltip_settings['tooltip_icon_position'])) {
            $arp_selectbox_placeholder = $arp_mainoptionsarr['general_options']['tooltipsetting']['icon_position'][$tooltip_settings['tooltip_icon_position']];
        } else {
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);
        }
        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' value='" . $arp_selectbox_placeholder . "' style='display:none;' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        //dd

        $tablestring .= "<dd>";

        $tablestring .= "<ul data-id='tooltip_icon_position'>";

        foreach ($arp_mainoptionsarr['general_options']['tooltipsetting']['icon_position'] as $key => $tooltip_icon_position) {
            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $key . "' data-label='" . $tooltip_icon_position . "'>" . $tooltip_icon_position . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        // Icons Position End \\
        // Animation Effect \\
        $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Animation Effect', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";
        $tablestring .= "<input type='hidden' id='tooltip_animation_style' name='tooltip_animation_style' value='" . $tooltip_settings['animation'] . "'  />";
        //dl
        $tablestring .= "<dl class='arp_selectbox' data-name='tooltip_animation_style' data-id='tooltip_animation_style' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        if ($tooltip_settings['animation'])
            $arp_selectbox_placeholder = $tooltip_settings['animation'];
        else
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' value='" . $tooltip_settings['animation'] . "' style='display:none;' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        //dd

        $tablestring .= "<dd>";

        $tablestring .= "<ul data-id='tooltip_animation_style'>";

        foreach ($arp_mainoptionsarr['general_options']['tooltipsetting']['animation'] as $tooltip_animation) {
            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $tooltip_animation . "' data-label='" . $tooltip_animation . "'>" . $tooltip_animation . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        // Animation Effect End \\
        // Tooltip Width \\

        $tooltip_settings['tooltip_width'] = (!empty($tooltip_settings['tooltip_width'])) ? $tooltip_settings['tooltip_width'] : 0;

        $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Tooltip Width', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts  two_cols align_right'>";

        $tablestring .= "<div class='col_opt_input' style='margin:5px -5px 0 0;'>";

        $tablestring .= "<span class='arp_col_px' style='margin:-2px -17px 5px;'>px</span>";

        $tablestring .= "<input type='text' value='{$tooltip_settings['tooltip_width']}' class='arp_tab_txt' id='tooltip_width' name='tooltip_width'>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_label_help'>(" . __('width (0) zero value indicate auto width', ARP_PT_TXTDOMAIN) . ")</div>";

        $tablestring .= "</div>";

        // Tooltip Width End\\
        // Show On \\
        $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Show On', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        if ($tooltip_settings['tooltip_trigger_type'])
            $arp_selectbox_placeholder = $tooltip_settings['tooltip_trigger_type'];
        else
            $arp_selectbox_placeholder = $arp_mainoptionsarr['general_options']['tooltipsetting']['trigger_on'][0];

        $tablestring .= "<input type='hidden' id='tooltip_trigger_type' name='tooltip_trigger_type' value='" . $arp_selectbox_placeholder . "' />";

        $tablestring .= "<dl class='arp_selectbox' id='tooltip_trigger_type_dd' data-name='tooltip_trigger_type' data-id='tooltip_trigger_type' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $tooltip_settings['tooltip_trigger_type'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $tablestring .= "<ul data-id='tooltip_trigger_type'>";

        foreach ($arp_mainoptionsarr['general_options']['tooltipsetting']['trigger_on'] as $tooltip_trigger_type) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $tooltip_trigger_type . "' data-label='" . $tooltip_trigger_type . "'>" . $tooltip_trigger_type . "</li>";
        }
        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        // Show On End \\



        $tablestring .= "<div class='column_content_light_row column_opt_row arp_no_border' >";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('Tooltip Position', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols'>";

        $tablestring .= "<input type='hidden' id='tooltip_position' name='tooltip_position' value='" . $tooltip_settings['position'] . "' />";

        $tablestring .= "<dl class='arp_selectbox' id='tooltip_postion_dd' data-name='tooltip_position' data-id='tooltip_position' style='width:141px;margin-top:18px;margin-right:15px;float:right;'>";

        if ($tooltip_settings['position'])
            $arp_selectbox_placeholder = $tooltip_settings['position'];
        else
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $tooltip_settings['position'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $tablestring .= "<ul data-id='tooltip_position'>";

        foreach ($arp_mainoptionsarr['general_options']['tooltipsetting']['position'] as $tltp_position) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $tltp_position . "' data-label='" . $tltp_position . "'>" . $tltp_position . "</li>";
        }
        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";


        $tablestring .= "</div>";

        $tablestring .= "</div>";


        /* Column Tooltip End */

        /* Custom CSS Start */

        $tablestring .= "<div class='general_custom_css_tab enable global_opts' id='custom_css_options' >";

        $tablestring .= "<div class='arprice_option_belt_title'>" . __('Custom CSS', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='custom_css_dropdown'>";

        $tablestring .= "<div class='column_opt_label_div two_column'>";

        $tablestring .= "<div class='column_opt_label_div'>" . __('Enter css class and style', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_content_light_row column_opt_row '>";

        $general_settings['arp_custom_css'] = isset($general_settings['arp_custom_css']) ? $general_settings['arp_custom_css'] : "";
        $tablestring .= "<div class='arp_custom_css_wrapper'>";
        $tablestring .= "<textarea class='arp_custom_css' name='arp_custom_css' id='arp_custom_css'>" . $general_settings['arp_custom_css'] . "</textarea>";
        $tablestring .= "</div>";

        $tablestring .= "<button id='arp_custom_css_btn' style='float:left; margin:12px 0 0 0;' class='col_opt_btn' type='button'>" . __('Apply To Editor', ARP_PT_TXTDOMAIN) . "</button>";

        $tablestring .= "<div style='float:left; margin:17px 0 0 5px;'><span style='font-weight:normal; margin-right:6px;'>(e.g.) .btn{color:#000000;}</span></div>";


        $tablestring .= "</div>";





        $tablestring .= "<div class='column_content_dark_row column_opt_row arp_no_border'>";

        $tablestring .= "<div class='column_opt_label two_cols'>" . __('CSS class info', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

        $tablestring .= "<input type='checkbox' id='css_debug_mode' value='1' class='css_debug_mode arp_switch' name='arp_css_debug_mode' />";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_label' style='box-sizing: border-box;float: left; width: 100%;white-space:pre-wrap;' >"
                . "<span class='column_opt_label_help' style='line-height:normal;margin:auto;'>" . __('When you turn ON CSS Class Info, You will get an extra button on each column. By clicking on that button, you will get all CSS class information for that particular column.', ARP_PT_TXTDOMAIN) . "</span>"
                . "</div>";

        $tablestring .= "<div class='column_opt_label' style='box-sizing:border-box;float:left;width:100%;white-space:pre-wrap;'>";
        $tablestring .= "<div class='column_opt_custom_css_notice' style='line-height:normal;'>";
        $tablestring .= "Note: " . __("Some custom CSS properties may not apply in editor. Please check table Preview for all custom CSS you have applied.", ARP_PT_TXTDOMAIN);
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";








        $tablestring .= "</div>";

        $tablestring .= "</div>";

        /* Custom CSS End */

        /* Toggle Price Start */

        $tablestring .= "<div class='general_toggle_options_tab enable global_opts' id='toggle_content_options' >";

        $tablestring .= "<div class='arprice_option_belt_title'>" . __('Toggle Price', ARP_PT_TXTDOMAIN) . "</div>";

        if ($setact == 1) {
            $tablestring .= "<div class='toggle_options_dropdown'>";

            if ($general_settings['enable_toggle_price'] == '') {
                $default_toggle_price = 0;
            } else {
                $default_toggle_price = $general_settings['enable_toggle_price'];
            }

            //

            $tablestring .= "<div class='column_content_light_row column_opt_row' >";

            $tablestring .= "<div class='column_opt_label two_cols'>" . __('Enable Toggle Price', ARP_PT_TXTDOMAIN) . "</div>";

            $tablestring .= "<div class='column_opt_opts two_cols align_right arp_toggle_price_main'>";

            $tablestring .= "<input type='checkbox' id='enable_toggle_price_id' value='1' class='enable_toggle_price_id arp_switch_toogle' name='enable_toggle_price' />";

            $tablestring .= "<input type='hidden' id='enable_toggle_price_hidden' name='enable_toggle_price_hidden' value='" . $default_toggle_price . "' /> ";

            $tablestring .= "</div>";

            $tablestring .= "</div>";

            if ($default_toggle_price == 0) {
                $toggle_copy_data_disabled = "disabled='disabled'";
            } else {
                $toggle_copy_data_disabled = "";
            }
            
            //Added For Copy Content In Toggle
            $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

            $tablestring .= "<div class='column_opt_label two_cols' style='line-height: 20px;'>" . __('Copy First Tab Data To Other Tabs', ARP_PT_TXTDOMAIN) . "</div>";

            $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

            $tablestring .= "<input type='checkbox' name='toggle_copy_data_to_other_step' id='toggle_copy_data_to_other_step' class='arp_checkbox light_bg' value='1' " . $toggle_copy_data_disabled . checked($general_settings['toggle_copy_data_to_other_step'], 1, false) . " />";

            $tablestring .= "</div>";

            $tablestring .= "</div>";
            //

            $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

            $tablestring .= "<div class='column_opt_label'>" . __('Toggle Button Style', ARP_PT_TXTDOMAIN) . "</div>";

            $tablestring .= "<div class='column_opt_opts'>";
            if ($general_option['general_settings']['arp_toggle_main'] == 0) {
                $toggle_button_check = "checked='checked'";
            } else if ($general_option['general_settings']['arp_toggle_main'] == 1) {
                $toggle_radio_check = "checked='checked'";
            } else {
                $toggle_button_check = "checked='checked'";
            }

            if ($default_toggle_price == 0) {
                $toggle_disabled = "disabled='disabled'";
                $toggle_readonly = "readonly='readonly'";
            } else {
                $toggle_disabled = "";
                $toggle_readonly = "'";
            }
            $toggle_button_check = isset($toggle_button_check) ? $toggle_button_check : '';
            $tablestring .= "<div class='column_opt_label column_opt_label_normal_style two_cols'><input " . $toggle_button_check . " type='radio' id='toggle_option_main_button' class='toggle_option_main' name='toggle_option_main' value='0' style='margin:0;' $toggle_disabled /> <label for='toggle_option_main_button'> " . __('Switch Style', ARP_PT_TXTDOMAIN) . " </label> </div>";
            $toggle_radio_check = isset($toggle_radio_check) ? $toggle_radio_check : '';
            $tablestring .= "<div class='column_opt_label column_opt_label_normal_style two_cols'><input " . $toggle_radio_check . " type='radio' id='toggle_option_main_radio' class='toggle_option_main' name='toggle_option_main' value='1' style='margin:0;' $toggle_disabled /> <label for='toggle_option_main_radio'> " . __('Radio Style', ARP_PT_TXTDOMAIN) . " </label> </div>";

            if ($general_option['general_settings']['arp_toggle_main'] == '') {
                $default_arp_toggle_main = 0;
            } else {
                $default_arp_toggle_main = $general_option['general_settings']['arp_toggle_main'];
            }

            $tablestring .= '<input type="hidden" id="toggle_option_main_hidden" value="' . $default_arp_toggle_main . '" /> ';

            $tablestring .= "</div>";

            $tablestring .= "</div>";
            //

            $tablestring .= "<div class='column_content_light_row column_opt_row'>";

            $tablestring .= "<div class='column_opt_label'>" . __('Title (Optional)', ARP_PT_TXTDOMAIN) . "</div>";

            $tablestring .= "<div class='column_opt_opts' >";
            $general_settings['toggle_label_content'] = isset($general_settings['toggle_label_content']) ? @esc_html($general_settings['toggle_label_content']) : '';

            $tablestring .= "<input type='text' id='toggle_label_content' value='" . $general_settings['toggle_label_content'] . "' class='toggle_label_content_txt arp_tab_txt' name='toggle_label_content' style='float:left;width:100%;' $toggle_readonly />";

            $tablestring .= "</div>";

            $tablestring .= "</div>";

            //

            $tablestring .= "<div class='column_content_dark_row column_opt_row' >";

            $tablestring .= "<div class='column_opt_label'>" . __('Title Position', ARP_PT_TXTDOMAIN) . "</div>";

            $tablestring .= "<div class='column_opt_opts'>";

            if ($general_option['general_settings']['arp_label_position_main'] == 0) {
                $label_left_check = "checked='checked'";
            } else if ($general_option['general_settings']['arp_label_position_main'] == 1) {
                $label_top_check = "checked='checked'";
            } else if ($general_option['general_settings']['arp_label_position_main'] == 2) {
                $label_right_check = "checked='checked'";
            } else {
                $label_top_check = "checked='checked'";
            }
            $label_left_check = isset($label_left_check) ? $label_left_check : '';
            $tablestring .= "<div class='column_opt_label column_opt_label_normal_style' style='width: 33.33%;'><input " . $label_left_check . " type='radio' id='label_position_main_left' class='label_position_main' name='label_position_main' value='0' style='margin:0;' $toggle_disabled /> <label for='label_position_main_left'> " . __('Left', ARP_PT_TXTDOMAIN) . " </label> </div>";
            $label_right_check = isset($label_right_check) ? $label_right_check : '';
            $tablestring .= "<div class='column_opt_label column_opt_label_normal_style' style='width: 33.33%;'><input " . $label_right_check . " type='radio' id='label_position_main_right' class='label_position_main' name='label_position_main' value='2' style='margin:0;' $toggle_disabled /> <label for='label_position_main_right'> " . __('Right', ARP_PT_TXTDOMAIN) . " </label> </div>";
            $label_top_check = isset($label_top_check) ? $label_top_check : '';
            $tablestring .= "<div class='column_opt_label column_opt_label_normal_style' style='width: 33.33%;'><input " . $label_top_check . " type='radio' id='label_position_main_top' class='label_position_main' name='label_position_main' value='1' style='margin:0;' $toggle_disabled /> <label for='label_position_main_top'> " . __('Top', ARP_PT_TXTDOMAIN) . " </label> </div>";

            if ($general_option['general_settings']['arp_label_position_main'] == '') {
                $default_arp_label_position_main = 1;
            } else {
                $default_arp_label_position_main = $general_option['general_settings']['arp_label_position_main'];
            }

            $tablestring .= '<input type="hidden" id="label_position_main_hidden" value="' . $default_arp_label_position_main . '" /> ';

            $tablestring .= "</div>";

            $tablestring .= "</div>";

            //

            $tablestring .= "<div class='column_content_light_row column_opt_row' >";

            $tablestring .= "<div class='column_opt_label'>" . __('Toggle Steps', ARP_PT_TXTDOMAIN) . "</div>";

            $tablestring .= "<div class='column_opt_opts'>";
            if ($general_option['general_settings']['arp_step_main'] == 2) {
                $sec_check = "checked='checked'";
            } else if ($general_option['general_settings']['arp_step_main'] == 3) {
                $third_check = "checked='checked'";
            } else {
                $sec_check = "checked='checked'";
            }
            $sec_check = isset($sec_check) ? $sec_check : '';
            $tablestring .= "<div class='column_opt_label two_cols' style=''><input " . $sec_check . " type='radio' id='step_options_main_2' class='step_options_main' name='step_options_main' value='2' $toggle_disabled style='margin:0;' /> <label for='step_options_main_2'> " . __('2 Step', ARP_PT_TXTDOMAIN) . " </label> </div>";
            $third_check = isset($third_check) ? $third_check : '';
            $tablestring .= "<div class='column_opt_label two_cols' style=''><input " . $third_check . " type='radio' id='step_options_main_3' class='step_options_main' name='step_options_main' value='3' $toggle_disabled style='margin:0;' /> <label for='step_options_main_3'> " . __('3 Step', ARP_PT_TXTDOMAIN) . " </label> </div>";

            if ($general_option['general_settings']['arp_step_main'] == '') {
                $default_arp_step_main = 2;
            } else {
                $default_arp_step_main = $general_option['general_settings']['arp_step_main'];
            }

            $tablestring .= '<input type="hidden" id="step_options_main_hidden" value="' . $default_arp_step_main . '" /> ';

            $tablestring .= "</div>";

            $tablestring .= "</div>";

            //

            if ($general_option['general_settings']['setas_default_toggle'] == 0) {
                $setas_default_toggle_yearly = "checked='checked'";
            } else if ($general_option['general_settings']['setas_default_toggle'] == 1) {
                $setas_default_toggle_monthly = "checked='checked'";
            } else if ($general_option['general_settings']['setas_default_toggle'] == 2) {
                $setas_default_toggle_quarterly = "checked='checked'";
            } else {
                $setas_default_toggle_yearly = "checked='checked'";
            }
            $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

            $tablestring .= "<div class='column_opt_label'>" . __('Tabs Label', ARP_PT_TXTDOMAIN) . "</div>";

            $tablestring .= "<div class='column_opt_opts' style='margin:10px 0;'>";

            $tablestring .= "<div class='column_opt_opts' style='margin-top:5px;' >";

            $tablestring .= "<span class='tab_label_no'>1)</span>";

            $general_option['general_settings']['togglestep_yearly'] = $general_option['general_settings']['togglestep_yearly'] ? $general_option['general_settings']['togglestep_yearly'] : 'Yearly';

            $tablestring .= "<input style='width: 233px' type='text' id='togglestep_yearly' value='" . stripslashes_deep(esc_html($general_option['general_settings']['togglestep_yearly'])) . "' class='col_opt_input_object arp_tab_toggle_text togglestep_yearly' name='togglestep_yearly' $toggle_readonly />";

            $tablestring .= "<button type='button' class='col_opt_btn_icon add_toggle_fontawesome arptooltipster toggle_fontawesome_btn' name='add_toggle_fontawesome' id='add_toggle_fontawesome' data-insert='togglestep_yearly' data-column='togglestep_fontawesome_icons' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' style='float:left;margin-top:4px;' >";

            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";

            $tablestring .= "</button>";

            $tablestring .= "<div class='arp_font_awesome_model_box_container toggle_left_container'>";

            $tablestring .= "</div>";

            $tablestring .= "<div class='arp_default_toggle_container'>";

            $setas_default_toggle_yearly = isset($setas_default_toggle_yearly) ? $setas_default_toggle_yearly : '';

            $tablestring .= "<input " . $setas_default_toggle_yearly . " type='radio' id='setas_default_toggle_yearly' class='setas_default_toggle' name='setas_default_toggle' value='0' $toggle_disabled style='margin:0;' /> <label for='setas_default_toggle_yearly'> " . __('Set As Default', ARP_PT_TXTDOMAIN) . " </label>";

            $tablestring .= "</div>";

            $tablestring .= "</div>";

            $tablestring .= "<div class='column_opt_opts' style='margin-top:5px;'>";

            $tablestring .= "<span class='tab_label_no'>2)</span>";

            $general_option['general_settings']['togglestep_monthly'] = $general_option['general_settings']['togglestep_monthly'] ? $general_option['general_settings']['togglestep_monthly'] : 'Monthly';

            $tablestring .= "<input style='width: 233px' type='text' id='togglestep_monthly' value='" . stripslashes_deep(esc_html($general_option['general_settings']['togglestep_monthly'])) . "' class='col_opt_input_object arp_tab_toggle_text togglestep_monthly' name='togglestep_monthly' $toggle_readonly />";

            $tablestring .= "<button type='button' class='col_opt_btn_icon add_toggle_fontawesome arptooltipster toggle_fontawesome_btn' name='add_toggle_fontawesome' id='add_toggle_fontawesome' data-insert='togglestep_monthly' data-column='togglestep_fontawesome_icons' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "'  style='float:left;margin-top:4px;' >";

            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";

            $tablestring .= "</button>";

            $tablestring .= "<div class='arp_font_awesome_model_box_container toggle_left_container'>";

            $tablestring .= "</div>";

            $tablestring .= "<div class='arp_default_toggle_container'>";

            $setas_default_toggle_monthly = isset($setas_default_toggle_monthly) ? $setas_default_toggle_monthly : '';

            $tablestring .= "<input " . $setas_default_toggle_monthly . " type='radio' id='setas_default_toggle_monthly' class='setas_default_toggle' name='setas_default_toggle' value='1' $toggle_disabled style='margin:0;' /> <label for='setas_default_toggle_monthly'> " . __('Set As Default', ARP_PT_TXTDOMAIN) . " </label>";

            $tablestring .= "</div>";

            $tablestring .= "</div>";


            $arp_togglestep_quarterly_show = ($general_option['general_settings']['arp_step_main'] == 3 ) ? 'display:block;' : 'display:none;';

            $tablestring .= "<div class='column_opt_opts' id='arp_togglestep_quarterly' style='margin-top:5px; {$arp_togglestep_quarterly_show }'>";

            $tablestring .= "<span class='tab_label_no'>3)</span>";

            $general_option['general_settings']['togglestep_quarterly'] = $general_option['general_settings']['togglestep_quarterly'] ? $general_option['general_settings']['togglestep_quarterly'] : 'Quarterly';

            $tablestring .= "<input style='width: 233px' type='text' id='togglestep_quarterly' value='" . stripslashes_deep(esc_html($general_option['general_settings']['togglestep_quarterly'])) . "' class='col_opt_input_object arp_tab_toggle_text togglestep_quarterly' name='togglestep_quarterly'/>";

            $tablestring .= "<button type='button' class='col_opt_btn_icon add_toggle_fontawesome arptooltipster toggle_fontawesome_btn' name='add_toggle_fontawesome' id='add_toggle_fontawesome' data-insert='togglestep_quarterly' data-column='togglestep_fontawesome_icons' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "'  style='float:left;margin-top:4px;' >";

            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";

            $tablestring .= "</button>";

            $tablestring .= "<div class='arp_font_awesome_model_box_container toggle_left_container'>";
            
            $tablestring .= "</div>";

            $tablestring .= "<div class='arp_default_toggle_container'>";

            $setas_default_toggle_quarterly = isset($setas_default_toggle_quarterly) ? $setas_default_toggle_quarterly : '';

            $tablestring .= "<input " . $setas_default_toggle_quarterly . " type='radio' id='setas_default_toggle_quarterly' class='setas_default_toggle' name='setas_default_toggle' value='2' $toggle_disabled style='margin:0;' /> <label for='setas_default_toggle_quarterly'> " . __('Set As Default', ARP_PT_TXTDOMAIN) . " </label>";

            $tablestring .= "</div>";

            $tablestring .= "</div>";

            if ($general_option['general_settings']['setas_default_toggle'] == '') {
                $arp_setas_default_toggle = 0;
            } else {
                $arp_setas_default_toggle = $general_option['general_settings']['setas_default_toggle'];
            }

            $tablestring .= '<input type="hidden" id="setas_default_toggle_hidden" value="' . $arp_setas_default_toggle . '" /> ';

            $tablestring .= "</div>";



            $tablestring .= "</div>";

            // Colors Title\\
            $tablestring .= "<div class='column_content_light_row column_opt_row'>";

            $tablestring .= "<div class='column_opt_label arp_fix_height'><div class='arp_toggle_font_title' style='padding:0';>" . __('Colors', ARP_PT_TXTDOMAIN) . "</div></div>";

            $tablestring .= "</div>";

            // Colors End \\
            // Active Tab\\                
            $tablestring .= "<div class='column_content_light_row column_opt_row'>";

            $tablestring .= "<div class='column_opt_label two_cols'>" . __('Active Tab', ARP_PT_TXTDOMAIN) . "</div>";

            $tablestring .= "<div class='column_opt_opts two_cols align_right'>";

            $tablestring .= "<div style='float:left; width:50%;'>";
            $general_option['general_settings']['toggle_active_color'] = $general_option['general_settings']['toggle_active_color'] ? $general_option['general_settings']['toggle_active_color'] : '#ffffff';
            $tablestring .= "<div class='color_picker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,toggle_active_color)\",valueElement:toggle_active_color_hidden}' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,toggle_active_color)' jscolor-valueelement='toggle_active_color_hidden' data-id='toggle_active_color_hidden' id='toggle_active_color' style='background:" . $general_option['general_settings']['toggle_active_color'] . ";' data-color='" . $general_option['general_settings']['toggle_active_color'] . "' >";
            $tablestring .= "</div>";
            $tablestring .= "<span style='float:left; text-align:center; width:100%; margin:0 0 0 18px;'>" . __('Background', ARP_PT_TXTDOMAIN) . "</span>";
            $tablestring .= "</div>";

            $general_option['general_settings']['toggle_active_text_color'] = $general_option['general_settings']['toggle_active_text_color'] ? $general_option['general_settings']['toggle_active_text_color'] : '#000000';
            $tablestring .= "<div style='float:left; width:50%;'>";
            $tablestring .= "<div class='color_picker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,toggle_active_text_color)\",valueElement:toggle_active_text_color_hidden}' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,toggle_active_text_color)' jscolor-valueelement='toggle_active_text_color_hidden' data-id='toggle_active_text_color_hidden' id='toggle_active_text_color' style='background:" . $general_option['general_settings']['toggle_active_text_color'] . ";' data-color='" . $general_option['general_settings']['toggle_active_text_color'] . "' >";
            $tablestring .= "</div>";
            $tablestring .= "<span style='float:left; text-align:center; width:100%; margin:0 0 0 23px;'>" . __('Text', ARP_PT_TXTDOMAIN) . "</span>";
            $tablestring .= "</div>";

            $tablestring .= "<input type='hidden' id='toggle_active_color_hidden' name='toggle_active_color' value='" . $general_option['general_settings']['toggle_active_color'] . "' />";

            $tablestring .= "<input type='hidden' id='toggle_active_text_color_hidden' name='toggle_active_text_color' value='" . $general_option['general_settings']['toggle_active_text_color'] . "' />";

            $tablestring .= "</div>";

            $tablestring .= "</div>";

            // Active Tab End \\
            // InActive Tab \\
            $tablestring .= "<div class='column_content_dark_row column_opt_row'>";

            $tablestring .= "<div class='column_opt_label two_cols'>" . __('Inactive Tab', ARP_PT_TXTDOMAIN) . "</div>";

            $tablestring .= "<div class='column_opt_opts two_cols align_right' >";




            $general_option['general_settings']['toggle_inactive_color'] = $general_option['general_settings']['toggle_inactive_color'] ? $general_option['general_settings']['toggle_inactive_color'] : '#000000';
            $tablestring .= "<div style='float:left; width:50%;'>";
            $tablestring .= "<div class='color_picker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,toggle_inactive_color)\",valueElement:toggle_inactive_color_hidden}' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,toggle_inactive_color)' jscolor-valueelement='toggle_inactive_color_hidden' data-id='toggle_inactive_color_hidden' id='toggle_inactive_color' style='background:" . $general_option['general_settings']['toggle_inactive_color'] . ";' data-color='" . $general_option['general_settings']['toggle_inactive_color'] . "' >";
            $tablestring .= "</div>";
            $tablestring .= "<span style='float:left; text-align:center; width:100%; margin:0 0 0 18px;'>" . __('Background', ARP_PT_TXTDOMAIN) . "</span>";
            $tablestring .= "</div>";

            $general_option['general_settings']['toggle_button_font_color'] = $general_option['general_settings']['toggle_button_font_color'] ? $general_option['general_settings']['toggle_button_font_color'] : '#ffffff';
            $tablestring .= "<div style='float:left; width:50%;'>";
            $tablestring .= "<div class='color_picker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,toggle_button_font_color)\",valueElement:toggle_button_font_color_hidden}' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,toggle_button_font_color)' jscolor-valueelement='toggle_button_font_color_hidden' data-id='toggle_button_font_color_hidden' id='toggle_button_font_color' style='background:" . $general_option['general_settings']['toggle_button_font_color'] . ";' data-color='" . $general_option['general_settings']['toggle_button_font_color'] . "' >";
            $tablestring .= "</div>";
            $tablestring .= "<span style='float:left; text-align:center; width:100%; margin:0 0 0 23px;'>" . __('Text', ARP_PT_TXTDOMAIN) . "</span>";
            $tablestring .= "</div>";





            $tablestring .= "<input type='hidden' id='toggle_inactive_color_hidden' name='toggle_inactive_color' value='" . $general_option['general_settings']['toggle_inactive_color'] . "' />";

            $tablestring .= "<input type='hidden' id='toggle_button_font_color_hidden' name='toggle_button_font_color' value='" . $general_option['general_settings']['toggle_button_font_color'] . "' />";


            $tablestring .= "</div>";

            $tablestring .= "</div>";

            // InActive Tab End \\     
            // Main Background \\
            $tablestring .= "<div class='column_content_dark_row column_opt_row toggle_main_background_div arp_no_border' style='margin-bottom: 15px;'>";

            $tablestring .= "<div class='column_opt_label two_cols arp_toggle_main_belt_label'>" . __('Main Belt', ARP_PT_TXTDOMAIN) . "</div>";
            $tablestring .= "<div class='column_opt_label two_cols arp_toggle_title_font_label'>" . __('Title Font', ARP_PT_TXTDOMAIN) . "</div>";

            $tablestring .= "<div class='column_opt_opts two_cols align_right' >";


            $general_option['general_settings']['toggle_main_color'] = $general_option['general_settings']['toggle_main_color'] ? $general_option['general_settings']['toggle_main_color'] : '#000000';
            $tablestring .= "<div style='float:left; width:50%;' class='toggle_belt_background_color_div' >";
            $tablestring .= "<div class='color_picker jscolor color_picker_round' data-id='toggle_main_color_hidden' data-jscolor='{valueElement:toggle_main_color_hidden,hash:true,onFineChange:\"arp_update_color(this,toggle_main_color)\"}' jscolor-hash='true' jscolor-valueelement='toggle_main_color_hidden' jscolor-onfinechange='arp_update_color(this,toggle_main_color)' id='toggle_main_color' style='background:" . $general_option['general_settings']['toggle_main_color'] . ";' data-color='" . $general_option['general_settings']['toggle_main_color'] . "' >";
            $tablestring .= "</div>";
            $tablestring .= "<span style='float:left; text-align:center; width:100%; margin:0 0 0 23px;'>" . __('Background', ARP_PT_TXTDOMAIN) . "</span>";
            $tablestring .= "</div>";

            $tablestring .= "<div style='float:left; width:50%;'>";

            $general_option['general_settings']['toggle_title_font_color'] = $general_option['general_settings']['toggle_title_font_color'] ? $general_option['general_settings']['toggle_title_font_color'] : '#000000';

            $tablestring .= "<div class='color_picker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,toggle_title_font_color)\",valueElement:toggle_title_font_color_hidden}' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,toggle_title_font_color)' jscolor-valueelement='toggle_title_font_color_hidden' data-id='toggle_title_font_color_hidden' id='toggle_title_font_color' style='background:" . $general_option['general_settings']['toggle_title_font_color'] . ";' data-color='" . $general_option['general_settings']['toggle_title_font_color'] . "' >";
            $tablestring .= "</div>";
            $tablestring .= "<span style='float:left; text-align:center; width:100%; margin:0 0 0 23px;'>" . __('Text', ARP_PT_TXTDOMAIN) . "</span>";

            $tablestring .= "</div>";


            $tablestring .= "<input type='hidden' id='toggle_main_color_hidden' name='toggle_main_color' value='" . $general_option['general_settings']['toggle_main_color'] . "' />";
            $tablestring .= "<input type='hidden' id='toggle_title_font_color_hidden' name='toggle_title_font_color' value='" . $general_option['general_settings']['toggle_title_font_color'] . "' />";

            $tablestring .= "</div>";

            $tablestring .= "</div>";
            // Main Background End \\


            $tablestring .= "</div>";
        } else {
            $tablestring .= "<div class='toggle_options_dropdown'>";

            if ($general_settings['enable_toggle_price'] == '') {
                $default_toggle_price = 0;
            } else {
                $default_toggle_price = $general_settings['enable_toggle_price'];
            }

            //

            $tablestring .= "<div class='column_content_light_row column_opt_row arp_no_border' >";

            $admin_css_url = admin_url('admin.php?page=arp_global_settings');
            $tablestring .= "<div class='column_opt_label'>" . __('You are using Unlicensed Copy. To enable this feature, Please activate license from', ARP_PT_TXTDOMAIN) . " <a href='" . $admin_css_url . "'>here</a></div>";

            $tablestring .= "</div></div>";
        }

        /* new design */

        /* new design */


        $tablestring .= "</div>";

        $tablestring .= "<div class='general_toggle_options_tab enable global_opts' id='all_font_options'>";
        $tablestring .= "<div class='arprice_option_belt_title'>" . __('Font Settings', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_settings_options_dropdown'>";

        $arp_font_settings = $arprice_default_settings->arp_font_settings();
        $arp_font_settings = $arp_font_settings[$reference_template];

        if (in_array('arp_header_font', $arp_font_settings)) {
            $arp_header_style = 'display:block;';
        } else {
            $arp_header_style = 'display:none;';
        }

        /*         * header font settings */
        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $arp_header_style . "'>";
        $tablestring .= "<div class='column_opt_label arp_fix_height'><div class='arp_toggle_title_font_title' style='padding:0';>" . __('Header Fonts', ARP_PT_TXTDOMAIN) . "</div></div>";
        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='header_font_family_global' name='header_font_family_global' value='" . $general_option['column_settings']['header_font_family_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox' id='header_font_font_family_dd' data-name='header_font_font_family_dd' data-id='header_font_family_global' style=''>";
        if ($general_option['column_settings']['header_font_family_global'])
            $arp_selectbox_placeholder = $general_option['column_settings']['header_font_family_global'];
        else
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['header_font_family_global'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_toggletitle_font_setting' data-id='header_font_family_global'>";
        $default_fonts = $arprice_fonts->get_default_fonts();
        $google_fonts = $arprice_fonts->google_fonts_list();
        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Default Fonts', ARP_PT_TXTDOMAIN) . "</ol>";
        foreach ($default_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Google Fonts', ARP_PT_TXTDOMAIN) . "</ol>";

        foreach ($google_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='header_font_family_global_font_family_preview' href='" . $googlefontpreviewurl . $general_option['column_settings']['header_font_family_global'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='header_font_size_global'  name='header_font_size_global' value='" . $general_option['column_settings']['header_font_size_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox header_font_size_global_dd' data-name='header_font_size_global' data-id='header_font_size_global' style='width : 80% !important;' >";
        $tablestring .= "<dt><span>" . $general_option['column_settings']['header_font_size_global'] . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['header_font_size_global'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='header_font_size_global'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts arp_font_align'>";
        $header_text_align = isset($general_option['column_settings']['arp_header_text_alignment']) ? $general_option['column_settings']['arp_header_text_alignment'] : 'center';
        $tablestring .= $arprice_form->arp_create_alignment_div_new('header_text_alignment', $header_text_align, 'arp_header_text_alignment', '', 'header_section');
        $tablestring .= "</div>";

        if ($general_option['column_settings']['arp_header_text_bold_global'] == 'bold') {
            $header_title_style_bold_selected = 'selected';
        } else {
            $header_title_style_bold_selected = '';
        }

        //check selected for italic
        if ($general_option['column_settings']['arp_header_text_italic_global'] == 'italic') {
            $header_title_style_italic_selected = 'selected';
        } else {
            $header_title_style_italic_selected = '';
        }

        //check selected for underline or line-through
        if ($general_option['column_settings']['arp_header_text_decoration_global'] == 'underline') {
            $header_title_style_underline_selected = 'selected';
        } else {
            $header_title_style_underline_selected = '';
        }

        if ($general_option['column_settings']['arp_header_text_decoration_global'] == 'line-through') {
            $header_title_style_linethrough_selected = 'selected';
        } else {
            $header_title_style_linethrough_selected = '';
        }
        $tablestring .= "<div class='column_opt_opts font_style_div' style='' id='arp_header_text_style_global'>";
//        $tablestring .= "<div class='column_opt_label'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div' data-level = 'header_level_options' level-id='header_button_global'>";

        $tablestring .= "<div class='arp_style_btn " . $header_title_style_bold_selected . " arptooltipster' data-align='left' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fa fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $header_title_style_italic_selected . " arptooltipster' data-align='center' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fa fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $header_title_style_underline_selected . " arptooltipster' data-align='right' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fa fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $header_title_style_linethrough_selected . " arptooltipster' data-align='right' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fa fa-strikethrough'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<input type='hidden' id='header_style_bold_global' name='header_style_bold_global' value='" . $general_option['column_settings']['arp_header_text_bold_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='header_style_italic_global' name='header_style_italic_global' value='" . $general_option['column_settings']['arp_header_text_italic_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='header_style_decoration_global' name='header_style_decoration_global' value='" . $general_option['column_settings']['arp_header_text_decoration_global'] . "' /> ";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        /*         * header font settings */

        if (in_array('arp_desc_font', $arp_font_settings)) {
            $arp_header_style = 'display:block;';
        } else {
            $arp_header_style = 'display:none;';
        }

        /*         * Desc font settings */
        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $arp_header_style . "'>";
        $tablestring .= "<div class='column_opt_label arp_fix_height'><div class='arp_toggle_title_font_title' style='padding:0';>" . __('Description Fonts', ARP_PT_TXTDOMAIN) . "</div></div>";
        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='description_font_family_global' name='description_font_family_global' value='" . $general_option['column_settings']['description_font_family_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox' id='description_font_font_family_dd' data-name='description_font_font_family_dd' data-id='description_font_family_global' style=''>";
        if ($general_option['column_settings']['description_font_family_global'])
            $arp_selectbox_placeholder = $general_option['column_settings']['description_font_family_global'];
        else
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['description_font_family_global'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_toggletitle_font_setting' data-id='description_font_family_global'>";
        $default_fonts = $arprice_fonts->get_default_fonts();
        $google_fonts = $arprice_fonts->google_fonts_list();
        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Default Fonts', ARP_PT_TXTDOMAIN) . "</ol>";
        foreach ($default_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Google Fonts', ARP_PT_TXTDOMAIN) . "</ol>";

        foreach ($google_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='description_font_family_global_font_family_preview' href='" . $googlefontpreviewurl . $general_option['column_settings']['description_font_family_global'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='description_font_size_global'  name='description_font_size_global' value='" . $general_option['column_settings']['description_font_size_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox description_font_size_global_dd' data-name='description_font_size_global' data-id='description_font_size_global' style='width : 80% !important;' >";
        $tablestring .= "<dt><span>" . $general_option['column_settings']['description_font_size_global'] . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['description_font_size_global'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='description_font_size_global'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts arp_font_align'>";
        $description_text_alignment = isset($general_option['column_settings']['arp_description_text_alignment']) ? $general_option['column_settings']['arp_description_text_alignment'] : 'center';
        $tablestring .= $arprice_form->arp_create_alignment_div_new('description_text_alignment', $description_text_alignment, 'arp_description_text_alignment', '', 'column_description_section');
        $tablestring .= "</div>";

        if ($general_option['column_settings']['arp_description_text_bold_global'] == 'bold') {
            $description_title_style_bold_selected = 'selected';
        } else {
            $description_title_style_bold_selected = '';
        }

        //check selected for italic
        if ($general_option['column_settings']['arp_description_text_italic_global'] == 'italic') {
            $description_title_style_italic_selected = 'selected';
        } else {
            $description_title_style_italic_selected = '';
        }

        //check selected for underline or line-through
        if ($general_option['column_settings']['arp_description_text_decoration_global'] == 'underline') {
            $description_title_style_underline_selected = 'selected';
        } else {
            $description_title_style_underline_selected = '';
        }

        if ($general_option['column_settings']['arp_description_text_decoration_global'] == 'line-through') {
            $description_title_style_linethrough_selected = 'selected';
        } else {
            $description_title_style_linethrough_selected = '';
        }
        $tablestring .= "<div class='column_opt_opts font_style_div' style='' id='arp_description_text_style_global'>";
//        $tablestring .= "<div class='column_opt_label'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div' data-level = 'description_level_options' level-id='description_button_global'>";

        $tablestring .= "<div class='arp_style_btn " . $description_title_style_bold_selected . " arptooltipster' data-align='left' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fa fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $description_title_style_italic_selected . " arptooltipster' data-align='center' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fa fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $description_title_style_underline_selected . " arptooltipster' data-align='right' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fa fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $description_title_style_linethrough_selected . " arptooltipster' data-align='right' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fa fa-strikethrough'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<input type='hidden' id='description_style_bold_global' name='description_style_bold_global' value='" . $general_option['column_settings']['arp_description_text_bold_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='description_style_italic_global' name='description_style_italic_global' value='" . $general_option['column_settings']['arp_description_text_italic_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='description_style_decoration_global' name='description_style_decoration_global' value='" . $general_option['column_settings']['arp_description_text_decoration_global'] . "' /> ";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        /*         * Desc font settings */


        if (in_array('arp_price_font', $arp_font_settings)) {
            $arp_header_style = 'display:block;';
        } else {
            $arp_header_style = 'display:none;';
        }

        /*         * price font settings */
        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $arp_header_style . "'>";
        $tablestring .= "<div class='column_opt_label arp_fix_height'><div class='arp_toggle_title_font_title' style='padding:0';>" . __('Pricing Fonts', ARP_PT_TXTDOMAIN) . "</div></div>";
        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='price_font_family_global' name='price_font_family_global' value='" . $general_option['column_settings']['price_font_family_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox' id='price_font_font_family_dd' data-name='price_font_font_family_dd' data-id='price_font_family_global' style=''>";
        if ($general_option['column_settings']['price_font_family_global'])
            $arp_selectbox_placeholder = $general_option['column_settings']['price_font_family_global'];
        else
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['price_font_family_global'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_toggletitle_font_setting' data-id='price_font_family_global'>";
        $default_fonts = $arprice_fonts->get_default_fonts();
        $google_fonts = $arprice_fonts->google_fonts_list();
        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Default Fonts', ARP_PT_TXTDOMAIN) . "</ol>";
        foreach ($default_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Google Fonts', ARP_PT_TXTDOMAIN) . "</ol>";

        foreach ($google_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='price_font_family_global_font_family_preview' href='" . $googlefontpreviewurl . $general_option['column_settings']['price_font_family_global'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='price_font_size_global'  name='price_font_size_global' value='" . $general_option['column_settings']['price_font_size_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox price_font_size_global_dd' data-name='price_font_size_global' data-id='price_font_size_global' style='width : 80% !important;' >";
        $tablestring .= "<dt><span>" . $general_option['column_settings']['price_font_size_global'] . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['price_font_size_global'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='price_font_size_global'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts arp_font_align'>";
        $price_text_alignment = isset($general_option['column_settings']['arp_price_text_alignment']) ? $general_option['column_settings']['arp_price_text_alignment'] : 'center';
        $tablestring .= $arprice_form->arp_create_alignment_div_new('price_text_alignment', $price_text_alignment, 'arp_price_text_alignment', '', 'pricing_section');
        $tablestring .= "</div>";

        if ($general_option['column_settings']['arp_price_text_bold_global'] == 'bold') {
            $price_title_style_bold_selected = 'selected';
        } else {
            $price_title_style_bold_selected = '';
        }

        //check selected for italic
        if ($general_option['column_settings']['arp_price_text_italic_global'] == 'italic') {
            $price_title_style_italic_selected = 'selected';
        } else {
            $price_title_style_italic_selected = '';
        }

        //check selected for underline or line-through
        if ($general_option['column_settings']['arp_price_text_decoration_global'] == 'underline') {
            $price_title_style_underline_selected = 'selected';
        } else {
            $price_title_style_underline_selected = '';
        }

        if ($general_option['column_settings']['arp_price_text_decoration_global'] == 'line-through') {
            $price_title_style_linethrough_selected = 'selected';
        } else {
            $price_title_style_linethrough_selected = '';
        }
        $tablestring .= "<div class='column_opt_opts font_style_div' style='' id='arp_price_text_style_global'>";
//        $tablestring .= "<div class='column_opt_label'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div' data-level = 'price_level_options' level-id='price_button_global'>";

        $tablestring .= "<div class='arp_style_btn " . $price_title_style_bold_selected . " arptooltipster' data-align='left' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fa fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $price_title_style_italic_selected . " arptooltipster' data-align='center' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fa fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $price_title_style_underline_selected . " arptooltipster' data-align='right' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fa fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $price_title_style_linethrough_selected . " arptooltipster' data-align='right' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fa fa-strikethrough'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<input type='hidden' id='price_style_bold_global' name='price_style_bold_global' value='" . $general_option['column_settings']['arp_price_text_bold_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='price_style_italic_global' name='price_style_italic_global' value='" . $general_option['column_settings']['arp_price_text_italic_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='price_style_decoration_global' name='price_style_decoration_global' value='" . $general_option['column_settings']['arp_price_text_decoration_global'] . "' /> ";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        /*         * Price font settings */


        if (in_array('arp_body_font', $arp_font_settings)) {
            $arp_header_style = 'display:block;';
        } else {
            $arp_header_style = 'display:none;';
        }

        /*         * body font settings */
        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $arp_header_style . "'>";
        $tablestring .= "<div class='column_opt_label arp_fix_height'><div class='arp_toggle_title_font_title' style='padding:0';>" . __('Body Fonts', ARP_PT_TXTDOMAIN) . "</div></div>";
        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='body_font_family_global' name='body_font_family_global' value='" . $general_option['column_settings']['body_font_family_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox' id='body_font_font_family_dd' data-name='body_font_font_family_dd' data-id='body_font_family_global' style=''>";
        if ($general_option['column_settings']['body_font_family_global'])
            $arp_selectbox_placeholder = $general_option['column_settings']['body_font_family_global'];
        else
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['body_font_family_global'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_toggletitle_font_setting' data-id='body_font_family_global'>";
        $default_fonts = $arprice_fonts->get_default_fonts();
        $google_fonts = $arprice_fonts->google_fonts_list();
        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Default Fonts', ARP_PT_TXTDOMAIN) . "</ol>";
        foreach ($default_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Google Fonts', ARP_PT_TXTDOMAIN) . "</ol>";

        foreach ($google_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='body_font_family_global_font_family_preview' href='" . $googlefontpreviewurl . $general_option['column_settings']['body_font_family_global'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='body_font_size_global'  name='body_font_size_global' value='" . $general_option['column_settings']['body_font_size_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox body_font_size_global_dd' data-name='body_font_size_global' data-id='body_font_size_global' style='width : 80% !important;' >";
        $tablestring .= "<dt><span>" . $general_option['column_settings']['body_font_size_global'] . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['body_font_size_global'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='body_font_size_global'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts arp_font_align'>";
        $body_text_alignment = isset($general_option['column_settings']['arp_body_text_alignment']) ? $general_option['column_settings']['arp_body_text_alignment'] : 'center';
        $tablestring .= $arprice_form->arp_create_alignment_div_new('body_text_alignment', $body_text_alignment, 'arp_body_text_alignment', '', 'body_section');
        $tablestring .= "</div>";

        if ($general_option['column_settings']['arp_body_text_bold_global'] == 'bold') {
            $body_title_style_bold_selected = 'selected';
        } else {
            $body_title_style_bold_selected = '';
        }

        //check selected for italic
        if ($general_option['column_settings']['arp_body_text_italic_global'] == 'italic') {
            $body_title_style_italic_selected = 'selected';
        } else {
            $body_title_style_italic_selected = '';
        }

        //check selected for underline or line-through
        if ($general_option['column_settings']['arp_body_text_decoration_global'] == 'underline') {
            $body_title_style_underline_selected = 'selected';
        } else {
            $body_title_style_underline_selected = '';
        }

        if ($general_option['column_settings']['arp_body_text_decoration_global'] == 'line-through') {
            $body_title_style_linethrough_selected = 'selected';
        } else {
            $body_title_style_linethrough_selected = '';
        }
        $tablestring .= "<div class='column_opt_opts font_style_div' style='' id='arp_body_text_style_global'>";
//        $tablestring .= "<div class='column_opt_label'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div' data-level = 'body_level_options' level-id='body_button_global'>";

        $tablestring .= "<div class='arp_style_btn " . $body_title_style_bold_selected . " arptooltipster' data-align='left' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fa fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $body_title_style_italic_selected . " arptooltipster' data-align='center' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fa fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $body_title_style_underline_selected . " arptooltipster' data-align='right' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fa fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $body_title_style_linethrough_selected . " arptooltipster' data-align='right' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fa fa-strikethrough'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<input type='hidden' id='body_style_bold_global' name='body_style_bold_global' value='" . $general_option['column_settings']['arp_body_text_bold_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='body_style_italic_global' name='body_style_italic_global' value='" . $general_option['column_settings']['arp_body_text_italic_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='body_style_decoration_global' name='body_style_decoration_global' value='" . $general_option['column_settings']['arp_body_text_decoration_global'] . "' /> ";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        /*         * body font settings */


        if (in_array('arp_footer_font', $arp_font_settings)) {
            $arp_header_style = 'display:block;';
        } else {
            $arp_header_style = 'display:none;';
        }

        /*         * footer font settings */
        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $arp_header_style . "'>";
        $tablestring .= "<div class='column_opt_label arp_fix_height'><div class='arp_toggle_title_font_title' style='padding:0';>" . __('Footer Fonts', ARP_PT_TXTDOMAIN) . "</div></div>";
        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='footer_font_family_global' name='footer_font_family_global' value='" . $general_option['column_settings']['footer_font_family_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox' id='footer_font_font_family_dd' data-name='footer_font_font_family_dd' data-id='footer_font_family_global' style=''>";
        if ($general_option['column_settings']['footer_font_family_global'])
            $arp_selectbox_placeholder = $general_option['column_settings']['footer_font_family_global'];
        else
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['footer_font_family_global'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_toggletitle_font_setting' data-id='footer_font_family_global'>";
        $default_fonts = $arprice_fonts->get_default_fonts();
        $google_fonts = $arprice_fonts->google_fonts_list();
        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Default Fonts', ARP_PT_TXTDOMAIN) . "</ol>";
        foreach ($default_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Google Fonts', ARP_PT_TXTDOMAIN) . "</ol>";

        foreach ($google_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='footer_font_family_global_font_family_preview' href='" . $googlefontpreviewurl . $general_option['column_settings']['footer_font_family_global'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='footer_font_size_global'  name='footer_font_size_global' value='" . $general_option['column_settings']['footer_font_size_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox footer_font_size_global_dd' data-name='footer_font_size_global' data-id='footer_font_size_global' style='width : 80% !important;' >";
        $tablestring .= "<dt><span>" . $general_option['column_settings']['footer_font_size_global'] . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['footer_font_size_global'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='footer_font_size_global'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts arp_font_align'>";
        $footer_text_alignment = isset($general_option['column_settings']['arp_footer_text_alignment']) ? $general_option['column_settings']['arp_footer_text_alignment'] : 'center';
        $tablestring .= $arprice_form->arp_create_alignment_div_new('footer_text_alignment', $footer_text_alignment, 'arp_footer_text_alignment', '', 'footer_section');
        $tablestring .= "</div>";

        if ($general_option['column_settings']['arp_footer_text_bold_global'] == 'bold') {
            $footer_title_style_bold_selected = 'selected';
        } else {
            $footer_title_style_bold_selected = '';
        }

        //check selected for italic
        if ($general_option['column_settings']['arp_footer_text_italic_global'] == 'italic') {
            $footer_title_style_italic_selected = 'selected';
        } else {
            $footer_title_style_italic_selected = '';
        }

        //check selected for underline or line-through
        if ($general_option['column_settings']['arp_footer_text_decoration_global'] == 'underline') {
            $footer_title_style_underline_selected = 'selected';
        } else {
            $footer_title_style_underline_selected = '';
        }

        if ($general_option['column_settings']['arp_footer_text_decoration_global'] == 'line-through') {
            $footer_title_style_linethrough_selected = 'selected';
        } else {
            $footer_title_style_linethrough_selected = '';
        }
        $tablestring .= "<div class='column_opt_opts font_style_div' style='' id='arp_footer_text_style_global'>";
//        $tablestring .= "<div class='column_opt_label'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div' data-level = 'footer_level_options' level-id='footer_button_global'>";

        $tablestring .= "<div class='arp_style_btn " . $footer_title_style_bold_selected . " arptooltipster' data-align='left' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fa fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $footer_title_style_italic_selected . " arptooltipster' data-align='center' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fa fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $footer_title_style_underline_selected . " arptooltipster' data-align='right' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fa fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $footer_title_style_linethrough_selected . " arptooltipster' data-align='right' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fa fa-strikethrough'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<input type='hidden' id='footer_style_bold_global' name='footer_style_bold_global' value='" . $general_option['column_settings']['arp_footer_text_bold_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='footer_style_italic_global' name='footer_style_italic_global' value='" . $general_option['column_settings']['arp_footer_text_italic_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='footer_style_decoration_global' name='footer_style_decoration_global' value='" . $general_option['column_settings']['arp_footer_text_decoration_global'] . "' /> ";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        /*         * footer font settings */


        if (in_array('arp_button_font', $arp_font_settings)) {
            $arp_header_style = 'display:block;';
        } else {
            $arp_header_style = 'display:none;';
        }

        /*         * footer font settings */
        $tablestring .= "<div class='column_content_light_row column_opt_row' style='" . $arp_header_style . "'>";
        $tablestring .= "<div class='column_opt_label arp_fix_height'><div class='arp_toggle_title_font_title' style='padding:0';>" . __('Button Fonts', ARP_PT_TXTDOMAIN) . "</div></div>";
        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='button_font_family_global' name='button_font_family_global' value='" . $general_option['column_settings']['button_font_family_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox' id='button_font_font_family_dd' data-name='button_font_font_family_dd' data-id='button_font_family_global' style=''>";
        if ($general_option['column_settings']['button_font_family_global'])
            $arp_selectbox_placeholder = $general_option['column_settings']['button_font_family_global'];
        else
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['button_font_family_global'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul class='arp_toggletitle_font_setting' data-id='button_font_family_global'>";
        $default_fonts = $arprice_fonts->get_default_fonts();
        $google_fonts = $arprice_fonts->google_fonts_list();
        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Default Fonts', ARP_PT_TXTDOMAIN) . "</ol>";
        foreach ($default_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Google Fonts', ARP_PT_TXTDOMAIN) . "</ol>";

        foreach ($google_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='button_font_family_global_font_family_preview' href='" . $googlefontpreviewurl . $general_option['column_settings']['button_font_family_global'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='button_font_size_global'  name='button_font_size_global' value='" . $general_option['column_settings']['button_font_size_global'] . "' />";
        $tablestring .= "<dl class='arp_selectbox button_font_size_global_dd' data-name='button_font_size_global' data-id='button_font_size_global' style='width : 80% !important;' >";
        $tablestring .= "<dt><span>" . $general_option['column_settings']['button_font_size_global'] . "</span><input type='text' style='display:none;' value='" . $general_option['column_settings']['button_font_size_global'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='button_font_size_global'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";


        if ($general_option['column_settings']['arp_button_text_bold_global'] == 'bold') {
            $button_title_style_bold_selected = 'selected';
        } else {
            $button_title_style_bold_selected = '';
        }

        //check selected for italic
        if ($general_option['column_settings']['arp_button_text_italic_global'] == 'italic') {
            $button_title_style_italic_selected = 'selected';
        } else {
            $button_title_style_italic_selected = '';
        }

        //check selected for underline or line-through
        if ($general_option['column_settings']['arp_button_text_decoration_global'] == 'underline') {
            $button_title_style_underline_selected = 'selected';
        } else {
            $button_title_style_underline_selected = '';
        }

        if ($general_option['column_settings']['arp_button_text_decoration_global'] == 'line-through') {
            $button_title_style_linethrough_selected = 'selected';
        } else {
            $button_title_style_linethrough_selected = '';
        }
        $tablestring .= "<div class='column_opt_opts font_style_div' style='float: right;' id='arp_button_text_style_global'>";
//        $tablestring .= "<div class='column_opt_label'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div' data-level = 'button_level_options' level-id='button_level_global'>";

        $tablestring .= "<div class='arp_style_btn " . $button_title_style_bold_selected . " arptooltipster' data-align='left' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fa fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $button_title_style_italic_selected . " arptooltipster' data-align='center' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fa fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $button_title_style_underline_selected . " arptooltipster' data-align='right' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fa fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $button_title_style_linethrough_selected . " arptooltipster' data-align='right' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fa fa-strikethrough'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<input type='hidden' id='button_style_bold_global' name='button_style_bold_global' value='" . $general_option['column_settings']['arp_button_text_bold_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='button_style_italic_global' name='button_style_italic_global' value='" . $general_option['column_settings']['arp_button_text_italic_global'] . "' /> ";
        $tablestring .= "<input type='hidden' id='button_style_decoration_global' name='button_style_decoration_global' value='" . $general_option['column_settings']['arp_button_text_decoration_global'] . "' /> ";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        /** button font settings */
        /* toolttip font */
        $tablestring .= "<div class='column_content_light_row column_opt_row'>";
        $tablestring .= "<div class='column_opt_label arp_fix_height'><div class='arp_toggle_title_font_title' style='padding:0';>" . __('Tooltip Fonts', ARP_PT_TXTDOMAIN) . "</div></div>";
        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $tablestring .= "<input type='hidden' id='tooltip_font_family' name='tooltip_font_family' value='" . $tooltip_settings['tooltip_font_family'] . "' />";
        $tablestring .= "<dl class='arp_selectbox' id='tooltip_font_family_dd' data-name='tooltip_font_family' data-id='tooltip_font_family'  style=''>";

        if ($tooltip_settings['tooltip_font_family'])
            $arp_selectbox_placeholder = $tooltip_settings['tooltip_font_family'];
        else
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);

        $tablestring .= "<dt><span style='float:left;'>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $tooltip_settings['tooltip_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $tablestring .= "<ul class='arp_tooltip_font_setting' data-id='tooltip_font_family'>";

        $default_fonts = $arprice_fonts->get_default_fonts();
        $google_fonts = $arprice_fonts->google_fonts_list();

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Default Fonts', ARP_PT_TXTDOMAIN) . "</ol>";

        foreach ($default_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Google Fonts', ARP_PT_TXTDOMAIN) . "</ol>";

        foreach ($google_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_tooltip_font_family_preview' href='" . $googlefontpreviewurl . $tooltip_settings['tooltip_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='column_opt_opts font_settings_div'>";

        $tablestring .= "<div class='column_opt_label'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";

        $tablestring .= "<div class='font_title_font_family_div'>";

        $tablestring .= "<input type='hidden' id='tooltip_font_size' name='tooltip_font_size' value='" . $tooltip_settings['tooltip_font_size'] . "' />";
        $tablestring .= "<dl class='arp_selectbox' id='tooltip_font_size_dd' data-name='tooltip_font_size' data-id='tooltip_font_size'  style='width : 80% !important;'>";
        if ($tooltip_settings['tooltip_font_size'])
            $arp_selectbox_placeholder = $tooltip_settings['tooltip_font_size'];
        else
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);

        $tablestring .= "<dt><span style='float:left;'>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $tooltip_settings['tooltip_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul class='arp_tooltip_font_setting' data-id='tooltip_font_size'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }
        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        if (isset($tooltip_settings['tooltip_font_style_bold']) && $tooltip_settings['tooltip_font_style_bold'] == 'bold') {
            $tooltip_style_bold_selected = 'selected';
        } else {
            $tooltip_style_bold_selected = '';
        }

        //check selected for italic
        if (isset($tooltip_settings['tooltip_font_style_italic']) && $tooltip_settings['tooltip_font_style_italic'] == 'italic') {
            $tooltip_style_italic_selected = 'selected';
        } else {
            $tooltip_style_italic_selected = '';
        }

        //check selected for underline or line-through
        if (isset($tooltip_settings['tooltip_font_style_decoration']) && $tooltip_settings['tooltip_font_style_decoration'] == 'underline') {
            $tooltip_style_underline_selected = 'selected';
        } else {
            $tooltip_style_underline_selected = '';
        }


        if (isset($tooltip_settings['tooltip_font_style_decoration']) && $tooltip_settings['tooltip_font_style_decoration'] == 'line-through') {
            $tooltip_style_linethrough_selected = 'selected';
        } else {
            $tooltip_style_linethrough_selected = '';
        }



        $tablestring .= "<div class='column_opt_opts font_style_div' style='float: right;' id='arp_tooltip_text_style_global'>";
        $tablestring .= "<div class='font_title_font_family_div' data-level = 'tooltip_font_style' level-id='tooltip_font_style'>";
        $tablestring .= "<div class='arp_style_btn " . $tooltip_style_bold_selected . " arptooltipster' data-align='left' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fa fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $tooltip_style_italic_selected . " arptooltipster' data-align='center' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fa fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $tooltip_style_underline_selected . " arptooltipster' data-align='right' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fa fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $tooltip_style_linethrough_selected . " arptooltipster' data-align='right' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fa fa-strikethrough'></i>";
        $tablestring .= "</div>";


        //$tablestring .= "<input type='hidden' id='tooltip_font_style' name='tooltip_font_style' value='" . $tooltip_settings['tooltip_font_style'] . "' />";
        $tooltip_settings['tooltip_font_style_bold'] = isset($tooltip_settings['tooltip_font_style_bold']) ? $tooltip_settings['tooltip_font_style_bold'] : '';
        $tablestring .= "<input type='hidden' id='tooltip_font_style_bold' name='tooltip_font_style_bold' value='" . $tooltip_settings['tooltip_font_style_bold'] . "' /> ";
        $tooltip_settings['tooltip_font_style_italic'] = isset($tooltip_settings['tooltip_font_style_italic']) ? $tooltip_settings['tooltip_font_style_italic'] : '';
        $tablestring .= "<input type='hidden' id='tooltip_font_style_italic' name='tooltip_font_style_italic' value='" . $tooltip_settings['tooltip_font_style_italic'] . "' /> ";
        $tooltip_settings['tooltip_font_style_decoration'] = isset($tooltip_settings['tooltip_font_style_decoration']) ? $tooltip_settings['tooltip_font_style_decoration'] : '';
        $tablestring .= "<input type='hidden' id='tooltip_font_style_decoration' name='tooltip_font_style_decoration' value='" . $tooltip_settings['tooltip_font_style_decoration'] . "' /> ";


        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        /* toolttip font */

        /*         * **toogle title font
         * * */

        $tablestring .= "<div class='column_content_light_row column_opt_row'>";
        $tablestring .= "<div class='column_opt_label arp_fix_height'><div class='arp_toggle_title_font_title' style='padding:0';>" . __('Toogle Title Fonts', ARP_PT_TXTDOMAIN) . "</div></div>";
        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";


        $tablestring .= "<div class='font_title_font_family_div'>";
        $general_option['general_settings']['toggle_title_font_family'] = $general_option['general_settings']['toggle_title_font_family'] ? $general_option['general_settings']['toggle_title_font_family'] : 'Ubuntu';
        $tablestring .= "<input type='hidden' id='toggle_title_font_family' name='toggle_title_font_family' value='" . $general_option['general_settings']['toggle_title_font_family'] . "' />";

        $tablestring .= "<dl class='arp_selectbox' id='toggle_title_font_family_dd' data-name='toggle_title_font_family' data-id='toggle_title_font_family' style=''>";


        if ($general_option['general_settings']['toggle_title_font_family'])
            $arp_selectbox_placeholder = $general_option['general_settings']['toggle_title_font_family'];
        else
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['general_settings']['toggle_title_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $tablestring .= "<ul class='arp_toggletitle_font_setting' data-id='toggle_title_font_family'>";

        $default_fonts = $arprice_fonts->get_default_fonts();
        $google_fonts = $arprice_fonts->google_fonts_list();

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Default Fonts', ARP_PT_TXTDOMAIN) . "</ol>";

        foreach ($default_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Google Fonts', ARP_PT_TXTDOMAIN) . "</ol>";

        foreach ($google_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_toggle_title_font_family_preview' href='" . $googlefontpreviewurl . $general_option['general_settings']['toggle_title_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";



        // end toggle tile font family
        //font size section start                            
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";

        $general_option['general_settings']['toggle_title_font_size'] = $general_option['general_settings']['toggle_title_font_size'] ? $general_option['general_settings']['toggle_title_font_size'] : 16;
        $tablestring .= "<input type='hidden' id='toggle_title_font_size'  name='toggle_title_font_size' value='" . $general_option['general_settings']['toggle_title_font_size'] . "' />";

        $tablestring .= "<dl class='arp_selectbox toggle_title_font_size_dd' data-name='toggle_title_font_size' data-id='toggle_title_font_size' style='width : 80% !important;' >";

        $tablestring .= "<dt><span>" . $general_option['general_settings']['toggle_title_font_size'] . "</span><input type='text' style='display:none;' value='" . $general_option['general_settings']['toggle_title_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='toggle_title_font_size'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";

        //font size section end
        //toggle title font style start
        $tablestring .= "<div class='column_opt_opts font_style_div' style='float: right;' id='arp_toggle_title_text_style_global'>";
        $tablestring .= "<div class='font_title_font_family_div' data-level = 'toggle_title_font_style' level-id='toggle_title_font_style'>";

        //check selected for bold
        if ($general_option['general_settings']['toggle_title_font_style_bold'] == 'bold') {
            $toggle_title_style_bold_selected = 'selected';
        } else {
            $toggle_title_style_bold_selected = '';
        }

        //check selected for italic
        if ($general_option['general_settings']['toggle_title_font_style_italic'] == 'italic') {
            $toggle_title_style_italic_selected = 'selected';
        } else {
            $toggle_title_style_italic_selected = '';
        }

        //check selected for underline or line-through
        if ($general_option['general_settings']['toggle_title_font_style_decoration'] == 'underline') {
            $toggle_title_style_underline_selected = 'selected';
        } else {
            $toggle_title_style_underline_selected = '';
        }


        if ($general_option['general_settings']['toggle_title_font_style_decoration'] == 'line-through') {
            $toggle_title_style_linethrough_selected = 'selected';
        } else {
            $toggle_title_style_linethrough_selected = '';
        }

        $tablestring .= "<div class='arp_style_btn " . $toggle_title_style_bold_selected . " arptooltipster' data-align='left' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fa fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $toggle_title_style_italic_selected . " arptooltipster' data-align='center' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fa fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $toggle_title_style_underline_selected . " arptooltipster' data-align='right' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fa fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div style='' class='arp_style_btn " . $toggle_title_style_linethrough_selected . " arptooltipster' data-align='right' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fa fa-strikethrough'></i>";
        $tablestring .= "</div>";






        $tablestring .= "<input type='hidden' id='toggle_title_font_style_bold' name='toggle_title_font_style_bold' value='" . $general_option['general_settings']['toggle_title_font_style_bold'] . "' /> ";
        $tablestring .= "<input type='hidden' id='toggle_title_font_style_italic' name='toggle_title_font_style_italic' value='" . $general_option['general_settings']['toggle_title_font_style_italic'] . "' /> ";
        $tablestring .= "<input type='hidden' id='toggle_title_font_style_decoration' name='toggle_title_font_style_decoration' value='" . $general_option['general_settings']['toggle_title_font_style_decoration'] . "' /> ";

        $tablestring .= "</div>";

        $tablestring .= "</div>";
//
//        $tablestring .= "</div>";
        $tablestring .= "</div>";





        /*         * **toogle title font end
         * * */

        /* toogle tab font */
        $tablestring .= "<div class='column_content_light_row column_opt_row arp_no_border' style='margin-bottom:15px;'>";
        $tablestring .= "<div class='column_opt_label arp_fix_height'><div class='arp_toggle_title_font_title' style='padding:0';>" . __('Toogle Tab Fonts', ARP_PT_TXTDOMAIN) . "</div></div>";
        $tablestring .= "<div class='column_opt_opts arp_font_family'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $general_option['general_settings']['toggle_button_font_family'] = $general_option['general_settings']['toggle_button_font_family'] ? $general_option['general_settings']['toggle_button_font_family'] : 'Ubuntu';
        $tablestring .= "<input type='hidden' id='toggle_button_font_family' name='toggle_button_font_family' value='" . $general_option['general_settings']['toggle_button_font_family'] . "' />";

        $tablestring .= "<dl class='arp_selectbox' id='toggle_button_font_family_dd' data-name='toggle_button_font_family' data-id='toggle_button_font_family' style=''>";

        if ($general_option['general_settings']['toggle_button_font_family'])
            $arp_selectbox_placeholder = $general_option['general_settings']['toggle_button_font_family'];
        else
            $arp_selectbox_placeholder = __('Choose Option', ARP_PT_TXTDOMAIN);

        $tablestring .= "<dt><span>" . $arp_selectbox_placeholder . "</span><input type='text' style='display:none;' value='" . $general_option['general_settings']['toggle_button_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $tablestring .= "<ul class='arp_togglebutton_font_setting' data-id='toggle_button_font_family'>";

        $default_fonts = $arprice_fonts->get_default_fonts();
        $google_fonts = $arprice_fonts->google_fonts_list();

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Default Fonts', ARP_PT_TXTDOMAIN) . "</ol>";

        foreach ($default_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Google Fonts', ARP_PT_TXTDOMAIN) . "</ol>";

        foreach ($google_fonts as $font) {

            $tablestring .= "<li class='arp_selectbox_option' data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_toggle_button_font_family_preview' href='" . $googlefontpreviewurl . $general_option['general_settings']['toggle_button_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";


        //font size section start                            
        $tablestring .= "<div class='column_opt_opts font_settings_div'>";
        $tablestring .= "<div class='column_opt_label'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div'>";
        $general_option['general_settings']['toggle_button_font_size'] = $general_option['general_settings']['toggle_button_font_size'] ? $general_option['general_settings']['toggle_button_font_size'] : 16;
        $tablestring .= "<input type='hidden' id='toggle_button_font_size'  name='toggle_button_font_size' value='" . $general_option['general_settings']['toggle_button_font_size'] . "' />";

        $tablestring .= "<dl class='arp_selectbox toggle_button_font_size_dd' data-name='toggle_button_font_size' data-id='toggle_button_font_size' style='width : 80% !important;'>";

        $tablestring .= "<dt><span>" . $general_option['general_settings']['toggle_button_font_size'] . "</span><input type='text' style='display:none;' value='" . $general_option['general_settings']['toggle_button_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";

        $tablestring .= "<dd>";

        $size_arr = array();

        $tablestring .= "<ul data-id='toggle_button_font_size'>";

        for ($s = 8; $s <= 20; $s++)
            $size_arr[] = $s;
        for ($st = 22; $st <= 70; $st+=2)
            $size_arr[] = $st;

        foreach ($size_arr as $size) {
            $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
        }

        $tablestring .= "</ul>";

        $tablestring .= "</dd>";

        $tablestring .= "</dl>";

        $tablestring .= "</div>";

        $tablestring .= "</div>";


        //font size section end
        //toggle title font style start
        $tablestring .= "<div class='column_opt_opts font_style_div' style='float:right' id='toggle_button_font_style'>";
//        $tablestring .= "<div class='column_opt_label'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='font_title_font_family_div' data-level = 'toggle_button_font_style' level-id='toggle_button_font_style'>";

        //check selected for bold
        if ($general_option['general_settings']['toggle_button_font_style_bold'] == 'bold') {
            $toggle_button_style_bold_selected = 'selected';
        } else {
            $toggle_button_style_bold_selected = '';
        }

        //check selected for italic
        if ($general_option['general_settings']['toggle_button_font_style_italic'] == 'italic') {
            $toggle_button_style_italic_selected = 'selected';
        } else {
            $toggle_button_style_italic_selected = '';
        }

        //check selected for underline or line-through
        if ($general_option['general_settings']['toggle_button_font_style_decoration'] == 'underline') {
            $toggle_button_style_underline_selected = 'selected';
        } else {
            $toggle_button_style_underline_selected = '';
        }

        if ($general_option['general_settings']['toggle_button_font_style_decoration'] == 'line-through') {
            $toggle_button_style_linethrough_selected = 'selected';
        } else {
            $toggle_button_style_linethrough_selected = '';
        }
        $tablestring .= "<div class='arp_style_btn " . $toggle_button_style_bold_selected . " arptooltipster' data-align='left' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' id='arp_style_bold'>";
        $tablestring .= "<i class='fa fa-bold'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='arp_style_btn " . $toggle_button_style_italic_selected . " arptooltipster' data-align='center' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' id='arp_style_italic'>";
        $tablestring .= "<i class='fa fa-italic'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='arp_style_btn " . $toggle_button_style_underline_selected . " arptooltipster' data-align='right' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' id='arp_style_underline'>";
        $tablestring .= "<i class='fa fa-underline'></i>";
        $tablestring .= "</div>";
        $tablestring .= "<div style='margin-right:0 !important;' class='arp_style_btn " . $toggle_button_style_linethrough_selected . " arptooltipster' data-align='right' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' id='arp_style_strike'>";
        $tablestring .= "<i class='fa fa-strikethrough'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<input type='hidden' id='toggle_button_font_style_bold' name='toggle_button_font_style_bold' value='" . $general_option['general_settings']['toggle_button_font_style_bold'] . "' /> ";
        $tablestring .= "<input type='hidden' id='toggle_button_font_style_italic' name='toggle_button_font_style_italic' value='" . $general_option['general_settings']['toggle_button_font_style_italic'] . "' /> ";
        $tablestring .= "<input type='hidden' id='toggle_button_font_style_decoration' name='toggle_button_font_style_decoration' value='" . $general_option['general_settings']['toggle_button_font_style_decoration'] . "' /> ";

        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        /* toogle tab font */

        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";



        /* End */

        $tablestring .= "</div>";

        global $arp_mainoptionsarr;

        $template_feature = $arp_mainoptionsarr['general_options']['template_options']['features'][$ref_template];

        $template_css = '';

        if ($is_template == 1) {
            $template_name = $sql->template_name;
        } else {
            $template_name = $table_id;
        }

        $tablestring .= "<style type='text/css' id='border_radius_styles'>";

        if ($column_border_radius_top_left == 0 and $column_border_radius_top_right == 0 and $column_border_radius_bottom_right == 0 and $column_border_radius_bottom_left == 0) {
            
        } else {

            if (@$template_feature['is_animated'] == 0) {

                if ($ref_template == 'arptemplate_10') {
                    $tablestring .= ".arptemplate_$template_name .ArpPricingTableColumnWrapper{";

                    $tablestring .= "border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-moz-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-webkit-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-o-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px  !important;";

                    $tablestring .= "}";

                    $tablestring .= ".arptemplate_$template_name .arppricingtablebodycontent ul.arp_opt_options li:last-child{";

                    $tablestring .= "border-radius:0px 0px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-moz-border-radius:0px 0px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-webkit-border-radius:0px 0px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-o-border-radius:0px 0px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px  !important;";

                    $tablestring .= "}";
                } else {
                    $tablestring .= ".arptemplate_$template_name .ArpPricingTableColumnWrapper .arp_column_content_wrapper{";

                    $tablestring .= "border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-moz-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-webkit-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;";

                    $tablestring .= "-o-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px  !important;";

                    $tablestring .= "overflow:hidden !important;";

                    $tablestring .= "}";
                }

                if ($ref_template == 'arptemplate_6' || $ref_template == 'arptemplate_9') {

                    $tablestring .= ".arptemplate_$template_name .maincaptioncolumn .arpcaptiontitle{";

                    $tablestring .= "border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px 0 0 !important;";

                    $tablestring .= "-moz-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px 0 0 !important;";

                    $tablestring .= "-webkit-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px 0 0 !important;";

                    $tablestring .= "-o-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px 0 0 !important;";

                    $tablestring .= "}";
                }
            } else {
                $tablestring .= ".arptemplate_$template_name .ArpPricingTableColumnWrapper { ";

                $tablestring .= "border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;overflow:hidden !important;";

                $tablestring .= " -moz-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;overflow:hidden !important;";

                $tablestring .= "-webkit-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;overflow:hidden !important;";

                $tablestring .= "-o-border-radius:{$column_border_radius_top_left}px {$column_border_radius_top_right}px {$column_border_radius_bottom_right}px {$column_border_radius_bottom_left}px !important;overflow:hidden !important;";

                $tablestring .= "}";
            }
        }

        $tablestring .= "</style>";

        if ($is_template == 1) {
            global $arprice_images_css_version;
            if (file_exists(PRICINGTABLE_DIR . '/css/templates/arptemplate_' . $sql->template_name . '_v' . $arprice_images_css_version . '.css')) {

                $template_css = @file_get_contents(PRICINGTABLE_DIR . "/css/templates/arptemplate_" . $sql->template_name . '_v' . $arprice_images_css_version . ".css");

                $template_css = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $template_css);
            }
        } else {
            if (file_exists(PRICINGTABLE_UPLOAD_DIR . '/css/arptemplate_' . $id . '.css')) {

                $template_css = @file_get_contents(PRICINGTABLE_UPLOAD_DIR . "/css/arptemplate_" . $id . ".css");
            }
        }

        $tablestring .= "<style id='arptemplatecss' type='text/css'>" . $template_css . "</style>";



        $arp_front_css = @file_get_contents(PRICINGTABLE_DIR . "/css/arprice_front.css");

        $arp_front_css = str_replace('../images', PRICINGTABLE_IMAGES_URL, $arp_front_css);

        $arp_front_css = str_replace('../fonts/', PRICINGTABLE_URL . '/fonts/', $arp_front_css);

        $tablestring .= "<style id='arpfrontcss' type='text/css'>" . $arp_front_css . "</style>";

        $col_ord_arr = json_decode($general_settings['column_order']);


        if ($column_animation['is_animation'] == 'yes') {
            $animation_margin = 'margin-bottom:45px;';
        }
        if ($column_animation['is_animation'] == 0) {
            $animation_margin = 'margin-bottom:-5px;';
        }
        if (isset($column_animation['is_animation']) and $column_animation['is_animation'] == 'yes' and $column_animation['is_pagination'] == 1 and ( $column_animation['pagination_position'] == 'Top' or $column_animation['pagination_position'] == 'Both' ))
            $tablestring .= "<div class='arp_pagination " . $column_animation['pagination_style'] . " arp_pagination_top' id='arp_slider_" . $id . "_pagination_top'></div>";
//        $container_width = $column_settings['column_wrapper_width_txtbox'].'px;';
        $container_width = $wrapper_width_value . 'px;';
        $tablestring .= "<div class='ArpTemplate_main' id=\"ArpTemplate_main\" style='clear:both;" . $animation_margin . "width:$container_width'>";

        $tablestring .= "<div class='arp_width_guide_line'>";
        $tablestring .= "<div class='arp_width_guide_line_box' id='arp_width_guide_line_box'>";
        $tablestring .= $wrapper_width_value . "px";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<style type='text/css' media='all'>";


        $tablestring .= $arprice_form->arp_render_customcss($template_name, $general_option, 0, $opts, $is_animated);

        if ($general_option['tooltip_settings']['style'] == 'normal') {
            $tablestring .= " .arp_tooltip_" . $id . " {
			border-radius:4px;
				-moz-border-radius:4px;
				-webkit-border-radius:4px;
				-o-border-radius:4px;

		}";
        } else if ($general_option['tooltip_settings']['style'] == 'glass') {
            $tablestring .= " .arp_tooltip_" . $id . " {
			border-radius:7px;
				-moz-border-radius:7px;
				-webkit-border-radius:7px;
				-o-border-radius:7px;
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



        $tablestring .= "</style>";

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

        $tablestring .= "<div id='arp_inlinestyle'><style>";
        $tablestring .= $general_settings['arp_custom_css'];
        $tablestring .= "</style></div> ";

        $tablestring .= "<div class='arp_inlinescript'><script type='text/javascript'>
	
</script>";

        $global_column_width = "";

        if ($column_settings['all_column_width'] && $column_settings['all_column_width'] > 0) {
            $global_column_width = 'width:' . $column_settings['all_column_width'] . 'px;';
        }


        $tablestring .= "<input type='hidden' name='template' id='arp_template' value='" . $template_settings['template'] . "' />";
        $tablestring .= "<input type='hidden' name='template_type' id='arp_template_type' value='" . $template_type . "' />";
        $tablestring .= "<input type='hidden' name='is_tbl_preview' id='is_tbl_preview' value='" . $is_tbl_preview . "' /></div>";
        $tablestring .= "<input type='hidden' name='column_level_dynamic_array' id='column_level_dynamic_array' />";

        $tablestring .= "<input type='hidden' id='arp_template_name' name='arp_template_name' value='arptemplate_" . $template_name . "' />";

        $template_id = $template_settings['template'];
        $color_scheme = 'arp' . $template_settings['skin'];
        if ($hover_type == 0 and $is_tbl_preview != 2) {
            $hover_class = 'hover_effect';
        } else if ($hover_type == 1 and $is_tbl_preview != 2) {
            $hover_class = 'shadow_effect';
        } else {
            $hover_class = 'no_effect';
        }

        if ($is_animation != "" and $is_tbl_preview != 2) {
            $animation_class = 'has_animation';
        } else {
            $animation_class = 'no_animation';
        }

        if ($column_animation['is_animation'] == 'yes' and $column_animation['is_pagination'] == 1 and $is_tbl_preview != 2) {
            $slider_pagination_container = 'arp_slider_pagination';
            if ($column_animation['pagination_position'] == 'Top')
                $slider_pagination_container .= ' Top';
            else if ($column_animation['pagination_position'] == 'Both')
                $slider_pagination_container .= ' Both';
            else if ($column_animation['pagination_position'] == 'Bottom')
                $slider_pagination_container .= ' Bottom';
        }
        else {
            $slider_pagination_container = '';
        }


        $tablestring .= "<div class='ArpPriceTable arp_admin_template_editor arp_price_table_" . $template_name . " arptemplate_" . $template_name . " " . $color_scheme . " " . $slider_pagination_container . "'";


        if (isset($column_animation['is_animation']) and $column_animation['is_animation'] == 'yes' and $is_tbl_preview != 2 and $is_tbl_preview != 3) {
            $data_items = $column_animation['visible_column'] ? $column_animation['visible_column'] : 1;
            $scrolling_columns = $column_animation['scrolling_columns'] ? $column_animation['scrolling_columns'] : 1;
            $navigation = ( $column_animation['navigation'] == 1 ) ? 1 : 0;
            $autoplay = ( $column_animation['autoplay'] == 1 ) ? 1 : 0;
            $sliding_effect = $column_animation['sliding_effect'] ? $column_animation['sliding_effect'] : 'slide';
            $transition_speed = $column_animation['transition_speed'] ? $column_animation['transition_speed'] : '500';
            $hide_caption = $column_animation['hide_caption'] ? $column_animation['hide_caption'] : 0;
            $infinite = $column_animation['is_infinite'] ? $column_animation['is_infinite'] : 0;
            $easing_effect = $column_animation['easing_effect'] ? $column_animation['easing_effect'] : 'swing';

            $tablestring .= "data-animate='true' data-id='" . $table_id . "' data-items='" . $data_items . "' data-scroll='" . $scrolling_columns . "' data-autoplay='" . $autoplay . "' data-effect='" . $sliding_effect . "' data-speed='" . $transition_speed . "' data-caption='" . $hide_caption . "' data-infinite='" . $infinite . "' data-easing='" . $easing_effect . "'";
        }
        $tablestring .= ">";

        $navigation = "";
        if ($column_animation['is_animation'] == 'yes' and $is_tbl_preview != 2) {
            $navigation = ( $column_animation['navigation'] == 1 ) ? 1 : 0;
        }
        $tablestring .= "<div class='arp_prev_div'";
        if (!$navigation) {
            $tablestring .= " style='display:none;'";
        } $tablestring .= ">";
        $tablestring .= "<div id='arp_prev_btn_" . $table_id . "' class='arp_prev_btn " . $column_animation['navigation_style'] . "'></div>";
        $tablestring .= "</div>";
        $ref_template = $general_settings['reference_template'];

        /* Toggle Content Preview Change Start */
//        if ($general_settings['enable_toggle_price'] == 1) {
        $one_toggle_selected = ' toggle_selected ';
        $toggle_container = ( $general_settings['enable_toggle_price'] == 1 ) ? "" : "display:none;";
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

        $toggle_wrapper_cls_10 = ($ref_template == 'arptemplate_10') ? 'toggle_arptemp10_template' : '';

        $tablestring .= "<div class='toggle_content_wrapper $toggle_wrapper_style $toggle_wrapper_cls_10 $toggle_wrapper_cls' style='$toggle_container'>";

        $tablestring .= "<div class='toggle_content_title $switch_counter' >";
        $tablestring .= $general_settings['toggle_label_content'];
        $tablestring .= "</div>";
        $tablestring .= "<div class='toggle_content_switches $switch_counter $toggle_wrapper_style'>";
//            if ($toggle_wrapper_style == 'arp_radio_style_switch') {
        $toggle_wrapper_style_radio = ( $toggle_wrapper_style == "arp_radio_style_switch" ) ? "" : "display:none;";
        $tablestring .= "<div id='arp_radio_style_switch' style='$toggle_wrapper_style_radio'>";
        $tablestring .= "<div class='radio_button_box " . $yearly_toggle_selected . "' id='" . esc_html($toggle_label_yearly) . "' data-value='two_step_one'>";
        $tablestring .= "<span class='" . $one_selected_fa_class . "'></span>";
        $tablestring .= "<label class='toggle_content_label_txt'>" . $toggle_label_yearly . "</label><span class='toggle_content_label_sub_text'>" . $toggle_sub_label_yearly . "</span>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='radio_button_box " . $monthly_toggle_selected . "' id='" . esc_html($toggle_label_monthly) . "' data-value='two_step_two'>";
        $tablestring .= "<span class='" . $two_selected_fa_class . "'></span>";
        $tablestring .= "<label class='toggle_content_label_txt'>" . $toggle_label_monthly . "</label><span class='toggle_content_label_sub_text'>" . $toggle_sub_label_monthly . "</span>";
        $tablestring .= "</div>";

        $radio_button_style = ($toggle_step_count == 3 ) ? '' : 'display:none;';
        $tablestring .= "<div class='radio_button_box " . $quarterly_toggle_selected . "' id='" . esc_html($toggle_label_quarterly) . "' data-value='two_step_three' style='$radio_button_style'>";
        $tablestring .= "<span class='" . $three_selected_fa_class . "'></span>";
        $tablestring .= "<label class='toggle_content_label_txt'>" . $toggle_label_quarterly . "</label><span class='toggle_content_label_sub_text'>" . $toggle_sub_label_quarterly . "</span>";
        $tablestring .= "</div>";

        $tablestring .= "</div>";
        $toggle_wrapper_style_button = ( $toggle_wrapper_style == "arp_button_style_switch" ) ? "" : "display:none;";
        $tablestring .= "<div id='arp_button_style_switch' style='$toggle_wrapper_style_button'>";
        $tablestring .= "<div class='button_switch_box $switch_counter $yearly_toggle_selected' id='" . esc_html($toggle_label_yearly) . "' data-value='two_step_one'>";
        $tablestring .= $toggle_label_yearly;
        $tablestring .= "</div>";

        $tablestring .= "<div class='button_switch_box $switch_counter $monthly_toggle_selected' id='" . esc_html($toggle_label_monthly) . "' data-value='two_step_two'>";
        $tablestring .= $toggle_label_monthly;
        $tablestring .= "</div>";

        $switch_step_display = ( $toggle_step_count == 3 ) ? '' : 'display:none;';
        $tablestring .= "<div class='button_switch_box $switch_counter $quarterly_toggle_selected' id='" . esc_html($toggle_label_quarterly) . "' data-value='two_step_three' style='$switch_step_display'>";
        $tablestring .= $toggle_label_quarterly;
        $tablestring .= "</div>";

        $tablestring .= "<div class='button_switch_box button_switch_box_selected'></div>";

        $tablestring .= "</div>";

        $tablestring .= "<input type='hidden' name='arprice_toggle_content_value' id='arprice_toggle_content_value' class='switch_front_radio_btn' value='" . $toggle_content_default_value . "'/>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
//        }
        /* Toggle Content Preview Change End */

        $tablestring .= "<div id='ArpPricingTableColumns'";
        if ($navigation) {
            $tablestring .= " style='display:table-cell;'";
        }

        $tablestring .= ">";


        $x = 0;
        if ($opts['columns'] and count($opts['columns']) > 0) {

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
            $new_arr = array();
            if (is_array($col_ord_arr) && count($col_ord_arr) > 0) {
                foreach ($col_ord_arr as $key => $value) {
                    $new_value = str_replace('main_', '', $value);
                    $new_col_id = $new_value;
                    foreach ($opts['columns'] as $j => $columns) {
                        if ($new_col_id == $j) {
                            if ($columns['is_caption'] != 1) {
                                $new_arr['columns'][$new_col_id] = $columns;
                            }
                        }
                    }
                }
            } else {
                $new_arr = $opts;
            }


            foreach ($opts['columns'] as $j => $column) {
                if (isset($column['is_caption']) && $column['is_caption'] == 1) {
                    $caption_column[] = 'yes';
                } else {
                    $caption_column[] = 'no';
                }
            }
            if (in_array('yes', $caption_column)) {
                $has_caption = 1;
            } else {
                $has_caption = 0;
            }
            $column_count = 1;
            foreach ($opts['columns'] as $j => $columns) {
                $columns['is_caption'] = isset($columns['is_caption']) ? $columns['is_caption'] : '';
                if ($columns['is_caption'] == 1 and $template_feature['caption_style'] == 'default') {
                    $inlinecolumnwidth = "";
                    if ($columns["column_width"] != "") {
                        $inlinecolumnwidth = 'width:' . $columns["column_width"] . 'px';
                    } else {
                        if ($column_settings['is_responsive'] != 1) {
                            $inlinecolumnwidth = $global_column_width;
                        }
                    }
                    $column_highlight = $opts['columns'][$j]['column_highlight'];
                    if ($column_highlight && $column_highlight == 1 and $is_table_preview != 2)
                        $highlighted_column = 'column_highlight';



                    if ($columns['is_caption'] == 1 && $shadow_style == 'shadow_style_5' && ($reference_template == 'arptemplate_6' || $reference_template == 'arptemplate_9')) {
                        $shadow_style_caption = 'shadow_style_none';
                    } else {
                        $shadow_style_caption = $shadow_style;
                    }

                    $tablestring .= "<div class='ArpPricingTableColumnWrapper no_transition  maincaptioncolumn arppricingtablecaptioncolumn " . $animation_class . " style_" . $j . " $shadow_style_caption' style='";
                    if ($column_settings['hide_caption_column'] && $column_settings['hide_caption_column'] == 1) {
                        $tablestring .= "display:none;";
                    } $tablestring .= $inlinecolumnwidth . "' id='main_" . $j . "'  is_caption='1' data-template_id='" . $ref_template . "' data-level='column_level_options' data-type='caption_column_buttons' >";

                    $tablestring .= '<input type="hidden" value="1" name="caption_column_0" id="caption_column">';



                    $tablestring .= "<div class='arpplan ";
                    if ($columns['is_caption'] == 1) {
                        $tablestring .= "maincaptioncolumn";
                    } else {
                        $tablestring .= $j . " ";
                    } if ($x % 2 == 0) {
                        $tablestring .= " arpdark-bg ArpPriceTablecolumndarkbg";
                    } $tablestring .= "' style='";
                    $tablestring .= "' >";
                    if ($ref_template == 'arptemplate_15' || $ref_template == 'arptemplate_23')
                        $tablestring .= "<div class='arp_template_rocket'><div></div></div>";
                    $tablestring .= "<div class='planContainer'>";
                    $tablestring .= "<div class='arp_column_content_wrapper'>";

                    if (( $ref_template == 'arptemplate_4' || $ref_template == 'arptemplate_12') && in_array(1, $header_img))
                        $header_cls = 'has_header_code';

                    $tablestring .= "<div class='arpcolumnheader " . $header_cls . "' data-column='main_" . $j . "' >";

                    if ($columns['is_caption'] == 1) {
                        if ($template_feature['caption_title'] == 'default') {
                            if ($template == 'arptemplate_1' && in_array(1, $header_img))
                                $header_cls = 'has_header_code';
                            else
                                $header_cls = '';

                            $tablestring .= "<div class='arpcaptiontitle " . $header_cls . "' id='column_header' data-column='main_column_0' data-template_id='" . $ref_template . "' data-level='header_level_options' data-type='caption_column_buttons'>";
                            $tablestring .= "<div class='html_content_first toggle_step_first $one_toggle_selected'>" . do_shortcode($columns['html_content']) . "</div>";
                            $tablestring .= "<div class='html_content_second toggle_step_second $two_toggle_selected'>" . do_shortcode(@$columns['html_content_second']) . "</div>";
                            $tablestring .= "<div class='html_content_third toggle_step_third $three_toggle_selected'>" . do_shortcode(@$columns['html_content_third']) . "</div>";
                            $tablestring .= "</div>";
                        }
                        else if ($template_feature['caption_title'] == 'style_1') {
                            $tablestring .= "<div class='arpcaptiontitle' id='column_header' data-template_id='" . $ref_template . "' data-level='header_level_options' data-type='caption_column_buttons' data-column='main_column_0'>
                                            	
                                                <div class='arpcaptiontitle_style_1'>" . do_shortcode($columns['html_content']) . "</div>
                                            </div>";
                        }
                    } else {
                        $tablestring .= "<div class='arppricetablecolumntitle' id='column_header' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='header_level_options' data-type='caption_column_buttons'>
											<div class='bestPlanTitle package_title_first toggle_step_first $one_toggle_selected'>" . do_shortcode($columns['package_title']) . "</div>
                                                                                        <div class='bestPlanTitle package_title_second toggle_step_second $two_toggle_selected'>" . do_shortcode($columns['package_title_second']) . "</div>
                                                                                        <div class='bestPlanTitle package_title_third toggle_step_third $three_toggle_selected'>" . do_shortcode($columns['package_title_third']) . "</div>
										</div>
										<div class='arppricetablecolumnprice' data-column='main_" . $j . "'>" . do_shortcode($columns['html_content']) . "</div>";
                    }

                    $tablestring .= "</div>
                        <div class='arpbody-content arppricingtablebodycontent' id='arppricingtablebodycontent' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='body_level_options' data-type='caption_column_buttons'>
                            <ul class='arp_opt_options arppricingtablebodyoptions' id='column_column_" . $x . "' style='text-align:" . $columns['body_text_alignment'] . "'>";

                    $r = 0;

                    $row_order = isset($opts['columns'][$j]['row_order']) ? $opts['columns'][$j]['row_order'] : "";

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
                    $column_count++;
                    $row_count = 0;
                    for ($ri = 0; $ri <= $maxrowcount; $ri++) {
                        $rows = isset($opts['columns'][$j]['rows']['row_' . $ri]) ? $opts['columns'][$j]['rows']['row_' . $ri] : array();

                        if ($columns['is_caption'] == 1) {
                            if (($ri + 1) % 2 == 0) {
                                $cls = 'rowlightcolorstyle';
                            } else {
                                $cls = '';
                            }
                        } else {
                            if ($column_count % 2 == 0) {
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
                        if ($rows['row_description'] == '') {
                            $rows['row_description'] = '';
                        }

                        $li_class = $ref_template . '_' . $j . '_row_' . $ri;
                        $tablestring .= "<li data-column='main_" . $j . "' class='arpbodyoptionrow " . $cls . " " . $li_class . " arp_" . $j . "_row_" . $row_count . "' id='arp_row_" . $ri . "' style='text-align:"; 
                        $tablestring .= "' data-template_id='" . $ref_template . "' data-level='body_li_level_options' data-type='caption_column_buttons' ><span class=''>";
                        $tablestring .= "<div class='row_description_first_step toggle_step_first $one_toggle_selected'>" . stripslashes_deep($rows['row_description']) . "</div>";
                        $tablestring .= "<div class='row_description_second_step toggle_step_second $two_toggle_selected'>" . stripslashes_deep(@$rows['row_description_second']) . "</div>";
                        $tablestring .= "<div class='row_description_third_step toggle_step_third $three_toggle_selected'>" . stripslashes_deep(@$rows['row_description_third']) . "</div>";
                        $tablestring .= "</span></li>";
                        $row_count++;
                    }

                    $tablestring .= "</ul>
                        </div>";

                    //footer text class assign start.
                    $footer_hover_class = '';
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
                    //footer text class assign end.

                    if ($template_feature['button_position'] == 'default') {
                        $tablestring .= "<div class='arpcolumnfooter " . $footer_hover_class . "' data-template_id='" . $ref_template . "' data-level='footer_level_options' data-type='caption_column_buttons' id='arpcolumnfooter' data-column='main_" . $j . "'>";

                        $footer_content_below_btn = "";
                        if (@$columns['footer_content'] != '' and $template_feature['has_footer_content'] == 1) {
                            $footer_content_above_btn = "display:block;";
                        } else {
                            $footer_content_above_btn = "display:none;";
                        }

                        if ($template_feature['has_footer_content'] == 1) {
                            $tablestring .= "<div class='arp_footer_content arp_btn_before_content arp_footer_caption_column' style='{$footer_content_above_btn}'>";
                            $tablestring .= "<span class='footer_caption_content_first_step toggle_step_first $one_toggle_selected'>";
                            $tablestring .= @$columns['footer_content'];
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_caption_content_second_step toggle_step_second $two_toggle_selected'>";
                            $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_caption_content_third_step toggle_step_third $three_toggle_selected'>";
                            $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                            $tablestring .= "</span>";
                            $tablestring .= "</div>";
                        }

                        if ($columns['button_text'] != '' && $columns['btn_img'] != "") {
                            $tablestring .= "<div class='arppricetablebutton' data-column='main_" . $j . "' style='text-align:center;'>
                                            <button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(@$arp_global_button_size[$columns['button_size']]) . "' id='bestPlanButton' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='button_options' data-type='other_columns_buttons' ";
                            if ($columns['btn_img'] != "") {
                                $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . $columns['btn_img'] . ") no-repeat !important; width:" . $columns['btn_img_width'] . "px;height:" . $columns['btn_img_height'] . "px;'";
                            }  $tablestring .= ">";
                            if ($columns['btn_img'] == "") {
                                $tablestring .= "<span class='btn_content_first_step toggle_step_first $one_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['button_text']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='btn_content_second_step toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['btn_content_second']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='btn_content_third_step toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['btn_content_third']);
                                $tablestring .= "</span>";
                            } $tablestring .= "</button>";
                            $tablestring .= "</div>";
                        }

                        $tablestring .= "</div>";
                    }
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";


                    $col_no = explode('_', $j);

                    $tablestring .= "<div class='column_level_settings' id='column_level_settings_new' data-column='main_column_0'>";
                    $tablestring .= "<div class='btn-main'>";

                    $tablestring .= "<div class='arp_btn' id='column_level_options__button_1' data-level='column_level_options' style='display:none;' title='" . __('Column Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Column Settings', ARP_PT_TXTDOMAIN) . "' ><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/general-setting-icon.png'></div>";

                    $tablestring .= "<div class='arp_btn' id='column_level_options__button_2' data-level='column_level_options' style='display:none;' title='" . __('Background and Font Colors', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Background and Font Colors', ARP_PT_TXTDOMAIN) . "' ><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/color_option_icon.png'></div>";


                    $tablestring .= "<div class='arp_btn action_btn' col-id=" . $col_no[1] . " data-level='column_level_options' id='delete_column' style='display:none;' title='" . __('Delete Column', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Delete Column', ARP_PT_TXTDOMAIN) . "'>";
                    $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/delete-icon2.png'>";
                    /* Delete Model Window */

                    $tablestring .= "<div class='delete_column_container' id='delete_column_container_" . $col_no[1] . "'>";
                    $tablestring .= "<div class='delete_column_arrow'></div>";
                    $tablestring .= "<div class='delete_column_title'>";
                    $tablestring .= __('Are you sure want to delete this column?', ARP_PT_TXTDOMAIN);
                    $tablestring .= "</div>";
                    $tablestring .= "<div class='delete_column_buttons'>";
                    $tablestring .= "<button id='Model_Delete_Column' col-id='" . $col_no[1] . "' type='button' class='ribbon_insert_btn delete_column'>" . __('Ok', ARP_PT_TXTDOMAIN) . "</button>";
                    $tablestring .= "<button id='Model_Delete_Column' col-id='" . $col_no[1] . "' type='button' class='ribbon_cancel_btn'>" . __('Cancel', ARP_PT_TXTDOMAIN) . "</button>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    /* Delete Model Window */
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='arp_btn debug_action_btn' col-id=" . $col_no[1] . " data-level='column_level_options' id='css_debug' style='display:none;' title='" . __('CSS Class Information', ARP_PT_TXTDOMAIN) . "' data-title='" . __('CSS Class Information', ARP_PT_TXTDOMAIN) . "'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/custom_css_icon_1.png' /></div>";

                    $tablestring .= "<div class='arp_btn column_add_new_row_action_btn' id='add_new_row' data-level='column_level_options' title='" . __('Add New Row', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add New Row', ARP_PT_TXTDOMAIN) . "' data-id='" . $col_no[1] . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/add-icon2.png'></div>";

                    $tablestring .= "<div class='arp_btn' id='header_level_options__button_1' data-level='header_level_options' title='" . __('Header Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Header Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/content-setting-icon.png' ></div>";

                    //caption level footer setting menu start
                    $tablestring .= "<div class='arp_btn' id='footer_level_options__button_1' data-level='footer_level_options' title='" . __("Footer General Settings", ARP_PT_TXTDOMAIN) . "' data-title='" . __("Footer General Settings", ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/button-general-setting-icon.png' ></div>";
                    //caption level footer setting menu end


                    $tablestring .= "<div class='arp_btn' id='body_level_options__button_1' data-level='body_level_options' style='display:none;' title='" . __('Content Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Content Settings', ARP_PT_TXTDOMAIN) . "'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/general-setting-icon.png'></div>";


                    $tablestring .= "<div class='arp_btn' id='body_li_level_options__button_1' data-level='body_li_level_options' title='" . __('Description Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Description Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/description-setting-icon.png'></div>";
//		    $tablestring .= "<div class='arp_btn' id='body_li_level_options__button_2' data-level='body_li_level_options' title='" . __('Tooltip Settings', ARP_PT_TXTDOMAIN) . "' title='" . __('Tooltip Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/tooltip-setting-icon.png'></div>";

                    $tablestring .= "<div class='arp_btn' id='body_li_level_options__button_2' data-level='body_li_level_options' title='" . __('Tooltip Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Tooltip Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/tooltip_settings.png' /></div>";
                    //<i class='fa fa-commenting-o fa-2x'></i>

                    $tablestring .= "<div class='arp_btn action_btn' id='add_new_row' data-level='body_li_level_options' title='" . __('Add New Row', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add New Row', ARP_PT_TXTDOMAIN) . "' data-id='" . $col_no[1] . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/add-icon2.png'></div>";
                    $tablestring .= "<div class='arp_btn action_btn' id='copy_row' alt='' data-level='body_li_level_options' title='" . __('Duplicate Row', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Duplicate Row', ARP_PT_TXTDOMAIN) . "' col-id='" . $col_no[1] . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/duplicate-icon2.png'></div>";
                    $tablestring .= "<div class='arp_btn action_btn' id='remove_row' row-id='' data-level='body_li_level_options' title='" . __('Delete Row', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Delete Row', ARP_PT_TXTDOMAIN) . "' col-id='" . $col_no[1] . "' style='display:none;'>";
                    $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/delete-icon2.png'>";
                    $tablestring .= "<div class='delete_row_container' id='delete_row_container_" . $col_no[1] . "'>";
                    $tablestring .= "<div class='delete_row_arrow'></div>";
                    $tablestring .= "<div class='delete_row_title'>";
                    $tablestring .= __('Are you sure want to delete this row?', ARP_PT_TXTDOMAIN);
                    $tablestring .= "</div>";
                    $tablestring .= "<div class='delete_row_buttons'>";
                    $tablestring .= "<button id='Model_Delete_Row_Button' col-id='" . $col_no[1] . "' type='button' class='ribbon_insert_btn delete_row' row-id=''>" . __('Ok', ARP_PT_TXTDOMAIN) . "</button>";
                    $tablestring .= "<button id='Model_Delete_Row_Button' col-id='" . $col_no[1] . "' type='button' class='ribbon_cancel_btn' row-id=''>" . __('Cancel', ARP_PT_TXTDOMAIN) . "</button>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    $tablestring .= "</div>";

                    $tablestring .= "<div class='column_level_options'>";



                    $tablestring .= "<div class='column_option_div' level-id='column_level_options__button_1' style='display:none;'>";

                    $tablestring .= "<div class='col_opt_row' id='column_width' style='display:none;'>";
                    $tablestring .= "<div class='col_opt_title_div two_column'>" . __('width (optional)', ARP_PT_TXTDOMAIN) . "</div>";
                    $tablestring .= "<div class='col_opt_input_div two_column'>";

                    $tablestring .= "<div class='col_opt_input'>";
                    $tablestring .= "<input type='text' name='column_width_" . $col_no[1] . "' id='column_width_input' data-column='main_" . $j . "' class='col_opt_input' value='" . $columns["column_width"] . "'>";
                    $tablestring .= "<span>" . __('Px', ARP_PT_TXTDOMAIN) . "</span>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";


//                    Caption Border

                    /* caption border size */
                    $tablestring .= "<div class='col_opt_row' id='caption_border' style='display:none;'>";

                    $tablestring .= "<div class='col_opt_title_div'>" . __('Column Borders', ARP_PT_TXTDOMAIN) . "</div>";

                    $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Border Size', ARP_PT_TXTDOMAIN) . "</div>";
                    $tablestring .= "<div class='col_opt_input_div two_column'>";

                    $tablestring .= "<div class=''>";
                    $column_settings['arp_caption_border_size'] = isset($column_settings['arp_caption_border_size']) ? $column_settings['arp_caption_border_size'] : '';
                    $tablestring .= "<input type='hidden' name='arp_caption_border_size' id='arp_caption_border_size' value='" . $column_settings['arp_caption_border_size'] . "' />";

                    $tablestring .= "<dl id='arp_caption_border_size' class='arp_selectbox' data-id='arp_caption_border_size' data-name='arp_caption_border_size' style='margin-top: 15px; width: 101px !important;'>";

                    if ($column_settings['arp_caption_border_size']) {
                        $selected_border_size = $column_settings['arp_caption_border_size'];
                    } else {
                        $selected_border_size = "0";
                    }
                    $tablestring .= "<dt><span>" . $selected_border_size . "</span><input type='text' style='display:none;' value='" . $selected_border_size . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
                    $tablestring .= "<dd>";
                    $tablestring .= "<ul class='arp_caption_border_size' data-id='arp_caption_border_size' style='width: 117px;'>";
                    for ($i = 0; $i <= 10; $i++) {
                        $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='" . $i . "' data-label='" . $i . "'>" . $i . "</li>";
                    }
                    $tablestring .= "</ul>";
                    $tablestring .= "</dd>";
                    $tablestring .= "</dl>";

                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    /* caption border Style */
                    $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Border Style', ARP_PT_TXTDOMAIN) . "</div>";
                    $tablestring .= "<div class='col_opt_input_div two_column'>";

                    $tablestring .= "<div class=''>";

                    $column_settings['arp_caption_border_style'] = isset($column_settings['arp_caption_border_style']) ? $column_settings['arp_caption_border_style'] : '';
                    $tablestring .= "<input type='hidden' name='arp_caption_border_style' id='arp_caption_border_style' value='" . $column_settings['arp_caption_border_style'] . "' />";

                    $tablestring .= "<dl id='arp_caption_border_style' class='arp_selectbox' data-id='arp_caption_border_style' data-name='arp_caption_border_style' style='margin-top: 15px; width: 101px !important;'>";

                    if ($column_settings['arp_caption_border_style']) {
                        $selected_border_type = $column_settings['arp_caption_border_style'];
                    } else {
                        $selected_border_type = __('Choose Option', ARP_PT_TXTDOMAIN);
                    }
                    $tablestring .= "<dt style=''><span>" . $selected_border_type . "</span><input type='text' style='display:none;' value='" . $selected_border_type . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
                    $tablestring .= "<dd>";
                    $tablestring .= "<ul class='arp_caption_border_style' data-id='arp_caption_border_style' style='width: 117px;'>";

                    $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='solid' data-label='solid'>Solid</li>";
                    $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='dotted' data-label='dotted'>Dotted</li>";
                    $tablestring .= "<li style='margin:0' class='arp_selectbox_option' data-value='dashed' data-label='dashed'>Dashed</li>";

                    $tablestring .= "</ul>";
                    $tablestring .= "</dd>";
                    $tablestring .= "</dl>";

                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    /* caption border all */
                    $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Borders', ARP_PT_TXTDOMAIN) . "</div>";

                    $tablestring .= "<div class='col_opt_input_div two_column' style='width: 70px;'>";


                    $tablestring .= "<input type='checkbox' name='arp_caption_border_left' id='arp_caption_border_left' class='arp_checkbox light_bg' value='1' " . checked($column_settings['arp_caption_border_left'], 1, false) . "   />";
                    $tablestring .= "<label class='arp_checkbox_label' style='margin:10px 5px 5px 5px;' data-for='arp_caption_border_left'> " . __('Left', ARP_PT_TXTDOMAIN) . "</label>";
                    $tablestring .= "<input type='checkbox' name='arp_caption_border_right' id='arp_caption_border_right' class='arp_checkbox light_bg' value='1' " . checked($column_settings['arp_caption_border_right'], 1, false) . "  />";
                    $tablestring .= "<label class='arp_checkbox_label' style='margin:10px 3px 5px 5px;' data-for='arp_caption_border_right'> " . __('Right', ARP_PT_TXTDOMAIN) . "</label>";
                    $tablestring .= "<input type='checkbox' name='arp_caption_border_top' id='arp_caption_border_top' class='arp_checkbox light_bg' value='1' " . checked($column_settings['arp_caption_border_top'], 1, false) . "  />";
                    $tablestring .= "<label class='arp_checkbox_label' style='margin:10px 5px 5px 5px;' data-for='arp_caption_border_top'> " . __('Top', ARP_PT_TXTDOMAIN) . "</label>";
                    $tablestring .= "<input type='checkbox' name='arp_caption_border_bottom' id='arp_caption_border_bottom' class='arp_checkbox light_bg' value='1' " . checked($column_settings['arp_caption_border_bottom'], 1, false) . "  />";
                    $tablestring .= "<label class='arp_checkbox_label' style='margin:10px 1px 1px 5px;' data-for='arp_caption_border_bottom'> " . __('Bottom', ARP_PT_TXTDOMAIN) . "</label>";

                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='col_opt_row arp_ok_div' id='column_level_caption_arp_ok_div__button_1' >";
                    $tablestring .= "<div class='col_opt_btn_div'>";
                    $tablestring .= "<div class='col_opt_navigation_div'>";
                    $tablestring .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='column_left_arrow' data-button-id='column_level_options__button_1' data-column='{$col_no[1]}'></i>&nbsp;";
                    $tablestring .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='column_right_arrow' data-button-id='column_level_options__button_1' data-column='{$col_no[1]}'></i>&nbsp;";
                    $tablestring .= "</div>";
                    $tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
                    $tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
                    $tablestring .= "</button>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    $tablestring .= "</div>";


                    $tablestring .= "<div class='column_option_div' level-id='column_level_options__button_2' >";
                    $tablestring .="<div class='col_opt_row' id='arp_custom_color_tab_column' style='padding:0 !important;'>";
                    $tablestring .= "<div class='col_opt_title_div' style='padding:5px 5px 10px !important'>" . __('Column Color Settings (Normal State)', ARP_PT_TXTDOMAIN) . "</div>";
//                    $tablestring .="<div class='col_opt_title_div' data-id='arp_normal' style='padding:5px 5px 10px !important'>" . __('Normal State', ARP_PT_TXTDOMAIN) . "</div>";
//                    $tablestring .="<div class = 'col_opt_title_div two_column arp_color_tab_column' data-id = 'arp_hover'>" . __('Hover', ARP_PT_TXTDOMAIN) . "</div>";
                    $tablestring .="</div>";
                    $tablestring .='<div class="col_opt_row" id="arp_normal_custom_color_tab_column" style="padding:0 !important;">';
                    $tablestring .='<div class="col_opt_title_div two_column"></div>';
                    $tablestring .='<div class="col_opt_title_div two_column" data-id="background_color" style="padding-top:5px !important;">' . __('Background', ARP_PT_TXTDOMAIN) . '</div>';
                    $tablestring .='<div class="col_opt_title_div two_column" data-id="font_color" style="padding-top:5px !important;">' . __('Text Color', ARP_PT_TXTDOMAIN) . '</div>';
//$tablestring .='</div>';

                    $tablestring .='<div class="col_opt_row sub_row" id="arp_header_color_div" style="display:none">';
                    $tablestring .='<div class="col_opt_title_div two_column">' . __('Header', ARP_PT_TXTDOMAIN) . '</div>';
                    $tablestring .='<div class="col_opt_input_div two_column first_picker header_background_color_div" id="header_background_color_div" style="display:none;">';
                    $header_background_color_value = $columns['header_background_color'];
                    $tablestring .=$arprice_form->font_color_new('header_background_color_' . $col_no[1], 'main_' . $j, $header_background_color_value, 'header_background_color', $header_background_color_value, 'header_background_color', 'general_color_box_background_color');
                    $tablestring .= "</div>";
                    $tablestring .='<div class="col_opt_input_div two_column second_picker header_font_color_div" id="header_font_color_div" style="display:none;">';
                    $tablestring .=$arprice_form->font_color_new('header_font_color_' . $col_no[1], 'main_' . $j, $columns['header_font_color'], 'header_font_color', $columns['header_font_color']);
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    $tablestring .='<div class="col_opt_row sub_row" id="arp_footer_color_div" style="display:none">';
                    $tablestring .='<div class="col_opt_title_div two_column">' . __('Footer', ARP_PT_TXTDOMAIN) . '</div>';
                    $tablestring .='<div class="col_opt_input_div two_column first_picker footer_background_color_div" id="footer_background_color_div" style="display:none;">';
                    $footer_background_color = isset($columns['footer_background_color']) ? $columns['footer_background_color'] : '';
                    $tablestring .=$arprice_form->font_color_new("footer_bg_color_{$col_no[1]}", "main_{$j}", $footer_background_color, 'footer_background_color', $footer_background_color, 'footer_background_color_picker', '');
                    $tablestring .= "</div>";
                    $tablestring .='<div class="col_opt_input_div two_column second_picker footer_font_color_div" id="footer_font_color_div" style="display:none;">';
                    $tablestring .=$arprice_form->font_color_new('footer_level_options_font_color_' . $col_no[1], 'main_' . $j, $columns['footer_level_options_font_color'], 'footer_level_options_font_color', $columns['footer_level_options_font_color']);
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";


                    $tablestring .='<div class="col_opt_row" id="arp_body_background_color_div" style="padding:0 !important;">';
                    $tablestring .='<div class="col_opt_title_div" style="padding-left: 7px !important;">' . __("Body Row Colors", ARP_PT_TXTDOMAIN) . '</div>';
                    $tablestring .='<div class="col_opt_title_div two_column"></div>';
                    $tablestring .='<div class="col_opt_title_div two_column" data-id="background_color" style="padding-top:5px !important;">' . __('Background', ARP_PT_TXTDOMAIN) . '</div>';
                    $tablestring .='<div class="col_opt_title_div two_column" data-id="font_color" style="padding-top:5px !important;">' . __('Text Color', ARP_PT_TXTDOMAIN) . '</div>';
                    $tablestring .='</div>';

                    $tablestring .='<div class="col_opt_row sub_row" id="arp_odd_color_div" style="display:none">';
                    $tablestring .='<div class="col_opt_title_div two_column">' . __('Odd', ARP_PT_TXTDOMAIN) . '</div>';
                    $tablestring .='<div class="col_opt_input_div two_column first_picker odd_background_color_div" id="odd_background_color_div" style="display:none;">';
                    $tablestring .=$arprice_form->font_color_new('content_odd_color_' . $col_no[1], 'main_' . $j, $columns['content_odd_color'], 'content_odd_color', $columns['content_odd_color']);
                    $tablestring .= "</div>";
                    $tablestring .='<div class="col_opt_input_div two_column second_picker odd_font_color_div" id="odd_font_color_div" style="display:none;">';
                    $tablestring .=$arprice_form->font_color_new('content_font_color_' . $col_no[1], 'main_' . $j, $columns['content_font_color'], 'content_font_color', $columns['content_font_color']);
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    $tablestring .='<div class="col_opt_row sub_row" id="arp_even_color_div" style="display:none">';
                    $tablestring .='<div class="col_opt_title_div two_column">' . __('Even', ARP_PT_TXTDOMAIN) . '</div>';
                    $tablestring .='<div class="col_opt_input_div two_column first_picker even_background_color_div" id="even_background_color_div" style="display:none;">';
                    $tablestring .=$arprice_form->font_color_new('content_even_color_' . $col_no[1], 'main_' . $j, $columns['content_even_color'], 'content_even_color', $columns['content_even_color']);
                    $tablestring .= "</div>";
                    $tablestring .='<div class="col_opt_input_div two_column second_picker even_font_color_div" id="even_font_color_div" style="display:none;">';
                    $tablestring .=$arprice_form->font_color_new('content_even_font_color_' . $col_no[1], 'main_' . $j, $columns['content_even_font_color'], 'content_even_font_color', $columns['content_even_font_color']);
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    $tablestring .='</div>';




                    $tablestring .='<div class="col_opt_row" id="arp_border_color_div" style="padding:0 !important;">';
                    $tablestring .='<div class="col_opt_title_div" style="padding-left: 7px !important;">' . __("Border Colors", ARP_PT_TXTDOMAIN) . '</div>';
                    $tablestring .='<div class="col_opt_title_div two_column"></div>';
                    $tablestring .='<div class="col_opt_title_div two_column" data-id="background_color" style="padding-top:5px !important;text-align:center;">' . __('Column', ARP_PT_TXTDOMAIN) . '</div>';
                    $tablestring .='<div class="col_opt_title_div two_column" data-id="font_color" style="padding-top:5px !important;text-align:center;margin-left: -12px;">' . __('Row', ARP_PT_TXTDOMAIN) . '</div>';
                    $tablestring .='</div>';

                    $tablestring .='<div class="col_opt_row sub_row" id="arp_border_color_div_sub" style="display:none">';
                    $tablestring .='<div class="col_opt_title_div two_column"></div>';
                    $tablestring .='<div class="col_opt_input_div two_column first_picker column_border_color_div" id="column_border_color_div" style="display:none;">';
                    $column_settings['arp_caption_border_color'] = isset($column_settings['arp_caption_border_color']) ? $column_settings['arp_caption_border_color'] : "#c9c9c9";

                    $tablestring .= "<div class='color_picker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_caption_border_color)\",valueElement:arp_caption_border_color}' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_caption_border_color)' jscolor-valueelement='arp_caption_border_color' data-id='arp_caption_border_color' data-column-id='arp_caption_border_color' id='arp_caption_border_color_div' style='background:" . $column_settings['arp_caption_border_color'] . ";' data-color='" . $column_settings['arp_caption_border_color'] . "' >";

                    $tablestring .= "</div>";
                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_caption_border_color)\"}' value='" . $column_settings['arp_caption_border_color'] . "' name='arp_caption_border_color' id='arp_caption_border_color' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_caption_border_color)' value='" . $column_settings['arp_caption_border_color'] . "'/>";


                    $tablestring .= "</div>";

                    $column_settings['arp_caption_row_border_color'] = isset($column_settings['arp_caption_row_border_color']) ? $column_settings['arp_caption_row_border_color'] : "#c9c9c9";

                    $tablestring .= "<input type='hidden' id='arp_caption_row_border_color_style' />";
//                    $tablestring .= "<div data-color='" . $column_settings['arp_caption_row_border_color'] . "' id='arp_caption_row_border_color_wrapper' data-column-id='arp_caption_border_row_color' class='color_picker_font font_color_picker background_column_picker column_level_background' style='width: 116px !important;'>";
                    $tablestring .= "<div class='color_picker color_picker_round jscolor' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_caption_row_border_color)\",valueElement:arp_caption_row_border_color}' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_caption_row_border_color)' jscolor-valueelement='arp_caption_row_border_color' data-id='arp_caption_row_border_color' data-column-id='arp_caption_row_border_color' id='arp_caption_row_border_color_div' style='background:" . $column_settings['arp_caption_row_border_color'] . ";' data-color='" . $column_settings['arp_column_border_color'] . "' >";

                    $tablestring .= "</div>";
                    $tablestring .= "<input type='hidden' class='general_color_box general_color_box_font_color general_color_box_background_color' value='" . $column_settings['arp_caption_row_border_color'] . "' name='arp_caption_row_border_color' data-jscolor='{hash:true,onFineChange:\"arp_update_color(this,arp_caption_row_border_color)\"}' jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_caption_row_border_color)' id='arp_caption_row_border_color'  />";
                    $tablestring .='<div class="col_opt_input_div two_column second_picker row_border_color_div" id="row_border_color_div" style="display:none;">';

                    $tablestring .= "</div>";
                    $tablestring .= "</div>";




                    $tablestring .= "<div class='col_opt_row arp_ok_div' id='column_level_other_arp_ok_div__button_2' style='display:none;'>";
                    $tablestring .= "<div class='col_opt_btn_div'>";
                    $tablestring .= "<div class='col_opt_navigation_div'>";
                    $tablestring .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='column_left_arrow' data-column='{$col_no[1]}' data-button-id='column_level_options__button_2'></i>&nbsp;";
                    $tablestring .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='column_right_arrow' data-column='{$col_no[1]}' data-button-id='column_level_options__button_2'></i>&nbsp;";
                    $tablestring .= "</div>";
                    $tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
                    $tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
                    $tablestring .= "</button>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    $tablestring .='</div>';



                    $tablestring .= "<div class='column_option_div' level-id='footer_level_options__button_1'>";

                    // start to add footer level column options

                    $tablestring .= "<div class='col_opt_row' id='footer_text'>";
                    $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Footer Content', ARP_PT_TXTDOMAIN) . "</div>";
                    $tablestring .= "<div class='col_opt_input_div'>";
                    $tablestring .= "<ul class='column_tabs'>";
                    $tablestring .= "<li class='option_title selected toggle_step_first_tab' id='footer_caption_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"footer_caption_yearly_tab\", \"footer_caption_monthly_tab\", \"footer_caption_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
                    $tablestring .= "<li class='option_title toggle_step_second_tab' id='footer_caption_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"footer_caption_monthly_tab\", \"footer_caption_yearly_tab\", \"footer_caption_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
                    $tablestring .= "<li class='option_title toggle_step_third_tab' id='footer_caption_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"footer_caption_quarterly_tab\", \"footer_caption_monthly_tab\", \"footer_caption_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
                    $tablestring .= "</ul>";

                    if (isset($columns['footer_content']) && $columns['footer_content']) {
                        $footer_content_db = $columns['footer_content'];
                    } else {
                        $footer_content_db = '';
                    }

                    $tablestring .= "<div class='option_tab' id='footer_caption_yearly_tab'>";
                    $tablestring .= "<textarea name='footer_content_" . $col_no[1] . "' id='footer_content' data-column='main_" . $j . "' class='col_opt_textarea footer_caption_content_first' >$footer_content_db";
                    $tablestring .= "</textarea>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='option_tab' id='footer_caption_monthly_tab' style='display:none;'>";
                    $tablestring .= "<textarea name='footer_content_second_" . $col_no[1] . "' id='footer_caption_content_second' data-column='main_" . $j . "'  class='col_opt_textarea footer_caption_content_second'>";
                    $tablestring .= @$columns['footer_content_second'];
                    $tablestring .= "</textarea>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='option_tab' id='footer_caption_quarterly_tab' style='display:none;'>";
                    $tablestring .= "<textarea name='footer_content_third_" . $col_no[1] . "' id='footer_caption_content_third' data-column='main_" . $j . "' class='col_opt_textarea footer_caption_content_third'>";
                    $tablestring .= @$columns['footer_content_third'];
                    $tablestring .= "</textarea>";
                    $tablestring .= "</div>";

                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    $footer_text_align = isset($columns['footer_text_align']) ? $columns['footer_text_align'] : 'center';
                    $tablestring .= $arprice_form->arp_create_alignment_div('footer_text_alignment', $footer_text_align, 'arp_footer_text_alignment', $col_no[1], 'footer_section');

                    $tablestring .= "<div class='col_opt_row' id='footer_level_options_font_family'>";
                    $tablestring .= "<div class='col_opt_title_div'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
                    $tablestring .= "<div class='col_opt_input_div'>";

                    $tablestring .= "<input type='hidden' id='footer_level_options_font_family' name='footer_level_options_font_family_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . $columns['footer_level_options_font_family'] . "' />";
                    $tablestring .= "<dl class='arp_selectbox column_level_dd' data-name='footer_level_options_font_family_" . $col_no[1] . "' data-id='footer_level_options_font_family_" . $col_no[1] . "'>";
                    $tablestring .= "<dt><span>" . $columns['footer_level_options_font_family'] . "</span><input type='text' style='display:none;' value='" . $columns['footer_level_options_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
                    $tablestring .= "<dd>";
                    $tablestring .= "<ul data-id='footer_level_options_font_family' data-column='" . $j . "'>";
                    $tablestring .= "</ul>";
                    $tablestring .= "</dd>";
                    $tablestring .= "</dl>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";



                    $tablestring .= "<div class='col_opt_row' id='footer_level_options_font_size'>";
                    //font size section start 
                    $tablestring .= "<div class='btn_type_size'>";
                    $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
                    $tablestring .= "<div class='col_opt_input_div two_column'>";

                    $tablestring .= "<input type='hidden' id='footer_level_options_font_size' data-column='main_" . $j . "' name='footer_level_options_font_size_" . $col_no[1] . "' value='" . $columns['footer_level_options_font_size'] . "' />";
                    $tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='footer_level_options_font_size_" . $col_no[1] . "' data-id='footer_level_options_font_size_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
                    $tablestring .= "<dt><span>" . $columns['footer_level_options_font_size'] . "</span><input type='text' style='display:none;' value='" . $columns['footer_level_options_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
                    $tablestring .= "<dd>";
                    $size_arr = array();
                    $tablestring .= "<ul data-id='footer_level_options_font_size' data-column='" . $j . "'>";
                    for ($s = 8; $s <= 20; $s++)
                        $size_arr[] = $s;
                    for ($st = 22; $st <= 70; $st+=2)
                        $size_arr[] = $st;
                    foreach ($size_arr as $size) {
                        $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
                    }
                    $tablestring .= "</ul>";
                    $tablestring .= "</dd>";
                    $tablestring .= "</dl>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    //font size section end 



                    $tablestring .= "</div>";



                    //footer level options font style starts 
                    $tablestring .= "<div class='col_opt_row' id='footer_level_options_font_style'>";
                    $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";
                    $tablestring .= "<div class='col_opt_input_div' data-level='footer_level_options_font_style' level-id='footer_level_options_font_style' >";
                    //check selected for bold

                    if ($columns['footer_level_options_font_style_bold'] == 'bold') {
                        $column1_style_bold_selected = 'selected';
                    } else {
                        $column1_style_bold_selected = '';
                    }

                    //check selected for italic

                    if ($columns['footer_level_options_font_style_italic'] == 'italic') {
                        $column1_style_italic_selected = 'selected';
                    } else {
                        $column1_style_italic_selected = '';
                    }

                    //check selected for underline or line-through

                    if ($columns['footer_level_options_font_style_decoration'] == 'underline') {
                        $column1_style_underline_selected = 'selected';
                    } else {
                        $column1_style_underline_selected = '';
                    }

                    if ($columns['footer_level_options_font_style_decoration'] == 'line-through') {
                        $column1_style_linethrough_selected = 'selected';
                    } else {
                        $column1_style_linethrough_selected = '';
                    }



                    $tablestring .= "<div class='arp_style_btn " . $column1_style_bold_selected . " arptooltipster' data-align='left' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-column='main_" . $j . "' id='arp_style_bold' data-id='" . $col_no[1] . "'>";
                    $tablestring .= "<i class='fa fa-bold'></i>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='arp_style_btn " . $column1_style_italic_selected . " arptooltipster' data-align='center' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-column='main_" . $j . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
                    $tablestring .= "<i class='fa fa-italic'></i>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='arp_style_btn " . $column1_style_underline_selected . " arptooltipster' data-align='right' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-column='main_" . $j . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
                    $tablestring .= "<i class='fa fa-underline'></i>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='arp_style_btn " . $column1_style_linethrough_selected . " arptooltipster' data-align='right' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-column='main_" . $j . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
                    $tablestring .= "<i class='fa fa-strikethrough'></i>";
                    $tablestring .= "</div>";

                    $tablestring .= "<input type='hidden' id='footer_level_options_font_style_bold' name='footer_level_options_font_style_bold_" . $col_no[1] . "' value='" . $columns['footer_level_options_font_style_bold'] . "' /> ";
                    $tablestring .= "<input type='hidden' id='footer_level_options_font_style_italic' name='footer_level_options_font_style_italic_" . $col_no[1] . "' value='" . $columns['footer_level_options_font_style_italic'] . "' /> ";
                    $tablestring .= "<input type='hidden' id='footer_level_options_font_style_decoration' name='footer_level_options_font_style_decoration_" . $col_no[1] . "' value='" . $columns['footer_level_options_font_style_decoration'] . "' /> ";
                    

                    $tablestring .= "</div>";

                    //new font style btn ends

                    $tablestring .= "</div>";

                    //footer level options font style ends 



                    $tablestring .= "<div class='col_opt_row arp_ok_div' id='footer_level_options_arp_ok_div__button_1'>";
                    $tablestring .= "<div class='col_opt_btn_div'>";
                    $tablestring .= "<div class='col_opt_navigation_div'>";
                    $tablestring .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='footer_left_arrow' data-column='{$col_no[1]}' data-button-id='footer_level_options__button_1'></i>&nbsp;";
                    $tablestring .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='footer_right_arrow' data-column='{$col_no[1]}' data-button-id='footer_level_options__button_1'></i>&nbsp;";
                    $tablestring .= "</div>";
                    $tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
                    $tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
                    $tablestring .= "</button>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    // end footer level column options


                    $tablestring .= '</div>';


                    $tablestring .= "<div class='column_option_div' level-id='header_level_options__button_1' style='display:none;'>";

                    $tablestring .= "<div class='col_opt_row' id='column_title'>";
                    $tablestring .= "<div class='col_opt_title_div'>" . __('Column Title', ARP_PT_TXTDOMAIN) . "</div>";
                    $tablestring .= "<div class='col_opt_input_div'>";
                    $tablestring .= "<ul class='column_tabs'>";
                    $tablestring .= "<li class='option_title selected toggle_step_first_tab' id='header_caption_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"header_caption_yearly_tab\", \"header_caption_monthly_tab\", \"header_caption_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
                    $tablestring .= "<li class='option_title toggle_step_second_tab' id='header_caption_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"header_caption_monthly_tab\", \"header_caption_yearly_tab\", \"header_caption_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
                    $tablestring .= "<li class='option_title toggle_step_third_tab' id='header_caption_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"header_caption_quarterly_tab\", \"header_caption_monthly_tab\", \"header_caption_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
                    $tablestring .= "</ul>";
                    $tablestring .= "<div class='option_tab' id='header_caption_yearly_tab'>";
                    $tablestring .= "<textarea name='html_content_0' id='column_caption_title_input' class='col_opt_textarea column_caption_title_input_first' data-column='main_column_0'>";
                    $tablestring .= $columns['html_content'];
                    $tablestring .= "</textarea>";
                    $tablestring .= "</div>";
                    $tablestring .= "<div class='option_tab' id='header_caption_monthly_tab' style='display:none;'>";
                    $tablestring .= "<textarea name='html_content_second_0' id='column_caption_title_input_second' class='col_opt_textarea column_caption_title_input_second' data-column='main_column_0'>";
                    $tablestring .= @$columns['html_content_second'];
                    $tablestring .= "</textarea>";
                    $tablestring .= "</div>";
                    $tablestring .= "<div class='option_tab' id='header_caption_quarterly_tab' style='display:none;'>";
                    $tablestring .= "<textarea name='html_content_third_0' id='column_caption_title_input_third' class='col_opt_textarea column_caption_title_input_third' data-column='main_column_0'>";
                    $tablestring .= @$columns['html_content_third'];
                    $tablestring .= "</textarea>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    $tablestring .= "<div class='col_opt_button'>";
                    if (is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['caption_column_buttons']['header_level_options__button_1'])) {
                        if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['caption_column_buttons']['header_level_options__button_1'])) {
                            $tablestring .= "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='add_header_object_" . $col_no[1] . "' id='add_arp_object' data-insert='column_caption_title_input' data-column='main_" . $j . "' title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "'>";
                            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";

                            $tablestring .= "</button>";
                            $tablestring .= "<label style='float:left;width:10px;'>&nbsp;</label>";

                            $tablestring .= "<div class='arp_add_image_container'>";
                            $tablestring .= "<div class='arp_add_image_arrow'></div>";
                            $tablestring .= "<div class='arp_add_img_content'>";

                            $tablestring .= "<div class='arp_add_img_row'>";
                            $tablestring .= "<div class='arp_add_img_label'>";
                            $tablestring .= __('Image URL', ARP_PT_TXTDOMAIN);
                            $tablestring .= "<span class='arp_model_close_btn' id='arp_add_image_container'><i class='fa fa-times'></i></span>";
                            $tablestring .= "</div>";
                            $tablestring .= "<div class='arp_add_img_option'>";
                            $tablestring .= "<input type='text' value='' class='arp_modal_txtbox img' id='arp_header_image_url' name='arp_header_image_url' />";
                            $tablestring .= "<button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'>";
                            $tablestring .= __('Add File', ARP_PT_TXTDOMAIN);
                            $tablestring .= "</button>";
                            $tablestring .= "</div>";
                            $tablestring .= "</div>";

                            $tablestring .= "<div class='arp_add_img_row'>";
                            $tablestring .= "<div class='arp_add_img_label'>";
                            $tablestring .= __('Dimension ( height X width )', ARP_PT_TXTDOMAIN);
                            $tablestring .= "</div>";
                            $tablestring .= "<div class='arp_add_img_option'>";
                            $tablestring .= "<input type='text' class='arp_modal_txtbox' id='arp_header_image_height' name='arp_header_image_height' /><label class='arp_add_img_note'>(px)</label>";
                            $tablestring .= "<label>x</label>";
                            $tablestring .= "<input type='text' class='arp_modal_txtbox' id='arp_header_image_width' name='arp_header_image_width' /><label class='arp_add_img_note'>(px)</label>";
                            $tablestring .= "</div>";
                            $tablestring .= "</div>";

                            $tablestring .= "<div class='arp_add_img_row' style='margin-top:10px;'>";
                            $tablestring .= "<div class='arp_add_img_label'>";
                            $tablestring .= '<button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_image_btn">';
                            $tablestring .= __('Add', ARP_PT_TXTDOMAIN);
                            $tablestring .= '</button>';
                            $tablestring .= '<button type="button" style="display:none;margin-right:10px;" onclick="arp_remove_object();" class="arp_modal_insert_shortcode_btn" name="arp_remove_img_btn" id="arp_remove_img_btn">';
                            $tablestring .= __('Remove', ARP_PT_TXTDOMAIN);
                            $tablestring .= '</button>';
                            $tablestring .= "</div>";
                            $tablestring .= "</div>";

                            $tablestring .= "</div>";
                            $tablestring .= "</div>";
                        }
                    }
                    if (is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['caption_column_buttons']['header_level_options__button_1'])) {
                        if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['caption_column_buttons']['header_level_options__button_1'])) {

                            $tablestring .= "<button type='button' class='col_opt_btn_icon add_header_fontawesome arptooltipster align_left' name='add_header_fontawesome_" . $col_no[1] . "' id='add_header_fontawesome' data-insert='column_caption_title_input' data-column='main_" . $j . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
                            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
                            $tablestring .= "</button>";
                        }
                    }
                    $tablestring .= "<div class='arp_font_awesome_model_box_container'>";

                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    $header_text_align = isset($columns['header_font_align']) ? $columns['header_font_align'] : 'center';
                    $tablestring .= $arprice_form->arp_create_alignment_div('header_text_alignment', $header_text_align, 'arp_header_text_alignment', $col_no[1], 'header_section');


                    $tablestring .= "<div class='col_opt_row' id='header_caption_font_family'>";
                    $tablestring .= "<div class='col_opt_title_div'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
                    $tablestring .= "<div class='col_opt_input_div'>";

                    $tablestring .= "<input type='hidden' id='header_font_family' name='header_font_family_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . $columns['header_font_family'] . "' />";
                    $tablestring .= "<dl class='arp_selectbox column_level_dd' data-name='header_font_family_" . $col_no[1] . "' data-id='header_font_family_" . $col_no[1] . "'>";
                    $tablestring .= "<dt><span>" . $columns['header_font_family'] . "</span><input type='text' style='display:none;' value='" . $columns['header_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
                    $tablestring .= "<dd>";
                    $tablestring .= "<ul data-id='header_font_family' data-column='" . $j . "'>";

                    $tablestring .= "</ul>";
                    $tablestring .= "</dd>";
                    $tablestring .= "</dl>";
                    $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_caption_header_font_family_preview' href='" . $googlefontpreviewurl . $columns['header_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='col_opt_row' id='header_caption_font_size'>";
                    $tablestring .= "<div class='btn_type_size'>";
                    $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
                    $tablestring .= "<div class='col_opt_input_div two_column'>";

                    $tablestring .= "<input type='hidden' id='header_font_size' name='header_font_size_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . $columns['header_font_size'] . "' />";
                    $tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='header_font_size_" . $col_no[1] . "' data-id='header_font_size_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
                    $tablestring .= "<dt><span>" . $columns['header_font_size'] . "</span><input type='text' style='display:none;' value='" . $columns['header_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
                    $tablestring .= "<dd>";
                    $size_arr = '';
                    $tablestring .= "<ul data-id='header_font_size' data-column='" . $j . "'>";
                    for ($s = 8; $s <= 20; $s++)
                        $size_arr[] = $s;
                    for ($st = 22; $st <= 70; $st+=2)
                        $size_arr[] = $st;
                    foreach ($size_arr as $size) {
                        $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
                    }
                    $tablestring .= "</ul>";
                    $tablestring .= "</dd>";
                    $tablestring .= "</dl>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    $tablestring .= "</div>";

                    $tablestring .= "<div class='col_opt_row' id='header_caption_font_color'>";
                    $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";


                    $tablestring .= "<div class='col_opt_input_div' data-level='header_level_options' level-id='header_button1' >";



                    $tablestring .= "<div class='arp_style_btn arptooltipster " . ($columns['header_style_bold'] == 'bold' ? 'selected' : '') . "' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-align='left' data-column='main_" . $j . "' id='arp_style_bold' data-id='" . $col_no[1] . "'>";
                    $tablestring .= "<i class='fa fa-bold'></i>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='arp_style_btn arptooltipster " . ($columns['header_style_italic'] == 'italic' ? 'selected' : '') . "' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-align='center' data-column='main_" . $j . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
                    $tablestring .= "<i class='fa fa-italic'></i>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='arp_style_btn arptooltipster " . ($columns['header_style_decoration'] == 'underline' ? 'selected' : '') . "' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
                    $tablestring .= "<i class='fa fa-underline'></i>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='arp_style_btn arptooltipster " . ($columns['header_style_decoration'] == 'line-through' ? 'selected' : '') . "' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
                    $tablestring .= "<i class='fa fa-strikethrough'></i>";
                    $tablestring .= "</div>";



                    $tablestring .= "<input type='hidden' id='header_style_bold' name='header_style_bold_" . $col_no[1] . "' value='" . $columns['header_style_bold'] . "' /> ";
                    $tablestring .= "<input type='hidden' id='header_style_italic' name='header_style_italic_" . $col_no[1] . "' value='" . $columns['header_style_italic'] . "' /> ";
                    $tablestring .= "<input type='hidden' id='header_style_decoration' name='header_style_decoration_" . $col_no[1] . "' value='" . $columns['header_style_decoration'] . "' /> ";



                    $tablestring .= "</div>";


                    $tablestring .= "</div>";

                    $tablestring .= "<div class='col_opt_row arp_ok_div' id='header_level_caption_arp_ok_div__button_1' >";
                    $tablestring .= "<div class='col_opt_btn_div'>";
                    $tablestring .= "<div class='col_opt_navigation_div'>";
                    $tablestring .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='header_left_arrow' data-button-id='header_level_options__button_1' data-column='{$col_no[1]}'></i>&nbsp;";
                    $tablestring .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='header_right_arrow' data-button-id='header_level_options__button_1' data-column='{$col_no[1]}'></i>&nbsp;";
                    $tablestring .= "</div>";
                    $tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
                    $tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
                    $tablestring .= "</button>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    $tablestring .= "</div>";




                    $tablestring .= "<div class='column_option_div' level-id='body_level_options__button_1' style='display:none;'>";

                    $tablestring .= "<div class='col_opt_row' id='text_alignment'>";
                    $tablestring .= "<div class='col_opt_title_div'>" . __('Text Alignment', ARP_PT_TXTDOMAIN) . "</div>";
                    $tablestring .= "<div class='col_opt_input_div'>";

                    $alignment = $columns['body_text_alignment'];

                    $left_selected = ($alignment == 'left') ? 'align_selected' : '';
                    $center_selected = ($alignment == 'center') ? 'align_selected' : '';
                    $right_selected = ($alignment == 'right') ? 'align_selected' : '';

                    $tablestring .= "<div class='alignment_btn align_left_btn " . $left_selected . "' data-align='left' id='align_left_btn' data-id='" . $col_no[1] . "'>";
                    $tablestring .= "<i class='fa fa-align-left fa-flip-vertical'></i>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='alignment_btn align_center_btn " . $center_selected . "' data-align='center' id='align_center_btn' data-id='" . $col_no[1] . "'>";
                    $tablestring .= "<i class='fa fa-align-center fa-flip-vertical'></i>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='alignment_btn align_right_btn " . $right_selected . "' data-align='right' id='align_right_btn' data-id='" . $col_no[1] . "'>";
                    $tablestring .= "<i class='fa fa-align-right fa-flip-vertical'></i>";
                    $tablestring .= "</div>";

                    $tablestring .= "<input type='hidden' id='body_text_alignment' value='" . $alignment . "' name='body_text_alignment_" . $col_no[1] . "'>";

                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='col_opt_row' id='body_li_caption_alternate_bgcolor'>";

                    $tablestring .= "</div>";

                    $tablestring .= "<div class='col_opt_row' id='body_li_caption_font_family'>";
                    $tablestring .= "<div class='col_opt_title_div'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
                    $tablestring .= "<div class='col_opt_input_div'>";

                    $tablestring .= "<input type='hidden' id='content_font_family' name='content_font_family_" . $col_no[1] . "' value='" . $columns['content_font_family'] . "' data-column='main_" . $j . "' />";
                    $tablestring .= "<dl class='arp_selectbox column_level_dd' data-name='content_font_family_" . $col_no[1] . "' data-id='content_font_family_" . $col_no[1] . "'>";
                    $tablestring .= "<dt><span>" . $columns['content_font_family'] . "</span><input type='text' style='display:none;' value='" . $columns['content_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
                    $tablestring .= "<dd>";
                    $tablestring .= "<ul data-id='content_font_family' data-column='" . $j . "'>";

                    $tablestring .= "</ul>";
                    $tablestring .= "</dd>";
                    $tablestring .= "</dl>";
                    $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_content_font_family_preview' href='" . $googlefontpreviewurl . $columns['content_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";


                    $tablestring .= "<div class='col_opt_row' id='body_li_caption_font_size'>";
                    $tablestring .= "<div class='btn_type_size'>";
                    $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
                    $tablestring .= "<div class='col_opt_input_div two_column'>";

                    $tablestring .= "<input type='hidden' id='content_font_size' name='content_font_size_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . $columns['content_font_size'] . "' />";
                    $tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='content_font_size_" . $col_no[1] . "' data-id='content_font_size_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
                    $tablestring .= "<dt><span>" . $columns['content_font_size'] . "</span><input type='text' style='display:none;' value='" . $columns['content_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
                    $tablestring .= "<dd>";
                    $size_arr = array();
                    $tablestring .= "<ul data-id='content_font_size' data-column='" . $j . "'>";
                    for ($s = 8; $s <= 20; $s++)
                        $size_arr[] = $s;
                    for ($st = 22; $st <= 70; $st+=2)
                        $size_arr[] = $st;
                    foreach ($size_arr as $size) {
                        $tablestring .= "<li data-value='" . $size . "' data-label='" . $size . "'>" . $size . "</li>";
                    }
                    $tablestring .= "</ul>";
                    $tablestring .= "</dd>";
                    $tablestring .= "</dl>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    $tablestring .= "</div>";

                    $tablestring .= "<div class='col_opt_row' id='body_li_caption_font_color'>";
                    $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";



                    $tablestring .= "<div class='col_opt_input_div' data-level='body_level_options' level-id='bodylevel_button1' >";



                    $tablestring .= "<div class='arp_style_btn arptooltipster " . ($columns['body_li_style_bold'] == 'bold' ? 'selected' : '') . "' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-align='left' data-column='main_" . $j . "' id='arp_style_bold' data-id='" . $col_no[1] . "'>";
                    $tablestring .= "<i class='fa fa-bold'></i>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='arp_style_btn arptooltipster " . ($columns['body_li_style_italic'] == 'italic' ? 'selected' : '') . "' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-align='center' data-column='main_" . $j . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
                    $tablestring .= "<i class='fa fa-italic'></i>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='arp_style_btn arptooltipster " . ($columns['body_li_style_decoration'] == 'underline' ? 'selected' : '') . "' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
                    $tablestring .= "<i class='fa fa-underline'></i>";
                    $tablestring .= "</div>";

                    $tablestring .= "<div class='arp_style_btn arptooltipster " . ($columns['body_li_style_decoration'] == 'line-through' ? 'selected' : '') . "' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
                    $tablestring .= "<i class='fa fa-strikethrough'></i>";
                    $tablestring .= "</div>";



                    $tablestring .= "<input type='hidden' id='body_li_style_bold' name='body_li_style_bold_" . $col_no[1] . "' value='" . $columns['body_li_style_bold'] . "' /> ";
                    $tablestring .= "<input type='hidden' id='body_li_style_italic' name='body_li_style_italic_" . $col_no[1] . "' value='" . $columns['body_li_style_italic'] . "' /> ";
                    $tablestring .= "<input type='hidden' id='body_li_style_decoration' name='body_li_style_decoration_" . $col_no[1] . "' value='" . $columns['body_li_style_decoration'] . "' /> ";




                    $tablestring .= "</div>";

                    //new font style btn ends
                    $tablestring .= "</div>";


                    $tablestring .= "<div class='col_opt_row arp_ok_div' id='body_level_caption_arp_ok_div__button_1' >";
                    $tablestring .= "<div class='col_opt_btn_div'>";
                    $tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
                    $tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
                    $tablestring .= "</button>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";

                    $tablestring .= "</div>";


                    $tablestring .= "<input type='hidden' id='total_rows' value='" . count($columns['rows']) . "' name='total_rows_" . $col_no[1] . "' />";

                    $tablestring .= "<div class='column_option_div' level-id='body_li_level_options__button_1' style='display:none;'>";

                    foreach ($columns['rows'] as $n => $row) {
                        $row_no = explode('_', $n);
                        $splitedid = explode('_', $n);



                        $tablestring .= "<div class='arp_row_wrapper' id='arp_" . $n . "' style='display:none;'>";

                        $tablestring .= "<div class='col_opt_row arp_" . $n . "' id='description" . $splitedid[1] . "' >";
                        $tablestring .= "<div class='col_opt_title_div'>" . __('Description', ARP_PT_TXTDOMAIN) . "</div>";
                        $tablestring .= "<div class='col_opt_input_div'>";
                        $tablestring .= "<ul class='column_tabs'>";
                        $tablestring .= "<li class='option_title selected toggle_step_first_tab' id='description_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"description_yearly_tab\", \"description_monthly_tab\", \"description_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
                        $tablestring .= "<li class='option_title toggle_step_second_tab' id='description_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"description_monthly_tab\", \"description_yearly_tab\", \"description_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
                        $tablestring .= "<li class='option_title toggle_step_third_tab' id='description_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"description_quarterly_tab\", \"description_monthly_tab\", \"description_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
                        $tablestring .= "</ul>";
                        $tablestring .= "<div class='option_tab' id='description_yearly_tab'>";
                        $tablestring .= "<textarea id='arp_li_description' col-id=" . $col_no[1] . " class='col_opt_textarea row_description_first' name='row_" . $col_no[1] . "_description_" . $row_no[1] . "'>";
                        $tablestring .= stripslashes_deep($row['row_description']);
                        $tablestring .= "</textarea>";
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='option_tab' id='description_monthly_tab' style='display:none;'>";
                        $tablestring .= "<textarea id='row_description_second' col-id=" . $col_no[1] . " class='col_opt_textarea row_description_second' name='row_" . $col_no[1] . "_description_second_" . $row_no[1] . "'>";
                        $tablestring .= stripslashes_deep(@$row['row_description_second']);
                        $tablestring .= "</textarea>";
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='option_tab' id='description_quarterly_tab' style='display:none;'>";
                        $tablestring .= "<textarea id='row_description_third' col-id=" . $col_no[1] . " class='col_opt_textarea row_description_third' name='row_" . $col_no[1] . "_description_third_" . $row_no[1] . "'>";
                        $tablestring .= stripslashes_deep(@$row['row_description_third']);
                        $tablestring .= "</textarea>";
                        $tablestring .= "</div>";
                        $tablestring .= "</div>";
                        if ($row['row_des_style_bold'] == 'bold') {
                            $bodylevel_li_style_bold_selected = 'selected';
                        } else {
                            $bodylevel_li_style_bold_selected = '';
                        }

//check selected for italic

                        if ($row['row_des_style_italic'] == 'italic') {
                            $bodylevel_li_style_italic_selected = 'selected';
                        } else {
                            $bodylevel_li_style_italic_selected = '';
                        }

//check selected for underline or line-through

                        if ($row['row_des_style_decoration'] == 'underline') {
                            $bodylevel_li_style_underline_selected = 'selected';
                        } else {
                            $bodylevel_li_style_underline_selected = '';
                        }

                        if ($row['row_des_style_decoration'] == 'line-through') {
                            $bodylevel_li_style_linethrough_selected = 'selected';
                        } else {
                            $bodylevel_li_style_linethrough_selected = '';
                        }

                        $tablestring .= "</div>";

                        //li level objects

                        $tablestring .= "<div class='col_opt_row arp_" . $n . "' id='body_li_add_shortcode" . $splitedid[1] . "' >";
                        $tablestring .= "<div class='col_opt_btn_div'>";

                        $tablestring .= "<button type='button' class='col_opt_btn_icon arp_add_row_object arptooltipster align_left' name='" . $col_no[1] . "_add_body_li_object_" . $row_no[1] . "' id='arp_add_row_object' data-insert='arp_" . $n . " textarea#arp_li_description' data-column='main_" . $j . "' title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "'>";
                        $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";
                        $tablestring .= "</button>";

                        $tablestring .= "<label style='float:left;width:10px;'>&nbsp;</label>";

                        $tablestring .= "<div class='arp_add_image_container'>";
                        $tablestring .= "<div class='arp_add_image_arrow'></div>";
                        $tablestring .= "<div class='arp_add_img_content'>";

                        $tablestring .= "<div class='arp_add_img_row'>";
                        $tablestring .= "<div class='arp_add_img_label'>";
                        $tablestring .= __('Image URL', ARP_PT_TXTDOMAIN);
                        $tablestring .= "<span class='arp_model_close_btn' id='arp_add_image_container'><i class='fa fa-times'></i></span>";
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='arp_add_img_option'>";
                        $tablestring .= "<input type='text' value='' class='arp_modal_txtbox img' id='arp_header_image_url' name='arp_header_image_url' />";
                        $tablestring .= "<button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'>";
                        $tablestring .= __('Add File', ARP_PT_TXTDOMAIN);
                        $tablestring .= "</button>";
                        $tablestring .= "</div>";
                        $tablestring .= "</div>";

                        $tablestring .= "<div class='arp_add_img_row'>";
                        $tablestring .= "<div class='arp_add_img_label'>";
                        $tablestring .= __('Dimension ( height X width )', ARP_PT_TXTDOMAIN);
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='arp_add_img_option'>";
                        $tablestring .= "<input type='text' class='arp_modal_txtbox' id='arp_header_image_height' name='arp_header_image_height' /><label class='arp_add_img_note'>(px)</label>";
                        $tablestring .= "<label>x</label>";
                        $tablestring .= "<input type='text' class='arp_modal_txtbox' id='arp_header_image_width' name='arp_header_image_width' /><label class='arp_add_img_note'>(px)</label>";
                        $tablestring .= "</div>";
                        $tablestring .= "</div>";

                        $tablestring .= "<div class='arp_add_img_row' style='margin-top:10px;'>";
                        $tablestring .= "<div class='arp_add_img_label'>";
                        $tablestring .= '<button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_image_btn">';
                        $tablestring .= __('Add', ARP_PT_TXTDOMAIN);
                        $tablestring .= '</button>';
                        $tablestring .= '<button type="button" style="display:none;margin-right:10px;" onclick="arp_remove_object();" class="arp_modal_insert_shortcode_btn" name="arp_remove_img_btn" id="arp_remove_img_btn">';
                        $tablestring .= __('Remove', ARP_PT_TXTDOMAIN);
                        $tablestring .= '</button>';
                        $tablestring .= "</div>";
                        $tablestring .= "</div>";

                        $tablestring .= "</div>";
                        $tablestring .= "</div>";


                        $tablestring .= "<button type='button' class='col_opt_btn_icon align_left arptooltipster arp_add_row_shortcode' id='arp_add_row_shortcode' name='row_" . $col_no[1] . "_add_description_shortcode_btn_" . $row_no[1] . "' col-id=" . $col_no[1] . " data-id='" . $col_no[1] . "' data-row-id='' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
                        $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
                        $tablestring .= "</button>";

                        $tablestring .= "<div class='arp_font_awesome_model_box_container'>";
                        $tablestring .= "</div>";

                        $tablestring .= "</div>";
                        $tablestring .= "</div>";

                        $tablestring .= "<div class='col_opt_row arp_" . $n . "' id='row_level_custom_css" . $splitedid[1] . "'>";
                        $tablestring .= "<div class='col_opt_title_div'>" . __('Custom Css', ARP_PT_TXTDOMAIN) . "</div>";
                        $tablestring .= "<style id=arp_row_css_column_" . $col_no[1] . "_row_" . $row_no[1] . " class='arp_row_custom_css'>";
                        $row_inline_script_old = isset($row['row_custom_css']) ? $row['row_custom_css'] : '';
                        $row_inline_script_old = trim($row_inline_script_old);
                        $row_inline_script_old = str_replace("/\r|\n/", "", $row_inline_script_old);
                        $row_inline_script_old = explode(';', $row_inline_script_old);
                        $row_inline_script = '';
                        if (!empty($row_inline_script_old)) {
                            foreach ($row_inline_script_old as $new_css) {
                                if ($new_css != '') {
                                    $new_css = explode(':', $new_css);
                                    $row_inline_script .= $new_css[0] . ' : ' . trim(str_replace("!important", "", $new_css[1])) . ' !important;';
                                }
                            }
                        }
                        $tablestring .= " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_transition.style_column_" . $col_no[1] . " ul.arp_opt_options li#arp_row_" . $row_no[1] . "{" . $row_inline_script;
                        $tablestring .= "}</style>";
                        $tablestring .= "<div class='col_opt_input_div'>";
                        $tablestring .= "<ul class='column_tabs_row_css' id='column_tabs_row_css_" . $row_no[1] . "'>";
                        $tablestring .= "<li class='option_title selected' id='normal_css' data-column='" . $col_no[1] . "' onClick='arp_row_css_tabs_select(\"normal_css\", \"hover_css\",\"$col_no[1]\",\"$row_no[1]\")'>" . __('Normal State', ARP_PT_TXTDOMAIN) . "</li>";
                        $tablestring .= "<li class='option_title' id='hover_css' data-column='" . $col_no[1] . "' onClick='arp_row_css_tabs_select(\"hover_css\", \"normal_css\",\"$col_no[1]\",\"$row_no[1]\")'>" . __('Hover State', ARP_PT_TXTDOMAIN) . "</li>";
                        $tablestring .= "</ul>";
                        $tablestring .= "<textarea id='arp_row_level_custom_css' col-id=" . $col_no[1] . " row-id='" . $row_no[1] . "' class='col_opt_textarea' name='row_" . $col_no[1] . "_custom_css_" . $row_no[1] . "'>";
                        $tablestring .= stripslashes_deep(isset($row['row_custom_css']) ? $row['row_custom_css'] : '');
                        $tablestring .= "</textarea>";
                        $tablestring .= "<textarea id='arp_row_level_hover_custom_css' col-id=" . $col_no[1] . " row-id='" . $row_no[1] . "' class='col_opt_textarea' name='row_hover_" . $col_no[1] . "_custom_css_" . $row_no[1] . "'  style='display:none;'>";
                        $tablestring .= stripslashes_deep(isset($row['row_hover_custom_css']) ? $row['row_hover_custom_css'] : '');
                        $tablestring .= "</textarea>";
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='col_opt_input_div'>";
                        $tablestring .= "<div class='col_opt_title_div'>" . __('For Example', ARP_PT_TXTDOMAIN) . "</div>";
                        $tablestring .= "<div class='arp_row_custom_css' data-code='color:#c9c9c9;' style='width:13%;'>color</div>";
                        $tablestring .= "<div class='arp_row_custom_css' data-code='font-size:20px;' style='width:21%;'>font-size</div>";
                        $tablestring .= "<div class='arp_row_custom_css' data-code='text-align:center;' style='width:25%;'>alignment</div>";
                        $tablestring .= "<div class='arp_row_custom_css' data-code='font-weight:bold;'>font-weight</div>";
                        $tablestring .= "</div>";
                        $tablestring .= "</div>";

                        $tablestring .= "<div class='col_opt_row arp_ok_div arp_" . $n . "' id='body_li_level_caption_arp_ok_div__button_1" . $splitedid[1] . "' >";
                        $tablestring .= "<div class='col_opt_btn_div'>";
                        $tablestring .= "<div class='col_opt_navigation_div'>";
                        $tablestring .= "<i class='typcn typcn-arrow-up arp_navigation_arrow' id='row_up_arrow' data-row-id='arp_{$n}' data-column='{$col_no[1]}' data-button-id='body_li_level_options__button_1'></i>&nbsp;";
                        $tablestring .= "<i class='typcn typcn-arrow-down arp_navigation_arrow' id='row_down_arrow' data-row-id='arp_{$n}' data-column='{$col_no[1]}' data-button-id='body_li_level_options__button_1'></i>&nbsp;";
                        $tablestring .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='row_left_arrow' data-row-id='arp_{$n}' data-column='{$col_no[1]}' data-button-id='body_li_level_options__button_1'></i>&nbsp;";
                        $tablestring .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='row_right_arrow' data-row-id='arp_{$n}' data-column='{$col_no[1]}' data-button-id='body_li_level_options__button_1'></i>&nbsp;";
                        $tablestring .= "</div>";
                        $tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
                        $tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
                        $tablestring .= "</button>";
                        $tablestring .= "</div>";
                        $tablestring .= "</div>";

                        $tablestring .= "</div>";

                        // BODY LI TOOLTIP
                    }

                    $tablestring .= "</div>";

                    $tablestring .= "<div class='column_option_div' level-id='body_li_level_options__button_2' style='display:none;'>";
                    foreach ($columns['rows'] as $n => $row) {
                        $row_no = explode('_', $n);
                        $splitedid = explode('_', $n);

                        $tablestring .= "<div class='arp_tooltip_wrapper' id='arp_" . $n . "' style='display:none;' >";

                        $tablestring .= "<div class='col_opt_row arp_" . $n . "' id='tooltip" . $splitedid[1] . "' >";
                        $tablestring .= "<div class='col_opt_title_div'>" . __('Tooltip', ARP_PT_TXTDOMAIN) . "</div>";
                        $tablestring .= "<div class='col_opt_input_div'>";
                        $tablestring .= "<ul class='column_tabs'>";
                        $tablestring .= "<li class='option_title selected toggle_step_first_tab' id='tooltip_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"tooltip_yearly_tab\", \"tooltip_monthly_tab\", \"tooltip_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
                        $tablestring .= "<li class='option_title toggle_step_second_tab' id='tooltip_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"tooltip_monthly_tab\", \"tooltip_yearly_tab\", \"tooltip_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
                        $tablestring .= "<li class='option_title toggle_step_third_tab' id='tooltip_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"tooltip_quarterly_tab\", \"tooltip_monthly_tab\", \"tooltip_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
                        $tablestring .= "</ul>";
                        $tablestring .= "<div class='option_tab' id='tooltip_yearly_tab'>";
                        $tablestring .= "<textarea id='arp_li_tooltip' col-id=" . $col_no[1] . " class='col_opt_textarea row_tooltip_first' name='row_" . $col_no[1] . "_tooltip_" . $row_no[1] . "'>";
                        $tablestring .= stripslashes_deep($row['row_tooltip']);
                        $tablestring .= "</textarea>";
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='option_tab' id='tooltip_monthly_tab' style='display:none;'>";
                        $tablestring .= "<textarea id='arp_li_tooltip_second' col-id=" . $col_no[1] . " class='col_opt_textarea row_tooltip_second' name='row_" . $col_no[1] . "_tooltip_second_" . $row_no[1] . "'>";
                        $tablestring .= stripslashes_deep(@$row['row_tooltip_second']);
                        $tablestring .= "</textarea>";
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='option_tab' id='tooltip_quarterly_tab' style='display:none;'>";
                        $tablestring .= "<textarea id='arp_li_tooltip_third' col-id=" . $col_no[1] . " class='col_opt_textarea row_tooltip_third' name='row_" . $col_no[1] . "_tooltip_third_" . $row_no[1] . "'>";
                        $tablestring .= stripslashes_deep(@$row['row_tooltip_third']);
                        $tablestring .= "</textarea>";
                        $tablestring .= "</div>";
                        $tablestring .= "</div>";
                        $tablestring .= "</div>";

                        $tablestring .= "<div class='col_opt_row arp_" . $n . "' id='body_tooltip_add_shortcode" . $splitedid[1] . "' >";
                        $tablestring .= "<div class='col_opt_btn_div'>";
                        $tablestring .= "<button type='button' class='col_opt_btn_icon align_left arptooltipster arp_add_tooltip_shortcode' id='arp_add_tooltip_shortcode' name='row_" . $col_no[1] . "_add_tooltip_shortcode_btn_" . $row_no[1] . "' col-id=" . $col_no[1] . " data-id='" . $col_no[1] . "' data-row-id='tooltip_" . $splitedid[1] . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";

                        $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
                        $tablestring .= "</button>";

                        $tablestring .= "<div class='arp_font_awesome_model_box_container'>";

                        $tablestring .= "</div>";
                        $tablestring .= "</div>";
                        $tablestring .= "</div>";

                        $tablestring .= "<div class='col_opt_row arp_ok_div arp_" . $n . "' id='body_li_level_caption_arp_ok_div__button_2" . $splitedid[1] . "' >";
                        $tablestring .= "<div class='col_opt_btn_div'>";
                        $tablestring .= "<div class='col_opt_navigation_div'>";
                        $tablestring .= "<i class='typcn typcn-arrow-up arp_navigation_arrow' id='row_up_arrow' data-column='{$col_no[1]}' data-row-id='arp_{$n}' data-button-id='body_li_level_options__button_2'></i>&nbsp;";
                        $tablestring .= "<i class='typcn typcn-arrow-down arp_navigation_arrow' id='row_down_arrow' data-column='{$col_no[1]}' data-row-id='arp_{$n}' data-button-id='body_li_level_options__button_2'></i>&nbsp;";
                        $tablestring .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='row_left_arrow' data-column='{$col_no[1]}' data-row-id='arp_{$n}' data-button-id='body_li_level_options__button_2'></i>&nbsp;";
                        $tablestring .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='row_right_arrow' data-column='{$col_no[1]}' data-row-id='arp_{$n}' data-button-id='body_li_level_options__button_2'></i>&nbsp;";
                        $tablestring .= "</div>";
                        $tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
                        $tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
                        $tablestring .= "</button>";
                        $tablestring .= "</div>";
                        $tablestring .= "</div>";

                        $tablestring .= "</div>";
                    }
                    $tablestring .= "</div>";

                    $tablestring .= "</div>";

                    $tablestring .= "</div>";


                    $tablestring .= "</div>";

                    $x++;
                } //only for caption column
                else if ($columns['is_caption'] == 1 and $template_feature['caption_style'] == 'style_1') {
                    for ($i = 0; $i <= $maxrowcount; $i++) {
                        $rows = isset($opts['columns'][$j]['rows']['row_' . $i]) ? $opts['columns'][$j]['rows']['row_' . $i] : array();
                        $caption_li[$i] = stripslashes_deep($rows['row_description']);
                    }
                } else if ($columns['is_caption'] == 1 and $template_feature['caption_style'] == 'style_2') {
                    for ($i = 0; $i <= $maxrowcount; $i++) {
                        $rows = isset($opts['columns'][$j]['rows']['row_' . $i]) ? $opts['columns'][$j]['rows']['row_' . $i] : array();
                        $caption_li[$i] = stripslashes_deep($rows['row_description']);
                    }
                }
            }

            $tablestring .= "<div class='arp_allcolumnsdiv' id='arp_allcolumnsdiv' style='float:none'>";

            $c = $x;
            if ($c == 0) {
                $c = $x = 1;
            }
            $new_arr = array();
            if (is_array($col_ord_arr) && count($col_ord_arr) > 0) {
                foreach ($col_ord_arr as $key => $value) {
                    $new_value = str_replace('main_', '', $value);
                    $new_col_id = $new_value;
                    foreach ($opts['columns'] as $j => $columns) {
                        if ($new_col_id == $j) {
                            if ($columns['is_caption'] != 1) {
                                $new_arr['columns'][$new_col_id] = $columns;
                            }
                        }
                    }
                }
            } else {
                $new_arr = $opts;
            }

            $counter = 1;

            foreach ($new_arr['columns'] as $j => $columns) {
                if ($columns['is_caption'] == 0) {
                    $shortcode_class = '';
                    $shortcode_class_array = $arprice_default_settings->arp_shortcode_custom_type();
                    if (isset($columns['arp_shortcode_customization_style'])) {
                        $shortcode_class .= @$columns['arp_shortcode_customization_size'] . ' ' . @$shortcode_class_array[$columns['arp_shortcode_customization_style']]['class'];
                    }
                    $inlinecolumnwidth = "";
                    if ($columns["column_width"] != "") {
                        $inlinecolumnwidth = 'width:' . $columns["column_width"] . 'px';
                    } else {
                        if ($column_settings['is_responsive'] != 1) {
                            $inlinecolumnwidth = $global_column_width;
                        }
                    }
                    $column_highlight = $opts['columns'][$j]['column_highlight'];
                    if ($column_highlight && $column_highlight == 1 and $is_tbl_preview != 2)
                        $highlighted_column = 'column_highlight ';
                    else
                        $highlighted_column = '';

                    $col_no = explode('_', $j);
                    $tablestring .= "<div class='" . $highlighted_column . " ArpPricingTableColumnWrapper arpricemaincolumn no_transition style_" . $j . " " . $hover_class . " " . $animation_class . " $shadow_style' id='main_column_" . $col_no[1] . "'  style='"; /* if($columns['is_hidden'] && $columns['is_hidden'] == 1){ $tablestring .= "display:none !important;"; } */ if ($c == 0) {
                        $tablestring .= "border-left:1px solid #DADADA;";
                    } $tablestring .= $inlinecolumnwidth . "' is_caption='0' data-order='" . $counter . "' data-template_id='" . $ref_template . "' data-level='column_level_options' data-type='other_columns_buttons' "
                            . "data-column-footer-position='{$columns['footer_content_position']}'"
                            . ">";


                    $tablestring .= "<div class='arpplan ";
                    if ($columns['is_caption'] == 1) {
                        $tablestring .= "maincaptioncolumn";
                    } else {
                        $tablestring .= "column_" . $c;
                    } if ($x % 2 == 0) {
                        $tablestring .= " arpdark-bg ArpPriceTablecolumndarkbg";
                    } $tablestring .= "'>";

                    if ($ref_template == 'arptemplate_15' || $ref_template == 'arptemplate_23')
                        $tablestring .= "<div class='arp_template_rocket'><div></div></div>";
                    $columns['ribbon_setting']['arp_ribbon'] = isset($columns['ribbon_setting']['arp_ribbon']) ? $columns['ribbon_setting']['arp_ribbon'] : "";
                    $tablestring .= "<div class='planContainer " . $columns['ribbon_setting']['arp_ribbon'] . "'>";
                    $tablestring .= "<div class='arp_column_content_wrapper'>";
                    $header_cls = '';
                    if ($columns['arp_header_shortcode'] != '')
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
                            $tablestring .= "<style type='text/css' id='arp_ribbon_style_text'>";
                            if (in_array($base_color, $basic_col)) {
                                if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_1') {
                                    $tablestring .= "#main_" . $j . " .arp_ribbon_content:before, #main_" . $j . " .arp_ribbon_content:after{";
                                    $tablestring .= "border-top-color:" . $gradient_color . " !important;";
                                    $tablestring .= "}";
                                }
                                if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3') {
                                    $tablestring .= "#main_" . $j . " .arp_ribbon_content:before, #main_" . $j . " .arp_ribbon_content:after{";
                                    $tablestring .= "border-top-color:" . $base_color . " !important;";
                                    $tablestring .= "}";
                                    $tablestring .= "#main_" . $j . " .arp_ribbon_content{";
                                    $tablestring .= "border-top:75px solid " . $base_color . ";";
                                    $tablestring .= "color:" . $columns['ribbon_setting']['arp_ribbon_txtcol'] . ";";
                                    $tablestring .= "}";
                                } else {
                                    if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_1') {
                                        $tablestring .= ".arp_price_table_" . $template_name . " #main_" . $j . " .{$columns['ribbon_setting']['arp_ribbon']} .arp_ribbon_content{";
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
                                        $tablestring .= "box-shadow:3px 1px 2px rgba(0,0,0,0.6);";
                                        $tablestring .= "color:" . $columns['ribbon_setting']['arp_ribbon_txtcol'] . ";";
                                        $tablestring .= "text-shadow:0 0 1px rgba(0,0,0,0.4);";
                                        $tablestring .= "}";
                                    } else {
                                        $tablestring .= ".arp_price_table_" . $template_name . " #main_" . $j . " .{$columns['ribbon_setting']['arp_ribbon']} .arp_ribbon_content{";
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
                                    $tablestring .= "#main_" . $j . " .arp_ribbon_content:before,#main_" . $j . " .arp_ribbon_content:after{";
                                    $tablestring .= "border-top-color:" . $base_color . "  !important;";
                                    $tablestring .= "}";
                                }
                                if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3') {
                                    $tablestring .= "#main_" . $j . " .arp_ribbon_content{";
                                    $tablestring .= "border-top:75px solid " . $base_color . ";";
                                    $tablestring .= "color:" . $columns['ribbon_setting']['arp_ribbon_txtcol'] . ";";
                                    $tablestring .= "}";
                                } else {
                                    $tablestring .= "#main_" . $j . " .arp_ribbon_content{";
                                    $tablestring .= "background:" . $base_color . ";";
                                    $tablestring .= "color:" . $columns['ribbon_setting']['arp_ribbon_txtcol'] . ";";
                                    $tablestring .= "}";
                                }
                            }
                            $tablestring .= "</style>";
                        }
                        if (($columns['ribbon_setting']['arp_ribbon_content'] != '' && $columns['ribbon_setting']['arp_ribbon'] != 'arp_ribbon_6') || ($columns['ribbon_setting']['arp_custom_ribbon'] != '' && $columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6')) {
                            $tablestring .= "<div id='arp_ribbon_container' class='arp_ribbon_container $one_toggle_selected toggle_step_first arp_ribbon_" . strtolower($columns['ribbon_setting']['arp_ribbon_position']) . " " . $columns['ribbon_setting']['arp_ribbon'] . " ' style='" . $columns_custom_ribbon_position . "' >";

                            $tablestring .= "<div class='arp_ribbon_content  arp_ribbon_" . strtolower($columns['ribbon_setting']['arp_ribbon_position']) . "'>";
                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3')
                                $tablestring .= "<span>";

                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6') {
                                $tablestring .= "<img src='" . $columns['ribbon_setting']['arp_custom_ribbon'] . "' />";
                            } else {
                                $tablestring .= $columns['ribbon_setting']['arp_ribbon_content'];
                            }

                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3')
                                $tablestring .= "</span>";
                            $tablestring .= "</div>";

                            $tablestring .= "</div>";
                        }
                        if (($columns['ribbon_setting']['arp_ribbon_content_second'] != '' && $columns['ribbon_setting']['arp_ribbon'] != 'arp_ribbon_6') || ($columns['ribbon_setting']['arp_custom_ribbon_second'] != '' && $columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6')) {
                            $tablestring .= "<div id='arp_ribbon_container' class='arp_ribbon_container $two_toggle_selected toggle_step_second arp_ribbon_" . strtolower($columns['ribbon_setting']['arp_ribbon_position']) . " " . $columns['ribbon_setting']['arp_ribbon'] . " ' style='" . $columns_custom_ribbon_position . "' >";

                            $tablestring .= "<div class='arp_ribbon_content arp_ribbon_" . strtolower($columns['ribbon_setting']['arp_ribbon_position']) . "'>";
                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3')
                                $tablestring .= "<span>";

                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6') {
                                $tablestring .= "<img src='" . $columns['ribbon_setting']['arp_custom_ribbon_second'] . "' />";
                            } else {
                                $tablestring .= $columns['ribbon_setting']['arp_ribbon_content_second'];
                            }

                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3')
                                $tablestring .= "</span>";
                            $tablestring .= "</div>";

                            $tablestring .= "</div>";
                        }
                        if (($columns['ribbon_setting']['arp_ribbon_content_third'] != '' && $columns['ribbon_setting']['arp_ribbon'] != 'arp_ribbon_6') || ($columns['ribbon_setting']['arp_custom_ribbon_third'] != '' && $columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6')) {
                            $tablestring .= "<div id='arp_ribbon_container' class='arp_ribbon_container $three_toggle_selected toggle_step_third arp_ribbon_" . strtolower($columns['ribbon_setting']['arp_ribbon_position']) . " " . $columns['ribbon_setting']['arp_ribbon'] . " ' style='" . $columns_custom_ribbon_position . "' >";

                            $tablestring .= "<div class='arp_ribbon_content arp_ribbon_" . strtolower($columns['ribbon_setting']['arp_ribbon_position']) . "'>";
                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3')
                                $tablestring .= "<span>";

                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_6') {
                                $tablestring .= "<img src='" . $columns['ribbon_setting']['arp_custom_ribbon_third'] . "' />";
                            } else {
                                $tablestring .= $columns['ribbon_setting']['arp_ribbon_content_third'];
                            }

                            if ($columns['ribbon_setting']['arp_ribbon'] == 'arp_ribbon_3')
                                $tablestring .= "</span>";
                            $tablestring .= "</div>";

                            $tablestring .= "</div>";
                        }
                    }

                    $tablestring .= "<div class='arpcolumnheader " . $header_cls . "'>";
                    if ($template_feature['header_shortcode_position'] == 'default' && ( $ref_template == 'arptemplate_2' or $ref_template == 'arptemplate_5' or $ref_template == 'arptemplate_26' )) {
                        $tablestring .= "<div class='arp_header_selection_new' data-template_id='" . $ref_template . "' data-level='header_level_options' data-type='other_columns_buttons' data-column='main_" . $j . "'>";
                    }
                    if ($template_feature['header_shortcode_position'] == 'position_1') {
                        // start                       

                        if ($template_feature['header_shortcode_position'] == 'position_1' && ( $ref_template == 'arptemplate_8' or $ref_template == 'arptemplate_7' )) {
                            $tablestring .= "<div class='arp_header_selection_new' data-template_id='" . $ref_template . "' data-level='header_level_options' data-type='other_columns_buttons'  data-column='main_" . $j . "'>";
                        }
                        $tablestring .= "<div class='arp_header_shortcode  toggle_step_first $one_toggle_selected'>";
                        if ($template_feature['header_shortcode_type'] == 'normal') {
                            $tablestring .= $arprice_form->arp_get_video_image(@$columns['arp_header_shortcode']);
                        } else if ($template_feature['header_shortcode_type'] == 'rounded_corner') {
                            $tablestring .= "<div class='rounded_corner_wrapper $shortcode_class'>";
                            $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode(@$columns['arp_header_shortcode']) . "</div>";
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='arp_header_shortcode toggle_step_second $two_toggle_selected'>";
                        if ($template_feature['header_shortcode_type'] == 'normal') {
                            $tablestring .= $arprice_form->arp_get_video_image(@$columns['arp_header_shortcode_second']);
                        } else if ($template_feature['header_shortcode_type'] == 'rounded_corner') {
                            $tablestring .= "<div class='rounded_corner_wrapper $shortcode_class'>";
                            $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode(@$columns['arp_header_shortcode_second']) . "</div>";
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='arp_header_shortcode toggle_step_third $three_toggle_selected'>";
                        if ($template_feature['header_shortcode_type'] == 'normal') {
                            $tablestring .= $arprice_form->arp_get_video_image(@$columns['arp_header_shortcode_third']);
                        } else if ($template_feature['header_shortcode_type'] == 'rounded_corner') {
                            $tablestring .= "<div class='rounded_corner_wrapper $shortcode_class'>";
                            $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode(@$columns['arp_header_shortcode_third']) . "</div>";
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                    }

                    if ($columns['is_caption'] == 1) {
                        $tablestring .= "<div class='arpcaptiontitle' id='column_header' data-template_id='" . $ref_template . "' data-level='header_level_options' data-type='other_columns_buttons'  data-column='main_" . $j . "'>" . do_shortcode($columns['html_content']) . "</div>";
                    } else {

                        if ($ref_template == 'arptemplate_7') {
                            //$tablestring .= "<div class='arp_header_selection_new' data-template_id='" . $ref_template . "' data-level='header_level_options' data-type='other_columns_buttons' data-column='main_" . $j . "'>";
                        }

                        $tablestring .= "<div class='arppricetablecolumntitle' id='column_header' data-template_id='" . $ref_template . "' data-level='header_level_options' data-type='other_columns_buttons' data-column='main_" . $j . "'>
                                <div class='bestPlanTitle " . $title_cls . " package_title_first toggle_step_first $one_toggle_selected'>" . do_shortcode($columns['package_title']) . "</div>
                                <div class='bestPlanTitle " . $title_cls . " package_title_second toggle_step_second $two_toggle_selected'>" . do_shortcode(isset($columns['package_title_second']) ? $columns['package_title_second'] : '') . "</div>
                                <div class='bestPlanTitle " . $title_cls . " package_title_third toggle_step_third $three_toggle_selected'>" . do_shortcode(isset($columns['package_title_third']) ? $columns['package_title_third'] : '') . "</div>";


                        if ($template_feature['header_shortcode_position'] == 'position_1' && ( $ref_template == 'arptemplate_8' or $ref_template == 'arptemplate_7' )) {
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";

                        if ($template_feature['column_description'] == 'enable' && $template_feature['column_description_style'] == 'style_3') {
                            $tablestring .= "<div class='column_description " . $title_cls . " column_description_first_step toggle_step_first $one_toggle_selected' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-type='other_columns_buttons' data-level='column_description_level'>" . stripslashes_deep($columns['column_description']) . "</div>";
                            $tablestring .= "<div class='column_description " . $title_cls . " column_description_second_step toggle_step_second $two_toggle_selected' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-type='other_columns_buttons' data-level='column_description_level'>" . stripslashes_deep(@$columns['column_description_second']) . "</div>";
                            $tablestring .= "<div class='column_description " . $title_cls . " column_description_third_step toggle_step_third $three_toggle_selected' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-type='other_columns_buttons' data-level='column_description_level'>" . stripslashes_deep(@$columns['column_description_third']) . "</div>";
                        }
                        if ($ref_template == 'arptemplate_7' || $ref_template == 'arptemplate_3') {
                            //$tablestring .= "</div>";
                        }
//                        $tablestring .= "</div>";
                        if ($template_feature['button_position'] == 'position_2') {

                            $tablestring .= "<div class='arpcolumnfooter " . @$footer_hover_class . "' id='arpcolumnfooter' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='footer_level_options' data-type='other_columns_buttons'>";
                            //ondblclick='get_template_options(\"".$template_id."\",\"button_options\",\"other_columns_buttons\",this,\"main_".$j."\")'
                            $columns['btn_img'] = isset($columns['btn_img']) ? $columns['btn_img'] : "";

//                            if ($columns['hide_footer'] == 1) {
//                                $hide_footer_div = ' display:none; ';
//                            } else {
//                                $hide_footer_div = '';
//                            }
                            $footer_content_below_btn = "";
                            if ($columns['footer_content'] != '' and $columns['footer_content_position'] == 1 and $template_feature['has_footer_content'] == 1)
                                $footer_content_above_btn = "display:block;";
                            else
                                $footer_content_above_btn = "display:none;";
                            if ($template_feature['has_footer_content'] == 1) {
                                $tablestring .= "<div class='arp_footer_content arp_btn_before_content' style='{$footer_content_above_btn}'>";
                                $tablestring .= "<span class='footer_content_first_step toggle_step_first $one_toggle_selected'>";
                                $tablestring .= $columns['footer_content'];
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_second_step toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['footer_content_second']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_third_step toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep($columns['footer_content_third']);
                                $tablestring .= "</span>";
                                $tablestring .= "</div>";
                            }

                            if ($columns['button_background_color'] != '') {
                                $button_background_color = $columns['button_background_color'];
                            } else {
                                $button_background_color = '';
                            }

                            $tablestring .= "<div class='arppricetablebutton' data-column='main_" . $j . "' style='text-align:center;'>";
                            $tablestring .= "<button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(@$arp_global_button_size[$columns['button_size']]) . "' id='bestPlanButton' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='button_options' data-type='other_columns_buttons' ";
                            if ($columns['btn_img'] != "") {
                                $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . $columns['btn_img'] . ") no-repeat !important;width:" . $columns['btn_img_width'] . "px;height:" . $columns['btn_img_height'] . "px;'";
                            } else {
                                $tablestring .= "style='background:" . $button_background_color . "'";
                            }


                            $tablestring .= ">";

                            if ($columns['btn_img'] == "") {
                                $tablestring .= "<span class='btn_content_first_step toggle_step_first $one_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['button_text']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='btn_content_second_step toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['btn_content_second']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='btn_content_third_step toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['btn_content_third']);
                                $tablestring .= "</span>";
                            } $tablestring .= "</button>";

                            $tablestring .= "</div>";

                            $footer_content_below_btn = "";
                            if (@$columns['footer_content'] != '' and @ $columns['footer_content_position'] == 0)
                                $footer_content_below_btn = "display:block;";
                            else
                                $footer_content_below_btn = "display:none;";
                            if (@$template_feature['has_footer_content'] == 1) {
                                $tablestring .= "<div class='arp_footer_content arp_btn_after_content' style='{$footer_content_below_btn}'>";
                                $tablestring .= "<span class='footer_content_first_step toggle_step_first $one_toggle_selected'>";
                                $tablestring .= @$columns['footer_content'];
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_second_step toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_third_step toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                                $tablestring .= "</span>";
                                $tablestring .= "</div>";
                            }

                            $tablestring .= "</div>";
                        }

                        if ($template_feature['header_shortcode_position'] == 'default') {
                            if ($template_feature['header_shortcode_type'] == 'normal') {
                                if ($ref_template == 'arptemplate_5') {
                                    $tablestring .= "<div class='arp_header_shortcode toggle_step_first $one_toggle_selected'>" . $arprice_form->arp_get_video_image(@$columns['arp_header_shortcode']) . "</div>";
                                    $tablestring .= "<div class='arp_header_shortcode toggle_step_second $two_toggle_selected'>" . $arprice_form->arp_get_video_image(@$columns['arp_header_shortcode_second']) . "</div>";
                                    $tablestring .= "<div class='arp_header_shortcode toggle_step_third $three_toggle_selected'>" . $arprice_form->arp_get_video_image(@$columns['arp_header_shortcode_third']) . "</div>";
                                } else {
                                    $tablestring .= "<div class='arp_header_shortcode toggle_step_first $one_toggle_selected'>" . do_shortcode($columns['arp_header_shortcode']) . "</div>";
                                    $tablestring .= "<div class='arp_header_shortcode toggle_step_second $two_toggle_selected'>" . do_shortcode(@$columns['arp_header_shortcode_second']) . "</div>";
                                    $tablestring .= "<div class='arp_header_shortcode toggle_step_third $three_toggle_selected'>" . do_shortcode(@$columns['arp_header_shortcode_third']) . "</div>";
                                }
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
                                $tablestring .= "<div class='arp_rounded_second arp_rounded_shortcode_wrapper toggle_step_third $three_toggle_selected'>";
                                $tablestring .= "<div class='rounded_corner_wrapper $shortcode_class'>";
                                $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode(@$columns['arp_header_shortcode_third']) . "</div>";
                                $tablestring .= "</div>";
                                $tablestring .= "</div>";
                            }
                        }
                        if ($template_feature['header_shortcode_position'] == 'default' && ( $ref_template == 'arptemplate_2' or $ref_template == 'arptemplate_5' or $ref_template === 'arptemplate_26' )) {
                            $tablestring .= "</div>";
                        }
                        if ($template_feature['amount_style'] == 'style_2')
                            $amount_style_cls = 'style_2';

                        if (!empty($columns['column_background_image']) && $ref_template == 'arptemplate_21') {
                            $column_bgi_class = ' hide_col_bg_img ';
                        } else {
                            $column_bgi_class = '';
                        }
                        $temp_css_3 = '';
                        if($reference_template=='arptemplate_3'){
                            $temp_css_3 = 'display:none;';
                        }
                        $tablestring .= "<div class='arppricetablecolumnprice $column_bgi_class" . ( isset($amount_style_cls) ? $amount_style_cls : "" ) . "' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='pricing_level_options' data-type='other_columns_buttons' style='".$temp_css_3."'>";

                        if ($template_feature['amount_style'] == 'default') {
                            if ($reference_template == 'arptemplate_4') {
                                $tablestring .="<div class='rounded_corner_wrapper $shortcode_class' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='pricing_level_options' data-type='other_columns_buttons'>";
                                $tablestring .= "<div class='arp_price_wrapper rounded_corder $shortcode_class'>";
                            } else {
                                $tablestring .= "<div class='arp_price_wrapper'>";
                            }

                         
                            $tablestring .= "<span class='price_text_first_step toggle_step_first $one_toggle_selected'>";
                            $tablestring .= $columns['price_text'];
                            $tablestring .= '</span>';

                            $tablestring .= "<span class='price_text_second_step toggle_step_second $two_toggle_selected'>";
                            $tablestring .= @$columns['price_text_two_step'];
                            $tablestring .= '</span>';

                            $tablestring .= "<span class='price_text_third_step toggle_step_third $three_toggle_selected'>";
                            $tablestring .= @$columns['price_text_three_step'];
                            $tablestring .= '</span>';

                            $tablestring .= "</div>";
                            if ($reference_template == 'arptemplate_4') {
                                $tablestring .= "</div>";
                            }
                            $tablestring .= isset($columns['html_content']) ? $columns['html_content'] : "";
                        } else if ($template_feature['amount_style'] == 'style_1') {
                            $tablestring .= "<div class='arp_pricename' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-type='other_columns_buttons' data-level='pricing_level_options'>";
                            $tablestring .= "<div class='arp_price_wrapper'  data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-type='other_columns_buttons' data-level='pricing_level_options' >";
                            //$tablestring .= "<span class=\"arp_price_value\">";
                            $tablestring .= "<span class='price_text_first_step toggle_step_first $one_toggle_selected'>";
                            $tablestring .= @$columns['price_text'];
                            $tablestring .= '</span>';

                            $tablestring .= "<span class='price_text_second_step toggle_step_second $two_toggle_selected'>";
                            $tablestring .= @$columns['price_text_two_step'];
                            $tablestring .= '</span>';

                            $tablestring .= "<span class='price_text_third_step toggle_step_third $three_toggle_selected'>";
                            $tablestring .= @$columns['price_text_three_step'];
                            $tablestring .= '</span>';

                            $tablestring .= "</div>";
                            $tablestring .= "</div>";
                            $columns['html_content'] = isset($columns['html_content']) ? $columns['html_content'] : "";
                            $tablestring .= do_shortcode($columns['html_content']);
                        } else if ($template_feature['amount_style'] == 'style_2') {
                            $tablestring .= "<div class='arp_price_wrapper'>";
                            if ($template == 'arptemplate_11') {
                                $tablestring .= "<div class='arp_pricename_selection_new' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='pricing_level_options' data-type='other_columns_buttons'>";
                            }
                            $tablestring .= "<span class='price_text_first_step toggle_step_first $one_toggle_selected'>";
                            $tablestring .= $columns['price_text'];
                            $tablestring .= '</span>';

                            $tablestring .= "<span class='price_text_second_step toggle_step_second $two_toggle_selected'>";
                            $tablestring .= $columns['price_text_two_step'];
                            $tablestring .= '</span>';

                            $tablestring .= "<span class='price_text_third_step toggle_step_third $three_toggle_selected'>";
                            $tablestring .= $columns['price_text_three_step'];
                            $tablestring .= '</span>';
                            //$tablestring .= "</span>";

                            if ($template == 'arptemplate_11') {
                                $tablestring .= "</div>";
                            }
                            $tablestring .= "</div>";
                            $columns['html_content'] = isset($columns['html_content']) ? $columns['html_content'] : "";
                            $tablestring .= do_shortcode($columns['html_content']);
                        }

                        if ($ref_template == 'arptemplate_12')
                            $tablestring .= "<div class='custom_seperator_1'></div>";

                        if ($template_feature['column_description'] == 'enable' && $template_feature['column_description_style'] == 'style_2') {
                            $tablestring .= "<div class='custom_ribbon_wrapper'>";
                            $tablestring .= "<div class='column_description column_description_first_step toggle_step_first $one_toggle_selected' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-type='other_columns_buttons' data-level='column_description_level'>" . stripslashes_deep(@$columns['column_description']) . "</div>";
                            $tablestring .= "<div class='column_description column_description_second_step toggle_step_second $two_toggle_selected' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-type='other_columns_buttons' data-level='column_description_level'>" . stripslashes_deep(@$columns['column_description_second']) . "</div>";
                            $tablestring .= "<div class='column_description column_description_third_step toggle_step_third $three_toggle_selected' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-type='other_columns_buttons' data-level='column_description_level'>" . stripslashes_deep(@$columns['column_description_third']) . "</div>";
                            $tablestring .= "</div>";
                        }

                        if ($template_feature['column_description'] == 'enable' && $template_feature['column_description_style'] == 'style_4') {
                            $first_desc_blank = $second_desc_blank = $third_desc_blank = '';
                            $first_desc_blank = empty($columns['column_description']) ? ' desc_content_blank' : '';
                            $second_desc_blank = empty($columns['column_description_second']) ? ' desc_content_blank' : '';
                            $third_desc_blank = empty($columns['column_description_third']) ? ' desc_content_blank' : '';

                            $tablestring .= "<div class='column_description column_description_first_step toggle_step_first $one_toggle_selected $first_desc_blank' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-type='other_columns_buttons' data-level='column_description_level'>" . stripslashes_deep(@$columns['column_description']) . "</div>";
                            $tablestring .= "<div class='column_description column_description_second_step toggle_step_second $two_toggle_selected $second_desc_blank' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-type='other_columns_buttons' data-level='column_description_level'>" . stripslashes_deep(@$columns['column_description_second']) . "</div>";
                            $tablestring .= "<div class='column_description column_description_third_step toggle_step_third $three_toggle_selected $third_desc_blank' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-type='other_columns_buttons' data-level='column_description_level'>" . stripslashes_deep(@$columns['column_description_third']) . "</div>";
                        }

                        if ($template_feature['button_position'] == 'position_1') {

                            $footer_hover_class = isset($footer_hover_class) ? $footer_hover_class : '';
                            $tablestring .= "<div class='arpcolumnfooter " . $footer_hover_class . "' id='arpcolumnfooter' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='footer_level_options' data-type='other_columns_buttons'>";

                            $footer_content_above_btn = "";
                            if (@$columns['footer_content'] != '' and @ $columns['footer_content_position'] == 1)
                                $footer_content_above_btn = "display:block;";
                            else
                                $footer_content_above_btn = "display:none;";
                            if ($template_feature['has_footer_content'] == 1) {
                                $tablestring .= "<div class='arp_footer_content arp_btn_before_content' style='{$footer_content_above_btn}'>";
                                $tablestring .= "<span class='footer_content_first_step toggle_step_first $one_toggle_selected'>";
                                $tablestring .= @$columns['footer_content'];
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_second_step toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_third_step toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                                $tablestring .= "</span>";
                                $tablestring .= "</div>";
                            }

                            //ondblclick='get_template_options(\"".$template_id."\",\"button_options\",\"other_columns_buttons\",this,\"main_".$j."\")'
                            $columns['btn_img'] = isset($columns['btn_img']) ? $columns['btn_img'] : "";
                            $tablestring .= "<div class='arppricetablebutton' data-column='main_" . $j . "' style='text-align:center;'>
                                                        <button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(@$arp_global_button_size[$columns['button_size']]) . "' id='bestPlanButton' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='button_options' data-type='other_columns_buttons' ";
                            if ($columns['btn_img'] != "") {
                                $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . $columns['btn_img'] . ") no-repeat !important;width:" . $columns['btn_img_width'] . "px;height:" . $columns['btn_img_height'] . "px;'";
                            }  $tablestring .= ">";
                            if ($columns['btn_img'] == "") {
                                $tablestring .= "<span class='btn_content_first_step toggle_step_first $one_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['button_text']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='btn_content_second_step toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['btn_content_second']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='btn_content_third_step toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['btn_content_third']);
                                $tablestring .= "</span>";
                            } $tablestring .= "</button>";

                            $tablestring .= "</div>";
                            $footer_content_below_btn = "";
                            if (@$columns['footer_content'] != '' and @ $columns['footer_content_position'] == 0)
                                $footer_content_below_btn = "display:block;";
                            else
                                $footer_content_below_btn = "display:none;";
                            if (@$template_feature['has_footer_content'] == 1) {
                                $tablestring .= "<div class='arp_footer_content arp_btn_after_content' style='{$footer_content_below_btn}'>";
                                $tablestring .= "<span class='footer_content_first_step toggle_step_first $one_toggle_selected'>";
                                $tablestring .= @$columns['footer_content'];
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_second_step toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_third_step toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                                $tablestring .= "</span>";
                                $tablestring .= "</div>";
                            }
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                    }
                    if ($template_feature['header_shortcode_position'] == 'position_2') {
                        $tablestring .= "<div class='arp_header_shortcode toggle_step_first $one_toggle_selected'>";
                        if ($template_feature['header_shortcode_type'] == 'normal')
                            $tablestring .= do_shortcode($columns['arp_header_shortcode']);
                        else if ($template_feature['header_shortcode_type'] == 'rounded_border') {
                            $tablestring .= "<div class='rounded_corner_wrapper $shortcode_class'>";
                            $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode($columns['arp_header_shortcode']) . "</div>";
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='arp_header_shortcode toggle_step_second $two_toggle_selected'>";
                        if ($template_feature['header_shortcode_type'] == 'normal')
                            $tablestring .= do_shortcode($columns['arp_header_shortcode_second']);
                        else if ($template_feature['header_shortcode_type'] == 'rounded_border') {
                            $tablestring .= "<div class='rounded_corner_wrapper $shortcode_class'>";
                            $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode($columns['arp_header_shortcode_second']) . "</div>";
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                        $tablestring .= "<div class='arp_header_shortcode toggle_step_third $three_toggle_selected'>";
                        if ($template_feature['header_shortcode_type'] == 'normal')
                            $tablestring .= do_shortcode($columns['arp_header_shortcode_third']);
                        else if ($template_feature['header_shortcode_type'] == 'rounded_border') {
                            $tablestring .= "<div class='rounded_corner_wrapper $shortcode_class'>";
                            $tablestring .= "<div class='rounded_corder $shortcode_class'>" . do_shortcode($columns['arp_header_shortcode_third']) . "</div>";
                            $tablestring .= "</div>";
                        }
                        $tablestring .= "</div>";
                    }

                    $tablestring .= "</div>";

                    $columns['column_description_second'] = isset($columns['column_description_second']) ? $columns['column_description_second'] : '';
                    $columns['column_description_third'] = isset($columns['column_description_third']) ? $columns['column_description_third'] : '';
                    if ($template_feature['button_position'] == 'position_3') {
                        $tablestring .= "<div style='float:left;width:100%;'>";
                        $tablestring .= "<div class='column_description " . $title_cls . " column_description_first_step toggle_step_first $one_toggle_selected' data-level='column_description_level' data-type='other_columns_buttons' data-template_id='" . $ref_template . "' data-column='main_" . $j . "'>" . stripslashes_deep($columns['column_description']) . "</div>";
                        $tablestring .= "<div class='column_description " . $title_cls . " column_description_second_step toggle_step_second $two_toggle_selected' data-level='column_description_level' data-type='other_columns_buttons' data-template_id='" . $ref_template . "' data-column='main_" . $j . "'>" . stripslashes_deep($columns['column_description_second']) . "</div>";
                        $tablestring .= "<div class='column_description " . $title_cls . " column_description_third_step toggle_step_third $three_toggle_selected' data-level='column_description_level' data-type='other_columns_buttons' data-template_id='" . $ref_template . "' data-column='main_" . $j . "'>" . stripslashes_deep($columns['column_description_third']) . "</div>";

//			if ($columns['hide_footer'] == 1) {
//			    $hide_footer_div = ' display:none;" ';
//			} else {
//			    $hide_footer_div = '';
//			}

                        $footer_hover_class = isset($footer_hover_class) ? $footer_hover_class : '';
                        $tablestring .= "<div class='arpcolumnfooter " . $footer_hover_class . "' id='arpcolumnfooter' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='footer_level_options' data-type='other_columns_buttons'>";
                        $columns['btn_img'] = isset($columns['btn_img']) ? $columns['btn_img'] : "";

                        $footer_content_above_btn = "";
                        if (isset($columns['footer_content']) and $columns['footer_content'] != '' and $columns['footer_content_position'] == 1)
                            $footer_content_above_btn = "display:block;";
                        else
                            $footer_content_above_btn = "display:none;";
                        if ($template_feature['has_footer_content'] == 1) {
                            $tablestring .= "<div class='arp_footer_content arp_btn_before_content' style='{$footer_content_above_btn}'>";
                            $tablestring .= "<span class='footer_content_first_step toggle_step_first $one_toggle_selected'>";
                            $tablestring .= $columns['footer_content'];
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_second_step toggle_step_second $two_toggle_selected'>";
                            $tablestring .= stripslashes_deep($columns['footer_content_second']);
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_third_step toggle_step_third $three_toggle_selected'>";
                            $tablestring .= stripslashes_deep($columns['footer_content_third']);
                            $tablestring .= "</span>";
                            $tablestring .= "</div>";
                        }

                        $tablestring .= "<div class='arppricetablebutton' data-column='main_" . $j . "' style='text-align:center;'>
                                                        <button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(@$arp_global_button_size[$columns['button_size']]) . "' id='bestPlanButton' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='button_options' data-type='other_columns_buttons' ";
                        if ($columns['btn_img'] != "") {
                            $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . $columns['btn_img'] . ") no-repeat !important;width:" . $columns['btn_img_width'] . "px;height:" . $columns['btn_img_height'] . "px;'";
                        }
                        $columns['btn_content_second'] = isset($columns['btn_content_second']) ? $columns['btn_content_second'] : '';
                        $columns['btn_content_third'] = isset($columns['btn_content_third']) ? $columns['btn_content_third'] : '';
                        $tablestring .= ">";
                        if ($columns['btn_img'] == "") {
                            $tablestring .= "<span class='btn_content_first_step toggle_step_first $one_toggle_selected'>";
                            $tablestring .= stripslashes_deep($columns['button_text']);
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='btn_content_second_step toggle_step_second $two_toggle_selected'>";
                            $tablestring .= stripslashes_deep($columns['btn_content_second']);
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='btn_content_third_step toggle_step_third $three_toggle_selected'>";
                            $tablestring .= stripslashes_deep($columns['btn_content_third']);
                            $tablestring .= "</span>";
                        } $tablestring .= "</button>";
                        $tablestring .= "</div>";

                        $footer_content_below_btn = "";
                        if (isset($columns['footer_content']) and $columns['footer_content'] != '' and $columns['footer_content_position'] == 0)
                            $footer_content_below_btn = "display:block;";
                        else
                            $footer_content_below_btn = "display:none;";
                        if ($template_feature['has_footer_content'] == 1) {
                            $tablestring .= "<div class='arp_footer_content arp_btn_after_content' style='{$footer_content_below_btn}'>";
                            $tablestring .= "<span class='footer_content_first_step toggle_step_first $one_toggle_selected'>";
                            $tablestring .= $columns['footer_content'];
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_second_step toggle_step_second $two_toggle_selected'>";
                            $tablestring .= stripslashes_deep($columns['footer_content_second']);
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_third_step toggle_step_third $three_toggle_selected'>";
                            $tablestring .= stripslashes_deep($columns['footer_content_third']);
                            $tablestring .= "</span>";
                            $tablestring .= "</div>";
                        }

                        $tablestring .= "</div>";
                        $tablestring .= "</div>";
                    }

                    $tablestring .= "<div class='arpbody-content arppricingtablebodycontent' id='arppricingtablebodycontent' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='body_level_options' data-type='other_columns_buttons'>";

                    $tablestring .= "<ul class='arp_opt_options arppricingtablebodyoptions' id='column_" . $j . "' style='text-align:" . $columns['body_text_alignment'] . ";'>";

                    $r = 0;

                    $row_order = isset($new_arr['columns'][$j]['row_order']) ? $new_arr['columns'][$j]['row_order'] : array();
                    if ($row_order && is_array($row_order)) {
                        $rows = array();
                        asort($row_order);
                        $ji = 0;
                        $maxorder = max($row_order) ? max($row_order) : 0;
                        foreach ($new_arr['columns'][$j]['rows'] as $rowno => $row) {
                            $row_order[$rowno] = isset($row_order[$rowno]) ? $row_order[$rowno] : ($maxorder + 1);
                        }

                        foreach ($row_order as $row_id => $order_id) {
                            if ($new_arr['columns'][$j]['rows'][$row_id]) {
                                $rows['row_' . $ji] = $new_arr['columns'][$j]['rows'][$row_id];
                                $ji++;
                            }
                        }

                        $new_arr['columns'][$j]['rows'] = $rows;
                    }
                    $column_count++;
                    $row_count = 0;

                    for ($ri = 0; $ri <= $maxrowcount; $ri++) {
                        $rows = isset($new_arr['columns'][$j]['rows']['row_' . $ri]) ? $new_arr['columns'][$j]['rows']['row_' . $ri] : array();

                        if ($columns['is_caption'] == 1) {
                            if (($ri + 1) % 2 == 0) {
                                $cls = 'rowlightcolorstyle';
                            } else {
                                $cls = '';
                            }
                        } else {

                            if ($column_count % 2 == 0) {
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
                        if ($rows['row_description'] == '') {
                            $rows['row_description'] = '';
                        }
                        if ($template_feature['caption_style'] == 'style_1' and $template_feature['list_alignment'] != 'default') {
                            $li_class = $ref_template . '_' . $j . '_row_' . $ri;
                            $tablestring .= "<li data-template_id='" . $ref_template . "' data-level='body_li_level_options' data-type='other_columns_buttons' data-column='main_" . $j . "' class='arpbodyoptionrow arp_" . $j . "_row_" . $row_count . " " . $cls;

                            $tablestring .= " " . $li_class . "' id='arp_row_" . $ri . "'>";
                            //onclick='get_template_options(\"".$template_id."\",\"body_li_level_options\",\"other_columns_buttons\",this,\"main_".$j."\")'
                            $tablestring .= "<span class='caption_li'>";
                            $tablestring .= "<div class='row_label_first_step toggle_step_first $one_toggle_selected'>" . stripslashes_deep($rows['row_label']) . "</div>";
                            $tablestring .= "<div class='row_label_second_step toggle_step_second $two_toggle_selected'>" . stripslashes_deep($rows['row_label_second']) . "</div>";
                            $tablestring .= "<div class='row_label_third_step toggle_step_third $three_toggle_selected'>" . stripslashes_deep($rows['row_label_third']) . "</div>";
                            $tablestring .= "</span>";
                            $tablestring .= "<span class='caption_detail'>";

                            $tablestring .= "<div class='row_description_first_step toggle_step_first $one_toggle_selected'>" . stripslashes_deep($rows['row_description']) . "</div>";
                            $tablestring .= "<div class='row_description_second_step toggle_step_second $two_toggle_selected'>" . stripslashes_deep($rows['row_description_second']) . "</div>";
                            $tablestring .= "<div class='row_description_third_step toggle_step_third $three_toggle_selected'>" . stripslashes_deep($rows['row_description_third']) . "</div>";
                            $tablestring .= "</span>
                                            </li>";
                        } else if ($template_feature['caption_style'] == 'style_2') {
                            $li_class = $ref_template . '_' . $j . '_row_' . $ri;

                            $tablestring .= "<li data-template_id='" . $ref_template . "' data-level='body_li_level_options' data-type='other_columns_buttons' data-column='main_" . $j . "' class='arpbodyoptionrow arp_" . $j . "_row_" . $row_count . " " . $cls;
                            $tablestring .= " " . $li_class . "' id='arp_row_" . $ri . "'";

                            $tablestring .= ">";
                            $tablestring .= "<span class='caption_detail' ";

                            $tablestring .= "'>";
                            $tablestring .= "<div class='row_description_first_step toggle_step_first $one_toggle_selected'>" . stripslashes_deep($rows['row_description']) . "</div>";
                            $tablestring .= "<div class='row_description_second_step toggle_step_second $two_toggle_selected'>" . stripslashes_deep($rows['row_description_second']) . "</div>";
                            $tablestring .= "<div class='row_description_third_step toggle_step_third $three_toggle_selected'>" . stripslashes_deep($rows['row_description_third']) . "</div>";
                            $tablestring .= "</span>";
                            $tablestring .= "<span class='caption_li'>";
                            $tablestring .= "<div class='row_label_first_step toggle_step_first $one_toggle_selected'>" . stripslashes_deep($rows['row_label']) . "</div>";
                            $tablestring .= "<div class='row_label_second_step toggle_step_second $two_toggle_selected'>" . stripslashes_deep($rows['row_label_second']) . "</div>";
                            $tablestring .= "<div class='row_label_third_step toggle_step_third $three_toggle_selected'>" . stripslashes_deep($rows['row_label_third']) . "</div>";
                            $tablestring .= "</span>";
                            $tablestring .= "</li>";
                        } else if ($template_feature['list_alignment'] != 'default') {
                            $li_class = $ref_template . '_' . $j . '_row_' . $ri;
                            $tablestring .= "<li data-template_id='" . $ref_template . "' data-level='body_li_level_options' data-type='other_columns_buttons' data-column='main_" . $j . "' class='arpbodyoptionrow arp_" . $j . "_row_" . $row_count . " " . $cls;
                            $tablestring .= " " . $li_class . "' id='arp_row_" . $ri . "' style='text-align:" . $template_feature['list_alignment'] . "' >";

                            $tablestring .= "<span class=''";

                            $tablestring .= "'>";
                            $tablestring .= "<div class='row_description_first_step toggle_step_first $one_toggle_selected'>" . stripslashes_deep($rows['row_description']) . "</div>";
                            $tablestring .= "<div class='row_description_second_step toggle_step_second $two_toggle_selected'>" . stripslashes_deep(@$rows['row_description_second']) . "</div>";
                            $tablestring .= "<div class='row_description_third_step toggle_step_third $three_toggle_selected'>" . stripslashes_deep(@$rows['row_description_third']) . "</div>";
                            $tablestring .= "</span>
                                           </li>";
                        } else {
                            $li_class = $ref_template . '_' . $j . '_row_' . $ri;
                            $tablestring .= "<li data-template_id='" . $ref_template . "' data-level='body_li_level_options' data-type='other_columns_buttons' data-column='main_" . $j . "' class='arpbodyoptionrow arp_" . $j . "_row_" . $row_count . " " . $cls;
                            $tablestring .= " " . $li_class . "' id='arp_row_" . $ri . "' style='text-align:"; $tablestring .= "' >";
                            //onclick='get_template_options(\"".$template_id."\",\"body_li_level_options\",\"other_columns_buttons\",this,\"main_".$j."\")'
                            $tablestring .= "<span class=''>";
                            $tablestring .= "<div class='row_description_first_step toggle_step_first $one_toggle_selected'>" . stripslashes_deep($rows['row_description']) . "</div>";
                            $tablestring .= "<div class='row_description_second_step toggle_step_second $two_toggle_selected'>" . stripslashes_deep(isset($rows['row_description_second']) ? $rows['row_description_second'] : '') . "</div>";
                            $tablestring .= "<div class='row_description_third_step toggle_step_third $three_toggle_selected'>" . stripslashes_deep(isset($rows['row_description_third']) ? $rows['row_description_third'] : '') . "</div>";
                            $tablestring .= "</span>
                                           </li>";
                        }
                        $row_count++;
                    }
                    $tablestring .= "</ul>";
                    $tablestring .= "</div>";


                    // TMP5


                    if ($template_feature['amount_style'] == 'style_3') {
                        $tablestring .= "<div class='arppricetablecolumnprice' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='pricing_level_options' data-type='other_columns_buttons' >";
                        $tablestring .= "<div class='arp_price_wrapper'>";

                        $tablestring .= "<span class='price_text_first_step toggle_step_first $one_toggle_selected'>";
                        $tablestring .= $columns['price_text'];
                        $tablestring .= '</span>';

                        $tablestring .= "<span class='price_text_second_step toggle_step_second $two_toggle_selected'>";
                        $tablestring .= @$columns['price_text_two_step'];
                        $tablestring .= '</span>';

                        $tablestring .= "<span class='price_text_third_step toggle_step_third $three_toggle_selected'>";
                        $tablestring .= @$columns['price_text_three_step'];
                        $tablestring .= '</span>';
                        /* $tablestring .= "</span>"; */
                        $tablestring .= "</div>";
                        $columns['html_content'] = isset($columns['html_content']) ? $columns['html_content'] : "";
                        $tablestring .= do_shortcode($columns['html_content']);


                        if ($template_feature['button_position'] == 'position_4') {

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

                            $tablestring .= "<div class='arpcolumnfooter " . $footer_hover_class . "' id='arpcolumnfooter' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='footer_level_options' data-type='other_columns_buttons'>";
                            //ondblclick='get_template_options(\"".$template_id."\",\"button_options\",\"other_columns_buttons\",this,\"main_".$j."\")'
                            $columns['btn_img'] = isset($columns['btn_img']) ? $columns['btn_img'] : "";

                            $footer_content_above_btn = "";
                            if ($columns['footer_content'] != '' and $columns['footer_content_position'] == 1)
                                $footer_content_above_btn = "display:block;";
                            else
                                $footer_content_above_btn = "display:none;";
                            if ($template_feature['has_footer_content'] == 1) {
                                $tablestring .= "<div class='arp_footer_content arp_btn_before_content' style='{$footer_content_above_btn}'>";
                                $tablestring .= "<span class='footer_content_first_step toggle_step_first $one_toggle_selected'>";
                                $tablestring .= @$columns['footer_content'];
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_second_step toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_third_step toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                                $tablestring .= "</span>";
                                $tablestring .= "</div>";
                            }

                            $tablestring .= "<div class='arppricetablebutton' data-column='main_" . $j . "' style='text-align:center;'>
                                                        <button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(@$arp_global_button_size[$columns['button_size']]) . "' id='bestPlanButton' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='button_options' data-type='other_columns_buttons' ";
                            if ($columns['btn_img'] != "") {
                                $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . $columns['btn_img'] . ") no-repeat !important;width:" . $columns['btn_img_width'] . "px;height:" . $columns['btn_img_height'] . "px;'";
                            }  $tablestring .= ">";
                            if ($columns['btn_img'] == "") {
                                $tablestring .= "<span class='btn_content_first_step toggle_step_first $one_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['button_text']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='btn_content_second_step toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['btn_content_second']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='btn_content_third_step toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['btn_content_third']);
                                $tablestring .= "</span>";
                            } $tablestring .= "</button>";

                            $tablestring .= "</div>";

                            $footer_content_below_btn = "";
                            if (@$columns['footer_content'] != '' and $columns['footer_content_position'] == 0)
                                $footer_content_below_btn = "display:block;";
                            else
                                $footer_content_below_btn = "display:none;";
                            if ($template_feature['has_footer_content'] == 1) {
                                $tablestring .= "<div class='arp_footer_content arp_btn_after_content' style='{$footer_content_below_btn}'>";
                                $tablestring .= "<span class='footer_content_first_step toggle_step_first $one_toggle_selected'>";
                                $tablestring .= @$columns['footer_content'];
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_second_step toggle_step_second $two_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                                $tablestring .= "</span>";

                                $tablestring .= "<span class='footer_content_third_step toggle_step_third $three_toggle_selected'>";
                                $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                                $tablestring .= "</span>";
                                $tablestring .= "</div>";
                            }

                            $tablestring .= "</div>";
                        }

                        $tablestring .= "</div>";
                    }

                    if ($template_feature['button_position'] == 'default') {

                        $columns['footer_content'] = isset($columns['footer_content']) ? $columns['footer_content'] : '';
                        $footer_hover_class = "";
                        if (isset($columns['footer_content']) && $columns['footer_content'] != '' and $template_feature['has_footer_content'] == 1) {
                            $footer_hover_class .= ' has_footer_content';
                            if ($columns['footer_content_position'] == 0) {
                                $footer_hover_class .= " footer_below_content";
                            } else {
                                $footer_hover_class .= " footer_above_content";
                            }
                        } else {
                            $footer_hover_class = "";
                        }

                        $tablestring .= "<div class='arpcolumnfooter " . $footer_hover_class . "' id='arpcolumnfooter' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-level='footer_level_options' data-type='other_columns_buttons'>";
                        //ondblclick='get_template_options(\"".$template_id."\",\"button_options\",\"other_columns_buttons\",this,\"main_".$j."\")'

                        if ($template_feature['second_btn'] == true && $columns['button_s_text'] != '') {
                            $has_s_btn = 'has_second_btn';
                        } else {
                            $has_s_btn = 'no_second_btn';
                        }

                        $columns['btn_img'] = isset($columns['btn_img']) ? $columns['btn_img'] : "";


                        $footer_content_above_btn = "";
                        if ($columns['footer_content'] != '' and $columns['footer_content_position'] == 1)
                            $footer_content_above_btn = "display:block;";
                        else
                            $footer_content_above_btn = "display:none;";
                        if (@$template_feature['has_footer_content'] == 1) {
                            $tablestring .= "<div class='arp_footer_content arp_btn_before_content' style='{$footer_content_above_btn}'>";
                            $tablestring .= "<span class='footer_content_first_step toggle_step_first $one_toggle_selected'>";
                            $tablestring .= @$columns['footer_content'];
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_second_step toggle_step_second $two_toggle_selected'>";
                            $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_third_step toggle_step_third $three_toggle_selected'>";
                            $tablestring .= stripslashes_deep(@$columns['footer_content_third']);
                            $tablestring .= "</span>";
                            $tablestring .= "</div>";
                        }

                        $tablestring .= "<div class='arppricetablebutton' data-column='main_" . $j . "' style='text-align:center;'>";
//			if ($columns['button_text'] != '') {
                        $tablestring .= "<button type='button' class='bestPlanButton $arp_global_button_class " . strtolower(isset($arp_global_button_size[$columns['button_size']]) ? $arp_global_button_size[$columns['button_size']] : '') . " " . $has_s_btn . "' id='bestPlanButton' data-template_id='" . $ref_template . "' data-level='button_options' data-type='other_columns_buttons' data-column='main_" . $j . "' ";
                        if ($columns['btn_img'] != "") {
                            $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . $columns['btn_img'] . ") no-repeat !important;width:" . $columns['btn_img_width'] . "px;height:" . $columns['btn_img_height'] . "px;' ";
                        }  $tablestring .= ">";
                        if ($columns['btn_img'] == "") {
                            $tablestring .= "<span class='btn_content_first_step toggle_step_first $one_toggle_selected'>";
                            $tablestring .= stripslashes_deep($columns['button_text']);
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='btn_content_second_step toggle_step_second $two_toggle_selected'>";
                            $tablestring .= stripslashes_deep(isset($columns['btn_content_second']) ? $columns['btn_content_second'] : '');
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='btn_content_third_step toggle_step_third $three_toggle_selected'>";
                            $tablestring .= stripslashes_deep(isset($columns['btn_content_third']) ? $columns['btn_content_third'] : '');
                            $tablestring .= "</span>";
                        } $tablestring .="</button>";
//			}

                        if ($template_feature['second_btn'] == true && $columns['button_s_text'] != '') {
                            if ($columns['button_text'] != '') {
                                $has_f_btn = 'has_first_btn';
                            } else {
                                $has_f_btn = 'no_first_btn';
                            }
                            $tablestring .= "<button type='button' class='bestPlanButton $arp_global_button_class arp_" . strtolower($columns['button_s_size']) . "_btn SecondBestPlanButton " . $has_f_btn . "' id='bestPlanButton' data-template_id='" . $ref_template . "' data-level='second_button_options' data-type='other_columns_buttons' data-column='main_" . $j . "' ";
                            if ($columns['button_s_img'] != "") {
                                $tablestring .= "style='background:" . $columns['button_background_color'] . " url(" . $columns['button_s_img'] . ") no-repeat !important;width:" . $columns['btn_s_img_width'] . "px;height:" . $columns['btn_s_img_height'] . "px;' ";
                            }  $tablestring .= ">";
                            if ($columns['button_s_img'] == "") {
                                $tablestring .= stripslashes_deep($columns['button_s_text']);
                            } $tablestring .="</button>";
                        }
                        $tablestring .= "</div>";

                        $footer_content_below_btn = '';
                        if ($columns['footer_content'] != '' and $columns['footer_content_position'] == 0)
                            $footer_content_below_btn = "display:block;";
                        else
                            $footer_content_below_btn = "display:none;";
                        if (@$template_feature['has_footer_content'] == 1) {
                            $tablestring .= "<div class='arp_footer_content arp_btn_after_content' style='{$footer_content_below_btn}'>";
                            $tablestring .= "<span class='footer_content_first_step toggle_step_first $one_toggle_selected'>";
                            $tablestring .= $columns['footer_content'];
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_second_step toggle_step_second $two_toggle_selected'>";
                            $tablestring .= stripslashes_deep(@$columns['footer_content_second']);
                            $tablestring .= "</span>";

                            $tablestring .= "<span class='footer_content_third_step toggle_step_third $three_toggle_selected'>";
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
                    }

                    if ($template_feature['column_description'] == 'enable' and $template_feature['column_description_style'] == 'after_button') {
                        $tablestring .= "<div class='column_description " . $title_cls . " column_description_first_step toggle_step_first $one_toggle_selected' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-type='other_columns_buttons' data-level='column_description_level'>" . stripslashes_deep($columns['column_description']) . "</div>";
                        $tablestring .= "<div class='column_description " . $title_cls . " column_description_second_step toggle_step_second $two_toggle_selected' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-type='other_columns_buttons' data-level='column_description_level'>" . stripslashes_deep($columns['column_description_second']) . "</div>";
                        $tablestring .= "<div class='column_description " . $title_cls . " column_description_third_step toggle_step_third $three_toggle_selected' data-column='main_" . $j . "' data-template_id='" . $ref_template . "' data-type='other_columns_buttons' data-level='column_description_level'>" . stripslashes_deep($columns['column_description_third']) . "</div>";
                    }

                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                    $tablestring .= "</div>";


                    /* Dynamic Button Options */
                    $col_no = explode('_', $j);
                    include(PRICINGTABLE_CLASSES_DIR . '/class.arprice_preview_editor_option.php');
                    $tablestring .= "</div>";  //ArpPricingTableColumnWrapper div



                    $c++;

                    if ($x % 5 == 0) {
                        $c = 1;
                    }
                    //}	
                    $x++;
                }
                $counter++;
            }

            $tablestring .= "</div>";
        } else {
            $tablestring .= __('Please select valid table', ARP_PT_TXTDOMAIN);
        }



        $tablestring .= "<div id='arp_all_font_listing' style='display:none;'>";
        $default_fonts = $arprice_fonts->get_default_fonts();
        $google_fonts = $arprice_fonts->google_fonts_list();
        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Default Fonts', ARP_PT_TXTDOMAIN) . "</ol>";
        foreach ($default_fonts as $font) {
            $tablestring .= "<li data-value='" . $font . "'  data-label='" . $font . "'>" . $font . "</li>";
        }
        $tablestring .= "<ol class='arp_selectbox_group_label'>" . __('Google Fonts', ARP_PT_TXTDOMAIN) . "</ol>";
        foreach ($google_fonts as $font) {
            $tablestring .= "<li data-value='" . $font . "' data-label='" . $font . "'>" . $font . "</li>";
        }
        $tablestring .= "</div>";


        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_next_div' ";
        if (!$navigation) {
            $tablestring .= "style='display:none;'";
        } $tablestring .= ">";
        $tablestring .= "<div id='arp_next_btn_" . $table_id . "' class='arp_next_btn " . $column_animation['navigation_style'] . "'></div>";
        $tablestring .= "</div>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";
        if (isset($column_animation['is_animation']) and $column_animation['is_animation'] == 'yes' and $is_tbl_preview != 2 and $column_animation['is_pagination'] == 1 and ( $column_animation['pagination_position'] == 'Bottom' or $column_animation['pagination_position'] == 'Both' ))
            $tablestring .= "<div class='arp_pagination
 " . $column_animation['pagination_style'] . " arp_pagination
_bottom' id='arp_slider
_" . $id . "_pagination_bottom'></div>";

        $tablestring = $arp_pricingtable->arprice_font_icon_size_parser($tablestring);

        return $tablestring;
    }

}
?>