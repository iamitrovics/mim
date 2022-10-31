<?php
/**
 * Customize Theme
 *
 * @package MO_Starter_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


function remove_footer_admin () {
    echo "My International Movers";
} 

add_filter('admin_footer_text', 'remove_footer_admin');

// Login config
function my_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logos/login-logo.png)!important;
            padding-bottom: 0px!important;
            width: 322px!important;
            height: 127px!important;
            background-size: cover!important;
            margin-bottom:50px!important;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Back to Homepage';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

function custom_menu_page_removing() {
    remove_menu_page( $menu_slug );
}

// Rearrange the admin menu
function custom_menu_order($menu_ord) {
if (!$menu_ord) return true;
return array(
  'index.php', // Dashboard

  'edit.php?post_type=page', // Pages
  'separator2', // Second separator    
  'edit.php', // Posts
  'edit.php?post_type=services', // Custom type five  
  'edit.php?post_type=reviews', // Custom type five  
  'edit.php?post_type=videoreviews', // Custom type five  
  'edit.php?post_type=cities', // Custom type five  
  'theme-general-settings',
  'separator1', // First separator

  'upload.php', // Media
  'themes.php', // Appearance
  'plugins.php', // Plugins
  'users.php', // Users
  'tools.php', // Tools
  'options-general.php', // Settings
  'separator-last', // Last separator

);
}

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
  function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
  }
  add_action( 'admin_head', 'fix_svg' );

add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');

 /* Admin Bar Color */
add_action('admin_head', 'change_bar_color');
function change_bar_color() {
?>
<style>
#wpadminbar{
background: #b65154 !important;
}
#wpadminbar .quicklinks a,#wpadminbar .shortlink-input {
color:#fff!important;
text-shadow:#939393 0 0px 0!important;
}

#wpadminbar .quicklinks a:hover,#wpadminbar .shortlink-input:hover {
color:#fff!important;
text-shadow:false 0 0px 0!important;
background:#fff!important;
}
#wpadminbar .ab-top-menu > li > .ab-item:focus, #wpadminbar.nojq .quicklinks .ab-top-menu > li > .ab-item:focus, #wpadminbar .ab-top-menu > li:hover > .ab-item, #wpadminbar .ab-top-menu > li.hover > .ab-item{
background: #b65154 !important;
}
.ab-sub-wrapper{
background: #b65154!important;
}
#wpadminbar:not(.mobile)>#wp-toolbar a:focus span.ab-label, #wpadminbar:not(.mobile)>#wp-toolbar li:hover span.ab-label, #wpadminbar>#wp-toolbar li.hover span.ab-label {
    color:#fff!important;
}
#wpadminbar .quicklinks .ab-sub-wrapper .menupop.hover>a, #wpadminbar .quicklinks .menupop ul li a:focus, #wpadminbar .quicklinks .menupop ul li a:focus strong, #wpadminbar .quicklinks .menupop ul li a:hover, #wpadminbar .quicklinks .menupop ul li a:hover strong, #wpadminbar .quicklinks .menupop.hover ul li a:focus, #wpadminbar .quicklinks .menupop.hover ul li a:hover, #wpadminbar li #adminbarsearch.adminbar-focused:before, #wpadminbar li .ab-item:focus:before, #wpadminbar li a:focus .ab-icon:before, #wpadminbar li.hover .ab-icon:before, #wpadminbar li.hover .ab-item:before, #wpadminbar li:hover #adminbarsearch:before, #wpadminbar li:hover .ab-icon:before, #wpadminbar li:hover .ab-item:before, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover {
    color:#a7dae7!important;
}
 #adminmenuback, #adminmenuwrap {
  background:#50ab9a;
}

#adminmenu, #adminmenu .wp-submenu {
    background:transparent;
}

#adminmenu {
    margin:0px;
}

#adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus {
    background:#b65154!important;
    color:#fff!important;
}
#adminmenu li a:focus div.wp-menu-image:before, #adminmenu li.opensub div.wp-menu-image:before, #adminmenu li:hover div.wp-menu-image:before {
    color:#fff!important;
}
#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu {
    background:#00A9CF!important;
    color:#fff;
}
#adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu .wp-submenu.sub-open, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu, .no-js li.wp-has-current-submenu:hover .wp-submenu {
    background:#f7f7f7!important;
}
#adminmenu .wp-has-current-submenu ul>li>a, .folded #adminmenu li.menu-top .wp-submenu>li>a {
    color:#545f66!important;
}
#adminmenu .opensub .wp-submenu li.current a, #adminmenu .wp-submenu li.current, #adminmenu .wp-submenu li.current a, #adminmenu .wp-submenu li.current a:focus, #adminmenu .wp-submenu li.current a:hover, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu li.current a {
    color:#b65154!important;
}
#adminmenu div.wp-menu-name {
    border-bottom:1px dotted #a7dae7!important;
}
#adminmenu li.wp-menu-separator {
    height:25px!important;
}
 #adminmenu a:hover, #adminmenu li.menu-top>a:focus {
    color:#fff!important;
}
#adminmenu .wp-submenu a:focus, #adminmenu .wp-submenu a:hover {
    color:#000!important;    
}

#adminmenu .wp-not-current-submenu li>a:hover, .folded #adminmenu .wp-has-current-submenu li>a:hover
 {
    color:#fff!important;
 } 
 #wpadminbar .quicklinks .menupop ul.ab-sub-secondary, #wpadminbar .quicklinks .menupop ul.ab-sub-secondary .ab-submenu {
 background:#b65154!important;
}
#collapse-menu:hover, #collapse-menu:hover #collapse-button div:after {
  color:#fff;
}
#adminmenu li.wp-has-submenu.wp-not-current-submenu:hover:after {
  border-right-color:#a7dae7!important;
}
#adminmenu .wp-submenu-head, #adminmenu a.menu-top {
  color:#fff;
}
#adminmenu div.wp-menu-image:before {
  color:#fff;
}
#collapse-button {
  color:#fff!important;
}
#wp-admin-bar-comments {
  display: none;
}
#wp-admin-bar-wp-logo {
  display: none;
}
.wp-core-ui .button-primary {
  background:#a7dae7;
  border:none;
  text-shadow:none;
}
.wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
  border:none!important;
  background:#b65154;
  box-shadow:none;
}
.wrap .add-new-h2:hover, .wrap .page-title-action:hover {
  background: #14D2FD;
  border:1px solid #14D2FD;
  color:#fff;
}
.wp-core-ui .button-primary {
    box-shadow:none!important;
}
.wrap .add-new-h2, .wrap .add-new-h2:active, .wrap .page-title-action, .wrap .page-title-action:active {
    color:#fff;
    background:#00A9CF;
    border:1px solid #00A9CF;
    border-radius:6px;
    font-size: 14px;
    padding-left: 13px;
    padding-right: 13px;
    padding-top: 7px;
    padding-bottom: 7px;
}
#collapse-button:focus, #collapse-button:hover {
    color:#14D2FD;
}
div.localpickup {
    color: #fff;
    background: #12a600;
    border-radius: 4px;
    padding: 5px; 
}

.wp-submenu-wrap {
    background:#009a9a!important;
}

</style>
<?php
}