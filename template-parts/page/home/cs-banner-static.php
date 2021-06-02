<?php
$banner_text=isset($args['banner_text'])?$args['banner_text']:"Find Properties";
$banner_btn_text=isset($args['banner_btn_text'])&&!empty($args['banner_btn_text'])?$args['banner_btn_text']:"Browse Properties";
$banner_image=isset($args['banner_image'])&&!empty($args['banner_image'])?$args['banner_image']:"https://paig.com.au/wp-content/uploads/1/2021/04/room-black-and-white.jpg";
$banner_url=isset($args['banner_url'])&&!empty($args['banner_url'])?$args['banner_url']:"/search_properties/";
$primary_color= getCustomThemeValue("primary_color", "#000000");
?>
<style>
    .z-999{
        z-index:999;
    }
    .absolute-center {
        width: 50%;
        height: 50%;
        overflow: auto;
        margin: auto;
        position: absolute;
        top: 0; left: 0; bottom: 0; right: 0;
    }
</style>
<a href="<?php echo $banner_url?>" class="flex flex-wrap items-center justify-center flip-banner py-20"
   data-background="<?php echo $banner_image ?>"
   data-color="<?php echo $primary_color; ?>"
   data-color-opacity="0"
   data-img-width="2500"
   data-background-size="cover"
   data-img-height="300"
   style="
        background-image: url(<?php echo $banner_image ?>);
        background-color: #ddd;
        background-size:cover;
        background-position:center;
        height:20em;"
>
    <div>
        <button class="text-white px-3 py-2 rounded" style="background-color:var(--bs-primary)">
          <i class="fa fa-home"></i>  <?php echo $banner_btn_text; ?>
        </button>
    </div>
    <div class="absolute w-full h-full" style="background-color:rgba(0,0,0,0.5);z-index:-10"></div>
    
</a>