<?php
require 'autoload.php';
/*
if(isset($_GET['class']) && isset($_GET['metodo'])){
    $class = $_GET['class'];
    $metodo = $_GET['metodo'];
    \app\config\Routes::callController($class, $metodo);
}else{
    \app\view\View::erro404();
}
*/

$uri = $_SERVER['REQUEST_URI'];
$exploded_uri = explode('/', $uri);

if(count($exploded_uri) < 3 ){
	echo "pagina nao encontrada";
}else{
	$class = $exploded_uri[1];
	$metodo = $exploded_uri[2];
	\app\config\Routes::callController($class, $metodo);
}

