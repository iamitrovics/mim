<?php
/**
 * Template Name: Services Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<div id="about-header">	
		<img src="<?php the_field('background_image_serv_page'); ?>" alt=""  class="bg-image">
		<div class="overlay">
			<div class="container">
				<div class="hero-caption">
					<h1><?php the_field('small_title_hero_serv'); ?></h1>
					<h2><?php the_field('hero_title_serv_page'); ?></h2>
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

    <div id="home-services">
        <div class="container">
            <div class="row">   

            <?php
                $post_objects = get_field('services_list_service_page');

                if( $post_objects ): ?>
                    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>


                        <div class="col-lg-4 col-md-6">
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

                <div class="col-lg-4 col-md-6">
                    <div class="cta-card service-card">
                        <div class="cta-caption">
                            <h3><?php the_field('cta_title_card_serv'); ?></h3>
                            <p><?php the_field('cta_subtitle_card_serv'); ?></p>
                            <a href="<?php the_field('button_link_cta_serv_card'); ?>" class="btn-cta"><?php the_field('button_label_serv_cta'); ?></a>
                        </div>
                        <!-- // caption  -->
                    </div>
                </div>
                <!-- // card  -->

            </div>
            <!-- // row  -->
        </div>
        <!-- // container  -->
    </div>
    <!-- // services  -->    

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

