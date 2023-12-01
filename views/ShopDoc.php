<?php
require_once "ItemDoc.php";

class ShopDoc extends ItemDoc {
    protected function showContent()
    {
        $this->showItem("shop", $this -> data['items']);
    }
}

?> 