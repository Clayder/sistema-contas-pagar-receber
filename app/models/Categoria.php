<?php
/**
 * Created by PhpStorm.
 * User: clayder
 * Date: 20/07/17
 * Time: 21:25
 */

namespace app\models;

class Categoria extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = "categoria";
    }

    /**
     * @param array $arrayDados
     * @return bool
     */
    public function insert($arrayDados)
    {
        try {
            $sql = 'INSERT INTO ".$this->tabela." (nome, dateTime) VALUES (:nome, :dateTime);';
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':nome', $arrayDados['nome']);
            $sth->bindValue(':dateTime', $arrayDados['dateTime']);
            $sth->execute();
            if ($sth->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            Bd::erro($e);
        }
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

    /**
     * @param int $id
     * @param string $nome
     * @return bool
     */
    public function update($id, $nome)
    {
        $data = new \DateTime();
        $dateTime = $data->format("Y-m-d H:m:s");
        try {
            $sql = "UPDATE ".$this->tabela." SET nome=?, dateTime=? WHERE id=?";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(1, $nome);
            $stm->bindValue(2, $dateTime);
            $stm->bindValue(3, $id);
            $stm->execute();
            return true;
        } catch (PDOException $erro) {
            echo Bd::erro($erro);
            return false;
        }
    }
}