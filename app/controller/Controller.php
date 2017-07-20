<?php
/**
 * @author Peter Clayder
 */

namespace app\controller;
use app\banco\Bd;
abstract class Controller
{
    /**
     * @var Bd Bd
     */
    protected $db;

    public function __construct()
    {
        $this->db = new Bd();
    }

    /**
     * @param string $view
     */
    protected function view($view){
       include PASTA_BASE_VIEW."/".$view.".php";
    }
}