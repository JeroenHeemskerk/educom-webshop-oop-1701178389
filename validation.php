<?php

// CONTACT
function validateContact()
{
    // declareVariables
    $data = array("salut"=>"", "name"=>"", "com"=>"", "email"=>"", "tel"=>"", "str"=>"", "strnr"=>"", "zpcd"=>"", "resid"=>"", "message"=>"", "salutErr"=>"", "nameErr"=>"", "comErr"=>"", "emailErr"=>"", "telErr"=>"", "strErr"=>"", "strnrErr"=>"", "zpcdErr"=>"", "residErr"=>"", "messageErr"=>"", "valid" => false); 
    
    //varifyRequest
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $data = getAndCleanDataFromPost($data);
        $data = validateContactData($data); 
    }
    return $data;   
}

function getAndCleanDataFromPost($data) {
    $results = array();
    foreach(array_keys($data) as $key) {
        $value = getPostVar($key);
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $results[$key] = $value;
    }
    return $results;
}

function validateContactData($data)
{
    if (empty($data["salut"])) {                       
        $data['salutErr'] = "Aanhef is verplicht";
    } 
    if (empty($data['name'])) {
        $data['nameErr'] = "Naam is verplicht";
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/",$data['name'])) {
            $data['nameErr'] = "U kunt hier alleen letters invullen";
        } 
    }
    if (empty($data['message'])) {
        $data['messageErr'] = "Vraag is verplicht";
    } 
    if (empty($data['com'])) {
        $data['comErr'] = "Communicatievoorkeur is verplicht"; 
    } 
    if (empty($data['email'])) {
        if ($data['com'] =="E-mail") { 
            $data['emailErr'] = "E-mailadres is verplicht";
        }
    } else {
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['emailErr'] = "Dit e-mailadres lijkt niet te kloppen";
        }
    }        
    
    if ($data['com'] =="tel") {                                     
        if (empty($data['tel'])) {
            $data['telErr'] = "Telefoonnummer is verplicht";
        }
        else {
            if (!preg_match('/^[0-9 -+]+$/', $data['tel'])) { 
                $data['telErr'] = "Dit lijkt geen goed telefoonnummer";} 
            }        
    }       
    
    $adressIncomplete = false;
    $adressIncomplete = !empty($data['str']) || !empty($data['strnr']) || !empty($data['zpcd']) || !empty($data['resid']);                             
    if (empty($data['str'])) { 
        if ($data['com'] =='Mail') {                 
            $data['strErr'] = "Staatnaam is verplicht"; 
        }
        else if ($adressIncomplete) {
            $data['strErr'] = "Uw adresgegevens zijn onvolledig";
        }
    }
    if (empty($data['strnr'])) {
        if ($data['com'] =='Mail') {
            $data['strnrErr'] = "Huisnummer is verplicht";
        }
        else if ($adressIncomplete) {
            $data['strnrErr'] = "Uw adresgegevens zijn onvolledig";
        }
    }
    if (empty($data['zpcd'])) {
        if ($data['com'] =='Mail') {
            $data['zpcdErr'] = "Postcode is verplicht";
        }
        else if ($adressIncomplete) {
            $data['zpcdErr'] = "Uw adresgegevens zijn onvolledig";
        }
    } 
    if (empty($data['resid'])) {
        if ($data['com'] =='Mail') {
            $data['residErr'] = "Woonplaats is verplicht";
        }
        else if ($adressIncomplete) {
            $data['residErr'] = "Uw adresgegevens zijn onvolledig";
        }
    }
    if (empty($data['salutErr']) && empty($data['nameErr']) && empty($data['comErr']) && empty($data['emailErr']) && empty($data['telErr']) && empty($data['strErr']) && empty($data['strnrErr']) && empty($data['zpcdErr']) && empty($data['residErr']) && empty($data['messageErr']))
    {
        $data['valid'] = true;
    }
    return $data;
}  

//REGISTER
function validateRegister()
{
    // declareVariables
    $data = array("name"=>"","email"=>"", "password"=>"", "passwordRep"=>"", "nameErr"=>"","emailErr"=>"", "passwordErr"=>"", "passwordRepErr"=>"", "valid" => false); 
    
    //varifyRequest
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $data = getAndCleanDataFromPost($data);
        $data = validateRegisterData($data); 
    }
    return $data;   
}

function validateRegisterData($data)
{
    if (empty($data['name'])) {
        $data['nameErr'] = "Naam is verplicht";
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/",$data['name'])) {
            $data['nameErr'] = "U kunt hier alleen letters invullen";
        }
    }
    if (empty($data['email'])) {
        $data['emailErr'] = "E-mailadres is verplicht";
    }   else { 
            require_once ('file_repository.php');                        
            $data = checkUserExist($data);  
            if (empty($data['emailErr'])) {
                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['emailErr'] = "Dit e-mailadres lijkt niet te kloppen"; 
                }
            }
            
        }               
    if (empty($data['password'])) {
        $data['passwordErr'] = "Wachtwoord is verplicht";
    }
    if (empty($data['passwordRep'])) {
        $data['passwordRepErr'] = "Wachtwoord herhalen is verplicht";
    }
    if (($data['password']) != ($data['passwordRep'])) {
                $data['passwordRepErr'] = $data['passwordErr']= "Wachtwoorden komen niet overeen";
    }
    if (empty($data['nameErr']) && empty($data['emailErr']) && empty($data['passwordErr']) && empty($data['passwordRepErr']))
    {
        $data['valid'] = true;
    }
    return $data;
}    

//LOGIN
function validateLogin()
{
    // declareVariables
    $data = array("email"=>"", "password"=>"", "nameErr"=>"","emailErr"=>"", "passwordErr"=>"", "name" => "", "valid" => false); 
    //varifyRequest
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $data = getAndCleanDataFromPost($data);
        $data = validateLoginData($data); 
    }
    return $data;   
}

function validateLoginData($data)
{
    if (empty($data['email'])) {
        $data['emailErr'] = "E-mailadres is verplicht";
    }
        else {
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailErr'] = "Dit e-mailadres lijkt niet te kloppen";
            }
        }          
    if (empty($data['password'])) {
        $data['passwordErr'] = "Wachtwoord is verplicht";
    }                                                       
    else {
        require_once('file_repository.php');
        $data = checkUserLogin($data);                                                      
    }    
    return $data;
}

//Wachtwoord wijzigen
function validatePassword () 
{
    // declareVariables
    $data = array("oldPassword"=>"", "password"=>"", "passwordRep"=>"", "oldPasswordErr"=>"", "passwordErr"=>"", "passwordRepErr"=>"", "valid" => false, "userId" => $_SESSION["userId"]);
    //varifyRequest
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $data = getAndCleanDataFromPost($data);
        $data['userId'] = $_SESSION['userId'];
        $data = validatePasswordData($data); 
    }
    return $data;   
}

function validatePasswordData($data)
{
    if (empty($data['oldPassword'])) {
        $data['oldPasswordErr'] = "Oude wachtwoord is verplicht";
    } else {
            require_once('file_repository.php');
            $data = checkPassword($data);
        }
    if (empty($data['password'])) {
        $data['passwordErr'] = "Nieuw wachtwoord is verplicht";
    }
    if (empty($data['passwordRep'])) {
        $data['passwordRepErr'] = "Wachtwoord herhalen is verplicht";
    }
    if (($data['password']) != ($data['passwordRep'])) {
        $data['passwordRepErr'] = $data['passwordErr']= "Wachtwoorden komen niet overeen";
    }
    if (empty($data['oldPasswordErr']) && empty($data['passwordErr']) && empty($data['passwordRepErr']))
    {
        $data = updatePassword ($data);
    }
    return $data;
}
?>