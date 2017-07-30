<?php
/**
 * @author Peter Clayder
 */

namespace app\database;

use \PDO;

/**
 * Class Bd
 * @package app\database
 */
class Bd extends Driver
{
    /**
     * Bd constructor.
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * Retorna um array de objetos com todos os registros da tabela.
     * @param string $tabela
     * @return object
     */
    public function getAll($tabela)
    {
        $dados = array();
        try {
            $sql = "SELECT * FROM $tabela";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $dados = $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            self::erro($erro);
        }
        return $dados;
    }

    /**
     * @param \PDOException $erro
     * @return void
     */
    public static function erro($erro)
    {
        echo "<script>alert('Erro: {$erro->getMessage()}')</script>";
    }

    /**
     * @param string $id
     * @param array $where array('campo' => id, 'busca' => 1)
     * @return object
     */
    public function get($tabela, $where)
    {
        $result = (object)array();
        try {
            $campo = $where['campo'];
            $busca = $where['busca'];
            $stmt = $this->pdo->prepare("SELECT * FROM " . $tabela . " WHERE " . $campo . " = ?");
            $stmt->bindParam(1, $busca, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_OBJ);
            } else {
                throw new PDOException("<script>alert('Erro: Não foi possível executar a declaração sql')</script>");
            }
        } catch (PDOException $erro) {
            self::erro($erro);
        }
        return $result;
    }

    /**
     * Conta a quantidade de elementos de uma tabela.
     * @return int
     */
    public function countAll($tabela)
    {
        $find = $this->pdo->prepare('SELECT count(*) from ' . $tabela);
        $find->execute();
        return $find->fetchColumn();
    }

    /**
     * Excluí uma linha específica da tabela.
     * @param string $tabela
     * @param array $where array('campo' => id, 'busca' => 1)
     * @return boolean
     */
    public function delete($tabela, $where)
    {
        try {
            $sql = "DELETE FROM " . $tabela . " WHERE " . $where['campo'] . "=?";
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(1, $where['busca']);
            $stm->execute();
            return true;
        } catch (PDOException $erro) {
            echo self::erro($erro);
            return false;
        }
    }

    /**
     * Soma todos os elementos de uma coluna da tabela.
     * @param string $tabela
     * @param string $coluna
     * @param array $where array('busca'=> 1, 'campo'=> 'id')
     * @return mixed
     */
    public function sum($tabela, $coluna, $where = array())
    {
        if ($where) {
            $query = $this->pdo->prepare("SELECT sum(" . $coluna . ") FROM pagar WHERE " . $where['campo'] . " = ?");
            $query->bindValue(1, $where['busca']);
        } else {
            $query = $this->pdo->prepare("SELECT SUM(" . $coluna . ") FROM " . $tabela);
        }
        try {
            $query->execute();
            $total = $query->fetch(PDO::FETCH_NUM);
            $summ = $total[0]; // 0 is the first array. here array is only one.
            return $summ;
        } catch (PDOException $e) {
            echo self::erro($erro);
        }
    }
}