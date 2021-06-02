<?php
namespace Hashtag\Admin\Meta;
class WhatWeOfferMeta extends BaseMeta
{
    protected $meta_id = "what-we-offer-desc";
    protected $meta_title = "What We Offer";
    protected $meta_value_key = "offer_meta_";

    public function __construct()
    {
        parent::__construct();
    }

    private function getPostValue($key){
        return isset($_POST[$key])?$_POST[$key]:"";
    }

    public function saveMeta($post_id)
    {
        $offer_title=$this->getPostValue("offer_title");
        $offer_iconClass=$this->getPostValue("offer_iconClass");
        $offer_icons=$this->getPostValue("offer_image_icon");
        $offer_desc=$this->getPostValue("offer_content");
        $offer_url=$this->getPostValue("offer_url");

        //only work if offer has values
        if (isset($_POST['is_offer_page'])) {

            if (is_array($offer_title)) {
                for ($i = 0; $i < count($offer_title); $i++) {
                    $offers = array(
                        "title" => sanitize_text_field($offer_title[$i]),
                        "iconClass" => sanitize_text_field($offer_iconClass[$i]),
                        "icon" => sanitize_text_field($offer_icons[$i]),
                        "content" => sanitize_text_field($offer_desc[$i]),
                        "url"=>$offer_url[$i]
                    );
                    $key = "offer_meta_" . $i;
                    update_post_meta($post_id, $key, $offers);
                }
            }

            //database offer value
            $offer_metas =getCustomMetaValues($post_id,$this->meta_value_key);


            $total = isset($_POST["offer_title"]) ? count($offer_title) : 0;
            //remove unnecessary field
            if (!empty($offer_metas)) {
                if (count($offer_metas)>$total) {
                    for ($i = $total; $i <count($offer_metas);  $i++) {
                        delete_post_meta($post_id, $this->meta_value_key . $i);
                    }
                }
            }
        }
    }

    public function renderHtml()
    {
        $offer_arr = $this->getMetaValues();
        $this->renderView("what-we-offer-meta", compact('offer_arr'));
    }
}