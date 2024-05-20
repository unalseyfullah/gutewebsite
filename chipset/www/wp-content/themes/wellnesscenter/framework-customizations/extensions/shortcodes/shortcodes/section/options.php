<?php

if (!defined('FW')) {
    die('Forbidden');
}

$options = array(
    'is_fullwidth' => array(
        'label' => __('Full Width', 'wellnesscenter'),
        'type' => 'switch',
    ),
    'default_spacing' => array(
        'type' => 'radio',
        'label' => __('Section Spacing', 'wellnesscenter'),
        'desc' => __('Top and bottom spacing of this section', 'wellnesscenter'),
        'value' => 'section-spacing',
        'choices' => array(
            'section-spacing' => __('Default Spacing', 'wellnesscenter'),
            'min-spacing' => __('Min Spacing', 'wellnesscenter'),
            'no-spacing' => __('No Spacing', 'wellnesscenter'),
        ),
    ),
    'height' => array(
        'label' => __('Height', 'wellnesscenter'),
        'desc' => __("Select the section's height in px (Ex: 400) (dont include with <b>px</b>)", 'wellnesscenter'),
        'type' => 'radio-text',
        'value' => 'auto',
        'choices' => array(
            'auto' => __('auto', 'wellnesscenter'),
            'fw-section-height-sm' => __('small', 'wellnesscenter'),
            'fw-section-height-md' => __('medium', 'wellnesscenter'),
            'fw-section-height-lg' => __('large', 'wellnesscenter'),
        ),
        'custom' => 'custom_width',
        'help'    => __('This option to set extra height in your section. we have used three classs for extra height which fw-section-height-sm = 350px, fw-section-height-md= 450px , fw-section-height-lg = 650px. you can use your custom height to like just add 400 (dont include with px)', 'wellnesscenter'),
    ),
    'background_options' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'picker' => array(
            'background' => array(
                'label' => __('Background', 'wellnesscenter'),
                'desc' => __('Select the background for your section', 'wellnesscenter'),
                'attr' => array('class' => 'fw-checkbox-float-left'),
                'type' => 'radio',
                'choices' => array(
                    'none' => __('None', 'wellnesscenter'),
                    'color' => __('Color', 'wellnesscenter'),
                    'image' => __('Image', 'wellnesscenter'),
                    'video' => __('Video', 'wellnesscenter'),
                ),
                'value' => 'none'
            ),
        ),
        'choices' => array(
            'none' => array(),
            'color' => array(
                'background_color' => array(
                    'label' => __('', 'wellnesscenter'),
                    'desc' => __('Select the background color', 'wellnesscenter'),
                    'value' => '',
                    'type' => 'color-picker'
                ),
            ),
            'image' => array(
                'background_image' => array(
                    'label' => __('', 'wellnesscenter'),
                    'type' => 'background-image',
                    'choices' => array(//	in future may will set predefined images
                    )
                ),
                'overlay_options' => array(
                    'type' => 'multi-picker',
                    'label' => false,
                    'desc' => false,
                    'picker' => array(
                        'overlay' => array(
                            'type' => 'switch',
                            'label' => __('Overlay Color', 'wellnesscenter'),
                            'desc' => __('Enable image overlay color?', 'wellnesscenter'),
                            'value' => 'no',
                            'right-choice' => array(
                                'value' => 'yes',
                                'label' => __('Yes', 'wellnesscenter'),
                            ),
                            'left-choice' => array(
                                'value' => 'no',
                                'label' => __('No', 'wellnesscenter'),
                            ),
                        ),
                    ),
                    'choices' => array(
                        'no' => array(),
                        'yes' => array(
                            'background' => array(
                                'label' => __('', 'wellnesscenter'),
                                'desc' => __('Select the overlay color', 'wellnesscenter'),
                                'value' => 'rgba(0,0,0,0.55)',
                                'type' => 'rgba-color-picker'
                            ),
                        ),
                    ),
                ),
            ),
            'video' => array(
                'video' => array(
                    'label' => __('', 'wellnesscenter'),
                    'desc' => __('Insert a YouTube video URL', 'wellnesscenter'),
                    'type' => 'text',
                ),
                'overlay_options' => array(
                    'type' => 'multi-picker',
                    'label' => false,
                    'desc' => false,
                    'picker' => array(
                        'overlay' => array(
                            'type' => 'switch',
                            'label' => __('Overlay Color', 'wellnesscenter'),
                            'desc' => __('Enable video overlay color?', 'wellnesscenter'),
                            'value' => 'no',
                            'right-choice' => array(
                                'value' => 'yes',
                                'label' => __('Yes', 'wellnesscenter'),
                            ),
                            'left-choice' => array(
                                'value' => 'no',
                                'label' => __('No', 'wellnesscenter'),
                            ),
                        ),
                    ),
                    'choices' => array(
                        'no' => array(),
                        'yes' => array(
                            'background' => array(
                                'label' => __('', 'wellnesscenter'),
                                'desc' => __('Select the overlay color', 'wellnesscenter'),
                                'value' => 'rgba(0,0,0,0.55)',
                                'type' => 'rgba-color-picker'
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'show_borders' => false,
    ),
    'class' => array(
        'label' => __('Custom Class', 'wellnesscenter'),
        'desc' => __('Enter custom CSS class', 'wellnesscenter'),
        'type' => 'text',
        'value' => '',
    ),
);
