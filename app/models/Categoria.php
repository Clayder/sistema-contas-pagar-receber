<?php
/**
 * @author Peter Clayder
 */
namespace app\models;
use app\database\Bd;

/**
 * Class Categoria
 * @package app\models
 */
class Categoria extends Model
{
    /**
     * Categoria constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tabela = "categoria";
    }

    /**
     * @param array $arrayDados
     * @return bool
     */
    public function insert($arrayDados)
    {
        if($arrayDados['nome'] == ''){
            flashData("cadastrarCategoriaValid", mensagemAlerta("danger", "Campo nome obrigatório."));
            return false;
        }else{
            try {
                $sql = "INSERT INTO ".$this->tabela." (nome, dateTime) VALUES (:nome, :dateTime);";
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
        if($nome == ''){
            flashData("editarCategoriaValid", mensagemAlerta("danger", "Campo nome obrigatório."));
            return false;
        }else{
            $dateTime = dateTime();
            try {
                $sql = "UPDATE ".$this->tabela." SET nome=?, dateTime=? WHERE id=?";
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
    public function delete($id){

        // verifica se a Categoria é chave estrangeira da tabela pagar
        $existeCategoriaPagar = $this->getCategoriaPagar($id);

        if($existeCategoriaPagar){
            flashData("excluirCategoriaFk", mensagemAlerta("warning", "Não foi possível excluír esse Categoria, pois ele está relacionado a alguma conta (pagar/receber)"));
            return false;
        }else{
            return parent::delete($id);
        }
        
    }

    /**
     * @param int $id
     * @return object
     */
    public function getCategoriaPagar($id){
        return $this->bd->get("pagar", array('campo' => "fkCategoria", 'busca' => $id));
    }

    /**
     * Retorna o total de valor pago por categoria
     * @return array
     */
    public function totalValorPgCategoria(){
        $dados = array();
        try {
            $sql = "SELECT categoria.nome, categoria.id, SUM(pagar.valor) as total from categoria
                    INNER JOIN pagar on pagar.fkCategoria = categoria.id
                    WHERE pagar.pago = 1
                    GROUP BY categoria.id
                    ORDER BY total desc";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $dados = $stm->fetchAll(\PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            self::erro($erro);
        }
        return $dados;
    }

    /**
     * Cria o gráfico de pizza.
     * @return array
     */
    public function graficoPizza(){
        $categorias = $this->totalValorPgCategoria();
        $setores = array();
        $tam = count($categorias);
        // criar o setor outros
        if($tam > 5){
            $soma = 0;
            for($i = 0; $i < 4; $i++) {
                $setores[] = $categorias[$i];
            }
            for($i = 4; $i < $tam; $i++) {
                $soma = $soma + $categorias[$i]->total;
            }
            $setores[4] = (Object)array(
                'nome' => "Outros",
                'id' => 0,
                'total' => $soma
            );
        }else{
            $setores = $categorias;
        }
        $qtdSetores = count($setores);
        $grafico = array();
        for($i = 0; $i < $qtdSetores; $i++){
            $grafico['nomeSetores'][] = $setores[$i]->nome;
            $grafico['valores'][] = $setores[$i]->total;
        }

        return $grafico;
    }
}