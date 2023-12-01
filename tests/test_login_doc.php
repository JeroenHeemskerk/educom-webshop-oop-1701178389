<?php
require_once "../views/LoginDoc.php";

$data = array ("page"=>"Login",
                "email"=>"",
                "emailErr"=>"",
                "password"=>"",
                "passwordErr"=>"");
$view = new LoginDoc($data);
$view->show();

?>