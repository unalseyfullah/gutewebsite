<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'video' => array(
        'label' => __('Video', 'wellnesscenter'),
        'desc' => __('Enter Youtube or Vimeo video URL', 'wellnesscenter'),
        'type' => 'text',
    ),
    'width' => array(
        'label' => __('Width', 'wellnesscenter'),
        'desc' => __('Video width in pixels', 'wellnesscenter'),
        'type' => 'short-text',
        'value' => '',
    ),
    'height' => array(
        'label' => __('Height', 'wellnesscenter'),
        'desc' => __('Video height in pixels', 'wellnesscenter'),
        'type' => 'short-text',
        'value' => '',
    ),
    'frame' => array(
        'type' => 'switch',
        'value' => '',
        'label' => __('Video Border', 'wellnesscenter'),
        'desc' => __('Add a border to your video?', 'wellnesscenter'),
        'left-choice' => array(
            'value' => '',
            'label' => __('No', 'wellnesscenter'),
        ),
        'right-choice' => array(
            'value' => 'fw-video-frame',
            'label' => __('Yes', 'wellnesscenter'),
        )
    ),
    'class' => array(
        'attr' => array('class' => 'border-bottom-none'),
        'label' => __('Custom Class', 'wellnesscenter'),
        'desc' => __('Enter custom CSS class', 'wellnesscenter'),
        'type' => 'text',
        'help' => __('You can use this class to further style this shortcode.', 'wellnesscenter'),
        'value' => '',
    ),
);
