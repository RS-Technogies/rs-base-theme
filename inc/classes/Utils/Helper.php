<?php
namespace Hashtag\Utils;
class Helper
{
    private static $instance;

    public static function getInstance(){
        self::$instance=is_null(self::$instance)?new Helper():self::$instance;
        return self::$instance;
    }

}