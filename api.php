<?php
require 'autoload.php';
if(isset($_GET['class']) && isset($_GET['metodo'])){
    $class = $_GET['class'];
    $metodo = $_GET['metodo'];
    \app\config\Routes::callController($class, $metodo);
}else{
    \app\view\View::erro404();
}
