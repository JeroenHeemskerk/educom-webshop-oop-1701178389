<?php
require_once "ItemDoc.php";

class ShopDoc extends ItemDoc {
    protected function showHeader()
    {
        echo 'Spellenwinkel';
    }
    protected function showContent()
    {
        $items = $this -> model -> getShopItems();
        $this -> showItem("shop", $items);
    }
}
?> 