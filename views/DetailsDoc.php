<?php
require_once "ItemDoc.php";

class DetailsDoc extends ItemDoc {
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