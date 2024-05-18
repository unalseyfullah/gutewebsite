<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'bt_slider' => array(
        'label' => __('Image Slider', 'wellnesscenter'),
        'popup-title' => __('Add/Edit Slides', 'wellnesscenter'),
        'desc' => __('Here you can add, remove and edit your slides.', 'wellnesscenter'),
        'type' => 'addable-popup',
        'template' => '{{=slide_title}}',
        'popup-options' => array(
            'author_image' => array(
                'label' => __('Image', 'wellnesscenter'),
                'desc' => __('Upload an image', 'wellnesscenter'),
                'type' => 'upload'
            ),
            'slide_title' => array(
                'label' => __('Title', 'wellnesscenter'),
                'desc' => __('Enter a title for the slide show', 'wellnesscenter'),
                'type' => 'text'
            ),
            'slide_subtitle' => array(
                'label' => __('Sub-title', 'wellnesscenter'),
                'desc' => __('Enter a sub-title for the slide show', 'wellnesscenter'),
                'type' => 'text'
            ),
        )
    ),
    'bt_slider_color' => array(
        'type' => 'color-picker',
        'value' => '',
        'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        'label' => __('Title Color', 'fw'),
        'desc' => __('If you want you can use different title text color', 'fw'),
    ),
    'bt_slider_sub_color' => array(
        'type' => 'color-picker',
        'value' => '',
        'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        'label' => __('Subtitle Color', 'fw'),
        'desc' => __('If you want you can use different subtitle text color', 'fw'),
    )
);
