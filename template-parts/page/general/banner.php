<?php
$post_id=get_option('page_on_front');
if(has_post_thumbnail(get_the_ID())){
    $post_id=get_the_ID();
}
$banner_image=has_post_thumbnail($post_id)?get_the_post_thumbnail_url($post_id):"https://www.hashtagportal.com.au/wp-content/uploads/1/2020/07/houses-scaled.jpg";
?>
<div class="parallax" data-background="<?php echo $banner_image; ?>" data-color="#36383e" data-color-opacity="0.45" data-img-width="2500" data-img-height="1600">
    <div class="parallax-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-white text-3xl"><?php  the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>