<?php

if (!defined('FW')) {
    die('Forbidden');
}



$options = array(
    'type' => array(
        'label' => __('Type', 'wellnesscenter'),
        'desc' => __('Select divider type', 'wellnesscenter'),
        'type' => 'image-picker',
        'value' => 'fw-line-solid',
        'choices' => array(
            'fw-line-solid' => array(
                'small' => array(
                    'height' => 50,
                    'src' => WELLNESSCENTER_IMAGES . '/image-picker/solid.jpg',
                    'title' => __('Solid Line', 'wellnesscenter')
                ),
            ),
            'fw-line-dashed' => array(
                'small' => array(
                    'height' => 50,
                    'src' => WELLNESSCENTER_IMAGES . '/image-picker/dashed.jpg',
                    'title' => __('Dashed Line', 'wellnesscenter')
                ),
            ),
            'fw-line-dotted' => array(
                'small' => array(
                    'height' => 50,
                    'src' => WELLNESSCENTER_IMAGES . '/image-picker/dotted.jpg',
                    'title' => __('Dotted Line', 'wellnesscenter')
                ),
            ),
            'fw-line-double' => array(
                'small' => array(
                    'height' => 50,
                    'src' => WELLNESSCENTER_IMAGES . '/image-picker/double.jpg',
                    'title' => __('Double Line', 'wellnesscenter')
                ),
            ),
            'fw-line-thick' => array(
                'small' => array(
                    'height' => 50,
                    'src' => WELLNESSCENTER_IMAGES . '/image-picker/thick.jpg',
                    'title' => __('Thick Line', 'wellnesscenter')
                ),
            ),
        ),
    ),
    'divider_size' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'picker' => array(
            'size' => array(
                'label' => __('Height', 'wellnesscenter'),
                'desc' => __('Select the top and bottom margin in px', 'wellnesscenter'),
                'attr' => array('class' => 'fw-checkbox-float-left'),
                'type' => 'radio',
                'choices' => array(
                    'space-sm' => __('Small', 'wellnesscenter'),
                    'space-md' => __('Medium', 'wellnesscenter'),
                    'space-lg' => __('Large', 'wellnesscenter'),
                    'custom' => __('Custom', 'wellnesscenter'),
                ),
                'value' => 'space-md'
            ),
        ),
        'choices' => array(
            'custom' => array(
                'margin_top' => array(
                    'label' => __('Margin Top', 'wellnesscenter'),
                    'desc' => __('Enter margin-top in px', 'wellnesscenter'),
                    'attr' => array('class' => 'fw-option-width-small'),
                    'type' => 'short-text',
                    'value' => ''
                ),
                'margin_bottom' => array(
                    'label' => __('Margin Bottom', 'wellnesscenter'),
                    'attr' => array('class' => 'fw-option-width-small'),
                    'desc' => __('Enter margin-bottom in px', 'wellnesscenter'),
                    'type' => 'short-text',
                    'value' => ''
                ),
            ),
            'no' => array(),
        ),
        'show_borders' => false,
    ),
    'is_fullwidth' => array(
        'label' => __('Full Width', 'wellnesscenter'),
        'type' => 'switch',
    ),
    'bg_color' => array(
        'label' => __('Color', 'wellnesscenter'),
        'desc' => __('Select divider color', 'wellnesscenter'),
        'value' => '',
        'type' => 'color-picker'
    ),
    'link_id' => array(
        'type' => 'text',
        'label' => __('Link ID', 'wellnesscenter'),
        'desc' => __('Enter a custom CSS id for this divider', 'wellnesscenter'),
        'help' => sprintf("%s", __('Use this ID in any URL link in the page in order to anchor link to this divider', 'wellnesscenter')),
        'value' => '',
    ),
    'class' => array(
        'label' => __('Custom Class', 'wellnesscenter'),
        'desc' => __('Enter custom CSS class', 'wellnesscenter'),
        'help' => __('you can use this options to add a class and further style the shortcode by adding your custom CSS in the style.css file. This file is located on your server in the /wow-child/style.css', 'wellnesscenter'),
        'type' => 'text',
        'value' => '',
    ),
);
