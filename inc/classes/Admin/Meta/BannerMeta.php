<?php

namespace Hashtag\Admin\Meta;

class BannerMeta extends BaseMeta
{
    protected $meta_id;
    protected $meta_title;
    protected $defaults;

    public function __construct($id = "", $meta_title = "",$defaults=[])
    {
        parent::__construct();
        $this->meta_id = $id;
        $this->meta_title = $meta_title;
        $this->defaults=$defaults;
    }

    public function saveMeta($post_id)
    {
        $banner_text = $this->meta_id . "_text";
        $banner_btn_text = $this->meta_id . "_btn_text";
        $banner_image = $this->meta_id . "_image";
        $banner_url = $this->meta_id . "_url";
        $banner_post_text = isset($_POST[$banner_text]) ? $_POST[$banner_text] : "";
        $banner_post_btn_text = isset($_POST[$banner_btn_text]) ? $_POST[$banner_btn_text] : "";
        $banner_post_image = isset($_POST[$banner_image]) ? $_POST[$banner_image] : "";
        $banner_post_url = isset($_POST[$banner_url]) ? $_POST[$banner_url] : "";
        update_post_meta($post_id, $banner_text, $banner_post_text);
        update_post_meta($post_id, $banner_btn_text, $banner_post_btn_text);
        update_post_meta($post_id, $banner_image, $banner_post_image);
        update_post_meta($post_id, $banner_url, $banner_post_url);
    }

    public function renderHtml()
    {
        $meta_id = $this->meta_id;
        $banner_text = get_post_meta($this->post_id, $meta_id . "_text", true);
        $banner_btn_text = get_post_meta($this->post_id, $meta_id . "_btn_text", true);
        $banner_image = get_post_meta($this->post_id, $meta_id . "_image", true);
        $banner_url = get_post_meta($this->post_id, $meta_id . "_url", true);


        if(empty($banner_text) && isset($this->defaults['banner_text'])){
            $banner_text=$this->defaults['banner_text'];
        }
        if(empty($banner_btn_text) && isset($this->defaults['banner_btn_text'])){
            $banner_btn_text=$this->defaults['banner_btn_text'];
        }

        $this->renderView("banner-meta", compact('meta_id', 'banner_text', 'banner_btn_text', 'banner_image', 'banner_url'));
    }
}