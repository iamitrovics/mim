<?php
/**
 * Symbiotica Starter Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MO_Starter_Theme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/*
* Include files and functions
*/
require_once( __DIR__ . '/inc/theme-settings.php');         // Initialize theme default settings.
require_once( __DIR__ . '/inc/theme-setup.php');            // Theme setup and custom theme supports.
require_once( __DIR__ . '/inc/theme-menus.php');            // Register theme menus.
require_once( __DIR__ . '/inc/theme-widgets.php');          // Register widget area.

require_once( __DIR__ . '/inc/enqueue.php');               // Enqueue scripts and styles.
require_once( __DIR__ . '/inc/ctp.php');                   // Register Custom Post types
require_once( __DIR__ . '/inc/image-sizes.php');           // Custom image sizes

require_once( __DIR__ . '/inc/theme-extras.php');          // Customize theme, extra settings
require_once( __DIR__ . '/inc/theme-cleanup.php');         // Cleaning worpdress garbage
require_once( __DIR__ . '/inc/shortcodes.php');            // Shortcodes
require_once( __DIR__ . '/inc/customizer.php');            // Theme customizer
require_once( __DIR__ . '/inc/hooks.php');                 // Theme Hooks
require_once( __DIR__ . '/inc/video.php');                 // Videos

require_once( __DIR__ . '/inc/wp_bootstrap_mobile_navwalker.php'); 


function remove_default_image_sizes( $sizes) {
unset( $sizes['2048x2048']);
return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');


// Disable Gutenberg on the back end.
add_filter( 'use_block_editor_for_post', '__return_false' );

// Disable Gutenberg for widgets.
add_filter( 'use_widgets_blog_editor', '__return_false' );

add_action( 'wp_enqueue_scripts', function() {
    // Remove CSS on the front end.
    wp_dequeue_style( 'wp-block-library' );

    // Remove Gutenberg theme.
    wp_dequeue_style( 'wp-block-library-theme' );

    // Remove inline global CSS on the front end.
    wp_dequeue_style( 'global-styles' );
}, 20 );

// editor can view  flamingo
add_filter( 'flamingo_map_meta_cap', function( $meta_caps ) {
  $meta_caps = array_merge( $meta_caps, array(
    'flamingo_edit_inbound_message' => 'edit_pages',
    'flamingo_edit_inbound_messages' => 'edit_pages',
	'flamingo_delete_inbound_message' => 'edit_pages',
	'flamingo_delete_inbound_messages' => 'edit_pages',
	'flamingo_unspam_inbound_message' => 'edit_pages',
	'flamingo_edit_outbound_messages' => 'edit_pages',
	'flamingo_edit_outbound_message' => 'edit_pages',
  ) );

  return $meta_caps;
} );
