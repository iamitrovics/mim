<?php
/**
 * Template Name: Tracking Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<div id="estimate-wrapper">
        <img src="<?php the_field('background_image_trac'); ?>" alt="" class="bg-img">
        <div class="container">
            <header>
                <h1><?php the_field('hero_title_tracking'); ?></h1>
                <?php the_field('intro_text_tracking_hero'); ?>
            </header>
            <!-- // header  -->

            <div class="form-wrapper booking-div">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?php the_field('form_code_track'); ?>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- // wrapper  -->

        </div>
        <!-- // container  -->
    </div>
    <!-- // estimate wrapper  -->

    <div id="bottom-services">
        <div class="container">
            <header>
                <h2><?php the_field('section_title_track_services'); ?></h2>
            </header>
            <!-- // header  -->
            <div id="services-slider">
                <?php
                $post_objects = get_field('services_list_track_serv');

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