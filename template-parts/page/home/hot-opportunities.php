<?php if (shortcode_exists("hot_opportunities")) : ?>
    <section class="fullwidth margin-top-0 offer-section why-choose-us py-24">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 mx-auto text-center">
                    <div class="section-title pb-10">
                        <h4>Hot Opportunities</h4>
                    </div>
                </div>
            </div>
            <div>
                <?php echo do_shortcode("[hot_opportunities]"); ?>
            </div>
        </div>
    </section>
<?php  endif; ?>