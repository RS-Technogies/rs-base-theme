<?php
$front_page_id = get_option('page_on_front');
$about_content = get_post_meta($front_page_id, 'what_we_do_desc', true);
$offer_arr = getOfferMetaValues($front_page_id);
$service_arr=getServiceMetaValues($front_page_id);
$banner_image = has_post_thumbnail($front_page_id) ? get_the_post_thumbnail_url($front_page_id) : "https://www.hashtagportal.com.au/wp-content/uploads/1/2020/07/houses-scaled.jpg";

get_header();

do_action("HashtagBannerAfterHeader",$banner_image);

do_action("HashtagWhatWeDo");

do_action("HashtagHotOpportunities");

do_action("HashtagWhatWeOffer");

do_action("HashtagMiddleBanner");

do_action("HashtagWhyChooseUs");

do_action('HashtagBeforeFooter');

get_footer();

?>