<?php
/**
 * Theme basic setup.
 *
 * @package MO_Starter_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'after_setup_theme', 'symb_menu_setup' );

if ( ! function_exists ( 'symb_menu_setup' ) ) {

	function symb_menu_setup() {

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary_menu' => __( 'Primary Menu', 'symb' ),
            'footer1_menu' => __( 'Footer 1 Menu', 'symb' ),
            'footer2_menu' => __( 'Footer 2 Menu', 'symb' ),
            'footer3_menu' => __( 'Footer 3 Menu', 'symb' ),
        ) );


	}
}
