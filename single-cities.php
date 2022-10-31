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

    <div  id="home-banner">
        <div class="container">
            <div class="hero-caption">

                    <?php 
                    $values = get_field( 'main_title_city_about' );
                    if ( $values ) { ?>
                        <h1><?php the_field('main_title_city_about'); ?></h1>
                    <?php 
                    } else { ?>
                        <h1><?php the_title(); ?></h1>
                    <?php } ?>
                
                <p><?php the_field('subtitle_header_city'); ?></p>
            </div>
            <!-- // caption  -->
            <img src="<?php bloginfo('template_directory'); ?>/img/bg/hero-image-mim.webp" alt="" class="hero-image">
        </div>
        <!-- // container  -->
    </div>
    <!-- // subscriptions  -->    

    <?php include(TEMPLATEPATH . '/inc/booking-div.php'); ?>

    <?php 
    $values = get_field( 'intro_text_city_single' );
    if ( $values ) { ?>
    
        <div id="single-city--intro">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-7 col-md-8">
                        <div class="content-block">
                            <?php the_field('intro_text_city_single'); ?>
                        </div>
                    </div>
                    <!-- // col lg 6  -->

                </div>
                <!-- // row  -->
                <?php 
                $values = get_field( 'background_image_header_city' );
                if ( $values ) { ?>
                
                    <?php
                    $imageID = get_field('background_image_header_city');
                    $image = wp_get_attachment_image_src( $imageID, 'largeheader-image' );
                    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                    ?> 

                    <img class="img-side" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                
                <?php 
                } else { ?>
                    <img src="<?php bloginfo('template_directory'); ?>/img/misc/Mover-Team.webp" alt="" class="img-side">
                <?php } ?>
            </div>
            <!-- // container  -->
        </div>
        <!-- // single services intro  -->   

    <?php 
    } else { ?>
        <div class="city-spacer"></div>
    <?php } ?>

    <?php if( get_field('full_width_content_city') ): ?>
    <div id="city-content">
        <img src="<?php bloginfo('template_directory'); ?>/img/bg/moving-insurance-bg.webp" alt="" class="img-bg">
        <div class="container">
            <div class="content-block">
                <?php the_field('full_width_content_city'); ?>
            </div>
            <!-- // content  -->
        </div>
        <!-- // ontainer  -->
    </div>
    <!-- // main city content  -->
    <?php endif; ?>

    <?php if( have_rows('content_layout_main_city') ): ?>
    <div id="city-flex-content">

        <?php while( have_rows('content_layout_main_city') ): the_row(); ?>
            <?php if( get_row_layout() == 'full_width_content_layout' ): ?>

                <div class="city-full--content">
                    <div class="container">
                        <?php the_sub_field('full_width__content'); ?>
                    </div>
                </div>
                <!-- // city full content  -->

            <?php elseif( get_row_layout() == 'full_width_image' ): ?>

                <div class="city-full--image">
                    <div class="container">
                        <div class="image-holder">
                            <?php
                            $imageID = get_sub_field('featured_image_full');
                            $image = wp_get_attachment_image_src( $imageID, 'half-image' );
                            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                            ?> 

                            <img class="img-responsive" alt="<?php the_sub_field('alt_image'); ?>" src="<?php echo $image[0]; ?>" /> 
                            <div class="photo-caption">
                                <span><?php the_sub_field('caption'); ?></span>
                            </div>
                            <!-- /.photo-caption -->
                        </div>
                        <!-- // image holder  -->
                    </div>
                </div>
                <!-- // full image  -->

            <?php elseif( get_row_layout() == 'content_left_image_right' ): ?>

                <div class="city-content--wrapper">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-7 col-md-6">
                                <div class="content-block">
                                    <?php the_sub_field('content_block_left'); ?>
                                </div>
                            </div>
                            <!-- // col  -->

                            <div class="col-lg-5 col-md-6">

                                <?php if (get_sub_field('image_type_left') == 'Standard Image') { ?>

                                    <div class="image-holder">
                                        <?php
                                        $imageID = get_sub_field('featured_image_right');
                                        $image = wp_get_attachment_image_src( $imageID, 'half-image' );
                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                        ?> 

                                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                    </div>

                                <?php } elseif (get_sub_field('image_type_left') == 'Transparent Image') { ?>

                                    <div class="image-holder transparent-image">
                                        <?php
                                        $imageID = get_sub_field('featured_image_right');
                                        $image = wp_get_attachment_image_src( $imageID, 'half-image' );
                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                        ?> 

                                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                    </div>

                                <?php } ?>   

                            </div>
                            <!-- // image holder  -->

                        </div>
                        <!-- // row  -->
                    </div>
                    <!-- // container  -->
                </div>
                <!-- // content city  -->


                <?php elseif( get_row_layout() == 'image_right_content_left' ): ?>

                    <div class="city-content--wrapper">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-5 col-md-6">

                                    <?php if (get_sub_field('image_type') == 'Standard Image') { ?>

                                        <div class="image-holder">
                                            <?php
                                            $imageID = get_sub_field('featured_image_right');
                                            $image = wp_get_attachment_image_src( $imageID, 'half-image' );
                                            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                            ?> 

                                            <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                        </div>

                                    <?php } elseif (get_sub_field('image_type') == 'Transparent Image') { ?>

                                        <div class="image-holder transparent-image">
                                            <?php
                                            $imageID = get_sub_field('featured_image_right');
                                            $image = wp_get_attachment_image_src( $imageID, 'half-image' );
                                            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                            ?> 

                                            <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                        </div>

                                    <?php } ?>  

                                </div>
                                <!-- // image holder  -->

                                <div class="col-lg-7 col-md-6">
                                    <div class="content-block">
                                        <?php the_sub_field('content_block_left'); ?>
                                    </div>
                                </div>
                                <!-- // col  -->

                            </div>
                            <!-- // row  -->
                        </div>
                        <!-- // container  -->
                    </div>
                    <!-- // content city  -->

                <?php elseif( get_row_layout() == 'video' ): ?>

                    <div class="city-video">
                        <div class="container">
                            <div class="video-holder">
                                <?php the_sub_field('featured_video'); ?>                                        
                            </div>
                        </div>
                    </div>
                    <!-- // video  -->


                <?php elseif( get_row_layout() == 'accordion' ): ?>		

                    <div class="default-accordion">
                        <div class="container">
                            <h3><?php the_sub_field('accordion_title'); ?></h3>

                            <div class="blog-detailed--accordion">
                                <?php if( have_rows('qa__list') ): ?>
                                    <?php while( have_rows('qa__list') ): the_row(); ?>

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
                            <!-- // content faq  -->
                        </div>
                        <!-- // container  -->
                    </div>
                    <!-- /.default-accordion -->

                    <?php elseif( get_row_layout() == 'cta' ): ?>

                        <div class="container">
                            <div class="quote-cta--single">
                                <span class="title"><?php the_sub_field('cta_title'); ?></span>
                                <a href="<?php the_sub_field('button_link'); ?>" class="btn-cta"><?php the_sub_field('button_label'); ?></a>
                            </div>
                            <!-- // single  --> 
                        </div>
                        <!-- // cta  -->

                    <?php elseif( get_row_layout() == 'services' ): ?>

                        <div id="services-area">
                            <div class="container">
                                <div class="row">

                                    <?php
                                    $post_objects = get_sub_field('services_list');

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
                                                <!-- /.col-md-4 -->

                                        <?php endforeach; ?>
                                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                    <?php endif; ?>

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- // container  -->
                        </div>
                        <!-- /#services-area -->                        

            <?php endif; ?>
        <?php endwhile; ?>

    </div>
    <!-- // flex content  -->
    <?php endif; ?>

    <div id="bottom-cta">
        <img src="<?php bloginfo('template_directory'); ?>/img/bg/cropped-Logo-Menu.webp" alt="" class="img-bg">
        <div class="container">
            <h3><?php the_field('cta_title_bottom', 'options'); ?></h3>
            <div class="cta-btns">

                <a href="<?php the_field('button_1_link_footer', 'options'); ?>" class="btn-cta"><?php the_field('button_1_label_footer', 'options'); ?></a>

                <?php 
                $values = get_field( 'phone_number_main_c_contact' );
                if ( $values ) { ?>
                    <a href="tel:<?php the_field('phone_number_main_c_contact'); ?>" class="btn-cta btn-tel"><?php the_field('button_2_label_footer', 'options'); ?> <?php the_field('phone_number_main_c_contact'); ?></a>
                <?php 
                } else { ?>
                    <a href="tel:<?php the_field('phone_number_footer', 'options'); ?>" class="btn-cta btn-tel"><?php the_field('button_2_label_footer', 'options'); ?> <?php the_field('phone_number_footer', 'options'); ?></a>
                <?php } ?>

            </div>
            <!-- // btns  -->
        </div>
        <!-- // container  -->
    </div>
    <!-- // bottom cta  -->     
    
    <div id="why-us">
        <img src="<?php the_field('featured_image_side_gen', 'options'); ?>" alt="" class="img-side">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-8">
                    <div class="why-content">

                        <header>
                            <h3><?php the_field('block_title_why_gen', 'options'); ?></h3>
                            <?php the_field('intro_text_why_gen' , 'options'); ?>                            
                        </header>
                        <!-- // header  -->

                        <div class="blog-detailed--accordion">
                            <?php if( have_rows('faq_list_why_gen', 'options') ): ?>
                                <?php while( have_rows('faq_list_why_gen', 'options') ): the_row(); ?>

                                    <div class="wrap">
                                        <h4><?php the_sub_field('quesiton'); ?></h4>
                                        <div>
                                            <p><?php the_sub_field('answer'); ?></p>
                                        </div>
                                    </div>
                                    <!-- /.wrap -->

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <!-- /.blog-detailed--accordion -->                           
                    
                    </div>
                </div>
                <!-- // content  -->

            </div>
            <!-- // row  -->
        </div>
        <!-- // container  -->
    </div>
    <!-- // why us  -->

    <div id="trusted">
        <div class="container">
            <header>
                <h2><?php the_field('section_title_trusted_city', 'options'); ?></h2>
            </header>
            <!-- // header  -->
            <div class="trusted-brands">
                <?php if( have_rows('trusted_list_gen_why', 'options') ): ?>
                    <?php while( have_rows('trusted_list_gen_why', 'options') ): the_row(); ?>

                        <div class="trusted-card">
                            <a href="<?php the_sub_field('website_url'); ?>" target="_blank"><img src="<?php the_sub_field('logo'); ?>" alt=""></a>
                        </div>
                        <!-- // card  -->

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!-- // brands  -->
        </div>
        <!-- // container  -->
    </div>
    <!-- // trusted  -->

    <div id="reviews">
        <div class="container">
            <header>
                <h2><?php the_field('section_title_reviews_general', 'options'); ?></h2>
            </header>
            <!-- // header  -->
            <div id="reviews-slider">
                <?php
                    $post_objects = get_field('reviews_list_gen_why', 'options');

                    if( $post_objects ): ?>
                        <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                            <?php setup_postdata($post); ?>

                            <div class="item">
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
                            <!-- // review slide  -->

                        <?php endforeach; ?>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>
            </div>
            <!-- // slider  -->
            <footer>
                <a href="<?php the_field('button_link_why_gen'); ?>" class="btn-cta"><?php the_field('button_label_gen_why', 'options'); ?></a>
            </footer>
        </div>
        <!-- // container  -->
    </div>
    <!-- // reviews  -->    

    <div id="cities-map">
        <img src="<?php the_field('background_image_areas_gen', 'options'); ?>" alt="" class="img-bg">
        <div class="container">
            <header>
                <h2><?php the_field('section_title_areas_general', 'options'); ?></h2>
            </header>
            <!-- // header  -->
            <div class="cities-list">
                <ul>
                <?php
                $loop = new WP_Query( array( 'post_type' => 'cities', 'orderby' => 'title', 'order'   => 'ASC',  'posts_per_page' => -1) ); ?>  
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>      
                </ul>
            </div>
            <!-- // cities list  -->
        </div>
    </div>
    <!-- // map cities  -->
    

<?php
get_footer(); ?>
<script src="<?php bloginfo('template_directory'); ?>/js/slick.js"></script>

<script>
    jQuery('#reviews-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
    responsive: [
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        },
    ]
    
});
</script>