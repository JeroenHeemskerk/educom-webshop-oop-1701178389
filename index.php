<?php
session_start();
require_once("controllers/PageController.php");
require_once("ModelFactory.php");
require_once("Crud.php");

$crud = new crud();
$modelFactory = new ModelFactory($crud);
//$crudFactory = new CrudFactory($crud);

$controller = new PageController($modelFactory);
$controller -> handleRequest();

?>