<?php

use Hashtag\Utils\Helper;

if(!function_exists("hashTagHelper")){
    function hashTagHelper(){
        return Helper::getInstance();
    }
}

function getCFSValue($name)
{
    if (function_exists("CFS")) {
        return CFS()->get($name);
    } else {
        return "";
    }
}

function getCustomThemeValue($name, $default_value = "")
{
    return !empty(get_theme_mod($name)) ? get_theme_mod($name) : $default_value;
}

if (!function_exists('write_log')) {
    function write_log($log)
    {
        if (is_array($log) || is_object($log)) {
            error_log(print_r($log, true));
        } else {
            error_log($log);
        }
    }
}

function body_template($template_part,$data)
{
    $str="";
    if(file_exists($template_part)){
        extract($data);
        ob_start();
        include($template_part);
        $str = ob_get_contents();
        ob_end_clean();
    }
    return $str;
}

function get_template_view($template, $data)
{
    extract($data);
    ob_start();
    include(get_stylesheet_directory() . "/" . $template . ".php");
    $str = ob_get_contents();
    ob_end_clean();
    echo $str;
}

function get_front_banner($banner_type)
{
    $result = array();
    $front_page_id = get_option('page_on_front');
    $banner_types = array("middle_banner", "bottom_banner");
    if (!empty($front_page_id) && in_array($banner_type, $banner_types)) {
        $result["banner_text"] = get_post_meta($front_page_id, $banner_type . "_text", true);
        $result["banner_btn_text"] = get_post_meta($front_page_id, $banner_type . "_btn_text", true);
        $result["banner_image"] = get_post_meta($front_page_id, $banner_type . "_image", true);
        $result["banner_url"] = get_post_meta($front_page_id, $banner_type . "_url", true);
    }
    return $result;
}


function getPaigSocialMedia()
{
    return ["facebook", "twitter", "youtube", "instagram", "linkedin"];
}

function getCustomMetaValues($post_id, $custom_meta_key)
{
    $custom_meta = get_post_meta($post_id);
    if (!is_array($custom_meta)) {
        $custom_meta = [];
    }

    $service_arr = array_filter($custom_meta, function ($value) use ($custom_meta_key) {
        return strpos($value, $custom_meta_key) > -1;
    }, ARRAY_FILTER_USE_KEY);

    return count($service_arr) > 0 ? array_map(function ($value) {
        return unserialize($value[0]);
    }, $service_arr) : [];
}

function getOfferMetaValues($post_id)
{
    return getCustomMetaValues($post_id, "offer_meta_");
}

function getServiceMetaValues($post_id)
{
    return getCustomMetaValues($post_id, "service_meta_");
}

function renderView($template,$data){
    if(file_exists($template.".php")){
        extract($data);
        include($template.".php");
    }
}

function renderViewPart($template,$data=[]){
	renderView(HASHTAGCONTACT."/views/".$template,compact('data'));
}

function showMobileMenu(){
    get_template_part("template-parts/header/mobile",'menu');
}

function showLoginIcon(){
    $link = getCustomThemeValue("login_url", "https://dashboard.hashtaghub.com.au/auth/login");
    echo sprintf('<div class="login-hub cs-hidden md:block w-1/2 md:w-auto">
    <a href="%s" class="sign-in pl-5 pt-1 px-16 block" target="_blank">
        <i class="fas fa-sign-in-alt"></i> Join Hashtag Hub</a>
</div>',$link);
}

function showSocialIcons(){
    $socialItems = getPaigSocialMedia();
    $socialItems=apply_filters('getHashtagSocialMedia',$socialItems);
    // var_dump($socialItems);
    foreach ($socialItems as $key=>$value) {
        do_action("showHashtagSocialMedia",$value,$key);
    }
}

function showPortalIcon($classes='',$container=""){
    $show_hastag_logo = get_theme_mod( "show_hashtag_portal_logo", "no" ); 
    if ( $show_hastag_logo == 'yes' ){
        $link                   = getCustomThemeValue( "hashtag_link", "#" );
        $logo_url = getCustomThemeValue( "hashtag_portal_logo", "https://www.hashtagportal.com/wp-content/uploads/1/2020/06/logo.png" );
        get_template_part('template-parts/header/portal-logo',null,compact('link','logo_url','classes','container'));
    }
}
