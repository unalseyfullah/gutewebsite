<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'styling_settings' => array(
        'title' => __('Styling Settings', 'wellnesscenter'),
        'type' => 'tab',
        'options' => array(
            'header-styling-box' => array(
                'title' => __('Styling Settings', 'wellnesscenter'),
                'type' => 'box',
                'options' => array(
                    'general_styling_header' => array(
                        'type' => 'multi',
                        'label' => false,
                        'attr' => array(
                            'class' => 'fw-option-type-multi-show-borders',
                        ),
                        'inner-options' => array(
                            'styling_group' => array(
                                'type' => 'group',
                                'options' => array(
                                    'main_color' => array(
                                        'type' => 'color-picker',
                                        'label' => 'Theme Color',
                                        'desc' => 'You can use any color in your theme',
                                        'value' => '#7d3c93'
                                    ),
                                )
                            ),
                        )
                    ),
                    'title_bg' => array(
                        'label' => __('Title Background', 'wellnesscenter'),
                        'desc' => __('Page title background', 'wellnesscenter'),
                        'type' => 'upload',
                        'images_only' => true,
                        'value' => array('url' => WELLNESSCENTER_IMAGES . '/cta-background.png')
                    ),
                    'loading_img' => array(
                        'label' => __('Preloader', 'wellnesscenter'),
                        'desc' => __('Preloader image', 'wellnesscenter'),
                        'type' => 'upload',
                        'images_only' => true,
                        'value' => array('url' => WELLNESSCENTER_IMAGES . '/preloader-logo.png')
                    ),
                    'hide_preloader' => array(
                        'label' => __('Hide Preloader', 'fw'),
                        'desc' => __('If you want you can hide the preloader', 'fw'),
                        'type' => 'switch',
                        'value' => 'no',
                        'left-choice' => array(
                            'value' => 'yes',
                            'label' => __('Yes', 'fw'),
                        ),
                        'right-choice' => array(
                            'value' => 'no',
                            'label' => __('No', 'fw'),
                        ),
                    ),
                    'onScroll' => array(
                        'label' => __('On Scroll animation', 'wellnesscenter'),
                        'desc' => __('Turn on "on scroll" animation?', 'wellnesscenter'),
                        'type' => 'switch',
                        'right-choice' => array(
                            'value' => 'yes',
                            'label' => __('Yes', 'wellnesscenter')
                        ),
                        'left-choice' => array(
                            'value' => 'no',
                            'label' => __('No', 'wellnesscenter')
                        ),
                        'value' => 'yes',
                    ),
                    'typography-global' => array(
                        'title' => __('Global Typography', 'wellnesscenter'),
                        'type' => 'box',
                        'options' => array(
                            'body_font' => array(
                                'label' => __('Body Font', 'wellnesscenter'),
                                'type' => 'typography',
                                'value' => array(
                                    'family' => 'Roboto',
                                    'style' => 'normal',
                                ),
                                'components' => array(
                                    'family' => true,
                                    'size' => false,
                                    'color' => false
                                ),
                                'desc' => __('this is default body font .', 'wellnesscenter'),
                            ),
                        ),
                    ),
                ),
            ),
            'css-box' => array(
                'title' => __('Additional Styling', 'wellnesscenter'),
                'type' => 'box',
                'options' => array(
                    'custom_css' => array(
                        'label' => __('Custom CSS', 'wellnesscenter'),
                        'desc' => __('Custom Css changes that will be applied to the theme', 'wellnesscenter'),
                        'help' => __('If you need to change major portions of the theme please add your custom CSS in the style.css file. This file is located on your server in the <strong>/theme/assets/css/style.css</strong>', 'wellnesscenter'),
                        'type' => 'textarea',
                        'value' => '',
                    ),
                )
            ),
        ),
    ),
);
