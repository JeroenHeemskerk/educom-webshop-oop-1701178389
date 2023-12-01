<?php
require_once "FormDoc.php";

class RegisterDoc extends FormDoc {
    protected function showHeader()
    {
        echo 'Aanmelden';
    }
    protected function showFormContent(){
        $this->showFormField('name', 'Naam:', 'text', 'Vul hier uw naam in');
        $this->showFormField('email', 'E-mailadres:', 'email', 'Vul hier uw e-mailadres in');
        $this->showFormField('password', 'Wachtwoord:', 'password', 'Vul hier uw wachtwoord in');
        $this->showFormField('passwordRep', 'Herhaal wachtwoord', 'password', 'Herhaal hier uw wachtwoord');
    }

    protected function showContent() {
        $this->showOpenForm(); 
        $this->showFormContent();
        $this->showFormButton('Aanmelden', 'register');
        $this->showCloseForm(); 
    }
}
?>
