<?php
require_once "../views/ShopDoc.php";

$data = array ("page"=>"Shop",
                "item"=> array(
                array('id' => '1', 'filename' => 'Unlock!_10.png', 'name' => 'Unlock! 10', 'price' => '19.95', 'description' => 'Een leuk spel'),
                array('id' => '2', 'filename' => 'Turing_machine.png', 'name' => 'Turing Machine', 'price' => '39.95', 'description' => 'Een leuk spel'),
                array('id' => '3', 'filename' => 'de_crew.png', 'name' => 'De Crew', 'price' => '9.95', 'description' => 'Een leuk spel'),
                array('id' => '4', 'filename' => 'Fabelfruit.png', 'name' => 'Fabelfruit', 'price' => '24.95', 'description' => 'Een leuk spel'),
                array('id' => '5', 'filename' => 'paleo.png', 'name' => 'Paleo', 'price' => '39.95', 'description' => 'Een leuk spel')));
$view = new ShopDoc($data);
$view->show();

?>