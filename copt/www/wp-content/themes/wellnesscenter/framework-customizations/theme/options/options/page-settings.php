<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'page_settings' => array(
        'title' => __('Page Settings', 'wellnesscenter'),
        'type' => 'tab',
        'options' => array(
            'header-page-box' => array(
                'title' => __('Page Settings', 'wellnesscenter'),
                'type' => 'box',
                'options' => array(
                    'page_comment' => array(
                        'label' => __('Show Page Comments?', 'wellnesscenter'),
                        'desc' => '',
                        'type' => 'switch',
                        'right-choice' => array(
                            'value' => 'yes',
                            'label' => __('Yes', 'wellnesscenter')
                        ),
                        'left-choice' => array(
                            'value' => 'no',
                            'label' => __('No', 'wellnesscenter')
                        ),
                        'value' => 'yes',
                    )
                )
            ),
            'contact-box' => array(
                'title' => __('Contact form settings', 'wellnesscenter'),
                'type' => 'box',
                'options' => array(
                    'required_text' => array(
                        'type' => 'text',
                        'label' => __('Required Text', 'wellnesscenter'),
                        'desc' => __('Contact form send button beside required text.', 'wellnesscenter'),
                        'value' => __('Send an email. All fields with are required.', 'wellnesscenter'),
                    )
                )
            ),
        ),
    ),
);
