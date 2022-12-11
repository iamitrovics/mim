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

    <header id="single-blog">
		<img src="<?php the_field('background_image_blog_page', get_option('page_for_posts')); ?>" alt="" class="bg-image">
		<div class="overlay">
			<div class="container">
				<div class="hero-caption">
					<h1><?php the_title(); ?></h1>
                    <div class="blog-metas">
                        
                        <span class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
                        <span class="date"><?php echo get_the_date( 'F j, Y' ); ?></span>
                    </div>
                    <!-- // metas  -->
				</div>
				<!-- // caption  -->
			</div>
			<!-- // container  -->
		</div>
		<!-- // overlay  -->
    </header>
    <!-- // header blog single  -->

    <section id="single-content">
        <div class="container">

            <!-- <div class="featured-image">

                <?php 
                $image = get_field('featured_image_blog');
                $size = 'half-image'; // (thumbnail, medium, large, full or custom size)
                if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                }   
                ?>  
                               
            </div> -->
            <!-- // featured  -->

            <div class="blog-headline">
                <div class="blog-meta">
                    <span>
                        Posted <?php echo get_the_date( 'F j, Y' ); ?> In 
                    <?php
                    $categories = get_the_category();
                    $separator = ' ';
                    $output = '';
                    if ( ! empty( $categories ) ) {
                    foreach( $categories as $category ) {
                        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . ',</a>' . $separator;
                    }
                    echo trim( $output, $separator );
                    }
                    ?>
                    </span>
                    <div class="author-desc">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
                        <div class="author-content">
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
                            <p><?php the_author_description(); ?></p>
                        </div>
                        <!-- /.author-content -->
                    </div> 
                </div>
                <!-- /.blog-meta -->
            </div>
            <!-- /.blog-headline -->            

            <div class="blog-content">

                <?php if( have_rows('content_layout_blog') ): ?>
                    <?php while( have_rows('content_layout_blog') ): the_row(); ?>
                        <?php if( get_row_layout() == 'full_width_content' ): ?>
                        <div class="full-content">
                            <?php the_sub_field('content_block'); ?>    
                        </div> <!-- full-content -->                           
                            
                        <?php elseif( get_row_layout() == 'intro_text' ): ?>

                            <div class="blog-intro">
                                <?php the_sub_field('intro_content'); ?>
                            </div>
                            <!-- // intro  -->

                        <?php elseif( get_row_layout() == 'full_width_image' ): ?>

                            <div class="featured-photo">
                                <?php
                                $imageID = get_sub_field('featured_image');
                                $image = wp_get_attachment_image_src( $imageID, 'half-image' );
                                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                ?> 

                                <img class="img-responsive" alt="<?php the_sub_field('image_alt_text'); ?>" src="<?php echo $image[0]; ?>" /> 
                                <div class="photo-caption">
                                    <span><?php the_sub_field('image_caption'); ?></span>
                                </div>
                                <!-- /.photo-caption -->
                            </div>
                            <!-- /.featured-photo -->    

                        <?php elseif( get_row_layout() == 'video' ): ?>

                            <div class="blog-video">
                                <?php the_sub_field('video_code'); ?>                                        
                            </div>

                        <?php elseif( get_row_layout() == 'accordion' ): ?>		

                            <div class="default-accordion">
                                <h3><?php the_sub_field('accordion_title'); ?></h3>

                                <div class="blog-detailed--accordion">
                                    <?php if( have_rows('accordion_list') ): ?>
                                        <?php while( have_rows('accordion_list') ): the_row(); ?>

                                            <div class="wrap">
                                                <h4><?php the_sub_field('heading'); ?></h4>
                                                <div>
                                                    <?php the_sub_field('content'); ?>
                                                </div>
                                            </div>
                                            <!-- /.wrap -->           

                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                                <!-- // content faq  -->
                            </div>
                            <!-- /.default-accordion -->
                        
                        <?php elseif( get_row_layout() == 'quote_cta' ): ?>

                        <div class="quote-cta--single">
                            <span class="title"><?php the_sub_field('cta_title'); ?></span>
                            <a href="#single-form" class="btn-cta"><?php the_sub_field('button_label'); ?></a>
                        </div>
                        <!-- // single  --> 
                        
                        <?php elseif( get_row_layout() == 'featured_article' ): ?>    
                            <?php
                                $post_objects = get_sub_field('featured_article_list');

                                if( $post_objects ): ?>
                                    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                        <?php setup_postdata($post); ?>
                                            
                                        <div class="featured-article">
                                            <div class="blog-item">
                                                <div class="blog-photo">
                                                    <a href="<?php echo get_permalink(); ?>" target="_blank">
                                                        <?php 
                                                        $values = get_field( 'featured_image_blog' );
                                                        if ( $values ) { ?>
                                                            <?php
                                                            $imageID = get_field('featured_image_blog');
                                                            $image = wp_get_attachment_image_src( $imageID, 'blogthumb-image' );
                                                            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                            ?> 

                                                            <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" />                                                     
                                                        <?php 
                                                        } else { ?>
                                                            <img src="<?php bloginfo('template_directory'); ?>/img/misc/placeholder.jpg" alt="">
                                                        <?php } ?>
                                                    </a>
                                                </div>
                                                <!-- /.blog-photo-->
                                                <div class="blog-content">
                                                    <h3><a href="<?php echo get_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h3>
                                                    <a href="<?php echo get_permalink(); ?>" class="read-more" target="_blank">Read More</a>
                                                </div>
                                                <!-- /.blog-content -->
                                            </div>   
                                        </div>
                                        <!-- /.featured-article -->
                                            
                                    <?php endforeach; ?>
                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                            <?php endif; ?>
                            <?php wp_reset_postdata(); ?>

                        <?php elseif( get_row_layout() == 'services_module' ): ?>

                            <div id="services-area">
                                <div class="row">

                                    <?php
                                    $post_objects = get_sub_field('services_list_blog_page');

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
                            <!-- /#services-area -->

                        <?php elseif( get_row_layout() == 'table' ): ?>

                            <table style="width:100%" class="single-table">
                                <thead>
                                    <tr role="row">
                                    <?php
                                        // check if the repeater field has rows of data
                                        if(have_rows('table_head_cells')):
                                            // loop through the rows of data
                                            while(have_rows('table_head_cells')) : the_row();
                                                $hlabel = get_sub_field('table_cell_label_thead');
                                                ?>  
                                                <th tabindex="0" rowspan="1" colspan="1"><?php echo $hlabel; ?></th>
                                            <?php endwhile;
                                        else :
                                            echo 'No data';
                                        endif;
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php while ( have_posts() ) : the_post(); ?>
                                    <?php 
                                    // check for rows (parent repeater)
                                    if( have_rows('table_body_row') ): ?>
                                        <?php 
                                        // loop through rows (parent repeater)
                                        while( have_rows('table_body_row') ): the_row(); ?>
                                                <?php 
                                                // check for rows (sub repeater)
                                                if( have_rows('table_body_cells') ): ?>
                                                    <tr>
                                                        <?php 
                                                        // loop through rows (sub repeater)
                                                        while( have_rows('table_body_cells') ): the_row();
                                                            ?>
                                                            <td><?php the_sub_field('table_cell_label_tbody'); ?></td>
                                                        <?php endwhile; ?>
                                                    </tr>
                                                <?php endif; //if( get_sub_field('') ): ?>
                                        <?php endwhile; // while( has_sub_field('') ): ?>
                                    <?php endif; // if( get_field('') ): ?>
                                    <?php endwhile; // end of the loop. ?>
                                </tbody>
                            </table>  

                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>          
                
                <div id="single-form">
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
                <!-- // form  -->                

            </div>
            <!-- /.blog-content -->   

        </div>
        <!-- // container -->
    </section>
    <!-- // single content  -->

    <div class="related-articles">
        <div class="container">
            <header>
                <h3>Recent Posts</h3>
            </header>
            <!-- // header  -->
            <div class="related-list">

                <div class="row">

                    <?php
                        $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; // get current page number
                        $args = array(
                            'posts_per_page' => 4, // the value from Settings > Reading by default
                            'paged'          => $current_page // current page
                        );
                        query_posts( $args );
                        
                        $wp_query->is_archive = true;
                        $wp_query->is_home = false;
                        
                        while(have_posts()): the_post(); ?>
                                            
                            <div class="col-lg-3 col-md-4">
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
                                
                        <?php endwhile; ?>         

                </div>
                <!-- // row  -->
            
            </div>
            <!-- // list  -->
        </div>
        <!-- // container  -->
    </div>
    <!-- // related  -->

    <div class="related-articles related-white">
        <div class="container">
            <header>
                <h3>Related Posts</h3>
            </header>
            <!-- // header  -->
            <div class="related-list">

                <div class="row">

                    <?php
                        $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; // get current page number
                        $args = array(
                            'posts_per_page' => 4, // the value from Settings > Reading by default
                            'paged'          => $current_page,
                            'category__in' => wp_get_post_categories($post->ID), 
                            'post__not_in' => array( $post->ID ),
                        );
                        query_posts( $args );
                        
                        $wp_query->is_archive = true;
                        $wp_query->is_home = false;
                        
                        while(have_posts()): the_post(); ?>
                                            
                            <div class="col-lg-3 col-md-4">
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
                                
                        <?php endwhile; ?>         

                </div>
                <!-- // row  -->
            
            </div>
            <!-- // list  -->
        </div>
        <!-- // container  -->
    </div>
    <!-- // related  -->    

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
