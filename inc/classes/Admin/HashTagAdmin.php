<?php

namespace Hashtag\Admin;

use Hashtag\Admin\Meta\BannerMeta;
use Hashtag\Admin\Meta\WhatWeDoMeta;
use Hashtag\Admin\Meta\WhatWeOfferMeta;
use Hashtag\Admin\Meta\WhyChooseUsMeta;
use PAIG\Common\Option;

class HashTagAdmin
{
    private $meta_boxes = [WhatWeDoMeta::class, WhatWeOfferMeta::class, WhyChooseUsMeta::class];

    public function __construct()
    {

        add_action('customize_register', array($this, 'bootCustomCustomizerSettings'));


        add_action("init", array($this, 'removeSamplePage'));
        // add_action('wp_initialize_site', array($this, 'setupNewHashtagPortalSite'), 150, 2);


        if (!isset($_GET["post"]) && !isset($_POST["post_ID"])) return;

        if (isset($_POST["post_ID"])) {
            $id = $_POST["post_ID"];
        } else {
            $id = $_GET["post"];
        }
        if ($id !== get_option('page_on_front')) return;

        $is_content_disabled = get_theme_mod("disable_content");

        if ($is_content_disabled && $is_content_disabled === "yes") return;

        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts_front_end'));
        // add_action("admin_init", array($this, "removeDefaultContent"));
        // add_action("admin_init", array($this, "registerMetas"));
        // add_action("admin_init", array($this, "registerBannerBoxes"));
    }

    function setupNewHashtagPortalSite(\WP_Site $new_site)
    {
        switch_to_blog($new_site->blog_id);
        try {
            $home_page_id = $this->createPage("home", "Home", true);
            $about_page = $this->createPage("about", "About");

            $contact_page = $this->createPage("contact", "Contact", false, 'page-templates/page-contact.php');
            $privacy_page = $this->createPage('privacy-policy', "Privacy Policy");
            $terms_page = $this->createPage('terms-of-use', "Terms of Use");

            //default content while creating new sites
            $this->setupMenuItems($home_page_id, $about_page, $contact_page);
            $this->setupPolicyMenu($terms_page, $privacy_page);
            $this->createDefaultWhatWeDoContent($home_page_id);
            $this->createHomeServices($home_page_id);
            //set new version
            $this->removeSamplePage();
        } catch (\Exception $e) {
            var_dump($e);
        }
        restore_current_blog();
    }



    private function createPage($page_slug, $title, $is_front = false, $template_name = "")
    {
        $page = get_page_by_path($page_slug);

        if (!$page) {
            $page_details = array(
                'post_title' => $title,
                'post_status' => 'publish',
                'post_author' => 1,
                'post_type' => 'page'
            );

            $post_id = wp_insert_post($page_details);
        } else {
            $post_id = $page->ID;
        }
        if (!empty($template_name)) {
            update_post_meta($post_id, '_wp_page_template', $template_name);
        }
        if ($is_front) {
            update_option('page_on_front', $post_id);
            update_option('show_on_front', 'page');
        }
        return $post_id;
    }

    private function createDefaultWhatWeDoContent($home_id)
    {
        $default_content = " PRO-ACTIVE INVESTMENT GROUP (PAIG) helps property investors educate, locate and negotiate real estate investment decisions Australia wide. They coach investors on real estate strategies.
Compared to a normal real estate agency, PAIG does not work with buyers, they work with investors. In fact, PAIG educates investors to build and sell properties to buyers ….
So if you are planning to buy an investment property, then please contact PAIG who will assist you to purchase the right investment property for maximum capital growth ensuring there are large plans for infrastructure projects etc. in that area.";
        update_post_meta($home_id, "what_we_do_desc", $default_content);
    }

    private function createHomeServices($home_id)
    {
        $services_arr = getCustomMetaValues($home_id, "offer_meta_");
        if (!empty($services_arr)) return;
        // $this->uploadImages("services");
        $offers = [
            [
                "title" => "Projects",
                "icon" => "https://www.hashtagportal.com.au/wp-content/uploads/1/2020/07/Projects.jpeg",
                "url" => "/search_properties/?property_type=Project"
            ],
            [
                "title" => "Lands",
                "icon" => "https://www.hashtagportal.com.au/wp-content/uploads/1/2020/07/Land.jpeg",
                "url" => "/search_properties/?property_type=Land"
            ],
            [
                "title" => "House & Land",
                "icon" => "https://www.hashtagportal.com.au/wp-content/uploads/1/2020/07/Land.jpeg",
                "url" => "/search_properties/?strategy_type=House%20amp;%20Land%20Packages%20Real%20Estate"
            ],
            [
                "title" => "Build Contract",
                "icon" => "https://www.hashtagportal.com.au/wp-content/uploads/1/2020/07/Build-Contract-1.jpeg",
                "url" => "/search_properties/?property_type=Build%20Contract"
            ],
        ];
        foreach ($offers as $index => $offer) {
            update_post_meta($home_id, "offer_meta_" . $index, $offer);
        }
    }

    private function setupMenuItems($home_page_id, $about_page_id, $contact_page_id)
    {
        $menuName = "Header Menu";
        $menu = wp_get_nav_menu_object($menuName);

        if ($menu) return;

        $menu_id = wp_create_nav_menu($menuName);
        // Set up default BuddyPress links and add them to the menu.
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Home'),
            'menu-item-object-id' => $home_page_id,
            'menu-item-object' => 'page',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'post_type',
        ));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Properties'),
            'menu-item-url' => '/search_properties/',
            'menu-item-status' => 'publish'));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('About'),
            'menu-item-object-id' => $about_page_id,
            'menu-item-object' => 'page',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'post_type',
        ));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Contact'),
            'menu-item-object-id' => $contact_page_id,
            'menu-item-object' => 'page',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'post_type',
        ));
        //Set Header
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary_menu'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }

    private function setupPolicyMenu($terms_menu_id, $policy_menu_id)
    {
        $menuName = "Policy Menu";
        $menu = wp_get_nav_menu_object($menuName);

        if ($menu) return;

        $menu_id = wp_create_nav_menu($menuName);
        // Set up default BuddyPress links and add them to the menu.
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Terms of Use'),
            'menu-item-object-id' => $terms_menu_id,
            'menu-item-object' => 'page',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'post_type',
        ));
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => __('Privacy Policy'),
            'menu-item-object-id' => $policy_menu_id,
            'menu-item-object' => 'page',
            'menu-item-status' => 'publish',
            'menu-item-type' => 'post_type',
        ));

        $locations = get_theme_mod('nav_menu_locations');
        $locations['policy_menu'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }

    private function storeCustomizerValues()
    {
        $social_links = [
            "facebook" => "https://www.facebook.com/paigtechnologies/",
            "twitter" => "https://twitter.com/KaranPAIG",
            "youtube" => "https://www.youtube.com/channel/UCmRUGH5lgfDvFEklCerXOUA/featured",
            "instagram" => "https://www.instagram.com/paigtechnologies/",
            "linkedin" => "https://www.linkedin.com/company/paig-tech"
        ];
        foreach ($social_links as $index => $social_link) {
            $this->setCustomizerValues($index, $social_link);
        }
        $this->setCustomizerValues("custom_logo_url", "");
        $this->setCustomizerValues("hashtag_portal_logo", "https://www.nationaldisabilityhouses.com.au/wp-content/uploads/5/2020/07/hashtag-portal-dark-menu.png");
        $this->setCustomizerValues("login_url", "https://paighub.paig.com.au/auth/login");
        $this->setCustomizerValues("hashtag_portal_url", "https://hashtagportal.com.au");
    }

    private function setCustomizerValues($key, $value)
    {
        if (empty(get_theme_mod($key, ""))) {
            set_theme_mod($key, $value);
        }
    }

    public function removeSamplePage()
    {
        $defaultPage = get_page_by_title('Sample Page');
        if (!empty($defaultPage) && is_multisite()) {
            wp_delete_post($defaultPage->ID);
        }
    }


    public function bootCustomCustomizerSettings($wp_customizer)
    {
        $file_name = HASHTAG_THEME_DIRECTORY . "/config/customizer.php";

        $config = file_exists($file_name) ? include($file_name) : [];

        new Customizer($config, $wp_customizer);
    }

    public function remove_default_post_type()
    {
        remove_menu_page('edit.php');
    }

    public function enqueue_scripts_front_end()
    {
        $folder_path = HASHTAG_THEME_URL . "/assets/admin/";
        wp_enqueue_media();
        wp_enqueue_script('custom-admin-ui', $folder_path . "js/field.js",
            array('jquery-ui-droppable'), null, true);
//        wp_enqueue_style("admin-tailwind", $folder_path . "css/tailwind.css", null, HASHTAG_THEME_VERSION);
        wp_enqueue_style("admin-tailwind", "https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css", null, HASHTAG_THEME_VERSION);
    }

    public function removeDefaultContent()
    {
        remove_post_type_support('page', 'editor');
    }

    public function registerMetas()
    {
        foreach ($this->meta_boxes as $meta_box) {
            if (!class_exists($meta_box)) return;
            new $meta_box();
        }
    }

    public function registerBannerBoxes()
    {
        new BannerMeta("middle_banner", "Banner Banner", ['banner_btn_text' => 'Search Properties']);
        new BannerMeta("bottom_banner", "Bottom Banner", ['banner_text' => 'Search Properties', 'banner_btn_text' => 'Find Properties']);
    }
}
