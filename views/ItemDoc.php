<?php
require_once "../views/BasicDoc.php";

abstract class ItemDoc extends BasicDoc {
    abstract private function getItemFromDb() {}
    abstract protected function showId() {}
    abstract protected function showName() {}
    abstract protected function showImg() {}
    abstract protected function showPrice() {}
    abstract protected function showDescription() {}
    abstract protected function showCartButton() {}      //Alleen als je bent ingelogd

    abstract protected function showContent() {
        $this->showId(); 
        $this->showName();
        $this->showImg(); 
        $this->showPrice(); 
        $this->showDescription();
        $this->showCartButton();                //Alleen als je bent ingelogd
    }
}

?> 