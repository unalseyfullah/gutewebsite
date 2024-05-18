<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'testimonials' => array(
        'label' => __('Testimonials', 'wellnesscenter'),
        'popup-title' => __('Add/Edit Testimonial', 'wellnesscenter'),
        'desc' => __('Here you can add, remove and edit your Testimonials.', 'wellnesscenter'),
        'type' => 'addable-popup',
        'template' => '{{=author_name}}',
        'popup-options' => array(
            'content' => array(
                'label' => __('Quote', 'wellnesscenter'),
                'desc' => __('Enter the testimonial here', 'wellnesscenter'),
                'type' => 'textarea',
                'teeny' => true
            ),
            'rating' => array(
                'label' => __('User Rating', 'wellnesscenter'),
                'type' => 'radio',
                'choices' => array(
                    '1' => __('1.0', 'wellnesscenter'),
                    '2' => __('2.0', 'wellnesscenter'),
                    '3' => __('3.0', 'wellnesscenter'),
                    '4' => __('4.0', 'wellnesscenter'),
                    '5' => __('5.0', 'wellnesscenter'),
                ),
                'value' => '5',
                'inline' => true,
            ),
            'author_image' => array(
                'label' => __('Image', 'wellnesscenter'),
                'desc' => __('Upload an image', 'wellnesscenter'),
                'type' => 'upload'
            ),
            'author_name' => array(
                'label' => __('Name', 'wellnesscenter'),
                'desc' => __('Enter the Name of the Person', 'wellnesscenter'),
                'type' => 'text'
            ),
            'author_title' => array(
                'label' => __('Locationn', 'wellnesscenter'),
                'desc' => __('Enter the Address of the Person', 'wellnesscenter'),
                'type' => 'text'
            ),
        )
    ),    
);
