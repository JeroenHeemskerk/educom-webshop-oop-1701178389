<?php

require_once "BasicDoc.php";

$data = array("page" =>"basic");
$view = new BasicDoc($data);
$view->show();

class AboutDoc extends BasicDoc {
    protected function showContent() {echo"<p>OverMij</>";}
}

?>