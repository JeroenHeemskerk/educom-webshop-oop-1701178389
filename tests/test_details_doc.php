<?php
require_once "../views/DetailDoc.php";

$data = array ("page"=>"Detail",
                "item"=> array(
                array('id' => '4', 'filename' => 'Fabelfruit.png', 'name' => 'Fabelfruit', 'price' => '24.95', 'description' => 'Een leuk spel')));
$view = new DetailDoc($data);
$view->show();

?>