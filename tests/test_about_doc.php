<?php

require_once "../views/AboutDoc.php";

$data = array ("page"=>"about");
$view = new AboutDoc($data);
$view->show();

?>