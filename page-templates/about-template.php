<?php
/**
 * Template Name: About Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<div id="about-header">	
		<img src="<?php the_field('background_image_about'); ?>" alt="" class="bg-image">
		<div class="overlay">
			<div class="container">
				<div class="hero-caption">
					<h1><?php the_field('hero_title_about'); ?></h1>
					<h2><?php the_field('intro_text_about_hero'); ?></h2>
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

	<div id="about-main">
		<div class="container">

			<?php if( have_rows('content_blocks_about') ): ?>
				<?php while( have_rows('content_blocks_about') ): the_row(); ?>

					<div class="about-wrapper">
						<div class="about-text">
							<?php if( get_sub_field('block_title') ): ?>
								<h3><?php the_sub_field('block_title'); ?></h3>
							<?php endif; ?>
							<?php the_sub_field('content_block'); ?>
						</div>
						<!-- // text  -->
						<div class="about-image">
							<img src="<?php the_sub_field('featured_image'); ?>" alt="">
						</div>
						<!-- // image  -->
					</div>
					<!-- // about wrapper  -->

				<?php endwhile; ?>
			<?php endif; ?>

		</div>
		<!-- // container  -->
	</div>
	<!-- // about main  -->

    <div id="about-us">
        <div class="container">
            <div class="row">

                <div class="col-lg-7  offset-lg-5 col-md-7 offset-md-5">
                    <div class="about-content">
                        <?php the_field('content_block_outro_about'); ?>
                    </div>
                </div>
                <!-- // content  -->

            </div>
            <!-- // row  -->

            <img src="<?php the_field('featured_image_outro_about'); ?>" alt="" class="side-img img-left">

            <div id="cta-wrapper">
                <h2><?php the_field('cta_title_about_cta'); ?></h2>
                <a href="<?php the_field('button_link_about_cta'); ?>" class="btn-cta"><?php the_field('button_label_about_cta'); ?></a>
            </div>            

        </div>
        <!-- // container  -->
    </div>
    <!-- // about us  -->	

    <div id="why-us">
        <img src="<?php the_field('featured_image_bottom_con'); ?>" alt="" class="img-side img-left">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-8 offset-lg-4 offset-md-4">
                    <div class="why-content">

						<div class="why-intro">
							<h3><?php the_field('block_title_bottom_about'); ?></h3>
                            <?php the_field('content_block_about_bottom'); ?>     
							<a href="<?php the_field('button_link_about_bottom'); ?>" class="btn-regular"><?php the_field('button_label_about_bottom'); ?></a>							
						</div>
						<!-- // intro  -->
                                                  
                    </div>
                </div>
                <!-- // content  -->

            </div>
            <!-- // row  -->
        </div>
        <!-- // container  -->
    </div>
    <!-- // why us  -->	

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

	<div id="bottom-services">
        <div class="container">
            <header>
                <h2><?php the_field('block_title_serv_about'); ?></h2>
            </header>
            <!-- // header  -->
            <div id="services-slider">
                <?php
                $post_objects = get_field('services_list_about_cta');

                if( $post_objects ): ?>
                    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>


                        <div class="item">
                            <div class="service-card">
                                <div class="service-icon">
                                    <img src="<?php the_field('icon_service'); ?>" alt="">
                                </div>
                                <!-- // icon  -->
                                <div class="service-desc">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_field('intro_text_service'); ?>
                                    <a href="<?php echo get_permalink(); ?>" class="btn-more"><span>Read More</span></a>
                                </div>
                                <!-- // desc  -->
                            </div>
                        </div>
                        <!-- // card  -->

                        <?php endforeach; ?>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>                
            </div>
        </div>
        <!-- // container  -->
    </div>
    <!-- // services  -->



<?php get_footer(); ?>

<script src="<?php bloginfo('template_directory'); ?>/js/slick.js"></script>

<script>
    jQuery('#services-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    dots: true,
    arrows: false,
    responsive: [
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        },
    ]
    
});
</script>