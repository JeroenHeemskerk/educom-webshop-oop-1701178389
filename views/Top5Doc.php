<?php
require_once "ItemDoc.php";

class Top5Doc extends ItemDoc {
    protected function showHeader()
    {
        echo 'Top 5';
    }
    protected function showContent()
    {
        $items = $this -> model -> getTop5();
        $this -> showItem("top5", $items);
    }
}
?> 

