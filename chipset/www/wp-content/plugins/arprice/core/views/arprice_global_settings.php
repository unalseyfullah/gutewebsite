<?php
global $arprice_default_settings;
if (is_ssl())
    $google_font_url = "https://fonts.googleapis.com/css?family=Ubuntu";
else
    $google_font_url = "http://fonts.googleapis.com/css?family=Ubuntu";
?>
<link rel="stylesheet" type="text/css" href="<?php echo $google_font_url; ?>" />
<script type="text/javascript" language="javascript">
    function show_success_msg() {
        jQuery('#global_settings_success_message').animate({width: 'toggle'}, 'slow');
        jQuery('#global_settings_success_message').delay(3000).animate({width: 'toggle'}, 'slow');
    }
</script>
<script type="text/javascript" language="javascript">
    function show_success_msg_reset_template() {
        jQuery('#success_message_reset_template').fadeIn();
        setTimeout(function () {
            jQuery('#success_message_reset_template').fadeOut('slow');
        }, 3000);
    }
</script>
<script type="text/javascript" language="javascript">
    function global_column_background_colors() {
        var arp_column_background_colors_var;
        arp_column_background_colors_var = <?php echo json_encode($arprice_default_settings->arp_column_section_background_color());
?>;
        return arp_column_background_colors_var;
    }
</script>
<style>
    .purchased_info{
        color:#7cba6c;
        font-weight:bold;
        font-size: 15px;
    }
	#license_success{
		color:#8ccf7a !important;
	}
    #arfresetlicenseform {
        border-radius:0px;
        text-align:center;
        width:700px;
        height:500px;
        left:35%;
        border:none;
		background:#ffffff !important;
		padding-top:15px;
    }
	.arfnewmodalclose
    {
        font-size: 15px;
        font-weight: bold;
        height: 19px;
        position: absolute;
        right: 3px;
        top:5px;
        width: 19px;
        cursor:pointer;
        color:#D1D6E5;
    }
	.newform_modal_title { font-size:25px; line-height:25px; margin-bottom: 10px; }
	.newmodal_field_title { font-size: 16px;
    line-height: 16px;
    margin-bottom: 10px; }
</style>
<?php
$hostname = $_SERVER["HTTP_HOST"];
	  global $arprice_class;
	  $setact = 0;
	  global $arpriceplugin;
	  $setact = $arprice_class->$arpriceplugin();
	  
	  $is_debug_enable = 0;
		
if (isset($_POST['arp_reset_template']) && $_POST['arp_reset_template'] > 0) {

    $count = count($_POST['arp_reset_template']);

    if ($count > 0) {

        $reset_template = $_POST['arp_reset_template'];

        if ($_POST['arp_reset_template']) {

            foreach ($reset_template as $reset_template_db) {

                $all_template = $wpdb->get_results("SELECT default_general_options FROM {$wpdb->prefix}arp_arprice where ID = {$reset_template_db}", ARRAY_A);

                $update_template = $wpdb->query($wpdb->prepare('UPDATE ' . $wpdb->prefix . 'arp_arprice SET general_options = %s WHERE ID = %d', $all_template[0]['default_general_options'], $reset_template_db));

                $all_template_settings = $wpdb->get_results("SELECT default_table_options FROM {$wpdb->prefix}arp_arprice_options where ID = {$reset_template_db}", ARRAY_A);

                $update_template_settings = $wpdb->query($wpdb->prepare('UPDATE ' . $wpdb->prefix . 'arp_arprice_options SET table_options = %s WHERE ID = %d', $all_template_settings[0]['default_table_options'], $reset_template_db));

                echo "<script type='text/javascript' language='javascript'> setTimeout( function(){ show_success_msg_reset_template(); },10 ); </script>";
            }
        }
    }
}



if (isset($_POST['save_global_settings'])) {

    $global_custom_css = stripslashes_deep($_POST['arp_custom_css']);

    $number_pattern = '/^[0-9]+$/';

    update_option('arp_global_custom_css', $global_custom_css);

    if ($_POST['arp_mobile_responsive_size'] != '') {
        if (preg_match($number_pattern, $_POST['arp_mobile_responsive_size']) > 0) {
            $mobile_view_width = $_POST['arp_mobile_responsive_size'];
            update_option('arp_mobile_responsive_size', $mobile_view_width);
        } else {
            $mobile_view_width = 480;
        }
    } else {
        $mobile_view_width = 480;
    }

    if ($_POST['arp_tablet_responsive_size'] != '') {
        if (preg_match($number_pattern, $_POST['arp_tablet_responsive_size']) > 0) {
            $mobile_view_width = $_POST['arp_tablet_responsive_size'];
            update_option('arp_tablet_responsive_size', $mobile_view_width);
        } else {
            $tablet_view_width = 768;
        }
    } else {
        $tablet_view_width = 768;
    }

    if ($_POST['arp_desktop_responsive_size'] != '') {
        if (preg_match($number_pattern, $_POST['arp_desktop_responsive_size']) > 0) {
            $mobile_view_width = $_POST['arp_desktop_responsive_size'];
            update_option('arp_desktop_responsive_size', $mobile_view_width);
        } else {
            $tablet_view_width = 0;
        }
    } else {
        $tablet_view_width = 0;
    }

    $arp_css_character_set = isset($_POST['arp_css_character_set']) ? $_POST['arp_css_character_set'] : '';
    update_option('arp_css_character_set', $arp_css_character_set);

    echo "<script type='text/javascript' language='javascript'> setTimeout( function(){ show_success_msg(); },10 ); </script>";
    
if (isset($_POST['arp_load_js_css']) && $_POST['arp_load_js_css'] == 'arp_load_js_css') {
    update_option('arp_load_js_css', $_POST['arp_load_js_css']);
}else{
    delete_option('arp_load_js_css');
}
if (isset($_POST['arp_enable_analytics']) && $_POST['arp_enable_analytics'] == 'arp_enable_analytics') {
    update_option('arp_enable_analytics', $_POST['arp_enable_analytics']);
} else {
    delete_option('arp_enable_analytics');
}
}
?>

<div class="arp_global_setting_main">
    <div class="arp_global_setting_main_title"><?php _e('Pricing Table Settings', ARP_PT_TXTDOMAIN); ?></div>
    <?php
    if ($setact != 1) {
        $admin_css_url = admin_url('admin.php?page=arp_global_settings');
        ?>
        <div style="margin-top:-35px;margin-bottom:20px;border-left: 4px solid #ffba00;text-align:right;box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);height:20px;width:99%;padding:10px 25px 10px 0px;background-color:#FFFFFF;color:#000000;font-size:17px;display:block;visibility:visible;" >License is not activated. Please activate license from <a href="<?php echo $admin_css_url; ?>">here</a></div>
    <?php } ?>
    <div class="clear" style="clear:both;"></div>
    <div class="success_message global_settings" id="global_settings_success_message"> 
        <div class="message_descripiton"><?php _e('Changes Saved Successfully.', ARP_PT_TXTDOMAIN); ?></div>		
    </div>
    <?php
    if (isset($_POST['save_global_settings'])) {
        ?>

    <?php } else { ?>
        <div class="success_message global_settings arp_message_padding" id="success_message_reset_template"> 
            <div class="message_descripiton"><?php _e('Template Reset Successfully.', ARP_PT_TXTDOMAIN); ?></div>
        </div>
    <?php } ?>
    <div class="arp_global_setting_main_inner">
        <div class="arprice_global_settings">

            <div class="arp_global_setting_sub_title"><?php _e('Global Settings', ARP_PT_TXTDOMAIN); ?></div>
            <div class="arprice_analytics_browser" style="float:left;">
                <form id="arp_settings_form" name="arp_settings_form" method="post" enctype="multipart/form-data">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="float:left;">

                        <?php
                        if ($setact == 1 && $is_debug_enable == 0) {
                            $get_purchased_info = get_option('arpSortInfo');

                            $sortorderval = base64_decode($get_purchased_info);
                            $ordering = array();

                            $pcodeinfo = "";
                            $pcodedate = "";
                            $pcodedateexp = "";
                            $pcodelastverified = "";
                            $pcodecustemail = "";

                            if (is_array($ordering)) {
                                $ordering = explode("^", $sortorderval);
								
								if(is_array($ordering)) {
                                if(isset($ordering[0]) && $ordering[0]!= "" ) { $pcodeinfo = $ordering[0]; } else { $pcodeinfo = "";}
								 if(isset($ordering[1]) && $ordering[1]!= "" ) { $pcodedate = $ordering[1]; } else { $pcodedate = "";}
								  if(isset($ordering[2]) && $ordering[2]!= "" ) { $pcodedateexp = $ordering[2]; } else { $pcodedateexp = "";}
								   if(isset($ordering[3]) && $ordering[3]!= "" ) { $pcodelastverified = $ordering[3]; } else { $pcodelastverified = "";}
								   if(isset($ordering[4]) && $ordering[4]!= "" ) { $pcodecustemail = $ordering[4]; } else { $pcodecustemail = "";}

								}
                            }
                            ?>


                            <tr class="arfmainformfield" valign="top"><td class="lbltitle" colspan="3" ><div class="arp_global_setting_frm_main_title"><?php _e('Product License', ARP_PT_TXTDOMAIN); ?>&nbsp;</div></td></tr>

                            <tr class="arfmainformfield" valign="top">

                                <td class="tdclass" style="padding-left:30px; padding-top:22px; font-size:16px; padding-left: 22%;" width="18%">

                                    <label class="lblsubtitle"><?php _e('License Status', ARP_PT_TXTDOMAIN) ?></label>

                                </td>

                                <td>	
                                    <div id="licenseactivatedmessage" class="updated" style="width:300px; vertical-align:top;"><?php echo "Your license is currently Active."; ?></div>


                                    <span id="license_link"><button type="button" id="remove-license-purchase-code" name="remove_license" style="width:150px; border:0px; color:#FFFFFF; height:40px; border-radius:3px;" onclick="deactivate_license();" class="red_remove_license_btn"><?php _e('Remove License', ARP_PT_TXTDOMAIN); ?></button></span>

                                    <span id="deactivate_loader" style="display:none;"><img src="<?php echo PRICINGTABLE_IMAGES_URL . '/loading_activation.gif'; ?>" height="15" /></span>   		
                                    <span id="deactivate_error" class="arp_not_verify_li" style="display:none;"><?php _e('Invalid Request', ARP_PT_TXTDOMAIN); ?></span>
                                    <span id="deactivate_success" class="arp_verify_li"  style="display:none;"><?php _e('License Deactivated Successfully.', ARP_PT_TXTDOMAIN); ?></span>
                                </td>
                                <td></td>
                            </tr>

                            <?php if ($get_purchased_info != "") { ?>

                                <tr class="arfmainformfield" valign="top">


                                    <td class="tdclass" style="padding-left:30px; padding-top:22px; font-size:16px; padding-left: 22%;" width="18%" >





                                    </td>

                                    <td>	

                                        <label class="lblsubtitle" style="font-weight:bold;font-size:16px;margin-left:-135px;"><?php _e('Activation Information:', ARP_PT_TXTDOMAIN) ?>&nbsp;&nbsp;</label>


                                    </td>


                                </tr>

                                <tr class="arfmainformfield" valign="top">


                                    <td class="tdclass" style="padding-left:30px; padding-top:22px; padding-left: 22%;" width="18%">



                                        <label class="lblsubtitle"><?php _e('Purchase Code:', ARP_PT_TXTDOMAIN) ?>&nbsp;&nbsp;</label>

                                    </td>

                                    <td style="padding-top:22px;">	

                                        <label class="purchased_info"><?php echo $pcodeinfo; ?></label>


                                    </td>
                                </tr>

                                <tr class="arfmainformfield" valign="top">


                                    <td class="tdclass" style="padding-left:30px; padding-top:22px;  padding-left: 22%;" width="18%">



                                        <label class="lblsubtitle"><?php _e('Purchased On:', ARP_PT_TXTDOMAIN) ?>&nbsp;&nbsp;</label>

                                    </td>

                                    <td style="padding-top:22px;">	

                                        <label class="purchased_info"><?php echo $pcodedate; ?></label>


                                    </td>
                                </tr>

                                <tr class="arfmainformfield" valign="top">

                                    <td class="tdclass" style="padding-left:30px; padding-top:22px; padding-left: 22%;" width="18%">         			


                                        <label class="lblsubtitle"><?php _e('Support Expires On:', ARP_PT_TXTDOMAIN) ?>&nbsp;&nbsp;</label>

                                    </td>

                                    <td style="padding-top:22px;">	

                                        <label class="purchased_info"><?php echo $pcodedateexp; ?></label>

                                    </td>


                                </tr>

                                                                <!--<tr class="arfmainformfield" valign="top">

                                                                    <td class="tdclass" style="padding-left:30px;" width="25%">        			


                                                                        <label class="lblsubtitle"><?php //_e('Last Verified:', ARP_PT_TXTDOMAIN)     ?>&nbsp;&nbsp;&nbsp;</label>

                                                                    </td>

                                                                    <td>
                                                                        
                                                                        <label class="purchased_info"><?php //echo $pcodelastverified;    ?></label>

                                                                    </td>


                                                                </tr> -->

                                <tr class="arfmainformfield" valign="top">


                                    <td class="tdclass" style="padding-left:30px; padding-top:22px; padding-left: 22%;" width="18%">



                                        <label class="lblsubtitle"><?php _e('Customer Email:', ARP_PT_TXTDOMAIN) ?>&nbsp;&nbsp;&nbsp;</label>

                                    </td>

                                    <td style="padding-top:22px;">	

                                        <label class="purchased_info"><?php echo $pcodecustemail; ?></label>


                                    </td>
                                </tr> 

                            <?php } ?>

                            <tr class="arfmainformfield" valign="top"><td class="lbltitle" colspan="3"  style="width:100%"><div class="arp_dotted_line"></div></td></tr>
                            <?php
                        }
                        if ($setact != 1 && $is_debug_enable == 0) {
                            ?>
                            <tr class="arfmainformfield" valign="top"><td class="lbltitle" colspan="3" ><div class="arp_global_setting_frm_main_title"><?php _e('Product License', ARP_PT_TXTDOMAIN); ?>&nbsp;</div></td></tr>

                            <tr>
                                <td colspan="3" style="padding-left:10px;">
                                    <label class="lblsubtitle"><div class="arp_global_setting_frm_title" style="width:94%;" ><?php _e('A valid license key entitles you to support and enables automatic updates. Also you can get Analytics, Custom colors for templates and Toggle Pricing facility after activate your license. A license key only be used for one installation of WordPress at a time.', ARP_PT_TXTDOMAIN) ?></div></label><br />
                                </td>
                            </tr>

                            <tr class="arpmainformfield" valign="top">
                                <td class="tdclass" style="padding-left:20%;" width="18%">
                                    <label class="lblsubtitle"><?php _e('Customer Name', ARP_PT_TXTDOMAIN) ?>&nbsp;&nbsp;<span style="vertical-align:middle" class="arfglobalrequiredfield">*</span></label>
                                </td>
                                <td>	
                                    <input type="text" name="li_customer_name" id="li_customer_name" class="txtstandardnew" size="200" value="" autocomplete="off" />
                                    <div class="arperrmessage" id="li_customer_name_error" style="display:none;"><?php _e('This field cannot be blank.', ARP_PT_TXTDOMAIN); ?></div>
                                </td>
                                <td></td>
                            </tr>

                            <tr class="arpmainformfield" valign="top">
                                <td class="tdclass" style="padding-left:20%;" width="18%">
                                    <label class="lblsubtitle"><?php _e('Customer Email', ARP_PT_TXTDOMAIN) ?>&nbsp;&nbsp;&nbsp;</label>
                                </td>
                                <td>	
                                    <input type="text" name="li_customer_email" id="li_customer_email" class="txtstandardnew" size="42" value="" autocomplete="off" />
                                </td>
                                <td></td>
                            </tr>	

                            <tr class="arpmainformfield" valign="top">
                                <td class="tdclass" style="padding-left:20%;" width="18%">
                                    <label class="lblsubtitle"><?php _e('Purchase Code', ARP_PT_TXTDOMAIN) ?>&nbsp;&nbsp;<span style="vertical-align:middle" class="arfglobalrequiredfield">*</span></label>
                                </td>

                                <td>
                                    <input type="text" name="li_license_key" id="li_license_key" class="txtstandardnew" size="42" value="" autocomplete="off" />
                                    <div class="arperrmessage" id="li_license_key_error" style="display:none;"><?php _e('This field cannot be blank.', ARP_PT_TXTDOMAIN); ?></div>
                                </td>
                                <td></td>
                            </tr>

                            <tr class="arpmainformfield" valign="top">
                                <td class="tdclass" style="padding-left:20%;" width="18%"> 
                                    <label class="lblsubtitle"><?php _e('Domain Name', ARP_PT_TXTDOMAIN) ?>&nbsp;&nbsp;&nbsp;</label>
                                </td>
                                <td>	
                                    <label class="lblsubtitle"><?php echo $hostname; ?></label>
                                    <input type="hidden" name="li_domain_name" id="li_domain_name" class="txtstandardnew" size="42" value="<?php echo $hostname; ?>" autocomplete="off" />
                                </td>
                                <td></td>
                            </tr>

                            <tr class="arpmainformfield" valign="top">
                                <td class="tdclass"> </td>

                                <td style="padding-top:20px;">					
                                    <span id="license_link"><button type="button" id="verify-purchase-code" name="continue" style="width:150px; border:0px; color:#FFFFFF; height:40px; border-radius:3px;" class="greensavebtn"><?php _e('Activate', ARP_PT_TXTDOMAIN); ?></button></span>
                                    <span id="license_loader" style="display:none;"><img src="<?php echo PRICINGTABLE_IMAGES_URL . '/loading_activation.gif'; ?>" height="15" /></span>   		
                                    <span id="license_error" class="arp_not_verify_li" style="display:none;">&nbsp;</span>
                                    <span id="license_reset" class="arp_not_verify_li" style="display:none;">&nbsp;&nbsp;<a onclick="javascript:return false;" href="#">Click here to submit RESET request</a></span>
                                    <span id="license_success" class="arp_verify_li"  style="display:none;"><?php _e('License Activated Successfully.', ARP_PT_TXTDOMAIN); ?></span>
                                    <input type="hidden" name="ajaxurl" id="ajaxurl" value="<?php echo admin_url('admin-ajax.php'); ?>"  />
                                </td>
                                <td></td>
                            </tr>
                            <tr class="arfmainformfield" valign="top"><td class="lbltitle" colspan="3" style="width:100%;"><div class="arp_dotted_line"></div></td></tr>
                        <?php } ?>



                        <tr class="arfmainformfield" valign="top"><td class="lbltitle" colspan="3"><div class="arp_global_setting_frm_main_title"><?php _e('Global Custom CSS', ARP_PT_TXTDOMAIN); ?></div></td></tr>


                        <tr><td class="lbltitle" colspan="3"><div class="arp_global_setting_frm_title"><?php _e('Custom CSS', ARP_PT_TXTDOMAIN) ?></div></td></tr>

                        <tr>
                            <td colspan="3">
                                <div class="arp_global_settings_custom_css_wrapper">
                                    <textarea class='arp_custom_css arp_global_setting_custom_css_textarea' name='arp_custom_css' id='arp_custom_css' ><?php echo get_option('arp_global_custom_css'); ?></textarea>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <span class="arp_global_setting_custom_css_eg">(e.g.)&nbsp;&nbsp; .btn{color:#000000;}</span>
                            </td>
                        </tr>

                        <tr class="arfmainformfield" valign="top"><td class="lbltitle" colspan="3"  style="width:100%;"><div class="arp_dotted_line"></div></td></tr>

                        <tr class="arfmainformfield" valign="top"><td class="lbltitle" colspan="3"><div class="arp_global_setting_frm_main_title"><?php _e('Responsive Settings', ARP_PT_TXTDOMAIN); ?></div></td></tr>

                        <tr class="arpmainformfield arp_global_setting_resonsive_main" valign="top">

                            <td class="tdclass arp_global_setting_resonsive_title_section"><label class="lblsubtitle arp_global_setting_resonsive_main_title"><?php _e('Mobile View', ARP_PT_TXTDOMAIN) ?><span class="arp_global_setting_resonsive_sub_title"> <?php _e('(Max-Width)', ARP_PT_TXTDOMAIN); ?></span></label></td>

                            <td class="tdclass arp_global_setting_resonsive_title_section"><label class="lblsubtitle arp_global_setting_resonsive_main_title"><?php _e('Tablet View', ARP_PT_TXTDOMAIN) ?><span class="arp_global_setting_resonsive_sub_title"> <?php _e('(Max-Width)', ARP_PT_TXTDOMAIN); ?></span></label></td>

                            <td class="tdclass arp_global_setting_resonsive_title_section"><label class="lblsubtitle arp_global_setting_resonsive_main_title"><?php _e('Desktop View', ARP_PT_TXTDOMAIN) ?><span class="arp_global_setting_resonsive_sub_title"> <?php _e('(Optional)', ARP_PT_TXTDOMAIN); ?></span></label></td>                                

                        </tr>

                        <tr class="arpmainformfield arp_global_setting_resonsive_main" valign="top">

                            <td class="arp_global_setting_resonsive_title_section"><input type="text" name="arp_mobile_responsive_size" id="arp_mobile_responsive_size" class="txtstandardnew" size="42" value="<?php echo get_option('arp_mobile_responsive_size'); ?>" autocomplete="off" />&nbsp;&nbsp;<label class="responsive_screen_width_unit"><?php _e('px', ARP_PT_TXTDOMAIN); ?></label></td>    

                            <td class="arp_global_setting_resonsive_title_section"><input type="text" name="arp_tablet_responsive_size" id="arp_tablet_responsive_size" class="txtstandardnew" size="42" value="<?php echo get_option('arp_tablet_responsive_size'); ?>" autocomplete="off" />&nbsp;&nbsp;<label class="responsive_screen_width_unit"><?php _e('px', ARP_PT_TXTDOMAIN); ?></label></td>

                            <td class="arp_global_setting_resonsive_title_section"><input type="text" name="arp_desktop_responsive_size" id="arp_desktop_responsive_size" class="txtstandardnew" size="42" value="<?php echo get_option('arp_desktop_responsive_size'); ?>" autocomplete="off" />&nbsp;&nbsp;<label class="responsive_screen_width_unit"><?php _e('px', ARP_PT_TXTDOMAIN); ?></label></td>
                        </tr> 	

                        <tr class="arpmainformfield" valign="top">
                            <td></td>
                            <td></td>
                            <td class="arp_global_setting_resonsive_title_section">
                                <span class="arp_global_setting_resonsive_sub_untitle">(Zero (0) means Unlimited)</span>
                            </td>
                        </tr>

                        <tr class="arfmainformfield" valign="top"><td class="lbltitle" colspan="3" style="width:100%;"><div class="arp_dotted_line"></div></td></tr>
                        
                        <tr class="arfmainformfield" valign="top"><td class="lbltitle" colspan="3"><div class="arp_global_setting_frm_main_title"><?php _e('Choose the character sets you want to add with google fonts', ARP_PT_TXTDOMAIN); ?></div></td></tr>

                        <tr class="arpmainformfield" valign="top">

                            <td colspan="3" class="arp_fix_padding">
                                <div class="arp_reset_template_wrapper arp_global_setting_google_fonts">
                                    <?php
                                    $arp_default_character_arr = get_option('arp_css_character_set');
                                    $arp_google_character_arr = array('latin' => 'Latin', 'latin-ext' => 'Latin-ext', 'menu' => 'Menu', 'greek' => 'Greek', 'greek-ext' => 'Greek-ext', 'cyrillic' => 'Cyrillic',
                                        'cyrillic-ext' => 'Cyrillic-ext', 'vietnamese' => 'Vietnamese', 'arabic' => 'Arabic', 'khmer' => 'Khmer', 'lao' => 'Lao', 'tamil' => 'Tamil', 'bengali' => 'Bengali',
                                        'hindi' => 'Hindi', 'korean' => 'Korean');
                                    ?>
                                    <div style="width:100%; float:left;">
                                        <span style="width:100%; float:left;">
                                            <?php $arp_chk_counter = 1; ?> 
                                            <?php
                                            foreach ($arp_google_character_arr as $arp_google_character_key => $arp_google_character_value) {
                                                $arp_default_character_arr[$arp_google_character_key] = isset($arp_default_character_arr[$arp_google_character_key]) ? $arp_default_character_arr[$arp_google_character_key] : '';
                                                ?>                                            
                                                <p style="width: 117px; float: left;"><input type="checkbox" class="arp_checkbox light_bg arp_reset_templates" id="arp_character_<?php echo $arp_google_character_key; ?>" name="arp_css_character_set[<?php echo $arp_google_character_key; ?>]" <?php checked($arp_default_character_arr[$arp_google_character_key], $arp_google_character_key); ?> value="<?php echo $arp_google_character_key; ?>" /><label data-for="arp_character_<?php echo $arp_google_character_key; ?>"><?php echo $arp_google_character_value; ?></label></p>
                                                <?php echo ($arp_chk_counter % 8 == 0) ? '</span><span style="width:100%; float:left;">' : ''; ?>
                                                <?php $arp_chk_counter++; ?>
                                                <?php
                                            }
                                            ?>
                                        </span>
                                    </div>    
                                </div>
                            </td>

                        </tr>
                        <tr class="arfmainformfield" valign="top">
                            <td class="lbltitle" colspan="3" style="width:100%;">
                                <div class="arp_dotted_line"></div>
                            </td>
                        </tr>
                        <tr class="arfmainformfield" valign="top"><td class="lbltitle" colspan="3"><div class="arp_global_setting_frm_main_title"><?php _e('Track button click of pricing table', ARP_PT_TXTDOMAIN); ?></div></td></tr>
                                                <tr>
                            <td colspan="3">
                                <span class="arp_global_setting_custom_css_eg"><?php _e(' ( If you do not want to get analytics of clicked column than uncheck below checkbox. ) ', ARP_PT_TXTDOMAIN); ?> </span>
                            </td>
                        </tr>
                                                <tr class="arpmainformfield" valign="top">

                            <td class="arp_fix_padding" colspan="3">
                                <div class="arp_reset_template_wrapper arp_global_setting_google_fonts">
                                    <span>
                                        <p>
                                            <input type="checkbox" class="arp_checkbox light_bg arp_reset_templates" id="arp_enable_analytics" name="arp_enable_analytics" <?php checked(get_option('arp_enable_analytics'), 'arp_enable_analytics'); ?> value="arp_enable_analytics" style="margin-top:0px;"/>
                                            <label data-for="arp_enable_analytics">
                                                <?php _e('Enable Analytics', ARP_PT_TXTDOMAIN); ?>
                                            </label>
                                        </p>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr class="arfmainformfield" valign="top">
                            <td class="lbltitle" colspan="3" style="width:100%;">
                                <div class="arp_dotted_line"></div>
                            </td>
                        </tr>
                        <tr class="arfmainformfield" valign="top"><td class="lbltitle" colspan="3"><div class="arp_global_setting_frm_main_title"><?php _e('Load JS & CSS in all pages', ARP_PT_TXTDOMAIN); ?></div></td></tr>
                        <tr>
                            <td colspan="3">
                                <span class="arp_global_setting_custom_css_eg"><?php _e(' ( Not recommended - If you have any js/css loading issue in your theme, only in that case you should enable this settings )', ARP_PT_TXTDOMAIN); ?> </span>
                            </td>
                        </tr>
                        <tr class="arpmainformfield" valign="top">

                            <td class="arp_fix_padding" colspan="3">
                                <div class="arp_reset_template_wrapper arp_global_setting_google_fonts">
                                    <span>
                                        <p>
                                            <input type="checkbox" class="arp_checkbox light_bg arp_reset_templates" id="arp_load_js_css" name="arp_load_js_css" <?php checked(get_option('arp_load_js_css'), 'arp_load_js_css'); ?> value="arp_load_js_css" style="margin-top:0px;"/>
                                            <label data-for="arp_load_js_css">
                                                <?php _e('Load JS & CSS', ARP_PT_TXTDOMAIN); ?>
                                            </label>
                                        </p>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr style="margin-top:50px;">
                            <td colspan="3" class="arp_fix_padding"><button type="submit" id="set_global_settings" name="save_global_settings" class="greensavebtn arp_global_setting_btn"><?php _e('Save Changes', ARP_PT_TXTDOMAIN); ?></button></td>
                        </tr>
                    </table>
                </form>
            </div>

        </div>
    </div>
</div>
<div id="arfresetlicenseform" style="display:none;">
		
		<div class="arfnewmodalclose" onclick="javascript:return false;"><img src="<?php echo PRICINGTABLE_IMAGES_URL . '/close-button.png'; ?>" align="absmiddle" /></div>
        <div class="newform_modal_title_container">
        	<div class="newform_modal_title">&nbsp;RESET LICENSE</div>
    	</div>
       <div class="newmodal_field_title"><?php _e('Please submit this form if you have trouble activating license.', ARP_PT_TXTDOMAIN); ?></div>
        <iframe style="display:block; height:100%; width:100%; margin-top:0px;" frameborder="0" name="test" id="resetlicframe" src="" hspace="0"></iframe>
</div> 