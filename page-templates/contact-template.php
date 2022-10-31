<?php
/**
 * Template Name: Contact Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<div id="contact-header">
        <img src="<?php the_field('background_image_contact_page'); ?>" alt="" class="img-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-9">
                    <div class="contact-caption">
                        <span class="title"><?php the_field('small_title_contact_header'); ?></span>
                        <h1><?php the_field('block_title_contact_header'); ?></h1>
                    </div>
                    <div class="contact-info">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="contact-card">
                                    <span class="label"><?php the_field('phone_label_contact'); ?></span>
                                    <span class="value"><a href="tel:<?php the_field('phone_number_contact'); ?>"><?php the_field('phone_number_contact'); ?></a></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="contact-card">
                                    <span class="label"><?php the_field('email_label_contact'); ?></span>
                                    <span class="value"><a href="mailto:<?php the_field('email_address_contact'); ?>"><?php the_field('email_address_contact'); ?></a></span>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="contact-card">
                                    <span class="label"><?php the_field('socials_label_contact'); ?></span>
                                    <ul>
                                        <?php if( have_rows('social_networks', 'options') ): ?>
                                            <?php while( have_rows('social_networks', 'options') ): the_row(); ?>

                                                <li><a href="<?php the_sub_field('link_to_network'); ?>" target="_blank"><img src="<?php the_sub_field('icon'); ?>" alt=""></a></li>

                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>                            

                        </div>
                    </div>
                    <!-- // info  -->
                </div>
                <!-- // contact caption  -->

            </div>
            <!-- // row  -->
        </div>
    </div>
    <!-- // contact header  -->

    <div id="contact-form">
        <div class="container">
            <div class="row">

                <div class="col-xl-5 col-lg-6">
                    <div class="contact-intro">
                        <h2><?php the_field('form_title_left'); ?></h2>
                    </div>
                </div>
                <!-- // intro  -->

                <div class="col-xl-6 offset-xl-1 col-lg-6">
                    <div class="form-wrapper">
                        <small><?php the_field('form_description'); ?></small>
                        <?php the_field('form_code_contact'); ?>
                    </div>
                </div>
                <!-- // form wrapper  -->

            </div>
            <!-- // row  -->
        </div>
    </div>
    <!-- // contact form  -->

    <div class="parallax-window" id="paralax-banner" data-parallax="scroll" data-image-src="<?php the_field('paralax_background'); ?>">
        <div class="overlay"></div>
    </div>
    <!-- // subscriptions  -->      
    
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

    <script src="<?php bloginfo('template_directory'); ?>/js/parallax.min.js"></script>