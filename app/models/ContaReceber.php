<?php

namespace app\models;

class ContaReceber extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = "receber";
    }

    /**
     * @param array $arrayDados
     * @return bool
     */
    public function insert($arrayDados)
    {
        try {
            $sql = "INSERT INTO " . $this->tabela . " (dataRecebimento, descricao, valor, fk_cliente, recebido, dateTime) VALUES (:dataRecebimento, :descricao, :valor, :fk_cliente, :recebido, :dateTime);";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':dataRecebimento', $arrayDados['dataRecebimento']);
            $sth->bindValue(':descricao', $arrayDados['descricao']);
            $sth->bindValue(':valor', $arrayDados['valor']);
            $sth->bindValue(':fk_cliente', $arrayDados['fk_cliente']);
            $sth->bindValue(':recebido', $arrayDados['recebido']);
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
    public function update($id, $arrayDados)
    {
        $dateTime = dateTime();
        try {
            $sql = "UPDATE " . $this->tabela . " SET dataRecebimento=?, descricao=?, valor=?, fk_cliente=?, recebido=?, dateTime=? WHERE id=?";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(1, $arrayDados['dataRecebimento']);
            $sth->bindValue(2, $arrayDados['descricao']);
            $sth->bindValue(3, $arrayDados['valor']);
            $sth->bindValue(4, $arrayDados['fk_cliente']);
            $sth->bindValue(5, $arrayDados['recebido']);
            $sth->bindValue(6, $dateTime);
            $sth->bindValue(7, $id);
            $sth->execute();
            return true;
        } catch (PDOException $erro) {
            echo Bd::erro($erro);
            return false;
        }
    }

    /**
     * @return object
     */
    public function getAll()
    {
        $dados = array();
        try {
            $sql = $this->sqlSelect();
            $sql = $sql." ORDER BY dataRecebimento";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $dados = $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            self::erro($erro);
        }
        return $dados;
    }

    /**
     * @param int $id
     * @return object
     */
    public function get($id){
        $dados = array();
        try {
            $sql = $this->sqlSelect();
            $sql = $sql .  " WHERE receber.id=?";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();
            $dados = $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            self::erro($erro);
        }
        return $dados;
    }

    /**
     * @return string
     */
    private function sqlSelect(){
        return "SELECT receber.id, receber.dataRecebimento, receber.descricao, receber.valor, receber.fk_cliente, receber.recebido, receber.dateTime, cliente.nome as cliente, cliente.id as idCliente  FROM receber
                LEFT JOIN cliente ON cliente.id = receber.fk_cliente";
    }
}