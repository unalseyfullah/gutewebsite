<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'title' => array(
        'type' => 'text',
        'label' => __('Heading Title', 'wellnesscenter'),
        'desc' => __('Write the heading title content', 'wellnesscenter'),
    ),
    'heading' => array(
        'type' => 'select',
        'label' => __('Heading Size', 'wellnesscenter'),
        'choices' => array(
            'h1' => 'H1',
            'h2' => 'H2',
            'h3' => 'H3',
            'h4' => 'H4',
            'h5' => 'H5',
            'h6' => 'H6',
        )
    ),
    'subtitle' => array(
        'type' => 'text',
        'label' => __('Heading Subtitle Text', 'wellnesscenter'),
    ),
    'subtitle_position' => array(
        'type' => 'switch',
        'label' => __('Subtitle Position', 'wellnesscenter'),
        'left-choice' => array(
            'value' => 'top',
            'label' => __('Top', 'wellnesscenter'),
        ),
        'right-choice' => array(
            'value' => 'bottom',
            'label' => __('Bottom', 'wellnesscenter'),
        ),
    ),
    'spacing' => array(
        'type' => 'switch',
        'label' => __( 'Spacing', 'wellnesscenter' ),
        'desc' => __( 'Use Default Spacing?', 'wellnesscenter' ),
        'right-choice' => array(
            'value' => 'heading-spacing',
            'label' => __( 'Yes', 'wellnesscenter' ),
        ),
        'left-choice' => array(
            'value' => 'heading-min-spacing',
            'label' => __( 'No', 'wellnesscenter' ),
        ),
        'value' => 'heading-spacing'
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


    'color' => array(
        'type' => 'color-picker',
        'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        'label' => __('Heading Color', 'wellnesscenter'),
        'desc' => __('If you want use diffrent color for parallax or video section', 'wellnesscenter'),
        'help' => __('If you want use diffrent heading color for parallax or video section. you can easily change from here', 'wellnesscenter'),
    ),
    'class' => array(
        'type' => 'text',
        'label' => __('Custom Class', 'wellnesscenter'),
        'desc' => __('Enter a custom CSS class', 'wellnesscenter'),
        'help' => __('You can use this class to further style this shortcode by adding your custom CSS.', 'wellnesscenter'),
    ),
);
