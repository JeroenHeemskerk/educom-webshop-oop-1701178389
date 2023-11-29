<?php

require_once "../views/ConfirmedDoc.php";

$data = array ("page"=>"Confirmed");
$view = new ConfirmedDoc($data);
$view->show();

?>