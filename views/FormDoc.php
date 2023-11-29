<?php
require_once "../views/BasicDoc.php";

abstract class FormDoc extends BasicDoc {
    abstract private function showOpenForm() {echo '<form action="index.php" method="POST">';}
    abstract protected function showFormContent() {}
    abstract private function showCloseForm() {echo '</form>';}

    abstract protected function showContent() {
        $this->showOpenForm(); 
        $this->showFormContent();
        $this->showCloseForm(); 
    }
}

?> 