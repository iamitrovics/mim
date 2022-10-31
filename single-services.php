<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MO_Starter_Theme
 */

get_header();
?>

	<div id="about-header">	
		<img src="<?php the_field('background_image_serv_single'); ?>" alt="" class="bg-image bg-cover">
		<div class="overlay">
			<div class="container">
				<div class="hero-caption">
                    <?php 
                    $values = get_field( 'main_hero_title_serv' );
                    if ( $values ) { ?>
                        <h1><?php the_field('main_hero_title_serv'); ?></h1>
                    <?php 
                    } else { ?>
                        <h1><?php the_title(); ?></h1>
                    <?php } ?>
					
					<h2><?php the_field('header_text_serv_single'); ?></h2>
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

    <div id="services-main">

        <?php if( have_rows('content_layout_service') ): ?>
            <?php while( have_rows('content_layout_service') ): the_row(); ?>
                <?php if( get_row_layout() == 'full_width_content' ): ?>

                    <div class="full-content">
                        <div class="container">
                            <div class="content-block">
                                <?php the_sub_field('content_block'); ?>
                            </div>
                        </div>
                    </div>
                    <!-- // full cntent  -->

                <?php elseif( get_row_layout() == 'content_with_cta' ): ?>

                    <div id="about-us">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-7  offset-lg-5 col-md-7 offset-md-5">
                                    <div class="about-content text-left">
                                        <?php the_sub_field('content_block'); ?>
                                    </div>
                                </div>
                                <!-- // content  -->

                            </div>
                            <!-- // row  -->

                            <img src="<?php the_sub_field('featured_image'); ?>" alt="" class="side-img img-left">

                            <div id="cta-wrapper">
                                <h3><?php the_sub_field('cta_title'); ?></h3>
                                <a href="<?php the_sub_field('button_link'); ?>" class="btn-cta"><?php the_sub_field('button_label'); ?></a>
                            </div>            

                        </div>
                        <!-- // container  -->
                    </div>
                    <!-- // about us  -->	

                <?php elseif( get_row_layout() == 'other_services' ): ?>

                    <div id="why-us">
                        <img src="<?php the_sub_field('featured_image'); ?>" alt="" class="img-side img-left">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-9 col-md-9 offset-lg-3 offset-md-3">
                                    <div class="why-content">

                                        <div class="services">
                                            <h3><?php the_sub_field('section_title'); ?></h3>

                                            <div id="services-slider">
                                                <?php
                                                    $post_objects = get_sub_field('services_list');

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
                                                
                                            <a href="<?php the_sub_field('button_link'); ?>" class="btn-regular"><?php the_sub_field('button_label'); ?></a>							
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
                    
                 <?php elseif( get_row_layout() == 'content_left_image_right' ): ?>
                    
                    <div class="content-wrapper">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-7 col-md-6">
                                    <div class="content-block">
                                        <?php the_sub_field('content_block'); ?>
                                    </div>
                                </div>
                                <!-- // col  -->

                                <div class="col-lg-5 col-md-6">
                                    <div class="image-holder">
                                        <?php
                                        $imageID = get_sub_field('featured_image');
                                        $image = wp_get_attachment_image_src( $imageID, 'half-image' );
                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                        ?> 

                                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                    </div>
                                </div>
                                <!-- // image holder  -->

                            </div>
                            <!-- // row  -->
                        </div>
                        <!-- // container  -->
                    </div>
                    <!-- // wrapper  -->

                 <?php elseif( get_row_layout() == 'image_left_content_right' ): ?>
                    
                    <div class="content-wrapper">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-5 col-md-6">
                                    <div class="image-holder">
                                        <?php
                                        $imageID = get_sub_field('featured_image');
                                        $image = wp_get_attachment_image_src( $imageID, 'half-image' );
                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                        ?> 

                                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                    </div>
                                </div>
                                <!-- // image holder  -->                            

                                <div class="col-lg-7 col-md-6">
                                    <div class="content-block">
                                        <?php the_sub_field('content_block'); ?>
                                    </div>
                                </div>
                                <!-- // col  -->

                            </div>
                            <!-- // row  -->
                        </div>
                        <!-- // container  -->
                    </div>
                    <!-- // wrapper  -->

                <?php elseif( get_row_layout() == 'middle_cta' ): ?>

                    <div class="container">
                        <div id="middle-wrapper">
                            <h3><?php the_sub_field('cta_title'); ?></h3>
                            <a href="<?php the_sub_field('button_link'); ?>" class="btn-cta"><?php the_sub_field('button_label'); ?></a>
                        </div>                           
                    </div>
                    <!-- // cta  -->

                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>

    </div>
    <!-- // main  -->

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

<script src="<?php bloginfo('template_directory'); ?>/js/slick.js"></script>

<script>
    jQuery('#services-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 3,
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