<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'type' => array(
        'label' => __('Type', 'wellnesscenter'),
        'desc' => __('Select the notification type', 'wellnesscenter'),
        'value' => 'fw-alert-info',
        'type' => 'image-picker',
        'choices' => array(
            'success' => array(
                'small' => array(
                    'height' => 50,
                    'src' => WELLNESSCENTER_IMAGES . '/image-picker/notification-congratulation.jpg',
                    'title' => __('Congratulations', 'wellnesscenter')
                ),
            ),
            'info' => array(
                'small' => array(
                    'height' => 50,
                    'src' => WELLNESSCENTER_IMAGES . '/image-picker/notification-information.jpg',
                    'title' => __('Information', 'wellnesscenter')
                ),
            ),
            'warning' => array(
                'small' => array(
                    'height' => 50,
                    'src' => WELLNESSCENTER_IMAGES . '/image-picker/notification-warning.jpg',
                    'title' => __('Alert', 'wellnesscenter')
                ),
            ),
            'danger' => array(
                'small' => array(
                    'height' => 50,
                    'src' => WELLNESSCENTER_IMAGES . '/image-picker/notification-error.jpg',
                    'title' => __('Error', 'wellnesscenter')
                ),
            ),
        ),
    ),
    'message' => array(
        'label' => __('Message', 'wellnesscenter'),
        'desc' => __('Notification message', 'wellnesscenter'),
        'type' => 'text',
        'value' => __('Message!', 'wellnesscenter'),
    ),
);
