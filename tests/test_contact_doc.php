<?php

require_once "../views/ContactDoc.php";

$data = array ( "page"=>"Contact", 
                "salut"=>"", 
                "salutErr"=>"", 
                "name"=>"", 
                "nameErr"=>"", 
                "email"=>"",
                "tel"=>"",
                "telErr"=>"", 
                "emailErr"=>"",
                "mail"=>"",
                "mailErr"=>"",
                "str"=>"",
                "strErr"=>"",
                "strnr"=>"",
                "strnrErr"=>"",
                "resid"=>"",
                "residErr"=>"",
                "zpcd"=>"",
                "zpcdErr"=>"",
                "com"=>"", 
                "comErr"=>"",
                "message"=> "", 
                "messageErr"=>"",);
$view = new ContactDoc($data);
$view->show();

?>