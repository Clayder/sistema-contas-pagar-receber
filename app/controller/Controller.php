<?php
/**
 * @author Peter Clayder
 */

namespace app\controller;
use app\view\View;
abstract class Controller
{
    /**
     * @var View
     */
    protected $view;

    /**
     * @var array Recebe todos os scripts que vão ser carregados na header
    */
    private $scriptHeader;

    /**
     * @var array Recebe todos os scripts que vão ser carregados no footer
    */
    private $scriptFooter;

    /**
     * @var String Recebe o nome da pasta relacionada a view.
     */
    protected $pasta;

    public function __construct()
    {
        $this->view = new View();
        $this->scriptHeader = array();
        $this->scriptFooter = array();
        flashDataVerifica();
    }

    protected function pagina($view, $dados = array()){
        $this->view->header($this->scriptHeader);
        $this->view->menuProfile();
        $this->view->sidebar();
        $this->view->menuFooter();
        $this->view->topNavigation();
        $this->view->principal($this->pasta."/".$view, $dados);
        $this->view->footer($this->scriptFooter);
    }

    protected function setScripHeader($script){
        $this->scriptHeader[] = $script;
    }

    protected function setScripFooter($script){
        $this->scriptFooter[] = $script;
    }


    public function carregarCss(){
        $this->setScripHeader(inserirCss("datatables.net-bs/css/dataTables.bootstrap.min.css"));
        $this->setScripHeader(inserirCss("datatables.net-buttons-bs/css/buttons.bootstrap.min.css"));
        $this->setScripHeader(inserirCss("datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"));
        $this->setScripHeader(inserirCss("datatables.net-responsive-bs/css/responsive.bootstrap.min.css"));
        $this->setScripHeader(inserirCss("datatables.net-scroller-bs/css/scroller.bootstrap.min.css"));
        $this->setScripHeader(inserirCss("bootstrap-daterangepicker/daterangepicker.css"));
        
    }

    public function carregarJs(){
        $this->setScripFooter(inserirJs("datatables.net/js/jquery.dataTables.min.js"));
        $this->setScripFooter(inserirJs("datatables.net-bs/js/dataTables.bootstrap.min.js"));
        $this->setScripFooter(inserirJs("datatables.net-buttons/js/dataTables.buttons.min.js"));
        $this->setScripFooter(inserirJs("datatables.net-buttons-bs/js/buttons.bootstrap.min.js"));
        $this->setScripFooter(inserirJs("datatables.net-buttons/js/buttons.flash.min.js"));
        $this->setScripFooter(inserirJs("datatables.net-buttons/js/buttons.html5.min.js"));
        $this->setScripFooter(inserirJs("datatables.net-buttons/js/buttons.print.min.js"));
        $this->setScripFooter(inserirJs("datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"));
        $this->setScripFooter(inserirJs("datatables.net-keytable/js/dataTables.keyTable.min.js"));
        $this->setScripFooter(inserirJs("datatables.net-responsive/js/dataTables.responsive.min.js"));
        $this->setScripFooter(inserirJs("datatables.net-responsive-bs/js/responsive.bootstrap.js"));
        $this->setScripFooter(inserirJs("datatables.net-scroller/js/dataTables.scroller.min.js"));
        $this->setScripFooter(inserirJs("jszip/dist/jszip.min.js"));
        $this->setScripFooter(inserirJs("pdfmake/build/pdfmake.min.js"));
        $this->setScripFooter(inserirJs("pdfmake/build/vfs_fonts.js"));
        $this->setScripFooter(inserirJs("moment/min/moment.min.js"));
        $this->setScripFooter(inserirJs("bootstrap-daterangepicker/daterangepicker.js"));
        $this->setScripFooter("<script src=\"".baseUrl("assets/js/intervaloData/config.js")."\"></script> \n");
    }




    
}