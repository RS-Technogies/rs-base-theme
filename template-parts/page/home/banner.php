<?php
    $front_page_id=get_option('page_on_front');
    $banner_image=has_post_thumbnail($front_page_id)?get_the_post_thumbnail_url($front_page_id):"https://www.hashtagportal.com.au/wp-content/uploads/1/2020/07/houses-scaled.jpg";
    $content=isset($args['content'])?$args['content']:"";
?>
<div class="parallax" data-background="<?php echo $banner_image;?>"
     data-color="#36383e" data-color-opacity="0.45" data-img-width="2500" data-img-height="1600">
    <div class="parallax-content">
        <?php echo $content; ?>
    </div>
    <?php

    if(is_page_template( 'page-templates/page-standard.php' )||is_page_template('page-templates/page-portal.php')):?>
    <div class="relative flex flex-wrap justify-center" style="z-index: 101;text-align: center;">
        <h3 class="headline-box absolute" style="color:#000;top:-40px;">What We Do</h3>
    </div>
    <?php endif; ?>
</div>

