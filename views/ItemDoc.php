<?php
require_once "../views/BasicDoc.php";

class ItemDoc extends BasicDoc {
    private function getItemFromDb() {}
    protected function showId() {}
    protected function showName() {}
    protected function showImg() {}
    protected function showPrice() {}
    protected function showDescription() {}
    protected function showCartButton() {}      //Alleen als je bent ingelogd

    protected function showContent() {
        $this->showId(); 
        $this->showName();
        $this->showImg(); 
        $this->showPrice(); 
        $this->showDescription();
        $this->showCartButton();                //Alleen als je bent ingelogd
    }
}

?> 