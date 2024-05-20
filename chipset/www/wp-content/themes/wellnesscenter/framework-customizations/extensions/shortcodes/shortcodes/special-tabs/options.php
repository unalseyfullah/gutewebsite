<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

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
                    )
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
                    'tab_content_sub_title'   => array(
                        'type'  => 'text',
                        'label' => __('Content Sub-Title', 'wellnesscenter'),
                        'desc' => __('Enter content sub-title', 'wellnesscenter')
                    ),
                    'tab_content_image'   => array(
                        'label' => __('Content Image', 'wellnesscenter'),
                        'desc' => __('Upload an image', 'wellnesscenter'),
                        'type' => 'upload'
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