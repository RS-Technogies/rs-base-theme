
<?php
/**
 * Template Name: Listings Page
 *
 * @package WordPress
 * @subpackage NDIS
 * @since  NDIS 1.0
 */

$front_page_id = get_option('page_on_front');
$banner_image = has_post_thumbnail($front_page_id) ? get_the_post_thumbnail_url($front_page_id) : "https://www.hashtagportal.com.au/wp-content/uploads/1/2020/07/houses-scaled.jpg";


get_header();

?>

<?php get_template_part("template-parts/page/home/banner",null,[
    'content'=>do_shortcode("[paig_property_search]"),
    'banner'=>$banner_image
]); ?>

<?php get_template_part("template-parts/page/home/property-list"); ?>

<?php get_template_part("template-parts/page/footer/banner"); ?>

<?php get_footer(); ?>