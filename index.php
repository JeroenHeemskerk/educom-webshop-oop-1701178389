<?php
session_start();
require_once("controllers/PageController.php");

$controller = new PageController();
$controller -> handleRequest();

//$crudFactory = new CrudFactory($crud);
//$modelFactory = new ModelFactory($crud);
?>