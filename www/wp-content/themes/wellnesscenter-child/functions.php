<?php

// enqueue the child theme stylesheet

Function _action_wellnesscenter_child_enqueue_scripts() {
wp_register_style( 'wellnesscenter_childstyle', get_stylesheet_directory_uri() . '/style.css'  );
wp_enqueue_style( 'wellnesscenter_childstyle' );
}
add_action( 'wp_enqueue_scripts', '_action_wellnesscenter_child_enqueue_scripts',11);
/*
function custom_widget_areas_init() {
	for ($footer = 1; $footer < 5; $footer++) {
		register_sidebar( array(
			'id'            => 'ahmetWP-footer-' . $footer,
			'name'          => 'Footer ' . $footer,
			'description'   => 'Included Footer Layer',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget_title no_stripe">',
			'after_title'   => '</h4>',
		) );
	}
}
*/
function custom_widget_areas_init() {
	register_sidebar( array(
		'id'			=>	'try_custom_widget',
		'name'			=>	'try custom widget',
		'description'	=>	'try custom widget description',
		'before_widget'	=>	'<aside id="%1$s" class="widget %2$s">',
		'after_widget'	=>	'</aside>',
		'before_title'	=>	'<h4 class="widget_title no_stripe">',
		'after_title'	=>	'</h4>',
	) );

	for ($footer = 1; $footer < 5; $footer++) {
		register_sidebar( array(
			'id'			=>	'custom_footer_ahmet_'.$footer,
			'name'			=>	'Widget Footer '.$footer,
			'description'	=>	'Included Footer '.$footer.' Layer',
			'before_widget'	=>	'<aside id="%1$s" class="widget %2$s">',
			'after_widget'	=>	'</aside>',
			'before_title'	=>	'<h4 class="widget_title no_stripe">',
			'after_title'	=>	'</h4>',
		) );
	}
}
add_action( 'widgets_init', 'custom_widget_areas_init' );