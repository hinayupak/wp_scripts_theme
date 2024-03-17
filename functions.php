<?php
/**
 * Theme functions file, which is auto-loaded by WordPress. Use this file to
 * load additional PHP files and bootstrap the theme.
 */

add_action( 'wp_enqueue_scripts', 'theme_assets' );

/**
 * Enqueues assets on the front end of the site.
 *
 * @since 1.0.0
 * @link  https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 */
function theme_assets() {
	$asset = include get_theme_file_path( 'public/css/screen.asset.php' );
	$script_asset = include get_theme_file_path( 'public/js/screen.asset.php'  );

	wp_enqueue_style(
		'theme-style',
		get_theme_file_uri( 'public/css/screen.css' ),
		$asset['dependencies'],
		$asset['version']
	);

	wp_enqueue_script(
		'theme-style',
		get_theme_file_uri( 'public/js/screen.js' ),
		$script_asset['dependencies'],
		$script_asset['version'],
		true
	);
}

add_action( 'after_setup_theme', 'theme_editor_styles' );

/**
 * Adds editor content styles.
 *
 * @since 1.0.0
 * @link  https://developer.wordpress.org/reference/functions/add_editor_style/
 */
function theme_editor_styles() {
	add_editor_style( [
		get_theme_file_uri( 'public/css/editor.css' )
	] );
}

add_action( 'enqueue_block_editor_assets', 'theme_editor_assets' );

/**
 * Enqueues assets for the editor UI.
 *
 * @since 1.0.0
 */
function theme_editor_assets() {
	$script_asset = include get_theme_file_path( 'public/js/editor.asset.php'  );
	$style_asset  = include get_theme_file_path( 'public/css/editor.asset.php' );

	wp_enqueue_script(
		'theme-editor',
		get_theme_file_uri( 'public/js/editor.js' ),
		$script_asset['dependencies'],
		$script_asset['version'],
		true
	);

	wp_enqueue_style(
		'theme-editor',
		get_theme_file_uri( 'public/css/editor.css' ),
		$style_asset['dependencies'],
		$style_asset['version']
	);
}
