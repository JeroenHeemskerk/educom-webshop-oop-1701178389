<?php
require_once "ItemDoc.php";

class Top5Doc extends ItemDoc {
    protected function showContent()
    {
        $this->showItem("top5", $this -> data['items']);
        
    }
}

?> 