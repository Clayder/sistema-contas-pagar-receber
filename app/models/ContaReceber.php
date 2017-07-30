<?php
/**
 * @author Peter Clayder
 */

namespace app\models;

/**
 * Class ContaReceber
 * @package app\models
 */
class ContaReceber extends Conta
{
    /**
     * ContaReceber constructor.
     */
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
        if (!$this->formValidacaoVencimento($arrayDados['dataRecebimento']) || !$this->formValidacaoValor($arrayDados['valor'], "recebValorValid")) {
            return false;
        } else {
            $dateTime = dateTime();
            try {
                $sql = "INSERT INTO " . $this->tabela . " (dataRecebimento, descricao, valor, fk_cliente, recebido, dateTime) VALUES (:dataRecebimento, :descricao, :valor, :fk_cliente, :recebido, :dateTime);";
                $sth = $this->pdo->prepare($sql);
                $sth->bindValue(':dataRecebimento', $arrayDados['dataRecebimento']);
                $sth->bindValue(':descricao', $arrayDados['descricao']);
                $sth->bindValue(':valor', $arrayDados['valor']);
                $sth->bindValue(':fk_cliente', $arrayDados['fk_cliente']);
                $sth->bindValue(':recebido', $arrayDados['recebido']);
                $sth->bindValue(':dateTime', $dateTime);
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
    }

    /**
     * @param int $id
     * @param array $arrayDados
     * @return bool
     */
    public function update($id, $arrayDados)
    {
        if (!$this->formValidacaoVencimento($arrayDados['dataRecebimento']) || !$this->formValidacaoValor($arrayDados['valor'], "recebValorValid")) {
            return false;
        } else {
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
    }

    /**
     * @param string $dado
     * @return bool
     */
    private function formValidacaoVencimento($dado)
    {
        if ($dado === "") {
            flashData("recebVencimentoValid", mensagemAlerta("danger", "Campo data de vencimento obrigatório."));
            return false;
        }
        return true;
    }

    /**
     * @return object
     */
    public function getAll()
    {
        return $this->returnAll(" ORDER BY dataRecebimento");
    }

    /**
     * @param int $id
     * @return object
     */
    public function get($id)
    {
        return $this->getRow($id, " WHERE receber.id=?");
    }

    /**
     * @return string
     */
    public function sqlSelect()
    {
        return "SELECT receber.id, receber.dataRecebimento, receber.descricao, receber.valor, receber.fk_cliente, receber.recebido, receber.dateTime, cliente.nome as cliente, cliente.id as idCliente  FROM receber
                LEFT JOIN cliente ON cliente.id = receber.fk_cliente";
    }

    /**
     * Retorna as contas que vão vencer até daqui 30 dias
     * @return array
     */
    public function contasReceber30Dias()
    {
        return $this->contas30Dias(" WHERE receber.dataRecebimento>=? AND receber.dataRecebimento<=? AND receber.recebido = 0");
    }

    /**
     * @param int $ano
     * @return array
     */
    public function graficoBarra($ano)
    {
        $where = "SELECT MONTH(receber.dataRecebimento) as mes, SUM(receber.valor) as total from receber
                    WHERE YEAR(receber.dataRecebimento) = ? AND receber.recebido = 1
                    GROUP BY MONTH(receber.dataRecebimento)
                    ORDER BY receber.dataRecebimento ASC";
        $dados = $this->getContaAno($ano, $where);
        $meses = array();
        $valores = array();
        foreach ($dados as $chave => $conteudo) {
            $meses[$conteudo->mes] = $conteudo->mes;
            $valores[$conteudo->mes - 1] = $conteudo->total;
        }
        for ($i = 1; $i <= 12; $i++) {
            if (!in_array($i, $meses)) {
                $valores[$i - 1] = 0;
            }
        }
        return $valores;
    }

    /**
     * @param date $dataInicio
     * @param date $dataFim
     * @return array
     */
    public function filtroData($dataInicio, $dataFim)
    {
        $where = " WHERE receber.dataRecebimento >=? AND receber.dataRecebimento <= ?";
        return $this->filtroPorData($dataInicio, $dataFim, $where);
    }
}