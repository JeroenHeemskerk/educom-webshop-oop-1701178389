<?php
session_start();
require_once("controllers/PageController.php");
require_once("Factory.php");
require_once("Crud.php");

$crud = new crud();
$factory = new factory($crud);

$controller = new PageController($factory);
$controller -> handleRequest();

?>