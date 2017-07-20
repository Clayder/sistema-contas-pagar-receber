<?php
/**
 * @author Peter Clayder
 */
namespace app\controller;

use app\model\telegram\Bot;

class Dicionario extends Controller
{
    /**
     * @param array $dados
     * @return void
     */
    public function cadastrar($dados)
    {
        $data = new \DateTime();
        $dados['dateTime'] = $data->format("Y-m-d H:m:s");
        $this->db->insert($dados);
        $this->formCadastro();
    }

    /**
     * @return void
     */
    public function formCadastro()
    {
        $this->view("form-cadastro");
    }

    /**
     * @return void
     */
    public function getPalavra()
    {
        $qtdRegistros = $this->db->countAll();
        // Gera um número aleatório entre, 1 e o último Id
        $idRegistro = mt_rand(1, $qtdRegistros);
        $dados = $this->db->get($idRegistro);
        $mensagem = $dados['palavra']. ": ". $dados['palavraTraducao']."\n\n";
        $mensagem = $mensagem . $dados['frase']. ": ". $dados['fraseTraducao']."\n";
        $bot = new Bot();
        // envia a mensagem
        $bot->pacoteMensagem($mensagem);
    }

     /**
     * @return void
     */
    public function getMensagens(){
        $bot = new Bot();
        $bot->processMessage();
    }
}
