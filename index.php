<?php
session_start();
require_once("PageController.php");

$controller = new PageController();
$controller -> handleRequest();
?>