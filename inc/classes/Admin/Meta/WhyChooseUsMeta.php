<?php
namespace Hashtag\Admin\Meta;

class WhyChooseUsMeta extends BaseMeta
{
    protected $meta_id = "'what-choose-us";
    protected $meta_title = "Why Choose Us";
    protected $meta_value_key = "service_meta_";

    public function __construct()
    {
        parent::__construct();
    }

    public function saveMeta($post_id)
    {
        $services = [];
        $services_title = isset($_POST["service_title"]) ? $_POST["service_title"] : isset($_POST["service_title"]);
        $services_iconClass = isset($_POST["service_iconClass"]) ? $_POST["service_iconClass"] : isset($_POST["service_iconClass"]);
        $service_icons = isset($_POST["service_image_icon"]) ? $_POST["service_image_icon"] : "";
        $services_content = isset($_POST["service_content"]) ? $_POST["service_content"] : "";

        //only work if service has values
        if (isset($_POST["is_service_page"])) {
            if (is_array($services_title)) {
                for ($i = 0; $i < count($services_title); $i++) {
                    $services = array(
                        "title" => sanitize_text_field($services_title[$i]),
                        "iconClass" => sanitize_text_field($services_iconClass[$i]),
                        "icon" => sanitize_text_field($service_icons[$i]),
                        "content" => sanitize_text_field($services_content[$i]),
                    );
                    $key = "service_meta_" . $i;
                    update_post_meta($post_id, $key, $services);
                }
            }

            //database offer value
            $service_metas =  getCustomMetaValues($post_id,$this->meta_value_key);

            $total = isset($_POST["service_title"]) ? count($services_title) : 0;
            //remove unnecessary field
            if (!empty($service_metas)) {
                if (count($service_metas) > $total) {
                    for ($i = $total; $i < count($service_metas); $i++) {
                        delete_post_meta($post_id, $this->meta_value_key . $i);
                    }
                }
            }
        }
    }

    public function renderHtml()
    {
        $service_arr = $this->getMetaValues();
        $this->renderView("why-choose-us-meta", compact('service_arr'));
    }
}