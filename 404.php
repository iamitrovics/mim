<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package MO_Starter_Theme
 */

get_header();
?>

    <div id="ermac-wrapper">
        <div class="container">
            <div class="ermac-title">
                <span><?php the_field('big_label_ermac', 'options'); ?></span>
            </div>
            <!-- // title  -->
            <div class="ermac-content">
                <span><?php the_field('small_title_ermac', 'options'); ?></span>
                <?php the_field('content_block_ermac', 'options'); ?>
                <a href="<?php the_field('button_link_ermac', 'options'); ?>" class="btn-cta"><?php the_field('button_label_ermac', 'options'); ?></a>
            </div>
            <!-- // content  -->
        </div>
        <!-- // container  -->
        <img src="<?php the_field('featured_image_ermac', 'options'); ?>" alt="" class="img-side">
    </div>
    <!-- // ermac wrapper  -->

<?php
get_footer();
?>