<?php

namespace app\models;

class ContaPagar extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabela = "pagar";
    }

    /**
     * @param array $arrayDados
     * @return bool
     */
    public function insert($arrayDados)
    {
        try {
            $sql = "INSERT INTO " . $this->tabela . " (vencimento, descricao, valor, fkCliente, fkCategoria, pago, dateTime) VALUES (:vencimento, :descricao, :valor, :fkCliente, :fkCategoria, :pago, :dateTime);";
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':vencimento', $arrayDados['vencimento']);
            $sth->bindValue(':descricao', $arrayDados['descricao']);
            $sth->bindValue(':valor', $arrayDados['valor']);
            $sth->bindValue(':fkCliente', $arrayDados['fkCliente']);
            $sth->bindValue(':fkCategoria', $arrayDados['fkCategoria']);
            $sth->bindValue(':pago', $arrayDados['pago']);
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
    public function update($id, $dados)
    {
        $dateTime = dateTime();
        try {
            $sql = "UPDATE " . $this->tabela . " SET vencimento=?, descricao=?, valor=?, fkCliente=?, fkCategoria=?, pago=?, dateTime=? WHERE id=?";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(1, $dados['vencimento']);
            $stm->bindValue(2, $dados['descricao']);
            $stm->bindValue(3, $dados['valor']);
            $stm->bindValue(4, $dados['fkCliente']);
            $stm->bindValue(5, $dados['fkCategoria']);
            $stm->bindValue(6, $dados['pago']);
            $stm->bindValue(7, $dateTime);
            $stm->bindValue(8, $id);
            $stm->execute();
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
            $sql = $sql." ORDER BY vencimento";
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
            $sql = $sql .  " WHERE pagar.id=?";
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
        return "SELECT pagar.id, pagar.vencimento, pagar.descricao, pagar.valor, pagar.fkCliente, pagar.fkCategoria, pagar.pago, pagar.dateTime, cliente.nome as cliente, cliente.id as idCliente,categoria.nome as categoria, categoria.id as idCategoria  FROM pagar
                LEFT JOIN cliente ON cliente.id = pagar.fkCliente
                LEFT JOIN categoria ON categoria.id = pagar.fkCategoria";
    }

}