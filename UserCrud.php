<?php

class UserCrud
{
    //Properties
    private $crud;
    public $sql = '';
    public $params = '';

    //Dependency Injection
    __construct($crud)
    {
        $this -> crud = crud;
    }

    //Methods
    private function createUser($user) 
    {
        $this -> sql = "INSERT INTO users (name, email, password)
                        VALUES (':name', ':email', ':password')";
        $this -> params = array(':name' => '$name', ':email', => '$email', ':password' => '$hashedPassword');
        createRow($this -> sql, $this -> params);
    }
    private function readUserByEmail() //checken of het e-mailadres al bestaat
    {}
    private function readUserPasswordByEmail() //checken of login klopt
    {}
    private function readUserPasswordById() //checken of het oude wachtwoord klopt 
    {}
    private function updateUserPassword()
    {}
}

?>