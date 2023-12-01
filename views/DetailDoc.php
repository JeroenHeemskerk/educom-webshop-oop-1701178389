<?php
require_once "../views/ItemDoc.php";

class DetailDoc extends ItemDoc {
    protected function showContent()
    {
        $this->showItem("details", array(
            array('id' => '4', 'filename' => 'Fabelfruit.png', 'name' => 'Fabelfruit', 'price' => '24.95', 'description' => 'Een leuk spel')
        ));
    }
}

?> 