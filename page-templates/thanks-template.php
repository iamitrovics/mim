<?php
/**
 * Template Name: Thank You Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<div id="thanks-wrapper">
        <div class="container">
            <div class="thanks-content">
                <h1><?php the_field('block_title_tnx'); ?></h1>
                <?php the_field('content_block_tnx'); ?>
                <a href="<?php the_field('button_link_back_tnx'); ?>" class="btn-back"><?php the_field('button_label_back_tnx'); ?></a>
            </div>
            <!-- // content  -->
        </div>
        <!-- // container  -->
        <img src="<?php the_field('background_image_tnx'); ?>" alt="" class="bg-image">
    </div>
    <!-- // thanks wrapper  -->

<?php get_footer(); ?>
