<?php
/**
 * @author Peter Clayder
 */

namespace app\controller;

use app\models\ContaReceber as Receber;
use app\models\Cliente;

/**
 * Class ContaReceber
 * @package app\controller
 */
class ContaReceber extends Controller
{
    /**
     * @var Receber
     */
    private $receber;

    /**
     * ContaReceber constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->pasta = "receber";
        $this->receber = new Receber();
    }

    /**
     * Página listar contas a receber.
     * @param array $dados recebe os resultados da pesquisa
     * @return void
     */
    public function index($dados = array())
    {
        $this->carregarCss();
        $this->carregarJs();
        if (!$dados) {
            $dados['contasReceber'] = $this->receber->getAll();
        }
        $this->pagina("receber", $dados);

    }

    /**
     * Página cadastrar conta a receber.
     * @return void
     */
    public function cadastrar()
    {
        $this->setScripFooter("<script src=\"" . baseUrl("assets/js/formularios/formulario-conta.js") . "\"></script> \n");
        $cliente = new Cliente();
        $dados['clientes'] = $cliente->getAll();
        $this->pagina("form-cadastrar-receber", $dados);
    }

    /**
     * Página editar conta a receber.
     * @return void
     */
    public function editar()
    {
        if (isset($_GET['id'])) {
            $this->setScripFooter("<script src=\"" . baseUrl("assets/js/formularios/formulario-conta.js") . "\"></script> \n");
            $id = (int)$_GET['id'];
            $cliente = new Cliente();
            $dados['clientes'] = $cliente->getAll();
            $dados['conta'] = $this->receber->get($id);
            $this->pagina("form-edit-receber", $dados);
        } else {
            redirect("ContaReceber", "index");
        }
    }

    /**
     * Controlador que faz o cadastro de contas a receber.
     * @return void
     */
    public function realizarCadastro()
    {
        if (requisicao() === "POST") {
            $valor = (isset($_POST['valor'])) ? $_POST['valor'] : 0;
            $dados = array(
                'dataRecebimento' => (isset($_POST['dataRecebimento'])) ? $_POST['dataRecebimento'] : "",
                'descricao' => (isset($_POST['descricao'])) ? $_POST['descricao'] : "",
                'valor' => convertMonetario("double", (string)$valor),
                'fk_cliente' => (isset($_POST['fk_cliente'])) ? $_POST['fk_cliente'] : 0,
                'recebido' => (isset($_POST['recebido'])) ? $_POST['recebido'] : 0,
            );
            if ($this->receber->insert($dados)) {
                flashData("cadastrarReceber", mensagemAlerta("success", "Conta cadastrada com sucesso"));
            } else {
                flashData("cadastrarReceber", mensagemAlerta("danger", "Conta não foi cadastrada"));
            }
            redirect("contaReceber", "cadastrar");
        } else {
            redirect("contaReceber", "index");
        }
    }

    /**
     * Realiza a ação de excluir conta a receber.
     * @return void
     */
    public function delete()
    {
        if (requisicao() === "POST") {
            $id = (isset($_POST['id'])) ? $_POST['id'] : 0;
            $id = (int)$id;
            if ($this->receber->delete($id)) {
                flashData("excluirReceber", mensagemAlerta("success", "Conta excluída com sucesso."));
            } else {
                flashData("excluirReceber", mensagemAlerta("danger", "Conta não foi excluída."));
            }
        }
        redirect("ContaReceber", "index");
    }

    /**
     * Controlador que faz a edição de contas a receber.
     * @return void
     */
    public function realizarEdicao()
    {
        if (requisicao() === "POST") {
            $id = (isset($_POST['id'])) ? $_POST['id'] : 0;
            $id = (int)$id;

            $valor = (isset($_POST['valor'])) ? $_POST['valor'] : 0;
            $dados = array(
                'dataRecebimento' => (isset($_POST['dataRecebimento'])) ? $_POST['dataRecebimento'] : "",
                'descricao' => (isset($_POST['descricao'])) ? $_POST['descricao'] : "",
                'valor' => convertMonetario("double", (string)$valor),
                'fk_cliente' => (isset($_POST['fk_cliente'])) ? $_POST['fk_cliente'] : 0,
                'recebido' => (isset($_POST['recebido'])) ? $_POST['recebido'] : 0,
            );

            if ($this->receber->update($id, $dados)) {
                flashData("editarReceber", mensagemAlerta("success", "Conta editada com sucesso"));
            } else {
                flashData("editarReceber", mensagemAlerta("danger", "Conta não foi editada"));
            }
            redirect("contaReceber", "editar", "id=" . $id);

        } else {
            redirect("contaReceber", "index");
        }
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

            $dados['contasReceber'] = $this->receber->filtroData(dateTimeSql($dataInicio, "Y-m-d"), dateTimeSql($dataFim, "Y-m-d"));
            $dados['resultadoBusca'] = "Resultado das contas entre " . $dataInicio . " e " . $dataFim;

            $this->index($dados);

        } else {
            redirect("ContaPagar", "index");
        }
    }

    /**
     * Realiza o recebimento de alguma conta.
     * @return void
     */
    public function efetuarRecebimento()
    {
        if (requisicao() === "POST") {
            $id = (isset($_POST['id'])) ? $_POST['id'] : 0;
            if ($this->receber->efetuarPagamento($id)) {
                flashData("efetuarReceb", mensagemAlerta("success", "Recebimento realizado com sucesso. "));
            } else {
                flashData("efetuarReceb", mensagemAlerta("danger", "A conta não foi paga."));
            }
        }
        redirect("contaReceber", "index");
    }
}