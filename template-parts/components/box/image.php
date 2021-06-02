<?php
$title=isset($args['title'])?$args['title']:"";
$icon=isset($args['icon'])?$args['icon']:"";
$url = !empty($args["url"]) ? $args["url"] : "/search_properties";
$index=isset($args['index'])?$args['index']:"";
$class_name = "col-md-4";
if ($index !== 0 && $index < 3) {
    $class_name = "col-md-8";
} else if ($index <= 4) {
    $class_name = "col-md-4";
}
?>
<div class="<?php echo $class_name ?>">
    <!-- Image Box -->
    <a href="<?php echo $url ?>" class="img-box"
        data-background-image="<?php echo $icon; ?>">
        <!-- Badge -->
        <div class="img-box-content visible">
            <h4><?php echo $title; ?></h4>
        </div>
    </a>
</div>