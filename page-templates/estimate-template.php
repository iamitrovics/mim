<?php
/**
 * Template Name: Free Estimate Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<div id="estimate-wrapper">

        <img src="<?php the_field('background_image_freer'); ?>" alt="" class="bg-img">

        <div class="container">

            <header>
                <h1><?php the_field('hero_title_free'); ?></h1>
                <?php the_field('intro_text_free'); ?>
            </header>
            <!-- // header  -->

            <div class="form-wrapper booking-div">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="auto-tab" data-toggle="tab" href="#auto" role="tab" aria-controls="auto" aria-selected="false">Auto</a>
                    </li>
                </ul>
                <!-- /.nav-tabs -->

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <?php echo do_shortcode('[contact-form-7 id="260" title="Home Single Quote"]'); ?>

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane fade" id="auto" role="tabpanel" aria-labelledby="auto-tab">
                        
                        <?php echo do_shortcode('[contact-form-7 id="261" title="Car Single Quote"]'); ?>

                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->

            </div>
            <!-- // wrapper  -->

        </div>
        <!-- // container  -->
    </div>
    <!-- // estimate wrapper  -->

    <?php if( get_field('section_title_free_services') ): ?>
    <div id="bottom-services">
        <div class="container">
            <header>
                <h2><?php the_field('section_title_free_services'); ?></h2>
            </header>
            <!-- // header  -->
            <div id="services-slider">
                <?php
                $post_objects = get_field('services_list_bottom');

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
    <?php endif; ?>

    <?php if( get_field('content_blocks_free') ): ?>
    <div class="extra-content">
		<div class="container">

			<?php if( have_rows('content_blocks_free') ): ?>
				<?php while( have_rows('content_blocks_free') ): the_row(); ?>

					<div class="content-wrapper">
						<div class="image-holder">
							<?php
							$imageID = get_sub_field('featured_image');
							$image = wp_get_attachment_image_src( $imageID, 'half-image' );
							$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
							?> 

							<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 							
						</div>
						<!-- // image  -->
						<div class="text-content">
							<h3><?php the_sub_field('block_title'); ?></h3>
							<?php the_sub_field('content_block'); ?>
						</div>
					</div>
					<!-- // wrapper  -->

				<?php endwhile; ?>
			<?php endif; ?>

		</div>
		<!-- // container  -->
	</div>
	<!-- // about main  -->
    <?php endif; ?>

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