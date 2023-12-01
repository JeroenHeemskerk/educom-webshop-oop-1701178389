<?php
require_once "FormDoc.php";

class PasswordDoc extends FormDoc {
    protected function showFormContent() {
        $this->showFormField('oldPassword', 'Oude wachtwoord:', 'password', 'Vul hier uw oude wachtwoord in');
        $this->showFormField('password', 'Nieuwe wachtwoord:', 'password', 'Vul hier uw nieuwe wachtwoord in');
        $this->showFormField('passwordRep', 'Herhaal nieuwe wachtwoord', 'password', 'Herhaal hier uw nieuwe wachtwoord');
    }
    
    protected function showContent() {
        $this->showOpenForm(); 
        $this->showFormContent();
        $this->showFormButton('Wachtwoord wijzigen', 'password');
        $this->showCloseForm(); 
    }
}
?>
