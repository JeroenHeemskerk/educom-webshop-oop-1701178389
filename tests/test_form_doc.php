<?php

require_once "../views/FormDoc.php";

$data = array ("page"=>"Form");
$view = new FormDoc($data);
$view->show();

?>