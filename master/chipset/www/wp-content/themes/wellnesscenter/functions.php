<?php

/**
 * functions.php
 *
 * The theme's functions and definitions.
 */
/**
 * 1.0 - Define constants. Current Version number & Theme Name.
 */
define('WELLNESSCENTER_THEME', 'Wellnesscenter and Spa WordPress Premium Theme');
define('WELLNESSCENTER_VERSION', '1.6');
define('WELLNESSCENTER_THEMEROOT', get_template_directory_uri());
define('WELLNESSCENTER_THEMEROOT_DIR', get_template_directory());
define('WELLNESSCENTER_IMAGES', WELLNESSCENTER_THEMEROOT . '/assets/img');
define('WELLNESSCENTER_IMAGES_DIR', WELLNESSCENTER_THEMEROOT_DIR . '/assets/img');
define('WELLNESSCENTER_CSS', WELLNESSCENTER_THEMEROOT . '/assets/css');
define('WELLNESSCENTER_CSS_DIR', WELLNESSCENTER_THEMEROOT_DIR . '/assets/css');
define('WELLNESSCENTER_SCRIPTS', WELLNESSCENTER_THEMEROOT . '/assets/js');
define('WELLNESSCENTER_SCRIPTS_DIR', WELLNESSCENTER_THEMEROOT_DIR . '/assets/js');
define('WELLNESSCENTER_PHPSCRIPTS', WELLNESSCENTER_THEMEROOT . '/assets/php');
define('WELLNESSCENTER_PHPSCRIPTS_DIR', WELLNESSCENTER_THEMEROOT_DIR . '/assets/php');
define('WELLNESSCENTER_FRAMEWORK', WELLNESSCENTER_THEMEROOT . '/framework');
define('WELLNESSCENTER_FRAMEWORK_DIR', WELLNESSCENTER_THEMEROOT_DIR . '/framework');

global $wellnesscenter_intro;
$wellnesscenter_intro = 'n';




/**
 * ----------------------------------------------------------------------------------------
 * 3.0 - Set up the content width value based on the theme's design.
 * ----------------------------------------------------------------------------------------
 */
if (!isset($content_width)) {
    $content_width = 800;
}






/**
 * ----------------------------------------------------------------------------------------
 * 4.0 - Set up theme default and register various supported features.
 * ----------------------------------------------------------------------------------------
 */
if (!function_exists('wellnesscenter_setup')) {

    function wellnesscenter_setup() {
        /**
         * Make the theme available for translation.
         */
        $lang_dir = WELLNESSCENTER_THEMEROOT_DIR . '/languages';
        load_theme_textdomain('wellnesscenter', $lang_dir);

        /**
         * Add support for post formats.
         */
        add_theme_support('post-formats', array()
        );

        /**
         * Add support for automatic feed links.
         */
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');


        /**
         * Add support for post thumbnails.
         */
        add_theme_support('post-thumbnails');
        add_image_size('wellnesscenter_thumb', 300, 300);

        /**
         * Register nav menus.
         */
        register_nav_menus(
                array(
                    'primary' => __('Main Menu', 'wellnesscenter')
                )
        );
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'gallery', 'caption'
        ));
    }

 
        add_theme_support('woocommerce');
 

    add_action('after_setup_theme', 'wellnesscenter_setup');
}

/**
 * ----------------------------------------------------------------------------------------
 * 7.0 - Register the widget areas.
 * ----------------------------------------------------------------------------------------
 */
/*
 * Theme Inc
 */
include_once get_template_directory() . '/inc/init.php';

