<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'before_text' => array(
        'type' => 'text',
        'label' => __('Normal Text', 'wellnesscenter'),
        'desc' => __('Text before the moving text', 'wellnesscenter'),
    ),
    'slider_text' => array(
        'type' => 'addable-popup',
        'label' => __('Slide Texts', 'wellnesscenter'),
        'desc' => __('Add sliding texts', 'wellnesscenter'),
        'template' => '{{=title}}',
        'popup-options' => array(
            'title' => array(
                'label' => __('Text', 'wellnesscenter'),
                'desc' => __('Enter your text', 'wellnesscenter'),
                'type' => 'text',
            ),
        ),
    ),
    'after_text' => array(
        'type' => 'text',
        'label' => __('Normal Text', 'wellnesscenter'),
        'desc' => __('Text after the moving text', 'wellnesscenter'),
    ),
    'color' => array(
        'type' => 'color-picker',
        'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        'label' => __('Heading Color', 'wellnesscenter'),
        'desc' => __('If you want use diffrent color for parallax or video section', 'wellnesscenter'),
        'help' => __('If you want use diffrent heading color for parallax or video section. you can easily change from here', 'wellnesscenter'),
    ),

    'subtitle' => array(
        'type' => 'text',
        'label' => __('Subtitle', 'wellnesscenter'),
        'desc' => __('Write the subtitle content', 'wellnesscenter'),
    ),

    'position' => array(
        'label' => 'Alignment',
        'desc' => __('Select Alignment', 'wellnesscenter'),
        'type' => 'image-picker',
        'value' => 'text-center',
        'choices' => array(
            'text-left' => array(
                'small' => array(
                    'height' => 50,
                    'src' => WELLNESSCENTER_IMAGES . '/image-picker/left-position.jpg',
                    'title' => __('Left', 'wellnesscenter')
                ),
            ),
            'text-center' => array(
                'small' => array(
                    'height' => 50,
                    'src' => WELLNESSCENTER_IMAGES . '/image-picker/center-position.jpg',
                    'title' => __('Center', 'wellnesscenter')
                ),
            ),
            'text-right' => array(
                'small' => array(
                    'height' => 50,
                    'src' => WELLNESSCENTER_IMAGES . '/image-picker/right-position.jpg',
                    'title' => __('Right', 'wellnesscenter')
                ),
            ),
        ),
    ),

    'class' => array(
        'type' => 'text',
        'label' => __('Custom Class', 'wellnesscenter'),
        'desc' => __('Enter a custom CSS class', 'wellnesscenter'),
        'help' => __('You can use this class to further style this shortcode by adding your custom CSS.', 'wellnesscenter'),
    ),
);
