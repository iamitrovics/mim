<?php
/**
 * Declaring widgets
 *
 * @package MO_Starter_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'widgets_init', 'symb_widgets_init' );

if ( ! function_exists( 'symb_widgets_init' ) ) {
	/**
	 * Initializes themes widgets.
	 */
	function symb_widgets_init() {
	}
} // endif function_exists( 'symb_widgets_init' ).