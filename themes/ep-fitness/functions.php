<?php
/**
 * EP Fitness Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue theme assets
 */
function ep_fitness_enqueue_assets() {
	wp_enqueue_style(
		'ep-fitness-global',
		get_template_directory_uri() . '/assets/css/global.css',
		array(),
		'1.0.0'
	);

	wp_enqueue_script(
		'ep-fitness-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		'1.0.0',
		true
	);

	// Google Fonts
	wp_enqueue_style(
		'ep-fitness-fonts',
		'https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800;900&family=DM+Sans:wght@400;500;600&display=swap',
		array(),
		null
	);
}
add_action( 'wp_enqueue_scripts', 'ep_fitness_enqueue_assets' );

/**
 * Enqueue fonts in block editor
 */
function ep_fitness_enqueue_editor_assets() {
	wp_enqueue_style(
		'ep-fitness-fonts-editor',
		'https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800;900&family=DM+Sans:wght@400;500;600&display=swap',
		array(),
		null
	);
	wp_enqueue_style(
		'ep-fitness-global-editor',
		get_template_directory_uri() . '/assets/css/global.css',
		array(),
		'1.0.0'
	);
}
add_action( 'enqueue_block_editor_assets', 'ep_fitness_enqueue_editor_assets' );

/**
 * Theme setup
 */
function ep_fitness_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'ep-fitness' ),
		'footer'  => __( 'Footer Navigation', 'ep-fitness' ),
	) );
}
add_action( 'after_setup_theme', 'ep_fitness_setup' );
