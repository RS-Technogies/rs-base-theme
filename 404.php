<?php get_header(); ?>
    <!-- Container / Start -->
    <div class="container my-16">
        <div class="py-40">
            <div class="flex flex-wrap justify-between items-center">
                <div>
                    <h4 class="text-bold ">OOPS! PAGE NOT FOUND</h4>
                    <h5>...but we’ve got more than 500 listings for you to search through.</h5>
                </div>
                <div class="">
                    <a href="/search_properties" class="back-btn underline text-black text-2xl"><i
                                class="fas fa-angle-double-left"></i> Take me back to home page</a>
                </div>
            </div>
        </div>
        <!-- Container / End -->
    </div>
    <div>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/404Default.png" class="img-responsive"/>
    </div>
<?php get_footer(); ?>