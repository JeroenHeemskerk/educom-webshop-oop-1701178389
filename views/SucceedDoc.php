<?php
require_once "BasicDoc.php";

class SucceedDoc extends BasicDoc {
    protected function showContent() {echo"<p>
        Uw bestelling is succesvol opgeslagen.<br>
        In uw e-mail ontvangt u zo spoedig mogelijk een bevestiging.
    </p>";}
}

?>