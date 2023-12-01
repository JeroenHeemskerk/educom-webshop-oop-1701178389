<?php
require_once "FormDoc.php";

class LoginDoc extends FormDoc {
    protected function showHeader()
    {
        echo 'Inloggen';
    }
    protected function showFormContent(){
        $this->showFormField('email', 'E-mailadres:', 'email', 'Vul hier uw e-mailadres in');
        $this->showFormField('password', 'Wachtwoord:', 'password', 'Vul hier uw wachtwoord in');
    }

    protected function showContent() {
        $this->showOpenForm(); 
        $this->showFormContent();
        $this->showFormButton('Inloggen', 'login');
        $this->showCloseForm(); 
    }
}
?>