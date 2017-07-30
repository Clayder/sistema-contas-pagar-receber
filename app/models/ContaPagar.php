<?php
/**
 * @author Peter Clayder
 */

namespace app\models;

/**
 * Class ContaPagar
 * @package app\models
 */
class ContaPagar extends Conta
{
    /**
     * ContaPagar constructor.
     */
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
        if (!$this->formValidacaoVencimento($arrayDados['vencimento']) || !$this->formValidacaoValor($arrayDados['valor'], "pagValorValid")) {
            return false;
        } else {
            $dateTime = dateTime();
            try {
                $sql = "INSERT INTO " . $this->tabela . " (vencimento, descricao, valor, fkCliente, fkCategoria, pago, dateTime) VALUES (:vencimento, :descricao, :valor, :fkCliente, :fkCategoria, :pago, :dateTime);";
                $sth = $this->pdo->prepare($sql);
                $sth->bindValue(':vencimento', $arrayDados['vencimento']);
                $sth->bindValue(':descricao', $arrayDados['descricao']);
                $sth->bindValue(':valor', $arrayDados['valor']);
                $sth->bindValue(':fkCliente', $arrayDados['fkCliente']);
                $sth->bindValue(':fkCategoria', $arrayDados['fkCategoria']);
                $sth->bindValue(':pago', $arrayDados['pago']);
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
     * @param string $nome
     * @return bool
     */
    public function update($id, $dados)
    {
        if (!$this->formValidacaoVencimento($dados['vencimento']) || !$this->formValidacaoValor($dados['valor'], "pagValorValid")) {
            return false;
        } else {
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

    }

    /**
     * @param string $dado
     * @return bool
     */
    private function formValidacaoVencimento($dado)
    {
        if ($dado === "") {
            flashData("pagVencimentoValid", mensagemAlerta("danger", "Campo vencimento obrigatório."));
            return false;
        }
        return true;
    }

    /**
     * @return object
     */
    public function getAll()
    {
        return $this->returnAll(" ORDER BY vencimento");
    }

    /**
     * @param int $id
     * @return object
     */
    public function get($id)
    {
        return $this->getRow($id, " WHERE pagar.id=?");
    }

    /**
     * @return string
     */
    public function sqlSelect()
    {
        return "SELECT pagar.id, pagar.vencimento, pagar.descricao, pagar.valor, pagar.fkCliente, pagar.fkCategoria, pagar.pago, pagar.dateTime, cliente.nome as cliente, cliente.id as idCliente,categoria.nome as categoria, categoria.id as idCategoria  FROM pagar
                LEFT JOIN cliente ON cliente.id = pagar.fkCliente
                LEFT JOIN categoria ON categoria.id = pagar.fkCategoria";
    }

    /**
     * Retorna as contas que vão vencer até daqui 30 dias.
     * @return array
     */
    public function contasPagar30Dias()
    {
        return $this->contas30Dias(" WHERE pagar.vencimento>=? AND pagar.vencimento<=? AND pagar.pago = 0");
    }

    /**
     * @param int $ano
     * @return array
     */
    public function graficoBarra($ano)
    {
        $where = "SELECT MONTH(pagar.vencimento) as mes, SUM(pagar.valor) as total from pagar
                    WHERE YEAR(pagar.vencimento) = ? AND pagar.pago = 1
                    GROUP BY MONTH(pagar.vencimento)
                    ORDER BY pagar.vencimento ASC";
        $dados = $this->getContaAno($ano, $where);
        $meses = array();
        $valores = array();
        // Não existe mês zero
        $valores[0] = 0;
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
        $where = " WHERE pagar.vencimento >=? AND pagar.vencimento <= ?";
        return $this->filtroPorData($dataInicio, $dataFim, $where);
    }
}