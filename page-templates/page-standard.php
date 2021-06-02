<?php
/**
 * Template Name: Standard Page
 *
 * @package WordPress
 * @subpackage NDIS
 * @since  NDIS 1.0
 */

$front_page_id = get_option('page_on_front');
$about_content = get_post_meta($front_page_id, 'what_we_do_desc', true);
$offer_arr = getOfferMetaValues($front_page_id);
$service_arr=getServiceMetaValues($front_page_id);
$banner_image = has_post_thumbnail($front_page_id) ? get_the_post_thumbnail_url($front_page_id) : "https://www.hashtagportal.com.au/wp-content/uploads/1/2020/07/houses-scaled.jpg";

get_header(); ?>

<?php get_template_part("template-parts/page/home/banner"); ?>


<?php get_template_part("template-parts/page/home/what-we-do", array(
    'content' => $about_content,
    'isBoxTitle' => true,
    'sectionClasses'=>'fullwidth margin-top-0 offer-section py-24'
)); ?>



<?php get_template_part("template-parts/page/home-portal/what-we-offer",null,[
    'content'=>$offer_arr
]); ?>

<?php get_template_part("template-parts/page/home/property-list"); ?>

    <!-- Flip banner -->
    <a href="<?php echo site_url(); ?>/search_properties" class="flip-banner parallax"
       data-background="<?php echo bloginfo('template_directory'); ?>/images/flip-banner-bg.jpg"
       data-color="<?php echo getCustomThemeValue("primary_color", "#000000"); ?>" data-color-opacity="0.9"
       data-img-width="2500" data-img-height="1600">
        <div class="flip-banner-content">
            <h2 class="flip-visible">We help people and homes find each other</h2>
            <h2 class="flip-hidden"><i class="fa fa-home"></i> Search Properties <i class="sl sl-icon-arrow-right"></i>
            </h2>
        </div>
    </a>
    <!-- Flip banner / End -->

<?php get_template_part("template-parts/page/home/why-choose-us",null,[
    'content'=>$service_arr
]); ?>


<?php get_template_part("template-parts/page/footer/banner"); ?>

<?php get_footer(); ?>