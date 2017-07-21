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

    /**
     * @return object
     */
    public function getAll()
    {
        return $this->bd->getAll($this->tabela);
    }

    /**
     * @param int $id
     * @return object
     */
    public function get($id)
    {
        return $this->bd->get($this->tabela, array('campo' => 'id', 'busca' => $id));
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->bd->delete($this->tabela, array("campo" => "id", "busca" => $id));
    }

}