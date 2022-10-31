<?php
/**
 * Template Name: Testimonials Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<div id="about-header">	
		<img src="<?php the_field('background_image_reviews'); ?>" alt="" class="bg-image">
		<div class="overlay">
			<div class="container">
				<div class="hero-caption">
                    <h1><?php the_field('hero_title_reviews'); ?></h1>
                    <h2><?php the_field('intro_text_hero_reviews'); ?></h2>
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

    <div id="video-reviews">
        <div class="container">
            <header>
                <h2><?php the_field('block_title_video_rev'); ?></h2>
            </header>
            <!-- // header  -->
            <div class="row">
                <?php
                $loop = new WP_Query( array( 'post_type' => 'videoreviews', 'posts_per_page' => 115) ); ?>  
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <div class="col-lg-4 col-sm-6">
                        <div class="video-card">
                            <div class="video-image">
                                <a href="<?php the_field('video_url_video_review'); ?>">
                                    <?php 
                                        $youtube = get_field('video_url_video_review');
                                        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $youtube, $matches);
                                        $id = $matches[1];
                                        $youtube_img = get_field('video_url_video_review');
                                        $video_thumb_url = get_video_thumbnail_uri($youtube_img);
                                    ?>

                                <img src="<?php echo $video_thumb_url; ?>" alt="" class="img-responsive"> 
                                </a>
                            </div>
                            <!-- // image  -->
                            <div class="video-desc">
                                <span class="date"><?php the_field('date_video_review'); ?></span>
                                <h3><a href="<?php the_field('video_url_video_review'); ?>"><?php the_title(); ?></a></h3>
                                <span class="icon"><img src="<?php bloginfo('template_directory'); ?>/img/ico/youtube-icon.svg" alt=""></span>
                            </div>
                            <!-- // desc  -->
                        </div>
                    </div>
                    <!-- // video card  -->

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>                      
            </div>
        </div>
        <!-- // container  -->
    </div>
    <!-- // video reviews  -->

    <div id="regular-reviews">
        <div class="container">
            <header>
                <h2><?php the_field('block_title_regular_rev'); ?></h2>
            </header>
            <!-- // hader  -->
            <div class="row">

                <div class="col-xl-8 col-lg-7 col-md-7">
                    <div class="reviews-list">
                        <div class="row">

                            <?php
                            $loop = new WP_Query( array( 'post_type' => 'reviews', 'posts_per_page' => 115) ); ?>  
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                <div class="col-lg-12">
                                    <div class="review-slide">
                                        <div class="review-text">
                                            <img src="<?php bloginfo('template_directory'); ?>/img/ico/quote.png" alt="">
                                            <?php the_content(); ?>
                                        </div>
                                        <!-- // text  -->
                                        <div class="review-footer">
                                            <span class="author"><?php the_title(); ?></span>
                                            <span class="rating">
                                                <img src="<?php bloginfo('template_directory'); ?>/img/ico/star.png" alt="">
                                                <img src="<?php bloginfo('template_directory'); ?>/img/ico/star.png" alt="">
                                                <img src="<?php bloginfo('template_directory'); ?>/img/ico/star.png" alt="">
                                                <img src="<?php bloginfo('template_directory'); ?>/img/ico/star.png" alt="">
                                                <img src="<?php bloginfo('template_directory'); ?>/img/ico/star.png" alt="">

                                            </span>
                                        </div>
                                        <!-- // footer  -->
                                    </div>                                    
                                </div>

                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>      

                        </div>
                        <!-- // row  -->
                    </div>
                </div>
                <!-- // list  -->

                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="review-sidebar">
                        <h4><?php the_field('form_title_sidebar'); ?></h4>
                        <?php the_field('form_code_sidebar_revies'); ?>
                    </div>
                </div>
                <!-- // sidebar form  -->

            </div>
            <!-- // row  -->
        </div>
        <!-- // contaner  -->
    </div>
    <!-- // regular reviews  -->

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
        jQuery(".video-card a").fancybox({
        });            
    </script>