<?php

namespace app\controller;
use app\models\Categoria as CategoriaModel;

class Categoria extends Controller
{
    public function index(){
        $categoria = new CategoriaModel();
        $data = dateTime();
        $teste = array(
            "nome" => "wqwqwqw",
            "dateTime" => $data,
        );
        pre($teste);
        $categoria->insert($teste);
        pre($categoria->getAll());;
        var_dump($categoria->update(4, 9999999999));
    }
}