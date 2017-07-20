<?php
namespace app\database;
use \PDO;
class Bd extends Driver
{
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @param string $tabela
     * @return array
     */
    public function getAll($tabela)
    {
        try{
            $sql = "SELECT * FROM $tabela";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $dados = $stm->fetchAll(\PDO::FETCH_OBJ);
            return $dados;
        }catch(PDOException $erro){
            self::erro($erro);
        }
    }

    /**
     * @param \PDOException $erro
     */
    public static function erro($erro){
        echo "<script>alert('Erro: {$erro->getMessage()}')</script>";
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM vocabulario WHERE id = ?");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return $stmt->fetch(PDO::FETCH_OBJ);
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            self::erro($erro);
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