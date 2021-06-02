<?php get_header();  ?>

<!-- Container / Start -->
<div class="container my-8">

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