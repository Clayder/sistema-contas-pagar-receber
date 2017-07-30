<?php
/**
 * @author Peter Clayder
 */

namespace app\controller;

use app\models\ContaPagar as Pagar;
use app\models\Cliente;
use app\models\Categoria;

/**
 * Class ContaPagar
 * @package app\controller
 */
class ContaPagar extends Controller
{
    /**
     * @var Pagar
     */
    private $pagar;

    /**
     * ContaPagar constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->pasta = "pagar";
        $this->pagar = new Pagar();
    }

    /**
     * Página listar contas a pagar.
     * @param array $dados recebe os resultados da pesquisa
     * @return void
     */
    public function index($dados = array())
    {
        $this->carregarCss();
        $this->carregarJs();
        if (!$dados) {
            $dados['contas'] = $this->pagar->getAll();
        }
        $this->pagina("pagar", $dados);
    }

    /**
     * Realiza a ação de excluir conta a pagar.
     * @return void
     */
    public function delete()
    {
        if (requisicao() === "POST") {
            $id = (isset($_POST['id'])) ? $_POST['id'] : 0;
            $id = (int)$id;
            if ($this->pagar->delete($id)) {
                flashData("excluirPagar", mensagemAlerta("success", "Conta excluída com sucesso"));
            } else {
                flashData("excluirPagar", mensagemAlerta("danger", "Conta não foi excluída"));
            }
        }
        redirect("ContaPagar", "index");
    }

    /**
     * Página editar conta a pagar.
     * @return void
     */
    public function editar()
    {
        if (isset($_GET['id'])) {
            $this->setScripFooter("<script src=\"" . baseUrl("assets/js/formularios/formulario-conta.js") . "\"></script> \n");
            $id = (int)$_GET['id'];
            $cliente = new Cliente();
            $categoria = new Categoria();
            $dados['clientes'] = $cliente->getAll();
            $dados['conta'] = $this->pagar->get($id);
            $dados['categorias'] = $categoria->getAll();
            $this->pagina("form-edit-pagar", $dados);
        } else {
            redirect("ContaPagar", "index");
        }

    }

    /**
     * Página cadastrar conta a pagar.
     * @return void
     */
    public function cadastrar()
    {
        $this->setScripFooter("<script src=\"" . baseUrl("assets/js/formularios/formulario-conta.js") . "\"></script> \n");
        $cliente = new Cliente();
        $categoria = new Categoria();
        $dados['clientes'] = $cliente->getAll();
        $dados['categorias'] = $categoria->getAll();
        $this->pagina("form-cadastrar-pagar", $dados);
    }

    /**
     * Controlador que faz o cadastro de contas a pagar.
     * @return void
     */
    public function realizarCadastro()
    {
        if (requisicao() === "POST") {
            $valor = (isset($_POST['valor'])) ? $_POST['valor'] : 0;
            $dados = array(
                'vencimento' => (isset($_POST['vencimento'])) ? $_POST['vencimento'] : "",
                'descricao' => (isset($_POST['descricao'])) ? $_POST['descricao'] : "",
                'valor' => convertMonetario("double", (string)$valor),
                'fkCliente' => (isset($_POST['fkCliente'])) ? $_POST['fkCliente'] : 0,
                'fkCategoria' => (isset($_POST['fkCategoria'])) ? $_POST['fkCategoria'] : 0,
                'pago' => (isset($_POST['pago'])) ? $_POST['pago'] : 0,
            );
            if ($this->pagar->insert($dados)) {
                flashData("cadastrarPagar", mensagemAlerta("success", "Conta cadastrada com sucesso"));
            } else {
                flashData("cadastrarPagar", mensagemAlerta("danger", "Conta não foi cadastrada"));
            }

            redirect("contaPagar", "cadastrar");
        } else {
            redirect("contaPagar", "index");
        }

    }

    /**
     * Controlador que faz a edição de contas a pagar.
     * @return void
     */
    public function realizarEdicao()
    {
        if (requisicao() === "POST") {
            $id = (isset($_POST['id'])) ? $_POST['id'] : 0;
            $id = (int)$id;

            $valor = (isset($_POST['valor'])) ? $_POST['valor'] : 0;
            $dados = array(
                'vencimento' => (isset($_POST['vencimento'])) ? $_POST['vencimento'] : "",
                'descricao' => (isset($_POST['descricao'])) ? $_POST['descricao'] : "",
                'valor' => convertMonetario("double", (string)$valor),
                'fkCliente' => (isset($_POST['fkCliente'])) ? $_POST['fkCliente'] : 0,
                'fkCategoria' => (isset($_POST['fkCategoria'])) ? $_POST['fkCategoria'] : 0,
                'pago' => (isset($_POST['pago'])) ? $_POST['pago'] : 0,
            );
            if ($this->pagar->update($id, $dados)) {
                flashData("editarPagar", mensagemAlerta("success", "Conta editada com sucesso"));
            } else {
                flashData("editarPagar", mensagemAlerta("danger", "Conta não foi editada"));
            }
            redirect("contaPagar", "editar", "id=" . $id);

        } else {
            redirect("contaPagar", "index");
        }
    }

    /**
     * Realiza o pagamento de alguma conta.
     * @return void
     */
    public function efetuarPagamento()
    {
        if (requisicao() === "POST") {
            $id = (isset($_POST['id'])) ? $_POST['id'] : 0;
            if ($this->pagar->efetuarPagamento($id)) {
                flashData("efetuarPg", mensagemAlerta("success", "Pagamento realizado com sucesso. "));
            } else {
                flashData("efetuarPg", mensagemAlerta("danger", "A conta não foi paga."));
            }
        }
        redirect("contaPagar", "index");
    }

    /**
     * Realiza a busca de contas, pela data.
     * @return void
     */
    public function filtroData()
    {
        if (isset($_GET['datefilter'])) {
            $data = explode("-", $_GET['datefilter']);
            $dataInicio = trim($data[0]);
            $dataFim = trim($data[1]);
            $dados['contas'] = $this->pagar->filtroData(dateTimeSql($dataInicio, "Y-m-d"), dateTimeSql($dataFim, "Y-m-d"));
            $dados['resultadoBusca'] = "Resultado das contas entre " . $dataInicio . " e " . $dataFim;
            $this->index($dados);
        } else {
            redirect("ContaPagar", "index");
        }
    }
}