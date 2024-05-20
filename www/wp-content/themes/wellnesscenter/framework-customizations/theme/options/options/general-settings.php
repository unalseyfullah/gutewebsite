<?php

if ( !defined( 'FW' ) ) {
    die( 'Forbidden' );
}



$options = array(
    'general' => array(
        'title' => __( 'General Settings', 'wellnesscenter' ),
        'type' => 'tab',
        'options' => array(
            'general-box' => array(
                'title' => __( 'General Settings', 'wellnesscenter' ),
                'type' => 'box',
                'options' => array(
                    'site_logo' => array(
                        'label' => __( 'Logo', 'wellnesscenter' ),
                        'desc' => __( 'Add your website logo', 'wellnesscenter' ),
                        'type' => 'upload',
                        'images_only' => true,
                        'value'=>  array( 'url' => WELLNESSCENTER_IMAGES . '/nav-logo.png' )
                    ),
                    'favicon' => array(
                        'label' => __( 'Favicon', 'wellnesscenter' ),
                        'desc' => __( 'Upload a favicon image', 'wellnesscenter' ),
                        'type' => 'upload',
                        'images_only' => true,
                        'value'=> array( 'url' => WELLNESSCENTER_IMAGES . '/ico/favicon.png' )
                    ),
                    'apple_touch_icon52' => array(
                        'label' => __( 'Apple Touch Icon', 'wellnesscenter' ),
                        'desc' => __( 'Upload a Apple Touch Icon 52x52px', 'wellnesscenter' ),
                        'type' => 'upload',
                        'images_only' => true,
                        'value'=> array( 'url' => WELLNESSCENTER_IMAGES . '/ico/apple-52.png' )
                    ),
                    'apple_touch_icon72' => array(
                        'label' => __( 'Apple Touch Icon', 'wellnesscenter' ),
                        'desc' => __( 'Upload a Apple Touch Icon 72x72px', 'wellnesscenter' ),
                        'type' => 'upload',
                        'images_only' => true,
                        'value'=> array( 'url' => WELLNESSCENTER_IMAGES . '/ico/apple-72.png' )
                    ),
                    'apple_touch_icon114' => array(
                        'label' => __( 'Apple Touch Icon', 'wellnesscenter' ),
                        'desc' => __( 'Upload a Apple Touch Icon 114x114px', 'wellnesscenter' ),
                        'type' => 'upload',
                        'images_only' => true,
                        'value'=> array( 'url' => WELLNESSCENTER_IMAGES . '/ico/apple-114.png' )
                    ),
                    'apple_touch_icon144' => array(
                        'label' => __( 'Apple Touch Icon', 'wellnesscenter' ),
                        'desc' => __( 'Upload a Apple Touch Icon 144x144px', 'wellnesscenter' ),
                        'type' => 'upload',
                        'images_only' => true,
                        'value'=> array( 'url' => WELLNESSCENTER_IMAGES . '/ico/apple-144.png' ) 
                    ),
                ),
            ),
        )
    )
);
