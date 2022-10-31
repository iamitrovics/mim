<?php
/**
 * Template Name: FAQ Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<div id="about-header">	
		<img src="<?php the_field('background_image_faq'); ?>" alt="" class="bg-image">
		<div class="overlay">
			<div class="container">
				<div class="hero-caption">
                    <h1><?php the_field('hero_title_faq_header'); ?></h1>
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

	<div id="faq-wrapper">
		<div class="container">
			<div class="row">
                <div class="col-lg-10 offset-lg-1">

                    <div class="blog-detailed--accordion">

                        <?php if( have_rows('faq_list_faq') ): ?>
                            <?php while( have_rows('faq_list_faq') ): the_row(); ?>

                                <div class="wrap">
                                    <h4><?php the_sub_field('question'); ?></h4>
                                    <div>
                                        <?php the_sub_field('answer'); ?>
                                    </div>
                                </div>
                                <!-- /.wrap -->

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                    <!-- /.blog-detailed--accordion -->                

                </div>
                <!-- // offset  -->
            </div>
            <!-- // row  -->
		</div>
        <!-- // container  -->
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

