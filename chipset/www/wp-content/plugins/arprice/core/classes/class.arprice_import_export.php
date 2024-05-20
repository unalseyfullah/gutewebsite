<?php

class arprice_import_export {

    function __construct() {

        add_action('wp_ajax_import_table', array(&$this, 'import_table'));

        add_action('wp_ajax_get_table_list', array(&$this, 'export_table_list'));

        add_action('init', array(&$this, 'arp_export_pricing_tables'));
    }

    function arp_export_pricing_tables() {

        if (is_admin()) {

            if (isset($_POST['export_tables']) && $_REQUEST['page'] = 'arp_import_export') {
                global $wpdb, $arprice_import_export;

                $arp_db_version = get_option('arprice_version');

                $wp_upload_dir = wp_upload_dir();
                $upload_dir = $wp_upload_dir['basedir'] . '/arprice/';
                $upload_dir_url = $wp_upload_dir['url'];
                $upload_dir_base_url = $wp_upload_dir['baseurl'] . '/arprice/';
                $charset = get_option('blog_charset');

                @ini_set('max_execution_time', 0);

                if (!empty($_REQUEST['arp_table_to_export'])) {
                    $table_ids = implode(',', $_REQUEST['arp_table_to_export']);

                    $file_name = "arp_" . time();

                    $filename = $file_name . '.txt';

                    $sql_main = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "arp_arprice WHERE ID in(" . $table_ids . ")");

                    $xml = "";
                    $xml .= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

                    $xml .= "<arp_tables>\n";

                    foreach ($sql_main as $key => $result) {

                        $xml .= "\t<arp_table id='" . $result->ID . "'>\n";

                        $xml .= "\t\t<site_url><![CDATA[" . site_url() . "]]></site_url>\n";

                        $xml .= "\t\t<arp_plugin_version><![CDATA[" . $arp_db_version . "]]></arp_plugin_version>\n";

                        $xml .= "\t\t<arp_table_name><![CDATA[" . $result->table_name . "]]></arp_table_name>\n";

                        $xml .= "\t\t<status><![CDATA[" . $result->status . "]]></status>\n";

                        $xml .= "\t\t<is_template><![CDATA[" . $result->is_template . "]]></is_template>\n";

                        $xml .= "\t\t<template_name><![CDATA[" . $result->template_name . "]]></template_name>\n";

                        $xml .= "\t\t<is_animated><![CDATA[" . $result->is_animated . "]]></is_animated>\n";


                        if ($arp_db_version > '2.0') {
                            $arp_db_version1 = '2.0';
                        }
                        //$xml .= "\t\t<pricing_css><![CDATA[" . $result->pricing_css . "]]></pricing_css>\n";

                        $general_options_new = unserialize($result->general_options);

                        $arp_main_reference_template = $general_options_new['general_settings']['reference_template'];

                        $arp_exp_arp_main_reference_template = explode('_', $arp_main_reference_template);

                        $arp_new_arp_main_reference_template = $arp_exp_arp_main_reference_template[1];

                        if ($result->is_template == 1) {

                            $xml .= "\t\t<arp_template_img><![CDATA[" . PRICINGTABLE_URL . "/images/arptemplate_" . $arp_new_arp_main_reference_template . "_v" . $arp_db_version1 . ".png" . "]]></arp_template_img>";
                            $xml .= "\t\t<arp_template_img_big><![CDATA[" . PRICINGTABLE_URL . "/images/arptemplate_" . $arp_new_arp_main_reference_template . "_v" . $arp_db_version1 . "_big.png" . "]]></arp_template_img_big>";
                            $xml .= "\t\t<arp_template_img_large><![CDATA[" . PRICINGTABLE_URL . "/images/arptemplate_" . $arp_new_arp_main_reference_template . "_" . $arp_db_version1 . "_large.png" . "]]></arp_template_img_large>";

                            //$css = file_get_contents(PRICINGTABLE_DIR . '/css/templates/arptemplate_' . $result->template_name . '_v' . $arp_db_version . '.css');
                            //$css = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $css);
                        } else {
                            $xml .= "\t\t<arp_template_img><![CDATA[" . $upload_dir_base_url . "template_images/arptemplate_" . $result->ID . ".png" . "]]></arp_template_img>";
                            $xml .= "\t\t<arp_template_img_big><![CDATA[" . $upload_dir_base_url . "template_images/arptemplate_" . $result->ID . "_big.png" . "]]></arp_template_img_big>";
                            $xml .= "\t\t<arp_template_img_large><![CDATA[" . $upload_dir_base_url . "template_images/arptemplate_" . $result->ID . "_large.png" . "]]></arp_template_img_large>";


                            //$css = file_get_contents(PRICINGTABLE_UPLOAD_DIR . '/css/arptemplate_' . $result->ID . '.css');
                        }


                        $xml .= "\t\t<options>\n";

                        $xml .= "\t\t\t<general_options>";

                        $arp_general_options = unserialize($result->general_options);

                        $arp_gen_opt_new = array();

                        $new_general_options = $this->arprice_recursive_array_function($arp_general_options, 'export');

                        $general_opt = serialize($new_general_options);

                        $xml .= "<![CDATA[" . $general_opt . "]]>";

                        $xml .= "</general_options>\n";

                        $sql = $wpdb->get_results($wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "arp_arprice_options WHERE table_id = %d", $result->ID));

                        $xml .= "\t\t\t<column_options>";

                        $table_opts = unserialize($sql[0]->table_options);

                        $arp_tbl_opt = array();

                        $new_array = $this->arprice_recursive_array_function($table_opts, 'export');

                        $table_opts = serialize($new_array);

                        $xml .= "<![CDATA[" . $table_opts . "]]>";

                        $xml .= "</column_options>\n";

                        $xml .= "\t\t</options>\n";

                        $table_opt = unserialize($sql[0]->table_options);

                        foreach ($table_opt['columns'] as $c => $res) {
                            $str = isset($res['arp_header_shortcode']) ? $res['arp_header_shortcode'] : '';
                            $str1 = isset($res['arp_header_shortcode_second']) ? $res['arp_header_shortcode_second'] : '';
                            $str2 = isset($res['arp_header_shortcode_third']) ? $res['arp_header_shortcode_third'] : '';

                            $btn_img = isset($res['btn_img']) ? $res['btn_img'] : '';

                            $column_back_image = isset($res['column_background_image']) ? $res['column_background_image'] : '';

                            if ($btn_img != "") {
                                $btn_img_src = $btn_img;
                                $img_file_name = explode('/', $btn_img_src);
                                $btn_img_file = $img_file_name[count($img_file_name) - 1];

                                @copy($btn_img, $upload_dir . "temp_" . $btn_img_file);

                                if (file_exists($upload_dir . "temp_" . $btn_img_file)) {

                                    $filename_arry[] = "temp_" . $btn_img_file;

                                    $button_img = "temp_" . $file_name;

                                    $xml .= "\t\t<" . $c . "_btn_img>" . $btn_img_src . "</" . $c . "_btn_img>\n";
                                }
                            }

                            if ($column_back_image != "") {
                                $column_img_src = $column_back_image;
                                $img_file_name = explode('/', $column_img_src);
                                $btn_img_file = $img_file_name[count($img_file_name) - 1];

                                @copy($column_back_image, $upload_dir . "temp_" . $btn_img_file);

                                if (file_exists($upload_dir . "temp_" . $btn_img_file)) {

                                    $filename_arry[] = "temp_" . $btn_img_file;

                                    $button_img = "temp_" . $file_name;

                                    $xml .= "\t\t<" . $c . "_background_image>" . $column_img_src . "</" . $c . "_background_image>\n";
                                }
                            }


                            if ($str != "" || $str1 != "" || $str2 != "") {

                                $header_img = esc_html(stristr($str, '<img'));
                                $header_img1 = esc_html(stristr($str1, '<img'));
                                $header_img2 = esc_html(stristr($str2, '<img'));

                                $google_map_marker = stristr($str, '[arp_googlemap');
                                $google_map_marker1 = stristr($str1, '[arp_googlemap');
                                $google_map_marker2 = stristr($str2, '[arp_googlemap');

                                $html5_video = stristr($str, '[arp_html5_video');
                                $html5_video1 = stristr($str1, '[arp_html5_video');
                                $html5_video2 = stristr($str2, '[arp_html5_video');

                                $html5_audio = stristr($str, '[arp_html5_audio');
                                $html5_audio1 = stristr($str1, '[arp_html5_audio');
                                $html5_audio2 = stristr($str2, '[arp_html5_audio');

                                if ($header_img != "") {
                                    $img_src = $arprice_import_export->getAttribute('src', $str);

                                    $img_height = $arprice_import_export->getAttribute('height', $header_img);

                                    $img_width = $arprice_import_export->getAttribute('width', $header_img);

                                    $img_class = $arprice_import_export->getAttribute('class', $header_img);

                                    $img_src = trim($img_src, '&quot;');
                                    $img_src = trim($img_src, '"');
                                    $img_height = trim($img_height, '&quot;');
                                    $img_height = trim($img_height, '"');
                                    $img_width = trim($img_width, '&quot;');
                                    $img_width = trim($img_width, '"');
                                    $img_class = trim($img_class, '&quot;');
                                    $img_class = trim($img_class, '"');

                                    $img_height = (!empty($img_height) ) ? $img_height : '';
                                    $img_width = (!empty($img_width) ) ? $img_width : '';
                                    $img_class = (!empty($img_class) ) ? $img_class : '';
                                    $img_src = (!empty($img_src) ) ? $img_src : '';

                                    $explodefilename = explode('/', $img_src);

                                    $header_img_name = $explodefilename[count($explodefilename) - 1];

                                    $header_img = $header_img_name;

                                    if ($header_img != "") {
                                        $newfilename1 = $header_img;

                                        @copy($img_src, $upload_dir . "temp_" . $newfilename1);

                                        if (file_exists($upload_dir . "temp_" . $newfilename1)) {

                                            $filename_arry[] = "temp_" . $newfilename1;

                                            $header_img = "temp_" . $newfilename1;
                                        }
                                    }

                                    if (file_exists($upload_dir . "temp_" . $newfilename1)) {

                                        $xml .= "\t\t<" . $c . "_img>" . $img_src . "</" . $c . "_img>\n";

                                        $xml .= "\t\t<" . $c . "_img_width>" . $img_width . "</" . $c . "_img_width>\n";

                                        $xml .= "\t\t<" . $c . "_img_height>" . $img_height . "</" . $c . "_img_height>\n";

                                        $xml .= "\t\t<" . $c . "_img_class>" . $img_class . "</" . $c . "_img_class>\n";
                                    }
                                }
                                if ($header_img1 != "") {
                                    $img_src = $arprice_import_export->getAttribute('src', $str1);

                                    $img_height = $arprice_import_export->getAttribute('height', $header_img1);

                                    $img_width = $arprice_import_export->getAttribute('width', $header_img1);

                                    $img_class = $arprice_import_export->getAttribute('class', $header_img1);

                                    $img_src = trim($img_src, '&quot;');
                                    $img_src = trim($img_src, '"');
                                    $img_height = trim($img_height, '&quot;');
                                    $img_height = trim($img_height, '"');
                                    $img_width = trim($img_width, '&quot;');
                                    $img_width = trim($img_width, '"');
                                    $img_class = trim($img_class, '&quot;');
                                    $img_class = trim($img_class, '"');

                                    $img_height = (!empty($img_height) ) ? $img_height : '';
                                    $img_width = (!empty($img_width) ) ? $img_width : '';
                                    $img_class = (!empty($img_class) ) ? $img_class : '';
                                    $img_src = (!empty($img_src) ) ? $img_src : '';

                                    $explodefilename = explode('/', $img_src);

                                    $header_img_name = $explodefilename[count($explodefilename) - 1];

                                    $header_img = $header_img_name;

                                    if ($header_img != "") {
                                        $newfilename1 = $header_img;

                                        @copy($img_src, $upload_dir . "temp_" . $newfilename1);

                                        if (file_exists($upload_dir . "temp_" . $newfilename1)) {

                                            $filename_arry[] = "temp_" . $newfilename1;

                                            $header_img = "temp_" . $newfilename1;
                                        }
                                    }

                                    if (file_exists($upload_dir . "temp_" . $newfilename1)) {

                                        $xml .= "\t\t<" . $c . "_img_second>" . $img_src . "</" . $c . "_img_second>\n";

                                        $xml .= "\t\t<" . $c . "_img_second_width>" . $img_width . "</" . $c . "_img_second_width>\n";

                                        $xml .= "\t\t<" . $c . "_img_second_height>" . $img_height . "</" . $c . "_img_second_height>\n";

                                        $xml .= "\t\t<" . $c . "_img_second_class>" . $img_class . "</" . $c . "_img_second_class>\n";
                                    }
                                }
                                if ($header_img2 != "") {
                                    $img_src = $arprice_import_export->getAttribute('src', $str2);

                                    $img_height = $arprice_import_export->getAttribute('height', $header_img2);

                                    $img_width = $arprice_import_export->getAttribute('width', $header_img2);

                                    $img_class = $arprice_import_export->getAttribute('class', $header_img2);

                                    $img_src = trim($img_src, '&quot;');
                                    $img_src = trim($img_src, '"');
                                    $img_height = trim($img_height, '&quot;');
                                    $img_height = trim($img_height, '"');
                                    $img_width = trim($img_width, '&quot;');
                                    $img_width = trim($img_width, '"');
                                    $img_class = trim($img_class, '&quot;');
                                    $img_class = trim($img_class, '"');

                                    $img_height = (!empty($img_height) ) ? $img_height : '';
                                    $img_width = (!empty($img_width) ) ? $img_width : '';
                                    $img_class = (!empty($img_class) ) ? $img_class : '';
                                    $img_src = (!empty($img_src) ) ? $img_src : '';

                                    $explodefilename = explode('/', $img_src);

                                    $header_img_name = $explodefilename[count($explodefilename) - 1];

                                    $header_img = $header_img_name;

                                    if ($header_img != "") {
                                        $newfilename1 = $header_img;

                                        @copy($img_src, $upload_dir . "temp_" . $newfilename1);

                                        if (file_exists($upload_dir . "temp_" . $newfilename1)) {

                                            $filename_arry[] = "temp_" . $newfilename1;

                                            $header_img = "temp_" . $newfilename1;
                                        }
                                    }

                                    if (file_exists($upload_dir . "temp_" . $newfilename1)) {

                                        $xml .= "\t\t<" . $c . "_img_third>" . $img_src . "</" . $c . "_img_third>\n";

                                        $xml .= "\t\t<" . $c . "_img_width_third>" . $img_width . "</" . $c . "_img_width_third>\n";

                                        $xml .= "\t\t<" . $c . "_img_height_third>" . $img_height . "</" . $c . "_img_height_third>\n";

                                        $xml .= "\t\t<" . $c . "_img_class_third>" . $img_class . "</" . $c . "_img_class_third>\n";
                                    }
                                }
                                if ($google_map_marker != "" || $google_map_marker1 != "" || $google_map_marker2 != "") {

                                    $gmap_marker_img = $res['gmap_marker'];
                                    $gmap_img = explode('/', $gmap_marker_img);
                                    $gmap_img = $gmap_img[count($gmap_img) - 1];

                                    @copy($gmap_marker_img, $upload_dir . "temp_" . $gmap_img);

                                    if (file_exists($upload_dir . "temp_" . $gmap_img)) {

                                        $filename_arry[] = "temp_" . $gmap_img;

                                        $marker_image = "temp_" . $gmap_img;

                                        $xml .= "\t\t<" . $c . "_gmap_marker>" . $gmap_marker_img . "</" . $c . "_gmap_marker>\n";
                                    }
                                }
                                if ($html5_video != "") {
                                    $pattern = get_shortcode_regex();
                                    preg_match('/' . $pattern . '/s', $res['arp_header_shortcode'], $preg_matches);
                                    $string = $preg_matches[3];

                                    $mp4_video = $arprice_import_export->getAttribute('mp4', $res['arp_header_shortcode']);
                                    $mp4_video = trim($mp4_video, '"');

                                    if ($mp4_video != "") {
                                        $mp4_video_name = explode('/', $mp4_video);
                                        $mp4_video_name = $mp4_video_name[count($mp4_video_name) - 1];

                                        @copy($mp4_video, $upload_dir . "temp_" . $mp4_video_name);

                                        if (file_exists($upload_dir . "temp_" . $mp4_video_name)) {

                                            $filename_arry[] = "temp_" . $mp4_video_name;

                                            $mp4_video_name = "temp_" . $mp4_video_name;

                                            $xml .= "\t\t<" . $c . "_html5_mp4_video>" . $mp4_video . "</" . $c . "_html5_mp4_video>\n";
                                        }
                                    }

                                    $webm_video = $arprice_import_export->getAttribute('webm', $res['arp_header_shortcode']);
                                    $webm_video = trim($webm_video, '"');

                                    if ($webm_video != "") {
                                        $webm_video_name = explode('/', $webm_video);
                                        $webm_video_name = $webm_video_name[count($webm_video_name) - 1];

                                        @copy($webm_video, $upload_dir . 'temp_' . $webm_video_name);

                                        if (file_exists($upload_dir . "temp_" . $webm_video_name)) {

                                            $filename_arry[] = "temp_" . $webm_video_name;

                                            $webm_video_name = "temp_" . $webm_video_name;

                                            $xml .= "\t\t<" . $c . "_html5_webm_video>" . $webm_video . "</" . $c . "_html5_webm_video>\n";
                                        }
                                    }

                                    $ogg_video = $arprice_import_export->getAttribute('ogg', $res['arp_header_shortcode']);
                                    $ogg_video = trim($ogg_video, '"');

                                    if ($ogg_video != "") {
                                        $ogg_video_name = explode('/', $ogg_video);
                                        $ogg_video_name = $ogg_video_name[count($ogg_video_name) - 1];

                                        @copy($ogg_video, $upload_dir . 'temp_' . $ogg_video_name);

                                        if (file_exists($upload_dir . "temp_" . $ogg_video_name)) {

                                            $filename_arry[] = "temp_" . $ogg_video_name;

                                            $ogg_video_name = "temp_" . $ogg_video_name;

                                            $xml .= "\t\t<" . $c . "_html5_ogg_video>" . $ogg_video . "</" . $c . "_html5_ogg_video>\n";
                                        }
                                    }

                                    $poster_img = $arprice_import_export->getAttribute('poster', $res['arp_header_shortcode']);
                                    $poster_img = trim($poster_img, '"');

                                    if ($poster_img != "") {
                                        $poster_img_nm = explode('/', $poster_img);
                                        $poster_img_nm = $poster_img_nm[count($poster_img_nm) - 1];

                                        @copy($poster_img, $upload_dir . 'temp_' . $poster_img_nm);

                                        if (file_exists($upload_dir . "temp_" . $poster_img_nm)) {

                                            $filename_arry[] = "temp_" . $poster_img_nm;

                                            $poster_img_nm = "temp_" . $poster_img_nm;

                                            $xml .= "\t\t<" . $c . "_html5_video_poster>" . $poster_img . "</" . $c . "_html5_video_poster>\n";
                                        }
                                    }
                                }
                                if ($html5_video1 != "") {
                                    $pattern = get_shortcode_regex();
                                    preg_match('/' . $pattern . '/s', $res['arp_header_shortcode_second'], $preg_matches);
                                    $string = $preg_matches[3];

                                    $mp4_video = $arprice_import_export->getAttribute('mp4', $res['arp_header_shortcode_second']);
                                    $mp4_video = trim($mp4_video, '"');

                                    if ($mp4_video != "") {
                                        $mp4_video_name = explode('/', $mp4_video);
                                        $mp4_video_name = $mp4_video_name[count($mp4_video_name) - 1];

                                        @copy($mp4_video, $upload_dir . "temp_" . $mp4_video_name);

                                        if (file_exists($upload_dir . "temp_" . $mp4_video_name)) {

                                            $filename_arry[] = "temp_" . $mp4_video_name;

                                            $mp4_video_name = "temp_" . $mp4_video_name;

                                            $xml .= "\t\t<" . $c . "_html5_mp4_video_second>" . $mp4_video . "</" . $c . "_html5_mp4_video_second>\n";
                                        }
                                    }

                                    $webm_video = $arprice_import_export->getAttribute('webm', $res['arp_header_shortcode_second']);
                                    $webm_video = trim($webm_video, '"');

                                    if ($webm_video != "") {
                                        $webm_video_name = explode('/', $webm_video);
                                        $webm_video_name = $webm_video_name[count($webm_video_name) - 1];

                                        @copy($webm_video, $upload_dir . 'temp_' . $webm_video_name);

                                        if (file_exists($upload_dir . "temp_" . $webm_video_name)) {

                                            $filename_arry[] = "temp_" . $webm_video_name;

                                            $webm_video_name = "temp_" . $webm_video_name;

                                            $xml .= "\t\t<" . $c . "_html5_webm_video_second>" . $webm_video . "</" . $c . "_html5_webm_video_second>\n";
                                        }
                                    }

                                    $ogg_video = $arprice_import_export->getAttribute('ogg', $res['arp_header_shortcode_second']);
                                    $ogg_video = trim($ogg_video, '"');

                                    if ($ogg_video != "") {
                                        $ogg_video_name = explode('/', $ogg_video);
                                        $ogg_video_name = $ogg_video_name[count($ogg_video_name) - 1];

                                        @copy($ogg_video, $upload_dir . 'temp_' . $ogg_video_name);

                                        if (file_exists($upload_dir . "temp_" . $ogg_video_name)) {

                                            $filename_arry[] = "temp_" . $ogg_video_name;

                                            $ogg_video_name = "temp_" . $ogg_video_name;

                                            $xml .= "\t\t<" . $c . "_html5_ogg_video_second>" . $ogg_video . "</" . $c . "_html5_ogg_video_second>\n";
                                        }
                                    }

                                    $poster_img = $arprice_import_export->getAttribute('poster', $res['arp_header_shortcode_second']);
                                    $poster_img = trim($poster_img, '"');

                                    if ($poster_img != "") {
                                        $poster_img_nm = explode('/', $poster_img);
                                        $poster_img_nm = $poster_img_nm[count($poster_img_nm) - 1];

                                        @copy($poster_img, $upload_dir . 'temp_' . $poster_img_nm);

                                        if (file_exists($upload_dir . "temp_" . $poster_img_nm)) {

                                            $filename_arry[] = "temp_" . $poster_img_nm;

                                            $poster_img_nm = "temp_" . $poster_img_nm;

                                            $xml .= "\t\t<" . $c . "_html5_video_poster_second>" . $poster_img . "</" . $c . "_html5_video_poster_second>\n";
                                        }
                                    }
                                }
                                if ($html5_video2 != "") {
                                    $pattern = get_shortcode_regex();
                                    preg_match('/' . $pattern . '/s', $res['arp_header_shortcode_third'], $preg_matches);
                                    $string = $preg_matches[3];

                                    $mp4_video = $arprice_import_export->getAttribute('mp4', $res['arp_header_shortcode_third']);
                                    $mp4_video = trim($mp4_video, '"');

                                    if ($mp4_video != "") {
                                        $mp4_video_name = explode('/', $mp4_video);
                                        $mp4_video_name = $mp4_video_name[count($mp4_video_name) - 1];

                                        @copy($mp4_video, $upload_dir . "temp_" . $mp4_video_name);

                                        if (file_exists($upload_dir . "temp_" . $mp4_video_name)) {

                                            $filename_arry[] = "temp_" . $mp4_video_name;

                                            $mp4_video_name = "temp_" . $mp4_video_name;

                                            $xml .= "\t\t<" . $c . "_html5_mp4_video_third>" . $mp4_video . "</" . $c . "_html5_mp4_video_third>\n";
                                        }
                                    }

                                    $webm_video = $arprice_import_export->getAttribute('webm', $res['arp_header_shortcode_third']);
                                    $webm_video = trim($webm_video, '"');

                                    if ($webm_video != "") {
                                        $webm_video_name = explode('/', $webm_video);
                                        $webm_video_name = $webm_video_name[count($webm_video_name) - 1];

                                        @copy($webm_video, $upload_dir . 'temp_' . $webm_video_name);

                                        if (file_exists($upload_dir . "temp_" . $webm_video_name)) {

                                            $filename_arry[] = "temp_" . $webm_video_name;

                                            $webm_video_name = "temp_" . $webm_video_name;

                                            $xml .= "\t\t<" . $c . "_html5_webm_video_third>" . $webm_video . "</" . $c . "_html5_webm_video_third>\n";
                                        }
                                    }

                                    $ogg_video = $arprice_import_export->getAttribute('ogg', $res['arp_header_shortcode_third']);
                                    $ogg_video = trim($ogg_video, '"');

                                    if ($ogg_video != "") {
                                        $ogg_video_name = explode('/', $ogg_video);
                                        $ogg_video_name = $ogg_video_name[count($ogg_video_name) - 1];

                                        @copy($ogg_video, $upload_dir . 'temp_' . $ogg_video_name);

                                        if (file_exists($upload_dir . "temp_" . $ogg_video_name)) {

                                            $filename_arry[] = "temp_" . $ogg_video_name;

                                            $ogg_video_name = "temp_" . $ogg_video_name;

                                            $xml .= "\t\t<" . $c . "_html5_ogg_video_third>" . $ogg_video . "</" . $c . "_html5_ogg_video_third>\n";
                                        }
                                    }

                                    $poster_img = $arprice_import_export->getAttribute('poster', $res['arp_header_shortcode_third']);
                                    $poster_img = trim($poster_img, '"');

                                    if ($poster_img != "") {
                                        $poster_img_nm = explode('/', $poster_img);
                                        $poster_img_nm = $poster_img_nm[count($poster_img_nm) - 1];

                                        @copy($poster_img, $upload_dir . 'temp_' . $poster_img_nm);

                                        if (file_exists($upload_dir . "temp_" . $poster_img_nm)) {

                                            $filename_arry[] = "temp_" . $poster_img_nm;

                                            $poster_img_nm = "temp_" . $poster_img_nm;

                                            $xml .= "\t\t<" . $c . "_html5_video_poster_third>" . $poster_img . "</" . $c . "_html5_video_poster_third>\n";
                                        }
                                    }
                                }

                                if ($html5_audio != "") {
                                    $pattern = get_shortcode_regex();
                                    preg_match('/' . $pattern . '/s', $res['arp_header_shortcode'], $preg_matches);
                                    $string = $preg_matches[3];

                                    $mp3_audio = $arprice_import_export->getAttribute('mp3', $res['arp_header_shortcode']);
                                    $mp3_audio = trim($mp3_audio, '"');

                                    if ($mp3_audio != "") {
                                        $mp3_audio_name = explode('/', $mp3_audio);
                                        $mp3_audio_name = $mp3_audio_name[count($mp3_audio_name) - 1];

                                        @copy($mp3_audio, $upload_dir . 'temp_' . $mp3_audio_name);

                                        if (file_exists($upload_dir . "temp_" . $mp3_audio_name)) {

                                            $filename_arry[] = "temp_" . $mp3_audio_name;

                                            $mp3_audio_name = "temp_" . $mp3_audio_name;

                                            $xml .= "\t\t<" . $c . "_html5_mp3_audio>" . $mp3_audio . "</" . $c . "_html5_mp3_audio>\n";
                                        }
                                    }

                                    $ogg_audio = $arprice_import_export->getAttribute('ogg', $res['arp_header_shortcode']);
                                    $ogg_audio = trim($ogg_audio, '"');

                                    if ($ogg_audio != "") {
                                        $ogg_audio_name = explode('/', $ogg_audio);
                                        $ogg_audio_name = $ogg_audio_name[count($ogg_audio_name) - 1];

                                        @copy($ogg_audio, $upload_dir . 'temp_' . $ogg_audio_name);

                                        if (file_exists($upload_dir . "temp_" . $ogg_audio_name)) {

                                            $filename_arry[] = 'temp_' . $ogg_audio_name;

                                            $ogg_audio_name = 'temp_' . $ogg_audio_name;

                                            $xml .= "\t\t<" . $c . "_html5_ogg_audio>" . $ogg_audio . "</" . $c . "_html5_ogg_audio>\n";
                                        }
                                    }

                                    $wav_audio = $arprice_import_export->getAttribute('wav', $res['arp_header_shortcode']);
                                    $wav_audio = trim($wav_audio, '"');

                                    if ($wav_audio != "") {
                                        $wav_audio_name = explode('/', $wav_audio);
                                        $wav_audio_name = $wav_audio_name[count($wav_audio_name) - 1];

                                        @copy($wav_audio, $upload_dir . 'temp_' . $wav_audio_name);

                                        if (file_exists($upload_dir . "temp_" . $wav_audio_name)) {

                                            $filename_arry[] = 'temp_' . $wav_audio_name;

                                            $wav_audio_name = 'temp_' . $wav_audio_name;

                                            $xml .= "\t\t<" . $c . "_html5_wav_audio>" . $wav_audio . "</" . $c . "_html5_wav_audio>\n";
                                        }
                                    }
                                }
                                if ($html5_audio1 != "") {
                                    $pattern = get_shortcode_regex();
                                    preg_match('/' . $pattern . '/s', $res['arp_header_shortcode_second'], $preg_matches);
                                    $string = $preg_matches[3];

                                    $mp3_audio = $arprice_import_export->getAttribute('mp3', $res['arp_header_shortcode_second']);
                                    $mp3_audio = trim($mp3_audio, '"');

                                    if ($mp3_audio != "") {
                                        $mp3_audio_name = explode('/', $mp3_audio);
                                        $mp3_audio_name = $mp3_audio_name[count($mp3_audio_name) - 1];

                                        @copy($mp3_audio, $upload_dir . 'temp_' . $mp3_audio_name);

                                        if (file_exists($upload_dir . "temp_" . $mp3_audio_name)) {

                                            $filename_arry[] = "temp_" . $mp3_audio_name;

                                            $mp3_audio_name = "temp_" . $mp3_audio_name;

                                            $xml .= "\t\t<" . $c . "_html5_mp3_audio_second>" . $mp3_audio . "</" . $c . "_html5_mp3_audio_second>\n";
                                        }
                                    }

                                    $ogg_audio = $arprice_import_export->getAttribute('ogg', $res['arp_header_shortcode_second']);
                                    $ogg_audio = trim($ogg_audio, '"');

                                    if ($ogg_audio != "") {
                                        $ogg_audio_name = explode('/', $ogg_audio);
                                        $ogg_audio_name = $ogg_audio_name[count($ogg_audio_name) - 1];

                                        @copy($ogg_audio, $upload_dir . 'temp_' . $ogg_audio_name);

                                        if (file_exists($upload_dir . "temp_" . $ogg_audio_name)) {

                                            $filename_arry[] = 'temp_' . $ogg_audio_name;

                                            $ogg_audio_name = 'temp_' . $ogg_audio_name;

                                            $xml .= "\t\t<" . $c . "_html5_ogg_audio_second>" . $ogg_audio . "</" . $c . "_html5_ogg_audio_second>\n";
                                        }
                                    }

                                    $wav_audio = $arprice_import_export->getAttribute('wav', $res['arp_header_shortcode_second']);
                                    $wav_audio = trim($wav_audio, '"');

                                    if ($wav_audio != "") {
                                        $wav_audio_name = explode('/', $wav_audio);
                                        $wav_audio_name = $wav_audio_name[count($wav_audio_name) - 1];

                                        @copy($wav_audio, $upload_dir . 'temp_' . $wav_audio_name);

                                        if (file_exists($upload_dir . "temp_" . $wav_audio_name)) {

                                            $filename_arry[] = 'temp_' . $wav_audio_name;

                                            $wav_audio_name = 'temp_' . $wav_audio_name;

                                            $xml .= "\t\t<" . $c . "_html5_wav_audio_second>" . $wav_audio . "</" . $c . "_html5_wav_audio_second>\n";
                                        }
                                    }
                                }
                                if ($html5_audio2 != "") {
                                    $pattern = get_shortcode_regex();
                                    preg_match('/' . $pattern . '/s', $res['arp_header_shortcode_third'], $preg_matches);
                                    $string = $preg_matches[3];

                                    $mp3_audio = $arprice_import_export->getAttribute('mp3', $res['arp_header_shortcode_third']);
                                    $mp3_audio = trim($mp3_audio, '"');

                                    if ($mp3_audio != "") {
                                        $mp3_audio_name = explode('/', $mp3_audio);
                                        $mp3_audio_name = $mp3_audio_name[count($mp3_audio_name) - 1];

                                        @copy($mp3_audio, $upload_dir . 'temp_' . $mp3_audio_name);

                                        if (file_exists($upload_dir . "temp_" . $mp3_audio_name)) {

                                            $filename_arry[] = "temp_" . $mp3_audio_name;

                                            $mp3_audio_name = "temp_" . $mp3_audio_name;

                                            $xml .= "\t\t<" . $c . "_html5_mp3_audio_third>" . $mp3_audio . "</" . $c . "_html5_mp3_audio_third>\n";
                                        }
                                    }

                                    $ogg_audio = $arprice_import_export->getAttribute('ogg', $res['arp_header_shortcode_third']);
                                    $ogg_audio = trim($ogg_audio, '"');

                                    if ($ogg_audio != "") {
                                        $ogg_audio_name = explode('/', $ogg_audio);
                                        $ogg_audio_name = $ogg_audio_name[count($ogg_audio_name) - 1];

                                        @copy($ogg_audio, $upload_dir . 'temp_' . $ogg_audio_name);

                                        if (file_exists($upload_dir . "temp_" . $ogg_audio_name)) {

                                            $filename_arry[] = 'temp_' . $ogg_audio_name;

                                            $ogg_audio_name = 'temp_' . $ogg_audio_name;

                                            $xml .= "\t\t<" . $c . "_html5_ogg_audio_third>" . $ogg_audio . "</" . $c . "_html5_ogg_audio_third>\n";
                                        }
                                    }

                                    $wav_audio = $arprice_import_export->getAttribute('wav', $res['arp_header_shortcode_third']);
                                    $wav_audio = trim($wav_audio, '"');

                                    if ($wav_audio != "") {
                                        $wav_audio_name = explode('/', $wav_audio);
                                        $wav_audio_name = $wav_audio_name[count($wav_audio_name) - 1];

                                        @copy($wav_audio, $upload_dir . 'temp_' . $wav_audio_name);

                                        if (file_exists($upload_dir . "temp_" . $wav_audio_name)) {

                                            $filename_arry[] = 'temp_' . $wav_audio_name;

                                            $wav_audio_name = 'temp_' . $wav_audio_name;

                                            $xml .= "\t\t<" . $c . "_html5_wav_audio_third>" . $wav_audio . "</" . $c . "_html5_wav_audio_third>\n";
                                        }
                                    }
                                }
                            }
                        }

                        $xml .= "\t</arp_table>\n\n";
                    }

                    $xml .= "</arp_tables>";


                    $xml = base64_encode($xml);



                    header("Content-type: text/plain");
                    header("Content-Disposition: attachment; filename=" . $filename);

                    ob_start();
                    echo $xml;
                    die;
                }
            }
        }
    }

    function Create_zip($source, $destination, $destindir) {
        $filename = array();
        $filename = @unserialize($source);

        $zip = new ZipArchive();
        if ($zip->open($destination, ZipArchive::CREATE) === TRUE) {
            $i = 0;
            foreach ($filename as $file) {
                $zip->addFile($destindir . $file, $file);
                $i++;
            }
            $zip->close();
        }

        foreach ($filename as $file1) {
            @unlink($destindir . $file1);
        }
    }

    function getAttribute($att, $tag = '') {
        $re = '/' . $att . '=([\'])?((?(1).+?|[^\s>]+))(?(1)\1)/is';

        if (preg_match($re, $tag, $match)) {
            return urldecode($match[2]);
        }
        return false;
    }

    function get_table_list() {
        global $wpdb;
        $table = $wpdb->prefix . 'arp_arprice';

        $res_default_template = $wpdb->get_results("SELECT * FROM " . $table . " WHERE  status = 'published' AND is_template ='1' ORDER BY ID ASC ");
        ?>
        <select multiple="multiple" name="arp_table_to_export[]" id="arp_table_to_export">
            <?php
            foreach ($res_default_template as $r) {
                ?>
                <option value="<?php echo $r->ID; ?>">Template ::&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $r->table_name; ?>&nbsp;&nbsp;&nbsp;&nbsp;[<?php echo $r->ID; ?>]</option>
                <?php
            }

            $res_new_template = $wpdb->get_results("SELECT * FROM " . $table . " WHERE  status = 'published' AND is_template ='0' ORDER BY ID ASC ");

            foreach ($res_new_template as $r) {
                ?>
                <option value="<?php echo $r->ID; ?>">Table ::&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $r->table_name; ?>&nbsp;&nbsp;&nbsp;&nbsp;[<?php echo $r->ID; ?>]</option>
                <?php
            }
            ?>
        </select>
        <?php
    }

    function export_table_list() {
        global $arprice_import_export;
        $arprice_import_export->get_table_list();
        die();
    }

    function extract_zip($filename, $output_dir) {
        $zip = new ZipArchive;
        if ($zip->open($filename) === TRUE) {
            $zip->extractTo($output_dir);
            $zip->close();
            return 'ok';
        } else {
            return 'failed';
        }
    }

    function import_table() {
        $_SESSION['arprice_image_array'] = array();

        WP_Filesystem();

        global $wpdb, $arprice_images_css_version;

        $table = $wpdb->prefix . 'arp_arprice';

        $table_opt = $wpdb->prefix . 'arp_arprice_options';

//        $ext = $_REQUEST['ext'];
        
        $file_name = $_REQUEST['xml_file'];

        @ini_set('max_execution_time', 0);

        $wp_upload_dir = wp_upload_dir();

        $output_url = $wp_upload_dir['baseurl'] . '/arprice/';
        $output_dir = $wp_upload_dir['basedir'] . '/arprice/';

        $upload_dir_path = $wp_upload_dir['basedir'] . '/arprice/';
        $upload_dir_url = $wp_upload_dir['baseurl'] . '/arprice/';


        $xml_file = $output_dir . 'import/' . $file_name . '.txt';


        $xml_content = file_get_contents($xml_file);


        $xml = base64_decode($xml_content);
        $xml = simplexml_load_string($xml);

        $ik = 1;
        if (isset($xml->arp_table)) {
            foreach ($xml->children() as $key_main => $val_main) {
                $attr = $val_main->attributes();
                $old_id = $attr['id'];
                $status = $val_main->status;
                $is_template = $val_main->is_template;
                $template_name = $val_main->template_name;
                $is_animated = $val_main->is_animated;
                $arprice_import_version = $val_main->arp_plugin_version;

                $table_name = $val_main->arp_table_name;
               
                $arp_template_css = $val_main->arp_template_css;


                $arp_template_img = $val_main->arp_template_img;
                $arp_template_img_big = $val_main->arp_template_img_big;
                $arp_template_img_large = $val_main->arp_template_img_large;

                $date = current_time('mysql');
                foreach ($val_main->options->children() as $key => $val) {

                    if ($key == 'general_options') {
                        $general_options = (string) $val;

                        $general_options_new = unserialize($general_options);

                        $arp_main_reference_template = $general_options_new['general_settings']['reference_template'];

                        if (version_compare($arprice_import_version, '2.0', '<')) {
                            $general_options_new['column_settings']['arp_load_first_time_after_migration'] = 1;
                            $general_options_new['column_settings']['column_wrapper_width_txtbox'] = 1000;
                            $general_options_new['column_settings']['display_col_mobile'] = 1;
                            $general_options_new['column_settings']['display_col_tablet'] = 3;

                            $general_options_new['column_animation']['pagi_nav_btn'] = "pagination_bottom";
                            $general_options_new['column_animation']['navi_nav_btn'] = "navigation";

                            $col_hover_effect = $general_options_new['column_settings']['column_highlight_on_hover'];
                            if ($col_hover_effect == '0') {
                                $general_options_new['column_settings']['column_highlight_on_hover'] = 'hover_effect';
                            } else if ($col_hover_effect == '1') {
                                $general_options_new['column_settings']['column_highlight_on_hover'] = 'shadow_effect';
                            } else {
                                $general_options_new['column_settings']['column_highlight_on_hover'] = 'no_effect';
                            }

                            $general_options_new['column_settings']['column_box_shadow_effect'] = 'shadow_style_none';
                            if ($arp_main_reference_template == 'arptemplate_2') {
                                $general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 7;
                            } else if ($arp_main_reference_template == 'arptemplate_23') {
                                $general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 6;
                            } else if ($arp_main_reference_template == 'arptemplate_22') {
                                $general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 4;
                            } else {
                                $general_options_new['column_settings']['column_border_radius_top_left'] = $general_options_new['column_settings']['column_border_radius_top_right'] = $general_options_new['column_settings']['column_border_radius_bottom_left'] = $general_options_new['column_settings']['column_border_radius_bottom_right'] = 0;
                            }

                            $general_options_new['tooltip_settings']['tooltip_trigger_type'] = 'hover';
                            $general_options_new['tooltip_settings']['tooltip_display_style'] = 'default';
                        }

                        $arp_custom_css = isset($general_options_new['general_settings']['arp_custom_css']) ? $general_options_new['general_settings']['arp_custom_css'] : '';

                        $reference_template = $general_options_new['general_settings']['reference_template'];

                        $general_options_new = $this->arprice_recursive_array_function($general_options_new, 'import');

                        $general_options = serialize($general_options_new);
                    } else if ($key == 'column_options') {

                        $column_options = (string) $val;

                        $column_opts = unserialize($column_options);

                        $column_opts = $this->arprice_recursive_array_function($column_opts, 'import');
                        foreach ($column_opts['columns'] as $c => $columns) {

                            /* -- Caption Column Header Title -- */
                            $html_content = $this->arprice_copy_image_from_content($columns['html_content']);
                            $column_opts['columns'][$c]['html_content'] = $html_content;
                            $html_content_second = $this->arprice_copy_image_from_content($columns['html_content_second']);
                            $column_opts['columns'][$c]['html_content_second'] = $html_content_second;
                            $html_content_third = $this->arprice_copy_image_from_content($columns['html_content_third']);
                            $column_opts['columns'][$c]['html_content_third'] = $html_content_third;

                            /* -- Other Column Header Title -- */
                            $header_content = $this->arprice_copy_image_from_content($columns['package_title']);
                            $column_opts['columns'][$c]['package_title'] = $header_content;
                            $header_content_second = $this->arprice_copy_image_from_content($columns['package_title_second']);
                            $column_opts['columns'][$c]['package_title_second'] = $header_content_second;
                            $header_content_third = $this->arprice_copy_image_from_content($columns['package_title_third']);
                            $column_opts['columns'][$c]['package_title_third'] = $header_content_third;
                            
                            /* -- Other Column Price Content -- */
                            $price_text = $this->arprice_copy_image_from_content($columns['price_text']);
                            $column_opts['columns'][$c]['price_text'] = $price_text;
                            $price_text_second = $this->arprice_copy_image_from_content($columns['price_text_two_step']);
                            $column_opts['columns'][$c]['price_text_two_step'] = $price_text_second;
                            $price_text_third = $this->arprice_copy_image_from_content($columns['price_text_three_step']);
                            $column_opts['columns'][$c]['price_text_three_step'] = $price_text_third;

                            /* -- Other Column Header Shortcode -- */
                            $arp_header_shortcode = $this->arprice_copy_image_from_content($columns['arp_header_shortcode']);
                            $column_opts['columns'][$c]['arp_header_shortcode'] = $arp_header_shortcode;
                            $arp_header_shortcode_second = $this->arprice_copy_image_from_content($columns['arp_header_shortcode_second']);
                            $column_opts['columns'][$c]['arp_header_shortcode_second'] = $arp_header_shortcode_second;
                            $arp_header_shortcode_third = $this->arprice_copy_image_from_content($columns['arp_header_shortcode_third']);
                            $column_opts['columns'][$c]['arp_header_shortcode_third'] = $arp_header_shortcode_third;

                            /* -- Other Column Column Description -- */
                            $column_description = $this->arprice_copy_image_from_content($columns['column_description']);
                            $column_opts['columns'][$c]['column_description'] = $column_description;
                            $column_description_second = $this->arprice_copy_image_from_content($columns['column_description_second']);
                            $column_opts['columns'][$c]['column_description_second'] = $column_description_second;
                            $column_description_third = $this->arprice_copy_image_from_content($columns['column_description_third']);
                            $column_opts['columns'][$c]['column_description_third'] = $column_description_third;

                            /* All Columns Row Changes */
                            if( is_array( $columns['rows']) && count($columns['rows']) > 0 ){
                                
                                foreach( $columns['rows'] as $r => $row ){
                                    $row_description = $this->arprice_copy_image_from_content($row['row_description']);
                                    $column_opts['columns'][$c]['rows'][$r]['row_description'] = $row_description;
                                    $row_description_second = $this->arprice_copy_image_from_content($row['row_description_second']);
                                    $column_opts['columns'][$c]['rows'][$r]['row_description_second'] = $row_description_second;
                                    $row_description_third = $this->arprice_copy_image_from_content($row['row_description_third']);
                                    $column_opts['columns'][$c]['rows'][$r]['row_description_third'] = $row_description_third;
                                    $row_tooltip = $this->arprice_copy_image_from_content($row['row_tooltip']);
                                    $column_opts['columns'][$c]['rows'][$r]['row_tooltip'] = $row_tooltip;
                                    $row_tooltip_second = $this->arprice_copy_image_from_content($row['row_tooltip_second']);
                                    $column_opts['columns'][$c]['rows'][$r]['row_tooltip_second'] = $row_tooltip_second;
                                    $row_tooltip_third = $this->arprice_copy_image_from_content($row['row_tooltip_third']);
                                    $column_opts['columns'][$c]['rows'][$r]['row_tooltip_third'] = $row_tooltip_third;
                                    
                                }
                                
                            }
                            
                            $footer_content = $this->arprice_copy_image_from_content($columns['footer_content']);
                            $column_opts['columns'][$c]['footer_content'] = $footer_content;
                            
                            $footer_content_second = $this->arprice_copy_image_from_content( $columns['footer_content_second']);
                            $column_opts['columns'][$c]['footer_content_second'] = $footer_content_second;
                            $footer_content_third = $this->arprice_copy_image_from_content($columns['footer_content_third']);
                            $column_opts['columns'][$c]['footer_content_third'] = $footer_content_third;
                            
                            $button_text = $this->arprice_copy_image_from_content($columns['button_text']);
                            $column_opts['columns'][$c]['button_text'] = $button_text;
                            $button_text_second = $this->arprice_copy_image_from_content($columns['btn_content_second']);
                            $column_opts['columns'][$c]['btn_content_second'] = $button_text_second;
                            $button_text_third = $this->arprice_copy_image_from_content($columns['btn_content_third']);
                            $column_opts['columns'][$c]['btn_content_third'] = $button_text_third;
                            
                            $header_img = $c . '_img';
                            $header_img_second = $c . '_img_second';
                            $header_img_third = $c . '_img_third';

                            $btn_img = $c . '_btn_img';
                            $column_back_image = $c . '_background_image';

                            $gmap_marker = $c . '_gmap_marker';

                            $html5_mp4_video = $c . '_html5_mp4_video';
                            $html5_mp4_video_second = $c . '_html5_mp4_video_second';
                            $html5_mp4_video_third = $c . '_html5_mp4_video_third';

                            $html5_webm_video = $c . '_html5_webm_video';
                            $html5_webm_video_second = $c . '_html5_webm_video_second';
                            $html5_webm_video_third = $c . '_html5_webm_video_third';

                            $html5_ogg_video = $c . '_html5_ogg_video';
                            $html5_ogg_video_second = $c . '_html5_ogg_video_second';
                            $html5_ogg_video_third = $c . '_html5_ogg_video_third';

                            $html5_video_poster = $c . '_html5_video_poster';
                            $html5_video_poster_second = $c . '_html5_video_poster_second';
                            $html5_video_poster_third = $c . '_html5_video_poster_third';

                            $html5_mp3_audio = $c . '_html5_mp3_audio';
                            $html5_mp3_audio_second = $c . '_html5_mp3_audio_second';
                            $html5_mp3_audio_third = $c . '_html5_mp3_audio_third';

                            $html5_ogg_audio = $c . '_html5_ogg_audio';
                            $html5_ogg_audio_second = $c . '_html5_ogg_audio_second';
                            $html5_ogg_audio_third = $c . '_html5_ogg_audio_third';

                            $html5_wav_audio = $c . '_html5_wav_audio';
                            $html5_wav_audio_second = $c . '_html5_wav_audio_second';
                            $html5_wav_audio_third = $c . '_html5_wav_audio_third';

                            if ($val_main->$header_img != "") {
                                $header_image = $c . '_img';
                                $image_width = $c . '_img_width';
                                $image_height = $c . '_img_height';
                                $img_class = $c . '_img_class';
                                $image = $val_main->$header_image;
                                $img_name = explode('/', $image);
                                $img_nm = $img_name[count($img_name) - 1];
                                $img_name = 'arp_' . time() . '_' . $img_nm;
                                
                                $base_url = trim($image);
                                $new_path = $upload_dir_path . $img_name;
                                $new_url = $upload_dir_url . $img_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }
                                $html = "<img src='" . $new_url . "'";
                                if (isset($val_main->$image_height) and ! empty($val_main->$image_height)) {
                                    $html .= " height='" . $val_main->$image_height . "'";
                                }
                                if (isset($val_main->$image_width) and ! empty($val_main->$image_width)) {
                                    $html .= " width='" . $val_main->$image_width . "'";
                                }

                                if (@isset($val_main->$img_class) and ! empty($val_main->$img_class)) {
                                    $html .= " class='" . $val_main->$img_class . "'";
                                }
                                $html .= " >";
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $html;
                            }
                            if ($val_main->$header_img_second != "") {
                                $header_image = $c . '_img_second';
                                $image_width = $c . '_img_second_width';
                                $image_height = $c . '_img_second_height';
                                $img_class = $c . '_img_second_class';
                                $image = $val_main->$header_img_second;
                                $img_name = explode('/', $image);
                                $img_nm = $img_name[count($img_name) - 1];
                                $img_name = 'arp_' . time() . '_' . $img_nm;
                                
                                $base_url = trim($image);
                                $new_path = $upload_dir_path . $img_name;
                                $new_url = $upload_dir_url . $img_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }
                                
                                $html = "<img src='" . $new_url . "'";
                                if (isset($val_main->$image_height) and ! empty($val_main->$image_height)) {
                                    $html .= " height='" . $val_main->$image_height . "'";
                                }
                                if (isset($val_main->$image_width) and ! empty($val_main->$image_width)) {
                                    $html .= " width='" . $val_main->$image_width . "'";
                                }
                                if (@isset($val_main->$img_class) and ! empty($val_main->$img_class)) {
                                    $html .= " class='" . $val_main->$img_class . "'";
                                }
                                $html .= " >";
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $html;
                            }
                            if ($val_main->$header_img_third != "") {
                                $header_image = $c . '_img_third';
                                $image_width = $c . '_img_third_width';
                                $image_height = $c . '_img_third_height';
                                $img_class = $c . '_img_third_class';
                                $image = $val_main->$header_img_third;
                                $img_name = explode('/', $image);
                                $img_nm = $img_name[count($img_name) - 1];
                                $img_name = 'arp_' . time() . '_' . $img_nm;
                                
                                $base_url = trim($image);
                                $new_path = $upload_dir_path . $img_name;
                                $new_url = $upload_dir_url . $img_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $html = "<img src='" . $new_url . "'";
                                if (isset($val_main->$image_height) and ! empty($val_main->$image_height)) {
                                    $html .= " height='" . $val_main->$image_height . "'";
                                }
                                if (isset($val_main->$image_width) and ! empty($val_main->$image_width)) {
                                    $html .= " width='" . $val_main->$image_width . "'";
                                }
                                if (@isset($val_main->$img_class) and ! empty($val_main->$img_class)) {
                                    $html .= " class='" . $val_main->$img_class . "'";
                                }
                                $html .= " >";
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $html;
                            }

                            if ($val_main->$gmap_marker != "") {
                                $gmap_img = $c . "_gmap_marker";
                                $gmap_image = $val_main->$gmap_img;
                                $gmap_img_nm = explode('/', $gmap_image);
                                $gmap_img_nm = $gmap_img_nm[count($gmap_img_nm) - 1];
                                $gmap_img_name = 'arp_' . time() . '_' . $gmap_img_nm;
                                
                                $base_url = trim($gmap_image);
                                $new_path = $upload_dir_path . $gmap_img_name;
                                $new_url = $upload_dir_url . $gmap_img_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }
                                
                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = @preg_replace('#\s(marker_image)="[^"]+"#', ' marker_image="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                            }

                            if ($val_main->$html5_mp4_video != "") {
                                $html5_mp4_video = $c . "_html5_mp4_video";
                                $h5_mp4_video = $val_main->$html5_mp4_video;
                                $h5_mp4_video_nm = explode('/', $h5_mp4_video);
                                $h5_mp4_video_nm = $h5_mp4_video_nm[count($h5_mp4_video_nm) - 1];
                                $h5_mp4_video_name = 'arp_' . time() . '_' . $h5_mp4_video_nm;
                                
                                $base_url = trim($h5_mp4_video);
                                $new_path = $upload_dir_path . $h5_mp4_video_name;
                                $new_url = $upload_dir_url . $h5_mp4_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }
                                
                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = preg_replace('#\s(mp4)="[^"]+"#', ' mp4="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                                $column_opts['columns'][$c]['arp_header_shortcode'];
                            }
                            if ($val_main->$html5_mp4_video_second != "") {
                                $html5_mp4_video = $c . "_html5_mp4_video_second";
                                $h5_mp4_video = $val_main->$html5_mp4_video_second;
                                $h5_mp4_video_nm = explode('/', $h5_mp4_video);
                                $h5_mp4_video_nm = $h5_mp4_video_nm[count($h5_mp4_video_nm) - 1];
                                $h5_mp4_video_name = 'arp_' . time() . '_' . $h5_mp4_video_nm;

                                $base_url = trim($h5_mp4_video);
                                $new_path = $upload_dir_path . $h5_mp4_video_name;
                                $new_url = $upload_dir_url . $h5_mp4_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_second'];
                                $dt = preg_replace('#\s(mp4)="[^"]+"#', ' mp4="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $dt;
                            }
                            if ($val_main->$html5_mp4_video_third != "") {
                                $html5_mp4_video = $c . "_html5_mp4_video_third";
                                $h5_mp4_video = $val_main->$html5_mp4_video_third;
                                $h5_mp4_video_nm = explode('/', $h5_mp4_video);
                                $h5_mp4_video_nm = $h5_mp4_video_nm[count($h5_mp4_video_nm) - 1];
                                $h5_mp4_video_name = 'arp_' . time() . '_' . $h5_mp4_video_nm;

                                $base_url = trim($h5_mp4_video);
                                $new_path = $upload_dir_path . $h5_mp4_video_name;
                                $new_url = $upload_dir_url . $h5_mp4_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_third'];
                                $dt = preg_replace('#\s(mp4)="[^"]+"#', ' mp4="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $dt;
                            }

                            if ($val_main->$html5_webm_video != "") {
                                $html5_webm_video = $c . "_html5_webm_video";
                                $h5_webm_video = $val_main->$html5_webm_video;
                                $h5_webm_video_nm = explode('/', $h5_webm_video);
                                $h5_webm_video_nm = $h5_webm_video_nm[count($h5_webm_video_nm) - 1];
                                $h5_webm_video_name = 'arp_' . time() . '_' . $h5_webm_video_nm;

                                $base_url = trim($h5_webm_video);
                                $new_path = $upload_dir_path . $h5_webm_video_name;
                                $new_url = $upload_dir_url . $h5_webm_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = preg_replace('#\s(webm)="[^"]+"#', ' webm="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                            }
                            if ($val_main->$html5_webm_video_second != "") {
                                $html5_webm_video = $c . "_html5_webm_video_second";
                                $h5_webm_video = $val_main->$html5_webm_video_second;
                                $h5_webm_video_nm = explode('/', $h5_webm_video);
                                $h5_webm_video_nm = $h5_webm_video_nm[count($h5_webm_video_nm) - 1];
                                $h5_webm_video_name = 'arp_' . time() . '_' . $h5_webm_video_nm;

                                $base_url = trim($h5_webm_video);
                                $new_path = $upload_dir_path . $h5_webm_video_name;
                                $new_url = $upload_dir_url . $h5_webm_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_second'];
                                $dt = preg_replace('#\s(webm)="[^"]+"#', ' webm="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $dt;
                            }
                            if ($val_main->$html5_webm_video_third != "") {
                                $html5_webm_video = $c . "_html5_webm_video_third";
                                $h5_webm_video = $val_main->$html5_webm_video_third;
                                $h5_webm_video_nm = explode('/', $h5_webm_video);
                                $h5_webm_video_nm = $h5_webm_video_nm[count($h5_webm_video_nm) - 1];
                                $h5_webm_video_name = 'arp_' . time() . '_' . $h5_webm_video_nm;

                                $base_url = trim($h5_webm_video);
                                $new_path = $upload_dir_path . $h5_webm_video_name;
                                $new_url = $upload_dir_url . $h5_webm_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_third'];
                                $dt = preg_replace('#\s(webm)="[^"]+"#', ' webm="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $dt;
                            }

                            if ($val_main->$html5_ogg_video != "") {
                                $html5_ogg_video = $c . "_html5_ogg_video";
                                $h5_ogg_video = $val_main->$html5_ogg_video;
                                $h5_ogg_video_nm = explode('/', $h5_ogg_video);
                                $h5_ogg_video_nm = $h5_ogg_video_nm[count($h5_ogg_video_nm) - 1];
                                $h5_ogg_video_name = 'arp_' . time() . '_' . $h5_ogg_video_nm;

                                $base_url = trim($h5_ogg_video);
                                $new_path = $upload_dir_path . $h5_ogg_video_name;
                                $new_url = $upload_dir_url . $h5_ogg_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = preg_replace('#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                            }
                            if ($val_main->$html5_ogg_video_second != "") {
                                $html5_ogg_video = $c . "_html5_ogg_video_second";
                                $h5_ogg_video = $val_main->$html5_ogg_video_second;
                                $h5_ogg_video_nm = explode('/', $h5_ogg_video);
                                $h5_ogg_video_nm = $h5_ogg_video_nm[count($h5_ogg_video_nm) - 1];
                                $h5_ogg_video_name = 'arp_' . time() . '_' . $h5_ogg_video_nm;

                                $base_url = trim($h5_ogg_video);
                                $new_path = $upload_dir_path . $h5_ogg_video_name;
                                $new_url = $upload_dir_url . $h5_ogg_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_second'];
                                $dt = preg_replace('#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $dt;
                            }
                            if ($val_main->$html5_ogg_video_third != "") {
                                $html5_ogg_video = $c . "_html5_ogg_video_third";
                                $h5_ogg_video = $val_main->$html5_ogg_video_third;
                                $h5_ogg_video_nm = explode('/', $h5_ogg_video);
                                $h5_ogg_video_nm = $h5_ogg_video_nm[count($h5_ogg_video_nm) - 1];
                                $h5_ogg_video_name = 'arp_' . time() . '_' . $h5_ogg_video_nm;

                                $base_url = trim($h5_ogg_video);
                                $new_path = $upload_dir_path . $h5_ogg_video_name;
                                $new_url = $upload_dir_url . $h5_ogg_video_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }
                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_third'];
                                $dt = preg_replace('#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $dt;
                            }

                            if ($val_main->$html5_video_poster != "") {
                                $html5_video_poster = $c . '_html5_video_poster';
                                $h5_video_poster = $val_main->$html5_video_poster;
                                $h5_video_poster_nm = explode('/', $h5_video_poster);
                                $h5_video_poster_nm = $h5_video_poster_nm[count($h5_video_poster_nm) - 1];
                                $h5_video_poster_name = 'arp_' . time() . '_' . $h5_video_poster_nm;

                                $base_url = trim($h5_video_poster);
                                $new_path = $upload_dir_path . $h5_video_poster_name;
                                $new_url = $upload_dir_url . $h5_video_poster_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = preg_replace('#\s(poster)="[^"]+"#', ' poster="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                            }
                            if ($val_main->$html5_video_poster_second != "") {
                                $html5_video_poster = $c . '_html5_video_poster_second';
                                $h5_video_poster = $val_main->$html5_video_poster_second;
                                $h5_video_poster_nm = explode('/', $h5_video_poster);
                                $h5_video_poster_nm = $h5_video_poster_nm[count($h5_video_poster_nm) - 1];
                                $h5_video_poster_name = 'arp_' . time() . '_' . $h5_video_poster_nm;

                                $base_url = trim($h5_video_poster);
                                $new_path = $upload_dir_path . $h5_video_poster_name;
                                $new_url = $upload_dir_url . $h5_video_poster_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }
                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_second'];
                                $dt = preg_replace('#\s(poster)="[^"]+"#', ' poster="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $dt;
                            }
                            if ($val_main->$html5_video_poster_third != "") {
                                $html5_video_poster = $c . '_html5_video_poster_third';
                                $h5_video_poster = $val_main->$html5_video_poster_third;
                                $h5_video_poster_nm = explode('/', $h5_video_poster);
                                $h5_video_poster_nm = $h5_video_poster_nm[count($h5_video_poster_nm) - 1];
                                $h5_video_poster_name = 'arp_' . time() . '_' . $h5_video_poster_nm;

                                $base_url = trim($h5_video_poster);
                                $new_path = $upload_dir_path . $h5_video_poster_name;
                                $new_url = $upload_dir_url . $h5_video_poster_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_third'];
                                $dt = preg_replace('#\s(poster)="[^"]+"#', ' poster="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $dt;
                            }

                            if ($val_main->$html5_mp3_audio != "") {
                                $h5_mp3_audio = $val_main->$html5_mp3_audio;
                                $h5_mp3_audio_nm = explode('/', $h5_mp3_audio);
                                $h5_mp3_audio_nm = $h5_mp3_audio_nm[count($h5_mp3_audio_nm) - 1];
                                $h5_mp3_audio_name = 'arp_' . time() . '_' . $h5_mp3_audio_nm;

                                $base_url = trim($h5_mp3_audio);
                                $new_path = $upload_dir_path . $h5_mp3_audio_name;
                                $new_url = $upload_dir_url . $h5_mp3_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }
                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = preg_replace('#\s(mp3)="[^"]+"#', ' mp3="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                            }
                            if ($val_main->$html5_mp3_audio_second != "") {
                                $h5_mp3_audio = $val_main->$html5_mp3_audio_second;
                                $h5_mp3_audio_nm = explode('/', $h5_mp3_audio);
                                $h5_mp3_audio_nm = $h5_mp3_audio_nm[count($h5_mp3_audio_nm) - 1];
                                $h5_mp3_audio_name = 'arp_' . time() . '_' . $h5_mp3_audio_nm;

                                $base_url = trim($h5_mp3_audio);
                                $new_path = $upload_dir_path . $h5_mp3_audio_name;
                                $new_url = $upload_dir_url . $h5_mp3_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_second'];
                                $dt = preg_replace('#\s(mp3)="[^"]+"#', ' mp3="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $dt;
                            }
                            if ($val_main->$html5_mp3_audio_third != "") {
                                $h5_mp3_audio = $val_main->$html5_mp3_audio_third;
                                $h5_mp3_audio_nm = explode('/', $h5_mp3_audio);
                                $h5_mp3_audio_nm = $h5_mp3_audio_nm[count($h5_mp3_audio_nm) - 1];
                                $h5_mp3_audio_name = 'arp_' . time() . '_' . $h5_mp3_audio_nm;

                                $base_url = trim($h5_mp3_audio);
                                $new_path = $upload_dir_path . $h5_mp3_audio_name;
                                $new_url = $upload_dir_url . $h5_mp3_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_third'];
                                $dt = preg_replace('#\s(mp3)="[^"]+"#', ' mp3="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $dt;
                            }

                            if ($val_main->$html5_ogg_audio != "") {
                                $h5_ogg_audio = $val_main->$html5_ogg_audio;
                                $h5_ogg_audio_nm = explode('/', $h5_ogg_audio);
                                $h5_ogg_audio_nm = $h5_ogg_audio_nm[count($h5_ogg_audio_nm) - 1];
                                $h5_ogg_audio_name = 'arp_' . time() . '_' . $h5_ogg_audio_nm;

                                $base_url = trim($h5_ogg_audio);
                                $new_path = $upload_dir_path . $h5_ogg_audio_name;
                                $new_url = $upload_dir_url . $h5_ogg_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = preg_replace('#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                            }
                            if ($val_main->$html5_ogg_audio_second != "") {
                                $h5_ogg_audio = $val_main->$html5_ogg_audio_second;
                                $h5_ogg_audio_nm = explode('/', $h5_ogg_audio);
                                $h5_ogg_audio_nm = $h5_ogg_audio_nm[count($h5_ogg_audio_nm) - 1];
                                $h5_ogg_audio_name = 'arp_' . time() . '_' . $h5_ogg_audio_nm;

                                $base_url = trim($h5_ogg_audio);
                                $new_path = $upload_dir_path . $h5_ogg_audio_name;
                                $new_url = $upload_dir_url . $h5_ogg_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_second'];
                                $dt = preg_replace('#\s(ogg)="[^"]+"#', ' ogg="' . new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $dt;
                            }
                            if ($val_main->$html5_ogg_audio_third != "") {
                                $h5_ogg_audio = $val_main->$html5_ogg_audio_third;
                                $h5_ogg_audio_nm = explode('/', $h5_ogg_audio);
                                $h5_ogg_audio_nm = $h5_ogg_audio_nm[count($h5_ogg_audio_nm) - 1];
                                $h5_ogg_audio_name = 'arp_' . time() . '_' . $h5_ogg_audio_nm;

                                $base_url = trim($h5_ogg_audio);
                                $new_path = $upload_dir_path . $h5_ogg_audio_name;
                                $new_url = $upload_dir_url . $h5_ogg_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_third'];
                                $dt = preg_replace('#\s(ogg)="[^"]+"#', ' ogg="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $dt;
                            }

                            if ($val_main->$html5_wav_audio != "") {
                                $h5_wav_audio = $val_main->$html_wav_audio;
                                $h5_wav_audio_nm = explode('/', $h5_wav_audio);
                                $h5_wav_audio_nm = $h5_wav_audio_nm[count($h5_wav_audio_nm) - 1];
                                $h5_wav_audio_name = 'arp_' . time() . '_' . $h5_wav_audio_nm;

                                $base_url = trim($h5_wav_audio);
                                $new_path = $upload_dir_path . $h5_wav_audio_name;
                                $new_url = $upload_dir_url . $h5_wav_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode'];
                                $dt = preg_replace('#\s(wav)="[^"]+"#', ' wav="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode'] = $dt;
                            }
                            if ($val_main->$html5_wav_audio_second != "") {
                                $h5_wav_audio = $val_main->$html_wav_audio_second;
                                $h5_wav_audio_nm = explode('/', $h5_wav_audio);
                                $h5_wav_audio_nm = $h5_wav_audio_nm[count($h5_wav_audio_nm) - 1];
                                $h5_wav_audio_name = 'arp_' . time() . '_' . $h5_wav_audio_nm;

                                $base_url = trim($h5_wav_audio);
                                $new_path = $upload_dir_path . $h5_wav_audio_name;
                                $new_url = $upload_dir_url . $h5_wav_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_second'];
                                $dt = preg_replace('#\s(wav)="[^"]+"#', ' wav="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_second'] = $dt;
                            }
                            if ($val_main->$html5_wav_audio_third != "") {
                                $h5_wav_audio = $val_main->$html_wav_audio_third;
                                $h5_wav_audio_nm = explode('/', $h5_wav_audio);
                                $h5_wav_audio_nm = $h5_wav_audio_nm[count($h5_wav_audio_nm) - 1];
                                $h5_wav_audio_name = 'arp_' . time() . '_' . $h5_wav_audio_nm;

                                $base_url = trim($h5_wav_audio);
                                $new_path = $upload_dir_path . $h5_wav_audio_name;
                                $new_url = $upload_dir_url . $h5_wav_audio_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $dt = $column_opts['columns'][$c]['arp_header_shortcode_third'];
                                $dt = preg_replace('#\s(wav)="[^"]+"#', ' wav="' . $new_url . '"', $dt);
                                $column_opts['columns'][$c]['arp_header_shortcode_third'] = $dt;
                            }

                            if ($val_main->$btn_img != "") {
                                $btn_image = $c . "_btn_img";
                                $button_img = $val_main->$btn_image;
                                $image_name = explode('/', $button_img);
                                $image_nm = $image_name[count($image_name) - 1];
                                $image_name = 'arp_' . time() . '_' . $image_nm;

                                $base_url = trim($button_img);
                                $new_path = $upload_dir_path . $image_name;
                                $new_url = $upload_dir_url . $image_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $column_opts['columns'][$c]['btn_img'] = $new_url;
                            }

                            if ($val_main->$column_back_image != "") {
                                $col_image = $c . "_background_image";
                                $column_img = $val_main->$column_back_image;
                                $col_image_name = explode('/', $column_img);
                                $col_image_nm = $col_image_name[count($col_image_name) - 1];
                                $col_image_name = 'arp_' . time() . '_' . $col_image_nm;
                                
                                $base_url = trim($column_img);
                                $new_path = $upload_dir_path . $col_image_name;
                                $new_url = $upload_dir_url . $col_image_name;
                                if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                                    $new_url = $_SESSION['arprice_image_array'][$base_url];
                                } else {
                                    @copy($base_url, $new_path);
                                    $_SESSION['arprice_image_array'][$base_url] = $new_url;
                                }

                                $column_opts['columns'][$c]['column_background_image'] = $new_url;
                            }
                        }

                        $column_options = serialize($column_opts);
                    }
                }

                $wpdb->query($wpdb->prepare('INSERT INTO ' . $table . ' (table_name,general_options,is_template,is_animated,status,create_date,arp_last_updated_date) VALUES (%s,%s,%s,%s,%s,%s,%s)', $table_name, $general_options, 0, $is_animated, $status, $date, $date));

                $new_id = $wpdb->insert_id;

                $select = $wpdb->get_results($wpdb->prepare('SELECT general_options FROM ' . $table . ' WHERE ID = %d', $new_id));
                $options = maybe_unserialize($select[0]->general_options);
                $arp_custom_css = isset($options['general_settings']['arp_custom_css']) ? $options['general_settings']['arp_custom_css'] : '';
                $arp_custom_css = preg_replace('/arptemplate_(\d+)/', 'arptemplate_' . $new_id, $arp_custom_css);
                $arp_custom_css = preg_replace('/arp_price_table_(\d+)/', 'arp_price_table_' . $new_id, $arp_custom_css);
                $options['general_settings']['arp_custom_css'] = ($arp_custom_css);
                $general_options = addslashes(maybe_serialize($options));

                $wpdb->query("UPDATE " . $table . " SET general_options = '$general_options' WHERE ID = $new_id");

                $ref_id = str_replace('arptemplate_', '', $reference_template);

                if ($ref_id >= 20) {
                    $ref_id = $ref_id - 3;
                    $reference_template = 'arptemplate_' . $ref_id;
                }

                $file = PRICINGTABLE_DIR . '/css/templates/' . $reference_template . '_v' . $arprice_images_css_version . '.css';

                $content = @file_get_contents($file);

                $css_content = preg_replace('/arptemplate_([\d]+)/', 'arptemplate_' . $new_id, $content);
                //}

                $css_content = str_replace('../../images', PRICINGTABLE_IMAGES_URL, $css_content);

                $css_file_name = 'arptemplate_' . $new_id . '.css';

                $template_img_name = 'arptemplate_' . $new_id . '.png';
                $template_img_big_name = 'arptemplate_' . $new_id . '_big.png';
                $template_img_large_name = 'arptemplate_' . $new_id . '_large.png';

                $arp_img_copy_error = @copy($arp_template_img, $upload_dir_path . 'template_images/' . $template_img_name);

                if ($arp_img_copy_error == 0) {
                    $i1 = @copy(PRICINGTABLE_DIR . '/images/' . $arp_main_reference_template . '.png', $upload_dir_path . 'template_images/' . $template_img_name);
                }

                $arp_bigimg_copy_error = @copy($arp_template_img_big, $upload_dir_path . 'template_images/' . $template_img_big_name);

                if ($arp_bigimg_copy_error == 0) {
                    @copy(PRICINGTABLE_DIR . '/images/' . $arp_main_reference_template . '_big.png', $upload_dir_path . 'template_images/' . $template_img_big_name);
                }

                $arp_largeimg_copy_error = @copy($arp_template_img_large, $upload_dir_path . 'template_images/' . $template_img_large_name);

                if ($arp_largeimg_copy_error == 0) {
                    @copy(PRICINGTABLE_DIR . '/images/' . $arp_main_reference_template . '_large.png', $upload_dir_path . 'template_images/' . $template_img_large_name);
                }


                global $wp_filesystem;

                //file_put_contents(PRICINGTABLE_UPLOAD_DIR . '/css/' . $css_file_name, $css_content);
                $wp_filesystem->put_contents(PRICINGTABLE_UPLOAD_DIR . '/css/' . $css_file_name, $css_content, 0777);

                $wpdb->query($wpdb->prepare('INSERT INTO ' . $table_opt . ' (table_id,table_options) VALUES (%d,%s)', $new_id, $column_options));
            }
            @unlink($wp_upload_dir['basedir'] . '/arprice/import/' . $file_name . '.zip');

            echo 1;
        } else if (!isset($xml->arp_table)) {
            echo 0;
        }
        unset($_SESSION['arprice_image_array']);
        die();
    }

    function arprice_recursive_array_function($array = array(), $type = 'export') {

        $temp = array();
        if (is_array($array) and ! empty($array)) {
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $temp[$key] = $this->arprice_recursive_array_function($value, $type);
                } else {
                    if ($type == 'export') {
                        $temp[$key] = str_replace('&lt;br /&gt;', '[ENTERKEY]', str_replace('&lt;br/&gt;', '[ENTERKEY]', str_replace('&lt;br&gt;', '[ENTERKEY]', str_replace('<br />', '[ENTERKEY]', str_replace('<br/>', '[ENTERKEY]', str_replace('<br>', '[ENTERKEY]', trim(preg_replace('/\s\s+/', ' ', $value))))))));
                        $temp[$key] = str_replace('&amp;', '[AND]', $temp[$key]);
                    } else if ($type == 'import') {
                        $temp[$key] = str_replace("[ENTERKEY]", "<br>", $value);
                        $temp[$key] = str_replace("[AND]", "&amp;", $temp[$key]);
                    }
                }
            }
        }

        return $temp;
    }

    function arprice_copy_image_from_content($content = '') {
        if ($content === '') {
            return $content;
        }
        WP_Filesystem();

        $wp_upload_dir = wp_upload_dir();

        $upload_dir_path = $wp_upload_dir['basedir'] . '/arprice/';
        $upload_dir_url = $wp_upload_dir['baseurl'] . '/arprice/';

        if (is_ssl()) {
            $upload_dir_url = str_replace("http://", "https://", $upload_dir_url);
        }
        $matches = array();
        
        $pattern = "#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#";
        
        preg_match_all($pattern, $content, $matches);

        $imgextensions = array('jpeg', 'jpg', 'bmp', 'ico', 'png', 'gif', 'svg');
        if ($matches[0] !== '' && is_array($matches[0]) && count($matches[0]) > 0) {
            foreach ($matches[0] as $key => $link) {
                $link = trim($link, '"');
                $linkpart = explode('/', $link);
                $lastpart = $linkpart[count($linkpart) - 1];
                $get_extension = explode('.', $lastpart);
                $extension = $get_extension[count($get_extension) - 1];
                if (in_array($extension, $imgextensions)) {
                    $image_name = 'arp_'.time() . '_' . $lastpart;
                    
                    $base_url = trim($link);
                    $new_path = $upload_dir_path . $image_name;
                    $new_url = $upload_dir_url . $image_name;
                    if (array_key_exists($base_url, $_SESSION['arprice_image_array'])) {
                        $new_url = $_SESSION['arprice_image_array'][$base_url];
                        $nlinkpart = explode('/', $new_url);
                        $nlastpart = $nlinkpart[count($nlinkpart) - 1];
                        $new_path = $upload_dir_path . $nlastpart;
                    } else {
                        @copy($base_url, $new_path);
                        $_SESSION['arprice_image_array'][$base_url] = $new_url;
                    }
                    
                    if (file_exists($new_path)) {
                        $newlink = $new_url;
                        $content = str_replace($link, $newlink, $content);
                    } else {
                        $content = str_replace($link, '#', $content);
                    }
                } else {
                    continue;
                }
            }
        } else {
            return $content;
        }
        return $content;
    }

}
?>