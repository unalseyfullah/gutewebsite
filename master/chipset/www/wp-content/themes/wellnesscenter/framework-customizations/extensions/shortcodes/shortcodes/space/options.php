<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'height' => array(
        'label' => __('Height', 'wellnesscenter'),
        'desc' => __('Select the space height in px (Small = 30px, Medium = 65px, Large = 85px) also you can use custom height according to your need.', 'wellnesscenter'),
        'type' => 'radio-text',
        'choices' => array(
            'space-sm' => __('Small', 'wellnesscenter'),
            'space-md' => __('Medium', 'wellnesscenter'),
            'space-lg' => __('Large', 'wellnesscenter'),
        ),
        'value' => 'space-md',
        'custom' => 'custom_height',
    ),
);
