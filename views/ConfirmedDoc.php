<?php
require_once "BasicDoc.php";

class ConfirmedDoc extends BasicDoc {
    protected function showHeader()
    {
        echo 'Geslaagd';
    }
    protected function showContent() {echo"<p>Uw wachtwoord is succesvol gewijzigd.</p>";}
}

?>