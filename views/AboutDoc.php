<?php
require_once "BasicDoc.php";

$data = array("page" =>"basic");

class AboutDoc extends BasicDoc {
    protected function showContent() {echo"<p>OverMij</>";}
}

?>