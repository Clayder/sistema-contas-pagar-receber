<?php
/**
 * @author Peter Clayder
 */
namespace app\banco;
use \PDO;
abstract class Driver
{
    /**
     * @var PDO
     */
    protected $pdo;

    /**
     * @return void
     */
    protected function connect(){
        try
        {
            $this->pdo = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            // Alerta de erro, se ocorrer algum problema
            $this->pdo -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch ( PDOException $e )
        {
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
    }

    /**
     * @return void
     */
    protected function disconnect(){
        $this->pdo = null;
    }
}