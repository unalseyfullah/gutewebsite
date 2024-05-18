<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'title' => array(
        'type' => 'text',
        'label' => __('Top Title', 'wellnesscenter'),
        'desc' => __('This can be left blank', 'wellnesscenter')
    ),
    'bottom_title' => array(
        'type' => 'text',
        'label' => __('Bottom-Title', 'wellnesscenter'),
        'desc' => __('This can be left blank', 'wellnesscenter')
    ),
    'text_color' => array(
        'type' => 'color-picker',
        'value' => '',
        'attr' => array('class' => 'custom-class', 'data-foo' => 'bar'),
        'label' => __('Text Color', 'wellnesscenter'),
        'desc' => __('You can use any color', 'wellnesscenter'),
    ),
    'label' => array(
        'label' => __( 'Button Label', 'wellnesscenter' ),
        'desc' => __( 'This is the text that appears on your button', 'wellnesscenter' ),
        'type' => 'text',
        'value' => 'Make an appointment now'
    ),
    'action_button' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'picker' => array(
            'use_popup' => array(
                'label' => __('Pop-up Form', 'wellnesscenter'),
                'desc' => 'Use pop-up submition form?',
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
                ),
            ),
        'choices' => array(
            'yes' => array(),
            'no' => array(
                'link' => array(
                    'label' => __( 'Button Link', 'wellnesscenter' ),
                    'desc' => __( 'Where should your button link to', 'wellnesscenter' ),
                    'type' => 'text',
                    'value' => '#'
                ),
                'target' => array(
                    'type' => 'switch',
                    'label' => __( 'Open Link in New Window', 'wellnesscenter' ),
                    'desc' => __( 'Select here if you want to open the linked page in a new window', 'wellnesscenter' ),
                    'right-choice' => array(
                        'value' => '_blank',
                        'label' => __( 'Yes', 'wellnesscenter' ),
                    ),
                    'left-choice' => array(
                        'value' => '_self',
                        'label' => __( 'No', 'wellnesscenter' ),
                    ),
                ),
            ),
        ),
        'show_borders' => false,
    )
);
