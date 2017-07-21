<?php
    function baseUrl($url = ""){
        if($url != ""){
            return BASE_URL.$url;
        }else{
            return BASE_URL;
        }
    }

    function dateTime(){
        $fuso = new DateTimeZone('America/Sao_paulo');
        $data = new DateTime();
        $data->setTimezone($fuso);
        return $data->format('Y-m-d H:i:s');
    }

    function pre($array = null){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
