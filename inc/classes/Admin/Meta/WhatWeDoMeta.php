<?php
namespace Hashtag\Admin\Meta;

class WhatWeDoMeta extends BaseMeta
{
    protected $meta_id="what-we-do-desc";
    protected $meta_title="What We Do";

    public function __construct()
    {
        parent::__construct();
    }

    public function saveMeta($post_id)
    {

        $what_we_do_desc = isset($_POST['what_we_do_desc']) ? $_POST['what_we_do_desc'] : "";
        update_post_meta($post_id, "what_we_do_desc", $what_we_do_desc);
    }

    public function renderHtml()
    {
        $content = get_post_meta($this->post_id, "what_we_do_desc", true);
        $this->renderView("what-we-do-meta", compact('content'));
    }
}
