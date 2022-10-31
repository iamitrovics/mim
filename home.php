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
					<h1><?php the_field('hero_title_blog_page', get_option('page_for_posts')); ?></h1>
					<h2><?php the_field('intro_text_blog', get_option('page_for_posts')); ?></h2>
				</div>
				<!-- // caption  -->
                <div id="categories-slider" class="row">
                    <?php if( have_rows('categories_list_blog', get_option('page_for_posts')) ): ?>
                        <?php while( have_rows('categories_list_blog', get_option('page_for_posts')) ): the_row(); ?>

                            <div class="item col-lg-3 col-md-3">
                                <div class="cat-card">
                                    <a href="<?php the_sub_field('link_to_category'); ?>">
                                        <div class="card-icon">
                                            <img src="<?php the_sub_field('icon'); ?>" alt="">
                                        </div>
                                        <!-- // icon  -->
                                        <div class="card-desc">
                                            <h3><?php the_sub_field('label'); ?></h3>
                                        </div>
                                        <!-- // desc  -->
                                    </a>
                                </div>
                            </div>
                            <!-- // cat  -->

                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <!-- // slider  -->
			</div>
			<!-- // container  -->
		</div>
		<!-- // overlay  -->
    </header>
    <!-- // blog haeder  -->

    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    // are we on page one?
    if(1 == $paged) { ?>
    
    <div id="featured-article">
        <div class="container">
            <div class="featured-wrapper">

                <?php
                    $post_objects = get_field('featured_articles_blog', get_option('page_for_posts'));

                    if( $post_objects ): ?>
                        <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                            <?php setup_postdata($post); ?>

                            <div class="blog-article">
                                <div class="image-holder">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <?php
                                        $imageID = get_field('featured_image_blog');
                                        $image = wp_get_attachment_image_src( $imageID, 'largeheader-image' );
                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                        ?> 

                                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />                                     
                                    </a>
                                </div>
                                <div class="content-block">
                                    <span class="date"><?php echo get_the_date( 'F j, Y' ); ?></span>
                                    <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <?php the_field('excerpt_text'); ?>
                                    <div class="blog-footer">
                                        <div class="post-author">
                                            <span class="author-name">
                                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                                            <?php global $post; ?>
                                            <?php $author_id = $post->post_author; ?>
                                            <?php echo get_the_author_meta( 'display_name', $author_id ); ?>
                                            </a>
                                            </span>
                                        </div>
                                        <!-- /.post-author -->
                                        <a href="<?php echo get_permalink(); ?>" class="btn-more"><span>Read more</span></a>
                                        <!-- /.readmore -->
                                    </div>
                                    <!-- /.blog-footer -->                                    
                                </div>
                            </div>
                            <!-- // card  -->

                        <?php endforeach; ?>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>
            
            </div>
            <!-- // wrapper  -->
        </div>
    </div>
    <!-- // featured artilce  -->

    <?php }
    ?>  

    <div id="blog-listing">
        <div class="container">
            <div class="row">

                <?php
                    $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; // get current page number
                    $args = array(
                        'posts_per_page' => 9, // the value from Settings > Reading by default
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
                                        $image = get_field('featured_image_blog');
                                        $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
                                        if( $image ) {
                                            echo wp_get_attachment_image( $image, $size );
                                        }   
                                        ?>                                          
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
                    
                    <?php endwhile; ?>                

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

