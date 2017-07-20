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
    /**
     * @param array $arrayDados
     * @return bool
     */
    public function insert($arrayDados)
    {
        try {
            $sql = 'INSERT INTO cliente (nome, dateTime) VALUES (:nome, :dateTime);';
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

    public function getAll()
    {
        return $this->bd->getAll("cliente");
    }
}