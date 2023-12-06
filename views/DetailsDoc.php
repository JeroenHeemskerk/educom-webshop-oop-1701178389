<?php
require_once "ItemDoc.php";

class DetailsDoc extends ItemDoc {
    protected function showHeader()
    {
        echo 'Details';
    }
    protected function showContent()
    {
        $items = $this -> model -> getDetails();
        $this->showItem("details", $items);
    }
}

?> 