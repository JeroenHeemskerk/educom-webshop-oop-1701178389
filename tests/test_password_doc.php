<?php

require_once "../views/PasswordDoc.php";

$data = array ("page"=>"Password");
$view = new PasswordDoc($data);
$view->show();

?>