<?php

namespace app\controller;
use app\models\ContaReceber as Receber;

class ContaReceber extends Controller
{
	public function index(){
	    //descricao`, `valor`, ``, `fk_cliente`, `recebido`, `dateTime`
        $teste = array(
            'dataRecebimento' => '2016-02-01',
            'descricao' => 'asa sasa sas sas asas as',
            'valor' => 13.4,
            'fk_cliente' => 5,
            'recebido' => true,
            'dateTime' => dateTime(),
        );
        $conta = new Receber();
        $conta->insert($teste);
        pre($conta->delete(7));
        pre($conta->getAll());


        $teste2 = array(
            'dataRecebimento' => '2016-02-01',
            'descricao' => '99999999999999',
            'valor' => 999999,
            'fk_cliente' => 5,
            'recebido' => true,
            'dateTime' => dateTime(),
        );
        $conta->update(5, $teste2);
        pre($conta->getAll());
        pre($conta->get(5));
        //$this->pagina();

	}
}