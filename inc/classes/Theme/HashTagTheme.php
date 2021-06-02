<?php
namespace Hashtag\Theme;

class HashTagTheme
{
    public function __construct()
    {
        add_action("init",array($this,'themeSupport'));
        add_action('after_setup_theme', array($this, "themeSetup"));
        add_action('widgets_init', array($this, "registerWidgets"));
        add_action('showHashtagAfterSocial','showLoginIcon');
    }
    
    public function themeSupport(){
        add_theme_support('post-thumbnails');
        add_theme_support('custom-logo');
        add_theme_support('menus');
        add_theme_support('customize-selective-refresh-widgets');
        add_post_type_support('page',['excerpt']);
    }

    public function themeSetup()
    {
        register_nav_menus(array(
            'primary_menu' => __('Primary Menu', 'text_domain')
        ));
        register_nav_menus(array(
            'footer_menu' => __('Footer Menu', 'text_domain')
        ));

        register_nav_menus(array(
            'policy_menu' => __('Policy Menu', 'text_domain')
        ));

    }

    public function registerWidgets()
    {
        register_sidebar(array(
            'name' => __('Main Sidebar', 'textdomain'),
            'id' => 'sidebar-1',
            'description' => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
        ));

        register_sidebar(array(
            'name' => __('Footer 1', 'textdomain'),
            'id' => 'footer-1',
            'description' => __('Widgets in this footer', 'textdomain'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
        ));

        register_sidebar(array(
            'name' => __('Footer 2', 'textdomain'),
            'id' => 'footer-2',
            'description' => __('Widgets in this footer 2', 'textdomain'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
        ));

        register_sidebar(array(
            'name' => __('Footer 3', 'textdomain'),
            'id' => 'footer-3',
            'description' => __('Widgets in this footer 3', 'textdomain'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
        ));
    }

}

new HashTagTheme();
