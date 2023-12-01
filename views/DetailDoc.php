<?php
require_once "../views/ItemDoc.php";

class DetailDoc extends ItemDoc {
    protected function showHeader()
    {
        echo 'Details';
    }
    protected function showContent()
    {
        $this->showItem("details", $this -> data['items']);
    }
}

?> 