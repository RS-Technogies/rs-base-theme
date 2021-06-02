<?php 
    $btn_text=isset($args['btn_text'])?$btn_text:"Enquire Now";
    $container_class=isset($args['container_class'])?$args['container_class']:"my-6";
    $link=isset($args['link'])?$args['link']:"#";
?>
<div class="<?php echo $container_class; ?>">
    <a href="<?php echo $link ?>" 
        class="text-white px-3 py-2 rounded bg-primary inline-block w-auto hover:text-white">
        <i class="fa fa-home"></i> <?php echo $btn_text; ?>
    </a>
</div>
