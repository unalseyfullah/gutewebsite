<?php

global $arprice_form, $arp_mainoptionsarr, $arp_coloptionsarr;

$tablestring .= "<div class='column_level_settings' id='column_level_settings_new' data-column='main_" . $j . "'>";
$tablestring .= "<div class='btn-main'>";


$tablestring .= "<div class='arp_btn' id='column_level_options__button_1' data-level='column_level_options' style='display:none;' title='" . __('Column Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Column Settings', ARP_PT_TXTDOMAIN) . "'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/general-setting-icon.png'></div>";

//$tablestring .= "<div class='arp_btn' id='column_level_options__button_2' data-level='column_level_options' style='display:none;' title='" . __('Column Description Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Column Description Settings', ARP_PT_TXTDOMAIN) . "' ><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/description-setting-icon.png'></div>";

$tablestring .= "<div class='arp_btn' id='column_level_options__button_2' data-level='column_level_options' style='display:none;' title='" . __('Background and Font Colors', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Background and Font Colors', ARP_PT_TXTDOMAIN) . "' ><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/color_option_icon.png'></div>";

$tablestring .= "<div class='arp_btn action_btn' col-id=" . $col_no[1] . " data-level='column_level_options' id='duplicate_column' style='display:none;' title='" . __('Duplicate Column', ARP_PT_TXTDOMAIN) . "'  data-title='" . __('Duplicate Column', ARP_PT_TXTDOMAIN) . "'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/duplicate-icon2.png' ></div>";

$tablestring .= "<div class='arp_btn action_btn' col-id=" . $col_no[1] . " data-level='column_level_options' id='delete_column' style='display:none;' title='" . __('Delete Column', ARP_PT_TXTDOMAIN) . "'  data-title='" . __('Delete Column', ARP_PT_TXTDOMAIN) . "'>";
$tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/delete-icon2.png' >";

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

$tablestring .= "</div>";

$tablestring .= "<div class='arp_btn debug_action_btn' col-id=" . $col_no[1] . " data-level='column_level_options' id='css_debug' style='display:none;' title='" . __('CSS Class Information', ARP_PT_TXTDOMAIN) . "' data-title='" . __('CSS Class Information', ARP_PT_TXTDOMAIN) . "'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/custom_css_icon_1.png' /></div>";

$tablestring .= "<div class='arp_btn column_add_new_row_action_btn' id='add_new_row' data-id='" . $col_no[1] . "' title='" . __('Add New Row', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add New Row', ARP_PT_TXTDOMAIN) . "' data-level='body_li_level_options' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/add-icon2.png'></div>";

$tablestring .= "<div class='arp_btn' id='header_level_options__button_1' data-level='header_level_options' title='" . __('Header Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Header Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/content-setting-icon.png'></div>";
$tablestring .= "<div class='arp_btn' id='header_level_options__button_2' data-level='header_level_options' title='" . __('Column Description Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Column Description Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/description-setting-icon.png'></div>";
$tablestring .= "<div class='arp_btn' id='header_level_options__button_3' data-level='header_level_options' title='" . __('Media Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Media Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/shortcode-setting-icon.png'></div>";



$tablestring .= "<div class='arp_btn' id='pricing_level_options__button_1' data-level='pricing_level_options' title='" . __('Price Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Price Settings', ARP_PT_TXTDOMAIN) . "'  style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/content-setting-icon.png'></div>";
$tablestring .= "<div class='arp_btn' id='pricing_level_options__button_2' data-level='pricing_level_options' title='" . __('Price Interval Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Price Interval Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/description-setting-icon.png'></div>";
$tablestring .= "<div class='arp_btn' id='pricing_level_options__button_3' data-level='pricing_level_options' title='" . __('Column Description Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Column Description Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/description-icon3.png'></div>";

// Body Level Options
$tablestring .= "<div class='arp_btn' id='body_level_options__button_1' data-level='body_level_options' title='" . __('Content Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Content Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/general-setting-icon.png'></div>";

$tablestring .= "<div class='arp_btn' id='body_level_options__button_2' data-level='body_level_options' title='" . __('Content Label Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Content Label Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/content-lable-setting-icon.png'></div>";
$tablestring .= "<div class='arp_btn' id='body_level_options__button_3' data-level='body_level_options' title='" . __('Column Description Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Column Description Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/description-setting-icon.png'></div>";

$tablestring .= "<div class='arp_btn' id='column_description_level__button_1' data-level='column_description_level' title='" . __('Column Description Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Column Description Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/description-setting-icon.png'></div>";



$tablestring .= "<div class='arp_btn' id='body_li_level_options__button_1' data-level='body_li_level_options' title='" . __('Description Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Description Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/content-setting-icon.png'></div>";

$tablestring .= "<div class='arp_btn' id='body_li_level_options__button_2' data-level='body_li_level_options' title='" . __('Tooltip Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Tooltip Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/tooltip_settings.png'></div>";

$tablestring .= "<div class='arp_btn' id='body_li_level_options__button_3' data-level='body_li_level_options' title='" . __('Label Description Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Label Description Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/lable-description-setting-icon.png'></div>";

$tablestring .= "<div class='arp_btn action_btn' id='add_new_row' data-id='" . $col_no[1] . "' title='" . __('Add New Row', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add New Row', ARP_PT_TXTDOMAIN) . "' data-level='body_li_level_options' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/add-icon2.png'></div>";
$tablestring .= "<div class='arp_btn action_btn' id='copy_row' alt='' col-id='" . $col_no[1] . "' title='" . __('Duplicate Row', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Duplicate Row', ARP_PT_TXTDOMAIN) . "' data-level='body_li_level_options' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/duplicate-icon2.png'></div>";
$tablestring .= "<div class='arp_btn action_btn' id='remove_row' row-id='' col-id='" . $col_no[1] . "' title='" . __('Delete Row', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Delete Row', ARP_PT_TXTDOMAIN) . "' data-level='body_li_level_options' style='display:none;'>";
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

//footer dbl click options
$tablestring .= "<div class='arp_btn' id='footer_level_options__button_1' data-level='footer_level_options' title='" . __('Footer General Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Footer General Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/content-setting-icon.png'></div>";

// Button Options
$tablestring .= "<div class='arp_btn' id='footer_level_options__button_2' data-level='button_level_options' data-title='" . __('Button General Settings', ARP_PT_TXTDOMAIN) . "' title='" . __('Button General Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/button_settings.png'></div>";
$tablestring .= "<div class='arp_btn' id='footer_level_options__button_3' data-level='button_level_options' data-title='" . __('Button Image Settings', ARP_PT_TXTDOMAIN) . "' title='" . __('Button Image Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/buttonimage-setting-icon.png'></div>";
$tablestring .= "<div class='arp_btn' id='footer_level_options__button_4' data-level='button_level_options' title='" . __('Button Link/Script Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Button Link Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/buttonlink-setting-icon.png'></div>";
//$tablestring .= "<div class='arp_btn' id='button_options__button_4' data-level='button_level_options' title='" . __('Button Other Settings', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Button Other Settings', ARP_PT_TXTDOMAIN) . "' style='display:none;'><img src='" . PRICINGTABLE_IMAGES_URL . "/icons/button-other-setting-icon.png'></div>";

$tablestring .= "</div>";

$tablestring .= "<div class='column_level_options'>";

$tablestring .= "<div class='column_option_div' level-id='footer_level_options__button_1'>";

// start to add footer level column options

$tablestring .= "<div class='col_opt_row' id='footer_text'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Footer Content', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div'>";

$tablestring .= "<ul class='column_tabs'>";
$tablestring .= "<li class='option_title selected toggle_step_first_tab' id='footer_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"footer_yearly_tab\", \"footer_monthly_tab\", \"footer_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
$tablestring .= "<li class='option_title toggle_step_second_tab' id='footer_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"footer_monthly_tab\", \"footer_yearly_tab\", \"footer_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
$tablestring .= "<li class='option_title toggle_step_third_tab' id='footer_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"footer_quarterly_tab\", \"footer_monthly_tab\", \"footer_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
$tablestring .= "</ul>";

if (isset($columns['footer_content'])) {
    $footer_content_db = $columns['footer_content'];
} else {
    $footer_content_db = '';
}

$tablestring .= "<div class='option_tab' id='footer_yearly_tab'>";

$tablestring .= "<textarea name='footer_content_" . $col_no[1] . "' id='footer_content' data-column='main_" . $j . "' class='col_opt_textarea footer_content_first'>";
$tablestring .= $footer_content_db;
$tablestring .= "</textarea>";

$tablestring .= "</div>";

$tablestring .= "<div class='option_tab' id='footer_monthly_tab' style='display:none;'>";

$tablestring .= "<textarea name='footer_content_second_" . $col_no[1] . "' id='footer_content_second' data-column='main_" . $j . "'  class='col_opt_textarea footer_content_second'>";
$tablestring .= isset($columns['footer_content_second']) ? $columns['footer_content_second'] : '';
$tablestring .= "</textarea>";

$tablestring .= "</div>";

$tablestring .= "<div class='option_tab' id='footer_quarterly_tab' style='display:none;'>";

$tablestring .= "<textarea name='footer_content_third_" . $col_no[1] . "' id='footer_content_third' data-column='main_" . $j . "' class='col_opt_textarea footer_content_third'>";
$tablestring .= isset($columns['footer_content_third']) ? $columns['footer_content_third'] : '';
$tablestring .= "</textarea>";

$tablestring .= "</div>";


$tablestring .= "</div>";
$tablestring .= "</div>";
$tablestring .= "<div class='col_opt_row' id='above_below_button'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Content Position', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div col_opt_input_div_bottom_margin'>";

if (!isset($columns['footer_content_position']) && empty($columns['footer_content_position'])) {
    $columns['footer_content_position'] = 0;
} else {
    $columns['footer_content_position'] = $columns['footer_content_position'];
}

foreach ($arp_mainoptionsarr['general_options']['footer_content_position'] as $key => $above_below_array) {
    $tablestring .= "<input type='radio' class='arp_checkbox dark_bg' value='$key' id='footer_content_position_" . $key . "_" . $col_no[1] . "' name='footer_content_position_" . $col_no[1] . "' " . checked($key, $columns['footer_content_position'], false) . " data-column='main_" . $j . "' style='margin-left:10px;' /> <label id='footer_content_position_" . $key . "_" . $col_no[1] . "' for='footer_content_position_" . $key . "_" . $col_no[1] . "'>$above_below_array</label>";
}

$tablestring .= "</div>";
$tablestring .= "</div>";
$footer_text_alignment = isset($columns['footer_text_align']) ? $columns['footer_text_align'] : 'center';
$tablestring .= $arprice_form->arp_create_alignment_div('footer_text_alignment', $footer_text_alignment, 'arp_footer_text_alignment', $col_no[1], 'footer_section');

$footer_hover_background_color = isset($columns['footer_hover_background_color']) ? $columns['footer_hover_background_color'] : '';

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

$tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_footer_level_options_font_family_preview' href='" . $googlefontpreviewurl . $columns['footer_level_options_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";

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

$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='column_level_options__button_1'>";


$tablestring .= "<div class='col_opt_row' id='column_other_background_image'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Background Image', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";
$tablestring .= "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster' name='arp_column_background_image_" . $col_no[1] . "' id='arp_column_background_image' data-insert='arp_column_background_image_input' data-column='main_" . $j . "' title='" . __('Add Column Background Image', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Column Background Image', ARP_PT_TXTDOMAIN) . "' style='float:right;'>";
$tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";
$tablestring .= "</button>";
$columns['column_background_image'] = isset($columns['column_background_image']) ? $columns['column_background_image'] : '';
$tablestring .= "<input type='hidden' name='arp_column_background_image_" . $col_no[1] . "' value='" . $columns['column_background_image'] . "' id='arp_column_background_image_input' />";
$columns['column_background_image_height'] = isset($columns['column_background_image_height']) ? $columns['column_background_image_height'] : '';
$tablestring .= "<input type='hidden' name='arp_column_background_image_height_" . $col_no[1] . "' value='" . $columns['column_background_image_height'] . "' id='arp_column_background_image_height_input' />";
$columns['column_background_image_width'] = isset($columns['column_background_image_width']) ? $columns['column_background_image_width'] : '';
$tablestring .= "<input type='hidden' name='arp_column_background_image_width_" . $col_no[1] . "' value='" . $columns['column_background_image_width'] . "' id='arp_column_background_image_width_input' />";
$tablestring .= "<div class='arp_add_image_container arp_background'>";
$tablestring .= "<div class='arp_add_image_arrow' style='margin-left:78px;'></div>";
$tablestring .= "<div class='arp_add_img_content'>";

$tablestring .= "<div class='arp_add_img_row'>";
$tablestring .= "<div class='arp_add_img_label'>";
$tablestring .= __('Image URL', ARP_PT_TXTDOMAIN);
$tablestring .= "<span class='arp_model_close_btn' id='arp_add_image_container'><i class='fa fa-times'></i></span>";
$tablestring .= "</div>";
$tablestring .= "<div class='arp_add_img_option'>";
$tablestring .= "<input type='text' value='" . $columns['column_background_image'] . "' class='arp_modal_txtbox img' id='arp_header_image_url' name='arp_header_image_url' />";
$tablestring .= "<button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'>";
$tablestring .= __('Add File', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";
$tablestring .= "</div>";

$columns['column_background_scaling'] = isset($columns['column_background_scaling']) ? $columns['column_background_scaling'] : 'fit_to_container';
$tablestring .= "<div class='arp_add_img_row'>";
$do_not_scale_image = '';
if ($columns['column_background_scaling'] == 'do_not_scale_image') {
    $do_not_scale_image = 'checked="checked"';
}
$tablestring .= "<div class='arp_add_img_option arp_image_scale'>";
$tablestring .= "<input type='radio' class='arp_column_background_scaling_radio' id='do_not_scale_image' name='column_background_scaling_" . $col_no[1] . "' value='do_not_scale_image' " . $do_not_scale_image . " data-column='main_column_" . $col_no[1] . "'/><label data-for='do_not_scale_image' class='arp_add_img_note arp_back_scale'>" . __('Do not scale image', ARP_PT_TXTDOMAIN) . "</label>";
$tablestring .= "</div>";
$column_background_scaling = '';
$column_background_scaling_style = 'display:none;';
if ($columns['column_background_scaling'] == 'fit_to_container') {
    $column_background_scaling = 'checked="checked"';
    $column_background_scaling_style = 'display:block;';
}

$tablestring .= "<div class='arp_add_img_option arp_image_scale'>";
$tablestring .= "<input type='radio' class='arp_column_background_scaling_radio' id='fit_to_container' name='column_background_scaling_" . $col_no[1] . "' value='fit_to_container' " . $column_background_scaling . " data-column='main_column_" . $col_no[1] . "' /><label data-for='fit_to_container' class='arp_add_img_note arp_back_scale'>" . __('Fit to container', ARP_PT_TXTDOMAIN) . "</label>";
$tablestring .= "</div>";
$tablestring .= "</div>";

$columns['column_background_min_positon'] = isset($columns['column_background_min_positon']) ? $columns['column_background_min_positon'] : '50';
$columns['column_background_max_positon'] = isset($columns['column_background_max_positon']) ? $columns['column_background_max_positon'] : '50';
$tablestring .= "<div class='arp_add_img_row' style='" . $column_background_scaling_style . "' id='arp_background_position' >";
$tablestring .= "<div class='arp_add_img_label'>";
$tablestring .= __('Background Position', ARP_PT_TXTDOMAIN);
$tablestring .= "</div>";
$tablestring .= "<div class='arp_add_img_option'>";
$tablestring .= "<input type='text' value='" . $columns['column_background_min_positon'] . "' class='arp_modal_txtbox' id='column_background_min_positon' name='column_background_min_positon_" . $col_no[1] . "' data-column='main_column_" . $col_no[1] . "' /><label class='arp_add_img_note'>(%)</label>";
$tablestring .= "<label></label>";
$tablestring .= "<input type='text' value='" . $columns['column_background_max_positon'] . "' class='arp_modal_txtbox' id='column_background_max_positon' name='column_background_max_positon_" . $col_no[1] . "'  data-column='main_column_" . $col_no[1] . "'/><label class='arp_add_img_note'>(%)</label>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_add_img_option'>";
$tablestring .= "<label class='arp_add_img_note arp_sub_title' style='width: 33%;'>x-axis</label>";
$tablestring .= "<label class='arp_add_img_note arp_sub_title' style='width: 35%;'>y-axis</label>";
$tablestring .= "</div>";
$tablestring .= "<div class='arp_add_img_label arp_sub'>";
$tablestring .= __('(Minimum value can be 0 and maximum value can be 100.)', ARP_PT_TXTDOMAIN);
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_add_img_row' style='margin-top:10px;margin-bottom:10px;'>";
$tablestring .= "<div class='arp_add_img_label'>";
$tablestring .= '<button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_image_btn">';
$tablestring .= __('Add', ARP_PT_TXTDOMAIN);
$tablestring .= '</button>';
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "</div>";
$tablestring .= "</div>";
$tablestring .= "</div>";
$column_remove_link = "display:none;";
if ($columns['column_background_image'] != '') {
    $column_remove_link = "";
}

$tablestring .= "<div class='arp_google_font_preview_note' id='arp_remove_column_image_link' style='$column_remove_link'>";
$tablestring .= "<a href='javascript:arp_remove_object(\"main_column_" . $col_no[1] . "\",\"arp_column_background_image_input\")'  class='arp_google_font_preview_link' id='remove_column_image_link'>";
$tablestring .= __('Remove Image', ARP_PT_TXTDOMAIN);
$tablestring .= "</a>";
$tablestring .= "</div>";
$tablestring .= "</div>";


$tablestring .= "<div class='col_opt_row' id='column_highlight'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Highlight Column', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";
$tablestring .= "<div class='arp_checkbox_div'>";
if ($column_highlight == 1) {
    $checked = "checked='checked'";
} else {
    $checked = '';
}
$tablestring .= "<input type='checkbox' class='arp_checkbox dark_bg' " . $checked . " value='1' id='column_highlight_input' name='column_highlight_" . $col_no[1] . "' data-column='main_" . $j . "' />";
$tablestring .= "<label class='arp_checkbox_label' data-for='column_highlight_input'>" . __('Yes', ARP_PT_TXTDOMAIN) . "</label>";
$tablestring .= "</div>";
$tablestring .= "</div>";
$tablestring .= "</div>";


$tablestring .= "<div class='col_opt_row' id='select_ribbon'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Ribbon', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";
$tablestring .= "<button type='button' class='col_opt_btn' onclick='arp_select_ribbon(this)' name='ribbon_select_" . $j . "' id='ribbon_select' style='float:right;' data-column='main_" . $j . "'>";
$tablestring .= __('Select Ribbon', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$columns['ribbon_setting']['arp_ribbon'] = isset($columns['ribbon_setting']['arp_ribbon']) ? $columns['ribbon_setting']['arp_ribbon'] : "";
$tablestring .= "<input type='hidden' id='arp_ribbon_style_main' name='arp_ribbon_style_" . $col_no[1] . "' value='" . $columns['ribbon_setting']['arp_ribbon'] . "' />";
$columns['ribbon_setting']['arp_ribbon_bgcol'] = isset($columns['ribbon_setting']['arp_ribbon_bgcol']) ? $columns['ribbon_setting']['arp_ribbon_bgcol'] : "";
$tablestring .= "<input type='hidden' id='arp_ribbon_bgcol_main' name='arp_ribbon_bgcol_" . $col_no[1] . "' value='" . $columns['ribbon_setting']['arp_ribbon_bgcol'] . "' />";
$columns['ribbon_setting']['arp_ribbon_txtcol'] = isset($columns['ribbon_setting']['arp_ribbon_txtcol']) ? $columns['ribbon_setting']['arp_ribbon_txtcol'] : "";
$tablestring .= "<input type='hidden' id='arp_ribbon_textcol_main' name='arp_ribbon_textcol_" . $col_no[1] . "' value='" . $columns['ribbon_setting']['arp_ribbon_txtcol'] . "' />";
$columns['ribbon_setting']['arp_ribbon_position'] = isset($columns['ribbon_setting']['arp_ribbon_position']) ? $columns['ribbon_setting']['arp_ribbon_position'] : "";
$tablestring .= "<input type='hidden' id='arp_ribbon_position_main' name='arp_ribbon_position_" . $col_no[1] . "' value='" . $columns['ribbon_setting']['arp_ribbon_position'] . "' />";
$columns['ribbon_setting']['arp_ribbon_content'] = isset($columns['ribbon_setting']['arp_ribbon_content']) ? $columns['ribbon_setting']['arp_ribbon_content'] : "";
$tablestring .= "<input type='hidden' id='arp_ribbon_content_main' name='arp_ribbon_content_" . $col_no[1] . "' value='" . $columns['ribbon_setting']['arp_ribbon_content'] . "' />";
$tablestring .= "<input type='hidden' id='arp_ribbon_content_main_second' name='arp_ribbon_content_second_" . $col_no[1] . "' value='" . @$columns['ribbon_setting']['arp_ribbon_content_second'] . "' />";
$tablestring .= "<input type='hidden' id='arp_ribbon_content_main_third' name='arp_ribbon_content_third_" . $col_no[1] . "' value='" . @$columns['ribbon_setting']['arp_ribbon_content_third'] . "' />";
$columns['ribbon_setting']['arp_custom_ribbon'] = isset($columns['ribbon_setting']['arp_custom_ribbon']) ? $columns['ribbon_setting']['arp_custom_ribbon'] : '';
$tablestring .= "<input type='hidden' id='arp_custom_ribbon_url' name='arp_custom_ribbon_url_" . $col_no[1] . "' value='" . $columns['ribbon_setting']['arp_custom_ribbon'] . "' />";
$tablestring .= "<input type='hidden' id='arp_custom_ribbon_url_second' name='arp_custom_ribbon_url_second_" . $col_no[1] . "' value='" . @$columns['ribbon_setting']['arp_custom_ribbon_second'] . "' />";
$tablestring .= "<input type='hidden' id='arp_custom_ribbon_url_third' name='arp_custom_ribbon_url_third_" . $col_no[1] . "' value='" . @$columns['ribbon_setting']['arp_custom_ribbon_third'] . "' />";
$columns['ribbon_setting']['arp_ribbon_custom_position_rl'] = isset($columns['ribbon_setting']['arp_ribbon_custom_position_rl']) ? $columns['ribbon_setting']['arp_ribbon_custom_position_rl'] : '';
$tablestring .= "<input type='hidden' id='arp_ribbon_custom_position_rl' name='arp_ribbon_custom_position_rl_" . $col_no[1] . "' value='" . $columns['ribbon_setting']['arp_ribbon_custom_position_rl'] . "' />";
$columns['ribbon_setting']['arp_ribbon_custom_position_top'] = isset($columns['ribbon_setting']['arp_ribbon_custom_position_top']) ? $columns['ribbon_setting']['arp_ribbon_custom_position_top'] : '';
$tablestring .= "<input type='hidden' id='arp_ribbon_custom_position_top' name='arp_ribbon_custom_position_top_" . $col_no[1] . "' value='" . $columns['ribbon_setting']['arp_ribbon_custom_position_top'] . "' />";
$tablestring .= "</div>";
if ($columns['ribbon_setting']['arp_ribbon'] != '' || $columns['ribbon_setting']['arp_custom_ribbon'] != '') {
    $remove_ribbon_style = '';
} else {
    $remove_ribbon_style = "display:none;";
}
$tablestring .= "<div class='arp_google_font_preview_note' id='arp_remove_ribbon_container_" . $col_no[1] . "' style='" . $remove_ribbon_style . "'>";
$tablestring .= "<a class='arp_google_font_preview_link' data-column='main_column_" . $col_no[1] . "' id='arp_ribbon_remove' style='text-decoration:none;cursor:pointer;'>" . __('Remove Ribbon', ARP_PT_TXTDOMAIN) . "</a>";
$tablestring .= "</div>";

$tablestring .= "</div>";


$tablestring .= "<div class='col_opt_row' id='post_variables_content'>";

$tablestring .= "<div class='col_opt_title_div'>";
$tablestring .= __('Post variables', ARP_PT_TXTDOMAIN);
$tablestring .= "</div>";

$tablestring .= "<div class='col_opt_input_div'>";
$tablestring .= "<ul class='column_tabs'>";
$tablestring .= "<li class='option_title selected toggle_step_first_tab' id='post_variable_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"post_variable_yearly_tab\", \"post_variable_monthly_tab\", \"post_variable_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
$tablestring .= "<li class='option_title toggle_step_second_tab' id='post_variable_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"post_variable_monthly_tab\", \"post_variable_yearly_tab\", \"post_variable_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
$tablestring .= "<li class='option_title toggle_step_third_tab' id='post_variable_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"post_variable_quarterly_tab\", \"post_variable_monthly_tab\", \"post_variable_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
$tablestring .= "</ul>";

$tablestring .= "<div class='option_tab' id='post_variable_yearly_tab'>";
$tablestring .= "<textarea id='post_variables_content' name='post_variables_content_" . $col_no[1] . "'  class='col_opt_textarea post_variable_first' data-column='main_column_" . $col_no[1] . "'>";
$tablestring .= stripslashes_deep($columns['post_variables_content']);
$tablestring .= "</textarea>";
$tablestring .= "</div>";
$tablestring .= "<div class='option_tab' id='post_variable_monthly_tab' style='display:none;'>";
$tablestring .= "<textarea id='post_variables_content_second' name='post_variables_content_second_" . $col_no[1] . "'  class='col_opt_textarea post_variable_second' data-column='main_column_" . $col_no[1] . "'>";
$tablestring .= stripslashes_deep(isset($columns['post_variables_content_second']) ? $columns['post_variables_content_second'] : '');
$tablestring .= "</textarea>";
$tablestring .= "</div>";
$tablestring .= "<div class='option_tab' id='post_variable_quarterly_tab' style='display:none;'>";
$tablestring .= "<textarea id='post_variables_content_third' name='post_variables_content_third_" . $col_no[1] . "'  class='col_opt_textarea post_variable_third' data-column='main_column_" . $col_no[1] . "'>";
$tablestring .= stripslashes_deep(isset($columns['post_variables_content_third']) ? $columns['post_variables_content_third'] : '');
$tablestring .= "</textarea>";
$tablestring .= "</div>";
$disabled = "";
//$tablestring .= "<textarea style='height:45px;' id='post_variables_content' name='post_variables_content_{$col_no[1]}' data-column='main_{$j}' class='col_opt_textarea' >" . $columns['post_variables_content'];
//$tablestring .= "</textarea>";
$tablestring .= "<span class='arp_note' id='post_variable_content_ex'>e.g. plan_id=" . $col_no[1] . ";type=arprice; </span>";
$tablestring .= "<span class='arp_note' id='post_variable_content_ex'> Add your variables with seperated by ; (semicolon). These variables will pass by GET method to specified URL upon button click. </span>";
$tablestring .= "</div>";

$tablestring .= "</div>";

$tablestring .= "<div class='col_opt_row arp_ok_div' id='column_level_other_arp_ok_div__button_1' style='display:none;'>";
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



if ($reference_template == 'arptemplate_9') {
    $columns['arp_change_bgcolor'] = isset($columns['arp_change_bgcolor']) ? $columns['arp_change_bgcolor'] : "0";
    $tablestring .= "<input type='hidden' id='arp_change_bgcolor' name='arp_change_bgcolor_" . $col_no[1] . "' value='" . $columns['arp_change_bgcolor'] . "' />";
}

$tablestring .= "<div class='column_option_div' level-id='column_level_options__button_2' >";
$tablestring .="<div class='col_opt_row' id='arp_custom_color_tab_column' style='padding:0 !important;'>";
$tablestring .= "<div class='col_opt_title_div' style='padding:5px 5px 10px !important'>" . __('Column Color Settings', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .="<div class='col_opt_title_div two_column arp_color_tab_column selected' data-id='arp_normal'>" . __('Normal', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .="<div class = 'col_opt_title_div two_column arp_color_tab_column' data-id = 'arp_hover'>" . __('Hover', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .="</div>";
$tablestring .='<div class="col_opt_row" id="arp_normal_custom_color_tab_column" style="padding:0 !important;">';
$tablestring .='<div class="col_opt_title_div two_column"></div>';
$tablestring .='<div class="col_opt_title_div two_column" data-id="background_color" style="padding-top:5px !important;">' . __('Background', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_title_div two_column" data-id="font_color" style="padding-top:5px !important;">' . __('Text Color', ARP_PT_TXTDOMAIN) . '</div>';
//$tablestring .='</div>';

$tablestring .='<div class="col_opt_row sub_row" id="arp_column_color_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column">' . __('Column', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker column_background_color_div" id="column_background_color_div" style="display:none;">';
$column_background_color_value = (isset($columns['column_background_color']) && $columns['column_background_color'] != '' ) ? $columns['column_background_color'] : '#ffffff';
$tablestring .=$arprice_form->font_color_new('column_background_color_' . $col_no[1], 'main_' . $j, $column_background_color_value, 'column_background_color', $column_background_color_value, 'background_column_picker column_level_background', 'general_color_box_background_color background_color_' . $j);
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .='<div class="col_opt_row sub_row" id="arp_header_color_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column">' . __('Header', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker header_background_color_div" id="header_background_color_div" style="display:none;">';
$header_background_color_value = @$columns['header_background_color'];
$tablestring .=$arprice_form->font_color_new('header_background_color_' . $col_no[1], 'main_' . $j, $header_background_color_value, 'header_background_color', $header_background_color_value, 'header_background_color', 'general_color_box_background_color');
$tablestring .= "</div>";
$tablestring .='<div class="col_opt_input_div two_column second_picker header_font_color_div" id="header_font_color_div" style="display:none;">';
$tablestring .=$arprice_form->font_color_new('header_font_color_' . $col_no[1], 'main_' . $j, @$columns['header_font_color'], 'header_font_color', @$columns['header_font_color']);
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .='<div class="col_opt_row sub_row" id="arp_shortcode_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column" style="line-height:1.5">' . __('Shortcode Section', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker arp_shortcode_background" id="arp_shortcode_background" style="display:none;">';
$shortcode_background_color = @$columns['shortcode_background_color'];
$tablestring .=$arprice_form->font_color_new('shortcode_background_color_' . $col_no[1], 'main_' . $j, $shortcode_background_color, 'shortcode_background_color', $shortcode_background_color, 'shortcode_background_color', 'general_color_box_background_color');
$tablestring .= "</div>";
$tablestring .='<div class="col_opt_input_div two_column second_picker arp_shortcode_font_color" id="arp_shortcode_font_color" style="display:none;">';
$tablestring .=$arprice_form->font_color_new('shortcode_font_color_' . $col_no[1], 'main_' . $j, @$columns['shortcode_font_color'], 'shortcode_font_color', @$columns['shortcode_font_color']);
$tablestring .= "</div>";
$tablestring .= "</div>";


$tablestring .='<div class="col_opt_row sub_row" id="arp_desc_color_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column">' . __('Description', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker desc_background_color_div" id="desc_background_color_div" style="display:none;">';

$tablestring .=$arprice_form->font_color_new('column_desc_background_color_' . $col_no[1], 'main_' . $j, @$columns['column_desc_background_color'], 'column_desc_background_color', @$columns['column_desc_background_color']);
$tablestring .= "</div>";
$tablestring .='<div class="col_opt_input_div two_column second_picker desc_font_color_div" id="desc_font_color_div" style="display:none;">';
$tablestring .=$arprice_form->font_color_new('column_description_font_color_' . $col_no[1], 'main_' . $j, @$columns['column_description_font_color'], 'column_description_font_color', @$columns['column_description_font_color']);
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .='<div class="col_opt_row sub_row" id="arp_price_color_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column">' . __('Pricing', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker price_background_color_div" id="price_background_color_div" style="display:none;">';
$price_background_color_value = @$columns['price_background_color'];
$tablestring .=$arprice_form->font_color_new('price_background_color_' . $col_no[1], 'main_' . $j, $price_background_color_value, 'price_background_color', $price_background_color_value, 'background_column_picker', 'general_color_box_background_color');
$tablestring .= "</div>";
$tablestring .='<div class="col_opt_input_div two_column second_picker price_font_color_div" id="price_font_color_div" style="display:none;">';
$tablestring .=$arprice_form->font_color_new('price_font_color_' . $col_no[1], 'main_' . $j, @$columns['price_font_color'], 'price_font_color', @$columns['price_font_color']);
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

$tablestring .='<div class="col_opt_row sub_row" id="arp_button_color_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column">' . __('Button', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker button_background_color_div" id="button_background_color_div" style="display:none;">';
$button_background_color_value = ($columns['button_background_color'] != '' ) ? $columns['button_background_color'] : '#00baff';
$tablestring .=$arprice_form->font_color_new('button_background_color_' . $col_no[1], 'main_' . $j, $button_background_color_value, 'button_background_color', $button_background_color_value, 'background_column_picker button_background_color', 'general_color_box_background_color');
$tablestring .= "</div>";
$tablestring .='<div class="col_opt_input_div two_column second_picker button_font_color_div" id="button_font_color_div" style="display:none;">';
$tablestring .=$arprice_form->font_color_new('button_font_color_' . $col_no[1], 'main_' . $j, $columns['button_font_color'], 'button_font_color', $columns['button_font_color']);
$tablestring .='<div class="col_opt_input_div" id="button_font_notice_div" style="display:none;">(For <br> Button <br>Hover)</div>';
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .='<div class="col_opt_row" id="arp_body_background_color_div" style="padding:0 !important;">';
$tablestring .='<div class="col_opt_title_div">' . __("Body Row Colors", ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_title_div two_column"></div>';
$tablestring .='<div class="col_opt_title_div two_column" data-id="background_color" style="padding-top:5px !important;">' . __('Background', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_title_div two_column" data-id="font_color" style="padding-top:5px !important;">' . __('Text Color', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='</div>';

$tablestring .='<div class="col_opt_row sub_row" id="arp_odd_color_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column">' . __('Odd', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker odd_background_color_div" id="odd_background_color_div" style="display:none;">';
$tablestring .=$arprice_form->font_color_new('content_odd_color_' . $col_no[1], 'main_' . $j, @$columns['content_odd_color'], 'content_odd_color', @$columns['content_odd_color']);
$tablestring .= "</div>";
$tablestring .='<div class="col_opt_input_div two_column second_picker odd_font_color_div" id="odd_font_color_div" style="display:none;">';
$tablestring .=$arprice_form->font_color_new('content_font_color_' . $col_no[1], 'main_' . $j, @$columns['content_font_color'], 'content_font_color', @$columns['content_font_color']);
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .='<div class="col_opt_row sub_row" id="arp_even_color_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column">' . __('Even', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker even_background_color_div" id="even_background_color_div" style="display:none;">';
$tablestring .=$arprice_form->font_color_new('content_even_color_' . $col_no[1], 'main_' . $j, @$columns['content_even_color'], 'content_even_color', @$columns['content_even_color']);
$tablestring .= "</div>";
$tablestring .='<div class="col_opt_input_div two_column second_picker even_font_color_div" id="even_font_color_div" style="display:none;">';
$tablestring .=$arprice_form->font_color_new('content_even_font_color_' . $col_no[1], 'main_' . $j, @$columns['content_even_font_color'], 'content_even_font_color', @$columns['content_even_font_color']);
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .='</div>';


$tablestring .='<div class="col_opt_row" id="arp_hover_background_color_column" style="padding:0 !important;">';

$tablestring .='<div class="col_opt_title_div two_column"></div>';
$tablestring .='<div class="col_opt_title_div two_column" data-id="background_color" style="padding-top:5px !important;">' . __('Background', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_title_div two_column" data-id="font_color" style="padding-top:5px !important;">' . __('Text Color', ARP_PT_TXTDOMAIN) . '</div>';


$tablestring .='<div class="col_opt_row sub_row" id="arp_column_hover_color_div_column" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column">' . __('Column', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker column_hover_background_color_div" id="column_hover_background_color_div" style="display:none;">';
$column_hover_background_color_value = isset($columns['column_hover_background_color']) ? $columns['column_hover_background_color'] : '';
$tablestring .=$arprice_form->font_color_new('column_hover_background_color_' . $col_no[1], 'main_' . $j, $column_background_color_value, 'column_hover_background_color', $column_hover_background_color_value, 'background_column_picker column_level_hover_background', 'general_color_box_background_color background_color_' . $j);
$tablestring .= "</div>";

$tablestring .= "</div>";


$tablestring .='<div class="col_opt_row sub_row" id="arp_header_hover_color_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column">' . __('Header', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker header_hover_background_color_div" id="header_hover_background_color_div" style="display:none;">';
if (isset($columns['header_hover_background_color'])) {
    $header_hover_background_color_value = $columns['header_hover_background_color'];
} else {
    $header_hover_background_color_value = '';
}
$tablestring .=$arprice_form->font_color_new('header_hover_background_color_' . $col_no[1], 'main_' . $j, $header_hover_background_color_value, 'header_hover_background_color', $header_hover_background_color_value, 'background_column_picker header_hover_background_color', 'general_color_box_background_color');
$tablestring .= "</div>";
$tablestring .='<div class="col_opt_input_div two_column second_picker header_hover_font_color_div" id="header_hover_font_color_div" style="display:none;">';
$header_hover_font_color_value = isset($columns['header_hover_font_color']) ? $columns['header_hover_font_color'] : '';
$tablestring .=$arprice_form->font_color_new('header_hover_font_color_' . $col_no[1], 'main_' . $j, $header_hover_font_color_value, 'header_hover_font_color', $header_hover_font_color_value, 'background_column_picker header_hover_font_color', 'general_color_box_background_color');
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .='<div class="col_opt_row sub_row" id="arp_shortcode_hover_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column"  style="line-height:1.5">' . __('Shortcode Section', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker arp_shortcode_hover_background" id="arp_shortcode_hover_background" style="display:none;">';
$shortcode_hover_background_color = @$columns['shortcode_hover_background_color'];
$tablestring .=$arprice_form->font_color_new('shortcode_hover_background_color_' . $col_no[1], 'main_' . $j, $shortcode_hover_background_color, 'shortcode_hover_background_color', $shortcode_hover_background_color, 'shortcode_hover_background_color', 'general_color_box_background_color');
$tablestring .= "</div>";
$tablestring .='<div class="col_opt_input_div two_column second_picker arp_shortcode_hover_font_color" id="arp_shortcode_hover_font_color" style="display:none;">';
$tablestring .=$arprice_form->font_color_new('shortcode_hover_font_color_' . $col_no[1], 'main_' . $j, @$columns['shortcode_hover_font_color'], 'shortcode_hover_font_color', @$columns['shortcode_hover_font_color']);
$tablestring .= "</div>";
$tablestring .= "</div>";


$tablestring .='<div class="col_opt_row sub_row" id="arp_desc_hover_color_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column">' . __('Description', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker desc_hover_background_color_div" id="desc_hover_background_color_div" style="display:none;">';
$columns['column_desc_hover_background_color'] = isset($columns['column_desc_hover_background_color']) ? $columns['column_desc_hover_background_color'] : '';
$tablestring .=$arprice_form->font_color_new('column_desc_hover_background_color_' . $col_no[1], 'main_' . $j, $columns['column_desc_hover_background_color'], 'column_desc_hover_background_color', $columns['column_desc_hover_background_color']);
$tablestring .= "</div>";
$tablestring .='<div class="col_opt_input_div two_column second_picker desc_hover_font_color_div" id="desc_hover_font_color_div" style="display:none;">';
$column_description_hover_font_color_value = isset($columns['column_description_hover_font_color']) ? $columns['column_description_hover_font_color'] : '';
$tablestring .=$arprice_form->font_color_new('column_description_hover_font_color_' . $col_no[1], 'main_' . $j, $column_description_hover_font_color_value, 'column_description_hover_font_color', $column_description_hover_font_color_value, 'background_column_picker column_description_hover_font_color', 'general_color_box_background_color');
$tablestring .= "</div>";
$tablestring .= "</div>";




$tablestring .='<div class="col_opt_row sub_row" id="arp_price_hover_color_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column">' . __('Pricing', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker price_hover_background_color_div" id="price_hover_background_color_div" style="display:none;">';
$price_hover_background_color_value = isset($columns['price_hover_background_color']) ? $columns['price_hover_background_color'] : '';
$tablestring .=$arprice_form->font_color_new('price_hover_background_color_' . $col_no[1], 'main_' . $j, $price_hover_background_color_value, 'price_hover_background_color', $price_hover_background_color_value, 'background_column_picker', 'general_color_box_background_color');
$tablestring .= "</div>";
$price_hover_font_color_value = isset($columns['price_hover_font_color']) ? $columns['price_hover_font_color'] : '';
$tablestring .='<div class="col_opt_input_div two_column second_picker price_hover_font_color_div" id="price_hover_font_color_div" style="display:none;">';
$tablestring .=$arprice_form->font_color_new('price_hover_font_color_' . $col_no[1], 'main_' . $j, $price_hover_font_color_value, 'price_hover_font_color', $price_hover_font_color_value, 'background_column_picker price_hover_font_color', 'general_color_box_background_color');
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .='<div class="col_opt_row sub_row" id="arp_footer_hover_color_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column">' . __('Footer', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker footer_hover_background_color_div" id="footer_hover_background_color_div" style="display:none;">';
$footer_hover_background_color = isset($columns['footer_hover_background_color']) ? $columns['footer_hover_background_color'] : '';
$tablestring .=$arprice_form->font_color_new("footer_hover_bg_color_{$col_no[1]}", "main_{$j}", $footer_hover_background_color, 'footer_hover_background_color', $footer_hover_background_color, 'footer_hover_background_color_picker', '');
$tablestring .= "</div>";
$tablestring .='<div class="col_opt_input_div two_column second_picker footer_hover_font_color_div" id="footer_hover_font_color_div" style="display:none;">';
$footer_hover_font_color_value = isset($columns['footer_level_options_hover_font_color']) ? $columns['footer_level_options_hover_font_color'] : '';
$tablestring .=$arprice_form->font_color_new('footer_level_options_hover_font_color_' . $col_no[1], 'main_' . $j, $footer_hover_font_color_value, 'footer_hover_font_color', $footer_hover_font_color_value, 'background_column_picker footer_hover_font_color', 'general_color_box_background_color');
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .='<div class="col_opt_row sub_row" id="arp_hover_button_color_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column">' . __('Button', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker button_hover_background_color_div" id="button_hover_background_color_div" style="display:none;">';
$button_hover_background_color_value = ($columns['button_hover_background_color'] != '' ) ? $columns['button_hover_background_color'] : '';
$tablestring .=$arprice_form->font_color_new('button_hover_background_color_' . $col_no[1], 'main_' . $j, $button_hover_background_color_value, 'button_hover_background_color', $button_hover_background_color_value, 'background_column_picker button_hover_background_color', 'general_color_box_background_color');
$tablestring .= "</div>";
$tablestring .='<div class="col_opt_input_div two_column second_picker button_hover_font_color_div" id="button_hover_font_color_div" style="display:none;">';
$button_hover_font_color_value = isset($columns['button_hover_font_color']) ? $columns['button_hover_font_color'] : '';
$tablestring .=$arprice_form->font_color_new('button_hover_font_color_' . $col_no[1], 'main_' . $j, $button_hover_font_color_value, 'button_hover_font_color', $button_hover_font_color_value, 'background_column_picker button_hover_font_color', 'general_color_box_background_color');
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .='<div class="col_opt_row" id="arp_body_hover_background_color_div" style="padding:0 !important;">';
$tablestring .='<div class="col_opt_title_div">' . __("Body Row Colors", ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_title_div two_column"></div>';
$tablestring .='<div class="col_opt_title_div two_column" data-id="background_color" style="padding-top:5px !important;">' . __('Background', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_title_div two_column" data-id="font_color" style="padding-top:5px !important;">' . __('Text Color', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='</div>';

$tablestring .='<div class="col_opt_row sub_row" id="arp_odd_hover_color_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column">' . __('Odd', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker odd_hover_background_color_div" id="odd_hover_background_color_div" style="display:none;">';
$columns['content_odd_hover_color'] = isset($columns['content_odd_hover_color']) ? $columns['content_odd_hover_color'] : '';
$tablestring .=$arprice_form->font_color_new('content_odd_hover_color_' . $col_no[1], 'main_' . $j, $columns['content_odd_hover_color'], 'content_odd_hover_color', $columns['content_odd_hover_color']);
$tablestring .= "</div>";
$tablestring .='<div class="col_opt_input_div two_column second_picker odd_hover_font_color_div" id="odd_hover_font_color_div" style="display:none;">';
$content_hover_font_color_value = isset($columns['content_hover_font_color']) ? $columns['content_hover_font_color'] : '';
$tablestring .=$arprice_form->font_color_new('content_hover_font_color_' . $col_no[1], 'main_' . $j, $content_hover_font_color_value, 'content_hover_font_color', $content_hover_font_color_value, 'background_column_picker content_hover_font_color', 'general_color_box_background_color');
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .='<div class="col_opt_row sub_row" id="arp_even_hover_color_div" style="display:none">';
$tablestring .='<div class="col_opt_title_div two_column">' . __('Even', ARP_PT_TXTDOMAIN) . '</div>';
$tablestring .='<div class="col_opt_input_div two_column first_picker even_hover_background_color_div" id="even_hover_background_color_div" style="display:none;">';
$columns['content_even_hover_color'] = isset($columns['content_even_hover_color']) ? $columns['content_even_hover_color'] : '';
$tablestring .=$arprice_form->font_color_new('content_even_hover_color_' . $col_no[1], 'main_' . $j, $columns['content_even_hover_color'], 'content_even_hover_color', $columns['content_even_hover_color']);
$tablestring .= "</div>";
$tablestring .='<div class="col_opt_input_div two_column second_picker even_font_color_div" id="even_hover_font_color_div" style="display:none;">';
$content_even_hover_font_color = isset($columns['content_even_hover_font_color']) ? $columns['content_even_hover_font_color'] : '';
$tablestring .=$arprice_form->font_color_new('content_even_hover_font_color_' . $col_no[1], 'main_' . $j, $content_even_hover_font_color, 'content_even_hover_font_color', $content_even_hover_font_color, 'background_column_picker content_even_hover_font_color', 'general_color_box_background_color');
$tablestring .= "</div>";
$tablestring .= "</div>";





$tablestring .='</div>';


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


$tablestring .= "</div>";



$tablestring .= "<div class='column_option_div' level-id='header_level_options__button_1' >";

$tablestring .= "<div class='col_opt_row' id='column_title'>";
$tablestring .= "<div class='col_opt_title_div'>" . __('Column Title', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div'>";
$col_no = explode('_', $j);
if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_1']) || in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_1'])) {

    $tablestring .= "<ul class='column_tabs'>";
    $tablestring .= "<li class='option_title selected toggle_step_first_tab' id='header_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"header_yearly_tab\", \"header_monthly_tab\", \"header_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
    $tablestring .= "<li class='option_title toggle_step_second_tab' id='header_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"header_monthly_tab\", \"header_yearly_tab\", \"header_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
    $tablestring .= "<li class='option_title toggle_step_third_tab' id='header_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"header_quarterly_tab\", \"header_monthly_tab\", \"header_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
    $tablestring .= "</ul>";
    $tablestring .= "<div class='option_tab' id='header_yearly_tab'>";
    $tablestring .= "<textarea name='column_title_" . $col_no[1] . "' id='column_title_input' data-column='main_" . $j . "' class='col_opt_textarea column_title_first' style='margin-bottom:10px;' >";
    $tablestring .= $columns['package_title'];
    $tablestring .= "</textarea>";
    $tablestring .= "</div>";
    $tablestring .= "<div class='option_tab' id='header_monthly_tab' style='display:none;'>";

    $tablestring .= "<textarea name='column_title_second_" . $col_no[1] . "'  data-column='main_" . $j . "' class='col_opt_textarea column_title_second' id='column_title_second' style='margin-bottom:10px;'>";
    $tablestring .= isset($columns['package_title_second']) ? $columns['package_title_second'] : '';
    $tablestring .= "</textarea>";
    $tablestring .= "</div>";

    $tablestring .= "<div class='option_tab' id='header_quarterly_tab' style='display:none;'>";

    $tablestring .= "<textarea name='column_title_third_" . $col_no[1] . "'  data-column='main_" . $j . "' class='col_opt_textarea column_title_third' id='column_title_third' style='margin-bottom:10px;'>";
    $tablestring .= isset($columns['package_title_third']) ? $columns['package_title_third'] : '';
    $tablestring .= "</textarea>";
    $tablestring .= "</div>";
} else {


}
$tablestring .= "</div>";

$tablestring .= "<div class='col_opt_button'>";
if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_1'])) {
    $tablestring .= "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='add_header_object_" . $col_no[1] . "' id='add_arp_object' data-insert='column_title_input' data-column='main_" . $j . "' title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "'>";
    $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";

    $tablestring .= "</button>";
    $tablestring .= "<label style='float:left;width:10px;'>&nbsp;</label>";
}

if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_1'])) {

    $tablestring .= "<button type='button' class='col_opt_btn_icon arptooltipster add_header_fontawesome align_left' name='add_header_fontawesome_" . $col_no[1] . "' id='add_header_fontawesome' data-insert='column_title_input' data-column='main_" . $j . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
    $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
    $tablestring .= "</button>";

    $tablestring .= "<div class='arp_font_awesome_model_box_container'>";

    $tablestring .= "</div>";
}



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

$tablestring .= "</div>";
$tablestring .= "</div>";

$header_text_align = isset($columns['header_font_align']) ? $columns['header_font_align'] : 'center';
$tablestring .= $arprice_form->arp_create_alignment_div('header_text_alignment', $header_text_align, 'arp_header_text_alignment', $col_no[1], 'header_section');

$tablestring .= "<div class='col_opt_row' id='header_other_background_image'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Background Image', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";
$tablestring .= "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='arp_header_background_image_" . $col_no[1] . "' id='arp_header_background_image' data-insert='arp_header_background_image_input' data-column='main_" . $j . "' title='" . __('Add Header Background Image', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Header Background Image', ARP_PT_TXTDOMAIN) . "' style='float:right;'>";
$tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";
$tablestring .= "</button>";
$columns['header_background_image'] = isset($columns['header_background_image']) ? $columns['header_background_image'] : '';
$tablestring .= "<input type='hidden' name='arp_header_background_image_" . $col_no[1] . "' value='" . isset($columns['header_background_image']) ? $columns['header_background_image'] : '' . "' id='arp_header_background_image_input' />";
$tablestring .= "<div class='arp_add_image_container arp_header_image_container'>";
$tablestring .= "<div class='arp_add_image_arrow'></div>";
$tablestring .= "<div class='arp_add_img_content'>";

$tablestring .= "<div class='arp_add_img_row'>";
$tablestring .= "<div class='arp_add_img_label'>";
$tablestring .= __('Image URL', ARP_PT_TXTDOMAIN);
$tablestring .= "<span class='arp_model_close_btn' id='arp_add_image_container'><i class='fa fa-times'></i></span>";
$tablestring .= "</div>";
$tablestring .= "<div class='arp_add_img_option'>";
$tablestring .= "<input type='text' value='" . $columns['header_background_image'] . "' class='arp_modal_txtbox img' id='arp_header_image_url' name='arp_header_image_url' />";
$tablestring .= "<button data-insert='header_object' data-id='arp_header_image_url' type='button' class='arp_header_object'>";
$tablestring .= __('Add File', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_add_img_row' style='margin-top:10px;'>";
$tablestring .= "<div class='arp_add_img_label'>";
$tablestring .= '<button type="button" onclick="arp_add_object(this);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_image_btn">';
$tablestring .= __('Add', ARP_PT_TXTDOMAIN);
$tablestring .= '</button>';
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "</div>";
$tablestring .= "</div>";
$tablestring .= "</div>";

$remove_link = "display:none;";
if ($columns['header_background_image'] != '') {
    $remove_link = "";
}

$tablestring .= "<div class='arp_google_font_preview_note' id='arp_remove_header_image_link' style='$remove_link'>";
$tablestring .= "<a href='javascript:arp_remove_object(\"main_column_" . $col_no[1] . "\",\"arp_header_background_image_input\")'  class='arp_google_font_preview_link' id='remove_header_image_link'>";
$tablestring .= __('Remove Image', ARP_PT_TXTDOMAIN);
$tablestring .= "</a>";
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "<div class='col_opt_row' id='header_other_font_family'>";
$tablestring .= "<div class='col_opt_title_div'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div'>";

$tablestring .= "<input type='hidden' id='header_font_family' name='header_font_family_" . $col_no[1] . "' value='" . $columns['header_font_family'] . "' data-column='main_" . $j . "' />";
$tablestring .= "<dl class='arp_selectbox column_level_dd' data-name='header_font_family_" . $col_no[1] . "' data-id='header_font_family_" . $col_no[1] . "'>";
$tablestring .= "<dt><span>" . $columns['header_font_family'] . "</span><input type='text' style='display:none;' value='" . $columns['header_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
$tablestring .= "<dd>";
$tablestring .= "<ul data-id='header_font_family' data-column='" . $j . "'>";

$tablestring .= "</ul>";
$tablestring .= "</dd>";
$tablestring .= "</dl>";

$tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_header_font_family_preview' href='" . $googlefontpreviewurl . $columns['header_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";

$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "<div class='col_opt_row' id='header_other_font_size'>";
$tablestring .= "<div class='btn_type_size'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";

$tablestring .= "<input type='hidden' id='header_font_size' name='header_font_size_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . $columns['header_font_size'] . "' />";
$tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='header_font_size_" . $col_no[1] . "' data-id='header_font_size_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
$tablestring .= "<dt><span>" . $columns['header_font_size'] . "</span><input type='text' style='display:none;' value='" . $columns['header_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
$tablestring .= "<dd>";
$tablestring .= "<ul data-id='header_font_size' data-column='" . $j . "'>";
$size_arr = array();
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

$tablestring .= "<div class='col_opt_row' id='header_other_font_color'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";

//new font style btns
//check selected for bold
$tablestring .= "<div class='col_opt_input_div' data-level='header_level_options' level-id='header_button1' >";

if ($columns['header_style_bold'] == 'bold') {
    $header_style_bold_selected = 'selected';
} else {
    $header_style_bold_selected = '';
}

//check selected for italic

if ($columns['header_style_italic'] == 'italic') {
    $header_style_italic_selected = 'selected';
} else {
    $header_style_italic_selected = '';
}

//check selected for underline or line-through

if ($columns['header_style_decoration'] == 'underline') {
    $header_style_underline_selected = 'selected';
} else {
    $header_style_underline_selected = '';
}

if ($columns['header_style_decoration'] == 'line-through') {
    $header_style_linethrough_selected = 'selected';
} else {
    $header_style_linethrough_selected = '';
}



$tablestring .= "<div class='arp_style_btn " . $header_style_bold_selected . "  arptooltipster' data-align='left' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-column='main_" . $j . "' id='arp_style_bold' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-bold'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $header_style_italic_selected . " arptooltipster' data-align='center' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-column='main_" . $j . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-italic'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $header_style_underline_selected . " arptooltipster' data-align='right' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-column='main_" . $j . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-underline'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $header_style_linethrough_selected . " arptooltipster' data-align='right' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-column='main_" . $j . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-strikethrough'></i>";
$tablestring .= "</div>";


$tablestring .= "<input type='hidden' id='header_style_bold' name='header_style_bold_" . $col_no[1] . "' value='" . $columns['header_style_bold'] . "' /> ";
$tablestring .= "<input type='hidden' id='header_style_italic' name='header_style_italic_" . $col_no[1] . "' value='" . $columns['header_style_italic'] . "' /> ";
$tablestring .= "<input type='hidden' id='header_style_decoration' name='header_style_decoration_" . $col_no[1] . "' value='" . $columns['header_style_decoration'] . "' /> ";



$tablestring .= "</div>";


$tablestring .= "</div>";


$tablestring .= "<div class='col_opt_row arp_ok_div' id='header_level_other_arp_ok_div__button_1'>";
$tablestring .= "<div class='col_opt_btn_div'>";
$tablestring .= "<div class='col_opt_navigation_div'>";
$tablestring .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='header_left_arrow' data-column='{$col_no[1]}' data-button-id='header_level_options__button_1'></i>&nbsp;";
$tablestring .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='header_right_arrow' data-column='{$col_no[1]}' data-button-id='header_level_options__button_1'></i>&nbsp;";
$tablestring .= "</div>";
$tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
$tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "</div>";

// COLUMN DESCRIPTION

$tablestring .= "<div class='column_option_div' level-id='header_level_options__button_2' style='display:none;'>";
$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'] = isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2']) ? $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'] : "";
if (is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'])) {
    if (in_array('column_description', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'])) {

        $tablestring .= "<div class='col_opt_row' id='column_description'>";
        $tablestring .= "<div class='col_opt_title_div'>" . __('Column Description', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div'>";
        $tablestring .= "<ul class='column_tabs'>";
        $tablestring .= "<li class='option_title selected toggle_step_first_tab' id='column_description_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"column_description_yearly_tab\", \"column_description_monthly_tab\", \"column_description_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
        $tablestring .= "<li class='option_title toggle_step_second_tab' id='column_description_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"column_description_monthly_tab\", \"column_description_yearly_tab\", \"column_description_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
        $tablestring .= "<li class='option_title toggle_step_third_tab' id='column_description_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"column_description_quarterly_tab\", \"column_description_monthly_tab\", \"column_description_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
        $tablestring .= "</ul>";
        $tablestring .= "<div class='option_tab' id='column_description_yearly_tab'>";
        $tablestring .= "<textarea id='arp_column_description' name='arp_column_description_" . $col_no[1] . "'  class='col_opt_textarea arp_column_description_first' data-column='main_column_" . $col_no[1] . "'>";
        $tablestring .= stripslashes_deep($columns['column_description']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='option_tab' id='column_description_monthly_tab' style='display:none;'>";
        $tablestring .= "<textarea id='arp_column_description_second' name='arp_column_description_second_" . $col_no[1] . "'  class='col_opt_textarea arp_column_description_second' data-column='main_column_" . $col_no[1] . "'>";
        $tablestring .= stripslashes_deep($columns['column_description_second']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='option_tab' id='column_description_quarterly_tab' style='display:none;'>";
        $tablestring .= "<textarea id='arp_column_description_third' name='arp_column_description_third_" . $col_no[1] . "'  class='col_opt_textarea arp_column_description_third' data-column='main_column_" . $col_no[1] . "'>";
        $tablestring .= stripslashes_deep($columns['column_description_third']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='col_opt_button'>";
        if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'])) {
            $tablestring .= "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='add_header_object_" . $col_no[1] . "' id='add_arp_object' data-insert='arp_column_description' data-column='main_" . $j . "' title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "'>";
            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";

            $tablestring .= "</button>";
            $tablestring .= "<label style='float:left;width:10px;'>&nbsp;</label>";
        }

        if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_2'])) {
            $tablestring .= "<button type='button' class='col_opt_btn_icon arptooltipster add_header_fontawesome align_left' name='add_header_fontawesome_" . $col_no[1] . "' id='add_header_fontawesome' data-insert='arp_column_description' data-column='main_" . $j . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
            $tablestring .= "</button>";

            $tablestring .= "<div class='arp_font_awesome_model_box_container'>";

            $tablestring .= "</div>";
        }

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

        $tablestring .= "</div>";
        $tablestring .= "</div>";


        $column_description_text_alignment = isset($columns['description_text_alignment']) ? $columns['description_text_alignment'] : 'center';
        $tablestring .= $arprice_form->arp_create_alignment_div('column_description_text_alignment', $column_description_text_alignment, 'arp_description_text_alignment', $col_no[1], 'column_description_section');



        $tablestring .= "<div class='col_opt_row' id='column_description_other_font_family'>";
        $tablestring .= "<div class='col_opt_title_div'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div'>";

        $tablestring .= "<input type='hidden' id='column_description_font_family' name='column_description_font_family_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . $columns['column_description_font_family'] . "' />";
        $tablestring .= "<dl class='arp_selectbox column_level_dd' data-name='column_description_font_family_" . $col_no[1] . "' data-id='column_description_font_family_" . $col_no[1] . "'>";
        $tablestring .= "<dt><span>" . $columns['column_description_font_family'] . "</span><input type='text' style='display:none;' value='" . $columns['column_description_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul data-id='column_description_font_family' data-column='" . $j . "'>";



        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_column_description_font_family_preview' href='" . $googlefontpreviewurl . $columns['column_description_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='col_opt_row' id='column_description_other_font_size'>";
        $tablestring .= "<div class='btn_type_size'>";
        $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div two_column'>";

        $tablestring .= "<input type='hidden' id='column_description_font_size' data-column='main_" . $j . "' name='column_description_font_size_" . $col_no[1] . "' value='" . $columns['column_description_font_size'] . "' />";
        $tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='column_description_font_size_" . $col_no[1] . "' data-id='column_description_font_size_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
        $tablestring .= "<dt><span>" . $columns['column_description_font_size'] . "</span><input type='text' style='display:none;' value='" . $columns['column_description_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $size_arr = array();
        $tablestring .= "<ul data-id='column_description_font_size' data-column='" . $j . "'>";
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

        $tablestring .= "<div class='col_opt_row' id='column_description_other_font_color'>";
        $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";

        //new font style btns

        $tablestring .= "<div class='col_opt_input_div' data-level='header_level_options'  level-id='header_button2' >";

        //check selected for bold


        if ($columns['column_description_style_bold'] == 'bold') {
            $header2_style_bold_selected = 'selected';
        } else {
            $header2_style_bold_selected = '';
        }

        //check selected for italic

        if ($columns['column_description_style_italic'] == 'italic') {
            $header2_style_italic_selected = 'selected';
        } else {
            $header2_style_italic_selected = '';
        }

        //check selected for underline or line-through

        if ($columns['column_description_style_decoration'] == 'underline') {
            $header2_style_underline_selected = 'selected';
        } else {
            $header2_style_underline_selected = '';
        }

        if ($columns['column_description_style_decoration'] == 'line-through') {
            $header2_style_linethrough_selected = 'selected';
        } else {
            $header2_style_linethrough_selected = '';
        }


        $tablestring .= "<div class='arp_style_btn " . $header2_style_bold_selected . " arptooltipster' data-align='left' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-column='main_" . $j . "' id='arp_style_bold' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $header2_style_italic_selected . " arptooltipster' data-align='center' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-column='main_" . $j . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $header2_style_underline_selected . " arptooltipster' data-align='right' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-column='main_" . $j . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $header2_style_linethrough_selected . " arptooltipster' data-align='right' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-column='main_" . $j . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-strikethrough'></i>";
        $tablestring .= "</div>";


        $tablestring .= "<input type='hidden' id='column_description_style_bold' name='column_description_style_bold_" . $col_no[1] . "' value='" . $columns['column_description_style_bold'] . "' /> ";
        $tablestring .= "<input type='hidden' id='column_description_style_italic' name='column_description_style_italic_" . $col_no[1] . "' value='" . $columns['column_description_style_italic'] . "' /> ";
        $tablestring .= "<input type='hidden' id='column_description_style_decoration' name='column_description_style_decoration_" . $col_no[1] . "' value='" . $columns['column_description_style_decoration'] . "' /> ";





        $tablestring .= "</div>";

        //new font style btn ends
        $tablestring .= "</div>";
    }
}

$tablestring .= "<div class='col_opt_row arp_ok_div' id='header_level_other_arp_ok_div__button_2' style='display:none;'>";
$tablestring .= "<div class='col_opt_btn_div'>";
$tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
$tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";
$tablestring .= "</div>";


$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='header_level_options__button_3' style='display:none;'>";
$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3'] = isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3']) ? $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3'] : "";
if (is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3'])) {
    if (in_array('column_description', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3'])) {
        $tablestring .= "<div class='col_opt_row' id='column_description'>";
        $tablestring .= "<div class='col_opt_title_div'>" . __('Column Description', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div'>";
        $tablestring .= "<ul class='column_tabs'>";
        $tablestring .= "<li class='option_title selected toggle_step_first_tab' id='column_description_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"column_description_yearly_tab\", \"column_description_monthly_tab\", \"column_description_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
        $tablestring .= "<li class='option_title toggle_step_second_tab' id='column_description_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"column_description_monthly_tab\", \"column_description_yearly_tab\", \"column_description_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
        $tablestring .= "<li class='option_title toggle_step_third_tab' id='column_description_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"column_description_quarterly_tab\", \"column_description_monthly_tab\", \"column_description_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
        $tablestring .= "</ul>";
        $tablestring .= "<div class='option_tab' id='column_description_yearly_tab'>";
        $tablestring .= "<textarea id='arp_column_description' name='arp_column_description_" . $col_no[1] . "'  class='col_opt_textarea arp_column_description_first' data-column='main_column_" . $col_no[1] . "'>";
        $tablestring .= stripslashes_deep($columns['column_description']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='option_tab' id='column_description_monthly_tab' style='display:none;'>";
        $tablestring .= "<textarea id='arp_column_description_second' name='arp_column_description_second_" . $col_no[1] . "'  class='col_opt_textarea arp_column_description_second' data-column='main_column_" . $col_no[1] . "'>";
        $tablestring .= stripslashes_deep($columns['column_description_second']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='option_tab' id='column_description_quarterly_tab' style='display:none;'>";
        $tablestring .= "<textarea id='arp_column_description_third' name='arp_column_description_third_" . $col_no[1] . "'  class='col_opt_textarea arp_column_description_third' data-column='main_column_" . $col_no[1] . "'>";
        $tablestring .= stripslashes_deep($columns['column_description_third']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='col_opt_button'>";
        if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3'])) {
            $tablestring .= "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='add_header_object_" . $col_no[1] . "' id='add_arp_object' data-insert='arp_column_description' data-column='main_" . $j . "' title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "'>";
            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";

            $tablestring .= "</button>";
            $tablestring .= "<label style='float:left;width:10px;'>&nbsp;</label>";
        }

        if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3'])) {
            $tablestring .= "<button type='button' class='col_opt_btn_icon arptooltipster add_header_fontawesome align_left' name='add_header_fontawesome_" . $col_no[1] . "' id='add_header_fontawesome' data-insert='arp_column_description' data-column='main_" . $j . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
            $tablestring .= "</button>";

            $tablestring .= "<div class='arp_font_awesome_model_box_container'>";

            $tablestring .= "</div>";
        }

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

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='col_opt_row' id='column_description_other_font_family'>";
        $tablestring .= "<div class='col_opt_title_div'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div'>";

        $tablestring .= "<input type='hidden' id='column_description_font_family' name='column_description_font_family_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . $columns['column_description_font_family'] . "' />";
        $tablestring .= "<dl class='arp_selectbox column_level_dd' data-name='column_description_font_family_" . $col_no[1] . "' data-id='column_description_font_family_" . $col_no[1] . "'>";
        $tablestring .= "<dt><span>" . $columns['column_description_font_family'] . "</span><input type='text' style='display:none;' value='" . $columns['column_description_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul data-id='column_description_font_family' data-column='" . $j . "'>";



        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_column_description_font_family_preview' href='" . $googlefontpreviewurl . $columns['column_description_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='col_opt_row' id='column_description_other_font_size'>";
        $tablestring .= "<div class='btn_type_size'>";
        $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div two_column'>";

        $tablestring .= "<input type='hidden' id='column_description_font_size' name='column_description_font_size_" . $col_no[1] . "' value='" . $columns['header_font_size'] . "' data-column='main_" . $j . "' />";
        $tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='column_description_font_size_" . $col_no[1] . "' data-id='column_description_font_size_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
        $tablestring .= "<dt><span>" . $columns['column_description_font_size'] . "</span><input type='text' style='display:none;' value='" . $columns['column_description_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $size_arr = array();
        $tablestring .= "<ul data-id='column_description_font_size' data-column='" . $j . "'>";
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

        $tablestring .= "<div class='btn_type_size'>";
        $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div two_column'>";

        $tablestring .= "<input type='hidden' id='column_description_font_style' name='column_description_font_style_" . $col_no[1] . "' value='" . $columns['column_description_font_style'] . "' data-column='main_" . $j . "' />";
        $tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='column_description_font_style_" . $col_no[1] . "' data-id='column_description_font_style_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
        $tablestring .= "<dt><span>" . $columns['column_description_font_style'] . "</span><input type='text' style='display:none;' value='" . $columns['column_description_font_style'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul data-id='column_description_font_style' data-column='" . $j . "'>";
        $tablestring .= $arprice_form->font_style_new();
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "</div>";
    }
    if (in_array('additional_shortcode', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3'])) {

        if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3']) || in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3'])) {
            $header_shortcode_txtarea_cls = 'editable_shortcode';
        } else {
            $header_shortcode_txtarea_cls = '';
        }

        $tablestring .= "<div class='col_opt_row' id='additional_shortcode'>";

        $tablestring .= "<div class='col_opt_title_div'>" . __('Additional Shortcode', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div'>";
        $tablestring .= "<ul class='column_tabs'>";
        $tablestring .= "<li class='option_title selected toggle_step_first_tab' id='header_shortcode_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"header_shortcode_yearly_tab\", \"header_shortcode_monthly_tab\", \"header_shortcode_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
        $tablestring .= "<li class='option_title toggle_step_second_tab' id='header_shortcode_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"header_shortcode_monthly_tab\", \"header_shortcode_yearly_tab\", \"header_shortcode_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
        $tablestring .= "<li class='option_title toggle_step_third_tab' id='header_shortcode_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"header_shortcode_quarterly_tab\", \"header_shortcode_monthly_tab\", \"header_shortcode_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
        $tablestring .= "</ul>";
        $tablestring .= "<div class='option_tab' id='header_shortcode_yearly_tab'>";
        $tablestring .= "<textarea id='additional_shortcode_input' name='additional_shortcode_" . $col_no[1] . "'  class='col_opt_textarea header_shortcode_first " . $header_shortcode_txtarea_cls . "' data-column='main_" . $j . "'>";
        $tablestring .= htmlentities(@$columns['arp_header_shortcode']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='option_tab' id='header_shortcode_monthly_tab' style='display:none;'>";
        $tablestring .= "<textarea id='additional_shortcode_input_second' name='additional_shortcode_second_" . $col_no[1] . "'  class='col_opt_textarea header_shortcode_second " . $header_shortcode_txtarea_cls . "' data-column='main_" . $j . "'>";
        $tablestring .= htmlentities(@$columns['arp_header_shortcode_second']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='option_tab' id='header_shortcode_quarterly_tab' style='display:none;'>";
        $tablestring .= "<textarea id='additional_shortcode_input_third' name='additional_shortcode_third_" . $col_no[1] . "'  class='col_opt_textarea header_shortcode_third " . $header_shortcode_txtarea_cls . "' data-column='main_" . $j . "'>";
        $tablestring .= htmlentities(@$columns['arp_header_shortcode_third']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        if (in_array('arp_object', @$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3']) || in_array('arp_fontawesome', @$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3'])) {
            $tablestring .= "<div class='col_opt_button'>";

            if ($ref_template == 'arptemplate_5' || $ref_template == 'arptemplate_7') {
                $tablestring .= "<button type='button' class='col_opt_btn_icon align_left arptooltipster add_header_shortcode' onclick='add_header_shortcode_fn(this);' name='add_header_shortcode_btn_" . $col_no[1] . "' id='add_header_shortcode' data-insert='additional_shortcode_input' title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "'>";

                $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/audio-icon.png' />";
                $tablestring .= "</button>";
                $tablestring .= "<label style='float:left;width:10px;'>&nbsp;</label>";
            }

            if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3'])) {
                $tablestring .= "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left add_header_shortcode' name='add_header_object_" . $col_no[1] . "' id='add_header_shortcode' data-insert='additional_shortcode_input' data-column='main_" . $j . "' title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "'>";
                $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";
                $tablestring .= "</button>";
                $tablestring .= "<label style='float:left;width:10px;'>&nbsp;</label>";
            }

            if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3'])) {
                $tablestring .= "<button type='button' class='col_opt_btn_icon add_header_fontawesome arptooltipster align_left add_header_shortcode' name='add_header_fontawesome_" . $col_no[1] . "' id='add_header_fontawesome' data-insert='additional_shortcode_input' data-column='main_" . $j . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
                $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
                $tablestring .= "</button>";

                $tablestring .= "<div class='arp_font_awesome_model_box_container'>";

                $tablestring .= "</div>";
            }

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

            $tablestring .= "</div>";
        } else {
            $tablestring .= "<div class='col_opt_button'>";
            $tablestring .= "<button type='button' class='col_opt_btn_icon align_left arptooltipster add_header_shortcode' onclick='add_header_shortcode_fn(this);' name='add_header_shortcode_btn_" . $col_no[1] . "' id='add_header_shortcode' data-insert='additional_shortcode_input' title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "'>";

            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/audio-icon.png' />";
            $tablestring .= "</button>";
            $tablestring .= "</div>";
        }
        $tablestring .= "</div>";
    }

    if (in_array('arp_shortcode_customization_style_div', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3'])) {
        $arprice_customization_style = $arprice_default_settings->arp_shortcode_custom_type();
        if ($reference_template == 'arptemplate_26') {
            unset($arprice_customization_style['none']);
        }
        $tablestring .= "<div class='col_opt_row' id='arp_shortcode_customization_style_div'>";
        $tablestring .= "<div class='col_opt_title_div' style='width : 20%;margin-top:6px;'>" . __('Style', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div' style='width : 80%;'>";

        $tablestring .= "<input type='hidden' id='arp_shortcode_customization_style' name='arp_shortcode_customization_style_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . @$columns['arp_shortcode_customization_style'] . "' />";
        $tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='arp_shortcode_customization_style_" . $col_no[1] . "' data-id='arp_shortcode_customization_style_" . $col_no[1] . "' style='width:190px;'>";
        $tablestring .= "<dt style='width : 180px;'><span>" . @$arprice_customization_style[@$columns['arp_shortcode_customization_style']]['name'] . "</span><input type='text' style='display:none;' value='" . @$columns['arp_shortcode_customization_style'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd style='width : 195px;'>";
        $tablestring .= "<ul data-id='arp_shortcode_customization_style' data-column='" . $j . "'>";

        foreach ($arprice_customization_style as $key => $style) {
            $tablestring .= "<li data-value='" . $key . "' data-label='" . $style['name'] . "'>" . $style['name'] . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
    }

    if (in_array('arp_shortcode_customization_size_div', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['header_level_options']['other_columns_buttons']['header_level_options__button_3'])) {
        $tablestring .= "<div class='col_opt_row' id='arp_shortcode_customization_size_div'>";


        $tablestring .= "<div class='col_opt_title_div' style='width : 40%;margin-top:6px;'>" . __('Size', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div' style='width : 60%;'>";

        $tablestring .= "<input type='hidden' id='arp_shortcode_customization_size' name='arp_shortcode_customization_size_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . @$columns['arp_shortcode_customization_size'] . "' />";
        $tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='arp_shortcode_customization_size_" . $col_no[1] . "' data-id='arp_shortcode_customization_size_" . $col_no[1] . "' style='width:190px;'>";
        $tablestring .= "<dt style='width : 130px;'><span>" . @$arp_coloptionsarr['column_button_options']['button_size'][@$columns['arp_shortcode_customization_size']] . "</span><input type='text' style='display:none;' value='" . @$columns['arp_shortcode_customization_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd style='width : 146px;'>";
        $tablestring .= "<ul data-id='arp_shortcode_customization_size' data-column='" . $j . "'>";
        $arprice_customization_size = @$arp_coloptionsarr['column_button_options']['button_size'];
        foreach ($arprice_customization_size as $key => $style) {
            $tablestring .= "<li data-value='" . $key . "' data-label='" . $style . "'>" . $style . "</li>";
        }
        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
    }
}

$tablestring .= "<div class='col_opt_row arp_ok_div' id='header_level_other_arp_ok_div__button_3' style='display:none;'>";
$tablestring .= "<div class='col_opt_btn_div'>";
$tablestring .= "<div class='col_opt_navigation_div'>";
$tablestring .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='header_left_arrow' data-column='{$col_no[1]}' data-button-id='header_level_options__button_3'></i>&nbsp;";
$tablestring .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='header_right_arrow' data-column='{$col_no[1]}' data-button-id='header_level_options__button_3'></i>&nbsp;";
$tablestring .= "</div>";
$tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
$tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='pricing_level_options__button_1' style='display:none;'>";

$tablestring .= "<div class='col_opt_row' id='price_text'>";
$tablestring .= "<div class='col_opt_title_div'>" . __('Price Text', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div'>";
if ($template_type == 'normal') {
    $col_opt_txtarea_cls = 'col_opt_textarea_big';
    $arp_price_yearly_text_tab_id = 'price_yearly_tab';
    $arp_price_monthly_text_tab_id = 'price_monthly_tab';
    $arp_price_quarterly_text_tab_id = 'price_quarterly_tab';
} else {
    $col_opt_txtarea_cls = '';
    $arp_price_yearly_text_tab_id = 'price_yearly_value_tab';
    $arp_price_monthly_text_tab_id = 'price_monthly_value_tab';
    $arp_price_quarterly_text_tab_id = 'price_quarterly_value_tab';
}
$tablestring .= "<ul class='column_tabs'>";
$tablestring .= "<li class='option_title selected toggle_step_first_tab' id='" . $arp_price_yearly_text_tab_id . "' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"$arp_price_yearly_text_tab_id\", \"$arp_price_monthly_text_tab_id\", \"$arp_price_quarterly_text_tab_id\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
$tablestring .= "<li class='option_title toggle_step_second_tab' id='" . $arp_price_monthly_text_tab_id . "' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"$arp_price_monthly_text_tab_id\", \"$arp_price_yearly_text_tab_id\", \"$arp_price_quarterly_text_tab_id\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
$tablestring .= "<li class='option_title toggle_step_third_tab' id='" . $arp_price_quarterly_text_tab_id . "' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"$arp_price_quarterly_text_tab_id\", \"$arp_price_monthly_text_tab_id\", \"$arp_price_yearly_text_tab_id\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
$tablestring .= "</ul>";

$tablestring .= "<div class='option_tab' id='" . $arp_price_yearly_text_tab_id . "'>";
$tablestring .= "<textarea id='price_text_input' name='price_text_" . $col_no[1] . "' class='col_opt_textarea " . $col_opt_txtarea_cls . " price_text_one_step' data-column='main_" . $j . "' style='max-width:100%;width:100%;margin-bottom:10px;'>";
$tablestring .= $columns['price_text'];
$tablestring .= "</textarea>";

$tablestring .= "</div>";
//start 2 step price and label both
if ($template_type == 'normal') {
    $col_opt_txtarea_cls = 'col_opt_textarea_big';
} else {
    $col_opt_txtarea_cls = '';
}

$tablestring .= "<div class='option_tab' id='price_monthly_tab' style='display:none;'>";
$tablestring .= "<textarea id='price_text_two_step' name='price_text_two_step_" . $col_no[1] . "' class='col_opt_textarea " . $col_opt_txtarea_cls . " price_text_two_step' data-column='main_" . $j . "' style='max-width:100%;width:100%;margin-bottom:10px;'>";
$tablestring .= isset($columns['price_text_two_step']) ? $columns['price_text_two_step'] : '';
$tablestring .= "</textarea>";

$tablestring .= "</div>";
//start 3 step price and label both
if ($template_type == 'normal') {
    $col_opt_txtarea_cls = 'col_opt_textarea_big';
} else {
    $col_opt_txtarea_cls = '';
}
$tablestring .= "<div class='option_tab' id='price_quarterly_tab' style='display:none;'>";

$tablestring .= "<textarea id='price_text_three_step' name='price_text_three_step_" . $col_no[1] . "' class='col_opt_textarea " . $col_opt_txtarea_cls . " price_text_three_step' data-column='main_" . $j . "' style='max-width:100%;width:100%;margin-bottom:10px;'>";
$tablestring .= isset($columns['price_text_three_step']) ? $columns['price_text_three_step'] : '';
$tablestring .= "</textarea>";

$tablestring .= "</div>";
//start 2 step only price
if ($template_type == 'normal') {
    $col_opt_txtarea_cls = 'col_opt_textarea_big';
} else {
    $col_opt_txtarea_cls = '';
}
$tablestring .= "<div class='option_tab' id='price_monthly_value_tab' style='display:none;'>";

$tablestring .= "<textarea id='price_text_two_step_only_price' name='price_text_input_two_step_price_" . $col_no[1] . "' class='col_opt_textarea " . $col_opt_txtarea_cls . " price_text_two_step_only_price' data-column='main_" . $j . "' style='min-height:60px;max-width:100%;width:100%;margin-bottom:10px;'>";
$tablestring .= isset($columns['price_text_input_two_step_price']) ? $columns['price_text_input_two_step_price'] : '';
$tablestring .= "</textarea>";

$tablestring .= "</div>";
//start 3 step only price
if ($template_type == 'normal') {
    $col_opt_txtarea_cls = 'col_opt_textarea_big';
} else {
    $col_opt_txtarea_cls = '';
}
$tablestring .= "<div class='option_tab' id='price_quarterly_value_tab' style='display:none;'>";

$tablestring .= "<textarea id='price_text_three_step_only_price' name='price_text_input_three_step_price_" . $col_no[1] . "' class='col_opt_textarea " . $col_opt_txtarea_cls . " price_text_three_step_only_price' data-column='main_" . $j . "' style='min-height:60px;max-width:100%;width:100%;margin-bottom:10px;'>";
$tablestring .= isset($columns['price_text_input_three_step_price']) ? $columns['price_text_input_three_step_price'] : '';
$tablestring .= "</textarea>";

$tablestring .= "</div>";

if (isset($column_settings['toggle_column_animation']) && $column_settings['toggle_column_animation'] == 1) {
    $arp_style = 'display: block;';
} else {
    $arp_style = 'display: none;';
}
$tablestring .= "<div class='arp_toogle_price_note' id='arp_toogle_price_note' style='" . $arp_style . "'>" . __('Use class <b>.arp_price_amount</b> for price animation. It will only work with numbers.', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_button'>";

$arp_pricing_font_awesome_icon = "arp_single_icon_arrow";

if (is_array(@$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && in_array('arp_object', @$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1'])) {
    $tablestring .= "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='add_header_object_" . $col_no[1] . "' id='add_arp_object' data-insert='price_text_input' data-column='main_" . $j . "' title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "'>";
    $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";

    $tablestring .= "</button>";
    $tablestring .= "<label style='float:left;width:10px;'>&nbsp;</label>";
    $arp_pricing_font_awesome_icon = "";
}

if (is_array(@$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && in_array('arp_fontawesome', @$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1'])) {

    $tablestring .= "<button type='button' class='col_opt_btn_icon add_header_fontawesome arptooltipster align_left' name='add_header_fontawesome_" . $col_no[1] . "' id='add_header_fontawesome' data-insert='price_text_input' data-column='main_" . $j . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
    $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
    $tablestring .= "</button>";

    $tablestring .= "<div class='arp_font_awesome_model_box_container'>";

    $tablestring .= "</div>";
}

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

$tablestring .= "</div>";
$tablestring .= "</div>";
$tablestring .= "</div>";

if (isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && in_array('arp_shortcode_customization_style_div', @$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1'])) {
    $arprice_customization_style = $arprice_default_settings->arp_shortcode_custom_type();
    if ($reference_template == 'arptemplate_26') {
        unset($arprice_customization_style['none']);
    }
    $tablestring .= "<div class='col_opt_row' id='arp_shortcode_customization_style_div'>";
    $tablestring .= "<div class='col_opt_title_div' style='width : 20%;margin-top:6px;'>" . __('Style', ARP_PT_TXTDOMAIN) . "</div>";
    $tablestring .= "<div class='col_opt_input_div' style='width : 80%;'>";

    $tablestring .= "<input type='hidden' id='arp_shortcode_customization_style' name='arp_shortcode_customization_style_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . @$columns['arp_shortcode_customization_style'] . "' />";
    $tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='arp_shortcode_customization_style_" . $col_no[1] . "' data-id='arp_shortcode_customization_style_" . $col_no[1] . "' style='width:190px;'>";
    $tablestring .= "<dt style='width : 180px;'><span>" . @$arprice_customization_style[@$columns['arp_shortcode_customization_style']]['name'] . "</span><input type='text' style='display:none;' value='" . @$columns['arp_shortcode_customization_style'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
    $tablestring .= "<dd style='width : 195px;'>";
    $tablestring .= "<ul data-id='arp_shortcode_customization_style' data-column='" . $j . "'>";

    foreach ($arprice_customization_style as $key => $style) {
        $tablestring .= "<li data-value='" . $key . "' data-label='" . $style['name'] . "'>" . $style['name'] . "</li>";
    }
    $tablestring .= "</ul>";
    $tablestring .= "</dd>";
    $tablestring .= "</dl>";
    $tablestring .= "</div>";
    $tablestring .= "</div>";
}

if (isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1']) && in_array('arp_shortcode_customization_size_div', @$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_1'])) {
    $tablestring .= "<div class='col_opt_row' id='arp_shortcode_customization_size_div'>";


    $tablestring .= "<div class='col_opt_title_div' style='width : 40%;margin-top:6px;'>" . __('Size', ARP_PT_TXTDOMAIN) . "</div>";
    $tablestring .= "<div class='col_opt_input_div' style='width : 60%;'>";

    $tablestring .= "<input type='hidden' id='arp_shortcode_customization_size' name='arp_shortcode_customization_size_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . @$columns['arp_shortcode_customization_size'] . "' />";
    $tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='arp_shortcode_customization_size_" . $col_no[1] . "' data-id='arp_shortcode_customization_size_" . $col_no[1] . "' style='width:190px;'>";
    $tablestring .= "<dt style='width : 130px;'><span>" . @$arp_coloptionsarr['column_button_options']['button_size'][@$columns['arp_shortcode_customization_size']] . "</span><input type='text' style='display:none;' value='" . @$columns['arp_shortcode_customization_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
    $tablestring .= "<dd style='width : 146px;'>";
    $tablestring .= "<ul data-id='arp_shortcode_customization_size' data-column='" . $j . "'>";
    $arprice_customization_size = @$arp_coloptionsarr['column_button_options']['button_size'];
    foreach ($arprice_customization_size as $key => $style) {
        $tablestring .= "<li data-value='" . $key . "' data-label='" . $style . "'>" . $style . "</li>";
    }
    $tablestring .= "</ul>";
    $tablestring .= "</dd>";
    $tablestring .= "</dl>";
    $tablestring .= "</div>";
    $tablestring .= "</div>";
}

$tablestring .= "<div class='col_opt_row' id='price_text_other_font_family'>";
$tablestring .= "<div class='col_opt_title_div'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div'>";

$tablestring .= "<input type='hidden' id='price_font_family' name='price_font_family_" . $col_no[1] . "' value='" . $columns['price_font_family'] . "' data-column='main_" . $j . "' />";
$tablestring .= "<dl class='arp_selectbox column_level_dd' data-name='price_font_family_" . $col_no[1] . "' data-id='price_font_family_" . $col_no[1] . "'>";
$tablestring .= "<dt><span>" . $columns['price_font_family'] . "</span><input type='text' style='display:none;' value='" . $columns['price_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
$tablestring .= "<dd>";
$tablestring .= "<ul data-id='price_font_family' data-column='" . $j . "'>";



$tablestring .= "</ul>";
$tablestring .= "</dd>";
$tablestring .= "</dl>";

$tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_price_font_family_preview' href='" . $googlefontpreviewurl . $columns['price_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";

$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "<div class='col_opt_row' id='price_text_other_font_size'>";

$tablestring .= "<div class='btn_type_size'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";

$tablestring .= "<input type='hidden' id='price_font_size' name='price_font_size_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . $columns['price_font_size'] . "' />";
$tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='price_font_size_" . $col_no[1] . "' data-id='price_font_size_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
$tablestring .= "<dt><span>" . $columns['price_font_size'] . "</span><input type='text' style='display:none;' value='" . $columns['price_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
$tablestring .= "<dd>";
$tablestring .= "<ul data-id='price_font_size' data-column='" . $j . "'>";
$size_arr = array();
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

$price_hover_font_color_value = isset($columns['price_hover_font_color']) ? $columns['price_hover_font_color'] : '';
//font color new pos ends
$tablestring .= "</div>";

$tablestring .= "<div class='col_opt_row' id='price_text_other_font_color'>";

$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";

//new font style btns

$tablestring .= "<div class='col_opt_input_div' data-level='pricing_level_options' level-id='pricing_button1'>";

//check selected for bold


if ($columns['price_label_style_bold'] == 'bold') {
    $pricing_style_bold_selected = 'selected';
} else {
    $pricing_style_bold_selected = '';
}

//check selected for italic

if ($columns['price_label_style_italic'] == 'italic') {
    $pricing_style_italic_selected = 'selected';
} else {
    $pricing_style_italic_selected = '';
}

//check selected for underline or line-through

if ($columns['price_label_style_decoration'] == 'underline') {
    $pricing_style_underline_selected = 'selected';
} else {
    $pricing_style_underline_selected = '';
}

if ($columns['price_label_style_decoration'] == 'line-through') {
    $pricing_style_linethrough_selected = 'selected';
} else {
    $pricing_style_linethrough_selected = '';
}



$tablestring .= "<div class='arp_style_btn " . $pricing_style_bold_selected . " arptooltipster' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-align='left' data-column='main_" . $j . "' id='arp_style_bold' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-bold'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $pricing_style_italic_selected . " arptooltipster' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-align='center' data-column='main_" . $j . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-italic'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $pricing_style_underline_selected . " arptooltipster' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-underline'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $pricing_style_linethrough_selected . " arptooltipster' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-strikethrough'></i>";
$tablestring .= "</div>";



$tablestring .= "<input type='hidden' id='price_label_style_bold' name='price_label_style_bold_" . $col_no[1] . "' value='" . $columns['price_label_style_bold'] . "' /> ";
$tablestring .= "<input type='hidden' id='price_label_style_italic' name='price_label_style_italic_" . $col_no[1] . "' value='" . $columns['price_label_style_italic'] . "' /> ";
$tablestring .= "<input type='hidden' id='price_label_style_decoration' name='price_label_style_decoration_" . $col_no[1] . "' value='" . $columns['price_label_style_decoration'] . "' /> ";



$tablestring .= "</div>";

//new font style btn ends

$tablestring .= "</div>";


$tablestring .= "<div class='col_opt_row arp_ok_div' id='pricing_level_other_arp_ok_div__button_1' style='display:none;'>";
$tablestring .= "<div class='col_opt_btn_div'>";
$tablestring .= "<div class='col_opt_navigation_div'>";
$tablestring .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='price_left_arrow' data-column='{$col_no[1]}' data-button-id='pricing_level_options__button_1'></i>&nbsp;";
$tablestring .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='price_right_arrow' data-column='{$col_no[1]}' data-button-id='pricing_level_options__button_1'></i>&nbsp;";
$tablestring .= "</div>";
$tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
$tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='pricing_level_options__button_2' style='display:none;'>";

$tablestring .= "<div class='col_opt_row' id='price_label'>";
$tablestring .= "<div class='col_opt_title_div'>" . __('Label Text', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div'>";
$arp_price_yearly_duration_tab_id = '';
$arp_price_monthly_duration_tab_id = '';
$arp_price_quarterly_duration_tab_id = '';
if ($template_type == 'normal') {
    $col_opt_txtarea_cls = 'col_opt_textarea_big';
    $arp_price_yearly_duration_tab_id = 'price_yearly_duration_tab';
    $arp_price_monthly_duration_tab_id = 'price_monthly_duration_tab';
    $arp_price_quarterly_duration_tab_id = 'price_quarterly_duration_tab';
} else {
    $col_opt_txtarea_cls = '';
    $arp_price_yearly_duration_tab_id = 'price_yearly_label_tab';
    $arp_price_monthly_duration_tab_id = 'price_monthly_label_tab';
    $arp_price_quarterly_duration_tab_id = 'price_quarterly_label_tab';
}


$tablestring .= "<ul class='column_tabs'>";
$tablestring .= "<li class='option_title selected toggle_step_first_tab' id='" . $arp_price_yearly_duration_tab_id . "' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"$arp_price_yearly_duration_tab_id\", \"$arp_price_monthly_duration_tab_id\", \"$arp_price_quarterly_duration_tab_id\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
$tablestring .= "<li class='option_title toggle_step_second_tab' id='" . $arp_price_monthly_duration_tab_id . "' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"$arp_price_monthly_duration_tab_id\", \"$arp_price_yearly_duration_tab_id\", \"$arp_price_quarterly_duration_tab_id\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
$tablestring .= "<li class='option_title toggle_step_third_tab' id='" . $arp_price_quarterly_duration_tab_id . "' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"$arp_price_quarterly_duration_tab_id\", \"$arp_price_monthly_duration_tab_id\", \"$arp_price_yearly_duration_tab_id\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
$tablestring .= "</ul>";
$tablestring .= "<div class='option_tab' id='" . $arp_price_yearly_duration_tab_id . "'>";
//$tablestring .= "<textarea id='price_label_input' name='price_label_" . $col_no[1] . "' class='col_opt_textarea price_text_one_step_only_label_main' data-column='main_" . $j . "' style='max-width:100%;width:100%;margin-bottom:10px;'>";
$tablestring .= $columns['price_label'];
$tablestring .= "</textarea>";

$tablestring .= "</div>";
//start 2 step only label   
if ($template_type == 'normal') {
    $col_opt_txtarea_cls = 'col_opt_textarea_big';
} else {
    $col_opt_txtarea_cls = '';
}
$tablestring .= "<div class='option_tab' id='price_monthly_label_tab' style='display:none;'>";


$tablestring .= "</div>";

//start 3 step only label
if ($template_type == 'normal') {
    $col_opt_txtarea_cls = 'col_opt_textarea_big';
} else {
    $col_opt_txtarea_cls = '';
}
$tablestring .= "<div class='option_tab' id='price_quarterly_label_tab' style='display:none;'>";


$tablestring .= "</div>";

$tablestring .= "</div>";
$tablestring .= "<div class='col_opt_button'>";
$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_2'] = isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_2']) ? $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_2'] : "";
if (is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_2'])) {
    if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_2'])) {
        $tablestring .= "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='add_header_object_" . $col_no[1] . "' id='add_arp_object' data-insert='price_label_input' data-column='main_" . $j . "' title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "'>";
        $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";

        $tablestring .= "</button>";
        $tablestring .= "<label style='float:left;width:10px;'>&nbsp;</label>";
    }
}

$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_2'] = isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_2']) ? $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_2'] : "";
if (is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_2'])) {
    if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_2'])) {

        $tablestring .= "<button type='button' class='col_opt_btn_icon add_header_fontawesome arptooltipster align_left' name='add_header_fontawesome_" . $col_no[1] . "' id='add_header_fontawesome' data-insert='price_label_input' data-column='main_" . $j . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
        $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
        $tablestring .= "</button>";

        $tablestring .= "<div class='arp_font_awesome_model_box_container'>";

        $tablestring .= "</div>";
    }
}

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

$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "<div class='col_opt_row' id='price_label_other_font_family'>";
$tablestring .= "<div class='col_opt_title_div'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div'>";

$tablestring .= "<input type='hidden' id='price_text_font_family' value='" . $columns['price_text_font_family'] . "' name='price_text_font_family_" . $col_no[1] . "' data-column='main_" . $j . "' />";
$tablestring .= "<dl class='arp_selectbox column_level_dd' data-name='price_text_font_family_" . $col_no[1] . "' data-id='price_text_font_family_" . $col_no[1] . "'>";
$tablestring .= "<dt><span>" . $columns['price_text_font_family'] . "</span><input type='text' style='display:none;' value='" . $columns['price_text_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
$tablestring .= "<dd>";
$tablestring .= "<ul data-id='price_text_font_family' data-column='" . $j . "'>";



$tablestring .= "</ul>";
$tablestring .= "</dd>";
$tablestring .= "</dl>";

$tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_price_text_font_family_preview' href='" . $googlefontpreviewurl . $columns['price_text_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";

$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "<div class='col_opt_row' id='price_label_other_font_size'>";

$tablestring .= "<div class='btn_type_size'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";

$tablestring .= "<input type='hidden' id='price_text_font_size' data-column='main_" . $j . "' name='price_text_font_size_" . $col_no[1] . "' value='" . $columns['price_text_font_size'] . "' />";
$tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='price_text_font_size_" . $col_no[1] . "' data-id='price_text_font_size_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
$tablestring .= "<dt><span>" . $columns['price_text_font_size'] . "</span><input type='text' style='display:none;' value='" . $columns['price_text_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
$tablestring .= "<dd>";
$tablestring .= "<ul data-id='price_text_font_size' data-column='" . $j . "'>";
$size_arr = array();
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



$tablestring .= "<div class='btn_type_size'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Color', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";
//$tablestring .= $arprice_form->font_color('price_text_font_color_' . $col_no[1], 'main_' . $j, $columns['price_text_font_color'], 'price_text_font_color', $columns['price_text_font_color']);
$tablestring .= "</div>";
$tablestring .= "</div>";


$price_text_hover_font_color_value = isset($columns['price_text_hover_font_color']) ? $columns['price_text_hover_font_color'] : '';
$tablestring .= "<div class='arp_col_opt_hover_color'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Hover Font Color', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";

$tablestring .= "</div>";
$tablestring .= "</div>";
//font color brn new pos end

$tablestring .= "</div>";

$tablestring .= "<div class='col_opt_row' id='price_label_other_font_color'>";

$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";

//new font style btns

$tablestring .= "<div class='col_opt_input_div' data-level='pricing_level_options' level-id='pricing_button2' >";

//check selected for bold


if ($columns['price_text_style_bold'] == 'bold') {
    $pricing2_style_bold_selected = 'selected';
} else {
    $pricing2_style_bold_selected = '';
}

//check selected for italic

if ($columns['price_text_style_italic'] == 'italic') {
    $pricing2_style_italic_selected = 'selected';
} else {
    $pricing2_style_italic_selected = '';
}

//check selected for underline or line-through

if ($columns['price_text_style_decoration'] == 'underline') {
    $pricing2_style_underline_selected = 'selected';
} else {
    $pricing2_style_underline_selected = '';
}

if ($columns['price_text_style_decoration'] == 'line-through') {
    $pricing2_style_linethrough_selected = 'selected';
} else {
    $pricing2_style_linethrough_selected = '';
}



$tablestring .= "<div class='arp_style_btn " . $pricing2_style_bold_selected . " arptooltipster' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-align='left' data-column='main_" . $j . "' id='arp_style_bold' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-bold'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $pricing2_style_italic_selected . " arptooltipster' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-align='center' data-column='main_" . $j . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-italic'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $pricing2_style_underline_selected . " arptooltipster' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-underline'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $pricing2_style_linethrough_selected . " arptooltipster' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-strikethrough'></i>";
$tablestring .= "</div>";




$tablestring .= "<input type='hidden' id='price_text_style_bold' name='price_text_style_bold_" . $col_no[1] . "' value='" . $columns['price_text_style_bold'] . "' /> ";
$tablestring .= "<input type='hidden' id='price_text_style_italic' name='price_text_style_italic_" . $col_no[1] . "' value='" . $columns['price_text_style_italic'] . "' /> ";
$tablestring .= "<input type='hidden' id='price_text_style_decoration' name='price_text_style_decoration_" . $col_no[1] . "' value='" . $columns['price_text_style_decoration'] . "' /> ";



$tablestring .= "</div>";

//new font style btn ends

$tablestring .= "</div>";


$tablestring .= "<div class='col_opt_row arp_ok_div' id='pricing_level_other_arp_ok_div__button_2' style='display:none;'>";
$tablestring .= "<div class='col_opt_btn_div'>";
$tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
$tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";
$tablestring .= "</div>";


$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='pricing_level_options__button_3' style='display:none;'>";
$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_3'] = isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_3']) ? $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_3'] : "";
if (is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_3'])) {
    if (in_array('column_description', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_3'])) {

        $tablestring .= "<div class='col_opt_row' id='column_description'>";
        $tablestring .= "<div class='col_opt_title_div'>" . __('Column Description', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div'>";
        $tablestring .= "<ul class='column_tabs'>";
        $tablestring .= "<li class='option_title selected toggle_step_first_tab' id='column_description_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"column_description_yearly_tab\", \"column_description_monthly_tab\", \"column_description_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
        $tablestring .= "<li class='option_title toggle_step_second_tab' id='column_description_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"column_description_monthly_tab\", \"column_description_yearly_tab\", \"column_description_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
        $tablestring .= "<li class='option_title toggle_step_third_tab' id='column_description_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"column_description_quarterly_tab\", \"column_description_monthly_tab\", \"column_description_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
        $tablestring .= "</ul>";
        $tablestring .= "<div class='option_tab' id='column_description_yearly_tab'>";
        $tablestring .= "<textarea id='arp_column_description' name='arp_column_description_" . $col_no[1] . "'  class='col_opt_textarea arp_column_description_first' data-column='main_column_" . $col_no[1] . "'>";
        $tablestring .= stripslashes_deep($columns['column_description']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='option_tab' id='column_description_monthly_tab' style='display:none;'>";
        $tablestring .= "<textarea id='arp_column_description_second' name='arp_column_description_second_" . $col_no[1] . "'  class='col_opt_textarea arp_column_description_second' data-column='main_column_" . $col_no[1] . "'>";
        $tablestring .= stripslashes_deep($columns['column_description_second']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='option_tab' id='column_description_quarterly_tab' style='display:none;'>";
        $tablestring .= "<textarea id='arp_column_description_third' name='arp_column_description_third_" . $col_no[1] . "'  class='col_opt_textarea arp_column_description_third' data-column='main_column_" . $col_no[1] . "'>";
        $tablestring .= stripslashes_deep($columns['column_description_third']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='col_opt_button'>";
        if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_3'])) {
            $tablestring .= "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='add_header_object_" . $col_no[1] . "' id='add_arp_object' data-insert='arp_column_description' data-column='main_" . $j . "' title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "'>";
            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";

            $tablestring .= "</button>";
            $tablestring .= "<label style='float:left;width:10px;'>&nbsp;</label>";
        }

        if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['pricing_level_options']['other_columns_buttons']['pricing_level_options__button_3'])) {
            $tablestring .= "<button type='button' class='col_opt_btn_icon add_header_fontawesome arptooltipster align_left' name='add_header_fontawesome_" . $col_no[1] . "' id='add_header_fontawesome' data-insert='arp_column_description' data-column='main_" . $j . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
            $tablestring .= "</button>";

            $tablestring .= "<div class='arp_font_awesome_model_box_container'>";

            $tablestring .= "</div>";
        }

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

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='col_opt_row' id='column_description_other_font_family'>";
        $tablestring .= "<div class='col_opt_title_div'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div'>";

        $tablestring .= "<input type='hidden' id='column_description_font_family' name='column_description_font_family_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . $columns['column_description_font_family'] . "' data-column='main_" . $j . "' />";
        $tablestring .= "<dl class='arp_selectbox column_level_dd' data-name='column_description_font_family_" . $col_no[1] . "' data-id='column_description_font_family_" . $col_no[1] . "'>";
        $tablestring .= "<dt><span>" . $columns['column_description_font_family'] . "</span><input type='text' style='display:none;' value='" . $columns['column_description_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul data-id='column_description_font_family' data-column='" . $j . "'>";





        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_column_description_font_family_preview' href='" . $googlefontpreviewurl . $columns['column_description_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='col_opt_row' id='column_description_other_font_size'>";
        $tablestring .= "<div class='btn_type_size'>";
        $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div two_column'>";

        $tablestring .= "<input type='hidden' id='column_description_font_size' name='column_description_font_size_" . $col_no[1] . "' value='" . $columns['column_description_font_size'] . "' data-column='main_" . $j . "' />";
        $tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='column_description_font_size_" . $col_no[1] . "' data-id='column_description_font_size_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
        $tablestring .= "<dt><span>" . $columns['column_description_font_size'] . "</span><input type='text' style='display:none;' value='" . $columns['column_description_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul data-id='column_description_font_size' data-column='" . $j . "'>";
        $size_arr = array();
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



        $tablestring .= "<div class='btn_type_size'>";
        $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Color', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div two_column'>";
//        $tablestring .= $arprice_form->font_color('column_description_font_color_' . $col_no[1], 'main_' . $j, $columns['column_description_font_color'], 'column_description_font_color', $columns['column_description_font_color']);
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        //font color btn new pos ends
        $column_description_hover_font_color_value = isset($columns['column_description_hover_font_color']) ? $columns['column_description_hover_font_color'] : '';
        $tablestring .= "<div class='arp_col_opt_hover_color'>";
        $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Hover Font Color', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div two_column'>";
//        $tablestring .= $arprice_form->font_color('column_description_hover_font_color_' . $col_no[1], 'main_' . $j, $column_description_hover_font_color_value, 'column_description_hover_font_color', $column_description_hover_font_color_value, 'background_column_picker column_description_hover_font_color', 'general_color_box_background_color');
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "</div>";

        $tablestring .= "<div class='col_opt_row' id='column_description_other_font_color'>";

        $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";

        //new font style btns

        $tablestring .= "<div class='col_opt_input_div' data-level='pricing_level_options' level-id='pricing_button3'>";


        //check selected for bold


        if ($columns['column_description_style_bold'] == 'bold') {
            $pricing3_style_bold_selected = 'selected';
        } else {
            $pricing3_style_bold_selected = '';
        }

        //check selected for italic

        if ($columns['column_description_style_italic'] == 'italic') {
            $pricing3_style_italic_selected = 'selected';
        } else {
            $pricing3_style_italic_selected = '';
        }

        //check selected for underline or line-through

        if ($columns['column_description_style_decoration'] == 'underline') {
            $pricing3_style_underline_selected = 'selected';
        } else {
            $pricing3_style_underline_selected = '';
        }

        if ($columns['column_description_style_decoration'] == 'line-through') {
            $pricing3_style_linethrough_selected = 'selected';
        } else {
            $pricing3_style_linethrough_selected = '';
        }



        $tablestring .= "<div class='arp_style_btn " . $pricing3_style_bold_selected . "  arptooltipster' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-align='left'  data-column='main_" . $j . "' id='arp_style_bold' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $pricing3_style_italic_selected . " arptooltipster' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-align='center' data-column='main_" . $j . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $pricing3_style_underline_selected . " arptooltipster' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $pricing3_style_linethrough_selected . " arptooltipster' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-strikethrough'></i>";
        $tablestring .= "</div>";


        $tablestring .= "<input type='hidden' id='column_description_style_bold' name='column_description_style_bold_" . $col_no[1] . "' value='" . $columns['column_description_style_bold'] . "' /> ";
        $tablestring .= "<input type='hidden' id='column_description_style_italic' name='column_description_style_italic_" . $col_no[1] . "' value='" . $columns['column_description_style_italic'] . "' /> ";
        $tablestring .= "<input type='hidden' id='column_description_style_decoration' name='column_description_style_decoration_" . $col_no[1] . "' value='" . $columns['column_description_style_decoration'] . "' /> ";




        $tablestring .= "</div>";

        //new font style btn ends

        $tablestring .= "</div>";
    }
}



$tablestring .= "<div class='col_opt_row arp_ok_div' id='pricing_level_other_arp_ok_div__button_3' style='display:none;'>";
$tablestring .= "<div class='col_opt_btn_div'>";
$tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
$tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "</div>";

// BODY LEVEL OPTIONS
$tablestring .= "<input type='hidden' id='total_rows' value='" . count(@$columns['rows']) . "' name='total_rows_" . $col_no[1] . "' />";
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

$tablestring .= "<div class='col_opt_row' id='body_li_other_alternate_bgcolor'>";
$tablestring .= "</div>";

$columns['content_odd_hover_color'] = isset($columns['content_odd_hover_color']) ? $columns['content_odd_hover_color'] : '';
$tablestring .= "<div class='col_opt_row' id='body_li_other_alternate_hover_bgcolor' style='height:90px;'>";
$tablestring .= "</div>";

$tablestring .= "<div class='col_opt_row' id='body_li_other_font_family'>";
$tablestring .= "<div class='col_opt_title_div'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div'>";

$tablestring .= "<input type='hidden' id='content_font_family' value='" . $columns['content_font_family'] . "' name='content_font_family_" . $col_no[1] . "' data-column='main_" . $j . "' />";
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

$tablestring .= "<div class='col_opt_row' id='body_li_other_font_size'>";
$tablestring .= "<div class='btn_type_size'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";

$tablestring .= "<input type='hidden' id='content_font_size' name='content_font_size_" . $col_no[1] . "' value='" . $columns['content_font_size'] . "' data-column='main_" . $j . "' />";
$tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='content_font_size_" . $col_no[1] . "' data-id='content_font_size_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
$tablestring .= "<dt><span>" . $columns['content_font_size'] . "</span><input type='text' style='display:none;' value='" . $columns['content_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
$tablestring .= "<dd>";
$tablestring .= "<ul data-id='content_font_size' data-column='" . $j . "'>";
$size_arr = array();
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

$tablestring .= "<div class='col_opt_row' id='body_li_other_font_color' data-level='body_level_options' level-id='bodylevel_button1'>";

$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";

//new font style btns

$tablestring .= "<div class='col_opt_input_div' data-level='body_level_options' level-id='bodylevel_button1' >";

//check selected for bold


if ($columns['body_li_style_bold'] == 'bold') {
    $bodylevel_style_bold_selected = 'selected';
} else {
    $bodylevel_style_bold_selected = '';
}

//check selected for italic

if ($columns['body_li_style_italic'] == 'italic') {
    $bodylevel_style_italic_selected = 'selected';
} else {
    $bodylevel_style_italic_selected = '';
}

//check selected for underline or line-through

if ($columns['body_li_style_decoration'] == 'underline') {
    $bodylevel_style_underline_selected = 'selected';
} else {
    $bodylevel_style_underline_selected = '';
}

if ($columns['body_li_style_decoration'] == 'line-through') {
    $bodylevel_style_linethrough_selected = 'selected';
} else {
    $bodylevel_style_linethrough_selected = '';
}


$tablestring .= "<div class='arp_style_btn " . $bodylevel_style_bold_selected . " arptooltipster' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-align='left' data-column='main_" . $j . "'  id='arp_style_bold' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-bold'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $bodylevel_style_italic_selected . " arptooltipster' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-align='center' data-column='main_" . $j . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-italic'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $bodylevel_style_underline_selected . " arptooltipster' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-underline'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $bodylevel_style_linethrough_selected . " arptooltipster' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-strikethrough'></i>";
$tablestring .= "</div>";


$tablestring .= "<input type='hidden' id='body_li_style_bold' name='body_li_style_bold_" . $col_no[1] . "' value='" . $columns['body_li_style_bold'] . "' /> ";
$tablestring .= "<input type='hidden' id='body_li_style_italic' name='body_li_style_italic_" . $col_no[1] . "' value='" . $columns['body_li_style_italic'] . "' /> ";
$tablestring .= "<input type='hidden' id='body_li_style_decoration' name='body_li_style_decoration_" . $col_no[1] . "' value='" . $columns['body_li_style_decoration'] . "' /> ";




$tablestring .= "</div>";

//new font style btn ends

$tablestring .= "</div>";


$tablestring .= "<div class='col_opt_row arp_ok_div' id='body_level_other_arp_ok_div__button_1' style='display:none;'>";
$tablestring .= "<div class='col_opt_btn_div'>";
$tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
$tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";
$tablestring .= "</div>";


$tablestring .= "</div>";

// BODY LEVEL OPTIONS 2

$tablestring .= "<div class='column_option_div' level-id='body_level_options__button_2' style='display:none;'>";

$tablestring .= "<div class='col_opt_row' id='body_label_other_font_family'>";
$tablestring .= "<div class='col_opt_title_div'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div'>";
$columns['content_label_font_family'] = isset($columns['content_label_font_family']) ? $columns['content_label_font_family'] : "";
$tablestring .= "<input type='hidden' id='content_label_font_family' value='" . $columns['content_label_font_family'] . "' name='content_label_font_family_" . $col_no[1] . "' data-column='main_" . $j . "' />";
$tablestring .= "<dl class='arp_selectbox column_level_dd' data-name='content_label_font_family_" . $col_no[1] . "' data-id='content_label_font_family_" . $col_no[1] . "'>";
$tablestring .= "<dt><span>" . $columns['content_label_font_family'] . "</span><input type='text' style='display:none;' value='" . $columns['content_label_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
$tablestring .= "<dd>";
$tablestring .= "<ul data-id='content_label_font_family' data-column='" . $j . "'>";



$tablestring .= "</ul>";
$tablestring .= "</dd>";
$tablestring .= "</dl>";

$tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_hcontent_label_font_family_preview' href='" . $googlefontpreviewurl . $columns['content_label_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";

$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "<div class='col_opt_row' id='body_label_other_font_size'>";
$tablestring .= "<div class='btn_type_size'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";
$columns['content_label_font_size'] = isset($columns['content_label_font_size']) ? $columns['content_label_font_size'] : "";
$tablestring .= "<input type='hidden' id='content_label_font_size' name='content_label_font_size_" . $col_no[1] . "' value='" . $columns['content_label_font_size'] . "' data-column='main_" . $j . "' />";
$tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='content_label_font_size_" . $col_no[1] . "' data-id='content_label_font_size_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
$tablestring .= "<dt><span>" . $columns['content_label_font_size'] . "</span><input type='text' style='display:none;' value='" . $columns['content_label_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
$tablestring .= "<dd>";
$tablestring .= "<ul data-id='content_label_font_size' data-column='" . $j . "'>";
$size_arr = array();
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




$columns['content_label_font_color'] = isset($columns['content_label_font_color']) ? $columns['content_label_font_color'] : "";
$tablestring .= "<div class='btn_type_size'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Color', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";
//$tablestring .= $arprice_form->font_color('content_label_font_color_' . $col_no[1], 'main_' . $j, $columns['content_label_font_color'], 'content_label_font_color', $columns['content_label_font_color']);
$tablestring .= "</div>";
$tablestring .= "</div>";

$content_label_hover_font_color_value = isset($columns['content_label_hover_font_color']) ? $columns['content_label_hover_font_color'] : '';
$tablestring .= "<div class='arp_col_opt_hover_color'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Hover Font Color', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";
//$tablestring .= $arprice_form->font_color('content_label_hover_font_color_' . $col_no[1], 'main_' . $j, $content_label_hover_font_color_value, 'content_label_hover_font_color', $content_label_hover_font_color_value, 'background_column_picker content_label_hover_font_color', 'general_color_box_background_color');
$tablestring .= "</div>";
$tablestring .= "</div>";


$tablestring .= "</div>";

$tablestring .= "<div class='col_opt_row' id='body_label_other_font_color'>";

$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";



$tablestring .= "<div class='col_opt_input_div' data-level='body_level_options' level-id='bodylevel_button2'>";





if (isset($columns['body_label_style_bold']) && $columns['body_label_style_bold'] == 'bold') {
    $bodylevel2_style_bold_selected = 'selected';
} else {
    $bodylevel2_style_bold_selected = '';
}



if (isset($columns['body_label_style_italic']) && $columns['body_label_style_italic'] == 'italic') {
    $bodylevel2_style_italic_selected = 'selected';
} else {
    $bodylevel2_style_italic_selected = '';
}



if (isset($columns['body_label_style_decoration']) && $columns['body_label_style_decoration'] == 'underline') {
    $bodylevel2_style_underline_selected = 'selected';
} else {
    $bodylevel2_style_underline_selected = '';
}

if (isset($columns['body_label_style_decoration']) && $columns['body_label_style_decoration'] == 'line-through') {
    $bodylevel2_style_linethrough_selected = 'selected';
} else {
    $bodylevel2_style_linethrough_selected = '';
}



$tablestring .= "<div class='arp_style_btn " . $bodylevel2_style_bold_selected . " arptooltipster' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-align='left' data-column='main_" . $j . "' id='arp_style_bold' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-bold'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $bodylevel2_style_italic_selected . " arptooltipster' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-align='center' data-column='main_" . $j . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-italic'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $bodylevel2_style_underline_selected . " arptooltipster' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-underline'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $bodylevel2_style_linethrough_selected . " arptooltipster' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-strikethrough'></i>";
$tablestring .= "</div>";

$columns['body_label_style_bold'] = isset($columns['body_label_style_bold']) ? $columns['body_label_style_bold'] : "";
$tablestring .= "<input type='hidden' id='body_label_style_bold' name='body_label_style_bold_" . $col_no[1] . "' value='" . $columns['body_label_style_bold'] . "' /> ";
$columns['body_label_style_italic'] = isset($columns['body_label_style_italic']) ? $columns['body_label_style_italic'] : "";
$tablestring .= "<input type='hidden' id='body_label_style_italic' name='body_label_style_italic_" . $col_no[1] . "' value='" . $columns['body_label_style_italic'] . "' /> ";
$columns['body_label_style_decoration'] = isset($columns['body_label_style_decoration']) ? $columns['body_label_style_decoration'] : "";
$tablestring .= "<input type='hidden' id='body_label_style_decoration' name='body_label_style_decoration_" . $col_no[1] . "' value='" . $columns['body_label_style_decoration'] . "' /> ";





$tablestring .= "</div>";

//new font style btn ends


$tablestring .= "</div>";



$tablestring .= "<div class='col_opt_row arp_ok_div' id='body_level_other_arp_ok_div__button_2' style='display:none;'>";
$tablestring .= "<div class='col_opt_btn_div'>";
$tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
$tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";
$tablestring .= "</div>";


$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='column_description_level__button_1' style='display:none;'>";

$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_level_options']['other_columns_buttons']['body_level_options__button_3'] = isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_level_options']['other_columns_buttons']['body_level_options__button_3']) ? $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_level_options']['other_columns_buttons']['body_level_options__button_3'] : "";
if (isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['column_description_level']['other_columns_buttons']['column_description_level__button_1']) && is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['column_description_level']['other_columns_buttons']['column_description_level__button_1'])) {
    if (in_array('column_description', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['column_description_level']['other_columns_buttons']['column_description_level__button_1'])) {
        $tablestring .= "<div class='col_opt_row' id='column_description'>";
        $tablestring .= "<div class='col_opt_title_div'>" . __('Column Description', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div'>";
        $tablestring .= "<ul class='column_tabs'>";
        $tablestring .= "<li class='option_title selected toggle_step_first_tab' id='column_description_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"column_description_yearly_tab\", \"column_description_monthly_tab\", \"column_description_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
        $tablestring .= "<li class='option_title toggle_step_second_tab' id='column_description_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"column_description_monthly_tab\", \"column_description_yearly_tab\", \"column_description_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
        $tablestring .= "<li class='option_title toggle_step_third_tab' id='column_description_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"column_description_quarterly_tab\", \"column_description_monthly_tab\", \"column_description_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
        $tablestring .= "</ul>";
        $tablestring .= "<div class='option_tab' id='column_description_yearly_tab'>";
        $tablestring .= "<textarea id='arp_column_description' name='arp_column_description_" . $col_no[1] . "'  class='col_opt_textarea arp_column_description_first' data-column='main_column_" . $col_no[1] . "'>";
        $tablestring .= stripslashes_deep($columns['column_description']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='option_tab' id='column_description_monthly_tab' style='display:none;'>";
        $tablestring .= "<textarea id='arp_column_description_second' name='arp_column_description_second_" . $col_no[1] . "'  class='col_opt_textarea arp_column_description_second' data-column='main_column_" . $col_no[1] . "'>";
        $tablestring .= stripslashes_deep($columns['column_description_second']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='option_tab' id='column_description_quarterly_tab' style='display:none;'>";
        $tablestring .= "<textarea id='arp_column_description_third' name='arp_column_description_third_" . $col_no[1] . "'  class='col_opt_textarea arp_column_description_third' data-column='main_column_" . $col_no[1] . "'>";
        $tablestring .= stripslashes_deep($columns['column_description_third']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='col_opt_button'>";
        if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['column_description_level']['other_columns_buttons']['column_description_level__button_1'])) {
            $tablestring .= "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='add_header_object_" . $col_no[1] . "' id='add_arp_object' data-insert='arp_column_description' data-column='main_" . $j . "' title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "'>";
            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";

            $tablestring .= "</button>";
            $tablestring .= "<label style='float:left;width:10px;'>&nbsp;</label>";
        }

        if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['column_description_level']['other_columns_buttons']['column_description_level__button_1'])) {
            $tablestring .= "<button type='button' class='col_opt_btn_icon add_header_fontawesome arptooltipster align_left' name='add_header_fontawesome_" . $col_no[1] . "' id='add_header_fontawesome' data-insert='arp_column_description' data-column='main_" . $j . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
            $tablestring .= "</button>";

            $tablestring .= "<div class='arp_font_awesome_model_box_container'>";

            $tablestring .= "</div>";
        }

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

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $column_description_text_alignment = isset($columns['description_text_alignment']) ? $columns['description_text_alignment'] : 'center';
        $tablestring .= $arprice_form->arp_create_alignment_div('column_description_text_alignment', $column_description_text_alignment, 'arp_description_text_alignment', $col_no[1], 'column_description_section');

        $tablestring .= "<div class='col_opt_row' id='column_description_other_font_family'>";
        $tablestring .= "<div class='col_opt_title_div'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div'>";

        $tablestring .= "<input type='hidden' id='column_description_font_family' name='column_description_font_family_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . $columns['column_description_font_family'] . "' data-column='main_" . $j . "' />";
        $tablestring .= "<dl class='arp_selectbox column_level_dd' data-name='column_description_font_family_" . $col_no[1] . "' data-id='column_description_font_family_" . $col_no[1] . "'>";
        $tablestring .= "<dt><span>" . $columns['column_description_font_family'] . "</span><input type='text' style='display:none;' value='" . $columns['column_description_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul data-id='column_description_font_family' data-column='" . $j . "'>";



        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_column_description_font_family_preview' href='" . $googlefontpreviewurl . $columns['column_description_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='col_opt_row' id='column_description_other_font_size'>";
        $tablestring .= "<div class='btn_type_size'>";
        $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div two_column'>";

        $tablestring .= "<input type='hidden' id='column_description_font_size' name='column_description_font_size_" . $col_no[1] . "' value='" . $columns['column_description_font_size'] . "' data-column='main_" . $j . "' />";
        $tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='column_description_font_size_" . $col_no[1] . "' data-id='column_description_font_size_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
        $tablestring .= "<dt><span>" . $columns['column_description_font_size'] . "</span><input type='text' style='display:none;' value='" . $columns['column_description_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul data-id='column_description_font_size' data-column='" . $j . "'>";
        $size_arr = array();
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

        $tablestring .= "<div class='col_opt_row' id='column_description_other_font_color'>";

        $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";

        //new font style btns

        $tablestring .= "<div class='col_opt_input_div' data-level='body_level_options' level-id='bodylevel_button3'>";


        //check selected for bold


        if ($columns['column_description_style_bold'] == 'bold') {
            $bodylevel3_style_bold_selected = 'selected';
        } else {
            $bodylevel3_style_bold_selected = '';
        }

        //check selected for italic

        if ($columns['column_description_style_italic'] == 'italic') {
            $bodylevel3_style_italic_selected = 'selected';
        } else {
            $bodylevel3_style_italic_selected = '';
        }

        //check selected for underline or line-through

        if ($columns['column_description_style_decoration'] == 'underline') {
            $bodylevel3_style_underline_selected = 'selected';
        } else {
            $bodylevel3_style_underline_selected = '';
        }

        if ($columns['column_description_style_decoration'] == 'line-through') {
            $bodylevel3_style_linethrough_selected = 'selected';
        } else {
            $bodylevel3_style_linethrough_selected = '';
        }


        $tablestring .= "<div class='arp_style_btn " . $bodylevel3_style_bold_selected . " arptooltipster' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-align='left' data-column='main_" . $j . "' id='arp_style_bold' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $bodylevel3_style_italic_selected . " arptooltipster' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-align='center' data-column='main_" . $j . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $bodylevel3_style_underline_selected . " arptooltipster' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $bodylevel3_style_linethrough_selected . " arptooltipster' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-strikethrough'></i>";
        $tablestring .= "</div>";



        $tablestring .= "<input type='hidden' id='column_description_style_bold' name='column_description_style_bold_" . $col_no[1] . "' value='" . $columns['column_description_style_bold'] . "' /> ";
        $tablestring .= "<input type='hidden' id='column_description_style_italic' name='column_description_style_italic_" . $col_no[1] . "' value='" . $columns['column_description_style_italic'] . "' /> ";
        $tablestring .= "<input type='hidden' id='column_description_style_decoration' name='column_description_style_decoration_" . $col_no[1] . "' value='" . $columns['column_description_style_decoration'] . "' /> ";





        $tablestring .= "</div>";

        //new font style btn ends

        $tablestring .= "</div>";
    }
}

$tablestring .= "<div class='col_opt_row arp_ok_div' id='column_description_level_other_arp_ok_div__button_1' style='display:none;'>";
$tablestring .= "<div class='col_opt_btn_div'>";
$tablestring .= "<div class='col_opt_navigation_div'>";
$tablestring .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='description_left_arrow' data-column='{$col_no[1]}' data-button-id='column_description_level__button_1'></i>&nbsp;";
$tablestring .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='description_right_arrow' data-column='{$col_no[1]}' data-button-id='column_description_level__button_1'></i>&nbsp;";
$tablestring .= "</div>";
$tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
$tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";

$tablestring .= "</div>";

$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='body_level_options__button_3' style='display:none;'>";

$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_level_options']['other_columns_buttons']['body_level_options__button_3'] = isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_level_options']['other_columns_buttons']['body_level_options__button_3']) ? $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_level_options']['other_columns_buttons']['body_level_options__button_3'] : "";
if (is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_level_options']['other_columns_buttons']['body_level_options__button_3'])) {
    if (in_array('column_description', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_level_options']['other_columns_buttons']['body_level_options__button_3'])) {
        $tablestring .= "<div class='col_opt_row' id='column_description'>";
        $tablestring .= "<div class='col_opt_title_div'>" . __('Column Description', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div'>";
        $tablestring .= "<ul class='column_tabs'>";
        $tablestring .= "<li class='option_title selected toggle_step_first_tab' id='column_description_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"column_description_yearly_tab\", \"column_description_monthly_tab\", \"column_description_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
        $tablestring .= "<li class='option_title toggle_step_second_tab' id='column_description_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"column_description_monthly_tab\", \"column_description_yearly_tab\", \"column_description_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
        $tablestring .= "<li class='option_title toggle_step_third_tab' id='column_description_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"column_description_quarterly_tab\", \"column_description_monthly_tab\", \"column_description_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
        $tablestring .= "</ul>";
        $tablestring .= "<div class='option_tab' id='column_description_yearly_tab'>";
        $tablestring .= "<textarea id='arp_column_description' name='arp_column_description_" . $col_no[1] . "'  class='col_opt_textarea arp_column_description_first' data-column='main_column_" . $col_no[1] . "'>";
        $tablestring .= stripslashes_deep($columns['column_description']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='option_tab' id='column_description_monthly_tab' style='display:none;'>";
        $tablestring .= "<textarea id='arp_column_description_second' name='arp_column_description_second_" . $col_no[1] . "'  class='col_opt_textarea arp_column_description_second' data-column='main_column_" . $col_no[1] . "'>";
        $tablestring .= stripslashes_deep($columns['column_description_second']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='option_tab' id='column_description_quarterly_tab' style='display:none;'>";
        $tablestring .= "<textarea id='arp_column_description_third' name='arp_column_description_third_" . $col_no[1] . "'  class='col_opt_textarea arp_column_description_third' data-column='main_column_" . $col_no[1] . "'>";
        $tablestring .= stripslashes_deep($columns['column_description_third']);
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='col_opt_button'>";
        if (in_array('arp_object', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_level_options']['other_columns_buttons']['body_level_options__button_3'])) {
            $tablestring .= "<button type='button' class='col_opt_btn_icon add_arp_object arptooltipster align_left' name='add_header_object_" . $col_no[1] . "' id='add_arp_object' data-insert='arp_column_description' data-column='main_" . $j . "' title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "'>";
            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";

            $tablestring .= "</button>";
            $tablestring .= "<label style='float:left;width:10px;'>&nbsp;</label>";
        }

        if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_level_options']['other_columns_buttons']['body_level_options__button_3'])) {
            $tablestring .= "<button type='button' class='col_opt_btn_icon add_header_fontawesome arptooltipster align_left' name='add_header_fontawesome_" . $col_no[1] . "' id='add_header_fontawesome' data-insert='arp_column_description' data-column='main_" . $j . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
            $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
            $tablestring .= "</button>";

            $tablestring .= "<div class='arp_font_awesome_model_box_container'>";

            $tablestring .= "</div>";
        }

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

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='col_opt_row' id='column_description_other_font_family'>";
        $tablestring .= "<div class='col_opt_title_div'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div'>";

        $tablestring .= "<input type='hidden' id='column_description_font_family' name='column_description_font_family_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . $columns['column_description_font_family'] . "' data-column='main_" . $j . "' />";
        $tablestring .= "<dl class='arp_selectbox column_level_dd' data-name='column_description_font_family_" . $col_no[1] . "' data-id='column_description_font_family_" . $col_no[1] . "'>";
        $tablestring .= "<dt><span>" . $columns['column_description_font_family'] . "</span><input type='text' style='display:none;' value='" . $columns['column_description_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul data-id='column_description_font_family' data-column='" . $j . "'>";



        $tablestring .= "</ul>";
        $tablestring .= "</dd>";
        $tablestring .= "</dl>";

        $tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_column_description_font_family_preview' href='" . $googlefontpreviewurl . $columns['column_description_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='col_opt_row' id='column_description_other_font_size'>";
        $tablestring .= "<div class='btn_type_size'>";
        $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div two_column'>";

        $tablestring .= "<input type='hidden' id='column_description_font_size' name='column_description_font_size_" . $col_no[1] . "' value='" . $columns['column_description_font_size'] . "' data-column='main_" . $j . "' />";
        $tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='column_description_font_size_" . $col_no[1] . "' data-id='column_description_font_size_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
        $tablestring .= "<dt><span>" . $columns['column_description_font_size'] . "</span><input type='text' style='display:none;' value='" . $columns['column_description_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
        $tablestring .= "<dd>";
        $tablestring .= "<ul data-id='column_description_font_size' data-column='" . $j . "'>";
        $size_arr = array();
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



        $tablestring .= "<div class='btn_type_size'>";
        $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Color', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div two_column'>";
//        $tablestring .= $arprice_form->font_color('column_description_font_color_' . $col_no[1], 'main_' . $j, $columns['column_description_font_color'], 'column_description_font_color', $columns['column_description_font_color']);
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $column_description_hover_font_color_value = isset($columns['column_description_hover_font_color']) ? $columns['column_description_hover_font_color'] : '';
        $tablestring .= "<div class='arp_col_opt_hover_color'>";
        $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Hover Font Color', ARP_PT_TXTDOMAIN) . "</div>";
        $tablestring .= "<div class='col_opt_input_div two_column'>";
//        $tablestring .= $arprice_form->font_color('column_description_hover_font_color_' . $col_no[1], 'main_' . $j, $column_description_hover_font_color_value, 'column_description_hover_font_color', $column_description_hover_font_color_value, 'background_column_picker column_description_hover_font_color', 'general_color_box_background_color');
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        //end

        $tablestring .= "</div>";

        $tablestring .= "<div class='col_opt_row' id='column_description_other_font_color'>";

        $tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";

        //new font style btns

        $tablestring .= "<div class='col_opt_input_div' data-level='body_level_options' level-id='bodylevel_button3'>";


        //check selected for bold


        if ($columns['column_description_style_bold'] == 'bold') {
            $bodylevel3_style_bold_selected = 'selected';
        } else {
            $bodylevel3_style_bold_selected = '';
        }

        //check selected for italic

        if ($columns['column_description_style_italic'] == 'italic') {
            $bodylevel3_style_italic_selected = 'selected';
        } else {
            $bodylevel3_style_italic_selected = '';
        }

        //check selected for underline or line-through

        if ($columns['column_description_style_decoration'] == 'underline') {
            $bodylevel3_style_underline_selected = 'selected';
        } else {
            $bodylevel3_style_underline_selected = '';
        }

        if ($columns['column_description_style_decoration'] == 'line-through') {
            $bodylevel3_style_linethrough_selected = 'selected';
        } else {
            $bodylevel3_style_linethrough_selected = '';
        }


        $tablestring .= "<div class='arp_style_btn " . $bodylevel3_style_bold_selected . " arptooltipster' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-align='left' data-column='main_" . $j . "' id='arp_style_bold' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-bold'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $bodylevel3_style_italic_selected . " arptooltipster' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-align='center' data-column='main_" . $j . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-italic'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $bodylevel3_style_underline_selected . " arptooltipster' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-underline'></i>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='arp_style_btn " . $bodylevel3_style_linethrough_selected . " arptooltipster' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
        $tablestring .= "<i class='fa fa-strikethrough'></i>";
        $tablestring .= "</div>";



        $tablestring .= "<input type='hidden' id='column_description_style_bold' name='column_description_style_bold_" . $col_no[1] . "' value='" . $columns['column_description_style_bold'] . "' /> ";
        $tablestring .= "<input type='hidden' id='column_description_style_italic' name='column_description_style_italic_" . $col_no[1] . "' value='" . $columns['column_description_style_italic'] . "' /> ";
        $tablestring .= "<input type='hidden' id='column_description_style_decoration' name='column_description_style_decoration_" . $col_no[1] . "' value='" . $columns['column_description_style_decoration'] . "' /> ";





        $tablestring .= "</div>";

        //new font style btn ends

        $tablestring .= "</div>";
    }
}



$tablestring .= "<div class='col_opt_row arp_ok_div' id='body_level_other_arp_ok_div__button_3' style='display:none;'>";
$tablestring .= "<div class='col_opt_btn_div'>";
$tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
$tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";
$tablestring .= "</div>";



$tablestring .= "</div>";

//$tablestring .= "<div class='column_option_div' level-id='button_options__button_4' style='display:none;'>";
//
//
//
//$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='footer_level_options__button_2' style='display:none;'>";

// BUTTON TEXT
$tablestring .= "<div class='col_opt_row' id='button_text' style='display:none;'>";
$tablestring .= "<div class='col_opt_title_div'>" . __('Button Content', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div'>";

$tablestring .= "<ul class='column_tabs'>";
$tablestring .= "<li class='option_title selected toggle_step_first_tab' id='button_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"button_yearly_tab\", \"button_monthly_tab\", \"button_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
$tablestring .= "<li class='option_title toggle_step_second_tab' id='button_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"button_monthly_tab\", \"button_yearly_tab\", \"button_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
$tablestring .= "<li class='option_title toggle_step_third_tab' id='button_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"button_quarterly_tab\", \"button_monthly_tab\", \"button_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
$tablestring .= "</ul>";

$tablestring .= "<div class='option_tab' id='button_yearly_tab'>";
$tablestring .= "<textarea id='btn_content' data-column='main_" . $j . "' name='btn_content_" . $col_no[1] . "' class='col_opt_textarea btn_content_first'>";
$tablestring .= $columns['button_text'];
$tablestring .= "</textarea>";
$tablestring .= "</div>";
$tablestring .= "<div class='option_tab' id='button_monthly_tab' style='display:none;'>";
$tablestring .= "<textarea id='btn_content_second' data-column='main_" . $j . "' name='btn_content_second_" . $col_no[1] . "' class='col_opt_textarea btn_content_second'>";
$tablestring .= isset($columns['btn_content_second']) ? $columns['btn_content_second'] : '';
$tablestring .= "</textarea>";
$tablestring .= "</div>";
$tablestring .= "<div class='option_tab' id='button_quarterly_tab' style='display:none;'>";
$tablestring .= "<textarea id='btn_content_third' data-column='main_" . $j . "' name='btn_content_third_" . $col_no[1] . "' class='col_opt_textarea btn_content_third'>";
$tablestring .= isset($columns['btn_content_third']) ? $columns['btn_content_third'] : '';
$tablestring .= "</textarea>";

$tablestring .= "</div>";

$tablestring .= "</div>";
$tablestring .= "</div>";


// ADD ICON
$tablestring .= "<div class='col_opt_row' id='add_icon' style='display:none;'>";
$tablestring .= "<div class='col_opt_btn_div'>";
$tablestring .= "<button onclick='add_arp_button_shortcode(this, false);' type='button' class='col_opt_btn_icon align_left arptooltipster' name='add_button_shortcode_" . $col_no[1] . "' id='add_button_shortcode' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "'>";

$tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
$tablestring .= "</button>";

$tablestring .= "<div class='arp_font_awesome_model_box_container'>";

$tablestring .= "</div>";

$tablestring .= "</div>";
$tablestring .= "</div>";



$tablestring .= "<div class='col_opt_row' id='button_size' style='display:none;'>";
// $tablestring .= "<div class='btn_type_size'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Button Width', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";

$tablestring .= "<div class='arp_button_slider' data-column='" . $col_no[1] . "'>";
$tablestring .= "</div>";

$tablestring .= "<input type='hidden' id='button_size_input' name='button_size_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . $columns['button_size'] . "' />";
//$tablestring .= "<input type='hidden' id='button_size_input' name='button_size_" . $col_no[1] . "' data-column='main_" . $j . "' value='60' />";
$tablestring .= "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";
$tablestring .="<div class='arp_slider_float_left'>80px</div><div class='arp_slider_float_right'>200px</div>";
$tablestring .= "</div>";


$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Button Height', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";
$tablestring .= "<div class='arp_button_height_slider' data-column='" . $col_no[1] . "'>";
$tablestring .= "</div>";

$tablestring .= "<input type='hidden' id='button_height_input' name='button_height_" . $col_no[1] . "' data-column='main_" . $j . "' value='" . @$columns['button_height'] . "' />";
//$tablestring .= "<input type='hidden' id='button_height_input' name='button_height_" . $col_no[1] . "' data-column='main_" . $j . "' value='40' />";
$tablestring .= "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";
$tablestring .="<div class='arp_slider_float_left'>30px</div><div class='arp_slider_float_right'>60px</div>";
$tablestring .= "</div>";
$tablestring .= "</div>";


// BUTTON FONT FAMILY
$tablestring .= "<div class='col_opt_row' id='button_other_font_family' style='display:none;'>";
$tablestring .= "<div class='col_opt_title_div'>" . __('Font Family', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div'>";

$tablestring .= "<input type='hidden' id='button_font_family' name='button_font_family_" . $col_no[1] . "' value='" . $columns['button_font_family'] . "' data-column='main_" . $j . "' />";
$tablestring .= "<dl class='arp_selectbox column_level_dd' data-name='button_font_family_" . $col_no[1] . "' data-id='button_font_family_" . $col_no[1] . "'>";
$tablestring .= "<dt><span>" . $columns['button_font_family'] . "</span><input type='text' style='display:none;' value='" . $columns['button_font_family'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
$tablestring .= "<dd>";
$tablestring .= "<ul data-id='button_font_family' data-column='" . $j . "'>";



$tablestring .= "</ul>";
$tablestring .= "</dd>";
$tablestring .= "</dl>";

$tablestring .= "<div class='arp_google_font_preview_note'><a target='_blank'  class='arp_google_font_preview_link' id='arp_button_font_family_preview' href='" . $googlefontpreviewurl . $columns['button_font_family'] . "'>" . __('Font Preview', ARP_PT_TXTDOMAIN) . "</a></div>";

$tablestring .= "</div>";
$tablestring .= "</div>";

// BUTTON FONT SIZE
$tablestring .= "<div class='col_opt_row' id='button_other_font_size' style='display:none;'>";
$tablestring .= "<div class='btn_type_size'>";
$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Size', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column'>";

$tablestring .= "<input type='hidden' id='button_font_size' data-column='main_" . $j . "' name='button_font_size_" . $col_no[1] . "' value='" . $columns['button_font_size'] . "' />";
$tablestring .= "<dl class='arp_selectbox column_level_size_dd' data-name='button_font_size_" . $col_no[1] . "' data-id='button_font_size_" . $col_no[1] . "' style='width:115px;max-width:115px;'>";
$tablestring .= "<dt><span>" . $columns['button_font_size'] . "</span><input type='text' style='display:none;' value='" . $columns['button_font_size'] . "' class='arp_autocomplete' /><i class='fa fa-caret-down fa-lg'></i></dt>";
$tablestring .= "<dd>";
$tablestring .= "<ul data-id='button_font_size' data-column='" . $j . "'>";
$size_arr = array();
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

// BUTTON FONT COLOR
$tablestring .= "<div class='col_opt_row' id='button_other_font_color'>";

$tablestring .= "<div class='col_opt_title_div two_column'>" . __('Font Style', ARP_PT_TXTDOMAIN) . "</div>";

//new font style btns
//check selected for bold


if ($columns['button_style_bold'] == 'bold') {
    $button1_style_bold_selected = 'selected';
} else {
    $button1_style_bold_selected = '';
}

//check selected for italic

if ($columns['button_style_italic'] == 'italic') {
    $button1_style_italic_selected = 'selected';
} else {
    $button1_style_italic_selected = '';
}

//check selected for underline or line-through

if ($columns['button_style_decoration'] == 'underline') {
    $button1_style_underline_selected = 'selected';
} else {
    $button1_style_underline_selected = '';
}

if ($columns['button_style_decoration'] == 'line-through') {
    $button1_style_linethrough_selected = 'selected';
} else {
    $button1_style_linethrough_selected = '';
}


$tablestring .= "<div class='col_opt_input_div' data-level='button_level_options'  level-id='buttonoptions_button1' >";



$tablestring .= "<div class='arp_style_btn " . $button1_style_bold_selected . " arptooltipster' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-align='left' data-column='main_" . $j . "' id='arp_style_bold' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-bold'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $button1_style_italic_selected . " arptooltipster' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-align='center' data-column='main_" . $j . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-italic'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $button1_style_underline_selected . " arptooltipster' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-underline'></i>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_style_btn " . $button1_style_linethrough_selected . " arptooltipster' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
$tablestring .= "<i class='fa fa-strikethrough'></i>";
$tablestring .= "</div>";


$tablestring .= "<input type='hidden' id='button_style_bold' name='button_style_bold_" . $col_no[1] . "' value='" . $columns['button_style_bold'] . "' /> ";
$tablestring .= "<input type='hidden' id='button_style_italic' name='button_style_italic_" . $col_no[1] . "' value='" . $columns['button_style_italic'] . "' /> ";
$tablestring .= "<input type='hidden' id='button_style_decoration' name='button_style_decoration_" . $col_no[1] . "' value='" . $columns['button_style_decoration'] . "' /> ";




$tablestring .= "</div>";

//new font style btn ends

$tablestring .= "</div>";


$tablestring .= "<div class='col_opt_row arp_ok_div' id='button_options_other_arp_ok_div__button_1'>";
$tablestring .= "<div class='col_opt_btn_div'>";
$tablestring .= "<div class='col_opt_navigation_div'>";
$tablestring .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='button_left_arrow' data-column='{$col_no[1]}' data-button-id='footer_level_options__button_2'></i>&nbsp;";
$tablestring .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='button_right_arrow' data-column='{$col_no[1]}' data-button-id='footer_level_options__button_2'></i>&nbsp;";
$tablestring .= "</div>";
$tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
$tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";
$tablestring .= "</div>";



$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='footer_level_options__button_3' style='display:none;'>";

// BUTTON IMAGE
if ($columns['btn_img'] != '') {
    $btn_img_height = $columns['btn_img_height'];
} else {
    $btn_img_height = '';
}
if ($columns['btn_img'] != '') {
    $btn_img_width = $columns['btn_img_width'];
} else {
    $btn_img_width = '';
}
$tablestring .= "<div class='col_opt_row' id='button_image' style='display:none;'>";
$tablestring .= "<div class='col_opt_title_div'>" . __('Button Image url', ARP_PT_TXTDOMAIN) . "</div>";

$tablestring .= "<div class='col_opt_input_div'>";
$tablestring .= "<input type='text' id='btn_img_url' class='col_opt_input arpbtn_img_url' name='btn_img_url_" . $col_no[1] . "' value='" . $columns['btn_img'] . "'>";

$tablestring .= "<button onclick='add_arp_button_scode(this, false);' type='button' class='col_opt_btn_icon align_left arptooltipster' name='add_button_scode_" . $col_no[1] . "' id='add_button_scode' title='" . __('Add Button Image', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Button Image', ARP_PT_TXTDOMAIN) . "'>";
$tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";
$tablestring .= "</button>";

$remove_link = "display:none;";
if ($columns['btn_img'] != '') {
    $remove_link = "";
}

$tablestring .= "<div class='arp_google_font_preview_note' id='arp_remove_btn_image_link' style='$remove_link'>";
$tablestring .= "<a onClick='remove_arp_button_scode(this, false)'  name='remove_button_scode_" . $col_no[1] . "' class='arp_google_font_preview_link' style='cursor:pointer'>";
$tablestring .= __('Remove Image', ARP_PT_TXTDOMAIN);
$tablestring .= "</a>";
$tablestring .= "</div>";

$tablestring .= "<div class='arp_add_image_container add_btn_image_container'>";
$tablestring .= "<div class='arp_add_image_arrow'></div>";
$tablestring .= "<div class='arp_add_img_content'>";

$tablestring .= "<div class='arp_add_img_row'>";

$tablestring .= "<div class='arp_add_img_label'>";
$tablestring .= __('Image URL', ARP_PT_TXTDOMAIN);
$tablestring .= "<span class='arp_model_close_btn' id='add_btn_image_container'><i class='fa fa-times'></i></span>";
$tablestring .= "</div>";
$tablestring .= "<div class='arp_add_img_option'>";
$tablestring .= "<input type='text' value='" . $columns['btn_img'] . "' class='arp_modal_txtbox img' id='arp_btn_image_url' name='rpt_btn_image_url' />";
$tablestring .= "<button id='arp_add_btn_image_link' data-column-id='main_column_" . $col_no[1] . "' data-insert='btn_image' data-id='arp_btn_image_url' type='button' class='arp_modal_add_file_btn'>";
$tablestring .= __('Add File', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";
$tablestring .= "</div>";


$tablestring .= "<div class='arp_add_img_row' style='margin-top:10px;'>";
$tablestring .= "<div class='arp_add_img_label'>";
$tablestring .= '<button type="button" onclick="add_arp_btn_shortcode(0);" class="arp_modal_insert_shortcode_btn" name="rpt_image_btn" id="rpt_image_btn">';
$tablestring .= __('Add', ARP_PT_TXTDOMAIN);
$tablestring .= '</button>';
$tablestring .= '<button type="button" style="display:none;margin-right:10px;" onclick="arp_remove_object();" class="arp_modal_insert_shortcode_btn" name="arp_remove_img_btn" id="arp_remove_img_btn">';
$tablestring .= __('Remove', ARP_PT_TXTDOMAIN);
$tablestring .= '</button>';
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "</div>";

$tablestring .= "<input type='hidden' class='arpbtn_img_height' id='arpbtn_img_height' value='" . $btn_img_height . "' name='button_img_height_" . $col_no[1] . "' />";
$tablestring .= "<input type='hidden' class='arpbtn_img_width' id='arpbtn_img_width' value='" . $btn_img_width . "' name='button_img_width_" . $col_no[1] . "' />";
$tablestring .= "</div>";

$tablestring .= "<div class='col_opt_row arp_ok_div' id='button_options_other_arp_ok_div__button_2' style='display:none;'>";
$tablestring .= "<div class='col_opt_btn_div'>";
$tablestring .= "<div class='col_opt_navigation_div'>";
$tablestring .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='button_left_arrow' data-column='{$col_no[1]}' data-button-id='footer_level_options__button_3'></i>&nbsp;";
$tablestring .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='button_right_arrow' data-column='{$col_no[1]}' data-button-id='footer_level_options__button_3'></i>&nbsp;";
$tablestring .= "</div>";
$tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
$tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='footer_level_options__button_4' style='display:none;'>";

// REDIRECT LINK
$tablestring .= "<div class='col_opt_row' id='redirect_link' style='display:none;'>";
$tablestring .= "<div class='col_opt_title_div'>" . __('Button Link', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div'>";
$columns['button_url'] = isset($columns['button_url']) ? $columns['button_url'] : "#";
$columns['button_url_second'] = isset($columns['button_url_second']) ? $columns['button_url_second'] : "#";
$columns['button_url_third'] = isset($columns['button_url_third']) ? $columns['button_url_third'] : "#";

$tablestring .= "<ul class='column_tabs'>";
$tablestring .= "<li class='option_title selected toggle_step_first_tab' id='button_link_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"button_link_yearly_tab\", \"button_link_monthly_tab\", \"button_link_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
$tablestring .= "<li class='option_title toggle_step_second_tab' id='button_link_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"button_link_monthly_tab\", \"button_link_yearly_tab\", \"button_link_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
$tablestring .= "<li class='option_title toggle_step_third_tab' id='button_link_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"button_link_quarterly_tab\", \"button_link_monthly_tab\", \"button_link_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
$tablestring .= "</ul>";

$tablestring .= "<div class='option_tab' id='button_link_yearly_tab'>";

$tablestring .= "<textarea id='btn_link' data-column='main_" . $j . "' name='btn_link_" . $col_no[1] . "' class='col_opt_textarea btn_link_first'>";
$tablestring .= $columns['button_url'];
$tablestring .= "</textarea>";
$tablestring .= "</div>";
$tablestring .= "<div class='option_tab' id='button_link_monthly_tab' style='display:none;'>";
$tablestring .= "<textarea id='btn_link_second' data-column='main_" . $j . "' name='btn_link_second_" . $col_no[1] . "' class='col_opt_textarea btn_link_second'>";
$tablestring .= $columns['button_url_second'];
$tablestring .= "</textarea>";
$tablestring .= "</div>";
$tablestring .= "<div class='option_tab' id='button_link_quarterly_tab' style='display:none;'>";
$tablestring .= "<textarea id='btn_link_third' data-column='main_" . $j . "' name='btn_link_third_" . $col_no[1] . "' class='col_opt_textarea btn_link_third'>";
$tablestring .= $columns['button_url_third'];
$tablestring .= "</textarea>";
$tablestring .= "</div>";




$tablestring .= "</div>";
$tablestring .= "</div>";



//Paypal Code
$columns['paypal_code'] = isset($columns['paypal_code']) ? $columns['paypal_code'] : "";
$columns['paypal_code_second'] = isset($columns['paypal_code_second']) ? $columns['paypal_code_second'] : "";
$columns['paypal_code_third'] = isset($columns['paypal_code_third']) ? $columns['paypal_code_third'] : "";

$tablestring .= "<div class='col_opt_row' id='external_btn' style='display:none;'>";
$tablestring .= "<div class='col_opt_title_div'>" . __('Embed Script (e.g. PayPal Code)', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div'>";

//$tablestring .= "<textarea class='col_opt_textarea' name='paypal_code_" . $col_no[1] . "' id='arp_paypal_code'>";
//$tablestring .= $columns['paypal_code'];
//$tablestring .= "</textarea>";
$tablestring .= "<ul class='column_tabs'>";
$tablestring .= "<li class='option_title selected toggle_step_first_tab' id='button_embed_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"button_embed_yearly_tab\", \"button_embed_monthly_tab\", \"button_embed_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
$tablestring .= "<li class='option_title toggle_step_second_tab' id='button_embed_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"button_embed_monthly_tab\", \"button_embed_quarterly_tab\", \"button_embed_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
$tablestring .= "<li class='option_title toggle_step_third_tab' id='button_embed_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"button_embed_quarterly_tab\", \"button_embed_monthly_tab\", \"button_embed_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
$tablestring .= "</ul>";
$tablestring .= "<div class='option_tab' id='button_embed_yearly_tab'>";
$tablestring .= "<textarea class='col_opt_textarea' name='paypal_code_" . $col_no[1] . "' id='arp_paypal_code'>";
$tablestring .= $columns['paypal_code'];
$tablestring .= "</textarea>";
$tablestring .= "</div>";

$tablestring .= "<div class='option_tab' id='button_embed_monthly_tab' style='display:none;'>";
$tablestring .= "<textarea class='col_opt_textarea' name='paypal_code_second_" . $col_no[1] . "' id='arp_paypal_code_second'>";
$tablestring .= $columns['paypal_code_second'];
$tablestring .= "</textarea>";
$tablestring .= "</div>";

$tablestring .= "<div class='option_tab' id='button_embed_quarterly_tab' style='display:none;'>";
$tablestring .= "<textarea class='col_opt_textarea' name='paypal_code_third_" . $col_no[1] . "' id='arp_paypal_code_third'>";
$tablestring .= $columns['paypal_code_third'];
$tablestring .= "</textarea>";
$tablestring .= "</div>";

$tablestring .= "</div>";
$tablestring .= "</div>";

//hide default button
$tablestring .= "<div class='col_opt_row' id='hide_default_btn' style='display:none;'>";
$tablestring .= "<div class='col_opt_title_div two_column more_size'>" . __('Hide default button', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column small_size'>";
$tablestring .= "<div class='arp_checkbox_div'>";
if (@$columns['hide_default_btn'] == 1)
    $hide_default_btn = 'checked="checked"';
else
    $hide_default_btn = '';

$tablestring .= "<input type='checkbox' class='arp_checkbox dark_bg' " . $hide_default_btn . " id='arp_hide_default_btn' value='1' name='arp_hide_default_btn_" . $col_no[1] . "' />";
$tablestring .= "<label class='arp_checkbox_label' data-for='arp_hide_default_btn'>" . __('Yes', ARP_PT_TXTDOMAIN) . "</label>";

$tablestring .= "</div>";
$tablestring .= "</div>";
$tablestring .= "</div>";
//hide default button
// OPEN IN NEW tab
$tablestring .= "<div class='col_opt_row' id='open_in_new_window' style='display:none;'>";
$tablestring .= "<div class='col_opt_title_div two_column more_size'>" . __('Open in New Tab?', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column small_size'>";
$tablestring .= "<div class='arp_checkbox_div'>";
if ($columns['is_new_window'] == 1)
    $new_window = 'checked="checked"';
else
    $new_window = '';

$tablestring .= "<input type='checkbox' class='arp_checkbox dark_bg' " . $new_window . " id='new_window' value='1' name='new_window_" . $col_no[1] . "' />";
$tablestring .= "<label class='arp_checkbox_label' data-for='new_window'>" . __('Yes', ARP_PT_TXTDOMAIN) . "</label>";

$tablestring .= "</div>";
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "<div class='col_opt_row' id='open_in_new_window_actual' style='display:none;'>";
$tablestring .= "<div class='col_opt_title_div two_column more_size'>" . __('Open in New Window?', ARP_PT_TXTDOMAIN) . "</div>";
$tablestring .= "<div class='col_opt_input_div two_column small_size'>";
$tablestring .= "<div class='arp_checkbox_div'>";
if (@$columns['is_new_window_actual'] == 1)
    $new_window = 'checked="checked"';
else
    $new_window = '';

$tablestring .= "<input type='checkbox' class='arp_checkbox dark_bg' " . $new_window . " id='new_window_actual' value='1' name='new_window_actual_" . $col_no[1] . "' />";
$tablestring .= "<label class='arp_checkbox_label' data-for='new_window_actual'>" . __('Yes', ARP_PT_TXTDOMAIN) . "</label>";

$tablestring .= "</div>";
$tablestring .= "</div>";
$tablestring .= "</div>";



$tablestring .= "<div class='col_opt_row arp_ok_div' id='button_options_other_arp_ok_div__button_3' style='display:none;'>";
$tablestring .= "<div class='col_opt_btn_div'>";
$tablestring .= "<div class='col_opt_navigation_div'>";
$tablestring .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='button_left_arrow' data-column='{$col_no[1]}' data-button-id='footer_level_options__button_4'></i>&nbsp;";
$tablestring .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='button_right_arrow' data-column='{$col_no[1]}' data-button-id='footer_level_options__button_4'></i>&nbsp;";
$tablestring .= "</div>";
$tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
$tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
$tablestring .= "</button>";
$tablestring .= "</div>";
$tablestring .= "</div>";

$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='body_li_level_options__button_1' style='display:none;'>";
if (is_array(@$columns['rows']) && !empty($columns['rows'])) {
    foreach ($columns['rows'] as $n => $row) {
        $row_no = explode('_', $n);
        $splitedid = explode('_', $n);


        $tablestring .= "<div id='arp_" . $n . "' class='arp_row_wrapper' style='display:none;'>";

        if (in_array('label', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_1'])) {


            $tablestring .= "<div class='col_opt_row arp_" . $n . "' id='label" . $splitedid[1] . "'>";
            $tablestring .= "<div class='col_opt_title_div'>" . __('Label', ARP_PT_TXTDOMAIN) . "</div>";
            $tablestring .= "<div class='col_opt_input_div'>";
            $tablestring .= "<ul class='column_tabs'>";
            $tablestring .= "<li class='option_title selected toggle_step_first_tab' id='description_label_yearly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"description_label_yearly_tab\", \"description_label_monthly_tab\", \"description_label_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_yearly']) . "</li>";
            $tablestring .= "<li class='option_title toggle_step_second_tab' id='description_label_monthly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"description_label_monthly_tab\", \"description_label_yearly_tab\", \"description_label_quarterly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_monthly']) . "</li>";
            $tablestring .= "<li class='option_title toggle_step_third_tab' id='description_label_quarterly_tab' data-column='" . $col_no[1] . "' onClick='arp_toggle_tabs_select(\"description_label_quarterly_tab\", \"description_label_monthly_tab\", \"description_label_yearly_tab\", \"$col_no[1]\")'>" . stripslashes_deep($general_option['general_settings']['togglestep_quarterly']) . "</li>";
            $tablestring .= "</ul>";

            $tablestring .= "<div class='option_tab' id='description_label_yearly_tab'>";
            $tablestring .= "<textarea id='label' class='col_opt_textarea row_label_first' name='row_" . $col_no[1] . "_label_" . $row_no[1] . "'>";
            $tablestring .= stripslashes_deep($row['row_label']);
            $tablestring .= "</textarea>";
            $tablestring .= "</div>";
            $tablestring .= "<div class='option_tab' id='description_label_monthly_tab' style='display:none;'>";
            $tablestring .= "<textarea id='label_second' class='col_opt_textarea row_label_second' name='row_" . $col_no[1] . "_label_second_" . $row_no[1] . "'>";
            $tablestring .= stripslashes_deep($row['row_label_second']);
            $tablestring .= "</textarea>";
            $tablestring .= "</div>";
            $tablestring .= "<div class='option_tab' id='description_label_quarterly_tab' style='display:none;'>";
            $tablestring .= "<textarea id='label_third' class='col_opt_textarea row_label_third' name='row_" . $col_no[1] . "_label_third_" . $row_no[1] . "'>";
            $tablestring .= stripslashes_deep($row['row_label_third']);
            $tablestring .= "</textarea>";
            $tablestring .= "</div>";
            if ($row['row_caption_style_bold'] == 'bold') {
                $bodylevel_li_style_bold_selected = 'selected';
            } else {
                $bodylevel_li_style_bold_selected = '';
            }

            //check selected for italic

            if ($row['row_caption_style_italic'] == 'italic') {
                $bodylevel_li_style_italic_selected = 'selected';
            } else {
                $bodylevel_li_style_italic_selected = '';
            }

            //check selected for underline or line-through

            if ($row['row_caption_style_decoration'] == 'underline') {
                $bodylevel_li_style_underline_selected = 'selected';
            } else {
                $bodylevel_li_style_underline_selected = '';
            }

            if ($row['row_caption_style_decoration'] == 'line-through') {
                $bodylevel_li_style_linethrough_selected = 'selected';
            } else {
                $bodylevel_li_style_linethrough_selected = '';
            }


            $tablestring .= "<div data-level='body_li_level_options_caption' style='margin-top:2px;'>";
            $tablestring .= "<div class='arp_style_btn " . $bodylevel_li_style_bold_selected . " arptooltipster' title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Bold', ARP_PT_TXTDOMAIN) . "' data-align='left' data-column='main_" . $j . "' data-row='arp_row_" . $row_no[1] . "' id='arp_style_bold' data-id='" . $col_no[1] . "'>";
            $tablestring .= "<i class='fa fa-bold'></i>";
            $tablestring .= "</div>";

            $tablestring .= "<div class='arp_style_btn " . $bodylevel_li_style_italic_selected . " arptooltipster' title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Italic', ARP_PT_TXTDOMAIN) . "' data-align='center' data-column='main_" . $j . "' data-row='arp_row_" . $row_no[1] . "' id='arp_style_italic' data-id='" . $col_no[1] . "'>";
            $tablestring .= "<i class='fa fa-italic'></i>";
            $tablestring .= "</div>";

            $tablestring .= "<div class='arp_style_btn " . $bodylevel_li_style_underline_selected . " arptooltipster' title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Underline', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' data-row='arp_row_" . $row_no[1] . "' id='arp_style_underline' data-id='" . $col_no[1] . "'>";
            $tablestring .= "<i class='fa fa-underline'></i>";
            $tablestring .= "</div>";

            $tablestring .= "<div class='arp_style_btn " . $bodylevel_li_style_linethrough_selected . " arptooltipster' title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Line-through', ARP_PT_TXTDOMAIN) . "' data-align='right' data-column='main_" . $j . "' data-row='arp_row_" . $row_no[1] . "' id='arp_style_strike' data-id='" . $col_no[1] . "'>";
            $tablestring .= "<i class='fa fa-strikethrough'></i>";
            $tablestring .= "</div>";

            $tablestring .= "</div>";
            $tablestring .= "<input type='hidden' id='body_li_style_bold_caption' name='body_li_style_bold_caption_column_" . $col_no[1] . "_arp_row_" . $row_no[1] . "' value='" . $row['row_caption_style_bold'] . "' /> ";
            $tablestring .= "<input type='hidden' id='body_li_style_italic_caption' name='body_li_style_italic_caption_column_" . $col_no[1] . "_arp_row_" . $row_no[1] . "' value='" . $row['row_caption_style_italic'] . "' /> ";
            $tablestring .= "<input type='hidden' id='body_li_style_decoration_caption' name='body_li_style_decoration_caption_column_" . $col_no[1] . "_arp_row_" . $row_no[1] . "' value='" . $row['row_caption_style_decoration'] . "' /> ";



            $tablestring .= "</div>";
            $tablestring .= "</div>";


            if (is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_1'])) {

                if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_1'])) {
                    $tablestring .= "<div class='col_opt_row arp_" . $n . "' id='body_tooltip_add_shortcode" . $splitedid[1] . "' >";
                    $tablestring .= "<div class='col_opt_btn_div'>";
                    $tablestring .= "<button type='button' class='col_opt_btn_icon align_left arptooltipster arp_add_label_shortcode' id='arp_add_label_shortcode' name='row_" . $col_no[1] . "_add_tooltip_shortcode_btn_" . $row_no[1] . "' col-id=" . $col_no[1] . " data-id='" . $col_no[1] . "' data-row-id='label_" . $splitedid[1] . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
                    
                    $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
                    $tablestring .= "</button>";

                    $tablestring .= "<div class='arp_font_awesome_model_box_container'>";

                    $tablestring .= "</div>";

                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                }
            }
        }



        $tablestring .= "<div class='col_opt_row arp_" . $n . "' id='description" . $splitedid[1] . "'>";
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
        $tablestring .= stripslashes_deep(isset($row['row_description_second']) ? $row['row_description_second'] : '');
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='option_tab' id='description_quarterly_tab' style='display:none;'>";
        $tablestring .= "<textarea id='row_description_third' col-id=" . $col_no[1] . " class='col_opt_textarea row_description_third' name='row_" . $col_no[1] . "_description_third_" . $row_no[1] . "'>";
        $tablestring .= stripslashes_deep(isset($row['row_description_third']) ? $row['row_description_third'] : '');
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";

        $tablestring .= "</div>";
        $tablestring .= "</div>";


        $tablestring .= "<div class='col_opt_row arp_" . $n . "' id='body_li_add_shortcode" . $splitedid[1] . "' >";
        $tablestring .= "<div class='col_opt_btn_div'>";
        $tablestring .= "<button type='button' class='col_opt_btn_icon arp_add_row_object arptooltipster align_left' name='" . $col_no[1] . "_add_body_li_object_" . $row_no[1] . "' id='arp_add_row_object' data-insert='arp_" . $n . " textarea#arp_li_description' data-column='main_" . $j . "' title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Media', ARP_PT_TXTDOMAIN) . "'>";
        $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/image-icon.png' />";
        $tablestring .= "</button>";
        $tablestring .= "<label style='float:left;width:10px;'>&nbsp;</label>";


        $tablestring .= "<button type='button' class='col_opt_btn_icon align_left arptooltipster arp_add_row_shortcode' id='arp_add_row_shortcode' name='row_" . $col_no[1] . "_add_description_shortcode_btn_" . $row_no[1] . "' col-id=" . $col_no[1] . " data-id='" . $col_no[1] . "' data-row-id='' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
        $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
        $tablestring .= "</button>";

        $tablestring .= "<div class='arp_font_awesome_model_box_container'>";

        $tablestring .= "</div>";

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

        $tablestring .= "</div>";
        $tablestring .= "</div>";
        //    echo '<pre>';    
//    print_R($row);
//    echo '</pre>';

        $tablestring .= "<div class='col_opt_row arp_" . $n . "' id='row_level_custom_css" . $splitedid[1] . "'>";
        $row_inline_script_old = isset($row['row_custom_css']) ? $row['row_custom_css'] : '';
        $row_inline_script_old = trim($row_inline_script_old);
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
        $tablestring .= "<style id=arp_row_css_column_" . $col_no[1] . "_row_" . $row_no[1] . " class='arp_row_custom_css'>";
        $tablestring .= " #ArpPricingTableColumns .ArpPricingTableColumnWrapper.no_transition.style_column_" . $col_no[1] . " ul.arp_opt_options li#arp_row_" . $row_no[1] . "{" . $row_inline_script;
        $tablestring .= "}</style>";
        $tablestring .= "<div class='col_opt_title_div'>" . __('Custom Css', ARP_PT_TXTDOMAIN) . "</div>";
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
        $tablestring .= "<div class='arp_row_custom_css' data-code='font-size:20px;' style='width:24%;'>font-size</div>";
        $tablestring .= "<div class='arp_row_custom_css' data-code='text-align:center;' style='width:25%;'>alignment</div>";
        $tablestring .= "<div class='arp_row_custom_css' data-code='font-weight:bold;'>font-weight</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "<div class='col_opt_row arp_ok_div arp_" . $n . "' id='body_li_level_other_arp_ok_div__button_1" . $splitedid[1] . "' >";
        $tablestring .= "<div class='col_opt_btn_div'>";
        $tablestring .= "<div class='col_opt_navigation_div'>";
        $tablestring .= "<i class='typcn typcn-arrow-up arp_navigation_arrow' id='row_up_arrow' data-column='{$col_no[1]}' data-row-id='arp_{$n}' data-button-id='body_li_level_options__button_1'></i>&nbsp;";
        $tablestring .= "<i class='typcn typcn-arrow-down arp_navigation_arrow' id='row_down_arrow' data-column='{$col_no[1]}' data-row-id='arp_{$n}' data-button-id='body_li_level_options__button_1'></i>&nbsp;";
        $tablestring .= "<i class='typcn typcn-arrow-left arp_navigation_arrow' id='row_left_arrow' data-column='{$col_no[1]}' data-row-id='arp_{$n}' data-button-id='body_li_level_options__button_1'></i>&nbsp;";
        $tablestring .= "<i class='typcn typcn-arrow-right arp_navigation_arrow' id='row_right_arrow' data-column='{$col_no[1]}' data-row-id='arp_{$n}' data-button-id='body_li_level_options__button_1'></i>&nbsp;";
        $tablestring .= "</div>";
        $tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
        $tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
        $tablestring .= "</button>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        $tablestring .= "</div>";
    }
}
$tablestring .= "</div>";


$tablestring .= "<div class='column_option_div' level-id='body_li_level_options__button_2' style='display:none;'>";
if (is_array(@$columns['rows'])) {
    foreach ($columns['rows'] as $n => $row) {
        $row_no = explode('_', $n);
        $splitedid = explode('_', $n);

        $tablestring .= "<div class='arp_tooltip_wrapper' id='arp_" . $n . "' style='display:none;'>";
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
        $tablestring .= stripslashes_deep(isset($row['row_tooltip_second']) ? $row['row_tooltip_second'] : '');
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "<div class='option_tab' id='tooltip_quarterly_tab' style='display:none;'>";
        $tablestring .= "<textarea id='arp_li_tooltip_third' col-id=" . $col_no[1] . " class='col_opt_textarea row_tooltip_third' name='row_" . $col_no[1] . "_tooltip_third_" . $row_no[1] . "'>";
        $tablestring .= stripslashes_deep(isset($row['row_tooltip_third']) ? $row['row_tooltip_third'] : '');
        $tablestring .= "</textarea>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";
        $tablestring .= "</div>";

        if (is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_2'])) {

            if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_2'])) {
                $tablestring .= "<div class='col_opt_row arp_" . $n . "' id='body_tooltip_add_shortcode" . $splitedid[1] . "' >";
                $tablestring .= "<div class='col_opt_btn_div'>";
                $tablestring .= "<button type='button' class='col_opt_btn_icon align_left arptooltipster arp_add_tooltip_shortcode' id='arp_add_tooltip_shortcode' name='row_" . $col_no[1] . "_add_tooltip_shortcode_btn_" . $row_no[1] . "' col-id=" . $col_no[1] . " data-id='" . $col_no[1] . "' data-row-id='tooltip_" . $splitedid[1] . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
                
                $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
                $tablestring .= "</button>";

                $tablestring .= "<div class='arp_font_awesome_model_box_container'>";

                $tablestring .= "</div>";

                $tablestring .= "</div>";
                $tablestring .= "</div>";
            }
        }

        $tablestring .= "<div class='col_opt_row arp_ok_div arp_" . $n . "' id='body_li_level_other_arp_ok_div__button_2" . $splitedid[1] . "'  >";
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
}
$tablestring .= "</div>";

$tablestring .= "<div class='column_option_div' level-id='body_li_level_options__button_3' style='display:none;'>";
if (isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_3']) && @is_array(@$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_3'])) {
    if (@in_array('label', @$arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_3'])) {

        foreach ($columns['rows'] as $n => $row) {
            $row_no = explode('_', $n);
            $splitedid = explode('_', $n);

            $tablestring .= "<div class='arp_row_label_wrapper' id='arp_" . $n . "' style='display:none;'>";
            $tablestring .= "<div class='col_opt_row arp_" . $n . "' id='label" . $splitedid[1] . "'>";
            $tablestring .= "<div class='col_opt_title_div'>" . __('Label', ARP_PT_TXTDOMAIN) . "</div>";
            $tablestring .= "<div class='col_opt_input_div'>";
            $tablestring .= "<textarea id='label' class='col_opt_textarea' name='row_" . $col_no[1] . "_label_" . $row_no[1] . "'>";
            $tablestring .= stripslashes_deep($row['row_label']);
            $tablestring .= "</textarea>";
            $tablestring .= "</div>";
            $tablestring .= "</div>";


            $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_3'] = isset($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_3']) ? $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_3'] : "";
            if (is_array($arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_3'])) {

                if (in_array('arp_fontawesome', $arp_tempbuttonsarr['template_button_options']['features'][$ref_template]['body_li_level_options']['other_columns_buttons']['body_li_level_options__button_3'])) {
                    $tablestring .= "<div class='col_opt_row arp_" . $n . "' id='body_tooltip_add_shortcode" . $splitedid[1] . "' >";
                    $tablestring .= "<div class='col_opt_btn_div'>";
                    $tablestring .= "<button type='button' class='col_opt_btn arptooltipster arp_add_label_shortcode' id='arp_add_label_shortcode' name='row_" . $col_no[1] . "_add_tooltip_shortcode_btn_" . $row_no[1] . "' col-id=" . $col_no[1] . " data-id='" . $col_no[1] . "' data-row-id='label_" . $splitedid[1] . "' title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' data-title='" . __('Add Font Icon', ARP_PT_TXTDOMAIN) . "' >";
                    
                    $tablestring .= "<img src='" . PRICINGTABLE_IMAGES_URL . "/icons/font-awesome-icon.png' />";
                    $tablestring .= "</button>";

                    $tablestring .= "<div class='arp_font_awesome_model_box_container'>";

                    $tablestring .= "</div>";

                    $tablestring .= "</div>";
                    $tablestring .= "</div>";
                }
            }


            $tablestring .= "<div class='col_opt_row arp_ok_div arp_" . $n . "' id='body_li_level_other_arp_ok_div__button_3" . $splitedid[1] . "'>";
            $tablestring .= "<div class='col_opt_btn_div'>";
            $tablestring .= "<button type='button' id='arp_ok_btn' class='col_opt_btn arp_ok_btn' >";
            $tablestring .= __('Ok', ARP_PT_TXTDOMAIN);
            $tablestring .= "</button>";
            $tablestring .= "</div>";
            $tablestring .= "</div>";

            $tablestring .= "</div>";
        }
    }
}
$tablestring .= "</div>";
$tablestring .= "</div>";
$tablestring .= "</div>";
?>