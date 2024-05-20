<div id="arp_loader_div" class="arp_loader" style="display: none;">
    <div class="arp_loader_img"></div>
</div>
<?php
if (is_ssl())
    $google_font_url = "https://fonts.googleapis.com/css?family=Ubuntu";
else
    $google_font_url = "http://fonts.googleapis.com/css?family=Ubuntu";

$hostname = $_SERVER["HTTP_HOST"];
global $arprice_class;
$setact = 0;
global $arpriceplugin;
$setact = $arprice_class->$arpriceplugin();

?>
<link rel="stylesheet" type="text/css" href="<?php echo $google_font_url; ?>" />
<?php
global $wpdb, $arprice_import_export;

if (isset($_FILES["arp_pt_import_file"])) {
    global $wpdb, $WP_Filesystem;

    $wp_upload_dir = wp_upload_dir();
    $upload_dir = $wp_upload_dir['basedir'] . '/arprice/import/';

    $output_dir = $wp_upload_dir['basedir'] . '/arprice/import/';
    $output_url = $wp_upload_dir['baseurl'] . '/arprice/import/';

    if (!is_dir($output_dir))
        wp_mkdir_p($output_dir);

    $extexp = explode(".", $_FILES["arp_pt_import_file"]["name"]);
    $ext = $extexp[count($extexp) - 1];

    //Filter the file types , if you want.
//    if (strtolower($ext) == "txt" || strtolower($ext) == "zip") {
    if (strtolower($ext) == "txt") {
        if ($_FILES["arp_pt_import_file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"] . "<br>";
        } else {
            if (@move_uploaded_file($_FILES["arp_pt_import_file"]["tmp_name"], $output_dir . $_FILES["arp_pt_import_file"]["name"])) {
                $explodezipfilename = explode(".", $_FILES["arp_pt_import_file"]["name"]);
                $zipfilename = $explodezipfilename[0];
//                if(strtolower($ext) == "zip")   {
//                    $flag = $arprice_import_export->extract_zip($output_dir . $_FILES["arp_pt_import_file"]["name"], $output_dir . $zipfilename . "_temp");
//                    if ($flag == 'failed') {
//                        _e("There is any error while uncompressing zip.", ARP_PT_TXTDOMAIN);
//                    }
//                }
                ?>
                <script>
                    jQuery('#arp_loader_div').show();
                    var file_name = '<?php echo $zipfilename; ?>';
                    //                    var ext = '<?php // echo $ext;      ?>';
                    jQuery.ajax({
                        type: 'POST',
                        url: ajaxurl,
                        data: 'action=import_table&xml_file=' + file_name,
                        success: function (res)
                        {
                            if (res == 1)
                            {
                                //jQuery("#import_success_message").css('display','block');
                                //setTimeout(function hide_msg(){ jQuery("#import_success_message").fadeOut('slow'); },3000);
                                jQuery('#arp_loader_div').hide();
                                jQuery('#import_success_message').animate({width: 'toggle'}, 'slow');
                                jQuery('#import_success_message').delay(3000).animate({width: 'toggle'}, 'slow');
                                jQuery.ajax({
                                    type: 'POST',
                                    url: ajaxurl,
                                    data: 'action=get_table_list',
                                    success: function (res)
                                    {
                                        jQuery("#arp_export_table_lists").html(res);
                                    }
                                });
                            }
                            else if (res == 0)
                            {
                                jQuery('#arp_loader_div').hide();
                                jQuery("#import_validation_zip_error_message").css('display', '');
                                setTimeout(function hide_err_msg() {
                                    jQuery("#import_validation_zip_error_message").fadeOut('slow');
                                }, 3000);
                            }
                        }
                    });
                </script>
                <?php
            }
        }
    }
}
?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#arp_pt_import_file').on('change', function () {
            var filename = jQuery(this).val();

            if (filename == "") {
                jQuery('#arp_pt_import_file_name').html('No file Selected');
            } else {
                if (/C\:\\fakepath\\/gi.test(filename)) {
                    filename = filename.split('\\');
                    var flength = filename.length;
                    flength = flength - 1;
                    filename = filename[flength];
                }
                jQuery('#arp_pt_import_file_name').html(filename);
            }
        });

        if (typeof select2 === 'function') {
//            console.log('done');
            jQuery('select#arp_table_to_export').select2('distroy');
        }
    });



    /* Validating Imported file */
    function check_valid_imported_file()
    {
        var importFile = jQuery("#arp_pt_import_file").val();
        var extension = importFile.substr((importFile.lastIndexOf('.') + 1));
        var file_nm = importFile.split('_');
        if (importFile == null || importFile == "")
        {
            jQuery("#import_invalid_zip_error_message").css('display', 'none');
            jQuery("#import_blank_zip_error_message").css('display', '');
            jQuery(window.opera ? 'html' : 'html, body').animate({scrollTop: jQuery('#import_blank_zip_error_message').offset().top - 250}, 'slow');
            return false;
        }
        else if (extension != 'txt')
        {
            jQuery("#import_blank_zip_error_message").css('display', 'none');
            jQuery("#import_invalid_zip_error_message").css('display', '');
            jQuery(window.opera ? 'html' : 'html, body').animate({scrollTop: jQuery('#import_invalid_zip_error_message').offset().top - 250}, 'slow');
            return false;
        }
        else if (file_nm[0] != 'arp')
        {
            var isIE11 = !!navigator.userAgent.match(/Trident.*rv\:11\./);
            if (jQuery.browser.webkit || jQuery.browser.msie || jQuery.browser.opera || isIE11) {
                var arr_file_path = importFile.split('\\');
                var filename = arr_file_path[arr_file_path.length - 1];
                var arr_file_name = filename.split('_');
                if (arr_file_name[0] != 'arp') {
                    jQuery("#import_invalid_zip_error_message").css('display', '');
                    jQuery(window.opera ? 'html' : 'html, body').animate({scrollTop: jQuery('#import_invalid_zip_error_message').offset().top - 250}, 'slow');
                    return false;
                } else {
                    return true;
                }
            } else {
                jQuery("#import_invalid_zip_error_message").css('display', '');
                jQuery(window.opera ? 'html' : 'html, body').animate({scrollTop: jQuery('#import_invalid_zip_error_message').offset().top - 250}, 'slow');
                return false;
            }

        }
        else
        {
            return true;
        }
    }

    /* JavaScript for Exporting Table */
    function import_export_table()
    {
//        console.log('here');
        var form = jQuery("#arp_export").serialize();
        if (jQuery("#arp_table_to_export").val() == "" || jQuery("#arp_table_to_export").val() == null)
        {
            jQuery("#export_blank_error_message").css('display', '');
            //setTimeout(function hide_err_msg(){ jQuery("#export_blank_error_message").fadeOut('slow'); },3000);
            return false;
        }
        else
        {
            return true;

        }
        return false;
    }

</script>

<div class="arp_import_export_main">

    <div class="arp_import_export_main_title"><?php _e('Import / Export Pricing Tables', ARP_PT_TXTDOMAIN); ?></div>
    <?php
    if ($setact != 1) {
        $admin_css_url = admin_url('admin.php?page=arp_global_settings');
        ?>

        <div style="margin-top:-35px;margin-bottom:20px;border-left: 4px solid #ffba00;box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);height:20px;width:99%;padding:10px 25px 10px 0px;background-color:#FFFFFF;color:#000000;font-size:17px;display:block;visibility:visible;text-align:right;" >License is not activated. Please activate license from <a href="<?php echo $admin_css_url; ?>">here</a></div>
    <?php } ?>
    <div class="clear" style="clear:both;"></div>
    <div class="success_message" id="import_success_message" style="">
        <?php _e('Table Imported Successfully', ARP_PT_TXTDOMAIN); ?>
    </div> 
    <div class="error_message arp_message_padding" id="import_validation_zip_error_message" style="display:none;">
        <?php _e('Please Select file exported from ARPrice Plugin.', ARP_PT_TXTDOMAIN); ?>
    </div>
    <div class="error_message arp_message_padding" id="import_invalid_zip_error_message" style="display:none;">
        <?php _e('Please Select Valid File.', ARP_PT_TXTDOMAIN); ?>
    </div>
    <div class="error_message arp_message_padding" id="import_blank_zip_error_message" style="display:none;">
        <?php _e('Please Select File.', ARP_PT_TXTDOMAIN); ?>
    </div>
    <div class="error_message arp_message_padding" id="export_blank_error_message" style="display:none;">
        <?php _e('Please Select Table.', ARP_PT_TXTDOMAIN); ?>
    </div>
    <div class="clear" style="clear:both;"></div>
    <div class="arp_import_export_main_inner">

        <div class="arp_export_section">

            <div class="arp_import_export_sub_title"><?php _e('Export Pricing Tables', ARP_PT_TXTDOMAIN); ?></div>

            <div class="import_export_list_main">
                <form  name="arp_export" method="post" action="" id="arp_export" onsubmit="return import_export_table();">
                    <div class="arp_import_export_frm_title"><?php _e('Please Select Table(s)', ARP_PT_TXTDOMAIN); ?></div>
                    <div class="arp_import_export_frm_select" id="arp_export_table_lists"><?php $arprice_import_export->get_table_list(); ?></div>

                    <div class="clear" style="clear:both;"></div>
                    <div class="arp_import_export_frm_submit">
                        <button class="arp_import_export_btn" type="submit" name="export_tables"><img class="arp_import_export_btn_img"><span class="arp_import_export_btn_txt"><?php _e('Export', ARP_PT_TXTDOMAIN); ?></span></button> 
                    </div>
                </form>

            </div>
        </div> 


        <div class="arp_import_section">
            <div class="arp_import_export_sub_title"><?php _e('Import Pricing Tables', ARP_PT_TXTDOMAIN); ?></div>

            <div class="import_export_list_main">
                <form name="arp_import" id="arp_import" method="post" enctype="multipart/form-data" onsubmit="return check_valid_imported_file();" >

                    <table align="left" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td colspan="3"><div class="arp_import_export_frm_title"><?php _e('Please Upload text file exported from ARPrice plugin', ARP_PT_TXTDOMAIN); ?></div></td>
                        </tr>
                        <tr>
                            <td><div class="arp_import_export_select_title"><?php _e('Select File :', ARP_PT_TXTDOMAIN); ?></div></td>                                
                        </tr>

                        <tr>
                            <td>
                                <input type="file" style="opacity:0;width:0px !important;height:0px !important;padding:0px !important;" id="arp_pt_import_file" name="arp_pt_import_file"  />
                                <label for="arp_pt_import_file" class="arp_import_file_main">
                                    <div class="text pd_input_control pd_input_small helpdesk_txt">
                                        <div class="arp_import_export_file_btn"><?php _e('Add File', ARP_PT_TXTDOMAIN); ?></div>
                                        <div id="arp_pt_import_file_name" class= "arp_import_file_name">
                                            <?php _e('No file Selected', ARP_PT_TXTDOMAIN); ?>
                                        </div>
                                    </div>
                                </label>    
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <div class="arp_import_export_frm_submit">
                                    <button class="arp_import_export_btn" type="submit" name="imprort_file" id="import_file" style="margin-top: 20px;"><img class="arp_import_export_btn_img"><span class="arp_import_export_btn_txt"><?php _e('Import', ARP_PT_TXTDOMAIN); ?></span></button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

    </div>
</div>    