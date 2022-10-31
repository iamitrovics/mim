<?php
/**
 * Theme Customizer
 *
  * @package MO_Starter_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'symb_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function symb_customize_preview_js() {
		wp_enqueue_script(
			'symb_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'symb_customize_preview_js' );