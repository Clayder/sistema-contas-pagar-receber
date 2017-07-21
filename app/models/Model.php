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

    /**
     * @var string
     */
    protected $tabela;

    public function __construct()
    {
        $this->bd = new Bd();
        $this->pdo = $this->bd->getPdo();
    }

    abstract public function insert($arrayDados);
    abstract  public function getAll();
    abstract public function get($id);
    abstract public function delete($id);

}