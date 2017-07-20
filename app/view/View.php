<?php

namespace app\view;
class View
{
	/**
     * @param string $view
    */
    private function inserir($view){
       include PASTA_BASE_VIEW.$view.".php";
    }

    /**
     * Insere o conteúdo do corpo da view. O conteúdo principal.
     * @return void
     */
    public function principal($view){
        $this->inserir("principal/".$view);
    }

    /**
     * @return void
     */
    public function footer(){
    	$this->inserir("componente/footer");
    }

    /**
     * @return void
     */
    public function header(){
    	$this->inserir("componente/header");
    }

    /**
     * @return void
     */
    public function menuFooter(){
    	$this->inserir("componente/menu-footer");
    }

    /**
     * @return void
     */
    public function menuProfile(){
    	$this->inserir("componente/menu-profile");
    }

    /**
     * @return void
     */
    public function sideBar(){
    	$this->inserir("componente/sidebar");
    }

    /**
     * @return void
     */
    public function topNavigation(){
    	$this->inserir("componente/top-navigation");
    }

    /**
     * @return void
     */
    public static function erro404()
    {
        include PASTA_BASE_VIEW."error/page_404".".php";
    }
}