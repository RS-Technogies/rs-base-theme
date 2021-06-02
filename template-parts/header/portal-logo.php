<?php 
    $link=isset($args['link'])?$args['link']:"";
    $logo_url=isset($args['logo_url'])?$args['logo_url']:"";
    $classes=!empty($classes)?$classes:"hashtag-portal-logo flex items-center w-1/2 md:w-auto";
    $container=!empty($container)?$container:"div";
?>
<<?php echo $container; ?> class="<?php echo $classes; ?>" style="max-width:170px;">
    <a href="<?php echo $link; ?>" class="block" target="_blank">
        <img src="<?php echo $logo_url; ?>" class="w-64"/>
    </a>
</<?php echo $container; ?>>