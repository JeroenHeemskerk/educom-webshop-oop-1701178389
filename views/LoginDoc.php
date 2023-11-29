<?php
require_once "FormDoc.php";

class LoginDoc extends FormDoc {
    protected function showFormContent() {
        echo '<div class="invoervelden">
        <label for="email">E-mailadres:</label>
            <input class="sw" type="text" id="email" name="email" placeholder="Typ hier uw e-mailadres" value="' . $data['email'] . '" > 
            <span class="error">' . $data['emailErr'] . '</span><br>
        <label for="password">Wachtwoord:</label>
            <input class="sw" type="password" id="password" name="password" placeholder="Typ hier uw wachtwoord" value="' . $data['password'] . '">
            <span class="error">' . $data['passwordErr'] . '</span><br>
        <br>   
    </div>
        <input class="knop" type="submit" Value="Inloggen">
        <input type="hidden" name="page" value="login"><br><br> 
    </div>';
    }
}
?>