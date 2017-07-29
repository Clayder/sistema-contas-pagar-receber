<?php
require 'autoload.php';
if (isset($_GET['class']) && isset($_GET['metodo'])) {
    $class = $_GET['class'];
    $metodo = $_GET['metodo'];
} else {
    $class = "Home";
    $metodo = "index";
}
\app\config\Routes::callController($class, $metodo);


