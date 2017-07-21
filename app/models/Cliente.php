<?php
/**
 * Created by PhpStorm.
 * User: clayder
 * Date: 20/07/17
 * Time: 15:19
 */

namespace app\models;

use app\database\Bd;

class Cliente extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = "cliente";
    }

    /**
     * @param array $arrayDados
     * @return bool
     */
    public function insert($arrayDados)
    {
        try {
            $sql = "INSERT INTO ".$this->tabela." (nome, dateTime) VALUES (:nome, :dateTime);";
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
     * @param int $id
     * @param string $nome
     * @return bool
     */
    public function update($id, $nome)
    {
        $dateTime = dateTime();
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