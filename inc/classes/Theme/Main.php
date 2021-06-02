<?php
namespace Hashtag\Theme;

use Hashtag\Actions\DefaultAction;
use Hashtag\Theme\Contact\Admin\CustomPostType;
use Hashtag\Theme\Contact\HashTagContact;

class Main
{
    public function __construct()
    {
        $this->bootstrapTheme();
    }

    public function bootstrapTheme(){
        new HashTagTheme();
        new HashTagHooks();
        HashTagMenu::getInstance();
        DefaultAction::getInstance();
    }
}