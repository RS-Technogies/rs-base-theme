<?php

namespace Hashtag\Admin\Meta;

abstract class BaseMeta
{
    protected $meta_id;
    protected $post_id;
    protected $meta_title;
    protected $screen = "page";
    protected $context = "normal";
    protected $priority = "high";
    protected $meta_value_key = "";


    public function __construct()
    {
        $this->post_id = isset($_GET["post"]) ? intval($_GET["post"]) : "";
        add_action('add_meta_boxes', array($this, "registerMeta"));
        add_action("save_post", array($this, "saveMeta"));
    }

    public function registerMeta()
    {
        add_meta_box(
            $this->meta_id,
            $this->meta_title,
            array($this, "renderHtml"),
            $this->screen,
            $this->context,
            $this->priority
        );
    }

    abstract public function renderHtml();

    abstract public function saveMeta($post_id);

    public function renderView($template_name, $data)
    {
        $folder_name = HASHTAG_THEME_DIRECTORY . "/inc/views/admin/meta/";
        extract($data);
        ob_start();
        include($folder_name . $template_name . ".php");
        $str = ob_get_contents();
        ob_end_clean();
        echo $str;
    }

    //function to return existing serives array
    private function getCustomMetaValues()
    {
        $custom_meta = get_post_meta($this->post_id);
        if (!is_array($custom_meta)) {
            $custom_meta = [];
        }

        $service_arr = array_filter($custom_meta, function ($value) {
            return strpos($value, $this->meta_value_key) > -1;
        }, ARRAY_FILTER_USE_KEY);

        return count($service_arr) > 0 ? $service_arr : [];
    }

    public function getMetaValues()
    {
        return array_map(function ($value) {
            return unserialize($value[0]);
        }, $this->getCustomMetaValues());
    }
}

