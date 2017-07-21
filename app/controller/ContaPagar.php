<?php

namespace app\controller;
use app\models\ContaPagar as Pagar;

class ContaPagar extends Controller
{
	public function index(){
        $teste = array(
            'vencimento' => '2016-02-01',
            'descricao' => 'asa sasa sas sas asas as',
            'valor' => 13.4,
            'fkCliente' => 5,
            'fkCategoria' => 7,
            'pago' => true,
            'dateTime' => dateTime(),
        );
        $conta = new Pagar();
        $conta->insert($teste);
        pre($conta->delete(7));
        //pre($conta->getAll());

        $teste2 = array(
            'vencimento' => '2016-09-09',
            'descricao' => '9999999',
            'valor' => 999.999,
            'fkCliente' => 9,
            'fkCategoria' => 9,
            'pago' => false,
            'dateTime' => dateTime(),
        );
        $conta->update(5, $teste2);
        //pre($conta->getAll());
        pre($conta->get(76));
		//$this->pagina();
	}
}