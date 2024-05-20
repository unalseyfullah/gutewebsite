<?php
global $arp_pricingtable, $arprice_default_settings, $arprice_analytics, $arprice_fonts, $arprice_version, $arprice_font_awesome_icons, $arprice_images_css_version;
?>

<div style="display:none;" >
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/arprice_logo.png" />
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/edit-icon.png" />

    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/save_icon.png" />
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/preview_icon_small.png" />
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/cancel_icon.png" />

    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/column_option_icon.png" />
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/effects_icon.png" />
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/tooltip_icon.png" />
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/custom_css_icon.png" />
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/toggle_icon.png" />

    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/column_option_hover_icon.png" />
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/effects_hover_icon.png" />
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/tooltip_hover_icon.png" />
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/custom_css_hover_icon.png" />
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/toggle_hover_icon.png" />

    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/nav_close_icon.png" />

    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/preview_icon.png" />
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/preview_icon.png" />
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/duplicate_icon.png" />

    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/clone_icon.png" />
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/icons/preview_icon_default.png" />
    <img  src="<?php echo PRICINGTABLE_IMAGES_URL; ?>/color_picker.png" />
</div>

<?php
/* ARPrice Font Awesome Icons */
require_once(PRICINGTABLE_VIEWS_DIR . '/arprice_font_awesome_array.php');
$arprice_font_awesome_icons = arprice_font_awesome_font_array();
/* ARPrice Font Awesome Icons */


/* ARPrice Goole Font Load */
$default_fonts = $arprice_fonts->get_default_fonts();
$google_fonts = $arprice_fonts->google_fonts_list();

$font_array = array_chunk($google_fonts, 150);

foreach ($font_array as $key => $font_values) {
    $google_fonts_string = implode('|', $font_values);
    $google_font_url_one = '';
    if (is_ssl()) {
        $google_font_url_one = "https://fonts.googleapis.com/css?family=" . $google_fonts_string;
    } else {
        $google_font_url_one = "http://fonts.googleapis.com/css?family=" . $google_fonts_string;
    }

    echo '<link rel = "stylesheet" type = "text/css" href = "' . $google_font_url_one . '" />';
}

$hostname = $_SERVER["HTTP_HOST"];
        global $arprice_class;
        $setact = 0;
        global $arpriceplugin;
        $setact = $arprice_class->$arpriceplugin();
		
?>
<link rel="stylesheet" type="text/css" href="<?php echo $google_font_url_one; ?>" />
<?php /*?><link rel="stylesheet" type="text/css" href="<?php echo $google_font_url_two; ?>" /><?php */?>

<?php 
/* ARPrice Goole Font Load */ ?>



<script type="text/javascript">
    jQuery(function () {
        jQuery("#scroll_top_wrapper").scroll(function () {
            jQuery("#main_package").scrollLeft(jQuery("#scroll_top_wrapper").scrollLeft());
        });
        jQuery("#main_package").scroll(function () {
            jQuery("#scroll_top_wrapper").scrollLeft(jQuery("#main_package").scrollLeft());
        });
    });
</script>
<script type="text/javascript">
    function global_template_options()
    {
        var tmpbuttonoptions;
        tmpbuttonoptions = <?php
global $arp_tempbuttonsarr;
echo json_encode($arp_tempbuttonsarr)
?>;
        return tmpbuttonoptions;
    }

    function global_ribbon_array() {
        var arpribbonarr;
        arpribbonarr = <?php
global $arp_mainoptionsarr;
echo json_encode($arp_mainoptionsarr['general_options']['template_options']['arp_template_ribbons']);
?>;
        return arpribbonarr;
    }

    function ribbon_basic_colors() {
        var arp_basic_ribbon_colors;
        arp_basic_ribbon_colors = '<?php
global $arp_mainoptionsarr;
echo json_encode($arp_mainoptionsarr['general_options']['arp_basic_colors']);
?>';
        return arp_basic_ribbon_colors;
    }

    function ribbon_gradient_colors() {
        var arp_gradient_ribbon_colors;
        arp_gradient_ribbon_colors = '<?php
global $arp_mainoptionsarr;
echo json_encode($arp_mainoptionsarr['general_options']['arp_basic_colors_gradient']);
?>';
        return arp_gradient_ribbon_colors;
    }

    function ribbon_border_colors() {
        var arp_ribbon_border_color;
        arp_ribbon_border_color = '<?php
global $arp_mainoptionsarr;
echo json_encode($arp_mainoptionsarr['general_options']['arp_ribbon_border_color']);
?>';
        return arp_ribbon_border_color;
    }

    function arp_template_css_class_info() {
        var arp_templatecssinfo;
        arp_templatecssinfo = <?php
global $arp_templatecssinfoarr;
echo json_encode($arp_templatecssinfoarr);
?>;
        return arp_templatecssinfo;
    }

    function arp_template_responsive_array_types() {
        var arp_template_responsive_array;
        arp_template_responsive_array = <?php
global $arp_templateresponsivearr;
echo json_encode($arp_templateresponsivearr);
?>;
        return arp_template_responsive_array;
    }

    function arp_template_editor_handler() {
        var arp_template_editro_handler_var;
        arp_template_editro_handler_var = <?php
global $arp_template_editor_arr;
echo json_encode($arp_template_editor_arr);
?>;
        return arp_template_editro_handler_var;
    }

    function global_column_background_colors() {
        var arp_column_background_colors_var;
        arp_column_background_colors_var = <?php echo json_encode($arprice_default_settings->arp_column_section_background_color());
?>;
        return arp_column_background_colors_var;
    }

    function global_column_section_background_colors() {
        var arp_column_section_bg_color;
        arp_column_section_bg_color = <?php echo json_encode($arprice_default_settings->arp_section_background_color()); ?>;
        return arp_column_section_bg_color;
    }

    function global_column_footer_type_templates() {
        var arp_column_footer_templates;
        arp_column_footer_templates = <?php echo json_encode($arprice_default_settings->arp_footer_section_template_types()); ?>;
        return arp_column_footer_templates;
    }

    function global_arp_color_skin_templats() {
        var arp_column_color_skin_templates;
        arp_column_color_skin_templates = <?php echo json_encode($arprice_default_settings->arp_color_skin_template_types()); ?>;
        return arp_column_color_skin_templates;
    }

    function global_column_sections_array() {
        var arp_column_sections_colors_array;
        arp_column_sections_colors_array = <?php
global $arp_templatesectionsarr;
echo json_encode($arp_templatesectionsarr);
?>;
        return arp_column_sections_colors_array;
    }

    function arp_global_skin_array() {
        var arp_template_custom_skin;
        arp_template_custom_skin = <?php
global $arp_templatecustomskinarr;
echo json_encode($arp_templatecustomskinarr);
?>;
        return arp_template_custom_skin;
    }

    function arp_global_default_gradient_templates() {
        var arp_template_gradient_templates;
        arp_template_gradient_templates = <?php echo json_encode($arprice_default_settings->arp_default_gradient_templates()); ?>;
        return arp_template_gradient_templates;
    }

    function arp_global_default_gradient_colors() {
        var arp_global_default_gradient_color;
        arp_global_default_gradient_color = <?php echo json_encode($arprice_default_settings->arp_default_gradient_templates_colors()); ?>;
        return arp_global_default_gradient_color;
    }

    function arp_global_default_rgba_colors() {
        var arp_global_rgba_colors;
        arp_global_rgba_colors = <?php echo json_encode($arprice_default_settings->arp_default_rgba_color_array()); ?>;
        return arp_global_rgba_colors;
    }

    function arp_depended_section_color_codes() {
        var arp_global_depended_section_colors;
        arp_global_depended_section_colors = <?php echo json_encode($arprice_default_settings->arp_depended_section_color_codes()); ?>;
        return arp_global_depended_section_colors;
    }

    function arp_custom_skin_selection_section_color() {
        var arp_custom_skin_selection_colors;
        arp_custom_skin_selection_colors = <?php echo json_encode($arprice_default_settings->arp_custom_skin_selection_section_color()); ?>;
        return arp_custom_skin_selection_colors
    }

    function arp_background_image_section_array() {
        var arp_background_image_section_array;
        arp_background_image_section_array = <?php echo json_encode($arprice_default_settings->arp_background_image_section_array()); ?>;
        return arp_background_image_section_array;
    }

    function arprice_default_template_skins() {
        var arp_background_image_section_array;
        arp_background_image_section_array = <?php echo json_encode($arprice_default_settings->arprice_default_template_skins()); ?>;
        return arp_background_image_section_array;
    }

    function arprice_css_pseudo_elements() {
        var arprice_css_pseudo_elements;
        arprice_css_pseudo_elements = <?php echo json_encode($arprice_default_settings->arp_css_pseudo_elements_array()); ?>;
        var string = '';
        jQuery(arprice_css_pseudo_elements).each(function (i) {
            string += arprice_css_pseudo_elements[i] + '|';
        });
        var strlen = string.length;
        var str = '';
        for (var n = 0; n < strlen - 1; n++) {
            str += string[n];
        }
        var regex = new RegExp('(' + str + ')', 'ig');
        return regex;
    }
    /*
     function arprice_border_color() {
     var arprice_border_colors;
     arprice_border_colors = <?php //echo json_encode($arprice_default_settings->arp_border_color());                               ?>;
     return arprice_border_colors;
     }
     */
    function arp_exclude_caption_column_for_color_skin() {
        var arprice_exclude_caption;
        arprice_exclude_caption = '<?php echo json_encode($arprice_default_settings->arp_exclude_caption_column_for_color_skin()) ?>';
        return arprice_exclude_caption;
    }

    function arp_select_previous_skin_for_multicolor_array() {
        var arp_select_previous_skin_for_multicolor;
        arp_select_previous_skin_for_multicolor = '<?php echo json_encode($arprice_default_settings->arp_select_previous_skin_for_multicolor()) ?>';
        return arp_select_previous_skin_for_multicolor;
    }

    function arp_editor_width() {
        var arp_editor_width;
        arp_editor_width = '<?php echo json_encode($arprice_default_settings->arprice_responsive_width_array()); ?>';
        return arp_editor_width;
    }

    function arp_column_background_image_section_array() {
        var arp_column_background_image_section_array;
        arp_column_background_image_section_array = <?php echo json_encode($arprice_default_settings->arp_column_background_image_section_array()); ?>;
        return arp_column_background_image_section_array;
    }

    function arp_template_bg_section_classes_array() {
        var arp_template_bg_section_classes_array;
        arp_template_bg_section_classes_array = <?php echo json_encode($arprice_default_settings->arp_template_bg_section_classes()); ?>;
        return arp_template_bg_section_classes_array;
    }

    function arp_section_text_alignment() {
        var arp_section_text_alignment_array;
        arp_section_text_alignment_array = <?php echo json_encode($arprice_default_settings->arp_section_text_alignment()); ?>;
        return arp_section_text_alignment_array;
    }

    function arp_template_bg_section_inputs_array() {
        var arp_template_bg_section_inputs_array;
        arp_template_bg_section_inputs_array = <?php echo json_encode($arprice_default_settings->arp_template_bg_section_inputs()); ?>;
        return arp_template_bg_section_inputs_array;
    }

    function arp_hide_section_class_global() {
        var arp_hide_section_class;
        arp_hide_section_class = '<?php echo json_encode($arprice_default_settings->arprice_hide_section_array()); ?>';
        return arp_hide_section_class;
    }

    function arp_column_border_array_global() {
        var arp_column_border_array;
        arp_column_border_array = '<?php echo json_encode($arprice_default_settings->arp_column_border_array()); ?>';
        return arp_column_border_array;
    }

    function arp_row_level_border_global() {
        var arp_row_level_border_array;
        arp_row_level_border_array = '<?php echo json_encode($arprice_default_settings->arp_row_level_border()); ?>';
        return arp_row_level_border_array;
    }

    function arp_row_level_border_remove_from_last_child_global() {
        var arp_row_level_border_remove_from_last_child_array;
        arp_row_level_border_remove_from_last_child_array = '<?php echo json_encode($arprice_default_settings->arp_row_level_border_remove_from_last_child()); ?>';
        return arp_row_level_border_remove_from_last_child_array;
    }

    function arp_custom_css_inner_sections() {
        var arp_custom_css_inner_sections;
        arp_custom_css_inner_sections = '<?php echo json_encode($arprice_default_settings->arp_custom_css_inner_sections()); ?>';
        return arp_custom_css_inner_sections;
    }

    function arp_custom_button_type() {
        var arp_custom_button_type_sections;
        arp_custom_button_type_sections = '<?php echo json_encode($arprice_default_settings->arp_button_type()); ?>';
        return arp_custom_button_type_sections;
    }

    function arp_shortcode_custom_type_array() {
        var arp_shortcode_custom_type_sections;
        arp_shortcode_custom_type_sections = '<?php echo json_encode($arprice_default_settings->arp_shortcode_custom_type()); ?>';
        return arp_shortcode_custom_type_sections;
    }

    function arp_navigation_section_class_array() {
        var arp_navigation_section_class_array;
        arp_navigation_section_class_array = '<?php echo json_encode($arprice_default_settings->arp_navigation_section_array()); ?>';
        return arp_navigation_section_class_array;
    }

    function arp_button_size_new_array() {
        var arp_button_size_new_class_array;
        arp_button_size_new_class_array = '<?php echo json_encode($arprice_default_settings->arp_button_size_new()); ?>';
        return arp_button_size_new_class_array;
    }
    
    function arp_column_image_bg_color(){
        var arp_column_image_bg_color;
        arp_column_image_bg_color = <?php echo json_encode($arprice_default_settings->arp_column_bg_image_colors()); ?>;
        return arp_column_image_bg_color;
    }

    __DISABLED_RIBBON = '<?php _e('This ribbon is not supported in this template.', ARP_PT_TXTDOMAIN) ?>';
    __OK_BUTTON_TEXT = '<?php _e('Ok', ARP_PT_TXTDOMAIN); ?>';
    __CANCEL_BUTTON_TXT = '<?php _e('Cancel', ARP_PT_TXTDOMAIN) ?>';
    __DELETE_COLUMN_TXT = '<?php _e('Are you sure want to delete this column?', ARP_PT_TXTDOMAIN); ?>';
    __HIDE_FOOTER_TXT = '<?php _e('Footer section is hidden.', ARP_PT_TXTDOMAIN); ?>';
    __HIDE_HEADER_TXT = '<?php _e('Header section is hidden.', ARP_PT_TXTDOMAIN); ?>';
    __HIDE_PRICE_TXT = '<?php _e('Price section is hidden.', ARP_PT_TXTDOMAIN); ?>';
    __HIDE_FEATURE_TXT = '<?php _e('Body section is hidden.', ARP_PT_TXTDOMAIN); ?>';
    __HIDE_DISCRIPTION_TXT = '<?php _e('Description section is hidden.', ARP_PT_TXTDOMAIN); ?>';
    __HIDE_HEADER_SHORTCODE_TXT = '<?php _e('Header shortcode section is hidden.', ARP_PT_TXTDOMAIN); ?>';
</script>
<?php
global $wpdb, $arprice_form, $arprice_fonts;
$arpaction = isset($_GET['arp_action']) ? $_GET['arp_action'] : 'blank';
$arpreference = isset($_GET['ref']) ? $_GET['ref'] : '';
$id = isset($_GET['eid']) ? $_GET['eid'] : '';

// If table not exits 
if (isset($arpaction) and $arpaction == 'edit' and isset($id) && $id) {
    $check_table = $wpdb->get_row($wpdb->prepare("SELECT id FROM " . $wpdb->prefix . "arp_arprice WHERE ID='%d'", $id));
    if (!$check_table) {
        echo '<script type="text/javascript">window.location.href = "' . admin_url('admin.php?page=arprice') . '";</script>';
        exit;
    }
}
$has_caption = 0;
$table_cols = -1;
$arp_template_type = '';
/* if ($arpaction == 'blank' && isset($_GET['arpaction']) && @$_GET['arpaction'] == "") {
  $table_cols = -1;
  } else if ($arpaction == 'create_new') {
  $table_name = $_REQUEST['new_table_name'];
  $table_cols = $_REQUEST['no_of_cols'];
  $table_rows = $_REQUEST['no_of_rows'];
  $has_caption = $_REQUEST['has_caption'];
  $arp_template_type = $_REQUEST['template_type'];
  if ($table_cols == "") {
  $table_cols = 0;
  }
  if ($has_caption == "") {
  $has_caption = 0;
  }
  }
 */
if (isset($arpaction) and $arpaction == 'edit' and isset($table_id) && $table_id) {
    $arpaction = 'edit';
    $id = $table_id;
} else if (isset($arpaction) and $arpaction == 'new') {
    $arpaction = 'new';
}
if ($arpaction == 'edit') {
    ?>
    <style>
        .empty {
            height:80px;
        }
    </style>
<?php } ?>
<?php if ($setact != 1) { ?>
    <style>
        .repute_pricing_table_content{
            margin-top:75px;
        }
    </style>
<?php } else { ?>
    <style>
        .repute_pricing_table_content{
            margin-top:60px;
        }
    </style>

<?php } ?>

<div class="main_box" >
    <form name="price_table" id="price_table_form" method="post" onsubmit="return check_package_validation();">
        <input type="hidden" id="is_display_analytics" value="<?php echo $setact; ?>" name="is_display_analytics" />
        <input type="hidden" name="ajaxurl" id="ajaxurl" value="<?php echo admin_url('admin-ajax.php'); ?>"  />
        <input type="hidden" name="url" id="listing_url" value="admin.php?page=arprice" />
        <input type="hidden" name="template_type_old" id="template_type_old" value="<?php echo $id; ?>" />
        <input type="hidden" value="<?php echo $id; ?>" id="template_type_new" name="template_type_new">
        <input type="hidden" name="pricing_table_img_url" id="pricing_table_img_url" value="<?php echo PRICINGTABLE_IMAGES_URL; ?>" />
        <input type="hidden" name="pricing_table_main_dir" id="pricing_table_main_dir" value="<?php echo PRICINGTABLE_DIR; ?>"  />
        <input type="hidden" name="pricing_table_main_url" id="pricing_table_main_url" value="<?php echo PRICINGTABLE_URL; ?>" />
        <input type="hidden" name="pricing_table_upload_dir" id="pricing_table_upload_dir" value="<?php echo PRICINGTABLE_UPLOAD_DIR; ?>" />
        <input type="hidden" name="pricing_table_upload_url" id="pricing_table_upload_url" value="<?php echo PRICINGTABLE_UPLOAD_URL; ?>" />
        <input type="hidden" name="pricing_table_admin" id="pricing_table_admin" value="<?php echo is_admin(); ?>" />
        <input type="hidden" name="arp_wp_version" id="arp_wp_version" value="<?php echo $GLOBALS['wp_version']; ?>" />
        <input type="hidden" name="arp_responsive_mobile_width" id="arp_responsive_mobile_width" value="<?php echo get_option('arp_mobile_responsive_size'); ?>" />
        <input type="hidden" name="arp_responsive_tablet_width" id="arp_responsive_tablet_width" value="<?php echo get_option('arp_tablet_responsive_size'); ?>" />
        <input type="hidden" name="arp_responsive_desktop_width" id="arp_responsive_desktop_width" value="<?php echo get_option('arp_desktop_responsive_size'); ?>" />
        
        <input type="hidden" name="arp_version" id="arp_version" value="<?php global $arprice_version; echo $arprice_version;?>" />
        <input type="hidden" name="arp_request_version" id="arp_request_version" value="<?php echo get_bloginfo('version'); ?>" />
        
        <?php
        if ($arpaction == 'edit' || $arpaction == 'new') {
            global $wpdb, $arp_mainoptionsarr;

            $sql = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE ID = %d", $id));
            $table_name = $sql[0]->table_name;
            $is_template = $sql[0]->is_template;
            $status = $sql[0]->status;
            $template_name = $sql[0]->template_name;
            if (( $is_template == 1 && $arpreference == '' && $id != $arpreference && $arpaction == 'edit') || $status == 'draft') {
                echo "<script type='text/javascript'>window.location.href='" . admin_url('admin.php?page=arprice') . "'</script>";
            }
            $table_gen_opt = maybe_unserialize($sql[0]->general_options);
            $arp_template = $table_gen_opt['template_setting']['template'];
            $arp_template_skin = $table_gen_opt['template_setting']['skin'];
            $arp_template_type = $table_gen_opt['template_setting']['template_type'];

            $sqls = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice_options WHERE table_id = %d", $id));
            $table_opt = $sqls[0]->table_options;
            $uns_table_opt = maybe_unserialize($table_opt);
            $total_packages = count($uns_table_opt['columns']);
            $caption_column = $uns_table_opt['columns']['column_0']['is_caption'];
            $reference_template = $table_gen_opt['general_settings']['reference_template'];
            $template_feature = $arp_mainoptionsarr['general_options']['template_options']['features'][$reference_template];

            if (is_array($template_feature) && in_array('column_description', $template_feature)) {
                $has_column_desc = 1;
                $col_desc_pos = array_search('column_description', $template_feature);
            } else {
                $has_column_desc = 0;
            }
            ?>
            <input type="hidden" name="is_template" id="is_template" value="<?php echo $is_template; ?>"/>
            <input type="hidden" name="pt_action" id="pt_action" value="<?php echo $arpaction; ?>" />
            <input type="hidden" name="added_package" id="total_packages" value="<?php echo $total_packages; ?>" />
            <input type="hidden" name="table_id" id="table_id" value="<?php echo $id; ?>" />
            <input type="hidden" name="arp_template_type" id="arp_template_type" value="<?php echo $arp_template_type; ?>" />
            <input type="hidden" name="has_caption_column" id="has_caption_column" value="<?php echo $caption_column; ?>"  />
            <input type="hidden" name="template_feature" id="arp_template_feature" value='<?php echo stripslashes(json_encode($template_feature)); ?>' />
            <?php $column_order = str_replace('"', '\'', $table_gen_opt['general_settings']['column_order']); ?>
            <input type="hidden" name="pricing_table_column_order" id="pricing_table_column_order" value="<?php echo $column_order; ?>" />
            <input type="hidden" name="arp_reference_template" id="arp_reference_template" value="<?php echo $reference_template; ?>" />
            <?php $user_edited_columns = ( $table_gen_opt['general_settings']['user_edited_columns'] == '' ) ? '' : stripslashes(json_encode($table_gen_opt['general_settings']['user_edited_columns'])); ?>
            <input type="hidden" name="arp_user_edited_columns" id="arp_user_edited_columns" value='<?php echo $user_edited_columns; ?>' />
            <?php
        } else {
            global $wpdb, $arp_mainoptionsarr;
            $template_feature = $arp_mainoptionsarr['general_options']['template_options']['features']['arptemplate_1'];
            ?>
            <input type="hidden" name="is_template" id="is_template" value="0" />
            <input type="hidden" name="pt_action" id="pt_action" value="new" />
            <input type="hidden" name="added_package" id="total_packages" value="<?php echo ($table_cols + $has_caption); ?>" />
            <input type="hidden" name="pt_coloumn_order" id="pt_coloumn_order" value="" />
            <input type="hidden" name="table_id" id="table_id" value="" />
            <input type="hidden" name="arp_template_type" id="arp_template_type" value="<?php echo $arp_template_type; ?>" />
            <input type="hidden" name="has_caption_column" id="has_caption_column" value="<?php echo $has_caption; ?>"  />
            <input type="hidden" name="template_feature" id="arp_template_feature" value='<?php echo stripslashes(json_encode($template_feature)); ?>' />
            <input type="hidden" name="pricing_table_column_order" id="pricing_table_column_order" value="" />
            <input type="hidden" name="arp_reference_template" id="arp_reference_template" value="" />
            <input type="hidden" name="arp_user_edited_columns" id="arp_user_edited_columns" value="" />
            <?php
        }
        global $arp_mainoptionsarr, $arprice_form, $wp_version;
        $pricingtable_menu_belt_style = '';
        if ($arpaction == 'edit') {
            $pricingtable_menu_belt_style = 'display:block;';
        }
        ?>
        <div class="pricingtablename">
            <div class="empty" style="height:80px;">	</div>

            <div class="success_message" id="success_message"> 
                <div class="message_descripiton"><?php _e('Pricing table saved successfully.', ARP_PT_TXTDOMAIN); ?></div>		
            </div>

            <?php
            if ($setact != 1) {
                $admin_css_url = admin_url('admin.php?page=arp_global_settings');
                ?>
                <div style="margin-top:65px;border-left: 4px solid #ffba00;box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);margin-left:-5px;height:20px;position:absolute;width:99%;padding:10px 25px 10px 0px;background-color:#FFFFFF;text-align:right;color:#000000;font-size:17px;display:block;visibility:visible;" >License is not activated. Please activate license from <a href="<?php echo $admin_css_url; ?>">here</a></div>
            <?php } ?>

            <div class="repute_pricing_table_content">
                <div class="arprice_editor" id="arprice_editor">
                    <div class="main_package_part">

                        <div id="main_package_div">

                            <div class="main_package" id="main_package">
                                <div class="ex" style="">
                                    <ul id="packages">
                                        <?php
                                        require_once PRICINGTABLE_DIR . '/core/classes/class.arprice_preview_editor.php';
                                        global $arprice_form, $wpdb;
                                        if ($arpaction == 'edit') {
                                            echo arp_get_pricing_table_string_editor($id, $table_name, 2);
                                        } else if ($arpaction == 'new') {
                                            echo arp_get_pricing_table_string_editor($id, $table_name, 2, '', '', 1);
                                        }
                                        ?>
                                    </ul>
                                    <div style="height:auto;width:10px;float:left;"></div>
                                    <div id="addnewpackage_loader"> </div>
                                    <div class="add_new_package enabled" align="center" id="addnewpackage">
                                        <label class="add_new_package_label"><?php _e('Add Column', ARP_PT_TXTDOMAIN); ?></label>
                                        <div class="add_new_package_icon">
                                            <span class="fa-stack fa-5x">
                                                <i class="fa fa-circle-thin fa-stack-2x"></i>
                                                <i class="fa fa-plus fa-stack-1x"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div style="height:10px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="empty">	</div>
            <?php
            $arp_template = isset($arp_template) ? $arp_template : '';
            $arp_template_skin = isset($arp_template_skin) ? $arp_template_skin : '';
            ?>
            <input type="hidden" name="arp_template" id="arp_template" value="<?php echo ($id) ? 'arptemplate_' . $id : ''; ?>" />
            <input type="hidden" name="arp_template_old" id="arp_template_old" value="<?php echo $arp_template; ?>" />
            <input type="hidden" name="arp_template_skin" id="arp_template_skin" value="<?php echo $arp_template_skin; ?>" />
            <input type="hidden" name="arp_is_generate_html_canvas" id="arp_is_generate_html_canvas" value="no" />
        </div>
    </form>
    <div style="clear:both;"></div>
    <div class="arp_loader" id="arp_loader_div">
        <div class="arp_loader_img"></div>
    </div>
</div>
<div style="clear:both;"></div>
<div id="arp_fileupload_iframe" class="arp_modal_box" style="display:none; height:430px; width:720px;">
    <div class="modal_top_belt">
        <span class="modal_title"><?php _e('Choose File', ARP_PT_TXTDOMAIN); ?></span>
        <span class="modal_close_btn b-close"></span>
    </div>
    <div id="arp_iframeContent">
    </div>
</div>


<script type="text/javascript" language="javascript">
    __ARP_GROUP_IMG = '<?php _e('Image', ARP_PT_TXTDOMAIN); ?>';
    __ARP_GROUP_VIDEO = '<?php _e('Video', ARP_PT_TXTDOMAIN); ?>';
    __ARP_GROUP_AUDIO = '<?php _e('Audio', ARP_PT_TXTDOMAIN); ?>';
    __ARP_GROUP_OTHER = '<?php _e('Other', ARP_PT_TXTDOMAIN); ?>';

</script>

<?php /* ARPrice Modal Windows */ ?>

<!-- Font Awesome -->
<div class="arp_modal_box" id="arp_fontawesome_modal">

    <div class="modal_top_belt">
        <span class="modal_title"><?php _e('Choose Icon', ARP_PT_TXTDOMAIN); ?></span>
        <span class="modal_close_btn b-close"></span>
    </div>
    <form name="select_font_awesome_form" id="select_font_awesome_form" method="post" enctype="multipart/form-data" onSubmit="return false;">
        <input type="hidden" name="fa_to_insertcol" id="fa_to_insertcol" value="" />
        <input type="hidden" name="fa_to_insertrow" id="fa_to_insertrow" value="" />
        <input type="hidden" name="fa_to_inserttooltip" id="fa_to_inserttooltip" value="" />
        <input type="hidden" name="fa_to_insertlabel" id="fa_to_insertlabel" value="" />
        <input type="hidden" name="fontselected_1" id="fontselected_1" value="" />
        <input type="hidden" name="fontselected_2" id="fontselected_2" value="" />
        <input type="hidden" name="add_to_sec_btn" id="add_to_sec_btn" value="" />
        <input type="hidden" name="arp_fa_text" id="arp_fa_text" value="" />
        <div id="arp_fontawesome_content" class="arp_fontawesome_content">
        </div>
    </form>    

</div>
<!-- Font Awesome -->

<!-- Pricing Table Preview -->
<div class="arp_model_box" id="arp_pricing_table_preview" style="display:none;background:white;">
    <div class="arp_model_preview_belt">
        <div class="device_icon active" id="computer_icon">
            <div class="computer_icon">&#xf108;</div>
        </div>
        <div class="device_icon" id="tablet_icon">
            <div class="tablet_icon">&#xf10a;</div>
        </div>
        <div class="device_icon" id="mobile_icon">
            <div class="mobile_icon">&#xf10b;</div>
        </div>
        <div class="preview_close" id="prev_close_icon">
            <span class="modal_close_btn b-close"></span>
        </div>
    </div>
    <div class="preview_model" style="float:left;width:100%;height:90%;">
    </div>
</div>

<!-- Pricing Table Preview -->


<!-- Ribbon Modal -->
<?php global $arp_mainoptionsarr; ?>
<div class="arp_model_box" id="arp_ribbon_modal_window" style="top:50px;">
    <form name="arp_ribbon_settings" onsubmit="return add_column_ribbon();" id="arp_ribbon_settings">
        <input type="hidden" value="" id="arp_ribbon_to_insert_column" />
        <input type="hidden" value="" id="arp_ribbon_bg_color" />
        <input type="hidden" value="" id="arp_ribbon_textcolor" />
        <div class="modal_top_belt">
            <span class="modal_title"><?php _e('Select Ribbon', ARP_PT_TXTDOMAIN); ?></span>
            <span class="modal_close_btn b-close"></span>
        </div>
        <div class="arp_ribbon_modal_content" style="height:525px;">
            <div class="arp_ribbon_text_title single" style="padding:5px 5px 5px 38px;height:auto;">
                <div class="arp_select_ribbon_dropdown_menu" id="arp_select_ribbon_dropdown_menu">
                    <span class="arp_ribbon_text_title single"><?php _e('Ribbon Style', ARP_PT_TXTDOMAIN); ?></span>
                    <input type="hidden" id="arp_ribbon_style" />
                    <dl id="arp_ribbon_style" class="arp_selectbox" data-id="arp_ribbon_style" data-name="arp_ribbon_style" style="width:75% !important;margin-top:15px;float:left;">
                        <dt>
                        <span><?php _e('Select Ribbon', ARP_PT_TXTDOMAIN); ?></span>
                        <input type="text" value="<?php echo 'Select Ribbon'; ?>" style="display:none;" class="arp_autocomplete" />
                        <i class='fa fa-caret-down fa-lg'></i>
                        </dt>
                        <dd>
                            <ul class="arp_ribbon_style" data-id="arp_ribbon_style">
                                <ol class="arp_selectbox_group_label"><?php _e('Preset Ribbons', ARP_PT_TXTDOMAIN); ?></ol>
                                <?php
                                foreach ($arp_mainoptionsarr['general_options']['template_options']['arp_ribbons'] as $value => $label) {
                                    if ($value == 'arp_ribbon_6') {
                                        ?>
                                        <ol class="arp_selectbox_group_label"><?php _e('Custom Ribbon', ARP_PT_TXTDOMAIN); ?></ol>
                                        <li class="arp_selectbox_option arp_ribbon_icons" id="arp_ribbon_icons" data-ribbon="<?php echo $value; ?>" data-label="<?php echo $label; ?>" data-value="<?php echo $value; ?>"><?php echo $label; ?></li>
                                        <?php
                                    } else {
                                        ?>
                                        <li class="arp_selectbox_option arp_ribbon_icons" id="arp_ribbon_icons" data-ribbon="<?php echo $value; ?>" data-label="<?php echo $label; ?>" data-value="<?php echo $value; ?>"><?php echo $label; ?></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </dd>
                    </dl>

                    <span class="arp_ribbon_text_title single"><?php _e('Ribbon Position', ARP_PT_TXTDOMAIN); ?></span>
                    <dl style="width:75% !important;float:left;" data-id="arp_ribbon_position" data-name="arp_ribbon_position" id="select_arp_ribbon_position" class="arp_selectbox">
                        <dt><span style="float: left; max-width: 100px;"><?php _e('Right', ARP_PT_TXTDOMAIN); ?></span><input type="text" value="Right" class="arp_autocomplete" style="display: none;" id='arp_ribbon_position'><i class="fa fa-caret-down fa-lg"></i></dt>
                        <dd>
                            <ul style="margin-top: 18px; display: none;" data-id="arp_ribbon_position">
                                <li data-label="<?php _e('Right', ARP_PT_TXTDOMAIN); ?>" data-value="right"><?php _e('Right', ARP_PT_TXTDOMAIN); ?></li>
                                <li data-label="<?php _e('Left', ARP_PT_TXTDOMAIN); ?>" data-value="left"><?php _e('Left', ARP_PT_TXTDOMAIN); ?></li>
                            </ul>
                        </dd>
                    </dl>
                </div>

                <div class="arp_selected_ribbon_preview" id="arp_selected_ribbon_preview">
                    <style id="preview_arp_ribbon_1">
                        .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_1:before,
                        .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_1:after{
                            border-top-color:#0c0b0b;
                        }

                        .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_1{
                            background:#0c0b0b;
                            background-color:#0c0b0b;
                            background-image:-moz-linear-gradient(0deg,#0c0b0b,#514e4e,#0c0b0b);
                            background-image:-webkit-gradient(linear, 0 0, 0 0, color-stop(0%,#0c0b0b), color-stop(50%,#514e4e), color-stop(100%,#0c0b0b));
                            background-image:-webkit-linear-gradient(left,#0c0b0b 0%, #514e4e 51%, #0c0b0b 100%);
                            background-image:-o-linear-gradient(left,#0c0b0b 0%, #514e4e 51%, #0c0b0b 100%);
                            background-image:linear-gradient(90deg,#0c0b0b,#514e4e, #0c0b0b);
                            background-image:-ms-linear-gradient(left,#0c0b0b,#514e4e, #0c0b0b);
                            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#514e4e', endColorstr='#0c0b0b', GradientType=1);
                            -ms-filter: "progid:DXImageTransform.Microsoft.gradient (startColorstr="#514e4e", endColorstr="#0c0b0b", GradientType=1)";
                            background-repeat:repeat-x;
                            border-top:1px solid #1a1818;
                            box-shadow:13px 1px 2px rgba(0,0,0,0.6);
                            color:#ffffff;
                            text-shadow:0 0 1px rgba(0,0,0,0.4);
                        }
                    </style>
                    <style id="preview_arp_ribbon_2">
                        .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_2{
                            background:#514e4e;
                            background-color:#514e4e;
                            background-image:-moz-linear-gradient(top, #514e4e, #0c0b0b);
                            background-image:-webkit-gradient(linear, 0 0, 0 100%, from(#514e4e), to(#0c0b0b));
                            background-image:-webkit-linear-gradient(top, #514e4e, #0c0b0b);
                            background-image:-o-linear-gradient(top, #514e4e, #0c0b0b);
                            background-image:linear-gradient(to bottom, #514e4e, #0c0b0b);
                            background-repeat:repeat-x;
                            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#514e4e', endColorstr='#0c0b0b', GradientType=0);
                            -ms-filter: "progid:DXImageTransform.Microsoft.gradient (startColorstr="#514e4e", endColorstr="#0c0b0b", GradientType=0)";
                            box-shadow:0 -1px 1px rgba(0,0,0,0.4);
                            color:#ffffff;
                        }
                    </style>
                    <style id="preview_arp_ribbon_3">
                        .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_3:before, .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_3:after{
                            border-top-color:#514e4e !important;
                        }
                        .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_3{
                            border-top:75px solid #514e4e;
                            color:#ffffff;
                        }
                    </style>
                    <style id="preview_arp_ribbon_4">
                        .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_4{
                            background:#514e4e;
                            background-color:#514e4e;
                            background-image:-moz-linear-gradient(top, #514e4e, #0c0b0b);
                            background-image:-webkit-gradient(linear, 0 0, 0 100%, from(#514e4e), to(#0c0b0b));
                            background-image:-webkit-linear-gradient(top, #514e4e, #0c0b0b);
                            background-image:-o-linear-gradient(top, #514e4e, #0c0b0b);
                            background-image:linear-gradient(to bottom, #514e4e, #0c0b0b);
                            background-repeat:repeat-x;
                            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#514e4e', endColorstr='#0c0b0b', GradientType=0);
                            -ms-filter: "progid:DXImageTransform.Microsoft.gradient (startColorstr="#514e4e", endColorstr="#0c0b0b", GradientType=0)";
                            box-shadow:0 0 3px rgba(0,0,0,0.3);
                            color:#ffffff;
                        }
                    </style>
                    <style id="preview_arp_ribbon_5">
                        .arp_ribbon_style_preview_container .arp_ribbon_content.arp_ribbon_5{
                            background:#514e4e;
                            background-color:#514e4e;
                            background-image:-moz-linear-gradient(top, #514e4e, #0c0b0b);
                            background-image:-webkit-gradient(linear, 0 0, 0 100%, from(#514e4e), to(#0c0b0b));
                            background-image:-webkit-linear-gradient(top, #514e4e, #0c0b0b);
                            background-image:-o-linear-gradient(top, #514e4e, #0c0b0b);
                            background-image:linear-gradient(to bottom, #514e4e, #0c0b0b);
                            background-repeat:repeat-x;
                            filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#514e4e', endColorstr='#0c0b0b', GradientType=0);
                            -ms-filter: "progid:DXImageTransform.Microsoft.gradient (startColorstr="#514e4e", endColorstr="#0c0b0b", GradientType=0)";
                            box-shadow:-2px 2px 1px rgba(0, 0, 0, 0.3);
                            color:#ffffff;
                        }
                    </style>
                    <div id="arp_ribbon_style_preview" class="arp_ribbon_style_preview_container">
                        <div class="arp_ribbon_container arp_ribbon_right arp_ribbon_1">
                            <div class="arp_ribbon_content arp_ribbon_right arp_ribbon_1">
                                <span>20% off</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="arp_ribbon_text_content three" id="arp_ribbon_text"  style="margin-top:0px;">
                <div class="arp_ribbon_text_title single" style="line-height:normal;"><?php _e('Ribbon Text', ARP_PT_TXTDOMAIN); ?><br/>(<?php _e('First Toggle Tab', ARP_PT_TXTDOMAIN); ?>)</div>
                <div class="arp_ribbon_text_input single">
                    <input type="text" id="arp_ribbon_content" value="20% Off" class="arp_modal_txtbox ribbon_content_txt" />
                </div>
            </div>
            <div class="arp_ribbon_text_content three" id="arp_ribbon_text_second"  style="margin-top:0px;display: none;">
                <div class="arp_ribbon_text_title single" style="line-height:normal;"><?php _e('Ribbon Text', ARP_PT_TXTDOMAIN); ?><br/>(<?php _e('Second Toggle Tab', ARP_PT_TXTDOMAIN); ?>)</div>
                <div class="arp_ribbon_text_input single">
                    <input type="text" id="arp_ribbon_content_second" value="" class="arp_modal_txtbox ribbon_content_txt" />
                </div>
            </div>
            <div class="arp_ribbon_text_content three" id="arp_ribbon_text_third"  style="margin-top:0px;display: none;">
                <div class="arp_ribbon_text_title single" style="line-height:normal;"><?php _e('Ribbon Text', ARP_PT_TXTDOMAIN); ?><br/>(<?php _e('Third Toggle Tab', ARP_PT_TXTDOMAIN); ?>)</div>
                <div class="arp_ribbon_text_input single">
                    <input type="text" id="arp_ribbon_content_third" value="" class="arp_modal_txtbox ribbon_content_txt" />
                </div>
            </div>

            <div class="arp_ribbon_text_content single" id="arp_ribbon_background_color_title" style="margin-top:20px;">
                <span style="font-family:Open Sans Bold;font-size:14px;"><?php _e('Set Colors', ARP_PT_TXTDOMAIN); ?></span>
            </div>

            <div class="arp_ribbon_text_content multiple" id="arp_ribbon_background_color" style="width:25%;padding-right:0px;">
                <div class="arp_ribbon_text_input multiple" style="width:95%;">
                    <div class="arp_ribbon_bgcolor_wrapper" id="arp_ribbon_bgcolor_wrapper">
                        <input type="text" id="arp_ribbon_bgcolor" name="arp_ribbon_bgcolor" value="#514e4e" />
                        <div class="arp_ribbon_bgcolor_picker"><i class="fa fa-eyedropper fa-lg"></i></div>
                    </div>
                </div>
                <div class="arp_ribbon_text_title single" style="font-family:Ubuntu;line-height:normal;width:90%;text-align:center;"><?php _e('Background', ARP_PT_TXTDOMAIN); ?></div>
            </div>

            <div class="arp_ribbon_text_content multiple" id="arp_ribbon_text_color" style="width:22%;padding-left:10px;padding-right:6px;">
                <div class="arp_ribbon_text_input multiple" style="width:95%;">
                    <div class="arp_ribbon_txtcolor_wrapper" id="arp_ribbon_txtcolor_wrapper">
                        <input type="text" id="arp_ribbon_txtcolor" name="arp_ribbon_textcolor" value="#ffffff" />
                        <div class="arp_ribbon_textcolor_picker"><i class="fa fa-eyedropper fa-lg"></i></div>
                    </div>
                </div>
                <div class="arp_ribbon_text_title single" style="font-family:Ubuntu;line-height:normal;width:90%;text-align:center;"><?php _e('Text Color', ARP_PT_TXTDOMAIN); ?></div>
            </div>

            <div class="arp_ribbon_text_content single" id="arp_ribbon_custom_image" style="display: none;margin-top:0px;">
                <div class="arp_ribbon_text_title single"><?php _e('Custom Ribbon', ARP_PT_TXTDOMAIN); ?>&nbsp;(<?php _e('First Toggle Tab', ARP_PT_TXTDOMAIN); ?>)</div>
                <div class="arp_ribbon_text_input multiple" style="position: relative; top: 0px;margin-top:0px;">
                    <div class="arp_ribbon_txtcolor_wrapper">
                        <input type="text" id="arp_ribbon_content_custom" value="" class="arp_modal_txtbox custom_ribbon_img" style="width:50% !important;" />
                        <button data-column="" class="add_arp_ribbon_object" tyle="button" name="add_arp_ribbon_object" id="add_arp_ribbon_object" data-insert='arp_ribbon_image_object' data-id="arp_ribbon_image_url" data-input-id="arp_ribbon_content_custom"><?php _e('Add Ribbon', ARP_PT_TXTDOMAIN); ?></button>
                    </div>
                </div>
            </div>
            <div class="arp_ribbon_text_content single" id="arp_ribbon_custom_image_second" style="display: none;margin-top:20px;">
                <div class="arp_ribbon_text_title single"><?php _e('Custom Ribbon', ARP_PT_TXTDOMAIN); ?>&nbsp;(<?php _e('Second Toggle Tab', ARP_PT_TXTDOMAIN); ?>)</div>
                <div class="arp_ribbon_text_input multiple" style="position: relative; top: 0px;margin-top:0px;">
                    <div class="arp_ribbon_txtcolor_wrapper">
                        <input type="text" id="arp_ribbon_content_custom_second" value="" class="arp_modal_txtbox custom_ribbon_img" style="width:50% !important;" />
                        <button data-column="" class="add_arp_ribbon_object" tyle="button" name="add_arp_ribbon_object" id="add_arp_ribbon_object" data-insert='arp_ribbon_image_object' data-id="arp_ribbon_image_url" data-input-id="arp_ribbon_content_custom_second"><?php _e('Add Ribbon', ARP_PT_TXTDOMAIN); ?></button>
                    </div>
                </div>
            </div>
            <div class="arp_ribbon_text_content single" id="arp_ribbon_custom_image_third" style="display: none;margin-top:20px;">
                <div class="arp_ribbon_text_title single"><?php _e('Custom Ribbon', ARP_PT_TXTDOMAIN); ?>&nbsp;(<?php _e('Third Toggle Tab', ARP_PT_TXTDOMAIN); ?>)</div>
                <div class="arp_ribbon_text_input multiple" style="position: relative; top: 0px;margin-top:0px;">
                    <div class="arp_ribbon_txtcolor_wrapper">
                        <input type="text" id="arp_ribbon_content_custom_third" value="" class="arp_modal_txtbox custom_ribbon_img" style="width:50% !important;" />
                        <button data-column="" class="add_arp_ribbon_object" tyle="button" name="add_arp_ribbon_object" id="add_arp_ribbon_object" data-insert='arp_ribbon_image_object' data-id="arp_ribbon_image_url" data-input-id="arp_ribbon_content_custom_third"><?php _e('Add Ribbon', ARP_PT_TXTDOMAIN); ?></button> 
                    </div>
                </div>
            </div>

            <div style="float:left;width:100%;display:none;" id="ribbon_custom_position" >
                <div class="arp_ribbon_text_content">
                    <div class="arp_ribbon_text_title"><?php _e('Custom Position:', ARP_PT_TXTDOMAIN); ?></div>
                </div>
                <div class="arp_ribbon_text_content multiple" style="box-sizing:border-box;width:22%;margin-top:16px;">
                    <div class="arp_ribbon_text_input single" style="position:relative;top:-5px;line-height:35px;">
                        <input type="text" name="arp_ribbon_custom_position_rl" id="arp_ribbon_custom_position_rl_modal" class="arp_modal_txtbox" value="0" style="width:60px;margin-right:5px;" /><?php _e('Px', ARP_PT_TXTDOMAIN); ?>
                    </div>
                    <div class="arp_ribbon_text_title single" style="font-family:ubuntu;line-height:normal;"><?php _e('Left / Right', ARP_PT_TXTDOMAIN); ?></div>
                </div>
                <div class="arp_ribbon_text_content multiple" style="box-sizing:border-box;width:22%;margin-top:16px;">
                    <div class="arp_ribbon_text_input single" style="position:relative;top:-5px;line-height:35px;">
                        <input type="text" name="arp_ribbon_custom_position_top" id="arp_ribbon_custom_position_top_modal" class="arp_modal_txtbox" value="0" style="width:60px;margin-right:5px;" /><?php _e('Px', ARP_PT_TXTDOMAIN); ?>
                    </div>
                    <div class="arp_ribbon_text_title single" style="font-family:ubuntu;line-height:normal;">
                        <?php _e('Top', ARP_PT_TXTDOMAIN); ?>
                    </div>
                </div>
            </div>

            <div class="arp_ribbon_btn_content">
                <div class="arp_ribbon_btn">
                    <button type="submit" name="add_ribbon_insert" id="add_ribbon_insert" class="ribbon_insert_btn">
                        <?php _e('Add Ribbon', ARP_PT_TXTDOMAIN) ?>
                    </button>
                </div>
                <div class="arp_ribbon_btn">
                    <button type="button" name="add_ribbon_cancel" id="add_ribbon_cancel" class="ribbon_cancel_btn">
                        <?php _e('Cancel', ARP_PT_TXTDOMAIN); ?>
                    </button>
                </div>

            </div>
        </div>

        <div class="arp_ribbon_colorpicker_wrapper" id="arp_ribbon_colorpicker_wrapper" data-insert="arp_rbn_textcolor">
            <div class="arp_ribbon_colorpicker" id="arp_ribbon_colorpicker">
                <div class="ribbon_modal_top_belt">

                    <span class="modal_title"><?php _e('Choose Color', ARP_PT_TXTDOMAIN); ?></span>
                    <span class="ribbon_modal_close_btn"><i class="fa fa-times"></i></span>
                </div>
                <div class="arp_ribbon_colorpicker_tabs">
                    <div class="arp_basic_color_tab" id="arp_basic_color_tab">
                        <?php
                        global $arp_mainoptionsarr;

                        $basic_colors = $arp_mainoptionsarr['general_options']['arp_basic_colors'];
                        ?>
                        <ul class="arp_basic_colors">
                            <style type="text/css">
<?php
foreach ($basic_colors as $key => $colors) {
    $base_color = $colors;
    $base_color_key = array_search($base_color, $basic_colors);
    $gradient_color = $arp_mainoptionsarr['general_options']['arp_basic_colors_gradient'][$base_color_key];
    ?>
                                    .basic_color_box.basic_color_<?php echo $key; ?>{
                                        background:<?php echo $base_color; ?>;
                                        background-color:<?php echo $base_color; ?>;
                                        background-image:-moz-linear-gradient(top, <?php echo $base_color; ?>, <?php echo $gradient_color; ?>);";
                                        background-image:-webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $base_color; ?>), to(<?php echo $gradient_color; ?>));
                                        background-image:-webkit-linear-gradient(top, <?php echo $base_color; ?>, <?php echo $gradient_color; ?>);
                                        background-image:-o-linear-gradient(top, <?php echo $base_color; ?>, <?php echo $gradient_color; ?>);
                                        background-image:linear-gradient(to bottom, <?php echo $base_color; ?>, <?php echo $gradient_color; ?>);
                                        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $base_color; ?>', endColorstr='<?php echo $gradient_color; ?>', GradientType=0);
                                        -ms-filter: "progid:DXImageTransform.Microsoft.gradient (startColorstr="<?php echo $base_color; ?>", endColorstr="<?php echo $gradient_color; ?>", GradientType=0)";
                                            background-repeat:repeat-x;
                                            }
    <?php
}
?>
                                    </style>
                                    <?php
                                    foreach ($basic_colors as $key => $colors) {
                                        ?>

                                        <li class="basic_color_box basic_color_<?php echo $key; ?>" title="<?php echo $colors; ?>" data-color="<?php echo $colors; ?>" >&nbsp;</li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <div class="arp_ribbon_colorpicker_okbtn">
                                    <button type="button" id="arp_close_colorpicker" class='col_opt_btn' style="float:right;margin-right:10px;position:relative;top:-10px !important;"><?php _e('Ok', ARP_PT_TXTDOMAIN); ?></button>
                                </div>
                            </div>
                            <div class="arp_advanced_color_tab" id="arp_advanced_color_tab" data-insert="">
                                <div class="arp_advanced_color_picker jscolor"  jscolor-hash='true' jscolor-valueelement='arp_ribbon_txtcolor' id='arp_advanced_color_picker'  jscolor-onfinechange="arp_update_color(this,arp_advanced_color_picker)" data-color="#ffffff" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_advanced_color_picker)',valueElement:arp_ribbon_txtcolor,required:false}">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <!-- Ribbon Modal -->


        <!-- Header Shortcode Modal -->

        <?php
        global $arp_coloptionsarr;

        $header_options = isset($arp_coloptionsarr['header_options']) ? $arp_coloptionsarr['header_options'] : array();
        ?>

        <input type="hidden" name="shortcode_to_insert" id="shortcode_to_insert" value="" />

        <div class="arp_modal_box" id="new_template_modal">
            <div class="modal_top_belt">
                <span class="modal_title"><?php _e('Add Shortcode', ARP_PT_TXTDOMAIN); ?></span>
                <span class="modal_close_btn b-close"></span>
            </div>
            <form name="add_header_shortcode_form" id="add_header_shortcode_form" method="post" onsubmit="return add_headershortcodeform()">
                <input type="hidden" name="arpaction" id="arpaction" value="create_new" />
                <input type="hidden" name="page" value="arp_add_pricing_table" />
                <input type="hidden" name="arp_shortcode_types_hidden" id="arp_shortcode_types_hidden" value='<?php echo json_encode($header_options['html_shortcode_options']); ?>' />
                <input type="hidden" name="arp_shortcode_type_value" id="arp_shortcode_type_value" value="" />
                <input type="hidden" name="arpcol_insert_header" id="arpcol_insert_header" value="" />
                <div class="arp_modal_content">
                    <div class="modal_content_inner">
                        <div class="modal_content_row">
                            <div class="modal_content_cell">
                                <div class="modal_content_label"><?php _e('Create Shortcode', ARP_PT_TXTDOMAIN); ?></div>
                                <div class="modal_content_input" id="arp_shortcode_type_dd">


                                    <input type="hidden" name="arp_shortcode_type" id="arp_shortcode_type" />
                                    <dl id="select_arp_shortcode_type" class='arp_selectbox' data-name="arp_shortcode_type" data-id="arp_shortcode_type" style="width:235px;">
                                        <dt><span style="float:left;max-width:100px;"><?php _e('Choose Shortcode Type', ARP_PT_TXTDOMAIN); ?></span><i class="fa fa-caret-down fa-lg"></i></dt>
                                        <dd>
                                            <ul data-id="arp_shortcode_type" style="margin-top:18px; min-height:420px;">
                                                <?php
                                                if (count($header_options['html_shortcode_options']) > 0) {

                                                    foreach ($header_options['html_shortcode_options'] as $group_name) {
                                                        if ($group_name == 'image') {
                                                            echo "<ol class='arp_selectbox_group_label'>&nbsp;&nbsp;" . __('Image', ARP_PT_TXTDOMAIN) . "</ol>";
                                                            foreach ($header_options['html_shortcode_options'][$group_name] as $shortcode_id => $shortcode_name) {
                                                                echo '<li data-value="' . $shortcode_id . '" data-label="' . $shortcode_name . '">' . $shortcode_name . '</li>';
                                                            }
                                                        }

                                                        if ($group_name == 'video') {
                                                            echo "<ol class='arp_selectbox_group_label'>&nbsp;&nbsp;" . __('Video', ARP_PT_TXTDOMAIN) . "</ol>";
                                                            foreach ($header_options['html_shortcode_options'][$group_name] as $shortcode_id => $shortcode_name) {
                                                                echo '<li data-value="' . $shortcode_id . '" data-label="' . $shortcode_name . '">' . $shortcode_name . '</li>';
                                                            }
                                                        }
                                                        if ($group_name == 'audio') {
                                                            echo "<ol class='arp_selectbox_group_label'>&nbsp;&nbsp;" . __('Audio', ARP_PT_TXTDOMAIN) . "</ol>";
                                                            foreach ($header_options['html_shortcode_options'][$group_name] as $shortcode_id => $shortcode_name) {
                                                                echo '<li data-value="' . $shortcode_id . '" data-label="' . $shortcode_name . '">' . $shortcode_name . '</li>';
                                                            }
                                                        }
                                                        if ($group_name == 'other') {
                                                            echo "<ol class='arp_selectbox_group_label'>&nbsp;&nbsp;" . __('Other', ARP_PT_TXTDOMAIN) . "</ol>";
                                                            foreach ($header_options['html_shortcode_options'][$group_name] as $shortcode_id => $shortcode_name) {
                                                                echo '<li data-value="' . $shortcode_id . '" data-label="' . $shortcode_name . '">' . $shortcode_name . '</li>';
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="modal_content_cell">
                            </div>
                        </div>

                        <!-- Header Shortcode Image -->

                        <div id="arp_image_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">
                            <?php
                            if ($header_options['image_shortcode_options']) {
                                foreach ($header_options['image_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell">
                                            <label class="modal_content_label" for="arp_image_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                            <?php
                                            if ($field_id == 'url') {
                                                ?>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_image_<?php echo $field_id; ?>" id="arp_image_<?php echo $field_id; ?>" class="arp_modal_txtbox img" />
                                                    <button data-insert="image" data-id="arp_image_url" type="button" id="arp_image_<?php echo $field_id; ?>" class="arp_modal_add_file_btn"><?php _e('Add File', ARP_PT_TXTDOMAIN); ?></button>
                                                </div>
                                                <?php
                                            } else {
                                                ?>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_image_<?php echo $field_id; ?>" id="arp_image_<?php echo $field_id; ?>" class="arp_modal_txtbox" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_input modal_single">
                                        <input type="checkbox" name="arp_image_open_lightbox" id="arp_image_open_lightbox" class="arp_checkbox light_bg modal_single" value="1" />
                                    </div>
                                    <label data-for="arp_image_open_lightbox"  class="modal_content_label modal_single right_aligned"><?php _e('Open in Lightbox', ARP_PT_TXTDOMAIN); ?></label>
                                </div>
                            </div>

                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_label"></div>
                                    <div class="modal_content_input"><button type="submit"  class="arp_modal_insert_shortcode_btn" name="arp_image_btn" id="arp_image_btn"><?php _e('Insert Shortcode', ARP_PT_TXTDOMAIN); ?></button></div>
                                </div>
                            </div>

                        </div>

                        <!-- Header Shortcode Image -->

                        <div id="arp_youtube_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">
                            <?php
                            if ($header_options['youtube_shortcode_options']) {
                                foreach ($header_options['youtube_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>

                                                <div class="modal_content_input modal_single">
                                                    <input type="checkbox" name="arp_youtube_<?php echo $field_id; ?>" id="arp_youtube_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" value="1" />
                                                </div>
                                                <label class="modal_content_label modal_single right_aligned" data-for="arp_youtube_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label class="modal_content_label" for="arp_youtube_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_youtube_<?php echo $field_id; ?>" id="arp_youtube_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if ($field_id == 'height') {
                                        ?>

                                        <div class="modal_content_row">
                                            <div class="modal_content_cell">
                                                <label for="rpt_btn_image_width" class="modal_content_label"><?php _e('Width', ARP_PT_TXTDOMAIN); ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_youtube_width" name="rpt_btn_image_width">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>

                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_input modal_single">
                                        <input type="checkbox" name="arp_youtube_open_lightbox" id="arp_youtube_open_lightbox" class="arp_checkbox light_bg modal_single" value="1" />
                                    </div>
                                    <label  class="modal_content_label modal_single right_aligned" data-for="arp_youtube_open_lightbox"><?php _e('Open in Lightbox', ARP_PT_TXTDOMAIN); ?></label>
                                </div>
                            </div>
                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_label"></div>
                                    <div class="modal_content_input"><button type="submit"  class="arp_modal_insert_shortcode_btn" name="arp_youtube_btn" id="arp_youtube_btn"><?php _e('Insert Shortcode', ARP_PT_TXTDOMAIN); ?></button></div>
                                </div>
                            </div>
                        </div>

                        <!-- Header Shortcode Youtube Video -->

                        <!-- Header Shortcode Vimeo Video -->

                        <div id="arp_vimeo_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">
                            <?php
                            if ($header_options['vimeo_shortcode_options']) {
                                foreach ($header_options['vimeo_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>
                                                <div class="modal_content_input modal_single">
                                                    <input type="checkbox" name="arp_vimeo_<?php echo $field_id; ?>" id="arp_vimeo_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" value="1" />
                                                </div>
                                                <label class="modal_content_label modal_single right_aligned" data-for="arp_vimeo_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label for="arp_vimeo_<?php echo $field_id; ?>" class="modal_content_label"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_vimeo_<?php echo $field_id; ?>" id="arp_vimeo_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if ($field_id == 'height') {
                                        ?>

                                        <div class="modal_content_row">
                                            <div class="modal_content_cell">
                                                <label for="rpt_btn_image_width" class="modal_content_label"><?php _e('Width', ARP_PT_TXTDOMAIN); ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_vimeo_width" name="rpt_btn_image_width">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_input modal_single">
                                        <input type="checkbox" name="arp_vimeo_open_lightbox" id="arp_vimeo_open_lightbox" class="arp_checkbox light_bg modal_single" value="1" />
                                    </div>
                                    <label  class="modal_content_label modal_single right_aligned" data-for="arp_vimeo_open_lightbox"><?php _e('Open in Lightbox', ARP_PT_TXTDOMAIN); ?></label>
                                </div>
                            </div>
                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_label"></div>
                                    <div class="modal_content_input"><button type="submit"  class="arp_modal_insert_shortcode_btn" name="arp_vimeo_btn" id="arp_vimeo_btn"><?php _e('Insert Shortcode', ARP_PT_TXTDOMAIN); ?></button></div>
                                </div>
                            </div>
                        </div>

                        <!-- Header Shortcode Vimeo Video -->

                        <!-- Header Shortcode Screenr Video -->

                        <div id="arp_screenr_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">

                            <?php
                            if ($header_options['screenr_shortcode_options']) {
                                foreach ($header_options['screenr_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell">
                                            <label class="modal_content_label" for="arp_screenr_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                            <div class="modal_content_input">
                                                <input type="text" name="arp_screenr_<?php echo $field_id; ?>" id="arp_screenr_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if ($field_id == 'height') {
                                        ?>

                                        <div class="modal_content_row">
                                            <div class="modal_content_cell">
                                                <label for="rpt_btn_image_width" class="modal_content_label"><?php _e('Width', ARP_PT_TXTDOMAIN); ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_screenr_width" name="rpt_btn_image_width">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_input modal_single">
                                        <input type="checkbox" name="arp_screenr_open_lightbox" id="arp_screenr_open_lightbox" class="arp_checkbox light_bg modal_single" value="1" />
                                    </div>
                                    <label  class="modal_content_label modal_single right_aligned" data-for="arp_screenr_open_lightbox"><?php _e('Open in Lightbox', ARP_PT_TXTDOMAIN); ?></label>
                                </div>
                            </div>
                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_label"></div>
                                    <div class="modal_content_input"><button type="submit"  class="arp_modal_insert_shortcode_btn" name="arp_screenr_btn" id="arp_screenr_btn"><?php _e('Insert Shortcode', ARP_PT_TXTDOMAIN); ?></button></div>
                                </div>
                            </div>
                        </div>

                        <!-- Header Shortcode Screenr Video -->

                        <!-- Header Shortcode HTML5 Video -->

                        <div id="arp_video_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">
                            <?php
                            if ($header_options['video_shortcode_options']) {
                                $options = count($header_options['video_shortcode_options']);
                                $key = array();
                                $value = array();
                                foreach ($header_options['video_shortcode_options'] as $field_id => $field_key) {
                                    $key[] = $field_id;
                                    $value[] = $field_key;
                                }

                                $row = $options / 2;
                                $row = ceil($row);
                                $y = 0;
                                for ($i = 0; $i < $row; $i++) {
                                    ?>
                                    <div class="modal_content_row">
                                        <?php
                                        for ($x = $i; $x <= $i + 1; $x++) {
                                            if ($y == $options)
                                                break;
                                            ?>
                                            <div class="modal_content_cell">
                                                <?php if ($key[$y] != 'autoplay' and $key[$y] != 'loop') { ?>
                                                    <label class="modal_content_label" data-for="arp_video_<?php echo $key[$y]; ?>"><?php echo $value[$y]; ?></label>
                                                <?php } ?>
                                                <div class="modal_content_input <?php
                                                if ($key[$y] == 'autoplay' || $key[$y] == 'loop') {
                                                    echo 'modal_single';
                                                }
                                                ?>">
                                                         <?php
                                                         if ($key[$y] == 'autoplay' || $key[$y] == 'loop') {
                                                             ?>
                                                        <input type="checkbox" class="arp_checkbox light_bg" name="arp_video_<?php echo $key[$y]; ?>" id="arp_video_<?php echo $key[$y]; ?>" value="1" />
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <input type="text" name="arp_video_<?php echo $key[$y]; ?>" id="arp_video_<?php echo $key[$y]; ?>" class="arp_modal_txtbox img" value=""  />
                                                        <button data-insert="video" data-id="arp_video_<?php echo $key[$y]; ?>" type="button" class="arp_modal_add_file_btn"><?php _e('Add File', ARP_PT_TXTDOMAIN); ?></button>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <?php if ($key[$y] == 'autoplay' or $key[$y] == 'loop') { ?>
                                                    <label class="modal_content_label modal_single right_aligned" data-for="arp_video_<?php echo $key[$y]; ?>"><?php echo $value[$y]; ?></label>
                                                <?php } ?>
                                            </div>
                                            <?php
                                            $y++;
                                        }
                                        ?>                               
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_input modal_single">
                                        <input type="checkbox" name="arp_video_open_lightbox" id="arp_video_open_lightbox" class="arp_checkbox light_bg modal_single" value="1" />
                                    </div>
                                    <label  class="modal_content_label modal_single right_aligned" data-for="arp_video_open_lightbox"><?php _e('Open in Lightbox', ARP_PT_TXTDOMAIN); ?></label>
                                </div>
                            </div>
                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_label"></div>
                                    <div class="modal_content_input"><button type="submit"  class="arp_modal_insert_shortcode_btn" name="arp_video_btn" id="arp_video_btn"><?php _e('Insert Shortcode', ARP_PT_TXTDOMAIN); ?></button></div>
                                </div>
                            </div>
                        </div>

                        <!-- Header Shortcode HTML5 Video -->

                        <!-- Header Shortcode HTML5 Audio -->

                        <div id="arp_audio_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">
                            <?php
                            if ($header_options['audio_shortcode_options']) {

                                $options = count($header_options['audio_shortcode_options']);

                                $row = $options / 2;

                                $row = ceil($row);

                                $key = array();

                                $value = array();

                                foreach ($header_options['audio_shortcode_options'] as $field_id => $field_title) {
                                    $key[] = $field_id;
                                    $value[] = $field_title;
                                }
                                $y = 0;

                                for ($i = 0; $i < $row; $i++) {
                                    ?>
                                    <div class="modal_content_row">
                                        <?php
                                        for ($x = $i; $x <= $i + 1; $x++) {
                                            if ($y == $options)
                                                break;
                                            ?>
                                            <div class="modal_content_cell">
                                                <?php if ($key[$y] != 'autoplay' and $key[$y] != 'loop') { ?>
                                                    <label for="arp_audio_<?php echo $key[$y]; ?>" class="modal_content_label <?php
                                                    if ($key[$y] == 'autoplay' || $key[$y] == 'loop') {
                                                        echo 'modal_single';
                                                    }
                                                    ?>"><?php echo $value[$y]; ?></label>
                                                       <?php } ?>
                                                <div class="modal_content_input  <?php
                                                if ($key[$y] == 'autoplay' || $key[$y] == 'loop') {
                                                    echo 'modal_single';
                                                }
                                                ?>">
                                                         <?php
                                                         if ($key[$y] == 'autoplay' || $key[$y] == 'loop') {
                                                             ?>
                                                        <input type="checkbox" class="arp_checkbox light_bg" name="arp_audio_<?php echo $key[$y]; ?>" id="arp_audio_<?php echo $key[$y]; ?>" value="1" />
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <input type="text" class="arp_modal_txtbox img"  name="arp_audio_<?php echo $key[$y]; ?>" id="arp_audio_<?php echo $key[$y]; ?>"  value="" />

                                                        <button data-insert="audio" data-id="arp_audio_<?php echo $key[$y]; ?>" type="button" class="arp_modal_add_file_btn"><?php _e('Add File', ARP_PT_TXTDOMAIN); ?></button>


                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <?php if ($key[$y] == 'autoplay' or $key[$y] == 'loop') { ?>
                                                    <label class="modal_content_label modal_single right_aligned" data-for="arp_audio_<?php echo $key[$y]; ?>"><?php echo $value[$y]; ?></label>
                                                <?php } ?>
                                            </div>
                                            <?php
                                            $y++;
                                        }
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_label"></div>
                                    <div class="modal_content_input"><button type="submit" class="arp_modal_insert_shortcode_btn" name="arp_audio_btn" id="arp_audio_btn"><?php _e('Insert Shortcode', ARP_PT_TXTDOMAIN); ?></button></div>
                                </div>
                            </div>
                        </div>

                        <!-- Header Shortcode HTML5 Video -->

                        <!-- Header Shortcode Google Map -->

                        <div id="arp_googlemap_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top:20px;">
                            <?php
                            if ($header_options['googlemap_shortcode_options']) {
                                $options = count($header_options['googlemap_shortcode_options']);

                                $row = $options / 2;

                                $row = ceil($row);

                                $key = array();
                                $value = array();

                                foreach ($header_options['googlemap_shortcode_options'] as $field_id => $field_title) {
                                    $key[] = $field_id;
                                    $value[] = $field_title;
                                }

                                $y = 0;

                                for ($i = 0; $i < $row; $i++) {
                                    ?>
                                    <div class="modal_content_row">
                                        <?php
                                        for ($x = $i; $x <= $i + 1; $x++) {
                                            if ($y == $options)
                                                break;
                                            ?>
                                            <div class="modal_content_cell">
                                                <?php if ($key[$y] != 'mapinfo_show_default') { ?>
                                                    <label for="arp_googlemap_<?php echo $key[$y]; ?>" class="modal_content_label <?php if ($key[$y] == 'mapinfo_show_default') echo 'modal_single'; ?>"><?php echo $value[$y] ?></label>
                                                <?php } ?>
                                                <div class="modal_content_input <?php if ($key[$y] == 'mapinfo_show_default') echo 'modal_single'; ?>" id="<?php echo $key[$y]; ?>">
                                                    <?php
                                                    if ($key[$y] == 'mapinfo_show_default') {
                                                        ?>
                                                        <input type="checkbox" value="1" name="arp_googlemap_<?php echo $key[$y]; ?>" id="arp_googlemap_<?php echo $key[$y]; ?>" class="arp_checkbox light_bg" />
                                                        <?php
                                                    } else if ($key[$y] == 'zoom_level') {
                                                        ?>

                                                        <input type="hidden" name="arp_googlemap_<?php echo $key[$y]; ?>" id="arp_googlemap_<?php echo $key[$y]; ?>" />
                                                        <dl class="arp_selectbox" data-name="arp_googlemap_<?php echo $key[$y]; ?>" id="arp_googlemap_<?php echo $key[$y]; ?>" data-id="arp_googlemap_<?php echo $key[$y]; ?>" style="width:235px;">
                                                            <dt><span>14</span><input class="arp_autocomplete" type="hidden" value="14" /><i class="fa fa-caret-down fa-lg"></i></dt>
                                                            <dd>
                                                                <ul data-id="arp_googlemap_<?php echo $key[$y]; ?>">
                                                                    <?php
                                                                    for ($i = 1; $i <= 20; $i++) {
                                                                        ?>
                                                                        <li data-value="<?php echo $i; ?>" data-label="<?php echo $i; ?>"><?php echo $i; ?></li>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </dd>
                                                        </dl>
                                                        <?php
                                                    } else if ($key[$y] == 'mapinfo_content') {
                                                        ?>
                                                        <textarea name="arp_googlemap_<?php echo $key[$y]; ?>" id="arp_googlemap_<?php echo $key[$y]; ?>" class="arp_modal_txtarea" ></textarea>   
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <input type="text" class="arp_modal_txtbox <?php if ($key[$y] == 'marker_image') echo 'img'; ?>"  name="arp_googlemap_<?php echo $key[$y]; ?>" id="arp_googlemap_<?php echo $key[$y]; ?>" />
                                                        <?php
                                                        if ($key[$y] == 'marker_image') {
                                                            ?>
                                                            <button data-insert="map" data-id="arp_googlemap_<?php echo $key[$y]; ?>" type="button" class="arp_modal_add_file_btn"><?php _e('Add File', ARP_PT_TXTDOMAIN); ?></button>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <?php if ($key[$y] == 'mapinfo_show_default') { ?>
                                                    <label class="modal_content_label modal_single right_aligned" data-for="arp_googlemap_<?php echo $key[$y]; ?>"><?php echo $value[$y]; ?></label>
                                                <?php } ?>
                                            </div>
                                            <?php
                                            $y++;
                                        }
                                        ?>

                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_label"></div>
                                    <div class="modal_content_input"><button type="submit"  class="arp_modal_insert_shortcode_btn" name="arp_googlemap_btn" id="arp_googlemap_btn"><?php _e('Insert Shortcode', ARP_PT_TXTDOMAIN); ?></button></div>
                                </div>
                            </div>
                        </div>

                        <!-- Header Shortcode Google Map -->

                        <!-- Dailymotion Shortcode Image -->

                        <div id="arp_dailymotion_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">

                            <?php
                            if ($header_options['dailymotion_shortcode_options']) {
                                foreach ($header_options['dailymotion_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>

                                                <div class="modal_content_input modal_single">
                                                    <input type="checkbox" name="arp_dailymotion_<?php echo $field_id; ?>" id="arp_dailymotion_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" value="1" />
                                                </div>
                                                <label class="modal_content_label modal_single right_aligned" data-for="arp_dailymotion_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label class="modal_content_label" for="arp_dailymotion_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_dailymotion_<?php echo $field_id; ?>" id="arp_dailymotion_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if ($field_id == 'height') {
                                        ?>

                                        <div class="modal_content_row">
                                            <div class="modal_content_cell">
                                                <label for="rpt_btn_image_width" class="modal_content_label"><?php _e('Width', ARP_PT_TXTDOMAIN); ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_dailymotion_width" name="rpt_btn_image_width">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_input modal_single">
                                        <input type="checkbox" name="arp_dailymotion_open_lightbox" id="arp_dailymotion_open_lightbox" class="arp_checkbox light_bg modal_single" value="1" />
                                    </div>
                                    <label  class="modal_content_label modal_single right_aligned" data-for="arp_dailymotion_open_lightbox"><?php _e('Open in Lightbox', ARP_PT_TXTDOMAIN); ?></label>
                                </div>
                            </div>
                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_label"></div>
                                    <div class="modal_content_input"><button type="submit"  class="arp_modal_insert_shortcode_btn" name="arp_dailymotion_btn" id="arp_dailymotion_btn"><?php _e('Insert Shortcode', ARP_PT_TXTDOMAIN); ?></button></div>
                                </div>
                            </div>
                        </div>

                        <!-- Header Shortcode Dailymotion Video -->


                        <!-- Metacafe Shortcode Image -->

                        <div id="arp_metacafe_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">

                            <?php
                            if ($header_options['metacafe_shortcode_options']) {
                                foreach ($header_options['metacafe_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>

                                                <div class="modal_content_input modal_single">
                                                    <input type="checkbox" name="arp_metacafe_<?php echo $field_id; ?>" id="arp_metacafe_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" value="1" />
                                                </div>
                                                <label class="modal_content_label modal_single right_aligned" data-for="arp_metacafe_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label class="modal_content_label" for="arp_metacafe_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_metacafe_<?php echo $field_id; ?>" id="arp_metacafe_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    if ($field_id == 'height') {
                                        ?>

                                        <div class="modal_content_row">
                                            <div class="modal_content_cell">
                                                <label for="rpt_btn_image_width" class="modal_content_label"><?php _e('Width', ARP_PT_TXTDOMAIN); ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_metacafe_width" name="rpt_btn_image_width">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_input modal_single">
                                        <input type="checkbox" name="arp_dailymotion_metacafe_lightbox" id="arp_metacafe_open_lightbox" class="arp_checkbox light_bg modal_single" value="1" />
                                    </div>
                                    <label  class="modal_content_label modal_single right_aligned" data-for="arp_metacafe_open_lightbox"><?php _e('Open in Lightbox', ARP_PT_TXTDOMAIN); ?></label>
                                </div>
                            </div>
                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_label"></div>
                                    <div class="modal_content_input"><button type="submit"  class="arp_modal_insert_shortcode_btn" name="arp_metacafe_btn" id="arp_metacafe_btn"><?php _e('Insert Shortcode', ARP_PT_TXTDOMAIN); ?></button></div>
                                </div>
                            </div>
                        </div>

                        <!-- Header Shortcode Metacafe Video -->






                        <!-- Soundcloud Shortcode Image -->

                        <div id="arp_soundcloud_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">

                            <?php
                            if ($header_options['soundcloud_shortcode_options']) {
                                foreach ($header_options['soundcloud_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>

                                                <div class="modal_content_input modal_single">
                                                    <input type="checkbox" name="arp_soundcloud_<?php echo $field_id; ?>" id="arp_soundcloud_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" value="1" />
                                                </div>
                                                <label class="modal_content_label modal_single right_aligned" data-for="arp_soundcloud_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label class="modal_content_label" for="arp_soundcloud_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_soundcloud_<?php echo $field_id; ?>" id="arp_soundcloud_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_label"></div>
                                    <div class="modal_content_input"><button type="submit"  class="arp_modal_insert_shortcode_btn" name="arp_soundcloud_btn" id="arp_soundcloud_btn"><?php _e('Insert Shortcode', ARP_PT_TXTDOMAIN); ?></button></div>
                                </div>
                            </div>
                        </div>

                        <!-- Header Shortcode Soundcloud Video -->


                        <!-- Mixcloud Shortcode Image -->

                        <div id="arp_mixcloud_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">

                            <?php
                            if ($header_options['mixcloud_shortcode_options']) {
                                foreach ($header_options['mixcloud_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>

                                                <div class="modal_content_input modal_single">
                                                    <input type="checkbox" name="arp_mixcloud_<?php echo $field_id; ?>" id="arp_mixcloud_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" value="1" />
                                                </div>
                                                <label class="modal_content_label modal_single right_aligned" data-for="arp_mixcloud_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label class="modal_content_label" for="arp_mixcloud_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_mixcloud_<?php echo $field_id; ?>" id="arp_mixcloud_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_label"></div>
                                    <div class="modal_content_input"><button type="submit"  class="arp_modal_insert_shortcode_btn" name="arp_mixcloud_btn" id="arp_mixcloud_btn"><?php _e('Insert Shortcode', ARP_PT_TXTDOMAIN); ?></button></div>
                                </div>
                            </div>
                        </div>

                        <!-- Header Shortcode mixcloud Video -->



                        <!-- beatport Shortcode Image -->

                        <div id="arp_beatport_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">

                            <?php
                            if ($header_options['beatport_shortcode_options']) {
                                foreach ($header_options['beatport_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>

                                                <div class="modal_content_input modal_single">
                                                    <input type="checkbox" name="arp_beatport_<?php echo $field_id; ?>" id="arp_beatport_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" value="1" />
                                                </div>
                                                <label class="modal_content_label modal_single right_aligned" data-for="arp_beatport_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label class="modal_content_label" for="arp_beatport_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">
                                                    <input type="text" name="arp_beatport_<?php echo $field_id; ?>" id="arp_beatport_<?php echo $field_id; ?>" class="arp_modal_txtbox" value="" />
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_label"></div>
                                    <div class="modal_content_input"><button type="submit"  class="arp_modal_insert_shortcode_btn" name="arp_beatport_btn" id="arp_beatport_btn"><?php _e('Insert Shortcode', ARP_PT_TXTDOMAIN); ?></button></div>
                                </div>
                            </div>
                        </div>

                        <!-- Header Shortcode Embed -->

                        <div id="arp_embed_shortcode_div" class="arp_shortcode_div" style="display:none;margin-top: 20px;">

                            <?php
                            if ($header_options['embed_shortcode_options']) {
                                foreach ($header_options['embed_shortcode_options'] as $field_id => $field_title) {
                                    ?>
                                    <div class="modal_content_row">
                                        <div class="modal_content_cell" style="width:90%;">

                                            <?php
                                            if ($field_id == 'autoplay') {
                                                ?>

                                                <div class="modal_content_input modal_single">
                                                    <input type="checkbox" name="arp_embed_<?php echo $field_id; ?>" id="arp_embed_<?php echo $field_id; ?>" class="arp_checkbox light_bg modal_single" value="1" />
                                                </div>
                                                <label class="modal_content_label modal_single right_aligned" data-for="arp_embed_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <?php
                                            } else {
                                                ?>
                                                <label class="modal_content_label" for="arp_embed_<?php echo $field_id; ?>"><?php echo $field_title; ?></label>
                                                <div class="modal_content_input">

                                                    <textarea name="arp_embed_<?php echo $field_id; ?>" id="arp_embed_<?php echo $field_id; ?>" class="arp_modal_txtarea" ></textarea>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                            <div class="modal_content_row">
                                <div class="modal_content_cell">
                                    <div class="modal_content_label"></div>
                                    <div class="modal_content_input"><button type="submit"  class="arp_modal_insert_shortcode_btn" name="arp_embed_btn" id="arp_embed_btn"><?php _e('Insert Shortcode', ARP_PT_TXTDOMAIN); ?></button></div>
                                </div>
                            </div>
                        </div>

                        <!-- Header Shortcode Embed -->




                    </div>
                </div>
            </form>
        </div>

        <!-- Header Shortcode Modal -->

        <!-- Slider Navigation Modal -->
        <div class="arp_model_box" id="arp_select_navigation_style" style="display:none;background:white;">
            <div class="modal_top_belt">
                <span class="modal_title"><?php _e('Choose Navigation Style', ARP_PT_TXTDOMAIN); ?></span>
                <span id="nav_style_close" class="modal_close_btn b-close"></span>
            </div>
            <div class="arp_modal_content slider_pagination_navigation">
                <?php
                global $arp_mainoptionsarr;
                foreach ($arp_mainoptionsarr['general_options']['column_animation']['navigation_style'] as $style) {
                    ?>
                    <div class="navigation_style_wrapper <?php echo ( isset($opt['column_animation']['navigation_style']) && $opt['column_animation']['navigation_style'] == $style ) ? 'selected' : ''; ?>" id="<?php echo $style; ?>">
                        <div class="<?php echo $style; ?>" ></div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <!-- Slider Navigation Modal -->

        <!-- Slider Pagination Modal -->

        <div class="arp_modal_box" id="arp_select_pagination_style" style="display:none;background:#ffffff;">
            <div class="modal_top_belt">
                <span class="modal_title"><?php _e('Choose Pagination Style', ARP_PT_TXTDOMAIN); ?></span>
                <span id="paging_style_close" class="modal_close_btn b-close"></span>
            </div>
            <div class="arp_modal_content slider_pagination_navigation">
                <?php
                global $arp_mainoptionsarr;
                foreach ($arp_mainoptionsarr['general_options']['column_animation']['pagination_style'] as $style) {
                    ?>
                    <div class="pagination_style_wrapper <?php echo ( isset($opt['column_animation']['pagination_style']) && $opt['column_animation']['pagination_style'] == $style ) ? 'selected' : ''; ?>" id="<?php echo $style; ?>">
                        <?php
                        for ($i = 1; $i <= 3; $i++) {
                            ?>
                            <div class="<?php echo $style . ' page_' . $i; ?>" ></div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <!-- Slider Pagination Modal -->

        <!-- Button Shortcode Modal -->

        <div class="arp_modal_box" id="arp_button_template_modal" style="display:none; background:#ffffff;">
            <form name="add_button_shortcode_form" id="add_button_shortcode_form" method="post" onsubmit="return add_rpt_btn_shortcode();">
                <input type="hidden" name="rptaction" id="rptaction" value="create_new" />
                <input type="hidden" name="page" value="rpt_add_pricing_table" />
                <div class="modal_top_belt">
                    <span class="modal_title"><?php _e('Add Shortcode', ARP_PT_TXTDOMAIN); ?></span>
                    <span id="button_style_close" class="modal_close_btn b-close"></span>
                </div>
                <div class="arp_modal_content arp_button_template">
                    <div id="rpt_btn_image_shortcode_div" class="rpt_shortcode_div" style="margin-top: 20px;">
                        <div class="modal_content_row">
                            <div class="modal_content_cell">
                                <label for="rpt_btn_image_url" class="modal_content_label"><?php _e('Image URL', ARP_PT_TXTDOMAIN); ?></label>
                                <div class="modal_content_input">
                                    <input type="text" value="" class="arp_modal_txtbox img" id="arp_btn_image_url" name="rpt_btn_image_url">
                                    <button data-insert="btn_image" data-id="arp_btn_image_url" type="button" class="arp_modal_add_file_btn"><?php _e('Add File', ARP_PT_TXTDOMAIN); ?></button>
                                </div>
                            </div>
                        </div>

                        <div class="modal_content_row">
                            <div class="modal_content_cell">
                                <label for="rpt_btn_image_height" class="modal_content_label"><?php _e('Height', ARP_PT_TXTDOMAIN); ?></label>
                                <div class="modal_content_input">
                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_btn_image_height" name="rpt_btn_image_height">
                                </div>
                            </div>
                        </div>

                        <div class="modal_content_row">
                            <div class="modal_content_cell">
                                <label for="rpt_btn_image_width" class="modal_content_label"><?php _e('Width', ARP_PT_TXTDOMAIN); ?></label>
                                <div class="modal_content_input">
                                    <input type="text" value="" class="arp_modal_txtbox" id="arp_btn_image_width" name="rpt_btn_image_width">
                                </div>
                            </div>
                        </div>

                        <div class="modal_content_row">
                            <div class="modal_content_cell">
                                <div class="modal_content_label"></div>
                                <div class="modal_content_input"><button type="submit" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_image_btn"><?php _e('Insert Shortcode', ARP_PT_TXTDOMAIN); ?></button></div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>

        <!-- Button Shortcode Modal -->

        <!-- Remove Row Modal -->
        <div class="arp_model_delete_box" id="arp_remove_row" style="display:none;background:white;">
            <div class="modal_top_belt">
                <span class="modal_title"><?php _e('Delete Row', ARP_PT_TXTDOMAIN); ?></span>
                <span id="nav_style_close" class="modal_close_btn b-close"></span>
            </div>
            <div class="arp_modal_delete_content">
                <div class="arp_delete_modal_msg">Are you sure want to delete this row?</div>

                <div class="arp_delete_modal_btn">
                    <button id="Model_Delete_Row_Button" col-id=''row-id='' type="button" class="ribbon_insert_btn delete_row">Okay</button>
                    <button id="Model_Delete_Row_Button"  class="ribbon_cancel_btn" type="button">Cancel</button>
                </div>

            </div>
        </div>

        <!-- Remove Row Modal -->

        <!-- Remove column -->
        <div class="arp_model_delete_box" id="arp_remove_column_last" style="display:none;background:white;">
            <div class="modal_top_belt">
                <span class="modal_title"><?php _e('Delete Column', ARP_PT_TXTDOMAIN); ?></span>
                <span id="nav_style_close" class="modal_close_btn b-close"></span>
            </div>
            <div class="arp_modal_delete_content">
                <div class="arp_delete_modal_msg"><?php _e("You can not delete all columns", ARP_PT_TXTDOMAIN); ?></div>
                <div class="arp_delete_modal_btn">
                    <button id="Model_Delete_Column_last"  class="ribbon_insert_btn Model_Delete_Column_last_btn" type="button"><?php _e("Okay", ARP_PT_TXTDOMAIN); ?></button>
                </div>
            </div>
        </div>

        <!-- Remove column -->



        <!--Empty Selection modal box-->
        <div class="arp_model_empty_box" id="arp_empty_temp" style="display:none;background:white;">
            <div class="modal_top_belt_emptybox">
                <span class="modal_title_emptybox"><?php _e('Please Select a Template', ARP_PT_TXTDOMAIN); ?></span>

            </div>
            <div class="arp_modal_delete_content">


                <div class="arp_empty_modal_btn">
                    <button id=""  type="button" class="ribbon_insert_btn b-close">Okay</button>
                </div>

            </div>
        </div>
        <!---->

        <!-- Header Object Modal Box -->
        <div class="arp_object_modal_box" id="arp_object_modal_box" style="display:none; background:#ffffff;">
            <form name="add_arp_object" id="add_arp_object" method="post" onsubmit="return false;">
                <input type="hidden" id="arpcol_to_insert_object" name="arpcol_to_insert_object" />
                <input type="hidden" id="arpcol_insert" name="arpcol_insert" />
                <div class="modal_top_belt">
                    <span class="modal_title"><?php _e('Add Shortcode', ARP_PT_TXTDOMAIN); ?></span>
                    <span id="button_style_close" class="modal_close_btn b-close"></span>
                </div>
                <div class="arp_modal_content" style="padding:20px;">

                    <div class="modal_content_row">
                        <div class="modal_content_cell">
                            <label for="rpt_btn_image_url" class="modal_content_label"><?php _e('Image URL', ARP_PT_TXTDOMAIN); ?></label>
                            <div class="modal_content_input">
                                <input type="text" value="" class="arp_modal_txtbox img" id="arp_header_image_url" name="arp_header_image_url">
                                <button data-insert="header_object" data-id="arp_header_image_url" type="button" class="arp_header_object"><?php _e('Add File', ARP_PT_TXTDOMAIN); ?></button>
                            </div>
                        </div>
                    </div>


                    <div class="modal_content_row">
                        <div class="modal_content_cell">
                            <label for="arp_header_image_height" class="modal_content_label"><?php _e('Height', ARP_PT_TXTDOMAIN); ?></label>
                            <div class="modal_content_input">
                                <input type="text" value="" class="arp_modal_txtbox" id="arp_header_image_height" name="arp_header_image_height">
                            </div>
                        </div>
                    </div>

                    <div class="modal_content_row">
                        <div class="modal_content_cell">
                            <label for="arp_header_image_width" class="modal_content_label"><?php _e('Width', ARP_PT_TXTDOMAIN); ?></label>
                            <div class="modal_content_input">
                                <input type="text" value="" class="arp_modal_txtbox" id="arp_header_image_width" name="arp_header_image_width">
                            </div>
                        </div>
                    </div>

                    <div class="modal_content_row">
                        <div class="modal_content_cell" id="modal_content_cell">
                            <div class="modal_content_label"></div>
                            <div class="modal_content_input">
                                <button type="submit" onclick="arp_add_object();" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_image_btn"><?php _e('Add Image', ARP_PT_TXTDOMAIN); ?></button><button type="button" style="display:none;margin-left:10px;" onclick="arp_remove_object();" class="arp_modal_insert_shortcode_btn" name="arp_remove_img_btn" id="arp_remove_img_btn"><?php _e('Remove Image', ARP_PT_TXTDOMAIN); ?></button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <!---->
        <!--================================================-->

        <div class="arp_object_modal_box" id="arp_object_modal_box_ribbon" style="display:none; background:#ffffff;width:650px;height:530px;">
            <form name="add_arp_ribbon_object" id="add_arp_ribbon_object" method="post" onsubmit="return false;">
                <input type="hidden" id="arpcol_to_insert_ribbon_object" name="arpcol_to_insert_ribbon_object" />
                <input type="hidden" id="arpcol_ribbon_insert" name="arpcol_ribbon_insert" />
                <div class="modal_top_belt">
                    <span class="modal_title"><?php _e('Ribbon Url', ARP_PT_TXTDOMAIN); ?></span>
                    <span id="button_style_close" class="modal_close_btn b-close"></span>
                </div>
                <div class="arp_modal_content" style="padding:20px;">

                    <div class="modal_content_row">
                        <div class="modal_content_cell">
                            <label for="rpt_btn_image_url" class="modal_content_label"><?php _e('Image URL', ARP_PT_TXTDOMAIN); ?></label>
                            <div class="modal_content_input">
                                <input type="text" value="" class="arp_modal_txtbox img" id="arp_ribbon_image_url" name="arp_ribbon_image_url" style="width:208px;">
                                <button data-insert="arp_ribbon_image_object" data-id="arp_ribbon_image_url" type="button" class="arp_ribbon_image_object"><?php _e('Add File', ARP_PT_TXTDOMAIN); ?></button>
                            </div>
                        </div>
                    </div>

                    <div class="modal_content_row">
                        <div class="modal_content_cell">
                            <div class="modal_content_label"></div>
                            <div class="modal_content_input"><button type="submit" onclick="arp_add_ribbon_object();" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_image_btn"><?php _e('Add Image', ARP_PT_TXTDOMAIN); ?></button></div>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <!--================================================-->


        <!-- Font Awesome -->
        <div class="arp_modal_box" id="arp_obj_fontawesome_modal">

            <div class="modal_top_belt">
                <span class="modal_title"><?php _e('Choose Icon', ARP_PT_TXTDOMAIN); ?></span>
                <span class="modal_close_btn b-close"></span>
            </div>
            <form name="select_font_awesome_form" id="select_font_awesome_form" method="post" enctype="multipart/form-data" onSubmit="return false;">
                <input type="hidden" name="arpcol_to_insert_font" id="arpcol_to_insert_font" value="" />
                <input type="hidden" name="arpcol_insert_font" id="arpcol_insert_font" value="" />
                <div id="arp_fontawesome_content" class="arp_fontawesome_content">
                    <?php
//                    include(PRICINGTABLE_VIEWS_DIR . '/arprice_font_awesome.php');
                    ?>
                </div>
            </form>    

        </div>
        <!-- Font Awesome -->


        <!-- CSS Class Model -->

        <div class="arp_model_css_info_box" id="arp_model_css_info_box" style="display:none;background:white;">
            <div class="modal_top_belt">
                <span class="modal_title"><?php _e('ARPrice CSS Class Information', ARP_PT_TXTDOMAIN); ?></span>
                <span class="modal_close_btn b-close"></span>
            </div>
            <div class="arp_css_info_model_content" id="arp_css_info_model_content">

            </div>
        </div>

        <!-- CSS Class Model -->

        <!-- Color Options Model Window -->
        <?php
        if (isset($id) && $id != "") {
            $sql = $wpdb->get_row($wpdb->prepare("SELECT general_options FROM " . $wpdb->prefix . "arp_arprice WHERE ID = %d AND status = %s ", $id, 'published'));
            $table_id = isset($sql->ID) ? $sql->ID : '';
            $general_option = maybe_unserialize($sql->general_options);

            //print_r($general_option);
        } else {
            $id = "";
        }
        ?>
        <?php if ($setact == 1) { ?>
            <div class="column_custom_background " table_id="<?php echo $id ?>"  style="display:none" id="arp_custom_color_scheme_popup" style='display:none;'>
                <div class="col_opt_row" id="arp_custom_color_tab" style="padding:0 !important;">
                    <div class="col_opt_title_div two_column arp_color_tab selected" data-id="arp_normal"><?php _e('Normal', ARP_PT_TXTDOMAIN); ?></div>
                    <div class="col_opt_title_div two_column arp_color_tab" data-id="arp_hover"><?php _e('Hover', ARP_PT_TXTDOMAIN); ?></div>
                </div>
                <div class="col_opt_row" id="arp_normal_custom_color_tab" style="padding:0 !important;">
                    <div class="col_opt_title_div two_column"></div>
                    <div class="col_opt_title_div two_column" data-id="background_color" style="padding-top:5px !important;"><?php _e('Background', ARP_PT_TXTDOMAIN); ?></div>
                    <div class="col_opt_title_div two_column" data-id="font_color" style="padding-top:5px !important;"><?php _e('Text Color', ARP_PT_TXTDOMAIN); ?></div>
                </div>
                <div id="arp_normal_background_color">
                    <div class="col_opt_row" id="arp_column_background_color_data_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php _e('Column', ARP_PT_TXTDOMAIN); ?></div>
                        <div class="col_opt_input_div two_column">
                            <div data-color="<?php echo isset($general_option['custom_skin_colors']['arp_column_bg_custom_color']) ? $general_option['custom_skin_colors']['arp_column_bg_custom_color'] : ''; ?>" id="arp_column_background_color_data" data-column-id="" data-column="" class="color_picker_font font_color_picker background_column_picker arp_header_background_color jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_column_background_color_data)',valueElement:arp_column_background_color_data_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_column_background_color_data)' jscolor-valueelement="arp_column_background_color_data_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['custom_skin_colors']['arp_column_bg_custom_color']) ? $general_option['custom_skin_colors']['arp_column_bg_custom_color'] : ''; ?>" name="arp_column_bg_custom_color" id="arp_column_background_color_data_hidden" />
                        </div>
                    </div>
                    <div class="col_opt_row" id="arp_header_background_color_div" style="display:none">
                        <div class="col_opt_title_div two_column">
                            <?php _e('Header', ARP_PT_TXTDOMAIN); ?>
                        </div>
                        <div class="col_opt_input_div two_column arp_header_background_div_id" id='arp_header_background_div_id'>

                            <div data-color="<?php echo isset($general_option['custom_skin_colors']['arp_header_bg_custom_color']) ? $general_option['custom_skin_colors']['arp_header_bg_custom_color'] : ''; ?>" id="arp_header_background_color" data-column-id="" data-column="" class="color_picker_font font_color_picker background_column_picker arp_header_background_color jscolor arp_custom_css_colorpicker" data-id="arp_header_background_color_hidden" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_header_background_color)',valueElement:arp_header_background_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_header_background_color)' jscolor-valueelement='arp_header_background_color_hidden' >
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['custom_skin_colors']['arp_header_bg_custom_color']) ? $general_option['custom_skin_colors']['arp_header_bg_custom_color'] : ''; ?>" name="arp_header_background_color" id="arp_header_background_color_hidden" >
                        </div>
                        <div class="col_opt_input_div two_column arp_header_font_color_div_id" id='arp_header_font_color_div_id'>
                            <div id="arp_header_font_color" data-color="<?php echo isset($general_option['custom_skin_colors']['arp_header_font_custom_color']) ? $general_option['custom_skin_colors']['arp_header_font_custom_color'] : ''; ?>" data-column-id="<?php echo isset($general_option['custom_skin_colors']['arp_header_font_custom_color']) ? $general_option['custom_skin_colors']['arp_header_font_custom_color'] : ''; ?>" data-column="" class="color_picker_font font_color_picker background_column_picker arp_header_font_custom_color jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_header_font_color)',valueElement:arp_header_font_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_header_font_color)' jscolor-valueelement="arp_header_font_color_hidden">
                            </div>

                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="" name="arp_header_font_custom_color" id="arp_header_font_color_hidden" >
                        </div>
                    </div>

                    <div class="col_opt_row" id="arp_shortcode_background_color_div" style="display:none">
                        <div class="col_opt_title_div two_column" style='line-height:1.5;'>
                            <?php _e('Shortcode Section', ARP_PT_TXTDOMAIN); ?>
                        </div>
                        <div class="col_opt_input_div two_column arp_shortcode_background_div_id" id='arp_shortcode_background_div_id'>

                            <div data-color="<?php echo isset($general_option['custom_skin_colors']['arp_shortcode_bg_custom_color']) ? $general_option['custom_skin_colors']['arp_shortcode_bg_custom_color'] : ''; ?>" id="arp_shortcode_background_color" data-column-id="" data-column="" class="color_picker_font font_color_picker background_column_picker arp_shortcode_background_color jscolor arp_custom_css_colorpicker" data-id="arp_shortcode_background_color_hidden" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_shortcode_background_color)',valueElement:arp_shortcode_background_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_shortcode_background_color)' jscolor-valueelement='arp_shortcode_background_color_hidden' >
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['custom_skin_colors']['arp_shortcode_bg_custom_color']) ? $general_option['custom_skin_colors']['arp_shortcode_bg_custom_color'] : ''; ?>" name="arp_shortcode_background_color" id="arp_shortcode_background_color_hidden" >
                        </div>
                        <div class="col_opt_input_div two_column arp_shortcode_font_color_div_id" id='arp_shortcode_font_color_div_id'>
                            <div id="arp_shortcode_font_custom_color" data-color="<?php echo isset($general_option['custom_skin_colors']['arp_shortcode_font_custom_color']) ? $general_option['custom_skin_colors']['arp_shortcode_font_custom_color'] : ''; ?>" data-column-id="<?php echo isset($general_option['custom_skin_colors']['arp_shortcode_font_custom_color']) ? $general_option['custom_skin_colors']['arp_shortcode_font_custom_color'] : ''; ?>" data-column="" class="color_picker_font font_color_picker background_column_picker arp_shortcode_font_custom_color jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_shortcode_font_color)',valueElement:arp_shortcode_font_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_shortcode_font_color)' jscolor-valueelement="arp_shortcode_font_color_hidden" data-id="arp_shortcode_font_color_hidden">
                            </div>

                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="" name="arp_shortcode_font_custom_color" id="arp_shortcode_font_color_hidden" >
                        </div>
                    </div>

                    <div class="col_opt_row" id="arp_column_desc_background_color_data_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php _e('Description', ARP_PT_TXTDOMAIN); ?></div>
                        <div class="col_opt_input_div two_column arp_column_desc_background_color_div_id" id='arp_column_desc_background_color_div_id'>
                            <div data-color="<?php echo isset($general_option['custom_skin_colors']['arp_column_desc_bg_custom_color']) ? $general_option['custom_skin_colors']['arp_column_desc_bg_custom_color'] : ''; ?>" id="arp_column_desc_background_color_data" data-column-id="" data-column="" class="color_picker_font font_color_picker background_column_picker arp_header_background_color jscolor arp_custom_css_colorpicker" data-column_id="" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_column_desc_background_color_data)',valueElement:arp_column_desc_background_color_data_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_column_desc_background_color_data)' jscolor-valueelement="arp_column_desc_background_color_data_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['arp_column_desc_bg_custom_color']) ? $general_option['arp_column_desc_bg_custom_color'] : ''; ?>" name="arp_column_desc_bg_custom_color" id="arp_column_desc_background_color_data_hidden" />
                        </div>
                        <div class="col_opt_input_div two_column arp_desc_font_custom_color_div_id" id='arp_desc_font_custom_color_div_id'>
                            <div id="arp_desc_font_custom_color" data-color="<?php echo isset($general_option['custom_skin_colors']['arp_desc_font_custom_color']) ? $general_option['custom_skin_colors']['arp_desc_font_custom_color'] : ''; ?>" data-column-id="<?php echo isset($general_option['custom_skin_colors']['arp_desc_font_custom_color']) ? $general_option['custom_skin_colors']['arp_desc_font_custom_color'] : ''; ?>" data-column="" class="color_picker_font font_color_picker background_column_picker arp_desc_font_custom_color jscolor arp_custom_css_colorpicker" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_desc_font_custom_color)' data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_desc_font_custom_color)',valueElement:arp_desc_font_custom_color_hidden}" jscolor-valueelement="arp_desc_font_custom_color_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['custom_skin_colors']['arp_desc_font_custom_color']) ? $general_option['custom_skin_colors']['arp_desc_font_custom_color'] : ''; ?>" name="arp_desc_font_custom_color" id="arp_desc_font_custom_color_hidden" />
                        </div>
                    </div>
                    <div class="col_opt_row" id="arp_pricing_background_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php _e('Pricing', ARP_PT_TXTDOMAIN); ?></div>
                        <div class="col_opt_input_div two_column arp_pricing_background_div_id" id='arp_pricing_background_div_id'>
                            <div data-color="<?php echo isset($general_option['arp_pricing_bg_custom_color']) ? $general_option['arp_pricing_bg_custom_color'] : ''; ?>" id="arp_pricing_background_color" data-column-id="" data-column="" class="color_picker_font font_color_picker background_column_picker arp_header_background_color jscolor arp_custom_css_colorpicker" data-column_id="" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_pricing_background_color)',valueElement:arp_pricing_background_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_pricing_background_color)' jscolor-valueElement="arp_pricing_background_color_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['arp_pricing_bg_custom_color']) ? $general_option['arp_pricing_bg_custom_color'] : ''; ?>" name="arp_pricing_background_color" id="arp_pricing_background_color_hidden" />
                        </div>
                        <div class="col_opt_input_div two_column arp_pricing_font_color_div_id" id='arp_pricing_font_color_div_id'>
                            <div id="arp_price_font_custom_color" data-color="<?php echo isset($general_option['custom_skin_colors']['arp_price_font_custom_color']) ? $general_option['custom_skin_colors']['arp_price_font_custom_color'] : ''; ?>" data-column-id="<?php echo isset($general_option['custom_skin_colors']['arp_price_font_custom_color']) ? $general_option['custom_skin_colors']['arp_price_font_custom_color'] : ''; ?>" data-column="" class="color_picker_font font_color_picker background_column_picker arp_price_font_custom_color jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_price_font_custom_color)',valueElement:arp_price_font_custom_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_price_font_custom_color)' jscolor-valueelement="arp_price_font_custom_color_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['custom_skin_colors']['arp_price_font_custom_color']) ? $general_option['custom_skin_colors']['arp_price_font_custom_color'] : ''; ?>" name="arp_price_font_custom_color" id="arp_price_font_custom_color_hidden" >
                        </div>
                    </div>
                    <div class="col_opt_row" id="arp_footer_background_color_div" style="display:none;">
                        <div class="col_opt_title_div two_column"><?php _e('Footer', ARP_PT_TXTDOMAIN); ?></div>
                        <div class="col_opt_input_div two_column arp_footer_background_div_id">
                            <div data-color="<?php echo isset($general_option['arp_footer_content_bg_color']) ? $general_option['arp_footer_content_bg_color'] : ''; ?>" id="arp_footer_background_color" data-column_id="" data-column="" class="color_picker_font font_color_picker background_column_picker arp_footer_background jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_footer_background_color)',valueElement:arp_footer_background_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_footer_background_color)' jscolor-valueelement="arp_footer_background_color_hidden" >
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color"   value="<?php echo isset($general_option['arp_footer_content_bg_color']) ? $general_option['arp_footer_content_bg_color'] : ''; ?>" name="arp_footer_background_color" id="arp_footer_background_color_hidden" />
                        </div>
                        <div class="col_opt_input_div two_column arp_footer_font_color_div_id">
                            <div id="arp_footer_font_custom_color" data-color="<?php echo isset($general_option['custom_skin_colors']['arp_footer_font_custom_color']) ? $general_option['custom_skin_colors']['arp_footer_font_custom_color'] : ''; ?>" data-column-id="<?php echo isset($general_option['custom_skin_colors']['arp_footer_font_custom_color']) ? $general_option['custom_skin_colors']['arp_footer_font_custom_color'] : ''; ?>" data-column="" class="color_picker_font font_color_picker background_column_picker arp_footer_font_custom_color jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_footer_font_custom_color)',valueElement:arp_footer_font_custom_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_footer_font_custom_color)' jscolor-valueelement='arp_footer_font_custom_color_hidden'>                                
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['custom_skin_colors']['arp_footer_font_custom_color']) ? $general_option['custom_skin_colors']['arp_footer_font_custom_color'] : ''; ?>" name="arp_footer_font_custom_color" id="arp_footer_font_custom_color_hidden" >
                        </div>
                    </div>
                    <div class="col_opt_row" id="arp_button_background_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php _e('Button', ARP_PT_TXTDOMAIN); ?></div>
                        <div class="col_opt_input_div two_column arp_button_background_div_id" id='arp_button_background_div_id'>
                            <div data-color="<?php echo isset($general_option['arp_button_bg_custom_color']) ? $general_option['arp_button_bg_custom_color'] : ''; ?>" id="arp_button_background_color" data-column_id="" data-column="" class="color_picker_font font_color_picker background_column_picker arp_footer_background jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_button_background_color)',valueElement:arp_button_background_color_hidden}" jscolor-hash='true' jscolor-valueelement="arp_button_background_color_hidden" jscolor-onfinechange='arp_update_color(this,arp_button_background_color)'>
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color" value="<?php echo isset($general_option['arp_button_bg_custom_color']) ? $general_option['arp_button_bg_custom_color'] : ''; ?>" name="arp_button_background_color" id="arp_button_background_color_hidden" />
                        </div>
                        <div class="col_opt_input_div two_column" id='arp_button_font_color_div_id'>
                            <div id="arp_button_font_custom_color" data-color="<?php echo isset($general_option['custom_skin_colors']['arp_button_font_custom_color']) ? $general_option['custom_skin_colors']['arp_button_font_custom_color'] : ''; ?>" data-column-id="<?php echo isset($general_option['custom_skin_colors']['arp_button_font_custom_color']) ? $general_option['custom_skin_colors']['arp_button_font_custom_color'] : ''; ?>" data-column="" class="color_picker_font font_color_picker background_column_picker arp_button_font_custom_color jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_button_font_custom_color)',valueElement:arp_button_font_custom_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_button_font_custom_color)', jscolor-valueelement='arp_button_font_custom_color_hidden'>
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['custom_skin_colors']['arp_button_font_custom_color']) ? $general_option['custom_skin_colors']['arp_button_font_custom_color'] : ''; ?>" name="arp_button_font_custom_color" id="arp_button_font_custom_color_hidden">
                            <div class="col_opt_input_div" id="button_custom_font_notice" style="display:none;">(For Button <br>Hover)</div>
                        </div>

                    </div>
                    <div class="col_opt_row" id="arp_body_background_color" style="display:none;padding-left:5px !important;">
                        <div class="col_opt_title_div"><?php _e('Body Row Colors', ARP_PT_TXTDOMAIN); ?></div>
                        <div id="" class="col_opt_row" style="padding:0 !important;width:285px;">
                            <div class="col_opt_title_div two_column" style="width:68px;"></div>
                            <div class="col_opt_title_div two_column"><?php _e('Background', ARP_PT_TXTDOMAIN); ?></div>
                            <div class="col_opt_title_div two_column" style="padding-left:0px !important;"><?php _e('Text Color', ARP_PT_TXTDOMAIN); ?></div>
                        </div>
                        <div class="col_opt_row">
                            <div class="col_opt_title_div two_column"><?php _e('Odd', ARP_PT_TXTDOMAIN); ?></div>
                            <div class="col_opt_input_div two_column arp_body_background_div_id" id='arp_body_background_div_id'>
                                <div data-color="<?php echo isset($general_option['arp_body_odd_row_bg_custom_color']) ? $general_option['arp_body_odd_row_bg_custom_color'] : ''; ?>" id="arp_body_odd_background" data-column="" class="color_picker_font font_color_picker background_column_picker arp_body_odd_background jscolor arp_custom_css_colorpicker" data-column_id="" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_body_odd_background)',valueElement:arp_body_odd_background_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_body_odd_background)' data-valueelement="arp_body_odd_background_hidden">
                                </div>
                                <input type="hidden" class="general_color_box general_color_box_font_color" value="<?php echo isset($general_option['arp_body_odd_row_bg_custom_color']) ? $general_option['arp_body_odd_row_bg_custom_color'] : ''; ?>" name="arp_body_odd_background_color" id="arp_body_odd_background_hidden" />
                            </div>
                            <div class="col_opt_input_div two_column arp_body_font_color_id" id='arp_body_font_color_id'> 
                                <div id="arp_body_font_custom_color" data-color="<?php echo isset($general_option['custom_skin_colors']['arp_body_font_custom_color']) ? $general_option['custom_skin_colors']['arp_body_font_custom_color'] : ''; ?>" data-column-id="<?php echo isset($general_option['custom_skin_colors']['arp_body_font_custom_color']) ? $general_option['custom_skin_colors']['arp_body_font_custom_color'] : ''; ?>" data-column="" class="color_picker_font font_color_picker background_column_picker arp_body_font_custom_color jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_body_font_custom_color)',valueElement:arp_body_font_custom_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_body_font_custom_color)' jscolor-valueelement="arp_body_font_custom_color_hidden">
                                </div>
                                <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color " value="<?php echo isset($general_option['custom_skin_colors']['arp_body_font_custom_color']) ? $general_option['custom_skin_colors']['arp_body_font_custom_color'] : ''; ?>" name="arp_body_font_custom_color" id="arp_body_font_custom_color_hidden" >
                            </div>
                        </div>
                        <div class="col_opt_row">
                            <div class="col_opt_title_div two_column"><?php _e('Even', ARP_PT_TXTDOMAIN); ?></div>
                            <div class="col_opt_input_div two_column arp_body_background_div_id" id='arp_body_background_div_id'>
                                <div data-color="<?php echo isset($general_option['arp_body_even_row_bg_custom_color']) ? $general_option['arp_body_even_row_bg_custom_color'] : ''; ?>" id="arp_body_even_background" data-column="" class="color_picker_font font_color_picker background_column_picker arp_body_even_background jscolor arp_custom_css_colorpicker" data-column_id="" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_body_even_background)',valueElement:arp_body_even_background_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_body_even_background)' jscolor-valueelement="arp_body_even_background_hidden">
                                </div>
                                <input type="hidden" class="general_color_box general_color_box_font_color" value="<?php echo isset($general_option['arp_body_even_row_bg_custom_color']) ? $general_option['arp_body_even_row_bg_custom_color'] : ''; ?>" name="arp_body_even_background_color" id="arp_body_even_background_hidden" />
                            </div>

                            <div class="col_opt_input_div two_column arp_body_font_color_id" id='arp_body_font_color_id'>
                                <div data-color="<?php echo isset($general_option['arp_body_even_font_custom_color']) ? $general_option['arp_body_even_font_custom_color'] : ''; ?>" id="arp_body_even_font_custom_color" data-column="" class="color_picker_font font_color_picker background_column_picker arp_body_even_font_custom_color jscolor arp_custom_css_colorpicker" data-column_id="" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_body_even_font_custom_color)',valueElement:arp_body_even_font_custom_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_body_even_font_custom_color)' jscolor-valueelement="arp_body_even_font_custom_color_hidden">
                                </div>
                                <input type="hidden" class="general_color_box general_color_box_font_color" value="<?php echo isset($general_option['arp_body_even_font_custom_color']) ? $general_option['arp_body_even_font_custom_color'] : ''; ?>" name="arp_body_even_font_custom_color_color" id="arp_body_even_font_custom_color_hidden" />
                            </div>
                        </div>
                    </div>
                </div>
                <div id="arp_hover_background_color" style="display:none;">
                    <div class="col_opt_row" id="arp_column_hover_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php _e('Column', ARP_PT_TXTDOMAIN); ?></div>
                        <div class="col_opt_input_div two_column arp_column_background_div_id" id='arp_column_background_div_id'>
                            <div data-color="<?php echo isset($general_option['arp_column_bg_hover_color']) ? $general_option['arp_column_bg_hover_color'] : ''; ?>" id="arp_column_hover_background" data-column_id="" data-column="" class="color_picker_font font_color_picker background_column_picker arp_column_hover_background jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_column_hover_background)',valueElement:arp_column_hover_background_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_column_hover_background)' jscolor-valueelement="arp_column_hover_background_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color" value="<?php echo isset($general_option['arp_column_bg_hover_color']) ? $general_option['arp_column_bg_hover_color'] : ''; ?>" name="arp_column_bg_hover_color" id="arp_column_hover_background_hidden" />
                        </div>
                    </div>
                    <div class="col_opt_row" id="arp_header_hover_bg_color" style="display:none">
                        <div class="col_opt_title_div two_column">
                            <?php _e('Header', ARP_PT_TXTDOMAIN); ?>
                        </div>
                        <div class="col_opt_input_div two_column arp_header_background_div_id">
                            <div data-color="<?php echo isset($general_option['arp_header_bg_hover_custom_color']) ? $general_option['arp_header_bg_hover_custom_color'] : ''; ?>" id="arp_header_hover_background_color" data-column-id="" data-column="" class="color_picker_font font_color_picker background_column_picker arp_header_background_color jscolor arp_custom_css_colorpicker" data-column_id="" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_header_hover_background_color)',valueElement:arp_header_hover_background_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_header_hover_background_color)' jscolor-valueelement="arp_header_hover_background_color_hidden" >
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['arp_header_bg_hover_custom_color']) ? $general_option['arp_header_bg_custom_color'] : ''; ?>" name="arp_header_hover_background_color" id="arp_header_hover_background_color_hidden" >
                        </div>
                        <div class="col_opt_input_div two_column arp_header_font_color_div_id">
                            <div id="arp_header_font_custom_hover_color" data-color="<?php echo isset($general_option['custom_skin_colors']['arp_header_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_header_font_custom_hover_color'] : ''; ?>" data-column-id="<?php echo isset($general_option['custom_skin_colors']['arp_header_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_header_font_custom_hover_color'] : ''; ?>" data-column="" class="color_picker_font font_color_picker background_column_picker arp_header_font_custom_hover_color jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_header_font_custom_hover_color)',valueElement:arp_header_font_custom_hover_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_header_font_custom_hover_color)' jscolor-valueelement="arp_header_font_custom_hover_color_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['custom_skin_colors']['arp_header_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_header_font_custom_hover_color'] : ''; ?>" name="arp_header_font_custom_hover_color" id="arp_header_font_custom_hover_color_hidden" />
                        </div>
                    </div>
                    <div class="col_opt_row" id="arp_shortcode_hover_bg_color" style="display:none">
                        <div class="col_opt_title_div two_column" style='line-height:1.5;'>
                            <?php _e('Shortcode Section', ARP_PT_TXTDOMAIN); ?>
                        </div>
                        <div class="col_opt_input_div two_column arp_shortcode_background_div_id">
                            <div data-color="<?php echo isset($general_option['arp_shortcode_bg_hover_custom_color']) ? $general_option['arp_shortcode_bg_hover_custom_color'] : ''; ?>" id="arp_shortcode_hover_background_color" data-column-id="" data-column="" class="color_picker_font font_color_picker background_column_picker arp_shortcode_background_color jscolor arp_custom_css_colorpicker" data-column_id="" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_shortcode_hover_background_color)',valueElement:arp_shortcode_hover_background_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_shortcode_hover_background_color)' jscolor-valueelement="arp_shortcode_hover_background_color_hidden" >
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['arp_shortcode_bg_hover_custom_color']) ? $general_option['arp_shortcode_bg_custom_color'] : ''; ?>" name="arp_shortcode_hover_background_color" id="arp_shortcode_hover_background_color_hidden" >
                        </div>
                        <div class="col_opt_input_div two_column arp_shortcode_font_color_div_id">
                            <div id="arp_shortcode_font_custom_hover_color" data-color="<?php echo isset($general_option['custom_skin_colors']['arp_shortcode_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_shortcode_font_custom_hover_color'] : ''; ?>" data-column-id="<?php echo isset($general_option['custom_skin_colors']['arp_shortcode_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_shortcode_font_custom_hover_color'] : ''; ?>" data-column="" class="color_picker_font font_color_picker background_column_picker arp_shortcode_font_custom_hover_color jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_shortcode_font_custom_hover_color)',valueElement:arp_shortcode_font_custom_hover_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_shortcode_font_custom_hover_color)' jscolor-valueelement="arp_shortcode_font_custom_hover_color_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['custom_skin_colors']['arp_shortcode_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_shortcode_font_custom_hover_color'] : ''; ?>" name="arp_shortcode_font_custom_hover_color" id="arp_shortcode_font_custom_hover_color_hidden" />
                        </div>
                    </div>
                    <div class="col_opt_row" id="arp_column_desc_hover_background_color_data" style="display:none">
                        <div class="col_opt_title_div two_column"><?php _e('Description', ARP_PT_TXTDOMAIN); ?></div>
                        <div class="col_opt_input_div two_column arp_column_desc_background_color_div_id">
                            <div data-color="" id="arp_column_desc_hover_bg_custom_color" data-column-id="" data-column="" class="color_picker_font font_color_picker background_column_picker arp_header_background_color jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_column_desc_hover_bg_custom_color)',valueElement:arp_column_desc_hover_bg_custom_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_column_desc_hover_bg_custom_color)' jscolor-valueelement="arp_column_desc_hover_bg_custom_color_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="" name="arp_column_desc_hover_bg_custom_color" id="arp_column_desc_hover_bg_custom_color_hidden" />
                        </div>
                        <div class="col_opt_input_div two_column arp_desc_font_custom_color_div_id">
                            <div id="arp_desc_font_custom_hover_color" data-color="<?php echo isset($general_option['custom_skin_colors']['arp_desc_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_desc_font_custom_hover_color'] : ''; ?>" data-column-id="<?php echo isset($general_option['custom_skin_colors']['arp_desc_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_desc_font_custom_hover_color'] : ''; ?>" data-column="" class="color_picker_font font_color_picker background_column_picker arp_desc_font_custom_hover_color jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_desc_font_custom_hover_color)',valueElement:arp_desc_font_custom_hover_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_desc_font_custom_hover_color)' jscolor-valueelement="arp_desc_font_custom_hover_color_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['custom_skin_colors']['arp_desc_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_desc_font_custom_hover_color'] : ''; ?>" name="arp_desc_font_custom_hover_color" id="arp_desc_font_custom_hover_color_hidden" />
                        </div>
                    </div>
                    <div class="col_opt_row" id="arp_pricing_background_hover_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php _e('Pricing', ARP_PT_TXTDOMAIN); ?> </div>
                        <div class="col_opt_input_div two_column arp_pricing_background_div_id">
                            <div data-color="" id="arp_column_price_hover_background" data-column_id="" data-column="" class="color_picker_font font_color_picker background_column_picker arp_column_price_hover_background jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_column_price_hover_background)',valueElement:arp_column_price_hover_background_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_column_price_hover_background)' jscolor-valueelement="arp_column_price_hover_background_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color" value="" name="arp_column_price_hover_background" id="arp_column_price_hover_background_hidden" />
                        </div>
                        <div class="col_opt_input_div two_column arp_pricing_font_color_div_id">
                            <div id="arp_price_font_custom_hover_color" data-color="<?php echo isset($general_option['custom_skin_colors']['arp_price_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_price_font_custom_hover_color'] : ''; ?>" data-column-id="<?php echo isset($general_option['custom_skin_colors']['arp_price_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_price_font_custom_hover_color'] : ''; ?>" data-column="" class="color_picker_font font_color_picker background_column_picker arp_price_font_custom_hover_color jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_price_font_custom_hover_color)',valueElement:arp_price_font_custom_hover_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_price_font_custom_hover_color)' jscolor-valueelement="arp_price_font_custom_hover_color_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['custom_skin_colors']['arp_price_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_price_font_custom_hover_color'] : ''; ?>" name="arp_price_font_custom_hover_color" id="arp_price_font_custom_hover_color_hidden" >
                        </div>
                    </div>
                    <div class="col_opt_row" id="arp_footer_hover_background_color" style="display:none">
                        <div class="col_opt_title_div two_column"><?php _e('Footer', ARP_PT_TXTDOMAIN); ?></div>
                        <div class="col_opt_input_div two_column arp_footer_background_div_id">
                            <div data-color="" id="arp_footer_hover_background" data-column_id="" data-column="" class="color_picker_font font_color_picker background_column_picker arp_footer_hover_background jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_footer_hover_background)',valueElement:arp_footer_hover_background_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_footer_hover_background)' jscolor-valueelement="arp_footer_hover_background_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color" value="" name="arp_footer_hover_background" id="arp_footer_hover_background_hidden" />
                        </div>
                        <div class="col_opt_input_div two_column arp_footer_font_color_div_id">
                            <div id="arp_footer_font_custom_hover_color" data-color="<?php echo isset($general_option['custom_skin_colors']['arp_footer_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_footer_font_custom_hover_color'] : ''; ?>" data-column-id="<?php echo isset($general_option['custom_skin_colors']['arp_footer_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_footer_font_custom_hover_color'] : ''; ?>" data-column="" class="color_picker_font font_color_picker background_column_picker arp_footer_font_custom_hover_color jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_footer_font_custom_hover_color)',valueElement:arp_footer_font_custom_hover_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_footer_font_custom_hover_color)' jscolor-valueelement="arp_footer_font_custom_hover_color_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['custom_skin_colors']['arp_footer_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_footer_font_custom_hover_color'] : ''; ?>" name="arp_footer_font_custom_hover_color" id="arp_footer_font_custom_hover_color_hidden" >
                        </div>
                    </div>
                    <div class="col_opt_row" id="arp_btn_hover_color_div" style="display:none">
                        <div class="col_opt_title_div two_column"><?php _e('Button', ARP_PT_TXTDOMAIN); ?> </div>
                        <div class="col_opt_input_div two_column">
                            <div data-color="" id="arp_column_btn_hover_background" data-column_id="" data-column="" class="color_picker_font font_color_picker background_column_picker arp_column_btn_hover_background jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_column_btn_hover_background)',valueElement:arp_column_btn_hover_background_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_column_btn_hover_background)' jscolor-valueelement="arp_column_btn_hover_background_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color" value="" name="arp_column_btn_bg_hover_color" id="arp_column_btn_hover_background_hidden" />
                        </div>
                        <div class="col_opt_input_div two_column">
                            <div id="arp_button_font_custom_hover_color" data-color="<?php echo isset($general_option['custom_skin_colors']['arp_button_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_button_font_custom_hover_color'] : ''; ?>" data-column-id="<?php echo isset($general_option['custom_skin_colors']['arp_button_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_button_font_custom_hover_color'] : ''; ?>" data-column="" class="color_picker_font font_color_picker background_column_picker arp_button_font_custom_hover_color jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_button_font_custom_hover_color)',valueElement:arp_button_font_custom_hover_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_button_font_custom_hover_color)', jscolor-valueelement="arp_button_font_custom_hover_color_hidden">
                            </div>
                            <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['custom_skin_colors']['arp_button_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_button_font_custom_hover_color'] : ''; ?>" name="arp_button_font_custom_hover_color" id="arp_button_font_custom_hover_color_hidden" >
                        </div>
                    </div>
                    <div class="col_opt_row" id="arp_body_hover_background_color" style="display:none;padding-left:5px !important;">
                        <div class="col_opt_title_div"><?php _e('Body Row Colors', ARP_PT_TXTDOMAIN); ?></div>
                        <div id="" class="col_opt_row" style="padding:0 !important;width:285px;">
                            <div class="col_opt_title_div two_column" style="width:68px;"></div>
                            <div class="col_opt_title_div two_column"><?php _e('Background', ARP_PT_TXTDOMAIN); ?></div>
                            <div class="col_opt_title_div two_column" style="padding-left:0px !important;"><?php _e('Text Color', ARP_PT_TXTDOMAIN); ?></div>
                        </div>
                        <div class="col_opt_row">
                            <div class="col_opt_title_div two_column"><?php _e('Odd', ARP_PT_TXTDOMAIN); ?></div>
                            <div class="col_opt_input_div two_column arp_body_background_div_id">
                                <div data-color="" id="arp_body_hover_odd_background" data-column_id="" data-column="" class="color_picker_font font_color_picker background_column_picker arp_body_hover_odd_background jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_body_hover_odd_background)',valueElement:arp_body_hover_odd_background_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_body_hover_odd_background)' jscolor-valueelement="arp_body_hover_odd_background_hidden">
                                </div>
                                <input type="hidden" class="general_color_box general_color_box_font_color" value="" name="arp_body_hover_odd_background_color" id="arp_body_hover_odd_background_hidden" />
                            </div>
                            <div class="col_opt_input_div two_column arp_body_font_color_div_id">
                                <div id="arp_body_font_custom_hover_color" data-color="<?php echo isset($general_option['custom_skin_colors']['arp_body_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_body_font_custom_hover_color'] : ''; ?>" data-column-id="<?php echo isset($general_option['custom_skin_colors']['arp_body_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_body_font_custom_hover_color'] : ''; ?>" data-column="" class="color_picker_font font_color_picker background_column_picker arp_body_font_custom_hover_color jscolor arp_custom_css_colorpicker" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_body_font_custom_hover_color)',valueElement:arp_body_font_custom_hover_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_body_font_custom_hover_color)' jscolor-valueelement="arp_body_font_custom_hover_color_hidden">
                                </div>
                                <input type="hidden" class="general_color_box general_color_box_font_color general_color_box_background_color" value="<?php echo isset($general_option['custom_skin_colors']['arp_body_font_custom_hover_color']) ? $general_option['custom_skin_colors']['arp_body_font_custom_hover_color'] : ''; ?>" name="arp_body_font_custom_hover_color" id="arp_body_font_custom_hover_color_hidden" >
                            </div>
                        </div>
                        <div class="col_opt_row">
                            <div class="col_opt_title_div two_column"><?php _e('Even', ARP_PT_TXTDOMAIN); ?></div>
                            <div class="col_opt_input_div two_column arp_body_background_div_id">
                                <div data-color="" id="arp_body_hover_even_background" data-column="" class="color_picker_font font_color_picker background_column_picker arp_body_hover_even_background jscolor arp_custom_css_colorpicker" data-column_id="" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_body_hover_even_background)',valueElement:arp_body_hover_even_background_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_body_hover_even_background)' jscolor-valueelement="arp_body_hover_even_background_hidden">
                                </div>
                                <input type="hidden" class="general_color_box general_color_box_font_color" value="" name="arp_body_hover_even_background_color" id="arp_body_hover_even_background_hidden" />
                            </div>
                            <div class="col_opt_input_div two_column arp_body_font_color_id" id='arp_body_font_color_id'>
                                <div data-color="<?php echo isset($general_option['arp_body_even_font_custom_hover_color']) ? $general_option['arp_body_even_font_custom_hover_color'] : ''; ?>" id="arp_body_even_font_custom_hover_color" data-column="" class="color_picker_font font_color_picker background_column_picker arp_body_even_font_custom_hover_color jscolor arp_custom_css_colorpicker" data-column_id="" data-jscolor="{hash:true,onFineChange:'arp_update_color(this,arp_body_even_font_custom_hover_color)',valueElement:arp_body_even_font_custom_hover_color_hidden}" jscolor-hash='true' jscolor-onfinechange='arp_update_color(this,arp_body_even_font_custom_hover_color)' jscolor-valueelement="arp_body_even_font_custom_hover_color_hidden">
                                </div>
                                <input type="hidden" class="general_color_box general_color_box_font_color" value="<?php echo isset($general_option['arp_body_even_row_font_custom_color']) ? $general_option['arp_body_even_row_font_custom_color'] : ''; ?>" name="arp_body_even_font_custom_hover_color_hidden" id="arp_body_even_font_custom_hover_color_hidden" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col_opt_row" id="arp_custom_ok_btn_div" style="display:none;">
                    <div class="col_opt_input_div">
                        <button class="col_opt_btn arp_custom_color_ok_btn" id="arp_custom_color_ok_btn" type="button" style="float:right;font-weight:bold;"><?php _e('Ok', ARP_PT_TXTDOMAIN); ?></button>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="column_custom_background " table_id="<?php echo $id ?>"  style="display:none" id="arp_custom_color_scheme_popup">
                <div class="col_opt_row" id="arp_header_background_color" style="display:none">
                    <div class="col_opt_title_div ">
                        <?php $admin_css_url = admin_url('admin.php?page=arp_global_settings'); ?>
                        <?php echo 'You are using Unlicensed Copy. To enable this feature, Please activate license from <a href="' . $admin_css_url . '">here</a>.'; ?>
                    </div>

                </div>
            </div>
        <?php } ?>
        <!-- Color Options Model Window -->

        <!-- ARPrice Font Icons Model -->
        <div class="arp_font_icons" id="arp_font_icons" style="display:none;">
            <?php
            $fonticon = '';
            $fonticon .= "<div class='arp_font_awesome_arrow'></div>";
            $fonticon .= "<div class='font_awesome_icon_list'>";

            $fonticon .= "<div class='arp_icon_search'><input class='arp_icon_search_input' id='arp_icon_search_input' name='arp_icon_search_input' placeholder='search' /></div>";
            foreach ($arprice_font_awesome_icons as $name => $icon) {
                if ($name == 'font_awesome') {
                    $fonticon .= '<div class="arp_icon_text_title" id="arp_font_awaesome_icon">Font Awesome</div><div class="clear"></div>';
                    foreach ($icon as $icon_name => $icon_class) {

                        $fonticon .= "<div class='arp_fainsideimge' data-arpicon='fontawesome' id='" . $icon_class . "' title='" . $icon_name . "'>";
                        $fonticon .= "<i class='fa " . $icon_class . "'></i>";
                        $fonticon .= "</div>";
                    }
                }
                if ($name == 'material_design') {
                    $fonticon .= '<div class="clear"></div><div class="arp_icon_text_title" id="arp_font_material_icon">Material Design Icons</div><div class="clear"></div>';
                    foreach ($icon as $icon_name => $icon_class) {
                        $fonticon .= "<div class='arp_fainsideimge' data-arpicon='material' id='" . $icon_class . "' title='" . $icon_name . "'>";
                        $fonticon .= "<i class='material-icons'>" . $icon_class . "</i>";
                        $fonticon .= "</div>";
                    }
                }
                if ($name == 'typicons') {
                    $fonticon .= '<div class="clear"></div><div class="arp_icon_text_title" id="arp_font_typicons_icon">Typicons</div><div class="clear"></div>';
                    foreach ($icon as $icon_name => $icon_class) {
                        $fonticon .= "<div class='arp_fainsideimge' data-arpicon='typicons' id='" . $icon_class . "' title='" . $icon_name . "'>";
                        $fonticon .= "<i class='typcn " . $icon_class . "'></i>";
                        $fonticon .= "</div>";
                    }
                }
                if ($name == 'ionicons') {
                    $fonticon .= '<div class="clear"></div><div class="arp_icon_text_title" id="arp_font_ionicons_icon">Ionicons</div><div class="clear"></div>';
                    foreach ($icon as $icon_name => $icon_class) {
                        $fonticon .= "<div class='arp_fainsideimge' data-arpicon='ionicons' id='" . $icon_class . "' title='" . $icon_name . "'>";
                        $fonticon .= "<i class='icon " . $icon_class . "'></i>";
                        $fonticon .= "</div>";
                    }
                }
            }
            $fonticon .= "</div>";
            echo $fonticon;
            ?>
        </div>
        <!-- ARPrice Font Icons Model -->

        <!-- Alert Box For Copy Toggle Data -->
        <div class="arp_model_delete_box" id="arp_model_toggle_copy_data" style="display:none;background:white;">

            <div class="arp_modal_delete_content">
                <span id="nav_style_close" class="modal_close_btn b-close"></span>
                <div class="arp_delete_modal_msg"><?php _e("Are you sure you want to copy first tab data? This section will overwrite all existing data of second tab.", ARP_PT_TXTDOMAIN); ?></div>
                <div class="arp_delete_modal_btn">
                    <button id="Model_Delete_toggle_copy_data"  type="button" class="ribbon_insert_btn copy_toggle_data"><?php _e('Okay', ARP_PT_TXTDOMAIN); ?></button>
                    <button id="Model_Delete_toggle_copy_data"  class="ribbon_cancel_btn not_copy_toggle_data" type="button"><?php _e('Cancel', ARP_PT_TXTDOMAIN); ?></button>
                </div>
            </div>
        </div>
        <!-- Alert Box For Copy Toggle Data -->

        <?php /* ARPrice Modal Windows */ ?>
