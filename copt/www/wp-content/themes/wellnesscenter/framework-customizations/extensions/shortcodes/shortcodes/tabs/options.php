<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

    'tabs_position_picker' => array(
        'type'  => 'multi-picker',
        'label' => false,
        'desc'  => false,
        'picker' => array(
            'tabs_type' => array(
                'label' => __('Type', 'wellnesscenter'),
                'type'  => 'image-picker',
                'value' => '',
                'desc'  => __('Choose the tabs type', 'wellnesscenter'),
                'choices' => array(
                    'three' => array(
                        'small' => array(
                            'height' => 75,
                            'src' => WELLNESSCENTER_IMAGES .'/image-picker/minimal-top.jpg',
                        ),
                        'large' => array(
                            'height' => 208,
                            'src' => WELLNESSCENTER_IMAGES .'/image-picker/minimal-top.jpg'
                        ),
                    ),
                    'four' => array(
                        'small' => array(
                            'height' => 75,
                            'src' => WELLNESSCENTER_IMAGES .'/image-picker/minimal-side.jpg',
                        ),
                        'large' => array(
                            'height' => 208,
                            'src' => WELLNESSCENTER_IMAGES .'/image-picker/minimal-side.jpg'
                        ),
                    ),
                ),
            ),
        ),
        'choices' => array(
            'one' => array(
                'tabs_justified' => array(
                    'type'  => 'switch',
                    'value' => '',
                    'label' => __('', 'wellnesscenter'),
                    'desc'  => __('Make tabs justified', 'wellnesscenter'),
                    'left-choice' => array(
                        'value' => '',
                        'label' => __('No', 'wellnesscenter'),
                    ),
                    'right-choice' => array(
                        'value' => 'nav-justified',
                        'label' => __('Yes', 'wellnesscenter'),
                    )
                ),
            ),
            'three' => array(
                'tabs_justified' => array(
                    'type'  => 'switch',
                    'value' => '',
                    'label' => __('', 'wellnesscenter'),
                    'desc'  => __('Make tabs justified', 'wellnesscenter'),
                    'left-choice' => array(
                        'value' => '',
                        'label' => __('No', 'wellnesscenter'),
                    ),
                    'right-choice' => array(
                        'value' => 'nav-justified',
                        'label' => __('Yes', 'wellnesscenter'),
                    )
                ),
            )
        )
    ),
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => __( 'Tabs', 'wellnesscenter' ),
		'popup-title'   => __( 'Add/Edit Tab', 'wellnesscenter' ),
		'desc'          => __( 'Add tabs', 'wellnesscenter' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
            'tab_title' => array(
                'type' => 'group',
                'options' => array(
                    'tab_title'   => array(
                        'type'  => 'text',
                        'label' => __('Title', 'wellnesscenter'),
                        'desc' => __('Enter tab title', 'wellnesscenter')
                    ),
                    'tab_icon' => array(
                        'type' => 'icon',
                        'label' => __( 'Icon', 'wellnesscenter' ),
                        'desc' => __( 'Choose tab icon', 'wellnesscenter' )
                    ),
                )
            ),
            'content' => array(
                'type' => 'group',
                'options' => array(
                    'tab_content_title'   => array(
                        'type'  => 'text',
                        'label' => __('Content Title', 'wellnesscenter'),
                        'desc' => __('Enter content title', 'wellnesscenter')
                    ),
                    'tab_content' => array(
                        'type'   => 'wp-editor',
                        'teeny'  => true,
                        'reinit' => true,
                        'label' => __('Tab Content', 'wellnesscenter'),
                        'desc' => __('Enter tab content', 'wellnesscenter')
                    )
                )
            )

		)
	),
    'class'  => array(
        'attr'  => array( 'class' => 'border-bottom-none'),
        'label'   => __( 'Custom Class', 'wellnesscenter' ),
        'desc'    => __( 'Enter custom CSS class', 'wellnesscenter' ),
        'type'    => 'text',
        'help' => __('You can use this class to further style this shortcode by adding your custom CSS in the <strong>style.css</strong> file. This file is located on your server in the <strong>child-theme</strong> folder.','wellnesscenter'),
        'value' => '',
    ),
);