<?php
require_once "../views/ShopDoc.php";

$data = array ("page"=>"Shop");
$view = new ShopDoc($data);
$view->show();

?>