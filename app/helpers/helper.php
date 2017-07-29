<?php
/**
 * @param string $url
 * @return string
 */
function baseUrl($url = "")
{
    if ($url != "") {
        return BASE_URL . $url;
    } else {
        return BASE_URL;
    }
}

/**
 * @param string $tipo exemplo: Y-m-d H:i:s
 * @return date
 */
function dateTime($tipo = "")
{
    $fuso = new DateTimeZone('America/Sao_paulo');
    $data = new DateTime();
    $data->setTimezone($fuso);
    if ($tipo === "") {
        return $data->format('Y-m-d H:i:s');
    } else {
        return $data->format($tipo);
    }

}

/**
 * Converte a data para o formato brasileiro
 * @param date $data
 * @return string
 */
function dataBrasil($data)
{
    $data = new DateTime($data);
    return $data->format('d/m/Y');
}

/**
 * Converte a data e hora para o formato brasileiro
 * @param dateTime $data
 * @return string
 */
function dateTimeBrasil($data)
{
    $data = new DateTime($data);
    return $data->format('d/m/Y H:i:s');
}

/**
 * Converte a data do formato brasileiro para o americano
 * @param date $data
 * @param string $tipo
 * @return string
 */
function dateTimeSql($data, $tipo)
{
    $DT = DateTime::createFromFormat('d/m/Y', $data);
    return $DT->format($tipo);
}

/**
 * Insere CSS na tag <link></link>
 * @param string $css
 * @return string
 */
function inserirCss($css)
{
    return "<link href='" . baseUrl("bower_components/gentelella/vendors/" . $css) . "' rel='stylesheet'> \n";
}

/**
 * Insere o JS dentro da tag <script></script>
 * @param string $js
 * @return string
 */
function inserirJs($js)
{
    return "<script src='" . baseUrl("bower_components/gentelella/vendors/" . $js) . "'></script> \n";
}

function pre($array = null)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

/**
 * Cria um button para deletar
 * @param string $class
 * @param string $metodo
 * @param inf $id
 * @return void
 */
function buttonDelete($class, $metodo, $id)
{
    echo "<form action='" . url($class, $metodo) . "' method='POST'  onsubmit=\"return confirm('Você realmente deseja excluír ?')\">";
    echo "<input type=\"hidden\" name=\"id\" value=\"" . $id . "\" />";
    echo "<button class=\"btn btn-danger\" type=\"submit\"> <i class='fa fa-trash-o' aria-hidden='true'></i> </button>";
    echo "</form>";
}

/**
 * @param string $class
 * @param string $metodo
 * @param int $id
 * @return void
 */
function buttonEdit($class, $metodo, $id)
{
    echo "<a class='btn btn-info' href='" . url($class, $metodo, "id=$id") . "' role='button'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
}

/**
 * @param string controlador
 * @param string método
 * @param string parametros do método
 */
function url($class, $metodo, $parametro = '')
{
    if ($parametro != '') {
        $parametro = "&" . $parametro;
    }
    $param = "?class=" . $class;
    $param = $param . "&metodo=$metodo" . $parametro;
    return baseUrl($param);
}

/**
 * @param string $class
 * @param string $metodo
 * @return string
 */
function urlAmigavel($class, $metodo)
{
    return $class . "/" . $metodo;
}

/**
 * Retorna o tipo de requisição (GET, POST, etc)
 * @return mixed
 */
function requisicao()
{
    return $_SERVER['REQUEST_METHOD'];
}

/**
 * Redireciona o usuário para uma outra página
 * @param string $class
 * @param string $metodo
 * @param string $parametro
 */
function redirect($class, $metodo, $parametro = '')
{
    $redirect = url($class, $metodo, $parametro);
    header("location:$redirect");
}

/**
 * @return void
 */
function iniciaSession()
{
    if (!isset($_SESSION)) {
        session_start();
    }
}

/**
 * Exibe uma mensagem que vai aparecer, só por alguns segundos.
 * @param string $nomeSession
 * @param string $mensagem
 */
function flashData($nomeSession, $mensagem)
{
    iniciaSession();
    $_SESSION['flash'][$nomeSession] = $mensagem;
    $_SESSION['ultima_atividade'] = time();
}

/**
 * Verifica o tempo que a mensagem foi exibida e a deleta.
 * @return void
 */
function flashDataVerifica()
{
    iniciaSession();
    if (isset($_SESSION['ultima_atividade']) && (time() - $_SESSION['ultima_atividade'] > 1)) {
        unset($_SESSION['flash']);
    }
    $_SESSION['ultima_atividade'] = time(); // update da ultima atividade
}

/**
 * Imprime a mensagem
 * @param string $nomeSession
 */
function flashDataMs($nomeSession)
{
    iniciaSession();
    if (isset($_SESSION['flash'][$nomeSession])) {
        echo $_SESSION['flash'][$nomeSession];
    }
}

/**
 * Imprime uma mensagem, com o layout de alerta.
 * @param string $tipo
 * @param string $mensagem
 * @return string
 */
function mensagemAlerta($tipo, $mensagem)
{

    $alerta = "<div class='alert alert-" . $tipo . " alert-dismissible' role='alert'>";
    $alerta = $alerta . " <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> ";
    $alerta = $alerta . $mensagem;
    $alerta = $alerta . " </div>";
    return $alerta;
}

/**
 * Imprime uma mensagem, com o layout de erro.
 * @param string $tipo
 * @param string $mensagem
 * @return string
 */
function msErro($mensagem)
{
    return "<div class='alert alert-danger' role='alert'>" . $mensagem . "</div>";
}

/**
 * Converte um número para valor monetario ou um valor (monetário) para double.
 * @param string $tipo Double ou monetário
 * @param double|string $valor
 * @return int|mixed|string
 */
function convertMonetario($tipo, $valor)
{
    $result = 0;
    // converte para monetario
    if ($tipo === 'monetario') {
        $result = number_format($valor, 2, ",", ".");
    } elseif ($tipo === 'double') { // converte para double
        $result = str_replace(".", "", $valor);
        $result = str_replace(',', '.', $result);
    }
    return $result;
}







