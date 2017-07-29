<?php

namespace app\view;
class View
{
	/**
     * @param string $view
    */
    private function inserir($view, $arrayDados = array()){
        /*
         * Transforma cada chave do array em uma variÃ¡vel
         * $dados = array(
         *  'titulo' => 'titulo da pagina',
         *  'conteudo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat felis id vehicula facilisis. Morbi porta nunc quam, quis bibendum turpis pulvinar eget. Morbi vel malesuada elit. ',
         *  );
         * Cria as variaveis $titulo e $conteudo
        */
        extract($arrayDados);
        
       include PASTA_BASE_VIEW.$view.".php";
    }

    /**
     * Insere o conteúdo do corpo da view. O conteúdo principal.
     * @return void
     */
    public function principal($view, $dados){
        $this->inserir("principal/".$view, $dados);
    }

    /**
     * @return void
     */
    public function footer($script){
        $dados['arrayScriptFooter'] = $script;
    	$this->inserir("componente/footer", $dados);
    }

    /**
     * @return void
     */
    public function header($script){
        $dados['arrayScript'] = $script;
    	$this->inserir("componente/header", $dados);
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