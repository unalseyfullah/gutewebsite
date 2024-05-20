<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	
	'button_settings' => array(
		'label' => __( 'Button', 'wellnesscenter' ),
		'type' => 'addable-popup',
		'desc' => __( 'Add button', 'wellnesscenter' ),
		'template' => 'Button : {{- label }}',
		'popup-options' => array(
			'style' => array(
				'label' => __( 'Style', 'wellnesscenter' ),
				'desc' => __( 'Choose button style', 'wellnesscenter' ),
				'type' => 'image-picker',
				'value' => '',
				'choices' => array(
					'default' => array(
						'small' => array(
							'height' => 70,
							'src' => WELLNESSCENTER_IMAGES . '/image-picker/button-style1.jpg'
						),
						'large' => array(
							'height' => 208,
							'src' => WELLNESSCENTER_IMAGES . '/image-picker/button-style1.jpg'
						),
					),
					'primary' => array(
						'small' => array(
							'height' => 70,
							'src' => WELLNESSCENTER_IMAGES . '/image-picker/button-style2.jpg'
						),
						'large' => array(
							'height' => 208,
							'src' => WELLNESSCENTER_IMAGES . '/image-picker/button-style2.jpg'
						),
					),

				),
			),
			'inline' => array(
				'type' => 'switch',
				'label' => __( 'Inline', 'wellnesscenter' ),
				'desc' => __( 'Show button as inline?', 'wellnesscenter' ),
				'right-choice' => array(
					'value' => 'btn-inline',
					'label' => __( 'Yes', 'wellnesscenter' ),
				),
				'left-choice' => array(
					'value' => '',
					'label' => __( 'No', 'wellnesscenter' ),
				),
			),
			'label' => array(
				'label' => __( 'Button Label', 'wellnesscenter' ),
				'desc' => __( 'This is the text that appears on your button', 'wellnesscenter' ),
				'type' => 'text',
				'value' => 'Read More'
			),
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
			'size' => array(
				'label' => __( 'Button Size', 'wellnesscenter' ),
				'desc' => __( 'Choose a Size for your button', 'wellnesscenter' ),
				'type' => 'select',
				'choices' => array(
					'lg' => __( 'Large', 'wellnesscenter' ),
					'md' => __( 'Medium', 'wellnesscenter' ),
					'sm' => __( 'Small', 'wellnesscenter' ),
				)
			),
			'btn_alignment' => array(
				'label' => __( 'Alignment', 'wellnesscenter' ),
				'desc' => __( 'Choose button alignment', 'wellnesscenter' ),
				'type' => 'image-picker',
				'value' => '',
				'choices' => array(
					'' => array(
						'small' => array(
							'height' => 50,
							'src' => WELLNESSCENTER_IMAGES . '/image-picker/no-align.jpg',
							'title' => __( 'None', 'wellnesscenter' )
						),
					),
					'text-left' => array(
						'small' => array(
							'height' => 50,
							'src' => WELLNESSCENTER_IMAGES . '/image-picker/left-position.jpg',
							'title' => __( 'Left', 'wellnesscenter' )
						),
					),
					'text-center' => array(
						'small' => array(
							'height' => 50,
							'src' => WELLNESSCENTER_IMAGES . '/image-picker/center-position.jpg',
							'title' => __( 'Center', 'wellnesscenter' )
						),
					),
					'text-right' => array(
						'small' => array(
							'height' => 50,
							'src' => WELLNESSCENTER_IMAGES . '/image-picker/right-position.jpg',
							'title' => __( 'Right', 'wellnesscenter' )
						),
					),
				),
			),
			'btn_icon_group' => array(
				'type' => 'group',
				'options' => array(
					'icon' => array(
						'type' => 'icon',
						'label' => __( 'Icon', 'wellnesscenter' )
					),
					'icon_position' => array(
						'type' => 'switch',
						'label' => __( '', 'wellnesscenter' ),
						'desc' => __( 'Choose the icon position', 'wellnesscenter' ),
						'right-choice' => array(
							'value' => 'pull-right',
							'label' => __( 'Right', 'wellnesscenter' ),
						),
						'left-choice' => array(
							'value' => '',
							'label' => __( 'Left', 'wellnesscenter' ),
						),
					),
				)
			),
		)
	),
);
