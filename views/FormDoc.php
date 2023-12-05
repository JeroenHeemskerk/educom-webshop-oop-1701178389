<?php
require_once "BasicDoc.php";

 abstract class FormDoc extends BasicDoc {
    protected function showOpenForm() {echo '<form action="index.php" method="POST"><div class="invoervelden">';}
    protected function showCloseForm() {echo '</div></form>';}

    protected function showFormField($fieldName, $label, $type, $placeholder='', $options=NULL, $rows='', $cols='', $labels='')
    {
        $currentValue = $this -> model -> $fieldName;
        echo '<div><label for=' . $fieldName . '>' . $label . ' </label>';
        switch($type) {
            case "select":
                echo '<select class="sel" id="' . $fieldName . '" name="' . $fieldName . '">
                    <option value=""></option>' . PHP_EOL;
                foreach ($options as $key => $value) {
                    echo '<option value="' . $key . '"' . ($currentValue == $key ? ' selected = "selected"' : ' ') . '>' . $value . '</option>' . PHP_EOL;
                }  
                echo '</select>' . PHP_EOL;
                break;
            case "textarea": 
                echo    '<br><textarea name="' . $fieldName . '" rows="' . $rows . '" cols="' . $cols . '" placeholder="' . $placeholder . '">' . $currentValue . '</textarea><br>' . PHP_EOL;
                break;
            case "radio":
                echo '<br>';
                foreach ($labels as $key => $value) {
                    echo '<input type="' . $type . '" id="' . $key . '" name="' . $key . '" value="' . $value . '"' . ($currentValue == $key ? 'checked = "checked"' : '') . '>
                        <label for="' . $key . '">' . $value . '</label><br>';
                } echo '<br>';
                break;
            default:
                echo '<input class="inputField" type=' . $type . ' id="' . $fieldName . '" name="' . $fieldName . '" placeholder="' . $placeholder . '" value="' . $currentValue . '">' . PHP_EOL;
                break;
        }
        echo '<span class="error">' . ($this -> model -> {$fieldName . 'Err'}) . '</span></div>';
    }

    protected function showFormButton($buttonValue, $pageValue)
    {
        echo    '<br><input class="knop" type= "submit" value="' . $buttonValue . '">' . PHP_EOL . 
                '<input type="hidden" name="page" value="' . $pageValue . '"><br><br>' . PHP_EOL;
    }    
}
?> 