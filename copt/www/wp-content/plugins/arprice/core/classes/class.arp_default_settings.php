<?php

/**
 * Plugin : ARPrice
 * Description : Ultimate Wordpress Pricing Table Plugin.
 * @Package : ARPRice
 */
class arp_default_settings {

    function __construct() {

        add_action('wp_ajax_arprice_default_template_skins', array(&$this, 'arprice_get_template_skins'));

        add_filter('arprice_default_template_skins_filter', array(&$this, 'arp_change_default_template_skins'), 10, 2);
    }

    function arp_section_background_color() {

        $arp_sec_bg_color = apply_filters('arp_section_bg_color', array(
            'arptemplate_1' => array(
                'css' => array(
                    '.arppricetablecolumntitle' => array(
                        'background' => '{arp_header_background_color_input}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.arppricetablecolumnprice' => array(
                        'background' => '{arp_pricing_background_color_input}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.arpcolumnfooter' => array(
                        'background' => '{arp_footer_background_color_input}'
                    ),
                    'li.arp_odd_row' => array(
                        'background' => '{arp_body_odd_row_background_color}',
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'background' => '{arp_body_even_row_background_color}',
                        'color' => '{arp_body_even_font_color}'
                    ),
                    '.arp_footer_content' => array(
                        'color' => '{arp_footer_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#header_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_background_color_input}'
                    ),
                    'input#header_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_bg_custom_hover_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#price_background_color_{col_id}___0' => array(
                        'value' => '{arp_pricing_background_color_input}',
                    ),
                    'input#price_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_price_bg_custom_hover_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}',
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#footer_background_color_{col_id}___0' => array(
                        'value' => '{arp_footer_background_color_input}'
                    ),
                    'input#footer_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_footer_bg_custom_hover_color}'
                    ),
                    'input#footer_level_options_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_font_color}'
                    ),
                    'input#footer_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_hover_font_color}'
                    ),
                    'input#content_even_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_background_color}'
                    ),
                    'input#content_odd_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_background_color}'
                    ),
                    'input#content_even_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_hover_background_color}'
                    ),
                    'input#content_odd_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_hover_background_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                )
            ),
            'arptemplate_2' => array(
                'css' => array(
                    '.arp_column_content_wrapper' => array(
                        'background-color' => '{arp_column_background_color_input}',
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    'li.arp_odd_row' => array(
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'color' => '{arp_body_even_font_color}'
                    ),
                    '.arp_footer_content' => array(
                        'color' => '{arp_footer_font_color}'
                    ),
                    '.rounded_corder' => array(
                        'background' => '{arp_shortcode_background_color_input}',
                        'border-color' => '{arp_shortcode_background_color_input}'
                    ),
                    '.rounded_corder i' => array(
                        'color' => '{arp_shortcode_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}',
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#column_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_background_color_input}'
                    ),
                    'input#column_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_bg_custom_hover_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
//                    'input#price_text_font_color_{col_id}___0' => array(
//                        'value' => '{arp_price_duration_color_input}'
//                    ),
//                    'input#price_text_hover_font_color_{col_id}___0' => array(
//                        'value' => '{arp_price_duration_hover_font_color}'
//                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#footer_level_options_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_font_color}'
                    ),
                    'input#footer_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_hover_font_color}'
                    ),
                    'input#shortcode_background_color_{col_id}___0' => array(
                        'value' => '{arp_shortcode_background_color_input}'
                    ),
                    'input#shortcode_font_color_{col_id}___0' => array(
                        'value' => '{arp_shortcode_font_color}'
                    ),
                    'input#shortcode_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_shortcode_hover_background_color_input}'
                    ),
                    'input#shortcode_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_shortcode_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_3' => array(
                'css' => array(
                    '#column_header' => array(
                        'background' => '{arp_header_background_color_input}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.column_description' => array(
                        'background' => '{arp_desc_background_color_input}',
                        'color' => '{arp_desc_font_color}'
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.arppricetablecolumnprice' => array(
                        'background' => '{arp_pricing_background_color_input}'
                    ),
                    'li.arp_odd_row' => array(
                        'background' => '{arp_body_odd_row_background_color}',
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'background' => '{arp_body_even_row_background_color}',
                        'color' => '{arp_body_even_font_color}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    '.arp_footer_content' => array(
                        'color' => '{arp_footer_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#header_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_background_color_input}'
                    ),
                    'input#header_background_color_{col_id}___1' => array(
                        'value' => '{arp_header_background_color_input}'
                    ),
                    'input#header_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_bg_custom_hover_color}'
                    ),
                    'input#price_background_color_{col_id}___0' => array(
                        'value' => '{arp_pricing_background_color_input}'
                    ),
                    'input#price_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_price_bg_custom_hover_color}'
                    ),
                    'input#column_desc_background_color_{col_id}___0' => array(
                        'value' => '{arp_desc_background_color_input}'
                    ),
                    'input#column_desc_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_desc_bg_custom_hover_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#footer_background_color_{col_id}___0' => array(
                        'value' => '{arp_footer_background_color_input}'
                    ),
                    'input#footer_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_footer_bg_custom_hover_color}'
                    ),
                    'input#content_even_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_background_color}'
                    ),
                    'input#content_odd_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_background_color}'
                    ),
                    'input#content_even_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_hover_background_color}'
                    ),
                    'input#content_odd_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_hover_background_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#price_text_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_color_input}'
                    ),
                    'input#price_text_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_hover_font_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#footer_level_options_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_font_color}'
                    ),
                    'input#footer_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_hover_font_color}'
                    ),
                    'input#column_description_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_font_color}'
                    ),
                    'input#column_description_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_4' => array(
                'css' => array(
                    '.arpcolumnheader' => array(
                        'background' => '{arp_header_background_color_input}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.arpcolumnfooter' => array(
                        'background' => '{arp_footer_background_color_input}'
                    ),
                    '.arp_footer_content' => array(
                        'color' => '{arp_footer_font_color}'
                    ),
                    'li.arp_odd_row' => array(
                        'background' => '{arp_body_odd_row_background_color}',
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'background' => '{arp_body_even_row_background_color}',
                        'color' => '{arp_body_even_font_color}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    '.arp_price_wrapper i' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    '.rounded_corder' => array(
                        'background' => '{arp_shortcode_background_color_input}',
                        'border-color' => '{arp_shortcode_background_color_input}'
                    ),
                ),
                'attribute' => array(
                    'input#header_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_background_color_input}'
                    ),
                    'input#header_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_bg_custom_hover_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#footer_background_color_{col_id}___0' => array(
                        'value' => '{arp_footer_background_color_input}'
                    ),
                    'input#footer_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_footer_bg_custom_hover_color}'
                    ),
                    'input#footer_level_options_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_font_color}'
                    ),
                    'input#footer_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_hover_font_color}'
                    ),
                    'input#content_even_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_background_color}'
                    ),
                    'input#content_odd_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_background_color}'
                    ),
                    'input#content_even_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_hover_background_color}'
                    ),
                    'input#content_odd_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_hover_background_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#price_text_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_color_input}'
                    ),
                    'input#price_text_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_hover_font_color}'
                    ),
                    'input#price_background_color_{col_id}___0' => array(
                        'value' => '{arp_pricing_background_color_input}'
                    ),
                    'input#price_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_price_bg_custom_hover_color}'
                    ),
                ),
            ),
            'arptemplate_5' => array(
                'css' => array(
                    '.arpcolumnheader' => array(
                        'background' => '{arp_header_background_color_input}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.arppricetablecolumnprice' => array(
                        'background' => '{arp_pricing_background_color_input}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    'li.arp_odd_row' => array(
                        'background' => '{arp_body_odd_row_background_color}',
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'background' => '{arp_body_even_row_background_color}',
                        'color' => '{arp_body_even_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#header_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_background_color_input}'
                    ),
                    'input#header_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_bg_custom_hover_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#price_background_color_{col_id}___0' => array(
                        'value' => '{arp_pricing_background_color_input}'
                    ),
                    'input#price_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_price_bg_custom_hover_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#price_text_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_color_input}'
                    ),
                    'input#price_text_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_hover_font_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#content_even_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_background_color}'
                    ),
                    'input#content_odd_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_background_color}'
                    ),
                    'input#content_even_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_hover_background_color}'
                    ),
                    'input#content_odd_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_hover_background_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_6' => array(
                'css' => array(
                    '.arppricetablecolumntitle' => array(
                        'background' => '{arp_header_background_color_input}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.column_description' => array(
                        'color' => '{arp_desc_font_color}'
                    ),
                    '.arppricetablecolumnprice' => array(
                        'background' => '{arp_pricing_background_color_input}'
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    '.arpcolumnfooter' => array(
                        'background' => '{arp_footer_background_color_input}'
                    ),
                    'li.arp_odd_row' => array(
                        'background' => '{arp_body_odd_row_background_color}',
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'background' => '{arp_body_even_row_background_color}',
                        'color' => '{arp_body_even_font_color}'
                    ),
                    '.maincaptioncolumn li.arp_odd_row' => array(
                        'background' => '{arp_body_odd_row_background_color}'
                    ),
                    '.arp_footer_content' => array(
                        'color' => '{arp_footer_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#header_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_background_color_input}',
                    ),
                    'input#header_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_bg_custom_hover_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#price_background_color_{col_id}___0' => array(
                        'value' => '{arp_pricing_background_color_input}'
                    ),
                    'input#price_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_price_bg_custom_hover_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#price_text_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_color_input}'
                    ),
                    'input#price_text_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_hover_font_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#content_even_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_background_color}'
                    ),
                    'input#content_odd_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_background_color}'
                    ),
                    'input#content_even_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_hover_background_color}'
                    ),
                    'input#content_odd_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_hover_background_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                    'input#footer_background_color_{col_id}___0' => array(
                        'value' => '{arp_footer_background_color_input}'
                    ),
                    'input#footer_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_footer_bg_custom_hover_color}'
                    ),
                    'input#footer_level_options_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_font_color}'
                    ),
                    'input#footer_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_hover_font_color}'
                    ),
                    'input#column_description_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_font_color}'
                    ),
                    'input#column_description_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_7' => array(
                'css' => array(
                    '.arppricetablecolumntitle' => array(
                        'background' => '{arp_header_background_color_input_rgba^_^(0.7)}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.column_description' => array(
                        'background' => '{arp_desc_background_color_input}',
                        'color' => '{arp_desc_font_color}'
                    ),
                    '.arppricetablecolumnprice' => array(
                        'background' => '{arp_desc_background_color_input}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    'li.arp_odd_row' => array(
                        'background' => '{arp_body_odd_row_background_color}',
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'background' => '{arp_body_even_row_background_color}',
                        'color' => '{arp_body_even_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#header_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_background_color_input}'
                    ),
                    'input#header_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_bg_custom_hover_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#column_desc_background_color_{col_id}___0' => array(
                        'value' => '{arp_desc_background_color_input}'
                    ),
                    'input#column_desc_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_desc_bg_custom_hover_color}'
                    ),
                    'input#column_description_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_font_color}'
                    ),
                    'input#column_description_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_hover_font_color}'
                    ),
                    'input#content_even_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_background_color}'
                    ),
                    'input#content_odd_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_background_color}'
                    ),
                    'input#content_even_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_hover_background_color}'
                    ),
                    'input#content_odd_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_hover_background_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#price_text_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_color_input}'
                    ),
                    'input#price_text_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_8' => array(
                'css' => array(
                    '.arpcolumnheader' => array(
                        'background-color' => '{arp_header_background_color_input}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    'li.arp_odd_row' => array(
                        'background' => '{arp_body_odd_row_background_color}',
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'background' => '{arp_body_even_row_background_color}',
                        'color' => '{arp_body_even_font_color}'
                    ),
                    'li .caption_li' => array(
                        'color' => '{arp_body_label_font_color}'
                    ),
                    '.rounded_corder' => array(
                        'background' => '{arp_shortcode_background_color_input}',
                        'border-color' => '{arp_shortcode_background_color_input}'
                    ),
                    '.rounded_corder i' => array(
                        'color' => '{arp_shortcode_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#header_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_background_color_input}'
                    ),
                    'input#header_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_bg_custom_hover_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#content_even_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_background_color}'
                    ),
                    'input#content_odd_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_background_color}'
                    ),
                    'input#content_even_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_hover_background_color}'
                    ),
                    'input#content_odd_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_hover_background_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                    'input#content_label_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_label_font_color}'
                    ),
                    'input#content_label_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_label_font_hover_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#price_text_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_color_input}'
                    ),
                    'input#price_text_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_hover_font_color}'
                    ),
                    'input#shortcode_background_color_{col_id}___0' => array(
                        'value' => '{arp_shortcode_background_color_input}'
                    ),
                    'input#shortcode_font_color_{col_id}___0' => array(
                        'value' => '{arp_shortcode_font_color}'
                    ),
                    'input#shortcode_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_shortcode_hover_background_color_input}'
                    ),
                    'input#shortcode_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_shortcode_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_9' => array(
                'css' => array(
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.arp_column_content_wrapper' => array(
                        'background-color' => '{arp_column_background_color_input}'
                    ),
                    'li.arp_odd_row' => array(
                        'background' => '{arp_body_odd_row_background_color}',
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'background' => '{arp_body_even_row_background_color}',
                        'color' => '{arp_body_even_font_color}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    '.arp_footer_content' => array(
                        'color' => '{arp_footer_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#column_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_background_color_input}'
                    ),
                    'input#column_background_color_{col_id}___1' => array(
                        'data-column_id' => '{arp_column_background_color_input}'
                    ),
                    'input#column_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_bg_custom_hover_color}'
                    ),
                    'input#content_even_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_background_color}'
                    ),
                    'input#content_odd_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_background_color}'
                    ),
                    'input#footer_level_options_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_font_color}'
                    ),
                    'input#footer_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_hover_font_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#price_text_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_color_input}'
                    ),
                    'input#price_text_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_10' => array(
                'css' => array(
                    '.bestPlanTitle' => array(
                        'background' => '{arp_header_background_color_input}',
                        'color' => '{arp_header_font_color}'
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.arp_price_wrapper' => array(
                        'background' => '{arp_pricing_background_color_input}',
                        'color' => '{arp_price_value_color_input}'
                    ),
//                    '.arp_price_wrapper' => array(
//                        'color' => '{arp_price_value_color_input}'
//                    ),
                    '.arpplan' => array(
                        'background-color' => '{arp_desc_background_color_input}'
                    ),
                    '.column_description' => array(
                        'color' => '{arp_desc_font_color}'
                    ),
                    'li.arp_odd_row' => array(
                        'background' => '{arp_body_odd_row_background_color}',
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'background' => '{arp_body_even_row_background_color}',
                        'color' => '{arp_body_even_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#header_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_background_color_input}'
                    ),
                    'input#header_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_bg_custom_hover_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#price_background_color_{col_id}___0' => array(
                        'value' => '{arp_pricing_background_color_input}'
                    ),
                    'input#price_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_price_bg_custom_hover_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#price_text_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_color_input}'
                    ),
                    'input#price_text_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_hover_font_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#column_desc_background_color_{col_id}___0' => array(
                        'value' => '{arp_desc_background_color_input}'
                    ),
                    'input#column_desc_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_desc_bg_custom_hover_color}'
                    ),
                    'input#column_description_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_font_color}'
                    ),
                    'input#column_description_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_hover_font_color}'
                    ),
                    'input#content_even_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_background_color}'
                    ),
                    'input#content_odd_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_background_color}'
                    ),
                    'input#content_even_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_hover_background_color}'
                    ),
                    'input#content_odd_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_hover_background_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                    'input#content_label_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_label_font_color}'
                    ),
                    'input#content_label_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_label_font_hover_color}'
                    ),
                ),
            ),
            'arptemplate_11' => array(
                'css' => array(
                    '.arppricetablecolumntitle' => array(
                        'background' => '{arp_header_background_color_input}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.arppricetablecolumnprice' => array(
                        'background' => '{arp_desc_background_color_input}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    'li.arp_odd_row' => array(
                        'background' => '{arp_body_odd_row_background_color}',
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'background' => '{arp_body_even_row_background_color}',
                        'color' => '{arp_body_even_font_color}'
                    ),
                    '.column_description' => array(
                        'color' => '{arp_desc_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#header_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_background_color_input}'
                    ),
                    'input#header_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_bg_custom_hover_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#column_desc_background_color_{col_id}___0' => array(
                        'value' => '{arp_desc_background_color_input}'
                    ),
                    'input#column_desc_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_desc_bg_custom_hover_color}'
                    ),
                    'input#column_description_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_font_color}'
                    ),
                    'input#column_description_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_hover_font_color}'
                    ),
                    'input#content_even_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_background_color}'
                    ),
                    'input#content_odd_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_background_color}'
                    ),
                    'input#content_even_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_hover_background_color}'
                    ),
                    'input#content_odd_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_hover_background_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#price_text_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_color_input}'
                    ),
                    'input#price_text_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_12' => array(
                'css' => array(
                    '.arppricetablecolumntitle' => array(
                        'background' => '{arp_header_background_color_input}'
                    ),
                    '.arppricetablecolumnprice' => array(
                        'background' => '{arp_pricing_background_color_input}'
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}'
                    ),
                    '.arpcolumnfooter' => array(
                        'background' => '{arp_footer_background_color_input}'
                    ),
                    'li.arp_odd_row' => array(
                        'background' => '{arp_body_odd_row_background_color}'
                    ),
                    'li.arp_even_row' => array(
                        'background' => '{arp_body_even_row_background_color}'
                    ),
                    '.maincaptioncolumn li.arp_odd_row' => array(
                        'background' => '{arp_body_odd_row_background_color}'
                    )
                ),
                'attribute' => array(
                    'input#header_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_background_color_input}',
                    ),
                    'input#header_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_bg_custom_hover_color}'
                    ),
                    'input#price_background_color_{col_id}___0' => array(
                        'value' => '{arp_pricing_background_color_input}'
                    ),
                    'input#price_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_price_bg_custom_hover_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#content_even_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_background_color}'
                    ),
                    'input#content_odd_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_background_color}'
                    ),
                    'input#content_even_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_hover_background_color}'
                    ),
                    'input#content_odd_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_hover_background_color}'
                    ),
                    'input#footer_background_color_{col_id}___0' => array(
                        'value' => '{arp_footer_background_color_input}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                ),
            ),
            'arptemplate_13' => array(
                'css' => array(
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.arpplan' => array(
                        'background-color' => '{arp_column_background_color_input}'
                    ),
                    '.arp_price_wrapper' => array(
                        'background' => '{arp_pricing_background_color_input}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    'li.arp_odd_row' => array(
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'color' => '{arp_body_even_font_color}'
                    ),
                    '.column_description' => array(
                        'color' => '{arp_desc_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#column_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_background_color_input}'
                    ),
                    'input#column_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_bg_custom_hover_color}'
                    ),
                    'input#price_background_color_{col_id}___0' => array(
                        'value' => '{arp_pricing_background_color_input}'
                    ),
                    'input#price_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_price_bg_custom_hover_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#price_text_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_color_input}'
                    ),
                    'input#price_text_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_hover_font_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                    'input#column_description_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_font_color}'
                    ),
                    'input#column_description_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_14' => array(
                'css' => array(
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    'li.arp_odd_row' => array(
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'color' => '{arp_body_even_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#price_text_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_color_input}'
                    ),
                    'input#price_text_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_hover_font_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_15' => array(
                'css' => array(
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.arppricetablecolumnprice' => array(
                        'background' => '{arp_pricing_background_color_input}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    'li.arp_odd_row' => array(
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'color' => '{arp_body_even_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#price_background_color_{col_id}___0' => array(
                        'value' => '{arp_pricing_background_color_input}'
                    ),
                    'input#price_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_price_bg_custom_hover_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#price_text_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_color_input}'
                    ),
                    'input#price_text_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_hover_font_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                ),
            ),
            'arptemplate_16' => array(
                'css' => array(
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.arp_price_wrapper,.arppricetablecolumnprice' => array(
                        'background' => '{arp_pricing_background_color_input}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    '.column_description' => array(
                        'color' => '{arp_desc_font_color}'
                    ),
                    'li.arp_odd_row' => array(
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'color' => '{arp_body_even_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#price_background_color_{col_id}___0' => array(
                        'value' => '{arp_pricing_background_color_input}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#price_text_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_color_input}'
                    ),
                    'input#price_text_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_hover_font_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                    'input#column_description_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_font_color}'
                    ),
                    'input#column_description_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_hover_font_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_20' => array(
                'css' => array(
                    '.arp_column_content_wrapper' => array(
                        'background-color' => '{arp_column_background_color_input}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.arppricetablecolumntitle' => array(
                        'background' => '{arp_header_background_color_input}'
                    ),
                    '.arppricingtablebodyoptions li i' => array(
                        'color' => '{arp_header_background_color_input}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    'li.arp_odd_row' => array(
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'color' => '{arp_body_even_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#column_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_background_color_input}'
                    ),
                    'input#column_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_bg_custom_hover_color}'
                    ),
                    'input#header_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_background_color_input}'
                    ),
                    'input#header_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_bg_custom_hover_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#price_text_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_color_input}'
                    ),
                    'input#price_text_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_hover_font_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                ),
            ),
            'arptemplate_21' => array(
                'css' => array(
                    '.arppricetablecolumntitle' => array(
                        'background' => '{arp_column_background_color_input}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.arppricetablecolumnprice' => array(
                        'background' => '{arp_column_background_color_input}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    '.arppricingtablebodycontent' => array(
                        'background' => '{arp_column_background_color_input}'
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    'li.arp_odd_row' => array(
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'color' => '{arp_body_even_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#column_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_background_color_input}',
                    ),
                    'input#column_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_bg_custom_hover_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}',
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                ),
            ),
            'arptemplate_22' => array(
                'css' => array(
                    '.arp_column_content_wrapper' => array(
                        'background-color' => '{arp_column_background_color_input}',
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.arppricetablecolumnprice' => array(
                        'background' => '{arp_pricing_background_color_input}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    'li.arp_odd_row' => array(
                        'background' => '{arp_body_odd_row_background_color}',
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'background' => '{arp_body_even_row_background_color}',
                        'color' => '{arp_body_even_font_color}'
                    ),
                    '.arp_footer_content' => array(
                        'color' => '{arp_footer_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}',
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#footer_level_options_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_font_color}'
                    ),
                    'input#footer_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_hover_font_color}'
                    ),
                    'input#column_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_background_color_input}'
                    ),
                    'input#column_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_bg_custom_hover_color}'
                    ),
                    'input#price_background_color_{col_id}___0' => array(
                        'value' => '{arp_pricing_background_color_input}',
                    ),
                    'input#price_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_price_bg_custom_hover_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#arp_column_bg_custom_color_{col_id}___0' => array(
                        'value' => '{arp_column_bg_custom_color}'
                    ),
                    'input#content_even_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_background_color}'
                    ),
                    'input#content_odd_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_background_color}'
                    ),
                    'input#content_even_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_row_hover_background_color}'
                    ),
                    'input#content_odd_hover_color_{col_id}___0' => array(
                        'value' => '{arp_body_odd_row_hover_background_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                ),
            ),
            'arptemplate_23' => array(
                'css' => array(
                    '.arp_column_content_wrapper::after' => array(
                        'background-color' => '{arp_column_background_color_input}',
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.arp_price_wrapper' => array(
                        'background' => '{arp_pricing_background_color_input}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    'li.arp_odd_row' => array(
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'color' => '{arp_body_even_font_color}'
                    ),
                    '.column_description' => array(
                        'color' => '{arp_desc_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}',
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#column_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_background_color_input}'
                    ),
                    'input#column_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_bg_custom_hover_color}'
                    ),
                    'input#price_background_color_{col_id}___0' => array(
                        'value' => '{arp_pricing_background_color_input}'
                    ),
                    'input#price_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_price_bg_custom_hover_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#column_description_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_font_color}'
                    ),
                    'input#column_description_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_hover_font_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#arp_column_bg_custom_color_{col_id}___0' => array(
                        'value' => '{arp_column_bg_custom_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                ),
            ),
            'arptemplate_24' => array(
                'css' => array(
                    '.arp_column_content_wrapper' => array(
                        'background-color' => '{arp_column_background_color_input}',
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.arp_price_wrapper' => array(
                        'color' => '{arp_price_value_color_input}'
                    ),
                    'li.arp_odd_row' => array(
                        'color' => '{arp_body_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'color' => '{arp_body_even_font_color}'
                    ),
                    '.arp_footer_content' => array(
                        'color' => '{arp_footer_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}',
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#column_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_background_color_input}'
                    ),
                    'input#column_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_bg_custom_hover_color}'
                    ),
                    'input#arp_column_bg_custom_color_{col_id}___0' => array(
                        'value' => '{arp_column_bg_custom_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                    'input#footer_level_options_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_font_color}'
                    ),
                    'input#footer_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_25' => array(
                'css' => array(
                    '#column_header' => array(
                        'background' => '{arp_header_background_color_input}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    '.arppricingtablebodycontent' => array(
                        'background' => '{arp_column_background_color_input_rgba^_^(0.8)}',
                    ),
                     'li.arp_odd_row' => array(
//                      'background' => '{arp_body_odd_row_background_color_rgba^_^(0.8)}',
                      'color' => '{arp_body_font_color}'
                      ),
                      'li.arp_even_row' => array(
//                      'background' => '{arp_body_even_row_background_color_rgba^_^(0.8)}',
                      'color' => '{arp_body_even_font_color}'
                      ),
//                      '.column_description' => array(
//                      'background' => '{arp_desc_background_color_input_rgba^_^(0.8)}',
//                      'color' => '{arp_desc_font_color}'
//                      ), 
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.column_description' => array(
                        'background' => '{arp_desc_background_color_input}',
                        'color' => '{arp_desc_font_color}'
                    )
                ),
                'attribute' => array(
                    'input#header_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_background_color_input}'
                    ),
                    'input#header_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_bg_custom_hover_color}'
                    ),
                    'input#column_desc_background_color_{col_id}___0' => array(
                        'value' => '{arp_desc_background_color_input}'
                    ),
                    'input#column_desc_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_desc_bg_custom_hover_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}'
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#column_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_background_color_input}'
                    ),
                    'input#column_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_bg_custom_hover_color}'
                    ),
                    'input#column_desc_background_color_{col_id}___0' => array(
                        'value' => '{arp_desc_background_color_input}'
                    ),
                    'input#column_desc_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_desc_bg_custom_hover_color}'
                    ),
                    'input#column_description_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_font_color}'
                    ),
                    'input#column_description_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_desc_hover_font_color}'
                    ),
           
                  'input#content_even_color_{col_id}___0' => array(
                  'value' => '{arp_body_even_row_background_color}'
                  ),
                  'input#content_odd_color_{col_id}___0' => array(
                  'value' => '{arp_body_odd_row_background_color}'
                  ),
                  'input#content_even_hover_color_{col_id}___0' => array(
                  'value' => '{arp_body_even_row_hover_background_color}'
                  ),
                  'input#content_odd_hover_color_{col_id}___0' => array(
                  'value' => '{arp_body_odd_row_hover_background_color}'
                  ),
                  'input#content_font_color_{col_id}___0' => array(
                  'value' => '{arp_body_font_color}'
                  ),
                  'input#content_hover_font_color_{col_id}___0' => array(
                  'value' => '{arp_body_font_hover_color}'
                  ),
                  'input#content_even_font_color_{col_id}___0' => array(
                  'value' => '{arp_body_even_font_color}'
                  ),
                  'input#content_even_hover_font_color_{col_id}___0' => array(
                  'value' => '{arp_body_even_font_hover_color}'
                  ), 
                ),
            ),
            'arptemplate_26' => array(
                'css' => array(
                    '#column_header' => array(
                        'background' => '{arp_header_background_color_input}'
                    ),
                    
                    '.arp_column_content_wrapper' => array(
                        'background-color' => '{arp_column_background_color_input}',
                    ),
                    '.bestPlanButton' => array(
                        'background' => '{arp_button_background_color_input}',
                        'color' => '{arp_button_font_color}'
                    ),
                    '.bestPlanTitle' => array(
                        'color' => '{arp_header_font_color}'
                    ),
                    'li.arp_even_row' => array(
                        'color' => '{arp_body_even_font_color}'
                    ),
                    'li.arp_odd_row' => array(
                        'color' => '{arp_body_font_color}'
                    ),
                    '.arp_footer_content' => array(
                        'color' => '{arp_footer_font_color}'
                    ),
                    '.rounded_corder' => array(
                        'background' => '{arp_shortcode_background_color_input}',
                        'border-color' => '{arp_shortcode_background_color_input}'
                    ),
                    '.rounded_corder i' => array(
                        'color' => '{arp_shortcode_font_color}'
                    ),
                ),
                'attribute' => array(
                    'input#header_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_background_color_input}'
                    ),
                    'input#header_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_header_bg_custom_hover_color}'
                    ),
                    'input#button_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_background_color_input}',
                    ),
                    'input#button_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_button_bg_custom_hover_color}'
                    ),
                    'input#column_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_background_color_input}'
                    ),
                    'input#column_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_column_bg_custom_hover_color}'
                    ),
                    'input#arp_column_bg_custom_color_{col_id}___0' => array(
                        'value' => '{arp_column_bg_custom_color}'
                    ),
                    'input#header_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_font_color}'
                    ),
                    'input#header_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_header_hover_font_color}'
                    ),
                    'input#price_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_color_input}'
                    ),
                    'input#price_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_value_hover_color_input}'
                    ),
                    'input#price_text_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_color_input}'
                    ),
                    'input#price_text_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_price_duration_hover_font_color}'
                    ),
                    'input#content_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_color}'
                    ),
                    'input#content_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_font_hover_color}'
                    ),
                    'input#content_even_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_color}'
                    ),
                    'input#content_even_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_body_even_font_hover_color}'
                    ),
                    'input#button_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_font_color}'
                    ),
                    'input#button_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_button_hover_font_color}'
                    ),
                    'input#footer_level_options_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_font_color}'
                    ),
                    'input#footer_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_footer_hover_font_color}'
                    ),
                    'input#shortcode_background_color_{col_id}___0' => array(
                        'value' => '{arp_shortcode_background_color_input}'
                    ),
                    'input#shortcode_font_color_{col_id}___0' => array(
                        'value' => '{arp_shortcode_font_color}'
                    ),
                    'input#shortcode_hover_background_color_{col_id}___0' => array(
                        'value' => '{arp_shortcode_hover_background_color_input}'
                    ),
                    'input#shortcode_hover_font_color_{col_id}___0' => array(
                        'value' => '{arp_shortcode_hover_font_color}'
                    ),
                ),
            )
        ));

        return $arp_sec_bg_color;
    }

    function arp_footer_section_template_types() {

        $arp_footer_sec_temp_types = apply_filters('arp_footer_sec_temp_types', array(
            'type_1' => array('arptemplate_4', 'arptemplate_6'),
            'type_2' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_5', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25', 'arptemplate_26'),
            'type_3' => array('arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16')
        ));
        return $arp_footer_sec_temp_types;
    }

    function arp_color_skin_template_types() {

        $arp_color_skin_template_types = apply_filters('arp_color_skin_temp_types', array(
            'type_1' => array('arptemplate_1', 'arptemplate_4', 'arptemplate_9', 'arptemplate_6', 'arptemplate_12'),
            'type_2' => array('arptemplate_3', 'arptemplate_7', 'arptemplate_11', 'arptemplate_20', 'arptemplate_21'),
            'type_3' => array('arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16'),
            'type_4' => array('arptemplate_6'),
            'type_5' => array('arptemplate_2', 'arptemplate_5', 'arptemplate_8', 'arptemplate_10', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25', 'arptemplate_26')
        ));

        return $arp_color_skin_template_types;
    }

    function arp_exclude_caption_column_for_color_skin() {
        $arp_exclude_caption_column_for_color_skin = apply_filters('arp_exclude_caption_column_for_color_skin', array(
            'arptemplate_1' => false,
            'arptemplate_2' => false,
            'arptemplate_3' => false,
            'arptemplate_4' => false,
            'arptemplate_5' => false,
            'arptemplate_6' => false,
            'arptemplate_7' => false,
            'arptemplate_8' => false,
            'arptemplate_9' => true,
            'arptemplate_10' => false,
            'arptemplate_11' => false,
            'arptemplate_12' => false,
            'arptemplate_13' => false,
            'arptemplate_14' => false,
            'arptemplate_15' => false,
            'arptemplate_16' => false,
            'arptemplate_20' => false,
            'arptemplate_21' => false,
            'arptemplate_22' => false,
            'arptemplate_23' => false,
            'arptemplate_24' => false,
            'arptemplate_25' => false,
            'arptemplate_26' => false,
        ));

        return $arp_exclude_caption_column_for_color_skin;
    }

    function arp_column_section_background_color() {
        $arp_col_sec_bg_color = apply_filters('arp_col_sec_bg_col', array(
            'arptemplate_1' => array(
                'multicolor' => array(
                    'arp_header_background' => array('#ffffff', '#6dae2e', '#fbb400', '#ea6d00', '#c32929', '#e52937'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_background' => array('', '#528a1b', '#c28a01', '#b44404', '#a50b0b', '#bc0210'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_background' => array('', '#6dae2e', '#fbb400', '#ea6d00', '#c32929', '#e52937'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_background' => array('#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3'),
                    'arp_footer_font_color' => array('', '#364762'),
                    'arp_body_odd_row_background_color' => array('#FFFFFF'),
                    'arp_body_even_row_background_color' => array('#F1F1F1', "#E9E9E9"),
                    'arp_body_font_color' => array('', '#364762'),
                    'arp_body_even_font_color' => array('', '#364762'),
                    'arp_body_caption_odd_row_bg_color' => array('#F6F4F5'),
                    'arp_body_caption_even_row_bg_color' => array('#F1F1F1'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#4C7A20', '#B07E00', '#A44C00', '#8C1E1E', '#A01D27'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'header_bg_color' => array('', '#6dae2e', '#fbb400', '#ea6d00', '#c32929', '#e52937'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'price_bg_color' => array('', '#528a1b', '#c28a01', '#b44404', '#a50b0b', '#bc0210'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#FFFFFF'),
                        'arp_body_even_row_hover_background_color' => array('#F1F1F1', "#E9E9E9"),
                        'arp_body_font_hover_color' => array('', '#364762'),
                        'arp_body_even_font_hover_color' => array('', '#364762'),
                        'footer_bg_color' => array('#e3e3e3'),
                        'arp_footer_hover_font_color' => array('', '#364762'),
                    ),
                ),
                'green' => array(
                    'arp_header_background' => array('#ffffff', '#85d538', '#7cc635', '#6dae2e', '#619c26', '#4e8619'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_background' => array('', '#70b828', '#62a323', '#528a1b', '#497e16', '#3d6c0e'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_background' => array('', '#85d538', '#7cc635', '#6dae2e', '#619c26', '#4e8619'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_background' => array('#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3'),
                    'arp_footer_font_color' => array('', '#364762'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f1f1f1', "#e9e9e9"),
                    'arp_body_font_color' => array('', '#364762'),
                    'arp_body_even_font_color' => array('', '#364762'),
                    'arp_body_caption_odd_row_bg_color' => array('#f6f4f5'),
                    'arp_body_caption_even_row_bg_color' => array('#f1f1f1'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#5D9527', '#6BAB2E', '#4C7A20', '#446D1B', '#375E12'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'header_bg_color' => array('', '#85d538', '#7cc635', '#6dae2e', '#619c26', '#4e8619'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'price_bg_color' => array('', '#70b828', '#62a323', '#528a1b', '#497e16', '#3d6c0e'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f1f1f1', "#e9e9e9"),
                        'arp_body_font_hover_color' => array('', '#364762'),
                        'arp_body_even_font_hover_color' => array('', '#364762'),
                        'footer_bg_color' => array('#e3e3e3'),
                        'arp_footer_hover_font_color' => array('', '#364762'),
                    ),
                ),
                'yellow' => array(
                    'arp_header_background' => array('#ffffff', '#fbce59', '#ffc327', '#fbb400', '#e39002', '#cb8202'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_background' => array('', '#edbc3c', '#ecb014', '#dea001', '#c98204', '#b87502'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_background' => array('', '#fbce59', '#ffc327', '#fbb400', '#e39002', '#cb8202'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_background' => array('#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3'),
                    'arp_footer_font_color' => array('', '#364762'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f1f1f1', "#e9e9e9"),
                    'arp_body_font_color' => array('', '#364762'),
                    'arp_body_even_font_color' => array('', '#364762'),
                    'arp_body_caption_odd_row_bg_color' => array('#f6f4f5'),
                    'arp_body_caption_even_row_bg_color' => array('#f1f1f1'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#B0903E', '#B3891B', '#D49800', '#9F6501', '#8F5C01'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'header_bg_color' => array('', '#fbce59', '#ffc327', '#fbb400', '#e39002', '#cb8202'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'price_bg_color' => array('', '#edbc3c', '#ecb014', '#dea001', '#c98204', '#b87502'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f1f1f1', "#e9e9e9"),
                        'arp_body_font_hover_color' => array('', '#364762'),
                        'arp_body_even_font_hover_color' => array('', '#364762'),
                        'footer_bg_color' => array('#e3e3e3'),
                        'arp_footer_hover_font_color' => array('', '#364762'),
                    ),
                ),
                'darkorange' => array(
                    'arp_header_background' => array('#ffffff', '#ff902e', '#fa7701', '#e75c01', '#cd4a02', '#bd3c03'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_background' => array('', '#e17616', '#df610c', '#cb5404', '#b64509', '#a03201'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_background' => array('', '#ff902e', '#fa7701', '#e75c01', '#cd4a02', '#bd3c03'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_background' => array('#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3'),
                    'arp_footer_font_color' => array('', '#364762'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f1f1f1', "#e9e9e9"),
                    'arp_body_font_color' => array('', '#364762'),
                    'arp_body_even_font_color' => array('', '#364762'),
                    'arp_body_caption_odd_row_bg_color' => array('#f6f4f5'),
                    'arp_body_caption_even_row_bg_color' => array('#f1f1f1'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#BE6B22', '#B35501', '#A24001', '#B64202', '#842A02'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'header_bg_color' => array('', '#ff902e', '#fa7701', '#e75c01', '#cd4a02', '#bd3c03'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'price_bg_color' => array('', '#e17616', '#df610c', '#cb5404', '#b64509', '#a03201'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f1f1f1', "#e9e9e9"),
                        'arp_body_font_hover_color' => array('', '#364762'),
                        'arp_body_even_font_hover_color' => array('', '#364762'),
                        'footer_bg_color' => array('#e3e3e3'),
                        'arp_footer_hover_font_color' => array('', '#364762'),
                    ),
                ),
                'darkred' => array(
                    'arp_header_background' => array('#ffffff', '#e42c2c', '#c32929', '#a41a1a', '#900808', '#760000'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_background' => array('', '#c41818', '#a50b0b', '#89090a', '#780202', '#5b0000'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_background' => array('', '#e42c2c', '#c32929', '#a41a1a', '#900808', '#760000'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_background' => array('#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3'),
                    'arp_footer_font_color' => array('', '#364762'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f1f1f1', "#e9e9e9"),
                    'arp_body_font_color' => array('', '#364762'),
                    'arp_body_even_font_color' => array('', '#364762'),
                    'arp_body_caption_odd_row_bg_color' => array('#f6f4f5'),
                    'arp_body_caption_even_row_bg_color' => array('#f1f1f1'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#A01F1F', '#891d1d', '#731212', '#650606', '#560000'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'header_bg_color' => array('', '#e42c2c', '#c32929', '#a41a1a', '#900808', '#760000'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'price_bg_color' => array('', '#c41818', '#a50b0b', '#89090a', '#780202', '#5b0000'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f1f1f1', "#e9e9e9"),
                        'arp_body_font_hover_color' => array('', '#364762'),
                        'arp_body_even_font_hover_color' => array('', '#364762'),
                        'footer_bg_color' => array('#e3e3e3'),
                        'arp_footer_hover_font_color' => array('', '#364762'),
                    ),
                ),
                'red' => array(
                    'arp_header_background' => array('#ffffff', '#fa303e', '#e52937', '#cb2330', '#aa1823', '#8a0b14'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_background' => array('', '#e01d2d', '#bc0210', '#a8000d', '#870813', '#6e0107'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_background' => array('', '#fa303e', '#e52937', '#cb2330', '#aa1823', '#8a0b14'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_background' => array('#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3'),
                    'arp_footer_font_color' => array('', '#364762'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f1f1f1', "#e9e9e9"),
                    'arp_body_font_color' => array('', '#364762'),
                    'arp_body_even_font_color' => array('', '#364762'),
                    'arp_body_caption_odd_row_bg_color' => array('#f6f4f5'),
                    'arp_body_caption_even_row_bg_color' => array('#f1f1f1'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#AF222B', '#A01D27', '#8E1922', '#771119', '#61080E'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'header_bg_color' => array('', '#fa303e', '#e52937', '#cb2330', '#aa1823', '#8a0b14'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'price_bg_color' => array('', '#e01d2d', '#bc0210', '#a8000d', '#870813', '#6e0107'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f1f1f1', "#e9e9e9"),
                        'arp_body_font_hover_color' => array('', '#364762'),
                        'arp_body_even_font_hover_color' => array('', '#364762'),
                        'footer_bg_color' => array('#e3e3e3'),
                        'arp_footer_hover_font_color' => array('', '#364762'),
                    ),
                ),
                'violet' => array(
                    'arp_header_background' => array('#ffffff', '#922cbc', '#713887', '#5a2e6d', '#451e55', '#2e0e3d'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_background' => array('', '#6b1b8c', '#4d1465', '#400e53', '#340f42', '#20052d'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_background' => array('', '#922cbc', '#713887', '#5a2e6d', '#451e55', '#2e0e3d'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_background' => array('#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3'),
                    'arp_footer_font_color' => array('', '#364762'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f1f1f1', "#e9e9e9"),
                    'arp_body_font_color' => array('', '#364762'),
                    'arp_body_even_font_color' => array('', '#364762'),
                    'arp_body_caption_odd_row_bg_color' => array('#f6f4f5'),
                    'arp_body_caption_even_row_bg_color' => array('#f1f1f1'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#661F84', '#4F275F', '#3F204C', '#30153C', '#200A2B'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'header_bg_color' => array('', '#922cbc', '#713887', '#5a2e6d', '#451e55', '#2e0e3d'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'price_bg_color' => array('', '#6b1b8c', '#4d1465', '#400e53', '#340f42', '#20052d'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f1f1f1', "#e9e9e9"),
                        'arp_body_font_hover_color' => array('', '#364762'),
                        'arp_body_even_font_hover_color' => array('', '#364762'),
                        'footer_bg_color' => array('#e3e3e3'),
                        'arp_footer_hover_font_color' => array('', '#364762'),
                    ),
                ),
                'pink' => array(
                    'arp_header_background' => array('#ffffff', '#ff5792', '#ff287d', '#eb005c', '#cf0251', '#b90149'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_background' => array('', '#eb3b7b', '#db1864', '#c9004e', '#b00146', '#99013c'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_background' => array('', '#ff5792', '#ff287d', '#eb005c', '#cf0251', '#b90149'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_background' => array('#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3'),
                    'arp_footer_font_color' => array('', '#364762'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f1f1f1', "#e9e9e9"),
                    'arp_body_font_color' => array('', '#364762'),
                    'arp_body_even_font_color' => array('', '#364762'),
                    'arp_body_caption_odd_row_bg_color' => array('#f6f4f5'),
                    'arp_body_caption_even_row_bg_color' => array('#f1f1f1'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#b33d66', '#b31c58', '#a50040', '#910139', '#820133'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'header_bg_color' => array('#ffffff', '#ff5792', '#ff287d', '#eb005c', '#cf0251', '#b90149'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'price_bg_color' => array('', '#eb3b7b', '#db1864', '#c9004e', '#b00146', '#99013c'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f1f1f1', "#e9e9e9"),
                        'arp_body_font_hover_color' => array('', '#364762'),
                        'arp_body_even_font_hover_color' => array('', '#364762'),
                        'footer_bg_color' => array('#e3e3e3'),
                        'arp_footer_hover_font_color' => array('', '#364762'),
                    ),
                ),
                'blue' => array(
                    'arp_header_background' => array('#ffffff', '#2eb5ed', '#29a1d3', '#248fbb', '#1878a2', '#0b5b7c'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_background' => array('', '#0b92ca', '#0981b3', '#06719d', '#046085', '#014c6b'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_background' => array('', '#2eb5ed', '#29a1d3', '#248fbb', '#1878a2', '#0b5b7c'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_background' => array('#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3'),
                    'arp_footer_font_color' => array('', '#364762'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f1f1f1', "#e9e9e9"),
                    'arp_body_font_color' => array('', '#364762'),
                    'arp_body_even_font_color' => array('', '#364762'),
                    'arp_body_caption_odd_row_bg_color' => array('#f6f4f5'),
                    'arp_body_caption_even_row_bg_color' => array('#f1f1f1'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#207fa6', '#1d7194', '#196483', '#115471', '#084057'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'header_bg_color' => array('', '#2eb5ed', '#29a1d3', '#248fbb', '#1878a2', '#0b5b7c'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'price_bg_color' => array('', '#0b92ca', '#0981b3', '#06719d', '#046085', '#014c6b'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f1f1f1', "#e9e9e9"),
                        'arp_body_font_hover_color' => array('', '#364762'),
                        'arp_body_even_font_hover_color' => array('', '#364762'),
                        'footer_bg_color' => array('#e3e3e3'),
                        'arp_footer_hover_font_color' => array('', '#364762'),
                    ),
                ),
                'darkblue' => array(
                    'arp_header_background' => array('#ffffff', '#444db2', '#2f3687', '#23286c', '#141950', '#090d3c'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_background' => array('', '#303996', '#23264f', '#191c3f', '#080c29', '#030627'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_background' => array('', '#444db2', '#2f3687', '#23286c', '#141950', '#090d3c'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_background' => array('#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3'),
                    'arp_footer_font_color' => array('', '#364762'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f1f1f1', "#e9e9e9"),
                    'arp_body_font_color' => array('', '#364762'),
                    'arp_body_even_font_color' => array('', '#364762'),
                    'arp_body_caption_odd_row_bg_color' => array('#f6f4f5'),
                    'arp_body_caption_even_row_bg_color' => array('#f1f1f1'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#30367d', '#21265f', '#191c4c', '#0e1238', '#06092a'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'header_bg_color' => array('', '#444db2', '#2f3687', '#23286c', '#141950', '#090d3c'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'price_bg_color' => array('', '#303996', '#23264f', '#191c3f', '#080c29', '#030627'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f1f1f1', "#e9e9e9"),
                        'arp_body_font_hover_color' => array('', '#364762'),
                        'arp_body_even_font_hover_color' => array('', '#364762'),
                        'footer_bg_color' => array('#e3e3e3'),
                        'arp_footer_hover_font_color' => array('', '#364762'),
                    ),
                ),
                'lightgreen' => array(
                    'arp_header_background' => array('#ffffff', '#23cd53', '#1dbb4c', '#1ba341', '#0f8c31', '#027822'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_background' => array('', '#0bb53b', '#0c9d34', '#0a892e', '#087826', '#026a1f'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_background' => array('', '#23cd53', '#1dbb4c', '#1ba341', '#0f8c31', '#027822'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_background' => array('#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3'),
                    'arp_footer_font_color' => array('', '#364762'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f1f1f1', "#e9e9e9"),
                    'arp_body_font_color' => array('', '#364762'),
                    'arp_body_even_font_color' => array('', '#364762'),
                    'arp_body_caption_odd_row_bg_color' => array('#f6f4f5'),
                    'arp_body_caption_even_row_bg_color' => array('#f1f1f1'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#19903a', '#148335', '#13722e', '#0b6222', '#015418'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'header_bg_color' => array('', '#23cd53', '#1dbb4c', '#1ba341', '#0f8c31', '#027822'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'price_bg_color' => array('', '#0bb53b', '#0c9d34', '#0a892e', '#087826', '#026a1f'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f1f1f1', "#e9e9e9"),
                        'arp_body_font_hover_color' => array('', '#364762'),
                        'arp_body_even_font_hover_color' => array('', '#364762'),
                        'footer_bg_color' => array('#e3e3e3'),
                        'arp_footer_hover_font_color' => array('', '#364762'),
                    ),
                ),
                'darkestblue' => array(
                    'arp_header_background' => array('#ffffff', '#42607a', '#395266', '#2f4251', '#223544', '#152837'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_background' => array('', '#384e63', '#2f4251', '#223544', '#162938', '#0b1d2b'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_background' => array('', '#42607a', '#395266', '#2f4251', '#223544', '#152837'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_background' => array('#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3'),
                    'arp_footer_font_color' => array('', '#364762'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f1f1f1', "#E9E9E9"),
                    'arp_body_font_color' => array('', '#364762'),
                    'arp_body_even_font_color' => array('', '#364762'),
                    'arp_body_caption_odd_row_bg_color' => array('#f6f4f5'),
                    'arp_body_caption_even_row_bg_color' => array('#f1f1f1'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#2e4355', '#283947', '#212e39', '#182530', '#0f1c27'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'header_bg_color' => array('', '#42607a', '#395266', '#2f4251', '#223544', '#152837'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'price_bg_color' => array('', '#384e63', '#2f4251', '#223544', '#162938', '#0b1d2b'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f1f1f1', "#E9E9E9"),
                        'arp_body_font_hover_color' => array('', '#364762'),
                        'arp_body_even_font_hover_color' => array('', '#364762'),
                        'footer_bg_color' => array('#e3e3e3'),
                        'arp_footer_hover_font_color' => array('', '#364762'),
                    ),
                ),
                'cyan' => array(
                    'arp_header_background' => array('#ffffff', '#0cb691', '#009e7b', '#0b866a', '#0a725b', '#065f4b'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_background' => array('', '#0b8d71', '#027057', '#096651', '#075643', '#024939'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_background' => array('', '#0cb691', '#009e7b', '#0b866a', '#0a725b', '#065f4b'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_background' => array('#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3'),
                    'arp_footer_font_color' => array('', '#364762'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f1f1f1', '#F1F1F1', "#e9e9e9", '#F1F1F1', "#e9e9e9"),
                    'arp_body_font_color' => array('', '#364762'),
                    'arp_body_even_font_color' => array('', '#364762'),
                    'arp_body_caption_odd_row_bg_color' => array('#f6f4f5'),
                    'arp_body_caption_even_row_bg_color' => array('#f1f1f1'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#087f66', '#006f56', '#085e4a', '#075040', '#044335'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'header_bg_color' => array('', '#0cb691', '#009e7b', '#0b866a', '#0a725b', '#065f4b'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'price_bg_color' => array('', '#0b8d71', '#027057', '#096651', '#075643', '#024939'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f1f1f1'),
                        'arp_body_font_hover_color' => array('', '#364762'),
                        'arp_body_even_font_hover_color' => array('', '#364762'),
                        'footer_bg_color' => array('#e3e3e3'),
                        'arp_footer_hover_font_color' => array('', '#364762'),
                    ),
                ),
                'black' => array(
                    'arp_header_background' => array('#ffffff', '#828282', '#6e6e6e', '#5c5c5c', '#4a4a4a', '#383838'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_background' => array('', '#707070', '#5b5b5b', '#4c4c4c', '#3c3c3c', '#2d2d2d'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_background' => array('', '#828282', '#6e6e6e', '#5c5c5c', '#4a4a4a', '#383838'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_background' => array('#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3', '#e3e3e3'),
                    'arp_footer_font_color' => array('', '#364762'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f1f1f1', "#e9e9e9"),
                    'arp_body_font_color' => array('', '#364762'),
                    'arp_body_even_font_color' => array('', '#364762'),
                    'arp_body_caption_odd_row_bg_color' => array('#f6f4f5'),
                    'arp_body_caption_even_row_bg_color' => array('#f1f1f1'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#5b5b5b', '#4d4d4d', '#404040', '#343434', '#272727'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'header_bg_color' => array('', '#828282', '#6e6e6e', '#5c5c5c', '#4a4a4a', '#383838'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'price_bg_color' => array('', '#707070', '#5b5b5b', '#4c4c4c', '#3c3c3c', '#2d2d2d'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f1f1f1', "#e9e9e9"),
                        'arp_body_font_hover_color' => array('', '#364762'),
                        'arp_body_even_font_hover_color' => array('', '#364762'),
                        'footer_bg_color' => array('#e3e3e3'),
                        'arp_footer_hover_font_color' => array('', '#364762'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_header_background' => '',
                    'arp_header_font_color' => '',
                    'arp_price_background' => '',
                    'arp_price_value_color' => '',
                    'arp_button_background' => '',
                    'arp_button_font_color' => '',
                    'arp_footer_background' => '',
                    'arp_footer_font_color' => '',
                    'arp_body_odd_row_background_color' => '',
                    'arp_body_even_row_background_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_body_caption_odd_row_bg_color' => '',
                    'arp_body_caption_even_row_bg_color' => '',
                    'arp_hover_color' => array(
                        'button_bg_color' => '',
                        'arp_button_hover_font_color' => '',
                        'header_bg_color' => '',
                        'arp_header_hover_font_color' => '',
                        'price_bg_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_body_odd_row_hover_background_color' => '',
                        'arp_body_even_row_hover_background_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                        'footer_bg_color' => '',
                        'arp_footer_hover_font_color' => '',
                    ),
                )
            ),
            'arptemplate_2' => array(
                'blue' => array(
                    'arp_column_background' => array('#02a3ff', '#02a3ff', '#02a3ff', '#02a3ff', '#02a3ff'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#313234'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6'),
                        'button_bg_color' => array('#02a3ff', '#02a3ff', '#02a3ff', '#02a3ff', '#02a3ff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#02a3ff'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#02a3ff', '#02a3ff', '#02a3ff', '#02a3ff', '#02a3ff', '#02a3ff'),
                        'arp_shortcode_hover_font_color' => array('', '#02a3ff'),
                    ),
                ),
                'lightviolet' => array(
                    'arp_column_background' => array('#6c62d3', '#6c62d3', '#6c62d3', '#6c62d3', '#6c62d3'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#313234'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6'),
                        'button_bg_color' => array('#6c62d3', '#6c62d3', '#6c62d3', '#6c62d3', '#6c62d3', '#6c62d3'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#6c62d3'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#6c62d3', '#6c62d3', '#6c62d3', '#6c62d3', '#6c62d3', '#6c62d3'),
                        'arp_shortcode_hover_font_color' => array('', '#6c62d3'),
                    ),
                ),
                'yellow' => array(
                    'arp_column_background' => array('#ffba00', '#ffba00', '#ffba00', '#ffba00', '#ffba00'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#313234'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6'),
                        'button_bg_color' => array('#ffba00', '#ffba00', '#ffba00', '#ffba00', '#ffba00'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffba00'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#ffba00', '#ffba00', '#ffba00', '#ffba00', '#ffba00', '#ffba00'),
                        'arp_shortcode_hover_font_color' => array('', '#ffba00'),
                    ),
                ),
                'limegreen' => array(
                    'arp_column_background' => array('#6ed563', '#6ed563', '#6ed563', '#6ed563', '#6ed563'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#313234'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6'),
                        'button_bg_color' => array('#6ed563', '#6ed563', '#6ed563', '#6ed563', '#6ed563'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#6ed563'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#6ed563', '#6ed563', '#6ed563', '#6ed563', '#6ed563', '#6ed563'),
                        'arp_shortcode_hover_font_color' => array('', '#6ed563'),
                    ),
                ),
                'orange' => array(
                    'arp_column_background' => array('#ff9525', '#ff9525', '#ff9525', '#ff9525', '#ff9525'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#313234'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6'),
                        'button_bg_color' => array('#ff9525', '#ff9525', '#ff9525', '#ff9525', '#ff9525'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ff9525'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#ff9525', '#ff9525', '#ff9525', '#ff9525', '#ff9525', '#ff9525'),
                        'arp_shortcode_hover_font_color' => array('', '#ff9525'),
                    ),
                ),
                'softblue' => array(
                    'arp_column_background' => array('#4476d9', '#4476d9', '#4476d9', '#4476d9', '#4476d9'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#313234'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6'),
                        'button_bg_color' => array('#4476d9', '#4476d9', '#4476d9', '#4476d9', '#4476d9'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#4476d9'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#4476d9', '#4476d9', '#4476d9', '#4476d9', '#4476d9', '#4476d9'),
                        'arp_shortcode_hover_font_color' => array('', '#4476d9'),
                    ),
                ),
                'limecyan' => array(
                    'arp_column_background' => array('#37ba5a', '#37ba5a', '#37ba5a', '#37ba5a', '#37ba5a'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#313234'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6'),
                        'button_bg_color' => array('#37ba5a', '#37ba5a', '#37ba5a', '#37ba5a', '#37ba5a'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#37ba5a'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#37ba5a', '#37ba5a', '#37ba5a', '#37ba5a', '#37ba5a', '#37ba5a'),
                        'arp_shortcode_hover_font_color' => array('', '#37ba5a'),
                    ),
                ),
                'brightred' => array(
                    'arp_column_background' => array('#f34044', '#f34044', '#f34044', '#f34044', '#f34044'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#313234'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6'),
                        'button_bg_color' => array('#f34044', '#f34044', '#f34044', '#f34044', '#f34044'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#f34044'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#f34044', '#f34044', '#f34044', '#f34044', '#f34044', '#f34044'),
                        'arp_shortcode_hover_font_color' => array('', '#f34044'),
                    ),
                ),
                'red' => array(
                    'arp_column_background' => array('#de1a4c', '#de1a4c', '#de1a4c', '#de1a4c', '#de1a4c'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#313234'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6'),
                        'button_bg_color' => array('#de1a4c', '#de1a4c', '#de1a4c', '#de1a4c', '#de1a4c'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#de1a4c'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#de1a4c', '#de1a4c', '#de1a4c', '#de1a4c', '#de1a4c', '#de1a4c'),
                        'arp_shortcode_hover_font_color' => array('', '#de1a4c'),
                    ),
                ),
                'pink' => array(
                    'arp_column_background' => array('#de199a', '#de199a', '#de199a', '#de199a', '#de199a'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#313234'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6'),
                        'button_bg_color' => array('#de199a', '#de199a', '#de199a', '#de199a', '#de199a'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#de199a'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#de199a', '#de199a', '#de199a', '#de199a', '#de199a', '#de199a'),
                        'arp_shortcode_hover_font_color' => array('', '#de199a'),
                    ),
                ),
                'lightblue' => array(
                    'arp_column_background' => array('#1a5fde', '#1a5fde', '#1a5fde', '#1a5fde', '#1a5fde'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#313234'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6'),
                        'button_bg_color' => array('#1a5fde', '#1a5fde', '#1a5fde', '#1a5fde', '#1a5fde'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#1a5fde'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#1a5fde', '#1a5fde', '#1a5fde', '#1a5fde', '#1a5fde', '#1a5fde'),
                        'arp_shortcode_hover_font_color' => array('', '#1a5fde'),
                    ),
                ),
                'darkpink' => array(
                    'arp_column_background' => array('#a51143', '#a51143', '#a51143', '#a51143', '#a51143'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#313234'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6'),
                        'button_bg_color' => array('#a51143', '#a51143', '#a51143', '#a51143', '#a51143', '#a51143'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#a51143'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#a51143', '#a51143', '#a51143', '#a51143', '#a51143', '#a51143'),
                        'arp_shortcode_hover_font_color' => array('', '#a51143'),
                    ),
                ),
                'darkcyan' => array(
                    'arp_column_background' => array('#11a599', '#11a599', '#11a599', '#11a599', '#11a599'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#313234'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6', '#F6F6F6'),
                        'button_bg_color' => array('#11a599', '#11a599', '#11a599', '#11a599', '#11a599', '#11a599'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#11a599'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#11a599', '#11a599', '#11a599', '#11a599', '#11a599', '#11a599'),
                        'arp_shortcode_hover_font_color' => array('', '#11a599'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_column_background' => '',
                    'arp_button_background' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_button_font_color' => '',
                    'arp_footer_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_shortcode_background' => '',
                    'arp_shortcode_font_color' => '',
                    'arp_hover_color' => array(
                        'column_bg_color' => '',
                        'button_bg_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_price_duration_hover_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                        'arp_footer_hover_font_color' => '',
                        'arp_shortcode_hover_background' => '',
                        'arp_shortcode_hover_font_color' => '',
                    )
                )
            ),
            'arptemplate_3' => array(
                'black' => array(
                    'arp_price_background' => array('#39434d', '#39434d', '#39434d', '#39434d', '#39434d'),
                    'arp_header_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_footer_background' => array('#39434d', '#39434d', '#39434d', '#39434d', '#39434d'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                    'arp_header_font_color' => array('', '#39434d'),
                    'arp_price_value_color' => array('', '#ffffff'),
//                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#605f5f'),
                    'arp_button_font_color' => array('', '#444649'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'price_bg_color' => array('#e94b3f', '#e94b3f', '#e94b3f', '#e94b3f', '#e94b3f'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                        'arp_button_hover_font_color' => array('', '#444649'),
                        'arp_header_hover_font_color' => array('', '#e94b3f'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#605f5f'),
                        'arp_body_font_hover_color' => array('', '#e94b3f'),
                        'arp_body_even_font_hover_color' => array('', '#494c4f'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'green' => array(
                    'arp_price_background' => array('#24b968', '#24b968', '#24b968', '#24b968', '#24b968'),
                    'arp_header_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_footer_background' => array('#24b968', '#24b968', '#24b968', '#24b968', '#24b968'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                    'arp_header_font_color' => array('', '#24b968'),
                    'arp_price_value_color' => array('', '#ffffff'),
//                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#605f5f'),
                    'arp_button_font_color' => array('', '#444649'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                        'price_bg_color' => array('#404D43', '#404D43', '#404D43', '#404D43', '#404D43'),
                        'arp_button_hover_font_color' => array('', '#444649'),
                        'arp_header_hover_font_color' => array('', '#404d43'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#605f5f'),
                        'arp_body_font_hover_color' => array('', '#24B968'),
                        'arp_body_even_font_hover_color' => array('', '#494c4f'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'orange' => array(
                    'arp_price_background' => array('#e87c3c', '#e87c3c', '#e87c3c', '#e87c3c', '#e87c3c'),
                    'arp_header_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_footer_background' => array('#e87c3c', '#e87c3c', '#e87c3c', '#e87c3c', '#e87c3c'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                    'arp_header_font_color' => array('', '#e87c3c'),
                    'arp_price_value_color' => array('', '#ffffff'),
//                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#605f5f'),
                    'arp_button_font_color' => array('', '#444649'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                        'price_bg_color' => array('#4d443b', '#4d443b', '#4d443b', '#4d443b', '#4d443b'),
                        'arp_button_hover_font_color' => array('', '#444649'),
                        'arp_header_hover_font_color' => array('', '#4d443b'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#605f5f'),
                        'arp_body_font_hover_color' => array('', '#e87C3C'),
                        'arp_body_even_font_hover_color' => array('', '#494c4f'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'red' => array(
                    'arp_price_background' => array('#e84c3d', '#e84c3d', '#e84c3d', '#e84c3d', '#e84c3d'),
                    'arp_header_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_footer_background' => array('#e84c3d', '#e84c3d', '#e84c3d', '#e84c3d', '#e84c3d'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                    'arp_header_font_color' => array('', '#e84c3d'),
                    'arp_price_value_color' => array('', '#ffffff'),
//                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#605f5f'),
                    'arp_button_font_color' => array('', '#444649'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                        'price_bg_color' => array('#39434d', '#39434d', '#39434d', '#39434d', '#39434d'),
                        'arp_button_hover_font_color' => array('', '#444649'),
                        'arp_header_hover_font_color' => array('', '#39434d'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#605f5f'),
                        'arp_body_font_hover_color' => array('', '#e84c3d'),
                        'arp_body_even_font_hover_color' => array('', '#494c4f'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'teal' => array(
                    'arp_price_background' => array('#6dbebf', '#6dbebf', '#6dbebf', '#6dbebf', '#6dbebf'),
                    'arp_header_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_footer_background' => array('#6dbebf', '#6dbebf', '#6dbebf', '#6dbebf', '#6dbebf'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                    'arp_header_font_color' => array('', '#6dbebf'),
                    'arp_price_value_color' => array('', '#ffffff'),
//                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#605f5f'),
                    'arp_button_font_color' => array('', '#444649'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                        'price_bg_color' => array('#39484D', '#39484D', '#39484D', '#39484D', '#39484D'),
                        'arp_button_hover_font_color' => array('', '#444649'),
                        'arp_header_hover_font_color' => array('', '#39484D'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#605f5f'),
                        'arp_body_font_hover_color' => array('', '#6dbebf'),
                        'arp_body_even_font_hover_color' => array('', '#494c4f'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'yellow' => array(
                    'arp_price_background' => array('#ebbf44', '#ebbf44', '#ebbf44', '#ebbf44', '#ebbf44'),
                    'arp_header_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_footer_background' => array('#ebbf44', '#ebbf44', '#ebbf44', '#ebbf44', '#ebbf44'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                    'arp_header_font_color' => array('', '#ebbf44'),
                    'arp_price_value_color' => array('', '#ffffff'),
//                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#605f5f'),
                    'arp_button_font_color' => array('', '#444649'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                        'price_bg_color' => array('#595853', '#595853', '#595853', '#595853', '#595853'),
                        'arp_button_hover_font_color' => array('', '#444649'),
                        'arp_header_hover_font_color' => array('', '#595853'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#605f5f'),
                        'arp_body_font_hover_color' => array('', '#EBBF44'),
                        'arp_body_even_font_hover_color' => array('', '#494c4f'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'blue' => array(
                    'arp_price_background' => array('#316493', '#316493', '#316493', '#316493', '#316493'),
                    'arp_header_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_footer_background' => array('#316493', '#316493', '#316493', '#316493', '#316493'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                    'arp_header_font_color' => array('', '#316493'),
                    'arp_price_value_color' => array('', '#ffffff'),
//                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#605f5f'),
                    'arp_button_font_color' => array('', '#444649'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                        'price_bg_color' => array('#63686E', '#63686E', '#63686E', '#63686E', '#63686E'),
                        'arp_button_hover_font_color' => array('', '#444649'),
                        'arp_header_hover_font_color' => array('', '#63686E'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#605f5f'),
                        'arp_body_font_hover_color' => array('', '#316493'),
                        'arp_body_even_font_hover_color' => array('', '#494c4f'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'darkgreen' => array(
                    'arp_price_background' => array('#7fb45c', '#7fb45c', '#7fb45c', '#7fb45c', '#7fb45c'),
                    'arp_header_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_footer_background' => array('#7fb45c', '#7fb45c', '#7fb45c', '#7fb45c', '#7fb45c'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                    'arp_header_font_color' => array('', '#7fb45c'),
                    'arp_price_value_color' => array('', '#ffffff'),
//                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#605f5f'),
                    'arp_button_font_color' => array('', '#444649'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                        'price_bg_color' => array('#63645C', '#63645C', '#63645C', '#63645C', '#63645C'),
                        'arp_button_hover_font_color' => array('', '#444649'),
                        'arp_header_hover_font_color' => array('', '#63645C'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#605f5f'),
                        'arp_body_font_hover_color' => array('', '#7FB45C'),
                        'arp_body_even_font_hover_color' => array('', '#494c4f'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'maroon' => array(
                    'arp_price_background' => array('#9a272a', '#9a272a', '#9a272a', '#9a272a', '#9a272a'),
                    'arp_header_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_footer_background' => array('#9a272a', '#9a272a', '#9a272a', '#9a272a', '#9a272a'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                    'arp_header_font_color' => array('', '#9a272a'),
                    'arp_price_value_color' => array('', '#ffffff'),
//                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#605f5f'),
                    'arp_button_font_color' => array('', '#444649'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_hover_color' => array('column_bg_color' => '#404D43',
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                        'price_bg_color' => array('#36312D', '#36312D', '#36312D', '#36312D', '#36312D'),
                        'arp_button_hover_font_color' => array('', '#444649'),
                        'arp_header_hover_font_color' => array('', '#36312D'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#605f5f'),
                        'arp_body_font_hover_color' => array('', '#9A272A'),
                        'arp_body_even_font_hover_color' => array('', '#494c4f'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'purple' => array(
                    'arp_price_background' => array('#6f4786', '#6f4786', '#6f4786', '#6f4786', '#6f4786'),
                    'arp_header_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_footer_background' => array('#6f4786', '#6f4786', '#6f4786', '#6f4786', '#6f4786'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                    'arp_header_font_color' => array('', '#6f4786'),
                    'arp_price_value_color' => array('', '#ffffff'),
//                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#605f5f'),
                    'arp_button_font_color' => array('', '#444649'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2', '#EBEFF2'),
                        'price_bg_color' => array('#60636C', '#60636C', '#60636C', '#60636C', '#60636C'),
                        'arp_button_hover_font_color' => array('', '#444649'),
                        'arp_header_hover_font_color' => array('', '#60636C'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#605f5f'),
                        'arp_body_font_hover_color' => array('', '#6F4786'),
                        'arp_body_even_font_hover_color' => array('', '#494c4f'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_price_background' => '',
                    'arp_header_background' => '',
                    'arp_desc_background' => '',
                    'arp_button_background' => '',
                    'arp_footer_background' => '',
                    'arp_body_odd_row_background_color' => '',
                    'arp_body_even_row_background_color' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
//                    'arp_price_duration_color' => '',
                    'arp_desc_font_color' => '',
                    'arp_button_font_color' => '',
                    'arp_footer_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'button_bg_color' => '',
                        'header_bg_color' => '',
                        'arp_desc_hover_background' => '',
                        'price_bg_color' => '',
                        'arp_body_odd_row_hover_background_color' => '',
                        'arp_body_even_row_hover_background_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_price_duration_hover_color' => '',
                        'arp_desc_hover_font_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                        'arp_footer_hover_font_color' => '',
                    ),
                )
            ),
            'arptemplate_4' => array(
                'darkgreen' => array(
                    'arp_footer_background' => array('#ffffff', '#28ae4d', '#28ae4d', '#28ae4d', '#28ae4d', '#28ae4d'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_background' => array('#f7f7f7', '#28ae4d', '#28ae4d', '#28ae4d', '#28ae4d', '#28ae4d'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#f6fcf8'),
                    'arp_body_even_row_background_color' => array('#d9ffe3'),
                    'arp_body_caption_odd_row_bg_color' => array('#ffffff'),
                    'arp_body_caption_even_row_bg_color' => array('#f7f7f7'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#353738'),
//                    'arp_price_duration_color' => array('', '#363535'),
                    'arp_button_font_color' => array('', '#353738'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#323232'),
                    'arp_body_even_font_color' => array('', '#323232'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('', '#28ae4d', '#28ae4d', '#28ae4d', '#28ae4d', '#28ae4d'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#28ae4d'),
                        'arp_body_even_row_hover_background_color' => array('#28ae4d'),
                        'footer_bg_color' => array('', '#28ae4d', '#28ae4d', '#28ae4d', '#28ae4d', '#28ae4d'),
                        'arp_button_hover_font_color' => array('', '#353738'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#353738'),
                        'arp_price_duration_hover_color' => array('', '#363535'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'darkred' => array(
                    'arp_footer_background' => array('#ffffff', '#ec4152', '#ec4152', '#ec4152', '#ec4152', '#ec4152'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_background' => array('#f7f7f7', '#ec4152', '#ec4152', '#ec4152', '#ec4152', '#ec4152'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#fef9fa'),
                    'arp_body_even_row_background_color' => array('#fbf0f1'),
                    'arp_body_caption_odd_row_bg_color' => array('#ffffff'),
                    'arp_body_caption_even_row_bg_color' => array('#f7f7f7'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#353738'),
//                    'arp_price_duration_color' => array('', '#363535'),
                    'arp_button_font_color' => array('', '#353738'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#323232'),
                    'arp_body_even_font_color' => array('', '#323232'),
                    'arp_hover_color' => array('column_bg_color' => '#ec4152',
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('', '#ec4152', '#ec4152', '#ec4152', '#ec4152', '#ec4152'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ec4152'),
                        'arp_body_even_row_hover_background_color' => array('#ec4152'),
                        'footer_bg_color' => array('', '#ec4152', '#ec4152', '#ec4152', '#ec4152', '#ec4152'),
                        'arp_button_hover_font_color' => array('', '#353738'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#353738'),
                        'arp_price_duration_hover_color' => array('', '#363535'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'green' => array(
                    'arp_footer_background' => array('#f7f7f7', '#2bc489', '#2bc489', '#2bc489', '#2bc489', '#2bc489'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_background' => array('#f7f7f7', '#2bc489', '#2bc489', '#2bc489', '#2bc489', '#2bc489'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#f7fffc'),
                    'arp_body_even_row_background_color' => array('#dffcf2'),
                    'arp_body_caption_odd_row_bg_color' => array('#ffffff'),
                    'arp_body_caption_even_row_bg_color' => array('#f7f7f7'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#353738'),
//                    'arp_price_duration_color' => array('', '#363535'),
                    'arp_button_font_color' => array('', '#353738'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#323232'),
                    'arp_body_even_font_color' => array('', '#323232'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('', '#2bc489', '#2bc489', '#2bc489', '#2bc489', '#2bc489'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#2bc489'),
                        'arp_body_even_row_hover_background_color' => array('#2bc489'),
                        'footer_bg_color' => array('', '#2bc489', '#2bc489', '#2bc489', '#2bc489', '#2bc489'),
                        'arp_button_hover_font_color' => array('', '#353738'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#353738'),
                        'arp_price_duration_hover_color' => array('', '#363535'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'blue' => array(
                    'arp_footer_background' => array('#ffffff', '#0084ff', '#0084ff', '#0084ff', '#0084ff', '#0084ff'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_background' => array('#f7f7f7', '#0084ff', '#0084ff', '#0084ff', '#0084ff', '#0084ff'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#f8fcff'),
                    'arp_body_even_row_background_color' => array('#e3f1fe'),
                    'arp_body_caption_odd_row_bg_color' => array('#ffffff'),
                    'arp_body_caption_even_row_bg_color' => array('#f7f7f7'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#353738'),
//                    'arp_price_duration_color' => array('', '#363535'),
                    'arp_button_font_color' => array('', '#353738'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#323232'),
                    'arp_body_even_font_color' => array('', '#323232'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('', '#0084ff', '#0084ff', '#0084ff', '#0084ff', '#0084ff'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#0084ff'),
                        'arp_body_even_row_hover_background_color' => array('#0084ff'),
                        'footer_bg_color' => array('', '#0084ff', '#0084ff', '#0084ff', '#0084ff', '#0084ff'),
                        'arp_button_hover_font_color' => array('', '#353738'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#353738'),
                        'arp_price_duration_hover_color' => array('', '#363535'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'pink' => array(
                    'arp_footer_background' => array('#ffffff', '#f50d7b', '#f50d7b', '#f50d7b', '#f50d7b', '#f50d7b'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_background' => array('#f7f7f7', '#f50d7b', '#f50d7b', '#f50d7b', '#f50d7b', '#f50d7b'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#fffbfc'),
                    'arp_body_even_row_background_color' => array('#ffe9f5'),
                    'arp_body_caption_odd_row_bg_color' => array('#ffffff'),
                    'arp_body_caption_even_row_bg_color' => array('#f7f7f7'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#353738'),
//                    'arp_price_duration_color' => array('', '#363535'),
                    'arp_button_font_color' => array('', '#353738'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#323232'),
                    'arp_body_even_font_color' => array('', '#323232'),
                    'arp_hover_color' => array('column_bg_color' => '#ff2e1d',
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('', '#f50d7b', '#f50d7b', '#f50d7b', '#f50d7b', '#f50d7b'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#f50d7b'),
                        'arp_body_even_row_hover_background_color' => array('#f50d7b'),
                        'footer_bg_color' => array('', '#f50d7b', '#f50d7b', '#f50d7b', '#f50d7b', '#f50d7b'),
                        'arp_button_hover_font_color' => array('', '#353738'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#353738'),
                        'arp_price_duration_hover_color' => array('', '#363535'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'violet' => array(
                    'arp_footer_background' => array('#ffffff', '#4a148c', '#4a148c', '#4a148c', '#4a148c', '#4a148c'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_background' => array('#f7f7f7', '#4a148c', '#4a148c', '#4a148c', '#4a148c', '#4a148c'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#fcfcfe'),
                    'arp_body_even_row_background_color' => array('#f7eeff'),
                    'arp_body_caption_odd_row_bg_color' => array('#ffffff'),
                    'arp_body_caption_even_row_bg_color' => array('#f7f7f7'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#353738'),
                    'arp_price_duration_color' => array('', '#363535'),
                    'arp_button_font_color' => array('', '#353738'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#323232'),
                    'arp_body_even_font_color' => array('', '#323232'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('', '#4a148c', '#4a148c', '#4a148c', '#4a148c', '#4a148c'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#4a148c'),
                        'arp_body_even_row_hover_background_color' => array('#4a148c'),
                        'footer_bg_color' => array('', '#4a148c', '#4a148c', '#4a148c', '#4a148c', '#4a148c'),
                        'arp_button_hover_font_color' => array('', '#353738'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#353738'),
                        'arp_price_duration_hover_color' => array('', '#363535'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'orange' => array(
                    'arp_footer_background' => array('#ffffff', '#ff7510', '#ff7510', '#ff7510', '#ff7510', '#ff7510'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_background' => array('#f7f7f7', '#ff7510', '#ff7510', '#ff7510', '#ff7510', '#ff7510'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#fff7f2'),
                    'arp_body_even_row_background_color' => array('#feece0'),
                    'arp_body_caption_odd_row_bg_color' => array('#ffffff'),
                    'arp_body_caption_even_row_bg_color' => array('#f7f7f7'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#353738'),
                    'arp_price_duration_color' => array('', '#363535'),
                    'arp_button_font_color' => array('', '#353738'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#323232'),
                    'arp_body_even_font_color' => array('', '#323232'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('', '#ff7510', '#ff7510', '#ff7510', '#ff7510', '#ff7510'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ff7510'),
                        'arp_body_even_row_hover_background_color' => array('#ff7510'),
                        'footer_bg_color' => array('', '#ff7510', '#ff7510', '#ff7510', '#ff7510', '#ff7510'),
                        'arp_button_hover_font_color' => array('', '#353738'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#353738'),
                        'arp_price_duration_hover_color' => array('', '#363535'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'skyblue' => array(
                    'arp_footer_background' => array('#ffffff', '#48c8f5', '#48c8f5', '#48c8f5', '#48c8f5', '#48c8f5'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_background' => array('#f7f7f7', '#48c8f5', '#48c8f5', '#48c8f5', '#48c8f5', '#48c8f5'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#f8fcff'),
                    'arp_body_even_row_background_color' => array('#e2f6ff'),
                    'arp_body_caption_odd_row_bg_color' => array('#ffffff'),
                    'arp_body_caption_even_row_bg_color' => array('#f7f7f7'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#353738'),
                    'arp_price_duration_color' => array('', '#363535'),
                    'arp_button_font_color' => array('', '#353738'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#323232'),
                    'arp_body_even_font_color' => array('', '#323232'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('', '#48c8f5', '#48c8f5', '#48c8f5', '#48c8f5', '#48c8f5'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#48c8f5'),
                        'arp_body_even_row_hover_background_color' => array('#48c8f5'),
                        'footer_bg_color' => array('', '#48c8f5', '#48c8f5', '#48c8f5', '#48c8f5', '#48c8f5'),
                        'arp_button_hover_font_color' => array('', '#353738'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#353738'),
                        'arp_price_duration_hover_color' => array('', '#363535'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'lightblue' => array(
                    'arp_footer_background' => array('#ffffff', '#626cef', '#626cef', '#626cef', '#626cef', '#626cef'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_background' => array('#f4f4f4', '#626cef', '#626cef', '#626cef', '#626cef', '#626cef'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#f8f9fe'),
                    'arp_body_even_row_background_color' => array('#e7e8fc'),
                    'arp_body_caption_odd_row_bg_color' => array('#ffffff'),
                    'arp_body_caption_even_row_bg_color' => array('#f7f7f7'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#353738'),
                    'arp_price_duration_color' => array('', '#363535'),
                    'arp_button_font_color' => array('', '#353738'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#323232'),
                    'arp_body_even_font_color' => array('', '#323232'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('', '#626cef', '#626cef', '#626cef', '#626cef', '#626cef'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#626cef'),
                        'arp_body_even_row_hover_background_color' => array('#626cef'),
                        'footer_bg_color' => array('', '#626cef', '#626cef', '#626cef', '#626cef', '#626cef'),
                        'arp_button_hover_font_color' => array('', '#353738'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#353738'),
                        'arp_price_duration_hover_color' => array('', '#363535'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'yellow' => array(
                    'arp_footer_background' => array('#ffffff', '#ffcc00', '#ffcc00', '#ffcc00', '#ffcc00', '#ffcc00'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_background' => array('#f4f4f4', '#ffcc00', '#ffcc00', '#ffcc00', '#ffcc00', '#ffcc00'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#fffef9'),
                    'arp_body_even_row_background_color' => array('#fef7dd'),
                    'arp_body_caption_odd_row_bg_color' => array('#ffffff'),
                    'arp_body_caption_even_row_bg_color' => array('#f7f7f7'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#353738'),
                    'arp_price_duration_color' => array('', '#363535'),
                    'arp_button_font_color' => array('', '#353738'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#323232'),
                    'arp_body_even_font_color' => array('', '#323232'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('', '#ffcc00', '#ffcc00', '#ffcc00', '#ffcc00', '#ffcc00'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffcc00'),
                        'arp_body_even_row_hover_background_color' => array('#ffcc00'),
                        'footer_bg_color' => array('', '#ffcc00', '#ffcc00', '#ffcc00', '#ffcc00', '#ffcc00'),
                        'arp_button_hover_font_color' => array('', '#353738'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#353738'),
                        'arp_price_duration_hover_color' => array('', '#363535'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'darkpink' => array(
                    'arp_footer_background' => array('#ffffff', '#ad1457', '#ad1457', '#ad1457', '#ad1457', '#ad1457'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_background' => array('#f4f4f4', '#ad1457', '#ad1457', '#ad1457', '#ad1457', '#ad1457'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#fffbfC'),
                    'arp_body_even_row_background_color' => array('#ffe3f1'),
                    'arp_body_caption_odd_row_bg_color' => array('#ffffff'),
                    'arp_body_caption_even_row_bg_color' => array('#f7f7f7'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#353738'),
                    'arp_price_duration_color' => array('', '#363535'),
                    'arp_button_font_color' => array('', '#353738'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#323232'),
                    'arp_body_even_font_color' => array('', '#323232'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('', '#ad1457', '#ad1457', '#ad1457', '#ad1457', '#ad1457'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ad1457'),
                        'arp_body_even_row_hover_background_color' => array('#ad1457'),
                        'footer_bg_color' => array('', '#ad1457', '#ad1457', '#ad1457', '#ad1457', '#ad1457'),
                        'arp_button_hover_font_color' => array('', '#353738'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#353738'),
                        'arp_price_duration_hover_color' => array('', '#363535'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'darkblue' => array(
                    'arp_footer_background' => array('#ffffff', '#112b50', '#112b50', '#112b50', '#112b50', '#112b50'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_background' => array('#f4f4f4', '#112b50', '#112b50', '#112b50', '#112b50', '#112b50'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#fafbff'),
                    'arp_body_even_row_background_color' => array('#e3efff'),
                    'arp_body_caption_odd_row_bg_color' => array('#ffffff'),
                    'arp_body_caption_even_row_bg_color' => array('#f7f7f7'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#353738'),
                    'arp_price_duration_color' => array('', '#363535'),
                    'arp_button_font_color' => array('', '#353738'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#323232'),
                    'arp_body_even_font_color' => array('', '#323232'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('', '#112b50', '#112b50', '#112b50', '#112b50', '#112b50'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#112b50'),
                        'arp_body_even_row_hover_background_color' => array('#112b50'),
                        'footer_bg_color' => array('', '#112b50', '#112b50', '#112b50', '#112b50', '#112b50'),
                        'arp_button_hover_font_color' => array('', '#353738'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#353738'),
                        'arp_price_duration_hover_color' => array('', '#363535'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'grayishblue' => array(
                    'arp_footer_background' => array('#ffffff', '#4a4957', '#4a4957', '#4a4957', '#4a4957', '#4a4957'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_background' => array('#f4f4f4', '#4a4957', '#4a4957', '#4a4957', '#4a4957', '#4a4957'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#fafbff'),
                    'arp_body_even_row_background_color' => array('#e6e6fe'),
                    'arp_body_caption_odd_row_bg_color' => array('#ffffff'),
                    'arp_body_caption_even_row_bg_color' => array('#f7f7f7'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#353738'),
                    'arp_price_duration_color' => array('', '#363535'),
                    'arp_button_font_color' => array('', '#353738'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#323232'),
                    'arp_body_even_font_color' => array('', '#323232'),
                    'arp_hover_color' => array('column_bg_color' => '#4a4957',
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('', '#4a4957', '#4a4957', '#4a4957', '#4a4957', '#4a4957'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#4a4957'),
                        'arp_body_even_row_hover_background_color' => array('#4a4957'),
                        'footer_bg_color' => array('', '#4a4957', '#4a4957', '#4a4957', '#4a4957', '#4a4957'),
                        'arp_button_hover_font_color' => array('', '#353738'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#353738'),
                        'arp_price_duration_hover_color' => array('', '#363535'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_footer_background' => '',
                    'arp_price_background' => '',
                    'arp_header_background' => '',
                    'arp_button_background' => '',
                    'arp_body_odd_row_background_color' => '',
                    'arp_body_even_row_background_color' => '',
                    'arp_body_caption_odd_row_bg_color' => '',
                    'arp_body_caption_even_row_bg_color' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_price_duration_color' => '',
                    'arp_button_font_color' => '',
                    'arp_footer_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'button_bg_color' => '',
                        'header_bg_color' => '',
                        'price_bg_color' => '',
                        'arp_body_odd_row_hover_background_color' => '',
                        'arp_body_even_row_hover_background_color' => '',
                        'footer_bg_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_price_duration_hover_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                        'arp_footer_hover_font_color' => '',
                    )
                )
            ),
            'arptemplate_5' => array(
                'multicolor' => array(
                    'arp_header_background' => array('#e52937', '#fbb400', '#20aeff', '#91d100', '#ff1d77'),
                    'arp_price_background' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                    'arp_button_background' => array('#e52937', '#fbb400', '#20aeff', '#91d100', '#ff1d77'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#F4F4F4'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#e52937', '#fbb400', '#20aeff', '#91d100', '#ff1d77'),
                        'header_bg_color' => array('#e52937', '#fbb400', '#20aeff', '#91d100', '#ff1d77'),
                        'price_bg_color' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#F4F4F4'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'red' => array(
                    'arp_header_background' => array('#e52937', '#e52937', '#e52937', '#e52937', '#e52937'),
                    'arp_price_background' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                    'arp_button_background' => array('#e52937', '#e52937', '#e52937', '#e52937', '#e52937'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#F4F4F4'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#e52937', '#e52937', '#e52937', '#e52937', '#e52937'),
                        'header_bg_color' => array('#e52937', '#e52937', '#e52937', '#e52937', '#e52937'),
                        'price_bg_color' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#F4F4F4'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'yellow' => array(
                    'arp_header_background' => array('#fbb400', '#fbb400', '#fbb400', '#fbb400', '#fbb400'),
                    'arp_price_background' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                    'arp_button_background' => array('#fbb400', '#fbb400', '#fbb400', '#fbb400', '#fbb400'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#F4F4F4'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#fbb400', '#fbb400', '#fbb400', '#fbb400', '#fbb400'),
                        'header_bg_color' => array('#fbb400', '#fbb400', '#fbb400', '#fbb400', '#fbb400'),
                        'price_bg_color' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#F4F4F4'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'blue' => array(
                    'arp_header_background' => array('#20aeff', '#20aeff', '#20aeff', '#20aeff', '#20aeff'),
                    'arp_price_background' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                    'arp_button_background' => array('#20aeff', '#20aeff', '#20aeff', '#20aeff', '#20aeff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#F4F4F4'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#20aeff', '#20aeff', '#20aeff', '#20aeff', '#20aeff'),
                        'header_bg_color' => array('#20aeff', '#20aeff', '#20aeff', '#20aeff', '#20aeff'),
                        'price_bg_color' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#F4F4F4'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'green' => array(
                    'arp_header_background' => array('#199800', '#199800', '#199800', '#199800', '#199800'),
                    'arp_price_background' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                    'arp_button_background' => array('#199800', '#199800', '#199800', '#199800', '#199800'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#F4F4F4'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#199800', '#199800', '#199800', '#199800', '#199800'),
                        'header_bg_color' => array('#199800', '#199800', '#199800', '#199800', '#199800'),
                        'price_bg_color' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#F4F4F4'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'violet' => array(
                    'arp_header_background' => array('#734eab', '#734eab', '#734eab', '#734eab', '#734eab'),
                    'arp_price_background' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                    'arp_button_background' => array('#734eab', '#734eab', '#734eab', '#734eab', '#734eab'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#F4F4F4'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#734eab', '#734eab', '#734eab', '#734eab', '#734eab'),
                        'header_bg_color' => array('#734eab', '#734eab', '#734eab', '#734eab', '#734eab'),
                        'price_bg_color' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#F4F4F4'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'cyan' => array(
                    'arp_header_background' => array('#00d8cd', '#00d8cd', '#00d8cd', '#00d8cd', '#00d8cd'),
                    'arp_price_background' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                    'arp_button_background' => array('#00d8cd', '#00d8cd', '#00d8cd', '#00d8cd', '#00d8cd'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#F4F4F4'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#00d8cd', '#00d8cd', '#00d8cd', '#00d8cd', '#00d8cd'),
                        'header_bg_color' => array('#00d8cd', '#00d8cd', '#00d8cd', '#00d8cd', '#00d8cd'),
                        'price_bg_color' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#F4F4F4'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'pink' => array(
                    'arp_header_background' => array('#ff1d77', '#ff1d77', '#ff1d77', '#ff1d77', '#ff1d77'),
                    'arp_price_background' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                    'arp_button_background' => array('#ff1d77', '#ff1d77', '#ff1d77', '#ff1d77', '#ff1d77'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#F4F4F4'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ff1d77', '#ff1d77', '#ff1d77', '#ff1d77', '#ff1d77'),
                        'header_bg_color' => array('#ff1d77', '#ff1d77', '#ff1d77', '#ff1d77', '#ff1d77'),
                        'price_bg_color' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#F4F4F4'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'limegreen' => array(
                    'arp_header_background' => array('#91d100', '#91d100', '#91d100', '#91d100', '#91d100'),
                    'arp_price_background' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                    'arp_button_background' => array('#91d100', '#91d100', '#91d100', '#91d100', '#91d100'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#F4F4F4'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#91d100', '#91d100', '#91d100', '#91d100', '#91d100'),
                        'header_bg_color' => array('#91d100', '#91d100', '#91d100', '#91d100', '#91d100'),
                        'price_bg_color' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#F4F4F4'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'orange' => array(
                    'arp_header_background' => array('#fe7d22', '#fe7d22', '#fe7d22', '#fe7d22', '#fe7d22'),
                    'arp_price_background' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                    'arp_button_background' => array('#fe7d22', '#fe7d22', '#fe7d22', '#fe7d22', '#fe7d22'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#F4F4F4'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#fe7d22', '#fe7d22', '#fe7d22', '#fe7d22', '#fe7d22'),
                        'header_bg_color' => array('#fe7d22', '#fe7d22', '#fe7d22', '#fe7d22', '#fe7d22'),
                        'price_bg_color' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#F4F4F4'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'darkblue' => array(
                    'arp_header_background' => array('#2f3687', '#2f3687', '#2f3687', '#2f3687', '#2f3687'),
                    'arp_price_background' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                    'arp_button_background' => array('#2f3687', '#2f3687', '#2f3687', '#2f3687', '#2f3687'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#F4F4F4'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#2f3687', '#2f3687', '#2f3687', '#2f3687', '#2f3687'),
                        'header_bg_color' => array('#2f3687', '#2f3687', '#2f3687', '#2f3687', '#2f3687'),
                        'price_bg_color' => array('#3f4448', '#3f4448', '#3f4448', '#3f4448', '#3f4448'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#F4F4F4'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_header_background' => '',
                    'arp_price_background' => '',
                    'arp_button_background' => '',
                    'arp_body_odd_row_background_color' => '',
                    'arp_body_even_row_background_color' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_price_duration_color' => '',
                    'arp_button_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'button_bg_color' => '',
                        'header_bg_color' => '',
                        'price_bg_color' => '',
                        'arp_body_odd_row_hover_background_color' => '',
                        'arp_body_even_row_hover_background_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_price_duration_hover_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                    ),
                )
            ),
            'arptemplate_6' => array(
                'green' => array(
                    'arp_header_background' => array('#79ab3a', '#87bd41', '#87bd41', '#87bd41', '#87bd41', '#87bd41'),
                    'arp_price_background' => array('#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1'),
                    'arp_button_background' => array('#87bd41', '#87bd41', '#87bd41', '#87bd41', '#87bd41', '#87bd41'),
                    'arp_footer_background' => array('#87bd41', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4'),
                    'arp_body_odd_row_background_color' => array('#f4f4f4'),
                    'arp_body_even_row_background_color' => array('#ffffff'),
                    'arp_body_caption_odd_row_bg_color' => array('#87bd41'),
                    'arp_body_caption_even_row_bg_color' => array('#79ab3a'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#7c7c7c'),
                    'arp_price_duration_color' => array('', '#7c7c7c'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#7c7c7c'),
                    'arp_body_font_color' => array('', '#7c7c7c'),
                    'arp_body_even_font_color' => array('', '#7c7c7c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                        'header_bg_color' => array('', '#5F842E', '#5F842E', '#5F842E', '#5F842E', '#5F842E',),
                        'price_bg_color' => array('', '#87bd41', '#87bd41', '#87bd41', '#87bd41', '#87bd41'),
                        'arp_body_odd_row_hover_background_color' => array('#f4f4f4'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'footer_bg_color' => array('', '#87bd41', '#87bd41', '#87bd41', '#87bd41', '#87bd41'),
                        'arp_button_hover_font_color' => array('', '#d83306'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#7c7c7c'),
                        'arp_body_even_font_hover_color' => array('', '#7c7c7c'),
                        'arp_footer_hover_font_color' => array('', '#7c7c7c'),
                    ),
                ),
                'blue' => array(
                    'arp_header_background' => array('#2592bd', '#29a1d3', '#29a1d3', '#29a1d3', '#29a1d3', '#29a1d3'),
                    'arp_price_background' => array('#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1'),
                    'arp_button_background' => array('#29a1d3', '#29a1d3', '#29a1d3', '#29a1d3', '#29a1d3', '#29a1d3'),
                    'arp_footer_background' => array('#29a1d3', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4'),
                    'arp_body_odd_row_background_color' => array('#f4f4f4'),
                    'arp_body_even_row_background_color' => array('#ffffff'),
                    'arp_hover_color' => array('column_bg_color' => '#29a1d3'),
                    'arp_body_caption_odd_row_bg_color' => array('#2592bd'),
                    'arp_body_caption_even_row_bg_color' => array('#29a1d3'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#7c7c7c'),
                    'arp_price_duration_color' => array('', '#7c7c7c'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#7c7c7c'),
                    'arp_body_font_color' => array('', '#7c7c7c'),
                    'arp_body_even_font_color' => array('', '#7c7c7c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                        'header_bg_color' => array('', '#1D7194', '#1D7194', '#1D7194', '#1D7194', '#1D7194',),
                        'price_bg_color' => array('#2592bd', '#29a1d3', '#29a1d3', '#29a1d3', '#29a1d3', '#29a1d3'),
                        'arp_body_odd_row_hover_background_color' => array('#f4f4f4'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'footer_bg_color' => array('#2592bd', '#29a1d3', '#29a1d3', '#29a1d3', '#29a1d3', '#29a1d3'),
                        'arp_button_hover_font_color' => array('', '#d83306'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#7c7c7c'),
                        'arp_body_even_font_hover_color' => array('', '#7c7c7c'),
                        'arp_footer_hover_font_color' => array('', '#7c7c7c'),
                    ),
                ),
                'red' => array(
                    'arp_header_background' => array('#d04437', '#e84c3d', '#e84c3d', '#e84c3d', '#e84c3d', '#e84c3d'),
                    'arp_price_background' => array('#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1'),
                    'arp_button_background' => array('#e84c3d', '#e84c3d', '#e84c3d', '#e84c3d', '#e84c3d', '#e84c3d'),
                    'arp_footer_background' => array('#e84c3d', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4'),
                    'arp_body_odd_row_background_color' => array('#f4f4f4'),
                    'arp_body_even_row_background_color' => array('#ffffff'),
                    'arp_hover_color' => array('column_bg_color' => '#e84c3d'),
                    'arp_body_caption_odd_row_bg_color' => array('#d04437'),
                    'arp_body_caption_even_row_bg_color' => array('#e84c3d'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#7c7c7c'),
                    'arp_price_duration_color' => array('', '#7c7c7c'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#7c7c7c'),
                    'arp_body_font_color' => array('', '#7c7c7c'),
                    'arp_body_even_font_color' => array('', '#7c7c7c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                        'header_bg_color' => array('', '#A2352B', '#A2352B', '#A2352B', '#A2352B', '#A2352B'),
                        'price_bg_color' => array('', '#e84c3d', '#e84c3d', '#e84c3d', '#e84c3d', '#e84c3d'),
                        'arp_body_odd_row_hover_background_color' => array('#f4f4f4'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'footer_bg_color' => array('', '#e84c3d', '#e84c3d', '#e84c3d', '#e84c3d', '#e84c3d'),
                        'arp_button_hover_font_color' => array('', '#424242'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#7c7c7c'),
                        'arp_body_even_font_hover_color' => array('', '#7c7c7c'),
                        'arp_footer_hover_font_color' => array('', '#7c7c7c'),
                    ),
                ),
                'cyan' => array(
                    'arp_header_background' => array('#1cb0b4', '#1fc4c8', '#1fc4c8', '#1fc4c8', '#1fc4c8', '#1fc4c8'),
                    'arp_price_background' => array('#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1'),
                    'arp_button_background' => array('#1fc4c8', '#1fc4c8', '#1fc4c8', '#1fc4c8', '#1fc4c8', '#1fc4c8'),
                    'arp_footer_background' => array('#1fc4c8', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4'),
                    'arp_body_odd_row_background_color' => array('#f4f4f4'),
                    'arp_body_even_row_background_color' => array('#ffffff'),
                    'arp_hover_color' => array('column_bg_color' => '#1fc4c8'),
                    'arp_body_caption_odd_row_bg_color' => array('#1cb0b4'),
                    'arp_body_caption_even_row_bg_color' => array('#1fc4c8'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#7c7c7c'),
                    'arp_price_duration_color' => array('', '#7c7c7c'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#7c7c7c'),
                    'arp_body_font_color' => array('', '#7c7c7c'),
                    'arp_body_even_font_color' => array('', '#7c7c7c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                        'header_bg_color' => array('', '#16898C', '#16898C', '#16898C', '#16898C', '#16898C',),
                        'price_bg_color' => array('', '#1fc4c8', '#1fc4c8', '#1fc4c8', '#1fc4c8', '#1fc4c8'),
                        'arp_body_odd_row_hover_background_color' => array('#f4f4f4'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'footer_bg_color' => array('', '#1fc4c8', '#1fc4c8', '#1fc4c8', '#1fc4c8', '#1fc4c8'),
                        'arp_button_hover_font_color' => array('', '#d83306'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#7c7c7c'),
                        'arp_body_even_font_hover_color' => array('', '#7c7c7c'),
                        'arp_footer_hover_font_color' => array('', '#7c7c7c'),
                    ),
                ),
                'limegreen' => array(
                    'arp_header_background' => array('#29b765', '#2dcc70', '#2dcc70', '#2dcc70', '#2dcc70', '#2dcc70'),
                    'arp_price_background' => array('#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1'),
                    'arp_button_background' => array('#2dcc70', '#2dcc70', '#2dcc70', '#2dcc70', '#2dcc70', '#2dcc70'),
                    'arp_footer_background' => array('#2dcc70', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4'),
                    'arp_body_odd_row_background_color' => array('#f4f4f4'),
                    'arp_body_even_row_background_color' => array('#ffffff'),
                    'arp_hover_color' => array('column_bg_color' => '#2dcc70'),
                    'arp_body_caption_odd_row_bg_color' => array('#29b765'),
                    'arp_body_caption_even_row_bg_color' => array('#2dcc70'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#7c7c7c'),
                    'arp_price_duration_color' => array('', '#7c7c7c'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#7c7c7c'),
                    'arp_body_font_color' => array('', '#7c7c7c'),
                    'arp_body_even_font_color' => array('', '#7c7c7c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                        'header_bg_color' => array('', '#208F4E', '#208F4E', '#208F4E', '#208F4E', '#208F4E',),
                        'price_bg_color' => array('', '#2dcc70', '#2dcc70', '#2dcc70', '#2dcc70', '#2dcc70'),
                        'arp_body_odd_row_hover_background_color' => array('#f4f4f4'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'footer_bg_color' => array('', '#2dcc70', '#2dcc70', '#2dcc70', '#2dcc70', '#2dcc70'),
                        'arp_button_hover_font_color' => array('', '#424242'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#7c7c7c'),
                        'arp_body_even_font_hover_color' => array('', '#7c7c7c'),
                        'arp_footer_hover_font_color' => array('', '#7c7c7c'),
                    ),
                ),
                'darkblue' => array(
                    'arp_header_background' => array('#485c91', '#5165a2', '#5165a2', '#5165a2', '#5165a2', '#5165a2'),
                    'arp_price_background' => array('#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1'),
                    'arp_button_background' => array('#5165a2', '#5165a2', '#5165a2', '#5165a2', '#5165a2', '#5165a2'),
                    'arp_footer_background' => array('#5165a2', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4'),
                    'arp_body_odd_row_background_color' => array('#f4f4f4'),
                    'arp_body_even_row_background_color' => array('#ffffff'),
                    'arp_hover_color' => array('column_bg_color' => '#5165a2'),
                    'arp_body_caption_odd_row_bg_color' => array('#485c91'),
                    'arp_body_caption_even_row_bg_color' => array('#5165a2'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#7c7c7c'),
                    'arp_price_duration_color' => array('', '#7c7c7c'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#7c7c7c'),
                    'arp_body_font_color' => array('', '#7c7c7c'),
                    'arp_body_even_font_color' => array('', '#7c7c7c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                        'header_bg_color' => array('', '#394771', '#394771', '#394771', '#394771', '#394771',),
                        'price_bg_color' => array('', '#5165a2', '#5165a2', '#5165a2', '#5165a2', '#5165a2'),
                        'arp_body_odd_row_hover_background_color' => array('#f4f4f4'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'footer_bg_color' => array('', '#5165a2', '#5165a2', '#5165a2', '#5165a2', '#5165a2'),
                        'arp_button_hover_font_color' => array('', '#d83306'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#7c7c7c'),
                        'arp_body_even_font_hover_color' => array('', '#7c7c7c'),
                        'arp_footer_hover_font_color' => array('', '#7c7c7c'),
                    ),
                ),
                'pink' => array(
                    'arp_header_background' => array('#af1c52', '#c31f5b', '#c31f5b', '#c31f5b', '#c31f5b', '#c31f5b'),
                    'arp_price_background' => array('#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1'),
                    'arp_button_background' => array('#c31f5b', '#c31f5b', '#c31f5b', '#c31f5b', '#c31f5b', '#c31f5b'),
                    'arp_footer_background' => array('#c31f5b', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4'),
                    'arp_body_odd_row_background_color' => array('#f4f4f4'),
                    'arp_body_even_row_background_color' => array('#ffffff'),
                    'arp_hover_color' => array('column_bg_color' => '#c31f5b'),
                    'arp_body_caption_odd_row_bg_color' => array('#af1c52'),
                    'arp_body_caption_even_row_bg_color' => array('#c31f5b'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#7c7c7c'),
                    'arp_price_duration_color' => array('', '#7c7c7c'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#7c7c7c'),
                    'arp_body_font_color' => array('', '#7c7c7c'),
                    'arp_body_even_font_color' => array('', '#7c7c7c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('', '#891640', '#891640', '#891640', '#891640', '#891640'),
                        'price_bg_color' => array('', '#c31f5b', '#c31f5b', '#c31f5b', '#c31f5b', '#c31f5b'),
                        'arp_body_odd_row_hover_background_color' => array('#f4f4f4'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'footer_bg_color' => array('', '#c31f5b', '#c31f5b', '#c31f5b', '#c31f5b', '#c31f5b'),
                        'arp_button_hover_font_color' => array('', '#424242'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#7c7c7c'),
                        'arp_body_even_font_hover_color' => array('', '#7c7c7c'),
                        'arp_footer_hover_font_color' => array('', '#7c7c7c'),
                    ),
                ),
                'darkcyan' => array(
                    'arp_header_background' => array('#018e6e', '#009e7b', '#009e7b', '#009e7b', '#009e7b', '#009e7b'),
                    'arp_price_background' => array('#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1'),
                    'arp_button_background' => array('#009e7b', '#009e7b', '#009e7b', '#009e7b', '#009e7b', '#009e7b'),
                    'arp_footer_background' => array('#009e7b', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4'),
                    'arp_body_odd_row_background_color' => array('#f4f4f4'),
                    'arp_body_even_row_background_color' => array('#ffffff'),
                    'arp_hover_color' => array('column_bg_color' => '#009e7b'),
                    'arp_body_caption_odd_row_bg_color' => array('#018e6e'),
                    'arp_body_caption_even_row_bg_color' => array('#009e7b'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#7c7c7c'),
                    'arp_price_duration_color' => array('', '#7c7c7c'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#7c7c7c'),
                    'arp_body_font_color' => array('', '#7c7c7c'),
                    'arp_body_even_font_color' => array('', '#7c7c7c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('', '#006F56', '#006F56', '#006F56', '#006F56', '#006F56'),
                        'price_bg_color' => array('', '#009e7b', '#009e7b', '#009e7b', '#009e7b', '#009e7b'),
                        'arp_body_odd_row_hover_background_color' => array('#f4f4f4'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'footer_bg_color' => array('', '#009e7b', '#009e7b', '#009e7b', '#009e7b', '#009e7b'),
                        'arp_button_hover_font_color' => array('', '#d83306'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#7c7c7c'),
                        'arp_body_even_font_hover_color' => array('', '#7c7c7c'),
                        'arp_footer_hover_font_color' => array('', '#7c7c7c'),
                    ),
                ),
                'violet' => array(
                    'arp_header_background' => array('#653179', '#713887', '#713887', '#713887', '#713887', '#713887'),
                    'arp_price_background' => array('#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1'),
                    'arp_button_background' => array('#713887', '#713887', '#713887', '#713887', '#713887', '#713887'),
                    'arp_footer_background' => array('#713887', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4'),
                    'arp_body_odd_row_background_color' => array('#f4f4f4'),
                    'arp_body_even_row_background_color' => array('#ffffff'),
                    'arp_hover_color' => array('column_bg_color' => '#713887'),
                    'arp_body_caption_odd_row_bg_color' => array('#653179'),
                    'arp_body_caption_even_row_bg_color' => array('#713887'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#7c7c7c'),
                    'arp_price_duration_color' => array('', '#7c7c7c'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#7c7c7c'),
                    'arp_body_font_color' => array('', '#7c7c7c'),
                    'arp_body_even_font_color' => array('', '#7c7c7c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                        'header_bg_color' => array('', '#4F275F', '#4F275F', '#4F275F', '#4F275F', '#4F275F'),
                        'price_bg_color' => array('', '#713887', '#713887', '#713887', '#713887', '#713887'),
                        'arp_body_odd_row_hover_background_color' => array('#f4f4f4'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'footer_bg_color' => array('', '#713887', '#713887', '#713887', '#713887', '#713887'),
                        'arp_button_hover_font_color' => array('', '#d83306'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#7c7c7c'),
                        'arp_body_even_font_hover_color' => array('', '#7c7c7c'),
                        'arp_footer_hover_font_color' => array('', '#7c7c7c'),
                    ),
                ),
                'black' => array(
                    'arp_header_background' => array('#616775', '#6d7383', '#6d7383', '#6d7383', '#6d7383', '#6d7383'),
                    'arp_price_background' => array('#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1', '#f1f1f1'),
                    'arp_button_background' => array('#6d7383', '#6d7383', '#6d7383', '#6d7383', '#6d7383', '#6d7383'),
                    'arp_footer_background' => array('#6d7383', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#f4f4f4'),
                    'arp_body_odd_row_background_color' => array('#f4f4f4'),
                    'arp_body_even_row_background_color' => array('#ffffff'),
                    'arp_hover_color' => array('column_bg_color' => '#6d7383'),
                    'arp_body_caption_odd_row_bg_color' => array('#616775'),
                    'arp_body_caption_even_row_bg_color' => array('#6d7383'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#7c7c7c'),
                    'arp_price_duration_color' => array('', '#7c7c7c'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#7c7c7c'),
                    'arp_body_font_color' => array('', '#7c7c7c'),
                    'arp_body_even_font_color' => array('', '#7c7c7c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                        'header_bg_color' => array('', '#4C515C', '#4C515C', '#4C515C', '#4C515C', '#4C515C'),
                        'price_bg_color' => array('', '#6d7383', '#6d7383', '#6d7383', '#6d7383', '#6d7383'),
                        'arp_body_odd_row_hover_background_color' => array('#f4f4f4'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'footer_bg_color' => array('', '#6d7383', '#6d7383', '#6d7383', '#6d7383', '#6d7383'),
                        'arp_button_hover_font_color' => array('', '#d83306'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#7c7c7c'),
                        'arp_body_even_font_hover_color' => array('', '#7c7c7c'),
                        'arp_footer_hover_font_color' => array('', '#7c7c7c'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_header_background' => '',
                    'arp_price_background' => '',
                    'arp_button_background' => '',
                    'arp_footer_background' => '',
                    'arp_body_odd_row_background_color' => '',
                    'arp_body_even_row_background_color' => '',
                    'arp_body_caption_odd_row_bg_color' => '',
                    'arp_body_caption_even_row_bg_color' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_price_duration_color' => '',
                    'arp_desc_font_color' => '',
                    'arp_button_font_color' => '',
                    'arp_footer_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'button_bg_color' => '',
                        'header_bg_color' => '',
                        'price_bg_color' => '',
                        'arp_body_odd_row_hover_background_color' => '',
                        'arp_body_even_row_hover_background_color' => '',
                        'footer_bg_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_price_duration_hover_color' => '',
                        'arp_desc_hover_font_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                        'arp_footer_hover_font_color' => '',
                    ),
                )
            ),
            'arptemplate_7' => array(
                'blue' => array(
                    'arp_header_background' => array('#000000'),
                    'arp_button_background' => array('#3473dc'),
                    'arp_desc_background' => array('#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f2f2f2'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#3e3e3c'),
                    'arp_price_duration_color' => array('', '#898989'),
                    'arp_desc_font_color' => array('', '#7c7c7c'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3E3E3C'),
                        'header_bg_color' => array('#000000'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f2f2f2'),
                        'arp_desc_hover_background' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#3e3e3c'),
                        'arp_price_duration_hover_color' => array('', '#898989'),
                        'arp_desc_hover_font_color' => array('', '#7c7c7c'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'black' => array(
                    'arp_header_background' => array('#000000'),
                    'arp_button_background' => array('#3e3e3c'),
                    'arp_desc_background' => array('#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f2f2f2'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#3e3e3c'),
                    'arp_price_duration_color' => array('', '#898989'),
                    'arp_desc_font_color' => array('', '#7c7c7c'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3E3E3C'),
                        'header_bg_color' => array('#000000'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f2f2f2'),
                        'arp_desc_hover_background' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#3e3e3c'),
                        'arp_price_duration_hover_color' => array('', '#898989'),
                        'arp_desc_hover_font_color' => array('', '#7c7c7c'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'cyan' => array(
                    'arp_header_background' => array('#000000'),
                    'arp_button_background' => array('#1eae8b'),
                    'arp_desc_background' => array('#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f2f2f2'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#3e3e3c'),
                    'arp_price_duration_color' => array('', '#898989'),
                    'arp_desc_font_color' => array('', '#7c7c7c'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3E3E3C',),
                        'header_bg_color' => array('#000000'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f2f2f2'),
                        'arp_desc_hover_background' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#3e3e3c'),
                        'arp_price_duration_hover_color' => array('', '#898989'),
                        'arp_desc_hover_font_color' => array('', '#7c7c7c'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'lightblue' => array(
                    'arp_header_background' => array('#000000'),
                    'arp_button_background' => array('#1bace1'),
                    'arp_desc_background' => array('#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f2f2f2'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#3e3e3c'),
                    'arp_price_duration_color' => array('', '#898989'),
                    'arp_desc_font_color' => array('', '#7c7c7c'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3E3E3C'),
                        'header_bg_color' => array('#000000'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f2f2f2'),
                        'arp_desc_hover_background' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#3e3e3c'),
                        'arp_price_duration_hover_color' => array('', '#898989'),
                        'arp_desc_hover_font_color' => array('', '#7c7c7c'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'red' => array(
                    'arp_header_background' => array('#000000'),
                    'arp_button_background' => array('#f33c3e'),
                    'arp_desc_background' => array('#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f2f2f2'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#3e3e3c'),
                    'arp_price_duration_color' => array('', '#898989'),
                    'arp_desc_font_color' => array('', '#7c7c7c'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3E3E3C'),
                        'header_bg_color' => array('#000000'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f2f2f2'),
                        'arp_desc_hover_background' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#3e3e3c'),
                        'arp_price_duration_hover_color' => array('', '#898989'),
                        'arp_desc_hover_font_color' => array('', '#7c7c7c'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'yellow' => array(
                    'arp_header_background' => array('#000000'),
                    'arp_button_background' => array('#ffa800'),
                    'arp_desc_background' => array('#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f2f2f2'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#3e3e3c'),
                    'arp_price_duration_color' => array('', '#898989'),
                    'arp_desc_font_color' => array('', '#7c7c7c'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3E3E3C'),
                        'header_bg_color' => array('#000000'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f2f2f2'),
                        'arp_desc_hover_background' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#3e3e3c'),
                        'arp_price_duration_hover_color' => array('', '#898989'),
                        'arp_desc_hover_font_color' => array('', '#7c7c7c'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'olive' => array(
                    'arp_header_background' => array('#000000'),
                    'arp_button_background' => array('#8fb021'),
                    'arp_desc_background' => array('#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f2f2f2'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#3e3e3c'),
                    'arp_price_duration_color' => array('', '#898989'),
                    'arp_desc_font_color' => array('', '#7c7c7c'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3E3E3C'),
                        'header_bg_color' => array('#000000'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f2f2f2'),
                        'arp_desc_hover_background' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#3e3e3c'),
                        'arp_price_duration_hover_color' => array('', '#898989'),
                        'arp_desc_hover_font_color' => array('', '#7c7c7c'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'darkpurple' => array(
                    'arp_header_background' => array('#000000'),
                    'arp_button_background' => array('#5b48a2'),
                    'arp_desc_background' => array('#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f2f2f2'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#3e3e3c'),
                    'arp_price_duration_color' => array('', '#898989'),
                    'arp_desc_font_color' => array('', '#7c7c7c'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3E3E3C'),
                        'header_bg_color' => array('#000000'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f2f2f2'),
                        'arp_desc_hover_background' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#3e3e3c'),
                        'arp_price_duration_hover_color' => array('', '#898989'),
                        'arp_desc_hover_font_color' => array('', '#7c7c7c'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'darkred' => array(
                    'arp_header_background' => array('#000000'),
                    'arp_button_background' => array('#79302a'),
                    'arp_desc_background' => array('#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f2f2f2'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#3e3e3c'),
                    'arp_price_duration_color' => array('', '#898989'),
                    'arp_desc_font_color' => array('', '#7c7c7c'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3E3E3C'),
                        'header_bg_color' => array('#000000'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f2f2f2'),
                        'arp_desc_hover_background' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#3e3e3c'),
                        'arp_price_duration_hover_color' => array('', '#898989'),
                        'arp_desc_hover_font_color' => array('', '#7c7c7c'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'pink' => array(
                    'arp_header_background' => array('#000000'),
                    'arp_button_background' => array('#ed1374'),
                    'arp_desc_background' => array('#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f2f2f2'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#3e3e3c'),
                    'arp_price_duration_color' => array('', '#898989'),
                    'arp_desc_font_color' => array('', '#7c7c7c'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3E3E3C'),
                        'header_bg_color' => array('#000000'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f2f2f2'),
                        'arp_desc_hover_background' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#3e3e3c'),
                        'arp_price_duration_hover_color' => array('', '#898989'),
                        'arp_desc_hover_font_color' => array('', '#7c7c7c'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'brown' => array(
                    'arp_header_background' => array('#000000'),
                    'arp_button_background' => array('#b11d00'),
                    'arp_desc_background' => array('#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f2f2f2'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#3e3e3c'),
                    'arp_price_duration_color' => array('', '#898989'),
                    'arp_desc_font_color' => array('', '#7c7c7c'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3E3E3C'),
                        'header_bg_color' => array('#000000'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#f2f2f2'),
                        'arp_desc_hover_background' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#3e3e3c'),
                        'arp_price_duration_hover_color' => array('', '#898989'),
                        'arp_desc_hover_font_color' => array('', '#7c7c7c'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_header_background' => '',
                    'arp_button_background' => '',
                    'arp_desc_background' => '',
                    'arp_body_odd_row_background_color' => '',
                    'arp_body_even_row_background_color' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_price_duration_color' => '',
                    'arp_desc_font_color' => '',
                    'arp_button_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'button_bg_color' => '',
                        'header_bg_color' => '',
                        'arp_body_odd_row_hover_background_color' => '',
                        'arp_body_even_row_hover_background_color' => '',
                        'arp_desc_hover_background' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_price_duration_hover_color' => '',
                        'arp_desc_hover_font_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                    ),
                ),
            ),
            'arptemplate_8' => array(
                'multicolor' => array(
                    //'arp_price_background' => array('#d12413', '#378017', '#1c1c72', '#cc8d1b', '#227aa8'),
                    'arp_header_background' => array('#e92a4b', '#21c77b', '#ffc000', '#52c4ff', '#528fff'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f7f8fa'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#323232'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#000000'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#e92a4b', '#21c77b', '#ffc000', '#52c4ff', '#528fff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#323232'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'purple' => array(
                    //'arp_price_background' => array('#761db5', '#761db5', '#761db5', '#761db5', '#761db5'),
                    'arp_header_background' => array('#A461D4', '#A461D4', '#A461D4', '#A461D4', '#A461D4'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f7f8fa'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#323232'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#000000'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#A461D4', '#A461D4', '#A461D4', '#A461D4', '#A461D4'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#323232'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'skyblue' => array(
                    //'arp_price_background' => array('#227aa8', '#227aa8', '#227aa8', '#227aa8', '#227aa8'),
                    'arp_header_background' => array('#3AAFE2', '#3AAFE2', '#3AAFE2', '#3AAFE2', '#3AAFE2'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f7f8fa'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#323232'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#000000'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#3AAFE2', '#3AAFE2', '#3AAFE2', '#3AAFE2', '#3AAFE2'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#323232'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'red' => array(
                    //'arp_price_background' => array('#c42122', '#c42122', '#c42122', '#c42122', '#c42122'),
                    'arp_header_background' => array('#EE4546', '#EE4546', '#EE4546', '#EE4546', '#EE4546'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f7f8fa'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#323232'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#000000'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#EE4546', '#EE4546', '#EE4546', '#EE4546', '#EE4546'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#323232'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'green' => array(
                    //'arp_price_background' => array('#378017', '#378017', '#378017', '#378017', '#378017'),
                    'arp_header_background' => array('#6CB03B', '#6CB03B', '#6CB03B', '#6CB03B', '#6CB03B'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f7f8fa'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#323232'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#000000'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#6CB03B', '#6CB03B', '#6CB03B', '#6CB03B', '#6CB03B'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#323232'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'blue' => array(
                    // 'arp_price_background' => array('#1c1c72', '#1c1c72', '#1c1c72', '#1c1c72', '#1c1c72'),
                    'arp_header_background' => array('#4448A9', '#4448A9', '#4448A9', '#4448A9', '#4448A9'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f7f8fa'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#323232'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#000000'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#4448A9', '#4448A9', '#4448A9', '#4448A9', '#4448A9'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#323232'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'orange' => array(
                    //'arp_price_background' => array('#d12413', '#d12413', '#d12413', '#d12413', '#d12413'),
                    'arp_header_background' => array('#FF5830', '#FF5830', '#FF5830', '#FF5830', '#FF5830'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#323232'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#000000'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#FF5830', '#FF5830', '#FF5830', '#FF5830', '#FF5830'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#323232'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'darkcyan' => array(
                    //'arp_price_background' => array('#129873', '#129873', '#129873', '#129873', '#129873'),
                    'arp_header_background' => array('#41C0A1', '#41C0A1', '#41C0A1', '#41C0A1', '#41C0A1'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f7f8fa'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#323232'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#000000'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#41C0A1', '#41C0A1', '#41C0A1', '#41C0A1', '#41C0A1'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#323232'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'yellow' => array(
                    // 'arp_price_background' => array('#cc8d1b', '#cc8d1b', '#cc8d1b', '#cc8d1b', '#cc8d1b'),
                    'arp_header_background' => array('#FFBF3B', '#FFBF3B', '#FFBF3B', '#FFBF3B', '#FFBF3B'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f7f8fa'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#323232'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#000000'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#FFBF3B', '#FFBF3B', '#FFBF3B', '#FFBF3B', '#FFBF3B'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#323232'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'pink' => array(
                    // 'arp_price_background' => array('#ba155a', '#ba155a', '#ba155a', '#ba155a', '#ba155a'),
                    'arp_header_background' => array('#E9338C', '#E9338C', '#E9338C', '#E9338C', '#E9338C'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f7f8fa'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#323232'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#000000'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#E9338C', '#E9338C', '#E9338C', '#E9338C', '#E9338C'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#323232'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'teal' => array(
                    //'arp_price_background' => array('#04a1a8', '#04a1a8', '#04a1a8', '#04a1a8', '#04a1a8'),
                    'arp_header_background' => array('#1EC9D1', '#1EC9D1', '#1EC9D1', '#1EC9D1', '#1EC9D1'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff'),
                    'arp_body_even_row_background_color' => array('#f7f8fa'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#323232'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#000000'),
                    'arp_shortcode_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'header_bg_color' => array('#1EC9D1', '#1EC9D1', '#1EC9D1', '#1EC9D1', '#1EC9D1'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#323232'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#000000'),
                        'arp_shortcode_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_header_background' => '',
                    'arp_button_background' => '',
                    'arp_body_odd_row_background_color' => '',
                    'arp_body_even_row_background_color' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_price_duration_color' => '',
                    'arp_button_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_body_label_font_color' => '',
                    'arp_shortcode_background' => '',
                    'arp_shortcode_font_color' => '',
                    'arp_hover_color' => array(
                        'button_bg_color' => '',
                        'header_bg_color' => '',
                        'arp_body_odd_row_hover_background_color' => '',
                        'arp_body_even_row_hover_background_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_price_duration_hover_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                        'arp_body_label_font_hover_color' => '',
                        'arp_shortcode_hover_background' => '',
                        'arp_shortcode_hover_font_color' => '',
                    ),
                )
            ),
            'arptemplate_9' => array(
                'multicolor' => array(
                    'arp_header_background' => array('#EBEAEF'),
                    'arp_column_background' => array('', '#7101ad', '#cbba62', '#ad103d', '#fd7c21', '#00C140'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_caption_odd_row_bg_color' => array('#f3f3f5'),
                    'arp_body_caption_even_row_bg_color' => array('#ebeaef'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#000000'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE'),
                        'button_bg_color' => array('', '#747577', '#747577', '#747577', '#747577', '#747577'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                    ),
                ),
                'darkyellow' => array(
                    'arp_header_background' => array('#EBEAEF'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_column_background' => array('#adbb5a', '#adbb5a', '#adbb5a', '#adbb5a', '#adbb5a'),
                    'arp_body_caption_odd_row_bg_color' => array('#f3f3f5'),
                    'arp_body_caption_even_row_bg_color' => array('#ebeaef'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#000000'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE'),
                        'button_bg_color' => array('', '#747577', '#747577', '#747577', '#747577', '#747577'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                    ),
                ),
                'limegreen' => array(
                    'arp_header_background' => array('#EBEAEF'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_column_background' => array('#00c03f', '#00c03f', '#00c03f', '#00c03f', '#00c03f'),
                    'arp_body_caption_odd_row_bg_color' => array('#f3f3f5'),
                    'arp_body_caption_even_row_bg_color' => array('#ebeaef'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#000000'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE'),
                        'button_bg_color' => array('', '#747577', '#747577', '#747577', '#747577', '#747577'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                    ),
                ),
                'darkviolet' => array(
                    'arp_header_background' => array('#EBEAEF'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_column_background' => array('#7200ad', '#7200ad', '#7200ad', '#7200ad', '#7200ad'),
                    'arp_body_caption_odd_row_bg_color' => array('#f3f3f5'),
                    'arp_body_caption_even_row_bg_color' => array('#ebeaef'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#000000'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE'),
                        'button_bg_color' => array('', '#747577', '#747577', '#747577', '#747577', '#747577'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                    ),
                ),
                'darkred' => array(
                    'arp_header_background' => array('#EBEAEF'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_column_background' => array('#af1d04', '#af1d04', '#af1d04', '#af1d04', '#af1d04'),
                    'arp_body_caption_odd_row_bg_color' => array('#f3f3f5'),
                    'arp_body_caption_even_row_bg_color' => array('#ebeaef'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#000000'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE'),
                        'button_bg_color' => array('', '#747577', '#747577', '#747577', '#747577', '#747577'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                    ),
                ),
                'lightorange' => array(
                    'arp_header_background' => array('#EBEAEF'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_column_background' => array('#f2b10f', '#f2b10f', '#f2b10f', '#f2b10f', '#f2b10f'),
                    'arp_body_caption_odd_row_bg_color' => array('#f3f3f5'),
                    'arp_body_caption_even_row_bg_color' => array('#ebeaef'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#000000'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE'),
                        'button_bg_color' => array('', '#747577', '#747577', '#747577', '#747577', '#747577'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                    ),
                ),
                'orange' => array(
                    'arp_header_background' => array('#EBEAEF'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_column_background' => array('#fd7c21', '#fd7c21', '#fd7c21', '#fd7c21', '#fd7c21'),
                    'arp_body_caption_odd_row_bg_color' => array('#f3f3f5'),
                    'arp_body_caption_even_row_bg_color' => array('#ebeaef'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#000000'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE'),
                        'button_bg_color' => array('', '#747577', '#747577', '#747577', '#747577', '#747577'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                    ),
                ),
                'cyan' => array(
                    'arp_header_background' => array('#EBEAEF'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_column_background' => array('#03b88b', '#03b88b', '#03b88b', '#03b88b', '#03b88b'),
                    'arp_body_caption_odd_row_bg_color' => array('#f3f3f5'),
                    'arp_body_caption_even_row_bg_color' => array('#ebeaef'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#000000'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE'),
                        'button_bg_color' => array('', '#747577', '#747577', '#747577', '#747577', '#747577'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                    ),
                ),
                'magenta' => array(
                    'arp_header_background' => array('#EBEAEF'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_column_background' => array('#b037c2', '#b037c2', '#b037c2', '#b037c2', '#b037c2'),
                    'arp_body_caption_odd_row_bg_color' => array('#f3f3f5'),
                    'arp_body_caption_even_row_bg_color' => array('#ebeaef'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#000000'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE'),
                        'button_bg_color' => array('', '#747577', '#747577', '#747577', '#747577', '#747577'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                    ),
                ),
                'yellow' => array(
                    'arp_header_background' => array('#EBEAEF'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_column_background' => array('#ceba63', '#ceba63', '#ceba63', '#ceba63', '#ceba63'),
                    'arp_body_caption_odd_row_bg_color' => array('#f3f3f5'),
                    'arp_body_caption_even_row_bg_color' => array('#ebeaef'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#000000'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE'),
                        'button_bg_color' => array('', '#747577', '#747577', '#747577', '#747577', '#747577'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                    ),
                ),
                'red' => array(
                    'arp_header_background' => array('#EBEAEF'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_column_background' => array('#ac113d', '#ac113d', '#ac113d', '#ac113d', '#ac113d'),
                    'arp_body_caption_odd_row_bg_color' => array('#f3f3f5'),
                    'arp_body_caption_even_row_bg_color' => array('#ebeaef'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#000000'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE', '#E9EAEE'),
                        'button_bg_color' => array('', '#747577', '#747577', '#747577', '#747577', '#747577'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#000000'),
                        'arp_body_even_font_hover_color' => array('', '#000000'),
                        'arp_footer_hover_font_color' => array('', '#000000'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_header_background' => '',
                    'arp_button_background' => '',
                    'arp_column_background' => '',
                    'arp_body_caption_odd_row_bg_color' => '',
                    'arp_body_caption_even_row_bg_color' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_price_duration_color' => '',
                    'arp_button_font_color' => '',
                    'arp_footer_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'column_bg_color' => '',
                        'button_bg_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_price_duration_hover_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                        'arp_footer_hover_font_color' => '',
                    ),
                )
            ),
            'arptemplate_10' => array(
                'multicolor' => array(
                    'arp_header_background' => array('#00a392', '#50b8f5', '#e92526', '#8250a9', '#66ad33'),
                    'arp_price_background' => array('#007064', '#3e90c2', '#c41e20', '#5f3a7d', '#498025'),
                    'arp_button_background' => array('#00a392', '#50b8f5', '#e92526', '#8250a9', '#66ad33'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#ededed', '#ededed', '#ededed', '#ededed', '#ededed', '#ededed',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#333333'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#656565'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3c403f', '#3c403f', '#3c403f', '#3c403f', '#3c403f'),
                        'header_bg_color' => array('#585E5E', '#585E5E', '#585E5E', '#585E5E', '#585E5E'),
                        'price_bg_color' => array('#3C403F', '#3C403F', '#3C403F', '#3C403F', '#3C403F'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ededed'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#656565'),
                    ),
                ),
                'red' => array(
                    'arp_header_background' => array('#e92526', '#e92526', '#e92526', '#e92526', '#e92526', '#e92526'),
                    'arp_price_background' => array('#c41e1e', '#c41e1e', '#c41e1e', '#c41e1e', '#c41e1e', '#c41e1e'),
                    'arp_button_background' => array('#e92526', '#e92526', '#e92526', '#e92526', '#e92526', '#e92526'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ededed', '#ededed', '#ededed', '#ededed', '#ededed', '#ededed'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#333333'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#656565'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3c403f', '#3c403f', '#3c403f', '#3c403f', '#3c403f'),
                        'header_bg_color' => array('#585E5E', '#585E5E', '#585E5E', '#585E5E', '#585E5E'),
                        'price_bg_color' => array('#3C403F', '#3C403F', '#3C403F', '#3C403F', '#3C403F'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ededed'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#656565'),
                    ),
                ),
                'teal' => array(
                    'arp_header_background' => array('#00a392', '#00a392', '#00a392', '#00a392', '#00a392', '#00a392'),
                    'arp_price_background' => array('#007064', '#007064', '#007064', '#007064', '#007064', '#007064'),
                    'arp_button_background' => array('#00a392', '#00a392', '#00a392', '#00a392', '#00a392', '#00a392'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#ededed', '#ededed', '#ededed', '#ededed', '#ededed', '#ededed'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#333333'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#656565'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3c403f', '#3c403f', '#3c403f', '#3c403f', '#3c403f'),
                        'header_bg_color' => array('#585E5E', '#585E5E', '#585E5E', '#585E5E', '#585E5E'),
                        'price_bg_color' => array('#3C403F', '#3C403F', '#3C403F', '#3C403F', '#3C403F'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ededed'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#656565'),
                    ),
                ),
                'orange' => array(
                    'arp_header_background' => array('#ffad00', '#ffad00', '#ffad00', '#ffad00', '#ffad00', '#ffad00'),
                    'arp_price_background' => array('#cb8900', '#cb8900', '#cb8900', '#cb8900', '#cb8900', '#cb8900'),
                    'arp_button_background' => array('#ffad00', '#ffad00', '#ffad00', '#ffad00', '#ffad00', '#ffad00'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#ededed', '#ededed', '#ededed', '#ededed', '#ededed', '#ededed'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#333333'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#656565'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3c403f', '#3c403f', '#3c403f', '#3c403f', '#3c403f'),
                        'header_bg_color' => array('#585E5E', '#585E5E', '#585E5E', '#585E5E', '#585E5E'),
                        'price_bg_color' => array('#3C403F', '#3C403F', '#3C403F', '#3C403F', '#3C403F'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ededed'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#656565'),
                    ),
                ),
                'blue' => array(
                    'arp_header_background' => array('#50b8f5', '#50b8f5', '#50b8f5', '#50b8f5', '#50b8f5', '#50b8f5'),
                    'arp_price_background' => array('#3f91c3', '#3f91c3', '#3f91c3', '#3f91c3', '#3f91c3', '#3f91c3'),
                    'arp_button_background' => array('#50b8f5', '#50b8f5', '#50b8f5', '#50b8f5', '#50b8f5', '#50b8f5'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#ededed', '#ededed', '#ededed', '#ededed', '#ededed', '#ededed'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#333333'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#656565'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3c403f', '#3c403f', '#3c403f', '#3c403f', '#3c403f'),
                        'header_bg_color' => array('#585E5E', '#585E5E', '#585E5E', '#585E5E', '#585E5E'),
                        'price_bg_color' => array('#3C403F', '#3C403F', '#3C403F', '#3C403F', '#3C403F'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ededed'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#656565'),
                    ),
                ),
                'green' => array(
                    'arp_header_background' => array('#01a358', '#01a358', '#01a358', '#01a358', '#01a358', '#01a358'),
                    'arp_price_background' => array('#017840', '#017840', '#017840', '#017840', '#017840', '#017840'),
                    'arp_button_background' => array('#01a358', '#01a358', '#01a358', '#01a358', '#01a358', '#01a358'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#ededed', '#ededed', '#ededed', '#ededed', '#ededed', '#ededed'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#333333'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#656565'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3c403f', '#3c403f', '#3c403f', '#3c403f', '#3c403f'),
                        'header_bg_color' => array('#585E5E', '#585E5E', '#585E5E', '#585E5E', '#585E5E'),
                        'price_bg_color' => array('#3C403F', '#3C403F', '#3C403F', '#3C403F', '#3C403F'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ededed'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#656565'),
                    ),
                ),
                'lightteal' => array(
                    'arp_header_background' => array('#1fc4c8', '#1fc4c8', '#1fc4c8', '#1fc4c8', '#1fc4c8', '#1fc4c8',),
                    'arp_price_background' => array('#189ca0', '#189ca0', '#189ca0', '#189ca0', '#189ca0', '#189ca0'),
                    'arp_button_background' => array('#1fc4c8', '#1fc4c8', '#1fc4c8', '#1fc4c8', '#1fc4c8', '#1fc4c8'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ededed', '#ededed', '#ededed', '#ededed', '#ededed', '#ededed',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#333333'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#656565'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3c403f', '#3c403f', '#3c403f', '#3c403f', '#3c403f'),
                        'header_bg_color' => array('#585E5E', '#585E5E', '#585E5E', '#585E5E', '#585E5E'),
                        'price_bg_color' => array('#3C403F', '#3C403F', '#3C403F', '#3C403F', '#3C403F'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ededed'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#656565'),
                    ),
                ),
                'pink' => array(
                    'arp_header_background' => array('#e83473', '#e83473', '#e83473', '#e83473', '#e83473', '#e83473',),
                    'arp_price_background' => array('#aa2554', '#aa2554', '#aa2554', '#aa2554', '#aa2554', '#aa2554'),
                    'arp_button_background' => array('#e83473', '#e83473', '#e83473', '#e83473', '#e83473', '#e83473'),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ededed'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#333333'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#656565'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3c403f', '#3c403f', '#3c403f', '#3c403f', '#3c403f'),
                        'header_bg_color' => array('#585E5E', '#585E5E', '#585E5E', '#585E5E', '#585E5E'),
                        'price_bg_color' => array('#3C403F', '#3C403F', '#3C403F', '#3C403F', '#3C403F'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ededed'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#656565'),
                    ),
                ),
                'lightgreen' => array(
                    'arp_header_background' => array('#66ad33', '#66ad33', '#66ad33', '#66ad33', '#66ad33', '#66ad33',),
                    'arp_price_background' => array('#498025', '#498025', '#498025', '#498025', '#498025', '#498025',),
                    'arp_button_background' => array('#66ad33', '#66ad33', '#66ad33', '#66ad33', '#66ad33', '#66ad33',),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ededed', '#ededed', '#ededed', '#ededed', '#ededed', '#ededed',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#333333'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#656565'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3c403f', '#3c403f', '#3c403f', '#3c403f', '#3c403f'),
                        'header_bg_color' => array('#585E5E', '#585E5E', '#585E5E', '#585E5E', '#585E5E'),
                        'price_bg_color' => array('#3C403F', '#3C403F', '#3C403F', '#3C403F', '#3C403F'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ededed'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#656565'),
                    ),
                ),
                'darkorange' => array(
                    'arp_header_background' => array('#ff622b', '#ff622b', '#ff622b', '#ff622b', '#ff622b', '#ff622b',),
                    'arp_price_background' => array('#bd471f', '#bd471f', '#bd471f', '#bd471f', '#bd471f', '#bd471f',),
                    'arp_button_background' => array('#ff622b', '#ff622b', '#ff622b', '#ff622b', '#ff622b', '#ff622b',),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ededed', '#ededed', '#ededed', '#ededed', '#ededed', '#ededed',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#333333'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#656565'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3c403f', '#3c403f', '#3c403f', '#3c403f', '#3c403f'),
                        'header_bg_color' => array('#585E5E', '#585E5E', '#585E5E', '#585E5E', '#585E5E'),
                        'price_bg_color' => array('#3C403F', '#3C403F', '#3C403F', '#3C403F', '#3C403F'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ededed'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#656565'),
                    ),
                ),
                'purple' => array(
                    'arp_header_background' => array('#8250a9', '#8250a9', '#8250a9', '#8250a9', '#8250a9', '#8250a9',),
                    'arp_price_background' => array('#593774', '#593774', '#593774', '#593774', '#593774', '#593774',),
                    'arp_button_background' => array('#8250a9', '#8250a9', '#8250a9', '#8250a9', '#8250a9', '#8250a9',),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ededed', '#ededed', '#ededed', '#ededed', '#ededed', '#ededed',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#333333'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#656565'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3c403f', '#3c403f', '#3c403f', '#3c403f', '#3c403f'),
                        'header_bg_color' => array('#585E5E', '#585E5E', '#585E5E', '#585E5E', '#585E5E'),
                        'price_bg_color' => array('#3C403F', '#3C403F', '#3C403F', '#3C403F', '#3C403F'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ededed'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#656565'),
                    ),
                ),
                'darkblue' => array(
                    'arp_header_background' => array('#3e38a4', '#3e38a4', '#3e38a4', '#3e38a4', '#3e38a4', '#3e38a4',),
                    'arp_price_background' => array('#2a2672', '#2a2672', '#2a2672', '#2a2672', '#2a2672', '#2a2672',),
                    'arp_button_background' => array('#3e38a4', '#3e38a4', '#3e38a4', '#3e38a4', '#3e38a4', '#3e38a4',),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ededed', '#ededed', '#ededed', '#ededed', '#ededed', '#ededed',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#333333'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#656565'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3c403f', '#3c403f', '#3c403f', '#3c403f', '#3c403f'),
                        'header_bg_color' => array('#585E5E', '#585E5E', '#585E5E', '#585E5E', '#585E5E'),
                        'price_bg_color' => array('#3C403F', '#3C403F', '#3C403F', '#3C403F', '#3C403F'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ededed'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#656565'),
                    ),
                ),
                'gray' => array(
                    'arp_header_background' => array('#89888d', '#89888d', '#89888d', '#89888d', '#89888d', '#89888d',),
                    'arp_price_background' => array('#5e5e60', '#5e5e60', '#5e5e60', '#5e5e60', '#5e5e60', '#5e5e60',),
                    'arp_button_background' => array('#89888d', '#89888d', '#89888d', '#89888d', '#89888d', '#89888d',),
                    'arp_desc_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ededed', '#ededed', '#ededed', '#ededed', '#ededed', '#ededed',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#333333'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_body_label_font_color' => array('', '#656565'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3c403f', '#3c403f', '#3c403f', '#3c403f', '#3c403f'),
                        'header_bg_color' => array('#585E5E', '#585E5E', '#585E5E', '#585E5E', '#585E5E'),
                        'price_bg_color' => array('#3C403F', '#3C403F', '#3C403F', '#3C403F', '#3C403F'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ededed'),
                        'arp_desc_hover_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                        'arp_body_label_font_hover_color' => array('', '#656565'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_header_background' => '',
                    'arp_price_background' => '',
                    'arp_button_background' => '',
                    'arp_desc_background' => '',
                    'arp_body_odd_row_background_color' => '',
                    'arp_body_even_row_background_color' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_price_duration_color' => '',
                    'arp_desc_font_color' => '',
                    'arp_button_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_body_label_font_color' => '',
                    'arp_hover_color' => array(
                        'button_bg_color' => '',
                        'header_bg_color' => '',
                        'price_bg_color' => '',
                        'arp_body_odd_row_hover_background_color' => '',
                        'arp_body_even_row_hover_background_color' => '',
                        'arp_desc_hover_background' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_price_duration_hover_color' => '',
                        'arp_desc_hover_font_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                        'arp_body_label_font_hover_color' => '',
                    ),
                )
            ),
            'arptemplate_11' => array(
                'yellow' => array(
                    'arp_button_background' => array('#efa738'),
                    'arp_header_background' => array('#414045'),
                    'arp_desc_background' => array('#37363b'),
                    'arp_body_odd_row_background_color' => array('#313035'),
                    'arp_body_even_row_background_color' => array('#37363b'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#09B1F8', '#09B1F8', '#09B1F8', '#09B1F8', '#09B1F8'),
                        'header_bg_color' => array('#51545D', '#51545D', '#51545D', '#51545D', '#51545D'),
                        'price_bg_color' => array('#46474C'),
                        'arp_body_odd_row_hover_background_color' => array('#3E4044'),
                        'arp_body_even_row_hover_background_color' => array('#46474C'),
                        'arp_desc_hover_background' => array('#46474C', '#46474C', '#46474C', '#46474C', '#46474C'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'limegreen' => array(
                    'arp_button_background' => array('#43b34d'),
                    'arp_header_background' => array('#414045'),
                    'arp_desc_background' => array('#37363b'),
                    'arp_body_odd_row_background_color' => array('#313035'),
                    'arp_body_even_row_background_color' => array('#37363b'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#09B1F8', '#09B1F8', '#09B1F8', '#09B1F8', '#09B1F8'),
                        'header_bg_color' => array('#51545D', '#51545D', '#51545D', '#51545D', '#51545D'),
                        'price_bg_color' => array('#46474C'),
                        'arp_body_odd_row_hover_background_color' => array('#3E4044'),
                        'arp_body_even_row_hover_background_color' => array('#46474C'),
                        'arp_desc_hover_background' => array('#46474C', '#46474C', '#46474C', '#46474C', '#46474C'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'red' => array(
                    'arp_button_background' => array('#ff3241'),
                    'arp_header_background' => array('#414045'),
                    'arp_desc_background' => array('#37363b'),
                    'arp_body_odd_row_background_color' => array('#313035'),
                    'arp_body_even_row_background_color' => array('#37363b'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#FEA203', '#FEA203', '#FEA203', '#FEA203', '#FEA203'),
                        'header_bg_color' => array('#51545D', '#51545D', '#51545D', '#51545D', '#51545D'),
                        'price_bg_color' => array('#46474C'),
                        'arp_body_odd_row_hover_background_color' => array('#3E4044'),
                        'arp_body_even_row_hover_background_color' => array('#46474C'),
                        'arp_desc_hover_background' => array('#46474C', '#46474C', '#46474C', '#46474C', '#46474C'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'blue' => array(
                    'arp_button_background' => array('#09b1f8'),
                    'arp_header_background' => array('#414045'),
                    'arp_desc_background' => array('#37363b'),
                    'arp_body_odd_row_background_color' => array('#313035'),
                    'arp_body_even_row_background_color' => array('#37363b'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#43B34D', '#43B34D', '#43B34D', '#43B34D', '#43B34D'),
                        'header_bg_color' => array('#51545D', '#51545D', '#51545D', '#51545D', '#51545D'),
                        'price_bg_color' => array('#46474C'),
                        'arp_body_odd_row_hover_background_color' => array('#3E4044'),
                        'arp_body_even_row_hover_background_color' => array('#46474C'),
                        'arp_desc_hover_background' => array('#46474C', '#46474C', '#46474C', '#46474C', '#46474C'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'pink' => array(
                    'arp_button_background' => array('#e3328c'),
                    'arp_header_background' => array('#414045'),
                    'arp_desc_background' => array('#37363b'),
                    'arp_body_odd_row_background_color' => array('#313035'),
                    'arp_body_even_row_background_color' => array('#37363b'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#21B1B2', '#21B1B2', '#21B1B2', '#21B1B2', '#21B1B2'),
                        'header_bg_color' => array('#51545D', '#51545D', '#51545D', '#51545D', '#51545D'),
                        'price_bg_color' => array('#46474C'),
                        'arp_body_odd_row_hover_background_color' => array('#3E4044'),
                        'arp_body_even_row_hover_background_color' => array('#46474C'),
                        'arp_desc_hover_background' => array('#46474C', '#46474C', '#46474C', '#46474C', '#46474C'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'cyan' => array(
                    'arp_button_background' => array('#11b0b6'),
                    'arp_header_background' => array('#414045'),
                    'arp_desc_background' => array('#37363b'),
                    'arp_body_odd_row_background_color' => array('#313035'),
                    'arp_body_even_row_background_color' => array('#37363b'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#F49600', '#F49600', '#F49600', '#F49600', '#F49600'),
                        'header_bg_color' => array('#51545D', '#51545D', '#51545D', '#51545D', '#51545D'),
                        'price_bg_color' => array('#46474C'),
                        'arp_body_odd_row_hover_background_color' => array('#3E4044'),
                        'arp_body_even_row_hover_background_color' => array('#46474C'),
                        'arp_desc_hover_background' => array('#46474C', '#46474C', '#46474C', '#46474C', '#46474C'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'lightpink' => array(
                    'arp_button_background' => array('#f15f74'),
                    'arp_header_background' => array('#414045'),
                    'arp_desc_background' => array('#37363b'),
                    'arp_body_odd_row_background_color' => array('#313035'),
                    'arp_body_even_row_background_color' => array('#37363b'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#949494', '#949494', '#949494', '#949494', '#949494'),
                        'header_bg_color' => array('#51545D', '#51545D', '#51545D', '#51545D', '#51545D'),
                        'price_bg_color' => array('#46474C'),
                        'arp_body_odd_row_hover_background_color' => array('#3E4044'),
                        'arp_body_even_row_hover_background_color' => array('#46474C'),
                        'arp_desc_hover_background' => array('#46474C', '#46474C', '#46474C', '#46474C', '#46474C'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'violet' => array(
                    'arp_button_background' => array('#8f4aff'),
                    'arp_header_background' => array('#414045'),
                    'arp_desc_background' => array('#37363b'),
                    'arp_body_odd_row_background_color' => array('#313035'),
                    'arp_body_even_row_background_color' => array('#37363b'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#CD448A', '#CD448A', '#CD448A', '#CD448A', '#CD448A'),
                        'header_bg_color' => array('#51545D', '#51545D', '#51545D', '#51545D', '#51545D'),
                        'price_bg_color' => array('#46474C'),
                        'arp_body_odd_row_hover_background_color' => array('#3E4044'),
                        'arp_body_even_row_hover_background_color' => array('#46474C'),
                        'arp_desc_hover_background' => array('#46474C', '#46474C', '#46474C', '#46474C', '#46474C'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'gray' => array(
                    'arp_button_background' => array('#949494'),
                    'arp_header_background' => array('#414045'),
                    'arp_desc_background' => array('#37363b'),
                    'arp_body_odd_row_background_color' => array('#313035'),
                    'arp_body_even_row_background_color' => array('#37363b'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#F15F74', '#F15F74', '#F15F74', '#F15F74', '#F15F74'),
                        'header_bg_color' => array('#51545D', '#51545D', '#51545D', '#51545D', '#51545D'),
                        'price_bg_color' => array('#46474C'),
                        'arp_body_odd_row_hover_background_color' => array('#3E4044'),
                        'arp_body_even_row_hover_background_color' => array('#46474C'),
                        'arp_desc_hover_background' => array('#46474C', '#46474C', '#46474C', '#46474C', '#46474C'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'green' => array(
                    'arp_button_background' => array('#78c335'),
                    'arp_header_background' => array('#414045'),
                    'arp_desc_background' => array('#37363b'),
                    'arp_body_odd_row_background_color' => array('#313035'),
                    'arp_body_even_row_background_color' => array('#37363b'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#FFB43D', '#FFB43D', '#FFB43D', '#FFB43D', '#FFB43D'),
                        'header_bg_color' => array('#51545D', '#51545D', '#51545D', '#51545D', '#51545D'),
                        'price_bg_color' => array('#46474C'),
                        'arp_body_odd_row_hover_background_color' => array('#3E4044'),
                        'arp_body_even_row_hover_background_color' => array('#46474C'),
                        'arp_desc_hover_background' => array('#46474C', '#46474C', '#46474C', '#46474C', '#46474C'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_button_background' => '',
                    'arp_header_background' => '',
                    'arp_desc_background' => '',
                    'arp_body_odd_row_background_color' => '',
                    'arp_body_even_row_background_color' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_price_duration_color' => '',
                    'arp_desc_font_color' => '',
                    'arp_button_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'button_bg_color' => '',
                        'header_bg_color' => '',
                        'price_bg_color' => '',
                        'arp_body_odd_row_hover_background_color' => '',
                        'arp_body_even_row_hover_background_color' => '',
                        'arp_desc_hover_background' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_price_duration_hover_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                        'arp_desc_hover_font_color' => '',
                    ),
                )
            ),
            'arptemplate_12' => array(
                'blue' => array(
                    'arp_header_background' => array('#F6F6F6', '#143B86', '#143B86', '#143B86', '#143B86', '#143B86'),
                    'arp_price_background' => array('', '#0C63A6', '#0C63A6', '#0C63A6', '#0C63A6', '#0C63A6'),
                    'arp_button_background' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#E0E0E0', '#dadee1', '#dadee1', '#dadee1', '#dadee1', '#dadee1'),
                    'arp_body_odd_row_background_color' => array('#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#143b86'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_body_label_font_color' => array('', '#333333'),
                    'arp_hover_color' => '',
                ),
                'cyan' => array(
                    'arp_header_background' => array('#F6F6F6', '#059B90', '#059B90', '#059B90', '#059B90', '#059B90'),
                    'arp_price_background' => array('', '#01D3C6', '#01D3C6', '#01D3C6', '#01D3C6', '#01D3C6'),
                    'arp_button_background' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#E0E0E0', '#DEE3E6', '#DEE3E6', '#DEE3E6', '#DEE3E6', '#DEE3E6'),
                    'arp_body_odd_row_background_color' => array('#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#143b86'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_body_label_font_color' => array('', '#333333'),
                    'arp_hover_color' => '',
                ),
                'orange' => array(
                    'arp_header_background' => array('#F6F6F6', '#E38B05', '#E38B05', '#E38B05', '#E38B05', '#E38B05'),
                    'arp_price_background' => array('', '#FAAA00', '#FAAA00', '#FAAA00', '#FAAA00', '#FAAA00'),
                    'arp_button_background' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#E0E0E0', '#E1E1DF', '#E1E1DF', '#E1E1DF', '#E1E1DF', '#E1E1DF'),
                    'arp_body_odd_row_background_color' => array('#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#143b86'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_body_label_font_color' => array('', '#333333'),
                    'arp_hover_color' => '',
                ),
                'green' => array(
                    'arp_header_background' => array('#F6F6F6', '#23A359', '#23A359', '#23A359', '#23A359', '#23A359'),
                    'arp_price_background' => array('', '#29C560', '#29C560', '#29C560', '#29C560', '#29C560'),
                    'arp_button_background' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#E0E0E0', '#DBE0DC', '#DBE0DC', '#DBE0DC', '#DBE0DC', '#DBE0DC'),
                    'arp_body_odd_row_background_color' => array('#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#143b86'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_body_label_font_color' => array('', '#333333'),
                    'arp_hover_color' => '',
                ),
                'red' => array(
                    'arp_header_background' => array('#F6F6F6', '#C10F0F', '#C10F0F', '#C10F0F', '#C10F0F', '#C10F0F'),
                    'arp_price_background' => array('', '#E70707', '#E70707', '#E70707', '#E70707', '#E70707'),
                    'arp_button_background' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#E0E0E0', '#E6E2E1', '#E6E2E1', '#E6E2E1', '#E6E2E1', '#E6E2E1'),
                    'arp_body_odd_row_background_color' => array('#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#143b86'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_body_label_font_color' => array('', '#333333'),
                    'arp_hover_color' => '',
                ),
                'skyblue' => array(
                    'arp_header_background' => array('#F6F6F6', '#2284C1', '#2284C1', '#2284C1', '#2284C1', '#2284C1'),
                    'arp_price_background' => array('', '#3BAFEA', '#3BAFEA', '#3BAFEA', '#3BAFEA', '#3BAFEA'),
                    'arp_button_background' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#E0E0E0', '#DBDFE2', '#DBDFE2', '#DBDFE2', '#DBDFE2', '#DBDFE2'),
                    'arp_body_odd_row_background_color' => array('#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#143b86'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_body_label_font_color' => array('', '#333333'),
                    'arp_hover_color' => '',
                ),
                'maroon' => array(
                    'arp_header_background' => array('#F6F6F6', '#8A0135', '#8A0135', '#8A0135', '#8A0135', '#8A0135'),
                    'arp_price_background' => array('', '#B90044', '#B90044', '#B90044', '#B90044', '#B90044'),
                    'arp_button_background' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#E0E0E0', '#DAD8D9', '#DAD8D9', '#DAD8D9', '#DAD8D9', '#DAD8D9'),
                    'arp_body_odd_row_background_color' => array('#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#143b86'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_body_label_font_color' => array('', '#333333'),
                    'arp_hover_color' => '',
                ),
                'purple' => array(
                    'arp_header_background' => array('#F6F6F6', '#7B1EC7', '#7B1EC7', '#7B1EC7', '#7B1EC7', '#7B1EC7'),
                    'arp_price_background' => array('', '#A038FF', '#A038FF', '#A038FF', '#A038FF', '#A038FF'),
                    'arp_button_background' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#E0E0E0', '#E1E1DF', '#E1E1DF', '#E1E1DF', '#E1E1DF', '#E1E1DF'),
                    'arp_body_odd_row_background_color' => array('#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#143b86'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_body_label_font_color' => array('', '#333333'),
                    'arp_hover_color' => '',
                ),
                'darkgrey' => array(
                    'arp_header_background' => array('#F6F6F6', '#474F62', '#474F62', '#474F62', '#474F62', '#474F62'),
                    'arp_price_background' => array('', '#6E7786', '#6E7786', '#6E7786', '#6E7786', '#6E7786'),
                    'arp_button_background' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#E0E0E0', '#DCDDE1', '#DCDDE1', '#DCDDE1', '#DCDDE1', '#DCDDE1'),
                    'arp_body_odd_row_background_color' => array('#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#143b86'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_body_label_font_color' => array('', '#333333'),
                    'arp_hover_color' => '',
                ),
                'brightorange' => array(
                    'arp_header_background' => array('#F6F6F6', '#D03509', '#D03509', '#D03509', '#D03509', '#D03509'),
                    'arp_price_background' => array('', '#FF5F0F', '#FF5F0F', '#FF5F0F', '#FF5F0F', '#FF5F0F'),
                    'arp_button_background' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#E0E0E0', '#DDD9D8', '#DDD9D8', '#DDD9D8', '#DDD9D8', '#DDD9D8'),
                    'arp_body_odd_row_background_color' => array('#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#143b86'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_body_label_font_color' => array('', '#333333'),
                    'arp_hover_color' => '',
                ),
                'multicolor' => array(
                    'arp_header_background' => array('#F6F6F6', '#2284C1', '#23A359', '#E38B05', '#8A0135', '#474F62'),
                    'arp_price_background' => array('', '#39B0EA', '#2BC764', '#FAAB00', '#B90044', '#6F7887'),
                    'arp_button_background' => array('', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_row_background_color' => array('#E0E0E0', '#DBDFE2', '#DBE0DC', '#E1E1DF', '#DAD8D9', '#DCDDE1'),
                    'arp_body_odd_row_background_color' => array('#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF', '#EFEFEF'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#143b86'),
                    'arp_body_font_color' => array('', '#494c4f'),
                    'arp_body_even_font_color' => array('', '#494c4f'),
                    'arp_body_label_font_color' => array('', '#333333'),
                    'arp_hover_color' => '',
                ),
                'custom_skin' => array(
                    'arp_header_background' => '',
                    'arp_price_background' => '',
                    'arp_button_background' => '',
                    'arp_body_odd_row_background_color' => '',
                    'arp_body_even_row_background_color' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_price_duration_color' => '',
                    'arp_desc_font_color' => '',
                    'arp_button_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_body_label_font_color' => '',
                    'arp_hover_color' => '',
                )
            ),
            'arptemplate_13' => array(
                'darkblue' => array(
                    'arp_price_background' => array('#e94c3d'),
                    'arp_button_background' => array('#e94c3d'),
                    'arp_column_background' => array('#01325b'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#01325b', '#01325b', '#01325b', '#01325b', '#01325b'),
                        'button_bg_color' => array('#e94c3d', '#e94c3d', '#e94c3d', '#e94c3d', '#e94c3d'),
                        'price_bg_color' => array('#e94c3d', '#e94c3d', '#e94c3d', '#e94c3d', '#e94c3d'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'cyan' => array(
                    'arp_price_background' => array('#fdb63a'),
                    'arp_button_background' => array('#fdb63a'),
                    'arp_column_background' => array('#03735D'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#03735D', '#03735D', '#03735D', '#03735D', '#03735D'),
                        'button_bg_color' => array('#fdb63a', '#fdb63a', '#fdb63a', '#fdb63a', '#fdb63a'),
                        'price_bg_color' => array('#fdb63a', '#fdb63a', '#fdb63a', '#fdb63a', '#fdb63a'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'green' => array(
                    'arp_price_background' => array('#eceac4'),
                    'arp_button_background' => array('#eceac4'),
                    'arp_column_background' => array('#168737'),
                    'arp_price_value_color' => array('', '#000000'),
                    'arp_price_duration_color' => array('', '#000000'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#168737', '#168737', '#168737', '#168737', '#168737'),
                        'button_bg_color' => array('#eceac4', '#eceac4', '#eceac4', '#eceac4', '#eceac4'),
                        'price_bg_color' => array('#eceac4', '#eceac4', '#eceac4', '#eceac4', '#eceac4'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'red' => array(
                    'arp_price_background' => array('#ffa200'),
                    'arp_button_background' => array('#ffa200'),
                    'arp_column_background' => array('#C61C1C'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#C61C1C', '#C61C1C', '#C61C1C', '#C61C1C', '#C61C1C'),
                        'button_bg_color' => array('#ffa200', '#ffa200', '#ffa200', '#ffa200', '#ffa200'),
                        'price_bg_color' => array('#ffa200', '#ffa200', '#ffa200', '#ffa200', '#ffa200'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'blue' => array(
                    'arp_price_background' => array('#eaf5fb'),
                    'arp_button_background' => array('#eaf5fb'),
                    'arp_column_background' => array('#00A0EA'),
                    'arp_price_value_color' => array('', '#000000'),
                    'arp_price_duration_color' => array('', '#000000'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#00A0EA', '#00A0EA', '#00A0EA', '#00A0EA', '#00A0EA'),
                        'button_bg_color' => array('#eaf5fb', '#eaf5fb', '#eaf5fb', '#eaf5fb', '#eaf5fb'),
                        'price_bg_color' => array('#eaf5fb', '#eaf5fb', '#eaf5fb', '#eaf5fb', '#eaf5fb'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'brown' => array(
                    'arp_price_background' => array('#ffec69'),
                    'arp_button_background' => array('#ffec69'),
                    'arp_column_background' => array('#883D13'),
                    'arp_price_value_color' => array('', '#000000'),
                    'arp_price_duration_color' => array('', '#000000'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#883D13', '#883D13', '#883D13', '#883D13', '#883D13'),
                        'button_bg_color' => array('#ffec69', '#ffec69', '#ffec69', '#ffec69', '#ffec69'),
                        'price_bg_color' => array('#ffec69', '#ffec69', '#ffec69', '#ffec69', '#ffec69'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#000000'),
                        'arp_price_duration_hover_color' => array('', '#000000'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'darkcyan' => array(
                    'arp_price_background' => array('#dd354e'),
                    'arp_button_background' => array('#dd354e'),
                    'arp_column_background' => array('#005760'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#005760', '#005760', '#005760', '#005760', '#005760'),
                        'button_bg_color' => array('#dd354e', '#dd354e', '#dd354e', '#dd354e', '#dd354e'),
                        'price_bg_color' => array('#dd354e', '#dd354e', '#dd354e', '#dd354e', '#dd354e'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'darkmagenta' => array(
                    'arp_price_background' => array('#ff7701'),
                    'arp_button_background' => array('#ff7701'),
                    'arp_column_background' => array('#602B63'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_price_duration_color' => array('', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#602B63', '#602B63', '#602B63', '#602B63', '#602B63'),
                        'button_bg_color' => array('#ff7701', '#ff7701', '#ff7701', '#ff7701', '#ff7701'),
                        'price_bg_color' => array('#ff7701', '#ff7701', '#ff7701', '#ff7701', '#ff7701'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_price_background' => '',
                    'arp_button_background' => '',
                    'arp_column_background' => '',
                    'arp_price_value_color' => '',
                    'arp_price_duration_color' => '',
                    'arp_header_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_button_font_color' => '',
                    'arp_desc_font_color' => '',
                    'arp_hover_color' => array(
                        'column_bg_color' => '',
                        'button_bg_color' => '',
                        'price_bg_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_price_duration_hover_color' => '',
                        'arp_desc_hover_font_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                    ),
                )
            ),
            'arptemplate_14' => array(
                'orange' => array(
                    'arp_button_background' => array('#f15a23'),
                    'arp_header_font_color' => array('', '#000000'),
                    'arp_price_value_color' => array('', '#0058b3'),
                    'arp_price_duration_color' => array('', '#444444'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#f15a23'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#0058b3'),
                        'arp_price_duration_hover_color' => array('', '#444444'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'limegreen' => array(
                    'arp_button_background' => array('#2dcc70'),
                    'arp_header_font_color' => array('', '#000000'),
                    'arp_price_value_color' => array('', '#0058b3'),
                    'arp_price_duration_color' => array('', '#444444'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#2dcc70'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#0058b3'),
                        'arp_price_duration_hover_color' => array('', '#444444'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'blue' => array(
                    'arp_button_background' => array('#3598db'),
                    'arp_header_font_color' => array('', '#000000'),
                    'arp_price_value_color' => array('', '#0058b3'),
                    'arp_price_duration_color' => array('', '#444444'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#3598db'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#0058b3'),
                        'arp_price_duration_hover_color' => array('', '#444444'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'violet' => array(
                    'arp_button_background' => array('#9661d7'),
                    'arp_header_font_color' => array('', '#000000'),
                    'arp_price_value_color' => array('', '#0058b3'),
                    'arp_price_duration_color' => array('', '#444444'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#9661d7'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#0058b3'),
                        'arp_price_duration_hover_color' => array('', '#444444'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'lightorange' => array(
                    'arp_button_background' => array('#f49c14'),
                    'arp_header_font_color' => array('', '#000000'),
                    'arp_price_value_color' => array('', '#0058b3'),
                    'arp_price_duration_color' => array('', '#444444'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#f49c14'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#0058b3'),
                        'arp_price_duration_hover_color' => array('', '#444444'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'cyan' => array(
                    'arp_button_background' => array('#1bbc9b'),
                    'arp_header_font_color' => array('', '#000000'),
                    'arp_price_value_color' => array('', '#0058b3'),
                    'arp_price_duration_color' => array('', '#444444'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#1bbc9b'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#0058b3'),
                        'arp_price_duration_hover_color' => array('', '#444444'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'red' => array(
                    'arp_button_background' => array('#e52937'),
                    'arp_header_font_color' => array('', '#000000'),
                    'arp_price_value_color' => array('', '#0058b3'),
                    'arp_price_duration_color' => array('', '#444444'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#e52937'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#0058b3'),
                        'arp_price_duration_hover_color' => array('', '#444444'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'yellow' => array(
                    'arp_button_background' => array('#9cc31a'),
                    'arp_header_font_color' => array('', '#000000'),
                    'arp_price_value_color' => array('', '#0058b3'),
                    'arp_price_duration_color' => array('', '#444444'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#9cc31a'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#0058b3'),
                        'arp_price_duration_hover_color' => array('', '#444444'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'gray' => array(
                    'arp_button_background' => array('#757575'),
                    'arp_header_font_color' => array('', '#000000'),
                    'arp_price_value_color' => array('', '#0058b3'),
                    'arp_price_duration_color' => array('', '#444444'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#757575'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#0058b3'),
                        'arp_price_duration_hover_color' => array('', '#444444'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'darkblue' => array(
                    'arp_button_background' => array('#384c81'),
                    'arp_header_font_color' => array('', '#000000'),
                    'arp_price_value_color' => array('', '#0058b3'),
                    'arp_price_duration_color' => array('', '#444444'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#333333'),
                    'arp_body_even_font_color' => array('', '#333333'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#384c81'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#000000'),
                        'arp_price_value_hover_color' => array('', '#0058b3'),
                        'arp_price_duration_hover_color' => array('', '#444444'),
                        'arp_body_font_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#333333'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_button_background' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_price_duration_color' => '',
                    'arp_button_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'button_bg_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_price_duration_hover_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                    ),
                )
            ),
            'arptemplate_15' => array(
                'yellow' => array(
                    'arp_button_background' => array('#eaa700'),
                    'arp_price_background' => array('#f3f4f5'),
                    'arp_price_value_color' => array('', '#eaa700'),
                    'arp_price_duration_color' => array('', '#333333'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#eaa700', '#eaa700', '#eaa700', '#eaa700', '#eaa700'),
                        'price_bg_color' => array('#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#eaa700'),
                        'arp_price_duration_hover_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'red' => array(
                    'arp_button_background' => array('#ec155b'),
                    'arp_price_background' => array('#f3f4f5'),
                    'arp_price_value_color' => array('', '#ec155b'),
                    'arp_price_duration_color' => array('', '#333333'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ec155b', '#ec155b', '#ec155b', '#ec155b', '#ec155b'),
                        'price_bg_color' => array('#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ec155b'),
                        'arp_price_duration_hover_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'green' => array(
                    'arp_button_background' => array('#18b949'),
                    'arp_price_background' => array('#f3f4f5'),
                    'arp_price_value_color' => array('', '#18b949'),
                    'arp_price_duration_color' => array('', '#333333'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#18b949', '#18b949', '#18b949', '#18b949', '#18b949'),
                        'price_bg_color' => array('#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#18b949'),
                        'arp_price_duration_hover_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'cyan' => array(
                    'arp_button_background' => array('#09d1b5'),
                    'arp_price_background' => array('#f3f4f5'),
                    'arp_price_value_color' => array('', '#09d1b5'),
                    'arp_price_duration_color' => array('', '#333333'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#09d1b5', '#09d1b5', '#09d1b5', '#09d1b5', '#09d1b5'),
                        'price_bg_color' => array('#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#09d1b5'),
                        'arp_price_duration_hover_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'blue' => array(
                    'arp_button_background' => array('#10a4fa'),
                    'arp_price_background' => array('#f3f4f5'),
                    'arp_price_value_color' => array('', '#10a4fa'),
                    'arp_price_duration_color' => array('', '#333333'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#10a4fa', '#10a4fa', '#10a4fa', '#10a4fa', '#10a4fa'),
                        'price_bg_color' => array('#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#10a4fa'),
                        'arp_price_duration_hover_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'pink' => array(
                    'arp_button_background' => array('#ec3f8f'),
                    'arp_price_background' => array('#f3f4f5'),
                    'arp_price_value_color' => array('', '#ec3f8f'),
                    'arp_price_duration_color' => array('', '#333333'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#ec3f8f', '#ec3f8f', '#ec3f8f', '#ec3f8f', '#ec3f8f'),
                        'price_bg_color' => array('#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ec3f8f'),
                        'arp_price_duration_hover_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'purple' => array(
                    'arp_button_background' => array('#755ec6'),
                    'arp_price_background' => array('#f3f4f5'),
                    'arp_price_value_color' => array('', '#755ec6'),
                    'arp_price_duration_color' => array('', '#333333'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#755ec6', '#755ec6', '#755ec6', '#755ec6', '#755ec6'),
                        'price_bg_color' => array('#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#755ec6'),
                        'arp_price_duration_hover_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'orange' => array(
                    'arp_button_background' => array('#fa5655'),
                    'arp_price_background' => array('#f3f4f5'),
                    'arp_price_value_color' => array('', '#fa5655'),
                    'arp_price_duration_color' => array('', '#333333'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#fa5655', '#fa5655', '#fa5655', '#fa5655', '#fa5655'),
                        'price_bg_color' => array('#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#fa5655'),
                        'arp_price_duration_hover_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'darkyellow' => array(
                    'arp_button_background' => array('#be8e44'),
                    'arp_price_background' => array('#f3f4f5'),
                    'arp_price_value_color' => array('', '#be8e44'),
                    'arp_price_duration_color' => array('', '#333333'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#be8e44', '#be8e44', '#be8e44', '#be8e44', '#be8e44'),
                        'price_bg_color' => array('#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#be8e44'),
                        'arp_price_duration_hover_color' => array('', '#333333'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'limegreen' => array(
                    'arp_button_background' => array('#8ca91d'),
                    'arp_price_background' => array('#f3f4f5'),
                    'arp_price_value_color' => array('', '#8ca91d'),
                    'arp_price_duration_color' => array('', '#333333'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#8ca91d', '#8ca91d', '#8ca91d', '#8ca91d', '#8ca91d'),
                        'price_bg_color' => array('#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5', '#f3f4f5'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#8ca91d'),
                        'arp_price_duration_hover_color' => array('', '#333333'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_button_background' => '',
                    'arp_price_background' => '',
                    'arp_price_value_color' => '',
                    'arp_price_duration_color' => '',
                    'arp_header_font_color' => '',
                    'arp_button_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'button_bg_color' => '',
                        'price_bg_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_price_duration_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                        'arp_body_font_hover_color' => '',
                    ),
                )
            ),
            'arptemplate_16' => array(
                'orange' => array(
                    'arp_button_background' => array('#fe7c22'),
                    'arp_header_font_color' => array('', '#0b4a90'),
                    'arp_price_value_color' => array('', '#fe7c22'),
                    'arp_price_duration_color' => array('', '#fe7c22'),
                    'arp_desc_font_color' => array('', '#28292a'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#3e5d6c'),
                    'arp_body_even_font_color' => array('', '#3e5d6c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#B75918'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#0b4a90'),
                        'arp_price_value_hover_color' => array('', '#fe7c22'),
                        'arp_price_duration_hover_color' => array('', '#fe7c22'),
                        'arp_desc_hover_font_color' => array('', '#28292a'),
                        'arp_body_font_hover_color' => array('', '#3e5d6c'),
                        'arp_body_even_font_hover_color' => array('', '#3e5d6c'),
                    ),
                ),
                'darkgreen' => array(
                    'arp_button_background' => array('#6dae2e'),
                    'arp_header_font_color' => array('', '#0b4a90'),
                    'arp_price_value_color' => array('', '#6dae2e'),
                    'arp_price_duration_color' => array('', '#6dae2e'),
                    'arp_desc_font_color' => array('', '#28292a'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#3e5d6c'),
                    'arp_body_even_font_color' => array('', '#3e5d6c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#4E7D21'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#0b4a90'),
                        'arp_price_value_hover_color' => array('', '#6dae2e'),
                        'arp_price_duration_hover_color' => array('', '#6dae2e'),
                        'arp_desc_hover_font_color' => array('', '#28292a'),
                        'arp_body_font_hover_color' => array('', '#3e5d6c'),
                        'arp_body_even_font_hover_color' => array('', '#3e5d6c'),
                    ),
                ),
                'darkred' => array(
                    'arp_button_background' => array('#b41e1f'),
                    'arp_header_font_color' => array('', '#0b4a90'),
                    'arp_price_value_color' => array('', '#b41e1f'),
                    'arp_price_duration_color' => array('', '#b41e1f'),
                    'arp_desc_font_color' => array('', '#28292a'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#3e5d6c'),
                    'arp_body_even_font_color' => array('', '#3e5d6c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#821616'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#0b4a90'),
                        'arp_price_value_hover_color' => array('', '#b41e1f'),
                        'arp_price_duration_hover_color' => array('', '#b41e1f'),
                        'arp_desc_hover_font_color' => array('', '#28292a'),
                        'arp_body_font_hover_color' => array('', '#3e5d6c'),
                        'arp_body_even_font_hover_color' => array('', '#3e5d6c'),
                    ),
                ),
                'magenta' => array(
                    'arp_button_background' => array('#a859b5'),
                    'arp_header_font_color' => array('', '#0b4a90'),
                    'arp_price_value_color' => array('', '#a859b5'),
                    'arp_price_duration_color' => array('', '#a859b5'),
                    'arp_desc_font_color' => array('', '#28292a'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#3e5d6c'),
                    'arp_body_even_font_color' => array('', '#3e5d6c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#794082'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#0b4a90'),
                        'arp_price_value_hover_color' => array('', '#a859b5'),
                        'arp_price_duration_hover_color' => array('', '#a859b5'),
                        'arp_desc_hover_font_color' => array('', '#28292a'),
                        'arp_body_font_hover_color' => array('', '#3e5d6c'),
                        'arp_body_even_font_hover_color' => array('', '#3e5d6c'),
                    ),
                ),
                'blue' => array(
                    'arp_button_background' => array('#29a1d3'),
                    'arp_header_font_color' => array('', '#0b4a90'),
                    'arp_price_value_color' => array('', '#29a1d3'),
                    'arp_price_duration_color' => array('', '#29a1d3'),
                    'arp_desc_font_color' => array('', '#28292a'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#3e5d6c'),
                    'arp_body_even_font_color' => array('', '#3e5d6c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#1E7498'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#0b4a90'),
                        'arp_price_value_hover_color' => array('', '#29a1d3'),
                        'arp_price_duration_hover_color' => array('', '#29a1d3'),
                        'arp_desc_hover_font_color' => array('', '#28292a'),
                        'arp_body_font_hover_color' => array('', '#3e5d6c'),
                        'arp_body_even_font_hover_color' => array('', '#3e5d6c'),
                    ),
                ),
                'darkblue' => array(
                    'arp_button_background' => array('#2f3687'),
                    'arp_header_font_color' => array('', '#0b4a90'),
                    'arp_price_value_color' => array('', '#2f3687'),
                    'arp_price_duration_color' => array('', '#2f3687'),
                    'arp_desc_font_color' => array('', '#28292a'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#3e5d6c'),
                    'arp_body_even_font_color' => array('', '#3e5d6c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#222761'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#0b4a90'),
                        'arp_price_value_hover_color' => array('', '#2f3687'),
                        'arp_price_duration_hover_color' => array('', '#2f3687'),
                        'arp_desc_hover_font_color' => array('', '#28292a'),
                        'arp_body_font_hover_color' => array('', '#3e5d6c'),
                        'arp_body_even_font_hover_color' => array('', '#3e5d6c'),
                    ),
                ),
                'darkcyan' => array(
                    'arp_button_background' => array('#009e7b'),
                    'arp_header_font_color' => array('', '#0b4a90'),
                    'arp_price_value_color' => array('', '#009e7b'),
                    'arp_price_duration_color' => array('', '#009e7b'),
                    'arp_desc_font_color' => array('', '#28292a'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#3e5d6c'),
                    'arp_body_even_font_color' => array('', '#3e5d6c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#007259'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#0b4a90'),
                        'arp_price_value_hover_color' => array('', '#009e7b'),
                        'arp_price_duration_hover_color' => array('', '#009e7b'),
                        'arp_desc_hover_font_color' => array('', '#28292a'),
                        'arp_body_font_hover_color' => array('', '#3e5d6c'),
                        'arp_body_even_font_hover_color' => array('', '#3e5d6c'),
                    ),
                ),
                'red' => array(
                    'arp_button_background' => array('#e52937'),
                    'arp_header_font_color' => array('', '#0b4a90'),
                    'arp_price_value_color' => array('', '#e52937'),
                    'arp_price_duration_color' => array('', '#e52937'),
                    'arp_desc_font_color' => array('', '#28292a'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#3e5d6c'),
                    'arp_body_even_font_color' => array('', '#3e5d6c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#A51E28'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#0b4a90'),
                        'arp_price_value_hover_color' => array('', '#e52937'),
                        'arp_price_duration_hover_color' => array('', '#e52937'),
                        'arp_desc_hover_font_color' => array('', '#28292a'),
                        'arp_body_font_hover_color' => array('', '#3e5d6c'),
                        'arp_body_even_font_hover_color' => array('', '#3e5d6c'),
                    ),
                ),
                'darklimegreen' => array(
                    'arp_button_background' => array('#3d735b'),
                    'arp_header_font_color' => array('', '#0b4a90'),
                    'arp_price_value_color' => array('', '#3d735b'),
                    'arp_price_duration_color' => array('', '#3d735b'),
                    'arp_desc_font_color' => array('', '#28292a'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#3e5d6c'),
                    'arp_body_even_font_color' => array('', '#3e5d6c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#2C5342'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#0b4a90'),
                        'arp_price_value_hover_color' => array('', '#3d735b'),
                        'arp_price_duration_hover_color' => array('', '#3d735b'),
                        'arp_desc_hover_font_color' => array('', '#28292a'),
                        'arp_body_font_hover_color' => array('', '#3e5d6c'),
                        'arp_body_even_font_hover_color' => array('', '#3e5d6c'),
                    ),
                ),
                'gray' => array(
                    'arp_button_background' => array('#6d7c7f'),
                    'arp_header_font_color' => array('', '#0b4a90'),
                    'arp_price_value_color' => array('', '#6d7c7f'),
                    'arp_price_duration_color' => array('', '#6d7c7f'),
                    'arp_desc_font_color' => array('', '#28292a'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#3e5d6c'),
                    'arp_body_even_font_color' => array('', '#3e5d6c'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#4E595B'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#0b4a90'),
                        'arp_price_value_hover_color' => array('', '#6d7c7f'),
                        'arp_price_duration_hover_color' => array('', '#6d7c7f'),
                        'arp_desc_hover_font_color' => array('', '#28292a'),
                        'arp_body_font_hover_color' => array('', '#3e5d6c'),
                        'arp_body_even_font_hover_color' => array('', '#3e5d6c'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_button_background' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_price_duration_color' => '',
                    'arp_desc_font_color' => '',
                    'arp_button_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'button_bg_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_price_duration_hover_color' => '',
                        'arp_desc_hover_font_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                    ),
                )
            ),
            'arptemplate_20' => array(
                'blue' => array(
                    'arp_header_background' => array('#00baff'),
                    'arp_column_background' => array('#ffffff'),
                    'arp_button_background' => array('#00baff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#00baff'),
                    'arp_price_duration_color' => array('', '#00baff'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#1d1d1d'),
                    'arp_body_even_font_color' => array('', '#1d1d1d'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#00baff'),
                        'button_bg_color' => array('#ffffff'),
                        'header_bg_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#00baff'),
                        'arp_header_hover_font_color' => array('', '#00baff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'pink' => array(
                    'arp_header_background' => array('#d81a60'),
                    'arp_column_background' => array('#ffffff'),
                    'arp_button_background' => array('#d81a60'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#d81a60'),
                    'arp_price_duration_color' => array('', '#d81a60'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#1d1d1d'),
                    'arp_body_even_font_color' => array('', '#1d1d1d'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#d81a60'),
                        'button_bg_color' => array('#ffffff'),
                        'header_bg_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#d81a60'),
                        'arp_header_hover_font_color' => array('', '#d81a60'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'red' => array(
                    'arp_header_background' => array('#F73300'),
                    'arp_column_background' => array('#ffffff'),
                    'arp_button_background' => array('#F73300'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#F73300'),
                    'arp_price_duration_color' => array('', '#F73300'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#1d1d1d'),
                    'arp_body_even_font_color' => array('', '#1d1d1d'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#F73300'),
                        'button_bg_color' => array('#ffffff'),
                        'header_bg_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#F73300'),
                        'arp_header_hover_font_color' => array('', '#F73300'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'yellow' => array(
                    'arp_header_background' => array('#FFC22C'),
                    'arp_column_background' => array('#ffffff'),
                    'arp_button_background' => array('#FFC22C'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#FFC22C'),
                    'arp_price_duration_color' => array('', '#FFC22C'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#1d1d1d'),
                    'arp_body_even_font_color' => array('', '#1d1d1d'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#FFC22C'),
                        'button_bg_color' => array('#ffffff'),
                        'header_bg_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#FFC22C'),
                        'arp_header_hover_font_color' => array('', '#FFC22C'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'green' => array(
                    'arp_header_background' => array('#8ACA01'),
                    'arp_column_background' => array('#ffffff'),
                    'arp_button_background' => array('#8ACA01'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#8ACA01'),
                    'arp_price_duration_color' => array('', '#8ACA01'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#1d1d1d'),
                    'arp_body_even_font_color' => array('', '#1d1d1d'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#8ACA01'),
                        'button_bg_color' => array('#ffffff'),
                        'header_bg_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#8ACA01'),
                        'arp_header_hover_font_color' => array('', '#8ACA01'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'cyan' => array(
                    'arp_header_background' => array('#57CC7D'),
                    'arp_column_background' => array('#ffffff'),
                    'arp_button_background' => array('#57CC7D'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#57CC7D'),
                    'arp_price_duration_color' => array('', '#57CC7D'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#1d1d1d'),
                    'arp_body_even_font_color' => array('', '#1d1d1d'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#57CC7D'),
                        'button_bg_color' => array('#ffffff'),
                        'header_bg_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#57CC7D'),
                        'arp_header_hover_font_color' => array('', '#57CC7D'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'strongviolet' => array(
                    'arp_header_background' => array('#4617B5'),
                    'arp_column_background' => array('#ffffff'),
                    'arp_button_background' => array('#4617B5'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#4617B5'),
                    'arp_price_duration_color' => array('', '#4617B5'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#1d1d1d'),
                    'arp_body_even_font_color' => array('', '#1d1d1d'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#4617B5'),
                        'button_bg_color' => array('#ffffff'),
                        'header_bg_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#4617B5'),
                        'arp_header_hover_font_color' => array('', '#4617B5'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'violet' => array(
                    'arp_header_background' => array('#6900B4'),
                    'arp_column_background' => array('#ffffff'),
                    'arp_button_background' => array('#6900B4'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#6900B4'),
                    'arp_price_duration_color' => array('', '#6900B4'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#1d1d1d'),
                    'arp_body_even_font_color' => array('', '#1d1d1d'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#6900B4'),
                        'button_bg_color' => array('#ffffff'),
                        'header_bg_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#6900B4'),
                        'arp_header_hover_font_color' => array('', '#6900B4'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'lightviolet' => array(
                    'arp_header_background' => array('#A23BCA'),
                    'arp_column_background' => array('#ffffff'),
                    'arp_button_background' => array('#A23BCA'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#A23BCA'),
                    'arp_price_duration_color' => array('', '#A23BCA'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#1d1d1d'),
                    'arp_body_even_font_color' => array('', '#1d1d1d'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#A23BCA'),
                        'button_bg_color' => array('#ffffff'),
                        'header_bg_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#A23BCA'),
                        'arp_header_hover_font_color' => array('', '#A23BCA'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'darkyellow' => array(
                    'arp_header_background' => array('#D8C022'),
                    'arp_column_background' => array('#ffffff'),
                    'arp_button_background' => array('#D8C022'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#D8C022'),
                    'arp_price_duration_color' => array('', '#D8C022'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#1d1d1d'),
                    'arp_body_even_font_color' => array('', '#1d1d1d'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#D8C022'),
                        'button_bg_color' => array('#ffffff'),
                        'header_bg_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#D8C022'),
                        'arp_header_hover_font_color' => array('', '#D8C022'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'grey' => array(
                    'arp_header_background' => array('#858585'),
                    'arp_column_background' => array('#ffffff'),
                    'arp_button_background' => array('#858585'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#858585'),
                    'arp_price_duration_color' => array('', '#858585'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#1d1d1d'),
                    'arp_body_even_font_color' => array('', '#1d1d1d'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#858585'),
                        'button_bg_color' => array('#ffffff'),
                        'header_bg_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#858585'),
                        'arp_header_hover_font_color' => array('', '#858585'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'black' => array(
                    'arp_header_background' => array('#1D1D1D'),
                    'arp_column_background' => array('#ffffff'),
                    'arp_button_background' => array('#1D1D1D'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#1D1D1D'),
                    'arp_price_duration_color' => array('', '#1D1D1D'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#1d1d1d'),
                    'arp_body_even_font_color' => array('', '#1d1d1d'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#1D1D1D'),
                        'button_bg_color' => array('#ffffff'),
                        'header_bg_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#1D1D1D'),
                        'arp_header_hover_font_color' => array('', '#1D1D1D'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_price_duration_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_header_background' => '',
                    'arp_column_background' => '',
                    'arp_button_background' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_price_duration_color' => '',
                    'arp_button_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'column_bg_color' => '',
                        'button_bg_color' => '',
                        'header_bg_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_price_duration_hover_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                    ),
                )
            ),
            'arptemplate_21' => array(
                'pink' => array(
                    'arp_column_background' => array('#D81A60'),
                    'arp_button_background' => array('#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#010509'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#ffffff'),
                        'button_bg_color' => array('#D81A60'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#D81A60'),
                        'arp_body_font_hover_color' => array('', '#393939'),
                        'arp_body_even_font_hover_color' => array('', '#393939'),
                    ),
                ),
                'red' => array(
                    'arp_column_background' => array('#F73300'),
                    'arp_button_background' => array('#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#010509'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#ffffff'),
                        'button_bg_color' => array('#F73300'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#F73300'),
                        'arp_body_font_hover_color' => array('', '#393939'),
                        'arp_body_even_font_hover_color' => array('', '#393939'),
                    ),
                ),
                'yellow' => array(
                    'arp_column_background' => array('#FFC22C'),
                    'arp_button_background' => array('#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#010509'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#ffffff'),
                        'button_bg_color' => array('#FFC22C'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#FFC22C'),
                        'arp_body_font_hover_color' => array('', '#393939'),
                        'arp_body_even_font_hover_color' => array('', '#393939'),
                    ),
                ),
                'green' => array(
                    'arp_column_background' => array('#8ACA01'),
                    'arp_button_background' => array('#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#010509'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#ffffff'),
                        'button_bg_color' => array('#8ACA01'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#8ACA01'),
                        'arp_body_font_hover_color' => array('', '#393939'),
                        'arp_body_even_font_hover_color' => array('', '#393939'),
                    ),
                ),
                'darklimegreen' => array(
                    'arp_column_background' => array('#169800'),
                    'arp_button_background' => array('#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#010509'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#ffffff'),
                        'button_bg_color' => array('#169800'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#169800'),
                        'arp_body_font_hover_color' => array('', '#393939'),
                        'arp_body_even_font_hover_color' => array('', '#393939'),
                    ),
                ),
                'limecyan' => array(
                    'arp_column_background' => array('#57CC7D'),
                    'arp_button_background' => array('#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#010509'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#ffffff'),
                        'button_bg_color' => array('#57CC7D'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#57CC7D'),
                        'arp_body_font_hover_color' => array('', '#393939'),
                        'arp_body_even_font_hover_color' => array('', '#393939'),
                    ),
                ),
                'cyan' => array(
                    'arp_column_background' => array('#00D2D3'),
                    'arp_button_background' => array('#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#010509'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#ffffff'),
                        'button_bg_color' => array('#00D2D3'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#00D2D3'),
                        'arp_body_font_hover_color' => array('', '#393939'),
                        'arp_body_even_font_hover_color' => array('', '#393939'),
                    ),
                ),
                'lightblue' => array(
                    'arp_column_background' => array('#41C3FF'),
                    'arp_button_background' => array('#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#010509'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#ffffff'),
                        'button_bg_color' => array('#41C3FF'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#41C3FF'),
                        'arp_body_font_hover_color' => array('', '#393939'),
                        'arp_body_even_font_hover_color' => array('', '#393939'),
                    ),
                ),
                'blue' => array(
                    'arp_column_background' => array('#008EE2'),
                    'arp_button_background' => array('#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#010509'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#ffffff'),
                        'button_bg_color' => array('#008EE2'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#008EE2'),
                        'arp_body_font_hover_color' => array('', '#393939'),
                        'arp_body_even_font_hover_color' => array('', '#393939'),
                    ),
                ),
                'strongviolet' => array(
                    'arp_column_background' => array('#6900B4'),
                    'arp_button_background' => array('#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#010509'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#ffffff'),
                        'button_bg_color' => array('#6900B4'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#6900B4'),
                        'arp_body_font_hover_color' => array('', '#393939'),
                        'arp_body_even_font_hover_color' => array('', '#393939'),
                    ),
                ),
                'purepink' => array(
                    'arp_column_background' => array('#F900A6'),
                    'arp_button_background' => array('#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#010509'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#ffffff'),
                        'button_bg_color' => array('#F900A6'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#F900A6'),
                        'arp_body_font_hover_color' => array('', '#393939'),
                        'arp_body_even_font_hover_color' => array('', '#393939'),
                    ),
                ),
                'darkred' => array(
                    'arp_column_background' => array('#BE0022'),
                    'arp_button_background' => array('#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#010509'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#ffffff'),
                        'button_bg_color' => array('#BE0022'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#BE0022'),
                        'arp_body_font_hover_color' => array('', '#393939'),
                        'arp_body_even_font_hover_color' => array('', '#393939'),
                    ),
                ),
                'gray' => array(
                    'arp_column_background' => array('#5E5E5E'),
                    'arp_button_background' => array('#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#010509'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#ffffff'),
                        'button_bg_color' => array('#5E5E5E'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#5E5E5E'),
                        'arp_body_font_hover_color' => array('', '#393939'),
                        'arp_body_even_font_hover_color' => array('', '#393939'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_column_background' => '',
                    'arp_button_background' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_button_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'column_bg_color' => '',
                        'button_bg_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                    ),
                )
            ),
            'arptemplate_22' => array(
                'red' => array(
                    'arp_column_background' => array('#E40031', '#E40031', '#E40031', '#E40031', '#E40031'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#e40031'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#5c5c5c'),
                    'arp_body_even_font_color' => array('', '#5c5c5c'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#E40031', '#E40031', '#E40031', '#E40031', '#E40031'),
                        'button_bg_color' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#e40031'),
                        'arp_body_font_hover_color' => array('', '#5c5c5c'),
                        'arp_body_even_font_hover_color' => array('', '#5c5c5c'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'darkpink' => array(
                    'arp_column_background' => array('#D90051', '#D90051', '#D90051', '#D90051', '#D90051'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#D90051'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#5c5c5c'),
                    'arp_body_even_font_color' => array('', '#5c5c5c'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#D90051', '#D90051', '#D90051', '#D90051', '#D90051'),
                        'button_bg_color' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#D90051'),
                        'arp_body_font_hover_color' => array('', '#5c5c5c'),
                        'arp_body_even_font_hover_color' => array('', '#5c5c5c'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'orange' => array(
                    'arp_column_background' => array('#FAA71B', '#FAA71B', '#FAA71B', '#FAA71B', '#FAA71B'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#FAA71B'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#5c5c5c'),
                    'arp_body_even_font_color' => array('', '#5c5c5c'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#FAA71B', '#FAA71B', '#FAA71B', '#FAA71B', '#FAA71B'),
                        'button_bg_color' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#FAA71B'),
                        'arp_body_font_hover_color' => array('', '#5c5c5c'),
                        'arp_body_even_font_hover_color' => array('', '#5c5c5c'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'lightorange' => array(
                    'arp_column_background' => array('#FFC22C', '#FFC22C', '#FFC22C', '#FFC22C', '#FFC22C'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#FFC22C'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#5c5c5c'),
                    'arp_body_even_font_color' => array('', '#5c5c5c'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#FFC22C', '#FFC22C', '#FFC22C', '#FFC22C', '#FFC22C'),
                        'button_bg_color' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#FFC22C'),
                        'arp_body_font_hover_color' => array('', '#5c5c5c'),
                        'arp_body_even_font_hover_color' => array('', '#5c5c5c'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'limegreen' => array(
                    'arp_column_background' => array('#60C150', '#60C150', '#60C150', '#60C150', '#60C150'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#60C150'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#5c5c5c'),
                    'arp_body_even_font_color' => array('', '#5c5c5c'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#60C150', '#60C150', '#60C150', '#60C150', '#60C150'),
                        'button_bg_color' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#60C150'),
                        'arp_body_font_hover_color' => array('', '#5c5c5c'),
                        'arp_body_even_font_hover_color' => array('', '#5c5c5c'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'green' => array(
                    'arp_column_background' => array('#57CC7D', '#57CC7D', '#57CC7D', '#57CC7D', '#57CC7D'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#57CC7D'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#5c5c5c'),
                    'arp_body_even_font_color' => array('', '#5c5c5c'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#57CC7D', '#57CC7D', '#57CC7D', '#57CC7D', '#57CC7D'),
                        'button_bg_color' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#57CC7D'),
                        'arp_body_font_hover_color' => array('', '#5c5c5c'),
                        'arp_body_even_font_hover_color' => array('', '#5c5c5c'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'cyan' => array(
                    'arp_column_background' => array('#57DEE1', '#57DEE1', '#57DEE1', '#57DEE1', '#57DEE1'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#57DEE1'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#5c5c5c'),
                    'arp_body_even_font_color' => array('', '#5c5c5c'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#57DEE1', '#57DEE1', '#57DEE1', '#57DEE1', '#57DEE1'),
                        'button_bg_color' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#57DEE1'),
                        'arp_body_font_hover_color' => array('', '#5c5c5c'),
                        'arp_body_even_font_hover_color' => array('', '#5c5c5c'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'lightblue' => array(
                    'arp_column_background' => array('#41C3FF', '#41C3FF', '#41C3FF', '#41C3FF', '#41C3FF'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#41C3FF'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#5c5c5c'),
                    'arp_body_even_font_color' => array('', '#5c5c5c'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#41C3FF', '#41C3FF', '#41C3FF', '#41C3FF', '#41C3FF'),
                        'button_bg_color' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#41C3FF'),
                        'arp_body_font_hover_color' => array('', '#5c5c5c'),
                        'arp_body_even_font_hover_color' => array('', '#5c5c5c'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'blue' => array(
                    'arp_column_background' => array('#008EE2', '#008EE2', '#008EE2', '#008EE2', '#008EE2'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#008EE2'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#5c5c5c'),
                    'arp_body_even_font_color' => array('', '#5c5c5c'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#008EE2', '#008EE2', '#008EE2', '#008EE2', '#008EE2'),
                        'button_bg_color' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#008EE2'),
                        'arp_body_font_hover_color' => array('', '#5c5c5c'),
                        'arp_body_even_font_hover_color' => array('', '#5c5c5c'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'brightblue' => array(
                    'arp_column_background' => array('#3E52F3', '#3E52F3', '#3E52F3', '#3E52F3', '#3E52F3'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#3E52F3'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#5c5c5c'),
                    'arp_body_even_font_color' => array('', '#5c5c5c'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#3E52F3', '#3E52F3', '#3E52F3', '#3E52F3', '#3E52F3'),
                        'button_bg_color' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#3E52F3'),
                        'arp_body_font_hover_color' => array('', '#5c5c5c'),
                        'arp_body_even_font_hover_color' => array('', '#5c5c5c'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'violet' => array(
                    'arp_column_background' => array('#6F04F4', '#6F04F4', '#6F04F4', '#6F04F4', '#6F04F4'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#6F04F4'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#5c5c5c'),
                    'arp_body_even_font_color' => array('', '#5c5c5c'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#6F04F4', '#6F04F4', '#6F04F4', '#6F04F4', '#6F04F4'),
                        'button_bg_color' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#6F04F4'),
                        'arp_body_font_hover_color' => array('', '#5c5c5c'),
                        'arp_body_even_font_hover_color' => array('', '#5c5c5c'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'softviolet' => array(
                    'arp_column_background' => array('#8656E0', '#8656E0', '#8656E0', '#8656E0', '#8656E0'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#8656E0'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#5c5c5c'),
                    'arp_body_even_font_color' => array('', '#5c5c5c'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#8656E0', '#8656E0', '#8656E0', '#8656E0', '#8656E0'),
                        'button_bg_color' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#8656E0'),
                        'arp_body_font_hover_color' => array('', '#5c5c5c'),
                        'arp_body_even_font_hover_color' => array('', '#5c5c5c'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'gray' => array(
                    'arp_column_background' => array('#33363F', '#33363F', '#33363F', '#33363F', '#33363F'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#33363F'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#5c5c5c'),
                    'arp_body_even_font_color' => array('', '#5c5c5c'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#33363F', '#33363F', '#33363F', '#33363F', '#33363F'),
                        'button_bg_color' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#33363F'),
                        'arp_body_font_hover_color' => array('', '#5c5c5c'),
                        'arp_body_even_font_hover_color' => array('', '#5c5c5c'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'black' => array(
                    'arp_column_background' => array('#1D1D1D', '#1D1D1D', '#1D1D1D', '#1D1D1D', '#1D1D1D'),
                    'arp_price_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_background' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                    'arp_body_odd_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_body_even_row_background_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff',),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#1D1D1D'),
                    'arp_button_font_color' => array('', '#ffffff'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#5c5c5c'),
                    'arp_body_even_font_color' => array('', '#5c5c5c'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#1D1D1D', '#1D1D1D', '#1D1D1D', '#1D1D1D', '#1D1D1D'),
                        'button_bg_color' => array('#363636', '#363636', '#363636', '#363636', '#363636'),
                        'price_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ffffff'),
                        'arp_body_even_row_hover_background_color' => array('#ffffff'),
                        'arp_button_hover_font_color' => array('', '#ffffff'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#1D1D1D'),
                        'arp_body_font_hover_color' => array('', '#5c5c5c'),
                        'arp_body_even_font_hover_color' => array('', '#5c5c5c'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_column_background' => '',
                    'arp_price_background' => '',
                    'arp_button_background' => '',
                    'arp_body_odd_row_background_color' => '',
                    'arp_body_even_row_background_color' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_button_font_color' => '',
                    'arp_footer_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'column_bg_color' => '',
                        'button_bg_color' => '',
                        'price_bg_color' => '',
                        'arp_body_odd_row_hover_background_color' => '',
                        'arp_body_even_row_hover_background_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                        'arp_footer_hover_font_color' => '',
                    ),
                )
            ),
            'arptemplate_23' => array(
                'orange' => array(
                    'arp_column_background' => array('#fdb515', '#fdb515', '#fdb515', '#fdb515', '#fdb515'),
                    'arp_price_background' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#a2a8b1'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#e8a623'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#fdb515', '#fdb515', '#fdb515', '#fdb515', '#fdb515'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'price_bg_color' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                        'arp_button_hover_font_color' => array('', '#e8a623'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#a2a8b1'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'blue' => array('arp_column_background' => array('#4dc8f4', '#4dc8f4', '#4dc8f4', '#4dc8f4', '#4dc8f4'),
                    'arp_price_background' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#a2a8b1'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#4dc8f4'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#4dc8f4', '#4dc8f4', '#4dc8f4', '#4dc8f4', '#4dc8f4'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'price_bg_color' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                        'arp_button_hover_font_color' => array('', '#4dc8f4'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#a2a8b1'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'brightblue' => array(
                    'arp_column_background' => array('#43b2e7', '#43b2e7', '#43b2e7', '#43b2e7', '#43b2e7'),
                    'arp_price_background' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#a2a8b1'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#43b2e7'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#43b2e7', '#43b2e7', '#43b2e7', '#43b2e7', '#43b2e7'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'price_bg_color' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                        'arp_button_hover_font_color' => array('', '#43b2e7'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#a2a8b1'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'green' => array(
                    'arp_column_background' => array('#a2cc3a', '#a2cc3a', '#a2cc3a', '#a2cc3a', '#a2cc3a'),
                    'arp_price_background' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#a2a8b1'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#a2cc3a'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#a2cc3a', '#a2cc3a', '#a2cc3a', '#a2cc3a', '#a2cc3a'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'price_bg_color' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                        'arp_button_hover_font_color' => array('', '#a2cc3a'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#a2a8b1'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'limegreen' => array(
                    'arp_column_background' => array('#70c27a', '#70c27a', '#70c27a', '#70c27a', '#70c27a'),
                    'arp_price_background' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#a2a8b1'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#70c27a'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#70c27a', '#70c27a', '#70c27a', '#70c27a', '#70c27a'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'price_bg_color' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                        'arp_button_hover_font_color' => array('', '#70c27a'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#a2a8b1'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'darkblue' => array(
                    'arp_column_background' => array('#5a79bc', '#5a79bc', '#5a79bc', '#5a79bc', '#5a79bc'),
                    'arp_price_background' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#a2a8b1'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#5a79bc'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#5a79bc', '#5a79bc', '#5a79bc', '#5a79bc', '#5a79bc'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'price_bg_color' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                        'arp_button_hover_font_color' => array('', '#5a79bc'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#a2a8b1'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'darkviolet' => array(
                    'arp_column_background' => array('#5f5ca9', '#5f5ca9', '#5f5ca9', '#5f5ca9', '#5f5ca9'),
                    'arp_price_background' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#a2a8b1'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#5f5ca9'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#5f5ca9', '#5f5ca9', '#5f5ca9', '#5f5ca9', '#5f5ca9'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'price_bg_color' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                        'arp_button_hover_font_color' => array('', '#5f5ca9'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#a2a8b1'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'violet' => array(
                    'arp_column_background' => array('#744f9c', '#744f9c', '#744f9c', '#744f9c', '#744f9c'),
                    'arp_price_background' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#a2a8b1'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#744f9c'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#744f9c', '#744f9c', '#744f9c', '#744f9c', '#744f9c'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'price_bg_color' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                        'arp_button_hover_font_color' => array('', '#744f9c'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#a2a8b1'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'pink' => array(
                    'arp_column_background' => array('#dc397a', '#dc397a', '#dc397a', '#dc397a', '#dc397a'),
                    'arp_price_background' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#a2a8b1'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#dc397a'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#dc397a', '#dc397a', '#dc397a', '#dc397a', '#dc397a'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'price_bg_color' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                        'arp_button_hover_font_color' => array('', '#dc397a'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#a2a8b1'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'red' => array(
                    'arp_column_background' => array('#e01e38', '#e01e38', '#e01e38', '#e01e38', '#e01e38'),
                    'arp_price_background' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#a2a8b1'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#e01e38'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#e01e38', '#e01e38', '#e01e38', '#e01e38', '#e01e38'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'price_bg_color' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                        'arp_button_hover_font_color' => array('', '#e01e38'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#a2a8b1'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'gray' => array(
                    'arp_column_background' => array('#4a4957', '#4a4957', '#4a4957', '#4a4957', '#4a4957'),
                    'arp_price_background' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#a2a8b1'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#4a4957'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#4a4957', '#4a4957', '#4a4957', '#4a4957', '#4a4957'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'price_bg_color' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                        'arp_button_hover_font_color' => array('', '#4a4957'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#a2a8b1'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'black' => array(
                    'arp_column_background' => array('#35343a', '#35343a', '#35343a', '#35343a', '#35343a'),
                    'arp_price_background' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#a2a8b1'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#35343a'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#35343a', '#35343a', '#35343a', '#35343a', '#35343a'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'price_bg_color' => array('#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd', '#f6f9fd'),
                        'arp_button_hover_font_color' => array('', '#35343a'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#a2a8b1'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_column_background' => '',
                    'arp_price_background' => '',
                    'arp_button_background' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_desc_font_color' => '',
                    'arp_button_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'column_bg_color' => '',
                        'button_bg_color' => '',
                        'price_bg_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_desc_hover_font_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                    ),
                )
            ),
            'arptemplate_24' => array(
                'darkblue' => array(
                    'arp_column_background' => array('#5c57b1', '#5c57b1', '#5c57b1', '#5c57b1', '#5c57b1'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#3c3b45'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#5c57b1', '#5c57b1', '#5c57b1', '#5c57b1', '#5c57b1'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#3c3b45'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'pink' => array(
                    'arp_column_background' => array('#d81a60', '#d81a60', '#d81a60', '#d81a60', '#d81a60',),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#3c3b45'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#d81a60', '#d81a60', '#d81a60', '#d81a60', '#d81a60'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#3c3b45'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'red' => array(
                    'arp_column_background' => array('#eb3102', '#eb3102', '#eb3102', '#eb3102', '#eb3102'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#3c3b45'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#eb3102', '#eb3102', '#eb3102', '#eb3102', '#eb3102'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#3c3b45'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'orange' => array(
                    'arp_column_background' => array('#ff892b', '#ff892b', '#ff892b', '#ff892b', '#ff892b'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#3c3b45'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#ff892b', '#ff892b', '#ff892b', '#ff892b', '#ff892b'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#3c3b45'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'darkgreen' => array(
                    'arp_column_background' => array('#6db000', '#6db000', '#6db000', '#6db000', '#6db000'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#3c3b45'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#6db000', '#6db000', '#6db000', '#6db000', '#6db000'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#3c3b45'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'darkcyan' => array(
                    'arp_column_background' => array('#0c898b', '#0c898b', '#0c898b', '#0c898b', '#0c898b'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#3c3b45'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#0c898b', '#0c898b', '#0c898b', '#0c898b', '#0c898b'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#3c3b45'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'lightblue' => array(
                    'arp_column_background' => array('#41c3ff', '#41c3ff', '#41c3ff', '#41c3ff', '#41c3ff'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#3c3b45'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#41c3ff', '#41c3ff', '#41c3ff', '#41c3ff', '#41c3ff'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#3c3b45'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'blue' => array(
                    'arp_column_background' => array('#008ee2', '#008ee2', '#008ee2', '#008ee2', '#008ee2'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#3c3b45'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#008ee2', '#008ee2', '#008ee2', '#008ee2', '#008ee2'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#3c3b45'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'violet' => array(
                    'arp_column_background' => array('#6900b4', '#6900b4', '#6900b4', '#6900b4', '#6900b4'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#3c3b45'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#6900b4', '#6900b4', '#6900b4', '#6900b4', '#6900b4'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#3c3b45'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'strongpink' => array(
                    'arp_column_background' => array('#cc0288', '#cc0288', '#cc0288', '#cc0288', '#cc0288'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#3c3b45'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#cc0288', '#cc0288', '#cc0288', '#cc0288', '#cc0288'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#3c3b45'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'gray' => array(
                    'arp_column_background' => array('#5e5e5e', '#5e5e5e', '#5e5e5e', '#5e5e5e', '#5e5e5e'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#3c3b45'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#5e5e5e', '#5e5e5e', '#5e5e5e', '#5e5e5e', '#5e5e5e'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#3c3b45'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'black' => array(
                    'arp_column_background' => array('#1d1d1d', '#1d1d1d', '#1d1d1d', '#1d1d1d', '#1d1d1d'),
                    'arp_button_background' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_header_font_color' => array('', '#ffffff'),
                    'arp_price_value_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('', '#3c3b45'),
                    'arp_footer_font_color' => array('', '#ffffff'),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'column_bg_color' => array('#1d1d1d', '#1d1d1d', '#1d1d1d', '#1d1d1d', '#1d1d1d'),
                        'button_bg_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_button_hover_font_color' => array('', '#3c3b45'),
                        'arp_header_hover_font_color' => array('', '#ffffff'),
                        'arp_price_value_hover_color' => array('', '#ffffff'),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_footer_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_column_background' => '',
                    'arp_button_background' => '',
                    'arp_header_font_color' => '',
                    'arp_price_value_color' => '',
                    'arp_button_font_color' => '',
                    'arp_footer_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'column_bg_color' => '',
                        'button_bg_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_price_value_hover_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                        'arp_footer_hover_font_color' => '',
                    ),
                )
            ),
            'arptemplate_25' => array(
                'blue' => array(
                    'arp_header_background' => array('#2FB8FF', '#2FB8FF', '#2FB8FF', '#2FB8FF', '#2FB8FF', '#2FB8FF'),
                    'arp_column_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                    'arp_button_background' => array('#2FB8FF', '#2FB8FF', '#2FB8FF', '#2FB8FF', '#2FB8FF', '#2FB8FF'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_background' => array('#2FB8FF', '#2FB8FF', '#2FB8FF', '#2FB8FF', '#2FB8FF', '#2FB8FF'),
                    'arp_body_odd_row_background_color' => array('#272727'),
                    'arp_body_even_row_background_color' => array('#272727', "#272727"),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'header_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'column_bg_color' => array('#2FB8FF', '#2FB8FF', '#2FB8FF', '#2FB8FF', '#2FB8FF', '#2FB8FF'),
                        'arp_body_odd_row_hover_background_color' => array('#2fb8ff'),
                        'arp_body_even_row_hover_background_color' => array('#2fb8ff', "#2fb8ff"),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    ),
                ),
                'green' => array(
                    'arp_header_background' => array('#00D29D', '#00D29D', '#00D29D', '#00D29D', '#00D29D', '#00D29D'),
                    'arp_column_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                    'arp_button_background' => array('#00D29D', '#00D29D', '#00D29D', '#00D29D', '#00D29D', '#00D29D'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_background' => array('#00D29D', '#00D29D', '#00D29D', '#00D29D', '#00D29D', '#00D29D'),
                    'arp_body_odd_row_background_color' => array('#272727'),
                    'arp_body_even_row_background_color' => array('#272727', "#272727"),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'header_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'column_bg_color' => array('#00D29D', '#00D29D', '#00D29D', '#00D29D', '#00D29D', '#00D29D'),
                        'arp_body_odd_row_hover_background_color' => array('#00d29d'),
                        'arp_body_even_row_hover_background_color' => array('#00d29d', "#00d29d"),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    ),
                ),
                'red' => array(
                    'arp_header_background' => array('#FF2476', '#FF2476', '#FF2476', '#FF2476', '#FF2476', '#FF2476'),
                    'arp_column_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                    'arp_button_background' => array('#FF2476', '#FF2476', '#FF2476', '#FF2476', '#FF2476', '#FF2476'),
                    'arp_desc_background' => array('#FF2476', '#FF2476', '#FF2476', '#FF2476', '#FF2476', '#FF2476'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#272727'),
                    'arp_body_even_row_background_color' => array('#272727', "#272727"),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'header_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'column_bg_color' => array('#FF2476', '#FF2476', '#FF2476', '#FF2476', '#FF2476', '#FF2476'),
                        'arp_desc_hover_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#ff2476'),
                        'arp_body_even_row_hover_background_color' => array('#ff2476', "#ff2476"),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    ),
                ),
                'lightviolet' => array(
                    'arp_header_background' => array('#5178F7', '#5178F7', '#5178F7', '#5178F7', '#5178F7', '#5178F7'),
                    'arp_column_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                    'arp_button_background' => array('#5178F7', '#5178F7', '#5178F7', '#5178F7', '#5178F7', '#5178F7'),
                    'arp_desc_background' => array('#5178F7', '#5178F7', '#5178F7', '#5178F7', '#5178F7', '#5178F7'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#272727'),
                    'arp_body_even_row_background_color' => array('#272727', "#272727"),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'header_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#5178f7'),
                        'arp_body_even_row_hover_background_color' => array('#5178f7', "#5178f7"),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'column_bg_color' => array('#5178F7', '#5178F7', '#5178F7', '#5178F7', '#5178F7', '#5178F7'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    ),
                ),
                'lightred' => array(
                    'arp_header_background' => array('#F65052', '#F65052', '#F65052', '#F65052', '#F65052', '#F65052'),
                    'arp_column_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                    'arp_button_background' => array('#F65052', '#F65052', '#F65052', '#F65052', '#F65052', '#F65052'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#272727'),
                    'arp_body_even_row_background_color' => array('#272727', "#272727"),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_desc_background' => array('#F65052', '#F65052', '#F65052', '#F65052', '#F65052', '#F65052'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'header_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'column_bg_color' => array('#F65052', '#F65052', '#F65052', '#F65052', '#F65052', '#F65052'),
                        'arp_body_odd_row_hover_background_color' => array('#f65052'),
                        'arp_body_even_row_hover_background_color' => array('#f65052', "#f65052"),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    ),
                ),
                'orange' => array(
                    'arp_header_background' => array('#FEA60E', '#FEA60E', '#FEA60E', '#FEA60E', '#FEA60E', '#FEA60E'),
                    'arp_column_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                    'arp_button_background' => array('#FEA60E', '#FEA60E', '#FEA60E', '#FEA60E', '#FEA60E', '#FEA60E'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_background' => array('#FEA60E', '#FEA60E', '#FEA60E', '#FEA60E', '#FEA60E', '#FEA60E'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#272727'),
                    'arp_body_even_row_background_color' => array('#272727', "#272727"),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'header_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#fea60e'),
                        'arp_body_even_row_hover_background_color' => array('#fea60e', "#fea60e"),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'column_bg_color' => array('#FEA60E', '#FEA60E', '#FEA60E', '#FEA60E', '#FEA60E', '#FEA60E'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    ),
                ),
                'lightgreen' => array(
                    'arp_header_background' => array('#6FC033', '#6FC033', '#6FC033', '#6FC033', '#6FC033', '#6FC033'),
                    'arp_column_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                    'arp_button_background' => array('#6FC033', '#6FC033', '#6FC033', '#6FC033', '#6FC033', '#6FC033'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_background' => array('#6FC033', '#6FC033', '#6FC033', '#6FC033', '#6FC033', '#6FC033'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#272727'),
                    'arp_body_even_row_background_color' => array('#272727', "#272727"),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'header_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'column_bg_color' => array('#6FC033', '#6FC033', '#6FC033'),
                        'arp_body_odd_row_hover_background_color' => array('#6fc033'),
                        'arp_body_even_row_hover_background_color' => array('#6fc033', "#6fc033"),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    ),
                ),
                'darkgreen' => array(
                    'arp_header_background' => array('#34C159', '#34C159', '#34C159', '#34C159', '#34C159', '#34C159'),
                    'arp_column_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                    'arp_button_background' => array('#34C159', '#34C159', '#34C159', '#34C159', '#34C159', '#34C159'),
                    'arp_desc_background' => array('#34C159', '#34C159', '#34C159', '#34C159', '#34C159', '#34C159'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#272727'),
                    'arp_body_even_row_background_color' => array('#272727', "#272727"),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'header_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'column_bg_color' => array('#34C159', '#34C159', '#34C159', '#34C159', '#34C159', '#34C159'),
                        'arp_body_odd_row_hover_background_color' => array('#34c159'),
                        'arp_body_even_row_hover_background_color' => array('#34c159', "#34c159"),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    ),
                ),
                'black' => array(
                    'arp_header_background' => array('#2C2F42', '#2C2F42', '#2C2F42', '#2C2F42', '#2C2F42', '#2C2F42'),
                    'arp_column_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                    'arp_button_background' => array('#2C2F42', '#2C2F42', '#2C2F42', '#2C2F42', '#2C2F42', '#2C2F42'),
                    'arp_desc_background' => array('#2C2F42', '#2C2F42', '#2C2F42', '#2C2F42', '#2C2F42', '#2C2F42'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#272727'),
                    'arp_body_even_row_background_color' => array('#272727', "#272727"),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'header_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'column_bg_color' => array('#2C2F42', '#2C2F42', '#2C2F42', '#2C2F42', '#2C2F42', '#2C2F42'),
                        'arp_desc_hover_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#2c2f42'),
                        'arp_body_even_row_hover_background_color' => array('#2c2f42', "#2c2f42"),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    ),
                ),
                'turquoise' => array(
                    'arp_header_background' => array('#01DFF4', '#01DFF4', '#01DFF4', '#01DFF4', '#01DFF4', '#01DFF4'),
                    'arp_column_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                    'arp_button_background' => array('#01DFF4', '#01DFF4', '#01DFF4', '#01DFF4', '#01DFF4', '#01DFF4'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_background' => array('#01DFF4', '#01DFF4', '#01DFF4', '#01DFF4', '#01DFF4', '#01DFF4'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#272727'),
                    'arp_body_even_row_background_color' => array('#272727', "#272727"),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'header_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'column_bg_color' => array('#01DFF4', '#01DFF4', '#01DFF4', '#01DFF4', '#01DFF4', '#01DFF4'),
                        'arp_desc_hover_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#01dff4'),
                        'arp_body_even_row_hover_background_color' => array('#01dff4', "#01dff4"),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    ),
                ),
                'royalblue' => array(
                    'arp_header_background' => array('#5B58E3', '#5B58E3', '#5B58E3', '#5B58E3', '#5B58E3', '#5B58E3'),
                    'arp_column_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                    'arp_button_background' => array('#5B58E3', '#5B58E3', '#5B58E3', '#5B58E3', '#5B58E3', '#5B58E3'),
                    'arp_desc_background' => array('#5B58E3', '#5B58E3', '#5B58E3', '#5B58E3', '#5B58E3', '#5B58E3'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#272727'),
                    'arp_body_even_row_background_color' => array('#272727', "#272727"),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'header_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'column_bg_color' => array('#5B58E3', '#5B58E3', '#5B58E3', '#5B58E3', '#5B58E3', '#5B58E3'),
                        'arp_body_odd_row_hover_background_color' => array('#5b58e3'),
                        'arp_body_even_row_hover_background_color' => array('#5b58e3', "#5b58e3"),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    ),
                ),
                'violet' => array(
                    'arp_header_background' => array('#824BFF', '#824BFF', '#824BFF', '#824BFF', '#824BFF', '#824BFF'),
                    'arp_column_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                    'arp_button_background' => array('#824BFF', '#824BFF', '#824BFF', '#824BFF', '#824BFF', '#824BFF'),
                    'arp_desc_background' => array('#824BFF', '#824BFF', '#824BFF', '#824BFF', '#824BFF', '#824BFF'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#272727'),
                    'arp_body_even_row_background_color' => array('#272727', "#272727"),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'header_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'column_bg_color' => array('#824BFF', '#824BFF', '#824BFF'),
                        'arp_body_odd_row_hover_background_color' => array('#824bff'),
                        'arp_body_even_row_hover_background_color' => array('#824bff', "#824bff"),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    ),
                ),
                'yellow' => array(
                    'arp_header_background' => array('#EACD03', '#EACD03', '#EACD03', '#EACD03', '#EACD03', '#EACD03'),
                    'arp_column_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                    'arp_button_background' => array('#EACD03', '#EACD03', '#EACD03', '#EACD03', '#EACD03', '#EACD03'),
                    'arp_desc_background' => array('#EACD03', '#EACD03', '#EACD03', '#EACD03', '#EACD03', '#EACD03'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#272727'),
                    'arp_body_even_row_background_color' => array('#272727', "#272727"),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'header_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'column_bg_color' => array('#EACD03', '#EACD03', '#EACD03', '#EACD03', '#EACD03', '#EACD03'),
                        'arp_desc_hover_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'arp_desc_hover_font_color' => array('', '#ffffff'),
                        'arp_body_odd_row_hover_background_color' => array('#eacd03'),
                        'arp_body_even_row_hover_background_color' => array('#eacd03', "#eacd03"),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    ),
                ),
                'dogerblue' => array(
                    'arp_header_background' => array('#4196FF', '#4196FF', '#4196FF', '#4196FF', '#4196FF', '#4196FF'),
                    'arp_column_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                    'arp_button_background' => array('#4196FF', '#4196FF', '#4196FF', '#4196FF', '#4196FF', '#4196FF'),
                    'arp_desc_background' => array('#4196FF', '#4196FF', '#4196FF', '#4196FF', '#4196FF', '#4196FF'),
                    'arp_desc_font_color' => array('', '#ffffff'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_desc_hover_background' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                    'arp_desc_hover_font_color' => array('', '#ffffff'),
                    'arp_body_odd_row_background_color' => array('#272727'),
                    'arp_body_even_row_background_color' => array('#272727', "#272727"),
                    'arp_body_font_color' => array('', '#ffffff'),
                    'arp_body_even_font_color' => array('', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_hover_color' => array(
                        'button_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'header_bg_color' => array('#272727', '#272727', '#272727', '#272727', '#272727', '#272727'),
                        'column_bg_color' => array('#4196FF', '#4196FF', '#4196FF', '#4196FF', '#4196FF', '#4196FF'),
                        'arp_body_odd_row_hover_background_color' => array('#4196ff'),
                        'arp_body_even_row_hover_background_color' => array('#4196ff', "#4196ff"),
                        'arp_body_font_hover_color' => array('', '#ffffff'),
                        'arp_body_even_font_hover_color' => array('', '#ffffff'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_header_background' => '',
                    'arp_column_background' => '',
                    'arp_button_background' => '',
                    'arp_header_font_color' => '',
                    'arp_desc_font_color' => '',
                    'arp_desc_background' => '',
                    'arp_button_font_color' => '',
                    'arp_hover_color' => array(
                        'button_bg_color' => '',
                        'header_bg_color' => '',
                        'arp_desc_hover_background' => '',
                        'column_bg_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                    ),
                )
            ),
            'arptemplate_26' => array(
                'blue' => array(
                    'arp_header_background' => array('#2fb8ff', '#2fb8ff', '#2fb8ff', '#2fb8ff', '#2fb8ff', '#2fb8ff'),
                    'arp_column_background' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                    'arp_button_background' => array('#2fb8ff', '#2fb8ff', '#2fb8ff', '#2fb8ff', '#2fb8ff'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_background' => array('#2fb8ff', '#2fb8ff', '#2fb8ff', '#2fb8ff', '#2fb8ff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'header_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'column_bg_color' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                        'button_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_font_hover_color' => array('#2fb8ff', '#2fb8ff', '#2fb8ff'),
                        'arp_body_even_font_hover_color' => array('#2fb8ff', '#2fb8ff', '#2fb8ff'),
                        'arp_shortcode_hover_background' => array('#2fb8ff', '#2fb8ff', '#2fb8ff', '#2fb8ff', '#2fb8ff'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'red' => array(
                    'arp_header_background' => array('#ff2d46', '#ff2d46', '#ff2d46', '#ff2d46', '#ff2d46'),
                    'arp_column_background' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                    'arp_button_background' => array('#ff2d46', '#ff2d46', '#ff2d46', '#ff2d46', '#ff2d46'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_background' => array('#ff2d46', '#ff2d46', '#ff2d46', '#ff2d46', '#ff2d46'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'header_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'column_bg_color' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                        'button_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_font_hover_color' => array('#ff2d46', '#ff2d46', '#ff2d46'),
                        'arp_body_even_font_hover_color' => array('#ff2d46', '#ff2d46', '#ff2d46'),
                        'arp_shortcode_hover_background' => array('#ff2d46', '#ff2d46', '#ff2d46', '#ff2d46', '#ff2d46'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'lightblue' => array(
                    'arp_header_background' => array('#4196ff', '#4196ff', '#4196ff', '#4196ff', '#4196ff'),
                    'arp_column_background' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                    'arp_button_background' => array('#4196ff', '#4196ff', '#4196ff', '#4196ff', '#4196ff'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_background' => array('#4196ff', '#4196ff', '#4196ff', '#4196ff', '#4196ff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'header_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'column_bg_color' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                        'button_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_font_hover_color' => array('#4196ff', '#4196ff', '#4196ff'),
                        'arp_body_even_font_hover_color' => array('#4196ff', '#4196ff', '#4196ff'),
                        'arp_shortcode_hover_background' => array('#4196ff', '#4196ff', '#4196ff', '#4196ff', '#4196ff'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'cyan' => array(
                    'arp_header_background' => array('#00d29d', '#00d29d', '#00d29d', '#00d29d', '#00d29d'),
                    'arp_column_background' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                    'arp_button_background' => array('#00d29d', '#00d29d', '#00d29d', '#00d29d', '#00d29d'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_background' => array('#00d29d', '#00d29d', '#00d29d', '#00d29d', '#00d29d', '#00d29d'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'header_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'column_bg_color' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                        'button_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_font_hover_color' => array('#00d29d', '#00d29d', '#00d29d'),
                        'arp_body_even_font_hover_color' => array('#00d29d', '#00d29d', '#00d29d'),
                        'arp_shortcode_hover_background' => array('#00d29d', '#00d29d', '#00d29d', '#00d29d', '#00d29d'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'yellow' => array(
                    'arp_header_background' => array('#f1bc16', '#f1bc16', '#f1bc16', '#f1bc16', '#f1bc16'),
                    'arp_column_background' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                    'arp_button_background' => array('#f1bc16', '#f1bc16', '#f1bc16', '#f1bc16', '#f1bc16'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_background' => array('#f1bc16', '#f1bc16', '#f1bc16', '#f1bc16', '#f1bc16'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'header_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'column_bg_color' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                        'button_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_font_hover_color' => array('#f1bc16', '#f1bc16', '#f1bc16'),
                        'arp_body_even_font_hover_color' => array('#f1bc16', '#f1bc16', '#f1bc16'),
                        'arp_shortcode_hover_background' => array('#f1bc16', '#f1bc16', '#f1bc16', '#f1bc16', '#f1bc16'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'pink' => array(
                    'arp_header_background' => array('#ff2476', '#ff2476', '#ff2476', '#ff2476', '#ff2476'),
                    'arp_column_background' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                    'arp_button_background' => array('#ff2476', '#ff2476', '#ff2476', '#ff2476', '#ff2476'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_background' => array('#ff2476', '#ff2476', '#ff2476', '#ff2476', '#ff2476'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'header_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'column_bg_color' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                        'button_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_font_hover_color' => array('#ff2476', '#ff2476', '#ff2476'),
                        'arp_body_even_font_hover_color' => array('#ff2476', '#ff2476', '#ff2476'),
                        'arp_shortcode_hover_background' => array('#ff2476', '#ff2476', '#ff2476', '#ff2476', '#ff2476'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'lightviolet' => array(
                    'arp_header_background' => array('#6b68ff', '#6b68ff', '#6b68ff', '#6b68ff', '#6b68ff'),
                    'arp_column_background' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                    'arp_button_background' => array('#6b68ff', '#6b68ff', '#6b68ff', '#6b68ff', '#6b68ff'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_background' => array('#6b68ff', '#6b68ff', '#6b68ff', '#6b68ff', '#6b68ff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'header_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'column_bg_color' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                        'button_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_font_hover_color' => array('#6b68ff', '#6b68ff', '#6b68ff'),
                        'arp_body_even_font_hover_color' => array('#6b68ff', '#6b68ff', '#6b68ff'),
                        'arp_shortcode_hover_background' => array('#6b68ff', '#6b68ff', '#6b68ff', '#6b68ff', '#6b68ff'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'gray' => array(
                    'arp_header_background' => array('#b7bdcb', '#b7bdcb', '#b7bdcb', '#b7bdcb', '#b7bdcb'),
                    'arp_column_background' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                    'arp_button_background' => array('#b7bdcb', '#b7bdcb', '#b7bdcb', '#b7bdcb', '#b7bdcb'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_background' => array('#b7bdcb', '#b7bdcb', '#b7bdcb', '#b7bdcb', '#b7bdcb'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'header_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'column_bg_color' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                        'button_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_font_hover_color' => array('#b7bdcb', '#b7bdcb', '#b7bdcb'),
                        'arp_body_even_font_hover_color' => array('#b7bdcb', '#b7bdcb', '#b7bdcb'),
                        'arp_shortcode_hover_background' => array('#b7bdcb', '#b7bdcb', '#b7bdcb', '#b7bdcb', '#b7bdcb'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'orange' => array(
                    'arp_header_background' => array('#fd9a25', '#fd9a25', '#fd9a25', '#fd9a25', '#fd9a25'),
                    'arp_column_background' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                    'arp_button_background' => array('#fd9a25', '#fd9a25', '#fd9a25', '#fd9a25', '#fd9a25'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_background' => array('#fd9a25', '#fd9a25', '#fd9a25', '#fd9a25', '#fd9a25'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'header_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'column_bg_color' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                        'button_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_font_hover_color' => array('#fd9a25', '#fd9a25', '#fd9a25'),
                        'arp_body_even_font_hover_color' => array('#fd9a25', '#fd9a25', '#fd9a25'),
                        'arp_shortcode_hover_background' => array('#fd9a25', '#fd9a25', '#fd9a25', '#fd9a25', '#fd9a25'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'darkblue' => array(
                    'arp_header_background' => array('#337cff', '#337cff', '#337cff', '#337cff', '#337cff'),
                    'arp_column_background' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                    'arp_button_background' => array('#337cff', '#337cff', '#337cff', '#337cff', '#337cff'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_background' => array('#337cff', '#337cff', '#337cff', '#337cff', '#337cff'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'header_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'column_bg_color' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                        'button_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_font_hover_color' => array('#337cff', '#337cff', '#337cff'),
                        'arp_body_even_font_hover_color' => array('#337cff', '#337cff', '#337cff'),
                        'arp_shortcode_hover_background' => array('#337cff', '#337cff', '#337cff', '#337cff', '#337cff'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'turquoise' => array(
                    'arp_header_background' => array('#00dbef', '#00dbef', '#00dbef', '#00dbef', '#00dbef'),
                    'arp_column_background' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                    'arp_button_background' => array('#00dbef', '#00dbef', '#00dbef', '#00dbef', '#00dbef'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_background' => array('#00dbef', '#00dbef', '#00dbef', '#00dbef', '#00dbef'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'header_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'column_bg_color' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                        'button_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_font_hover_color' => array('#00dbef', '#00dbef', '#00dbef'),
                        'arp_body_even_font_hover_color' => array('#00dbef', '#00dbef', '#00dbef'),
                        'arp_shortcode_hover_background' => array('#00dbef', '#00dbef', '#00dbef', '#00dbef', '#00dbef'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'grayishyellow' => array(
                    'arp_header_background' => array('#cfc5a1', '#cfc5a1', '#cfc5a1', '#cfc5a1', '#cfc5a1'),
                    'arp_column_background' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                    'arp_button_background' => array('#cfc5a1', '#cfc5a1', '#cfc5a1', '#cfc5a1', '#cfc5a1'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_background' => array('#cfc5a1', '#cfc5a1', '#cfc5a1', '#cfc5a1', '#cfc5a1'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'header_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'column_bg_color' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                        'button_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_font_hover_color' => array('#cfc5a1', '#cfc5a1', '#cfc5a1'),
                        'arp_body_even_font_hover_color' => array('#cfc5a1', '#cfc5a1', '#cfc5a1'),
                        'arp_shortcode_hover_background' => array('#cfc5a1', '#cfc5a1', '#cfc5a1', '#cfc5a1', '#cfc5a1'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'green' => array(
                    'arp_header_background' => array('#16d784', '#16d784', '#16d784', '#16d784', '#16d784'),
                    'arp_column_background' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                    'arp_button_background' => array('#16d784', '#16d784', '#16d784', '#16d784', '#16d784'),
                    'arp_header_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_button_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_body_even_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                    'arp_shortcode_background' => array('#16d784', '#16d784', '#16d784', '#16d784', '#16d784'),
                    'arp_shortcode_font_color' => array('', '#ffffff'),
                    'arp_hover_color' => array(
                        'header_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'column_bg_color' => array('#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37', '#2B2E37'),
                        'button_bg_color' => array('#08090B', '#08090B', '#08090B', '#08090B', '#08090B'),
                        'arp_button_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_header_hover_font_color' => array('#ffffff', '#ffffff', '#ffffff'),
                        'arp_body_font_hover_color' => array('#16d784', '#16d784', '#16d784'),
                        'arp_body_even_font_hover_color' => array('#16d784', '#16d784', '#16d784'),
                        'arp_shortcode_hover_background' => array('#16d784', '#16d784', '#16d784', '#16d784', '#16d784'),
                        'arp_shortcode_hover_font_color' => array('', '#ffffff'),
                    ),
                ),
                'custom_skin' => array(
                    'arp_header_background' => '',
                    'arp_column_background' => '',
                    'arp_button_background' => '',
                    'arp_header_font_color' => '',
                    'arp_button_font_color' => '',
                    'arp_body_font_color' => '',
                    'arp_shortcode_background' => '',
                    'arp_shortcode_font_color' => '',
                    'arp_body_even_font_color' => '',
                    'arp_hover_color' => array(
                        'header_bg_color' => '',
                        'column_bg_color' => '',
                        'button_bg_color' => '',
                        'arp_button_hover_font_color' => '',
                        'arp_header_hover_font_color' => '',
                        'arp_body_font_hover_color' => '',
                        'arp_body_even_font_hover_color' => '',
                        'arp_shortcode_hover_background' => '',
                        'arp_shortcode_hover_font_color' => '',
                    ),
                )
            )
        ));

        return $arp_col_sec_bg_color;
    }

    function arp_template_bg_section_classes() {

        $arp_template_bg_sec_classes = apply_filters('arp_tmp_bg_sec_classes', array(
            'arptemplate_1' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_2' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_section' => 'arp_column_content_wrapper',
                
                )
            ),
            'arptemplate_3' => array(
                'caption_column' => array(
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle,arpcolumnheader',
                    'desc_selection' => 'column_description',
                    
                    'pricing_section' => 'arppricetablecolumnprice',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row',
                        'parent_class' => 'arp_opt_options'
                    )
                )
            ),
            'arptemplate_4' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_section' => 'arpcolumnheader',
                    'desc_selection' => 'column_description',
                    
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_5' => array(
                'caption_column' => array(
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_section' => 'arpcolumnheader',
                    'pricing_section' => 'arppricetablecolumnprice',
                    
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_6' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row',
                        'parent_class' => 'arppricingtablebodycontent'
                    )
                )
            ),
            'arptemplate_7' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    /* 'button_section' => 'bestPlanButton', */
                    'desc_selection' => 'column_description,arppricetablecolumnprice',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_8' => array(
                'caption_column' => array(
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_section' => 'arpcolumnheader',
                    /* 'button_section' => 'bestPlanButton', */
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_9' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'column_section' => 'arp_column_content_wrapper',
                /* 'button_section' => 'bestPlanButton' */
                )
            ),
            'arptemplate_10' => array(
                'caption_column' => array(
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_section' => 'bestPlanTitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'desc_selection' => 'arpplan',
                    /* 'button_section' => 'bestPlanButton', */
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_11' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'desc_selection' => 'arppricetablecolumnprice',
                    /* 'button_section' => 'bestPlanButton', */
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
            ),
            'arptemplate_12' => array(
                'caption_columns' => array(
                    'header_section' => 'arpcaptiontitle',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    /* 'button_section' => 'bestPlanButton', */
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                ),
            ),
            'arptemplate_13' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'column_section' => 'arpplan',
                    'pricing_section' => 'arppricetablecolumnprice',
                /* 'button_section' => 'bestPlanButton', */
                )
            ),
            'arptemplate_14' => array(
                'caption_columns' => array(),
                'other_column' => array(
                /* 'button_section' => 'bestPlanButton' */
                )
            ),
            'arptemplate_15' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'pricing_section' => 'arppricetablecolumnprice',
                /* 'button_section' => 'bestPlanButton', */
                )
            ),
            'arptemplate_16' => array(
                'caption_columns' => array(),
                'other_column' => array(
                /* 'button_section' => 'bestPlanButton', */
                )
            ),
            'arptemplate_20' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'column_section' => 'arp_column_content_wrapper',
                /* 'button_section' => 'bestPlanButton', */
                )
            ),
            'arptemplate_21' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_section' => 'arppricetablecolumntitle,arppricetablecolumnprice,arppricingtablebodycontent',
                /* 'button_section' => 'bestPlanButton' */
                )
            ),
            'arptemplate_22' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_section' => 'arp_column_content_wrapper',
                    'pricing_section' => 'arppricetablecolumnprice',
                    /* 'button_section' => 'bestPlanButton', */
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_23' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_section' => 'arp_column_content_wrapper::after',
                    'pricing_section' => 'arp_price_wrapper',
                /* 'button_section' => 'bestPlanButton' */
                )
            ),
            'arptemplate_24' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_section' => 'arp_column_content_wrapper',
                /* 'button_section' => 'bestPlanButton', */
                )
            ),
            'arptemplate_25' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_section' => 'arp_column_content_wrapper',
//                    'desc_selection' => 'column_description',
                    'body_section' => array(
                        'odd_row' => 'arp_odd_row',
                        'even_row' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_26' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'column_section' => 'arp_column_content_wrapper',
                /* 'button_section' => 'bestPlanButton', */
                )
            ),
        ));
        return $arp_template_bg_sec_classes;
    }

    function arp_template_bg_section_inputs() {

        $arp_tmp_bg_sec_inputs = apply_filters('arp_tmp_bg_sec_inputs', array(
            'arptemplate_1' => array(
                'caption_column' => array(
                    'header_background_color' => 'arpcaptiontitle',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle',
                    'price_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_2' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_background_color' => 'arp_column_content_wrapper',
                    'button_background_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_3' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle,arpcolumnheader',
                    'column_desc_background_color' => 'column_description',
                    'button_background_color' => 'bestPlanButton',
                    'price_background_color' => 'arppricetablecolumnprice',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_4' => array(
                'caption_column' => array(
                    'header_background_color' => 'arpcaptiontitle',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_background_color' => 'arpcolumnheader',
                    'column_desc_background_color' => 'column_description',
                    'button_background_color' => 'bestPlanButton',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_5' => array(
                'caption_column' => array(
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_background_color' => 'arpcolumnheader',
                    'price_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_6' => array(
                'caption_column' => array(
                    'header_background_color' => 'arpcaptiontitle',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle',
                    'price_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_7' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle',
                    'button_background_color' => 'bestPlanButton',
                    'column_desc_background_color' => 'column_description,arppricetablecolumnprice',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_8' => array(
                'caption_column' => array(
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_background_color' => 'arpcolumnheader',
                    'button_background_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_9' => array(
                'caption_column' => array(
                    'header_background_color' => 'arpcaptiontitle',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'column_background_color' => 'arp_column_content_wrapper',
                    'button_background_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_10' => array(
                'caption_column' => array(
                    'footer_background_color' => 'arpcolumnfooter',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_background_color' => 'bestPlanTitle',
                    'price_background_color' => 'arp_price_wrapper',
                    'column_desc_background_color' => 'arpplan',
                    'button_background_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_11' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle',
                    'column_desc_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
            ),
            'arptemplate_12' => array(
                'caption_columns' => array(
                    'header_background_color' => 'arpcaptiontitle',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle',
                    'price_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                ),
            ),
            'arptemplate_13' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'column_background_color' => 'arpplan',
                    'price_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                )
            ),
            'arptemplate_14' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'button_background_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_15' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'price_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                )
            ),
            'arptemplate_16' => array(
                'caption_columns' => array(),
                'other_column' => array(
                    'button_background_color' => 'bestPlanButton',
                )
            ),
            'arptemplate_20' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle',
                    'column_background_color' => 'arp_column_content_wrapper',
                    'button_background_color' => 'bestPlanButton',
                )
            ),
            'arptemplate_21' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_background_color' => 'arppricetablecolumntitle,arppricetablecolumnprice,arppricingtablebodycontent',
                    'button_background_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_22' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_background_color' => 'arp_column_content_wrapper',
                    'price_background_color' => 'arppricetablecolumnprice',
                    'button_background_color' => 'bestPlanButton',
                    'body_section' => array(
                        'content_odd_color' => 'arp_odd_row',
                        'content_even_color' => 'arp_even_row'
                    )
                )
            ),
            'arptemplate_23' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_background_color' => 'arp_column_content_wrapper::after',
                    'price_background_color' => 'arp_price_wrapper',
                    'button_background_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_24' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'column_background_color' => 'arp_column_content_wrapper',
                    'button_background_color' => 'bestPlanButton'
                )
            ),
            'arptemplate_25' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle,arpcolumnheader',
                    /* 'column_desc_background_color' => 'column_description', */
                    'column_background_color' => 'arppricingtablebodycontent',
                    'column_desc_background_color' => 'column_description',
//                    'button_background_color' => 'bestPlanButton',
                /* 'body_section' => array(
                  'content_odd_color' => 'arp_odd_row',
                  'content_even_color' => 'arp_even_row'
                  ) */
                )
            ),
            'arptemplate_26' => array(
                'caption_column' => array(),
                'other_column' => array(
                    'header_background_color' => 'arppricetablecolumntitle',
                    'column_background_color' => 'arp_column_content_wrapper',
                    'button_background_color' => 'bestPlanButton',
                )
            )
        ));
        return $arp_tmp_bg_sec_inputs;
    }

    function arp_template_sections_array() {

        $arptemplatesectionsarray = apply_filters('arptemplate_available_sections_array', array(
            'arptemplate_1' => array(
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_footer_background_color_div' => array('arpcolumnfooter'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_footer_hover_background_color' => array('footer_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
            ),
            'arptemplate_2' => array(
                'arp_footer_background_color_div' => array('arpcolumnfooter'),
                'arp_footer_hover_background_color' => array('footer_hover_color'),
                'arp_column_background_color_data_div' => array('arp_column_content_wrapper'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_shortcode_hover_bg_color' => array('arp_shortcode_hover_background_color'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_shortcode_background_color_div' => array('arp_shortcode_background_color_div'),
                'arp_shortcode_background_color' => array('.rounded_corder'),
                'arp_shortcode_font_color' => array('.rounded_corder i'),
//                'arp_shortcode_font_color_div_id' => array(),
            ),
            'arptemplate_3' => array(
                'arp_footer_background_color_div' => array('arpcolumnfooter'),
                'arp_footer_hover_background_color' => array('footer_hover_color'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_column_desc_background_color_data_div' => array('column_description'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_column_desc_hover_background_color_data' => array('desc_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
            ),
            'arptemplate_4' => array(
                'arp_header_background_color_div' => array('.arpcolumnheader'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_footer_background_color_div' => array('arpcolumnfooter'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_footer_hover_background_color' => array('footer_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper,arp_price_wrapper i'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
            ),
            'arptemplate_5' => array(
                'arp_header_background_color_div' => array('.arpcolumnheader'),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
            ),
            'arptemplate_6' => array(
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_footer_background_color_div' => array('arpcolumnfooter'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_footer_hover_background_color' => array('footer_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
            ),
            'arptemplate_7' => array(
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_column_desc_background_color_data_div' => array('column_description,.arppricetablecolumnprice'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_column_desc_hover_background_color_data' => array('desc_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
            ),
            'arptemplate_8' => array(
                'arp_header_background_color_div' => array('.arpcolumnheader'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_shortcode_background_color_div' => array('arp_shortcode_background_color_div'),
                'arp_shortcode_background_color' => array('.rounded_corder'),
                'arp_shortcode_font_color' => array('.rounded_corder i'),
//                'arp_shortcode_font_color_div_id' => array(),
                'arp_shortcode_hover_bg_color' => array('arp_shortcode_hover_background_color'),
            ),
            'arptemplate_9' => array(
                'arp_column_background_color_data_div' => array('arp_column_content_wrapper'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_footer_background_color_div' => array('arp_footer_background_color_div'),
                'arp_footer_hover_background_color' => array('arp_footer_hover_background_color'),
            ),
            'arptemplate_10' => array(
                'arp_header_background_color_div' => array('.bestPlanTitle'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_column_desc_background_color_data_div' => array('arpplan'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_column_desc_hover_background_color_data' => array('desc_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_body_label_font_color' => array('caption_li'),
                'arp_body_label_hover_font_color' => array('arpbodyoptionrow'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
            ),
            'arptemplate_11' => array(
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_column_desc_background_color_data_div' => array('arppricetablecolumnprice'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_column_desc_hover_background_color_data' => array('desc_hover_color'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
            ),
            'arptemplate_12' => array(
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_button_background_color' => array('bestPlanButton'),
            ),
            'arptemplate_13' => array(
                'arp_column_background_color_data_div' => array('arpplan'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_column_desc_background_color_data_div' => array('arp_column_desc_background_color_data_div'),
                'arp_column_desc_hover_background_color_data' => array('arp_column_desc_hover_background_color_data'),
            ),
            'arptemplate_14' => array(
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
            ),
            'arptemplate_15' => array(
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
            ),
            'arptemplate_16' => array(
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
            ),
            'arptemplate_20' => array(
                'arp_column_background_color_data_div' => array('arp_column_content_wrapper'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_price_duration_font_color' => array('arp_price_duration'),
                'arp_price_duration_hover_font_color' => array('arp_price_duration'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
            ),
            'arptemplate_21' => array(
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_column_background_color_data_div' => array('arppricetablecolumntitle, .arppricetablecolumnprice, .arppricingtablebodycontent'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_pricing_background_color_div' => array('arp_pricing_background_color_div'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
            ),
            'arptemplate_22' => array(
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_column_background_color_data_div' => array('arp_column_content_wrapper'),
                'arp_pricing_background_color_div' => array('arppricetablecolumnprice'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_body_hover_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_footer_background_color_div' => array('arp_footer_background_color_div'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_footer_hover_background_color' => array('arp_footer_hover_background_color')
            ),
            'arptemplate_23' => array(
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_column_background_color_data_div' => array('arp_column_content_wrapper::after'),
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_price_hover_color' => array('arp_price_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
                'arp_column_desc_background_color_data_div' => array('arp_column_desc_background_color_data_div'),
                'arp_column_desc_hover_background_color_data' => array('arp_column_desc_hover_background_color_data'),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
            ),
            'arptemplate_24' => array(
                'arp_pricing_background_color_div' => array('arp_price_wrapper'),
                'arp_footer_background_color_div' => array('arp_footer_background_color_div'),
                'arp_footer_hover_background_color' => array('arp_footer_hover_background_color'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_pricing_background_hover_color_div' => array('arp_pricing_background_hover_color_div'),
                'arp_column_background_color_data_div' => array('arp_column_content_wrapper'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_price_font_color' => array('arp_price_wrapper'),
                'arp_price_hover_font_color' => array('arppricetablecolumnprice'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
            ),
            'arptemplate_25' => array(
                'arp_column_background_color_data_div' => array('arppricingtablebodycontent'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
//                'arp_button_background_color_div' => array('bestPlanButton'),
//                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_hover_bg_color' => array('.arppricetablecolumntitle'),
//                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
//                'arp_button_font_color' => array('bestPlanButton'),
//                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_column_desc_background_color_data_div' => array('column_description'),
                'arp_column_desc_hover_background_color_data' => array('column_description'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_desc_font_color' => array('column_description'),
                'arp_desc_hover_font_color' => array('column_description'),
            ),
            'arptemplate_26' => array(
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_column_background_color_data_div' => array('arp_column_content_wrapper'),
                'arp_button_background_color_div' => array('bestPlanButton'),
                'arp_column_hover_color_div' => array('arp_column_hover_color'),
                'arp_btn_hover_color_div' => array('arp_btn_hover_color'),
                'arp_header_font_color' => array('bestPlanTitle'),
                'arp_header_hover_font_color' => array('bestPlanTitle'),
                'arp_body_hover_font_color' => array('arpbodyoptionrow'),
                'arp_footer_font_color' => array('arp_footer_content'),
                'arp_footer_hover_font_color' => array('arp_footer_content'),
                'arp_button_font_color' => array('bestPlanButton'),
                'arp_button_hover_font_color' => array('bestPlanButton'),
                'arp_header_background_color_div' => array('.arppricetablecolumntitle'),
                'arp_header_hover_bg_color' => array('arp_header_hover_background_color'),
                'arp_body_hover_background_color' => array('arp_body_hover_background_color'),
                'arp_body_background_color' => array(
                    'odd_row' => 'arp_odd_row',
                    'even_row' => 'arp_even_row'
                ),
                'arp_body_font_color' => array('arp_odd_row'),
                'arp_body_even_font_color' => array('arp_even_row'),
                'arp_shortcode_background_color_div' => array('arp_shortcode_background_color_div'),
                'arp_shortcode_background_color' => array('.rounded_corder'),
                'arp_shortcode_font_color' => array('.rounded_corder i'),
//                'arp_shortcode_font_color_div_id' => array(),
                'arp_shortcode_hover_bg_color' => array('arp_shortcode_hover_background_color'),
            )
        ));

        return $arptemplatesectionsarray;
    }

    function arp_custom_css_inner_sections() {
        $arp_custom_css_inner_sections = apply_filters('arp_custom_css_inner_sections', array(
            'arptemplate_1' => array(),
            'arptemplate_2' => array(
                'header_background' => false,
                'pricing_background' => false,
                'body_background' => false,
                'footer_background' => false,
            ),
            'arptemplate_3' => array(
                'footer_background' => false,
            ),
            'arptemplate_4' => array(),
            'arptemplate_5' => array(),
            'arptemplate_6' => array(),
            'arptemplate_7' => array(
                'pricing_background' => false,
            ),
            'arptemplate_8' => array(
                'pricing_background' => false,
            ),
            'arptemplate_9' => array(
                'pricing_background' => false,
                'footer_background' => false,
                'body_background' => false,
                'header_background' => false,
            ),
            'arptemplate_10' => array(),
            'arptemplate_11' => array(
                'pricing_background' => false,
            ),
            'arptemplate_12' => array(),
            'arptemplate_13' => array(
                'header_background' => false,
                'body_background' => false,
                'column_desc_background_color' => false
            ),
            'arptemplate_14' => array(
                'header_background' => false,
                'body_background' => false,
                'pricing_background' => false,
            ),
            'arptemplate_15' => array(
                'header_background' => false,
                'body_background' => false,
            ),
            'arptemplate_16' => array(
                'header_background' => false,
                'body_background' => false,
                'pricing_background' => false,
            ),
            'arptemplate_20' => array(
                'pricing_background' => false,
                'body_background' => false,
                'footer_background' => false,
                'footer_font_color' => false
            ),
            'arptemplate_21' => array(
                'header_background' => false,
                'pricing_background' => false,
                'body_background' => false,
                'footer_background' => false,
                'footer_font_color' => false
            ),
            'arptemplate_22' => array(
                'header_background' => false,
//                'body_background' => false,
                'footer_background' => false,
                'column_desc_background_color' => false
            ),
            'arptemplate_23' => array(
                'header_background' => false,
                'body_background' => false,
                'footer_background' => false,
                'footer_font_color' => false,
                'column_desc_background_color' => false
            ),
            'arptemplate_24' => array(
                'header_background' => false,
                'pricing_background' => false,
                'body_background' => false,
                'footer_background' => false,
                'column_desc_background_color' => false
            ),
            'arptemplate_25' => array(
                'pricing_background' => false,
                'body_background' => false,
            ),
            'arptemplate_26' => array(
                'body_background' => false,
            ),
        ));
        return $arp_custom_css_inner_sections;
    }

    function arp_template_custom_skin_array() {
        $arp_template_custom_skin_array = apply_filters('arp_template_custom_skin_array', array(
            'arptemplate_1' => array(
                'header_font_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'color' => '{arp_color}'
                        ),
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_background_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'background' => '{arp_color}'
                        ),
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}',
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'footer_background_color' => array(
                    'css' => array(
                        '.arpcolumnfooter_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_2' => array(
                'column_background_color' => array(
                    'css' => array(
                        '.arp_column_content_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'shortcode_background_color' => array(
                    'css' => array(
                        '.rounded_corder_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'shortcode_font_color' => array(
                    'css' => array(
                        '.rounded_corder i_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_3' => array(
                'header_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_desc_background_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_background_color' => array(
                    'css' => array(
                        '.arpcolumnfooter_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_4' => array(
                'header_font_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'color' => '{arp_color}'
                        ),
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_background_color' => array(
                    'css' => array(
                        '.arpcaptiontitle_^_1' => array(
                            'background' => '{arp_color}'
                        ),
                        '.arpcolumnheader_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        ),
                        '.arp_price_wrapper[ARP_SPACE]i_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'footer_background_color' => array(
                    'css' => array(
                        '.arpcolumnfooter_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'shortcode_font_color' => array(
                    'css' => array(
                        '.rounded_corder i_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.rounded_corder_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_5' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_background_color' => array(
                    'css' => array(
                        '.arpcolumnheader_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_6' => array(
                'header_font_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'color' => '{arp_color}'
                        ),
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_background_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_background_color' => array(
                    'css' => array(
                        '.arpcolumnfooter_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_7' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_rgb_color___0.7}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_desc_background_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'background' => '{arp_color}'
                        ),
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_8' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_background_color' => array(
                    'css' => array(
                        '.arpcolumnheader_^_1' => array(
                            'background-color' => '{arp_color}'
                        )
                    )
                ),
//                'price_background_color' => array(
//                    'css' => array(
//                        '.arppricetablecolumnprice_^_1' => array(
//                            'background' => '{arp_color}'
//                        )
//                    )
//                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_label_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li[ARP_SPACE]span.caption_li_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'shortcode_background_color' => array(
                    'css' => array(
                        '.rounded_corder_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'shortcode_font_color' => array(
                    'css' => array(
                        '.rounded_corder i_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_9' => array(
                'header_background_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'color' => '{arp_color}'
                        ),
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_background_color' => array(
                    'css' => array(
                        '.arp_column_content_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_10' => array(
                'header_background_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_desc_background_color' => array(
                    'css' => array(
                        '.arpplan_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row[ARP_SPACE]span_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row[ARP_SPACE]span_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_label_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li[ARP_SPACE]span.caption_li_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_11' => array(
                'header_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_desc_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_12' => array(
                'header_font_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'color' => '{arp_color}'
                        ),
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_background_color' => array(
                    'css' => array(
                        '#column_header_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_background_color' => array(
                    'css' => array(
                        '.arpcolumnfooter_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_13' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_background_color' => array(
                    'css' => array(
                        '.arpplan_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_14' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_15' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_16' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_20' => array(
                'header_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_color}'
                        ),
                        'ul.arp_opt_options[ARP_SPACE]li[ARP_SPACE]i_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_text_font_color' => array(
                    'css' => array(
                        '.arp_price_duration_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_background_color' => array(
                    'css' => array(
                        '.arp_column_content_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_21' => array(
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_color}'
                        ),
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        ),
                        '.arppricingtablebodycontent_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            ),
            'arptemplate_22' => array(
                'column_background_color' => array(
                    'css' => array(
                        '.arp_column_content_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumnprice_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_odd_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:even_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'content_even_color' => array(
                    'css' => array(
                        'ul.arppricingtablebodyoptions[ARP_SPACE]li:odd_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_23' => array(
                'column_background_color' => array(
                    'css' => array(
                        '.arp_column_content_wrapper::after_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_background_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_24' => array(
                'column_background_color' => array(
                    'css' => array(
                        '.arp_column_content_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'price_font_color' => array(
                    'css' => array(
                        '.arp_price_wrapper_^_1' => array(
                            'color' => '{arp_color}'
                        ),
                        '.arp_price_wrapper_span_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'footer_level_options_font_color' => array(
                    'css' => array(
                        '.arp_footer_content_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                )
            ),
            'arptemplate_25' => array(
                'header_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'column_desc_background_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'column_background_color' => array(
                    'css' => array(
                        '.arppricingtablebodycontent_^_1' => array(
                            'background' => '{arp_rgb_color___0.8}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'column_description_font_color' => array(
                    'css' => array(
                        '.column_description_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            
            ),
            'arptemplate_26' => array(
                'header_background_color' => array(
                    'css' => array(
                        '.arppricetablecolumntitle_^_1' => array(
                            'background' => '{arp_color}'
                        ),
                    
                    )
                ),
                'column_background_color' => array(
                    'css' => array(
                        '.arp_column_content_wrapper_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'header_font_color' => array(
                    'css' => array(
                        '.bestPlanTitle_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'content_even_font_color' => array(
                    'css' => array(
                        'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_font_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
                'button_background_color' => array(
                    'css' => array(
                        '.bestPlanButton_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'shortcode_background_color' => array(
                    'css' => array(
                        '.rounded_corder_^_1' => array(
                            'background' => '{arp_color}'
                        )
                    )
                ),
                'shortcode_font_color' => array(
                    'css' => array(
                        '.rounded_corder i_^_1' => array(
                            'color' => '{arp_color}'
                        )
                    )
                ),
            )
        ));

        return $arp_template_custom_skin_array;
    }

    function arp_template_hover_class_array() {
        $arptemplatehoverclassarray = apply_filters('arptemplatehoverclassarray', array(
            'arptemplate_1' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}',
                    ),
                    '.arpcolumnfooter_^_1' => array(
                        'background' => '{arp_footer_bg_custom_hover_color}',
                    ),
                    '.arpcolumnfooter[ARP_SPACE].arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}',
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}',
                    )
                )
            ),
            'arptemplate_2' => array(
                'arp_common_hover_css' => array(
                    '.bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}'
                    ),
                    '.rounded_corder_^_1' => array(
                        'background' => '{arp_shortcode_background_color}',
                        'border-color' => '{arp_shortcode_border_color}'
                    ),
                    '.rounded_corder i_^_1' => array(
                        'color' => '{arp_shortcode_font_color}'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}',
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
//                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.arp_footer_content_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                    '.arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                    '.arp_column_content_wrapper_^_1' => array(
                        'background' => '{arp_column_hover_background_color}',
                        'box-shadow' => '0[ARP_SPACE]0[ARP_SPACE]0[ARP_SPACE]2px[ARP_SPACE]{arp_column_background_color}'
                    ),
                ),
            ),
            'arptemplate_3' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}',
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.column_description_^_1' => array(
                        'background' => '{arp_desc_hover_background_color}',
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_4' => array(
                'arp_common_hover_css' => array(
                    '.arpcolumnheader_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.arp_price_wrapper[ARP_SPACE]i_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.arpcolumnfooter_^_1' => array(
                        'background' => '{arp_footer_bg_custom_hover_color}'
                    ),
                    '.arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.rounded_corder_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                        'border-color' => '{arp_border_hover_color}'
                    ),
                ),
            ),
            'arptemplate_5' => array(
                'arp_common_hover_css' => array(
                    '.arpcolumnheader_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_6' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.column_description_^_1' => array(
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                        'color' => '#ffffff'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.arpcolumnfooter_^_1' => array(
                        'background' => '{arp_footer_bg_custom_hover_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                ),
            ),
            'arptemplate_7' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle_^_1' => array(
//                        'background' => '{arp_header_bg_custom_hover_color}',
                        'background' => '{arp_header_background_custom_hover_input_rgba^_^(0.7)}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.column_description_^_1' => array(
                        'background' => '{arp_desc_hover_background_color}',
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_desc_hover_background_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background-color' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background-color' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                )
            ),
            'arptemplate_8' => array(
                'arp_common_hover_css' => array(
                    '.arpcolumnheader_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
//                    '.arppricetablecolumnprice_^_1' => array(
//                        'background' => '{arp_price_hover_background_color}',
//                        'background' => '{arp_desc_hover_background_color}',
//                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.rounded_corder_^_1' => array(
                        'background' => '{arp_shortcode_background_color}',
                        'border-color' => '{arp_shortcode_border_color}'
                    ),
                    '.rounded_corder i_^_1' => array(
                        'color' => '{arp_shortcode_font_color}'
                    ),
                ),
            ),
            'arptemplate_9' => array(
                'arp_common_hover_css' => array(
                    '.bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}'
                    ),
                    '.arp_column_content_wrapper_^_1' => array(
                        'background' => '#E9EAEE____{arp_column_hover_background_color}'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '#747577____{arp_button_background_color}',
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.arp_footer_content_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                    '.arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                )
            ),
            'arptemplate_10' => array(
                'arp_common_hover_css' => array(
                    '.bestPlanTitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}'
                    ),
                    '.arpplan_^_1' => array(
                        'background' => '{arp_desc_hover_background_color}',
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                )
            ),
            'arptemplate_11' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}'
                    ),
                    '.column_description_^_1' => array(
                        /* 'background' => '{arp_desc_hover_background_color}', */
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_desc_hover_background_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                )
            ),
            'arptemplate_13' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.arpplan_^_1' => array(
                        'background' => '{arp_column_hover_background_color}',
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.column_description_^_1' => array(
                        'color' => '{arp_description_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_14' => array(
                'arp_common_hover_css' => array(
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_15' => array(
                'arp_common_hover_css' => array(
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_16' => array(
                'arp_common_hover_css' => array(
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.column_description_^_1' => array(
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                ),
            ),
            'arptemplate_20' => array(
                'arp_common_hover_css' => array(
                    '.arp_column_content_wrapper_^_1' => array(
                        'background' => '{arp_column_hover_background_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li[ARP_SPACE]i_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.arppricetablecolumntitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                    ),
                    '.bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                        'color' => '{arp_column_hover_background_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'background' => '{arp_button_background_color}',
                        'color' => '{arp_button_hover_font_color}'
                    )
                )
            ),
            'arptemplate_21' => array(
                'arp_common_hover_css' => array(
                    '.bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                        'box-shadow' => '0px 1px 1px 0px rgba(0, 0, 0, 0.2)'
                    ),
                   
                    '.arp_price_wrapper::before_^_1' => array(
                        'background' => 'url(' . PRICINGTABLE_IMAGES_URL . '/ribbon_1_hover.png) no-repeat center;',
                        'margin-top' => '-51px'
                    ),
                    
                    '.arp_price_wrapper:after_^_1' => array(
                        'background' => 'url(' . PRICINGTABLE_IMAGES_URL . '/ribbon_1_hover.png) no-repeat center;',
                        'margin-top' => '-51px'
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'border-top' => '1px solid #d9d9d9',
                        'border-radius' => '10px',
                        'color' => '{arp_price_hover_font_color}',
                        'box-shadow' => '0px 1px 1px 0px rgba(0, 0, 0, 0.2)'
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background-color' => '{arp_column_hover_background_color}',
                        'border-left' => '1px solid #E5E5E5 !important;',
                        'border-right' => '1px solid #E5E5E5 !important;'
                    ),
                    '.arppricingtablebodycontent_^_1' => array(
                        'background' => '{arp_column_hover_background_color}',
                        'border-left' => '1px solid #E5E5E5 !important;',
                        'border-right' => '1px solid #E5E5E5 !important;'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li_^_1' => array(
                        'box-shadow' => '0px 1px 1px 0px rgba(0, 0, 0, 0.2)'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}',
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}',
                    ),
                    '.bestPlanButton_^_1' => array(
                        'color' => '{arp_button_hover_font_color}',
                        'background' => '{arp_button_background_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}',
                    )
                )
            ),
            'arptemplate_22' => array(
                'arp_common_hover_css' => array(
                    '.arp_column_content_wrapper_^_1' => array(
                        'background' => '{arp_column_hover_background_color}'
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                        'color' => '{arp_price_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_odd_row_^_1' => array(
                        'background' => '{arp_odd_row_hover_background_color}',
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options[ARP_SPACE]li.arp_even_row_^_1' => array(
                        'background' => '{arp_even_row_hover_background_color}',
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                ),
            ),
            'arptemplate_23' => array(
                'arp_common_hover_css' => array(
                    '.arp_column_content_wrapper::after_^_1' => array(
                        'background' => '{arp_column_hover_background_color}'
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumnprice_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                        'color' => '{arp_price_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'background' => '{arp_price_hover_background_color}',
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'color' => '{arp_column_hover_background_color}',
                        'background' => '{arp_button_background_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_column_hover_background_color}',
                    ),
                    '.column_description_^_1' => array(
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_24' => array(
                'arp_common_hover_css' => array(
                    '.arp_column_content_wrapper_^_1' => array(
                        'background' => '{arp_column_hover_background_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}'
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arp_price_wrapper_^_1' => array(
                        'color' => '{arp_price_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.arp_footer_content_text_^_1' => array(
                        'color' => '{arp_footer_font_hover_color}'
                    ),
                ),
            ),
            'arptemplate_25' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricingtablebodycontent_^_1' => array(
                        'background' => '{arp_column_hover_background_color_rgba^_^(0.8)}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
//                    '.bestPlanButton_^_1' => array(
//                        'background' => '{arp_button_background_color}',
//                    ),
//                    '.bestPlanButton_text_^_1' => array(
//                        'color' => '{arp_button_hover_font_color}'
//                    ),
                    '.column_description_^_1' => array(
                        'background' => '{arp_desc_hover_background_color}',
                        'color' => '{arp_description_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                ),
            ),
            'arptemplate_26' => array(
                'arp_common_hover_css' => array(
                    '.arppricetablecolumntitle_^_1' => array(
                        'background' => '{arp_header_bg_custom_hover_color}',
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.arppricetablecolumntitle[ARP_SPACE].bestPlanTitle_^_1' => array(
                        'color' => '{arp_header_hover_font_color}',
                    ),
                    '.rounded_corder_^_1' => array(
                        'background' => '{arp_shortcode_background_color}',
                        'border-color' => '{arp_shortcode_border_color}'
                    ),
                    '.rounded_corder i_^_1' => array(
                        'color' => '{arp_shortcode_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_odd_row_^_1' => array(
                        'color' => '{arp_content_hover_font_color}'
                    ),
                    'ul.arp_opt_options li.arp_even_row_^_1' => array(
                        'color' => '{arp_content_even_hover_font_color}'
                    ),
                    '.bestPlanButton_^_1' => array(
                        'background' => '{arp_button_background_color}',
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.bestPlanButton_text_^_1' => array(
                        'color' => '{arp_button_hover_font_color}'
                    ),
                    '.arp_column_content_wrapper_^_1' => array(
                        'background' => '{arp_column_hover_background_color}',
                    ),
                
                ),
            )
        ));

        return $arptemplatehoverclassarray;
    }

    function arp_default_gradient_templates() {
        $arp_default_gradient_templates = apply_filters('arp_default_gradient_templates', array(
            'default_only' => array('arptemplate_9'),
            'all_skins' => array('arptemplate_10')
        ));
        return $arp_default_gradient_templates;
    }

    function arp_default_gradient_templates_colors() {
        $arp_default_gradient_template_colors = apply_filters('arp_default_gradient_colors', array(
            'arptemplate_9' => array(
                'arp_color_skin' => array(
                    'arp_css' => array(
                        'column_level_gradient' => array(
                            '.arp_column_content_wrapper' => array(
                                'darkyellow' => array('', '#adbb5a___#f95d5e___1', '#adbb5a___#f95d5e___1', '#adbb5a___#f95d5e___1', '#adbb5a___#f95d5e___1', '#adbb5a___#f95d5e___1'),
                                'limegreen' => array('', '#00c03f___#00a3a2___1', '#00c03f___#00a3a2___1', '#00c03f___#00a3a2___1', '#00c03f___#00a3a2___1', '#00c03f___#00a3a2___1'),
                                'darkviolet' => array('', '#7200ad___#2672ea___1', '#7200ad___#2672ea___1', '#7200ad___#2672ea___1', '#7200ad___#2672ea___1', '#7200ad___#2672ea___1'),
                                'darkred' => array('', '#af1d04___#f1ae05___1', '#af1d04___#f1ae05___1', '#af1d04___#f1ae05___1', '#af1d04___#f1ae05___1', '#af1d04___#f1ae05___1'),
                                'lightorange' => array('', '#f2b10f___#a1b400___1', '#f2b10f___#a1b400___1', '#f2b10f___#a1b400___1', '#f2b10f___#a1b400___1', '#f2b10f___#a1b400___1'),
                                'orange' => array('', '#fd7c21___#b21e00___1', '#fd7c21___#b21e00___1', '#fd7c21___#b21e00___1', '#fd7c21___#b21e00___1', '#fd7c21___#b21e00___1'),
                                'cyan' => array('', '#03b88b___#a5650e___1', '#03b88b___#a5650e___1', '#03b88b___#a5650e___1', '#03b88b___#a5650e___1', '#03b88b___#a5650e___1'),
                                'magenta' => array('', '#b037c2___#da7a47___1', '#b037c2___#da7a47___1', '#b037c2___#da7a47___1', '#b037c2___#da7a47___1', '#b037c2___#da7a47___1'),
                                'yellow' => array('', '#ceba63___#37b0c5___1', '#ceba63___#37b0c5___1', '#ceba63___#37b0c5___1', '#ceba63___#37b0c5___1', '#ceba63___#37b0c5___1'),
                                'red' => array('', '#ac113d___#4d0062___1', '#ac113d___#4d0062___1', '#ac113d___#4d0062___1', '#ac113d___#4d0062___1', '#ac113d___#4d0062___1'),
                                'multicolor' => array('', '#7101ad___#2670e9___1', '#cbba62___#37b0c5___1', '#ad103d___#4d0064___1', '#fd7c21___#af1e00___1', '#00c140___#00a3a2___1'),
                                'custom_skin' => array('', '{arp_column_background_color}___0___1', '{arp_column_background_color}___0___1', '{arp_column_background_color}___0___1', '{arp_column_background_color}___0___1', '{arp_column_background_color}___0___1')
                            )
                        )
                    )
                )
            ),
            'arptemplate_10' => array(
                'arp_color_skin' => array(
                    'arp_css' => array(
                        'pricing_level_gradient' => array(
                            '.arp_price_wrapper' => array(
                                'red' => array('#c41e1e___#b91617___1', '#c41e1e___#b91617___1', '#c41e1e___#b91617___1', '#c41e1e___#b91617___1', '#c41e1e___#b91617___1', '#c41e1e___#b91617___1'),
                                'teal' => array('#007064___#005e50___1', '#007064___#005e50___1', '#007064___#005e50___1', '#007064___#005e50___1', '#007064___#005e50___1', '#007064___#005e50___1'),
                                'orange' => array('#cb8900___#be7600___1', '#cb8900___#be7600___1', '#cb8900___#be7600___1', '#cb8900___#be7600___1', '#cb8900___#be7600___1', '#cb8900___#be7600___1'),
                                'blue' => array('#3f91c3___#317eb6___1', '#3f91c3___#317eb6___1', '#3f91c3___#317eb6___1', '#3f91c3___#317eb6___1', '#3f91c3___#317eb6___1', '#3f91c3___#317eb6___1'),
                                'green' => array('#017840___#026431___1', '#017840___#026431___1', '#017840___#026431___1', '#017840___#026431___1', '#017840___#026431___1', '#017840___#026431___1'),
                                'lightteal' => array('#189ca0___#12898d___1', '#189ca0___#12898d___1', '#189ca0___#12898d___1', '#189ca0___#12898d___1', '#189ca0___#12898d___1', '#189ca0___#12898d___1'),
                                'pink' => array('#aa2554___#9a1c42___1', '#aa2554___#9a1c42___1', '#aa2554___#9a1c42___1', '#aa2554___#9a1c42___1', '#aa2554___#9a1c42___1', '#aa2554___#9a1c42___1'),
                                'lightgreen' => array('#498025___#3b6c1b___1', '#498025___#3b6c1b___1', '#498025___#3b6c1b___1', '#498025___#3b6c1b___1', '#498025___#3b6c1b___1', '#498025___#3b6c1b___1'),
                                'darkorange' => array('#bd471f___#af3715___1', '#bd471f___#af3715___1', '#bd471f___#af3715___1', '#bd471f___#af3715___1', '#bd471f___#af3715___1', '#bd471f___#af3715___1'),
                                'purple' => array('#593774___#462961___1', '#593774___#462961___1', '#593774___#462961___1', '#593774___#462961___1', '#593774___#462961___1', '#593774___#462961___1'),
                                'darkblue' => array('#2a2672___#1e1c5d___1', '#2a2672___#1e1c5d___1', '#2a2672___#1e1c5d___1', '#2a2672___#1e1c5d___1', '#2a2672___#1e1c5d___1', '#2a2672___#1e1c5d___1'),
                                'gray' => array('#5e5e60___#4c4c4e___1', '#5e5e60___#4c4c4e___1', '#5e5e60___#4c4c4e___1', '#5e5e60___#4c4c4e___1', '#5e5e60___#4c4c4e___1', '#5e5e60___#4c4c4e___1'),
                                'multicolor' => array('#007064___#005c51___1', '#3e90c2___#2e7db5___1', '#c41e20___#b81516___1', '#5f3a7d___#4c2d69___1', '#498025___#3b6c1b___1'),
                                'custom_skin' => array('{arp_pricing_background_color_input}___10___1', '{arp_pricing_background_color_input}___10___1', '{arp_pricing_background_color_input}___10___1', '{arp_pricing_background_color_input}___10___1', '{arp_pricing_background_color_input}___10___1', '{arp_pricing_background_color_input}___10___1')
                            )
                        )
                    ),
                    'arp_attr' => array(
                        'input#price_background_color' => array(
                            'value' => '{arp_pricing_background_color_input}'
                        ),
                        'div#price_background_color' => array(
                            'data-column_id' => '{arp_pricing_background_color_input}',
                            'data-color' => '{arp_pricing_background_color_input}'
                        )
                    )
                )
            ),
        ));
        return $arp_default_gradient_template_colors;
    }

    function arp_default_rgba_color_array() {
        $arp_rgba_color_codes = apply_filters('arp_default_rgba_colors', array(
            'arptemplate_7' => array(
                'header_background_color' => array(
                    '.arppricetablecolumntitle' => '{arp_header_background_color}___0.7'
                )
            ),
            'arptemplate_25' => array(
                
                'column_background_color' => array(
                    '.arppricingtablebodycontent' => '{arp_column_background_color}___0.8'
                )
            
            )
        ));
        return $arp_rgba_color_codes;
    }

    function arp_default_skin_luminosity() {
        $arp_default_skin_luminosity = apply_filters('arp_default_skin_luminosity', array(
            'arptemplate_1' => array(),
            'arptemplate_2' => array(),
            'arptemplate_3' => array(),
            'arptemplate_4' => array(),
            'arptemplate_5' => array(),
            'arptemplate_6' => array(),
            'arptemplate_7' => array(),
            'arptemplate_8' => array(),
            'arptemplate_9' => array('0'),
            'arptemplate_10' => array('10'),
            'arptemplate_11' => array(),
            'arptemplate_12' => array(),
            'arptemplate_13' => array(),
            'arptemplate_14' => array(),
            'arptemplate_15' => array(),
            'arptemplate_16' => array(),
            'arptemplate_20' => array(),
            'arptemplate_21' => array(),
            'arptemplate_22' => array(),
            'arptemplate_23' => array(),
            'arptemplate_24' => array(),
            'arptemplate_25' => array(),
            'arptemplate_26' => array(),
        ));

        return $arp_default_skin_luminosity;
    }

    function arp_depended_section_color_codes() {
        $arp_depended_section_color_code = apply_filters('arp_depended_section_color_code', array(
            'arptemplate_1' => array(),
            'arptemplate_2' => array(),
            'arptemplate_3' => array(),
            'arptemplate_4' => array(),
            'arptemplate_5' => array(),
            'arptemplate_6' => array(),
            'arptemplate_7' => array(),
            'arptemplate_8' => array(),
            'arptemplate_9' => array(),
            'arptemplate_10' => array(),
            'arptemplate_11' => array(),
            'arptemplate_12' => array(),
            'arptemplate_13' => array(),
            'arptemplate_14' => array(),
            'arptemplate_15' => array(),
            'arptemplate_16' => array(),
            'arptemplate_20' => array(
                'arp_header_background_color' => array(
                    'arp_price_wrapper~||~color~||~price_font_color|+|id',
                    'arppricingtablebodycontent[ARP_SPACE]i~||~color~||~'
                )
            ),
            'arptemplate_21' => array(),
            'arptemplate_22' => array(),
            'arptemplate_23' => array(),
            'arptemplate_24' => array(),
            'arptemplate_25' => array(),
            'arptemplate_26' => array(),
        ));
        return $arp_depended_section_color_code;
    }

    function arp_custom_skin_selection_section_color() {
        $arp_custom_skin_selection_color = apply_filters('arp_custom_skin_selection_color', array(
            'arptemplate_1' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_2' => array('arp_column_background_color_input', 'arp_column_background_color_data~|~arp_column_background_color_input'),
            'arptemplate_3' => array('arp_pricing_background_color_input', 'arp_pricing_background_color~|~arp_pricing_background_color_input'),
            'arptemplate_4' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_5' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_6' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_7' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_8' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_9' => array('arp_column_background_color_input', 'arp_column_background_color_data~|~arp_column_background_color_input'),
            'arptemplate_10' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_11' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_12' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_13' => array('arp_column_background_color_input', 'arp_column_background_color_data~|~arp_column_background_color_input'),
            'arptemplate_14' => array('arp_button_background_color_input', 'arp_button_background_color~|~arp_button_background_color_input'),
            'arptemplate_15' => array('arp_button_background_color_input', 'arp_button_background_color~|~arp_button_background_color_input'),
            'arptemplate_16' => array('arp_button_background_color_input', 'arp_button_background_color~|~arp_button_background_color_input'),
            'arptemplate_20' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_21' => array('arp_column_background_color_input', 'arp_column_background_color_data~|~arp_column_background_color_input'),
            'arptemplate_22' => array('arp_column_background_color_input', 'arp_column_background_color_data~|~arp_column_background_color_input'),
            'arptemplate_23' => array('arp_column_background_color_input', 'arp_column_background_color_data~|~arp_column_background_color_input'),
            'arptemplate_24' => array('arp_column_background_color_input', 'arp_column_background_color_data~|~arp_column_background_color_input'),
            'arptemplate_25' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
            'arptemplate_26' => array('arp_header_background_color_input', 'arp_header_background_color~|~arp_header_background_color_input'),
        ));

        return $arp_custom_skin_selection_color;
    }

    function arp_custom_css_selected_bg_color() {
        $arp_custom_css_selected_bg_color = apply_filters('arp_custom_css_selected_bg_color', array(
            'arptemplate_1' => 'arp_header_bg_custom_color',
            'arptemplate_2' => 'arp_column_bg_custom_color',
            'arptemplate_3' => 'arp_pricing_bg_custom_color',
            'arptemplate_4' => 'arp_header_bg_custom_color',
            'arptemplate_5' => 'arp_header_bg_custom_color',
            'arptemplate_6' => 'arp_header_bg_custom_color',
            'arptemplate_7' => 'arp_header_bg_custom_color',
            'arptemplate_8' => 'arp_header_bg_custom_color',
            'arptemplate_9' => 'arp_column_bg_custom_color',
            'arptemplate_10' => 'arp_header_bg_custom_color',
            'arptemplate_11' => 'arp_header_bg_custom_color',
            'arptemplate_12' => 'arp_header_bg_custom_color',
            'arptemplate_13' => 'arp_column_bg_custom_color',
            'arptemplate_14' => 'arp_button_bg_custom_color',
            'arptemplate_15' => 'arp_button_bg_custom_color',
            'arptemplate_16' => 'arp_button_bg_custom_color',
            'arptemplate_20' => 'arp_header_bg_custom_color',
            'arptemplate_21' => 'arp_column_bg_custom_color',
            'arptemplate_22' => 'arp_column_bg_custom_color',
            'arptemplate_23' => 'arp_column_bg_custom_color',
            'arptemplate_24' => 'arp_column_bg_custom_color',
            'arptemplate_25' => 'arp_column_bg_custom_color',
            'arptemplate_26' => 'arp_header_bg_custom_color',
        ));

        return $arp_custom_css_selected_bg_color;
    }

    function arp_background_image_section_array() {

        $arp_global_bg_image_section = apply_filters('arp_global_bg_image_section', array(
            'arptemplate_1' => array(),
            'arptemplate_2' => array(),
            'arptemplate_3' => array(),
            'arptemplate_4' => array(),
            'arptemplate_5' => array(),
            'arptemplate_6' => array(),
            'arptemplate_7' => array(),
            'arptemplate_8' => array('arpcolumnheader'),
            'arptemplate_9' => array(),
            'arptemplate_10' => array(),
            'arptemplate_11' => array(),
            'arptemplate_12' => array(),
            'arptemplate_13' => array(),
            'arptemplate_14' => array(),
            'arptemplate_15' => array(),
            'arptemplate_16' => array(),
            'arptemplate_20' => array(),
            'arptemplate_21' => array(),
            'arptemplate_22' => array(),
            'arptemplate_23' => array(),
            'arptemplate_24' => array(),
            'arptemplate_25' => array(),
            'arptemplate_26' => array(),
        ));

        return $arp_global_bg_image_section;
    }

    function arp_column_background_image_section_array() {

        $arp_global_column_bg_image_section = apply_filters('arp_global_column_bg_image_section', array(
            'arptemplate_1' => array('arp_column_content_wrapper'),
            'arptemplate_2' => array('arp_column_content_wrapper'),
            'arptemplate_3' => array('arp_column_content_wrapper'),
            'arptemplate_4' => array('arp_column_content_wrapper'),
            'arptemplate_5' => array('arp_column_content_wrapper'),
            'arptemplate_6' => array('arp_column_content_wrapper'),
            'arptemplate_7' => array('arp_column_content_wrapper'),
            'arptemplate_8' => array('arp_column_content_wrapper'),
            'arptemplate_9' => array('arp_column_content_wrapper'),
            'arptemplate_10' => array(''),
            'arptemplate_11' => array('arp_column_content_wrapper'),
            'arptemplate_12' => array('arp_column_content_wrapper'),
            'arptemplate_13' => array('arp_column_content_wrapper'),
            'arptemplate_14' => array('arp_column_content_wrapper'),
            'arptemplate_15' => array('arp_column_content_wrapper'),
            'arptemplate_16' => array('arp_column_content_wrapper'),
            'arptemplate_20' => array('arp_column_content_wrapper'),
            'arptemplate_21' => array('arp_column_content_wrapper'),
            'arptemplate_22' => array('arp_column_content_wrapper'),
            'arptemplate_23' => array(''),
            'arptemplate_24' => array('arp_column_content_wrapper'),
            'arptemplate_25' => array('arp_column_content_wrapper'),
            'arptemplate_26' => array('arp_column_content_wrapper'),
        ));

        return $arp_global_column_bg_image_section;
    }

    function arprice_default_template_skins($post = array()) {
        $arprice_default_template_skins = apply_filters('arprice_default_template_skins_filter', array(
            'arptemplate_1' => array(
                'skin' => array('green', 'yellow', 'darkorange', 'darkred', 'red', 'violet', 'pink', 'blue', 'darkblue', 'lightgreen', 'darkestblue', 'cyan', 'black', 'multicolor',),
                'color' => array('6dae2e', 'fbb400', 'e75c01', 'c32929', 'e52937', '713887', 'EB005C', '29A1D3', '2F3687', '1BA341', '2F4251', '009E7B', '5C5C5C', 'Multicolor')
            ),
            'arptemplate_2' => array(
                'skin' => array('blue', 'lightviolet', 'yellow', 'limegreen', 'orange', 'softblue', 'limecyan', 'brightred', 'red', 'pink', 'lightblue', 'darkpink', 'darkcyan'),
                'color' => array('02a3ff', '6c62d3', 'ffba00', '6ed563', 'ff9525', '4476d9', '37ba5a', 'f34044', 'de1a4c', 'de199a', '1a5fde', 'a51143', '11a599')
            ),
            'arptemplate_3' => array(
                'skin' => array('black', 'green', 'orange', 'red', 'teal', 'yellow', 'blue', 'darkgreen', 'maroon', 'purple'),
                'color' => array('39434D', '24B968', 'E87C3C', 'E84C3D', '6DBEBF', 'EBBF44', '316493', '7FB45C', '9A272A', '6F4786')
            ),
            'arptemplate_4' => array(
                'skin' => array('darkgreen', 'darkred', 'green', 'blue', 'pink', 'violet', 'orange', 'skyblue', 'lightblue', 'yellow', 'darkpink', 'darkblue', 'grayishblue'),
                'color' => array('28ae4d', 'ec4152', '2bc489', '0084ff', 'f50d7b', '4a148c', 'ff7510', '48c8f5', '626cef', 'ffcc00', 'ad1457', '112b50', '4a4957')
            ),
            'arptemplate_5' => array(
                'skin' => array('red', 'yellow', 'blue', 'green', 'violet', 'cyan', 'pink', 'limegreen', 'orange', 'darkblue', 'multicolor'),
                'color' => array('E52937', 'FBB400', '20AEFF', '199800', '734EAB', '00D8CD', 'FF1D77', '91D100', 'FE7D22', '2F3687', 'Multicolor')
            ),
            'arptemplate_6' => array(
                'skin' => array('green', 'blue', 'red', 'cyan', 'limegreen', 'darkblue', 'pink', 'darkcyan', 'violet', 'black'),
                'color' => array('87BD41', '29A1D3', 'E84C3D', '1FC4C8', '2ECB72', '5165A2', 'C31F5B', '009E7B', '703784', '6D7383')
            ),
            'arptemplate_7' => array(
                'skin' => array('blue', 'black', 'cyan', 'lightblue', 'red', 'yellow', 'olive', 'darkpurple', 'darkred', 'pink', 'brown'),
                'color' => array('3473DC', '3E3E3C', '1EAE8B', '1BACE1', 'F33C3E', 'FFA800', '8FB021', '5B48A2', '79302A', 'ED1374', 'B11D00')
            ),
            'arptemplate_8' => array(
                'skin' => array('purple', 'skyblue', 'red', 'green', 'blue', 'orange', 'darkcyan', 'yellow', 'pink', 'teal', 'multicolor'),
                'color' => array('AB6ED7', '44B7E4', 'F15859', '7FB948', '595EB7', 'FF6E3D', '54CAB0', 'FFC74B', 'EC3E9A', '25D0D7', 'Multicolor')
            ),
            'arptemplate_9' => array(
                'skin' => array('darkyellow', 'limegreen', 'darkviolet', 'darkred', 'lightorange', 'orange', 'cyan', 'magenta', 'yellow', 'red', 'multicolor'),
                'color' => array('AFBA5A', '00c140', '7003AE', 'AF1D04', 'F2B10F', 'FE7D22', '03B88B', 'B037C0', 'CBB963', 'AC113D', 'Multicolor')
            ),
            'arptemplate_10' => array(
                'skin' => array('red', 'teal', 'orange', 'blue', 'green', 'lightteal', 'pink', 'lightgreen', 'darkorange', 'purple', 'darkblue', 'gray', 'multicolor'),
                'color' => array('E92526', '00A392', 'FFAD00', '50B8F5', '01A358', '1FC4C8', 'E83473', '66AD33', 'FF622B', '8250A9', '3E38A4', '89888D', 'Multicolor')
            ),
            'arptemplate_11' => array(
                'skin' => array('yellow', 'limegreen', 'red', 'blue', 'pink', 'cyan', 'lightpink', 'violet', 'gray', 'green'),
                'color' => array('EFA738', '43B34D', 'FF3241', '09B1F8', 'E3328C', '11B0B6', 'F15F74', '8F4AFF', '949494', '78C335')
            ),
            'arptemplate_12' => array(
                'skin' => array('blue', 'cyan', 'orange', 'green', 'red', 'skyblue', 'maroon', 'purple', 'darkgrey', 'brightorange', 'multicolor'),
                'color' => array("143B86", "059B90", "E38B05", "23A359", "C10F0F", "2284C1", "8A0135", "7B1EC7", "474F62", "D03509", "Multicolor")
            ),
            'arptemplate_13' => array(
                'skin' => array('darkblue', 'cyan', 'green', 'red', 'blue', 'brown', 'darkcyan', 'darkmagenta'),
                'color' => array('01325b', '03735D', '168737', 'C61C1C', '00A0EA', '883D13', '005760', '602B63')
            ),
            'arptemplate_14' => array(
                'skin' => array('orange', 'limegreen', 'blue', 'violet', 'lightorange', 'cyan', 'red', 'yellow', 'gray', 'darkblue'),
                'color' => array('F15A23', '2DCC70', '3598DB', '9661D7', 'F49C14', '1BBC9B', 'E52937', '9CC31A', '757575', '384C81')
            ),
            'arptemplate_15' => array(
                'skin' => array('yellow', 'red', 'green', 'cyan', 'blue', 'pink', 'purple', 'orange', 'darkyellow', 'limegreen'),
                'color' => array('EAA700', 'EC155B', '18B949', '09D1B5', '10A4FA', 'EC3F8F', '755EC6', 'FA5655', 'BE8E44', '8CA91D')
            ),
            'arptemplate_16' => array(
                'skin' => array('orange', 'darkgreen', 'darkred', 'magenta', 'blue', 'darkblue', 'darkcyan', 'red', 'darklimegreen', 'gray'),
                'color' => array('FE7C22', '6DAE2E', 'B41E1F', 'A859B5', '29A1D3', '2F3687', '009E7B', 'E52937', '3D735B', '6D7C7F')
            ),
            'arptemplate_20' => array(
                'skin' => array('blue', 'pink', 'red', 'yellow', 'green', 'cyan', 'strongviolet', 'violet', 'lightviolet', 'darkyellow', 'grey', 'black'),
                'color' => array('00BAFF', 'D81A60', 'F73300', 'FFC22C', '8ACA01', '57CC7D', '4617B5', '6900B4', 'A23BCA', 'D8C022', '858585', '1D1D1D')
            ),
            'arptemplate_21' => array(
                'skin' => array('pink', 'red', 'yellow', 'green', 'darklimegreen', 'limecyan', 'cyan', 'lightblue', 'blue', 'strongviolet', 'purepink', 'darkred', 'gray',),
                'color' => array('D81A60', 'F73300', 'FFC22C', '8ACA01', '169800', '57CC7D', '00D2D3', '41C3FF', '008EE2', '6900B4', 'F900A6', 'BE0022', '5E5E5E',)
            ),
            'arptemplate_22' => array(
                'skin' => array('red', 'darkpink', 'orange', 'lightorange', 'limegreen', 'green', 'cyan', 'lightblue', 'blue', 'brightblue', 'violet', 'softviolet', 'gray', 'black'),
                'color' => array('E40031', 'D90051', 'FAA71B', 'FFC22C', '60C150', '57CC7D', '57DEE1', '41C3FF', '008EE2', '3E52F3', '6F04F4', '8656E0', '33363F', '1D1D1D')
            ),
            'arptemplate_23' => array(
                'skin' => array('orange', 'blue', 'brightblue', 'green', 'limegreen', 'darkblue', 'darkviolet', 'violet', 'pink', 'red', 'gray', 'black'),
                'color' => array('FDB515', '4DC8F4', '43B2E7', 'A2CC3A', '70C27A', '5A79BC', '5F5CA9', '744F9C', 'DC397A', 'E01E38', '4A4957', '35343A')
            ),
            'arptemplate_24' => array(
                'skin' => array('darkblue', 'pink', 'red', 'orange', 'darkgreen', 'darkcyan', 'lightblue', 'blue', 'violet', 'strongpink', 'gray', 'black'),
                'color' => array('5C57B1', 'D81A60', 'EB3102', 'FF892B', '6DB000', '0C898B', '41C3FF', '008EE2', '6900B4', 'CC0288', '5E5E5E', '1D1D1D')
            ),
            'arptemplate_25' => array(
                'skin' => array('blue', 'green', 'red', 'lightviolet', 'lightred', 'orange', 'lightgreen', 'darkgreen', 'black', 'turquoise', 'royalblue', 'violet', 'yellow', 'dogerblue'),
                'color' => array('2FB8FF', '00D29D', 'FF2476', '5178F7', 'F65052', 'FEA60E', '6FC033', '34C159', '2C2F42', '01DFF4', '5B58E3', '824BFF', 'EACD03', '4196FF')
            ),
            'arptemplate_26' => array(
                'skin' => array('blue', 'red', 'lightblue', 'cyan', 'yellow', 'pink', 'lightviolet', 'gray', 'orange', 'darkblue', 'turquoise', 'grayishyellow', 'green'),
                'color' => array('2fb8ff', 'ff2d46', '4196ff', '00d29d', 'f1bc16', 'ff2476', '6b68ff', 'b7bdcb', 'fd9a25', '337cff', '00dbef', 'cfc5a1', '16d784')
            ),
                ), $post);

        return $arprice_default_template_skins;
    }

    function arprice_get_template_skins() {

        $template_id = $_POST['table_id'];
        $reference_id = $_POST['reference_template'];
        $default_template_skin_code = $this->arprice_default_template_skins($_POST);
        $skins = $default_template_skin_code[$reference_id]['skin'];
        $colors = $default_template_skin_code[$reference_id]['color'];
        echo json_encode($default_template_skin_code[$reference_id]);
        die();
    }

    function arp_change_default_template_skins($default_array, $post) {
        global $wpdb;

        $action = isset($post['action']) ? $post['action'] : '';
        $tableid = isset($post['table_id']) ? $post['table_id'] : '';
        $reference = isset($post['reference_template']) ? $post['reference_template'] : '';
        if ($tableid == "")
            return $default_array;

        if ($action == 'arprice_default_template_skins') {
            $query = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE ID = " . $tableid);
        }
        $results = maybe_unserialize($query[0]->general_options);

        $custom_skin_colors = $results['custom_skin_colors'];

        $arp_column_custom_bg_color = $custom_skin_colors['arp_column_bg_custom_color'];
        $arp_column_bg_hover_color = $custom_skin_colors['arp_column_bg_hover_color'];
        $arp_column_desc_custom_color = $custom_skin_colors['arp_column_desc_bg_custom_color'];
        $arp_header_custom_bg_color = $custom_skin_colors['arp_header_bg_custom_color'];
        $arp_pricing_bg_custom_color = $custom_skin_colors['arp_pricing_bg_custom_color'];
        $arp_body_odd_row_bg_color = $custom_skin_colors['arp_body_odd_row_bg_custom_color'];
        $arp_body_even_row_bg_color = $custom_skin_colors['arp_body_even_row_bg_custom_color'];
        $arp_footer_bg_custom_color = $custom_skin_colors['arp_footer_content_bg_color'];
        $arp_button_bg_custom_color = $custom_skin_colors['arp_button_bg_custom_color'];
        $arp_button_bg_hover_color = $custom_skin_colors['arp_button_bg_hover_color'];

        $arp_section_background = $this->arp_custom_skin_selection_section_color();
        $main_color = '';

        switch ($arp_section_background[$reference][0]) {
            case 'arp_header_background_color_input':
                $main_color = $arp_header_custom_bg_color;
                break;
            case 'arp_column_background_color_input':
                $main_color = $arp_column_custom_bg_color;
                break;
            case 'arp_pricing_background_color_input':
                $main_color = $arp_pricing_bg_custom_color;
                break;
            case 'arp_button_background_color_input':
                $main_color = $arp_button_bg_custom_color;
                break;
            default:
                $main_color = $arp_header_custom_bg_color;
                break;
        }

        $count = count($default_array[$reference]['color']);

        $default_array[$reference]['color'][$count] = str_replace('#', '', $main_color);
        $default_array[$reference]['skin'][$count] = 'db_custom_skin';

        return $default_array;
    }

    function arp_css_pseudo_elements_array() {
        $arp_css_pseudo_elements = apply_filters('arp_css_pseudo_elements', array('::after', ':after', '::before', ':before')
        );
        return $arp_css_pseudo_elements;
    }

    function arprice_responsive_width_array() {

        $arp_responsive_width_array = apply_filters('arp_responsive_widths', array(
            'arptemplate_1' => array(
                'with_space' => array('18%'),
                'no_space' => array('20%')
            ),
            'arptemplate_2' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_3' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_4' => array(
                'with_space' => array('18%'),
                'no_space' => array('20%')
            ),
            'arptemplate_5' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_6' => array(
                'with_space' => array('18%'),
                'no_space' => array('20%')
            ),
            'arptemplate_7' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_8' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_9' => array(
                'with_space' => array('18%'),
                'no_space' => array('20%')
            ),
            'arptemplate_10' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_11' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_12' => array(
                'with_space' => array('18%'),
                'no_space' => array('20%')
            ),
            'arptemplate_13' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_14' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_15' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_16' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_20' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_21' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_22' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_23' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_24' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_25' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
            'arptemplate_26' => array(
                'with_space' => array('23%'),
                'no_space' => array('25%')
            ),
        ));

        return $arp_responsive_width_array;
    }

    function arprice_allow_border_radius() {

        $arprice_allow_border_radius = apply_filters('arprice_allow_border_radius', array(
            'arptemplate_1' => true,
            'arptemplate_2' => true,
            'arptemplate_3' => true,
            'arptemplate_4' => true,
            'arptemplate_5' => true,
            'arptemplate_6' => true,
            'arptemplate_7' => true,
            'arptemplate_8' => true,
            'arptemplate_9' => true,
            'arptemplate_10' => false,
            'arptemplate_11' => true,
            'arptemplate_12' => false,
            'arptemplate_13' => false,
            'arptemplate_14' => false,
            'arptemplate_15' => false,
            'arptemplate_16' => false,
            'arptemplate_20' => true,
            'arptemplate_21' => false,
            'arptemplate_22' => true,
            'arptemplate_23' => true,
            'arptemplate_24' => true,
            'arptemplate_25' => true,
            'arptemplate_26' => true,
        ));

        return $arprice_allow_border_radius;
    }

    function arp_border_bottom() {

        $arp_border_bottom_hide_footer = apply_filters('arp_hide_footer_border_bottom', array(
            'arptemplate_1' => array(
                'caption_column' => array(
                    'ul.arppricingtablebodyoptions' => '1px solid #cecece'
                ),
                'other_column' => array(
                    'ul.arppricingtablebodyoptions' => '1px solid #cecece'
                )
            ),
            'arptemplate_4' => array(
                'caption_column' => array(
                    'ul.arppricingtablebodyoptions' => '1px solid #cecece'
                ),
                'other_column' => array(
                    'ul.arppricingtablebodyoptions' => '1px solid #cecece'
                )
            ),
            'arptemplate_5' => array(
                'other_column' => array(
                    'ul.arppricingtablebodyoptions' => '1px solid #cecece'
                )
            ),
            'arptemplate_20' => array(
                'other_column' => array(
                    'div.arppricingtablebodycontent' => '1px solid #f2f2f2'
                )
            )
        ));
        return array();
//        return $arp_border_bottom_hide_footer;
    }

    function arprice_column_wrapper_height() {
        $arprice_col_wrapper_height = apply_filters('arprice_set_column_wrapper_height', array(
            'arptemplate_1' => 40,
            'arptemplate_2' => 40,
            'arptemplate_3' => 20,
            'arptemplate_4' => -5,
            'arptemplate_5' => 40,
            'arptemplate_6' => 20,
            'arptemplate_7' => 40,
            'arptemplate_8' => 38,
            'arptemplate_9' => 40,
            'arptemplate_10' => 35,
            'arptemplate_11' => 40,
            'arptemplate_12' => 20,
            'arptemplate_13' => 20,
            'arptemplate_14' => 20,
            'arptemplate_15' => 20,
            'arptemplate_16' => 20,
            'arptemplate_20' => 40,
            'arptemplate_21' => 40,
            'arptemplate_22' => 40,
            'arptemplate_23' => 40,
            'arptemplate_24' => 40,
            'arptemplate_25' => 15,
            'arptemplate_26' => 40,
        ));
        return $arprice_col_wrapper_height;
    }
    
    function arprice_default_highlighted_column_height_with_hover_effect(){
        $templates_array_for_highlighted_columns = array(
            'arptemplate_1' => 20,
            'arptemplate_2' => 20,
            'arptemplate_3' => 40,
            'arptemplate_4' => 65,
            'arptemplate_5' => 20,
            'arptemplate_6' => 40,
            'arptemplate_7' => 20,
            'arptemplate_8' => 22,
            'arptemplate_9' => 20,
            'arptemplate_10' => 25,
            'arptemplate_11' => 20,
            'arptemplate_12' => 0,
            'arptemplate_13' => 0,
            'arptemplate_14' => 0,
            'arptemplate_15' => 0,
            'arptemplate_16' => 0,
            'arptemplate_20' => 20,
            'arptemplate_21' => 20,
            'arptemplate_22' => 20,
            'arptemplate_23' => 15,
            'arptemplate_24' => 20,
            'arptemplate_25' => 20,
            'arptemplate_26' => 20,
        );
        $arprice_defualt_height_hover = apply_filters('arprice_defualt_height_hover',$templates_array_for_highlighted_columns);
        return $arprice_defualt_height_hover;
    }
    
    function arprice_column_wrapper_default_height(){
        $arprice_column_wrapper_default_height = array(
            'arptemplate_1' => 40,
            'arptemplate_2' => 40,
            'arptemplate_3' => 20,
            'arptemplate_4' => 40,
            'arptemplate_5' => 40,
            'arptemplate_6' => 20,
            'arptemplate_7' => 40,
            'arptemplate_8' => 40,
            'arptemplate_9' => 40,
            'arptemplate_10' => 40,
            'arptemplate_11' => 40,
            'arptemplate_12' => 40,
            'arptemplate_13' => 40,
            'arptemplate_14' => 40,
            'arptemplate_15' => 40,
            'arptemplate_16' => 40,
            'arptemplate_20' => 40,
            'arptemplate_21' => 40,
            'arptemplate_22' => 40,
            'arptemplate_23' => 40,
            'arptemplate_24' => 40,
            'arptemplate_25' => 40,
            'arptemplate_26' => 40,
        );
        return apply_filters('arprice_column_default_wrapper_height',$arprice_column_wrapper_default_height);
    }

    function arprice_hide_section_array() {
        $arprice_hide_section_array = apply_filters('arprice_hide_section_array', array(
            'arptemplate_1' => array(
                'arp_header' => array('.arppricetablecolumntitle', '.arpcaptiontitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
            ),
            'arptemplate_2' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_header_shortcode' => array('.arp_rounded_shortcode_wrapper'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_3' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arp_price_wrapper'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
                'arp_description' => array('.column_description')
            ),
            'arptemplate_4' => array(
                'arp_header' => array('.arpcolumnheader'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_5' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
                'arp_header_shortcode' => array('.arp_header_shortcode')
            ),
            'arptemplate_6' => array(
                'arp_header' => array('.arppricetablecolumntitle', '.arpcaptiontitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
            ),
            'arptemplate_7' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arp_price_wrapper'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
                'arp_description' => array('.column_description'),
                'arp_header_shortcode' => array('.arp_header_shortcode')
            ),
            'arptemplate_8' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_header_shortcode' => array('.arp_header_shortcode'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_9' => array(
                'arp_header' => array('.arppricetablecolumntitle', '.arpcaptiontitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_10' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_description' => array('.column_description'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodyoptions'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_11' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arp_price_wrapper'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
                'arp_description' => array('.column_description')
            ),
            'arptemplate_12' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
                'arp_description' => array('.column_description')
            ),
            'arptemplate_13' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
                'arp_description' => array('.column_description')
            ),
            'arptemplate_14' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arp_price_wrapper'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_15' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_16' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
            ),
            'arptemplate_20' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_21' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_22' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
            'arptemplate_23' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arp_price_wrapper'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
                'arp_description' => array('.column_description'),
            ),
            'arptemplate_24' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_price' => array('.arppricetablecolumnprice'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter'),
            ),
            'arptemplate_25' => array(
                'arp_header' => array('.arppricetablecolumntitle'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_description' => array('.column_description'),
//                'arp_footer' => array('.arpcolumnfooter'),
            ),
            'arptemplate_26' => array(
                'arp_header' => array('.arpcolumnheader'),
                'arp_feature' => array('.arppricingtablebodycontent'),
                'arp_footer' => array('.arpcolumnfooter')
            ),
                )
        );

        return $arprice_hide_section_array;
    }

    /* Created For Hide Section Where need to do min-height 0 */

    function arprice_min_height_with_section_hide() {
        $arprice_min_height_with_section_hide = apply_filters('arprice_min_height_with_section_hide', array(
            'arptemplate_1' => array(
                'arp_header' => array('.arpcolumnheader', '.arpcaptiontitle'),
                'arp_header_shortcode' => '',
                'arp_price' => array('.arpcolumnheader', '.arppricetablecolumnprice', '.arpcaptiontitle'),
                'arp_feature' => '',
                'arp_description' => '',
                'arp_footer' => '',
            ),
            'arptemplate_2' => array(
                'arp_header' => '',
                'arp_header_shortcode' => '.arpcolumnheader',
                'arp_price' => '.arpcolumnheader',
                'arp_feature' => '',
                'arp_description' => '',
                'arp_footer' => '',
            ),
            'arptemplate_3' => array(
                'arp_header' => '.arpcolumnheader',
                'arp_header_shortcode' => '',
                'arp_price' => '',
                'arp_feature' => '',
                'arp_description' => '.arpcolumnheader',
                'arp_footer' => '',
            ),
            'arptemplate_4' => array(
                'arp_header_shortcode' => '',
                'arp_feature' => '.arpcolumnheader',
                'arp_description' => '',
                'arp_footer' => '',
            ),
            'arptemplate_6' => array(
                'arp_header' => '.arppricetablecolumntitle',
                'arp_header_shortcode' => '',
                'arp_price' => '.arpcolumnheader',
                'arp_feature' => '',
                'arp_description' => '.arppricetablecolumntitle',
                'arp_footer' => '',
            ),
            'arptemplate_7' => array(
                'arp_header' => '',
                'arp_header_shortcode' => '',
                'arp_price' => '.arppricetablecolumnprice',
                'arp_feature' => '',
                'arp_description' => '',
                'arp_footer' => '.arppricetablecolumnprice',
            ),
            'arptemplate_9' => array(
                'arp_header' => '.arpcolumnheader',
                'arp_header_shortcode' => '',
                'arp_price' => '.arpcolumnheader',
                'arp_feature' => '',
                'arp_description' => '',
                'arp_footer' => '',
            ),
            'arptemplate_11' => array(
                'arp_header' => '.arpcolumnheader',
                'arp_header_shortcode' => '',
                'arp_price' => array('.arpcolumnheader', '.arppricetablecolumnprice'),
                'arp_feature' => '',
                'arp_description' => array('.arpcolumnheader', '.arppricetablecolumnprice'),
                'arp_footer' => array('.arppricetablecolumnprice', '.arpcolumnheader')
            ),
            'arptemplate_15' => array(
                'arp_header' => '',
                'arp_header_shortcode' => '',
                'arp_price' => '.arpcolumnheader',
                'arp_feature' => '',
                'arp_description' => '',
                'arp_footer' => '',
            ),
            'arptemplate_16' => array(
                'arp_header' => '.arpcolumnheader',
                'arp_header_shortcode' => '',
                'arp_price' => '.arpcolumnheader',
                'arp_feature' => '',
                'arp_description' => '.arpcolumnheader',
                'arp_footer' => '',
            ),
            'arptemplate_21' => array(
                'arp_header' => '',
                'arp_header_shortcode' => '',
                'arp_price' => '.arppricetablecolumnprice',
                'arp_feature' => '',
                'arp_description' => '',
                'arp_footer' => '',
            ),
            'arptemplate_22' => array(
                'arp_header' => '',
                'arp_header_shortcode' => '',
                'arp_price' => '.arpcolumnheader',
                'arp_feature' => '',
                'arp_description' => '',
                'arp_footer' => '',
            ),
        ));
        return $arprice_min_height_with_section_hide;
    }

    /*   template wise css when header section is hidden  */

    function arp_hide_header_column_border_top() {
        $arp_hide_header_column_border_top = apply_filters('arp_hide_header_column_border_top', array(
            'arptemplate_22' => array(
                '.arppricetablecolumnprice' => array(
                    'margin-top' => '20px'
                )
            ),
            'arptemplate_21' => array(
                '.arp_price_wrapper:before' => array(
                    'content' => 'none'
                ),
                '.arp_price_wrapper:after' => array(
                    'content' => 'none'
                ),
            ),
            'arptemplate_16' => array(
                '.column_description' => array(
                    'margin-top' => '10px'
                )
            ),
            'arptemplate_4' => array(
                '.arpmain_price' => array(
                    'top' => '0px !important'
                )
            ),
            'arptemplate_1' => array(
                '.arpcaptiontitle' => array(
                    'padding-top' => '0px !important'
                )
            ),
            'arptemplate_6' => array(
                '.arpcolumnheader' => array(
                    'min-height' => '125px !important'
                ),
            ),
//            'arptemplate_9' => array(
//                '.maincaptioncolumn  .arppricingtablebodycontent' => array(
//                    'margin-top' => '96px !important'
//                ),
//            ),
        ));
        return $arp_hide_header_column_border_top;
    }

    function arp_hide_price_css_fixes() {
        $arp_hide_price_css_fixes = apply_filters('arp_hide_price_css_fixes', array(
            'arptemplate_20' => array(
                '.arppricingtablebodycontent ul li#arp_row_0' => array(
                    'border-top-width' => '0px !important'
                )
            ),
            'arptemplate_21' => array(
                '.arppricetablecolumnprice:before' => array(
                    'content' => 'none'
                ),
                '.arppricetablecolumnprice:after' => array(
                    'content' => 'none'
                ),
            ),
            'arptemplate_1' => array(
                '.arpcolumnheader' => array(
                    'padding' => '0px !important'
                ),
                '.arpcaptiontitle' => array(
                    'padding-top' => '25px !important'
                )
            ),
            'arptemplate_6' => array(
                '.arpcaptiontitle' => array(
                    'margin-top' => '0px !important',
                    'min-height' => '96px'
                ),
            ),
            'arptemplate_9' => array(
                '.arpcaptiontitle' => array(
                    'margin-top' => '0px !important',
                    'padding-top' => '15px !important',
                    'height' => '70px',
                ),
            ),
        ));

        return $arp_hide_price_css_fixes;
    }

    function arp_hide_description_css_fixes() {
        $arp_hide_description_css_fixes = apply_filters('arp_hide_description_css_fixes', array(
            'arptemplate_7' => array(
                '.arppricetablecolumnprice' => array(
                    'margin' => '0px !important'
                )
            ),
        ));

        return $arp_hide_description_css_fixes;
    }

    function arp_column_border_array() {
        $arp_column_border_array = apply_filters('arp_column_border_array', array(
            'arptemplate_1' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
                'caption_border_all' => array(
                    'left' => '.arp_column_content_wrapper',
                    'right' => '.arp_column_content_wrapper',
                    'top' => '.arp_column_content_wrapper',
                    'bottom' => '.arp_column_content_wrapper',
                ),
            ),
            'arptemplate_2' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_3' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_4' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
                'caption_border_all' => array(
                    'left' => '.arp_column_content_wrapper',
                    'right' => '.arp_column_content_wrapper',
                    'top' => '.arp_column_content_wrapper',
                    'bottom' => '.arp_column_content_wrapper',
                ),
            ),
            'arptemplate_5' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_6' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
                'caption_border_all' => array(
                    'left' => '.arpcaptiontitle, .arppricingtablebodycontent, .arpcolumnfooter',
                    'right' => '.arpcaptiontitle, .arppricingtablebodycontent, .arpcolumnfooter',
                    'top' => '.arpcaptiontitle',
                    'bottom' => '.arp_column_content_wrapper',
                ),
            ),
            'arptemplate_7' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_8' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_9' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arpcolumnfooter',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
                'caption_border_all' => array(
                    'left' => '.arppricingtablebodycontent, .arpcaptiontitle',
                    'right' => '.arppricingtablebodycontent, .arpcaptiontitle',
                    'top' => '.arpcaptiontitle',
                    'bottom' => '.arp_column_content_wrapper',
                ),
            ),
            'arptemplate_10' => array(
                'top' => '.arpplan',
                'bottom' => '.arpplan',
                'left' => '.arpplan',
                'right' => '.arpplan',
            ),
            'arptemplate_11' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_12' => array(
                'top' => '.arpplan',
                'bottom' => '.arpplan',
                'left' => '.arpplan',
                'right' => '.arpplan',
            ),
            'arptemplate_13' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_14' => array(
                'top' => '.arpplan',
                'bottom' => '.arpplan',
                'left' => '.arpplan',
                'right' => '.arpplan',
            ),
            'arptemplate_15' => array(
                'top' => '.arpplan',
                'bottom' => '.arpplan',
                'left' => '.arpplan',
                'right' => '.arpplan',
            ),
            'arptemplate_16' => array(
                'top' => '.arpplan',
                'bottom' => '.arpplan',
                'left' => '.arpplan',
                'right' => '.arpplan',
            ),
            'arptemplate_20' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_21' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_22' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_23' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_24' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_25' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
            'arptemplate_26' => array(
                'top' => '.arp_column_content_wrapper',
                'bottom' => '.arp_column_content_wrapper',
                'left' => '.arp_column_content_wrapper',
                'right' => '.arp_column_content_wrapper',
            ),
        ));
        return $arp_column_border_array;
    }

    function arp_section_text_alignment() {
        $arp_section_text_alignment = apply_filters('arp_section_text_alignment', array(
            'arptemplate_1' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                    'footer_section' => 'arpcolumnfooter'
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'body_section' => 'arppricingtablebodyoptions li',
                    'footer_section' => 'arpcolumnfooter'
                )
            ),
            'arptemplate_2' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_3' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'footer_section' => 'arpcolumnfooter',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_4' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                    'footer_section' => 'arpcolumnfooter',
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_pricerow',
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_5' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'footer_section' => 'arpcolumnfooter',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_6' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                    'footer_section' => 'arpcolumnfooter'
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'footer_section' => 'arpcolumnfooter',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_7' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_8' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_9' => array(
                'caption_column' => array(
                    'header_section' => 'arpcaptiontitle',
                ),
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_10' => array(
                'other_column' => array(
                    'header_section' => 'bestPlanTitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_11' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_13' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_14' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_15' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_16' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_20' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_21' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_22' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_23' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_24' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arp_price_wrapper',
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_25' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'pricing_section' => 'arppricetablecolumnprice',
//                    'footer_section' => 'arpcolumnfooter',
                    'column_description_section' => 'column_description',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            ),
            'arptemplate_26' => array(
                'other_column' => array(
                    'header_section' => 'arppricetablecolumntitle',
                    'footer_section' => 'arpcolumnfooter',
                    'body_section' => 'arppricingtablebodyoptions li',
                )
            )
        ));
        return $arp_section_text_alignment;
    }

    /**
     * Apply For Css Fixing At Row Level Border If needed
     * Pass Value in array like array('.class','border-position')
     */
    function arp_row_level_border() {

        $arp_row_level_border = apply_filters('arp_row_level_border', array(
            'arptemplate_6' => array(
                array('.arpcolumnheader', 'border-bottom'),
            ),
        ));

        return $arp_row_level_border;
    }

    /**
     * remove border of last child
     */
    function arp_row_level_border_remove_from_last_child() {

        $arp_row_level_border_remove_from_last_child = apply_filters('arp_row_level_border_remove_from_last_child', array(
            'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_8', 'arptemplate_10', 'arptemplate_11', 'arptemplate_14', 'arptemplate_15', 'arptemplate_13', 'arptemplate_16', 'arptemplate_25',
                )
        );

        return $arp_row_level_border_remove_from_last_child;
    }

    function arp_select_previous_skin_for_multicolor() {

        $arp_select_previous_skin_for_multicolor = apply_filters('arp_select_previous_skin_for_multicolor', array(
            'arptemplate_1' => 'green',
            'arptemplate_5' => 'red',
            'arptemplate_8' => 'red',
            'arptemplate_9' => 'darkviolet',
            'arptemplate_10' => 'teal',
            'arptemplate_12' => '',
        ));

        return $arp_select_previous_skin_for_multicolor;
    }

    function arp_font_settings() {
        $arp_font_settings = apply_filters('arp_font_settings', array(
            'arptemplate_1' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font'),
            'arptemplate_2' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font'),
            'arptemplate_3' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font', 'arp_desc_font'),
            'arptemplate_4' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font'),
            'arptemplate_5' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_6' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font'),
            'arptemplate_7' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font', 'arp_desc_font'),
            'arptemplate_8' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_9' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font'),
            'arptemplate_10' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font', 'arp_desc_font'),
            'arptemplate_11' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font', 'arp_desc_font'),
            'arptemplate_12' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_13' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font', 'arp_desc_font'),
            'arptemplate_14' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_15' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_16' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_20' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_21' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font'),
            'arptemplate_22' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font'),
            'arptemplate_23' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_button_font', 'arp_desc_font'),
            'arptemplate_24' => array('arp_header_font', 'arp_price_font', 'arp_body_font', 'arp_footer_font', 'arp_button_font'),
            'arptemplate_25' => array('arp_header_font', 'arp_body_font', /* 'arp_button_font', */ 'arp_desc_font'),
            'arptemplate_26' => array('arp_header_font', 'arp_body_font', 'arp_button_font'),
                )
        );

        return $arp_font_settings;
    }

    function arp_button_type() {
        $arp_button_type = apply_filters('arp_button_type', array(
            'flat' => array(
                'name' => __('Flat', ARP_PT_TXTDOMAIN),
                'class' => 'arp_flat_button'
            ),
            'classic' => array(
                'name' => __('Classic', ARP_PT_TXTDOMAIN),
                'class' => 'arp_classic_button'
            ),
            'border' => array(
                'name' => __('Border', ARP_PT_TXTDOMAIN),
                'class' => 'arp_border_button'
            ),
            'reverse_border' => array(
                'name' => __('Reverse Border', ARP_PT_TXTDOMAIN),
                'class' => 'arp_reverse_border_button'
            ),
            'modern' => array(
                'name' => __('Modern', ARP_PT_TXTDOMAIN),
                'class' => 'arp_modern_button'
            ),
            'shadow' => array(
                'name' => __('Shadow', ARP_PT_TXTDOMAIN),
                'class' => 'arp_shadow_button'
            ),
            'none' => array(
                'name' => __('None', ARP_PT_TXTDOMAIN),
                'class' => 'arp_none_button'
            ),
        ));

        return $arp_button_type;
    }

    function arp_shortcode_custom_type() {
        $arp_shortcode_custom_type = apply_filters('arp_shortcode_custom_type', array(
            'rounded' => array(
                'name' => __('Circle (Bordered)', ARP_PT_TXTDOMAIN),
                'class' => 'arp_rounded_shortcode',
                'type' => 'bordered'
            ),
            'rounded_solid' => array(
                'name' => __('Circle (Solid)', ARP_PT_TXTDOMAIN),
                'class' => 'arp_rounded_shortcode_solid',
                'type' => 'solid'
            ),
            'square' => array(
                'name' => __('Square (Bordered)', ARP_PT_TXTDOMAIN),
                'class' => 'arp_square_shortcode',
                'type' => 'bordered'
            ),
            'square_solid' => array(
                'name' => __('Square (Solid)', ARP_PT_TXTDOMAIN),
                'class' => 'arp_square_shortcode_solid',
                'type' => 'solid'
            ),
            
            'semiround' => array(
                'name' => __('Rounded Square (Bordered)', ARP_PT_TXTDOMAIN),
                'class' => 'arp_semiround_shortcode',
                'type' => 'bordered'
            ),
            'semiround_solid' => array(
                'name' => __('Rounded Square (Solid)', ARP_PT_TXTDOMAIN),
                'class' => 'arp_semiround_shortcode_solid',
                'type' => 'solid'
            ),
            'none' => array(
                'name' => __('None', ARP_PT_TXTDOMAIN),
                'class' => 'arp_none_shortcode',
                'type' => 'none'
            ),
        ));

        return $arp_shortcode_custom_type;
    }

    function arp_navigation_section_array() {
        $arp_navigation_section_array = apply_filters('arp_navigation_section_array', array(
            'arptemplate_1' => array(
                'header_level' => array(
                    'caption_column' => '.arpcaptiontitle',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arppricetablecolumnprice'
                ),
                'footer_level' => array(
                    'caption_column' => '.arpcolumnfooter',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'row_level' => array(
                    'caption_column' => '.arpbodyoptionrow',
                    'other_columns' => '.arpbodyoptionrow'
                )
            ),
            'arptemplate_2' => array(
                'header_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arp_header_selection_new'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arppricetablecolumnprice'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_3' => array(
                'header_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arp_price_wrapper'
                ),
                'description_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.column_description'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
            ),
            'arptemplate_4' => array(
                'header_level' => array(
                    'caption_column' => '.arpcaptiontitle',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arp_price_wrapper'
                ),
                'row_level' => array(
                    'caption_column' => '.arpbodyoptionrow',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '.arpcolumnfooter',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '.arpcolumnfooter',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_5' => array(
                'header_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arp_header_selection_new'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arppricetablecolumnprice'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'button_level' => array(
                    'caption_column' => '.arpcolumnfooter',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_6' => array(
                'header_level' => array(
                    'caption_column' => '.arpcaptiontitle',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arppricetablecolumnprice'
                ),
                'row_level' => array(
                    'caption_column' => '.arpbodyoptionrow',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '.arpcolumnfooter',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_7' => array(
                'header_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arp_header_selection_new'
                ),
                'description_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.column_description'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arp_price_wrapper'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_8' => array(
                'header_level' => array(
                    'caption_columns' => '',
                    'other_columns' => '.arp_header_selection_new'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arppricetablecolumnprice'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '',
                    'other_columns' => ''
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_9' => array(
                'header_level' => array(
                    'caption_columns' => '.arpcaptiontitle',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arppricetablecolumnprice'
                ),
                'row_level' => array(
                    'caption_column' => '.arpbodyoptionrow',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '.arpcolumnfooter',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '.arpcolumnfooter',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_10' => array(
                'header_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.bestPlanTitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arp_price_wrapper'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'description_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.column_description'
                ),
                'footer_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_11' => array(
                'header_level' => array(
                    'caption_columns' => '',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arp_price_wrapper'
                ),
                'description_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.column_description'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_13' => array(
                'header_level' => array(
                    'caption_columns' => '',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arppricetablecolumnprice'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'description_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.column_description'
                )
            ),
            'arptemplate_14' => array(
                'header_level' => array(
                    'caption_columns' => '',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arp_price_wrapper'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_15' => array(
                'header_level' => array(
                    'caption_columns' => '',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arppricetablecolumnprice'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_16' => array(
                'header_level' => array(
                    'caption_columns' => '',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arppricetablecolumnprice'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_20' => array(
                'header_level' => array(
                    'caption_columns' => '',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arppricetablecolumnprice'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_21' => array(
                'header_level' => array(
                    'caption_columns' => '',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arppricetablecolumnprice'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_22' => array(
                'header_level' => array(
                    'caption_columns' => '',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arppricetablecolumnprice'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_23' => array(
                'header_level' => array(
                    'caption_columns' => '',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arp_price_wrapper'
                ),
                'description_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.column_description'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_24' => array(
                'header_level' => array(
                    'caption_columns' => '',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arppricetablecolumnprice'
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
            'arptemplate_25' => array(
                'header_level' => array(
                    'caption_columns' => '',
                    'other_columns' => '.arppricetablecolumntitle'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => ''
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
//                'footer_level' => array(
//                    'caption_column' => '',
//                    'other_columns' => '.arpcolumnfooter'
//                ),
//                'button_level' => array(
//                    'caption_column' => '',
//                    'other_columns' => '.arpcolumnfooter'
//                ),
                'description_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.column_description'
                )
            ),
            'arptemplate_26' => array(
                'header_level' => array(
                    'caption_columns' => '',
                    'other_columns' => '.arp_header_selection_new'
                ),
                'price_level' => array(
                    'caption_column' => '',
                    'other_columns' => ''
                ),
                'row_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpbodyoptionrow'
                ),
                'footer_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                ),
                'button_level' => array(
                    'caption_column' => '',
                    'other_columns' => '.arpcolumnfooter'
                )
            ),
        ));
        return $arp_navigation_section_array;
    }

    function arp_button_size_new() {
        $arp_button_size_new = apply_filters('arp_button_size_new', array(
            'Small' => 'arp_small_btn',
            'Medium' => 'arp_medium_btn',
            'Large' => 'arp_large_btn',
        ));

        return $arp_button_size_new;
    }

    function arp_column_bg_image_colors() {
        $arp_column_bg_image_colors = apply_filters('arp_column_bg_image_colors', array(
            'arptemplate_1' => array('.bestPlanButton'),
            'arptemplate_2' => array('.rounded_corder', '.bestPlanButton'),
            'arptemplate_3' => array('.bestPlanButton'),
            'arptemplate_4' => array('.arp_price_wrapper', '.bestPlanButton'),
            'arptemplate_5' => array('.arpcolumnheader', '.arppricetablecolumnprice', '.arp_even_row', '.arp_odd_row', '.bestPlanButton'),
            'arptemplate_6' => array('.bestPlanButton'),
            'arptemplate_7' => array('.arppricetablecolumntitle', '.column_description', '.arppricetablecolumnprice', '.arp_even_row', '.arp_odd_row', '.bestPlanButton'),
            'arptemplate_8' => array('.rounded_corder', '.bestPlanButton'),
            'arptemplate_9' => array('.bestPlanButton'),
            'arptemplate_10' => array('.bestPlanTitle', '.arp_price_wrapper', '.arpplan', '.arp_odd_row', '.arp_even_row', '.bestPlanButton'),
            'arptemplate_11' => array('.bestPlanButton'),
            'arptemplate_13' => array('.arpplan', '.arppricetablecolumnprice', '.bestPlanButton'),
            'arptemplate_14' => array('.bestPlanButton'),
            'arptemplate_15' => array('.arppricetablecolumnprice', '.bestPlanButton'),
            'arptemplate_16' => array('.bestPlanButton'),
            'arptemplate_20' => array('.bestPlanButton'),
            'arptemplate_21' => array('.bestPlanButton'),
            'arptemplate_22' => array('.bestPlanButton'),
            'arptemplate_23' => array('.arp_column_content_wrapper', '.arp_price_wrapper', '.bestPlanButton'),
            'arptemplate_24' => array('.bestPlanButton'),
            'arptemplate_25' => array('.arppricetablecolumntitle', '.arppricingtablebodycontent', '.column_description'),
            'arptemplate_26' => array('.rounded_corder', '.bestPlanButton'),
        ));
        return $arp_column_bg_image_colors;
    }

}

?>