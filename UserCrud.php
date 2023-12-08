<?php

class UserCrud
{
    //Properties
    private $crud;
    
    //Dependency Injection
    __construct($crud)
    {
        $this -> crud = crud;
    }

    //Methods
    private function createUser($user) 
    {
        $sql = "INSERT INTO users (name, email, password)
                VALUES (:name, :email, :password)";
        $params = array('name' => $name, 'email', => $email, 'password' => $hashedPassword);
        $this -> crud -> createRow($sql, $params);
    }
    private function readUserByEmail() //checken of het e-mailadres al bestaat
    {
        $sql = "SELECT name FROM users WHERE email = :email";
        $params = array('email' => $email);
        $this -> crud -> ReadOneRow($sql, $params);

    }
    private function readUserPasswordByEmail() //checken of login klopt
    {
        $sql = "SELECT id, name, password FROM users WHERE email = :email";
        $params = array('email' = $email);
        $this -> crud -> ReadOneRow($sql, $params);
    }
    private function readUserPasswordById() //checken of het oude wachtwoord klopt 
    {
        $sql = "SELECT password FROM users WHERE id = :userId AND password = :password";
        $params = array('userId' => $userId, 'password' => $oldPassword);
        $this -> crud -> ReadOneRow($sql, $params);
    }
    private function updateUserPassword()
    {
        $sql = "UPDATE users SET password = :password WHERE id = :id and password = :oldPassword";
        $params = array('password' => $password, 'userId' => $userId, 'oldPassword' => $oldPassword);
        $this -> crud -> UpdateRow($sql, $params);
    }
}

?>