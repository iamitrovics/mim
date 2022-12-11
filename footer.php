<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MO_Starter_Theme
 */

?>
  
    <div id="page-footer">
        <div class="container container-footer">
            <div class="row">

                <div class="col-lg-3 col-lg-3 col-md-12">
                    <div class="footer-brand">
                        <img src="<?php the_field('website_logo_footer', 'options'); ?>" alt="">
                    </div>
                    <div class="footer-certs">
                        <?php if( have_rows('certifications_footer', 'options') ): ?>
                            <?php while( have_rows('certifications_footer', 'options') ): the_row(); ?>

                                <div class="cert">
                                    <a href="<?php the_sub_field('link_to_page'); ?>" target="_blank"><img src="<?php the_sub_field('logo'); ?>" alt=""></a>
                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>                      
                    </div>
                    <!-- // certs  -->
                    <div class="socials">
                        <ul>
                            <?php if( have_rows('social_networks', 'options') ): ?>
                                <?php while( have_rows('social_networks', 'options') ): the_row(); ?>

                                    <li><a href="<?php the_sub_field('link_to_network'); ?>" target="_blank"><img src="<?php the_sub_field('icon'); ?>" alt=""></a></li>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>                          
                    </div>
                </div>
                <!-- // footer brand  -->
                
                <div class="col-xl-8 offset-xl-1 col-lg-9 col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="footer-nav">
                                <span class="title"><?php the_field('block_1_title', 'options'); ?></span>
                                <?php wp_nav_menu( array( 'theme_location' => 'footer1_menu' ) ); ?>
                            </div>
                        </div>
                        <!-- // nav  -->

                        <div class="col-md-4">
                            <div class="footer-nav">
                                <span class="title"><?php the_field('block_3_title', 'options'); ?></span>
                                <?php wp_nav_menu( array( 'theme_location' => 'footer3_menu' ) ); ?>
                            </div>
                        </div>
                        <!-- // nav  -->                             

                        <div class="col-md-4">
                            <div class="footer-nav">
                                <span class="title"><?php the_field('block_2_title', 'options'); ?></span>
                                <?php wp_nav_menu( array( 'theme_location' => 'footer2_menu' ) ); ?>
                            </div>
                        </div>
                        <!-- // nav  -->
                                                 
                    </div>
                </div>

            </div>
            <!-- // row  -->
            <img src="<?php the_field('footer_background_footer', 'options'); ?>" alt="" class="img-bottom">
        </div>
        <!-- // container  -->
        <div class="container">
            <div class="copy-bar">
                <div class="row">

                    <div class="col-lg-8 col-md-7">
                        <div class="copy-notice">
                            <small><?php the_field('license_footer', 'options'); ?></small>
                        </div>
                    </div>
                    <!-- // notice  -->
                    
                    <div class="col-lg-4 col-md-5">
                        <div class="copy-dev">
                            <?php the_field('developed_by_text', 'options'); ?>
                        </div>
                    </div>
                    <!-- // copy dev  -->

                </div>
            </div>
            <!-- // copy bar  -->            
        </div>
    </div>
    <!-- // page footer  -->

    <div id="float-cta">
        <a href="tel:<?php the_field('phone_number_float', 'options'); ?>">
            <img src="<?php the_field('icon_float', 'options'); ?>" alt="">
            <span><?php the_field('small_title_float', 'options'); ?></span>
            <small><?php the_field('phone_number_float', 'options'); ?></small>
        </a>
    </div>
    <!-- // float cta  -->

	<div id="cookie-notice">
		<div id="cookie-notice-in">
			<div class="notice-text">
				<?php the_field('privacy_text_popup', 'options'); ?>
			</div>
			<!-- /.notice-text -->
			<div class="notice-btns">
				<button id="accept-cookie"><?php the_field('button_1_label_popup', 'options'); ?></button>
				<a href="<?php the_field('button_2_link_popup', 'options'); ?>" target="_blank" id="more-info-cookie"><?php the_field('button_2_label_popup', 'options'); ?></a>
			</div>
			<!-- /.notice-btns -->
			<button id="close-notice"></button>
		</div>
		<!-- /#cookie-notice-in -->
	</div>
	<!-- /#cookie-notice -->    

    <div class="modal-overlay disclaimer-modal" data-my-element="tooltip-modal" id="tooltip-modal">
		<div class="modal" data-my-element="tooltip-modal">
			<button class="close-modal">
				<img src="<?php bloginfo('template_directory'); ?>/img/ico/close-x.svg" alt="">
            </button>
			<!-- close modal -->
			<div class="disclaimer-modal-wrap">
				<?php the_field('content_block_modal', 'options'); ?>        
			</div>
			<!-- /.disclaimer-modal-wrap -->
		</div>
		<!-- modal -->
	</div>

<?php wp_footer(); ?>

  <script>
    if (!sessionStorage.alreadyClicked) {
        jQuery('#cookie-notice').addClass('slide-up');
        sessionStorage.alreadyClicked = 1;
    }
  </script> 	

	<?php if( get_field('footer_code_snippet', 'options') ): ?>
		<?php the_field('footer_code_snippet', 'options'); ?>
	<?php endif; ?>

</body>
</html>
