<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'icons' => array(
        'label' => __('Icons', 'wellnesscenter'),
        'popup-title' => __('Add/Edit Icon', 'wellnesscenter'),
        'desc' => __('Here you can add, remove and edit your Icons.', 'wellnesscenter'),
        'type' => 'addable-popup',
        'template' => '{{=title}}',
        'popup-options' => array(
			'icon'       => array(
				'type' => 'icon',
				'label' => __( 'Icon', 'wellnesscenter' )
			),
			'title'    => array(
				'type'  => 'text',
				'label' => __( 'Title', 'wellnesscenter' ),
				'desc'  => __( 'Icon title', 'wellnesscenter' )
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
					'label' => __( 'Yes', 'wellnesscenter' )
				),
				'left-choice' => array(
					'value' => '_self',
					'label' => __( 'No', 'wellnesscenter' )
				)
			)
        )
    ),    
);


