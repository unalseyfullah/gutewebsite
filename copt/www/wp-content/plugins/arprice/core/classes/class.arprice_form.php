<?php

class arprice_form {

    function __construct() {
        add_action('wp_ajax_add_price_table', array(&$this, 'arp_add_pricing_table'));

        add_action('wp_ajax_add_new_row', array(&$this, 'add_new_row_new'));

        add_action('wp_ajax_update_price_table', array(&$this, 'update_price_table'));

        add_action('init', array(&$this, 'parse_standalone_request'), 1);

        add_shortcode('arp_header_image', array(&$this, 'arp_header_image_shortcode'));

        add_shortcode('arp_youtube_video', array(&$this, 'arp_youtube_video_shortcode'));

        add_shortcode('arp_vimeo_video', array(&$this, 'arp_vimeo_video_shortcode'));

        add_shortcode('arp_screenr_video', array(&$this, 'arp_screenr_video_shortcode'));

        add_shortcode('arp_html5_video', array(&$this, 'arp_html5_video_shortcode'));

        add_shortcode('arp_html5_audio', array(&$this, 'arp_html5_audio_shortcode'));

        add_shortcode('arp_googlemap', array(&$this, 'arp_googlemap_shortcode'));

        add_shortcode('arp_dailymotion_video', array(&$this, 'arp_dailymotion_video_shortcode'));

        add_shortcode('arp_metacafe_video', array(&$this, 'arp_metacafe_video_shortcode'));

        add_shortcode('arp_soundcloud_audio', array(&$this, 'arp_soundcloud_audio_shortcode'));

        add_shortcode('arp_mixcloud_audio', array(&$this, 'arp_mixcloud_audio_shortcode'));

        add_shortcode('arp_beatport_audio', array(&$this, 'arp_beatport_audio_shortcode'));

        add_shortcode('arp_embed', array(&$this, 'arp_embed_shortcode'));

        add_action('wp_ajax_arp_updatetabledata', array(&$this, 'arp_updatetabledata'));

        add_action('wp_ajax_load_pricing_table', array(&$this, 'arp_load_pricing_table'));

        add_filter('widget_text', array(&$this, 'arp_widget_text_filter'), 9);

        add_action('wp_ajax_arp_save_template_image', array(&$this, 'arp_save_template_image'));

        add_action('wp_ajax_update_arp_tour_guide_value', array(&$this, 'update_arp_tour_guide_value'));

        /* Added new action for add and update pricing table in single function on 14-09-2015 By A */
        add_action('wp_ajax_save_pricing_table', array(&$this, 'arp_save_pricing_table'));
    }

    function arp_save_pricing_table() {
        global $wpdb, $arprice_version, $arprice_images_css_version;
        $_POST = json_decode(stripslashes_deep($_POST['filtered_data']), true);

        
        $_POST = apply_filters('arp_change_values_before_update_pricing_table', $_POST);

        $pt_action = $_POST['pt_action'];

        if ($pt_action == "edit") {
            $table_id = @$_POST['table_id'];
        }

        if ($pt_action == "new") {
            $is_template = 0;
        } else {
            $get_is_template = $wpdb->get_results("SELECT is_template FROM {$wpdb->prefix}arp_arprice WHERE ID = {$table_id}");

            $is_template = $get_is_template[0]->is_template;
        }

        do_action('arp_before_update_pricing_table', $_POST);

        $main_table_title = @$_POST['pricing_table_main'];

        $is_tbl_preview = ( @isset($_POST['is_tbl_preview']) and @ $_POST['is_tbl_preview'] == 1 ) ? 1 : 0;

        $dt = current_time('mysql');

        $total = @$_POST['added_package'];

        if ($main_table_title == "" && !$is_tbl_preview) {
            return;
        }

        @parse_str(@$_POST['pt_coloumn_order'], $pt_coloumn_order);

        $template = @$_POST['arp_template'];
        $template_name = @$_POST['arp_template_name'];

        $template_skin = @$_POST['arp_template_skin_editor'];
        $template_type = @$_POST['arp_template_type'];
        $arp_template_custom_color = @$_POST['arp_custom_color_code'];

        $template_feature = @json_decode(@stripslashes_deep(@$_POST['template_feature']), true);

        $template_setting = array('template' => $template, 'skin' => $template_skin, 'template_type' => $template_type, 'features' => $template_feature, 'custom_color_code' => $arp_template_custom_color);

        $custom_css = @stripslashes_deep(@$_POST['arp_custom_css']);
        $enable_toggle_price = (@isset($_POST['enable_toggle_price']) and @ $_POST['enable_toggle_price'] == 1) ? 1 : 0;
        $toggle_copy_data_to_other_step = (@isset($_POST['toggle_copy_data_to_other_step']) and @ $_POST['toggle_copy_data_to_other_step'] == 1) ? 1 : 0;
        $step_options_main = @$_POST['step_options_main'];
        $togglestep_yearly = @stripslashes_deep(@$_POST['togglestep_yearly']);
        $togglestep_monthly = @stripslashes_deep(@$_POST['togglestep_monthly']);
        $togglestep_quarterly = @stripslashes_deep(@$_POST['togglestep_quarterly']);
        $setas_default_toggle = @stripslashes_deep($_POST['setas_default_toggle']);
        $toggle_option_main = @$_POST['toggle_option_main'];
        $toggle_active_color = @stripslashes_deep(@$_POST['toggle_active_color']);
        $toggle_active_text_color = @stripslashes_deep(@$_POST['toggle_active_text_color']);
        $toggle_inactive_color = @stripslashes_deep(@$_POST['toggle_inactive_color']);
        $toggle_label_content = @stripslashes_deep($_POST['toggle_label_content']);
        $label_position_main = @stripslashes_deep($_POST['label_position_main']);
        $toggle_main_color = @stripslashes_deep(@$_POST['toggle_main_color']);
        $toggle_title_font_family = @$_POST['toggle_title_font_family'];
        $toggle_title_font_size = @$_POST['toggle_title_font_size'];
        $toggle_title_font_color = @stripslashes_deep(@$_POST['toggle_title_font_color']);
        $toggle_title_font_style_bold = @$_POST['toggle_title_font_style_bold'];
        $toggle_title_font_style_italic = @$_POST['toggle_title_font_style_italic'];
        $toggle_title_font_style_decoration = @$_POST['toggle_title_font_style_decoration'];
        $toggle_button_font_family = @$_POST['toggle_button_font_family'];
        $toggle_button_font_size = @$_POST['toggle_button_font_size'];
        $toggle_button_font_color = @stripslashes_deep(@$_POST['toggle_button_font_color']);
        $toggle_button_font_style_bold = @$_POST['toggle_button_font_style_bold'];
        $toggle_button_font_style_italic = @$_POST['toggle_button_font_style_italic'];
        $toggle_button_font_style_decoration = @$_POST['toggle_button_font_style_decoration'];


        $column_order = @stripslashes_deep(@$_POST['pricing_table_column_order']);

        $column_ord = str_replace('\'', '"', $column_order);
        $col_ord_arr = json_decode($column_ord, true);
        if ($_POST['has_caption_column'] == 1 and ! in_array('main_column_0', $col_ord_arr))
            array_unshift($col_ord_arr, 'main_column_0');
        $new_id = array();


        if (is_array($col_ord_arr) and count($col_ord_arr) > 0) {
            foreach ($col_ord_arr as $key => $value)
                $new_id[$key] = str_replace('main_column_', '', $value);
        }

        $total = @max($new_id);

        $column_order = @json_encode($col_ord_arr);

        $reference_template = @$_POST['arp_reference_template'];

        $user_edited_columns = @json_decode(@stripslashes_deep(@$_POST['arp_user_edited_columns']), true);

        $general_settings = array('arp_custom_css' => $custom_css, 'column_order' => $column_order, 'reference_template' => $reference_template, 'user_edited_columns' => $user_edited_columns, 'enable_toggle_price' => $enable_toggle_price, 'toggle_copy_data_to_other_step' => $toggle_copy_data_to_other_step, 'arp_step_main' => $step_options_main, 'togglestep_yearly' => $togglestep_yearly, 'togglestep_monthly' => $togglestep_monthly, 'togglestep_quarterly' => $togglestep_quarterly, 'setas_default_toggle' => $setas_default_toggle, 'arp_toggle_main' => $toggle_option_main, 'toggle_active_color' => $toggle_active_color, 'toggle_active_text_color' => $toggle_active_text_color, 'toggle_inactive_color' => $toggle_inactive_color, 'toggle_label_content' => $toggle_label_content, 'arp_label_position_main' => $label_position_main, 'toggle_main_color' => $toggle_main_color, 'toggle_title_font_family' => $toggle_title_font_family, 'toggle_title_font_size' => $toggle_title_font_size, 'toggle_title_font_color' => $toggle_title_font_color, 'toggle_title_font_style_bold' => $toggle_title_font_style_bold, 'toggle_title_font_style_italic' => $toggle_title_font_style_italic, 'toggle_title_font_style_decoration' => $toggle_title_font_style_decoration, 'toggle_button_font_family' => $toggle_button_font_family, 'toggle_button_font_size' => $toggle_button_font_size, 'toggle_button_font_color' => $toggle_button_font_color, 'toggle_button_font_style_bold' => $toggle_button_font_style_bold, 'toggle_button_font_style_italic' => $toggle_button_font_style_italic, 'toggle_button_font_style_decoration' => $toggle_button_font_style_decoration);



        $button_shadow_clr = @$_POST['button_shadow_color'];
        $button_radius = @$_POST['button_radius'];

        $header_font_setting = array('font_family' => @$header_font_family, 'font_size' => @$header_font_size, 'font_color' => @$header_font_color, 'font_style' => @$header_font_style);
        $price_font_setting = array('font_family' => @$price_font_family, 'font_size' => @$price_font_size, 'font_color' => @$price_font_color, 'font_style' => @$price_font_style);
        $price_text_font_setting = array('font_family' => @$price_text_font_family, 'font_size' => @$price_text_font_size, 'font_color' => @$price_text_font_color, 'font_style' => @$price_text_font_style);
        $content_font_setting = array('font_family' => @$content_font_family, 'font_size' => @$content_font_size, 'font_color' => @$content_font_color, 'font_style' => @$content_font_style);
        $button_font_setting = array('font_family' => @$button_font_family, 'font_size' => @$button_font_size, 'font_color' => @$button_font_color, 'font_style' => @$button_font_style);
        $button_settings = array('button_shadow_color' => @$button_shadow_clr, 'button_radius' => @$button_radius);

        $font_setting = array('header_fonts' => $header_font_setting, 'price_fonts' => $price_font_setting, 'price_text_fonts' => $price_text_font_setting, 'content_fonts' => $content_font_setting, 'button_fonts' => $button_font_setting);

        $is_column_space = @$_POST['space_between_column'];
        $column_space = @$_POST['column_space'];
        $hover_highlight = @$_POST['column_high_on_hover'];
        $is_responsive = @$_POST['is_responsive'];
        $all_column_width = @$_POST['all_column_width'];

        $arp_row_border_size = @$_POST['arp_row_border_size'];
        $arp_row_border_type = @$_POST['arp_row_border_type'];
        $arp_row_border_color = @$_POST['arp_row_border_color'];

//        Caption Row Level Border
        $arp_caption_row_border_size = @$_POST['arp_caption_row_border_size'];
        $arp_caption_row_border_style = @$_POST['arp_caption_row_border_style'];
        $arp_caption_row_border_color = @$_POST['arp_caption_row_border_color'];
//        Caption Row Level Border

        $arp_column_border_size = @$_POST['arp_column_border_size'];
        $arp_column_border_type = @$_POST['arp_column_border_type'];
        $arp_column_border_color = @$_POST['arp_column_border_color'];

        $arp_column_border_left = @$_POST['arp_column_border_left'];
        $arp_column_border_right = @$_POST['arp_column_border_right'];
        $arp_column_border_top = @$_POST['arp_column_border_top'];
        $arp_column_border_bottom = @$_POST['arp_column_border_bottom'];

        $arp_caption_border_color = @$_POST['arp_caption_border_color'];
        $arp_caption_border_style = @$_POST['arp_caption_border_style'];
        $arp_caption_border_size = @$_POST['arp_caption_border_size'];

        $arp_caption_border_left = @$_POST['arp_caption_border_left'];
        $arp_caption_border_right = @$_POST['arp_caption_border_right'];
        $arp_caption_border_top = @$_POST['arp_caption_border_top'];
        $arp_caption_border_bottom = @$_POST['arp_caption_border_bottom'];


        $hide_caption_column = @$_POST['hide_caption_column'];
        $full_column_clickable = @$_POST['full_column_clickable'];
        $disable_hover_effect = @$_POST['disable_hover_effect'];
        $hide_footer_global = @$_POST['hide_footer_global'];
        $hide_header_global = @$_POST['hide_header_global'];
        $hide_price_global = @$_POST['hide_price_global'];
        $hide_feature_global = @$_POST['hide_feature_global'];
        $hide_description_global = @$_POST['hide_description_global'];
        $hide_header_shortcode_global = @$_POST['hide_header_shortcode_global'];

        $column_opacity = @$_POST['column_opacity'];
        $column_wrapper_width_txtbox = @$_POST['column_wrapper_width_txtbox'];
        $column_wrapper_width_style = @$_POST['column_wrapper_width_style'];

        $display_column_mobile = @$_POST['arp_display_columns_mobile'];
        $display_column_tablet = @$_POST['arp_display_columns_tablet'];
        $display_column_desktop = @$_POST['arp_display_columns_desktop'];

        $column_box_shadow_effect = @$_POST['column_box_shadow_effect'];
        $toggle_column_animation = @$_POST['toggle_column_animation'];

        $column_border_radius_top_left = ( isset($_POST['column_border_radius_top_left']) and ! empty($_POST['column_border_radius_top_left']) ) ? $_POST['column_border_radius_top_left'] : 0;
        $column_border_radius_top_right = ( isset($_POST['column_border_radius_top_right']) and ! empty($_POST['column_border_radius_top_right']) ) ? $_POST['column_border_radius_top_right'] : 0;
        $column_border_radius_bottom_right = ( isset($_POST['column_border_radius_bottom_right']) and ! empty($_POST['column_border_radius_bottom_right']) ) ? $_POST['column_border_radius_bottom_right'] : 0;
        $column_border_radius_bottom_left = ( isset($_POST['column_border_radius_bottom_left']) and ! empty($_POST['column_border_radius_bottom_left']) ) ? $_POST['column_border_radius_bottom_left'] : 0;
        $column_hide_blank_rows = @$_POST['hide_blank_rows'];

        $global_button_border_width = @$_POST['arp_global_button_border_width'];
        $global_button_border_type = @$_POST['arp_global_button_border_style'];
        $global_button_border_color = @$_POST['arp_global_button_border_color'];
        $global_button_border_radius_top_left = @$_POST['global_button_border_radius_top_left'];
        $global_button_border_radius_top_right = @$_POST['global_button_border_radius_top_right'];
        $global_button_border_radius_bottom_left = @$_POST['global_button_border_radius_bottom_left'];
        $global_button_border_radius_bottom_right = @$_POST['global_button_border_radius_bottom_right'];
        $arp_global_button_border_type = @$_POST['arp_global_button_type'];
        $disable_button_hover_effect = @$_POST['disable_button_hover_effect'];

        $header_font_family_global = @$_POST['header_font_family_global'];
        $header_font_size_global = @$_POST['header_font_size_global'];
        $arp_header_text_alignment = @$_POST['arp_header_text_alignment'];

        $header_style_bold_global = @$_POST['header_style_bold_global'];
        $header_style_italic_global = @$_POST['header_style_italic_global'];
        $header_style_decoration_global = @$_POST['header_style_decoration_global'];

        $price_font_family_global = @$_POST['price_font_family_global'];
        $price_font_size_global = @$_POST['price_font_size_global'];
        $arp_price_text_alignment = @$_POST['arp_price_text_alignment'];

        $price_style_bold_global = @$_POST['price_style_bold_global'];
        $price_style_italic_global = @$_POST['price_style_italic_global'];
        $price_style_decoration_global = @$_POST['price_style_decoration_global'];

        $body_font_family_global = @$_POST['body_font_family_global'];
        $body_font_size_global = @$_POST['body_font_size_global'];
        $arp_body_text_alignment = @$_POST['arp_body_text_alignment'];

        $body_style_bold_global = @$_POST['body_style_bold_global'];
        $body_style_italic_global = @$_POST['body_style_italic_global'];
        $body_style_decoration_global = @$_POST['body_style_decoration_global'];

        $footer_font_family_global = @$_POST['footer_font_family_global'];
        $footer_font_size_global = @$_POST['footer_font_size_global'];
        $arp_footer_text_alignment = @$_POST['arp_footer_text_alignment'];

        $footer_style_bold_global = @$_POST['footer_style_bold_global'];
        $footer_style_italic_global = @$_POST['footer_style_italic_global'];
        $footer_style_decoration_global = @$_POST['footer_style_decoration_global'];

        $button_font_family_global = @$_POST['button_font_family_global'];
        $button_font_size_global = @$_POST['button_font_size_global'];
        $arp_button_text_alignment = @$_POST['arp_button_text_alignment'];

        $button_style_bold_global = @$_POST['button_style_bold_global'];
        $button_style_italic_global = @$_POST['button_style_italic_global'];
        $button_style_decoration_global = @$_POST['button_style_decoration_global'];

        $description_font_family_global = @$_POST['description_font_family_global'];
        $description_font_size_global = @$_POST['description_font_size_global'];
        $arp_description_text_alignment = @$_POST['arp_description_text_alignment'];

        $description_style_bold_global = @$_POST['description_style_bold_global'];
        $description_style_italic_global = @$_POST['description_style_italic_global'];
        $description_style_decoration_global = @$_POST['description_style_decoration_global'];

        $column_setting = array('space_between_column' => $is_column_space, 'column_space' => $column_space, 'column_highlight_on_hover' => $hover_highlight, 'is_responsive' => $is_responsive, 'hide_caption_column' => $hide_caption_column, 'full_column_clickable' => $full_column_clickable, 'column_opacity' => $column_opacity, 'all_column_width' => $all_column_width, 'column_wrapper_width_txtbox' => $column_wrapper_width_txtbox, 'column_wrapper_width_style' => $column_wrapper_width_style, 'column_border_radius_top_left' => $column_border_radius_top_left, 'column_border_radius_top_right' => $column_border_radius_top_right, 'column_border_radius_bottom_right' => $column_border_radius_bottom_right, 'column_border_radius_bottom_left' => $column_border_radius_bottom_left, 'column_box_shadow_effect' => $column_box_shadow_effect, 'column_hide_blank_rows' => $column_hide_blank_rows, 'display_col_mobile' => $display_column_mobile, 'display_col_tablet' => $display_column_tablet, 'hide_header_global' => $hide_header_global, 'hide_header_shortcode_global' => $hide_header_shortcode_global, 'hide_price_global' => $hide_price_global, 'hide_feature_global' => $hide_feature_global, 'hide_description_global' => $hide_description_global, 'hide_footer_global' => $hide_footer_global, 'display_col_desktop' => $display_column_desktop, 'global_button_border_width' => $global_button_border_width, 'global_button_border_type' => $global_button_border_type, 'global_button_border_color' => $global_button_border_color, 'global_button_border_radius_top_left' => $global_button_border_radius_top_left, 'global_button_border_radius_top_right' => $global_button_border_radius_top_right, 'global_button_border_radius_bottom_left' => $global_button_border_radius_bottom_left, 'global_button_border_radius_bottom_right' => $global_button_border_radius_bottom_right, 'arp_global_button_type' => $arp_global_button_border_type, 'disable_button_hover_effect' => $disable_button_hover_effect, 'toggle_column_animation' => $toggle_column_animation, 'disable_hover_effect' => $disable_hover_effect, 'arp_row_border_size' => $arp_row_border_size, 'arp_row_border_type' => $arp_row_border_type, 'arp_row_border_color' => $arp_row_border_color, 'arp_caption_border_style' => $arp_caption_border_style, 'arp_caption_border_size' => $arp_caption_border_size, 'arp_column_border_size' => $arp_column_border_size, 'arp_column_border_type' => $arp_column_border_type, 'arp_column_border_color' => $arp_column_border_color, 'arp_caption_border_color' => $arp_caption_border_color, 'arp_column_border_left' => $arp_column_border_left, 'arp_column_border_right' => $arp_column_border_right, 'arp_column_border_top' => $arp_column_border_top, 'arp_column_border_bottom' => $arp_column_border_bottom, 'arp_caption_border_left' => $arp_caption_border_left, 'arp_caption_border_right' => $arp_caption_border_right, 'arp_caption_border_top' => $arp_caption_border_top, 'arp_caption_border_bottom' => $arp_caption_border_bottom, 'arp_caption_row_border_size' => $arp_caption_row_border_size, 'arp_caption_row_border_style' => $arp_caption_row_border_style, 'arp_caption_row_border_color' => $arp_caption_row_border_color,
            'header_font_family_global' => $header_font_family_global,
            'header_font_size_global' => $header_font_size_global,
            'arp_header_text_alignment' => $arp_header_text_alignment,
            'arp_header_text_bold_global' => $header_style_bold_global,
            'arp_header_text_italic_global' => $header_style_italic_global,
            'arp_header_text_decoration_global' => $header_style_decoration_global,
            'price_font_family_global' => $price_font_family_global,
            'price_font_size_global' => $price_font_size_global,
            'arp_price_text_alignment' => $arp_price_text_alignment,
            'arp_price_text_bold_global' => $price_style_bold_global,
            'arp_price_text_italic_global' => $price_style_italic_global,
            'arp_price_text_decoration_global' => $price_style_decoration_global,
            'body_font_family_global' => $body_font_family_global,
            'body_font_size_global' => $body_font_size_global,
            'arp_body_text_alignment' => $arp_body_text_alignment,
            'arp_body_text_bold_global' => $body_style_bold_global,
            'arp_body_text_italic_global' => $body_style_italic_global,
            'arp_body_text_decoration_global' => $body_style_decoration_global,
            'footer_font_family_global' => $footer_font_family_global,
            'footer_font_size_global' => $footer_font_size_global,
            'arp_footer_text_alignment' => $arp_footer_text_alignment,
            'arp_footer_text_bold_global' => $footer_style_bold_global,
            'arp_footer_text_italic_global' => $footer_style_italic_global,
            'arp_footer_text_decoration_global' => $footer_style_decoration_global,
            'button_font_family_global' => $button_font_family_global,
            'button_font_size_global' => $button_font_size_global,
            'arp_button_text_alignment' => $arp_button_text_alignment,
            'arp_button_text_bold_global' => $button_style_bold_global,
            'arp_button_text_italic_global' => $button_style_italic_global,
            'arp_button_text_decoration_global' => $button_style_decoration_global,
            'description_font_family_global' => $description_font_family_global,
            'description_font_size_global' => $description_font_size_global,
            'arp_description_text_alignment' => $arp_description_text_alignment,
            'arp_description_text_bold_global' => $description_style_bold_global,
            'arp_description_text_italic_global' => $description_style_italic_global,
            'arp_description_text_decoration_global' => $description_style_decoration_global,
        );



        $is_animation = @$_POST['is_animation'];
        $visible_columns = @$_POST['visible_columns'];
        $scroll_column = @$_POST['column_to_scroll'];
        $is_navigation = @$_POST['is_navigation'];
        $is_autoplay = @$_POST['is_autoplay'];
        $sliding_effect = @$_POST['sliding_effect'];
        $transition_speed = @$_POST['slide_transition_speed'];
        $hide_caption_animation = @$_POST['hide_caption_animation'];
        $navigation_style = @$_POST['navigation_style'];
        $easing_effect = @$_POST['easing_effect'];
        $is_pagination = @$_POST['is_pagination'];
        $pagination_style = @$_POST['pagination_style'];
        $pagination_position = @$_POST['pagination_position'];
        $infinite = @$_POST['is_infinite'];
        $pagi_nav_btn = @$_POST['pagination_navigation_buttons'];
        $navi_nav_btn = @$_POST['navigation_buttons'];
        $sticky_caption = @$_POST['sticky_caption'];

        $column_animation = array('is_animation' => $is_animation, 'visible_column' => $visible_columns, 'scrolling_columns' => $scroll_column, 'navigation' => $is_navigation, 'autoplay' => $is_autoplay, 'sliding_effect' => $sliding_effect, 'transition_speed' => $transition_speed, 'hide_caption' => $hide_caption_animation, 'navigation_style' => $navigation_style, 'easing_effect' => $easing_effect, 'is_pagination' => $is_pagination, 'pagination_style' => $pagination_style, 'pagination_position' => $pagination_position, 'is_infinite' => $infinite, 'pagi_nav_btn' => $pagi_nav_btn, 'navi_nav_btn' => $navi_nav_btn, 'sticky_caption' => $sticky_caption);

        $tooltip_bgcolor = @stripslashes_deep(@$_POST['tooltip_bgcolor']);
        $tooltip_txt_color = @stripslashes_deep(@$_POST['tooltip_txtcolor']);
        $tooltip_animation = @$_POST['tooltip_animation_style'];
        $tooltip_position = @$_POST['tooltip_position'];
        $tooltip_width = @$_POST['tooltip_width'];
        $tooltip_style = @$_POST['tooltip_style'];
        $tooltip_font_family = @stripslashes_deep(@$_POST['tooltip_font_family']);
        $tooltip_font_size = @$_POST['tooltip_font_size'];

        //$tooltip_font_style = @$_POST['tooltip_font_style'];
        $tooltip_font_style_bold = @$_POST['tooltip_font_style_bold'];
        $tooltip_font_style_italic = @$_POST['tooltip_font_style_italic'];
        $tooltip_font_style_decoration = @$_POST['tooltip_font_style_decoration'];


        $tooltip_trigger_type = @$_POST['tooltip_trigger_type'];
        $tooltip_display_style = @$_POST['tooltip_display_style'];
        $tooltip_informative_icon = @$_POST['tooltip_informative_icon'];
        $tooltip_icon_position = @$_POST['tooltip_icon_position'];

        $arp_column_bg_custom_color = @$_POST['arp_column_background_color'];

        $arp_column_desc_bg_custom_color = @$_POST['arp_column_desc_background_color'];

        $arp_column_desc_hover_bg_custom_color = @$_POST['arp_column_desc_hover_background_color'];

        $arp_header_bg_custom_color = @$_POST['arp_header_background_color'];

        $arp_pricing_bg_custom_color = @$_POST['arp_pricing_background_color'];

        $arp_template_odd_row_hover_bg_color = @$_POST['arp_body_odd_row_hover_background_color'];

        $arp_template_odd_row_bg_color = @$_POST['arp_body_odd_row_background_color'];

        $arp_body_even_row_hover_bg_custom_color = @$_POST['arp_body_even_row_hover_background_color'];

        $arp_body_even_row_bg_custom_color = @$_POST['arp_body_even_row_background_color'];

        $arp_footer_content_bg_color = @$_POST['arp_footer_content_background_color'];

        $arp_footer_content_hover_bg_color = @$_POST['arp_footer_content_hover_background_color'];

        $arp_button_bg_custom_color = @$_POST['arp_button_background_color'];

        $arp_column_bg_hover_color = @$_POST['arp_column_bg_hover_color'];

        $arp_button_bg_hover_color = @$_POST['arp_button_bg_hover_color'];

        $arp_header_bg_hover_color = @$_POST['arp_header_bg_hover_color'];

        $arp_price_bg_hover_color = @$_POST['arp_price_bg_hover_color'];

        $arp_header_font_custom_color = @$_POST['arp_header_font_custom_color_input'];

        $arp_header_font_custom_hover_color_input = @$_POST['arp_header_font_custom_hover_color_input'];

        $arp_price_font_custom_color = @$_POST['arp_price_font_custom_color_input'];

        $arp_price_font_custom_hover_color_input = @$_POST['arp_price_font_custom_hover_color_input'];

        $arp_price_duration_font_custom_color = @$_POST['arp_price_duration_font_custom_color_input'];

        $arp_price_duration_font_custom_hover_color_input = @$_POST['arp_price_duration_font_custom_hover_color_input'];

        $arp_desc_font_custom_color = @$_POST['arp_desc_font_custom_color_input'];

        $arp_desc_font_custom_hover_color_input = @$_POST['arp_desc_font_custom_hover_color_input'];

        $arp_body_label_font_custom_color = @$_POST['arp_body_label_font_custom_color_input'];

        $arp_body_label_font_custom_hover_color_input = @$_POST['arp_body_label_font_custom_hover_color_input'];

        $arp_body_font_custom_color = @$_POST['arp_body_font_custom_color_input'];
        $arp_body_even_font_custom_color = @$_POST['arp_body_even_font_custom_color_input'];

        $arp_body_font_custom_hover_color_input = @$_POST['arp_body_font_custom_hover_color_input'];
        $arp_body_even_font_custom_hover_color_input = @$_POST['arp_body_even_font_custom_hover_color_input'];

        $arp_footer_font_custom_color = @$_POST['arp_footer_font_custom_color_input'];

        $arp_footer_font_custom_hover_color_input = @$_POST['arp_footer_font_custom_hover_color_input'];

        $arp_button_font_custom_color = @$_POST['arp_button_font_custom_color_input'];

        $arp_button_font_custom_hover_color_input = @$_POST['arp_button_font_custom_hover_color_input'];

        $arp_shortocode_background = @$_POST['arp_shortocode_background_color'];
        $arp_shortocode_font_color = @$_POST['arp_shortocode_font_custom_color_input'];
        $arp_shortcode_bg_hover_color = @$_POST['arp_shortcode_bg_hover_color'];
        $arp_shortcode_font_hover_color = @$_POST['arp_shortcode_font_custom_hover_color_input'];

        $custom_skin_colors = array(
            "arp_header_bg_custom_color" => $arp_header_bg_custom_color,
            "arp_column_bg_custom_color" => $arp_column_bg_custom_color,
            "arp_column_desc_bg_custom_color" => $arp_column_desc_bg_custom_color,
            "arp_column_desc_hover_bg_custom_color" => $arp_column_desc_hover_bg_custom_color,
            "arp_pricing_bg_custom_color" => $arp_pricing_bg_custom_color,
            "arp_body_odd_row_bg_custom_color" => $arp_template_odd_row_bg_color,
            "arp_body_odd_row_hover_bg_custom_color" => $arp_template_odd_row_hover_bg_color,
            "arp_body_even_row_hover_bg_custom_color" => $arp_body_even_row_hover_bg_custom_color,
            "arp_body_even_row_bg_custom_color" => $arp_body_even_row_bg_custom_color,
            "arp_footer_content_hover_bg_color" => $arp_footer_content_hover_bg_color,
            "arp_footer_content_bg_color" => $arp_footer_content_bg_color,
            "arp_button_bg_custom_color" => $arp_button_bg_custom_color,
            "arp_column_bg_hover_color" => $arp_column_bg_hover_color,
            "arp_button_bg_hover_color" => $arp_button_bg_hover_color,
            "arp_header_bg_hover_color" => $arp_header_bg_hover_color,
            "arp_price_bg_hover_color" => $arp_price_bg_hover_color,
            "arp_header_font_custom_color" => $arp_header_font_custom_color,
            "arp_header_font_custom_hover_color" => $arp_header_font_custom_hover_color_input,
            "arp_price_font_custom_color" => $arp_price_font_custom_color,
            "arp_price_font_custom_hover_color" => $arp_price_font_custom_hover_color_input,
            "arp_desc_font_custom_color" => $arp_desc_font_custom_color,
            "arp_desc_font_custom_hover_color" => $arp_desc_font_custom_hover_color_input,
            "arp_body_label_font_custom_color" => $arp_body_label_font_custom_color,
            "arp_body_label_font_custom_hover_color" => $arp_body_label_font_custom_hover_color_input,
            "arp_body_font_custom_color" => $arp_body_font_custom_color,
            "arp_body_even_font_custom_color" => $arp_body_even_font_custom_color,
            "arp_body_font_custom_hover_color" => $arp_body_font_custom_hover_color_input,
            "arp_body_even_font_custom_hover_color" => $arp_body_even_font_custom_hover_color_input,
            "arp_footer_font_custom_color" => $arp_footer_font_custom_color,
            "arp_footer_font_custom_hover_color" => $arp_footer_font_custom_hover_color_input,
            "arp_button_font_custom_color" => $arp_button_font_custom_color,
            "arp_button_font_custom_hover_color" => $arp_button_font_custom_hover_color_input,
            'arp_shortocode_background' => $arp_shortocode_background,
            'arp_shortocode_font_color' => $arp_shortocode_font_color,
            'arp_shortcode_bg_hover_color' => $arp_shortcode_bg_hover_color,
            'arp_shortcode_font_hover_color' => $arp_shortcode_font_hover_color,
        );


        $tooltip_setting = array('background_color' => $tooltip_bgcolor, 'text_color' => $tooltip_txt_color, 'animation' => $tooltip_animation, 'position' => $tooltip_position, 'tooltip_width' => $tooltip_width, 'style' => $tooltip_style, 'tooltip_font_family' => $tooltip_font_family, 'tooltip_font_size' => $tooltip_font_size, 'tooltip_font_style_bold' => $tooltip_font_style_bold, 'tooltip_font_style_italic' => $tooltip_font_style_italic, 'tooltip_font_style_decoration' => $tooltip_font_style_decoration, 'tooltip_trigger_type' => $tooltip_trigger_type, 'tooltip_display_style' => $tooltip_display_style, 'tooltip_informative_icon' => $tooltip_informative_icon, 'tooltip_icon_position' => $tooltip_icon_position);

        $tab_general_opt = array('template_setting' => $template_setting,
            'font_settings' => $font_setting,
            'column_settings' => $column_setting,
            'column_animation' => $column_animation,
            'tooltip_settings' => $tooltip_setting,
            'general_settings' => $general_settings,
            'button_settings' => $button_settings,
            'custom_skin_colors' => $custom_skin_colors
        );

        $general_opt = maybe_serialize($tab_general_opt);

        $row = array();
        $column_order = array();
        $row_order = array();

        if (count($total) > 0) {

            if ($pt_action == "new") {
                if ($is_tbl_preview && $is_tbl_preview == 1) {
                    $temp_status = 'draft';

                    $id = $wpdb->query($wpdb->prepare('INSERT INTO ' . $wpdb->prefix . 'arp_arprice (table_name,general_options,status,create_date,arp_last_updated_date) VALUES (%s,%s,%s,%s,%s)', $main_table_title, $general_opt, $temp_status, $dt, $dt));

                    $table_id = $wpdb->insert_id;
                } else {
                    $new_status = 'published';

                    $type_of_template = @$template_feature['is_animated'];

                    $id = $wpdb->query($wpdb->prepare('INSERT INTO ' . $wpdb->prefix . 'arp_arprice (table_name,general_options,is_animated,status,create_date,arp_last_updated_date) VALUES (%s,%s,%d,%s,%s,%s)', $main_table_title, $general_opt, $type_of_template, $new_status, $dt, $dt));
                    $table_id = $wpdb->insert_id;
                }
            } else {
                $query_results = $wpdb->query($wpdb->prepare('UPDATE ' . $wpdb->prefix . 'arp_arprice SET table_name = %s, general_options= %s,arp_last_updated_date=%s WHERE ID = %d', $main_table_title, $general_opt, $dt, $table_id));

                if (!isset($_POST['is_tbl_preview']))
                    $wpdb->update($wpdb->prefix . 'arp_arprice', array('status' => 'published', 'arp_last_updated_date' => $dt), array('ID' => $table_id));
            }

            // AFTER UPDATE PRICING TABLE

            do_action('arp_after_update_pricing_table', $table_id, $_POST);
            do_action('arp_after_update_pricing_table' . $table_id, $table_id, $_POST);

            $table_id = apply_filters('arp_change_values_after_update_pricing_table', $table_id, $_POST);

            if (count($new_id) > 0) {
                $ki = 1;
                for ($i = 0; $i <= $total; $i++) {
                    if (!in_array($i, $new_id))
                        continue;
                    $Title = 'column_' . $i;
                    $column_width = @$_POST['column_width_' . $i];
                    $column_title = @stripslashes_deep(@$_POST['column_title_' . $i]);

                    $column_title_second = @stripslashes_deep(@$_POST['column_title_second_' . $i]);
                    $column_title_third = @stripslashes_deep(@$_POST['column_title_third_' . $i]);

                    $column_desc = @stripslashes_deep(@$_POST['arp_column_description_' . $i]);
                    $column_desc_second = @stripslashes_deep(@$_POST['arp_column_description_second_' . $i]);
                    $column_desc_third = @stripslashes_deep(@$_POST['arp_column_description_third_' . $i]);
                    $cstm_rbn_txt = @stripslashes_deep(@$_POST['arp_custom_ribbon_txt_' . $i]);
                    $column_highlight = @$_POST['column_highlight_' . $i];
                    $column_background_color = @stripslashes_deep(@$_POST['column_background_color_' . $i]);
                    $column_hover_background_color = @stripslashes_deep(@$_POST['column_hover_background_color_' . $i]);
                    $arp_change_bgcolor = @stripslashes_deep(@$_POST['arp_change_bgcolor_' . $i]);
                    $column_background_image = @stripslashes_deep(@$_POST['arp_column_background_image_' . $i]);
                    $column_background_image_height = @stripslashes_deep(@$_POST['arp_column_background_image_height_' . $i]);
                    $column_background_image_width = @stripslashes_deep(@$_POST['arp_column_background_image_width_' . $i]);

                    $column_background_scaling = @stripslashes_deep(@$_POST['column_background_scaling_' . $i]);
                    $column_background_min_positon = @stripslashes_deep(@$_POST['column_background_min_positon_' . $i]);
                    $column_background_max_positon = @stripslashes_deep(@$_POST['column_background_max_positon_' . $i]);


//                    $hide_footer = isset($_POST['hide_footer_' . $i]) ? $_POST['hide_footer_' . $i] : '';

                    $column_ribbon_style = @stripslashes_deep(@$_POST['arp_ribbon_style_' . $i]);
                    $column_ribbon_position = @stripslashes_deep(@$_POST['arp_ribbon_position_' . $i]);
                    $column_ribbon_bgcolor = @stripslashes_deep(@$_POST['arp_ribbon_bgcol_' . $i]);
                    $column_ribbon_txtcolor = @stripslashes_deep(@$_POST['arp_ribbon_textcol_' . $i]);
                    $column_ribbon_content = @stripslashes_deep(@$_POST['arp_ribbon_content_' . $i]);
                    $column_ribbon_content_second = @stripslashes_deep(@$_POST['arp_ribbon_content_second_' . $i]);
                    $column_ribbon_content_third = @stripslashes_deep(@$_POST['arp_ribbon_content_third_' . $i]);
                    $column_ribbon_position_rl = @stripslashes_deep(@$_POST['arp_ribbon_custom_position_rl_' . $i]);
                    $column_ribbon_position_top = @stripslashes_deep(@$_POST['arp_ribbon_custom_position_top_' . $i]);

                    $column_custom_ribbon_url = @stripslashes_deep(@$_POST['arp_custom_ribbon_url_' . $i]);
                    $column_custom_ribbon_url_second = @stripslashes_deep(@$_POST['arp_custom_ribbon_url_second_' . $i]);
                    $column_custom_ribbon_url_third = @stripslashes_deep(@$_POST['arp_custom_ribbon_url_third_' . $i]);

                    $is_post_variables = isset($_POST['post_variables_' . $i]) ? $_POST['post_variables_' . $i] : 0;
                    $post_variables_content = isset($_POST['post_variables_content_' . $i]) ? $_POST['post_variables_content_' . $i] : '';
                    $post_variables_content_second = isset($_POST['post_variables_content_second_' . $i]) ? $_POST['post_variables_content_second_' . $i] : '';
                    $post_variables_content_third = isset($_POST['post_variables_content_third_' . $i]) ? $_POST['post_variables_content_third_' . $i] : '';

                    $header_background_color = @stripslashes_deep(@$_POST['header_background_color_' . $i]);
                    $header_hover_background_color = @stripslashes_deep(@$_POST['header_hover_background_color_' . $i]);

                    $header_font_family = @stripslashes_deep(@$_POST['header_font_family_' . $i]);
                    $header_font_size = @$_POST['header_font_size_' . $i];
                    $header_font_style = @$_POST['header_font_style_' . $i];
                    $header_font_color = @stripslashes_deep(@$_POST['header_font_color_' . $i]);
                    $header_hover_font_color = @stripslashes_deep(@$_POST['header_hover_font_color_' . $i]);
                    $header_font_align = @stripslashes_deep(@$_POST['arp_header_text_alignment_' . $i]);

                    $header_style_bold = @$_POST['header_style_bold_' . $i];
                    $header_style_italic = @$_POST['header_style_italic_' . $i];
                    $header_style_decoration = @$_POST['header_style_decoration_' . $i];
                    $header_background_image = @stripslashes_deep(@$_POST['arp_header_background_image_' . $i]);

                    $price_background_color = @stripslashes_deep(@$_POST['price_background_color_' . $i]);
                    $price_hover_background_color = @stripslashes_deep(@$_POST['price_hover_background_color_' . $i]);
                    $price_font_family = @stripslashes_deep(@$_POST['price_font_family_' . $i]);
                    $price_font_size = @$_POST['price_font_size_' . $i];
                    $price_font_color = @stripslashes_deep(@$_POST['price_font_color_' . $i]);
                    $price_hover_font_color = @stripslashes_deep(@$_POST['price_hover_font_color_' . $i]);
                    $price_font_style = @$_POST['price_font_style_' . $i];
                    $price_font_align = @$_POST['arp_price_text_alignment_' . $i];

                    $price_label_style_bold = @$_POST['price_label_style_bold_' . $i];
                    $price_label_style_italic = @$_POST['price_label_style_italic_' . $i];
                    $price_label_style_decoration = @$_POST['price_label_style_decoration_' . $i];

                    $price_text_font_family = @stripslashes_deep(@$_POST['price_text_font_family_' . $i]);
                    $price_text_font_size = @$_POST['price_text_font_size_' . $i];
                    $price_text_font_style = @$_POST['price_text_font_style_' . $i];
                    $price_text_font_color = @stripslashes_deep(@$_POST['price_text_font_color_' . $i]);
                    $price_text_hover_font_color = @stripslashes_deep(@$_POST['price_text_hover_font_color_' . $i]);

                    $price_text_style_bold = @$_POST['price_text_style_bold_' . $i];
                    $price_text_style_italic = @$_POST['price_text_style_italic_' . $i];
                    $price_text_style_decoration = @$_POST['price_text_style_decoration_' . $i];


                    $column_description_font_family = @stripslashes_deep(@$_POST['column_description_font_family_' . $i]);
                    $column_description_font_size = @$_POST['column_description_font_size_' . $i];
                    $column_description_font_style = @$_POST['column_description_font_style_' . $i];
                    $column_description_font_color = @stripslashes_deep(@$_POST['column_description_font_color_' . $i]);
                    $column_description_hover_font_color = @stripslashes_deep(@$_POST['column_description_hover_font_color_' . $i]);
                    $column_desc_background_color = @stripslashes_deep(@$_POST['column_desc_background_color_' . $i]);
                    $column_desc_hover_background_color = @stripslashes_deep(@$_POST['column_desc_hover_background_color_' . $i]);


                    $column_description_style_bold = @$_POST['column_description_style_bold_' . $i];
                    $column_description_style_italic = @$_POST['column_description_style_italic_' . $i];
                    $column_description_style_decoration = @$_POST['column_description_style_decoration_' . $i];
                    $column_description_text_align = @$_POST['arp_description_text_alignment_' . $i];


                    $content_font_family = @stripslashes_deep(@$_POST['content_font_family_' . $i]);
                    $content_font_size = @$_POST['content_font_size_' . $i];
                    $content_font_color = @stripslashes_deep(@$_POST['content_font_color_' . $i]);
                    $content_even_font_color = @stripslashes_deep(@$_POST['content_even_font_color_' . $i]);
                    $content_hover_font_color = @stripslashes_deep(@$_POST['content_hover_font_color_' . $i]);
                    $content_even_hover_font_color = @stripslashes_deep(@$_POST['content_even_hover_font_color_' . $i]);
                    $content_font_style = @$_POST['content_font_style_' . $i];

                    $content_odd_color = @$_POST['content_odd_color_' . $i];
                    $content_odd_hover_color = @$_POST['content_odd_hover_color_' . $i];
                    $content_even_color = @$_POST['content_even_color_' . $i];
                    $content_even_hover_color = @$_POST['content_even_hover_color_' . $i];

                    $body_li_style_bold = @$_POST['body_li_style_bold_' . $i];
                    $body_li_style_italic = @$_POST['body_li_style_italic_' . $i];
                    $body_li_style_decoration = @$_POST['body_li_style_decoration_' . $i];


                    $content_label_font_family = @stripslashes_deep(@$_POST['content_label_font_family_' . $i]);
                    $content_label_font_size = @$_POST['content_label_font_size_' . $i];
                    $content_label_font_color = @stripslashes_deep(@$_POST['content_label_font_color_' . $i]);
                    $content_label_hover_font_color = @stripslashes_deep(@$_POST['content_label_hover_font_color_' . $i]);
                    $content_label_font_style = @$_POST['content_font_style_' . $i];

                    $body_label_style_bold = @$_POST['body_label_style_bold_' . $i];
                    $body_label_style_italic = @$_POST['body_label_style_italic_' . $i];
                    $body_label_style_decoration = @$_POST['body_label_style_decoration_' . $i];

                    $button_background_color = @stripslashes_deep(@$_POST['button_background_color_' . $i]);
                    $button_hover_background_color = @stripslashes_deep(@$_POST['button_hover_background_color_' . $i]);
                    $button_font_family = @stripslashes_deep(@$_POST['button_font_family_' . $i]);
                    $button_font_size = @$_POST['button_font_size_' . $i];
                    $button_font_color = @stripslashes_deep(@$_POST['button_font_color_' . $i]);
                    $button_hover_font_color = @stripslashes_deep(@$_POST['button_hover_font_color_' . $i]);
                    $button_font_style = @$_POST['button_font_style_' . $i];

                    $button_style_bold = @$_POST['button_style_bold_' . $i];
                    $button_style_italic = @$_POST['button_style_italic_' . $i];
                    $button_style_decoration = @$_POST['button_style_decoration_' . $i];

                    $caption = isset($_POST['caption_column_' . $i]) ? $_POST['caption_column_' . $i] : 0;

                    $footer_content = @stripslashes_deep(@$_POST['footer_content_' . $i]);
                    $footer_content_second = @stripslashes_deep(@$_POST['footer_content_second_' . $i]);
                    $footer_content_third = @stripslashes_deep(@$_POST['footer_content_third_' . $i]);
                    $footer_content_position = @$_POST['footer_content_position_' . $i];
                    $footer_text_align = @$_POST['arp_footer_text_alignment_' . $i];
                    $footer_background_color = @$_POST['footer_bg_color_' . $i];
                    $footer_hover_background_color = @$_POST['footer_hover_bg_color_' . $i];
                    $footer_level_options_font_family = @$_POST['footer_level_options_font_family_' . $i];
                    $footer_level_options_font_size = @$_POST['footer_level_options_font_size_' . $i];
                    $footer_level_options_font_color = @$_POST['footer_level_options_font_color_' . $i];
                    $footer_level_options_hover_font_color = @$_POST['footer_level_options_hover_font_color_' . $i];
                    $footer_level_options_font_style_bold = @$_POST['footer_level_options_font_style_bold_' . $i];
                    $footer_level_options_font_style_italic = @$_POST['footer_level_options_font_style_italic_' . $i];
                    $footer_level_options_font_style_decoration = @$_POST['footer_level_options_font_style_decoration_' . $i];


                    $header_shortcode = @stripslashes_deep(@$_POST['additional_shortcode_' . $i]);
                    $header_shortcode_second = @stripslashes_deep(@$_POST['additional_shortcode_second_' . $i]);
                    $header_shortcode_third = @stripslashes_deep(@$_POST['additional_shortcode_third_' . $i]);
                    $arp_shortcode_customization_style = @stripslashes_deep(@$_POST['arp_shortcode_customization_style_' . $i]);
                    $arp_shortcode_customization_size = @stripslashes_deep(@$_POST['arp_shortcode_customization_size_' . $i]);
                    $shortcode_background_color = @stripslashes_deep(@$_POST['shortcode_background_color_' . $i]);
                    $shortcode_font_color = @stripslashes_deep(@$_POST['shortcode_font_color_' . $i]);
                    $shortcode_hover_background_color = @stripslashes_deep(@$_POST['shortcode_hover_background_color_' . $i]);
                    $shortcode_hover_font_color = @stripslashes_deep(@$_POST['shortcode_hover_font_color_' . $i]);

                    $html_content = @stripslashes_deep(@$_POST['html_content_' . $i]);
                    $html_content_second = @stripslashes_deep(@$_POST['html_content_second_' . $i]);
                    $html_content_third = @stripslashes_deep(@$_POST['html_content_third_' . $i]);
                    $price_text = @stripslashes_deep(@$_POST['price_text_' . $i]);

                    $price_text_two_step = @stripslashes_deep(@$_POST['price_text_two_step_' . $i]);
                    $price_text_three_step = @stripslashes_deep(@$_POST['price_text_three_step_' . $i]);
                    $price_text_input_two_step_price = @stripslashes_deep(@$_POST['price_text_input_two_step_price_' . $i]);
                    $price_text_input_three_step_price = @stripslashes_deep(@$_POST['price_text_input_three_step_price_' . $i]);
                    $price_text_input_two_step_label = @stripslashes_deep(@$_POST['price_text_input_two_step_label_' . $i]);
                    $price_text_input_three_step_label = @stripslashes_deep(@$_POST['price_text_input_three_step_label_' . $i]);

                    $price_label = @stripslashes_deep(@$_POST['price_label_' . $i]);
                    $gmap_marker = @stripslashes_deep(@$_POST['gmap_marker' . $i]);
                    $total_rows = @$_POST['total_rows_' . $i];
                    $body_text_alignment = @$_POST['body_text_alignment_' . $i];

                    $ji = 1;
                    $row = array();
                    if ($total_rows > 0) {
                        for ($j = 0; $j < $total_rows; $j++) {
                            $row_title = 'row_' . $j;
                            $row_label = @stripslashes_deep(@$_POST['row_' . $i . '_label_' . $j]);
                            $row_label_second = @stripslashes_deep(@$_POST['row_' . $i . '_label_second_' . $j]);
                            $row_label_third = @stripslashes_deep(@$_POST['row_' . $i . '_label_third_' . $j]);
                            $row_des_align = @stripslashes_deep(@$_POST['row_' . $i . '_description_text_alignment_' . $j]);
                            $row_des = @stripslashes_deep(@$_POST['row_' . $i . '_description_' . $j]);
                            $row_description_second = @stripslashes_deep(@$_POST['row_' . $i . '_description_second_' . $j]);
                            $row_description_third = @stripslashes_deep(@$_POST['row_' . $i . '_description_third_' . $j]);
                            $row_tooltip = @stripslashes_deep(@$_POST['row_' . $i . '_tooltip_' . $j]);
                            $row_tooltip_second = @stripslashes_deep(@$_POST['row_' . $i . '_tooltip_second_' . $j]);
                            $row_tooltip_third = @stripslashes_deep(@$_POST['row_' . $i . '_tooltip_third_' . $j]);
                            $row_des_style_bold = @stripslashes_deep(@$_POST['body_li_style_bold_column_' . $i . '_arp_row_' . $j]);
                            $row_des_style_italic = @stripslashes_deep(@$_POST['body_li_style_italic_column_' . $i . '_arp_row_' . $j]);
                            $row_des_style_decoration = @stripslashes_deep(@$_POST['body_li_style_decoration_column_' . $i . '_arp_row_' . $j]);
                            $row_caption_style_bold = @stripslashes_deep(@$_POST['body_li_style_bold_caption_column_' . $i . '_arp_row_' . $j]);
                            $row_caption_style_italic = @stripslashes_deep(@$_POST['body_li_style_italic_caption_column_' . $i . '_arp_row_' . $j]);
                            $row_caption_style_decoration = @stripslashes_deep(@$_POST['body_li_style_decoration_caption_column_' . $i . '_arp_row_' . $j]);

                            $row_custom_css = @stripslashes_deep(@$_POST['row_' . $i . '_custom_css_' . $j]);
                            $row_hover_custom_css = @stripslashes_deep(@$_POST['row_hover_' . $i . '_custom_css_' . $j]);

                            $row[$row_title] = array('row_des_txt_align' => $row_des_align, 'row_description' => $row_des, 'row_description_second' => $row_description_second, 'row_description_third' => $row_description_third, 'row_tooltip' => $row_tooltip, 'row_tooltip_second' => $row_tooltip_second, 'row_tooltip_third' => $row_tooltip_third, 'row_label' => $row_label, 'row_label_second' => $row_label_second, 'row_label_third' => $row_label_third, 'row_des_style_bold' => $row_des_style_bold, 'row_des_style_italic' => $row_des_style_italic, 'row_des_style_decoration' => $row_des_style_decoration, 'row_caption_style_bold' => $row_caption_style_bold, 'row_caption_style_italic' => $row_caption_style_italic, 'row_caption_style_decoration' => $row_caption_style_decoration, 'row_custom_css' => $row_custom_css, 'row_hover_custom_css' => $row_hover_custom_css);


                            unset($_POST['row_' . $i . '_description_text_alignment_' . $j]);
                            unset($_POST['row_' . $i . '_description_' . $j]);
                            unset($_POST['row_' . $i . '_tooltip_' . $j]);

                            $ji++;
                        }
                    }
                    $btn_size = @$_POST['button_size_' . $i];
                    $btn_height = @$_POST['button_height_' . $i];
                    $btn_type = @$_POST['button_type_' . $i];
                    $btn_text = @stripslashes_deep(@$_POST['btn_content_' . $i]);
                    $btn_content_second = @stripslashes_deep(@$_POST['btn_content_second_' . $i]);
                    $btn_content_third = @stripslashes_deep(@$_POST['btn_content_third_' . $i]);

                    $paypal_btn = @stripslashes_deep(@$_POST['paypal_code_' . $i]);

                    $paypal_btn_second = @stripslashes_deep(@$_POST['paypal_code_second_' . $i]);
                    $paypal_btn_third = @stripslashes_deep(@$_POST['paypal_code_third_' . $i]);
                    $btn_link = @stripslashes_deep(@$_POST['btn_link_' . $i]);
                    $btn_link_second = @stripslashes_deep(@$_POST['btn_link_second_' . $i]);
                    $btn_link_third = @stripslashes_deep(@$_POST['btn_link_third_' . $i]);
                    $btn_img = @stripslashes_deep(@$_POST['btn_img_url_' . $i]);
                    $btn_img_height = @$_POST['button_img_height_' . $i];
                    $btn_img_width = @$_POST['button_img_width_' . $i];
                    $hide_default_btn = @$_POST['arp_hide_default_btn_' . $i];
                    $is_new_window = @$_POST['new_window_' . $i];
                    $is_new_window_actual = @$_POST['new_window_actual_' . $i];

                    if (!isset($table_columns[$Title]['row_order']) || !is_array($table_columns[$Title]['row_order'])) {
                        @parse_str(@$_POST[$Title . '_row_order'], $col_row_order);
                        $row_order = $col_row_order;
                    }

                    $ribbon_settings = array(
                        'arp_ribbon' => $column_ribbon_style,
                        'arp_ribbon_bgcol' => $column_ribbon_bgcolor,
                        'arp_ribbon_txtcol' => $column_ribbon_txtcolor,
                        'arp_ribbon_position' => $column_ribbon_position,
                        'arp_ribbon_content' => $column_ribbon_content,
                        'arp_ribbon_content_second' => $column_ribbon_content_second,
                        'arp_ribbon_content_third' => $column_ribbon_content_third,
                        'arp_ribbon_custom_position_rl' => $column_ribbon_position_rl,
                        'arp_ribbon_custom_position_top' => $column_ribbon_position_top,
                        'arp_custom_ribbon' => $column_custom_ribbon_url,
                        'arp_custom_ribbon_second' => $column_custom_ribbon_url_second,
                        'arp_custom_ribbon_third' => $column_custom_ribbon_url_third,
                    );

                    $column[$Title] = array(
                        'package_title' => $column_title,
                        'package_title_second' => $column_title_second,
                        'package_title_third' => $column_title_third,
                        'column_width' => $column_width,
                        'is_caption' => $caption,
                        'column_description' => $column_desc,
                        'column_description_second' => $column_desc_second,
                        'column_description_third' => $column_desc_third,
                        'column_highlight' => $column_highlight,
                        'column_background_color' => $column_background_color,
                        'column_hover_background_color' => $column_hover_background_color,
                        'arp_change_bgcolor' => $arp_change_bgcolor,
                        'column_background_image' => $column_background_image,
                        'column_background_image_height' => $column_background_image_height,
                        'column_background_image_width' => $column_background_image_width,
                        'column_background_scaling' => $column_background_scaling,
                        'column_background_min_positon' => $column_background_min_positon,
                        'column_background_max_positon' => $column_background_max_positon,
                        'custom_ribbon_txt' => $cstm_rbn_txt,
                        'is_post_variables' => $is_post_variables,
                        'post_variables_content' => $post_variables_content,
                        'post_variables_content_second' => $post_variables_content_second,
                        'post_variables_content_third' => $post_variables_content_third,
                        'arp_header_shortcode' => $header_shortcode,
                        'arp_header_shortcode_second' => $header_shortcode_second,
                        'arp_header_shortcode_third' => $header_shortcode_third,
                        'arp_shortcode_customization_size' => $arp_shortcode_customization_size,
                        'arp_shortcode_customization_style' => $arp_shortcode_customization_style,
                        'shortcode_background_color' => $shortcode_background_color,
                        'shortcode_font_color' => $shortcode_font_color,
                        'shortcode_hover_background_color' => $shortcode_hover_background_color,
                        'shortcode_hover_font_color' => $shortcode_hover_font_color,
                        'html_content' => $html_content,
                        'html_content_second' => $html_content_second,
                        'html_content_third' => $html_content_third,
                        'price_text' => $price_text,
                        'price_text_two_step' => $price_text_two_step,
                        'price_text_three_step' => $price_text_three_step,
                        'price_text_input_two_step_price' => $price_text_input_two_step_price,
                        'price_text_input_three_step_price' => $price_text_input_three_step_price,
                        'price_text_input_two_step_label' => $price_text_input_two_step_label,
                        'price_text_input_three_step_label' => $price_text_input_three_step_label,
                        'price_label' => $price_label,
                        'gmap_marker' => @$google_map_marker,
                        'body_text_alignment' => $body_text_alignment,
                        'rows' => $row,
                        'button_size' => $btn_size,
                        'button_height' => $btn_height,
                        'button_type' => $btn_type,
                        'button_text' => $btn_text,
                        'btn_content_second' => $btn_content_second,
                        'btn_content_third' => $btn_content_third,
                        'paypal_code' => $paypal_btn,
                        'paypal_code_second' => $paypal_btn_second,
                        'paypal_code_third' => $paypal_btn_third,
                        'button_url' => $btn_link,
                        'button_url_second' => $btn_link_second,
                        'button_url_third' => $btn_link_third,
                        'btn_img' => $btn_img,
                        'btn_img_height' => $btn_img_height,
                        'btn_img_width' => $btn_img_width,
                        'hide_default_btn' => $hide_default_btn,
                        'is_new_window' => $is_new_window,
                        'is_new_window_actual' => $is_new_window_actual,
                        'ribbon_setting' => $ribbon_settings,
                        'header_background_color' => $header_background_color,
                        'header_hover_background_color' => $header_hover_background_color,
                        'header_background_image' => $header_background_image,
                        'header_font_family' => $header_font_family,
                        'header_font_size' => $header_font_size,
                        'header_font_style' => $header_font_style,
                        'header_font_color' => $header_font_color,
                        'header_hover_font_color' => $header_hover_font_color,
                        'header_font_align' => $header_font_align,
                        'header_style_bold' => $header_style_bold,
                        'header_style_italic' => $header_style_italic,
                        'header_style_decoration' => $header_style_decoration,
                        'price_background_color' => $price_background_color,
                        'price_hover_background_color' => $price_hover_background_color,
                        'price_font_family' => $price_font_family,
                        'price_font_size' => $price_font_size,
                        'price_font_style' => $price_font_style,
                        'price_font_color' => $price_font_color,
                        'price_hover_font_color' => $price_hover_font_color,
                        'price_font_align' => $price_font_align,
                        'price_label_style_bold' => $price_label_style_bold,
                        'price_label_style_italic' => $price_label_style_italic,
                        'price_label_style_decoration' => $price_label_style_decoration,
                        'price_text_font_family' => $price_text_font_family,
                        'price_text_font_size' => $price_text_font_size,
                        'price_text_font_style' => $price_text_font_style,
                        'price_text_font_color' => $price_text_font_color,
                        'price_text_hover_font_color' => $price_text_hover_font_color,
                        'price_text_style_bold' => $price_text_style_bold,
                        'price_text_style_italic' => $price_text_style_italic,
                        'price_text_style_decoration' => $price_text_style_decoration,
                        'content_font_family' => $content_font_family,
                        'content_font_size' => $content_font_size,
                        'content_font_style' => $content_font_style,
                        'content_font_color' => $content_font_color,
                        'content_even_font_color' => $content_even_font_color,
                        'content_hover_font_color' => $content_hover_font_color,
                        'content_even_hover_font_color' => $content_even_hover_font_color,
                        'content_odd_color' => $content_odd_color,
                        'content_odd_hover_color' => $content_odd_hover_color,
                        'content_even_color' => $content_even_color,
                        'content_even_hover_color' => $content_even_hover_color,
                        'body_li_style_bold' => $body_li_style_bold,
                        'body_li_style_italic' => $body_li_style_italic,
                        'body_li_style_decoration' => $body_li_style_decoration,
                        'content_label_font_family' => $content_label_font_family,
                        'content_label_font_size' => $content_label_font_size,
                        'content_label_font_style' => $content_label_font_style,
                        'content_label_font_color' => $content_label_font_color,
                        'content_label_hover_font_color' => $content_label_hover_font_color,
                        'body_label_style_bold' => $body_label_style_bold,
                        'body_label_style_italic' => $body_label_style_italic,
                        'body_label_style_decoration' => $body_label_style_decoration,
                        'button_background_color' => $button_background_color,
                        'button_hover_background_color' => $button_hover_background_color,
                        'button_font_family' => $button_font_family,
                        'button_font_size' => $button_font_size,
                        'button_font_color' => $button_font_color,
                        'button_hover_font_color' => $button_hover_font_color,
                        'button_font_style' => $button_font_style,
                        'button_style_bold' => $button_style_bold,
                        'button_style_italic' => $button_style_italic,
                        'button_style_decoration' => $button_style_decoration,
                        'column_description_font_family' => $column_description_font_family,
                        'column_description_font_size' => $column_description_font_size,
                        'column_description_font_style' => $column_description_font_style,
                        'column_description_font_color' => $column_description_font_color,
                        'column_description_hover_font_color' => $column_description_hover_font_color,
                        'column_desc_background_color' => $column_desc_background_color,
                        'column_desc_hover_background_color' => $column_desc_hover_background_color,
                        'column_description_style_bold' => $column_description_style_bold,
                        'column_description_style_italic' => $column_description_style_italic,
                        'column_description_style_decoration' => $column_description_style_decoration,
                        'description_text_alignment' => $column_description_text_align,
                        'footer_content' => $footer_content,
                        'footer_content_second' => $footer_content_second,
                        'footer_content_third' => $footer_content_third,
                        'footer_content_position' => $footer_content_position,
                        'footer_text_align' => $footer_text_align,
                        'footer_level_options_font_family' => $footer_level_options_font_family,
                        'footer_background_color' => $footer_background_color,
                        'footer_hover_background_color' => $footer_hover_background_color,
                        'footer_level_options_font_size' => $footer_level_options_font_size,
                        'footer_level_options_font_color' => $footer_level_options_font_color,
                        'footer_level_options_hover_font_color' => $footer_level_options_hover_font_color,
                        'footer_level_options_font_style_bold' => $footer_level_options_font_style_bold,
                        'footer_level_options_font_style_italic' => $footer_level_options_font_style_italic,
                        'footer_level_options_font_style_decoration' => $footer_level_options_font_style_decoration,
                    );
                }
            }
        } else {
            return;
        }

        $tbl_opt['columns'] = $column;
        $tbl_opt['column_order'] = $column_order;
        $table_options = maybe_serialize($tbl_opt);

        if ($pt_action == "new") {
            $ins = $wpdb->query($wpdb->prepare('INSERT INTO ' . $wpdb->prefix . 'arp_arprice_options (table_id,table_options) VALUES (%d,%s)', $table_id, $table_options));

            $css_file_name = $template_name . '.css';

            WP_Filesystem();

            global $wp_filesystem;

            if (file_exists(PRICINGTABLE_DIR . '/css/templates/' . $template_name . '_v' . $arprice_images_css_version . '.css')) {
                $css = file_get_contents(PRICINGTABLE_DIR . '/css/templates/' . $template_name . '_v' . $arprice_images_css_version . '.css');
            } else {

                if (file_exists(PRICINGTABLE_UPLOAD_DIR . '/css/' . $css_file_name))
                    $css = file_get_contents(PRICINGTABLE_UPLOAD_DIR . '/css/' . $css_file_name);
                else
                    $css = file_get_contents(PRICINGTABLE_DIR . '/css/templates/' . $reference_template . '_v' . $arprice_images_css_version . '.css');
            }

            $css_new = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $table_id, $css);

            $css_new = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $css_new);

            $path = PRICINGTABLE_UPLOAD_DIR . '/css/';

            $file_name = 'arptemplate_' . $table_id . '.css';

            $wp_filesystem->put_contents($path . $file_name, $css_new, 0777);
        } else {
            $ins = $wpdb->query($wpdb->prepare('UPDATE ' . $wpdb->prefix . 'arp_arprice_options SET table_options = %s WHERE table_id = %d', $table_options, $table_id));
            $query = $wpdb->get_row($wpdb->prepare('SELECT is_template FROM ' . $wpdb->prefix . 'arp_arprice WHERE ID = %d', $table_id));

            $is_template = $query->is_template;

            if ($is_template == 0 and ! file_exists(PRICINGTABLE_UPLOAD_URL . '/css/arptemplate_' . $table_id . '.css')) {

                WP_Filesystem();

                global $wp_filesystem;

                $css_file_name = $template_name . '.css';

                if (file_exists(PRICINGTABLE_DIR . '/css/templates/' . $template_name . '_v' . $arprice_images_css_version . '.css')) {
                    $css = file_get_contents(PRICINGTABLE_DIR . '/css/templates/' . $template_name . '_v' . $arprice_images_css_version . '.css');
                } else {

                    if (file_exists(PRICINGTABLE_UPLOAD_DIR . '/css/' . $css_file_name))
                        $css = file_get_contents(PRICINGTABLE_UPLOAD_DIR . '/css/' . $css_file_name);
                    else
                        $css = file_get_contents(PRICINGTABLE_DIR . '/css/templates/' . $reference_template . '_v' . $arprice_images_css_version . '.css');
                }

                $css_new = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $table_id, $css);

                $css_new = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $css_new);

                $path = PRICINGTABLE_UPLOAD_DIR . '/css/';

                $file_name = 'arptemplate_' . $table_id . '.css';

                $wp_filesystem->put_contents($path . $file_name, $css_new, 0777);
            }
        }


        // Query for delete preview data option start
        $all_previewoption = get_option('arp_previewoptions');
        $all_previewoption = maybe_unserialize($all_previewoption);
        if ($all_previewoption && count($all_previewoption) > 0) {
            $option_to_delete = array();
            $day_ago_time = strtotime("-2 days");
            $all_previewoption_db = $all_previewoption;
            foreach ($all_previewoption as $opt_name => $opt_date) {
                if (isset($opt_name) && $opt_name != '' && $opt_name != '0' && $opt_date <= $day_ago_time) {
                    $option_to_delete[] = $opt_name;
                    unset($all_previewoption_db[$opt_name]);
                }
            }
            if ($option_to_delete && count($option_to_delete) > 0) {
                update_option('arp_previewoptions', $all_previewoption_db);  // Update Remaining options
                $option_to_delete_str = @implode("','", $option_to_delete);
                $option_to_delete_str = "'" . $option_to_delete_str . "'";
                $wpdb->query("DELETE FROM " . $wpdb->options . " WHERE option_name IN (" . $option_to_delete_str . ")");
            }
        }
        // Query for delete preview data option end


        echo $pt_action . '~|~' . $table_id . '~|~' . $is_template;

        die();
    }

    function create($values = array()) {
        global $wpdb;

        $form_name = $values['name'];
        $dt = current_time('mysql');
        $status = $values['status'];
        $template = $values['is_template'];
        $template_name = $values['template_name'];
        $is_animated = $values['is_animated'];
        $options = $values['options'];

        $wpdb->query($wpdb->prepare("INSERT INTO " . $wpdb->prefix . "arp_arprice (table_name,template_name,general_options,is_template,is_animated,status,create_date,arp_last_updated_date) VALUES (%s,%d,%s,%d,%d,%s,%s,%s) ", $form_name, $template_name, $options, $template, $is_animated, $status, $dt, $dt));

        return $wpdb->insert_id;
    }

    function new_release_update($values = array()) {
        global $wpdb;

        $form_name = $values['name'];
        $dt = current_time('mysql');
        $status = $values['status'];
        $template = $values['is_template'];
        $template_name = $values['template_name'];
        $is_animated = $values['is_animated'];
        $options = $values['options'];


        $wpdb->query($wpdb->prepare("UPDATE " . $wpdb->prefix . "arp_arprice set general_options = %s where template_name = %d ", $options, $template_name));

        return $template_name;
    }

    function option_create($table_id, $opts) {
        global $wpdb;
        $wpdb->query($wpdb->prepare("INSERT INTO " . $wpdb->prefix . "arp_arprice_options(table_id,table_options) VALUES (%d,%s)", $table_id, $opts));
    }

    function new_release_option_update($table_id, $opts) {
        global $wpdb;

        $wpdb->query($wpdb->prepare("UPDATE " . $wpdb->prefix . "arp_arprice_options set table_options = %s where table_id = %d ", $opts, $table_id));
    }

    function get_direct_link($tbl_id = '', $chk_preview = false) {

        if (!$chk_preview) {
            $target_url = esc_url(get_home_url() . '/index.php?plugin=arprice&arpaction=preview&tbl=' . $tbl_id);
        } else {
            $target_url = esc_url(get_home_url() . '/index.php?plugin=arprice&arpaction=preview&home_view=1&tbl=' . $tbl_id);
        }

        if (is_ssl()) {
            $target_url = str_replace('http://', 'https://', $target_url);
        }

        return $target_url;
    }

    function parse_standalone_request() {
        global $arprice_form;
        $plugin = isset($_REQUEST['plugin']) ? $_REQUEST['plugin'] : '';

        $action = isset($_REQUEST['arpaction']) ? $_REQUEST['arpaction'] : '';

        if (!empty($plugin) and $plugin == 'arprice' and ! empty($action) and $action == 'preview') {

            $table_id = isset($_REQUEST['tbl']) ? $_REQUEST['tbl'] : '';
            $arprice_form->preview_table($table_id);
            exit;
        }
    }

    function preview_table($table_id) {

        @header("Content-Type: text/html; charset=utf-8");

        @header("Cache-Control: no-cache, must-revalidate, max-age=0");

        $is_tbl_preview = 1;

        require(PRICINGTABLE_VIEWS_DIR . '/arprice_preview.php');
    }

    function edit_template() {
        global $wpdb;
        $arpaction_new = 'new';
        if (isset($_REQUEST['template_type']) and $_REQUEST['template_type'] == 'new') {
            //for new table
        } else if (isset($_REQUEST['template_type']) and $_REQUEST['template_type'] != '') {
            $template_id = $_REQUEST['template_type'];

            //get template details
            $tbl_res = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE ID = %d", $template_id));

            $results = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice_options WHERE table_id = %d", $tbl_res->ID));

            $new_values = array();

            $new_values['table_name'] = isset($tbl_res->table_name) ? $tbl_res->table_name : '';
            $new_values['general_options'] = isset($tbl_res->general_options) ? $tbl_res->general_options : '';
            $new_values['is_template'] = 0;
            $new_values['status'] = 'draft';
            $new_current_date = current_time('mysql');
            $new_values['create_date'] = $new_current_date;
            $new_values['arp_last_updated_date'] = $new_current_date;

            $res = $wpdb->insert($wpdb->prefix . "arp_arprice", $new_values);
            $table_id = $wpdb->insert_id;

            $new_values = array();
            $new_values['table_id'] = $table_id;
            $new_values['table_options'] = isset($results->table_options) ? $results->table_options : '';
            $res = $wpdb->insert($wpdb->prefix . "arp_arprice_options", $new_values);

            //update css
            $general_option = maybe_unserialize($tbl_res->general_options);

            $general_font_settings = isset($general_option['font_settings']) ? $general_option['font_settings'] : array();

            $general_column_settings = isset($general_option['font_settings']) ? $general_option['column_settings'] : array();

            $general_tooltip_settings = isset($general_option['tooltip_settings']) ? $general_option['tooltip_settings'] : array();

            $new_values = array();

            $arpaction_new = 'edit';
        }

        if (file_exists(PRICINGTABLE_VIEWS_DIR . '/arprice_listing_editor.php'))
            include(PRICINGTABLE_VIEWS_DIR . '/arprice_listing_editor.php');
    }

    function arp_header_image_shortcode($atts) {
        global $arp_is_lightbox;
        $arp_is_lightbox = 0;
        $image_url = isset($atts['id']) ? $atts['id'] : '';
        $open_in_lightbox = ( isset($atts['open_in_lightbox']) and $atts['open_in_lightbox'] == 1 ) ? '1' : '';
        $https = is_ssl() ? 's' : '';
        //$width = '100%';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        $width = ( isset($atts['width']) and $atts['width'] != '' ) ? $atts['width'] : 'auto';
        //$style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';
        $style = "";
        if ($open_in_lightbox == 1) {
            $arp_is_lightbox = 1;
            return '<div class="arp_header_image arp_header_image_lightbox"' . ' data-bpopup=\'<iframe class="arp_video_ifr" src="' . $image_url . '" style="border:0px;margin:0px;width=' . $width . ';height=' . $height . ';"></iframe>\'>
                                    <img width="' . $width . '" height="' . $height . '" src="' . $image_url . '" class="alignnone arp_video_current_img" />
                            </div>';
        } else {
            return '<div class="arp_header_image"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><img width="' . $width . '" height="' . $height . '" src="' . $image_url . '" class="alignnone" /></div>';
        }
    }

    function arp_youtube_video_shortcode($atts) {
        global $arp_is_lightbox;
        $arp_is_lightbox = 0;
        $video_id = isset($atts['id']) ? $atts['id'] : '';
        $autoplay = ( isset($atts['autoplay']) and $atts['autoplay'] == 1 ) ? '1' : '';
        $open_in_lightbox = ( isset($atts['open_in_lightbox']) and $atts['open_in_lightbox'] == 1 ) ? '1' : '';
        $https = is_ssl() ? 's' : '';
        //$width = '100%';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        $width = ( isset($atts['width']) and $atts['width'] != '' ) ? $atts['width'] : 'auto';
        //$style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';
        $style = "";
        if ($open_in_lightbox == 1) {
            $arp_is_lightbox = 1;
            $imageURL = "http://img.youtube.com/vi/" . $video_id . "/maxresdefault.jpg;";

            return '<div class="arp_youtube_video arp_youtube_video_lightbox"' . ' data-bpopup=\'<iframe class="arp_video_ifr" src="http' . $https . '://www.youtube.com/embed/' . $video_id . '?wmode=opaque&amp;controls=1&amp;showinfo=1&amp;autohide=1&amp;rel=0&amp;autoplay=' . $autoplay . '" style="border:0px;margin:0px;width=' . $width . ';height=' . $height . ';"></iframe>\'>
                                    <img src="' . $imageURL . '" class="arp_video_current_img" />
                            </div>';
        } else {
            return '<div class="arp_youtube_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe  src="http' . $https . '://www.youtube.com/embed/' . $video_id . '?wmode=opaque&amp;controls=1&amp;showinfo=1&amp;autohide=1&amp;rel=0&amp;autoplay=' . $autoplay . '" style="border:0px;margin:0px;width=' . $width . ';height=' . $height . ';"></iframe></div>';
        }
    }

    function arp_vimeo_video_shortcode($atts) {
        global $arp_is_lightbox;
        $arp_is_lightbox = 0;
        $video_id = isset($atts['id']) ? $atts['id'] : '';
        $autoplay = ( isset($atts['autoplay']) and $atts['autoplay'] == 1 ) ? '1' : '0';
        $open_in_lightbox = ( isset($atts['open_in_lightbox']) and $atts['open_in_lightbox'] == 1 ) ? '1' : '';
        $https = is_ssl() ? 's' : '';
        $color = isset($atts['color']) ? $atts['color'] : '';
        //$width = '100%';
        $width = ( isset($atts['width']) and $atts['width'] != '' ) ? $atts['width'] : 'auto';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        $style = "";

        if ($open_in_lightbox == 1) {
            $arp_is_lightbox = 1;
            $data = file_get_contents("http://vimeo.com/api/v2/video/" . $video_id . ".json");
            $data = json_decode($data);
            $imageURL = $data[0]->thumbnail_large;

            return '<div class="arp_vimeo_video arp_vimeo_video_lightbox" data-bpopup=\'<iframe class="arp_video_ifr" src="http://player.vimeo.com/video/' . esc_attr($video_id) . '?title=0&amp;byline=0&amp;portrait=0&amp;autohide=1&amp;color=' . $color . '&amp;autoplay=' . $autoplay . '" style="border:0px;margin:0px;width=' . $width . ';height=' . $height . ';"></iframe>\' >
                                <img src="' . $imageURL . '"  class="arp_video_current_img"  />
                        </div>';
        } else {
            return '<div class="arp_vimeo_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http://player.vimeo.com/video/' . esc_attr($video_id) . '?title=0&amp;byline=0&amp;portrait=0&amp;autohide=1&amp;color=' . $color . '&amp;autoplay=' . $autoplay . '" style="border:0px;margin:0px;width=' . $width . ';height=' . $height . ';"></iframe></div>';
        }
    }

    function arp_screenr_video_shortcode($atts) {
        global $arp_is_lightbox;
        $arp_is_lightbox = 0;
        $video_id = isset($atts['id']) ? $atts['id'] : '';
        //$width = '100%';
        $width = ( isset($atts['width']) and $atts['width'] != '' ) ? $atts['width'] : 'auto';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        //$style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';
        $style = "";
        $open_in_lightbox = ( isset($atts['open_in_lightbox']) and $atts['open_in_lightbox'] == 1 ) ? '1' : '';



        if ($open_in_lightbox == 1) {
            $arp_is_lightbox = 1;
            $data = file_get_contents("http://www.screenr.com/api/oembed.json?url=http://www.screenr.com/" . $video_id);
            $data = json_decode($data);
            $imageURL = $data->thumbnail_url;

            return '<div class="arp_screenr_video arp_screenr_video_lightbox" data-bpopup=\'<iframe class="arp_video_ifr" src="http://www.screenr.com/embed/' . esc_attr($video_id) . '" style="border:0px;margin:0px;width=' . $width . ';height=' . $height . ';"></iframe>\'>
				<img src="' . $imageURL . '" class="arp_video_current_img"  />
			</div>';
        } else {
            return '<div class="arp_screenr_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http://www.screenr.com/embed/' . esc_attr($video_id) . '" style="border:0px;margin:0px;width=' . $width . ';height=' . $height . ';"></iframe></div>';
        }
    }

    function arp_html5_video_shortcode($atts) {
        global $arp_is_lightbox;
        $arp_is_lightbox = 0;
        $open_in_lightbox = ( isset($atts['open_in_lightbox']) and $atts['open_in_lightbox'] == 1 ) ? '1' : '';
        extract(shortcode_atts(array(
            'mp4' => '',
            'webm' => '',
            'ogg' => '',
            'poster' => '',
            'autoplay' => 0,
            'loop' => 0
                        ), $atts));

        $mp4 = $mp4 != "" ? '<source src="' . $mp4 . '" type="video/mp4">' : '';
        $webm = $webm != "" ? "<source src='" . $webm . "' type='video/webm'>" : '';
        $ogg = $ogg != "" ? "<source src='" . $ogg . "' type='video/ogg'>" : '';
        $poster = $poster != "" ? $poster_src : '';
        $autoplay = $autoplay == 1 ? "autoplay='true'" : '';
        $loop = $loop == 1 ? "loop='true'" : '';

        if ($open_in_lightbox == 1) {
            $arp_is_lightbox = 1;
            $imageURL = '';
            if (!empty($atts['poster'])) {
                $imageURL = $atts['poster'];
                return '<div class="arp_html5_video arp_html5_video_lightbox" data-bpopup=\'<video controls="controls"' . ( $autoplay != '' ? $autoplay : '' ) . ( $loop != '' ? $loop : '' ) . ( $poster != '' ? ' poster="' . $poster . '"' : '' ) . '>' . $mp4 . $webm . $ogg . '<object type="application/x-shockwave-flash" data="' . PRICINGTABLE_DIR . '/js/mediaelementjs/flashmediaelement.swf">
              <param name="movie" value="' . PRICINGTABLE_DIR . '/js/mediaelementjs/flashmediaelement.swf" />
              <param name="flashvars" value="controls=true&poster=' . $poster . '&file=' . $mp4 . '" />
              <img src="' . $poster . '" title="No video playback capabilities" />
	          </object></video>\'>
					<img src="' . $imageURL . '"   />
				</div>';
            } else {
                $imageURL = PRICINGTABLE_IMAGES_URL . '/video-icon.png';
                return '<div class="arp_html5_video arp_html5_video_lightbox" data-bpopup=\'<video controls="controls"' . ( $autoplay != '' ? $autoplay : '' ) . ( $loop != '' ? $loop : '' ) . ( $poster != '' ? ' poster="' . $poster . '"' : '' ) . '>' . $mp4 . $webm . $ogg . '<object type="application/x-shockwave-flash" data="' . PRICINGTABLE_DIR . '/js/mediaelementjs/flashmediaelement.swf">
              <param name="movie" value="' . PRICINGTABLE_DIR . '/js/mediaelementjs/flashmediaelement.swf" />
              <param name="flashvars" value="controls=true&poster=' . $poster . '&file=' . $mp4 . '" />
              <img src="' . $poster . '" title="No video playback capabilities" />
	          </object></video>\'>
				<img class="arp_video_img" src="' . $imageURL . '"   />
			</div>';
            }
        } else {
            return '<video controls="controls"' . ( $autoplay != '' ? $autoplay : '' ) . ( $loop != '' ? $loop : '' ) . ( $poster != '' ? ' poster="' . $poster . '"' : '' ) . '>' . $mp4 . $webm . $ogg . '<object type="application/x-shockwave-flash" data="' . PRICINGTABLE_DIR . '/js/mediaelementjs/flashmediaelement.swf">
              <param name="movie" value="' . PRICINGTABLE_DIR . '/js/mediaelementjs/flashmediaelement.swf" />
              <param name="flashvars" value="controls=true&poster=' . $poster . '&file=' . $mp4 . '" />
              <img src="' . $poster . '" title="No video playback capabilities" />
	          </object></video>';
        }
    }

    function arp_html5_audio_shortcode($atts) {
        extract(shortcode_atts(array(
            'mp3' => '',
            'wav' => '',
            'ogg' => '',
            'autoplay' => 0,
            'loop' => 0
                        ), $atts));

        $autoplay = $autoplay == 1 ? 'autoplay="true"' : '';
        $loop = $loop == 1 ? 'loop="yes"' : '';
        $mp3 = $mp3 != "" ? "<source src='" . $mp3 . "' type='audio/mpeg'>" : '';
        $ogg = $ogg != '' ? '<source src="' . $ogg . '" type="audio/ogg">' : '';
        $wav = $wav != '' ? '<source src="' . $wav . '" type="audio/wav">' : '';

        return '<audio controls="controls"' . ( $autoplay != '' ? $autoplay : '' ) . ( $loop != '' ? $loop : '' ) . '>' . $mp3 . $ogg . $wav . '</audio>';
    }

    function arp_googlemap_shortcode($atts) {
        extract(shortcode_atts(array(
            'address' => '',
            'title' => '',
            'marker_image' => '',
            'content' => NULL,
            'show_popup' => 'no',
            'zoom' => 14,
            'maptype' => 'ROADMAP',
            'width' => '100%',
            'height' => '300',
                        ), $atts));

        $address = $address ? $address : '';
        $height = $height ? $height : '300';
        $popup = $show_popup ? true : false;
        $icon = $marker_image ? $marker_image : '';
        $zoom = isset($zoom_level) ? $zoom_level : '14';
        $content = $content ? $content : '';
        $maptype = $maptype ? $maptype : 'ROADMAP';

        $mapdata = array();
        $mapdata['markers'][] = array(
            'address' => $address,
            'title' => $title,
            'icon' => !empty($icon) ? array('image' => $icon) : null,
            'html' => isset($content) ? array(
                'content' => $content,
                'popup' => $popup
                    ) : null,
        );
        $mapdata['zoom'] = intval($zoom);
        $mapdata['maptype'] = $maptype;
        $mapdata['mapTypeControl'] = false;

        return '<div class="arp_googlemap" style="width:100%; height:' . $height . 'px;" data-map="' . esc_attr(json_encode($mapdata)) . '"></div>';
    }

    function arp_dailymotion_video_shortcode($atts) {
        global $arp_is_lightbox;
        $arp_is_lightbox = 0;
        $video_id = isset($atts['id']) ? $atts['id'] : '';
        $autoplay = ( isset($atts['autoplay']) and $atts['autoplay'] == 1 ) ? '1' : '';
        $open_in_lightbox = ( isset($atts['open_in_lightbox']) and $atts['open_in_lightbox'] == 1 ) ? '1' : '';
        $https = is_ssl() ? 's' : '';
        //$width = '100%';
        $width = ( isset($atts['width']) and $atts['width'] != '' ) ? $atts['width'] : 'auto';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        //$style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';
        $style = "";
        //return '<div class="arp_dailymotion_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http' . $https . '://www.dailymotion.com/embed/video/' . esc_attr($video_id) . '?wmode=opaque&amp;autoPlay=' . $autoplay . '" width="' . $width . '" height="' . $height . '" marginheight="0" marginwidth="0" frameborder="0"></iframe></div>';

        if ($open_in_lightbox == 1) {
            $arp_is_lightbox = 1;
            $data = file_get_contents('https://api.dailymotion.com/video/' . $video_id . '?fields=thumbnail_large_url');
            $data = json_decode($data);
            $imageURL = $data->thumbnail_large_url;

            return '<div class="arp_dailymotion_video arp_dailymotion_video_lightbox"  data-bpopup=\'<iframe class="arp_video_ifr" src="http' . $https . '://www.dailymotion.com/embed/video/' . esc_attr($video_id) . '?wmode=opaque&amp;autoPlay=' . $autoplay . '" style="border:0px;margin:0px;width=' . $width . ';height=' . $height . ';"></iframe>\'>
				<img src="' . $imageURL . '" class="arp_video_current_img" />
			</div>';
        } else {
            return '<div class="arp_dailymotion_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http' . $https . '://www.dailymotion.com/embed/video/' . esc_attr($video_id) . '?wmode=opaque&amp;autoPlay=' . $autoplay . '" style="border:0px;margin:0px;width=' . $width . ';height=' . $height . ';"></iframe></div>';
        }
    }

    function arp_metacafe_video_shortcode($atts) {
        global $arp_is_lightbox;
        $arp_is_lightbox = 0;
        $video_id = isset($atts['id']) ? $atts['id'] : '';
        $autoplay = ( isset($atts['autoplay']) and $atts['autoplay'] == 1 ) ? '1' : '';
        $open_in_lightbox = ( isset($atts['open_in_lightbox']) and $atts['open_in_lightbox'] == 1 ) ? '1' : '';
        $https = is_ssl() ? 's' : '';
        $width = ( isset($atts['width']) and $atts['width'] != '' ) ? $atts['width'] : 'auto';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        //$style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';
        $style = "";
        //return '<div class="arp_metacafe_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http' . $https . '://www.metacafe.com/embed/' . $video_id . '?wmode=opaque&amp;controls=1&amp;showinfo=1&amp;autohide=1&amp;rel=0&amp;ap=' . $autoplay . '" width="' . $width . '" height="' . $height . '" marginheight="0" marginwidth="0" frameborder="0"></iframe></div>';

        if ($open_in_lightbox == 1) {
            $arp_is_lightbox = 1;
            $imageURL = 'http://s' . mt_rand(1, 4) . '.mcstatic.com/thumb/' . $video_id . '.jpg';

            return '<div class="arp_metacafe_video arp_metacafe_video_lightbox"   data-bpopup=\'<iframe class="arp_video_ifr" src="http' . $https . '://www.metacafe.com/embed/' . $video_id . '?wmode=opaque&amp;controls=1&amp;showinfo=1&amp;autohide=1&amp;rel=0&amp;ap=' . $autoplay . '" style="border:0px;margin:0px;width=' . $width . ';height=' . $height . ';"></iframe>\'>
				<img src="' . $imageURL . '" class="arp_video_current_img"  />
			</div>';
        } else {
            return '<div class="arp_metacafe_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http' . $https . '://www.metacafe.com/embed/' . $video_id . '?wmode=opaque&amp;controls=1&amp;showinfo=1&amp;autohide=1&amp;rel=0&amp;ap=' . $autoplay . '" style="border:0px;margin:0px;width=' . $width . ';height=' . $height . ';"></iframe></div>';
        }
    }

    function arp_soundcloud_audio_shortcode($atts) {

        $audio_id = isset($atts['id']) ? $atts['id'] : '';
        $autoplay = (isset($atts['autoplay']) and $atts['autoplay'] == 1 ) ? 'true' : 'false';
        $https = is_ssl() ? 's' : '';
        $width = '100%';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        $style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';

        return '<div class="arp_soundcloud_audio"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http' . $https . '://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F' . esc_attr($audio_id) . '?wmode=opaque&amp;auto_play=' . $autoplay . '&amp;show_artwork=true" style="border:0px;margin:0px;"></iframe></div>';
    }

    function arp_mixcloud_audio_shortcode($atts) {

        $audio_url = isset($atts['id']) ? $atts['id'] : '';
        $autoplay = ( isset($atts['autoplay']) and $atts['autoplay'] == 1 ) ? '1' : '';
        $https = is_ssl() ? 's' : '';

        $width = '100%';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        $style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';
        ;

        return '<div class="arp_mixcloud_audio"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http' . $https . '://www.mixcloud.com/widget/iframe/?feed=' . esc_attr(urlencode(trim($audio_url, '/'))) . '%2F&amp;show_tracklist=&amp;wmode=opaque" style="border:0px;margin:0px;"></iframe></div>';
    }

    function arp_beatport_audio_shortcode($atts) {

        $audio_id = isset($atts['id']) ? $atts['id'] : '';
        $autoplay = ( isset($atts['autoplay']) and $atts['autoplay'] == 1 ) ? '&amp;auto=yes' : '';
        $https = is_ssl() ? 's' : '';

        $width = '100%';
        $height = ( isset($atts['height']) and $atts['height'] != '' ) ? $atts['height'] : 'auto';
        $style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';
        ;


        return '<div class="arp_beatport_audio"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '><iframe src="http' . $https . '://embed.beatport.com/player?id=' . esc_attr($audio_id) . '?wmode=opaque&amp;type=track' . $autoplay . '" style="border:0px;margin:0px;"></iframe></div>';
    }

    function arp_embed_shortcode($atts) {

        $embed = isset($atts['embed']) ? $atts['embed'] : '';

        return '<div class="arp_embed_video">' . html_entity_decode($embed) . '</div>';
    }

    function arp_render_customcss($table_id, $general_option, $front_preview, $opts, $is_animated) {
        global $arp_mainoptionsarr, $arprice_fonts, $arprice_form, $arprice_default_settings;

        $returnstring = "";

        $template_type = $general_option['template_setting']['template_type'];

        $general_font_settings = $general_option['font_settings'];

        $general_column_settings = $general_option['column_settings'];

        $general_tooltip_settings = $general_option['tooltip_settings'];

        $general_column_animation = $general_option['column_animation'];

        $general_template_settings = $general_option['template_setting'];

        $template_color_skin = $general_template_settings['skin'];

        $general_settings = $general_option['general_settings'];

        $column_order = $general_settings['column_order'];

        $col_ord_arr = json_decode($column_order, true);

        $temp_cols = $opts['columns'];

        $new_cols = array();
        $new_cols['columns'] = array();
        if (is_array($col_ord_arr) && count($col_ord_arr) > 0) {
            foreach ($col_ord_arr as $key => $value) {
                $new_value = str_replace('main_', '', $value);
                $new_col_id = $new_value;
                foreach ($opts['columns'] as $j => $columns) {
                    if ($new_col_id == $j) {
                        $new_cols['columns'][$new_col_id] = $columns;
                    }
                }
            }
        } else {
            $new_cols = $opts;
        }

        $opts = $new_cols;

        $user_edited_columns = $general_settings['user_edited_columns'];
        $reference_template = $general_option['general_settings']['reference_template'];
        if (isset($general_template_settings['template_feature']) and ! empty($general_template_settings['template_feature'])) {
            $template_feature = maybe_unserialize($general_template_settings['template_feature']);
        } else {
            //added for front end...not sure.....above condition for preview ...this is for frontend....
            $template_feature = maybe_unserialize($general_template_settings['features']);
        }
        $new_values = array();

        $new_values['space_between_column'] = isset($general_column_settings['space_between_column']) ? 1 : 0;

        $new_values['column_space'] = $general_column_settings['column_space'];

        $new_values['highlight_column'] = isset($general_column_settings['highlightcolumnonhover']) ? 1 : 0;

        $new_values['tooltip_bg_color'] = $general_tooltip_settings['background_color'];

        $new_values['tooltip_text_color'] = $general_tooltip_settings['text_color'];

        $new_values['tooltip_style'] = isset($general_tooltip_settings['tooltip_style']) ? $general_tooltip_settings['tooltip_style'] : '';

        $new_values['tooltip_font_family'] = $general_tooltip_settings['tooltip_font_family'];

        $new_values['tooltip_font_size'] = $general_tooltip_settings['tooltip_font_size'];

        // $new_values['tooltip_font_style'] = $general_tooltip_settings['tooltip_font_style'];

        $new_values['tooltip_font_style_bold'] = isset($general_tooltip_settings['tooltip_font_style_bold']) ? $general_tooltip_settings['tooltip_font_style_bold'] : '';

        $new_values['tooltip_font_style_italic'] = isset($general_tooltip_settings['tooltip_font_style_italic']) ? $general_tooltip_settings['tooltip_font_style_italic'] : '';

        $new_values['tooltip_font_style_decoration'] = isset($general_tooltip_settings['tooltip_font_style_decoration']) ? $general_tooltip_settings['tooltip_font_style_decoration'] : '';



        if ($front_preview == 1 || $front_preview == 2) {
            $new_values['caption_style'] = $template_feature['caption_style'];
        } else {
            $new_values['caption_style'] = @$general_template_settings['features']['caption_style'];
        }
        $new_values['column_opacity'] = $general_column_settings['column_opacity'];

        $new_values['column_wrapper_width_txtbox'] = (isset($general_column_settings['column_wrapper_width_txtbox'])) ? $general_column_settings['column_wrapper_width_txtbox'] : 0;

        $new_values['column_wrapper_width_style'] = (isset($general_column_settings['column_wrapper_width_style'])) ? $general_column_settings['column_wrapper_width_style'] : '';

        $new_values['column_border_radius_top_left'] = ( isset($general_column_settings['column_border_radius_top_left']) and ! empty($general_column_settings['column_border_radius_top_left']) ) ? $general_column_settings['column_border_radius_top_left'] : 0;
        $new_values['column_border_radius_top_right'] = ( isset($general_column_settings['column_border_radius_top_right']) and ! empty($general_column_settings['column_border_radius_top_right']) ) ? $general_column_settings['column_border_radius_top_right'] : 0;
        $new_values['column_border_radius_bottom_right'] = ( isset($general_column_settings['column_border_radius_bottom_right']) and ! empty($general_column_settings['column_border_radius_bottom_right']) ) ? $general_column_settings['column_border_radius_bottom_right'] : 0;
        $new_values['column_border_radius_bottom_left'] = ( isset($general_column_settings['column_border_radius_bottom_left']) and ! empty($general_column_settings['column_border_radius_bottom_left']) ) ? $general_column_settings['column_border_radius_bottom_left'] : 0;

        $is_responsive = $general_column_settings['is_responsive'];

        $is_columnhover_on = $general_column_settings['column_highlight_on_hover'];

        $arp_column_bg_hover_color = $general_option['custom_skin_colors']['arp_column_bg_hover_color'];

        $arp_button_bg_hover_color = $general_option['custom_skin_colors']['arp_button_bg_hover_color'];

        $arp_header_bg_hover_color = $general_option['custom_skin_colors']['arp_header_bg_hover_color'];

        $is_columnanimation_on = ( isset($general_column_animation['is_animation']) and $general_column_animation['is_animation'] == 'yes' ) ? 1 : 0;

        extract($new_values);

        /* Toggle Content Style Start */

        $toggle_active_color = $general_settings['toggle_active_color'];
        $toggle_active_text_color = $general_settings['toggle_active_text_color'];
        $toggle_inactive_color = $general_settings['toggle_inactive_color'];
        $toggle_title_font_color = $general_settings['toggle_title_font_color'];
        $toggle_button_font_color = $general_settings['toggle_button_font_color'];
        $toggle_main_color = $general_settings['toggle_main_color'];

        $toggle_title_font_family = $general_settings['toggle_title_font_family'];
        $toggle_title_font_size = $general_settings['toggle_title_font_size'];
        $toggle_title_font_style_bold = $general_settings['toggle_title_font_style_bold'];
        $toggle_title_font_style_italic = $general_settings['toggle_title_font_style_italic'];
        $toggle_title_font_style_decoration = $general_settings['toggle_title_font_style_decoration'];



        $toggle_button_font_family = $general_settings['toggle_button_font_family'];
        $toggle_button_font_size = $general_settings['toggle_button_font_size'];
        $toggle_button_font_color = $general_settings['toggle_button_font_color'];
        $toggle_button_font_style_bold = $general_settings['toggle_button_font_style_bold'];
        $toggle_button_font_style_italic = $general_settings['toggle_button_font_style_italic'];
        $toggle_button_font_style_decoration = $general_settings['toggle_button_font_style_decoration'];


        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .button_switch_box.button_switch_box_selected,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .radio_button_box.selected";
        $returnstring .= "{";
        $returnstring .= "background:" . $toggle_active_color . ";";
        $returnstring .= "color:" . $toggle_active_text_color . ";";
        $returnstring .= "}";

        if ($general_settings['arp_step_main'] == 3) {
            if ($general_settings['setas_default_toggle'] == 1) {
                $toggle_switch_btn_left = '33.33%';
            } elseif ($general_settings['setas_default_toggle'] == 2) {
                $toggle_switch_btn_left = '66.35%';
            } else {
                $toggle_switch_btn_left = '0.7%';
            }
        } else {
            if ($general_settings['setas_default_toggle'] == 1) {
                $toggle_switch_btn_left = '49.2%';
            } else {
                $toggle_switch_btn_left = '0.7%';
            }
        }

        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .button_switch_box.button_switch_box_selected";
        $returnstring .= "{";
        $returnstring .= "left:" . $toggle_switch_btn_left . ";";
        $returnstring .= "}";

        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .radio_button_box.selected";
        $returnstring .= "{";
        if ($toggle_active_color == '#ffffff' || $toggle_active_color == '#FFFFFF') {
            $toggle_active_border_color = '#d0d0d0';
        } else {
            $toggle_active_border_color = $this->arp_generate_color_tone($toggle_active_color, -30);
        }
        $returnstring .= "border:1px solid " . $toggle_active_border_color . ";";
        $returnstring .= "}";

        $returnstring .= "@media (max-width:480px){";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .button_switch_box.selected{";
        $returnstring .= "background:" . $toggle_active_color . ";";
        $returnstring .= "color:" . $toggle_active_text_color . ";";
        $returnstring .= "}";
        $returnstring .= "}";

        $returnstring .= ".arp_widget_table .arptemplate_" . $table_id . " .toggle_content_switches .button_switch_box.selected{";
        $returnstring .= "background:" . $toggle_active_color . ";";
        $returnstring .= "color:" . $toggle_active_text_color . ";";
        $returnstring .= "}";


        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .button_switch_box,";
        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_switches .radio_button_box label.toggle_content_label_txt{";
        $returnstring .= "font-family:" . $toggle_button_font_family . ";";
        $returnstring .= "font-size:" . $toggle_button_font_size . "px;";
        $returnstring .= "font-style:" . $toggle_button_font_style_italic . ";";
        $returnstring .= "font-weight:" . $toggle_button_font_style_bold . ";";
        $returnstring .= "text-decoration:" . $toggle_button_font_style_decoration . ";";
        $returnstring .= "}";


        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_wrapper.arp_radio_style_switch{";
        $returnstring .= "background:" . $toggle_main_color . ";";
        $toggle_wrapper_color = ( $toggle_main_color == '#ffffff' || $toggle_main_color == '#FFFFFF' ) ? '#d2d2d2' : $this->arp_generate_color_tone($toggle_main_color, -30);
        $returnstring .= "border:1px solid " . $toggle_wrapper_color . ";";
        $returnstring .= "}";



        $returnstring .= ".arptemplate_" . $table_id . " .arp_button_style_switch .toggle_content_switches{";
        $returnstring .= "background:" . $toggle_inactive_color . ";";
        $returnstring .= "color:" . $toggle_button_font_color . ";";
        $returnstring .= "}";


        $returnstring .= ".arptemplate_" . $table_id . " .arp_button_style_switch .toggle_content_switches .selected{";
        $returnstring .= "color:" . $toggle_active_text_color . ";";
        $returnstring .= "}";


        $returnstring .= ".arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box{";
        $returnstring .= "background:" . $toggle_inactive_color . ";";
        $returnstring .= "}";

        $returnstring .= ".arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box:not(.selected){";
        if ($toggle_inactive_color == '#ffffff' || $toggle_inactive_color == '#FFFFFF') {
            $toggle_inactive_border_color = '#d0d0d0';
        } else {
            $toggle_inactive_border_color = $this->arp_generate_color_tone($toggle_inactive_color, -30);
        }
        $returnstring .= "border:1px solid " . $toggle_inactive_border_color . ";";
        $returnstring .= "}";

        $returnstring .= "@media (max-width:480px){";
        $returnstring .= ".arptemplate_" . $table_id . " .arp_button_style_switch .toggle_content_switches{";
        $returnstring .= "background:none !important;";
        $returnstring .= "}";

        $returnstring .= ".arptemplate_" . $table_id . " .arp_button_style_switch .button_switch_box{";
        $returnstring .= "background:" . $toggle_inactive_color . ";";
        $returnstring .= "}";
        $returnstring .= "}";

        $returnstring .= ".arp_widget_table .arptemplate_" . $table_id . " .arp_button_style_switch .toggle_content_switches{";
        $returnstring .= "background:none !important;";
        $returnstring .= "}";

        $returnstring .= ".arp_widget_table .arptemplate_" . $table_id . " .arp_button_style_switch .button_switch_box{";
        $returnstring .= "background:" . $toggle_inactive_color . ";";
        $returnstring .= "}";




        $returnstring .= ".arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box label,.arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box span.fa{";
        $returnstring .= "color:" . $toggle_button_font_color . ";";
        $returnstring .= "}";

        $returnstring .= ".arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box.selected label, .arptemplate_" . $table_id . " .arp_radio_style_switch .radio_button_box.selected span.fa{";
        $returnstring .= "color:" . $toggle_active_text_color . ";";
        $returnstring .= "}";


        $returnstring .= ".arptemplate_" . $table_id . " .toggle_content_title{";
        $returnstring .= "color:" . $toggle_title_font_color . ";";
        $returnstring .= "font-family:" . $toggle_title_font_family . ";";
        $returnstring .= "font-size:" . $toggle_title_font_size . "px;";
        $returnstring .= "font-style:" . $toggle_title_font_style_italic . ";";
        $returnstring .= "font-weight:" . $toggle_title_font_style_bold . ";";
        $returnstring .= "text-decoration:" . $toggle_title_font_style_decoration . ";";
        $returnstring .= "}";
        /* Toggle Content Style End */

        if ($general_option['button_settings']['button_radius'] != '' && $general_option['button_settings']['button_radius'] != 0) {
            $returnstring .= " .arp_price_table_" . $table_id . " .bestPlanButton{
				border-radius:" . $general_option['button_settings']['button_radius'] . "px !important;
					-moz-border-radius:" . $general_option['button_settings']['button_radius'] . "px !important;
					-webkit-border-radius:" . $general_option['button_settings']['button_radius'] . "px !important;
					-o-border-radius:" . $general_option['button_settings']['button_radius'] . "px !important;
			}";
        }

        $default_luminosity = $arprice_default_settings->arp_default_skin_luminosity();
        $luminosity = (isset($default_luminosity[$reference_template][0])) ? $default_luminosity[$reference_template][0] : '';


        $template_inputs = $arprice_default_settings->arp_template_bg_section_inputs();
        $template_inputs_ = $template_inputs[$reference_template];

        /*         * **
         * new css after all font in gloabal settings
         * ** */

        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arpcolumnheader .bestPlanTitle";

        $returnstring .= " {font-family: " . stripslashes($general_column_settings['header_font_family_global']) . ";font-size: " . $general_column_settings['header_font_size_global'] . "px; ";
        if ($general_column_settings['arp_header_text_bold_global'] != '') {
            $returnstring .= " font-weight: " . $general_column_settings['arp_header_text_bold_global'] . ";";
        }
        if ($general_column_settings['arp_header_text_italic_global'] != '') {
            $returnstring .= " font-style: " . $general_column_settings['arp_header_text_italic_global'] . ";";
        }
        if ($general_column_settings['arp_header_text_decoration_global'] != '') {
            $returnstring .= " text-decoration: " . $general_column_settings['arp_header_text_decoration_global'] . ";";
        }
        $returnstring .="}";


        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arp_price_wrapper{";


        $returnstring .= "font-family:" . stripslashes_deep($general_column_settings['price_font_family_global']) . ";
						font-size:" . $general_column_settings['price_font_size_global'] . "px;";

        if ($general_column_settings['arp_price_text_bold_global'] != '') {
            $returnstring .= " font-weight: " . $general_column_settings['arp_price_text_bold_global'] . ";";
        }

        if ($general_column_settings['arp_price_text_italic_global'] != '') {
            $returnstring .= " font-style: " . $general_column_settings['arp_price_text_italic_global'] . ";";
        }

        if ($general_column_settings['arp_price_text_decoration_global'] != '') {
            $returnstring .= " text-decoration: " . $general_column_settings['arp_price_text_decoration_global'] . ";";
        }


        $returnstring .= "}";

        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn):not(.no_transition) .arp_opt_options li, .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_transition:not(.maincaptioncolumn) .arp_opt_options li";
        $returnstring .= "{";
        $returnstring .= "font-family:" . stripslashes_deep($general_column_settings['body_font_family_global']) . ";";
        $returnstring .= "font-size:" . $general_column_settings['body_font_size_global'] . "px;";

        if ($general_column_settings['arp_body_text_bold_global'] != '') {
            $returnstring .= " font-weight: " . $general_column_settings['arp_body_text_bold_global'] . ";";
        }

        if ($general_column_settings['arp_body_text_italic_global'] != '') {
            $returnstring .= " font-style: " . $general_column_settings['arp_body_text_italic_global'] . ";";
        }

        if ($general_column_settings['arp_body_text_decoration_global'] != '') {
            $returnstring .= " text-decoration: " . $general_column_settings['arp_body_text_decoration_global'] . " ;";
        }


        $returnstring .= "}";

        $returnstring .= '.arp_price_table_' . $table_id . ' #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arp_footer_content{';

        $returnstring .= 'font-family: ' . $general_column_settings['footer_font_family_global'] . ';';
        $returnstring .= 'font-size:' . $general_column_settings['footer_font_size_global'] . 'px;';
        if ($general_column_settings['arp_footer_text_bold_global'] == 'bold') {
            $returnstring .= 'font-weight: bold;';
        }
        if ($general_column_settings['arp_footer_text_italic_global'] == 'italic') {
            $returnstring .= 'font-style: italic;';
        }
        if ($general_column_settings['arp_footer_text_decoration_global'] == 'underline') {
            $returnstring .= 'text-decoration: underline;';
        } else if ($general_column_settings['arp_footer_text_decoration_global'] == 'line-through') {
            $returnstring .= 'text-decoration: line-through;';
        }

        $returnstring .= '}';

        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .bestPlanButton, .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .bestPlanButton .bestPlanButton_text";

        $returnstring .= "{";

        $returnstring .= "font-family:" . stripslashes_deep($general_column_settings['button_font_family_global']) . ";";
        $returnstring .= "font-size:" . $general_column_settings['button_font_size_global'] . "px;";

        if (isset($general_column_settings['arp_button_text_bold_global']) && $general_column_settings['arp_button_text_bold_global'] != '') {
            $returnstring .= " font-weight: " . $general_column_settings['arp_button_text_bold_global'] . ";";
        }

        if (isset($general_column_settings['arp_button_text_italic_global']) && $general_column_settings['arp_button_text_italic_global'] != '') {
            $returnstring .= " font-style: " . $general_column_settings['arp_button_text_italic_global'] . ";";
        }

        if (isset($general_column_settings['arp_button_text_decoration_global']) && $general_column_settings['arp_button_text_decoration_global'] != '') {
            $returnstring .= " text-decoration: " . $general_column_settings['arp_button_text_decoration_global'] . ";";
        }


        $returnstring .= "}";

        if ($reference_template == 'arptemplate_7') {
            $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .column_description,.arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arppricetablecolumnprice{";
        } else if ($reference_template == 'arptemplate_10') {
            $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arpplan{";
        } else if ($reference_template == 'arptemplate_11') {
            $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arppricetablecolumnprice{";
        } else {
            $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .column_description{";
        }

        if ($general_column_settings['arp_description_text_bold_global'] != '') {
            $returnstring .= " font-weight: " . $general_column_settings['arp_description_text_bold_global'] . ";";
        }

        if ($general_column_settings['arp_description_text_italic_global'] != '') {
            $returnstring .= " font-style: " . $general_column_settings['arp_description_text_italic_global'] . ";";
        }

        if ($general_column_settings['arp_description_text_decoration_global'] != '') {
            $returnstring .= " text-decoration: " . $general_column_settings['arp_description_text_decoration_global'] . ";";
        }


        $returnstring .= "font-family:" . stripslashes_deep($general_column_settings['description_font_family_global']) . ";";
        $returnstring .= "font-size:" . $general_column_settings['description_font_size_global'] . 'px;';


        $returnstring .= "}";

        /*         * **
         * new css after all font in gloabal settings ends
         * ** */


        if (is_array($opts['columns'])) {
            foreach ($opts['columns'] as $c => $columns) {

                $column_type = "";
                $col_arr_key = 0;
                if (isset($columns['is_caption']) && $columns['is_caption'] == 1)
                    $column_type = "caption_column";
                else
                    $column_type = "other_column";

                $col = str_replace('column_', '', $c);
                if ($column_type == 'caption_column') {
                    $col_arr_key = 0;
                } else {
                    $col_arr_key = $col % 5;
                    $col_arr_key = ($col_arr_key > 0) ? $col_arr_key : 5;
                }



                /* ==== Column Section Background ==== */

                $is_colum_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_column_bg_color = (is_array($template_inputs_['caption_column']) && array_key_exists('column_background_color', $template_inputs_['caption_column'])) ? true : false;
                } else {
                    $is_column_bg_color = (is_array($template_inputs_['other_column']) && array_key_exists('column_background_color', $template_inputs_['other_column'])) ? true : false;
                }

                if (isset($columns['column_background_color']) && $columns['column_background_color'] != '' && $is_column_bg_color) {
                    $gradient_arr = $arprice_default_settings->arp_default_gradient_templates();
                    $gradient_col = $arprice_default_settings->arp_default_gradient_templates_colors();
                    $gradient_default_skin = $gradient_arr['default_only'];
                    $gradient_all_skin = $gradient_arr['all_skins'];
                    $all_skin_template = 0;
                    $default_skin_template = 0;

                    if (in_array($reference_template, $gradient_all_skin)) {
                        $all_skin_template = 1;
                        $default_skin_template = 0;
                    } else if (in_array($reference_template, $gradient_default_skin)) {
                        $all_skin_template = 0;
                        $default_skin_template = 1;
                    }

                    $css_class = isset($arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['column_section']) ? $arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['column_section'] : '';

                    $explode_css_class = explode(",", $css_class);



                    if ($all_skin_template == 1 || $default_skin_template == 1) {

                        foreach ($explode_css_class as $css_class) {
                            $colors = $gradient_col[$reference_template]['arp_color_skin']['arp_css']['column_level_gradient'][$css_class][$template_color_skin];

                            if ($template_color_skin == 'custom_skin') {
                                foreach ($explode_css_class as $column_class) {

                                    $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c $column_class{";

                                    if ($colors[$col_arr_key] == "") {
                                        $properties[] = "background";
                                        $values[] = $columns['column_background_color'];
                                        foreach ($properties as $arkey => $arvalue) {
                                            $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                        }
                                    } else {
                                        $properties = array();
                                        $values = array();

                                        $colors = explode('___', $colors[$col_arr_key]);
                                        $color1 = $colors[0];
                                        $color2 = $colors[1];
                                        $putcol = $colors[2];

                                        if ($color1 == '{arp_column_background_color}') {
                                            $color1 = str_replace('{arp_column_background_color}', $columns['column_background_color'], $color1);
                                        }

                                        preg_match('/\d{2,3}|(\.\d{2,3})/', $color2, $matches);


                                        if (isset($matches[0]) && $matches[0] != "") {
                                            $matches[0] = $matches[0];
                                            $color2 = $this->arp_generate_color_tone($color1, $matches[0]);
                                        } else {
                                            $color2 = $colors[1];
                                        }


                                        if ($putcol == 1) {
                                            $first_color = $color1;
                                            $base_color = $color1;
                                            $color1 = $color2;
                                        } else {
                                            $first_color = $color1;
                                            $color1 = $color1;
                                            $base_color = $color2;
                                        }

                                        $properties[] = "background";
                                        $values[] = $first_color;
                                        $properties[] = "background-color";
                                        $values[] = $first_color;
                                        $properties[] = "background-image";
                                        $values[] = "-moz-linear-gradient(top,$base_color,$color1)";
                                        $properties[] = "background-image";
                                        $values[] = "-webkit-gradient(linear,0 0, 100%, from(), to($base_color,$color1))";
                                        $properties[] = "background-image";
                                        $values[] = "-webkit-linear-gradient(top,$base_color,$color1)";
                                        $properties[] = "background-image";
                                        $values[] = "-o-linear-gradient(top,$base_color,$color1)";
                                        $properties[] = "background-image";
                                        $values[] = "linear-gradient(to bottom,$base_color,$color1)";
                                        $properties[] = "background-repeat";
                                        $values[] = "repeat-x";
                                        $properties[] = "filter";
                                        $values[] = "progid:DXImageTransform.Microsoft.gradient(startColorstr='$base_color', endColorstr='$color1', GradientType=0)";
                                        $properties[] = "-ms-filter";
                                        $values[] = "progid:DXImageTransform.Microsoft.gradient (startColorstr=$base_color, endColorstr=$color1, GradientType=0)";
                                        foreach ($properties as $arkey => $arvalue) {
                                            $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                        }
                                    }
                                    $returnstring .= "}";
                                }
                            } else {

                                $colors = $colors[$col_arr_key];

                                foreach ($explode_css_class as $column_class) {
                                    $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c $column_class{";

                                    $colors_new = $gradient_col[$reference_template]['arp_color_skin']['arp_css']['column_level_gradient'][$css_class][$template_color_skin];
                                    $column_bg_color = $columns['column_background_color'];

                                    $default_gradient_colors = array();
                                    if (is_array($colors_new) && !empty($colors_new)) {
                                        foreach ($colors_new as $key => $tmpcol) {
                                            $default_gradient_colors[$key] = substr($tmpcol, 0, 7);
                                        }
                                    }

                                    if (( $colors == "" ) || ( $reference_template == 'arptemplate_9' && $columns['arp_change_bgcolor'] == 1 && !in_array(strtolower($column_bg_color), $default_gradient_colors) )) {
                                        
                                        $properties[] = "background";
                                        $values[] = $columns['column_background_color'];
                                        foreach ($properties as $arkey => $arvalue) {
                                            $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                        }
                                    } else {
                                        $properties = array();
                                        $values = array();


                                        if ($reference_template == 'arptemplate_9' && $columns['arp_change_bgcolor'] == 1) {


                                            $colors_new = $gradient_col[$reference_template]['arp_color_skin']['arp_css']['column_level_gradient'][$css_class][$template_color_skin];
                                            $column_bg_color = $columns['column_background_color'];

                                            foreach ($colors_new as $tmp_color) {
                                                $tmpcol = explode('___', $tmp_color);
                                                $tmpcol1 = @$tmpcol[0];
                                                $tmpcol2 = @$tmpcol[1];
                                                $tmpputc = @$tmpcol[2];
                                                if ($tmpcol1 == strtolower($column_bg_color)) {
                                                    $color1 = $tmpcol1;
                                                    $color2 = $tmpcol2;
                                                    $putcol = $tmpputc;
                                                }
                                            }
                                        } else {

                                            $colors = explode('___', $colors);
                                            $color1 = $colors[0];
                                            $color2 = $colors[1];
                                            $putcol = $colors[2];
                                        }
                                        if ($putcol == 1) {
                                            $first_color = $color1;
                                            $base_color = $color1;
                                            $color1 = $color2;
                                        } else {
                                            $first_color = $color1;
                                            $color1 = $color1;
                                            $base_color = $color2;
                                        }

                                        $properties[] = "background";
                                        $values[] = $first_color;
                                        $properties[] = "background-color";
                                        $values[] = $first_color;
                                        $properties[] = "background-image";
                                        $values[] = "-moz-linear-gradient(top,$base_color,$color1)";
                                        $properties[] = "background-image";
                                        $values[] = "-webkit-gradient(linear,0 0, 100%, from(), to($base_color,$color1))";
                                        $properties[] = "background-image";
                                        $values[] = "-webkit-linear-gradient(top,$base_color,$color1)";
                                        $properties[] = "background-image";
                                        $values[] = "-o-linear-gradient(top,$base_color,$color1)";
                                        $properties[] = "background-image";
                                        $values[] = "linear-gradient(to bottom,$base_color,$color1)";
                                        $properties[] = "background-repeat";
                                        $values[] = "repeat-x";
                                        $properties[] = "filter";
                                        $values[] = "progid:DXImageTransform.Microsoft.gradient(startColorstr='$base_color', endColorstr='$color1', GradientType=0)";
                                        $properties[] = "-ms-filter";
                                        $values[] = "progid:DXImageTransform.Microsoft.gradient (startColorstr=$base_color, endColorstr=$color1, GradientType=0)";
                                        foreach ($properties as $arkey => $arvalue) {
                                            $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                        }
                                    }
                                    $returnstring .= "}";
                                }
                            }
                        }
                    } else {

                        foreach ($explode_css_class as $column_class) {
                            if (!empty($column_class)) {
                                $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c $column_class{";
                                if ($reference_template === 'arptemplate_25') {
                                    $bgcolor = $arprice_form->hex2rgb($columns['column_background_color']);

                                    $returnstring .= "background-color:rgba({$bgcolor['red']},{$bgcolor['green']},{$bgcolor['blue']},0.8);";
                                } else {

                                    $returnstring .= "background-color:{$columns['column_background_color']};";
                                }
                                $returnstring .= "}";
                            }
                        }
                    }
                
                }

                /**
                 * Column Background Image
                 * 
                 * @since ARPrice 2.0
                 */
                if (isset($columns['column_background_image']) && $columns['column_background_image'] != '') {

                    $column_background_image = @$columns['column_background_image'];
                    $column_background_image_height = @$columns['column_background_image_height'];
                    $column_background_image_width = @$columns['column_background_image_width'];

                    $column_background_image_class = $arprice_default_settings->arp_column_background_image_section_array();
                    $column_bg_img_class = $column_background_image_class[$reference_template];
                    if (!empty($column_bg_img_class)) {
                        foreach ($column_bg_img_class as $cbgimg_class) {
                            $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$cbgimg_class{";
                            $returnstring .= "background-image:url(" . $column_background_image . ");";
                            $columns['column_background_min_positon'] = isset($columns['column_background_min_positon']) ? $columns['column_background_min_positon'] : '50';
                            $columns['column_background_max_positon'] = isset($columns['column_background_max_positon']) ? $columns['column_background_max_positon'] : '50';
                            if (@$columns['column_background_scaling'] == 'do_not_scale_image') {
                                $returnstring .= "background-position:0 0;";
                            } else {
                                $returnstring .= "background-position:" . @$columns['column_background_min_positon'] . "% " . @$columns['column_background_max_positon'] . "% !important;";
                                $returnstring .= "-webkit-background-size:cover;";
                                $returnstring .= "-moz-background-size:cover;";
                                $returnstring .= "-o-background-size:cover;";
                                $returnstring .= "background-size:cover;";
                            }
                   

                            $returnstring .= "background-repeat:no-repeat !important;";

                            $returnstring .= "}";
                        }
                    }

                    $other_background_section = $arprice_default_settings->arp_template_bg_section_classes();
                    $other_background_section_class = $other_background_section[$reference_template]['other_column'];

                    if (!empty($other_background_section_class)) {
                        foreach ($other_background_section_class as $section_key => $section_value) {
                            if ($reference_template !== 'arptemplate_25') {
                                if ($section_key == 'body_section') {
                                    if (!empty($section_key)) {
                                        foreach ($other_background_section_class[$section_key] as $body_class) {
                                            $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$body_class{";
                                            $returnstring .= "background-color:transparent!important;";
                                            $returnstring .= "}";
                                        }
                                    }
                                } else {
                                    $other_css_class = $other_background_section_class[$section_key];
                                    $explode_other_css_class = explode(",", $other_css_class);

                                    foreach ($explode_other_css_class as $other_column_class) {
                                        if (!empty($other_column_class)) {
                                            $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$other_column_class{";
                                            $returnstring .= "background-color:transparent!important;";
                                            $returnstring .= "}";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }

                /* ==== Column Section Background ==== */

                /* ==== Column Desc Section Background ==== */
                $is_column_desc_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_column_desc_bg_color = ( is_array($template_inputs_['caption_column']) && array_key_exists('column_desc_background_color', $template_inputs_['caption_column'])) ? true : false;
                } else {
                    $is_column_desc_bg_color = ( is_array($template_inputs_['other_column']) && array_key_exists('column_desc_background_color', $template_inputs_['other_column'])) ? true : false;
                }

                if (isset($columns['column_desc_background_color']) && $columns['column_desc_background_color'] != '' && $is_column_desc_bg_color) {

                    if (isset($arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['desc_selection']) && !empty($arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['desc_selection'])) {

                        $back_sect_class = explode(',', $arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['desc_selection']);
                        foreach ($back_sect_class as $value) {

                            $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .{$value}{";



                            $returnstring .= "background-color:{$columns['column_desc_background_color']};";
                            
                            $returnstring .= "}";
                        }
                    }
                }
                /* ==== Column Desc Section Background ==== */



                /* ==== Header Section Background ==== */

                $is_column_header_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_column_header_bg_color = (is_array($template_inputs_['caption_column']) && array_key_exists('header_background_color', $template_inputs_['caption_column'])) ? true : false;
                } else {
                    $is_column_header_bg_color = ( is_array($template_inputs_['other_column']) && array_key_exists('header_background_color', $template_inputs_['other_column'])) ? true : false;
                }
                if (isset($columns['header_background_color']) && $columns['header_background_color'] != '' && $is_column_header_bg_color) {

                    $explode_header_class_arr = explode(",", $arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['header_section']);

                    $gradient_arr = $arprice_default_settings->arp_default_gradient_templates();
                    $gradient_col = $arprice_default_settings->arp_default_gradient_templates_colors();
                    $gradient_default_skin = $gradient_arr['default_only'];
                    $gradient_all_skin = $gradient_arr['all_skins'];
                    $all_skin_template = 0;
                    $default_skin_template = 0;

                    if (in_array($reference_template, $gradient_all_skin)) {
                        $all_skin_template = 1;
                        $default_skin_template = 0;
                    } else if (in_array($reference_template, $gradient_default_skin)) {
                        $all_skin_template = 0;
                        $default_skin_template = 1;
                    }


                    foreach ($explode_header_class_arr as $explode_header_class) {


                        $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$explode_header_class {";
                        if ($reference_template == 'arptemplate_7') {
                            $bgcolor = $arprice_form->hex2rgb($columns['header_background_color']);

                            $returnstring .= "background-color:rgba({$bgcolor['red']},{$bgcolor['green']},{$bgcolor['blue']},0.7);";
                        } else {
                            $returnstring .= "background-color:{$columns['header_background_color']};";
                        }
                        $returnstring .= "}";
                    }



                    if ($reference_template == 'arptemplate_20') {
                        $returnstring .= ".arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .arppricingtablebodycontent li i{";
                        $returnstring .= "color:{$columns['header_background_color']}";
                        $returnstring .= "}";
                    }



                }

                /**
                 * Header Background Image
                 * 
                 * @since ARPrice 2.0
                 */
                if (isset($columns['header_background_image']) && $columns['header_background_image'] != '') {

                    $header_background_image = $columns['header_background_image'];

                    $header_background_image_class = $arprice_default_settings->arp_background_image_section_array();
                    $header_bg_img_class = $header_background_image_class[$reference_template];

                    if (!empty($header_bg_img_class)) {
                        foreach ($header_bg_img_class as $bgimg_class) {
                            $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$bgimg_class{";
                            $returnstring .= "background-image:url(" . $header_background_image . ");";
                            $returnstring .= "background-position:center center;";
                            $returnstring .= "background-repeat:no-repeat;";
                            $returnstring .= "}";
                        }
                    }
                }

                /* ==== Header Section Background ==== */

                /* ==== Pricing Section Background ==== */
                $is_column_price_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_column_price_bg_color = (is_array($template_inputs_['caption_column']) && array_key_exists('price_background_color', $template_inputs_['caption_column'])) ? true : false;
                } else {
                    $is_column_price_bg_color = (is_array($template_inputs_['other_column']) && array_key_exists('price_background_color', $template_inputs_['other_column'])) ? true : false;
                }

                if (isset($columns['price_background_color']) && $columns['price_background_color'] != '' && $is_column_price_bg_color) {
                    $gradient_arr = $arprice_default_settings->arp_default_gradient_templates();
                    $gradient_col = $arprice_default_settings->arp_default_gradient_templates_colors();
                    $gradient_default_skin = $gradient_arr['default_only'];
                    $gradient_all_skin = $gradient_arr['all_skins'];
                    $all_skin_template = 0;
                    $default_skin_template = 0;

                    if (in_array($reference_template, $gradient_all_skin)) {
                        $all_skin_template = 1;
                        $default_skin_template = 0;
                    } else if (in_array($reference_template, $gradient_default_skin)) {
                        $all_skin_template = 0;
                        $default_skin_template = 1;
                    }

                    $css_class = $arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['pricing_section'];

                    if ($all_skin_template == 1 || $default_skin_template == 1) {

                        $colors = $gradient_col[$reference_template]['arp_color_skin']['arp_css']['pricing_level_gradient']['.' . $css_class][$template_color_skin];

                        if ($template_color_skin == 'custom_skin') {

                            $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$css_class{";

                            if ($colors[$col_arr_key] == "") {
                                $properties[] = "background";
                                $values[] = $columns['price_background_color'];
                                foreach ($properties as $arkey => $arvalue) {
                                    $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                }
                            } else {
                                $properties = array();
                                $values = array();

                                $colors = explode('___', $colors[$col_arr_key]);
                                $color1 = $colors[0];
                                $color2 = $colors[1];
                                $putcol = $colors[2];

                                if ($color1 == '{arp_pricing_background_color_input}') {
                                    $color1 = str_replace('{arp_pricing_background_color_input}', $columns['price_background_color'], $color1);
                                }

                                preg_match('/\d{2,3}|(\.\d{2,3})/', $color2, $matches);


                                if ($matches[0] != "") {
                                    $matches[0] = $matches[0];
                                    $color2 = $this->arp_generate_color_tone($color1, $matches[0]);
                                } else {
                                    $color2 = $colors[1];
                                }


                                if ($putcol == 1) {
                                    $first_color = $color1;
                                    $base_color = $color1;
                                    $color1 = $color2;
                                } else {
                                    $first_color = $color1;
                                    $color1 = $color1;
                                    $base_color = $color2;
                                }

                                $properties[] = "background";
                                $values[] = $first_color;
                                $properties[] = "background-color";
                                $values[] = $first_color;
                                $properties[] = "background-image";
                                $values[] = "-moz-linear-gradient(top,$base_color,$color1)";
                                $properties[] = "background-image";
                                $values[] = "-webkit-gradient(linear,0 0, 100%, from(), to($base_color,$color1))";
                                $properties[] = "background-image";
                                $values[] = "-webkit-linear-gradient(top,$base_color,$color1)";
                                $properties[] = "background-image";
                                $values[] = "-o-linear-gradient(top,$base_color,$color1)";
                                $properties[] = "background-image";
                                $values[] = "linear-gradient(to bottom,$base_color,$color1)";
                                $properties[] = "background-repeat";
                                $values[] = "repeat-x";
                                $properties[] = "filter";
                                $values[] = "progid:DXImageTransform.Microsoft.gradient(startColorstr='$base_color', endColorstr='$color1', GradientType=0)";
                                $properties[] = "-ms-filter";
                                $values[] = "progid:DXImageTransform.Microsoft.gradient (startColorstr=$base_color, endColorstr=$color1, GradientType=0)";

                                foreach ($properties as $arkey => $arvalue) {
                                    $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                }
                            }
                            $returnstring .= "}";
                        } else {

                            $colors = $colors[$col_arr_key];
                            $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$css_class{";
                            if ($colors == "") {
                                $properties[] = "background";
                                $values[] = $columns['price_background_color'];
                                foreach ($properties as $arkey => $arvalue) {
                                    $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                }
                            } else {
                                $properties = array();
                                $values = array();
                                $colors = explode('___', $colors);
                                $color1 = $colors[0];
                                $color2 = $colors[1];
                                $putcol = $colors[2];
                                if ($color1 != $columns['price_background_color']) {
                                    $color1 = $columns['price_background_color'];
                                    $color2 = $this->arp_generate_color_tone($color1, -20);
                                }
                                if ($putcol == 1) {
                                    $first_color = $color1;
                                    $base_color = $color1;
                                    $color1 = $color2;
                                } else {
                                    $first_color = $color1;
                                    $color1 = $color1;
                                    $base_color = $color2;
                                }

                                $properties[] = "background";
                                $values[] = $first_color;
                                $properties[] = "background-color";
                                $values[] = $first_color;
                                $properties[] = "background-image";
                                $values[] = "-moz-linear-gradient(top,$base_color,$color1)";
                                $properties[] = "background-image";
                                $values[] = "-webkit-gradient(linear,0 0, 100%, from(), to($base_color,$color1))";
                                $properties[] = "background-image";
                                $values[] = "-webkit-linear-gradient(top,$base_color,$color1)";
                                $properties[] = "background-image";
                                $values[] = "-o-linear-gradient(top,$base_color,$color1)";
                                $properties[] = "background-image";
                                $values[] = "linear-gradient(to bottom,$base_color,$color1)";
                                $properties[] = "background-repeat";
                                $values[] = "repeat-x";
                                $properties[] = "filter";
                                $values[] = "progid:DXImageTransform.Microsoft.gradient(startColorstr='$base_color', endColorstr='$color1', GradientType=0)";
                                $properties[] = "-ms-filter";
                                $values[] = "progid:DXImageTransform.Microsoft.gradient (startColorstr=$base_color, endColorstr=$color1, GradientType=0)";
                                foreach ($properties as $arkey => $arvalue) {
                                    $returnstring .= $arvalue . ':' . $values[$arkey] . ';';
                                }
                            }
                            $returnstring .= "}";
                        }
                    } else {
                        $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .$css_class{";
                        $returnstring .= "background-color:{$columns['price_background_color']};";
                        $returnstring .= "}";
                    }
                }

                /* ==== Pricing Section Background ==== */

                /* ==== Button Background ==== */
                $is_button_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_button_bg_color = (is_array($template_inputs_['caption_column']) && array_key_exists('button_background_color', $template_inputs_['caption_column'])) ? true : false;
                } else {
                    $is_button_bg_color = (is_array($template_inputs_['other_column']) && array_key_exists('button_background_color', $template_inputs_['other_column'])) ? true : false;
                }
                if (isset($columns['button_background_color']) && $columns['button_background_color'] != '' && $is_button_bg_color) {
                    $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .{$arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['button_section']}{";
                    $returnstring .= "background-color:{$columns['button_background_color']};";
                    $returnstring .= "}";
                }

                /* ==== Button Background ==== */

                /* ==== Footer Section ==== */
                $is_footer_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_footer_bg_color = (is_array($template_inputs_['caption_column']) && array_key_exists('footer_background_color', $template_inputs_['caption_column'])) ? true : false;
                } else {
                    $is_footer_bg_color = (is_array($template_inputs_['other_column']) && array_key_exists('footer_background_color', $template_inputs_['other_column'])) ? true : false;
                }
                if (isset($columns['footer_background_color']) && $columns['footer_background_color'] != '' && $is_footer_bg_color) {

                    $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .{$arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['footer_section']}{";
                    $returnstring .= "background:{$columns['footer_background_color']};";
                    $returnstring .= "}";
                }

                /* ==== Footer Section ==== */

                /* ==== Body Alternate Background Effect ==== */
                $is_content_odd_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_body_section = ( is_array($template_inputs_['caption_column']) && array_key_exists('body_section', $template_inputs_['caption_column']) ) ? true : false;
                    $is_content_odd_bg_color = ( $is_body_section && is_array($template_inputs_['caption_column']['body_section']) && array_key_exists('content_odd_color', $template_inputs_['caption_column']['body_section'])) ? true : false;
                } else {
                    $is_body_section = is_array($template_inputs_['other_column']) && array_key_exists('body_section', $template_inputs_['other_column']) ? true : false;
                    $is_content_odd_bg_color = ($is_body_section && $template_inputs_['other_column']['body_section'] && array_key_exists('content_odd_color', $template_inputs_['other_column']['body_section'])) ? true : false;
                }
                if (isset($columns['content_odd_color']) && $columns['content_odd_color'] != '' && $is_content_odd_bg_color) {
                    $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .{$arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['body_section']['odd_row']} {";
                    if ($reference_template === 'arptemplate_25') {
                        $contentcolor = $arprice_form->hex2rgb($columns['content_odd_color']);

                        $returnstring .= "background-color:rgba({$contentcolor['red']},{$contentcolor['green']},{$contentcolor['blue']},0.8);";
                    } else {
                        $returnstring .= "background:{$columns['content_odd_color']}";
                    }
                    $returnstring .= "}";
                }

                $is_content_even_bg_color = false;
                if ($column_type === 'caption_column') {
                    $is_body_section = (is_array(@$template_inputs_['caption_column']) && array_key_exists('body_section', $template_inputs_['caption_column'])) ? true : false;
                    $is_content_even_bg_color = ($is_body_section && is_array($template_inputs_['caption_column']['body_section']) && array_key_exists('content_even_color', $template_inputs_['caption_column']['body_section'])) ? true : false;
                } else {
                    $is_body_section = is_array(@$template_inputs_['other_column']) && array_key_exists('body_section', $template_inputs_['other_column']) ? true : false;
                    $is_content_even_bg_color = ($is_body_section && is_array(@$template_inputs_['other_column']['body_section']) && array_key_exists('content_even_color', $template_inputs_['other_column']['body_section'])) ? true : false;
                }

                if (isset($columns['content_even_color']) && $columns['content_even_color'] != '' && $is_content_even_bg_color) {

                    $returnstring .= " .arp_price_table_$table_id #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_$c .{$arp_mainoptionsarr['general_options']['template_bg_section_classes'][$reference_template][$column_type]['body_section']['even_row']} {";
                    if ($reference_template === 'arptemplate_25') {
                        $contentcolor = $arprice_form->hex2rgb($columns['content_even_color']);

                        $returnstring .= "background-color:rgba({$contentcolor['red']},{$contentcolor['green']},{$contentcolor['blue']},0.8);";
                    } else {
                        $returnstring .= "background:{$columns['content_even_color']}";
                    }
                    $returnstring .= "}";
                }

                /* ==== Body Alternate Background Effect ==== */



                if ($columns['is_caption'] != 0) {
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arpcolumnheader .arpcaptiontitle";
                    $returnstring .= " {font-family: " . stripslashes($columns['header_font_family']) . ";font-size: " . $columns['header_font_size'] . "px; ";
                    if ($columns['header_style_bold'] != '')
                        $returnstring .= " font-weight: " . $columns['header_style_bold'] . ";";

                    if ($columns['header_style_italic'] != '')
                        $returnstring .= " font-style: " . $columns['header_style_italic'] . ";";

                    if ($columns['header_style_decoration'] != '')
                        $returnstring .= " text-decoration: " . $columns['header_style_decoration'] . ";";

                    $returnstring .= " color: " . $columns['header_font_color'] . ";
                        }";
                }
                else {
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arpcolumnheader .bestPlanTitle {";
                    $returnstring .= " color: " . $columns['header_font_color'] . ";
                        }";
                }



                $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_price_wrapper{";

                $returnstring .= "color:" . $columns['price_font_color'] . ";";
                $returnstring .= "}";



                if ($reference_template == 'arptemplate_15') {
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_price_duration, .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_price_duration_text{";
                    $returnstring .= "margin-top:" . (($columns['price_font_size'] - $columns['price_text_font_size']) + 10 ) . "px;";
                    $returnstring .= "}";
                }


                $returnstring .= ".arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_opt_options li.arp_odd_row{";
                $returnstring .= "color:" . $columns['content_font_color'] . ";";
                $returnstring .= "}";

                $returnstring .= ".arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_opt_options li.arp_even_row{";
                $returnstring .= "color:" . $columns['content_even_font_color'] . ";";
                $returnstring .= "}";
//                for  li level custom font style
                if (isset($columns['rows']) && is_array($columns['rows'])) {
                    $row_count = 0;
                    foreach ($columns['rows'] as $i => $row_detail) {

                        if ($columns['is_caption'] != 0) {
                            $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_opt_options li,.arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.no_transition).style_" . $c . " .arp_opt_options li";

                            $returnstring .= "{";
                            $returnstring .= "font-family:" . stripslashes_deep($columns['content_font_family']) . ";";
                            $returnstring .= "font-size:" . $columns['content_font_size'] . "px;";


                            $returnstring .= "}";
                        }

                        $row_count++;
                    }
                }

                $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton, .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton .bestPlanButton_text";

                $returnstring .= "{";

                $returnstring .= "color:" . $columns['button_font_color'] . ";";

                $returnstring .= "}";

                if (isset($columns['button_size']) && isset($columns['button_height']) && $reference_template != 'arptemplate_26') {

                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton, .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton";
                    $returnstring .= "{";
                    $returnstring .= "width:" . $columns['button_size'] . "px;";
                    $returnstring .= "height:" . $columns['button_height'] . "px;";
                    $returnstring .= "}";
                }


                if ($reference_template == 'arptemplate_7') {
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .column_description,.arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arppricetablecolumnprice{";
                } else if ($reference_template == 'arptemplate_10') {
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arpplan{";
                } else if ($reference_template == 'arptemplate_11') {
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arppricetablecolumnprice{";
                } else {
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .column_description{";
                }

                $returnstring .= "color:" . stripslashes_deep($columns['column_description_font_color']) . ";";

                $returnstring .= "}";

                $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .caption_li, .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .arp_caption_li_text{";

                $returnstring .= "color:" . ( isset($columns['content_label_font_color']) ? $columns['content_label_font_color'] : "" ) . ";";


                $returnstring .= "}";



                //content column css start
                if ($columns['is_caption'] != 0) {
                    $returnstring .= '.arptemplate_' . $table_id . ' .style_column_0 .arp_footer_content {';

                    $returnstring .= 'margin: 5px;';
                    $returnstring .= 'color: ' . $columns['footer_level_options_font_color'] . ';';
                    $returnstring .= 'font-family: ' . $columns['footer_level_options_font_family'] . ';';
                    $returnstring .= 'font-size:' . $columns['footer_level_options_font_size'] . 'px;';
                    if ($columns['footer_level_options_font_style_bold'] == 'bold') {
                        $returnstring .= 'font-weight: bold;';
                    }
                    if ($columns['footer_level_options_font_style_italic'] == 'italic') {
                        $returnstring .= 'font-style: italic;';
                    }
                    if ($columns['footer_level_options_font_style_decoration'] == 'underline') {
                        $returnstring .= 'text-decoration: underline;';
                    } else if ($columns['footer_level_options_font_style_decoration'] == 'line-through') {
                        $returnstring .= 'text-decoration: line-through;';
                    }

                    $returnstring .= '}';
                }
                //content column css end

                $returnstring .= '.arptemplate_' . $table_id . ' .style_' . $c . ' .arp_footer_content{';

                
                $returnstring .= 'color: ' . $columns['footer_level_options_font_color'] . ';';
                $returnstring .= 'width:100% !important;';
                $returnstring .= '}';

                /* text-align */
                $arp_section_text_alignment = $arprice_default_settings->arp_section_text_alignment();
                $arp_section_text_alignment = isset($arp_section_text_alignment[$reference_template]) ? $arp_section_text_alignment[$reference_template] : array();
                if ($columns['is_caption'] != 0) {
                    $arp_section_text_alignment = $arp_section_text_alignment['caption_column'];
                    if (isset($columns['header_font_align']) && array_key_exists('header_section', $arp_section_text_alignment)) {
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['header_section'] . "{";
                        $returnstring .="text-align:" . $columns['header_font_align'] . ";";
                        $returnstring .="}";
                    }
                    if (isset($columns['footer_text_align']) && array_key_exists('footer_section', $arp_section_text_alignment)) {
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['footer_section'] . "{";
                        $returnstring .="text-align:" . $columns['footer_text_align'] . ";";
                        $returnstring .="}";
                    }
                } else {
                    $arp_section_text_alignment = isset($arp_section_text_alignment['other_column']) ? $arp_section_text_alignment['other_column'] : array();
                    if (isset($general_column_settings['arp_header_text_alignment']) && array_key_exists('header_section', $arp_section_text_alignment)) {
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['header_section'] . "{";
                        $returnstring .="text-align:" . $general_column_settings['arp_header_text_alignment'] . ";";
                        $returnstring .="}";
                    }
                    if (isset($general_column_settings['arp_price_text_alignment']) && array_key_exists('pricing_section', $arp_section_text_alignment)) {
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['pricing_section'] . "{";
                        $returnstring .="text-align:" . $general_column_settings['arp_price_text_alignment'] . ";";
                        $returnstring .="}";
                    }

                    if (isset($general_column_settings['arp_body_text_alignment']) && array_key_exists('body_section', $arp_section_text_alignment)) {
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['body_section'] . "{";
                        $returnstring .="text-align:" . $general_column_settings['arp_body_text_alignment'] . ";";
                        $returnstring .="}";
                    }
                    if (isset($general_column_settings['arp_footer_text_alignment']) && array_key_exists('footer_section', $arp_section_text_alignment)) {
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['footer_section'] . "{";
                        $returnstring .="text-align:" . $general_column_settings['arp_footer_text_alignment'] . ";";
                        $returnstring .="}";
                    }

                    if (isset($general_column_settings['arp_description_text_alignment']) && array_key_exists('column_description_section', $arp_section_text_alignment)) {
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " ." . $arp_section_text_alignment['column_description_section'] . "{";
                        $returnstring .="text-align:" . $general_column_settings['arp_description_text_alignment'] . ";";
                        $returnstring .="}";
                    }
                }
                /* text-align */

                /* shortcode customization */
                if (isset($columns['arp_shortcode_customization_style']) && isset($columns['arp_shortcode_customization_size'])) {
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .rounded_corder i{";
                    if ($reference_template == 'arptemplate_4') {
                        $returnstring .="color : " . @$columns['price_font_color'] . "; ";
                    } else {
                        $returnstring .="color : " . @$columns['shortcode_font_color'] . "; ";
                    }
                    $returnstring .="}";
                    $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .rounded_corder{";
                    $shortcode_array = $arprice_default_settings->arp_shortcode_custom_type();
                    if ($reference_template == 'arptemplate_4') {
                        $returnstring .="color : " . @$columns['price_font_color'] . "; ";
                    } else {
                        $returnstring .="color : " . @$columns['shortcode_font_color'] . "; ";
                    }
                    if ($reference_template == 'arptemplate_4') {
                        if (@$shortcode_array[$columns['arp_shortcode_customization_style']]['type'] == 'solid') {

                            $returnstring .="background-color : " . @$columns['price_background_color'] . "; ";
                        }
                        $returnstring .="border-color : " . @$columns['price_background_color'] . "; ";
                    } else {
                        if (@$shortcode_array[$columns['arp_shortcode_customization_style']]['type'] == 'solid') {

                            $returnstring .="background-color : " . @$columns['shortcode_background_color'] . "; ";
                        }
                        $returnstring .="border-color : " . @$columns['shortcode_background_color'] . "; ";
                    }
                    $returnstring .="}";
                }
                /* shortcode customization */


                /* button new style */
                $arp_button_type = $arprice_default_settings->arp_button_type();
                if (isset($general_column_settings['arp_global_button_type']) && $general_column_settings['arp_global_button_type'] != 'none') {
                    if ($general_column_settings['arp_global_button_type'] == 'border') {
                        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . "{";
                        $returnstring .="border : 2px solid " . $columns['button_background_color'] . ";";
                        $returnstring .="color : " . $columns['button_background_color'] . ";";
                        $returnstring .="background-color : transparent;";

                        $returnstring .="}";
                        $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . " .bestPlanButton_text{";
                        $returnstring .="color :" . $columns['button_background_color'] . "  !important;";
                        $returnstring .="}";

                        if ($general_column_settings['disable_button_hover_effect'] != 1) {

                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $returnstring .= 'background-color:' . $columns['button_hover_background_color'] . ' !important;';
                            $returnstring .='border-color : ' . $columns['button_hover_background_color'] . ' !important;';
                            $returnstring .="}";

                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover .bestPlanButton_text{";
                            $returnstring .="color :" . $columns['button_hover_font_color'] . "  !important;";
                            $returnstring .="}";
                        } else {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $returnstring .="border : 2px solid " . $columns['button_background_color'] . " !important;";
                            $returnstring .="background : transparent !important;";
                            $returnstring .="}";
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover .bestPlanButton_text{";

                            $returnstring .="color :" . $columns['button_background_color'] . " !important;";
                            $returnstring .="}";
                        }

                        if (isset($general_column_settings['disable_hover_effect']) && $general_column_settings['disable_hover_effect'] == 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . "{";
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            $returnstring .= 'background-color: transparent!important;';
                            $returnstring .='border-color : rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',1) !important;';
                            $returnstring .="}";
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . " .bestPlanButton_text{";
                            $returnstring .="color :" . $columns['button_background_color'] . "  !important;";
                            $returnstring .="}";
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . " .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $returnstring .= 'background: ' . $columns['button_background_color'] . '!important;';
                            $returnstring .='border-color : ' . $columns['button_background_color'] . ' !important;';
                            $returnstring .="}";
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . " .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover .bestPlanButton_text{";
                            $returnstring .="color :" . $columns['button_font_color'] . "  !important;";
                            $returnstring .="}";
                        } else {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ",.arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . ".column_highlight .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . "{";
                            $color = $arprice_form->hex2rgb($columns['button_hover_background_color']);
                            $returnstring .= 'background-color: transparent!important;';
                            $returnstring .='border-color : rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',1) !important;';
                            $returnstring .="}";
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . " .bestPlanButton_text,.arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . ".column_highlight .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . " .bestPlanButton_text{";
                            $returnstring .="color :" . $columns['button_hover_background_color'] . "  !important;";
                            $returnstring .="}";
                        }

                        if (isset($general_column_settings['disable_hover_effect']) && $general_column_settings['disable_hover_effect'] == 1 && $general_column_settings['disable_button_hover_effect'] != 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $returnstring .= 'background-color:' . $columns['button_background_color'] . ' !important;';
                            $returnstring .='border-color : ' . $columns['button_background_color'] . ' !important;';
                            $returnstring .="}";

                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover .bestPlanButton_text{";
                            $returnstring .="color :" . $columns['button_font_color'] . "  !important;";
                            $returnstring .="}";
                        }

                        if (!isset($general_column_settings['disable_hover_effect']) && $general_column_settings['disable_button_hover_effect'] == 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $returnstring .= 'background-color: transparent !important;';
                            $returnstring .='border-color : ' . $columns['button_hover_background_color'] . ' !important;';
                            $returnstring .="}";

                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover .bestPlanButton_text{";
                            $returnstring .="color :" . $columns['button_hover_background_color'] . "  !important;";
                            $returnstring .="}";
                        }
                    }
                    if ($general_column_settings['arp_global_button_type'] == 'reverse_border') {

                        $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.style_" . $c . " .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . "{";
                        $returnstring .="border : 2px solid  " . $columns['button_background_color'] . "!important;";
                        $returnstring .="}";

                        $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . "{";
                        $returnstring .="border : 2px solid  " . $columns['button_hover_background_color'] . "!important;";
                        $returnstring .="}";

                        $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                        $returnstring .="border : 2px solid  " . $columns['button_hover_background_color'] . "!important;";
                        $returnstring .= 'background-color: transparent !important;';
                        $returnstring .="}";



                        $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover .bestPlanButton_text{";

                        $returnstring .="color :" . $columns['button_hover_background_color'] . "  !important;";
                        $returnstring .="}";


                        if (!isset($general_column_settings['disable_hover_effect']) && !$general_column_settings['disable_hover_effect'] == 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ".column_highlight .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . "{";
                            $returnstring .="border : 2px solid  " . $columns['button_hover_background_color'] . "!important;";
                            $returnstring .="background-color : " . $columns['button_hover_background_color'] . " !important;";
                            $returnstring .="}";
                        } else {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . "{";
                            $returnstring .="border : 2px solid  " . $columns['button_background_color'] . "!important;";
                            $returnstring .="}";

                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $returnstring .="border : 2px solid  " . $columns['button_background_color'] . "!important;";
                            $returnstring .= 'background-color: transparent !important;';
                            $returnstring .="}";

                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover .bestPlanButton_text{";
                            $returnstring .="color :" . $columns['button_background_color'] . "  !important;";
                            $returnstring .="}";
                        }

                        if (!isset($general_column_settings['disable_button_hover_effect']) && $general_column_settings['disable_button_hover_effect'] != 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . " .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $returnstring .="background-color : transparent !important;";
                            $returnstring .="border : 2px solid  " . $columns['button_background_color'] . "!important;";
                            $returnstring .=" }";
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . " .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover .bestPlanButton_text{";
                            $returnstring .="color : " . $columns['button_background_color'] . " !important;";
                            $returnstring .="}";
                        } else {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";

                            $returnstring .="background-color : " . $columns['button_hover_background_color'] . " !important;";
                            $returnstring .="border : 2px solid  " . $columns['button_hover_background_color'] . "!important;";
                            $returnstring .=" }";



                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover .bestPlanButton_text{";

                            $returnstring .="color : " . $columns['button_hover_font_color'] . " !important;";
                            $returnstring .="}";
                        }

                        if ($general_column_settings['disable_button_hover_effect'] == 1 && isset($general_column_settings['disable_hover_effect'])) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";

                            $returnstring .="background-color : " . $columns['button_background_color'] . " !important;";
                            $returnstring .="border : 2px solid  " . $columns['button_background_color'] . "!important;";
                            $returnstring .=" }";
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover .bestPlanButton_text{";
                            $returnstring .="color : " . $columns['button_font_color'] . " !important;";
                            $returnstring .="}";
                        }
                    }
                    if ($general_column_settings['arp_global_button_type'] == 'classic') {
                        if ($general_column_settings['disable_button_hover_effect'] != 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $color = $arprice_form->hex2rgb($columns['button_hover_background_color']);
                            $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                            $returnstring .="}";
                        }
                        if ($general_column_settings['disable_hover_effect'] == 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                            $returnstring .="}";
                        }
                        if (isset($general_column_settings['disable_hover_effect']) && $general_column_settings['disable_button_hover_effect'] == 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',1) !important';
                            $returnstring .="}";
                        }
                    }
                    if ($general_column_settings['arp_global_button_type'] == 'modern') {
                        if ($general_column_settings['disable_button_hover_effect'] != 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $color = $arprice_form->hex2rgb($columns['button_hover_background_color']);
                            $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                            $returnstring .="}";
                        }
                        if ($general_column_settings['disable_hover_effect'] == 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                            $returnstring .="}";
                        }
                        if (isset($general_column_settings['disable_hover_effect']) && $general_column_settings['disable_button_hover_effect'] == 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',1) !important';
                            $returnstring .="}";
                        }
                    }
                    if ($general_column_settings['arp_global_button_type'] == 'flat') {
                        if ($general_column_settings['disable_button_hover_effect'] != 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $color = $arprice_form->hex2rgb($columns['button_hover_background_color']);
                            $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                            $returnstring .="}";
                        }
                        if ($general_column_settings['disable_hover_effect'] == 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                            $returnstring .="}";
                        }
                        if (isset($general_column_settings['disable_hover_effect']) && $general_column_settings['disable_button_hover_effect'] == 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',1) !important';
                            $returnstring .="}";
                        }
                    }
                    if ($general_column_settings['arp_global_button_type'] == 'shadow') {
                        if ($general_column_settings['disable_button_hover_effect'] != 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $color = $arprice_form->hex2rgb($columns['button_hover_background_color']);
                            $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                            $returnstring .="}";
                        }
                        if ($general_column_settings['disable_hover_effect'] == 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.75) !important';
                            $returnstring .="}";
                        }
                        if (isset($general_column_settings['disable_hover_effect']) && $general_column_settings['disable_button_hover_effect'] == 1) {
                            $returnstring .= " .arp_price_table_" . $table_id . ":not(.arp_admin_template_editor) #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_animation.style_" . $c . ":hover .bestPlanButton." . $arp_button_type[$general_column_settings['arp_global_button_type']]['class'] . ":hover{";
                            $color = $arprice_form->hex2rgb($columns['button_background_color']);
                            $returnstring .= 'background-color:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',1) !important';
                            $returnstring .="}";
                        }
                    }
                }
            }
        }
        /* button new style */

        $tooltip_style = $general_option['tooltip_settings']['style'];
        $returnstring .= " .arp_tooltip_" . $table_id . " {
			color: " . $tooltip_text_color . " !important;";
        if ($tooltip_style == 'glass') {
            $color = $arprice_form->hex2rgb($tooltip_bg_color);
            $returnstring .= 'background:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.7)';
        } else if ($tooltip_style == 'alert') {
            $color = $arprice_form->hex2rgb($tooltip_bg_color);
            $returnstring .= 'background:rgba(' . $color['red'] . ',' . $color['green'] . ',' . $color['blue'] . ',0.9)';
        } else {
            $returnstring .= "background: " . $tooltip_bg_color . " !important;";
        }
        $returnstring .= "}";

        $returnstring .= " .arp_tooltip_" . $table_id . " .tipso_content {
			font-family: " . stripslashes($tooltip_font_family) . ";
			font-size: " . $tooltip_font_size . "px;
                        text-decoration: " . $tooltip_font_style_decoration . ";
                        font-style: " . $tooltip_font_style_italic . ";
			font-weight: " . $tooltip_font_style_bold . ";";

        $returnstring .= "}";

        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper{
                    margin-right:" . ($column_space / 2 ) . "px;
                    margin-left:" . ($column_space / 2) . "px;
                }";
        //}
        //for responsive
        $returnstring .= " .ArpPriceTable.arp_price_table_" . $table_id . ".arptemplate_1 .maincaptioncolumn .arpcaptiontitle {
    		color: #E3E3E3;
		}";
        $returnstring .= " .ArpPriceTable.arp_price_table_" . $table_id . ".arptemplate_4 .maincaptioncolumn .arpcaptiontitle {
    		color: #000000;
		}";
        $returnstring .= " .ArpPriceTable.arp_price_table_" . $table_id . ".arptemplate_4 .maincaptioncolumn .arpcaptiontitle {
    		font-family:'opensans-regular-webfont',Arial, Helvetica, sans-serif;
            font-size:32px;
		}";


//        if ($front_preview && $front_preview == 1 || $front_preview == 2) {

        global $arp_pricingtable, $arp_templatehoverclassarr, $arprice_default_settings;
        $arp_templatehoverclassarr = $arprice_default_settings->arp_template_hover_class_array();

        $exclude_caption = $arprice_default_settings->arp_exclude_caption_column_for_color_skin();
        $is_exclude_caption = $exclude_caption[$reference_template];

        // For  opacity
        $returnstring .= " .arp_price_table_" . $table_id . " #ArpPricingTableColumns .ArpPricingTableColumnWrapper:not(.no_transition){
				opacity: " . $column_opacity . ";
			}";

        $caption_column_odd_color = isset($opts['columns']['column_0']['content_odd_color']) ? $opts['columns']['column_0']['content_odd_color'] : '';
        $caption_column_even_color = isset($opts['columns']['column_0']['content_even_color']) ? $opts['columns']['column_0']['content_even_color'] : '';

        $content_odd_color = isset($columns['content_odd_color']) ? $columns['content_odd_color'] : '';
        $content_even_color = isset($columns['content_even_color']) ? $columns['content_even_color'] : '';

        if (!empty($arp_templatehoverclassarr[$reference_template])) {

            $common_skin = (isset($arp_templatehoverclassarr[$reference_template]['arp_common_hover_css'])) ? $arp_templatehoverclassarr[$reference_template]['arp_common_hover_css'] : '';
            $color_skins = (isset($arp_templatehoverclassarr[$reference_template]['arp_skin_hover_css'])) ? $arp_templatehoverclassarr[$reference_template]['arp_skin_hover_css'] : '';
            $columns = $opts['columns'];
            $element_hover = "";
            $parent_hover = "";
            $g = 1;
            $grc = 1;
            $skinarr = array();
            $cap_cols = array();
            $start = 0;


            foreach ($columns as $c => $column) {

                if ($column['is_caption'] == 1) {

                    $str = '';
                    if (isset($column['rows'])) {
                        foreach ($column['rows'] as $key => $rows) {

                            if (isset($rows['row_hover_custom_css']) && $rows['row_hover_custom_css'] != '') {
                                $str .= ".arptemplate_$table_id .ArpPricingTableColumnWrapper.no_animation.arp_style_$start:not(.no_transition):not(.arp_disable_hover):hover li#arp_$c" . "_" . "$key{"; {

                                    $row_inline_script_old = trim($rows['row_hover_custom_css']);
                                    $row_inline_script_old = str_replace("/\r|\n/", "", $row_inline_script_old);
                                    $row_inline_script_old = explode(';', $row_inline_script_old);
                                    $row_inline_script = '';
                                    if (!empty($row_inline_script_old)) {
                                        foreach ($row_inline_script_old as $new_css) {
                                            if ($new_css != '') {
                                                $new_css = explode(':', $new_css);
                                                $row_inline_script .= trim($new_css[0]) . ' : ' . trim(str_replace("!important", "", $new_css[1])) . ' !important;';
                                            }
                                        }
                                    }
                                    $str .= $row_inline_script;
                                }
                                $str .= '}';
                            }
                        }
                    }
                    $skinarr[] = $str;
                    $start++;
                } else {


                    $g = ($general_option['template_setting']['skin'] == 'custom_skin') ? 0 : 1;

                    $caption_column_odd_color = isset($opts['columns']['column_0']['content_odd_color']) ? $opts['columns']['column_0']['content_odd_color'] : '';
                    $caption_column_even_color = isset($opts['columns']['column_0']['content_even_color']) ? $opts['columns']['column_0']['content_even_color'] : '';

                    $content_odd_color = isset($column['content_odd_color']) ? $column['content_odd_color'] : '';
                    $content_even_color = isset($column['content_even_color']) ? $column['content_even_color'] : "";

                    if (!empty($common_skin)) {
                        foreach ($common_skin as $class_key => $cskin) {
                            $str = '';

                            $class_key = explode('_^_', $class_key);
                            $class_name = $class_key[0];
                            $class_name = str_replace("[ARP_SPACE]", " ", $class_name);

                            $hover = $class_key[1];

                            if ($hover == 0) {
                                $element_hover = ":hover";
                                $parent_hover = "";
                            } else {
                                $element_hover = "";
                                $parent_hover = ":hover";
                            }

                            $str .= ".arptemplate_$table_id .ArpPricingTableColumnWrapper.no_animation.arp_style_$start:not(.no_transition):not(.maincaptioncolumn):not(.arp_disable_hover)$parent_hover $class_name";
                            $str .= $element_hover;
                            $str .= ",.arptemplate_$table_id .ArpPricingTableColumnWrapper.no_animation.arp_style_$start:not(.no_transition):not(.maincaptioncolumn):not(.arp_disable_hover).column_highlight $class_name$element_hover";
                            $str .="{";


                            foreach ($cskin as $property => $values) {
                                $values = explode('<==>', $values);
                                $values_ = isset($values[0]) ? $values[0] : '';
                                $parameter = isset($values[1]) ? $values[1] : '';
                                $points = isset($values[2]) ? $values[2] : '';
                                if (preg_match('/____/', $values_)) {
                                    $values_ = explode('____', $values_);
                                } else {
                                    $value = $values_;
                                }
                                /* if custom skin */
//                                if ($g == 0) {
                                $value = ( is_array($values_) and count($values_) > 1 ) ? $values_[1] : $values_;

                                $arp_button_bg_hover_color = isset($column['button_hover_background_color']) ? $column['button_hover_background_color'] : $general_option['custom_skin_colors']['arp_button_bg_hover_color'];
                                $arp_button_hover_font_color = isset($column['button_hover_font_color']) ? $column['button_hover_font_color'] : '';

                                $arp_column_bg_hover_color = isset($column['column_hover_background_color']) ? $column['column_hover_background_color'] : $general_option['custom_skin_colors']['arp_column_bg_hover_color'];


                                if (isset($general_option['custom_skin_colors']['arp_footer_content_bg_color']) and ! empty($general_option['custom_skin_colors']['arp_footer_content_bg_color']) && $template_color_skin == 'custom_skin') {
                                    $arp_footer_bg_hover_color = $general_option['custom_skin_colors']['arp_footer_content_bg_color'];
                                } else {
                                    $arp_footer_bg_hover_color = @$column['footer_background_color'];
                                }


                                if (isset($general_option['custom_skin_colors']['arp_header_bg_custom_color']) and ! empty($general_option['custom_skin_colors']['arp_header_bg_custom_color']) && $template_color_skin == 'custom_skin') {
                                    $arp_header_bg_hover_color = $general_option['custom_skin_colors']['arp_header_bg_custom_color'];
                                } else {
                                    $arp_header_bg_hover_color = isset($column['header_hover_background_color']) ? $column['header_hover_background_color'] : $general_option['custom_skin_colors']['arp_header_bg_custom_color'];
                                }

                                $arp_header_bg_hover_custom_color = isset($column['header_hover_background_color']) ? $column['header_hover_background_color'] : $general_option['custom_skin_colors']['arp_header_bg_hover_color'];

                                $arp_header_hover_font_color = isset($column['header_hover_font_color']) ? $column['header_hover_font_color'] : '';
                                $arp_price_bg_hover_custom_color = isset($column['price_hover_background_color']) ? $column['price_hover_background_color'] : $general_option['custom_skin_colors']['arp_price_bg_hover_color'];

                                $arp_odd_row_hover_background_color = isset($column['content_odd_hover_color']) ? $column['content_odd_hover_color'] : $general_option['custom_skin_colors']['arp_body_odd_row_hover_bg_custom_color'];

                                $arp_even_row_hover_background_color = isset($column['content_even_hover_color']) ? $column['content_even_hover_color'] : $general_option['custom_skin_colors']['arp_body_even_row_hover_bg_custom_color'];

                                $arp_content_hover_font_color = isset($column['content_hover_font_color']) ? $column['content_hover_font_color'] : '';
                                $arp_content_even_hover_font_color = isset($column['content_even_hover_font_color']) ? $column['content_even_hover_font_color'] : '';
                                $arp_content_label_hover_font_color = isset($column['content_label_hover_font_color']) ? $column['content_label_hover_font_color'] : '';

                                $arp_footer_content_hover_bg_color = isset($column['footer_hover_background_color']) ? $column['footer_hover_background_color'] : $general_option['custom_skin_colors']['arp_footer_content_hover_bg_color'];
                                $arp_footer_hover_font_color = isset($column['footer_level_options_hover_font_color']) ? $column['footer_level_options_hover_font_color'] : '';

                                $arp_desc_hover_background_color = isset($column['column_desc_hover_background_color']) ? $column['column_desc_hover_background_color'] : $general_option['custom_skin_colors']['arp_column_desc_hover_bg_custom_color'];
                                $arp_desc_hover_font_color = isset($column['column_description_hover_font_color']) ? $column['column_description_hover_font_color'] : '';

                                $arp_price_backgroud_color = isset($column['price_background_color']) ? $column['price_background_color'] : '';
                                $arp_price_hover_font_color = isset($column['price_hover_font_color']) ? $column['price_hover_font_color'] : '';
                                $arp_price_label_hover_font_color = isset($column['price_text_hover_font_color']) ? $column['price_text_hover_font_color'] : '';

                                $arp_shortoce_hover_font_color = isset($column['shortcode_hover_font_color']) ? $column['shortcode_hover_font_color'] : '';
                                $arp_shortoce_hover_background_color = isset($column['shortcode_hover_background_color']) ? $column['shortcode_hover_background_color'] : '';

                                $value = str_replace('{arp_price_background_color}', $arp_price_backgroud_color, $value);
                                $value = str_replace('{arp_price_hover_font_color}', $arp_price_hover_font_color, $value);
                                $value = str_replace('{arp_price_label_hover_font_color}', $arp_price_label_hover_font_color, $value);
                                $value = str_replace('{arp_button_background_color}', $arp_button_bg_hover_color, $value);
                                $value = str_replace('{arp_button_hover_font_color}', $arp_button_hover_font_color, $value);
                                $value = str_replace('{arp_column_hover_background_color}', $arp_column_bg_hover_color, $value);
                                $value = str_replace('{arp_footer_column_background_color}', $arp_column_bg_hover_color, $value);
                                $value = str_replace('{arp_header_background_color}', @$column['header_background_color'], $value);

                                $value = str_replace('{arp_header_hover_font_color}', $arp_header_hover_font_color, $value);
                                if (preg_match('/{arp_column_hover_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $value)) {
                                    $column_color = $this->hex2rgb($arp_column_bg_hover_color);

                                    $new_val = explode('^_^', $value);

                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace(')', '', $opacity);
                                    $opacity = str_replace('}', '', $opacity);
                                    $new_color = 'rgba(' . $column_color["red"] . ',' . $column_color["green"] . ',' . $column_color["blue"] . ',' . $opacity . ')';

                                    $value = preg_replace('/{arp_column_hover_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $new_color, $value);
                                }
                                $value = str_replace('[ARP_SPACE]', ' ', $value);

                                $value = str_replace('{arp_column_background_color}', @$column['column_background_color'], $value);
                                $value = str_replace('{arp_header_bg_custom_hover_color}', $arp_header_bg_hover_custom_color, $value);
                                if (preg_match('/{arp_header_background_custom_hover_input_rgba\^\_\^\((\d(\.\d))\)}/', $value)) {
                                    $header_color_rgb = $this->hex2rgb($arp_header_bg_hover_custom_color);

                                    $new_val = explode('^_^', $value);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace(')', '', $opacity);
                                    $opacity = str_replace('}', '', $opacity);
                                    $new_color = 'rgba(' . $header_color_rgb["red"] . ',' . $header_color_rgb["green"] . ',' . $header_color_rgb["blue"] . ',' . $opacity . ')';

                                    $value = preg_replace('/{arp_header_background_custom_hover_input_rgba\^\_\^\((\d(\.\d))\)}/', $new_color, $value);
                                }
                                if ($reference_template != 'arptemplate_4') {
                                    $value = str_replace('{arp_price_hover_background_color}', $arp_price_bg_hover_custom_color, $value);
                                }
                                $value = str_replace('{arp_even_row_hover_background_color}', $arp_even_row_hover_background_color, $value);

                                if (preg_match('/{arp_body_even_row_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $value)) {
                                    $even_color_rgb = $this->hex2rgb($arp_even_row_hover_background_color);

                                    $new_val = explode('^_^', $value);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace(')', '', $opacity);
                                    $opacity = str_replace('}', '', $opacity);
                                    $new_color = 'rgba(' . $even_color_rgb["red"] . ',' . $even_color_rgb["green"] . ',' . $even_color_rgb["blue"] . ',' . $opacity . ')';

                                    $value = preg_replace('/{arp_body_even_row_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $new_color, $value);
                                }

                                $value = str_replace('{arp_odd_row_hover_background_color}', $arp_odd_row_hover_background_color, $value);
                                if (preg_match('/{arp_body_odd_row_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $value)) {
                                    $odd_color_rgb = $this->hex2rgb($arp_odd_row_hover_background_color);
                                    $new_val = explode('^_^', $value);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace(')', '', $opacity);
                                    $opacity = str_replace('}', '', $opacity);
                                    $new_color = 'rgba(' . $odd_color_rgb["red"] . ',' . $odd_color_rgb["green"] . ',' . $odd_color_rgb["blue"] . ',' . $opacity . ')';

                                    $value = preg_replace('/{arp_body_odd_row_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $new_color, $value);
                                }
                                $value = str_replace('{arp_content_hover_font_color}', $arp_content_hover_font_color, $value);
                                $value = str_replace('{arp_content_even_hover_font_color}', $arp_content_even_hover_font_color, $value);
                                $value = str_replace('{arp_content_label_hover_font_color}', $arp_content_label_hover_font_color, $value);
                                $value = str_replace('{arp_footer_bg_custom_hover_color}', $arp_footer_content_hover_bg_color, $value);
                                $value = str_replace('{arp_footer_font_hover_color}', $arp_footer_hover_font_color, $value);

                                $value = str_replace('{arp_desc_hover_background_color}', $arp_desc_hover_background_color, $value);

                                if (preg_match('/{arp_desc_hover_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $value)) {
                                    $desc_color_rgb = $this->hex2rgb($arp_desc_hover_background_color);

                                    $new_val = explode('^_^', $value);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace('(', '', $new_val[1]);
                                    $opacity = str_replace(')', '', $opacity);
                                    $opacity = str_replace('}', '', $opacity);
                                    $new_color = 'rgba(' . $desc_color_rgb["red"] . ',' . $desc_color_rgb["green"] . ',' . $desc_color_rgb["blue"] . ',' . $opacity . ')';

                                    $value = preg_replace('/{arp_desc_hover_background_color_rgba\^\_\^\((\d(\.\d))\)}/', $new_color, $value);
                                }

                                $value = str_replace('{arp_description_hover_font_color}', $arp_desc_hover_font_color, $value);

                                if ($class_name == '.rounded_corder') {

                                    $shortcode_array = $arprice_default_settings->arp_shortcode_custom_type();
                                    if (@$shortcode_array[@$column['arp_shortcode_customization_style']]['type'] == 'solid') {

                                        $value = str_replace('{arp_shortcode_background_color}', $arp_shortoce_hover_background_color, $value);
                                        if ($reference_template == 'arptemplate_4') {
                                            $value = str_replace('{arp_price_hover_background_color}', $arp_price_bg_hover_custom_color, $value);
                                        }
                                    } else {
                                        $value = str_replace('{arp_shortcode_background_color}', 'none', $value);
                                        if ($reference_template == 'arptemplate_4') {
                                            $value = str_replace('{arp_price_hover_background_color}', 'none', $value);
                                        }
                                    }
                                    $value = str_replace('{arp_shortcode_border_color}', $arp_shortoce_hover_background_color, $value);
                                    if ($reference_template == 'arptemplate_4') {
                                        $value = str_replace('{arp_border_hover_color}', $arp_price_bg_hover_custom_color, $value);
                                    }
                                }
                                $value = str_replace('{arp_shortcode_font_color}', $arp_shortoce_hover_font_color, $value);
                                if ($points > 0) {

                                    if ($parameter == "n") {
                                        $points = "-" . $points;
                                    } else {
                                        $points = $points;
                                    }

                                    $value = $this->arp_generate_color_tone($value, $points);
                                }

                                if (isset($column['column_background_image']) && $column['column_background_image'] != '' && $class_name == '.arp_column_content_wrapper') {
                                    
                                } else {
                                    $str .= $property . ':' . $value . ' !important;';
                                }
                            }
                            $str .= "}";

                            $skinarr[] = $str;
                        }
                        $str = '';
                        if (isset($column['rows'])) {
                            foreach ($column['rows'] as $key => $rows) {
                                if (isset($rows['row_hover_custom_css']) && $rows['row_hover_custom_css'] != '') {
                                    $str .= ".arptemplate_$table_id .ArpPricingTableColumnWrapper.no_animation.arp_style_$start:not(.no_transition):not(.arp_disable_hover):hover li#arp_$c" . "_" . "$key{"; {
                                        $row_inline_script_old = trim($rows['row_hover_custom_css']);
                                        $row_inline_script_old = str_replace("/\r|\n/", "", $row_inline_script_old);
                                        $row_inline_script_old = explode(';', $row_inline_script_old);
                                        $row_inline_script = '';
                                        if (!empty($row_inline_script_old)) {
                                            foreach ($row_inline_script_old as $new_css) {
                                                if ($new_css != '') {

                                                    $new_css = explode(':', $new_css);

                                                    if (isset($new_css[0]) && isset($new_css[1]))
                                                        $row_inline_script .= trim(@$new_css[0]) . ' : ' . trim(str_replace("!important", "", @$new_css[1])) . ' !important;';

                                                }
                                            }
                                        }
                                        $str .= $row_inline_script;
                                    }
                                    $str .= '}';
                                }
                            }
                        }
                        $skinarr[] = $str;
                    }

                    $start++;
                }
            }
        }

        if (is_array($skinarr) && !empty($skinarr)) {
            foreach ($skinarr as $css) {
                $returnstring .= $css;
            }
        }

        if ($is_animated) {
            $returnstring .= "
				.arptemplate_" . $table_id . ".ArpPriceTable .ArpPricingTableColumnWrapper.shadow_effect.no_animation:hover,
				.arptemplate_" . $table_id . ".ArpPriceTable .ArpPricingTableColumnWrapper.shadow_effect.no_animation.column_highlight{
					-webkit-transition:all .5s;
					   -moz-transition:all .5s;
						 -o-transition:all .5s;
							transition:all .5s;
					-webkit-box-shadow:0 0 30px rgba(0,0,0,0.3);
					   -moz-box-shadow:0 0 30px rgba(0,0,0,0.3);
						 -o-box-shadow:0 0 30px rgba(0,0,0,0.3);
							box-shadow:0 0 30px rgba(0,0,0,0.3);
							position:relative !important;
							z-index:1;
							-webkit-transition:all .5s;
					   -moz-transition:all .5s;
						 -o-transition:all .5s;
							transition:all .5s;
					-webkit-box-shadow:0 0 30px rgba(0,0,0,0.3);
					   -moz-box-shadow:0 0 30px rgba(0,0,0,0.3);
						 -o-box-shadow:0 0 30px rgba(0,0,0,0.3);
							box-shadow:0 0 30px rgba(0,0,0,0.3);
							position:relative !important;ex:1;
				}";
        } else {

            $zindex = ($reference_template == 'arptemplate_22') ? '' : 'z-index:1;';
            $returnstring .= "
				.arptemplate_" . $table_id . ".ArpPriceTable .ArpPricingTableColumnWrapper.shadow_effect.no_animation:not(.maincaptioncolumn):hover .arp_column_content_wrapper,
				.arptemplate_" . $table_id . ".ArpPriceTable .ArpPricingTableColumnWrapper.shadow_effect.no_animation:not(.maincaptioncolumn).column_highlight .arp_column_content_wrapper{
					-webkit-transition:all .5s;
					   -moz-transition:all .5s;
						 -o-transition:all .5s;
							transition:all .5s;
					-webkit-box-shadow:0 0 30px rgba(0,0,0,0.3);
					   -moz-box-shadow:0 0 30px rgba(0,0,0,0.3);
						 -o-box-shadow:0 0 30px rgba(0,0,0,0.3);
							box-shadow:0 0 30px rgba(0,0,0,0.3);
							position:relative !important;
							$zindex
				}";
        }
//	}

        if ($general_settings['enable_toggle_price'] == 1) {

            if ($general_settings['arp_step_main'] == 2) {
                $returnstring .= " .arp_price_table_$table_id .maincaptioncolumn .column_tabs li,";
                $returnstring .= " .arp_price_table_$table_id .column_tabs li {";
                $returnstring .= "width:48%;";
                $returnstring .= "}";
            }

            if ($general_settings['arp_step_main'] == 3) {
                $returnstring .= " .arp_price_table_$table_id .maincaptioncolumn .column_tabs li,";
                $returnstring .= " .arp_price_table_$table_id .column_tabs li {";
                $returnstring .= "width:31%;";
                $returnstring .= "}";
            }

            $returnstring .= " .arp_price_table_$table_id .switch-candy {";
            $returnstring .= "background-color:{$general_settings['toggle_inactive_color']};";
            $returnstring .= "}";

            $returnstring .= " .arp_price_table_$table_id .switch-candy.switch-candy-blue a{";
            $returnstring .= "background-color:{$general_settings['toggle_active_color']};";
            $returnstring .= "color:{$general_settings['toggle_active_text_color']};";
            $returnstring .= "}";

            if ($general_settings['arp_label_position_main'] == 0) {
                $returnstring .= " .arp_price_table_$table_id .toggle_button_title {";
                $returnstring .= "float:left;margin-right: 10px;";
                $returnstring .= "}";
            } else if ($general_settings['arp_label_position_main'] == 1) {
                $returnstring .= " .arp_price_table_$table_id .toggle_button_title {";
                $returnstring .= "text-align:center;";
                $returnstring .= "}";
            } else if ($general_settings['arp_label_position_main'] == 2) {
                $returnstring .= " .arp_price_table_$table_id .toggle_button_title {";
                $returnstring .= "float:right;margin-left: 10px;";
                $returnstring .= "}";
            }

            if ($general_settings['arp_label_position_main'] == 0) {
                if ($general_settings['arp_toggle_main'] == 1) {
                    $returnstring .= " .arp_price_table_$table_id .simple-toggle-radio {";
                    $returnstring .= "margin: 0;text-align:left;";
                    $returnstring .= "}";
                } else {
                    $returnstring .= " .arp_price_table_$table_id .switch-candy-blue {";
                    $returnstring .= "margin: 0;float: none;";
                    $returnstring .= "}";
                }
            } else if ($general_settings['arp_label_position_main'] == 1) {
                if ($general_settings['arp_toggle_main'] == 1) {
                    $returnstring .= " .arp_price_table_$table_id .simple-toggle-radio {";
                    $returnstring .= "margin: auto;text-align:center;";
                    $returnstring .= "}";
                } else {
                    $returnstring .= " .arp_price_table_$table_id .switch-candy-blue {";
                    $returnstring .= "margin: auto;float: none;";
                    $returnstring .= "}";
                }
            } else if ($general_settings['arp_label_position_main'] == 2) {
                if ($general_settings['arp_toggle_main'] == 1) {
                    $returnstring .= " .arp_price_table_$table_id .simple-toggle-radio {";
                    $returnstring .= "margin: 0;text-align:right;";
                    $returnstring .= "}";
                } else {
                    $returnstring .= " .arp_price_table_$table_id .switch-candy-blue {";
                    $returnstring .= "margin: 0;float: right;";
                    $returnstring .= "}";
                }
            }

            $returnstring .= ".arp_price_table_$table_id .toggle_button_title {";

            $returnstring .= 'color: ' . $general_settings['toggle_title_font_color'] . ';';
            $returnstring .= 'font-family: ' . $general_settings['toggle_title_font_family'] . ';';
            $returnstring .= 'font-size:' . $general_settings['toggle_title_font_size'] . 'px;';
            if ($general_settings['toggle_title_font_style_bold'] == 'bold') {
                $returnstring .= 'font-weight: bold;';
            }
            if ($general_settings['toggle_title_font_style_italic'] == 'italic') {
                $returnstring .= 'font-style: italic;';
            }
            if ($general_settings['toggle_title_font_style_decoration'] == 'underline') {
                $returnstring .= 'text-decoration: underline;';
            } else if ($general_settings['toggle_title_font_style_decoration'] == 'line-through') {
                $returnstring .= 'text-decoration: line-through;';
            }

            $returnstring .= '}';

            $returnstring .= ".arp_price_table_$table_id #toggle_switch_2 label, .arp_price_table_$table_id #toggle_switch_3 label{";

            $returnstring .= 'color: ' . $general_settings['toggle_button_font_color'] . ';';
            $returnstring .= 'font-family: ' . $general_settings['toggle_button_font_family'] . ';';
            $returnstring .= 'font-size:' . $general_settings['toggle_button_font_size'] . 'px;';
            if ($general_settings['toggle_button_font_style_bold'] == 'bold') {
                $returnstring .= 'font-weight: bold;';
            }
            if ($general_settings['toggle_button_font_style_italic'] == 'italic') {
                $returnstring .= 'font-style: italic;';
            }
            if ($general_settings['toggle_button_font_style_decoration'] == 'underline') {
                $returnstring .= 'text-decoration: underline;';
            } else if ($general_settings['toggle_button_font_style_decoration'] == 'line-through') {
                $returnstring .= 'text-decoration: line-through;';
            }

            $returnstring .= '}';
        }

        /* Column Desktop View Changes */
        $tablet_responsive_size = get_option('arp_tablet_responsive_size');
        $tablet_responsive_size += 1;

        $returnstring .= "@media ( min-width:" . $tablet_responsive_size . "px){";
        $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper{";
        $returnstring .= "width:" . $general_column_settings['all_column_width'] . "px;";
        $returnstring .= "}";
        $returnstring .= "}";

        $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper{";
        $returnstring .= "width:" . $general_column_settings['all_column_width'] . "px;";
        $returnstring .= "}";

        $mobile_responsive_size = get_option('arp_mobile_responsive_size');
        $display_mobile_col = $general_column_settings['display_col_mobile'];

        if ($display_mobile_col == 1 && $general_column_settings['is_responsive'] === '1') {
            $returnstring .= "@media (max-width:" . $mobile_responsive_size . "px){";
            $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper{";
            $returnstring .= "width:100% !important;";
            $returnstring .= "}";
            $returnstring .= "}";
        }

        if ($reference_template == 'arptemplate_7' || $reference_template == 'arptemplate_5') {
            $returnstring .= "@media ( max-width:" . $mobile_responsive_size . "px){";
            $returnstring .= ".arptemplate_" . $table_id . " .arp_header_shortcode img,";
            $returnstring .= ".arptemplate_" . $table_id . " .arp_header_shortcode iframe{";
            $returnstring .= "width:100% !important;";
            $returnstring .= "}";
            $returnstring .= "}";
        }

        if ($general_column_settings['hide_footer_global'] == 1) {
            $bottom_border_ary = $arprice_default_settings->arp_border_bottom();
            $btm_brd_tmp_ary = isset($bottom_border_ary[$reference_template]) ? $bottom_border_ary[$reference_template] : '';
            $caption_brd_btm = isset($btm_brd_tmp_ary['caption_column']) ? $btm_brd_tmp_ary['caption_column'] : '';
            $others_brd_btm = isset($btm_brd_tmp_ary['other_column']) ? $btm_brd_tmp_ary['other_column'] : '';

            if (is_array($caption_brd_btm) && !empty($caption_brd_btm)) {
                foreach ($caption_brd_btm as $class => $value) {

                    $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper.maincaptioncolumn " . $class . "{";
                    $returnstring .= "border-bottom:" . $value . " !important;";
                    $returnstring .= "}";
                }
            }

            if (is_array($others_brd_btm) && !empty($others_brd_btm)) {
                foreach ($others_brd_btm as $class => $value) {
                    $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) " . $class . "{";
                    $returnstring .= "border-bottom:" . $value . " !important";
                    $returnstring .= "}";
                }
            }
        }

        $hide_section_min_height_array = $arprice_default_settings->arprice_min_height_with_section_hide();
        $hide_section_min_height_array = isset($hide_section_min_height_array[$reference_template]) ? $hide_section_min_height_array[$reference_template] : array();

        if (isset($hide_section_min_height_array)) {
            /* header section */
            if (isset($general_column_settings['hide_header_global']) && $general_column_settings['hide_header_global'] == '1') {
                if (isset($hide_section_min_height_array['arp_header']) && is_array($hide_section_min_height_array['arp_header'])) {
                    foreach ($hide_section_min_height_array['arp_header'] as $hide_class) {

                        if ($hide_class != '') {
                            $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . "{";
                            $returnstring .= "min-height:0px !important;";
                            $returnstring .= "}";
                        }
                    }
                } else {
                    if (isset($hide_section_min_height_array['arp_header']) && $hide_section_min_height_array['arp_header'] != '') {
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_header'] . "{";
                        $returnstring .= "min-height:0px !important;";
                        $returnstring .= "}";
                    }
                }

                $arp_hide_header_column_border_top = $arprice_default_settings->arp_hide_header_column_border_top();
                $arp_hide_header_column_border_top = isset($arp_hide_header_column_border_top[$reference_template]) ? $arp_hide_header_column_border_top[$reference_template] : array();

                if (isset($arp_hide_header_column_border_top)) {
                    foreach ($arp_hide_header_column_border_top as $class => $css_value) {
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $class . "{";
                        foreach ($css_value as $properties => $properties_value) {
                            $returnstring .= $properties . ':' . $properties_value . ';';
                        }
                        $returnstring .= "}";
                    }
                }
            }
            /* header section */
            /* header shortcode section */
            if (isset($general_column_settings['hide_header_shortcode_global']) && $general_column_settings['hide_header_shortcode_global'] == '1') {

                if (isset($hide_section_min_height_array['arp_header_shortcode']) && is_array($hide_section_min_height_array['arp_header_shortcode'])) {

                    foreach ($hide_section_min_height_array['arp_header_shortcode'] as $hide_class) {
                        if ($hide_class != '') {
                            $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . "{";
                            $returnstring .= "min-height:0px !important;";
                            $returnstring .= "}";
                        }
                    }
                } else {
                    if (isset($hide_section_min_height_array['arp_header_shortcode']) && $hide_section_min_height_array['arp_header_shortcode'] != '') {
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_header_shortcode'] . "{";
                        $returnstring .= "min-height:0px !important;";
                        $returnstring .= "}";
                    }
                }
                if ($reference_template == 'arptemplate_7') {
                    $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) .arppricetablecolumntitle{";
                    $returnstring .= "margin-top:0px !important;";
                    $returnstring .= "}";
                }
            }
            /* header shortcode section */
            /* feature section */
            if (isset($general_column_settings['hide_feature_global']) && $general_column_settings['hide_feature_global'] == '1') {
                if (@is_array($hide_section_min_height_array['arp_feature'])) {

                    foreach ($hide_section_min_height_array['arp_feature'] as $hide_class) {
                        if ($hide_class != '') {
                            $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . "{";
                            $returnstring .= "min-height:0px !important;";
                            $returnstring .= "}";
                        }
                    }
                } else {
                    if (@$hide_section_min_height_array['arp_feature'] != '') {
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . @$hide_section_min_height_array['arp_feature'] . "{";
                        $returnstring .= "min-height:0px !important;";
                        $returnstring .= "}";
                    }
                }
            }
            /* feature section */
            /* price section */

            if (isset($general_column_settings['hide_price_global']) && $general_column_settings['hide_price_global'] == '1') {
                if (isset($hide_section_min_height_array['arp_price']) && is_array($hide_section_min_height_array['arp_price'])) {

                    foreach ($hide_section_min_height_array['arp_price'] as $hide_class) {

                        if ($hide_class != '') {
                            $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . "{";
                            $returnstring .= "min-height:0px !important;";
                            $returnstring .= "}";
                        }
                    }
                } else {
                    if (isset($hide_section_min_height_array['arp_price']) && $hide_section_min_height_array['arp_price'] != '') {
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_price'] . "{";
                        $returnstring .= "min-height:0px !important;";
                        $returnstring .= "}";
                    }
                }

                $arp_hide_price_css_fixes = $arprice_default_settings->arp_hide_price_css_fixes();
                $arp_hide_price_css_fixes = isset($arp_hide_price_css_fixes[$reference_template]) ? $arp_hide_price_css_fixes[$reference_template] : array();

                if (isset($arp_hide_price_css_fixes)) {
                    foreach ($arp_hide_price_css_fixes as $class => $css_value) {
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $class . "{";
                        foreach ($css_value as $properties => $properties_value) {
                            $returnstring .= $properties . ':' . $properties_value . ';';
                        }
                        $returnstring .= "}";
                    }
                }
            }
            /* price section */
            /* description section */
            if (isset($general_column_settings['hide_description_global']) && $general_column_settings['hide_description_global'] == '1') {
                if (isset($hide_section_min_height_array['arp_description'])) {
                    if (is_array($hide_section_min_height_array['arp_description'])) {

                        foreach ($hide_section_min_height_array['arp_description'] as $hide_class) {
                            if ($hide_class != '') {
                                $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . "{";
                                $returnstring .= "min-height:0px !important;";
                                $returnstring .= "}";
                            }
                        }
                    } else {
                        if (isset($hide_section_min_height_array['arp_description']) && $hide_section_min_height_array['arp_description'] != '') {

                            $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_description'] . "{";
                            $returnstring .= "min-height:0px !important;";
                            $returnstring .= "}";
                        }
                    }
                }
                $arp_hide_description_css_fixes = $arprice_default_settings->arp_hide_description_css_fixes();
                $arp_hide_description_css_fixes = isset($arp_hide_description_css_fixes[$reference_template]) ? ($arp_hide_description_css_fixes[$reference_template]) : '';

                if (isset($arp_hide_description_css_fixes) && !empty($arp_hide_description_css_fixes)) {
                    foreach ($arp_hide_description_css_fixes as $class => $css_value) {
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $class . "{";
                        foreach ($css_value as $properties => $properties_value) {
                            $returnstring .= $properties . ':' . $properties_value . ';';
                        }
                        $returnstring .= "}";
                    }
                }
            }
            /* description section */
            /* footer section */
            if (isset($general_column_settings['hide_footer_global']) && $general_column_settings['hide_footer_global'] == '1') {
                if (@is_array($hide_section_min_height_array['arp_footer'])) {

                    foreach ($hide_section_min_height_array['arp_footer'] as $hide_class) {
                        if ($hide_class != '') {
                            $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_class . "{";
                            $returnstring .= "min-height:0px !important;";
                            $returnstring .= "}";
                        }
                    }
                } else {
                    if (@$hide_section_min_height_array['arp_footer'] != '') {
                        $returnstring .= ".arptemplate_" . $table_id . ":not(.arp_admin_template_editor) " . $hide_section_min_height_array['arp_footer'] . "{";
                        $returnstring .= "min-height:0px !important;";
                        $returnstring .= "}";
                    }
                }
            }
            /* footer section */
        }

        if (isset($arp_mainoptionsarr['general_options']['template_options']['features'][$reference_template]['button_border_customization']) && $arp_mainoptionsarr['general_options']['template_options']['features'][$reference_template]['button_border_customization'] == 1) {
            if (isset($general_column_settings['global_button_border_color']) && $general_column_settings['global_button_border_color'] != '') {
                $general_column_settings['global_button_border_color'] = $general_column_settings['global_button_border_color'];
            } else {
                $general_column_settings['global_button_border_color'] = '#c9c9c9';
            }

            if (isset($general_column_settings['global_button_border_width']) && $general_column_settings['global_button_border_width'] != '') {
                $general_column_settings['global_button_border_width'] = $general_column_settings['global_button_border_width'];
            } else {
                $general_column_settings['global_button_border_width'] = 0;
            }

            if (isset($general_column_settings['global_button_border_type']) && $general_column_settings['global_button_border_type'] != '') {
                $general_column_settings['global_button_border_type'] = $general_column_settings['global_button_border_type'];
            } else {
                $general_column_settings['global_button_border_type'] = 'solid';
            }

            if (isset($general_column_settings['global_button_border_radius_top_left']) && $general_column_settings['global_button_border_radius_top_left'] != '') {
                $general_column_settings['global_button_border_radius_top_left'] = $general_column_settings['global_button_border_radius_top_left'];
            } else {
                $general_column_settings['global_button_border_radius_top_left'] = 0;
            }

            if (isset($general_column_settings['global_button_border_radius_top_right']) && $general_column_settings['global_button_border_radius_top_right'] != '') {
                $general_column_settings['global_button_border_radius_top_right'] = $general_column_settings['global_button_border_radius_top_right'];
            } else {
                $general_column_settings['global_button_border_radius_top_right'] = 0;
            }
            if (isset($general_column_settings['global_button_border_radius_bottom_left']) && $general_column_settings['global_button_border_radius_bottom_left'] != '') {
                $general_column_settings['global_button_border_radius_bottom_left'] = $general_column_settings['global_button_border_radius_bottom_left'];
            } else {
                $general_column_settings['global_button_border_radius_bottom_left'] = 0;
            }

            if (isset($general_column_settings['global_button_border_radius_bottom_right']) && $general_column_settings['global_button_border_radius_bottom_right'] != '') {
                $general_column_settings['global_button_border_radius_bottom_right'] = $general_column_settings['global_button_border_radius_bottom_right'];
            } else {
                $general_column_settings['global_button_border_radius_bottom_right'] = '0';
            }


            $returnstring .= ".arptemplate_" . $table_id . " .bestPlanButton{";
            $returnstring .= 'border :' . $general_column_settings['global_button_border_width'] . 'px ' . $general_column_settings['global_button_border_type'] . ' ' . $general_column_settings['global_button_border_color'] . ';';
            $returnstring .= 'border-radius :' . $general_column_settings['global_button_border_radius_top_left'] . 'px ' . $general_column_settings['global_button_border_radius_top_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_left'] . 'px;';
            $returnstring .= '-webkit-border-radius :' . $general_column_settings['global_button_border_radius_top_left'] . 'px ' . $general_column_settings['global_button_border_radius_top_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_left'] . 'px;';
            $returnstring .= '-moz-border-radius :' . $general_column_settings['global_button_border_radius_top_left'] . 'px ' . $general_column_settings['global_button_border_radius_top_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_left'] . 'px;';
            $returnstring .= '-o-border-radius :' . $general_column_settings['global_button_border_radius_top_left'] . 'px ' . $general_column_settings['global_button_border_radius_top_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_right'] . 'px ' . $general_column_settings['global_button_border_radius_bottom_left'] . 'px;';
            $returnstring .= "}";
        }

        if ($reference_template == 'arptemplate_20' || $reference_template == "arptemplate_7" || $reference_template == 'arptemplate_24') {
            $tol_bottom_border_style = " border-top-style:";
            $tol_bottom_border_width = " border-top-width:";
            $tol_bottom_border_color = " border-top-color:";
        } else {
            $tol_bottom_border_style = " border-bottom-style:";
            $tol_bottom_border_width = " border-bottom-width:";
            $tol_bottom_border_color = " border-bottom-color:";
        }

        $arp_row_level_border_fixer = $arprice_default_settings->arp_row_level_border();
        $arp_row_level_border_fixer = isset($arp_row_level_border_fixer[$reference_template]) ? $arp_row_level_border_fixer[$reference_template] : array();
        //Body row level li border css apply start

        $general_column_settings['arp_row_border_type'] = isset($general_column_settings['arp_row_border_type']) ? $general_column_settings['arp_row_border_type'] : '';
        $general_column_settings['arp_row_border_size'] = isset($general_column_settings['arp_row_border_size']) ? $general_column_settings['arp_row_border_size'] : '';
        $general_column_settings['arp_row_border_color'] = isset($general_column_settings['arp_row_border_color']) ? $general_column_settings['arp_row_border_color'] : '';

        /* Caption Row Level */
        $general_column_settings['arp_caption_row_border_style'] = isset($general_column_settings['arp_caption_row_border_style']) ? $general_column_settings['arp_caption_row_border_style'] : '';
        $general_column_settings['arp_caption_row_border_size'] = isset($general_column_settings['arp_caption_row_border_size']) ? $general_column_settings['arp_caption_row_border_size'] : '';
        $general_column_settings['arp_caption_row_border_color'] = isset($general_column_settings['arp_caption_row_border_color']) ? $general_column_settings['arp_caption_row_border_color'] : '';
        /* Caption Row Level */

        /* Condition Due to extra li in template where button position in not default */
        if (isset($template_feature['button_position']) && $template_feature['button_position'] != 'default' && $reference_template != 'arptemplate_7') {
            $returnstring .= " .arp_price_table_$table_id:not(.arp_admin_template_editor) .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer .arppricingtablebodycontent ul li:not(:nth-last-child(-n+2)),.arp_price_table_$table_id:not(.arp_admin_template_editor) .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer .arppricingtablebodycontent ul li:last-child,.arp_price_table_$table_id.arp_admin_template_editor .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer .arppricingtablebodycontent ul li";
        } else {
            $returnstring .= " .arp_price_table_$table_id .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer .arppricingtablebodycontent ul li";
        }
        $returnstring .= "{";
        $returnstring .= "$tol_bottom_border_style " . $general_column_settings['arp_row_border_type'] . ";";
        $returnstring .= "$tol_bottom_border_width " . $general_column_settings['arp_row_border_size'] . "px;";
        $returnstring .= "$tol_bottom_border_color " . $general_column_settings['arp_row_border_color'] . ";";
        $returnstring .= " }";


        /* Caption Row Level Border */
        $returnstring .= " .arp_price_table_$table_id .ArpPricingTableColumnWrapper.maincaptioncolumn .planContainer .arppricingtablebodycontent ul li";
        $returnstring .= "{";
        $returnstring .= "$tol_bottom_border_style " . $general_column_settings['arp_row_border_type'] . ";";
        $returnstring .= "$tol_bottom_border_width " . $general_column_settings['arp_row_border_size'] . "px;";
        $returnstring .= "$tol_bottom_border_color " . $general_column_settings['arp_caption_row_border_color'] . ";";
        $returnstring .= " }";
        /* Caption Row Level Border */


        if (is_array($arp_row_level_border_fixer)) {
            foreach ($arp_row_level_border_fixer as $css_fixer) {

                $returnstring .= ".arp_price_table_$table_id .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer " . $css_fixer[0];
                $returnstring .= "{";
                $returnstring .= "$css_fixer[1]: " . $general_column_settings['arp_row_border_size'] . "px " . $general_column_settings['arp_row_border_type'] . " " . $general_column_settings['arp_row_border_color'] . ";";
                $returnstring .= " }";

                /* caption row border */
                $returnstring .= ".arp_price_table_$table_id .ArpPricingTableColumnWrapper.maincaptioncolumn .planContainer " . $css_fixer[0];
                $returnstring .= "{";
                $returnstring .= "$css_fixer[1]: " . $general_column_settings['arp_row_border_size'] . "px " . $general_column_settings['arp_row_border_type'] . " " . $general_column_settings['arp_caption_row_border_color'] . ";";
                $returnstring .= " }";
                /* caption row border */
            }
        }

        $arp_row_level_border_remove_from_last_child = $arprice_default_settings->arp_row_level_border_remove_from_last_child();
        if (in_array($reference_template, $arp_row_level_border_remove_from_last_child)) {

            $returnstring .= " .arp_price_table_$table_id .ArpPricingTableColumnWrapper .planContainer .arppricingtablebodycontent ul li:last-child{border-bottom:none;}";
            if ($reference_template == 'arptemplate_8' || $reference_template == 'arptemplate_10' || $reference_template == 'arptemplate_11' || $reference_template == 'arptemplate_14') {
                $returnstring .= " .arp_price_table_$table_id:not(.arp_admin_template_editor) .ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .planContainer .arppricingtablebodycontent ul li:nth-last-child(-n+2){border-bottom:none;}";
            }
        }

        /* column border */
        $arp_border_css_class = $arprice_default_settings->arp_column_border_array();
        $arp_border_css_class = $arp_border_css_class[$reference_template];

        $border_size = isset($general_column_settings['arp_column_border_size']) ? $general_column_settings['arp_column_border_size'] : '0';
        $border_type = isset($general_column_settings['arp_column_border_type']) ? $general_column_settings['arp_column_border_type'] : 'solid';

        $left_size_border = isset($general_column_settings['arp_column_border_left']) ? $general_column_settings['arp_column_border_left'] : '';
        $right_size_border = isset($general_column_settings['arp_column_border_right']) ? $general_column_settings['arp_column_border_right'] : '';
        $top_size_border = isset($general_column_settings['arp_column_border_top']) ? $general_column_settings['arp_column_border_top'] : '';
        $bottom_size_border = isset($general_column_settings['arp_column_border_bottom']) ? $general_column_settings['arp_column_border_bottom'] : '';

        $border_color = isset($general_column_settings['arp_column_border_color']) ? $general_column_settings['arp_column_border_color'] : '#c9c9c9';



        $caption_border_color = isset($general_column_settings['arp_caption_border_color']) ? $general_column_settings['arp_caption_border_color'] : '#c9c9c9';
        $caption_border_size = isset($general_column_settings['arp_caption_border_size']) ? $general_column_settings['arp_caption_border_size'] : '0';
        $arp_caption_border_style = isset($general_column_settings['arp_caption_border_style']) ? $general_column_settings['arp_caption_border_style'] : 'solid';

        $caption_left_size_border = isset($general_column_settings['arp_caption_border_left']) ? $general_column_settings['arp_caption_border_left'] : '';
        $caption_right_size_border = isset($general_column_settings['arp_caption_border_right']) ? $general_column_settings['arp_caption_border_right'] : '';
        $caption_top_size_border = isset($general_column_settings['arp_caption_border_top']) ? $general_column_settings['arp_caption_border_top'] : '';
        $caption_bottom_size_border = isset($general_column_settings['arp_caption_border_bottom']) ? $general_column_settings['arp_caption_border_bottom'] : '';


        if ($border_size != '0' && $left_size_border != '' && isset($arp_border_css_class['left'])) {
            $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper:not(.maincaptioncolumn ) " . $arp_border_css_class['left'] . "{";
            $returnstring .= 'border-left :' . $border_size . 'px ' . $border_type . ' ' . $border_color . ';';
            $returnstring .= "}";
        }
        if ($border_size != '0' && $right_size_border != '' && isset($arp_border_css_class['right'])) {
            $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper:not(.maincaptioncolumn ) " . $arp_border_css_class['right'] . "{";
            $returnstring .= 'border-right :' . $border_size . 'px ' . $border_type . ' ' . $border_color . ';';
            $returnstring .= "}";
        }
        if ($border_size != '0' && $top_size_border != '' && isset($arp_border_css_class['top'])) {
            $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper:not(.maincaptioncolumn ) " . $arp_border_css_class['top'] . "{";
            $returnstring .= 'border-top :' . $border_size . 'px ' . $border_type . ' ' . $border_color . ';';
            $returnstring .= "}";
        }
        if ($border_size != '0' && $bottom_size_border != '' && isset($arp_border_css_class['bottom'])) {
            $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper:not(.maincaptioncolumn ) " . $arp_border_css_class['bottom'] . "{";
            $returnstring .= 'border-bottom :' . $border_size . 'px ' . $border_type . ' ' . $border_color . ';';
            $returnstring .= "}";
        }




        // caption border
        if ($caption_border_size != '0' && $caption_left_size_border != '' && isset($arp_border_css_class['left'])) {

            $cap_border_left = explode(",", $arp_border_css_class['caption_border_all']['left']);
            foreach ($cap_border_left as $value_left) {
                $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper.maincaptioncolumn " . $value_left . "{";
                $returnstring .= 'border-left :' . $caption_border_size . 'px ' . $arp_caption_border_style . ' ' . $caption_border_color . ';';
                $returnstring .= "}";
            }
        }

        if ($caption_border_size != '0' && $caption_right_size_border != '' && isset($arp_border_css_class['right'])) {

            $cap_border_right = explode(",", $arp_border_css_class['caption_border_all']['right']);
            foreach ($cap_border_right as $value_right) {
                $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper.maincaptioncolumn " . $value_right . "{";
                $returnstring .= 'border-right :' . $caption_border_size . 'px ' . $arp_caption_border_style . ' ' . $caption_border_color . ';';
                $returnstring .= "}";
            }
        }

        if ($caption_border_size != '0' && $caption_top_size_border != '' && isset($arp_border_css_class['top'])) {

            $cap_border_top = explode(",", $arp_border_css_class['caption_border_all']['top']);
            foreach ($cap_border_top as $value_top) {
                $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper.maincaptioncolumn " . $value_top . "{";
                $returnstring .= 'border-top :' . $caption_border_size . 'px ' . $arp_caption_border_style . ' ' . $caption_border_color . ';';
                $returnstring .= "}";
            }
        }

        if ($caption_border_size != '0' && $caption_bottom_size_border != '' && isset($arp_border_css_class['bottom'])) {

            $cap_border_bottom = explode(",", $arp_border_css_class['caption_border_all']['bottom']);
            foreach ($cap_border_bottom as $value_bottom) {
                $returnstring .= ".arptemplate_" . $table_id . " .ArpPricingTableColumnWrapper.maincaptioncolumn " . $value_bottom . "{";
                $returnstring .= 'border-bottom :' . $caption_border_size . 'px ' . $arp_caption_border_style . ' ' . $caption_border_color . ';';
                $returnstring .= "}";
            }
        }



        return $returnstring;
    }

    function get_ribbon_type($ribbontext = 0) {
        if (!$ribbontext)
            return;

        if (preg_match('/_1/i', $ribbontext))
            return 'arpribbon_1 arp_' . $ribbontext;
        else if (preg_match('/_2/i', $ribbontext))
            return 'arpribbon_2 arp_' . $ribbontext;
        else if (preg_match('/_3/i', $ribbontext))
            return 'arpribbon_3 arp_' . $ribbontext;
        else if (preg_match('/_4/i', $ribbontext))
            return 'arpribbon_4 arp_' . $ribbontext;
        else if (preg_match('/_5/i', $ribbontext))
            return 'arpribbon_5 arp_' . $ribbontext;
        else if (preg_match('/_6/i', $ribbontext))
            return 'arpribbon_6 arp_' . $ribbontext;
    }

    function get_preview_table($values) {
        global $wpdb, $arp_mainoptionsarr;

        $table_id = $values['table_id'];

        $sql = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE ID = %d", $table_id));

        $is_template = $sql[0]->is_template;
        $template_name = $sql[0]->template_name;
        $is_animated = $sql[0]->is_animated;

        $main_table_title = $values['pricing_table_main'];

        $total = $values['added_package'];

        $template = $values['arp_template'];
        $template_skin = $values['arp_template_skin_editor'];
        $template_type = $values['arp_template_type'];
        $arp_template_custom_color = isset($values['arp_custom_color_code']) ? $values['arp_custom_color_code'] : '';
        $template_feature = maybe_serialize(json_decode(stripslashes($values['template_feature']), true));

        $template_setting = array('template' => $template, 'skin' => $template_skin, 'template_type' => $template_type, 'template_feature' => $template_feature, 'custom_color_code' => $arp_template_custom_color);


        $custom_css = stripslashes_deep(isset($values['arp_custom_css']) ? $values['arp_custom_css'] : '');
        $enable_toggle_price = (@isset($values['enable_toggle_price']) and @ $values['enable_toggle_price'] == 1) ? 1 : 0;
        $toggle_copy_data_to_other_step = (@isset($_POST['toggle_copy_data_to_other_step']) and @ $_POST['toggle_copy_data_to_other_step'] == 1) ? 1 : 0;
        $step_options_main = isset($values['step_options_main']) ? $values['step_options_main'] : '';
        $togglestep_yearly = $values['togglestep_yearly'];
        $togglestep_monthly = $values['togglestep_monthly'];
        $togglestep_quarterly = $values['togglestep_quarterly'];
        $setas_default_toggle = isset($values['setas_default_toggle']) ? $values['setas_default_toggle'] : '';
        $toggle_option_main = isset($values['toggle_option_main']) ? $values['toggle_option_main'] : '';
        $toggle_active_color = $values['toggle_active_color'];
        $toggle_active_text_color = $values['toggle_active_text_color'];
        $toggle_inactive_color = $values['toggle_inactive_color'];
        $toggle_label_content = isset($values['toggle_label_content']) ? $values['toggle_label_content'] : '';
        $label_position_main = isset($values['label_position_main']) ? $values['label_position_main'] : '';
        $toggle_main_color = $values['toggle_main_color'];
        $toggle_title_font_family = $values['toggle_title_font_family'];
        $toggle_title_font_size = $values['toggle_title_font_size'];
        $toggle_title_font_color = $values['toggle_title_font_color'];
        $toggle_title_font_style_bold = isset($values['toggle_title_font_style_bold']) ? $values['toggle_title_font_style_bold'] : '';
        $toggle_title_font_style_italic = isset($values['toggle_title_font_style_italic']) ? $values['toggle_title_font_style_italic'] : '';
        $toggle_title_font_style_decoration = isset($values['toggle_title_font_style_decoration']) ? $values['toggle_title_font_style_decoration'] : '';
        $toggle_button_font_family = $values['toggle_button_font_family'];
        $toggle_button_font_size = $values['toggle_button_font_size'];
        $toggle_button_font_color = $values['toggle_button_font_color'];
        $toggle_button_font_style_bold = isset($values['toggle_button_font_style_bold']) ? $values['toggle_button_font_style_bold'] : '';
        $toggle_button_font_style_italic = isset($values['toggle_button_font_style_italic']) ? $values['toggle_button_font_style_italic'] : '';
        $toggle_button_font_style_decoration = isset($values['toggle_button_font_style_decoration']) ? $values['toggle_button_font_style_decoration'] : '';



        $column_order = stripslashes_deep($values['pricing_table_column_order']);

        $column_ord = str_replace('\'', '"', $column_order);
        $col_ord_arr = json_decode($column_ord, true);

        if ($values['has_caption_column'] == 1 and ! in_array('main_column_0', $col_ord_arr))
            array_unshift($col_ord_arr, 'main_column_0');
        $new_id = array();


        if (is_array($col_ord_arr) and count($col_ord_arr) > 0) {
            foreach ($col_ord_arr as $key => $value)
                $new_id[$key] = str_replace('main_column_', '', $value);
        }

        $column_order = json_encode($col_ord_arr);

        $total = max($new_id);

        $reference_template = $values['arp_reference_template'];


        $user_edited_columns = json_decode(stripslashes_deep(isset($values['arp_user_edited_columns'])) ? $values['arp_user_edited_columns'] : '', true);

        $general_settings = array('arp_custom_css' => $custom_css, 'column_order' => $column_order, 'reference_template' => $reference_template, 'user_edited_columns' => $user_edited_columns, 'enable_toggle_price' => $enable_toggle_price, 'toggle_copy_data_to_other_step' => $toggle_copy_data_to_other_step, 'arp_step_main' => $step_options_main, 'togglestep_yearly' => $togglestep_yearly, 'togglestep_monthly' => $togglestep_monthly, 'togglestep_quarterly' => $togglestep_quarterly, 'setas_default_toggle' => $setas_default_toggle, 'arp_toggle_main' => $toggle_option_main, 'toggle_active_color' => $toggle_active_color, 'toggle_active_text_color' => $toggle_active_text_color, 'toggle_inactive_color' => $toggle_inactive_color, 'toggle_label_content' => $toggle_label_content, 'arp_label_position_main' => $label_position_main, 'toggle_main_color' => $toggle_main_color, 'toggle_title_font_family' => $toggle_title_font_family, 'toggle_title_font_size' => $toggle_title_font_size, 'toggle_title_font_color' => $toggle_title_font_color, 'toggle_title_font_style_bold' => $toggle_title_font_style_bold, 'toggle_title_font_style_italic' => $toggle_title_font_style_italic, 'toggle_title_font_style_decoration' => $toggle_title_font_style_decoration, 'toggle_button_font_family' => $toggle_button_font_family, 'toggle_button_font_size' => $toggle_button_font_size, 'toggle_button_font_color' => $toggle_button_font_color, 'toggle_button_font_style_bold' => $toggle_button_font_style_bold, 'toggle_button_font_style_italic' => $toggle_button_font_style_italic, 'toggle_button_font_style_decoration' => $toggle_button_font_style_decoration);

        $button_shadow_clr = @$values['button_shadow_color'];
        $button_radius = @$values['button_radius'];

        $header_font_setting = array('font_family' => @$header_font_family, 'font_size' => @$header_font_size, 'font_color' => @$header_font_color, 'font_style' => @$header_font_style);
        $price_font_setting = array('font_family' => @$price_font_family, 'font_size' => @$price_font_size, 'font_color' => @$price_font_color, 'font_style' => @$price_font_style);
        $price_text_font_setting = array('font_family' => @$price_text_font_family, 'font_size' => @$price_text_font_size, 'font_color' => @$price_text_font_color, 'font_style' => @$price_text_font_style);
        $content_font_setting = array('font_family' => @$content_font_family, 'font_size' => @$content_font_size, 'font_color' => @$content_font_color, 'font_style' => @$content_font_style);
        $button_font_setting = array('font_family' => @$button_font_family, 'font_size' => @$button_font_size, 'font_color' => @$button_font_color, 'font_style' => @$button_font_style);
        $button_settings = array('button_shadow_color' => @$button_shadow_clr, 'button_radius' => @$button_radius);

        $font_setting = array('header_fonts' => @$header_font_setting, 'price_fonts' => @$price_font_setting, 'price_text_fonts' => @$price_text_font_setting, 'content_fonts' => @$content_font_setting, 'button_fonts' => @$button_font_setting);

        $is_column_space = @$values['space_between_column'];
        $column_space = @$values['column_space'];
        $hover_highlight = @$values['column_high_on_hover'];
        $is_responsive = @$values['is_responsive'];
        //$is_responsive		= 1;
        $all_column_width = @$values['all_column_width'];

        $arp_row_border_size = @$values['arp_row_border_size'];
        $arp_row_border_type = @$values['arp_row_border_type'];
        $arp_row_border_color = @$values['arp_row_border_color'];

//        Caption Row Level Border
        $arp_caption_row_border_size = @$values['arp_caption_row_border_size'];
        $arp_caption_row_border_style = @$values['arp_caption_row_border_style'];
        $arp_caption_row_border_color = @$values['arp_caption_row_border_color'];
//        Caption Row Level Border

        $arp_column_border_size = @$values['arp_column_border_size'];
        $arp_column_border_type = @$values['arp_column_border_type'];
        $arp_column_border_color = @$values['arp_column_border_color'];

        $arp_column_border_left = @$values['arp_column_border_left'];
        $arp_column_border_right = @$values['arp_column_border_right'];
        $arp_column_border_top = @$values['arp_column_border_top'];
        $arp_column_border_bottom = @$values['arp_column_border_bottom'];

        $arp_caption_border_color = @$values['arp_caption_border_color'];
        $arp_caption_border_size = @$values['arp_caption_border_size'];
        $arp_caption_border_style = @$values['arp_caption_border_style'];

        $arp_caption_border_left = @$values['arp_caption_border_left'];
        $arp_caption_border_right = @$values['arp_caption_border_right'];
        $arp_caption_border_top = @$values['arp_caption_border_top'];
        $arp_caption_border_bottom = @$values['arp_caption_border_bottom'];

        $hide_caption_column = @$values['hide_caption_column'];
        $full_column_clickable = @$values['full_column_clickable'];
        $disable_hover_effect = @$values['disable_hover_effect'];
        $hide_footer_global = @$values['hide_footer_global'];
        $hide_header_global = @$values['hide_header_global'];
        $hide_price_global = @$values['hide_price_global'];
        $hide_feature_global = @$values['hide_feature_global'];
        $hide_description_global = @$values['hide_description_global'];
        $hide_header_shortcode_global = @$values['hide_header_shortcode_global'];

        $column_opacity = @$values['column_opacity'];
        $column_wrapper_width_txtbox = @$values['column_wrapper_width_txtbox'];
        $column_wrapper_width_style = @$values['column_wrapper_width_style'];
        $column_box_shadow_effect = @$values['column_box_shadow_effect'];
        $toggle_column_animation = @$values['toggle_column_animation'];

        $display_column_mobile = @$values['arp_display_columns_mobile'];
        $display_column_tablet = @$values['arp_display_columns_tablet'];
        $display_column_desktop = @$values['arp_display_columns_desktop'];

        $column_border_radius_top_left = ( isset($values['column_border_radius_top_left']) and ! empty($values['column_border_radius_top_left']) ) ? $values['column_border_radius_top_left'] : 0;
        $column_border_radius_top_right = ( isset($values['column_border_radius_top_right']) and ! empty($values['column_border_radius_top_right']) ) ? $values['column_border_radius_top_right'] : 0;
        $column_border_radius_bottom_right = ( isset($values['column_border_radius_bottom_right']) and ! empty($values['column_border_radius_bottom_right']) ) ? $values['column_border_radius_bottom_right'] : 0;
        $column_border_radius_bottom_left = ( isset($values['column_border_radius_bottom_left']) and ! empty($values['column_border_radius_bottom_left']) ) ? $values['column_border_radius_bottom_left'] : 0;
        $column_hide_blank_rows = @$values['hide_blank_rows'];
        $global_button_border_width = @$values['arp_global_button_border_width'];
        $global_button_border_type = @$values['arp_global_button_border_style'];
        $global_button_border_color = @$values['arp_global_button_border_color'];
        $global_button_border_radius_top_left = @$values['global_button_border_radius_top_left'];
        $global_button_border_radius_top_right = @$values['global_button_border_radius_top_right'];
        $global_button_border_radius_bottom_left = @$values['global_button_border_radius_bottom_left'];
        $global_button_border_radius_bottom_right = @$values['global_button_border_radius_bottom_right'];
        $arp_global_button_border_type = @$values['arp_global_button_type'];
        $disable_button_hover_effect = @$values['disable_button_hover_effect'];

        $header_font_family_global = @$values['header_font_family_global'];
        $header_font_size_global = @$values['header_font_size_global'];
        $arp_header_text_alignment = @$values['arp_header_text_alignment'];

        $header_style_bold_global = @$values['header_style_bold_global'];
        $header_style_italic_global = @$values['header_style_italic_global'];
        $header_style_decoration_global = @$values['header_style_decoration_global'];

        $price_font_family_global = @$values['price_font_family_global'];
        $price_font_size_global = @$values['price_font_size_global'];
        $arp_price_text_alignment = @$values['arp_price_text_alignment'];

        $price_style_bold_global = @$values['price_style_bold_global'];
        $price_style_italic_global = @$values['price_style_italic_global'];
        $price_style_decoration_global = @$values['price_style_decoration_global'];

        $body_font_family_global = @$values['body_font_family_global'];
        $body_font_size_global = @$values['body_font_size_global'];
        $arp_body_text_alignment = @$values['arp_body_text_alignment'];

        $body_style_bold_global = @$values['body_style_bold_global'];
        $body_style_italic_global = @$values['body_style_italic_global'];
        $body_style_decoration_global = @$values['body_style_decoration_global'];

        $footer_font_family_global = @$values['footer_font_family_global'];
        $footer_font_size_global = @$values['footer_font_size_global'];
        $arp_footer_text_alignment = @$values['arp_footer_text_alignment'];

        $footer_style_bold_global = @$values['footer_style_bold_global'];
        $footer_style_italic_global = @$values['footer_style_italic_global'];
        $footer_style_decoration_global = @$values['footer_style_decoration_global'];

        $button_font_family_global = @$values['button_font_family_global'];
        $button_font_size_global = @$values['button_font_size_global'];
        $arp_button_text_alignment = @$values['arp_button_text_alignment'];

        $button_style_bold_global = @$values['button_style_bold_global'];
        $button_style_italic_global = @$values['button_style_italic_global'];
        $button_style_decoration_global = @$values['button_style_decoration_global'];

        $description_font_family_global = @$values['description_font_family_global'];
        $description_font_size_global = @$values['description_font_size_global'];
        $arp_description_text_alignment = @$values['arp_description_text_alignment'];

        $description_style_bold_global = @$values['description_style_bold_global'];
        $description_style_italic_global = @$values['description_style_italic_global'];
        $description_style_decoration_global = @$values['description_style_decoration_global'];

        $column_setting = array('space_between_column' => $is_column_space, 'column_space' => $column_space, 'column_highlight_on_hover' => $hover_highlight, 'is_responsive' => $is_responsive, 'hide_caption_column' => $hide_caption_column, 'full_column_clickable' => $full_column_clickable, 'disable_hover_effect' => $disable_hover_effect, 'column_opacity' => $column_opacity, 'all_column_width' => $all_column_width, 'column_wrapper_width_txtbox' => $column_wrapper_width_txtbox, 'column_wrapper_width_style' => $column_wrapper_width_style, 'column_border_radius_top_left' => $column_border_radius_top_left, 'column_border_radius_top_right' => $column_border_radius_top_right, 'column_border_radius_bottom_right' => $column_border_radius_bottom_right, 'column_border_radius_bottom_left' => $column_border_radius_bottom_left, 'column_box_shadow_effect' => $column_box_shadow_effect, 'column_hide_blank_rows' => $column_hide_blank_rows, 'hide_header_global' => $hide_header_global, 'hide_header_shortcode_global' => $hide_header_shortcode_global, 'hide_price_global' => $hide_price_global, 'hide_feature_global' => $hide_feature_global, 'hide_description_global' => $hide_description_global, 'hide_footer_global' => $hide_footer_global, 'display_col_mobile' => $display_column_mobile, 'display_col_tablet' => $display_column_tablet, 'display_col_desktop' => $display_column_desktop, 'global_button_border_width' => $global_button_border_width, 'global_button_border_type' => $global_button_border_type, 'global_button_border_color' => $global_button_border_color, 'global_button_border_radius_top_left' => $global_button_border_radius_top_left, 'global_button_border_radius_top_right' => $global_button_border_radius_top_right, 'global_button_border_radius_bottom_left' => $global_button_border_radius_bottom_left, 'global_button_border_radius_bottom_right' => $global_button_border_radius_bottom_right, 'arp_global_button_type' => $arp_global_button_border_type, 'disable_button_hover_effect' => $disable_button_hover_effect, 'toggle_column_animation' => $toggle_column_animation, 'arp_row_border_size' => $arp_row_border_size, 'arp_row_border_type' => $arp_row_border_type, 'arp_row_border_color' => $arp_row_border_color, 'arp_caption_border_style' => $arp_caption_border_style, 'arp_caption_border_size' => $arp_caption_border_size, 'arp_column_border_size' => $arp_column_border_size, 'arp_column_border_type' => $arp_column_border_type, 'arp_column_border_color' => $arp_column_border_color, 'arp_caption_border_color' => $arp_caption_border_color, 'arp_column_border_left' => $arp_column_border_left, 'arp_column_border_right' => $arp_column_border_right, 'arp_column_border_top' => $arp_column_border_top, 'arp_column_border_bottom' => $arp_column_border_bottom, 'arp_caption_border_left' => $arp_caption_border_left, 'arp_caption_border_right' => $arp_caption_border_right, 'arp_caption_border_top' => $arp_caption_border_top, 'arp_caption_border_bottom' => $arp_caption_border_bottom, 'arp_caption_row_border_size' => $arp_caption_row_border_size, 'arp_caption_row_border_style' => $arp_caption_row_border_style, 'arp_caption_row_border_color' => $arp_caption_row_border_color,
            'header_font_family_global' => $header_font_family_global,
            'header_font_size_global' => $header_font_size_global,
            'arp_header_text_alignment' => $arp_header_text_alignment,
            'arp_header_text_bold_global' => $header_style_bold_global,
            'arp_header_text_italic_global' => $header_style_italic_global,
            'arp_header_text_decoration_global' => $header_style_decoration_global,
            'price_font_family_global' => $price_font_family_global,
            'price_font_size_global' => $price_font_size_global,
            'arp_price_text_alignment' => $arp_price_text_alignment,
            'arp_price_text_bold_global' => $price_style_bold_global,
            'arp_price_text_italic_global' => $price_style_italic_global,
            'arp_price_text_decoration_global' => $price_style_decoration_global,
            'body_font_family_global' => $body_font_family_global,
            'body_font_size_global' => $body_font_size_global,
            'arp_body_text_alignment' => $arp_body_text_alignment,
            'arp_body_text_bold_global' => $body_style_bold_global,
            'arp_body_text_italic_global' => $body_style_italic_global,
            'arp_body_text_decoration_global' => $body_style_decoration_global,
            'footer_font_family_global' => $footer_font_family_global,
            'footer_font_size_global' => $footer_font_size_global,
            'arp_footer_text_alignment' => $arp_footer_text_alignment,
            'arp_footer_text_bold_global' => $footer_style_bold_global,
            'arp_footer_text_italic_global' => $footer_style_italic_global,
            'arp_footer_text_decoration_global' => $footer_style_decoration_global,
            'button_font_family_global' => $button_font_family_global,
            'button_font_size_global' => $button_font_size_global,
            'arp_button_text_alignment' => $arp_button_text_alignment,
            'arp_button_text_bold_global' => $button_style_bold_global,
            'arp_button_text_italic_global' => $button_style_italic_global,
            'arp_button_text_decoration_global' => $button_style_decoration_global,
            'description_font_family_global' => $description_font_family_global,
            'description_font_size_global' => $description_font_size_global,
            'arp_description_text_alignment' => $arp_description_text_alignment,
            'arp_description_text_bold_global' => $description_style_bold_global,
            'arp_description_text_italic_global' => $description_style_italic_global,
            'arp_description_text_decoration_global' => $description_style_decoration_global,
        );

        $is_animation = @$values['is_animation'];
        $visible_columns = @$values['visible_columns'];
        $scroll_column = @$values['column_to_scroll'];
        $is_navigation = @$values['is_navigation'];
        $is_autoplay = @$values['is_autoplay'];
        $sliding_effect = @$values['sliding_effect'];
        $transition_speed = @$values['slide_transition_speed'];
        $hide_caption_animation = @$values['hide_caption_animation'];
        $navigation_style = @$values['navigation_style'];
        $easing_effect = @$values['easing_effect'];
        $is_pagination = @$values['is_pagination'];
        $pagination_style = @$values['pagination_style'];
        $pagination_position = @$values['pagination_position'];
        $infinite = @$values['is_infinite'];
        $pagi_nav_btn = @$values['pagination_navigation_buttons'];
        $navi_nav_btn = @$values['navigation_buttons'];
        $sticky_caption = @$values['sticky_caption'];

        $column_animation = array('is_animation' => $is_animation, 'visible_column' => $visible_columns, 'scrolling_columns' => $scroll_column, 'navigation' => $is_navigation, 'autoplay' => $is_autoplay, 'sliding_effect' => $sliding_effect, 'transition_speed' => $transition_speed, 'hide_caption' => $hide_caption_animation, 'navigation_style' => $navigation_style, 'easing_effect' => $easing_effect, 'is_pagination' => $is_pagination, 'pagination_style' => $pagination_style, 'pagination_position' => $pagination_position, 'is_infinite' => $infinite, 'pagi_nav_btn' => $pagi_nav_btn, 'navi_nav_btn' => $navi_nav_btn, 'sticky_caption' => $sticky_caption);

        $tooltip_bgcolor = @$values['tooltip_bgcolor'];
        $tooltip_txt_color = @$values['tooltip_txtcolor'];
        $tooltip_animation = @$values['tooltip_animation_style'];
        $tooltip_position = @$values['tooltip_position'];
        $tooltip_width = @$values['tooltip_width'];
        $tooltip_style = @$values['tooltip_style'];
        $tooltip_font_family = @$values['tooltip_font_family'];
        $tooltip_font_size = @$values['tooltip_font_size'];

        //$tooltip_font_style = @$values['tooltip_font_style'];
        $tooltip_font_style_bold = @$values['tooltip_font_style_bold'];
        $tooltip_font_style_italic = @$values['tooltip_font_style_italic'];
        $tooltip_font_style_decoration = @$values['tooltip_font_style_decoration'];

        $tooltip_trigger_type = @$values['tooltip_trigger_type'];
        $tooltip_display_style = @$values['tooltip_display_style'];
        $tooltip_informative_icon = @$values['tooltip_informative_icon'];
        $tooltip_icon_position = @$values['tooltip_icon_position'];

        $arp_column_bg_custom_color = @$values['arp_column_background_color'];

        $arp_column_desc_bg_custom_color = @$values['arp_column_desc_background_color'];

        $arp_column_desc_hover_bg_custom_color = @$values['arp_column_desc_hover_background_color'];

        $arp_header_bg_custom_color = @$values['arp_header_background_color'];

        $arp_pricing_bg_custom_color = @$values['arp_pricing_background_color'];

        $arp_template_odd_row_bg_color = @$values['arp_body_odd_row_background_color'];

        $arp_template_odd_row_hover_bg_color = @$values['arp_body_odd_row_hover_background_color'];

        $arp_body_even_row_bg_custom_color = @$values['arp_body_even_row_background_color'];

        $arp_body_even_row_hover_bg_custom_color = @$values['arp_body_even_row_hover_background_color'];

        $arp_footer_content_bg_color = @$values['arp_footer_content_background_color'];

        $arp_footer_content_hover_bg_color = @$values['arp_footer_content_hover_background_color'];

        $arp_button_bg_custom_color = @$values['arp_button_background_color'];

        $arp_column_bg_hover_color = @$values['arp_column_bg_hover_color'];

        $arp_button_bg_hover_color = @$values['arp_button_bg_hover_color'];

        $arp_header_bg_hover_color = @$values['arp_header_bg_hover_color'];

        $arp_price_bg_hover_color = @$values['arp_price_bg_hover_color'];

        $arp_header_font_custom_color = @$values['arp_header_font_custom_color_input'];

        $arp_header_font_custom_hover_color_input = @$values['arp_header_font_custom_hover_color_input'];

        $arp_price_font_custom_color = @$values['arp_price_font_custom_color_input'];

        $arp_price_font_custom_hover_color_input = @$values['arp_price_font_custom_hover_color_input'];

        $arp_price_duration_font_custom_color = @$values['arp_price_duration_font_custom_color_input'];

        $arp_price_duration_font_custom_hover_color_input = @$values['arp_price_duration_font_custom_hover_color_input'];

        $arp_desc_font_custom_color = @$values['arp_desc_font_custom_color_input'];

        $arp_desc_font_custom_hover_color_input = @$values['arp_desc_font_custom_hover_color_input'];

        $arp_body_label_font_custom_color = @$values['arp_body_label_font_custom_color_input'];

        $arp_body_label_font_custom_hover_color_input = @$values['arp_body_label_font_custom_hover_color_input'];

        $arp_body_font_custom_color = @$values['arp_body_font_custom_color_input'];
        $arp_body_even_font_custom_color = @$values['arp_body_even_font_custom_color_input'];

        $arp_body_font_custom_hover_color_input = @$values['arp_body_font_custom_hover_color_input'];
        $arp_body_even_font_custom_hover_color_input = @$values['arp_body_even_font_custom_hover_color_input'];

        $arp_footer_font_custom_color = @$values['arp_footer_font_custom_color_input'];

        $arp_footer_font_custom_hover_color_input = @$values['arp_footer_font_custom_hover_color_input'];

        $arp_button_font_custom_color = @$values['arp_button_font_custom_color_input'];

        $arp_button_font_custom_hover_color_input = @$values['arp_button_font_custom_hover_color_input'];

        $arp_shortocode_background = @$values['arp_shortocode_background_color'];
        $arp_shortocode_font_color = @$values['arp_shortocode_font_custom_color_input'];
        $arp_shortcode_bg_hover_color = @$values['arp_shortcode_bg_hover_color'];
        $arp_shortcode_font_hover_color = @$values['arp_shortcode_font_custom_hover_color_input'];

        $custom_skin_colors = array(
            "arp_header_bg_custom_color" => $arp_header_bg_custom_color,
            "arp_column_bg_custom_color" => $arp_column_bg_custom_color,
            "arp_column_desc_bg_custom_color" => $arp_column_desc_bg_custom_color,
            "arp_column_desc_hover_bg_custom_color" => $arp_column_desc_hover_bg_custom_color,
            "arp_pricing_bg_custom_color" => $arp_pricing_bg_custom_color,
            "arp_body_odd_row_bg_custom_color" => $arp_template_odd_row_bg_color,
            "arp_body_odd_row_hover_bg_custom_color" => $arp_template_odd_row_hover_bg_color,
            "arp_body_even_row_hover_bg_custom_color" => $arp_body_even_row_hover_bg_custom_color,
            "arp_body_even_row_bg_custom_color" => $arp_body_even_row_bg_custom_color,
            "arp_footer_content_bg_color" => $arp_footer_content_bg_color,
            "arp_footer_content_hover_bg_color" => $arp_footer_content_hover_bg_color,
            "arp_button_bg_custom_color" => $arp_button_bg_custom_color,
            "arp_column_bg_hover_color" => $arp_column_bg_hover_color,
            "arp_button_bg_hover_color" => $arp_button_bg_hover_color,
            "arp_header_bg_hover_color" => $arp_header_bg_hover_color,
            "arp_price_bg_hover_color" => $arp_price_bg_hover_color,
            "arp_header_font_custom_color" => $arp_header_font_custom_color,
            "arp_header_font_custom_hover_color" => $arp_header_font_custom_hover_color_input,
            "arp_price_font_custom_color" => $arp_price_font_custom_color,
            "arp_price_font_custom_hover_color" => $arp_price_font_custom_hover_color_input,
            "arp_price_duration_font_custom_color" => $arp_price_duration_font_custom_color,
            "arp_price_duration_font_custom_hover_color" => $arp_price_duration_font_custom_hover_color_input,
            "arp_desc_font_custom_color" => $arp_desc_font_custom_color,
            "arp_desc_font_custom_hover_color" => $arp_desc_font_custom_hover_color_input,
            "arp_body_label_font_custom_color" => $arp_body_label_font_custom_color,
            "arp_body_label_font_custom_hover_color" => $arp_body_label_font_custom_hover_color_input,
            "arp_body_font_custom_color" => $arp_body_font_custom_color,
            "arp_body_even_font_custom_color" => $arp_body_even_font_custom_color,
            "arp_body_font_custom_hover_color" => $arp_body_font_custom_hover_color_input,
            "arp_body_even_font_custom_hover_color" => $arp_body_even_font_custom_hover_color_input,
            "arp_footer_font_custom_color" => $arp_footer_font_custom_color,
            "arp_footer_font_custom_hover_color" => $arp_footer_font_custom_hover_color_input,
            "arp_button_font_custom_color" => $arp_button_font_custom_color,
            "arp_button_font_custom_hover_color" => $arp_button_font_custom_hover_color_input,
            'arp_shortocode_background' => $arp_shortocode_background,
            'arp_shortocode_font_color' => $arp_shortocode_font_color,
            'arp_shortcode_bg_hover_color' => $arp_shortcode_bg_hover_color,
            'arp_shortcode_font_hover_color' => $arp_shortcode_font_hover_color,
        );

        $tooltip_setting = array(/* 'width'=>$tooltip_width, */ 'background_color' => $tooltip_bgcolor, 'text_color' => $tooltip_txt_color, 'animation' => $tooltip_animation, 'position' => $tooltip_position, 'tooltip_width' => $tooltip_width, 'style' => $tooltip_style, 'tooltip_font_family' => $tooltip_font_family, 'tooltip_font_size' => $tooltip_font_size, 'tooltip_font_style_bold' => $tooltip_font_style_bold, 'tooltip_font_style_italic' => $tooltip_font_style_italic, 'tooltip_font_style_decoration' => $tooltip_font_style_decoration, 'tooltip_trigger_type' => $tooltip_trigger_type, 'tooltip_display_style' => $tooltip_display_style, 'tooltip_informative_icon' => $tooltip_informative_icon, 'tooltip_icon_position' => $tooltip_icon_position);

        $tab_general_opt = array('template_setting' => $template_setting, 'font_settings' => $font_setting, 'column_settings' => $column_setting, 'column_animation' => $column_animation, 'tooltip_settings' => $tooltip_setting, 'general_settings' => $general_settings, 'button_settings' => $button_settings, 'custom_skin_colors' => $custom_skin_colors
        );

        $general_opt = maybe_serialize($tab_general_opt);

        //for table options
        $sql_results = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice_options WHERE table_id = %d", $table_id));
        $table_opt = $sql_results[0]->table_options;
        $uns_table_opt = maybe_unserialize($table_opt);
        $table_columns = $uns_table_opt['columns'];

        if (count($total) > 0) {
            if (count($new_id) > 1) {
                for ($i = 0; $i <= $total; $i++) {
                    if (!in_array($i, $new_id))
                        continue;
                    $Title = 'column_' . $i;
                    $column_width = @$values['column_width_' . $i];
                    $column_title = @$values['column_title_' . $i];
                    $column_title_second = @$values['column_title_second_' . $i];
                    $column_title_third = @$values['column_title_third_' . $i];
                    $column_desc = @$values['arp_column_description_' . $i];
                    $column_desc_second = @$values['arp_column_description_second_' . $i];
                    $column_desc_third = @$values['arp_column_description_third_' . $i];
                    $cstm_rbn_txt = @$values['arp_custom_ribbon_txt_' . $i];
                    $column_highlight = @$values['column_highlight_' . $i];
                    $column_background_color = @$values['column_background_color_' . $i];
                    $column_hover_background_color = @$values['column_hover_background_color_' . $i];
                    $arp_change_bgcolor = @$values['arp_change_bgcolor_' . $i];
                    $column_background_image = @stripslashes_deep(@$values['arp_column_background_image_' . $i]);
                    $column_background_image_height = @stripslashes_deep(@$values['arp_column_background_image_height_' . $i]);
                    $column_background_image_width = @stripslashes_deep(@$values['arp_column_background_image_width_' . $i]);
                    $column_background_scaling = @stripslashes_deep(@$values['column_background_scaling_' . $i]);
                    $column_background_min_positon = @stripslashes_deep(@$values['column_background_min_positon_' . $i]);
                    $column_background_max_positon = @stripslashes_deep(@$values['column_background_max_positon_' . $i]);
//                    $hide_footer = @$values['hide_footer_' . $i];


                    $column_ribbon_style = @stripslashes_deep($values['arp_ribbon_style_' . $i]);
                    $column_ribbon_position = @stripslashes_deep($values['arp_ribbon_position_' . $i]);
                    $column_ribbon_bgcolor = @stripslashes_deep($values['arp_ribbon_bgcol_' . $i]);
                    $column_ribbon_txtcolor = @stripslashes_deep($values['arp_ribbon_textcol_' . $i]);
                    $column_ribbon_content = @stripslashes_deep($values['arp_ribbon_content_' . $i]);
                    $column_ribbon_content_second = @stripslashes_deep($values['arp_ribbon_content_second_' . $i]);
                    $column_ribbon_content_third = @stripslashes_deep($values['arp_ribbon_content_third_' . $i]);
                    $column_ribbon_position_rl = @stripslashes_deep(@$values['arp_ribbon_custom_position_rl_' . $i]);
                    $column_ribbon_position_top = @stripslashes_deep(@$values['arp_ribbon_custom_position_top_' . $i]);

                    $column_custom_ribbon_url = @stripslashes_deep(@$values['arp_custom_ribbon_url_' . $i]);
                    $column_custom_ribbon_url_second = @stripslashes_deep(@$values['arp_custom_ribbon_url_second_' . $i]);
                    $column_custom_ribbon_url_third = @stripslashes_deep(@$values['arp_custom_ribbon_url_third_' . $i]);

                    $header_background_color = @$values['header_background_color_' . $i];
                    $header_hover_background_color = @$values['header_hover_background_color_' . $i];
                    $is_post_variables = isset($values['post_variables_' . $i]) ? @stripslashes_deep($values['post_variables_' . $i]) : 0;

                    $post_variables_content = isset($values['post_variables_content_' . $i]) ? $values['post_variables_content_' . $i] : '';
                    $post_variables_content_second = isset($values['post_variables_content_second_' . $i]) ? $values['post_variables_content_second_' . $i] : '';
                    $post_variables_content_third = isset($values['post_variables_content_third_' . $i]) ? $values['post_variables_content_third_' . $i] : '';

                    $header_font_family = @$values['header_font_family_' . $i];
                    $header_font_size = @$values['header_font_size_' . $i];
                    $header_font_color = @$values['header_font_color_' . $i];
                    $header_hover_font_color = @$values['header_hover_font_color_' . $i];
                    $header_font_align = @$values['arp_header_text_alignment_' . $i];
                    $header_font_style = @$values['header_font_style_' . $i];

                    $header_style_bold = @$values['header_style_bold_' . $i];
                    $header_style_italic = @$values['header_style_italic_' . $i];
                    $header_style_decoration = @$values['header_style_decoration_' . $i];

                    $header_background_image = @stripslashes_deep(@$values['arp_header_background_image_' . $i]);

                    $price_background_color = @$values['price_background_color_' . $i];
                    $price_hover_background_color = @$values['price_hover_background_color_' . $i];
                    $price_font_family = @stripslashes_deep($values['price_font_family_' . $i]);
                    $price_font_size = @$values['price_font_size_' . $i];
                    $price_font_color = @$values['price_font_color_' . $i];
                    $price_hover_font_color = @$values['price_hover_font_color_' . $i];
                    $price_font_style = @stripslashes_deep($values['price_font_style_' . $i]);
                    $price_font_align = @stripslashes_deep($values['arp_price_text_alignment_' . $i]);

                    $price_label_style_bold = @$values['price_label_style_bold_' . $i];
                    $price_label_style_italic = @$values['price_label_style_italic_' . $i];
                    $price_label_style_decoration = @$values['price_label_style_decoration_' . $i];

                    $price_text_font_family = @stripslashes_deep($values['price_text_font_family_' . $i]);
                    $price_text_font_size = @$values['price_text_font_size_' . $i];
                    $price_text_font_style = @$values['price_text_font_style_' . $i];
                    $price_text_font_color = @stripslashes_deep($values['price_text_font_color_' . $i]);
                    $price_text_hover_font_color = @stripslashes_deep($values['price_text_hover_font_color_' . $i]);

                    $price_text_style_bold = @$values['price_text_style_bold_' . $i];
                    $price_text_style_italic = @$values['price_text_style_italic_' . $i];
                    $price_text_style_decoration = @$values['price_text_style_decoration_' . $i];

                    $column_description_font_family = @stripslashes_deep($values['column_description_font_family_' . $i]);
                    $column_description_font_size = @$values['column_description_font_size_' . $i];
                    $column_description_font_style = @$values['column_description_font_style_' . $i];
                    $column_description_font_color = @stripslashes_deep($values['column_description_font_color_' . $i]);
                    $column_description_hover_font_color = @stripslashes_deep($values['column_description_hover_font_color_' . $i]);
                    $column_desc_background_color = @stripslashes_deep(@$values['column_desc_background_color_' . $i]);
                    $column_desc_hover_background_color = @stripslashes_deep(@$values['column_desc_hover_background_color_' . $i]);

                    $column_description_style_bold = @$values['column_description_style_bold_' . $i];
                    $column_description_style_italic = @$values['column_description_style_italic_' . $i];
                    $column_description_style_decoration = @$values['column_description_style_decoration_' . $i];
                    $column_description_text_align = @$values['arp_description_text_alignment_' . $i];

                    $content_font_family = @stripslashes_deep($values['content_font_family_' . $i]);
                    $content_font_size = @$values['content_font_size_' . $i];
                    $content_font_color = @stripslashes_deep($values['content_font_color_' . $i]);
                    $content_even_font_color = @stripslashes_deep($values['content_even_font_color_' . $i]);
                    $content_hover_font_color = @stripslashes_deep($values['content_hover_font_color_' . $i]);
                    $content_even_hover_font_color = @stripslashes_deep($values['content_even_hover_font_color_' . $i]);
                    $content_font_style = @$values['content_font_style_' . $i];

                    $content_odd_color = @$values['content_odd_color_' . $i];
                    $content_odd_hover_color = @$values['content_odd_hover_color_' . $i];
                    $content_even_color = @$values['content_even_color_' . $i];
                    $content_even_hover_color = @$values['content_even_hover_color_' . $i];

                    $body_li_style_bold = @$values['body_li_style_bold_' . $i];
                    $body_li_style_italic = @$values['body_li_style_italic_' . $i];
                    $body_li_style_decoration = @$values['body_li_style_decoration_' . $i];

                    $content_label_font_family = @stripslashes_deep($values['content_label_font_family_' . $i]);
                    $content_label_font_size = @$values['content_label_font_size_' . $i];
                    $content_label_font_color = @stripslashes_deep($values['content_label_font_color_' . $i]);
                    $content_label_hover_font_color = @stripslashes_deep($values['content_label_hover_font_color_' . $i]);
                    $content_label_font_style = @$values['content_label_font_style_' . $i];

                    $body_label_style_bold = @$values['body_label_style_bold_' . $i];
                    $body_label_style_italic = @$values['body_label_style_italic_' . $i];
                    $body_label_style_decoration = @$values['body_label_style_decoration_' . $i];

                    $button_background_color = @$values['button_background_color_' . $i];
                    $button_hover_background_color = @$values['button_hover_background_color_' . $i];
                    $button_font_family = @stripslashes_deep($values['button_font_family_' . $i]);
                    $button_font_size = @$values['button_font_size_' . $i];
                    $button_font_color = @$values['button_font_color_' . $i];
                    $button_hover_font_color = @$values['button_hover_font_color_' . $i];
                    $button_font_style = @stripslashes_deep($values['button_font_style_' . $i]);

                    $button_style_bold = @$values['button_style_bold_' . $i];
                    $button_style_italic = @$values['button_style_italic_' . $i];
                    $button_style_decoration = @$values['button_style_decoration_' . $i];

                    $caption = isset($values['caption_column_' . $i]) ? $values['caption_column_' . $i] : 0;

                    $footer_content = @$values['footer_content_' . $i];
                    $footer_content_second = @$values['footer_content_second_' . $i];
                    $footer_content_third = @$values['footer_content_third_' . $i];
                    $footer_content_position = @$values['footer_content_position_' . $i];
                    $footer_text_align = @$values['arp_footer_text_alignment_' . $i];
                    $footer_level_options_font_family = @$values['footer_level_options_font_family_' . $i];
                    $footer_background_color = @$values['footer_bg_color_' . $i];
                    $footer_hover_background_color = @$values['footer_hover_bg_color_' . $i];
                    $footer_level_options_font_size = @$values['footer_level_options_font_size_' . $i];
                    $footer_level_options_font_color = @$values['footer_level_options_font_color_' . $i];
                    $footer_level_options_hover_font_color = @$values['footer_level_options_hover_font_color_' . $i];
                    $footer_level_options_font_style_bold = @$values['footer_level_options_font_style_bold_' . $i];
                    $footer_level_options_font_style_italic = @$values['footer_level_options_font_style_italic_' . $i];
                    $footer_level_options_font_style_decoration = @$values['footer_level_options_font_style_decoration_' . $i];

                    $header_shortcode = @stripslashes_deep($values['additional_shortcode_' . $i]);
                    $header_shortcode_second = @stripslashes_deep($values['additional_shortcode_second_' . $i]);
                    $header_shortcode_third = @stripslashes_deep($values['additional_shortcode_third_' . $i]);

                    $arp_shortcode_customization_style = @stripslashes_deep($values['arp_shortcode_customization_style_' . $i]);
                    $arp_shortcode_customization_size = @stripslashes_deep($values['arp_shortcode_customization_size_' . $i]);
                    $shortcode_background_color = @stripslashes_deep($values['shortcode_background_color_' . $i]);
                    $shortcode_font_color = @stripslashes_deep($values['shortcode_font_color_' . $i]);
                    $shortcode_hover_background_color = @stripslashes_deep($values['shortcode_hover_background_color_' . $i]);
                    $shortcode_hover_font_color = @stripslashes_deep($values['shortcode_hover_font_color_' . $i]);

                    $html_content = @stripslashes_deep($values['html_content_' . $i]);
                    $html_content_second = @stripslashes_deep($values['html_content_second_' . $i]);
                    $html_content_third = @stripslashes_deep($values['html_content_third_' . $i]);
                    $price_text = @stripslashes_deep($values['price_text_' . $i]);

                    $price_text_two_step = @stripslashes_deep($values['price_text_two_step_' . $i]);
                    $price_text_three_step = @stripslashes_deep($values['price_text_three_step_' . $i]);
                    $price_text_input_two_step_price = @stripslashes_deep($values['price_text_input_two_step_price_' . $i]);
                    $price_text_input_three_step_price = @stripslashes_deep($values['price_text_input_three_step_price_' . $i]);
                    $price_text_input_two_step_label = @stripslashes_deep($values['price_text_input_two_step_label_' . $i]);
                    $price_text_input_three_step_label = @stripslashes_deep($values['price_text_input_three_step_label_' . $i]);

                    $price_label = @stripslashes_deep($values['price_label_' . $i]);
                    $gmap_marker = @$values['gmap_marker' . $i];
                    $total_rows = @$values['total_rows_' . $i];

                    $row = array();
                    if ($total_rows > 0) {
                        for ($j = 0; $j < $total_rows; $j++) {
                            $row_title = 'row_' . $j;
                            $row_label = @$values['row_' . $i . '_label_' . $j];
                            $row_label_second = @$values['row_' . $i . '_label_second_' . $j];
                            $row_label_third = @$values['row_' . $i . '_label_third_' . $j];
                            $row_des_align = @$values['row_' . $i . '_description_text_alignment_' . $j];
                            $row_des = @stripslashes_deep($values['row_' . $i . '_description_' . $j]);
                            $row_description_second = @stripslashes_deep($values['row_' . $i . '_description_second_' . $j]);
                            $row_description_third = @stripslashes_deep($values['row_' . $i . '_description_third_' . $j]);
                            $row_tooltip = @stripslashes_deep($values['row_' . $i . '_tooltip_' . $j]);
                            $row_tooltip_second = @stripslashes_deep($values['row_' . $i . '_tooltip_second_' . $j]);
                            $row_tooltip_third = @stripslashes_deep($values['row_' . $i . '_tooltip_third_' . $j]);
                            $row_des_style_bold = @stripslashes_deep($values['body_li_style_bold_column_' . $i . '_arp_row_' . $j]);
                            $row_des_style_italic = @stripslashes_deep($values['body_li_style_italic_column_' . $i . '_arp_row_' . $j]);
                            $row_des_style_decoration = @stripslashes_deep($values['body_li_style_decoration_column_' . $i . '_arp_row_' . $j]);
                            $row_caption_style_bold = @stripslashes_deep($values['body_li_style_bold_caption_column_' . $i . '_arp_row_' . $j]);
                            $row_caption_style_italic = @stripslashes_deep($values['body_li_style_italic_caption_column_' . $i . '_arp_row_' . $j]);
                            $row_caption_style_decoration = @stripslashes_deep($values['body_li_style_decoration_caption_column_' . $i . '_arp_row_' . $j]);
                            $row_custom_css = @stripslashes_deep($values['row_' . $i . '_custom_css_' . $j]);
                            $row_hover_custom_css = @stripslashes_deep($values['row_hover_' . $i . '_custom_css_' . $j]);

                            $row[$row_title] = array('row_des_txt_align' => $row_des_align, 'row_description' => $row_des, 'row_description_second' => $row_description_second, 'row_description_third' => $row_description_third, 'row_tooltip' => $row_tooltip, 'row_tooltip_second' => $row_tooltip_second, 'row_tooltip_third' => $row_tooltip_third, 'row_label' => $row_label, 'row_label_second' => $row_label_second, 'row_label_third' => $row_label_third, 'row_des_style_bold' => $row_des_style_bold, 'row_des_style_italic' => $row_des_style_italic, 'row_des_style_decoration' => $row_des_style_decoration, 'row_caption_style_bold' => $row_caption_style_bold, 'row_caption_style_italic' => $row_caption_style_italic, 'row_caption_style_decoration' => $row_caption_style_decoration, 'row_custom_css' => $row_custom_css, 'row_hover_custom_css' => $row_hover_custom_css);

                            unset($values['row_' . $i . '_description_text_alignment_' . $j]);
                            unset($values['row_' . $i . '_description_' . $j]);
                            unset($values['row_' . $i . '_tooltip_' . $j]);
                            unset($values['row_' . $i . '_description_second_' . $j]);
                            unset($values['row_' . $i . '_description_third_' . $j]);
                            unset($values['body_li_style_bold_column_' . $i . '_arp_row_' . $j]);
                            unset($values['body_li_style_italic_column_' . $i . '_arp_row_' . $j]);
                            unset($values['body_li_style_decoration_column_' . $i . '_arp_row_' . $j]);
                            unset($values['body_li_style_bold_caption_column_' . $i . '_arp_row_' . $j]);
                            unset($values['body_li_style_italic_caption_column_' . $i . '_arp_row_' . $j]);
                            unset($values['body_li_style_decoration_caption_column_' . $i . '_arp_row_' . $j]);
                        }
                    }
                    $body_text_alignemnt = @$values['body_text_alignment_' . $i];
                    $btn_size = @$values['button_size_' . $i];
                    $btn_height = @$values['button_height_' . $i];
                    $btn_type = @$values['button_type_' . $i];
                    $btn_text = @stripslashes_deep($values['btn_content_' . $i]);
                    $btn_content_second = @stripslashes_deep($values['btn_content_second_' . $i]);
                    $btn_content_third = @stripslashes_deep($values['btn_content_third_' . $i]);
                    $paypal_btn = @stripslashes_deep($values['paypal_code_' . $i]);
                    $paypal_btn_second = @stripslashes_deep($values['paypal_code_second_' . $i]);
                    $paypal_btn_third = @stripslashes_deep($values['paypal_code_third_' . $i]);
                    $btn_link = @$values['btn_link_' . $i];
                    $btn_link_second = @$values['btn_link_second_' . $i];
                    $btn_link_third = @$values['btn_link_third_' . $i];
                    $btn_img = @$values['btn_img_url_' . $i];
                    $btn_img_height = @$values['button_img_height_' . $i];
                    $btn_img_width = @$values['button_img_width_' . $i];
                    $hide_default_btn = @$values['arp_hide_default_btn_' . $i];
                    $is_new_window = @$values['new_window_' . $i];
                    $is_new_window_actual = @$values['new_window_actual_' . $i];

                    if (!@$table_columns[$Title]['row_order'] || !is_array(@$table_columns[$Title]['row_order'])) {
                        @parse_str($values[$Title . '_row_order'], $col_row_order);
                        $row_order = @$col_row_order;
                    } else
                        $row_order = @$table_columns[$Title]['row_order'];

                    $ribbon_settings = array(
                        'arp_ribbon' => $column_ribbon_style,
                        'arp_ribbon_bgcol' => $column_ribbon_bgcolor,
                        'arp_ribbon_txtcol' => $column_ribbon_txtcolor,
                        'arp_ribbon_position' => $column_ribbon_position,
                        'arp_ribbon_content' => $column_ribbon_content,
                        'arp_ribbon_content_second' => $column_ribbon_content_second,
                        'arp_ribbon_content_third' => $column_ribbon_content_third,
                        'arp_ribbon_custom_position_rl' => $column_ribbon_position_rl,
                        'arp_ribbon_custom_position_top' => $column_ribbon_position_top,
                        'arp_custom_ribbon' => $column_custom_ribbon_url,
                        'arp_custom_ribbon_second' => $column_custom_ribbon_url_second,
                        'arp_custom_ribbon_third' => $column_custom_ribbon_url_third,
                    );

                    $column[$Title] = array(
                        'package_title' => $column_title,
                        'package_title_second' => $column_title_second,
                        'package_title_third' => $column_title_third,
                        'column_width' => $column_width,
                        'is_caption' => $caption,
                        'column_description' => $column_desc,
                        'column_description_second' => $column_desc_second,
                        'column_description_third' => $column_desc_third,
                        'custom_ribbon_txt' => $cstm_rbn_txt,
                        'column_highlight' => $column_highlight,
                        'is_post_variables' => $is_post_variables,
                        'post_variables_content' => $post_variables_content,
                        'post_variables_content_second' => $post_variables_content_second,
                        'post_variables_content_third' => $post_variables_content_third,
                        'column_background_color' => $column_background_color,
                        'column_hover_background_color' => $column_hover_background_color,
                        'arp_change_bgcolor' => $arp_change_bgcolor,
                        'column_background_image' => $column_background_image,
                        'column_background_image_height' => $column_background_image_height,
                        'column_background_image_width' => $column_background_image_width,
                        'column_background_scaling' => $column_background_scaling,
                        'column_background_min_positon' => $column_background_min_positon,
                        'column_background_max_positon' => $column_background_max_positon,
                        'arp_header_shortcode' => $header_shortcode,
                        'arp_header_shortcode_second' => $header_shortcode_second,
                        'arp_header_shortcode_third' => $header_shortcode_third,
                        'arp_shortcode_customization_size' => $arp_shortcode_customization_size,
                        'arp_shortcode_customization_style' => $arp_shortcode_customization_style,
                        'shortcode_background_color' => $shortcode_background_color,
                        'shortcode_font_color' => $shortcode_font_color,
                        'shortcode_hover_background_color' => $shortcode_hover_background_color,
                        'shortcode_hover_font_color' => $shortcode_hover_font_color,
                        'html_content' => $html_content,
                        'html_content_second' => $html_content_second,
                        'html_content_third' => $html_content_third,
                        'price_text' => $price_text,
                        'price_text_two_step' => $price_text_two_step,
                        'price_text_three_step' => $price_text_three_step,
                        'price_text_input_two_step_price' => $price_text_input_two_step_price,
                        'price_text_input_three_step_price' => $price_text_input_three_step_price,
                        'price_text_input_two_step_label' => $price_text_input_two_step_label,
                        'price_text_input_three_step_label' => $price_text_input_three_step_label,
                        'price_label' => $price_label,
                        'gmap_marker' => @$google_map_marker,
                        'body_text_alignment' => @$body_text_alignemnt,
                        'rows' => $row,
                        'button_size' => $btn_size,
                        'button_height' => $btn_height,
                        'button_type' => $btn_type,
                        'button_text' => $btn_text,
                        'btn_content_second' => $btn_content_second,
                        'btn_content_third' => $btn_content_third,
                        'paypal_code' => $paypal_btn,
                        'paypal_code_second' => $paypal_btn_second,
                        'paypal_code_third' => $paypal_btn_third,
                        'hide_default_btn' => $hide_default_btn,
                        'button_url' => $btn_link,
                        'button_url_second' => $btn_link_second,
                        'button_url_third' => $btn_link_third,
                        'btn_img' => $btn_img,
                        'btn_img_height' => $btn_img_height,
                        'btn_img_width' => $btn_img_width,
                        'is_new_window' => $is_new_window,
                        'is_new_window_actual' => $is_new_window_actual,
                        'row_order' => $row_order,
                        'ribbon_setting' => $ribbon_settings,
                        'header_background_color' => $header_background_color,
                        'header_hover_background_color' => $header_hover_background_color,
                        'header_font_family' => $header_font_family,
                        'header_font_size' => $header_font_size,
                        'header_font_color' => $header_font_color,
                        'header_hover_font_color' => $header_hover_font_color,
                        'header_font_align' => $header_font_align,
                        'header_font_style' => $header_font_style,
                        'header_style_bold' => $header_style_bold,
                        'header_style_italic' => $header_style_italic,
                        'header_style_decoration' => $header_style_decoration,
                        'header_background_image' => $header_background_image,
                        'price_background_color' => $price_background_color,
                        'price_hover_background_color' => $price_hover_background_color,
                        'price_font_family' => $price_font_family,
                        'price_font_size' => $price_font_size,
                        'price_font_style' => $price_font_style,
                        'price_font_color' => $price_font_color,
                        'price_hover_font_color' => $price_hover_font_color,
                        'price_font_align' => $price_font_align,
                        'price_label_style_bold' => $price_label_style_bold,
                        'price_label_style_italic' => $price_label_style_italic,
                        'price_label_style_decoration' => $price_label_style_decoration,
                        'price_text_font_family' => $price_text_font_family,
                        'price_text_font_size' => $price_text_font_size,
                        'price_text_font_style' => $price_text_font_style,
                        'price_text_font_color' => $price_text_font_color,
                        'price_text_hover_font_color' => $price_text_hover_font_color,
                        'price_text_style_bold' => $price_text_style_bold,
                        'price_text_style_italic' => $price_text_style_italic,
                        'price_text_style_decoration' => $price_text_style_decoration,
                        'content_font_family' => $content_font_family,
                        'content_font_size' => $content_font_size,
                        'content_font_style' => $content_font_style,
                        'content_font_color' => $content_font_color,
                        'content_even_font_color' => $content_even_font_color,
                        'content_hover_font_color' => $content_hover_font_color,
                        'content_even_hover_font_color' => $content_even_hover_font_color,
                        'content_odd_color' => $content_odd_color,
                        'content_odd_hover_color' => $content_odd_hover_color,
                        'content_even_color' => $content_even_color,
                        'content_even_hover_color' => $content_even_hover_color,
                        'body_li_style_bold' => $body_li_style_bold,
                        'body_li_style_italic' => $body_li_style_italic,
                        'body_li_style_decoration' => $body_li_style_decoration,
                        'content_label_font_family' => $content_label_font_family,
                        'content_label_font_size' => $content_label_font_size,
                        'content_label_font_style' => $content_label_font_style,
                        'content_label_font_color' => $content_label_font_color,
                        'content_label_hover_font_color' => $content_label_hover_font_color,
                        'body_label_style_bold' => $body_label_style_bold,
                        'body_label_style_italic' => $body_label_style_italic,
                        'body_label_style_decoration' => $body_label_style_decoration,
                        'button_background_color' => $button_background_color,
                        'button_hover_background_color' => $button_hover_background_color,
                        'button_font_family' => $button_font_family,
                        'button_font_size' => $button_font_size,
                        'button_font_color' => $button_font_color,
                        'button_hover_font_color' => $button_hover_font_color,
                        'button_font_style' => $button_font_style,
                        'button_style_bold' => $button_style_bold,
                        'button_style_italic' => $button_style_italic,
                        'button_style_decoration' => $button_style_decoration,
                        'column_description_font_family' => $column_description_font_family,
                        'column_description_font_size' => $column_description_font_size,
                        'column_description_font_style' => $column_description_font_style,
                        'column_description_font_color' => $column_description_font_color,
                        'column_description_hover_font_color' => $column_description_hover_font_color,
                        'column_desc_background_color' => $column_desc_background_color,
                        'column_desc_hover_background_color' => $column_desc_hover_background_color,
                        'column_description_style_bold' => $column_description_style_bold,
                        'column_description_style_italic' => $column_description_style_italic,
                        'column_description_style_decoration' => $column_description_style_decoration,
                        'description_text_alignment' => $column_description_text_align,
                        'footer_content' => $footer_content,
                        'footer_content_second' => $footer_content_second,
                        'footer_content_third' => $footer_content_third,
                        'footer_content_position' => $footer_content_position,
                        'footer_text_align' => $footer_text_align,
                        'footer_level_options_font_family' => $footer_level_options_font_family,
                        'footer_background_color' => $footer_background_color,
                        'footer_hover_background_color' => $footer_hover_background_color,
                        'footer_level_options_font_size' => $footer_level_options_font_size,
                        'footer_level_options_font_color' => $footer_level_options_font_color,
                        'footer_level_options_hover_font_color' => $footer_level_options_hover_font_color,
                        'footer_level_options_font_style_bold' => $footer_level_options_font_style_bold,
                        'footer_level_options_font_style_italic' => $footer_level_options_font_style_italic,
                        'footer_level_options_font_style_decoration' => $footer_level_options_font_style_decoration,
                    );
                }
            }
            else {
                $i = $new_id[0];
                $Title = 'column_' . $i;
                $column_width = @$values['column_width_' . $i];
                $column_title = @$values['column_title_' . $i];
                $column_title_second = @$values['column_title_second_' . $i];
                $column_title_third = @$values['column_title_third_' . $i];
                $column_desc = @$values['arp_column_description_' . $i];
                $column_desc_second = @$values['arp_column_description_second_' . $i];
                $column_desc_third = @$values['arp_column_description_third_' . $i];
                $cstm_rbn_txt = @$values['arp_custom_ribbon_txt_' . $i];
                $column_highlight = @$values['column_highlight_' . $i];
                $column_background_color = @$values['column_background_color_' . $i];
                $column_hover_background_color = @$values['column_hover_background_color_' . $i];
                $arp_change_bgcolor = @$values['arp_change_bgcolor_' . $i];
                $caption = isset($values['caption_column_' . $i]) ? $values['caption_column_' . $i] : 0;
                $column_background_image = @stripslashes_deep(@$values['arp_column_background_image_' . $i]);

                $column_background_image_height = @stripslashes_deep(@$values['arp_column_background_image_height_' . $i]);
                $column_background_image_width = @stripslashes_deep(@$values['arp_column_background_image_width_' . $i]);
                $column_background_scaling = @stripslashes_deep(@$values['column_background_scaling_' . $i]);
                $column_background_min_positon = @stripslashes_deep(@$values['column_background_min_positon_' . $i]);
                $column_background_max_positon = @stripslashes_deep(@$values['column_background_max_positon_' . $i]);


                $footer_content = @$values['footer_content_' . $i];
                $footer_content_second = @$values['footer_content_second_' . $i];
                $footer_content_third = @$values['footer_content_third_' . $i];
                $footer_content_position = @$values['footer_content_position_' . $i];
                $footer_text_align = @$values['arp_footer_text_alignment_' . $i];
                $footer_level_options_font_family = @$values['footer_level_options_font_family_' . $i];
                $footer_background_color = @$values['footer_bg_color_' . $i];
                $footer_hover_background_color = @$values['footer_hover_bg_color_' . $i];
                $footer_level_options_font_size = @$values['footer_level_options_font_size_' . $i];
                $footer_level_options_font_color = @$values['footer_level_options_font_color_' . $i];
                $footer_level_options_hover_font_color = @$values['footer_level_options_font_hover_color_' . $i];
                $footer_level_options_font_style_bold = @$values['footer_level_options_font_style_bold_' . $i];
                $footer_level_options_font_style_italic = @$values['footer_level_options_font_style_italic_' . $i];
                $footer_level_options_font_style_decoration = @$values['footer_level_options_font_style_decoration_' . $i];

                $header_shortcode = @stripslashes_deep(@$values['additional_shortcode_' . $i]);
                $header_shortcode_second = @stripslashes_deep(@$values['additional_shortcode_second_' . $i]);
                $header_shortcode_third = @stripslashes_deep(@$values['additional_shortcode_third_' . $i]);
                $arp_shortcode_customization_style = @stripslashes_deep(@$values['arp_shortcode_customization_style_' . $i]);
                $arp_shortcode_customization_size = @stripslashes_deep(@$values['arp_shortcode_customization_size_' . $i]);

                $shortcode_background_color = @stripslashes_deep(@$values['shortcode_background_color_' . $i]);
                $shortcode_font_color = @stripslashes_deep(@$values['shortcode_font_color_' . $i]);
                $shortcode_hover_background_color = @stripslashes_deep(@$values['shortcode_hover_background_color_' . $i]);
                $shortcode_hover_font_color = @stripslashes_deep(@$values['shortcode_hover_font_color_' . $i]);
                $html_content = @stripslashes_deep(@$values['html_content_' . $i]);
                $html_content_second = @stripslashes_deep(@$values['html_content_second_' . $i]);
                $html_content_third = @stripslashes_deep(@$values['html_content_third_' . $i]);
                $price_text = @stripslashes_deep(@$values['price_text_' . $i]);
                $price_text_two_step = @stripslashes_deep($values['price_text_two_step_' . $i]);
                $price_text_three_step = @stripslashes_deep($values['price_text_three_step_' . $i]);
                $price_text_input_two_step_price = @stripslashes_deep($values['price_text_input_two_step_price_' . $i]);
                $price_text_input_three_step_price = @stripslashes_deep($values['price_text_input_three_step_price_' . $i]);
                $price_text_input_two_step_label = @stripslashes_deep($values['price_text_input_two_step_label_' . $i]);
                $price_text_input_three_step_label = @stripslashes_deep($values['price_text_input_three_step_label_' . $i]);
                $price_label = @stripslashes_deep(@$values['price_label_' . $i]);
                $gmap_marker = @$values['gmap_marker_' . $i];
                $total_rows = @$values['total_rows_' . $i];

                $column_ribbon_style = @stripslashes_deep(@$values['arp_ribbon_style_' . $i]);
                $column_ribbon_position = @stripslashes_deep(@$values['arp_ribbon_position_' . $i]);
                $column_ribbon_bgcolor = @stripslashes_deep(@$values['arp_ribbon_bgcol_' . $i]);
                $column_ribbon_txtcolor = @stripslashes_deep(@$values['arp_ribbon_textcol_' . $i]);
                $column_ribbon_content = @stripslashes_deep(@$values['arp_ribbon_content_' . $i]);
                $column_ribbon_content_second = @stripslashes_deep(@$values['arp_ribbon_content_second_' . $i]);
                $column_ribbon_content_third = @stripslashes_deep(@$values['arp_ribbon_content_third_' . $i]);
                $column_ribbon_position_rl = @stripslashes_deep(@$values['arp_ribbon_custom_position_rl_' . $i]);
                $column_ribbon_position_top = @stripslashes_deep(@$values['arp_ribbon_custom_position_top_' . $i]);

                $is_post_variables = isset($values['post_variables_' . $i]) ? $values['post_variables_' . $i] : 0;
                $post_variables_content = isset($values['post_variables_content_' . $i]) ? $values['post_variables_content_' . $i] : '';
                $post_variables_content_second = isset($values['post_variables_content_second_' . $i]) ? $values['post_variables_content_second_' . $i] : '';
                $post_variables_content_third = isset($values['post_variables_content_third_' . $i]) ? $values['post_variables_content_third_' . $i] : '';

                $header_background_color = @$values['header_background_color_' . $i];
                $header_hover_background_color = @$values['header_hover_background_color_' . $i];

                $header_font_family = @$values['header_font_family_' . $i];
                $header_font_size = @$values['header_font_size_' . $i];
                $header_font_color = @$values['header_font_color_' . $i];
                $header_hover_font_color = @$values['header_hover_font_color_' . $i];
                $header_font_style = @$values['header_font_style_' . $i];

                $header_style_bold = @$values['header_style_bold_' . $i];
                $header_style_italic = @$values['header_style_italic_' . $i];
                $header_style_decoration = @$values['header_style_decoration_' . $i];
                $header_background_image = @stripslashes_deep(@$values['arp_header_background_image_' . $i]);

                $header_background_image = @$values['arp_header_background_image_' . $i];

                $price_background_color = @$values['price_background_color_' . $i];
                $price_hover_background_color = @$values['price_hover_background_color_' . $i];
                $price_font_family = @stripslashes_deep(@$values['price_font_family_' . $i]);
                $price_font_size = @$values['price_font_size_' . $i];
                $price_font_color = @$values['price_font_color_' . $i];
                $price_hover_font_color = @$values['price_hover_font_color_' . $i];
                $price_font_style = @$values['price_font_style_' . $i];

                $price_label_style_bold = @$values['price_label_style_bold_' . $i];
                $price_label_style_italic = @$values['price_label_style_italic_' . $i];
                $price_label_style_decoration = @$values['price_label_style_decoration_' . $i];

                $price_text_font_family = @stripslashes_deep(@$values['price_text_font_family_' . $i]);
                $price_text_font_size = @$values['price_text_font_size_' . $i];
                $price_text_font_style = @$values['price_text_font_style_' . $i];
                $price_text_font_color = @$values['price_text_font_color_' . $i];
                $price_text_hover_font_color = @$values['price_text_hover_font_color_' . $i];

                $price_text_style_bold = @$values['price_text_style_bold_' . $i];
                $price_text_style_italic = @$values['price_text_style_italic_' . $i];
                $price_text_style_decoration = @$values['price_text_style_decoration_' . $i];

                $column_description_font_family = @stripslashes_deep(@$values['column_description_font_family_' . $i]);
                $column_description_font_size = @stripslashes_deep(@$values['column_description_font_size_' . $i]);
                $column_description_font_style = @stripslashes_deep(@$values['column_description_font_style_' . $i]);
                $column_description_font_color = @stripslashes_deep(@$values['column_description_font_color_' . $i]);
                $column_description_hover_font_color = @stripslashes_deep(@$values['column_description_hover_font_color_' . $i]);
                $column_desc_background_color = @stripslashes_deep(@$values['column_desc_background_color_' . $i]);
                $column_desc_hover_background_color = @stripslashes_deep(@$values['column_desc_hover_background_color_' . $i]);

                $column_description_style_bold = @$values['column_description_style_bold_' . $i];
                $column_description_style_italic = @$values['column_description_style_italic_' . $i];
                $column_description_style_decoration = @$values['column_description_style_decoration_' . $i];
                $column_description_text_align = @$values['arp_description_text_alignment_' . $i];

                $content_font_family = @$values['content_font_family_' . $i];
                $content_font_size = @$values['content_font_size_' . $i];
                $content_font_color = @$values['content_font_color_' . $i];
                $content_even_font_color = @$values['content_even_font_color_' . $i];
                $content_hover_font_color = @$values['content_hover_font_color_' . $i];
                $content_even_hover_font_color = @$values['content_even_hover_font_color_' . $i];
                $content_font_style = @$values['content_font_style_' . $i];

                $content_odd_color = @$values['content_odd_color_' . $i];
                $content_odd_hover_color = @$values['content_odd_hover_color_' . $i];
                $content_even_color = @$Values['content_even_color_' . $i];
                $content_even_hover_color = @$Values['content_even_hover_color_' . $i];

                $body_li_style_bold = @$values['body_li_style_bold_' . $i];
                $body_li_style_italic = @$values['body_li_style_italic_' . $i];
                $body_li_style_decoration = @$values['body_li_style_decoration_' . $i];

                $content_label_font_family = @stripslashes_deep(@$values['content_label_font_family_' . $i]);
                $content_label_font_size = @$values['content_label_font_size_' . $i];
                $content_label_font_color = @stripslashes_deep(@$values['content_label_font_color_' . $i]);
                $content_label_hover_font_color = @stripslashes_deep(@$values['content_label_hover_font_color_' . $i]);
                $content_label_font_style = @$values['content_label_font_style_' . $i];

                $body_label_style_bold = @$values['body_label_style_bold_' . $i];
                $body_label_style_italic = @$values['body_label_style_italic_' . $i];
                $body_label_style_decoration = @$values['body_label_style_decoration_' . $i];

                $button_background_color = @$values['button_background_color_' . $i];
                $button_hover_background_color = @$values['button_hover_background_color_' . $i];
                $button_font_family = @$values['button_font_family_' . $i];
                $button_font_size = @$values['button_font_size_' . $i];
                $button_font_color = @$values['button_font_color_' . $i];
                $button_hover_font_color = @$values['button_hover_font_color_' . $i];
                $button_font_style = @$values['button_font_style_' . $i];

                $button_style_bold = @$values['button_style_bold_' . $i];
                $button_style_italic = @$values['button_style_italic_' . $i];
                $button_style_decoration = @$values['button_style_decoration_' . $i];

                $row = array();
                if ($total_rows > 0) {
                    for ($j = 0; $j < $total_rows; $j++) {
                        $row_title = 'row_' . $j;
                        $row_label = @$values['row_' . $i . '_label_' . $j];
                        $row_label_second = @$values['row_' . $i . '_label_second_' . $j];
                        $row_label_third = @$values['row_' . $i . '_label_third_' . $j];
                        $row_des_align = @$values['row_' . $i . '_description_text_alignment_' . $j];
                        $row_des = @stripslashes_deep(@$values['row_' . $i . '_description_' . $j]);
                        $row_description_second = @stripslashes_deep(@$values['row_' . $i . '_description_second_' . $j]);
                        $row_description_third = @stripslashes_deep(@$values['row_' . $i . '_description_third_' . $j]);
                        $row_tooltip = @stripslashes_deep(@$values['row_' . $i . '_tooltip_' . $j]);
                        $row_tooltip_second = @stripslashes_deep(@$values['row_' . $i . '_tooltip_second_' . $j]);
                        $row_tooltip_third = @stripslashes_deep(@$values['row_' . $i . '_tooltip_third_' . $j]);
                        $row_des_style_bold = @stripslashes_deep(@$values['body_li_style_bold_column_' . $i . '_arp_row_' . $j]);
                        $row_des_style_italic = @stripslashes_deep(@$values['body_li_style_italic_column_' . $i . '_arp_row_' . $j]);
                        $row_des_style_decoration = @stripslashes_deep(@$values['body_li_style_decoration_column_' . $i . '_arp_row_' . $j]);
                        $row_caption_style_bold = @stripslashes_deep(@$values['body_li_style_bold_caption_column_' . $i . '_arp_row_' . $j]);
                        $row_caption_style_italic = @stripslashes_deep(@$values['body_li_style_italic_caption_column_' . $i . '_arp_row_' . $j]);
                        $row_caption_style_decoration = @stripslashes_deep(@$values['body_li_style_decoration_caption_column_' . $i . '_arp_row_' . $j]);

                        $row_custom_css = @stripslashes_deep(@$values['row_' . $i . '_custom_css_' . $j]);
                        $row_hover_custom_css = @stripslashes_deep($values['row_hover_' . $i . '_custom_css_' . $j]);



                        $row[$row_title] = array('row_des_txt_align' => $row_des_align, 'row_description' => $row_des, 'row_description_second' => $row_description_second, 'row_description_third' => $row_description_third, 'row_tooltip' => $row_tooltip, 'row_tooltip_second' => $row_tooltip_second, 'row_tooltip_third' => $row_tooltip_third, 'row_label' => $row_label, 'row_label_second' => $row_label_second, 'row_label_third' => $row_label_third, 'row_des_style_bold' => $row_des_style_bold, 'row_des_style_italic' => $row_des_style_italic, 'row_des_style_decoration' => $row_des_style_decoration, 'row_caption_style_bold' => $row_caption_style_bold, 'row_caption_style_italic' => $row_caption_style_italic, 'row_caption_style_decoration' => $row_caption_style_decoration, 'row_custom_css' => $row_custom_css, 'row_hover_custom_css' => $row_hover_custom_css);

                        unset($values['row_' . $i . '_description_text_alignment_' . $j]);
                        unset($values['row_' . $i . '_description_' . $j]);
                        unset($values['row_' . $i . '_tooltip_' . $j]);
                        unset($values['row_' . $i . '_description_second_' . $j]);
                        unset($values['row_' . $i . '_description_third_' . $j]);
                        unset($values['body_li_style_bold_column_' . $i . '_arp_row_' . $j]);
                        unset($values['body_li_style_italic_column_' . $i . '_arp_row_' . $j]);
                        unset($values['body_li_style_decoration_column_' . $i . '_arp_row_' . $j]);
                        unset($values['body_li_style_bold_caption_column_' . $i . '_arp_row_' . $j]);
                        unset($values['body_li_style_italic_caption_column_' . $i . '_arp_row_' . $j]);
                        unset($values['body_li_style_decoration_caption_column_' . $i . '_arp_row_' . $j]);
                    }
                }
                $body_text_alignemnt = @$values['body_text_alignment_' . $i];
                $btn_size = @$values['button_size_' . $i];
                $btn_height = @$values['button_height_' . $i];
                $btn_type = @$values['button_type_' . $i];
                $btn_text = @stripslashes_deep(@$values['btn_content_' . $i]);
                $btn_content_second = @stripslashes_deep(@$values['btn_content_second_' . $i]);
                $btn_content_third = @stripslashes_deep(@$values['btn_content_third_' . $i]);
                $btn_link = @$values['btn_link_' . $i];
                $btn_link_second = @$values['btn_link_second_' . $i];
                $btn_link_third = @$values['btn_link_third_' . $i];
                $btn_img = @$values['btn_img_url_' . $i];
                $btn_img_height = @$values['button_img_height_' . $i];
                $btn_img_width = @$values['button_img_width_' . $i];
                $hide_default_btn = @$values['arp_hide_default_btn_' . $i];
                $is_new_window = @$values['new_window_' . $i];
                $is_new_window_actual = @$values['new_window_actual_' . $i];

                if (!@$table_columns[$Title]['row_order'] || !is_array(@$table_columns[$Title]['row_order'])) {
                    @parse_str($values[$Title . '_row_order'], $col_row_order);
                    $row_order = $col_row_order;
                } else
                    $row_order = $table_columns[$Title]['row_order'];

                $ribbon_settings = array(
                    'arp_ribbon' => $column_ribbon_style,
                    'arp_ribbon_bgcol' => $column_ribbon_bgcolor,
                    'arp_ribbon_txtcol' => $column_ribbon_txtcolor,
                    'arp_ribbon_position' => $column_ribbon_position,
                    'arp_ribbon_content' => $column_ribbon_content,
                    'arp_ribbon_content_second' => $column_ribbon_content_second,
                    'arp_ribbon_content_third' => $column_ribbon_content_third,
                    'arp_ribbon_custom_position_rl' => $column_ribbon_position_rl,
                    'arp_ribbon_custom_position_top' => $column_ribbon_position_top
                );

                $column[$Title] = array(
                    'package_title' => $column_title,
                    'package_title_second' => $column_title_second,
                    'package_title_third' => $column_title_third,
                    'column_width' => $column_width,
                    'is_caption' => $caption,
                    'column_highlight' => $column_highlight,
                    'column_background_color' => $column_background_color,
                    'column_hover_background_color' => $column_hover_background_color,
                    'arp_change_bgcolor' => $arp_change_bgcolor,
                    'custom_ribbon_txt' => $cstm_rbn_txt,
                    'column_description' => $column_desc,
                    'column_description_second' => $column_desc_second,
                    'column_description_third' => $column_desc_third,
                    'is_post_variables' => $is_post_variables,
                    'post_variables_content' => $post_variables_content,
                    'post_variables_content_second' => $post_variables_content_second,
                    'post_variables_content_third' => $post_variables_content_third,
                    'column_background_image' => $column_background_image,
                    'column_background_image_height' => $column_background_image_height,
                    'column_background_image_width' => $column_background_image_width,
                    'column_background_scaling' => $column_background_scaling,
                    'column_background_min_positon' => $column_background_min_positon,
                    'column_background_max_positon' => $column_background_max_positon,
                    'post_variables_content_second' => $post_variables_content_second,
                    'post_variables_content_third' => $post_variables_content_third,
                    
                    'arp_header_shortcode' => $header_shortcode,
                    'arp_header_shortcode_second' => $header_shortcode_second,
                    'arp_header_shortcode_third' => $header_shortcode_third,
                    'arp_shortcode_customization_size' => $arp_shortcode_customization_size,
                    'arp_shortcode_customization_style' => $arp_shortcode_customization_style,
                    'shortcode_background_color' => $shortcode_background_color,
                    'shortcode_font_color' => $shortcode_font_color,
                    'shortcode_hover_background_color' => $shortcode_hover_background_color,
                    'shortcode_hover_font_color' => $shortcode_hover_font_color,
                    'html_content' => $html_content,
                    'html_content_second' => $html_content_second,
                    'html_content_third' => $html_content_third,
                    'price_text' => $price_text,
                    'price_text_two_step' => $price_text_two_step,
                    'price_text_three_step' => $price_text_three_step,
                    'price_text_input_two_step_price' => $price_text_input_two_step_price,
                    'price_text_input_three_step_price' => $price_text_input_three_step_price,
                    'price_text_input_two_step_label' => $price_text_input_two_step_label,
                    'price_text_input_three_step_label' => $price_text_input_three_step_label,
                    'price_label' => $price_label,
                    'gmap_marker' => @$google_map_marker,
                    'body_text_alignment' => $body_text_alignemnt,
                    'rows' => $row,
                    'button_size' => $btn_size,
                    'button_height' => $btn_height,
                    'button_type' => $btn_type,
                    'button_text' => $btn_text,
                    'btn_content_second' => $btn_content_second,
                    'btn_content_third' => $btn_content_third,
                    'button_url' => $btn_link,
                    'button_url_second' => $btn_link_second,
                    'button_url_third' => $btn_link_third,
                    'btn_img' => $btn_img,
                    'btn_img_height' => $btn_img_height,
                    'btn_img_width' => $btn_img_width,

                    'hide_default_btn' => $hide_default_btn,
                    'is_new_window' => $is_new_window,
                    'is_new_window_actual' => $is_new_window_actual,
                    'row_order' => $row_order,
                    'ribbon_setting' => $ribbon_settings,
                    'header_background_color' => $header_background_color,
                    'header_hover_background_color' => $header_hover_background_color,
                    'header_font_family' => $header_font_family,
                    'header_font_size' => $header_font_size,
                    'header_font_color' => $header_font_color,
                    'header_hover_font_color' => $header_hover_font_color,
                    'header_font_style' => $header_font_style,
                    'header_style_bold' => $header_style_bold,
                    'header_style_italic' => $header_style_italic,
                    'header_style_decoration' => $header_style_decoration,
                    'header_background_image' => $header_background_image,
                    'price_background_color' => $price_background_color,
                    'price_hover_background_color' => $price_hover_background_color,
                    'price_font_family' => $price_font_family,
                    'price_font_size' => $price_font_size,
                    'price_font_style' => $price_font_style,
                    'price_font_color' => $price_font_color,
                    'price_hover_font_color' => $price_hover_font_color,
                    'price_label_style_bold' => $price_label_style_bold,
                    'price_label_style_italic' => $price_label_style_italic,
                    'price_label_style_decoration' => $price_label_style_decoration,
                    'price_text_font_family' => $price_text_font_family,
                    'price_text_font_size' => $price_text_font_size,
                    'price_text_font_style' => $price_text_font_style,
                    'price_text_font_color' => $price_text_font_color,
                    'price_text_hover_font_color' => $price_text_hover_font_color,
                    'price_text_style_bold' => $price_text_style_bold,
                    'price_text_style_italic' => $price_text_style_italic,
                    'price_text_style_decoration' => $price_text_style_decoration,
                    'content_font_family' => $content_font_family,
                    'content_font_size' => $content_font_size,
                    'content_font_style' => $content_font_style,
                    'content_font_color' => $content_font_color,
                    'content_even_font_color' => $content_even_font_color,
                    'content_hover_font_color' => $content_hover_font_color,
                    'content_even_hover_font_color' => $content_even_hover_font_color,
                    'content_odd_color' => $content_odd_color,
                    'content_odd_hover_color' => $content_odd_hover_color,
                    'content_even_color' => $content_even_color,
                    'content_even_hover_color' => $content_even_hover_color,
                    'body_li_style_bold' => $body_li_style_bold,
                    'body_li_style_italic' => $body_li_style_italic,
                    'body_li_style_decoration' => $body_li_style_decoration,
                    'content_label_font_family' => $content_label_font_family,
                    'content_label_font_size' => $content_label_font_size,
                    'content_label_font_style' => $content_label_font_style,
                    'content_label_font_color' => $content_label_font_color,
                    'content_label_hover_font_color' => $content_label_hover_font_color,
                    'body_label_style_bold' => $body_label_style_bold,
                    'body_label_style_italic' => $body_label_style_italic,
                    'body_label_style_decoration' => $body_label_style_decoration,
                    'button_background_color' => $button_background_color,
                    'button_hover_background_color' => $button_hover_background_color,
                    'button_font_family' => $button_font_family,
                    'button_font_size' => $button_font_size,
                    'button_font_color' => $button_font_color,
                    'button_hover_font_color' => $button_hover_font_color,
                    'button_font_style' => $button_font_style,
                    'button_style_bold' => $button_style_bold,
                    'button_style_italic' => $button_style_italic,
                    'button_style_decoration' => $button_style_decoration,
                    'column_description_font_family' => $column_description_font_family,
                    'column_description_font_size' => $column_description_font_size,
                    'column_description_font_style' => $column_description_font_style,
                    'column_desc_background_color' => $column_desc_background_color,
                    'column_desc_hover_background_color' => $column_desc_hover_background_color,
                    'column_description_font_color' => $column_description_font_color,
                    'column_description_hover_font_color' => $column_description_hover_font_color,
                    'column_description_style_bold' => $column_description_style_bold,
                    'column_description_style_italic' => $column_description_style_italic,
                    'column_description_style_decoration' => $column_description_style_decoration,
                    'description_text_alignment' => $column_description_text_align,
                    'footer_content' => $footer_content,
                    'footer_content_second' => $footer_content_second,
                    'footer_content_third' => $footer_content_third,
                    'footer_content_position' => $footer_content_position,
                    'footer_text_align' => $footer_text_align,
                    'footer_level_options_font_family' => $footer_level_options_font_family,
                    'footer_background_color' => $footer_background_color,
                    'footer_hover_background_color' => $footer_hover_background_color,
                    'footer_level_options_font_size' => $footer_level_options_font_size,
                    'footer_level_options_font_color' => $footer_level_options_font_color,
                    'footer_level_options_hover_font_color' => $footer_level_options_hover_font_color,
                    'footer_level_options_font_style_bold' => $footer_level_options_font_style_bold,
                    'footer_level_options_font_style_italic' => $footer_level_options_font_style_italic,
                    'footer_level_options_font_style_decoration' => $footer_level_options_font_style_decoration,
                );
            }
        }
        else {
            return;
        }

        $uns_table_opt['columns'] = $column;

        $table_options = maybe_serialize($uns_table_opt);

        $table_arr = array('table_id' => $table_id, 'general_options' => $general_opt, 'table_options' => $table_options, 'is_template' => $is_template, 'template_name' => $template_name, 'is_animated' => $is_animated);


        return $table_arr;
    }

    function arp_updatetabledata() {
        $all_previewtabledata_option = get_option('arp_previewoptions');
        $all_previewtabledata_option = maybe_unserialize($all_previewtabledata_option);
        $all_previewtabledata_option = (array) $all_previewtabledata_option;

        if (get_option('arp_previewtabledata_1') == '') {
            update_option('arp_previewtabledata_1', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_1'] = time();
            echo 'arp_previewtabledata_1';
        } else if (get_option('arp_previewtabledata_2') == '') {
            update_option('arp_previewtabledata_2', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_2'] = time();
            echo 'arp_previewtabledata_2';
        } else if (get_option('arp_previewtabledata_3') == '') {
            update_option('arp_previewtabledata_3', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_3'] = time();
            echo 'arp_previewtabledata_3';
        } else if (get_option('arp_previewtabledata_4') == '') {
            update_option('arp_previewtabledata_4', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_4'] = time();
            echo 'arp_previewtabledata_4';
        } else if (get_option('arp_previewtabledata_5') == '') {
            update_option('arp_previewtabledata_5', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_5'] = time();
            echo 'arp_previewtabledata_5';
        } else if (get_option('arp_previewtabledata_6') == '') {
            update_option('arp_previewtabledata_6', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_6'] = time();
            echo 'arp_previewtabledata_6';
        } else if (get_option('arp_previewtabledata_7') == '') {
            update_option('arp_previewtabledata_7', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_7'] = time();
            echo 'arp_previewtabledata_7';
        } else if (get_option('arp_previewtabledata_8') == '') {
            update_option('arp_previewtabledata_8', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_8'] = time();
            echo 'arp_previewtabledata_8';
        } else if (get_option('arp_previewtabledata_9') == '') {
            update_option('arp_previewtabledata_9', $_POST);
            $all_previewtabledata_option['arp_previewtabledata_9'] = time();
            echo 'arp_previewtabledata_9';
        } else {
            $random = rand(11, 9999);
            if (get_option('arp_previewtabledata_' . $random) != '')
                $random = rand(11, 9999);
            update_option('arp_previewtabledata_' . $random, $_POST);
            $all_previewtabledata_option['arp_previewtabledata_' . $random] = time();
            echo 'arp_previewtabledata_' . $random;
        }

        update_option('arp_previewoptions', $all_previewtabledata_option);

        die();
    }

    function get_table_enqueue_data($tablearr = array()) {
        if (!$tablearr)
            return;

        global $wpdb;

        $tableresutls = array();

        foreach ($tablearr as $table_id) {
            $tabledata = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE ID = %d and is_template = 0", $table_id));
            $tableoption = $wpdb->get_row($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice_options WHERE table_id = %d", $table_id));

            if ($tabledata && $tableoption) {
                $general_options = maybe_unserialize($tabledata->general_options);
                $table_options = maybe_unserialize($tableoption->table_options);

                $googlemap = 0;
                if ($table_options['columns']) {
                    foreach ($table_options['columns'] as $columns) {
                        $html_content_shortcode = isset($columns['arp_header_shortcode']) ? $columns['arp_header_shortcode'] : "";
                        $html_content_second_shortcode = isset($columns['arp_header_shortcode_second']) ? $columns['arp_header_shortcode_second'] : "";
                        $html_content_third_shortcode = isset($columns['arp_header_shortcode_third']) ? $columns['arp_header_shortcode_third'] : "";
                        if (preg_match('/arp_googlemap/', $html_content_shortcode))
                            $googlemap = 1;
                        if (preg_match('/arp_googlemap/', $html_content_second_shortcode))
                            $googlemap = 1;
                        if (preg_match('/arp_googlemap/', $html_content_third_shortcode))
                            $googlemap = 1;
                    }
                }

                $tableresutls[$tabledata->ID] = array(
                    'template' => $general_options['template_setting']['template'],
                    'skin' => $general_options['template_setting']['skin'],
                    'template_name' => $tabledata->template_name,
                    'is_template' => $tabledata->is_template,
                    'googlemap' => $googlemap,
                );
            }
        }

        return $tableresutls;
    }

    function arp_choose_template_type($template_1 = '') {
        global $arp_mainoptionsarr;
        if ($template_1 == '')
            $template = $_REQUEST['template'];
        else
            $template = $template_1;

        if ($template_1 != '')
            return $arp_mainoptionsarr['general_options']['template_options']['template_type'][$template];
        else
            echo $arp_mainoptionsarr['general_options']['template_options']['template_type'][$template];

        die();
    }

    function arp_widget_text_filter($content) {
        $regex = '/\[\s*ARPrice\s+.*\]/';
        return preg_replace_callback($regex, array($this, 'arp_widget_text_filter_callback'), $content);
    }

    function arp_widget_text_filter_callback($matches) {

        global $arprice_form, $arprice_version;

        if ($matches[0]) {
            $parts = explode("id=", $matches[0]);
            $partsnew = explode(" ", $parts[1]);
            $tableid = $partsnew[0];
            $tableid = @trim($tableid);
            if ($tableid) {
                $newvalues_enqueue = $arprice_form->get_table_enqueue_data(array($tableid));

                if (is_array($newvalues_enqueue) && count($newvalues_enqueue) > 0) {
                    $to_google_map = 0;
                    $templates = array();

                    foreach ($newvalues_enqueue as $newqnqueue) {
                        if ($newqnqueue['googlemap'])
                            $to_google_map = 1;

                        $templates[] = $newqnqueue['template'];
                    }

                    $templates = array_unique($templates);

                    if ($to_google_map) {
                        wp_register_script('arp_googlemap_js', 'http://maps.google.com/maps/api/js?sensor=false', array(), $arprice_version);

                        wp_enqueue_script('arp_googlemap_js');

                        wp_register_script('arp_gomap_js', PRICINGTABLE_URL . '/js/jquery.gomap-1.3.2.min.js', array(), $arprice_version);

                        wp_enqueue_script('arp_gomap_js');
                    }

                    if ($templates) {
                        wp_enqueue_script('arprice_js');
                        wp_enqueue_script('arp_animate_numbers');
                        wp_enqueue_script('arprice_slider_js');
                        wp_enqueue_script('arp_tooltip_front');

                        wp_enqueue_style('arprice_front_css');
                        wp_enqueue_style('arprice_front_tooltip_css');
                        wp_enqueue_style('arp_fontawesome_css');
                        wp_enqueue_style('arprice_font_css_front');

                        foreach ($templates as $template) {
                            foreach ($newvalues_enqueue as $template_id => $newqnqueue) {
                                if (isset($newqnqueue['is_template']) && !empty($newqnqueue['is_template'])) {
                                    wp_register_style('arptemplate_' . $newqnqueue['template_name'] . '_css', PRICINGTABLE_URL . '/css/templates/arptemplate_' . $newqnqueue['template_name'] . '.css', array(), $arprice_version);
                                    wp_enqueue_style('arptemplate_' . $newqnqueue['template_name'] . '_css');
                                } else {

                                    wp_register_style('arptemplate_' . $template_id . '_css', PRICINGTABLE_UPLOAD_URL . '/css/arptemplate_' . $template_id . '.css', array(), $arprice_version);
                                    wp_enqueue_style('arptemplate_' . $template_id . '_css');
                                }
                            }
                        }
                    }
                }
            }
        }

        return do_shortcode($matches[0]);
    }

    function hex2rgb($colour) {

        if (isset($colour[0]) && $colour[0] == '#') {
            $colour = substr($colour, 1);
        }
        if (strlen($colour) == 6) {
            list( $r, $g, $b ) = array($colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5]);
        } elseif (strlen($colour) == 3) {
            list( $r, $g, $b ) = array($colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2]);
        } else {
            return false;
        }
        $r = hexdec($r);
        $g = hexdec($g);
        $b = hexdec($b);
        return array('red' => $r, 'green' => $g, 'blue' => $b);
    }

    function arp_load_pricing_table() {

        global $wpdb, $arp_mainoptionsarr;

        require_once PRICINGTABLE_DIR . '/core/classes/class.arprice_preview_editor.php';

        $template_id = $_REQUEST['id'];

        $template = $_REQUEST['template'];

        $skin = $_REQUEST['skin'];

        $ref_template = $_REQUEST['ref_temp'];

        $is_clone = $_REQUEST['is_clone'];

        $sql = $wpdb->get_results($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'arp_arprice WHERE ID = %d ', $template_id));

        $table_name = $sql[0]->table_name;

        $general_options = json_encode(maybe_unserialize(stripslashes($sql[0]->general_options)));


        $opt = maybe_unserialize($sql[0]->general_options);

        $is_animated = $sql[0]->is_animated;

        $columns = $wpdb->get_results($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'arp_arprice_options WHERE table_id = %d', $template_id));

        $column_options = json_encode(maybe_unserialize(stripslashes($columns[0]->table_options)));

        $table = arp_get_pricing_table_string_editor($template_id, $table_name, 2, '', '', $is_clone);

        $template_skins = json_encode($arp_mainoptionsarr['general_options']['template_options']['skins'][$ref_template]);

        $template_skin_codes = json_encode($arp_mainoptionsarr['general_options']['template_options']['skin_color_code'][$ref_template]);

        $options = json_decode($general_options, true);

        $general_settings = json_encode($options['general_settings']);

        $template_settings = json_encode($options['template_setting']);

        $template_type = $this->arp_choose_template_type($ref_template);

        $columns = maybe_unserialize(stripslashes($columns[0]->table_options));

        $template_feature = json_encode($arp_mainoptionsarr['general_options']['template_options']['features'][$ref_template]);

        $total_columns = count($columns['columns']);

        $json_array = array('table' => $table, 'table_name' => $table_name, 'general_settings' => $general_settings, 'template_settings' => $template_settings, 'column_options' => $column_options, 'template_skins' => $template_skins, 'template_skin_codes' => $template_skin_codes, 'template_type' => $template_type, 'total_columns' => $total_columns, 'is_animated' => $is_animated, 'template_features' => $template_feature, 'general_options' => $general_options);

        $json_array = json_encode($json_array);

        echo $json_array;

        die();
    }

    function font_settings($selected_fonts = '') {

        global $arprice_fonts;

        $default_fonts = $arprice_fonts->get_default_fonts();

        $google_fonts = $arprice_fonts->google_fonts_list();

        $str = '';

        $str .= '<optgroup label="' . __('Default Fonts', ARP_PT_TXTDOMAIN) . '">';

        foreach ($default_fonts as $font) {
            $str .= '<option style="font-family:' . $font . '" id="normal" ' . selected($font, $selected_fonts, false) . ' value="' . $font . '">' . $font . '</option>';
        }

        $str .= '</optgroup>';

        $str .= '<optgroup label="' . __('Google Fonts', ARP_PT_TXTDOMAIN) . '">';

        foreach ($google_fonts as $font) {
            $str .= '<option style="font-family:' . $font . '" id="google" ' . selected($font, $selected_fonts, false) . ' value="' . $font . '">' . $font . '</div>';
        }

        $str.= '</optgroup>';

        return $str;
    }

    function add_new_row_new() {

        $total_rows = $_POST['total_rows'];

        if ($total_rows == 'NaN' or $total_rows == '') {
            $total_rows = 0;
        }

        $features = json_decode(stripslashes_deep($_POST['template_features']), true);

        $column_id = $_POST['column'];

        $template = $_POST['template'];

        $toggle_selected = $_POST['toggle_selected'];

        $one_toggle_selected = $two_toggle_selected = $three_toggle_selected = '';

        if ($toggle_selected == 1) {
            $two_toggle_selected = ' toggle_selected ';
        } else if ($toggle_selected == 2) {
            $three_toggle_selected = ' toggle_selected ';
        } else {
            $one_toggle_selected = ' toggle_selected ';
        }

        $li_id = $total_rows;

        $new_row_string = "";

        $new_row_wrapper = "";

        $new_row_tooltip = "";

        $new_row_label = "";

        $new_row_string .= "<li id='arp_row_" . $li_id . "' class='arpbodyoptionrow' data-column='main_column_" . $column_id . "' style=''>";

        if ($features['caption_style'] == 'style_2') {
            $new_row_string .= "<span class='caption_detail' title=''>";
            $new_row_string .= "<div class='row_description_first_step toggle_step_first $one_toggle_selected'></div>";
            $new_row_string .= "<div class='row_description_second_step toggle_step_second $two_toggle_selected'></div>";
            $new_row_string .= "<div class='row_description_third_step toggle_step_third $three_toggle_selected'></div>";
            $new_row_string .= "</span>";

            $new_row_string .= "<span class='caption_li'>";
            $new_row_string .= "<div class='row_label_first_step toggle_step_first $one_toggle_selected'></div>";
            $new_row_string .= "<div class='row_label_second_step toggle_step_second $two_toggle_selected'></div>";
            $new_row_string .= "<div class='row_label_third_step toggle_step_third $three_toggle_selected'></div>";
            $new_row_string .= "</span>";
        } else if ($features['caption_style'] == 'style_1') {
            $new_row_string .= "<span class='caption_li'>";
            $new_row_string .= "<div class='row_label_first_step toggle_step_first $one_toggle_selected'></div>";
            $new_row_string .= "<div class='row_label_second_step toggle_step_second $two_toggle_selected'></div>";
            $new_row_string .= "<div class='row_label_third_step toggle_step_third $three_toggle_selected'></div>";
            $new_row_string .= "</span>";
            $new_row_string .= "<span class='caption_detail' title=''>";
            $new_row_string .= "<div class='row_description_first_step toggle_step_first $one_toggle_selected'></div>";
            $new_row_string .= "<div class='row_description_second_step toggle_step_second $two_toggle_selected'></div>";
            $new_row_string .= "<div class='row_description_third_step toggle_step_third $three_toggle_selected'></div>";
            $new_row_string .= "</span>";
        } else {
            $new_row_string .= "<span class='' title=''>";
            $new_row_string .= "<div class='row_label_first_step toggle_step_first $one_toggle_selected'></div>";
            $new_row_string .= "<div class='row_label_second_step toggle_step_second $two_toggle_selected'></div>";
            $new_row_string .= "<div class='row_label_third_step toggle_step_third $three_toggle_selected'></div>";
            $new_row_string .= "</span>";
        }

        $new_row_string .= "</li>";

        // New Row Description

        $new_row_wrapper .= "<div id='arp_row_" . $li_id . "' class='arp_row_wrapper' style=''>";




        $new_row_wrapper .= "<div id='description" . $li_id . "' class='col_opt_row arp_row_" . $li_id . "' style='display:none;'>";

        $new_row_wrapper .= "<div class='col_opt_title_div'>" . __('Description', ARP_PT_TXTDOMAIN) . "</div>";

        $new_row_wrapper .= "<div class='col_opt_input_div'>";

        $new_row_wrapper .= "<ul class='column_tabs'>";

        $new_row_wrapper .= "<li class='option_title selected toggle_step_first_tab' id='description_yearly_tab' data-column='" . $column_id . "' onClick='arp_toggle_tabs_select(\"description_yearly_tab\", \"description_monthly_tab\", \"description_quarterly_tab\", \"$column_id\")'>" . stripslashes_deep(@$general_option['general_settings']['togglestep_yearly']) . "</li>";

        $new_row_wrapper .= "<li class='option_title toggle_step_second_tab' id='description_monthly_tab' data-column='" . $column_id . "' onClick='arp_toggle_tabs_select(\"description_monthly_tab\", \"description_yearly_tab\", \"description_quarterly_tab\", \"$column_id\")'>" . stripslashes_deep(@$general_option['general_settings']['togglestep_monthly']) . "</li>";

        $new_row_wrapper .= "<li class='option_title toggle_step_third_tab' id='description_quarterly_tab' data-column='" . $column_id . "' onClick='arp_toggle_tabs_select(\"description_quarterly_tab\", \"description_monthly_tab\", \"description_yearly_tab\", \"$column_id\")'>" . stripslashes_deep(@$general_option['general_settings']['togglestep_quarterly']) . "</li>";

        $new_row_wrapper .= "</ul>";

        $new_row_wrapper .= "<div class='option_tab' id='description_yearly_tab'>";

        $new_row_wrapper .= "<textarea id='arp_li_description' class='col_opt_textarea row_description_first' name='row_" . $column_id . "_description_" . $li_id . "'>";

        $new_row_wrapper .= "</textarea>";

        $new_row_wrapper .= "</div>";

        $new_row_wrapper .= "<div class='option_tab' id='description_monthly_tab' style='display:none;'>";

        $new_row_wrapper .= "<textarea id='row_description_second' class='col_opt_textarea row_description_second' name='row_" . $column_id . "_description_second_" . $li_id . "'>";

        $new_row_wrapper .= "</textarea>";

        $new_row_wrapper .= "</div>";

        $new_row_wrapper .= "<div class='option_tab' id='description_quarterly_tab' style='display:none;'>";

        $new_row_wrapper .= "<textarea id='row_description_third' class='col_opt_textarea row_description_third' name='row_" . $column_id . "_description_third_" . $li_id . "'>";

        $new_row_wrapper .= "</textarea>";

        $new_row_wrapper .= "</div>";

        $new_row_wrapper .= "</div>";

        $new_row_wrapper .= "</div>";


        $new_row_wrapper .= "<div class='col_opt_row arp_row_" . $li_id . "' id='body_li_add_shortcode" . $li_id . "' >";
        $new_row_wrapper .= "<div class='col_opt_btn_div'>";
        $new_row_wrapper .= "<button type='button' class='col_opt_btn_icon arp_add_row_object arptooltipster align_left' name='" . $column_id . "_add_body_li_object_" . $li_id . "' id='arp_add_row_object' data-insert='arp_row_" . $li_id . " textarea#arp_li_description' data-column='main_column_" . $column_id . "' title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "'>";
        $new_row_wrapper .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";
        $new_row_wrapper .= "</button>";
        $new_row_wrapper .= "<label style='float:left;width:10px;'>&nbsp;</label>";


        $new_row_wrapper .= "<button type='button' class='col_opt_btn_icon align_left arptooltipster arp_add_row_shortcode' id='arp_add_row_shortcode' name='row_" . $column_id . "_add_description_shortcode_btn_" . $li_id . "' col-id=" . $column_id . " data-id='" . $column_id . "' data-row-id='' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
        $new_row_wrapper .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
        $new_row_wrapper .= "</button>";
        $new_row_wrapper .= "<div class='arp_font_awesome_model_box_container'></div>";

        $new_row_wrapper .= "<div class='arp_add_image_container'>";
        $new_row_wrapper .= "<div class='arp_add_image_arrow'></div>";
        $new_row_wrapper .= "<div class='arp_add_img_content'>";

        $new_row_wrapper .= "<div class='arp_add_img_row'>";
        $new_row_wrapper .= "<div class='arp_add_img_label'>";
        $new_row_wrapper .= __('Image URL', ARP_PT_TXTDOMAIN);
        $new_row_wrapper .= "<span class='arp_model_close_btn' id='arp_add_image_container'><i class='fa fa-times'></i></span>";
        $new_row_wrapper .= "</div>";
        $new_row_wrapper .= "<div class='arp_add_img_option'>";
        $new_row_wrapper .= "<input type='text' value='' class='arp_modal_txtbox img' id='arp_header_image_url' name='arp_header_image_url' />";
        $new_row_wrapper .= "<button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'>";
        $new_row_wrapper .= __('Add File', ARP_PT_TXTDOMAIN);
        $new_row_wrapper .= "</button>";
        $new_row_wrapper .= "</div>";
        $new_row_wrapper .= "</div>";

        $new_row_wrapper .= "<div class='arp_add_img_row'>";
        $new_row_wrapper .= "<div class='arp_add_img_label'>";
        $new_row_wrapper .= __('Dimension ( height X width )', ARP_PT_TXTDOMAIN);
        $new_row_wrapper .= "</div>";
        $new_row_wrapper .= "<div class='arp_add_img_option'>";
        $new_row_wrapper .= "<input type='text' class='arp_modal_txtbox' id='arp_header_image_height' name='arp_header_image_height' /><label class='arp_add_img_note'>(px)</label>";
        $new_row_wrapper .= "<label>x</label>";
        $new_row_wrapper .= "<input type='text' class='arp_modal_txtbox' id='arp_header_image_width' name='arp_header_image_width' /><label class='arp_add_img_note'>(px)</label>";
        $new_row_wrapper .= "</div>";
        $new_row_wrapper .= "</div>";

        $new_row_wrapper .= "<div class='arp_add_img_row' style='margin-top:10px;'>";
        $new_row_wrapper .= "<div class='arp_add_img_label'>";
        $new_row_wrapper .= '<button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_image_btn">';
        $new_row_wrapper .= __('Add', ARP_PT_TXTDOMAIN);
        $new_row_wrapper .= '</button>';
        $new_row_wrapper .= '<button type="button" style="display:none;margin-right:10px;" onclick="arp_remove_object();" class="arp_modal_insert_shortcode_btn" name="arp_remove_img_btn" id="arp_remove_img_btn">';
        $new_row_wrapper .= __('Remove', ARP_PT_TXTDOMAIN);
        $new_row_wrapper .= '</button>';
        $new_row_wrapper .= "</div>";
        $new_row_wrapper .= "</div>";

        $new_row_wrapper .= "</div>";
        $new_row_wrapper .= "</div>";

        $new_row_wrapper .= "</div>";
        $new_row_wrapper .= "</div>";


        $new_row_wrapper .= "<div class='col_opt_row arp_row_" . $li_id . "' id='row_level_custom_css" . $li_id . "'>";
        $new_row_wrapper .= "<style class='arp_row_custom_css' id=arp_row_css_column_" . $column_id . "_row_" . $li_id . "></style>";
        $new_row_wrapper .= "<div class='col_opt_title_div'>" . __('Custom Css', ARP_PT_TXTDOMAIN) . "</div>";
        $new_row_wrapper .= "<div class='col_opt_input_div'>";
        $new_row_wrapper .= "<ul class='column_tabs_row_css' id='column_tabs_row_css_" . $li_id . "'>";
        $new_row_wrapper .= "<li class='option_title selected' id='normal_css' data-column='" . $column_id . "' onClick='arp_row_css_tabs_select(\"normal_css\", \"hover_css\",\"$column_id\",\"$li_id\")'>" . __('Normal State', ARP_PT_TXTDOMAIN) . "</li>";
        $new_row_wrapper .= "<li class='option_title' id='hover_css' data-column='" . $column_id . "' onClick='arp_row_css_tabs_select(\"hover_css\", \"normal_css\",\"$column_id\",\"$li_id\")'>" . __('Hover State', ARP_PT_TXTDOMAIN) . "</li>";
        $new_row_wrapper .= "</ul>";
        $new_row_wrapper .= "<textarea id='arp_row_level_custom_css' col-id=" . $column_id . " row-id='" . $li_id . "' class='col_opt_textarea' name='row_" . $column_id . "_custom_css_" . $li_id . "'>";
        $new_row_wrapper .= stripslashes_deep(isset($row['row_custom_css']) ? $row['row_custom_css'] : '');
        $new_row_wrapper .= "</textarea>";
        $new_row_wrapper .= "<textarea id='arp_row_level_hover_custom_css' col-id=" . $column_id . " row-id='" . $li_id . "' class='col_opt_textarea' name='row_hover_" . $column_id . "_custom_css_" . $li_id . "'  style='display:none;'>";

        $new_row_wrapper .= "</textarea>";
        $new_row_wrapper .= "</div>";
        $new_row_wrapper .= "<div class='col_opt_input_div'>";
        $new_row_wrapper .= "<div class='col_opt_title_div'>" . __('For Example', ARP_PT_TXTDOMAIN) . "</div>";
        $new_row_wrapper .= "<div class='arp_row_custom_css' data-code='color:#c9c9c9;' style='width:13%;'>color</div>";
        $new_row_wrapper .= "<div class='arp_row_custom_css' data-code='font-size:20px;' style='width:24%;'>font-size</div>";
        $new_row_wrapper .= "<div class='arp_row_custom_css' data-code='text-align:center;' style='width:25%;'>alignment</div>";
        $new_row_wrapper .= "<div class='arp_row_custom_css' data-code='font-weight:bold;'>font-weight</div>";
        $new_row_wrapper .= "</div>";
        $new_row_wrapper .= "</div>";


        $new_row_wrapper .= "<div class='col_opt_row arp_ok_div arp_row_" . $li_id . "' id='body_li_level_other_arp_ok_div__button_1" . $li_id . "'  >";
        $new_row_wrapper .= "<div class='col_opt_btn_div'>";
        $new_row_wrapper .= "<div class='col_opt_navigation_div'>";
        $new_row_wrapper .= "<i class='typcn typcn-arrow-up arp_navigation_arrow' id='row_up_arrow' data-column='{$column_id}' data-row-id='arp_row_{$li_id}' data-button-id='body_li_level_options__button_1'></i>&nbsp;";
        $new_row_wrapper .= "<i class='typcn typcn-arrow-down arp_navigation_arrow' id='row_down_arrow' data-column='{$column_id}' data-row-id='arp_row_{$li_id}' data-button-id='body_li_level_options__button_1'></i>&nbsp;";
        $new_row_wrapper .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='row_left_arrow' data-column='{$column_id}' data-row-id='arp_row_{$li_id}' data-button-id='body_li_level_options__button_1'></i>&nbsp;";
        $new_row_wrapper .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='row_right_arrow' data-column='{$column_id}' data-row-id='arp_row_{$li_id}' data-button-id='body_li_level_options__button_1'></i>&nbsp;";
        $new_row_wrapper .= "</div>";
        $new_row_wrapper .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
        $new_row_wrapper .= __('Ok', ARP_PT_TXTDOMAIN);
        $new_row_wrapper.= "</button>";
        $new_row_wrapper .= "</div>";
        $new_row_wrapper .= "</div>";

        $new_row_wrapper .= "</div>";

        // New Row Tooltip

        $new_row_tooltip .= "<div id='arp_row_" . $li_id . "' class='arp_tooltip_wrapper'>";

        $new_row_tooltip .= "<div id='tooltip" . $li_id . "' class='col_opt_row arp_row_" . $li_id . "' style='display:none'>";

        $new_row_tooltip .= "<div class='col_opt_title_div'>" . __('Tooltip', ARP_PT_TXTDOMAIN) . "</div>";

        $new_row_tooltip .= "<div class='col_opt_input_div'>";

        $new_row_tooltip .= "<ul class='column_tabs'>";

        $new_row_tooltip .= "<li class='option_title selected toggle_step_first_tab' id='tooltip_yearly_tab' data-column='" . $column_id . "' onClick='arp_toggle_tabs_select(\"tooltip_yearly_tab\", \"tooltip_monthly_tab\", \"tooltip_quarterly_tab\", \"$column_id\")'>" . stripslashes_deep(@$general_option['general_settings']['togglestep_yearly']) . "</li>";

        $new_row_tooltip .= "<li class='option_title toggle_step_second_tab' id='tooltip_monthly_tab' data-column='" . $column_id . "' onClick='arp_toggle_tabs_select(\"tooltip_monthly_tab\", \"tooltip_yearly_tab\", \"tooltip_quarterly_tab\", \"$column_id\")'>" . stripslashes_deep(@$general_option['general_settings']['togglestep_monthly']) . "</li>";

        $new_row_tooltip .= "<li class='option_title toggle_step_third_tab' id='tooltip_quarterly_tab' data-column='" . $column_id . "' onClick='arp_toggle_tabs_select(\"tooltip_quarterly_tab\", \"tooltip_monthly_tab\", \"tooltip_yearly_tab\", \"$column_id\")'>" . stripslashes_deep(@$general_option['general_settings']['togglestep_quarterly']) . "</li>";

        $new_row_tooltip .= "</ul>";

        $new_row_tooltip .= "<div class='option_tab' id='tooltip_yearly_tab'>";

        $new_row_tooltip .= "<textarea id='arp_li_tooltip' class='col_opt_textarea row_tooltip_first' name='row_" . $column_id . "_tooltip_" . $li_id . "' col-id='" . $column_id . "'></textarea>";

        $new_row_tooltip .= "</div>";

        $new_row_tooltip .= "<div class='option_tab' id='tooltip_monthly_tab' style='display:none;'>";

        $new_row_tooltip .= "<textarea id='arp_li_tooltip_second' class='col_opt_textarea row_tooltip_second' name='row_" . $column_id . "_tooltip_second_" . $li_id . "' col-id='" . $column_id . "'></textarea>";

        $new_row_tooltip .= "</div>";

        $new_row_tooltip .= "<div class='option_tab' id='tooltip_quarterly_tab' style='display:none;'>";

        $new_row_tooltip .= "<textarea id='arp_li_tooltip_third' class='col_opt_textarea row_tooltip_third' name='row_" . $column_id . "_tooltip_third_" . $li_id . "' col-id='" . $column_id . "'></textarea>";

        $new_row_tooltip .= "</div>";

        $new_row_tooltip .= "</div>";

        $new_row_tooltip .= "</div>";

        $new_row_tooltip .= "<div id='body_li_add_shortcode" . $li_id . "' class='col_opt_row arp_row_" . $li_id . "' style='display:none;'>";

        $new_row_tooltip .= "<div class='col_opt_btn_div'>";



        $new_row_tooltip .= "<button type='button' class='col_opt_btn_icon align_left arptooltipster arp_add_tooltip_shortcode' id='arp_add_tooltip_shortcode' name='row_" . $column_id . "_add_tooltip_shortcode_btn_" . $li_id . "' col-id=" . $column_id . " data-id='" . $column_id . "' data-row-id='tooltip_" . $li_id . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";

        $new_row_tooltip .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";

        $new_row_tooltip .= "</button>";

        $new_row_tooltip .= "<div class='arp_font_awesome_model_box_container'></div>";

        $new_row_tooltip .= "</div>";

        $new_row_tooltip .= "</div>";


        $new_row_tooltip .= "<div class='col_opt_row arp_ok_div arp_row_" . $li_id . "' id='body_li_level_other_arp_ok_div__button_2" . $li_id . "'  >";
        $new_row_tooltip .= "<div class='col_opt_btn_div'>";
        $new_row_tooltip .= "<div class='col_opt_navigation_div'>";
        $new_row_tooltip .= "<i class='typcn typcn-arrow-up arp_navigation_arrow' id='row_up_arrow' data-column='{$column_id}' data-row-id='arp_row_{$li_id}' data-button-id='body_li_level_options__button_2'></i>&nbsp;";
        $new_row_tooltip .= "<i class='typcn typcn-arrow-down arp_navigation_arrow' id='row_down_arrow' data-column='{$column_id}' data-row-id='arp_row_{$li_id}' data-button-id='body_li_level_options__button_2'></i>&nbsp;";
        $new_row_tooltip .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='row_left_arrow' data-column='{$column_id}' data-row-id='arp_row_{$li_id}' data-button-id='body_li_level_options__button_2'></i>&nbsp;";
        $new_row_tooltip .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='row_right_arrow' data-column='{$column_id}' data-row-id='arp_row_{$li_id}' data-button-id='body_li_level_options__button_2'></i>&nbsp;";
        $new_row_tooltip .= "</div>";
        $new_row_tooltip .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
        $new_row_tooltip .= __('Ok', ARP_PT_TXTDOMAIN);
        $new_row_tooltip.= "</button>";
        $new_row_tooltip .= "</div>";
        $new_row_tooltip .= "</div>";



        $new_row_tooltip .= "</div>";

        // New Row Label

        if ($features['caption_style'] == 'style_1' || $features['caption_style'] == 'style_2') {

            $new_row_label .= "<div id='arp_row_" . $li_id . "' class='arp_row_label_wrapper'>";

            $new_row_label .= "<div id='label" . $li_id . "' class='col_opt_row arp_row_" . $li_id . "' style='display:none;'>";

            $new_row_label .= "<div class='col_opt_title_div'>" . __('Label', ARP_PT_TXTDOMAIN) . "</div>";

            $new_row_label .= "<div class='col_opt_input_div'>";

            $new_row_label .= "<ul class='column_tabs'>";

            $new_row_label .= "<li class='option_title selected toggle_step_first_tab' id='description_label_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"description_label_yearly_tab\", \"description_label_monthly_tab\", \"description_label_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";

            $new_row_label .= "<li class='option_title toggle_step_second_tab' id='description_label_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"description_label_monthly_tab\", \"description_label_yearly_tab\", \"description_label_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";

            $new_row_label .= "<li class='option_title toggle_step_third_tab' id='description_label_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"description_label_quarterly_tab\", \"description_label_monthly_tab\", \"description_label_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";

            $new_row_label .= "</ul>";

            $new_row_label .= "<div class='option_tab' id='description_label_yearly_tab'>";

            $new_row_label .= "<textarea id='label' class='col_opt_textarea row_label_first' name='row_" . $column_id . "_label_" . $li_id . "'></textarea>";

            $new_row_label .= "</div>";

            $new_row_label .= "<div class='option_tab' id='description_label_monthly_tab' style='display:none;'>";

            $new_row_label .= "<textarea id='label_second' class='col_opt_textarea row_label_second' name='row_" . $column_id . "_label_second_" . $li_id . "'></textarea>";

            $new_row_label .= "</div>";

            $new_row_label .= "<div class='option_tab' id='description_label_quarterly_tab' style='display:none;'>";

            $new_row_label .= "<textarea id='label_third' class='col_opt_textarea row_label_third' name='row_" . $column_id . "_label_third_" . $li_id . "'></textarea>";

            $new_row_label .= "</div>";

            $new_row_label .= "</div>";

            $new_row_label .= "</div>";

            $new_row_label .= "<div id='body_li_add_shortcode" . $li_id . "' class='col_opt_row arp_row_" . $li_id . "' style='display:none;'>";

            $new_row_label .= "<div class='col_opt_btn_div'>";

            $new_row_label .= "<button type='button' id='arp_add_row_shortcode' class='col_opt_btn_icon align_left arptooltipster arp_add_row_shortcode' data-row-id='row_" . $li_id . "' data-id='" . $column_id . "' col-id='" . $column_id . "' name='row_" . $column_id . "_add_description_shortcode_btn_" . $li_id . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "'>";



            $new_row_label .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";

            $new_row_label .= "</button>";

            $new_row_label .= "<div class='arp_font_awesome_model_box_container'></div>";

            $new_row_label .= "</div>";

            $new_row_label .= "</div>";



            $new_row_label .= "<div class='col_opt_row arp_ok_div arp_" . $n . " arp_row_" . $li_id . "' id='body_li_level_other_arp_ok_div__button_3" . $splitedid[1] . "'  >";
            $new_row_label .= "<div class='col_opt_btn_div'>";
            $new_row_label .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
            $new_row_label .= __('Ok', ARP_PT_TXTDOMAIN);
            $new_row_label.= "</button>";
            $new_row_label .= "</div>";
            $new_row_label .= "</div>";

            $new_row_label .= "</div>";
        }




        $json_array = array('new_row_string' => $new_row_string, 'new_row_wrapper' => $new_row_wrapper, 'new_row_tooltip' => $new_row_tooltip, 'new_row_label' => $new_row_label);

        $json_array = json_encode($json_array);

        echo $json_array;



        die();
    }

    function font_size($selected_size = '') {
        $str = '';
        for ($s = 8; $s <= 20; $s++) {
            $size_arr[] = $s;
        }
        for ($st = 22; $st <= 70; $st+=2) {
            $size_arr[] = $st;
        }
        foreach ($size_arr as $size) {
            
            $str .= '<option ' . selected($size, $selected_size, false) . ' value="' . $size . '">' . __(ucfirst($size), ARP_PT_TXTDOMAIN) . '</option>';
        }
        return $str;
    }

    function font_style($selected_style = '') {
        $str = '';
        $style_arr = array('normal', 'italic', 'bold');
        foreach ($style_arr as $style) {
            $str .= '<option ' . selected($style, $selected_style, false) . ' value="' . $style . '">' . __(ucfirst($style), ARP_PT_TXTDOMAIN) . '</option>';
        }
        return $str;
    }

    function font_style_new() {
        $str = '';
        $style_arr = array('normal' => __('Normal', ARP_PT_TXTDOMAIN), 'italic' => __('Italic', ARP_PT_TXTDOMAIN), 'bold' => __('Bold', ARP_PT_TXTDOMAIN));
        foreach ($style_arr as $x => $style) {
            $str .= "<li data-value='" . $x . "' data-label='" . $style . "'>" . $style . "</li>";
        }
        return $str;
    }

    function font_color($property_name = '', $data_column = '', $data_column_id = '', $id = '', $value = '', $main_class = '', $input_class = '') {
        $str = '';
        $str .= '<div class="color_picker_font font_color_picker ' . $main_class . '" data-column="' . $data_column . '" id="' . $id . '_wrapper" data-color="' . $value . '" >';
        $str .= '<input type="text" id="' . $id . '_' . $data_column . '" name="' . $property_name . '" value="' . $value . '" class="general_color_box general_color_box_font_color jscolor ' . $input_class . '" data-jscolor="{hash:true,onFineChange:\'arp_update_color(this,' . $id . '_' . $data_column . ')\',required:false}" jscolor-required="false" jscolor-hash="true" jscolor-onfinechange="arp_update_color(this,' . $id . '_' . $data_column . ')" />';
        $str .= '</div>';

        return $str;
    }

    function font_color_new($property_name = '', $data_column = '', $data_column_id = '', $id = '', $value = '', $main_class = '', $input_class = '') {
        $str = '';
        $str .= '<div class="jscolor arp_custom_css_colorpicker arp_general_color_box" data-column="' . $data_column . '" id="' . $id . '_' . $data_column . '_wrapper" data-color="' . $value . '" data-jscolor="{hash:true,onFineChange:\'arp_update_color(this,' . $id . '_' . $data_column . '_wrapper)\',valueElement:' . $id . '_' . $data_column . ',required:false}" jscolor-required="false" jscolor-hash="true" jscolor-onfinechange="arp_update_color(this,' . $id . '_' . $data_column . '_wrapper)" jscolor-valueelement="' . $id . '_' . $data_column . '">';
        $str .= '</div>';
        $str .= '<input type="hidden" id="' . $id . '_' . $data_column . '" name="' . $property_name . '" value="' . $value . '" class="  ' . $input_class . '"  />';

        return $str;
    }

    function font_color_row($property_name = '', $data_column = '', $data_column_id = '', $id = '', $value = '', $main_class = '', $input_class = '', $row_id = '') {
        $str = '';

        $str .= '<div class="color_picker_font font_color_picker ' . $main_class . '" data-column="' . $data_column . '" data-row="' . $row_id . '" data-column-id="' . $data_column_id . '" id="' . $id . '_wrapper" data-color="' . $value . '" data-row-id="' . $row_id . '">';
        $str .= '<input type="text" id="' . $id . '_' . $data_column . '_' . $row_id . '" name="' . $property_name . '" value="' . $value . '" class="general_color_box jscolor general_color_box_font_color ' . $input_class . '" data-jscolor="{hash:true,onFineChange:\'arp_update_color(this,' . $id . '_' . $data_column . '_' . $row_id . ')\',required:false}" jscolor-required="false" jscolor-hash="true" jscolor-onfinechange="arp_update_color(this,' . $id . '_' . $data_column . '_' . $row_id . ')" />';
        $str .= '</div>';

        return $str;
    }

    function arp_save_template_image() {
        WP_Filesystem();
        global $wp_filesystem;

        $arp_image_data = isset($_POST['arp_image_data']) ? $_POST['arp_image_data'] : '';

        $template_id = isset($_POST['template_id']) ? $_POST['template_id'] : '';

        if ($arp_image_data != '' && $template_id != '') {
            $arp_image_data = str_replace('data:image/png;base64,', '', $arp_image_data);
            $arp_image_data = str_replace(' ', '+', $arp_image_data);
            $data = base64_decode($arp_image_data);
            $file = PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $template_id . '_full_legnth.png';
            //file_put_contents($file, $data);
            $wp_filesystem->put_contents($file, $data, 0777);

            list($width, $height) = getimagesize($file);
            $newheight = 180; //90
            $newwidth = 400; //200

            $src_image = imagecreatefrompng($file);
            $tmp_image = imagecreatetruecolor($newwidth, $newheight);
            $bgColor = imagecolorallocate($tmp_image, 255, 255, 255);
            imagefill($tmp_image, 0, 0, $bgColor);
            imagecopyresampled($tmp_image, $src_image, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            $filename = PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $template_id . '.png';
            imagepng($tmp_image, $filename);
            imagedestroy($tmp_image);

            $newheight_big = 238; //119;
            $newwidth_big = 530; //265;
            $tmp_image_big = imagecreatetruecolor($newwidth_big, $newheight_big);
            $bgColor_big = imagecolorallocate($tmp_image_big, 255, 255, 255);
            imagefill($tmp_image_big, 0, 0, $bgColor_big);
            imagecopyresampled($tmp_image_big, $src_image, 0, 0, 0, 0, $newwidth_big, $newheight_big, $width, $height);
            $filename_big = PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $template_id . '_big.png';
            imagepng($tmp_image_big, $filename_big);
            imagedestroy($tmp_image_big);

            $newheight_large = 300; //150;
            $newwidth_large = 668; //334;
            $tmp_image_large = imagecreatetruecolor($newwidth_large, $newheight_large);
            $bgColor_large = imagecolorallocate($tmp_image_large, 255, 255, 255);
            imagefill($tmp_image_large, 0, 0, $bgColor_large);
            imagecopyresampled($tmp_image_large, $src_image, 0, 0, 0, 0, $newwidth_large, $newheight_large, $width, $height);
            $filename_large = PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $template_id . '_large.png';
            imagepng($tmp_image_large, $filename_large);
            imagedestroy($tmp_image_large);

            @unlink($file);
        }
        die();
    }

    function arp_get_video_image($add_shortcode) {
        $add_shortcode_text = str_replace('[', '', $add_shortcode);
        $add_shortcode_text = str_replace(']', '', $add_shortcode_text);

        $as_shortcode = shortcode_parse_atts($add_shortcode_text);

        if (@$as_shortcode[0] == 'arp_youtube_video') {

            $video_id = isset($as_shortcode['id']) ? $as_shortcode['id'] : '';
            $width = ( isset($as_shortcode['width']) and $as_shortcode['width'] != '' ) ? $as_shortcode['width'] : 'auto';
            $height = ( isset($as_shortcode['height']) and $as_shortcode['height'] != '' ) ? $as_shortcode['height'] : 'auto';
            //$style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';
            $style = "";
            $imageURL = "http://img.youtube.com/vi/" . $video_id . "/maxresdefault.jpg;";

            return '<div class="arp_youtube_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '>
				<img src="' . $imageURL . '" width="' . $width . '" height="' . $height . '"   />
			</div>';
        } elseif (@$as_shortcode[0] == 'arp_vimeo_video') {


            $video_id = isset($as_shortcode['id']) ? $as_shortcode['id'] : '';
            $width = '100%';
            $height = ( isset($as_shortcode['height']) and $as_shortcode['height'] != '' ) ? $as_shortcode['height'] : 'auto';
            //$style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';
            $style = "";
            $data = file_get_contents("http://vimeo.com/api/v2/video/" . $video_id . ".json");
            $data = json_decode($data);
            $imageURL = $data[0]->thumbnail_large;

            return '<div class="arp_vimeo_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '>
				<img src="' . $imageURL . '"  height="' . $height . '"  />
			</div>';
        } elseif (@$as_shortcode[0] == 'arp_screenr_video') {

            $video_id = isset($as_shortcode['id']) ? $as_shortcode['id'] : '';
            $width = '100%';
            $height = ( isset($as_shortcode['height']) and $as_shortcode['height'] != '' ) ? $as_shortcode['height'] : 'auto';
            //$style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';
            $style = "";
            $data = file_get_contents("http://www.screenr.com/api/oembed.json?url=http://www.screenr.com/" . $video_id);
            $data = json_decode($data);
            $imageURL = $data->thumbnail_url;

            return '<div class="arp_screenr_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '>
				<img src="' . $imageURL . '"  height="' . $height . '"  />
			</div>';
        } elseif (@$as_shortcode[0] == 'arp_html5_video') {
            $imageURL = '';
            if (!empty($as_shortcode['poster'])) {
                $imageURL = $as_shortcode['poster'];
                return '<div class="arp_html5_video">
					<img src="' . $imageURL . '"   />
				</div>';
            } else {
                $imageURL = PRICINGTABLE_IMAGES_URL . '/video-icon.png';
                return '<div class="arp_html5_video">
				<img class="arp_video_img" src="' . $imageURL . '"   />
			</div>';
            }
        } elseif (@$as_shortcode[0] == 'arp_html5_audio') {
            $imageURL = PRICINGTABLE_IMAGES_URL . '/audio-icon.png';
            return '<div class="arp_html5_audio">
				<img class="arp_audio_img" src="' . $imageURL . '"   />
			</div>';
        } elseif (@$as_shortcode[0] == 'arp_googlemap') {

            $address = ($as_shortcode['address']) ? $as_shortcode['address'] : '';
            $zoom_level = ($as_shortcode['zoom_level']) ? $as_shortcode['zoom_level'] : '14';
            $height = ($as_shortcode['height']) ? $as_shortcode['height'] : '300';

            $address = $address ? $address : '';
            $popup = $as_shortcode['show_popup'] ? true : false;
            $icon = $as_shortcode['marker_image'] ? $as_shortcode['marker_image'] : '';
            $content = $as_shortcode['content'] ? $as_shortcode['content'] : '';
            $maptype = isset($as_shortcode['maptype']) ? $as_shortcode['maptype'] : 'ROADMAP';

            $mapdata = array();
            $mapdata['markers'][] = array(
                'address' => $address,
                'title' => $as_shortcode['title'],
                'icon' => !empty($icon) ? array('image' => $icon) : null,
                'html' => isset($content) ? array(
                    'content' => $content,
                    'popup' => $popup
                        ) : null,
            );
            $mapdata['zoom'] = intval($zoom_level);
            $mapdata['maptype'] = $maptype;
            $mapdata['mapTypeControl'] = false;
            $address = str_replace(" ", "+", $address);
            $data = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=" . $address);
            $data = json_decode($data);
            $map_data = $data->results[0];
            $lat = $map_data->geometry->location->lat;
            $lng = $map_data->geometry->location->lng;

            $imageURL = "https://maps.googleapis.com/maps/api/staticmap?center=" . $lat . "," . $lng . "&zoom=" . $zoom_level . "&size=280x" . $height;
            return '<div class="arp_googlemap"  data-map="' . esc_attr(json_encode($mapdata)) . '"  style="width:100%; height:' . $height . 'px;"><img src="' . $imageURL . '"  height="' . $height . '"  /></div>';
        } elseif (@$as_shortcode[0] == 'arp_dailymotion_video') {

            $video_id = isset($as_shortcode['id']) ? $as_shortcode['id'] : '';
            $width = '100%';
            $height = ( isset($as_shortcode['height']) and $as_shortcode['height'] != '' ) ? $as_shortcode['height'] : 'auto';
            //$style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';
            $style = "";
            $data = file_get_contents('https://api.dailymotion.com/video/' . $video_id . '?fields=thumbnail_large_url');
            $data = json_decode($data);
            $imageURL = $data->thumbnail_large_url;

            return '<div class="arp_dailymotion_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '>
				<img src="' . $imageURL . '"  height="' . $height . '"  />
			</div>';
        } elseif (@$as_shortcode[0] == 'arp_metacafe_video') {

            $video_id = isset($as_shortcode['id']) ? $as_shortcode['id'] : '';
            $width = '100%';
            $height = ( isset($as_shortcode['height']) and $as_shortcode['height'] != '' ) ? $as_shortcode['height'] : 'auto';

            //$style = ( $height != 'auto' ) ? 'height:' . $height . 'px !important; padding:0 !important;' : '';
            $style = "";

            $imageURL = 'http://s' . mt_rand(1, 4) . '.mcstatic.com/thumb/' . $video_id . '.jpg';

            return '<div class="arp_metacafe_video"' . ( $style != '' ? ' style="' . $style . '"' : '' ) . '>
				<img src="' . $imageURL . '"  height="' . $height . '"  />
			</div>';
        } elseif (@$as_shortcode[0] == 'arp_soundcloud_audio') {
            $imageURL = PRICINGTABLE_IMAGES_URL . '/audio-icon.png';
            return '<div class="arp_soundcloud_audio">
				<img class="arp_audio_img" src="' . $imageURL . '"   />
			</div>';
        } elseif (@$as_shortcode[0] == 'arp_mixcloud_audio') {
            $imageURL = PRICINGTABLE_IMAGES_URL . '/audio-icon.png';
            return '<div class="arp_mixcloud_audio">
				<img class="arp_audio_img" src="' . $imageURL . '"   />
			</div>';
        } elseif (@$as_shortcode[0] == 'arp_beatport_audio') {
            $imageURL = PRICINGTABLE_IMAGES_URL . '/audio-icon.png';
            return '<div class="arp_beatport_audio">
				<img class="arp_audio_img" src="' . $imageURL . '"   />
			</div>';
        } elseif (@$as_shortcode[0] == 'arp_embed') {
            $imageURL = PRICINGTABLE_IMAGES_URL . '/embed-icon.png';
            return '<div class="arp_embed_audio">
				<img class="arp_embed_img" src="' . $imageURL . '"   />
			</div>';
        } else {
            return do_shortcode($add_shortcode);
        }
    }

    function update_arp_tour_guide_value() {
        $return = '0';
        update_option('arprice_tour_guide_value', 'no');
        if ($_REQUEST['arp_tour_guide_value'] == 'arp_tour_guide_start_yes') {
            $return = '1';
        }

        echo $return;

        die();
    }

    /*
     * Generate Color Ton From Hexa Code
     * Use - ( Negative ) value in steps for darker ton
     * Use + ( Positive ) value in steps for lighter ton
     */

    function arp_generate_color_tone($hex, $steps) {

        $steps = max(-255, min(255, $steps));

        $hex = str_replace('#', '', $hex);

        if ($hex != '' && strlen($hex) < 6) {
            $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
        }

        $color_parts = str_split($hex, 2);
        $return = '#';

        $acsteps = str_replace(array('+', '-'), array('', ''), $steps);

        if (strlen($acsteps) > 2)
            $lum = $steps / 1000;
        else
            $lum = $steps / 100;

        foreach ($color_parts as $color) {
            $color = hexdec($color);
            $color = round(max(0, min(255, $color + ($color * $lum))));
            $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
        }

        return $return;
    }

    /* Generate Text Alignment Div */

    function arp_create_alignment_div_new($id, $alignment, $name, $column, $level) {
        $tablestring = '';
        $tablestring .= "<div class='col_opt_input_div' id='" . $id . "'>";
        $left_selected = ($alignment == 'left') ? 'align_selected' : '';
        $center_selected = ($alignment == 'center') ? 'align_selected' : '';
        $right_selected = ($alignment == 'right') ? 'align_selected' : '';

        $tablestring .= "<div class='arp_alignment_btn align_left_btn " . $left_selected . "' data-align='left' id='align_left_btn' data-id='" . $column . "' data-level='" . $level . "'>";
        $tablestring .= "<i class='fa fa-align-left fa-flip-vertical'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_alignment_btn align_center_btn " . $center_selected . "' data-align='center' id='align_center_btn' data-id='" . $column . "' data-level='" . $level . "'>";
        $tablestring .= "<i class='fa fa-align-center fa-flip-vertical'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_alignment_btn align_right_btn " . $right_selected . "' data-align='right' id='align_right_btn' data-id='" . $column . "' data-level='" . $level . "'>";
        $tablestring .= "<i class='fa fa-align-right fa-flip-vertical'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<input type='hidden' id='$name' value='" . $alignment . "' name='" . $name . "'>";

        $tablestring .= "</div>";
//        $tablestring .= "</div>";

        return $tablestring;
        die();
    }

    function arp_create_alignment_div($id, $alignment, $name, $column, $level) {
        $tablestring = '';
        $tablestring .= "<div class='col_opt_row' id='" . $id . "'>";
        $tablestring .= "<div class='col_opt_title_div'>" . __('Text Alignment', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div'>";
        $left_selected = ($alignment == 'left') ? 'align_selected' : '';
        $center_selected = ($alignment == 'center') ? 'align_selected' : '';
        $right_selected = ($alignment == 'right') ? 'align_selected' : '';

        $tablestring .= "<div class='arp_alignment_btn align_left_btn " . $left_selected . "' data-align='left' id='align_left_btn' data-id='" . $column . "' data-level='" . $level . "'>";
        $tablestring .= "<i class='fa fa-align-left fa-flip-vertical'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_alignment_btn align_center_btn " . $center_selected . "' data-align='center' id='align_center_btn' data-id='" . $column . "' data-level='" . $level . "'>";
        $tablestring .= "<i class='fa fa-align-center fa-flip-vertical'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_alignment_btn align_right_btn " . $right_selected . "' data-align='right' id='align_right_btn' data-id='" . $column . "' data-level='" . $level . "'>";
        $tablestring .= "<i class='fa fa-align-right fa-flip-vertical'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<input type='hidden' id='$name' value='" . $alignment . "' name='" . $name . "_" . $column . "'>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        return $tablestring;
        die();
    }

}

?>