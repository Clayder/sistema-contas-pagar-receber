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
        $data = new \DateTime();
        $dados['dateTime'] = $data->format("Y-m-d H:m:s");
        $teste = array(
            "nome" => "wqwqwqw",
            "dateTime" => $dados['dateTime'],
        );
        $cliente->insert($teste);

        $cliente->getAll();

        var_dump($cliente->update(4, "999999999999999"));
    }
}