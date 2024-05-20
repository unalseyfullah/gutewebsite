<?php

if (!defined('ABSPATH'))
    die('Direct access forbidden.');
/**
 * Enqueue all theme scripts and styles
 *
 * ** REGISTERING THEME ASSETS
 * **
 * Enqueue styles.
 */
if (!is_admin()) {
    // dependencies | 3rd party components
    wp_enqueue_style('bootstrap', WELLNESSCENTER_CSS . '/bootstrap.min.css', null, WELLNESSCENTER_VERSION);
    wp_enqueue_style('fontawesome', WELLNESSCENTER_CSS . '/font-awesome.min.css', null, WELLNESSCENTER_VERSION);
    wp_enqueue_style('animate', WELLNESSCENTER_CSS . '/animate.min.css', null, WELLNESSCENTER_VERSION);
    wp_enqueue_style('animated-headlines', WELLNESSCENTER_CSS . '/animated-headlines.css', null, WELLNESSCENTER_VERSION);
    wp_enqueue_style('bootstrap-datepicker', WELLNESSCENTER_CSS . '/bootstrap-datepicker.min.css', null, WELLNESSCENTER_VERSION);
    wp_enqueue_style('fancybox', WELLNESSCENTER_THEMEROOT . '/assets/fancybox/jquery.fancybox.css', null, WELLNESSCENTER_VERSION);

    // libs
    wp_enqueue_style('wellnesscenter-form-builder', WELLNESSCENTER_CSS . '/wellnesscenter-form-builder.min.css', null, WELLNESSCENTER_VERSION);
    wp_enqueue_style('wellnesscenter-wp-utility', WELLNESSCENTER_CSS . '/wellnesscenter-wp-utility.css', null, WELLNESSCENTER_VERSION);
    wp_enqueue_style('wellnesscenter-fw-utility', WELLNESSCENTER_CSS . '/wellnesscenter-fw-utility.css', null, WELLNESSCENTER_VERSION);

    // theme styles
    wp_enqueue_style('wellnesscenter-styles', WELLNESSCENTER_CSS . '/wellnesscenter-styles.css', null, WELLNESSCENTER_VERSION);
    wp_enqueue_style('wellnesscenter-ie8fix', WELLNESSCENTER_CSS . '/wellnesscenter-ie8fix.css', null, WELLNESSCENTER_VERSION);
    wp_enqueue_style('wellnesscenter-override', WELLNESSCENTER_CSS . '/wellnesscenter-override.css', null, WELLNESSCENTER_VERSION);

}




/**
 * Enqueue scripts.
 */
if (!is_admin()) {
    // load wordpress jquery
    wp_enqueue_script('jquery');

    // dependencies | 3rd party components
    wp_enqueue_script('bootstrap', WELLNESSCENTER_SCRIPTS . '/bootstrap.min.js', array('jquery'), WELLNESSCENTER_VERSION, true);
    wp_enqueue_script('wow', WELLNESSCENTER_SCRIPTS . '/wow.min.js', array('jquery'), WELLNESSCENTER_VERSION, true);
    wp_enqueue_script('animated-headlines', WELLNESSCENTER_SCRIPTS . '/animated-headlines.js', array('jquery'), WELLNESSCENTER_VERSION, true);
    wp_enqueue_script('bootstrap-datepicker', WELLNESSCENTER_SCRIPTS . '/bootstrap-datepicker.min.js', array('jquery'), WELLNESSCENTER_VERSION, true);
    wp_enqueue_script('fancybox', WELLNESSCENTER_THEMEROOT . '/assets/fancybox/jquery.fancybox.pack.js', array('jquery'), WELLNESSCENTER_VERSION, true);
    wp_enqueue_script('xs-fw-form-helpers.js', WELLNESSCENTER_SCRIPTS . '/fw-form-helpers.js', array('jquery'), WELLNESSCENTER_VERSION, true);
    // theme scripts
    wp_enqueue_script('wellnesscenter-custom', WELLNESSCENTER_SCRIPTS . '/wellnesscenter-custom.js', array('jquery'), WELLNESSCENTER_VERSION, true);

    // Load WordPress Comment js
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

function wellnesscenter_add_editor_styles() {
    add_editor_style( 'wellnesscenter-editor-style.css' );
}
add_action( 'admin_init', 'wellnesscenter_add_editor_styles' );
