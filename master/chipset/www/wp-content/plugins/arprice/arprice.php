<?php @session_start();
@error_reporting(E_ERROR | E_WARNING | E_PARSE);

/* Plugin Name: ARPrice
  Description: Ultimate Wordpress Pricing Table / Team Showcase Plugin
  Version: 2.5.4
  Plugin URI: http://arprice.arformsplugin.com
  Author: Repute InfoSystems
  Author URI: http://arprice.arformsplugin.com
 */
if (is_ssl())
    define('ARPURL', str_replace('http://', 'https://', WP_PLUGIN_URL . '/arprice'));
else
    define('ARPURL', WP_PLUGIN_URL . '/arprice');

define('PRICINGTABLE_DIR', WP_PLUGIN_DIR . '/arprice');
define('PRICINGTABLE_URL', ARPURL);
define('PRICINGTABLE_CORE_DIR', PRICINGTABLE_DIR . '/core');
define('PRICINGTABLE_CLASSES_DIR', PRICINGTABLE_DIR . '/core/classes');
define('PRICINGTABLE_CLASSES_URL', PRICINGTABLE_URL . '/core/classes');
define('PRICINGTABLE_IMAGES_URL', PRICINGTABLE_URL . '/images');
define('PRICINGTABLE_INC_DIR', PRICINGTABLE_DIR . '/inc');
define('PRICINGTABLE_VIEWS_DIR', PRICINGTABLE_DIR . '/core/views');
define('PRICINGTABLE_MODEL_DIR', PRICINGTABLE_DIR . '/core/models');
define('ARP_PT_TXTDOMAIN', 'ARPrice');
@define('FS_METHOD', 'direct');

define('ARPRICECSURL', PRICINGTABLE_URL . '/arprice_cs');
define('ARPRICECSDIR', PRICINGTABLE_DIR . '/arprice_cs');

$wpupload_dir = wp_upload_dir();
$upload_dir = $wpupload_dir['basedir'] . '/arprice';
$upload_url = $wpupload_dir['baseurl'] . '/arprice';

if (is_ssl()) {
    $upload_url = str_replace("http://", "https://", $wpupload_dir['baseurl'] . '/arprice');
} else {
    $upload_url = $wpupload_dir['baseurl'] . '/arprice';
}

wp_mkdir_p($upload_dir);

$css_upload_dir = $upload_dir . '/css';
wp_mkdir_p($css_upload_dir);

$template_images_upload_dir = $upload_dir . '/template_images';
wp_mkdir_p($template_images_upload_dir);

$arp_import_dir = $upload_dir . '/import';
wp_mkdir_p($arp_import_dir);

define('PRICINGTABLE_UPLOAD_DIR', $upload_dir);

define('PRICINGTABLE_UPLOAD_URL', $upload_url);

global $arpriceplugin;

global $pagenow;

global $arp_pricingtable;
$arp_pricingtable = new ARP_PricingTable();

/* Defining Pricing Table Version */
global $arprice_version;
$arprice_version = '2.5.4';

/* PRICING TABLE IMAGES AND CSS RELEASE VERSION */
global $arprice_images_css_version;
$arprice_images_css_version = '2.0';

/* Defining Rolls for Pricing table Plugin */
global $allrole;
$allrole = array("editor", "author", "contributor", "subscriber");

global $pricingtableajaxurl;
$pricingtableajaxurl = admin_url('admin-ajax.php');

if (file_exists(PRICINGTABLE_CLASSES_DIR . '/class.arprice.php'))
    require_once(PRICINGTABLE_CLASSES_DIR . '/class.arprice.php' );

if (file_exists(PRICINGTABLE_CLASSES_DIR . '/class.arprice_form.php'))
    require_once( PRICINGTABLE_CLASSES_DIR . '/class.arprice_form.php' );

if (file_exists(PRICINGTABLE_CLASSES_DIR . '/class.arprice_analytics.php'))
    require_once( PRICINGTABLE_CLASSES_DIR . '/class.arprice_analytics.php' );

if (file_exists(PRICINGTABLE_CLASSES_DIR . '/class.arprice_import_export.php'))
    require_once( ( PRICINGTABLE_CLASSES_DIR . '/class.arprice_import_export.php' ) );

if (file_exists(PRICINGTABLE_CLASSES_DIR . '/class.arp_fonts.php'))
    require_once( ( PRICINGTABLE_CLASSES_DIR . '/class.arp_fonts.php' ) );

if (file_exists(PRICINGTABLE_CLASSES_DIR . '/class.arp_default_settings.php'))
    require_once( (PRICINGTABLE_CLASSES_DIR . '/class.arp_default_settings.php'));

if (file_exists(PRICINGTABLE_CLASSES_DIR . '/class.arprice_old_template_css_array.php'))
    require_once( (PRICINGTABLE_CLASSES_DIR . '/class.arprice_old_template_css_array.php'));

global $arprice_class;
$arprice_class = new arprice();

global $arprice_form;
$arprice_form = new arprice_form();

global $arprice_analytics;
$arprice_analytics = new arprice_analytics;



global $arprice_import_export;
$arprice_import_export = new arprice_import_export();

global $arprice_fonts;
$arprice_fonts = new arprice_fonts();

global $arprice_default_settings;
$arprice_default_settings = new arp_default_settings();

global $arprice_old_template_css;
$arprice_old_template_css = new ARPrice_old_template_css();

global $api_url, $plugin_slug, $wp_version;

global $arp_mainoptionsarr;
global $arp_coloptionsarr;
global $arp_tempbuttonsarr;
global $arp_templateorderarr;
global $arp_templatecssinfoarr;
global $arp_templateresponsivearr;
global $arp_template_editor_arr;
global $arp_templatesectionsarr;
global $arp_templatecustomskinarr;
global $arp_templatehoverclassarr;

global $arp_is_animation, $arp_has_tooltip, $arp_has_fontawesome, $arp_effect_css, $arp_is_lightbox, $arp_animate_price, $arp_has_material_icons, $arp_has_typicons, $arp_has_ionicons;
$arp_is_animation = 0;
$arp_has_tooltip = 0;
$arp_has_fontawesome = 0;
$arp_has_material_icons = 0;
$arp_has_typicons = 0;
$arp_has_ionicons = 0;
$arp_effect_css = 0;
$arp_is_lightbox = 0;
$arp_animate_price = 0;

if (class_exists('WP_Widget')) {
    require_once(PRICINGTABLE_DIR . '/core/widgets/arprice_widget.php');
    add_action('widgets_init', create_function('', 'return register_widget("arprice_widget");'));
}


if (file_exists(PRICINGTABLE_CORE_DIR . '/vc/class_vc_extend.php')) {
    require_once( ( PRICINGTABLE_CORE_DIR . '/vc/class_vc_extend.php' ) );
    global $arprice_vdextend;
    $arprice_vdextend = new ARPrice_VCExtendArp();
}

class ARP_PricingTable {

    function __construct() {
        global $arprice_version;
        register_activation_hook(__FILE__, array('ARP_PricingTable', 'install'));

        register_activation_hook(__FILE__, array('ARP_PricingTable', 'arprice_check_network_activation'));

        register_uninstall_hook(__FILE__, array('ARP_PricingTable', 'uninstall'));

        add_action('admin_menu', array(&$this, 'pricingtable_menu'), 27);

        add_action('wp_ajax_editplan', array(&$this, 'editplan'));

        add_action('wp_ajax_editpackage', array(&$this, 'editpackage'));

        add_action('admin_enqueue_scripts', array(&$this, 'set_css'), 10);

        add_action('admin_enqueue_scripts', array(&$this, 'set_js'), 10);

        // Front end css and js
        add_action('wp_head', array(&$this, 'set_front_css'), 1);

        add_action('wp_head', array(&$this, 'set_front_js'), 1);

        add_action('admin_head', array(&$this, 'arp_menu_css'));

        add_action('init', array(&$this, 'arp_pricing_table_main_settings'));

        add_action('plugins_loaded', array(&$this, 'arp_pricing_table_load_textdomain'));

        add_action('wp_head', array(&$this, 'arp_enqueue_template_css'), 1, 0);
        add_action('wp_head', array(&$this, 'arp_front_assets'), 1, 0);

        add_action('enqueue_preview_style', array(&$this, 'arp_enqueue_preview_css'), 1, 4);

        add_action('admin_init', array(&$this, 'arp_db_check'));

        add_filter('admin_footer_text', array(&$this, 'replace_footer_admin'));

        add_filter('update_footer', array(&$this, 'replace_footer_version'), '1234');

        add_action('admin_head', array($this, 'arp_hide_update_notice_to_all_admin_users'), 10000);

        add_action('wp_footer', array(&$this, 'footer_js'), 1, 0);

        add_filter('arp_append_googlemap_js', array($this, 'append_googlemap_js'), 1, 1);

        /* Cornerstone */
        add_action('wp_enqueue_scripts', array(&$this, 'arprice_cs_enqueue'));
        add_action('cornerstone_register_elements', array(&$this, 'arprice_cs_register_elements'));
        add_filter('cornerstone_icon_map', array(&$this, 'arprice_cs_icon_map'));
        /* Cornerstone */
        
        add_filter('script_loader_tag', array(&$this, 'arp_prevent_rocket_loader_script'), 10, 2);
    }

    function replace_footer_admin() {
        echo '<span id="footer-thankyou"></span>';
    }

    function replace_footer_version() {
        return ' ';
    }

    /* Loading plugin text domain */

    function arp_pricing_table_load_textdomain() {
        load_plugin_textdomain(ARP_PT_TXTDOMAIN, false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    function arprice_check_network_activation($network_wide) {
        if (!$network_wide)
            return;

        deactivate_plugins(plugin_basename(__FILE__), TRUE, TRUE);

        header('Location: ' . network_admin_url('plugins.php?deactivate=true'));
        exit;
    }

    function arp_pricing_table_main_settings() {
        global $arp_mainoptionsarr, $arp_pricingtable, $arprice_default_settings;
        $arp_mainoptionsarr = $arp_pricingtable->arp_mainoptions();

        global $arp_coloptionsarr;
        $arp_coloptionsarr = $arp_pricingtable->arp_columnoptions();

        global $arp_tempbuttonsarr;
        $arp_tempbuttonsarr = $arp_pricingtable->arp_tempbuttonsoptions();

        global $arp_templateorderarr;
        $arp_templateorderarr = $arp_pricingtable->arp_template_order();

        global $arp_templatecssinfoarr;
        $arp_templatecssinfoarr = $arp_pricingtable->arp_templatecss_info();

        global $arp_templateresponsivearr;
        $arp_templateresponsivearr = $arp_pricingtable->arp_template_responsive_type_array();

        global $arp_template_editor_arr;
        $arp_template_editor_arr = $arp_pricingtable->arp_template_editor_array();

        global $arp_templatesectionsarr;
        $arp_templatesectionsarr = $arprice_default_settings->arp_template_sections_array();

        global $arp_templatecustomskinarr;
        $arp_templatecustomskinarr = $arprice_default_settings->arp_template_custom_skin_array();

        global $arp_templatehoverclassarr;
        $arp_templatehoverclassarr = $arprice_default_settings->arp_template_hover_class_array();
    }

    /* Setting General Options for Pricing table */

    function arp_mainoptions() {
        $arpoptionsarr = apply_filters('arp_pricing_table_available_main_settings', array(
            'general_options' => array(
                'template_options' => array(
                    'templates' => array('arptemplate_1', 'arptemplate_4', 'arptemplate_12', 'arptemplate_3', 'arptemplate_5', 'arptemplate_7', 'arptemplate_8', 'arptemplate_11', 'arptemplate_10', 'arptemplate_6', 'arptemplate_2', 'arptemplate_9', 'arptemplate_13', 'arptemplate_15', 'arptemplate_14', 'arptemplate_16', 'arpmtemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25', 'arptemplate_26'),
                    'skins' => array('arptemplate_1' => array('green', 'yellow', 'darkorange', 'darkred', 'red', 'violet', 'pink', 'blue', 'darkblue', 'lightgreen', 'darkestblue', 'cyan', 'black', 'multicolor'), 'arptemplate_4' => array('darkgreen', 'darkred', 'green', 'blue', 'pink', 'violet', 'orange', 'skyblue', 'lightblue', 'yellow', 'darkpink', 'darkblue', 'grayishblue'), 'arptemplate_12' => array('blue', 'cyan', 'orange', 'green', 'red', 'skyblue', 'maroon', 'purple', 'darkgray', 'brightorange', 'multicolor'), 'arptemplate_3' => array('black', 'green', 'orange', 'red', 'teal', 'yellow', 'blue', 'darkgreen', 'maroon', 'purple'), 'arptemplate_5' => array('red', 'yellow', 'blue', 'green', 'violet', 'cyan', 'pink', 'limegreen', 'orange', 'darkblue', 'multicolor'), 'arptemplate_7' => array('blue', 'black', 'cyan', 'lightblue', 'red', 'yellow', 'olive', 'darkpurple', 'darkred', 'pink', 'brown'), 'arptemplate_8' => array('purple', 'skyblue', 'red', 'green', 'blue', 'orange', 'darkcyan', 'yellow', 'pink', 'teal', 'multicolor'), 'arptemplate_11' => array('yellow', 'limegreen', 'red', 'blue', 'pink', 'cyan', 'lightpink', 'violet', 'gray', 'green'), 'arptemplate_10' => array('red', 'teal', 'orange', 'blue', 'green', 'lightteal', 'pink', 'lightgreen', 'darkorange', 'purple', 'darkblue', 'gray', 'multicolor'), 'arptemplate_6' => array('green', 'blue', 'red', 'cyan', 'limegreen', 'darkblue', 'pink', 'darkcyan', 'violet', 'black'), 'arptemplate_2' => array('blue', 'lightviolet', 'yellow', 'limegreen', 'orange', 'softblue', 'limecyan', 'brightred', 'red', 'pink', 'lightblue', 'darkpink', 'darkcyan'), 'arptemplate_9' => array('darkyellow', 'limegreen', 'darkviolet', 'darkred', 'lightorange', 'orange', 'cyan', 'magenta', 'yellow', 'red', 'multicolor'), 'arptemplate_13' => array('darkblue', 'cyan', 'green', 'red', 'blue', 'brown', 'darkcyan', 'darkmagenta'), 'arptemplate_15' => array('yellow', 'red', 'green', 'cyan', 'blue', 'pink', 'purple', 'orange', 'darkyellow', 'limegreen'), 'arptemplate_14' => array('orange', 'limegreen', 'blue', 'violet', 'lightorange', 'cyan', 'red', 'yellow', 'gray', 'darkblue'), 'arptemplate_16' => array('orange', 'darkgreen', 'darkred', 'magenta', 'blue', 'darkblue', 'darkcyan', 'red', 'darklimegreen', 'gray'), 'arptemplate_20' => array('blue', 'pink', 'red', 'yellow', 'green', 'cyan', 'strongviolet', 'violet', 'lightviolet', 'darkyellow', 'grey', 'black'), 'arptemplate_21' => array('pink', 'red', 'yellow', 'green', 'darklimegreen', 'limecyan', 'cyan', 'lightblue', 'blue', 'strongviolet', 'purepink', 'darkred', 'gray'), 'arptemplate_22' => array('red', 'darkpink', 'orange', 'lightorange', 'limegreen', 'green', 'cyan', 'lightblue', 'blue', 'brightblue', 'violet', 'softviolet', 'gray', 'black'), 'arptemplate_23' => array('orange', 'blue', 'brightblue', 'green', 'limegreen', 'darkblue', 'darkviolet', 'violet', 'pink', 'red', 'gray', 'black'), 'arptemplate_24' => array('darkblue', 'pink', 'red', 'orange', 'darkgreen', 'darkcyan', 'lightblue', 'blue', 'violet', 'strongpink', 'gray', 'black'), 'arptemplate_25' => array('blue', 'green', 'red', 'lightviolet', 'lightred', 'orange', 'lightgreen', 'darkgreen', 'black', 'turquoise', 'royalblue', 'violet', 'yellow', 'dogerblue'), 'arptemplate_26' => array('blue', 'red', 'lightblue', 'cyan', 'yellow', 'pink', 'lightviolet', 'gray', 'orange', 'darkblue', 'turquoise', 'grayishyellow', 'green')),
                    'skin_color_code' => array('arptemplate_1' => array('6dae2e', 'fbb400', 'e75c01', 'c32929', 'e52937', '713887', 'EB005C', '29A1D3', '2F3687', '1BA341', '2F4251', '009E7B', '5C5C5C', 'Multicolor'), 'arptemplate_4' => array('28ae4d', 'ec4152', '2bc489', '0084ff', 'f50d7b', '4a148c', 'ff7510', '48c8f5', '626cef', 'ffcc00', 'ad1457', '112b50', '4a4957'), 'arptemplate_12' => array('143B86', '059B90', 'E38B05', '23A359', 'C10F0F', '2284C1', '8A0135', '7B1EC7', '474F62', 'D03509', 'Multicolor'), 'arptemplate_3' => array('39434D', '24B968', 'E87C3C', 'E84C3D', '6DBEBF', 'EBBF44', '316493', '7FB45C', '9A272A', '6F4786'), 'arptemplate_5' => array('E52937', 'FBB400', '20AEFF', '199800', '734EAB', '00D8CD', 'FF1D77', '91D100', 'FE7D22', '2F3687', 'Multicolor'), 'arptemplate_7' => array('3473DC', '3E3E3C', '1EAE8B', '1BACE1', 'F33C3E', 'FFA800', '8FB021', '5B48A2', '79302A', 'ED1374', 'B11D00'), 'arptemplate_8' => array('AB6ED7', '44B7E4', 'F15859', '7FB948', '595EB7', 'FF6E3D', '54CAB0', 'FFC74B', 'EC3E9A', '25D0D7', 'Multicolor'), 'arptemplate_11' => array('EFA738', '43B34D', 'FF3241', '09B1F8', 'E3328C', '11B0B6', 'F15F74', '8F4AFF', '949494', '78C335'), 'arptemplate_10' => array('E92526', '00A392', 'FFAD00', '50B8F5', '01A358', '1FC4C8', 'E83473', '66AD33', 'FF622B', '8250A9', '3E38A4', '89888D', 'Multicolor'), 'arptemplate_6' => array('87BD41', '29A1D3', 'E84C3D', '1FC4C8', '2ECB72', '5165A2', 'C31F5B', '009E7B', '703784', '6D7383'), 'arptemplate_2' => array('02a3ff', '6c62d3', 'ffba00', '6ed563', 'ff9525', '4476d9', '37ba5a', 'f34044', 'de1a4c', 'de199a', '1a5fde', 'a51143', '11a599'), 'arptemplate_9' => array('AFBA5A', '00c140', '7003AE', 'AF1D04', 'F2B10F', 'FE7D22', '03B88B', 'B037C0', 'CBB963', 'AC113D', 'Multicolor'), 'arptemplate_13' => array('01325b', '03735D', '168737', 'C61C1C', '00A0EA', '883D13', '005760', '602B63'), 'arptemplate_15' => array('EAA700', 'EC155B', '18B949', '09D1B5', '10A4FA', 'EC3F8F', '755EC6', 'FA5655', 'BE8E44', '8CA91D'), 'arptemplate_14' => array('F15A23', '2DCC70', '3598DB', '9661D7', 'F49C14', '1BBC9B', 'E52937', '9CC31A', '757575', '384C81'), 'arptemplate_16' => array('FE7C22', '6DAE2E', 'B41E1F', 'A859B5', '29A1D3', '2F3687', '009E7B', 'E52937', '3D735B', '6D7C7F'), 'arptemplate_20' => array('00BAFF', 'D81A60', 'F73300', 'FFC22C', '8ACA01', '57CC7D', '4617B5', '6900B4', 'A23BCA', 'D8C022', '858585', '1D1D1D'), 'arptemplate_21' => array('D81A60', 'F73300', 'FFC22C', '8ACA01', '169800', '57CC7D', '00D2D3', '41C3FF', '008EE2', '6900B4', 'F900A6', 'BE0022', '5E5E5E'), 'arptemplate_22' => array('E40031', 'D90051', 'FAA71B', 'FFC22C', '60C150', '57CC7D', '57DEE1', '41C3FF', '008EE2', '3E52F3', '6F04F4', '8656E0', '33363F', '1D1D1D'), 'arptemplate_23' => array('FDB515', '4DC8F4', '43B2E7', 'A2CC3A', '70C27A', '5A79BC', '5F5CA9', '744F9C', 'DC397A', 'E01E38', '4A4957', '35343A'), 'arptemplate_24' => array('5C57B1', 'D81A60', 'EB3102', 'FF892B', '6DB000', '0C898B', '41C3FF', '008EE2', '6900B4', 'CC0288', '5E5E5E', '1D1D1D'), 'arptemplate_25' => array('2FB8FF', '00D29D', 'FF2476', '5178F7', 'F65052', 'FEA60E', '6FC033', '34C159', '2C2F42', '01DFF4', '5B58E3', '824BFF', 'EACD03', '4196FF'), 'arptemplate_26' => array('2fb8ff', 'ff2d46', '4196ff', '00d29d', 'f1bc16', 'ff2476', '6b68ff', 'b7bdcb', 'fd9a25', '337cff', '00dbef', 'cfc5a1', '16d784')),
                    'template_type' => array('arptemplate_1' => 'normal', 'arptemplate_4' => 'normal', 'arptemplate_12' => 'advanced', 'arptemplate_3' => 'normal', 'arptemplate_5' => 'normal', 'arptemplate_7' => 'normal', 'arptemplate_8' => 'normal', 'arptemplate_11' => 'normal', 'arptemplate_10' => 'normal', 'arptemplate_6' => 'normal', 'arptemplate_2' => 'normal', 'arptemplate_9' => 'normal', 'arptemplate_13' => 'normal', 'arptemplate_15' => 'normal', 'arptemplate_14' => 'normal', 'arptemplate_16' => 'normal', 'arptemplate_20' => 'normal', 'arptemplate_21' => 'normal', 'arptemplate_22' => 'normal', 'arptemplate_23' => 'normal', 'arptemplate_24' => 'normal', 'arptemplate_25' => 'normal', 'arptemplate_26' => 'normal'),
                    'features' => array(
                        'arptemplate_1' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1),
                        'arptemplate_2' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'rounded_border', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top', 'tooltip_style' => 'style_2', 'second_btn' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1),
                        'arptemplate_3' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'position_4', 'caption_style' => 'default', 'amount_style' => 'style_3', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'style_3', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1),
                        'arptemplate_4' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1),
                        'arptemplate_5' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'none', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => true, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1),
                        'arptemplate_6' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'style_1', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1),
                        'arptemplate_7' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'position_1', 'caption_style' => 'none', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'style_3', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'position_1', 'tooltip_position' => 'top-left', 'tooltip_style' => 'style_1', 'second_btn' => false, 'additional_shortcode' => true, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1),
                        'arptemplate_8' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'position_2', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'center', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'rounded_corner', 'header_shortcode_position' => 'position_1', 'tooltip_position' => 'top', 'tooltip_style' => 'style_2', 'second_btn' => false, 'additional_shortcode' => true, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1),
                        'arptemplate_9' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1),
                        'arptemplate_10' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'position_3', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1),
                        'arptemplate_11' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'position_1', 'caption_style' => 'none', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'style_4', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1),
                        'arptemplate_12' => array('column_description' => 'enable', 'custom_ribbon' => 'enable', 'button_position' => 'position_1', 'caption_style' => 'default', 'amount_style' => 'style_1', 'list_alignment' => 'default', 'ribbon_type' => 'custom_style_1', 'column_description_style' => 'style_2', 'caption_title' => 'style_1', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1),
                        'arptemplate_13' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'after_button', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 1, 'has_footer_content' => 0, 'button_border_customization' => 1),
                        'arptemplate_14' => array('column_description' => 'disable', 'custom_ribbon' => 'enable', 'button_position' => 'position_1', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'custom_style_2', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 1, 'has_footer_content' => 0, 'button_border_customization' => 1),
                        'arptemplate_15' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 1, 'has_footer_content' => 0, 'button_border_customization' => 1),
                        'arptemplate_16' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'style_1', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 1, 'has_footer_content' => 0, 'button_border_customization' => 1),
                        'arptemplate_20' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'none', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1),
                        'arptemplate_21' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1),
                        'arptemplate_22' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top', 'tooltip_style' => 'style_2', 'second_btn' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1),
                        'arptemplate_23' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'none', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'style_4', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 0, 'button_border_customization' => 1),
                        'arptemplate_24' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'none', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'additional_shortcode' => false, 'is_animated' => 0, 'has_footer_content' => 1, 'button_border_customization' => 1),
                        'arptemplate_25' => array('column_description' => 'enable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'after_button', 'caption_title' => 'default', 'header_shortcode_type' => 'normal', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top-left', 'tooltip_style' => 'default', 'second_btn' => false, 'button_border_customization' => 1),
                        'arptemplate_26' => array('column_description' => 'disable', 'custom_ribbon' => 'disable', 'button_position' => 'default', 'caption_style' => 'default', 'amount_style' => 'default', 'list_alignment' => 'default', 'ribbon_type' => 'default', 'column_description_style' => 'default', 'caption_title' => 'default', 'header_shortcode_type' => 'rounded_border', 'header_shortcode_position' => 'default', 'tooltip_position' => 'top', 'tooltip_style' => 'style_2', 'second_btn' => false, 'is_animated' => 0, 'button_border_customization' => 1)
                    ),
                    'arp_ribbons' => array('arp_ribbon_1' => 'Ribbon Style 1', 'arp_ribbon_2' => 'Ribbon Style 2', 'arp_ribbon_3' => 'Ribbon Style 3', 'arp_ribbon_4' => 'Ribbon Style 4', 'arp_ribbon_5' => 'Ribbon Style 5', 'arp_ribbon_6' => 'Custom Ribbon'),
                    'arp_template_ribbons' => array(
                        'arptemplate_1' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_2' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_3' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_4' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_5' => array('arp_ribbon_2', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_6' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_7' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_6'),
                        'arptemplate_8' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_9' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_6'),
                        'arptemplate_10' => array('arp_ribbon_2', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_11' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_12' => array('arp_ribbon_2', 'arp_ribbon_4'),
                        'arptemplate_13' => array('arp_ribbon_2', 'arp_ribbon_4'),
                        'arptemplate_14' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_15' => array('arp_ribbon_2', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_16' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_20' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_21' => array('arp_ribbon_2', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_22' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_23' => array(),
                        'arptemplate_24' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_5', 'arp_ribbon_6'),
                        'arptemplate_25' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_6'),
                        'arptemplate_26' => array('arp_ribbon_1', 'arp_ribbon_2', 'arp_ribbon_3', 'arp_ribbon_4', 'arp_ribbon_6'),
                    ),
                    'arp_tablet_view_width' => array(
                        'arptemplate_1' => '19.5',
                        'arptemplate_2' => '23',
                        'arptemplate_3' => '23',
                        'arptemplate_4' => '19.5',
                        'arptemplate_5' => '23.5',
                        'arptemplate_6' => '19',
                        'arptemplate_7' => '23',
                        'arptemplate_8' => '23',
                        'arptemplate_9' => '19',
                        'arptemplate_10' => '23',
                        'arptemplate_11' => '23',
                        'arptemplate_12' => '32',
                        'arptemplate_13' => '23',
                        'arptemplate_14' => '23',
                        'arptemplate_15' => '23',
                        'arptemplate_16' => '23',
                        'arptemplate_20' => '19.5',
                        'arptemplate_21' => '23',
                        'arptemplate_22' => '23',
                        'arptemplate_23' => '23',
                        'arptemplate_24' => '23',
                        'arptemplate_25' => '23',
                        'arptemplate_26' => '23',
                    )
                ),
                'arp_basic_colors' => array('#ff7525', '#ffcf33', '#e3e500', '#00d2d7', '#4fe3fe', '#ff67b4', '#c96098', '#ff1515', '#ffcea6', '#ffc22f', '#dbd423', '#0bc124', '#00e430', '#00a9ff', '#a1bed6', '#006be1', '#90d73d', '#00825f', '#04d2ab', '#ff5c77', '#6951ff', '#ac3f07', '#b5fe01', '#666666', '#ffe217', '#5d9cec', '#bbea8a', '#496b90', '#9943d8', '#d6a153', '#bd0101', '#0385a0', '#45487d', '#8d5d17', '#f2f2f2', '#514e4e'),
                'arp_basic_colors_gradient' => array('#d24c00', '#c99a00', '#8aa301', '#00a5a9', '#46aec1', '#ce0f70', '#7b164c', '#c80202', '#d47f46', '#f48a00', '#876705', '#006400', '#00951f', '#0182c4', '#5f7c97', '#003a7a', '#145502', '#003f32', '#16a086', '#a0132a', '#2105cc', '#5e1d0b', '#699001', '#3c3c3c', '#c09505', '#3a72b9', '#699f2f', '#1e2a36', '#531084', '#8f6229', '#590101', '#02414e', '#151845', '#633b00', '#c0c0c0', '#0c0b0b'),
                'arp_ribbon_border_color' => array('#f1732b', '#f1732b', '#a0b419', '#00b3b8', '#33a0b4', '#dc2783', '#a33c73', '#ff1515', '#ed9e67', '#ed9e67', '#b3a015', '#07a318', '#00af25', '#0095e0', '#809cb6', '#0052ab', '#559921', '#003f32', '#14a68a', '#d73b54', '#472de7', '#7f2b09', '#8dc401', '#4e4e4e', '#d3ac07', '#4680ca', '#7cb144', '#2b3e52', '#6d23a4', '#aa7a39', '#650101', '#035a6d', '#272a5a', '#714608', '#b5b5b5', '#1a1818'),
                'fontoption' => array(
                    'header_fonts' => array('font_family' => 'Arial', 'font_size' => '32', 'font_color' => '#ffffff', 'font_style' => 'normal'),
                    'price_fonts' => array('font_family' => 'Arial', 'font_size' => '16', 'font_color' => '#ffffff', 'font_style' => 'normal'),
                    'price_text_fonts' => array('font_family' => 'Arial', 'font_size' => '16', 'font_color' => '#ffffff', 'font_style' => 'normal'),
                    'content_fonts' => array('font_family' => 'Arial', 'font_size' => '12', 'font_color' => '#364762', 'font_style' => 'bold'),
                    'button_fonts' => array('font_family' => 'Arial', 'font_size' => '14', 'font_color' => '#ffffff', 'font_style' => 'bold')
                ),
                'column_animation' => array(
                    'is_enable' => 0,
                    'visible_column_count' => 2,
                    'columns_to_scroll' => 2,
                    'is_navigation' => 1,
                    'autoplay' => 1,
                    'sliding_effect' => array('slide', 'fade', 'crossfade', 'directscroll', 'cover', 'uncover'),
                    'sliding_transition_speed' => 750,
                    'navigation_style' => array('arp_nav_style_1', 'arp_nav_style_2'),
                    'pagination' => 1,
                    'pagination_style' => array('arp_paging_style_1', 'arp_paging_style_2'),
                    'pagination_position' => array('Top', 'Bottom', 'Both'),
                    'easing_effect' => array('swing', 'linear', 'cubic', 'elastic', 'quadratic'),
                    'infinite' => 1,
                    'sticky_caption' => 0,
                    'pagi_nav_btns' => array('pagination_top' => 'Top', 'pagination_bottom' => 'Bottom', 'none' => 'Off'),
                    'navi_nav_btns' => array('navigation' => 'On', 'none' => 'Off'),
                    'def_pagin_nav' => 'both'
                /* 'hide_caption' => 1, */
                ),
                'is_spacebetweencolumns' => 'no',
                'spacebetweencolumns' => '0px',
                'tooltipsetting' => array(
                    'width' => '0',
                    'background_color' => '#000000',
                    'text_color' => '#FFFFFF',
                    'animation' => array('grow', 'fade', 'swing', 'slide', 'fall'),
                    'position' => array('top', 'bottom', 'left', 'right'),
                    'style' => array('normal', 'alert', 'glass'/* ,'drop' */),
                    'trigger_on' => array('hover', 'click'),
                    'tooltip_display_style' => array('default', 'informative'),
                    'informative_tootip_icon' => array('<i class="fa fa-info-circle fa-tp"></i>'),
                    'icon_position' => array('float_to_content' => 'Float to Content', 'right_align' => 'Right Align'),
                ),
                'is_responsive' => 1,
                'hide_caption_column' => 0,
                //'highlightcolumnonhover' => array('Hover Effect', 'Shadow Effect', 'Pulse', 'Shake', 'Swing', 'Flip', 'Bob', 'Hang', 'Wobble', 'None'),
                'highlightcolumnonhover' => array(
                    'hover_effect' => 'Hover Effect',
                    'shadow_effect' => 'Shadow effect',
                    'arp-pulse' => 'Pulse',
                    'arp-shake' => 'Shake',
                    'arp-swing' => 'Swing',
                    'arp-hang' => 'Hang',
                    'arp-wobble-horizontal' => 'Wobble',
                    'no_effect' => 'None'
                ),
                'button_settings' => array(
                    'button_shadow_color' => '#FFFFFF',
                    'button_radius' => 0
                ),
                'column_opacity' => array(1, 0.90, 0.80, 0.70, 0.60, 0.50, 0.40, 0.30, 0.20, 0.10),
                'wrapper_width' => '1000',
                'wrapper_width_style' => array('px', '%'),
                'default_column_radius_value' => array(
                    'arptemplate_1' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_2' => array('top_left' => 7, 'top_right' => 7, 'bottom_right' => 7, 'bottom_left' => 7),
                    'arptemplate_3' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_4' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_5' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_6' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_7' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_8' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_9' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_10' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_11' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_12' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_13' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_14' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_15' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_16' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_20' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 6, 'bottom_left' => 6),
                    'arptemplate_21' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_22' => array('top_left' => 4, 'top_right' => 4, 'bottom_right' => 4, 'bottom_left' => 4),
                    'arptemplate_23' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_24' => array('top_left' => 0, 'top_right' => 0, 'bottom_right' => 0, 'bottom_left' => 0),
                    'arptemplate_25' => array('top_left' => 8, 'top_right' => 8, 'bottom_right' => 8, 'bottom_left' => 8),
                    'arptemplate_26' => array('top_left' => 15, 'top_right' => 15, 'bottom_right' => 15, 'bottom_left' => 15),
                ),
                'footer_content_position' => array('Below Button', 'Above Button'),
                'column_box_shadow_effect' => array('shadow_style_none' => 'None', 'shadow_style_1' => 'Style1', 'shadow_style_2' => 'Style2', 'shadow_style_3' => 'Style3', 'shadow_style_4' => 'Style4', 'shadow_style_5' => 'Style5'),
                'arp_color_skin_template_types' => array(
                    'type_1' => array('arptemplate_1', 'arptemplate_8', 'arptemplate_2', 'arptemplate_5', 'arptemplate_4', 'arptemplate_9', 'arptemplate_6', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25', 'arptemplate_26'),
                    'type_2' => array('arptemplate_3', 'arptemplate_7', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_17', 'arptemplate_20'),
                    'type_3' => array('arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16'),
                    'type_4' => array('arptemplate_6')
                ),
                'template_bg_section_classes' => array(
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
                            'button_section' => 'bestPlanButton',
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
                            'column_section' => '.arp_column_content_wrapper',
                            'button_section' => 'bestPlanButton'
                        )
                    ),
                    'arptemplate_3' => array('caption_column' => array(),
                        'other_column' => array(
                            'header_section' => 'arppricetablecolumntitle',
//							'pricing_section' => 'arppricetablecolumnprice',
                            'desc_selection' => 'column_description',
                            'button_section' => 'bestPlanButton',
                            'pricing_section' => 'arppricetablecolumnprice',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        )
                    ),
                    'arptemplate_4' => array('caption_column' => array(
//                            'header_section' => 'arpcaptiontitle',
                            'header_section' => 'arpcolumnheader',
                            'footer_section' => 'arpcolumnfooter',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        ),
                        'other_column' => array(
                            'header_section' => 'arpcolumnheader',
                            //'pricing_section' => 'arppricetablecolumnprice',
                            'desc_selection' => 'column_description',
                            'button_section' => 'bestPlanButton',
                            'footer_section' => 'arpcolumnfooter',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        )
                    ),
                    'arptemplate_5' => array('caption_column' => array(
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        ),
                        'other_column' => array(
                            'header_section' => 'arpcolumnheader',
                            'pricing_section' => 'arppricetablecolumnprice',
                            'button_section' => 'bestPlanButton',
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
                            'button_section' => 'bestPlanButton',
                            'footer_section' => 'arpcolumnfooter',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        )
                    ),
                    'arptemplate_7' => array(
                        'caption_column' => array(),
                        'other_column' => array(
                            'header_section' => 'arppricetablecolumntitle',
                            'button_section' => 'bestPlanButton',
                            'desc_selection' => 'column_description,arppricetablecolumnprice',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        )
                    ),
                    'arptemplate_8' => array('caption_column' => array(
                            'footer_section' => 'arpcolumnfooter',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        ),
                        'other_column' => array(
                            'header_section' => 'arpcolumnheader',
                            'button_section' => 'bestPlanButton',
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
                            'column_section' => '.arp_column_content_wrapper',
                            'button_section' => 'bestPlanButton'
                        )
                    ),
                    'arptemplate_10' => array('caption_column' => array(
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
                            'button_section' => 'bestPlanButton',
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
                            'button_section' => 'bestPlanButton',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        ),
                    ),
                    'arptemplate_12' => array(
                        'caption_column' => array(
                            'header_section' => 'arpcaptiontitle',
//                            'footer_section' => 'arpcolumnfooter',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        ),
                        'other_column' => array(
                            'header_section' => 'arppricetablecolumntitle',
                            'pricing_section' => 'arppricetablecolumnprice',
                            'button_section' => 'bestPlanButton',
//                            'footer_section' => 'arpcolumnfooter',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        )
                    ),
                    'arptemplate_13' => array(
                        'caption_columns' => array(),
                        'other_column' => array(
                            'column_section' => '.arpplan',
                            'pricing_section' => 'arppricetablecolumnprice',
                            'button_section' => 'bestPlanButton',
                        )
                    ),
                    'arptemplate_14' => array(
                        'caption_columns' => array(),
                        'other_column' => array(
                            'button_section' => 'bestPlanButton'
                        )
                    ),
                    'arptemplate_15' => array(
                        'caption_columns' => array(),
                        'other_column' => array(
                            'pricing_section' => 'arppricetablecolumnprice',
                            'button_section' => 'bestPlanButton',
                        )
                    ),
                    'arptemplate_16' => array(
                        'caption_columns' => array(),
                        'other_column' => array(
                            'button_section' => 'bestPlanButton',
                        )
                    ),
                    'arptemplate_20' => array('caption_column' => array(),
                        'other_column' => array(
                            'header_section' => 'arppricetablecolumntitle',
                            'column_section' => '.arp_column_content_wrapper',
                            'button_section' => 'bestPlanButton',
                        )
                    ),
                    'arptemplate_21' => array(
                        'caption_column' => array(),
                        'other_column' => array(
                            'column_section' => '.arppricetablecolumntitle,.arppricetablecolumnprice,.arppricingtablebodycontent',
                            'button_section' => 'bestPlanButton'
                        )
                    ),
                    'arptemplate_22' => array(
                        'caption_column' => array(),
                        'other_column' => array(
                            'column_section' => '.arp_column_content_wrapper',
                            'pricing_section' => 'arppricetablecolumnprice',
                            'button_section' => 'bestPlanButton',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        )
                    ),
                    'arptemplate_23' => array(
                        'caption_column' => array(),
                        'other_column' => array(
                            'column_section' => '.arp_column_content_wrapper::after',
                            'pricing_section' => 'arp_price_wrapper',
                            'button_section' => 'bestPlanButton'
                        )
                    ),
                    'arptemplate_24' => array(
                        'caption_column' => array(),
                        'other_column' => array(
                            'column_section' => '.arp_column_content_wrapper',
                            'button_section' => 'bestPlanButton'
                        )
                    ),
                    'arptemplate_25' => array(
                        'caption_column' => array(),
                        'other_column' => array(
                            'column_section' => '.arppricingtablebodycontent',
                            'header_section' => 'arppricetablecolumntitle',
                            'button_section' => 'bestPlanButton',
                            'desc_selection' => 'column_description',
                            'body_section' => array(
                                'odd_row' => 'arp_odd_row',
                                'even_row' => 'arp_even_row'
                            )
                        )
                    ),
                    'arptemplate_26' => array(
                        'caption_column' => array(),
                        'other_column' => array(
                            'header_section' => 'arppricetablecolumntitle,rounded_corder',
                            'column_section' => '.arp_column_content_wrapper',
                            'button_section' => 'bestPlanButton'
                        )
                    ),
                ),
                'template_border_color' => array(
                    'arptemplate_1' => array(
                        'caption_column' => array(
                            'border_color' => '#E3E3E3',
                        ),
                    ),
                    'arptemplate_5' => array(
                        'caption_column' => array(
                            'border_color' => '#f4f4f4',
                        ),
                    ),
                    'arptemplate_6' => array(
                        'caption_column' => array(
                            'border_class' => 'arpcaptiontitle',
                            'border_color' => '#cccccc',
                        ),
                    ),
                ),
            )
        ));
        return $arpoptionsarr;
    }

    /* Setting Default Options */

    function arp_columnoptions() {
        $arptempbutoptionsarr = apply_filters('arp_pricing_table_available_column_settings', array(
            'column_options' => array('width' => 'auto', 'alignment' => array('left', 'center', 'right'), 'column_highlight' => 0, 'show_column' => 1, 'ribbon_icon' => array(), 'ribbon_position' => array('left', 'right')),
            'header_options' => array(
                'column_title' => '',
                'price' => '',
                'html_content' => '',
                'html_shortcode_options' => array(
                    'image' => array('image' => __('Image', ARP_PT_TXTDOMAIN)),
                    'video' => array(
                        'youtube' => __('Youtube video', ARP_PT_TXTDOMAIN),
                        'vimeo' => __('Vimeo Video', ARP_PT_TXTDOMAIN),
                        'video' => __('html5 Video', ARP_PT_TXTDOMAIN),
                        'dailymotion' => __('Dailymotion Video', ARP_PT_TXTDOMAIN),
                        'metacafe' => __('Metacafe Video', ARP_PT_TXTDOMAIN),
                    ),
                    'audio' => array(
                        'audio' => __('html5 Audio', ARP_PT_TXTDOMAIN),
                        'soundcloud' => __('Soundcloud Audio', ARP_PT_TXTDOMAIN),
                        'mixcloud' => __('Mixcloud Audio', ARP_PT_TXTDOMAIN),
                        'beatport' => __('Beatport Audio', ARP_PT_TXTDOMAIN),
                    ),
                    'other' => array(
                        'googlemap' => __('Google Map', ARP_PT_TXTDOMAIN),
                        'embed' => __('Embed Block', ARP_PT_TXTDOMAIN),
                    ),
                ),
                'image_shortcode_options' => array(
                    'url' => __('Image URL', ARP_PT_TXTDOMAIN),
                    'height' => __('Height', ARP_PT_TXTDOMAIN),
                    'width' => __('Width', ARP_PT_TXTDOMAIN),
                ),
                'youtube_shortcode_options' => array(
                    'id' => __('Video id', ARP_PT_TXTDOMAIN),
                    'height' => __('Height', ARP_PT_TXTDOMAIN),
                    'autoplay' => __('Autoplay', ARP_PT_TXTDOMAIN),
                ),
                'vimeo_shortcode_options' => array(
                    'id' => __('Video id', ARP_PT_TXTDOMAIN),
                    'height' => __('Height', ARP_PT_TXTDOMAIN),
                    'autoplay' => __('Autoplay', ARP_PT_TXTDOMAIN),
                ),
                'screenr_shortcode_options' => array(
                    'id' => __('Video id', ARP_PT_TXTDOMAIN),
                    'height' => __('Height', ARP_PT_TXTDOMAIN),
                ),
                'video_shortcode_options' => array(
                    'mp4' => __('MP4 source', ARP_PT_TXTDOMAIN),
                    'webm' => __('Webm source', ARP_PT_TXTDOMAIN),
                    'ogg' => __('Ogg source', ARP_PT_TXTDOMAIN),
                    'poster' => __('Poster image source', ARP_PT_TXTDOMAIN),
                    'autoplay' => __('Autoplay', ARP_PT_TXTDOMAIN),
                    'loop' => __('Loop', ARP_PT_TXTDOMAIN),
                ),
                'audio_shortcode_options' => array(
                    'autoplay' => __('Autoplay', ARP_PT_TXTDOMAIN),
                    'loop' => __('Loop', ARP_PT_TXTDOMAIN),
                    'mp3' => __('MP3 source', ARP_PT_TXTDOMAIN),
                    'ogg' => __('Ogg source', ARP_PT_TXTDOMAIN),
                    'wav' => __('Wav source', ARP_PT_TXTDOMAIN),
                ),
                'googlemap_shortcode_options' => array(
                    'address' => __('Address', ARP_PT_TXTDOMAIN),
                    'height' => __('Height', ARP_PT_TXTDOMAIN),
                    'zoom_level' => __('Zoom level', ARP_PT_TXTDOMAIN),
                    'marker_image' => __('Marker image source', ARP_PT_TXTDOMAIN),
                    'mapinfo_title' => __('Marker title', ARP_PT_TXTDOMAIN),
                    'mapinfo_content' => __('Map info window content', ARP_PT_TXTDOMAIN),
                    'mapinfo_show_default' => __('Info window by default?', ARP_PT_TXTDOMAIN),
                ),
                'dailymotion_shortcode_options' => array(
                    'id' => __('Video id', ARP_PT_TXTDOMAIN),
                    'height' => __('Height', ARP_PT_TXTDOMAIN),
                    'autoplay' => __('Autoplay', ARP_PT_TXTDOMAIN),
                ),
                'metacafe_shortcode_options' => array(
                    'id' => __('Video id', ARP_PT_TXTDOMAIN),
                    'height' => __('Height', ARP_PT_TXTDOMAIN),
                    'autoplay' => __('Autoplay', ARP_PT_TXTDOMAIN),
                ),
                'soundcloud_shortcode_options' => array(
                    'id' => __('Track id', ARP_PT_TXTDOMAIN),
                    'height' => __('Height', ARP_PT_TXTDOMAIN),
                    'autoplay' => __('Autoplay', ARP_PT_TXTDOMAIN),
                ),
                'mixcloud_shortcode_options' => array(
                    'url' => __('Track url', ARP_PT_TXTDOMAIN),
                    'height' => __('Height', ARP_PT_TXTDOMAIN),
                    'autoplay' => __('Autoplay', ARP_PT_TXTDOMAIN),
                ),
                'beatport_shortcode_options' => array(
                    'id' => __('Track id', ARP_PT_TXTDOMAIN),
                    'height' => __('Height', ARP_PT_TXTDOMAIN),
                    'autoplay' => __('Autoplay', ARP_PT_TXTDOMAIN),
                ),
                'embed_shortcode_options' => array(
                    'id' => __('Embed', ARP_PT_TXTDOMAIN),
                /* 'height' 	=> __('Height', ARP_PT_TXTDOMAIN) */
                ),
            ),
            'column_body_options' => array('body_description' => '', 'description_shortcode_options' => array('icons', 'icon_alignment'), 'icon_shortcode_options' => array(), 'description_alignment' => 'center', 'tooltip_text' => ''),
            'column_button_options' => array(
                'button_size' => array(
                    'small' => __('Small', ARP_PT_TXTDOMAIN),
                    'medium' => __('Medium', ARP_PT_TXTDOMAIN),
                    'large' => __('Large', ARP_PT_TXTDOMAIN),
                ),
                'button_type' => array(
                    'button' => __('Button', ARP_PT_TXTDOMAIN),
                    'submit_button' => __('Submit', ARP_PT_TXTDOMAIN),
                ),
                'button_text' => '',
                'button_icon' => array(),
                'button_link' => '',
                'open_link_in_new_window' => '0',
                'button_custom_image' => ''
            ),
        ));

        return $arptempbutoptionsarr;
    }

    /* Setting Template Button Options for Pricing table */

    function arp_tempbuttonsoptions() {
        $rpttempbutoptionsarr = apply_filters('arp_pricing_table_available_column_button_settings', array(
            'template_button_options' => array(
                'features' => array(
                    'arptemplate_1' => array('column_level_options' => array('caption_column_buttons' => array(
                                'column_level_options__button_1' => array('column_width', 'caption_border', 'caption_row_border', 'set_hidden', 'column_level_caption_arp_ok_div__button_1'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_footer_color_div', 'footer_background_color_div', 'footer_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_background_color_div', 'footer_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'column_level_other_arp_ok_div__button_2', 'arp_border_color_div', 'arp_border_color_div_sub', 'row_border_color_div', 'column_border_color_div'),
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_background_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_background_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_background_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_background_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_text_alignment', 'header_caption_background_color', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'arp_object', 'arp_fontawesome', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size','button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' => array(
                            'caption_column_buttons' => array('footer_level_options__button_1' => array('footer_text', 'footer_text_alignment', 'footer_level_options_font_family', 'footer_level_options_background', 'footer_level_options_font_size', 'footer_level_options_font_style', 'footer_level_options_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_4' => array('column_level_options' => array('caption_column_buttons' => array(
                                'column_level_options__button_1' => array('column_width', 'caption_border', 'caption_row_border', 'set_hidden', 'column_level_caption_arp_ok_div__button_1'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_footer_color_div', 'footer_font_color_div', 'arp_body_background_color_div', 'footer_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'column_level_other_arp_ok_div__button_2', 'arp_border_color_div', 'arp_border_color_div_sub', 'row_border_color_div', 'column_border_color_div'),
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_background_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_background_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'price_hover_background_color_div', 'price_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_text_alignment', 'header_caption_background_color', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'arp_fontawesome', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'arp_shortcode_customization_size_div', 'arp_shortcode_customization_style_div', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_alternate_bgcolor', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_background_color', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array('footer_level_options__button_1' => array('footer_text', 'footer_text_alignment', 'footer_level_options_font_family', 'footer_level_options_font_size', 'footer_level_options_font_style', 'footer_level_options_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_12' => array('column_level_options' => array('caption_column_buttons' => array(
                                'column_level_options__button_1' => array('column_width', 'set_hidden', 'column_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_caption_font_family', 'header_caption_background_color', 'header_other_hover_background_color', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'arp_fontawesome', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                                'pricing_level_options__button_2' => array('price_label', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_2'),
                                'pricing_level_options__button_3' => array('column_description', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_alternate_bgcolor', 'body_li_other_alternate_hover_bgcolor', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_3' => array('column_level_options' => array('caption_column_buttons' => array(
                                'column_level_options__button_1' => array('column_width', 'set_hidden', 'column_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'is_post_variable', 'post_variables_content', 'select_ribbon', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_background_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_background_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'arp_desc_color_div', 'desc_background_color_div', 'desc_font_color_div', 'arp_desc_hover_color_div', 'desc_hover_background_color_div', 'desc_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_background_color', 'button_other_hover_background_color', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array('footer_level_options__button_1' => array('footer_text', 'footer_level_options_background', 'footer_level_options_font_family', 'footer_level_options_font_size', 'footer_level_options_font_style', 'footer_level_options_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'column_description_level' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_description_level__button_1' => array('column_description', 'arp_object', 'arp_fontawesome', 'column_description_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                    ),
                    'arptemplate_5' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_width', 'column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'arp_price_color_div', 'price_background_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_background_color_div', 'price_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                                'header_level_options__button_3' => array('additional_shortcode', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_7' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'arp_desc_color_div', 'desc_background_color_div', 'desc_font_color_div', 'arp_desc_hover_color_div', 'desc_hover_background_color_div', 'desc_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                                'header_level_options__button_3' => array('additional_shortcode', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'column_description_level' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_description_level__button_1' => array('column_description', 'arp_fontawesome', 'column_description_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                    ),
                    'arptemplate_8' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'arp_shortcode_div', 'arp_shortcode_background', 'arp_shortcode_font_color', 'arp_shortcode_hover_div', 'arp_shortcode_hover_background', 'arp_shortcode_hover_font_color', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                                'header_level_options__button_3' => array('additional_shortcode', 'arp_object', 'arp_fontawesome', 'arp_shortcode_customization_style_div', 'arp_shortcode_customization_size_div', 'header_level_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_background_color', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_11' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'arp_desc_color_div', 'desc_background_color_div', 'desc_font_color_div', 'arp_desc_hover_color_div', 'desc_hover_background_color_div', 'desc_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'column_description_level' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_description_level__button_1' => array('column_description', 'arp_fontawesome', 'column_description_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_10' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'is_post_variable', 'post_variables_content', 'select_ribbon', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_background_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_background_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'arp_desc_color_div', 'desc_background_color_div', 'desc_font_color_div', 'arp_desc_hover_color_div', 'desc_hover_background_color_div', 'desc_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_text_alignment', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'column_description_level' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_description_level__button_1' => array('column_description', 'arp_object', 'arp_fontawesome', 'column_description_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array(),
                            ),
                            'other_columns_buttons' => array(
                            ),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' =>
                            array('body_li_level_options__button_1' =>
                                array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'), 'body_li_level_options__button_2' => array('tooltip', 'body_li_level_caption_arp_ok_div__button_2'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_6' => array('column_level_options' => array('caption_column_buttons' => array(
                                'column_level_options__button_1' => array('column_width', 'caption_border', 'caption_row_border', 'set_hidden', 'column_level_caption_arp_ok_div__button_1'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'arp_footer_color_div', 'footer_background_color_div', 'footer_font_color_div', 'column_level_other_arp_ok_div__button_2', 'arp_border_color_div', 'arp_border_color_div_sub', 'row_border_color_div', 'column_border_color_div'),
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_background_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_background_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_background_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_background_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_background_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_background_color_div', 'even_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_text_alignment', 'header_caption_background_color', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'arp_object', 'arp_fontawesome', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_object', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_alternate_bgcolor', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                            ),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_background_color', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array('footer_level_options__button_1' => array('footer_text', 'footer_text_alignment', 'footer_level_options_font_family', 'footer_level_options_background', 'footer_level_options_font_size', 'footer_level_options_font_style', 'footer_level_options_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_2' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_shortcode_div', 'arp_shortcode_background', 'arp_shortcode_font_color', 'arp_shortcode_hover_div', 'arp_shortcode_hover_background', 'arp_shortcode_hover_font_color', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                                'header_level_options__button_3' => array('additional_shortcode', 'arp_object', 'arp_fontawesome', 'arp_shortcode_customization_style_div', 'arp_shortcode_customization_size_div', 'header_level_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                            ),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_background_color', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_9' => array('column_level_options' => array('caption_column_buttons' => array(
                                'column_level_options__button_1' => array('column_width', 'caption_border', 'caption_row_border', 'set_hidden', 'select_ribbon', 'column_level_caption_arp_ok_div__button_1'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_background_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_background_color_div', 'even_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'column_level_other_arp_ok_div__button_2', 'arp_border_color_div', 'arp_border_color_div_sub', 'row_border_color_div', 'column_border_color_div'),
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'is_post_variable', 'post_variables_content', 'select_ribbon', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_text_alignment', 'header_caption_background_color', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'arp_object', 'arp_fontawesome', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_object', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_alternate_bgcolor', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                            ),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_background_color', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_13' => array('column_level_options' => array('caption_column_buttons' => array(
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_background_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_background_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_desc_color_div', 'desc_font_color_div', 'arp_desc_hover_color_div', 'desc_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_object', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'column_description_level' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_description_level__button_1' => array('column_description', 'arp_fontawesome', 'column_description_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                    ),
                    'arptemplate_15' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_background_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_background_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_object', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_14' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_text_alignment', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_16' => array('column_level_options' => array('caption_column_buttons' => array(
                            ),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'header_text_alignment', 'header_caption_font_family', 'header_caption_font_size', 'header_caption_font_style', 'header_caption_font_color', 'header_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_object', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(
                                'body_level_options__button_1' => array('text_alignment', 'body_li_caption_font_family', 'body_li_caption_font_size', 'body_li_caption_font_style', 'body_level_caption_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_caption_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_caption_arp_ok_div__button_2'),
                            ),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    //'column_description_level' => array('caption_column_buttons' => array(),
                    //     'other_columns_buttons' => array(
                    //       'column_description_level__button_1' => array('column_description', 'column_description_other_font_family', 'column_description_other_font_size', 'column_description_other_font_style', 'column_description_other_font_color', 'arp_fontawesome', 'column_description_level_other_arp_ok_div__button_1'),
                    //    ),
                    // ),
                    ),
                    'arptemplate_20' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_background_color', 'button_other_hover_background_color', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                //'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_font_family', 'footer_level_options_font_size', 'footer_level_options_font_style', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_21' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'is_column_clickable_wrapper', 'column_background', 'column_hover_background', 'column_level_other_arp_ok_div__button_1', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                            )
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_background_color', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_22' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'even_hover_background_color_div', 'odd_hover_background_color_div', 'odd_background_color_div', 'even_background_color_div', 'price_hover_background_color_div', 'price_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_background_color', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array('footer_level_options__button_1' => array('footer_text', 'footer_text_alignment', 'footer_level_options_font_family', 'footer_level_options_font_size', 'footer_level_options_font_style', 'footer_level_options_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_23' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'price_background_color_div', 'price_hover_background_color_div', 'arp_desc_color_div', 'desc_font_color_div',
                                    'arp_desc_hover_color_div', 'desc_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'column_description_level' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_description_level__button_1' => array('column_description', 'arp_fontawesome', 'column_description_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_background_color', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array('footer_level_options__button_1' => array('footer_text', 'footer_level_options_font_family', 'footer_level_options_font_size', 'footer_level_options_font_style', 'footer_level_options_arp_ok_div__button_1'),
                            ),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_24' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_font_color_div', 'arp_price_color_div', 'price_font_color_div', 'arp_price_hover_color_div', 'price_hover_font_color_div', 'arp_footer_color_div', 'footer_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_footer_hover_color_div', 'footer_hover_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_object', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'pricing_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'pricing_level_options__button_1' => array('price_text', 'arp_object', 'arp_fontawesome', 'pricing_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_background_color', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' =>
                        array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_1' => array('footer_text', 'above_below_button', 'footer_level_options_arp_ok_div__button_1'),
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_size', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_25' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'is_post_variable', 'post_variables_content', 'select_ribbon', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                /* 'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_desc_color_div', 'desc_background_color_div', 'desc_font_color_div', 'arp_desc_hover_color_div', 'desc_hover_background_color_div', 'desc_hover_font_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'arp_hover_button_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'column_level_other_arp_ok_div__button_2'), */
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_desc_color_div', 'desc_background_color_div', 'desc_font_color_div', 'arp_desc_hover_color_div', 'desc_hover_background_color_div', 'desc_hover_font_color_div', 'column_level_other_arp_ok_div__button_2')
                            ),
                        ),
                        'column_description_level' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_description_level__button_1' => array('column_description', 'arp_object', 'arp_fontawesome', 'column_description_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_background_color', 'button_other_hover_background_color', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    ),
                    'arptemplate_26' => array('column_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'column_level_options__button_1' => array('column_highlight', 'set_hidden', 'column_background', 'column_hover_background', 'select_ribbon', 'is_post_variable', 'post_variables_content', 'column_level_other_arp_ok_div__button_1', 'is_column_clickable_wrapper', 'column_other_background_image'),
                                'column_level_options__button_2' => array('arp_custom_color_tab_column', 'arp_normal_custom_color_tab_column', 'arp_header_color_div', 'header_background_color_div', 'header_font_color_div', 'arp_header_hover_color_div', 'header_hover_background_color_div', 'header_hover_font_color_div', 'arp_body_background_color_div', 'arp_body_background_color_div_title', 'arp_odd_color_div', 'odd_font_color_div', 'arp_even_color_div', 'even_font_color_div', 'arp_body_hover_background_color_div', 'arp_body_hover_background_color_div_title', 'arp_odd_hover_color_div', 'odd_hover_font_color_div', 'arp_even_hover_color_div', 'even_hover_font_color_div', 'arp_column_color_div', 'column_background_color_div', 'arp_column_hover_color_div_column', 'column_hover_background_color_div', 'arp_button_color_div', 'button_background_color_div', 'button_font_color_div', 'button_hover_background_color_div', 'button_hover_font_color_div', 'arp_hover_button_color_div', 'arp_shortcode_div', 'arp_shortcode_background', 'arp_shortcode_font_color', 'arp_shortcode_hover_div', 'arp_shortcode_hover_background', 'arp_shortcode_hover_font_color', 'column_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        'header_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'header_level_options__button_1' => array('column_title', 'arp_fontawesome', 'header_level_other_arp_ok_div__button_1'),
                                'header_level_options__button_3' => array('additional_shortcode', 'arp_object', 'arp_fontawesome', 'arp_shortcode_customization_style_div', 'arp_shortcode_customization_size_div', 'header_level_other_arp_ok_div__button_3'),
                            ),
                        ),
                        'body_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(),
                        ),
                        'body_li_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'body_li_level_options__button_1' => array('body_li_add_shortcode', 'arp_object', 'description', 'body_li_level_other_arp_ok_div__button_1'),
                                'body_li_level_options__button_2' => array('tooltip', 'arp_fontawesome', 'body_li_level_other_arp_ok_div__button_2'),
                            ),
                        ),
                        /* 'button_options' => array('caption_column_buttons' => array(),
                          'other_columns_buttons' => array(
                          'button_options__button_1' => array('button_text', 'add_icon', 'button_size', 'button_other_background_color', 'button_other_font_family', 'button_other_font_size', 'button_other_font_style', 'button_other_font_color', 'button_options_other_arp_ok_div__button_1'),
                          'button_options__button_2' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                          'button_options__button_3' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                          ),
                          ), */
                        'footer_level_options' => array('caption_column_buttons' => array(),
                            'other_columns_buttons' => array(
                                'footer_level_options__button_2' => array('button_text', 'add_icon', 'button_options_other_arp_ok_div__button_1'),
                                'footer_level_options__button_3' => array('button_image', 'add_shortcode', 'button_options_other_arp_ok_div__button_2'),
                                'footer_level_options__button_4' => array('redirect_link', 'open_in_new_window', 'open_in_new_window_actual', 'external_btn', 'hide_default_btn', 'button_options_other_arp_ok_div__button_3'),
                            ),
                        ),
                    )
                ),
            )
        ));
        return $rpttempbutoptionsarr;
    }

    function arp_templatecss_info() {
        $arptempcssinfo = apply_filters('arp_pricing_table_available_css_info', array(
            'templates' => array(
                'arptemplate_1' => array(
                    'caption_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arpcaptiontitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arpcaptiontitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            __('Footer Classes || (Please use following css class if you want to add custom property on footer level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arpcolumnfooter',
                                    'note' => 'When you place properties for this class, it will apply on footer section.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arpcolumnfooter',
                                    'note' => 'It will apply on footer section when you hover on any column.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    ),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on price section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                )
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                )
                            ),
                        ),
                        'footer_level_classes' => array(
                            __('Footer Classes || (Please use following css class if you want to add custom property on footer level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => 'When you place properties for this class, it will apply on footer section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => 'It will apply on footer section when you hover on any column.'
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_2' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column wrapper.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on full column wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'shortcode_level_classes' => array(
                            __('Shortcode Level Classes || (Please use following css class if you want to add custom property on round box in header level', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_rounded_shortcode',
                                    'note' => 'When you place properties for this class, it will apply on rounded section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_rounded_shortcode',
                                    'note' => 'It will apply on rounded section when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_square_shortcode',
                                    'note' => 'When you place properties for this class, it will apply on square rounded section'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_rounded_shortcode',
                                    'note' => 'It will apply on square rounded section when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_rectangle_shortcode',
                                    'note' => 'When you place properties for this class, it will apply on rectangular rounded section'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_rectangle_shortcode',
                                    'note' => 'It will apply on rectangular rounded section when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_semiround_shortcode',
                                    'note' => 'When you place properties for this class, it will apply on semi rounded section'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_semiround_shortcode',
                                    'note' => 'It will apply on semi rounded section when you hover on any column.'
                                )
                            )
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            __('Footer Classes || (Please use following css class if you want to add custom property on footer level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => 'When you place properties for this class, it will apply on footer section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => 'It will apply on footer section when you hover on any column.'
                                ),
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                ),
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => 'It will apply on fifth ribbon style.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    ),
                ),
                'arptemplate_3' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'column_description_classes' => array(
                            __('Column Description Classes || (Please use following css class if you want to add custom property on description level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .column_description',
                                    'note' => 'When you place properties for this class, it will apply on column description.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .column_description',
                                    'note' => 'It will apply on column description when you hover on any column.'
                                )
                            )
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                )
                            ),
                        ),
                        'footer_level_classes' => array(
                            __('Footer Classes || (Please use following css class if you want to add custom property on footer level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => 'When you place properties for this class, it will apply on footer section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => 'It will apply on footer section when you hover on any column.'
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => 'It will apply on fifth ribbon style.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_4' => array(
                    'caption_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arpcolumnheader',
                                    'note' => 'When you place properties for this class, it will apply on header section.',
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arpcolumnheader',
                                    'note' => 'It will apply on header section when you hover on any column.',
                                )
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            __('Footer Classes || (Please use following css class if you want to add custom property on footer level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => 'When you place properties for this class, it will apply on footer section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => 'It will apply on footer section when you hover on any column.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    ),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            __('Footer Classes || (Please use following css class if you want to add custom property on footer level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => 'When you place properties for this class, it will apply on footer section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => 'It will apply on footer section when you hover on any column.'
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => 'It will apply on fifth ribbon style.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_5' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                ),
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_6' => array(
                    'caption_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arpcaptiontitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arpcaptiontitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            __('Footer Classes || (Please use following css class if you want to add custom property on footer level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => 'When you place properties for this class, it will apply on footer section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => 'It will apply on footer section when you hover on any column.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    ),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                ),
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will apply on price section when you hover on any column.',
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            __('Footer Classes || (Please use following css class if you want to add custom property on footer level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => 'When you place properties for this class, it will apply on footer section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => 'It will apply on footer section when you hover on any column.'
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_7' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'column_description_classes' => array(
                            __('Column Description Classes || (Please use following css class if you want to add custom property on description level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .column_description',
                                    'note' => 'When you place properties for this class, it will apply on column description.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .column_description',
                                    'note' => 'It will apply on column description when you hover on any column.'
                                ),
                            )
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_8' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                ),
                            ),
                        ),
                        'shortcode_level_classes' => array(
                            __('Shortcode Level Classes || (Please use following css class if you want to add custom property on round box in header level', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_rounded_shortcode',
                                    'note' => 'When you place properties for this class, it will apply on rounded section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_rounded_shortcode',
                                    'note' => 'It will apply on rounded section when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_square_shortcode',
                                    'note' => 'When you place properties for this class, it will apply on square rounded section'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_rounded_shortcode',
                                    'note' => 'It will apply on square rounded section when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_rectangle_shortcode',
                                    'note' => 'When you place properties for this class, it will apply on rectangular rounded section'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_rectangle_shortcode',
                                    'note' => 'It will apply on rectangular rounded section when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_semiround_shortcode',
                                    'note' => 'When you place properties for this class, it will apply on semi rounded section'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_semiround_shortcode',
                                    'note' => 'It will apply on semi rounded section when you hover on any column.'
                                )
                            )
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => 'It will apply on fifth ribbon style.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_9' => array(
                    'caption_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arpcaptiontitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arpcaptiontitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            __('Footer Classes || (Please use following css class if you want to add custom property on footer level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => 'When you place properties for this class, it will apply on footer section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => 'It will apply on footer section when you hover on any column.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    ),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                ),
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will apply on price section when you hover on any column.',
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            __('Footer Classes || (Please use following css class if you want to add custom property on footer level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => 'When you place properties for this class, it will apply on footer section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => 'It will apply on footer section when you hover on any column.'
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.'
                                ),
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_10' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpplan',
                                    'note' => 'When you place properties for this class, it will apply on column wrapper.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpplan',
                                    'note' => 'It will apply on column section when you hover on any column.'
                                )
                            ),
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                ),
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'column_description_classes' => array(
                            __('Column Description Classes || (Please use following css class if you want to add custom property on description level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .column_description',
                                    'note' => 'When you place properties for this class, it will apply on column description.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .column_description',
                                    'note' => 'It will apply on column description when you hover on any column.'
                                ),
                            )
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_11' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                ),
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'column_description_classes' => array(
                            __('Column Description Classes || (Please use following css class if you want to add custom property on description level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .column_description',
                                    'note' => 'When you place properties for this class, it will apply on column description.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .column_description',
                                    'note' => 'It will apply on column description when you hover on any column.'
                                ),
                            )
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_12' => array(
                    'caption_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arpcolumnheader',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arpcolumnheader',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            __('Footer Classes || (Please use following css class if you want to add custom property on footer level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => 'When you place properties for this class, it will apply on footer section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => 'It will apply on footer section when you hover on any column.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    ),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            __('Footer Classes || (Please use following css class if you want to add custom property on footer level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => 'When you place properties for this class, it will apply on footer section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => 'It will apply on footer section when you hover on any column.'
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_13' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'column_desc_classes' => array(
                            __('Column Description Classes || (Please use following css class if you want to add custom property on column description)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .column_description',
                                    'note' => 'When you place properties for this class, it will apply on column description.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .column_description',
                                    'note' => 'It will apply on column description when you hover on any column.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_14' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => 'It will apply on fifth ribbon style.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_15' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            __('Footer Classes || (Please use following css class if you want to add custom property on footer level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => 'When you place properties for this class, it will apply on footer section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => 'It will apply on footer section when you hover on any column.'
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        /* 'extra_level_classes' => array(
                          __('Extra Classes || ', ARP_PT_TXTDOMAIN) => array(
                          '.ArpPriceTable {arp_column_id}.ArpPricingTableColumnWrapper:not(.maincaptioncolumn) .arpplan .arp_template_rocket'
                          ),
                          ), */
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_16' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                ),
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => 'It will apply on fifth ribbon style.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_20' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column wrapper.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on full column wrapper when you hover on any column.'
                                ),
                            ),
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_21' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                ),
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will appy on price level when you hover on any column.'
                                )
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => 'It will apply on fifth ribbon style.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_22' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column section.',
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on column section when you hover on any column'
                                )
                            )
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section. eg.(Column Title : Basic)'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            __('Footer Classes || (Please use following css class if you want to add custom property on footer level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => 'When you place properties for this class, it will apply on footer section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => 'It will apply on footer section when you hover on any column.'
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_23' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column wrapper.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on full column wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_price_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_price_wrapper',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                )
                            ),
                        ),
                        'column_description_classes' => array(
                            __('Column Description Classes || (Please use following css class if you want to add custom property on description level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .column_description',
                                    'note' => 'When you place properties for this class, it will apply on column description.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .column_description',
                                    'note' => 'It will apply on column description when you hover on any column.'
                                ),
                            )
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    )
                ),
                'arptemplate_24' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column wrapper.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on full column wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'footer_level_classes' => array(
                            __('Footer Classes || (Please use following css class if you want to add custom property on footer level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arpcolumnfooter',
                                    'note' => 'When you place properties for this class, it will apply on footer section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arpcolumnfooter',
                                    'note' => 'It will apply on footer section when you hover on any column.'
                                )
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => 'It will apply on fifth ribbon style.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    ),
                ),
                'arptemplate_25' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column wrapper.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on full column wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'column_description_classes' => array(
                            __('Column Description Classes || (Please use following css class if you want to add custom property on description level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .column_description',
                                    'note' => 'When you place properties for this class, it will apply on column description.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .column_description',
                                    'note' => 'It will apply on column description when you hover on any column.'
                                ),
                            )
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => 'It will apply on fifth ribbon style.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    ),
                ),
                'arptemplate_26' => array(
                    'caption_column_css_info' => array(),
                    'other_column_css_info' => array(
                        'column_level_classes' => array(
                            __('Column Level Classes || (Please use following css class if you want to add custom property on column level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_column_content_wrapper',
                                    'note' => 'When you place properties for this class, it will apply on column wrapper.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_column_content_wrapper',
                                    'note' => 'It will apply on full column wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'header_level_classes' => array(
                            __('Header Level Classes || (Please use following css class if you want to add custom property on header level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanTitle',
                                    'note' => 'When you place properties for this class, it will apply on header section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanTitle',
                                    'note' => 'It will apply on header section when you hover on any column.'
                                )
                            ),
                        ),
                        'shortcode_level_classes' => array(
                            __('Shortcode Level Classes || (Please use following css class if you want to add custom property on round box in header level', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_rounded_shortcode',
                                    'note' => 'When you place properties for this class, it will apply on rounded section.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_rounded_shortcode',
                                    'note' => 'It will apply on rounded section when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_square_shortcode',
                                    'note' => 'When you place properties for this class, it will apply on square rounded section'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_rounded_shortcode',
                                    'note' => 'It will apply on square rounded section when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_rectangle_shortcode',
                                    'note' => 'When you place properties for this class, it will apply on rectangular rounded section'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_rectangle_shortcode',
                                    'note' => 'It will apply on rectangular rounded section when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_semiround_shortcode',
                                    'note' => 'When you place properties for this class, it will apply on semi rounded section'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arp_semiround_shortcode',
                                    'note' => 'It will apply on semi rounded section when you hover on any column.'
                                )
                            )
                        ),
                        'price_level_classes' => array(
                            __('Price Level Classes || (Please use following css class if you want to add custom property on price level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricetablecolumnprice',
                                    'note' => 'When you place properties for this class, it will apply on price level.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricetablecolumnprice',
                                    'note' => 'It will apply on price section when you hover on any column.'
                                ),
                            ),
                        ),
                        'body_level_classes' => array(
                            __('Body Level Classes || (Please use following css class if you want to add custom property on body level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arppricingtablecaptioncolumn .arppricingtablebodyoptions',
                                    'note' => 'When you place properties for this class, it will apply on row wrapper.'
                                ),
                                array(
                                    'class' => '.arppricingtablecaptioncolumn:hover .arppricingtablebodyoptions',
                                    'note' => 'It will apply on row wrapper when you hover on any column.'
                                )
                            ),
                        ),
                        'body_li_level_classes' => array(
                            __('Feature Level Classes || (Please use following css class if you want to add custom property on feature level)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arppricingtablebodyoptions li',
                                    'note' => 'When you place properties for this class, it will apply on each row.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .arppricingtablebodyoptions li',
                                    'note' => 'It will apply on each row when you hover on any column.'
                                ),
                            ),
                        ),
                        'button_level_classes' => array(
                            __('Button Classes || (Please use following css class if you want to add custom property on button)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton',
                                    'note' => 'When you place properties for this class, it will apply on button.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn:hover .bestPlanButton',
                                    'note' => 'It will apply on button when you hover on any column.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .bestPlanButton:hover',
                                    'note' => 'It will apply when you hover on any button.'
                                )
                            ),
                        ),
                        'ribbon_classes' => array(
                            __('Ribbon Classes || (Please use following css class if you want to add custom property on ribbon)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_1 .arp_ribbon_content',
                                    'note' => 'It will apply on first ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_2 .arp_ribbon_content',
                                    'note' => 'It will apply on second ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_3 .arp_ribbon_content',
                                    'note' => 'It will apply on third ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_4 .arp_ribbon_content',
                                    'note' => 'It will apply on fourth ribbon style.'
                                ),
                                array(
                                    'class' => '.arpricemaincolumn .arp_ribbon_5 .arp_ribbon_content',
                                    'note' => 'It will apply on fifth ribbon style.'
                                )
                            ),
                        ),
                        'toggle_switch_classes' => array(
                            __('Toggle Switch Classes || (Please use following css class if you want to add custom property on toggle switch)', ARP_PT_TXTDOMAIN) => array(
                                array(
                                    'class' => '.toggle_content_wrapper',
                                    'note' => 'It will apply on main wrapper of toggle switch.',
                                ),
                                array(
                                    'class' => '.toggle_content_switches',
                                    'note' => 'It will apply on button style switch of inactive tab.',
                                ),
                                array(
                                    'class' => '.button_switch_box_selected',
                                    'note' => 'It will apply on button style switch of active tab.',
                                ),
                                array(
                                    'class' => '.radio_button_box',
                                    'note' => 'It will apply on radio style switch of inactive tab.'
                                ),
                                array(
                                    'class' => '.radio_button_box.selected',
                                    'note' => 'It will apply on radio style switch of active tab.',
                                ),
                            )
                        )
                    ),
                )
            )
        ));

        return $arptempcssinfo;
    }

    /* Setting Admin CSS  */

    function set_css() {
        global $arprice_version;

        $_REQUEST['arp_action'] = isset($_REQUEST['arp_action']) ? $_REQUEST['arp_action'] : '';
        wp_register_style('arprice_admin_css', PRICINGTABLE_URL . '/css/arprice_admin.css', array(), $arprice_version);

        wp_register_style('arprice_fontawesome_css', PRICINGTABLE_URL . '/css/font-awesome.css', array(), $arprice_version);

        wp_register_style('arprice_tooltip_css', PRICINGTABLE_URL . '/css/tipso.min.css', array(), $arprice_version);

        wp_register_style('arprice_animate_css', PRICINGTABLE_URL . '/css/arprice_effects.css', array(), $arprice_version);

        wp_register_style('arprice_font_css_admin', PRICINGTABLE_URL . '/fonts/arp_fonts.css', array(), $arprice_version);

        wp_register_style('arprice_bootstrap_tour_css', PRICINGTABLE_URL . '/css/bootstrap-tour-standalone.css', array(), $arprice_version);

        wp_register_style('arp_jsgrid', PRICINGTABLE_URL . '/css/jsgrid.css', array(), $arprice_version);

        wp_register_style('arp_jsgrid_theme', PRICINGTABLE_URL . '/css/theme.css', array(), $arprice_version);

        wp_register_style('arp_daterangepicker', PRICINGTABLE_URL . '/css/daterangepicker.css', array(), $arprice_version);

        wp_register_style('arp_type_icons', PRICINGTABLE_URL . '/css/typicons.min.css', array(), $arprice_version);

        wp_register_style('arp_material_icons', PRICINGTABLE_URL . '/css/material-design-iconic-font.css', array(), $arprice_version);
//        wp_register_style('arp_material_icons', 'https://fonts.googleapis.com/icon?family=Material+Icons');

        wp_register_style('arp_ionicons_icons', PRICINGTABLE_URL . '/css/ionicons.min.css', array(), $arprice_version);

        wp_register_style('arp_codemirror_editor_css', PRICINGTABLE_URL . '/css/arprice_codemirror.css', array(), $arprice_version);


        if (isset($_REQUEST['page']) && ( $_REQUEST['page'] == 'arprice' || $_REQUEST['page'] == 'arp_add_pricing_table' || $_REQUEST['page'] == 'arp_analytics' || $_REQUEST['page'] == 'arp_import_export' || $_REQUEST['page'] == 'arp_global_settings' )) {
            if (version_compare($GLOBALS['wp_version'], '3.4', '>') and version_compare($GLOBALS['wp_version'], '3.6', '<')) {
                wp_enqueue_style('arprice_admin_css_3.5', PRICINGTABLE_URL . '/css/arprice_admin_3.5.css', array(), $arprice_version);
            } else if (version_compare($GLOBALS['wp_version'], '3.5', '>') and version_compare($GLOBALS['wp_version'], '3.8', '<')) {
                wp_enqueue_style('arprice_admin_css_3.6', PRICINGTABLE_URL . '/css/arprice_admin_3.6.css', array(), $arprice_version);
            } else if (version_compare($GLOBALS['wp_version'], '3.7', '>')) {
                wp_enqueue_style('arprice_admin_css_3.8', PRICINGTABLE_URL . '/css/arprice_admin_3.8.css', array(), $arprice_version);
            }

            if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'arprice' && $_REQUEST['arp_action'] != '') {
                wp_enqueue_style('arp_material_icons');

                wp_enqueue_style('arp_ionicons_icons');

                wp_enqueue_style('arp_type_icons');

                wp_enqueue_style('arprice_fontawesome_css');

                wp_enqueue_style('arprice_bootstrap_tour_css');
            }

            if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'arprice' && $_REQUEST['arp_action'] == '') {

                wp_enqueue_style('arp_jsgrid');

            wp_enqueue_style('arp_jsgrid_theme');

                wp_enqueue_style('arp_daterangepicker');

                wp_enqueue_style('arprice_bootstrap_tour_css');

                wp_enqueue_style('arprice_fontawesome_css');
            }

            wp_enqueue_style('arprice_admin_css');

            if (isset($_REQUEST['page']) and ( ($_REQUEST['page'] === 'arprice' && $_REQUEST['arp_action'] != '') or $_REQUEST['page'] == 'arp_global_settings' )) {
                wp_enqueue_style('arp_codemirror_editor_css');
            }

            if (isset($_REQUEST['page']) and $_REQUEST['page'] == 'arprice') {
                wp_enqueue_style('arprice_tooltip_css');

                /* wp_enqueue_style('arprice_animate_css'); */
            }
        }
    }

    /* Setting Frond CSS */

    function set_front_css() {
        global $arprice_version;
        if (!is_admin()) {
            // Common CSS
            wp_register_style('arprice_front_css', PRICINGTABLE_URL . '/css/arprice_front.css', array(), $arprice_version);

            // Tooltip CSS
            wp_register_style('arprice_front_tooltip_css', PRICINGTABLE_URL . '/css/tipso.min.css', array(), $arprice_version);

            // Animate css for tooltip
            wp_register_style('arprice_front_animate_css', PRICINGTABLE_URL . '/css/arprice_effects.css', array(), $arprice_version);

            // Font Awesome CSS
            wp_register_style('arp_fontawesome_css', PRICINGTABLE_URL . '/css/font-awesome.css', array(), $arprice_version);

            // Font CSS
            wp_register_style('arprice_font_css_front', PRICINGTABLE_URL . '/fonts/arp_fonts.css', array(), $arprice_version);

//            typicons css
            wp_register_style('arp_type_icons_css', PRICINGTABLE_URL . '/css/typicons.min.css', array(), $arprice_version);
//           material design css
            wp_register_style('arp_material_icons_css', PRICINGTABLE_URL . '/css/material-design-iconic-font.css', array(), $arprice_version);

            wp_register_style('arp_ionicons_icons', PRICINGTABLE_URL . '/css/ionicons.min.css', array(), $arprice_version);
        }
    }

    /* Setting CSS as per Selected Template */

    function arp_enqueue_template_css() {

        global $post, $arprice_form, $arprice_version;

        $upload_main_url = PRICINGTABLE_UPLOAD_URL . '/css';

        $post_content = isset($post->post_content) ? $post->post_content : '';
        $parts = @explode("[ARPrice", $post_content);
        if (is_array($parts) && key_exists(1, $parts)) {
            $myidpart = @explode("id=", $parts[1]);
            if (isset($myidpart) && key_exists(1, $myidpart)) {
                $myid = @explode("]", $myidpart[1]);
            }
        }

        if (!is_admin()) {
            global $wp_query;
            $posts = $wp_query->posts;
            $pattern = '\[(\[?)(ARPrice)(?![\w-])([^\]\/]*(?:\/(?!\])[^\]\/]*)*?)(?:(\/)\]|\](?:([^\[]*+(?:\[(?!\/\2\])[^\[]*+)*+)\[\/\2\])?)(\]?)';
            $frm_ids = array();
            if (is_array($posts)) {

                foreach ($posts as $post) {
                    if (preg_match_all('/' . $pattern . '/s', $post->post_content, $matches) && array_key_exists(2, $matches) && in_array('ARPrice', $matches[2])) {
                        $frm_ids[] = $matches;
                        //break;	
                    }
                }

                $formids = array();
                if (is_array($frm_ids) && count($frm_ids) > 0) {

                    foreach ($frm_ids as $mat) {

                        if (is_array($mat) and count($mat) > 0) {
                            foreach ($mat as $k => $v) {

                                foreach ($v as $key => $val) {
                                    $parts = explode("id=", $val);
                                    if ($parts > 0 && isset($parts[1])) {

                                        if (stripos(@$parts[1], ']') !== false) {
                                            $partsnew = explode("]", $parts[1]);
                                            $formids[] = $partsnew[0];
                                        } else if (stripos(@$parts[1], ' ') !== false) {

                                            $partsnew = explode(" ", $parts[1]);
                                            $formids[] = $partsnew[0];
                                        } else {
                                            
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            $newvalarr = array();

            if (isset($formids) and is_array($formids) && count($formids) > 0) {
                foreach ($formids as $newkey => $newval) {
                    $newval = str_replace('"', '', $newval);
                    $newval = str_replace("'", "", $newval);
                    if (stripos($newval, ' ') !== false) {
                        $partsnew = explode(" ", $newval);
                        $newvalarr[] = $partsnew[0];
                    } else
                        $newvalarr[] = $newval;
                }
            }

            if ($newvalarr)
                $newvalues_enqueue = $arprice_form->get_table_enqueue_data($newvalarr);

            if (isset($newvalues_enqueue) && is_array($newvalues_enqueue) && count($newvalues_enqueue) > 0) {
                $to_google_map = 0;
                $templates = array();
                $is_template = 0;

                foreach ($newvalues_enqueue as $n => $newqnqueue) {
                    if ($newqnqueue['googlemap'])
                        $to_google_map = 1;

                    //$templates[] = $newqnqueue['template']; 
                    if ($newqnqueue['template_name'] != 0) {
                        $templates[] = $newqnqueue['template_name'];
                    } else {
                        $templates[] = $n;
                    }

                    if (!empty($newqnqueue['is_template'])) {
                        $is_template = $newqnqueue['is_template'];
                    }
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

                    //wp_enqueue_script('arp_animate_numbers');


                    wp_enqueue_style('arprice_front_css');




                    foreach ($newvalues_enqueue as $template_id => $newqnqueue) {
                        if (isset($newqnqueue['is_template']) && !empty($newqnqueue['is_template'])) {
                            wp_register_style('arptemplate_' . $newqnqueue['template_name'] . '_css', PRICINGTABLE_URL . '/css/templates/arptemplate_' . $newqnqueue['template_name'] . '.css', array(), $arprice_version);
                            wp_enqueue_style('arptemplate_' . $newqnqueue['template_name'] . '_css');
                        } else {

                            wp_register_style('arptemplate_' . $template_id . '_css', PRICINGTABLE_UPLOAD_URL . '/css/arptemplate_' . $template_id . '.css', array(), $arprice_version);
                            wp_enqueue_style('arptemplate_' . $template_id . '_css');
                        }
                    }

                    //wp_enqueue_style('arprice_front_animate_css');
                }
            }
        }
    }

    function arp_front_assets() {
        $arp_load_js_css = get_option('arp_load_js_css');
        if (isset($arp_load_js_css) && $arp_load_js_css == 'arp_load_js_css') {

            wp_enqueue_script('arprice_slider_js');

            wp_enqueue_style('arprice_front_tooltip_css');
            wp_enqueue_script('arp_tooltip_front');

            wp_enqueue_style('arp_fontawesome_css');
            wp_enqueue_style('arp_type_icons_css');
            wp_enqueue_style('arp_material_icons_css');
            wp_enqueue_style('arp_ionicons_icons');

            wp_enqueue_style('arprice_front_animate_css');



            wp_enqueue_script('arp_bpopup');

            wp_enqueue_script('arp_animate_numbers');
        }
    }

    /* Setting Front Side JavaScript */

    function set_front_js() {
        global $arprice_version;
        if (!is_admin()) {
            // Setting jQuery
            wp_enqueue_script('jquery');

            // Common JS
            wp_register_script('arprice_js', PRICINGTABLE_URL . '/js/arprice_front.js', array(), $arprice_version);

            // Slider JS
            wp_register_script('arprice_slider_js', PRICINGTABLE_URL . '/js/jquery.carouFredSel.js', array(), $arprice_version);

            // Tooltip JS
            wp_register_script('arp_tooltip_front', PRICINGTABLE_URL . '/js/tipso.min.js', array(), $arprice_version);

            wp_register_script('arp_bpopup', PRICINGTABLE_URL . '/js/jquery.bpopup.min.js', array(), $arprice_version);

            wp_enqueue_script('jquery-ui-core');

            wp_enqueue_script('jquery-effects-slide');

            // Animate Numbers JS
            wp_register_script('arp_animate_numbers', PRICINGTABLE_URL . '/js/jquery.animateNumber.js', array(), $arprice_version);
        }
    }

    /* Setting Admin JavaScript */

    function set_js() {
        global $pagenow, $arprice_version;
        if ($pagenow == 'edit.php' || $pagenow == 'post.php' || $pagenow == 'post-new.php') {
            return;
        }

        $_REQUEST['arp_action'] = isset($_REQUEST['arp_action']) ? $_REQUEST['arp_action'] : '';

        wp_register_script('arprice_js', PRICINGTABLE_URL . '/js/arprice.js', array(), $arprice_version);

        wp_register_script('arprice_dashboard_js', PRICINGTABLE_URL . '/js/arprice_dashboard.js', array(), $arprice_version);

        wp_register_script('arprice_sortable_resizable_js', PRICINGTABLE_URL . '/js/arprice_sortable_resizable.js', array(), $arprice_version);

        wp_register_script('arprice_highchart_js', PRICINGTABLE_URL . '/js/highchart/highcharts.js', array(), $arprice_version);

        wp_register_script('arp_bpopup', PRICINGTABLE_URL . '/js/jquery.bpopup.min.js', array(), $arprice_version);

        wp_register_script('arp_tooltip', PRICINGTABLE_URL . '/js/tipso.min.js', array(), $arprice_version);

        wp_register_script('arprice_jscolor', PRICINGTABLE_URL . '/js/jscolor.js', array(), $arprice_version);

        wp_register_script('arprice_editor_js', PRICINGTABLE_URL . '/js/arprice_editor.js', array(), $arprice_version);

        wp_register_script('arprice_html2canvas_js', PRICINGTABLE_URL . '/js/html2canvas.js', array(), $arprice_version);

        wp_register_script('arprice_bootstrap_tour_js', PRICINGTABLE_URL . '/js/bootstrap-tour-standalone.js', array(), $arprice_version);

        wp_register_script('arprice_tour_guide', PRICINGTABLE_URL . '/js/arprice_tour_guide.js', array(), $arprice_version);

        wp_register_script('arp_jsgrid_core', PRICINGTABLE_URL . '/js/jsgrid.core.js', array(), $arprice_version);
        wp_register_script('arp_jsgrid_field', PRICINGTABLE_URL . '/js/jsgrid.field.js', array(), $arprice_version);
        wp_register_script('arp_jsgrid_load_strategies', PRICINGTABLE_URL . '/js/jsgrid.load-strategies.js', array(), $arprice_version);
        wp_register_script('arp_jsgrid_sort_strategies', PRICINGTABLE_URL . '/js/jsgrid.sort-strategies.js', array(), $arprice_version);
        wp_register_script('arp_jsgrid_load_indicator', PRICINGTABLE_URL . '/js/jsgrid.load-indicator.js', array(), $arprice_version);
        wp_register_script('arp_jsgrid_field_text', PRICINGTABLE_URL . '/js/jsgrid.field.text.js', array(), $arprice_version);
        wp_register_script('arp_jsgrid_field_number', PRICINGTABLE_URL . '/js/jsgrid.field.number.js', array(), $arprice_version);

        wp_register_script('arp_moment', PRICINGTABLE_URL . '/js/moment.min.js', array(), $arprice_version);

        wp_register_script('arp_daterangepicker', PRICINGTABLE_URL . '/js/daterangepicker.js', array(), $arprice_version);

        wp_register_script('arp_codemirror_editor_js', PRICINGTABLE_URL . '/js/arp_codemirror.js', array(), $arprice_version);
        if (isset($_REQUEST['page']) && ( $_REQUEST['page'] == 'arprice' || $_REQUEST['page'] == 'arp_add_pricing_table' || $_REQUEST['page'] == 'arp_analytics' || $_REQUEST['page'] == 'arp_import_export' || $_REQUEST['page'] == 'arp_global_settings' ) && ($pagenow !== 'edit.php' && $pagenow !== 'post.php' && $pagenow !== 'post-new.php')) {
            wp_enqueue_script('jquery');

            if (isset($_REQUEST['page']) and ( $_REQUEST['page'] == 'arprice' || $_REQUEST['page'] == 'arp_global_settings' )) {

                if (isset($_REQUEST['arp_action']) && ($_REQUEST['arp_action'] == 'edit' || $_REQUEST['arp_action'] == 'new')) {
                    wp_enqueue_script('arprice_js');

                    wp_enqueue_script('arprice_sortable_resizable_js');

                    wp_enqueue_script('arprice_editor_js');

                    wp_enqueue_script('jquery-effects-slide');

                    wp_enqueue_script('jquery-ui-sortable');

                    wp_enqueue_script('jquery-ui-slider');

                    wp_enqueue_script('arprice_jscolor');

                    wp_enqueue_script('arprice_html2canvas_js');

                    wp_enqueue_script('arprice_bootstrap_tour_js');

                    wp_enqueue_script('arprice_tour_guide');

                    wp_enqueue_script('arp_tooltip');
                }


                if ($_REQUEST['arp_action'] == '' && ($_REQUEST['page'] == 'arprice' || $_REQUEST['page'] == 'arp_global_settings')) {


                    wp_enqueue_script('arprice_dashboard_js');
                    if ($_REQUEST['page'] == 'arprice') {


                        wp_enqueue_script('arprice_highchart_js');

                        wp_enqueue_script('arp_jsgrid_core');
                        wp_enqueue_script('arp_jsgrid_field');
                        wp_enqueue_script('arp_jsgrid_load_strategies');
                        wp_enqueue_script('arp_jsgrid_sort_strategies');
                        wp_enqueue_script('arp_jsgrid_load_indicator');
                        wp_enqueue_script('arp_jsgrid_field_text');
                        wp_enqueue_script('arp_jsgrid_field_number');

                        wp_enqueue_script('arp_moment');

                        wp_enqueue_script('arp_daterangepicker');

                        wp_enqueue_script('arprice_bootstrap_tour_js');

                        wp_enqueue_script('arprice_tour_guide');

                        wp_enqueue_script('arp_tooltip');
                    }
                }

                wp_enqueue_script('jquery-ui-core');

                wp_enqueue_script('arp_bpopup');

                wp_enqueue_script('media-upload');

                wp_enqueue_script('arp_tooltip');

                wp_enqueue_script('sack');

                if (isset($_REQUEST['page']) and ( $_REQUEST['page'] == 'arp_global_settings' or ( $_REQUEST['arp_action'] != '' and $_REQUEST['page'] === 'arprice' ) )) {
                    wp_enqueue_script('arp_codemirror_editor_js');
                }
            }
        }
    }

    /* Setting Menu Position */

    function get_free_menu_position($start, $increment = 0.1) {
        foreach ($GLOBALS['menu'] as $key => $menu) {
            $menus_positions[] = floatval($key);
        }
        if (!in_array($start, $menus_positions)) {
            $start = strval($start);
            return $start;
        } else {
            $start += $increment;
        }
        /* the position is already reserved find the closet one */
        while (in_array(strval($start), $menus_positions)) {
            $start += $increment;
        }
        $start = strval($start);
        return $start;
    }

    /* Setting Capabilities for user */

    function arp_capabilities() {
        $cap = array(
            'arp_view_pricingtables' => __('View And Manage Pricing Tables', ARP_PT_TXTDOMAIN),
            'arp_add_udpate_pricingtables' => __('Add/Edit Pricing Tables', ARP_PT_TXTDOMAIN),
            'arp_analytics_pricingtables' => __('View Analytics of Pricing Tables', ARP_PT_TXTDOMAIN),
            'arp_import_export_pricingtables' => __('Import/Export Pricing Tables', ARP_PT_TXTDOMAIN),
            'arp_global_settings_pricingtables' => __('Import/Export Pricing Tables', ARP_PT_TXTDOMAIN),
        );

        return $cap;
    }

    // Adding Pricing Table Menu
    function pricingtable_menu() {
        global $arp_pricingtable;
        if (current_user_can('administrator')) {
            global $current_user;
            $arproles = $arp_pricingtable->arp_capabilities();
            foreach ($arproles as $arprole => $arproledescription)
                $current_user->add_cap($arprole);

            unset($arproles);
            unset($arprole);
            unset($arproledescription);
        }

        $place = $arp_pricingtable->get_free_menu_position(26.1, .1);

        // add custom role to these menu links

        add_menu_page('ARPrice', 'ARPrice', 'arp_view_pricingtables', 'arprice', array(&$this, 'route'), PRICINGTABLE_IMAGES_URL . '/pricing_table_icon.png', $place);

        do_action('add_licensed_menu');

        add_submenu_page('arprice', __('Import/Export', ARP_PT_TXTDOMAIN), __('Import/Export', ARP_PT_TXTDOMAIN), 'arp_import_export_pricingtables', 'arp_import_export', array(&$this, 'route'));

        add_submenu_page('arprice', __('Settings', ARP_PT_TXTDOMAIN), __('Settings', ARP_PT_TXTDOMAIN), 'arp_global_settings_pricingtables', 'arp_global_settings', array(&$this, 'route'));
    }

    function arp_menu_css() {
        ?>
        <style type="text/css">
            #adminmenu #toplevel_page_arprice .wp-menu-image img{
                padding-top:5px;
            }
        </style>
        <?php

    }

    function route() {
        global $arp_pricingtable, $arprice_form;
        if (isset($_REQUEST['page']) and $_REQUEST['page'] == 'arprice') {
            //self::displaylist();
            if (isset($_REQUEST['arp_action']) && $_REQUEST['arp_action'] == 'edit') {
                $arp_pricingtable->edit_template();
            } else if (isset($_REQUEST['arp_action']) and $_REQUEST['arp_action'] == 'new') {
                $arp_pricingtable->edit_template();
            } else {
                $arp_pricingtable->addnew();
            }
        } else if (isset($_REQUEST['page']) and $_REQUEST['page'] == 'arp_add_pricing_table') {
            if (isset($_REQUEST['arpaction']) and $_REQUEST['arpaction'] == 'create_new') {
                $arprice_form->edit_template();
            } else {
                $arp_pricingtable->addnew();
            }
        } else if (isset($_REQUEST['page']) and $_REQUEST['page'] == 'arp_analytics') {
            $arp_pricingtable->analytics();
        } else if (isset($_REQUEST['page']) and $_REQUEST['page'] == 'arp_import_export') {
            $arp_pricingtable->import_export();
        } else if (isset($_REQUEST['page']) and $_REQUEST['page'] == 'arp_global_settings') {
            $arp_pricingtable->load_global_settings();
        } else {
            $arp_pricingtable->addnew();
        }
    }

    function addnew() {
        if (file_exists(PRICINGTABLE_VIEWS_DIR . '/arprice_template_listing.php'))
            include( PRICINGTABLE_VIEWS_DIR . '/arprice_template_listing.php');
    }

    function edit_template() {
        if (file_exists(PRICINGTABLE_VIEWS_DIR . '/arprice_listing_editor.php'))
            include( PRICINGTABLE_VIEWS_DIR . '/arprice_listing_editor.php' );
    }

    function import_export() {
        if (file_exists(PRICINGTABLE_VIEWS_DIR . '/arprice_import_export.php'))
            include( PRICINGTABLE_VIEWS_DIR . '/arprice_import_export.php' );
    }

    function load_global_settings() {
        if (file_exists(PRICINGTABLE_VIEWS_DIR . '/arprice_global_settings.php'))
            include( PRICINGTABLE_VIEWS_DIR . '/arprice_global_settings.php' );
    }

   public static function arp_db_check() {
        global $arp_pricingtable;
        $arprice_version = get_option('arprice_version');

        if (!isset($arprice_version) || $arprice_version == '' && is_multisite()) {
            $arp_pricingtable->install();
        }
    }

    public static function install() {
        global $arp_pricingtable;

        $arprice_version = get_option('arprice_version');

        if (!isset($arprice_version) || $arprice_version == '') {
            $arp_pricingtable->arp_pricing_table_main_settings();

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            global $wpdb, $arprice_version;

            $charset_collate = '';

            if ($wpdb->has_cap('collation')) {

                if (!empty($wpdb->charset))
                    $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";

                if (!empty($wpdb->collate))
                    $charset_collate .= " COLLATE $wpdb->collate";
            }

            update_option('arprice_version', $arprice_version);
            update_option('arp_is_new_installation', 1);
            update_option('arp_enable_analytics','arp_enable_analytics');
            update_option('arprice_tour_guide_value', 'yes');

            $table = $wpdb->prefix . 'arp_arprice';

            $sql_table = "CREATE TABLE IF NOT EXISTS `{$table}`(			
                 ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                 table_name VARCHAR(255) NOT NULL, 
                 template_name int(11) NOT NULL,
                 general_options LONGTEXT NOT NULL, 
                 is_template int(1) NOT NULL,
                 is_animated int(1) NOT NULL,
                 status VARCHAR(255) NOT NULL, 
                 create_date DATETIME NOT NULL, 
                 arp_last_updated_date DATETIME NOT NULL 
             ){$charset_collate}";

            dbDelta($sql_table);

            $table_opt = $wpdb->prefix . 'arp_arprice_options';

            $sql_table_opt = "CREATE TABLE IF NOT EXISTS `{$table_opt}`( 
                ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                table_id INT(11) NOT NULL,
		table_options LONGTEXT NOT NULL
            ){$charset_collate}";

            dbDelta($sql_table_opt);

            $tablecreate = $wpdb->prefix . 'arp_arprice_analytics';

            $sqltable = "CREATE TABLE IF NOT EXISTS `{$tablecreate}`(
                tracking_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
                pricing_table_id int NOT NULL,
                browser_name VARCHAR(255) NOT NULL,
                browser_version VARCHAR(255) NOT NULL,
                page_url varchar(255) NOT NULL,
                ip_address varchar(255) NOT NULL,
                country_name varchar(255) NOT NULL,
                session_id varchar(255) NOT NULL,
                added_date DATETIME NOT NULL,
                is_click int(1) NOT NULL DEFAULT '0',
                plan_id varchar(25) NOT NULL 
            ){$charset_collate}";
            dbDelta($sqltable);

            $arp_pricingtable->arp_pricing_table_templates();  //install default templates

            /* Set Autoincrement ID to 100 */

            $wpdb->query("ALTER TABLE `{$table}` AUTO_INCREMENT = 100");

            $wpdb->query("ALTER TABLE `{$table_opt}` AUTO_INCREMENT = 100");

            $arp_pricingtable->arp_set_global_settings();
            global $arprice_class;
            $arprice_class->getwpversion();
        }
    }

   public static function uninstall() {

        global $wpdb;
        if (is_multisite()) {
            $blogs = $wpdb->get_results("SELECT blog_id FROM {$wpdb->blogs}", ARRAY_A);
            if ($blogs) {
                foreach ($blogs as $blog) {
                    switch_to_blog($blog['blog_id']);

                    delete_option('arprice_version');
                    delete_option("arpIsSorted");
                    delete_option("arpSortOrder");
                    delete_option("arpSortId");
                    delete_option("arpSortInfo");
                    delete_option('arprice_tour_guide_value');
                    delete_option('arp_mobile_responsive_size');
                    delete_option('arp_tablet_responsive_size');
                    delete_option('arp_desktop_responsive_size');
                    delete_option('arp_global_custom_css');
                    delete_option('arp_css_character_set');
                    delete_option('arp_wp_get_version');
                    delete_option('arp_previewoptions');
                    delete_option('arp_tablegeneraloption');
                    delete_option('arp_tablecolumnoption');

                    delete_option('arp_is_new_installation');
                    delete_option('arp_is_dashboard_visited');
                    delete_option('arp_load_js_css');
                    delete_option('arp_update_token');
                    delete_option('widget_arp_widget');
                    delete_option('arp_is_new_installation');
                    delete_option('arp_enable_analytics');

                    $wpdb->query("DELETE FROM " . $wpdb->options . " WHERE option_name LIKE '%arp_previewtabledata_%'");
                    $table = $wpdb->prefix . 'arp_arprice';
                    $table_opt = $wpdb->prefix . 'arp_arprice_options';
                    $table_analytics = $wpdb->prefix . 'arp_arprice_analytics';
                    $wpdb->query("DROP TABLE IF EXISTS $table");
                    $wpdb->query("DROP TABLE IF EXISTS $table_opt");
                    $wpdb->query("DROP TABLE IF EXISTS $table_analytics");
                }
                restore_current_blog();
            }
        } else {
            delete_option('arprice_version');
            delete_option("arpIsSorted");
            delete_option("arpSortOrder");
            delete_option("arpSortId");
            delete_option("arpSortInfo");
            delete_option('arprice_tour_guide_value');
            delete_option('arp_mobile_responsive_size');
            delete_option('arp_tablet_responsive_size');
            delete_option('arp_desktop_responsive_size');
            delete_option('arp_global_custom_css');
            delete_option('arp_css_character_set');
            delete_option('arp_wp_get_version');
            delete_option('arp_previewoptions');
            delete_option('arp_tablegeneraloption');
            delete_option('arp_tablecolumnoption');
            delete_option('arp_load_js_css');
            delete_option('arp_update_token');
            delete_option('widget_arp_widget');
            delete_option('arp_is_new_installation');
            delete_option('arp_enable_analytics');

            $wpdb->query("DELETE FROM " . $wpdb->options . " WHERE option_name LIKE '%arp_previewtabledata_%'");
            $table = $wpdb->prefix . 'arp_arprice';
            $table_opt = $wpdb->prefix . 'arp_arprice_options';
            $table_analytics = $wpdb->prefix . 'arp_arprice_analytics';
            $wpdb->query("DROP TABLE IF EXISTS $table");
            $wpdb->query("DROP TABLE IF EXISTS $table_opt");
            $wpdb->query("DROP TABLE IF EXISTS $table_analytics");
        }
    }

   public static function arp_pricing_table_templates() {
        include(PRICINGTABLE_CLASSES_DIR . '/class.arprice_default_templates.php');
    }

    function arp_enqueue_preview_css($id, $template_id, $is_admin_preview, $is_template) {
        global $arprice_version, $arprice_images_css_version;
        if ($is_template == 1) {

            wp_register_style('arprice_preview_css_' . $id . '_v' . $arprice_images_css_version, PRICINGTABLE_URL . '/css/templates/arptemplate_' . $template_id . '_v' . $arprice_images_css_version . '.css', array(), $arprice_version);

            wp_print_styles('arprice_preview_css_' . $id . '_v' . $arprice_images_css_version);
        } else {
            wp_register_style('arprice_preview_css_' . $id, PRICINGTABLE_UPLOAD_URL . '/css/arptemplate_' . $template_id . '.css', array(), $arprice_version);

            wp_print_styles('arprice_preview_css_' . $id);
        }

        if ($is_admin_preview == 1) {
            wp_register_style('arprice_front_css', PRICINGTABLE_URL . '/css/arprice_front.css', array(), $arprice_version);

            //wp_print_styles('arprice_front_css');

            wp_register_script('arp_tooltip_front', PRICINGTABLE_URL . '/js/tipso.min.js', array(), $arprice_version);

            wp_register_script('arprice_js', PRICINGTABLE_URL . '/js/arprice_front.js', array(), $arprice_version);
            wp_register_script('arp_animate_numbers', PRICINGTABLE_URL . '/js/jquery.animateNumber.js', array(), $arprice_version);
        }

        wp_print_scripts('arprice_js');

        //wp_print_scripts('arp_animate_numbers');

        wp_print_scripts('arprice_slider_js');

        wp_print_scripts('arp_tooltip_front');
    }

    function arp_hide_update_notice_to_all_admin_users() {
        if (isset($_GET) and ( isset($_GET['page']) and preg_match('/arp*/', $_GET['page']))) {
            remove_all_actions('network_admin_notices', 10000);
            remove_all_actions('user_admin_notices', 10000);
            remove_all_actions('admin_notices', 10000);
            remove_all_actions('all_admin_notices', 10000);
        }
    }

    function footer_js($location = 'footer') {
        global $arp_is_animation, $arp_has_tooltip, $arp_has_fontawesome, $arp_effect_css, $arp_is_lightbox, $arp_animate_price, $arp_has_material_icons, $arp_has_typicons, $arp_has_ionicons;

        if ($arp_is_animation == 1)
            wp_enqueue_script('arprice_slider_js');

        if ($arp_has_tooltip == 1) {
            wp_enqueue_style('arprice_front_tooltip_css');
            wp_enqueue_script('arp_tooltip_front');
        }

        if ($arp_has_fontawesome == 1) {
            wp_enqueue_style('arp_fontawesome_css');
        }

        if ($arp_has_material_icons == 1) {
            wp_enqueue_style('arp_material_icons_css');
        }

        if ($arp_has_typicons == 1) {
            wp_enqueue_style('arp_type_icons_css');
        }

        if ($arp_has_ionicons == 1) {
            wp_enqueue_style('arp_ionicons_icons');
        }

        if ($arp_effect_css == 1)
            wp_enqueue_style('arprice_front_animate_css');


        if ($arp_is_lightbox == 1)
            wp_enqueue_script('arp_bpopup');

        if ($arp_animate_price == 1)
            wp_enqueue_script('arp_animate_numbers');
    }

    function append_googlemap_js($newvalarr) {

        global $arp_pricingtable, $arprice_form, $arprice_version;
        $arr[] = $newvalarr;

        $newvalues_enqueue = $arprice_form->get_table_enqueue_data($arr);

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
        }
    }

    function arp_template_order() {


        $arptmparr = apply_filters('arp_pricing_template_order_managed', array(
            'arptemplate_25' => 1,
            'arptemplate_20' => 2,
            'arptemplate_21' => 3,
            'arptemplate_26' => 4,
            'arptemplate_23' => 5,
            'arptemplate_2' => 6,
            'arptemplate_24' => 7,
            'arptemplate_1' => 8,
            'arptemplate_22' => 9,
            'arptemplate_3' => 10,
            'arptemplate_4' => 11,
            'arptemplate_5' => 12,
            'arptemplate_6' => 13,
            'arptemplate_7' => 14,
            'arptemplate_8' => 15,
            'arptemplate_9' => 16,
            'arptemplate_10' => 17,
            'arptemplate_11' => 18,
            'arptemplate_12' => 19,
            'arptemplate_13' => 20,
            'arptemplate_14' => 21,
            'arptemplate_15' => 21,
            'arptemplate_16' => 23,
        ));



        return $arptmparr;
    }

    function arp_set_global_settings() {
        add_option('arp_mobile_responsive_size', 480);
        add_option('arp_tablet_responsive_size', 768);
        add_option('arp_desktop_responsive_size', 0);
        add_option('arp_global_custom_css', '');
        add_option('arp_css_character_set', '');
    }

    function arp_template_responsive_type_array() {

        $array = apply_filters('arprice_responsive_type_array_filter', array(
            'header_level_types' => array(
                'type_1' => array('arptemplate_9', 'arptemplate_12'),
                'type_2' => array('arptemplate_4'),
                'type_3' => array('arptemplate_16', 'arptemplate_10'),
                'type_4' => array('arptemplate_6'),
                'type_5' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_5', 'arptemplate_8', 'arptemplate_11', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25', 'arptemplate_26'),
                'type_6' => array('arptemplate_7', 'arptemplate_5'),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'header_title_types' => array(
                'type_1' => array('arptemplate_1'),
                'type_2' => array('arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25', 'arptemplate_26'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'header_level_types_front_array_1' => array(
                'type_1' => array('arptemplate_1'),
                'type_2' => array('arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_3' => array('arptemplate_6'),
                'type_4' => array('arptemplate_7', 'arptemplate_5'),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'header_level_types_front_array_2' => array(
                'type_1' => array('arptemplate_9'),
                'type_2' => array('arptemplate_12'),
                'type_3' => array('arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_7', 'arptemplate_8', 'arptemplate_10', 'arptemplate_11', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_4' => array('arptemplate_1'),
                'type_5' => array('arptemplate_6'),
                'type_6' => array('arptemplate_7', 'arptemplate_5'),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'column_wrapper_height' => array(
                'type_1' => array('arptemplate_6'),
                'type_2' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'price_wrapper_types' => array(
                'type_1' => array('arptemplate_2', 'arptemplate_11', 'arptemplate_3', 'arptemplate_8', 'arptemplate_10', 'arptemplate_13', 'arptemplate_14', 'arptemplate_16', 'arptemplate_23', 'arptemplate_21', 'arptemplate_22', 'arptemplate_5'),
                'type_2' => array('arptemplate_7'),
                'type_3' => array('arptemplate_9'),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'price_level_types' => array(
                'type_1' => array('arptemplate_1', 'arptemplate_4', 'arptemplate_12', 'arptemplate_5', 'arptemplate_7', 'arptemplate_11', 'arptemplate_9', 'arptemplate_22', 'arptemplate_24'),
                'type_2' => array('arptemplate_2', 'arptemplate_3', 'arptemplate_8', 'arptemplate_10', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_23', 'arptemplate_25'),
                'type_3' => array('arptemplate_11', 'arptemplate_6'),
                'type_4' => array('arptemplate_22', 'arptemplate_24'),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'price_label_level_types' => array(
                'type_1' => array('arptemplate_4', 'arptemplate_12', 'arptemplate_5', 'arptemplate_7', 'arptemplate_11', 'arptemplate_6', 'arptemplate_9', 'arptemplate_22', 'arptemplate_24'),
                'type_2' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_8', 'arptemplate_10', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_23', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array('arptemplate_22', 'arptemplate_24'),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'body_li_level_types' => array(
                'type_1' => array('arptemplate_8', 'arptemplate_10'),
                'type_2' => array(),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'column_description_types' => array(
                'type_1' => array('arptemplate_1', 'arptemplate_4', 'arptemplate_12', 'arptemplate_5', 'arptemplate_8', 'arptemplate_6', 'arptemplate_2', 'arptemplate_9', 'arptemplate_14', 'arptemplate_15', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_24'),
                'type_2' => array('arptemplate_3', 'arptemplate_7', 'arptemplate_10', 'arptemplate_11', 'arptemplate_13', 'arptemplate_16', 'arptemplate_23', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'button_level_types' => array(
                'type_1' => array('arptemplate_8', 'arptemplate_13', 'arptemplate_11'),
                'type_2' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'slider_types' => array(
                'type_1' => array('arptemplate_8'),
                'type_2' => array('arptemplate_10'),
                'type_3' => array('arptemplate_13', 'arptemplate_14', 'arptemplate_15'),
                'type_4' => array('arptemplate_16'),
                'type_5' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_9', 'arptemplate_11', 'arptemplate_12', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
        ));

        return $array;
    }

    function arp_template_editor_array() {

        $arptemplate_editor_array = apply_filters('arptemplate_editor_handler', array(
            'column_header_click_handler' => array(
                'type_1' => array('arptemplate_12', 'arptemplate_8', 'arptemplate_11'),
                'type_2' => array('arptemplate_3', 'arptemplate_7', 'arptemplate_10'),
                'type_3' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_9', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'column_header_click_handler_type_1' => array(
                'type_1' => array('arptemplate_10'),
                'type_2' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_11', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'column_button_click_handler' => array(
                'type_1' => array('arptemplate_12', 'arptemplate_8', 'arptemplate_11'),
                'type_2' => array('arptemplate_3', 'arptemplate_7', 'arptemplate_10'),
                'type_3' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_9', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'body_li_click_handler' => array(
                'type_1' => array('arptemplate_12', 'arptemplate_8', 'arptemplate_11'),
                'type_2' => array('arptemplate_3', 'arptemplate_7', 'arptemplate_10'),
                'type_3' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_9', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'column_price_click_handler' => array(
                'type_1' => array('arptemplate_12', 'arptemplate_8', 'arptemplate_11'),
                'type_2' => array('arptemplate_3', 'arptemplate_7', 'arptemplate_10', 'arptemplate_4',),
                'type_3' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_5', 'arptemplate_6', 'arptemplate_9', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'price_text_keyup_handler' => array(
                'type_1' => array('arptemplate_1', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24'),
                'type_2' => array('arptemplate_11'),
                'type_3' => array('arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_25'),
                'type_4' => array(''),
                'type_5' => array(''),
                'type_6' => array(''),
                'type_7' => array(''),
                'type_8' => array(''),
            ),
            'price_label_keyup_handler' => array(
                'type_1' => array('arptemplate_1', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24'),
                'type_2' => array('arptemplate_11'),
                'type_3' => array('arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_25'),
                'type_4' => array(''),
                'type_5' => array(''),
                'type_6' => array(''),
                'type_7' => array(''),
                'type_8' => array(''),
            ),
            'price_font_size_handler' => array(
                'type_1' => array('arptemplate_15'),
                'type_2' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'price_text_font_size_handler' => array(
                'type_1' => array('arptemplate_15'),
                'type_2' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array(),
            ),
            'column_title_handler' => array(
                'type_1' => array('arptemplate_12'),
                'type_2' => array('arptemplate_1', 'arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array()
            ),
            'column_style_btn_handler' => array(
                'type_1' => array('arptemplate_1', 'arptemplate_21', 'arptemplate_22', 'arptemplate_23', 'arptemplate_24'),
                'type_2' => array('arptemplate_2', 'arptemplate_3', 'arptemplate_4', 'arptemplate_5', 'arptemplate_6', 'arptemplate_7', 'arptemplate_8', 'arptemplate_9', 'arptemplate_10', 'arptemplate_11', 'arptemplate_12', 'arptemplate_13', 'arptemplate_14', 'arptemplate_15', 'arptemplate_16', 'arptemplate_20', 'arptemplate_25'),
                'type_3' => array(),
                'type_4' => array(),
                'type_5' => array(),
                'type_6' => array(),
                'type_7' => array(),
                'type_8' => array()
            )
        ));

        return $arptemplate_editor_array;
    }

    function arprice_font_icon_size_parser($string = '') {

        //$pattern = "/(<([\w]+)[^>]*>)(.*?)(<\/\\2>)/";

        $pattern = "/<i (.*?)>(.*?)<\/i>/i";

        $size_pattern = "/arpsize-ico-[0-9]*/";
        preg_match_all($pattern, $string, $matches, PREG_SET_ORDER);

        if (is_array($matches) and ! empty($matches)) {
            foreach ($matches as $key => $value) {

                preg_match($size_pattern, $value[0], $matches_n);

                if (!empty($matches_n[0])) {
                    $font_size = str_replace('arpsize-ico-', '', $matches_n[0]);
                    $style = "font-size:" . $font_size . "px;";
                    $dom = new DOMDocument();
                    @$dom->loadHTML($value[0]);
                    $n = new DOMXPath($dom);
                    foreach ($n->query("//i") as $node) {
                        $node->setAttribute("style", $style);
                    }
                    $newHTML = $dom->saveHTML();

                    preg_match_all($pattern, $newHTML, $matches_);

                    if (is_array($matches_[0]) && !empty($matches_[0])) {
                        foreach ($matches_[0] as $key => $mat) {
                            $string = str_replace($value[0], $mat, $string);
                        }
                    }
                }
            }
        }

        return $string;
    }

    function arprice_cs_enqueue() {
        global $arprice_version;
        if (function_exists('cornerstone_register_element')) {
            wp_enqueue_style('aprice_cs-styles', ARPRICECSURL . '/assets/styles/arprice-cs.css', array(), $arprice_version);
        }
    }

    function arprice_cs_icon_map($icon_map) {
        $icon_map['AR-PRICE'] = ARPRICECSURL . '/assets/svg/ar_price.svg';
        return $icon_map;
    }

    function arprice_cs_register_elements() {
        if (function_exists('cornerstone_register_element')) {
            cornerstone_register_element('ARPrice_CS', 'arprice-cs', ARPRICECSDIR . '/includes/arprice-cs');
        }
    }
    
        function arp_prevent_rocket_loader_script($tag, $handle) {
        return str_replace(' src', ' data-cfasync="false" src', $tag);
    }

}

function arprice_load_table($id = '') {

    global $arprice_form, $arprice_version;

    $formids = array();

    $formids[] = $id;

    if (isset($formids) and is_array($formids) && count($formids) > 0) {
        foreach ($formids as $newkey => $newval) {
            $newval = str_replace('"', '', $newval);
            $newval = str_replace("'", "", $newval);
            if (stripos($newval, ' ') !== false) {
                $partsnew = explode(" ", $newval);
                $newvalarr[] = $partsnew[0];
            } else
                $newvalarr[] = $newval;
        }
    }

    if ($newvalarr)
        $newvalues_enqueue = $arprice_form->get_table_enqueue_data($newvalarr);

    if (is_array($newvalues_enqueue) && count($newvalues_enqueue) > 0) {
        $to_google_map = 0;
        $templates = array();
        $is_template = 0;

        foreach ($newvalues_enqueue as $n => $newqnqueue) {
            if ($newqnqueue['googlemap'])
                $to_google_map = 1;

            //$templates[] = $newqnqueue['template']; 
            if ($newqnqueue['template_name'] != 0) {
                $templates[] = $newqnqueue['template_name'];
            } else {
                $templates[] = $n;
            }

            if (!empty($newqnqueue['is_template'])) {
                $is_template = $newqnqueue['is_template'];
            }
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
            //wp_enqueue_script('arp_animate_numbers');


            wp_enqueue_style('arprice_front_css');

            //wp_enqueue_style('arprice_font_css_front');



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
    return do_shortcode('[ARPrice id=' . $id . ']');
}

global $arprice_class;

$api_url = $arprice_class->arpgetapiurl();
$plugin_slug = basename(dirname(__FILE__));

add_filter('pre_set_site_transient_update_plugins', 'arp_check_for_plugin_update');

function arp_check_for_plugin_update($checked_data) {
    global $api_url, $plugin_slug, $wp_version, $arprice_class, $arprice_version;

    //Comment out these two lines during testing.
    if (empty($checked_data->checked))
        return $checked_data;

    $args = array(
        'slug' => $plugin_slug,
        'version' => $arprice_version,
        'other_variables' => $arprice_class->arp_get_remote_post_params(),
    );

    $request_string = array(
        'body' => array(
            'action' => 'basic_check',
            'request' => serialize($args),
            'api-key' => md5(home_url())
        ),
        'user-agent' => 'ARP-WordPress/' . $wp_version . '; ' . home_url()
    );

    // Start checking for an update
    $raw_response = wp_remote_post($api_url, $request_string);

    if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200))
        $response = unserialize($raw_response['body']);

    if (isset($response) && !empty($response))
        update_option('arp_update_token', $response->token);

    if (isset($response) && is_object($response) && is_object($checked_data) && !empty($response)) // Feed the update data into WP updater
        $checked_data->response[$plugin_slug . '/' . $plugin_slug . '.php'] = $response;

    return $checked_data;
}

add_filter('plugins_api', 'arp_plugin_api_call', 10, 3);

function arp_plugin_api_call($def, $action, $args) {
    global $plugin_slug, $api_url, $wp_version;

    if (!isset($args->slug) || ($args->slug != $plugin_slug))
        return false;

    // Get the current version
    $plugin_info = get_site_transient('update_plugins');
    $current_version = $plugin_info->checked[$plugin_slug . '/' . $plugin_slug . '.php'];
    $args->version = $current_version;

    $request_string = array(
        'body' => array(
            'action' => $action,
            'update_token' => get_site_option('arp_update_token'),
            'request' => serialize($args),
            'api-key' => md5(home_url())
        ),
        'user-agent' => 'ARP-WordPress/' . $wp_version . '; ' . home_url()
    );

    $request = wp_remote_post($api_url, $request_string);

    if (is_wp_error($request)) {
        $res = new WP_Error('plugins_api_failed', __('An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>', ARP_PT_TXTDOMAIN), $request->get_error_message());
    } else {
        $res = unserialize($request['body']);

        if ($res === false)
            $res = new WP_Error('plugins_api_failed', __('An unknown error occurred', ARP_PT_TXTDOMAIN), $request['body']);
    }

    return $res;
}
?>