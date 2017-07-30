<?php
/**
 * @author Peter Clayder
 */

namespace app\controller;

use app\models\Cliente as ClienteModel;

/**
 * Class Cliente
 * @package app\controller
 */
class Cliente extends Controller
{
    /**
     * Cliente constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->pasta = "cliente";
    }

    /**
     * Página listar clientes.
     * @return void
     */
    public function index()
    {
        $this->carregarCss();
        $this->carregarJs();
        $cliente = new ClienteModel();
        $dados['clientes'] = $cliente->getAll();
        $this->pagina("clientes", $dados);
    }

    /**
     * Controlador que efetua a ação de excluir um cliente.
     * @return void
     */
    public function delete()
    {
        if (requisicao() === "POST") {
            $id = (isset($_POST['id'])) ? $_POST['id'] : 0;
            $id = (int)$id;
            $cliente = new ClienteModel();
            if ($cliente->delete($id)) {
                flashData("excluirCliente", mensagemAlerta("success", "Cliente excluído com sucesso"));
            } else {
                flashData("excluirCliente", mensagemAlerta("danger", "Cliente não foi excluído"));
            }
            redirect("cliente", "index");

        } else {
            redirect("cliente", "index");
        }
    }

    /**
     * Página editar cliente.
     * @return void
     */
    public function editar()
    {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $cliente = new ClienteModel();
            $dados['cliente'] = $cliente->get($id);
            $this->pagina("form-edit-cliente", $dados);
        } else {
            redirect("cliente", "index");
        }

    }

    /**
     * Página cadastrar cliente.
     * @return void
     */
    public function cadastrar()
    {
        $this->pagina("form-cadastrar-cliente");
    }

    /**
     * Controlador que efetua o cadastro de cliente.
     * @return void
     */
    public function realizarCadastro()
    {
        if (isset($_POST['nome'])) {
            $nome = $_POST['nome'];
            $cliente = new ClienteModel();
            $dados = array(
                'nome' => $nome,
                'dateTime' => dateTime()
            );
            if ($cliente->insert($dados)) {
                flashData("cadastrarCliente", mensagemAlerta("success", "Cliente cadastrado com sucesso"));
            } else {
                flashData("cadastrarCliente", mensagemAlerta("danger", "Cliente não foi cadastrado"));
            }
        } else {
            flashData("cadastrarCliente", mensagemAlerta("danger", "Campo nome obrigatório."));
        }

        redirect("cliente", "cadastrar");

    }

    /**
     * Controlador que efetua a edição dos dados do cliente.
     * @return void
     */
    public function realizarEdicao()
    {
        if (requisicao() === "POST") {
            $id = (isset($_POST['id'])) ? $_POST['id'] : 0;
            $id = (int)$id;
            if (isset($_POST['nome'])) {
                $nome = $_POST['nome'];
                $cliente = new ClienteModel();
                if ($cliente->update($id, $nome)) {
                    flashData("editarCliente", mensagemAlerta("success", "Cliente editado com sucesso"));
                } else {
                    flashData("editarCliente", mensagemAlerta("danger", "Cliente não foi editado"));
                }
            } else {
                flashData("editarCliente", mensagemAlerta("danger", "Campo nome obrigatório."));
            }

            redirect("cliente", "editar", "id=" . $id);

        } else {
            redirect("cliente", "index");
        }
    }
}