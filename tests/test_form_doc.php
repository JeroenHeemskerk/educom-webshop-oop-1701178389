<?php

require_once "../views/FormDoc.php";

$data = array ("page"=>"Form", "salut"=>"woman", "salutErr"=>"Hier komt error", "name"=>"", "nameErr"=>"Hier komt error name", "email"=>"sint@spanje.nl", "emailErr"=>"","message"=> "", "messageErr"=>"hier komt de error van ta");
$view = new FormDoc($data);
$view->show();

?>