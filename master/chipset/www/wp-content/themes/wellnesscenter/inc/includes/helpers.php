<?php
if (!defined('ABSPATH'))
    die('Direct access forbidden.');

/**
 * Helper functions used all over the theme
 */
// Escapes wp-editor data
// since 1.0

function wellnesscenter_editor_data($value) {
    return wp_kses_post($value);
}

// Creates SEO friendly section ID from page ID. Returns page ID directly if $return = true
// since 2.0
function wellnesscenter_sectionID($id, $returnID = false) {

    if ($returnID == false) {

        $str = get_the_title($id);
        $patterns = array(
            "/[:#+*+&+!+@+!+\.+?+%+$+\"+'+^+\[+<+{+\(+\)}+>+\]+,+`+;+,+=+\\\\]/", // match unwanted special characters
            "@<(script|style)[^>]*?>.*?</\\1>@si", // match <script>, <style> tags
            "/[~\r\n\t \/_|+ -]+/" // match newline, tab and more unwanted characters
        );

        $replacements = array(
            "", // for 1st match
            "", // for 2nd match
            "-" // for 3rd match
        );

        $str = preg_replace($patterns, $replacements, strip_tags($str));
        return strtolower(trim($str, '-'));
    } else {

        return "section-$id";
    }
}

// Gets darken or lighten color from hex
// since 2.0
function wellnesscenter_colorFeq($hex, $percent) {

    // Check if shorthand hex value given (eg. #FFF instead of #FFFFFF)
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex, 0, 1), 2) . str_repeat(substr($hex, 1, 1), 2) . str_repeat(substr($hex, 2, 1), 2);
    }
    // Work out if hash given
    $hash = '';
    if (stristr($hex, '#')) {
        $hex = str_replace('#', '', $hex);
        $hash = '#';
    }
    /// HEX TO RGB
    $rgb = array(hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2)));
    //// CALCULATE 
    for ($i = 0; $i < 3; $i++) {
        // See if brighter or darker
        if ($percent > 0) {
            // Lighter
            $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1 - $percent));
        } else {
            // Darker
            $positivePercent = $percent - ($percent * 2);
            $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1 - $positivePercent));
        }
        // In case rounding up causes us to go to 256
        if ($rgb[$i] > 255) {
            $rgb[$i] = 255;
        }
    }
    //// RBG to Hex
    $hex = '';
    for ($i = 0; $i < 3; $i++) {
        // Convert the decimal digit to hex
        $hexDigit = dechex($rgb[$i]);
        // Add a leading zero if necessary
        if (strlen($hexDigit) == 1) {
            $hexDigit = "0" . $hexDigit;
        }
        // Append to the hex string
        $hex .= $hexDigit;
    }
    return $hash . $hex;
}

// Gets original page ID/ Slug
// since 1.0
function wellnesscenter_main($id, $name = true) {
    if (function_exists('icl_object_id')) {
        $id = icl_object_id($id, 'page', true, 'en');
    }

    if ($name === true) {
        $post = get_post($id);
        return $post->post_name;
    } else {
        return $id;
    }
}

// Gets post's meta data in a much simplier way.
// since 1.0

function wellnesscenter_get_post_meta($id, $needle) {
    $data = get_post_meta($id, 'fw_options');
    if (is_array($data) && isset($data[0]['page_sections'])) {
        $data = $data[0]['page_sections'];

        if (is_array($data)) {
            return wellnesscenter_seekKey($data, $needle);
        }
    }
}

function wellnesscenter_seekKey($haystack, $needle) {
    foreach ($haystack as $key => $value) {

        if ($key == $needle) {
            return $value;
        } elseif (is_array($value)) {
            return wellnesscenter_seekKey($value, $needle);
        }
    }
}

// Gets unyson option data in safe mode
// since 1.0

function wellnesscenter_get_option($k, $v = '', $m = 'theme-settings') {
    if (defined('FW')) {
        switch ($m) {
            case 'theme-settings':
                $v = fw_get_db_settings_option($k);
                break;

            default:
                $v = '';
                break;
        }
    }
    return $v;
}

// Get Youtube video ID from URL
// sience 1.0
function wellnesscenter_getYoutubeIdFromUrl($url) {
    $parts = parse_url($url);
    if (isset($parts['query'])) {
        parse_str($parts['query'], $qs);
        if (isset($qs['v'])) {
            return $qs['v'];
        } else if (isset($qs['vi'])) {
            return $qs['vi'];
        }
    }
    if (isset($parts['path'])) {
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path) - 1];
    }
    return false;
}

// Gets unyson image url from option data in a much simple way
// sience 1.0

function wellnesscenter_get_image($k, $v = '', $d = false) {

    if ($d == true) {
        $attachment = $k;
    } else {
        $attachment = wellnesscenter_get_option($k);
    }

    if (isset($attachment['url']) && !empty($attachment)) {
        $v = $attachment['url'];
    }

    return $v;
}

// Fixes classes for buttons (may be not in use)
// since 1.0

if (!function_exists('wellnesscenter_theme_button_class')) :

    function wellnesscenter_theme_button_class($style) {
        if ($style == 'default') {
            echo 'default';
        } elseif ($style == 'primary') {
            echo 'primary';
        } else {
            echo 'default';
        }
    }

endif;


// wpml compatitible 
// since 1.0

if (!function_exists('wellnesscenter_theme_translate')) :

    function wellnesscenter_theme_translate($content) {
        $content = html_entity_decode($content, ENT_QUOTES, 'UTF-8');

        if (function_exists('icl_object_id') && strpos($content, 'wpml_translate') == true) {
            $content = do_shortcode($content);
        } elseif (function_exists('qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage')) {
            $content = qtrans_useCurrentLanguageIfNotFoundUseDefaultLanguage($content);
        }

        return $content;
    }

endif;

// Displays apple touch icons, favicon, Facebook og icon
// since 1.0

function wellnesscenter_get_header_icons() {
    $favicon = wellnesscenter_get_image('favicon', WELLNESSCENTER_IMAGES . '/ico/favicon.png');
    $apple52 = wellnesscenter_get_image('apple_touch_icon52', WELLNESSCENTER_IMAGES . '/ico/apple-52.png');
    $apple72 = wellnesscenter_get_image('apple_touch_icon72', WELLNESSCENTER_IMAGES . '/ico/apple-72.png');
    $apple114 = wellnesscenter_get_image('apple_touch_icon114', WELLNESSCENTER_IMAGES . '/ico/apple-114.png');
    $apple144 = wellnesscenter_get_image('apple_touch_icon144', WELLNESSCENTER_IMAGES . '/ico/apple-144.png');

    if (!empty($favicon)) {
        echo '<meta property="og:image" content="' . esc_url($favicon) . '"/>' . "\n";
    }
    if (!empty($favicon)) {
        echo '<link rel="shortcut icon" type="image/png" href="' . esc_url($favicon) . '">' . "\n";
    }
    if (!empty($apple52)) {
        echo '<link rel="apple-touch-icon-precomposed" sizes="52x52" href="' . esc_url($apple52) . '">' . "\n";
    }
    if (!empty($apple72)) {
        echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . esc_url($apple72) . '">' . "\n";
    }
    if (!empty($apple114)) {
        echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . esc_url($apple114) . '">' . "\n";
    }
    if (!empty($apple144)) {
        echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . esc_url($apple144) . '">' . "\n";
    }
}

// simply echos the variable

function wellnesscenter_return($s) {
    return $s;
}

add_filter('admin_footer_text', 'wellnesscenter_admin_footer');
add_filter('update_footer', 'wellnesscenter_footer_version', 11);

function wellnesscenter_admin_footer($default) {
    return $default . ' | Theme Developed by <a href="http://themeforest.net/user/XpeedStudio/portfolio" target="_blank">XpeedStudio</a><br /> ';
}

function wellnesscenter_footer_version($default) {
    $xs_theme = wp_get_theme();
    $n = $xs_theme->get('Name');
    $v = $xs_theme->get('Version');
    return $default . ' | ' . ' <b>' . $n . '</b>' . ' ' . $v;
}

/*
 * Section Edit option
 * 
 * This function for show section edit option in every section in one page 
 * 
 * Since 1.0
 *  */

function wellnesscenter_edit_section() {
    ?>
    <div class="section-edit">
        <div class="container relative">
            <?php
            if (is_user_logged_in()) {
                edit_post_link(esc_html__('Edit', 'wellnesscenter'), '', '');
            }
            ?>
            <span class="section-abc"><?php echo esc_html(get_the_title()); ?></span>
        </div>
    </div> 
    <?php
}

function preloader() {
    $preloder = wellnesscenter_get_option('hide_preloader');
    if ($preloder != 'yes') {
        ?>
        <!-- Preloader start -->
        <div id="page-preloader" class="animated text-center">
            <img src="<?php echo esc_url(wellnesscenter_get_image('loading_img', WELLNESSCENTER_IMAGES . '/preloader-logo.png')); ?>" alt="<?php bloginfo('name'); ?>" class="logo-prelaoder"/>
            <h1 class="title-preloader"><?php bloginfo('name'); ?></h1>
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
        <!-- Preloader end -->
        <?php
    }
}
