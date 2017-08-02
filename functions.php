<?php

function theme_assets() {
	// Load the theme's parent style
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
	
	// Load the child theme's default style.css with the theme info
	wp_enqueue_style('child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array('parent-style')
	);
	
	// Load the theme's extra compiled css
	wp_enqueue_style( 'child-extra-style', get_stylesheet_directory_uri() . '/dist/styles/main.css');
  wp_enqueue_script('child-extra-js', get_stylesheet_directory_uri() .'/dist/scripts/main.js', ['jquery'], null, true);
}

add_action('wp_enqueue_scripts', 'theme_assets');