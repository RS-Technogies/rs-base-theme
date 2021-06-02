<?php
    $banner_text=isset($args['banner_textr_image'])?$args['banner_textr_image']:"Find Properties";
    $banner_btn_text=isset($args['banner_btn_text'])?$args['banner_btn_text']:"Browse Properties";
    $banner_image=isset($args['banner_image'])?$args['banner_image']:"https://paig.com.au/wp-content/uploads/1/2021/04/room-black-and-white.jpg";
    $banner_url=isset($args['banner_url'])&&!empty($args['banner_url'])?$args['banner_url']:"/search_properties/";
?>
<a href="<?php echo $banner_url?>" class="parallax flip-banner py-20"
   data-background="<?php echo $banner_image ?>"
   data-color="<?php echo getCustomThemeValue("primary_color", "#000000"); ?>"
   data-color-opacity="0"
   data-img-width="2500"
   data-background-size="cover"
   data-img-height="300"
   style="
           background-image: url(<?php echo $banner_image ?>);
           background-color: #dddddd;
           background-size:cover;
           backround-position:center;
           height:20em;"
>
    <div class="flip-banner-content">
        <h2 class="flip-visible"><?php echo $banner_text; ?></h2>
        <h2 class="flip-hidden"><i class="fa fa-home"></i>  <?php echo $banner_btn_text ?> <i class="sl sl-icon-arrow-right"></i></h2>
    </div>
</a>