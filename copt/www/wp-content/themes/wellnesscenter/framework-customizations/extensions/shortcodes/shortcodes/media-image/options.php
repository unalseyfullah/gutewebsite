<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'image' => array(
        'type' => 'upload',
        'label' => __('Choose Image', 'wellnesscenter'),
        'desc' => __('Either upload a new, or choose an existing image from your media library', 'wellnesscenter')
    ),
    'image_size' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'picker' => array(
            'select_size' => array(
                'label' => __('Size', 'wellnesscenter'),
                'desc' => __('Select the image size', 'wellnesscenter'),
                'attr' => array('class' => 'fw-checkbox-float-left'),
                'type' => 'radio',
                'value' => 'auto',
                'choices' => array(
                    'auto' => __('auto', 'wellnesscenter'),
                    'custom' => __('Custom', 'wellnesscenter')
                ),
            ),
        ),
        'choices' => array(
            'custom' => array(
                'width' => array(
                    'label' => '',
                    'desc' => __('Image width in pixels', 'wellnesscenter'),
                    'type' => 'short-text',
                    'value' => '',
                ),
                'position' => array(
                    'label' => '',
                    'desc' => __('Select image position', 'wellnesscenter'),
                    'type' => 'image-picker',
                    'value' => 'fw-single-image-center',
                    'choices' => array(
                        'fw-single-image-left' => array(
                            'small' => array(
                                'height' => 50,
                                'src' => WELLNESSCENTER_IMAGES . '/image-picker/left-position.jpg',
                                'title' => __('Left', 'wellnesscenter')
                            ),
                        ),
                        'fw-single-image-center' => array(
                            'small' => array(
                                'height' => 50,
                                'src' => WELLNESSCENTER_IMAGES . '/image-picker/center-position.jpg',
                                'title' => __('Center', 'wellnesscenter')
                            ),
                        ),
                        'fw-single-image-right' => array(
                            'small' => array(
                                'height' => 50,
                                'src' => WELLNESSCENTER_IMAGES . '/image-picker/right-position.jpg',
                                'title' => __('Right', 'wellnesscenter')
                            ),
                        ),
                    ),
                ),
            ),
        )
    ),
    'image-link-group' => array(
        'type' => 'group',
        'options' => array(
            'link' => array(
                'type' => 'text',
                'label' => __('Image Link', 'wellnesscenter'),
                'desc' => __('Where should your image link to?', 'wellnesscenter')
            ),
            'target' => array(
                'type' => 'switch',
                'label' => __('Open Link in New Window', 'wellnesscenter'),
                'desc' => __('Select here if you want to open the linked page in a new window', 'wellnesscenter'),
                'right-choice' => array(
                    'value' => '_blank',
                    'label' => __('Yes', 'wellnesscenter'),
                ),
                'left-choice' => array(
                    'value' => '_self',
                    'label' => __('No', 'wellnesscenter'),
                ),
            ),
        )
    )
);

