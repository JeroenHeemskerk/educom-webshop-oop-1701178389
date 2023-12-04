<?php
require_once "FormDoc.php";

class ContactDoc extends FormDoc {
    protected function showHeader()
    {
        echo 'Contact';
    }
    protected function showFormContent(){
        $this->showFormField('salut', 'Aanhef:', 'select', '', array('man'=> 'Dhr.', 'woman'=> 'Mvr.'));
        $this->showFormField('name', 'Naam:', 'text', 'Vul hier uw naam in');
        $this->showFormField('email', 'E-mailadres:', 'email', 'Vul hier uw e-mailadres in');
        $this->showFormField('tel', 'Telefoonnummer:', 'tel', 'Vul hier uw telefoonnummer in');
        $this->showFormField('str', 'Straatnaam:', 'text', 'Vul hier uw straatnaam in');
        $this->showFormField('strnr', 'Huisnummer:', 'text', 'Vul hier uw huisnummer in');
        $this->showFormField('zpcd', 'Postcode:', 'text', 'Vul hier uw postcode in');
        $this->showFormField('resid', 'Woonplaats:', 'text', 'Vul hier uw woonplaats in');
        $this->showFormField('com', 'Kies uw communicatievoorkeur:', 'radio', '', '', '', '', array('email'=>'E-mail', 'tel'=>'Telefoon', 'mail'=>'Post'));
        $this->showFormField('message', 'Waarover wilt u contact opnemen?', 'textarea', 'Vul hier uw vraag in', '', '4', '53');
    }

    protected function showContent() {
        $this->showOpenForm(); 
        $this->showFormContent();
        $this->showFormButton('Verstuur', 'contact');
        $this->showCloseForm(); 
    }
}


?>