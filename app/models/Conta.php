<?php
/**
 * @author Peter Clayder
 */

namespace app\models;

/**
 * Class Conta
 * @package app\models
 */
abstract class Conta extends Model
{
    /**
     * Conta constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param string $dado
     * @param int $idFlashData
     * @return bool
     */
    protected function formValidacaoValor($dado, $idFlashData)
    {
        if ($dado === "" || $dado <= 0) {
            flashData($idFlashData, mensagemAlerta("danger", "Campo valor obrigatório."));
            return false;
        }
        return true;
    }

    /**
     * Soma os valores da coluna valor.
     * @return mixed
     */
    public function somarValores()
    {
        return $this->bd->sum($this->tabela, "valor");
    }

    /**
     * Retorna as contas que vão vencer até daqui 30 dias.
     * @param  string $where 
     * @return array
     */
    protected function contas30Dias($where)
    {
        $fuso = new \DateTimeZone("America/Sao_paulo");
        $data = new \DateTime('now');
        $data->setTimezone($fuso);
        $dataAtual = $data->format("Y-m-d");
        // Somar 30 dias no dia atual
        $data->add(new \DateInterval("P30D"));
        $data30dias = $data->format("Y-m-d");
        $dados = array();
        try {
            $sql = $this->sqlSelect();
            $sql = $sql . $where;
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(1, $dataAtual);
            $stm->bindValue(2, $data30dias);
            $stm->execute();
            $dados = $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            self::erro($erro);
        }
        return $dados;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function efetuarPagamento($id)
    {
        if ($this->tabela === "pagar") {
            $campo = "pago";
        } else {
            $campo = "recebido";
        }
        $dateTime = dateTime();
        try {
            $sql = "UPDATE " . $this->tabela . " SET " . $campo . "=1, dateTime=? WHERE id=?";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(1, $dateTime);
            $stm->bindValue(2, $id);
            $stm->execute();
            return true;
        } catch (PDOException $erro) {
            echo Bd::erro($erro);
            return false;
        }
    }

    /**
     * @param int $ano
     * @param string $where
     * @return array
     */
    protected function getContaAno($ano, $where)
    {
        $dados = array();
        try {
            $stm = $this->pdo->prepare($where);
            $stm->bindValue(1, $ano);
            $stm->execute();
            $dados = $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            self::erro($erro);
        }
        return $dados;
    }

    /**
     * @param date $dataInicio
     * @param date $dataFim
     * @param string $where
     * @return array
     */
    protected function filtroPorData($dataInicio, $dataFim, $where)
    {
        $dados = array();
        try {
            $sql = $this->sqlSelect();
            $sql = $sql . $where;
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(1, $dataInicio);
            $stm->bindValue(2, $dataFim);
            $stm->execute();
            $dados = $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            self::erro($erro);
        }
        return $dados;
    }

    /**
     * @param string $where
     * @return array
     */
    protected function returnAll($where)
    {
        $dados = array();
        try {
            $sql = $this->sqlSelect();
            $sql = $sql . $where;
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
     * @param string $where
     * @return array
     */
    public function getRow($id, $where)
    {
        $dados = array();
        try {
            $sql = $this->sqlSelect();
            $sql = $sql . $where;
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();
            $dados = $stm->fetchAll(\PDO::FETCH_OBJ);
            if (count($dados) > 0) {
                $dados = $dados[0];
            }
        } catch (PDOException $erro) {
            self::erro($erro);
        }
        return $dados;
    }
}