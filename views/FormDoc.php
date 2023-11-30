<?php
require_once "../views/BasicDoc.php";

 class FormDoc extends BasicDoc {
    private function showOpenForm() {echo '<form action="index.php" method="POST"><div class="invoervelden">';}
    private function showCloseForm() {echo '</div></form>';}

    protected function showFormField($fieldName, $label, $type, $placeholder='', $options=NULL, $rows='', $cols='' )
    {
        $currentValue = $this->data[$fieldName];
        echo '<div><label for=' . $fieldName . '>' . $label . ':</label>';
        switch($type) {
            case "select":
                echo '<select class="sel" id="' . $fieldName . '" name="' . $fieldName . '">
                    <option value=""></option>' . PHP_EOL;
                foreach ($options as $key => $value) {
                    echo '<option value="' . $key . '"' . ($currentValue == $key ? ' selected="selected"' : ' ') . '>' . $value . '</option>' . PHP_EOL;
                }  
                echo '</select>' . PHP_EOL;
                break;
            case "textarea": 
                echo    '<br><textarea name="' . $fieldName . '" rows="' . $rows . '" cols="' . $cols . '" placeholder="' . $placeholder . '">' . $currentValue . '</textarea><br>' . PHP_EOL;
                break;
            //case "radio"              
            default:
                echo '<input type=' . $type . ' id="' . $fieldName . '" name="' . $fieldName . '" placeholder=' . $placeholder . ' value="' . $currentValue . '">' . PHP_EOL;
                break;
        }
        echo '<span class="error">' . $this->data[$fieldName . 'Err' ] . '</span></div>';
    }

    protected function showFormContent(){
        $this->showFormField('salut', 'Aaanhef', 'select', '', array('man'=> 'Dhr.', 'woman'=> 'Mvr.'));
        $this->showFormField('name', 'Naam', 'text', 'Vul hier uw naam in');
        $this->showFormField('email', 'E-mailadres', 'email', 'Vul hier uw naam in');
        $this->showFormField('message', 'Waarover wilt u contact opnemen?', 'textarea', 'Vul hier uw vraag in', '', '4', '53');
    }

    protected function showContent() {
        $this->showOpenForm(); 
        $this->showFormContent();
        $this->showCloseForm(); 
    }
}

?> 