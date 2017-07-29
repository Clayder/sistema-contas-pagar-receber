<?php
    function baseUrl($url = ""){
        if($url != ""){
            return BASE_URL.$url;
        }else{
            return BASE_URL;
        }
    }

    function dateTime($tipo = ""){
        $fuso = new DateTimeZone('America/Sao_paulo');
        $data = new DateTime();
        $data->setTimezone($fuso);
        if($tipo === ""){
            return $data->format('Y-m-d H:i:s');
        }else{
            return $data->format($tipo);
        }

    }

    function dataBrasil($data){
        $data = new DateTime($data);
        return $data->format('d/m/Y');
    }

    function dateTimeBrasil($data){
        $data = new DateTime($data);
        return $data->format('d/m/Y H:i:s');
    }

    function dateTimeSql($data, $tipo){
        $DT = DateTime::createFromFormat('d/m/Y', $data);
        return $DT->format($tipo);
    }

    function inserirCss($css){
        return "<link href='".baseUrl("bower_components/gentelella/vendors/".$css)."' rel='stylesheet'> \n";
    }

    function inserirJs($js){
        return "<script src='".baseUrl("bower_components/gentelella/vendors/".$js)."'></script> \n";
    }

    function pre($array = null){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

    function buttonDelete($class, $metodo, $id){
        echo "<form action='". url($class, $metodo) ."' method='POST'  onsubmit=\"return confirm('Você realmente deseja excluír ?')\">";
        echo "<input type=\"hidden\" name=\"id\" value=\"". $id ."\" />";
        echo "<button class=\"btn btn-danger\" type=\"submit\"> <i class='fa fa-trash-o' aria-hidden='true'></i> </button>";
        echo "</form>";
    }

    function buttonEdit($class, $metodo, $id){
        echo "<a class='btn btn-info' href='".url($class, $metodo, "id=$id")."' role='button'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
    }

    /**
     * @param string controlador 
     * @param string método
     * @param string parametros do método
    */
    function url($class, $metodo, $parametro = ''){
        if(URL_AMIGAVEL){
            if($parametro != ''){
                $parametro = "?".$parametro;
            }
            $param = urlAmigavel($class, $metodo).$parametro;
        }else{
            if($parametro != ''){
                $parametro = "&".$parametro;
            }
            $param = "?class=".$class;
            $param = $param."&metodo=$metodo".$parametro;
        }
        return baseUrl($param);
    }

    function urlAmigavel($class, $metodo){
        return $class."/".$metodo;
    }

    function requisicao(){
        return $_SERVER['REQUEST_METHOD'];
        
    }

    function redirect($class, $metodo, $parametro = ''){
        $redirect = url($class, $metodo, $parametro);
        header("location:$redirect");
    }

    function iniciaSession(){
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
    }

    function flashData($nomeSession, $mensagem){
        iniciaSession();
        $_SESSION['flash'][$nomeSession] = $mensagem;
        $_SESSION['ultima_atividade'] = time(); 
    }

    function flashDataVerifica(){
        iniciaSession();
        if (isset($_SESSION['ultima_atividade']) && (time() - $_SESSION['ultima_atividade'] > 1)) {
            unset($_SESSION['flash']);
        }
        $_SESSION['ultima_atividade'] = time(); // update da ultima atividade
    }

    function flashDataMs($nomeSession){
        iniciaSession();
        if(isset($_SESSION['flash'][$nomeSession])){
            echo $_SESSION['flash'][$nomeSession];
        }
    }

    function mensagemAlerta($tipo, $mensagem){

        $alerta = "<div class='alert alert-".$tipo." alert-dismissible' role='alert'>";
        $alerta = $alerta." <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> ";
        $alerta =  $alerta.$mensagem;
        $alerta = $alerta . " </div>";
        return $alerta;
    }

    function msErro($mensagem){
        return "<div class='alert alert-danger' role='alert'>".$mensagem."</div>";
    }






