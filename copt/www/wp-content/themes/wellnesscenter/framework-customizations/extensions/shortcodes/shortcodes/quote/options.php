<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text_align' => array(
		'label' => __( 'Text Alignment', 'wellnesscenter' ),
		'desc'  => __( 'Select the prefered text alignment', 'wellnesscenter' ),
		'type'  => 'image-picker',
		'value' => '',
		'choices' => array(
			'fw-quote-left' => array(
				'small' => array(
					'height' => 50,
					'src' => WELLNESSCENTER_IMAGES .'/image-picker/left-position.jpg',
					'title' => __('Left','wellnesscenter')
				),
			),
			'fw-quote-center' => array(
				'small' => array(
					'height' => 50,
					'src' => WELLNESSCENTER_IMAGES .'/image-picker/center-position.jpg',
					'title' => __('Center','wellnesscenter')
				),
			),
			'fw-quote-right' => array(
				'small' => array(
					'height' => 50,
					'src' => WELLNESSCENTER_IMAGES .'/image-picker/right-position.jpg',
					'title' => __('Right','wellnesscenter')
				),
			),
		),
	),
	'text'  => array(
		'label'   => __( 'Text', 'wellnesscenter' ),
		'desc'    => __( 'Enter quote text', 'wellnesscenter' ),
		'value'   => '',
		'type'    => 'wp-editor',
		'tinymce' => true,
		'reinit'  => true,
		'wpautop' => false,
	),
    'text_group' => array(
        'type' => 'group',
        'options' => array(
            'author'  => array(
                'label' => __( 'Author', 'wellnesscenter' ),
                'desc'  => __( 'Enter the quote author', 'wellnesscenter' ),
                'type'  => 'text',
                'value' => ''
            ),
            'author_link'   => array(
                'label' => __( 'Link', 'wellnesscenter' ),
                'desc'  => __( 'Enter the author link', 'wellnesscenter' ),
                'type'  => 'text',
                'value' => ''
            ),
        )
    ),
	'font_size' => array(
		'label' => __( 'Font Size', 'wellnesscenter' ),
		'desc'  => __( 'Select font size', 'wellnesscenter' ),
		'attr'  => array( 'class' => 'fw-checkbox-float-left' ),
		'type'  => 'radio',
		'value' => 'fw-quote-md',
		'choices' => array(
			'fw-quote-sm' => __( 'Small', 'wellnesscenter' ),
			'fw-quote-md' => __( 'Medium', 'wellnesscenter' ),
			'fw-quote-lg' => __( 'Large', 'wellnesscenter' ),
		),
	),
	'class'  => array(
		'label' => __( 'Custom Class', 'wellnesscenter' ),
		'desc'  => __( 'Enter custom CSS class', 'wellnesscenter' ),
		'type'  => 'text',
		'value' => '',
		'help'  => __( 'you can use this options to add a class and further style the shortcode by adding your custom CSS in the style.css file. This file is located on your server in the /wow-child/style.css', 'wellnesscenter' ),
	),
);