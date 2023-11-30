<?php

require_once "../views/FormDoc.php";

$data = array ( "page"=>"Form", 
                "salut"=>"woman", 
                "salutErr"=>"Hier komt error", 
                "name"=>"", 
                "nameErr"=>"Hier komt error name", 
                "email"=>"sint@spanje.nl", 
                "emailErr"=>"",
                "message"=> "", 
                "messageErr"=>"Hier komt de error van text",
                "com"=>"", 
                "comErr"=>"Hier komt de error van de radio");
$view = new FormDoc($data);
$view->show();

?>