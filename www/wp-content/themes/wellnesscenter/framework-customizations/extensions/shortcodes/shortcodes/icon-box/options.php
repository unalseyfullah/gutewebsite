<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'    => array(
		'type'  => 'icon',
		'label' => __('Choose an Icon', 'wellnesscenter'),
	),
	'title'   => array(
		'type'  => 'text',
		'label' => __( 'Title of the Box', 'wellnesscenter' ),
	),
	'content' => array(
		'type'  => 'textarea',
		'label' => __( 'Content', 'wellnesscenter' ),
		'desc'  => __( 'Enter the desired content', 'wellnesscenter' ),
	),
    'use_button' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'picker' => array(
            'option' => array(
                'type' => 'switch',
                'label' => __('Use Button', 'wellnesscenter'),
                'desc' => '',
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
			    'label' => array(
			        'label' => __( 'Button Label', 'wellnesscenter' ),
			        'desc' => __( 'This is the text that appears on your button', 'wellnesscenter' ),
			        'type' => 'text',
			        'value' => 'See More'
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

        	)
        )
    )
);