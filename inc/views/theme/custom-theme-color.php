<?php
$theme_primary_color =   getCustomThemeValue("primary_color", "#0A3044");
$theme_secondary_color =   getCustomThemeValue("secondary_color", "#013044");
$bg_header =   getCustomThemeValue("header_background", "#0A3044");
$bg_footer =   getCustomThemeValue("footer_background", "#0A3044");
$color_header =   getCustomThemeValue("header_color", "#000");
$color_footer =   getCustomThemeValue("footer_color", "#000");

?>

<style>
    :root{
        --bs-primary:<?php echo $theme_primary_color; ?>;
        --bs-secondary:<?php echo $theme_secondary_color; ?>
    }
    .bg-primary,.theme-bg{
        background-color:var(--bs-primary);
    }  
    .text-primary{
        color:var(--bs-primary);
    }  
    .text-secondary{
        color:var(--bs-secondary);
    }
    /*small loader*/
    .loader-sm .loader{
        display:inline-block;
        border:7px solid #eee;
        border-top:7px solid <?php echo $theme_primary_color ?>;
        width:50px;
        height:50px;
        vertical-align:middle;
    }
</style>