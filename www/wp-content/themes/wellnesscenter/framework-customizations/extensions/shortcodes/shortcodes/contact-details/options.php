<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'    => array(
		'type'  => 'icon',
		'label' => __('Choose an Icon', 'wellnesscenter'),
	),
	'content' => array(
        'type'   => 'wp-editor',
        'teeny'  => true,
        'reinit' => true,
		'label' => __( 'Content', 'wellnesscenter' ),
		'desc'  => __( 'Enter the desired content', 'wellnesscenter' ),
	)
);