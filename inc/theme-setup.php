<?php
/**
 * Theme basic setup.
 *
 * @package MO_Starter_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'after_setup_theme', 'symb_setup' );

if ( ! function_exists ( 'symb_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function symb_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'cf', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
        ) );
        
        /*
        * Add WooCommerce Support
        */
        add_theme_support( 'woocommerce' );

	}
}

// function wpex_remove_cpt_slug_services( $post_link, $post, $leavename ) {
// 	if ( 'services' != $post->post_type || 'publish' != $post->post_status ) {
// 		return $post_link;
// 	}
// 	$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
// 	return $post_link;
// }
// add_filter( 'post_type_link', 'wpex_remove_cpt_slug_services', 10, 3 );


/**
 * Some hackery to have WordPress match postname to any of our public post types
 * All of our public post types can have /post-name/ as the slug, so they better be unique across all posts
 * Typically core only accounts for posts and pages where the slug is /post-name/
 */
// function wpex_parse_request_tricksy( $query ) {
// 	// Only noop the main query
// 	if ( ! $query->is_main_query() )
// 		return;
// 	// Only noop our very specific rewrite rule match
// 	if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
// 		return;
// 	}
// 	// 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
// 	if ( ! empty( $query->query['name'] ) ) {
// 		$query->set( 'post_type', array( 'post', 'page', 'services' ) );
// 	}
// }
// add_action( 'pre_get_posts', 'wpex_parse_request_tricksy' );

function cf7_post_to_third_party($form)
{
    $formMappings = array(
        'first_name' => array('your-first'),
		'last_name' => array('your-last'),
		'email' => array('your-email'),
		'phone' => array('your-tel'),
		'move_date' => array('your-date'),
		'move_size' => array('home-size'),
		'from_zip' => array('zip-from'),
		'to_zip' => array('zip-to'),
		'car_trailer' => array('your-trailer'),
		'car_make' => array('car-make'),
		'car_model' => array('car-model'),
		'car_year' => array('car-year'),
        'source_details[url]' => array('dynamichidden-672'),
        'source_details[title]' => array('dynamichidden-673'),
		'move_type' => array('dynamichidden-100')
    );
    $handler = new MovingSoftFormHandler($formMappings);
    $handler->setOrigin('https://myinternationalmovers.com')->handleCF7($form, [67, 261, 66, 260]);
}
add_action('wpcf7_mail_sent', 'cf7_post_to_third_party', 10, 1);


function skip_mail_when_testing($f){
    $submission = WPCF7_Submission::get_instance();
    $handler = new MovingSoftFormHandler();
    
    return $handler->getIP() == '206.189.212.83'; //testing Bot IP address
}
add_filter('wpcf7_skip_mail','skip_mail_when_testing');


if ( ! is_admin() ) {

	function fb_filter_query( $query, $error = true ) {

		if ( is_search() ) {
			$query->is_search = false;
			$query->query_vars['s'] = false;
			$query->query['s'] = false;

			if ( $error == true )
				$query->is_404 = true;
		}
	}

	add_action( 'parse_query', 'fb_filter_query' );
	add_filter( 'get_search_form', function() { return null;} );

}


if (current_user_can('manage_options')) {
	function lwp_2629_user_edit_ob_start() {ob_start();}
	add_action( 'personal_options', 'lwp_2629_user_edit_ob_start' );
	function lwp_2629_insert_nicename_input( $user ) {
		$content = ob_get_clean();
		$regex = '/<tr(.*)class="(.*)\buser-user-login-wrap\b(.*)"(.*)>([\s\S]*?)<\/tr>/';
		$nicename_row = sprintf(
			'<tr class="user-user-nicename-wrap"><th><label for="user_nicename">%1$s</label></th><td><input type="text" name="user_nicename" id="user_nicename" value="%2$s" class="regular-text" />' . "\n" . '<span class="description">%3$s</span></td></tr>',
			esc_html__( 'Nicename' ),
			esc_attr( $user->user_nicename ),
			esc_html__( 'Must be unique.' )
		);
		echo preg_replace( $regex, '\0' . $nicename_row, $content );
	}
	add_action( 'show_user_profile', 'lwp_2629_insert_nicename_input' );
	add_action( 'edit_user_profile', 'lwp_2629_insert_nicename_input' );
	function lwp_2629_profile_update( $errors, $update, $user ) {
		if ( !$update ) return;
		if ( empty( $_POST['user_nicename'] ) ) {
			$errors->add(
				'empty_nicename',
				sprintf(
					'<strong>%1$s</strong>: %2$s',
					esc_html__( 'Error' ),
					esc_html__( 'Please enter a Nicename.' )
				),
				array( 'form-field' => 'user_nicename' )
			);
		} else {
			$user->user_nicename = $_POST['user_nicename'];
		}
	}
	add_action( 'user_profile_update_errors', 'lwp_2629_profile_update', 10, 3 );
	}

// fix canonical on paginated
function remake_wpseo_canonical($canonical) {
	global $post;

	$paged = get_query_var('paged');

	if (isset($paged) && (int) $paged > 0){
		return trailingslashit(trailingslashit($canonical) . 'page/' . $paged);

		return $url;
	}

	return $canonical;
}

add_filter('wpseo_opengraph_url', 'remake_wpseo_canonical');