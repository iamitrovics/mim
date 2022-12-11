<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MO_Starter_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="icon" type="image/png"  href="<?php echo get_template_directory_uri(); ?>/img/ico/favicon.png">

	<meta name="google-site-verification" content="5q2_ReYtrFESuOAX-jxcZYoXlhycm6j8VlBQXaYQZp4" />

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-K8FVM8G');</script>
	<!-- End Google Tag Manager -->		

	<?php if( get_field('head_code_snippet', 'options') ): ?>
		<?php the_field('head_code_snippet', 'options'); ?>
	<?php endif; ?>

	
	<script type="application/ld+json">
	{
	"@context": "https://schema.org",
	"@type": "MovingCompany",
	"name": "My International Movers",
	"image": "http://localhost:81/morph/myinternationalmovers/wpnew/wp-content/uploads/2022/09/mim-logo.png",
	"url": "https://myinternationalmovers.com/",
	"telephone": "888-888-8449",
	"priceRange": "$ - $$$",
	"slogan": "Moving Done Easy",
	"description": "Guaranteed prices for International Moving. No Hidden fees or surprises!",
	"address": {
		"@type": "PostalAddress",
		"streetAddress": "",
		"addressLocality": "",
		"postalCode": "",
		"addressCountry": "US"
	},

	"contactPoint" : {
		"@type" : "ContactPoint",
		"telephone" : "888-888-8449",
		"contactType" : "customer service"
		},


	"openingHoursSpecification": {
		"@type": "OpeningHoursSpecification",
		"dayOfWeek": [
		"Monday",
		"Tuesday",
		"Wednesday",
		"Thursday",
		"Friday"
		],
		"opens": "07:30",
		"closes": "19:00"
	},
	"sameAs": [
		"https://www.facebook.com/MyIntMovers/",
		"https://www.instagram.com/myintmovers/"
	] 
	}
	</script>	

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<?php if( get_field('body_code_snippet', 'options') ): ?>
		<?php the_field('body_code_snippet', 'options'); ?>
	<?php endif; ?>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K8FVM8G"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div class="menu-overlay"></div>
	<div class="main-menu-sidebar visible-xs visible-sm visible-md" id="menu">

		<header>
			<button class="close-menu-btn"><img src="<?php bloginfo('template_directory'); ?>/img/ico/close-x.svg" alt=""></button>
		</header>
		<!-- // header  -->


		<nav id="sidebar-menu-wrapper">
			<div id="menu">    
				<ul class="nav-links">
					<?php
					wp_nav_menu( array(
						'menu'              => 'primary_menu',
						'theme_location'    => 'primary_menu',
						'depth'             => 2,
						'container'         => false,
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => false,
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'items_wrap' => '%3$s',
						'walker'            => new wp_bootstrap_navwalkermobile())
					);
					?>  
				</ul>
			</div>
			<!-- // menu  -->

			<footer>
				<a href="<?php the_field('button_link_top_ctas', 'options'); ?>" class="btn-cta"><?php the_field('button_label_top_cta', 'options'); ?></a>
			</footer>

		</nav> 
		<!-- // sidebar menu wrapper  -->

	</div>
	<!-- // main menu sidebar  -->	

	<div id="top-bar">
		<div class="container">

			<div class="top-bar__branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php the_field('website_logo_general', 'options'); ?>" alt="<?php bloginfo('name'); ?>"></a>
			</div>
			<!-- // branding  -->

			<div class="top-bar__nav">

				<div class="top-bar__menu">
					<ul>
						<?php wp_nav_menu( array(  'container_class' => false, 'container' => '' , 'menu_class' => 'menu-links', 'theme_location' => 'primary_menu', 'items_wrap' => '%3$s'  ) ); ?>
					</ul>
				</div>
				<!-- // menu  -->

				<div class="top-bar__ctas">
					<a href="<?php the_field('button_link_top_ctas', 'options'); ?>" class="btn-cta btn-fill"><?php the_field('button_label_top_cta', 'options'); ?></a>
					<a href="tel:<?php the_field('phone_number_top_ctas', 'options'); ?>" class="btn-cta"><?php the_field('phone_number_top_ctas', 'options'); ?></a>

					<div id="mobile-menu--btn" class="d-lg-none">
						<button>
							<span></span>
							<span></span>
							<span></span>
							<div class="clearfix"></div>
						</button>
					</div>
					<!-- // mobile  -->	

				</div>
				<!-- // cta btns  -->

			</div>
			<!-- // nav  -->

		</div>
	</div>
	<!-- // top bar  -->