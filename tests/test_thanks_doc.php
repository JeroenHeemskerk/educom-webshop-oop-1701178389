<?php

require_once "../views/ThanksDoc.php";

$data = array ("page"=>"Thanks");
$view = new ThanksDoc($data);
$view->show();

?>