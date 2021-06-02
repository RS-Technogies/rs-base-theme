<?php
$primary_color= getCustomThemeValue("primary_color", "#000000");
?>

<div>
    <div class="container">
        <div class="flex flex-wrap items-center justify-center">
            <a href="<?php echo site_url(); ?>/search_properties" class="text-white btn-paig px-2 py-3" style="background-color:<?php echo $primary_color ?>">
                <i class="fa fa-home"></i>   Search Properties</a>
        </div>
    </div>
</div>