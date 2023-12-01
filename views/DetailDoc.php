<?php
require_once "../views/ItemDoc.php";

class DetailDoc extends ItemDoc {
    protected function showContent()
    {
        $this->showItem("details", $this -> data['items']);
    }
}

?> 