<?php

require_once "../views/PasswordDoc.php";

$data = array ("page"=>"Password",
                "password"=>"",
                "passwordErr"=>"", 
                "oldPassword"=>"",
                "oldPasswordErr"=>"",
                "passwordRep"=>"",
                "passwordRepErr"=>"");
$view = new PasswordDoc($data);
$view->show();

?>