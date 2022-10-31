<?php
/**
 * Template Name: Portfolio Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<div id="about-header">	
		<img src="<?php the_field('paralax_image_portfolio'); ?>" alt="" class="bg-image">
		<div class="overlay">
			<div class="container">
				<div class="hero-caption">
                    <h1><?php the_field('hero_title_portoflio'); ?></h1>
                    <h2><?php the_field('intro_text_portfolio'); ?></h2>
				</div>
				<!-- // caption  -->
			</div>
			<!-- // container  -->
		</div>
		<!-- // overlay  -->
	</div>
	<!-- // about header  -->

	<div class="inner-form">
		<?php include(TEMPLATEPATH . '/inc/booking-div.php'); ?>
	</div>
	<!-- // inner form  -->

	<div id="gallery-wrapper">
		<div class="container">
			<div class="row">
				<?php 
				$images = get_field('photo_gallery_gal');
				if( $images ): ?>
					<?php foreach( $images as $image ): ?>
						<div class="col-md-4 col-lg-3">
							<div class="image-holder">
								<a href="<?php echo $image['url']; ?>" data-fancybox="gallery">
								<img src="<?php echo $image['sizes']['medium']; ?>" class="img-responsive" alt="<?php echo $image['alt']; ?>" />     
								</a>
							</div>
						</div>
						<!-- // col md 4  -->
					<?php endforeach; ?>
				<?php endif; ?>                
			</div>
			<!-- // row  -->
		</div>
	</div>
	<!-- // gallery wrapper  -->

    <div id="bottom-cta">
        <div class="container">
            <h3><?php the_field('cta_title_bottom', 'options'); ?></h3>
            <div class="cta-btns">
                <a href="<?php the_field('button_1_link_footer', 'options'); ?>" class="btn-cta"><?php the_field('button_1_label_footer', 'options'); ?></a>
                <a href="tel:<?php the_field('phone_number_footer', 'options'); ?>" class="btn-cta btn-tel"><?php the_field('button_2_label_footer', 'options'); ?></a>
            </div>
            <!-- // btns  -->
        </div>
        <!-- // container  -->
    </div>
    <!-- // bottom cta  -->    

<?php get_footer(); ?>

	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.fancybox.min.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jquery.fancybox.min.css">
	<script>
		jQuery("#gallery-wrapper .wp-block-image a").fancybox({
		});    		
	</script>