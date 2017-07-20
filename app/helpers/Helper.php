<?php
/**
 * Created by PhpStorm.
 * User: clayder
 * Date: 19/07/17
 * Time: 23:57
 */

namespace app\helpers;


class Helper
{
    public static function baseUrl($url = ""){
        if($url != ""){
            return BASE_URL.$url;
        }else{
            return BASE_URL;
        }
    }

    public static function pre($array = null){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}