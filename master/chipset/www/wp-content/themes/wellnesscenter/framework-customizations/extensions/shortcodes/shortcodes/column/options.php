<?php

if (!defined('FW')) {
    die('Forbidden');
}



$options = array(
    'default_padding' => array(
        'type' => 'switch',
        'label' => __('Default Spacing', 'wellnesscenter'),
        'desc' => __('Use default left and right spacing?', 'wellnesscenter'),
        'help' => __("Default left and right spacings are set to 15px", 'wellnesscenter'),
        'value' => '',
        'right-choice' => array(
            'value' => '',
            'label' => __('Yes', 'wellnesscenter'),
        ),
        'left-choice' => array(
            'value' => 'fw-col-no-padding',
            'label' => __('No', 'wellnesscenter'),
        ),
    ),
    'padding_group' => array(
        'type' => 'group',
        'options' => array(
            'html_label' => array(
                'type' => 'html',
                'value' => '',
                'label' => __('Additional Spacing', 'wellnesscenter'),
                'html' => '',
            ),
            'padding_top' => array(
                'label' => false,
                'desc' => __('top', 'wellnesscenter'),
                'type' => 'short-text',
                'value' => '0',
            ),
            'padding_right' => array(
                'label' => false,
                'desc' => __('right', 'wellnesscenter'),
                'type' => 'short-text',
                'value' => '0',
            ),
            'padding_bottom' => array(
                'label' => false,
                'desc' => __('bottom', 'wellnesscenter'),
                'type' => 'short-text',
                'value' => '0',
            ),
            'padding_left' => array(
                'label' => false,
                'desc' => __('left', 'wellnesscenter'),
                'type' => 'short-text',
                'value' => '0',
            ),
        )
    ),
    'background_options' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'picker' => array(
            'background' => array(
                'label' => __('Background', 'wellnesscenter'),
                'desc' => __('Select the background for your column', 'wellnesscenter'),
                'attr' => array('class' => 'fw-checkbox-float-left'),
                'type' => 'radio',
                'choices' => array(
                    'none' => __('None', 'wellnesscenter'),
                    'image' => __('Image', 'wellnesscenter'),
                    'bgcolor' => __('Color', 'wellnesscenter'),
                ),
                'value' => 'none'
            ),
        ),
        'choices' => array(
            'none' => array(),
            'color' => array(
                'background_color' => array(
                    'label' => __('', 'wellnesscenter'),
                    'help' => __('', 'wellnesscenter'),
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
                'repeat' => array(
                    'label' => __('', 'wellnesscenter'),
                    'desc' => __('Select how will the background repeat', 'wellnesscenter'),
                    'type' => 'short-select',
                    'attr' => array('class' => 'fw-checkbox-float-left'),
                    'value' => 'no-repeat',
                    'choices' => array(
                        'no-repeat' => __('No-Repeat', 'wellnesscenter'),
                        'repeat' => __('Repeat', 'wellnesscenter'),
                        'repeat-x' => __('Repeat-X', 'wellnesscenter'),
                        'repeat-y' => __('Repeat-Y', 'wellnesscenter'),
                    )
                ),
                'bg_position_x' => array(
                    'label' => __('Position', 'wellnesscenter'),
                    'desc' => __('Select the horizontal background position', 'wellnesscenter'),
                    'type' => 'short-select',
                    'attr' => array('class' => 'fw-checkbox-float-left'),
                    'value' => '',
                    'choices' => array(
                        'left' => __('Left', 'wellnesscenter'),
                        'center' => __('Center', 'wellnesscenter'),
                        'right' => __('Right', 'wellnesscenter'),
                    )
                ),
                'bg_position_y' => array(
                    'label' => __('', 'wellnesscenter'),
                    'desc' => __('Select the vertical background position', 'wellnesscenter'),
                    'type' => 'short-select',
                    'attr' => array('class' => 'fw-checkbox-float-left'),
                    'value' => '',
                    'choices' => array(
                        'top' => __('Top', 'wellnesscenter'),
                        'center' => __('Center', 'wellnesscenter'),
                        'bottom' => __('Bottom', 'wellnesscenter'),
                    )
                ),
                'bg_size' => array(
                    'label' => __('Size', 'wellnesscenter'),
                    'desc' => __('Select the background size', 'wellnesscenter'),
                    'help' => __('<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'wellnesscenter'),
                    'type' => 'short-select',
                    'attr' => array('class' => 'fw-checkbox-float-left'),
                    'value' => '',
                    'choices' => array(
                        'auto' => __('Auto', 'wellnesscenter'),
                        'cover' => __('Cover', 'wellnesscenter'),
                        'contain' => __('Contain', 'wellnesscenter'),
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
                                'help' => __('', 'wellnesscenter'),
                                'desc' => __('Select the overlay color', 'wellnesscenter'),
                                'type' => 'rgba-color-picker',
                                'value' => 'rgba(0,0,0,0.55)'
                            ),
                        ),
                    ),
                ),
            ),
            'bgcolor' => array(
                'background_color' => array(
                    'label' => __('', 'wellnesscenter'),
                    'help' => __('', 'wellnesscenter'),
                    'desc' => __('Select the background color', 'wellnesscenter'),
                    'value' => '',
                    'type' => 'color-picker'
                ),
            )
        ),
        'show_borders' => false,
    ),
    'txtcolor' => array(
        'label' => __('Text Color', 'wellnesscenter'),
        'type' => 'color-picker',
        'desc' => 'You can change color also',
    ),
    'tablet' => array(
        'label' => __('Responsive Layout for Tablet', 'wellnesscenter'),
        'desc' => __('Choose the responsive tablet display for this column', 'wellnesscenter'),
        'help' => __('Use this option in order to control how this column behaves on tablets (and devices with the resoution between 768px - 990px). Note that on phones all the columns are 1/1 by default.', 'wellnesscenter'),
        'type' => 'select',
        'value' => '',
        'choices' => array(
            'default-tablet' => __('Automatically inherit default layout', 'wellnesscenter'),
            'fw-col-sm-2' => __('Make it a 1/6 column', 'wellnesscenter'),
            'fw-col-sm-3' => __('Make it a 1/4 column', 'wellnesscenter'),
            'fw-col-sm-4' => __('Make it a 1/3 column', 'wellnesscenter'),
            'fw-col-sm-6' => __('Make it a 1/2 column', 'wellnesscenter'),
            'fw-col-sm-8' => __('Make it a 2/3 column', 'wellnesscenter'),
            'fw-col-sm-9' => __('Make it a 3/4 column', 'wellnesscenter'),
            'fw-col-sm-12' => __('Make it a 1/1 column', 'wellnesscenter')
        )
    ),
    'offset' => array(
        'label' => __('Layout Offset', 'wellnesscenter'),
        'desc' => __('Move columns to the right using .fw-col-md-offset-* classes ', 'wellnesscenter'),
        'help' => __('These classes increase the left margin of a column by * columns. For example, .fw-col-md-offset-4 moves .fw-col-md-4 over four columns.', 'wellnesscenter'),
        'type' => 'select',
        'value' => '',
        'choices' => array(
            'no-offset' => __('Nothing', 'wellnesscenter'),
            'fw-col-sm-offset-1' => __('moves 1 column', 'wellnesscenter'),
            'fw-col-sm-offset-2' => __('moves 2 column', 'wellnesscenter'),
            'fw-col-sm-offset-3' => __('moves 3 column', 'wellnesscenter'),
            'fw-col-sm-offset-4' => __('moves 4 column', 'wellnesscenter'),
            'fw-col-sm-offset-5' => __('moves 5 column', 'wellnesscenter'),
            'fw-col-sm-offset-6' => __('moves 6 column', 'wellnesscenter')
        )
    ),
    'class' => array(
        'label' => __('Custom Class', 'wellnesscenter'),
        'desc' => __('Enter custom CSS class', 'wellnesscenter'),
        'help' => __('you can use this options to add a class and further style the shortcode by adding your custom CSS in the style.css file. This file is located on your server in the /wow-child/style.css', 'wellnesscenter'),
        'type' => 'text',
        'value' => '',
    ),
);
