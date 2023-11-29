<?php
require_once "../views/Top5Doc.php";

$data = array ("page"=>"Top5");
$view = new Top5Doc($data);
$view->show();

?>