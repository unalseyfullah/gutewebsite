<?php

class arprice {

    function __construct() {

        add_action('wp_ajax_arprice_pagination', array(&$this, 'arprice_pagination'));

        add_action('wp_ajax_arprice_delete', array(&$this, 'arprice_delete'));

        add_action('wp_ajax_arpactivatelicense', array(&$this, 'arpreqact'));

        add_action('wp_ajax_arpdeactlic', array(&$this, 'arpreqlicdeact'));

        add_filter('upgrader_pre_install', array(&$this, 'arp_backup'), 10, 2);

        add_action('admin_init', array(&$this, 'upgrade_data'));

        add_action('wp_ajax_import_old_templates', array(&$this, 'arp_import_old_templates'));

        global $arpriceplugin;
        $arpriceplugin = "checksorting";
    }

    function arp_backup() {
        $databaseversion = get_option('arprice_version');
        update_option('old_db_version', $databaseversion);
    }

    function upgrade_data() {
        global $arp_newdbversion;

        if (!isset($arp_newdbversion) || $arp_newdbversion == "")
            $arp_newdbversion = get_option('arprice_version');

        if (version_compare($arp_newdbversion, '2.5.4', '<')) {
            $path = PRICINGTABLE_VIEWS_DIR . '/upgrade_latest_data.php';
            include($path);
        }
    }

    function arpreqlicdeact() {
        global $arprice_class;
        $plugres = $arprice_class->arpdeactivatelicense();

        if (isset($plugres) && $plugres != "") {
            echo $plugres;
            exit;
        } else {
            echo "Invalid Request";
            exit;
        }
        exit;
    }

    function arpdeactivatelicense() {
        global $arprice_class;
        $siteinfo = array();

        $siteinfo[] = get_bloginfo('name');
        $siteinfo[] = $_SERVER['SERVER_ADDR'];
        $siteinfo[] = $_SERVER["HTTP_HOST"];
        $siteinfo[] = ARPURL;
        $siteinfo[] = get_option("arprice_version");

        $newstr = implode("||", $siteinfo);
        $postval = base64_encode($newstr);

        $verifycode = get_option("arpSortOrder");

        if (isset($verifycode) && $verifycode != "") {
            $urltopost = "http://www.reputeinfosystems.com/tf/plugins/arprice/verify/lic_de_act.php";


            $response = wp_remote_post($urltopost, array(
                'method' => 'POST',
                'timeout' => 45,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(),
                'body' => array('verifypurchase' => $verifycode, 'postval' => $postval),
                'cookies' => array()
                    )
            );

            if (array_key_exists('body', $response) && isset($response["body"]) && $response["body"] != "")
                $responsemsg = $response["body"];
            else
                $responsemsg = "";

            $chkplugver = $arprice_class->chkplugversionth($responsemsg);

            return $chkplugver;
            exit;
        }
        else {
            $resp = "Invalid Request";
            return $resp;
            exit;
        }
    }

    function getwpversion() {
        global $arprice_class;
        global $arprice_version;
        $bloginformation = array();
        $str = $arprice_class->get_rand_alphanumeric(10);

        if (is_multisite())
            $multisiteenv = "Multi Site";
        else
            $multisiteenv = "Single Site";

        $bloginformation[] = get_bloginfo('name');
        $bloginformation[] = get_bloginfo('description');
        $bloginformation[] = home_url();
        $bloginformation[] = '';
        $bloginformation[] = get_bloginfo('version');
        $bloginformation[] = get_bloginfo('language');
        $bloginformation[] = $arprice_version;
        $bloginformation[] = $_SERVER['REMOTE_ADDR'];
        $bloginformation[] = $str;
        $bloginformation[] = $multisiteenv;

        $arprice_class->checksite($str);

        $valstring = implode("||", $bloginformation);
        $encodedval = base64_encode($valstring);

        $urltopost = "http://reputeinfosystems.net/arprice/wp_in.php";
        $response = wp_remote_post($urltopost, array(
            'method' => 'POST',
            'timeout' => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => array(),
            'body' => array('wpversion' => $encodedval),
            'cookies' => array()
                )
        );
    }

    function get_rand_alphanumeric($length) {
        global $arprice_class;
        global $MdlDb;
        if ($length > 0) {
            $rand_id = "";
            for ($i = 1; $i <= $length; $i++) {
                mt_srand((double) microtime() * 1000000);
                $num = mt_rand(1, 36);
                $rand_id .= $arprice_class->assign_rand_value($num);
            }
        }
        return $rand_id;
    }

    function assign_rand_value($num) {

        switch ($num) {
            case "1" : $rand_value = "a";
                break;
            case "2" : $rand_value = "b";
                break;
            case "3" : $rand_value = "c";
                break;
            case "4" : $rand_value = "d";
                break;
            case "5" : $rand_value = "e";
                break;
            case "6" : $rand_value = "f";
                break;
            case "7" : $rand_value = "g";
                break;
            case "8" : $rand_value = "h";
                break;
            case "9" : $rand_value = "i";
                break;
            case "10" : $rand_value = "j";
                break;
            case "11" : $rand_value = "k";
                break;
            case "12" : $rand_value = "l";
                break;
            case "13" : $rand_value = "m";
                break;
            case "14" : $rand_value = "n";
                break;
            case "15" : $rand_value = "o";
                break;
            case "16" : $rand_value = "p";
                break;
            case "17" : $rand_value = "q";
                break;
            case "18" : $rand_value = "r";
                break;
            case "19" : $rand_value = "s";
                break;
            case "20" : $rand_value = "t";
                break;
            case "21" : $rand_value = "u";
                break;
            case "22" : $rand_value = "v";
                break;
            case "23" : $rand_value = "w";
                break;
            case "24" : $rand_value = "x";
                break;
            case "25" : $rand_value = "y";
                break;
            case "26" : $rand_value = "z";
                break;
            case "27" : $rand_value = "0";
                break;
            case "28" : $rand_value = "1";
                break;
            case "29" : $rand_value = "2";
                break;
            case "30" : $rand_value = "3";
                break;
            case "31" : $rand_value = "4";
                break;
            case "32" : $rand_value = "5";
                break;
            case "33" : $rand_value = "6";
                break;
            case "34" : $rand_value = "7";
                break;
            case "35" : $rand_value = "8";
                break;
            case "36" : $rand_value = "9";
                break;
        }
        return $rand_value;
    }

    function checksite($str) {
        update_option('arp_wp_get_version', $str);
    }

    function chkplugversionth($myresponse) {
        if ($myresponse != "" && $myresponse == 1) {
            global $arprice_class;
            global $MdlDb;
            $new_key = '';

            $new_key = rand();

            $thresp = $arprice_class->checkthisvalidresp($new_key);

            if ($thresp == 1) {
                return "License Deactivted Sucessfully.";
                exit;
            } else {
                $resp = "Invalid Request";
                return $resp;
                exit;
            }
        } else {
            $resp = "Invalid Request";
            return $resp;
            exit;
        }
    }

    function checkthisvalidresp($new_key) {
        if ($new_key != "") {
            delete_option("arpIsSorted");
            delete_option("arpSortOrder");
            delete_option("arpSortId");
            delete_option("arpSortInfo");

            delete_site_option("arpIsSorted");
            delete_site_option("arpSortOrder");
            delete_site_option("arpSortId");
            delete_site_option("arpSortInfo");

            return "1";
            exit;
        } else {
            $resp = "Invalid Request";
            return $resp;
            exit;
        }
    }

    function arpreqact() {
        global $arprice_class;
        $plugres = $arprice_class->arpverifypurchasecode();

        if (isset($plugres) && $plugres != "") {
            $responsetext = $plugres;

            if ($responsetext == "License Activated Successfully.") {
                echo "VERIFIED";
                exit;
            } else {
                echo $plugres;
                exit;
            }
        } else {
            echo "Invalid Request";
            exit;
        }
    }

    function checksorting() {
        global $arnotifymodel;

        $sortorder = get_option("arpSortOrder");
        $sortid = get_option("arpSortId");
        $issorted = get_option("arpIsSorted");
        $isinfo = get_option("arpSortInfo");

        if ($sortorder == "" || $sortid == "" || $issorted == "") {
            return 0;
        } else {
            $sortfield = $sortorder;
            $sortorderval = base64_decode($sortfield);

            $ordering = array();
            $ordering = explode("^", $sortorderval);

            $domain_name = str_replace('www.', '', $ordering[3]);
            $recordid = $ordering[4];
            $ipaddress = $ordering[5];

            $mysitename = get_bloginfo('name');
            $siteipaddr = $_SERVER['SERVER_ADDR'];
            $mysitedomain = str_replace('www.', '', $_SERVER["HTTP_HOST"]);

            if (($domain_name == $mysitedomain) && ($recordid == $sortid)) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    function arpverifypurchasecode() {
        global $arprice_class;
        $lidata = array();

        $lidata[] = $_POST["cust_name"];
        $lidata[] = $_POST["cust_email"];
        $lidata[] = $_POST["license_key"];
        $lidata[] = $_POST["domain_name"];

        if (!isset($_POST["domain_name"]) || $_POST["domain_name"] == "" || $_SERVER["HTTP_HOST"] != $_POST["domain_name"]) {
            echo "Invalid Host Name";
            exit;
        }

        $pluginuniquecode = $arprice_class->generateplugincode();
        $lidata[] = $pluginuniquecode;
        $lidata[] = ARPURL;
        $lidata[] = get_option("arprice_version");

        $valstring = implode("||", $lidata);
        $encodedval = base64_encode($valstring);

        $urltopost = "http://www.reputeinfosystems.com/tf/plugins/arprice/verify/lic_act_with_resp.php";

        $response = wp_remote_post($urltopost, array(
            'method' => 'POST',
            'timeout' => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => array(),
            'body' => array('verifypurchase' => $encodedval),
            'cookies' => array()
                )
        );

        if (array_key_exists('body', $response) && isset($response["body"]) && $response["body"] != "")
            $responsemsg = $response["body"];
        else
            $responsemsg = "";


        if ($responsemsg != "") {
            $responsemsg = explode("|^|", $responsemsg);
            if (is_array($responsemsg) && count($responsemsg) > 0) {

                if (isset($responsemsg[0]) && $responsemsg[0] != "") {
                    $msg = $responsemsg[0];
                } else {
                    $msg = "";
                }
                if (isset($responsemsg[1]) && $responsemsg[1] != "") {
                    $code = $responsemsg[1];
                } else {
                    $code = "";
                }
                if (isset($responsemsg[2]) && $responsemsg[2] != "") {
                    $info = $responsemsg[2];
                } else {
                    $info = "";
                }

                if ($msg == "1") {
                    $checklic = $arprice_class->checksoringcode($code, $info);

                    if ($checklic == "1") {
                        return "License Activated Successfully.";
                        exit;
                    } else {
                        return "Invalid Request";
                        exit;
                    }
                } else if ($msg == "THIS PURCHASED CODE IS ALREADY USED FOR ANOTHER DOMAIN") {

                    return $responsemsg[0] . '||' . $responsemsg[1];
                    exit;
                } else {
                    return $responsemsg[0];
                    exit;
                }
            } else {
                return $responsemsg;
                exit;
            }
        } else {
            return "Invalid Request";
            exit;
        }
    }

    function checksoringcode($code, $info) {
        global $arprice_class;

        $mysortid = base64_decode($code);
        $mysortid = explode("^", $mysortid);

        if ($mysortid != "" && count($mysortid) > 0) {
            $setdata = $arprice_class->setdata($code, $info);

            return $setdata;
            exit;
        } else {
            return 0;
            exit;
        }
    }

    function setdata($code, $info) {
        if ($code != "") {
            $mysortid = base64_decode($code);
            $mysortid = explode("^", $mysortid);
            $mysortid = $mysortid[4];

            update_option("arpIsSorted", "Yes");
            update_option("arpSortOrder", $code);
            update_option("arpSortId", $mysortid);
            update_option("arpSortInfo", $info);

            return 1;
            exit;
        } else {
            return 0;
            exit;
        }
    }

    function generateplugincode() {
        $siteinfo = array();

        $siteinfo[] = get_bloginfo('name');
        $siteinfo[] = get_bloginfo('description');
        $siteinfo[] = home_url();
        $siteinfo[] = get_bloginfo('admin_email');
        $siteinfo[] = $_SERVER['SERVER_ADDR'];

        $newstr = implode("^", $siteinfo);
        $postval = base64_encode($newstr);

        return $postval;
    }

    function arprice_delete() {
        global $wpdb;
        $id = $_REQUEST['id'];
        $table = $wpdb->prefix . 'arp_arprice';
        $tbl_option = $wpdb->prefix . 'arp_arprice_options';
        $table_analytics = $wpdb->prefix . 'arp_arprice_analytics';

        $sql = $wpdb->query($wpdb->prepare('SELECT is_template FROM' . $table . ' WHERE ID = %d', $id));

        $is_template = $sql->$is_template;

        if ($is_template != 1) {
            if (file_exists(PRICINGTABLE_UPLOAD_DIR . '/css/arptemplate_' . $id . '.css'))
                @unlink(PRICINGTABLE_UPLOAD_DIR . '/css/arptemplate_' . $id . '.css');
            if (file_exists(PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $id . '.png')) {
                @unlink(PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $id . '.png');
                @unlink(PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $id . '_big.png');
                @unlink(PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $id . '_large.png');
            }
        }

        $wpdb->query($wpdb->prepare('DELETE FROM ' . $table . ' WHERE ID = %d', $id));

        $wpdb->query($wpdb->prepare('DELETE FROM ' . $tbl_option . ' WHERE table_id = %d', $id));

        $wpdb->query($wpdb->prepare('DELETE FROM ' . $table_analytics . ' WHERE pricing_table_id = %d', $id));

        //self::arprice_pagination();
        die();
    }

    function arpgetapiurl() {
        $api_url = 'http://arformsplugin.com/arp/arprice_update/arprice_api/index.php';
        return $api_url;
    }

    function table_dropdown_widget($field_name = '', $field_id = '', $default_value = '') {
        global $wpdb;
        $tables = $wpdb->get_results($wpdb->prepare("SELECT ID, table_name FROM " . $wpdb->prefix . "arp_arprice WHERE status = '%s' and is_template != '%d'", array('published', '1')));
        $price_tabel = '';
        if ($tables) {
            $price_tabel .= '<select name="' . $field_name . '" id="' . $field_id . '" class="arp_table_list">';
            foreach ($tables as $table) {
                $price_tabel .= '<option value="' . $table->ID . '" ' . selected($table->ID, $default_value, false) . '>' . $table->table_name . '</option>';
            }
            $price_tabel .= '</select>';
        }
        return $price_tabel;
    }

    function arp_import_old_templates() {
        WP_Filesystem();

        global $wpdb, $wp_filesystem, $arprice_version, $arprice_images_css_version;

        $is_new_installation = get_option('arp_is_new_installation');

        $arp_arprice_temp = $wpdb->prefix . 'arp_arprice_temp';
        $arp_arprice_options_temp = $wpdb->prefix . 'arp_arprice_options_temp';
        $arp_arprice_analytics_temp = $wpdb->prefix . 'arp_arprice_analytics_temp';

        $arp_arprice = $wpdb->prefix . 'arp_arprice';
        $arp_arprice_options = $wpdb->prefix . 'arp_arprice_options';
        $arp_arprice_analytics = $wpdb->prefix . 'arp_arprice_analytics';

        $old_templates = json_decode(stripslashes_deep($_POST['old_templates']), true);
        $css_directory = PRICINGTABLE_DIR . '/css/templates';
        if (empty($old_templates)) {
            $images = array();
            if ($wp_filesystem->is_dir($css_directory)) {
                $dir = $wp_filesystem->dirlist($css_directory);
                if (!empty($dir)) {
                    foreach ($dir as $template => $val) {
                        if (!preg_match('/' . $arprice_version . '/', $template)) {
                            $wp_filesystem->delete($css_directory . '/' . $template);
                            if (empty($images)) {
                                $images[] = str_replace('.css', '', $template);
                            } else {
                                array_push($images, str_replace('.css', '', $template));
                            }
                        }
                    }
                }
            }
            $img_dir = PRICINGTABLE_DIR . '/images';

            if (!empty($images)) {
                foreach ($images as $img) {
                    if (file_exists($img_dir . '/' . $img . '.png')) {
                        $wp_filesystem->delete($img_dir . '/' . $img . '.png');
                    }
                    if (file_exists($img_dir . '/' . $img . '_big.png')) {
                        $wp_filesystem->delete($img_dir . '/' . $img . '_big.png');
                    }
                    if (file_exists($img_dir . '/' . $img . '_large.png')) {
                        $wp_filesystem->delete($img_dir . '/' . $img . '_large.png');
                    }
                }
            }
        } else {
            $css_dir = PRICINGTABLE_DIR . '/css/templates';
            $img_dir = PRICINGTABLE_DIR . '/images/';

            foreach ($old_templates as $template) {

                $get_old_template = $wpdb->get_results($wpdb->prepare("SELECT * FROM $arp_arprice_temp WHERE ID = %d", $template));

                $result = $get_old_template[0];

                $imported_id = $result->ID;

                $reference_id = $result->template_name;

                $general_options = maybe_unserialize($result->general_options);

                $reference_template = $general_options['general_settings']['reference_template'];

                $general_options['column_settings']['column_wrapper_width_txtbox'] = 1000;
                $general_options['column_settings']['display_col_mobile'] = 1;
                $general_options['column_settings']['display_col_tablet'] = 3;

                $general_options['column_settings']['arp_load_first_time_after_migration'] = 1;

                $general_options['column_animation']['pagi_nav_btn'] = "pagination_bottom";
                $general_options['column_animation']['navi_nav_btn'] = "navigation";

                $column_hover_effect = $general_options['column_settings']['column_highlight_on_hover'];

                if ($col_hover_effect == '0') {
                    $general_options['column_settings']['column_highlight_on_hover'] = 'hover_effect';
                } else if ($col_hover_effect == '1') {
                    $general_options['column_settings']['column_highlight_on_hover'] = 'shadow_effect';
                } else {
                    $general_options['column_settings']['column_highlight_on_hover'] = 'no_effect';
                }

                $general_options['column_settings']['column_box_shadow_effect'] = 'shadow_style_none';
                if ($reference_template == 'arptemplate_2') {
                    $general_options['column_settings']['column_border_radius_top_left'] = $general_options['column_settings']['column_border_radius_top_right'] = $general_options['column_settings']['column_border_radius_bottom_left'] = $general_options['column_settings']['column_border_radius_bottom_right'] = 7;
                } else if ($reference_template == 'arptemplate_23') {
                    $general_options['column_settings']['column_border_radius_top_left'] = $general_options['column_settings']['column_border_radius_top_right'] = $general_options['column_settings']['column_border_radius_bottom_left'] = $general_options['column_settings']['column_border_radius_bottom_right'] = 6;
                } else if ($reference_template == 'arptemplate_22') {
                    $general_options['column_settings']['column_border_radius_top_left'] = $general_options['column_settings']['column_border_radius_top_right'] = $general_options['column_settings']['column_border_radius_bottom_left'] = $general_options['column_settings']['column_border_radius_bottom_right'] = 4;
                } else {
                    $general_options['column_settings']['column_border_radius_top_left'] = $general_options['column_settings']['column_border_radius_top_right'] = $general_options['column_settings']['column_border_radius_bottom_left'] = $general_options['column_settings']['column_border_radius_bottom_right'] = 0;
                }

                $general_options['tooltip_settings']['tooltip_trigger_type'] = 'hover';
                $general_options['tooltip_settings']['tooltip_display_style'] = 'default';

                $general_options = maybe_serialize($general_options);

                $query = $wpdb->prepare("INSERT INTO $arp_arprice ( table_name, template_name, general_options, is_template, is_animated, status, create_date, arp_last_updated_date ) VALUES ( %s,%d,%s,%d,%d,%s,%s,%s )", $result->table_name, 0, $general_options, 0, $result->is_animated, $result->status, $result->create_date, $result->arp_last_updated_date);

                $wpdb->query($query);

                $table_id = $wpdb->insert_id;

                $qry_analytic = $wpdb->prepare("UPDATE `$arp_arprice_analytics` SET `pricing_table_id` = %d WHERE `ref_template_id` = %d", $table_id, $template);

                $wpdb->query($qry_analytic);

                $get_old_options = $wpdb->get_results($wpdb->prepare("SELECT * FROM $arp_arprice_options_temp WHERE ID = %d", $imported_id));

                $result_opt = $get_old_options[0];

                $qry_opt = $wpdb->prepare("INSERT INTO $arp_arprice_options ( table_id, table_options ) VALUES ( %d, %s )", $table_id, $result_opt->table_options);

                $wpdb->query($qry_opt);

                $file = $css_directory . '/arptemplate_' . $reference_id . '.css';

                $new_file = PRICINGTABLE_UPLOAD_DIR . '/css/arptemplate_' . $table_id . '.css';

                if ($reference_id == 0) {
                    $reference_id = $result->ref_table_name;
                    $file = PRICINGTABLE_UPLOAD_DIR . '/css/arptemplate_' . $reference_id . '.css';
                }

                $file = $css_directory . '/' . $reference_template . '_v' . $arprice_images_css_version . '.css';

                $css = file_get_contents($file);

                $css_content = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $table_id, $css);
                $css_content = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $css_content);

                $wp_filesystem->put_contents($new_file, $css_content, 0777);

                //$wp_filesystem->delete( $file );

                $image_path = PRICINGTABLE_DIR . '/images';

                $upload_path = PRICINGTABLE_UPLOAD_DIR . '/template_images';

                $img_normal = $image_path . '/arptemplate_' . $reference_id . '.png';

                if ($result->is_template == 0) {
                    $img_normal = $upload_path . '/arptemplate_' . $reference_id . '.png';
                }

                $img_large = $image_path . '/arptemplate_' . $reference_id . '_large.png';

                if ($result->is_template == 0) {
                    $img_large = $upload_path . '/arptemplate_' . $reference_id . '_large.png';
                }

                $img_big = $image_path . '/arptemplate_' . $reference_id . '_big.png';

                if ($result->is_template == 0) {
                    $img_big = $upload_path . '/arptemplate_' . $reference_id . '_big.png';
                }

                $new_img_normal = PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $table_id . '.png';

                $new_img_large = PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $table_id . '_large.png';
                $new_img_big = PRICINGTABLE_UPLOAD_DIR . '/template_images/arptemplate_' . $table_id . '_big.png';

                $wp_filesystem->move($img_normal, $new_img_normal, true);

                $wp_filesystem->delete($img_normal);

                $wp_filesystem->move($img_large, $new_img_large, true);

                $wp_filesystem->delete($img_large);

                $wp_filesystem->move($img_big, $new_img_big, true);

                $wp_filesystem->delete($img_big);
            }

            $imported_ids = implode(',', $old_templates);
            $wpdb->query("DELETE FROM $arp_arprice_analytics WHERE ref_template_id NOT IN ( $imported_ids )");

            $wpdb->query("ALTER TABLE `$arp_arprice_analytics` DROP COLUMN `ref_template_id`");

            $sel_temp_tbl = $wpdb->get_results("SELECT ref_table_name,is_template FROM `$arp_arprice_temp` ORDER BY ID ASC ");

            if (!empty($sel_temp_tbl)) {
                $img_dir = PRICINGTABLE_DIR . '/images';
                $img_upload_dir = PRICINGTABLE_UPLOAD_DIR . '/template_images/';
                $css_dir = PRICINGTABLE_DIR . '/css/templates';
                $css_upload_dir = PRICINGTABLE_UPLOAD_DIR . '/css/';
                foreach ($sel_temp_tbl as $key => $val) {

                    $ref_table_name = $val->ref_table_name;
                    $is_template = $val->is_template;

                    $cssname = 'arptemplate_' . $ref_table_name . '.css';
                    $imgname = 'arptemplate_' . $ref_table_name . '.png';
                    $imglnme = 'arptemplate_' . $ref_table_name . '_big.png';
                    $imgbnme = 'arptemplate_' . $ref_table_name . '_large.png';

                    if ($is_template == 1) {
                        if (file_exists($css_dir . '/' . $cssname)) {
                            $wp_filesystem->delete($css_dir . '/' . $cssname);
                        }
                        if (file_exists($img_dir . '/' . $imgname)) {
                            $wp_filesystem->delete($img_dir . '/' . $imgname);
                        }
                        if (file_exists($img_dir . '/' . $imglnme)) {
                            $wp_filesystem->delete($img_dir . '/' . $imglnme);
                        }
                        if (file_exists($img_dir . '/' . $imgbnme)) {
                            $wp_filesystem->delete($img_dir . '/' . $imgbnme);
                        }
                    } else {
                        if (file_exists($css_upload_dir . '/' . $cssname)) {
                            $wp_filesystem->delete($css_upload_dir . '/' . $cssname);
                        }
                        if (file_exists($img_upload_dir . '/' . $imgname)) {
                            $wp_filesystem->delete($img_upload_dir . '/' . $imgname);
                        }
                        if (file_exists($img_upload_dir . '/' . $imglnme)) {
                            $wp_filesystem->delete($img_upload_dir . '/' . $imglnme);
                        }
                        if (file_exists($img_upload_dir . '/' . $imgbnme)) {
                            $wp_filesystem->delete($img_upload_dir . '/' . $imgbnme);
                        }
                    }
                }
            }


            $wpdb->query("DROP TABLE `$arp_arprice_temp` ");

            $wpdb->query("DROP TABLE `$arp_arprice_options_temp` ");
        }
        update_option('arp_is_dashboard_visited', 1);
        die();
    }

    function arp_get_remote_post_params($plugin_info = "") {
        global $wpdb;

        $action = "";
        $action = $plugin_info;

        if (!function_exists('get_plugins')) {
            require_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }
        $plugin_list = get_plugins();
        $site_url = home_url();
        $plugins = array();

        $active_plugins = get_option('active_plugins');

        foreach ($plugin_list as $key => $plugin) {
            $is_active = in_array($key, $active_plugins);

            //filter for only arprice ones, may get some others if using our naming convention
            if (strpos(strtolower($plugin["Title"]), "arprice") !== false) {
                $name = substr($key, 0, strpos($key, "/"));
                $plugins[] = array("name" => $name, "version" => $plugin["Version"], "is_active" => $is_active);
            }
        }
        $plugins = json_encode($plugins);

        //get theme info
        $theme = wp_get_theme();
        $theme_name = $theme->get("Name");
        $theme_uri = $theme->get("ThemeURI");
        $theme_version = $theme->get("Version");
        $theme_author = $theme->get("Author");
        $theme_author_uri = $theme->get("AuthorURI");

        $im = is_multisite();
        $sortorder = get_option("arpSortOrder");

        $post = array("wp" => get_bloginfo("version"), "php" => phpversion(), "mysql" => $wpdb->db_version(), "plugins" => $plugins, "tn" => $theme_name, "tu" => $theme_uri, "tv" => $theme_version, "ta" => $theme_author, "tau" => $theme_author_uri, "im" => $im, "sortorder" => $sortorder);

        return $post;
    }

}

?>