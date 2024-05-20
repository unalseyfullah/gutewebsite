<?php

if (!defined('FW'))
    die('Forbidden');

$options = array(
    'screenshot_images' => array(
        'label' => __('Gellary Images', 'wellnesscenter'),
        'type' => 'addable-popup',
        'desc' => __('image minimum 4', 'wellnesscenter'),
        'template' => '{{- title }}',
        'popup-options' => array(
            'title' => array(
                'label' => __('Title', 'wellnesscenter'),
                'desc' => __('Add a name for this image.', 'wellnesscenter'),
                'type' => 'text',
                'value' => 'The Image Title'
            ),
            'sub_title' => array(
                'label' => __('Sub title', 'wellnesscenter'),
                'desc' => __('Add a subtitle for this image.', 'wellnesscenter'),
                'type' => 'text',
                'value' => 'Image Sub Title'
            ),
            'small_images' => array(
                'label' => __('Thumbnail', 'wellnesscenter'),
                'desc' => __('Upload Image Thumbnail.', 'wellnesscenter'),
                'type' => 'upload',
            ),
            'large_images' => array(
                'label' => __('Main Image', 'wellnesscenter'),
                'desc' => __('Upload Large Popup image.', 'wellnesscenter'),
                'type' => 'upload',
            ),
            'video_link' => array(
                'label' => __('Video', 'wellnesscenter'),
                'desc' => __('Add youtube video link, if you want to use video instead of image', 'wellnesscenter'),
                'type' => 'text',
            ),
        )
    ),
);
