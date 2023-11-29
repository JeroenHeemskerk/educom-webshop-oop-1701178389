<?php

require_once "../views/RegisterDoc.php";

$data = array ("page"=>"Register");
$view = new RegisterDoc($data);
$view->show();

?>