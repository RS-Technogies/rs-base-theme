<?php

namespace Hashtag\Theme;

class HashTagHooks
{
    public function __construct()
    {
        add_action("wp_enqueue_scripts", array($this, "enqueueStyles"));
        add_action('wp_head', array($this, "renderThemeColor"));
        add_filter('the_content',array($this,"renderPageContent"));
        add_filter('mime_types', array($this, "webp_upload_mimes"));
        add_filter('file_is_displayable_image', array($this, "webp_is_displayable"), 10, 2);
        add_action('login_enqueue_scripts', array($this, 'my_login_logo'));
        add_filter("walker_nav_menu_start_el",array($this,'add_menu_dropdown'),10,4);
        add_filter('nav_menu_link_attributes',array($this,'add_dropdown_attributes'),10,4);
        // Hooking up our functions to WordPress filters
        add_filter('wp_mail_from',  array($this, 'wpb_sender_email'));
        add_filter("wp_mail_from_name", array($this, "wpb_sender_name"));

    }

    public function renderThemeColor()
    {
        return $this->getTemplateContent(HASHTAG_THEME_DIRECTORY."/inc/views/theme/custom-theme-color.php");
    }

    public function getTemplateContent($fileName,$display=true){
        if(!file_exists($fileName)){
            return "";
        }
        ob_start();
            include $fileName;
            $content=ob_get_contents();
        if($display){
            ob_end_flush();
            return;
        }
        ob_end_clean();
        return $content;
    }

    public function renderPageContent($content){
        global $post;
        if(!is_page()){
            return $content;
        }
        if(!in_array($post->post_title,['Privacy Policy','Terms of Use'])){
            return $content;
        }
        if(!in_the_loop()){
            return $content;
        }
        $page = get_page_by_title($post->post_title);
        if(!empty($page) && empty($page->post_content)){
            $file_name="privacy";
            if($post->post_title==='Terms of Use'){
                $file_name="term";
            }
            $content = $this->getTemplateContent(HASHTAG_THEME_DIRECTORY."/templates/pages/$file_name.php",false);
        }
        return $content;
    }
    
    public function add_dropdown_attributes( $atts, $item, $args, $depth){
        if ( isset( $args->has_children ) && $args->has_children ) {
            $atts['class']=$atts['class'].' inline';
            // $atts['data-bs-toggle']="dropdown";
        }
        return $atts;
    }
    
    public function add_menu_dropdown( $item_output, $item, $depth, $args){
        if ( isset( $args->has_children ) && $args->has_children ) {
            $item_output.='<span type="button" class="dropdown-toggle pl-1 inline" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent">
          </span>';
        }
        return $item_output;
    }

    // Function to change email address
    function wpb_sender_email($original_email_address)
    {
        return 'noreply@hashtagportal.com.au';
    }

    // Function to change sender name
    function wpb_sender_name($original_email_from)
    {
//        return current active theme name
        return 'Hashtag Portal';
    }

    public function enqueueStyles()
    {
        $js_folder = get_template_directory_uri()."/assets/js/";
        wp_enqueue_style("font-awesome","https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css");
        wp_enqueue_script("loader", $js_folder.'/custom-component/common/loader.js"',null, HASHTAG_SCRIPT_VERSION,true);
        wp_enqueue_script("sticky-kite", $js_folder.'sticky-kit.min.js"', array('jquery'), HASHTAG_SCRIPT_VERSION,true);
        wp_enqueue_script("mmenu", $js_folder.'mmenu.min.js"', array('jquery'), HASHTAG_SCRIPT_VERSION,true);
        wp_enqueue_script("theme-custom", $js_folder.'custom.js"', array('jquery'), HASHTAG_SCRIPT_VERSION,true);
        wp_enqueue_script("popper","https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js",null,HASHTAG_SCRIPT_VERSION,true);
        wp_enqueue_script("bootstrap","https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js",null,HASHTAG_SCRIPT_VERSION,true);
    }

    //** *Enable upload for webp image files.*/
    function webp_upload_mimes($existing_mimes)
    {
        $existing_mimes['webp'] = 'image/webp';
        return $existing_mimes;
    }

    //** * Enable preview / thumbnail for webp image files.*/
    function webp_is_displayable($result, $path)
    {
        if ($result === false) {
            $displayable_image_types = array(IMAGETYPE_WEBP);
            $info = @getimagesize($path);

            if (empty($info)) {
                $result = false;
            } elseif (!in_array($info[2], $displayable_image_types)) {
                $result = false;
            } else {
                $result = true;
            }
        }
        return $result;
    }


    function my_login_logo()
    { ?>
        <style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url(<?php echo wp_get_attachment_url(get_theme_mod('custom_logo'));?>);
                height: 110px;
            }
        </style>
    <?php }

}

