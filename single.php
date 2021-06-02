<?php get_header();  ?>


    <!-- Content
    ================================================== -->
<?php get_template_part("template-parts/page/general/banner"); ?>

    <!-- Container / Start -->
    <div class="container margin-top-55 margin-bottom-55">

        <div class="row">

            <!-- Contact Details -->
            <!-- Contact Form -->
            <div class="col-md-12">
                <?php
                // Start the Loop.
                while ( have_posts() ) :
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