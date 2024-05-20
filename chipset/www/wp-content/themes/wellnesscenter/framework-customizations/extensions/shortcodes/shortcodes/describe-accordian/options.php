<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    
    'tabs' => array(
        'type' => 'addable-popup',
        'label' => __('Tabs', 'wellnesscenter'),
        'popup-title' => __('Add/Edit Tabs', 'wellnesscenter'),
        'desc' => __('Add tabs', 'wellnesscenter'),
        'template' => '{{=title}}',
        'popup-options' => array(
            'title' => array(
                'label' => __('Title', 'wellnesscenter'),
                'desc' => __('Enter the tab title', 'wellnesscenter'),
                'type' => 'text',
                'value' => __('', 'wellnesscenter'),
            ),
            'content' => array(
                'label' => __('Content', 'wellnesscenter'),
                'desc' => __('Enter the accordion content', 'wellnesscenter'),
                'type' => 'wp-editor',
                'tinymce' => true,
                'reinit' => true,
            ),
            'opened' => array(
                'type' => 'switch',
                'label' => __('Default State', 'wellnesscenter'),
                'desc' => __('Set the default state for the tab', 'wellnesscenter'),
                'help' => __('Only one tab can be opened. If you choose two opened tabs the first one will be set as opened based on the position in the tab list.', 'wellnesscenter'),
                'value' => '',
                'right-choice' => array(
                    'value' => 'opened',
                    'label' => __('Opened', 'wellnesscenter'),
                ),
                'left-choice' => array(
                    'value' => '',
                    'label' => __('Closed', 'wellnesscenter'),
                ),
            ),
            'icon' => array(
                'label' => __('Icon', 'wellnesscenter'),
                'type' => 'icon',
            ),
        )
    ),
    'class' => array(
        'label' => __('Custom Class', 'wellnesscenter'),
        'desc' => __('Enter custom CSS class', 'wellnesscenter'),
        'type' => 'text',
        'value' => '',
        'help' => __('you can use this options to add a class and further style the shortcode by adding your custom CSS in the style.css file. This file is located on your server in the /wow-child/style.css', 'wellnesscenter'),
    ),
);
