<?php
/**
 * Template Name: Container Sizes Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<div id="about-header">	
		<img src="<?php the_field('background_image_containers'); ?>" alt="" class="bg-image">
		<div class="overlay">
			<div class="container">
				<div class="hero-caption">
                    <h1><?php the_field('main_title_sizes_header'); ?></h1>
                    <h2><?php the_field('intro_text_conta'); ?></h2>
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

    <div id="sizes-wrapper">
        <div class="container">

            <div id="container-sizes">

                <?php if( have_rows('data_tables_repe') ): ?>
                    <?php while( have_rows('data_tables_repe') ): the_row(); ?>

                        <div class="container-photo">
                            <img src="<?php the_sub_field('featured_image_sheet'); ?>" alt="">
                        </div>
                        <!-- /.container-photo -->
                        <div class="container-table">
                            <h2><?php the_sub_field('main_title_sheet'); ?></h2>
                            <?php the_sub_field('content_block_sheet'); ?>
                        </div>
                        <!-- /.container-table -->

                    <?php endwhile; ?>
                <?php endif; ?>
            
            </div>
            <!-- /#container-sizes -->

        </div>
    </div>
    <!-- // wraper  -->

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