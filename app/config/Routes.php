<?php
/**
 * @author Peter Clayder
 */
namespace app\config;

use app\controller\Dicionario;

class Routes
{
    /**
     * @return void
     */
    public static function init()
    {
        $dicionario = new Dicionario();
        if (empty($_REQUEST['rota'])) {
            $dicionario->formCadastro();
        } else {
            $rota = $_REQUEST['rota'];
            switch ($rota) {
                case "cadastrar":
                    $dados = array(
                        "palavra" => trim($_POST['palavra']),
                        "palavraTraducao" => trim($_POST['palavraTraducao']),
                        "frase" => trim($_POST['frase']),
                        "fraseTraducao" => trim($_POST['fraseTraducao']),
                    );
                    $dicionario->cadastrar($dados);
                    break;
                case "getMensagens":

                    $dicionario->getMensagens();
                    break;

                default:
            }
        }
    }
}
