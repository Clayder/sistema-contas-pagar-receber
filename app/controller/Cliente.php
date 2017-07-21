<?php
namespace app\controller;
use app\models\Cliente as ClienteModel;

class Cliente extends Controller
{
    /**
     * @return void
     */
    public function index(){
        $cliente = new ClienteModel();
        $dados['dateTime'] = dateTime();
        $teste = array(
            "nome" => "wqwqwqw",
            "dateTime" => $dados['dateTime'],
        );
        $cliente->insert($teste);

        $cliente->getAll();

        var_dump($cliente->update(4, "999999999999999"));
    }
}