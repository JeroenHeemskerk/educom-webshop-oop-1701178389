<?php
require_once "../views/ItemDoc.php";

$data = array ("page"=>"Item");
$view = new ItemDoc($data);
$view->show();

?>