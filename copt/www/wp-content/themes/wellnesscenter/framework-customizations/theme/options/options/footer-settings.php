<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'footer_settings' => array(
        'title' => __('Footer Settings', 'wellnesscenter'),
        'type' => 'tab',
        'options' => array(
            'footer_box' => array(
                'title' => __('Footer Settings', 'wellnesscenter'),
                'type' => 'box',
                'options' => array(
                    
                    'footer_text' => array(
                        'label' => __('Footer text', 'wellnesscenter'),
                        'type' => 'text',
                        'value'=> '(c) Copyright Wellness Center. All Rights Reserved.',
                        'desc' => __('Add footer copyright text.', 'wellnesscenter'),
                    ),
                    
                    'socials' => array(
                        'type' => 'addable-popup',
                        'label' => __('Social Links', 'wellnesscenter'),
                        'desc' => __('Add your social profiles', 'wellnesscenter'),
                        'template' => '{{=social_name}}',
                        'add-button-text'=>'Add Social Icons in footer',
                        'popup-options' => array(
                            'social_name' => array(
                                'label' => __('Name', 'wellnesscenter'),
                                'desc' => __('Enter a name (it is for internal use and will not appear on the front end)', 'wellnesscenter'),
                                'type' => 'text',
                            ),
                            'icon_class' => array(
                                'type' => 'icon',
                                'value' => 'fa fa-adn',
                                'label' => '',
                            ),
                            'social-link' => array(
                                'label' => __('Link', 'wellnesscenter'),
                                'desc' => __('Enter your social URL link ( dont forget to add <b>http://</b>)', 'wellnesscenter'),
                                'type' => 'text',
                            )
                        ),
                        
                    ),
                ),
            ),
            'js-box' => array(
                'title'   => __( 'Additional Javascript', 'wellnesscenter' ),
                'type'    => 'box',
                'options' => array(
                    'custom_js' => array(
                        'label' => __( 'Custom JS', 'wellnesscenter' ),
                        'desc'  => __( 'Custom JS changes that will be applied to the theme.', 'wellnesscenter' ),
                        'help'  => __( 'If you need to change major portions of the theme please add your custom Javascript in the main.js file. This file is located on your server in the <strong>/theme/assets/js/main.js</strong>', 'wellnesscenter' ),
                        'type'  => 'textarea',
                        'value' => '',
                    ),
                )
            ),
        ),
    ),
);
