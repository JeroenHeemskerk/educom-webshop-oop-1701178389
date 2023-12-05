<?php
class UserModel extends PageModel 
{
    public $salut ='';
    public $name = '';
    public $email = '';
    public $tel = '';
    public $str ='';
    public $strnr ='';
    public $zpcd = '';
    public $resid = '';
    public $password = '';
    public $passwordRep = '';
    public $oldPassword = '';
    public $com = '';
    public $message = '';
    public $salutErr ='';
    public $nameErr = '';
    public $emailErr = '';
    public $telErr = '';
    public $strErr ='';
    public $strnrErr ='';
    public $zpcdErr = '';
    public $residErr = '';
    public $passwordErr = '';
    public $passwordRepErr = '';
    public $oldPasswordErr = '';
    public $comErr = '';
    public $messageErr = '';
    private $userId = 0;
    public $valid = false;

    public function __construct($PageModel) {
        PARENT::__construct($PageModel);
        PARENT::__construct(NULL);
    }
    
    //functie getAndClean maken
    private function getAndClean($key)
    {
        $value = $this -> getPostVar($key);
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $this -> $key = $value;
    }

    //Contact valideren
    public function validateContact()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {   
            $this -> getAndClean("salut");
            $this -> getAndClean("name");
            $this -> getAndClean("email");
            $this -> getAndClean("tel");
            $this -> getAndClean("str");
            $this -> getAndClean("strnr");
            $this -> getAndClean("zpcd");
            $this -> getAndClean("resid");
            $this -> getAndClean("com");
            $this -> getAndClean("message");
            if (empty($this -> salut)) {                       
                $this -> salutErr = "Aanhef is verplicht";
            } 
            if (empty($this -> name)) {
                $this -> nameErr = "Naam is verplicht";
            } else {
                if (!preg_match("/^[a-zA-Z-' ]*$/",$this -> name)) {
                    $this -> nameErr = "U kunt hier alleen letters invullen";
                } 
            }
            if (empty($this -> message)) {
                $this -> messageErr = "Vraag is verplicht";
            } 
            if (empty($this -> com)) {
                $this -> comErr = "Communicatievoorkeur is verplicht"; 
            } 
            if (empty($this -> email)) {
                if ($this -> com =="email") { 
                    $this -> emailErr = "E-mailadres is verplicht";
                }
            } else {
                if (!filter_var($this -> email, FILTER_VALIDATE_EMAIL)) {
                    $this -> emailErr = "Dit e-mailadres lijkt niet te kloppen";
                }
            }        
            
            if (empty($this -> tel)) {                                     
                if  ($this -> com =="tel"){
                    $this -> telErr = "Telefoonnummer is verplicht";
                }
            } else {
                if (!preg_match('/^[0-9 -+]+$/', $this -> tel)) { 
                        $this -> telErr = "Dit lijkt geen goed telefoonnummer";
                } 
            }       
            
            $adressIncomplete = false;
            $adressIncomplete = !empty($this -> str) || !empty($this -> strnr) || !empty($this -> zpcd) || !empty($this -> resid);                             
            if (empty($this -> str)) { 
                if ($this -> com =='mail') {                 
                    $this -> strErr = "Staatnaam is verplicht"; 
                }
                else if ($adressIncomplete) {
                    $this -> strErr = "Uw adresgegevens zijn onvolledig";
                }
            }
            if (empty($this -> strnr)) {
                if ($this -> com =='mail') {
                    $this -> strnrErr = "Huisnummer is verplicht";
                }
                else if ($adressIncomplete) {
                    $this -> strnrErr = "Uw adresgegevens zijn onvolledig";
                }
            }
            if (empty($this -> zpcd)) {
                if ($this -> com =='mail') {
                    $this -> zpcdErr = "Postcode is verplicht";
                }
                else if ($adressIncomplete) {
                    $this -> zpcdErr = "Uw adresgegevens zijn onvolledig";
                }
            } 
            if (empty($this -> resid)) {
                if ($this -> com =='mail') {
                    $this -> residErr = "Woonplaats is verplicht";
                }
                else if ($adressIncomplete) {
                    $this -> residErr = "Uw adresgegevens zijn onvolledig";
                }
            }
            if (empty($this -> salutErr) && empty($this -> nameErr) && empty($this -> comErr) && empty($this -> emailErr) && empty($this -> telErr) && empty($this -> strErr) && empty($this -> strnrErr) && empty($this -> zpcdErr) && empty($this -> residErr) && empty($this -> messageErr))
            {
                $this -> valid = true;
            }
        }
    }

    //Register valideren
    public function validateRegister()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $this -> getAndClean("name");
            $this -> getAndClean("email");
            $this -> getAndClean("password");
            $this -> getAndClean("passwordRep");

            if (empty($this -> name)) {
                $this -> nameErr = "Naam is verplicht";
            } else {
                if (!preg_match("/^[a-zA-Z-' ]*$/",$this -> name)) {
                    $this -> nameErr = "U kunt hier alleen letters invullen";
                }
            }
            if (empty($this -> email)) {
            }   else { 
                    require_once ('file_repository.php');                        
                    $userData = checkUserExist($this -> email); 
                    switch($userData['result']) {
                        case RESULT_USER_ALREADY_EXIST:
                            $this -> emailErr = "Dit e-mailadres is al in gebruik";
                            break;
                    }
                    if (empty($this -> emailErr)) {
                        if (!filter_var($this -> email, FILTER_VALIDATE_EMAIL)) {
                            $this -> emailErr = "Dit e-mailadres lijkt niet te kloppen"; 
                        }
                    } 
                }               
            if (empty($this -> password)) {
                $this -> passwordErr = "Wachtwoord is verplicht";
            }
            if (empty($this -> passwordRep)) {
                $this -> passwordRepErr = "Wachtwoord herhalen is verplicht";
            }
            if (($this -> password) != ($this -> passwordRep)) {
                        $this -> passwordRepErr = $this -> passwordErr= "Wachtwoorden komen niet overeen";
            }
            if (empty($this -> nameErr) && empty($this -> emailErr) && empty($this -> passwordErr) && empty($this -> passwordRepErr))
            {
                $this -> valid = true;
            }
        }
    }

    //Inloggen valideren
    public function validateLogin()
    {   
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {   
            $this -> getAndClean("email");
            $this -> getAndClean("password");

            if (empty($this -> email)) {
                $this -> emailErr = "E-mailadres is verplicht";
            }
                else {
                    if (!filter_var($this -> email, FILTER_VALIDATE_EMAIL)) {
                        $this -> emailErr = "Dit e-mailadres lijkt niet te kloppen";
                    }
                }          
            if (empty($this -> password)) {
                $this -> passwordErr = "Wachtwoord is verplicht";
            }                                                       
            else {
                require_once('file_repository.php');
                $userData = checkUserLogin($this -> email);   
                switch($userData['result']) {
                    case RESULT_OK:
                        $this -> valid = true;
                        $this -> userId = $userData['user']['id'];
                        $this -> name = $userData['user']['name'];
                        break;
                    case RESULT_UNKNOWN_USER:
                        $this -> emailErr = "Email adres niet bekend";
                        break;
                    case RESULT_WRONG_PASSWORD:
                        $this -> emailErr = $this -> passwordErr = "Onjuiste combinatie";
                        break;
                }    
            }
        }
    }
    
    //Wachtwoord valideren
    public function validatePassword()
    {

    }

}

?>