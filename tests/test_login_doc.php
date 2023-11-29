<?php

require_once "../views/LoginDoc.php";

$data = array ("page"=>"Login");
$view = new LoginDoc($data);
$view->show();

?>