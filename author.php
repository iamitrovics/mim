<?php
/**
 * Home Blog template
 *
 * Post Listing
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MO_Starter_Theme
 */

get_header();
?>

    <header id="blog-header">
        <img src="<?php the_field('background_image_blog_page', get_option('page_for_posts')); ?>" alt="" class="bg-image">
		<div class="overlay">
			<div class="container">
				<div class="hero-caption">
					<h1>Author</h1>
					<h2><?php the_author(); ?></h2>
                    <div class="author-desc">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
                        <div class="author-content">
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
                            <p><?php the_author_description(); ?></p>
                        </div>
                        <!-- /.author-content -->
                    </div>                    
				</div>
				<!-- // caption  -->
			</div>
			<!-- // container  -->
		</div>
		<!-- // overlay  -->
    </header>
    <!-- // blog haeder  -->

    <div id="blog-listing">
        <div class="container">
            <div class="row">

                <?php while ( have_posts() ) : the_post(); ?>
                                        
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
                                    <a href="<?php echo get_permalink(); ?>" class="btn-more"><span>Read More</span></a>
                                </div>
                            </div>
                        </div>
                        <!-- // blog article  -->                                    
                    
                   <?php endwhile; // end of the loop. ?>                

            </div>
            <!-- // row  -->

            <nav class="pagination-block">
                <?php if( function_exists('wp_pagenavi') ) wp_pagenavi(); // WP-PageNavi function ?>
            </nav>     
                           
        </div>
        <!-- // container  -->
    </div>
    <!-- // blog listing  -->

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
get_footer();
?>

<script src="<?php bloginfo('template_directory'); ?>/js/slick.js"></script>

<script>
    jQuery('#categories-slider').slick({
    slidesToShow: 5,
    slidesToScroll: 5,
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