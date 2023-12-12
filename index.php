<?php
session_start();
require_once("controllers/PageController.php");
require_once("Crud.php");

$controller = new PageController();
$controller -> handleRequest();

//$crud = new crud();

//$crudFactory = new CrudFactory($crud);
//$modelFactory = new ModelFactory($crud);
?>