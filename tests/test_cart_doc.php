<?php
require_once "../views/CartDoc.php";

$data = array ("page"=>"Cart");
$view = new CartDoc($data);
$view->show();

?>