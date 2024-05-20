<?php

if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	

	'newsletter_title' => array(
		'label' => __( 'Title', 'wellnesscenter' ),
		'desc' => __( 'Enter the title', 'wellnesscenter' ),
		'type' => 'text',
		'value' => 'Sign up for amazing offers'
	),
	'newsletter_subtitle' => array(
		'label' => __( 'Sub Title', 'wellnesscenter' ),
		'desc' => __( 'Enter the Sub title', 'wellnesscenter' ),
		'type' => 'text',
		'value' => 'Sign up and Get Your Welcome Present Today'
	),
	'email_text' => array(
		'label' => __( 'Email Text', 'wellnesscenter' ),
		'desc' => __( 'Enter Email Placeholder Text', 'wellnesscenter' ),
		'type' => 'text',
		'value' => 'Enter Your Email-Address'
	),
	'button_text' => array(
		'label' => __( 'Button Text', 'wellnesscenter' ),
		'desc' => __( 'Enter Subscribe Button Text', 'wellnesscenter' ),
		'type' => 'text',
		'value' => 'Subscribe'
	),
	'class' => array(
		'label' => __( 'Custom Class', 'wellnesscenter' ),
		'desc' => __( 'Enter custom CSS class', 'wellnesscenter' ),
		'type' => 'text',
		'value' => '',
		'help' => __( 'you can use this options to add a class and further style the shortcode by adding your custom CSS in the style.css file. This file is located on your server in the /wow-child/style.css.', 'wellnesscenter' ),
	),
);
