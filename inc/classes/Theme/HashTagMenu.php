<?php

namespace Hashtag\Theme;

class HashTagMenu
{
    private static $instance;
    
    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance=new self();
        }
        return self::$instance;
    }
    
    public function __construct()
    {
        add_filter('wp_nav_menu_items',array($this, 'add_admin_link'), 10, 2);
    }

    public function add_admin_link($items, $args)
    {
        $link = getCustomThemeValue("login_url", "https://dashboard.hashtaghub.com.au/auth/login");
        $hashtag_portal_img_url = getCustomThemeValue("hashtag_portal_logo", "https://www.nationaldisabilityhouses.com.au/wp-content/uploads/5/2020/07/hashtag-portal-dark-menu.png");
        $hashtag_portal_url = getCustomThemeValue("hashtag_portal_url", "https://www.hashtagportal.com.au/");
        $target = $hashtag_portal_url==='#'?'_self':'_blank';
        $hashtag_url = $hashtag_portal_url==='#'?'javascript:void(0)':$hashtag_portal_url;

        if ($args->theme_location == 'primary_menu') {
            $show_hastag_logo = getCustomThemeValue("show_hashtag_portal_logo", "yes");
            if ($show_hastag_logo == 'yes') {
                $items .= "<li class='portal-logo'>
                    <a href='{$hashtag_url}' class='pr-0 block' target='{$target}'>
                        <img src='{$hashtag_portal_img_url}' />
                    </a>
                    </li>";
            }
        }
        return $items;
    }

}