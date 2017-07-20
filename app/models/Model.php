<?php
namespace app\models;
use app\database\Bd;

abstract class Model
{
    /**
     * @var Bd
     */
    protected $bd;

    /**
     * @var \PDO
     */
    protected $pdo;
    public function __construct()
    {
        $this->bd = new Bd();
        $this->pdo = $this->bd->getPdo();
    }


}