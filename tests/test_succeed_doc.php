<?php

require_once "../views/SucceedDoc.php";

$data = array ("page"=>"Succeed");
$view = new SucceedDoc($data);
$view->show();

?>