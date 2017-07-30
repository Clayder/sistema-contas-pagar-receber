<?php
/**
 * @author Peter Clayder
 */

namespace app\models;

use app\database\Bd;

/**
 * Class Cliente
 * @package app\models
 */
class Cliente extends Model
{
    /**
     * Cliente constructor.
     */
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
        if ($arrayDados['nome'] == '') {
            flashData("cadastrarClienteValid", mensagemAlerta("danger", "Campo nome obrigatório."));
            return false;
        } else {
            try {
                $sql = "INSERT INTO " . $this->tabela . " (nome, dateTime) VALUES (:nome, :dateTime);";
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
    }

    /**
     * @param int $id
     * @param string $nome
     * @return bool
     */
    public function update($id, $nome)
    {
        if ($nome == '') {
            flashData("editarClienteValid", mensagemAlerta("danger", "Campo nome obrigatório."));
            return false;
        } else {
            $dateTime = dateTime();
            try {
                $sql = "UPDATE " . $this->tabela . " SET nome=?, dateTime=? WHERE id=?";
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

    /**
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $existeClientePagar = $this->getClientePagar($id);
        $existeClienteReceber = $this->getClienteReceber($id);
        // verifica se o cliente é chave estrangeira das tabelas pagar e receber
        if ($existeClientePagar || $existeClienteReceber) {
            flashData("excluirClienteFk", mensagemAlerta("warning", "Não foi possível excluír esse cliente, pois ele está relacionado a alguma conta (pagar/receber)"));
            return false;
        } else {
            return parent::delete($id);
        }

    }

    /**
     * @param $id
     * @return object
     */
    public function getClientePagar($id)
    {
        return $this->bd->get("pagar", array('campo' => "fkCliente", 'busca' => $id));
    }

    /**
     * @param $id
     * @return object
     */
    public function getClienteReceber($id)
    {
        return $this->bd->get("receber", array('campo' => "fk_cliente", 'busca' => $id));
    }

    /**
     * @return int
     */
    public function qtdClientes()
    {
        return $this->bd->countAll($this->tabela);
    }

}