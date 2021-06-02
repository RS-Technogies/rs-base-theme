<?php
$banner_image = has_post_thumbnail($front_page_id) ? get_the_post_thumbnail_url($front_page_id) : "https://www.hashtagportal.com.au/wp-content/uploads/1/2020/07/houses-scaled.jpg";
?>
<?php get_header(); ?>

<?php do_action("HashtagBannerAfterHeader",$banner_image); ?>

<?php do_action("HashtagWhatWeDo"); ?>

<?php get_template_part("template-parts/page/home/hot-opportunities"); ?>

<?php do_action("HashtagWhatWeOffer"); ?>

<?php get_template_part("template-parts/page/home/cs-banner-static",null,get_front_banner("middle_banner")); ?>

<?php do_action("HashtagWhyChooseUs"); ?>

<?php // get_template_view("template-parts/page/home/cs-banner",get_front_banner("bottom_banner")); ?>


<?php do_action('HashtagBeforeFooter'); ?>

<?php get_footer(); ?>