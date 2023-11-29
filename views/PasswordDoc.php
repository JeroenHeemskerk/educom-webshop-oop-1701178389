<?php
require_once "FormDoc.php";

class PasswordDoc extends FormDoc {
    protected function showFormContent() {
    echo '<div class="invoervelden">
        <label for="password">Oude wachtwoord:</label>
            <input class="sw" type="password" id="password" name="password" placeholder="Typ hier uw oude wachtwoord" value="' . $data['password']; echo '">
                <span class="error">' . $data['passwordErr'] . '</span><br>
        <label for="newpassword">Nieuwe wachtwoord:</label>
            <input class="sw" type="password" id="newpassword" name="newpassword" placeholder="Typ hier uw nieuwe wachtwoord" value="' . $data['password']; echo '">
                <span class="error">' . $data['newpasswordErr'] . '</span><br>    
        <label for="passwordrep">Herhaal nieuw wachtwoord</label>
            <input class="sw" type="password" id="passwordrep" name="passwordrep" placeholder="Herhaal uw nieuwe wachtwoord" value="' . $data['passwordrep'] . '"> 
                <span class="error">' . $data['passwordrepErr'] . '</span><br>
        <br>
    </div>
    <div>
        <input class="knop" type="submit" Value="Wijzig wachtwoord">
        <input type="hidden" name="page" value="password"><br><br>
    </div>';
    }
}
?>