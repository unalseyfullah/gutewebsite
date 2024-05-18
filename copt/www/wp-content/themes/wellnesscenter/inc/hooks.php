<?php

if (!defined('ABSPATH'))
    die('Direct access forbidden.');
/**
 * Theme’s filters and actions
 */
/*
 * Widget register
 */
if (!function_exists('wellnesscenter_widget_init')) {

    function wellnesscenter_widget_init() {
        if (function_exists('register_sidebar')) {
            register_sidebar(
                    array(
                        'name' => __('Main Widget Area', 'wellnesscenter'),
                        'id' => 'sidebar-1',
                        'description' => __('Appears on posts and pages.', 'wellnesscenter'),
                        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                        'after_widget' => '</aside>',
                        'before_title' => '<h3 class="widget-title">',
                        'after_title' => '</h3>',
                    )
            );
            register_sidebar(
                    array(
                        'name' => __('Woocommerce Widget Area', 'wellnesscenter'),
                        'id' => 'sidebar-woo',
                        'description' => __('Appears on Woocommerce With sidebar template.', 'wellnesscenter'),
                        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                        'after_widget' => '</aside>',
                        'before_title' => '<h3 class="widget-title">',
                        'after_title' => '</h3>',
                    )
            );
        }
    }

    add_action('widgets_init', 'wellnesscenter_widget_init');
}


/*
 * GOOGLE FONT
 * since 1.0
 */

function _filter_wellnesscenter_add_hind_google_font($fonts) {
    $fonts['Roboto'] = array(
        'family' => 'Roboto',
        'variants' => array(
            300, 400, 500, 700
        ),
    );
    ksort($fonts);
    return $fonts;
}

add_filter('fw_google_fonts', '_filter_wellnesscenter_add_hind_google_font');


if (!function_exists('_action_wellnesscenter_process_google_fonts')) {

    function _action_wellnesscenter_process_google_fonts() {
        $include_from_google = array();
        $google_fonts = fw_get_google_fonts();

        $body_font = fw_get_db_settings_option('body_font');

        if (isset($google_fonts[$body_font['family']])) {
            $include_from_google[$body_font['family']] = $google_fonts[$body_font['family']];
        }

        $google_fonts_links = wellnesscenter_get_remote_fonts($include_from_google);
        // set a option in db for save google fonts link
        update_option('fw_theme_google_fonts_link', $google_fonts_links);
    }

    add_action('fw_settings_form_saved', '_action_wellnesscenter_process_google_fonts', 999, 2);
}

if (!function_exists('wellnesscenter_get_remote_fonts')) :

    function wellnesscenter_get_remote_fonts($include_from_google) {
        /**
         * Get remote fonts
         * @param array $include_from_google
         */
        if (!sizeof($include_from_google)) {
            return '';
        }

        $html = "<link href='https://fonts.googleapis.com/css?family=";

        foreach ($include_from_google as $font => $styles) {
            $html .= str_replace(' ', '+', $font) . ':' . implode(',', $styles['variants']) . '|';
        }

        $html = substr($html, 0, - 1);
        $html .= "' rel='stylesheet' type='text/css'> \n";

        return $html;
    }

endif;

if (!function_exists('_action_wellnesscenter_print_google_fonts_link')) :

    function _action_wellnesscenter_print_google_fonts_link() {
        /**
         * Print google fonts link
         */
        $google_fonts_link = get_option('fw_theme_google_fonts_link', '');
        if ($google_fonts_link != '' && defined('FW')) {
            echo wellnesscenter_return($google_fonts_link);
        } else {
            echo "<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,700italic' rel='stylesheet'> \n";
        }
    }

    add_action('wp_head', '_action_wellnesscenter_print_google_fonts_link');
endif;

//end goole font


/*
 * Add icon or whatever in nav last menu
 */


//if (class_exists('woocommerce')) {
//
//    function wellnesscenter_add_last_nav_item($items) {
//
//        return $items .= '<li class="visible-md visible-lg">
//                        <a href="' . esc_url(WC()->cart->get_cart_url()) . '"><i class=" fa fa-shopping-cart"></i></a>
//
//                </li>';
//    }
//
//    add_filter('wp_nav_menu_items', 'wellnesscenter_add_last_nav_item');
//}



/*
 * TGM REQUIRE PLUGIN
 * require or recommend plugins for your WordPress themes
 */

/** @internal */
function _action_wellnesscenter_register_required_plugins() {
    wellnesscenter_plugin_activator(array(
        array(
            'name' => 'Unyson',
            'slug' => 'unyson',
            'required' => true,
        ),
        array(
            'name' => 'Woocommerce',
            'slug' => 'woocommerce',
            'required' => true,
        ),
        array(
            'name' => 'visual-form-builder',
            'slug' => 'visual-form-builder',
            'required' => true,
            'external_url' => '',
            'source' => get_template_directory_uri() . '/inc/plugins/visual-form-builder.zip',
        ),
        array(
            'name' => 'booked',
            'slug' => 'booked',
            'required' => true,
            'external_url' => '',
            'source' => get_template_directory_uri() . '/inc/plugins/booked.zip',
        ),
        array(
            'name' => 'Booked Woocommerce Payments',
            'slug' => 'booked-woocommerce-payments',
            'required' => true,
            'external_url' => '',
            'source' => get_template_directory_uri() . '/inc/plugins/booked-woocommerce-payments.zip',
        ),
    ));
}

add_action('wellnesscenter_register', '_action_wellnesscenter_register_required_plugins');

function _action_wellnesscenter_admin_scripts() {
    wp_enqueue_style('wellnesscenter-admin', WELLNESSCENTER_CSS . '/wellnesscenter-admin.css', null, WELLNESSCENTER_VERSION);
}

add_action('admin_enqueue_scripts', '_action_wellnesscenter_admin_scripts');

/*
 * Excerpt customization
 */

function wellnesscenter_custom_excerpt_length($length) {
    return 50;
}

add_filter('excerpt_length', 'wellnesscenter_custom_excerpt_length', 999);

function wellnesscenter_custom_excerpt_more($more) {
    return ' ..<a class="more-link" href="' . get_permalink() . '">' . __('Continue Reading', 'wellnesscenter') . '</a>';
}

add_filter('excerpt_more', 'wellnesscenter_custom_excerpt_more');

// Displsys search form.

function wellnesscenter_search_form($form) {
    $form = '
    <div class="search-widget search-form">
        <form method="get" class="searchform" action="' . esc_url(home_url('/')) . '" id="search">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                <input type="text" name="s" class="form-control"  placeholder="' . __('Search...', 'wellnesscenter') . '" value="' . get_search_query() . '">
            </div>
        </form>
    </div>';
    return $form;
}

add_filter('get_search_form', 'wellnesscenter_search_form');



/*
 * Megamenu Filter 
 *  */

function _filter_mega_menu_wp_nav_menu_objects($sorted_menu_items, $args) {
    $frontpage_ID = wellnesscenter_main(get_option('page_on_front'), false);
    $home = (wellnesscenter_main(get_the_ID(), false) == $frontpage_ID) ? true : false;
    $mega_menu = array();
    $prefx = ($home != true) ? esc_url(home_url('/#')) : '#';

    foreach ($sorted_menu_items as $item) {
        if (wellnesscenter_get_post_meta(wellnesscenter_main($item->object_id, false), 'hide_title_from_menu') == 'yes') {
            $item->classes[] = 'hidden cross-fire';
        }

        $section = wellnesscenter_get_post_meta(wellnesscenter_main($item->object_id, false), 'xs_page_section');

        if (in_array('menu-item-has-children', $item->classes)) {

            $item->url = '#';
        } else {
            if ($section == 'on') {
                $item->url = esc_url($prefx . wellnesscenter_sectionID(wellnesscenter_main($item->object_id, false)));
            }
        }
    }


    return $sorted_menu_items;
}

add_filter('wp_nav_menu_objects', '_filter_mega_menu_wp_nav_menu_objects', 10, 2);


