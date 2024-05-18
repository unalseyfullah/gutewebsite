<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'image_group' => array(
        'type' => 'group',
        'options' => array(
            'image' => array(
                'label' => __('Image', 'wellnesscenter'),
                'desc' => __('Upload an image', 'wellnesscenter'),
                'type' => 'upload'
            ),
        )
    ),
    'name' => array(
        'label' => __('Name', 'wellnesscenter'),
        'desc' => __('Enter the team member name', 'wellnesscenter'),
        'type' => 'text',
        'value' => ''
    ),
    'job' => array(
        'label' => __('Job Title', 'wellnesscenter'),
        'desc' => __('Enter the job title', 'wellnesscenter'),
        'type' => 'text',
        'value' => ''
    ),
    'desc' => array(
        'label' => __('Description', 'wellnesscenter'),
        'desc' => __('Enter team member description', 'wellnesscenter'),
        'value' => '',
        'type' => 'textarea',
    ),
    'socials' => array(
        'type' => 'addable-popup',
        'label' => __('Social Links', 'wellnesscenter'),
        'desc' => __('Add social links', 'wellnesscenter'),
        'template' => '{{=social_name}}',
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
                'desc' => __('Enter your social URL link', 'wellnesscenter'),
                'type' => 'text',
            )
        ),
    ),
    'class' => array(
        'label' => __('Custom Class', 'wellnesscenter'),
        'desc' => __('Enter custom CSS class', 'wellnesscenter'),
        'type' => 'text',
        'value' => '',
        'help' => __('you can use this options to add a class and further style the shortcode by adding your custom CSS in the style.css file. This file is located on your server in the /wow-child/style.css.', 'wellnesscenter'),
    ),
);
