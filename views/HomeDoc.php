<?php

require_once "BasicDoc.php";

$data = array("page" =>"basic");
$view = new BasicDoc($data);
$view->show();

class HomeDoc extends BasicDoc {
    protected function showContent() {echo"<p>Welkom</>";}
}

?>