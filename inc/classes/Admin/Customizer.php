<?php
namespace Hashtag\Admin;

class Customizer
{
    private $sections;
    private $wp_customizer;
    private $panel_name;

    public function __construct(array $sections, \WP_Customize_Manager $wp_customizer)
    {
        $this->sections = $sections;
        $this->wp_customizer = $wp_customizer;
        $this->panel_name = "techie_settings";
        $this->init();
    }

    public function init()
    {
        $this->renderPanels();
        $this->renderSections();
    }

    public function renderPanels()
    {
        $this->wp_customizer->add_panel($this->panel_name,
            array(
                'title' => __('Hashtag Portal Settings'),
                'description' => esc_html__('Add Hashtag Portal Settings.'), // Include html tags such as
                'priority' => 25, // Not typically needed. Default is 160
                'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
            )
        );
    }

    public function renderSettings($settings,$section)
    {
        foreach ($settings as $index => $setting) {
            $this->wp_customizer->add_setting($index, $this->prepareSettings($setting));

            if(isset($setting["type"])&&class_exists($setting["type"])){
                $this->wp_customizer->add_control(new $setting["type"](
                    $this->wp_customizer,$index, $this->customControl($setting,$section)
                ));
            }
            else{
                $this->wp_customizer->add_control($index, $this->prepareControl($setting,$section));
            }
        }
    }

    public function renderSections()
    {
        if (!is_array($this->sections)) return;
            foreach ($this->sections as $index => $section) {
            $this->wp_customizer->add_section($index, $this->prepareSection($index, $section));
            if (!is_array($section["settings"])) return;
            $this->renderSettings($section["settings"],$index);
        }
    }

    private function prepareSection($id, $section)
    {
        return [
            'title' => isset($section["name"]) ? $section["name"] : $id,
            'description' => isset($section["description"]) ? $section["description"] : "",
            'panel' => $this->panel_name,
            'priority' => isset($section["priority"]) ? $section["priority"] : 10,
            'capability' => isset($section["capability"]) ? $section["capability"] : "edit_theme_options",
            'theme_supports' => isset($section["theme_supports"]) ? $section["theme_supports"] : "",
            'active_callback' => isset($section["active_callback"]) ? $section["active_callback"] : "",
            'description_hidden' => isset($section["description_hidden"]) ? $section["description_hidden"] : "false",
        ];
    }

    private function prepareSettings($setting)
    {
        return [
            'default' => isset($setting["default"])?$setting["default"]:'', // Optional.
            'transport' => isset($setting["transport"])?$setting["transport"]:'refresh', // Optional. 'refresh' or 'postMessage'. Default: 'refresh'
            'type' => isset($setting["setting_type"])?$setting["setting_type"]:'theme_mod', // Optional. 'theme_mod' or 'option'. Default: 'theme_mod'
            'capability' => isset($setting["capability"])?$setting["capability"]:'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'theme_supports' => isset($setting["theme_supports"])?$setting["theme_supports"]:'', // Optional. Rarely needed
            'validate_callback' => isset($setting["validate_callback"])?$setting["validate_callback"]:'', // Optional. The name of the function that will be called to validate Customizer settings
            'sanitize_callback' => isset($setting["sanitize_callback"])?$setting["sanitize_callback"]:'', // Optional. The name of the function that will be called to sanitize the input data before saving it to the database
            'sanitize_js_callback' => isset($setting["sanitize_js_callback"])?$setting["sanitize_js_callback"]:'', // Optional. The name of the function that will be called to sanitize the data before outputting to javascript code. Basically to_json.
            'dirty' => isset($setting["dirty"])?$setting["dirty"]:false, // Optional. Rarely needed. Whether or not the setting is initially dirty when created. Default: False
        ];
    }

    private function prepareControl($setting,$section)
    {

        return [
            'label' => isset($setting["label"])?$setting["label"]:'',
            'description' => isset($setting["description"])?$setting["description"]:"",
            'section' => $section,
            'priority' => isset($setting["priority"])?$setting["priority"]:10, // Optional. Order priority to load the control. Default: 10
            'type' => isset($setting["type"])?$setting["type"]:'text',
            'capability' => isset($setting["capability"])?$setting["capability"]:'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'choices' => isset($setting["choices"])?$setting["choices"]:'', // Optional. Default: 'edit_theme_options'
        ];
    }

    private function customControl($setting,$section){
        unset($setting["type"]);
        $setting["section"]=$section;
        return $setting;
    }

}