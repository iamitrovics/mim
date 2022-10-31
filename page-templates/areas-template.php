<?php
/**
 * Template Name: Areas We Serve Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<div id="about-header">	
		<img src="<?php the_field('background_image_areas_header'); ?>" alt="" class="bg-image">
		<div class="overlay">
			<div class="container">
				<div class="hero-caption">
                    <h1><?php the_field('hero_title_areas_page'); ?></h1>
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

    <div id="areas-full">
        <div class="container">

            <div class="location-list">

                <?php
                    // check if the repeater field has rows of data
                    if(have_rows('areas_we_serve_list')):
                        // loop through the rows of data
                        while(have_rows('areas_we_serve_list')) : the_row();?>  
                            <div class="area-section">
                                <h2><?php the_sub_field('aras_title'); ?></h2>

                                <ul>
                                <?php
                                    // check if the repeater field has rows of data
                                    if(have_rows('cities_we_serve')):
                                        // loop through the rows of data
                                        while(have_rows('cities_we_serve')) : the_row();?>  
                                            
                                            <li><a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('city_name'); ?></a></li>
                                                
                                        <?php endwhile;
                                    else :
                                        echo 'No data';
                                    endif;
                                ?>
                                </ul>

                            </div>
                            <!-- // section  -->

                        <?php endwhile;
                    else :
                        echo 'No data';
                    endif;
                ?>

            </div>
            <!-- // list  -->

        </div>
        <!-- // container  -->
    </div>
    <!-- // areas full  -->

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
