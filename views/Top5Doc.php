<?php
require_once "ItemDoc.php";

class Top5Doc extends ItemDoc {
    protected function showHeader()
    {
        echo 'Top 5';
    }
    protected function showContent()
    {
        $this -> showItem("top5", $this -> model -> items);
    }
}
?> 

