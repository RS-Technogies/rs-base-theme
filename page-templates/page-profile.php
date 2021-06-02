<?php
/**
 * Template Name: Agent Profile Layout
 *
 * @package WordPress
 * @subpackage NDIS
 * @since  NDIS 1.0
 */
$front_page_id = get_option('page_on_front');
$banner_image = has_post_thumbnail($front_page_id) ? get_the_post_thumbnail_url($front_page_id) : "https://www.hashtagportal.com.au/wp-content/uploads/1/2020/07/houses-scaled.jpg";
get_header();
?>

<?php do_action("HashtagBannerAfterHeader", $banner_image); ?>

<?php do_action("HashtagWhatWeDo"); ?>

<?php do_action("HashtagWhatWeOffer"); ?>

<?php do_action("HashtagWhyChooseUs"); ?>

<?php do_action("HashtagContactAgentForm"); ?>

<?php do_action('HashtagBeforeFooter'); ?>


<?php get_footer(); ?>