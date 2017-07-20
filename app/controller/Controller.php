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

    public function __construct()
    {
        $this->view = new View();
    }

    protected function pagina(){
        $this->view->header();
        $this->view->menuProfile();
        $this->view->sidebar();
        $this->view->menuFooter();
        $this->view->topNavigation();
        $this->view->principal("grafico");
        $this->view->footer();
    }

    
}