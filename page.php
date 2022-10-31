<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MO_Starter_Theme
 */

get_header();
?>

	<div id="about-header">	
		<img src="<?php the_field('background_image_reg'); ?>" alt="" class="bg-image">
		<div class="overlay">
			<div class="container">
				<div class="hero-caption">
                    <h1><?php the_field('hero_title_reg_hero'); ?></h1>
                    <h2><?php the_field('intro_text_reg_hero'); ?></h2>
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

	<div id="page-wrapper">
		<div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="content-block">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
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

<?php
get_footer(); ?>