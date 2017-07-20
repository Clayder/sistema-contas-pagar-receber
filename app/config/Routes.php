<?php
/**
 * @author Peter Clayder
 */

namespace app\config;

use app\controller\Controller;

class Routes
{
    /**
     * @return void
     */
    public static function callController($class, $metodo)
    {
        // Converte para maiúscula o primeiro caractere de uma string
        $class = ucfirst($class);
        if (class_exists(PASTA_BASE_CONTROLLER . $class)) {
            eval('$controller = new ' . PASTA_BASE_CONTROLLER . $class . '() ;');
            if (method_exists(PASTA_BASE_CONTROLLER . $class, $metodo)) {
                eval('$controller->' . $metodo . '();');
            } else {
                \app\view\View::erro404();
            }
        } else {
            \app\view\View::erro404();
        }
    }
}
