<?php

function baseUrl($url = ""){
    if($url != ""){
        return BASE_URL.$url;
    }else{
        return BASE_URL;
    }
}

function pre($array = null){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}