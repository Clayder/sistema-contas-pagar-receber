<?php
/**
 * @author Peter Clayder
 */

namespace app\view;
/**
 * Class View
 * @package app\view
 */
class View
{
    /**
     * Insere o arquivo da view.
     * @param string $view
     * @param array $arrayDados
     * @return void
     */
    private function inserir($view, $arrayDados = array())
    {
        /*
         * Transforma cada chave do array em uma variÃ¡vel
         * $dados = array(
         *  'titulo' => 'titulo da pagina',
         *  'conteudo' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut volutpat felis id vehicula facilisis. Morbi porta nunc quam, quis bibendum turpis pulvinar eget. Morbi vel malesuada elit. ',
         *  );
         * Cria as variaveis $titulo e $conteudo
        */
        extract($arrayDados);

        include PASTA_BASE_VIEW . $view . ".php";
    }

    /**
     * Insere o conteúdo do corpo da view. O conteúdo principal.
     * @param string $view
     * @param array $dados
     * @return void
     */
    public function principal($view, $dados)
    {
        $this->inserir("principal/" . $view, $dados);
    }

    /**
     * @param string $script
     * @return void
     */
    public function footer($script)
    {
        $dados['arrayScriptFooter'] = $script;
        $this->inserir("componente/footer", $dados);
    }

    /**
     * @param string $script
     * @return void
     */
    public function header($script)
    {
        $dados['arrayScript'] = $script;
        $this->inserir("componente/header", $dados);
    }

    /**
     * @return void
     */
    public function menuFooter()
    {
        $this->inserir("componente/menu-footer");
    }

    /**
     * @return void
     */
    public function menuProfile()
    {
        $this->inserir("componente/menu-profile");
    }

    /**
     * @return void
     */
    public function sideBar()
    {
        $this->inserir("componente/sidebar");
    }

    /**
     * @return void
     */
    public function topNavigation()
    {
        $this->inserir("componente/top-navigation");
    }

    /**
     * @return void
     */
    public static function erro404()
    {
        include PASTA_BASE_VIEW . "error/page_404" . ".php";
    }
}