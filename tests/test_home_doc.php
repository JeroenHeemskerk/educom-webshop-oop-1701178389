<?php

require_once "../views/HomeDoc.php";

$data = array ("page"=>"home");
$view = new HomeDoc($data);
$view->show();

?>