<?php
require_once "../views/RegisterDoc.php";

$data = array ("page"=>"Register",
                "email"=>"",
                "emailErr"=>"",
                "password"=>"",
                "passwordErr"=>"", 
                "name"=>"",
                "nameErr"=>"",
                "passwordRep"=>"",
                "passwordRepErr"=>"");
$view = new RegisterDoc($data);
$view->show();

?>