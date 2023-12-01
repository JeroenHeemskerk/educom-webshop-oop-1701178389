<?php
require_once "BasicDoc.php";

class NotFoundDoc extends BasicDoc {
    protected function showContent() {echo"<p>De gevraagde pagina kon helaas niet gevonden worden.</p>";}
}

?>