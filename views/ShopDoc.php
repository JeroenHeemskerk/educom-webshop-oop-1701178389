<?php
require_once "ItemDoc.php";

class ShopDoc extends ItemDoc {
    protected function showHeader()
    {
        echo 'Spellenwinkel';
    }
    protected function showContent()
    {
        $this->showItem("shop", $this -> data['items']);
    }
}
?> 