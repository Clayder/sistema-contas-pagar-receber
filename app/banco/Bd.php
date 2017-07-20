<?php
/**
 * @author Peter Clayder
 */
namespace app\banco;
use \PDO;
class Bd extends Driver
{
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @param array $arrayDados
     * @return bool
     */
    public function insert($arrayDados)
    {
        try {
            $sql = 'INSERT INTO vocabulario (palavra, palavraTraducao, frase, fraseTraducao, dateTime) VALUES (:palavra, :palavraTraducao, :frase, :fraseTraducao, :dateTime);';
            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':palavra', $arrayDados['palavra']);
            $sth->bindValue(':palavraTraducao', $arrayDados['palavraTraducao']);
            $sth->bindValue(':frase', $arrayDados['frase']);
            $sth->bindValue(':fraseTraducao', $arrayDados['fraseTraducao']);
            $sth->bindValue(':dateTime', $arrayDados['dateTime']);
            $sth->execute();
            if ($sth->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $e) {
            // O correto seria armazenar em um log
            echo "Erro ao inserir " . $e->getMessage();
        }

    }

    /**
     * @param int $id
     * @return array
     */
    public function get($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM vocabulario WHERE id = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $dados = array();
            if ($stmt->execute()) {
                $rs = $stmt->fetch(PDO::FETCH_OBJ);
                $dados = array(
                    "palavra" => $rs->palavra,
                    "palavraTraducao" => $rs->palavraTraducao,
                    "frase" => $rs->frase,
                    "fraseTraducao" => $rs->fraseTraducao,
                );
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
            return $dados;
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    }

    /**
     * @return int
     */
    public function countAll()
    {
        $find = $this->pdo->prepare('SELECT count(*) from vocabulario');
        $find->execute();
        return $find->fetchColumn();
    }
}