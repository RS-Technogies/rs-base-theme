<?php
/**
 * Template Name: Page Content
 *
 * @package WordPress
 * @subpackage NDIS
 * @since  NDIS 1.0
 */

get_header();
?>

    <!-- Container / Start -->
    <div class="container my-16">

        <div class="row">

            <!-- Contact Details -->
            <!-- Contact Form -->
            <div class="col-md-12">
                <?php
                // Start the Loop.
                while (have_posts()) :
                    the_post();

                    the_content();

                endwhile; // End the loop.
                ?>


            </div>
            <!-- Contact Form / End -->

        </div>

    </div>
    <!-- Container / End -->


<?php get_footer(); ?>