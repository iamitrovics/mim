<?php get_header(); ?>

    <div  id="home-banner">
        <div class="container">
            <div class="hero-caption">
                <h1><?php the_field('hero_title_home'); ?></h1>
                <?php the_field('hero_text'); ?>
            </div>
            <!-- // caption  -->
            <img width="1200" src="<?php the_field('background_image_hero'); ?>" alt="" class="hero-image">
        </div>
        <!-- // container  -->
    </div>
    <!-- // subscriptions  -->    

    <?php include(TEMPLATEPATH . '/inc/booking-div.php'); ?>

    <div id="home-services">
        <div class="container">
            <header>
                <div class="row">
                    <div class="col-lg-12">
                        <h2><?php the_field('section_title_home_services'); ?></h2>
                        <?php the_field('intro_text_services_home'); ?>
                    </div>
                </div>
            </header>
            <!-- // header  -->
            <div class="row">   

            <?php
                $post_objects = get_field('services_list_home');

                if( $post_objects ): ?>
                    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>


                        <div class="col-lg-4 col-md-6">
                            <div class="service-card">
                                <a href="<?php echo get_permalink(); ?>">
                                    <div class="service-icon">
                                        <img src="<?php the_field('icon_service'); ?>" alt="">
                                    </div>
                                    <!-- // icon  -->
                                    <div class="service-desc">
                                        <h3><?php the_title(); ?></h3>
                                        <?php the_field('intro_text_service'); ?>
                                        <small class="btn-more"><span>Read More</span></small>
                                    </div>
                                    <!-- // desc  -->
                                </a>
                            </div>
                        </div>
                        <!-- // card  -->

                        <?php endforeach; ?>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>

            </div>
            <!-- // row  -->
            <footer>
                <a href="<?php the_field('button_link_serices_cta'); ?>" class="btn-cta"><?php the_field('button_label_services_cta'); ?></a>
            </footer>
        </div>
        <!-- // container  -->
    </div>
    <!-- // services  -->

    <div id="about-us">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-7">
                    <div class="about-content">
                        <h2><?php the_field('section_title_about'); ?></h2>
                        <?php the_field('content_block_about'); ?>
                        <a href="<?php the_field('button_link_about_home'); ?>" class="btn-more"><?php the_field('button_label_about_home'); ?></a>
                    </div>
                </div>
                <!-- // content  -->

            </div>
            <!-- // row  -->

            <img src="<?php the_field('featured_image_home_about'); ?>" alt="" class="side-img">

            <div id="cta-wrapper">
                <h2><?php the_field('cta_title_middle'); ?></h2>
                <a href="<?php the_field('button_link_middle_cta'); ?>" class="btn-cta"><?php the_field('button_label_cta_middle'); ?></a>
            </div>            

        </div>
        <!-- // container  -->
    </div>
    <!-- // about us  -->

    <div id="why-us">
        <img src="<?php the_field('background_image_why_home'); ?>" alt="" class="img-side">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-8">
                    <div class="why-content">

                        <header>
                            <h3><?php the_field('section_subtitle_home_why'); ?></h3>
                            <?php the_field('intro_text_why'); ?>                            
                        </header>
                        <!-- // header  -->

                        <div class="blog-detailed--accordion">
                            <?php if( have_rows('why_list_home') ): ?>
                                <?php while( have_rows('why_list_home') ): the_row(); ?>

                                    <div class="wrap">
                                        <h4><?php the_sub_field('title'); ?></h4>
                                        <div>
                                            <p><?php the_sub_field('description'); ?></p>
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
                <h2><?php the_field('section_title_trusted'); ?></h2>
            </header>
            <!-- // header  -->
            <div class="trusted-brands">
                <?php if( have_rows('trusted_list') ): ?>
                    <?php while( have_rows('trusted_list') ): the_row(); ?>

                        <div class="trusted-card">
                            <a href="<?php the_sub_field('website_url'); ?>" aria-label="<?php the_sub_field('title_aria'); ?> " target="_blank"><img src="<?php the_sub_field('logo'); ?>" alt=""></a>
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
                <h2><?php the_field('section_title_reviews_home'); ?></h2>
            </header>
            <!-- // header  -->
            <div id="reviews-slider">
                <?php
                    $post_objects = get_field('reviews_list_home');

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
                <a href="<?php the_field('button_link_reviews'); ?>" class="btn-cta"><?php the_field('button_label_reviews'); ?></a>
            </footer>
        </div>
        <!-- // container  -->
    </div>
    <!-- // reviews  -->

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
    
    <div id="latest-news">
        <div class="container">
            <header>
                <h2><?php the_field('section_title_blog'); ?></h2>
            </header>
            <!-- // header  -->
            <div class="row">

                <?php
                    $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; // get current page number
                    $args = array(
                        'posts_per_page' => 3, // the value from Settings > Reading by default
                        'paged'          => $current_page // current page
                    );
                    query_posts( $args );
                    
                    $wp_query->is_archive = true;
                    $wp_query->is_home = false;
                    
                    while(have_posts()): the_post(); ?>
                                        
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-card">
                                <div class="blog-photo">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <?php
                                        $imageID = get_field('featured_image_blog');
                                        $image = wp_get_attachment_image_src( $imageID, 'thumbnail' );
                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                        ?> 

                                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />                                     
                                    </a>
                                </div>
                                <!-- // photo  -->
                                <div class="blog-desc">
                                    <span class="date"><?php echo get_the_date( 'F j, Y' ); ?></span>
                                    <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                                </div>
                            </div>
                        </div>
                        <!-- // blog article  -->                                        
                            
                    <?php endwhile; ?>           
                    
                    <?php wp_reset_query(); ?>

            </div>
            <!-- // row  -->
            <footer>
                <a href="<?php the_field('button_link_blog_home'); ?>" class="btn-cta"><?php the_field('button_label_blog_home'); ?></a>
            </footer>
        </div>
        <!-- // container  -->
    </div>
    <!-- // latest news  -->

    <div id="cities-map">
        <img src="<?php the_field('background_image_maps'); ?>" alt="" class="img-bg">
        <div class="container">
            <header>
                <h2><?php the_field('section_title_areas'); ?></h2>
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

<?php get_footer(''); ?>

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