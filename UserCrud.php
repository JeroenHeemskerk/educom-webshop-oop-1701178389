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
    //Checken of het e-mailadres al bestaat
    private function readUserByEmail($email) 
    {
        $sql = "SELECT name FROM users WHERE email = :email";
        $params = array('email' => $email);
        $this -> crud -> ReadOneRow($sql, $params);
        //? Hoe stuur ik nu het RESULT terug naar het UserModel?

    }

    private function createUser($email, $name, $password) 
    {
        $sql = "INSERT INTO users (name, email, password)
                VALUES (:name, :email, :password)";
        $params = array('name' => $name, 'email', => $email, 'password' => $hashedPassword);
        $this -> crud -> createRow($sql, $params);
    }

    //Checken of login klopt
    private function readUserPasswordByEmail() 
    {
        $sql = "SELECT id, name, password FROM users WHERE email = :email";
        $params = array('email' = $email);
        $this -> crud -> ReadOneRow($sql, $params);
        //? Hoe stuur ik nu het RESULT terug naar het UserModel?
    }
    
    private function readUserPasswordById()
    {
        $sql = "SELECT id, name, password FROM users WHERE id = :id";
        $params = array('id' = $userId);
        $this -> crud -> ReadOneRow($sql, $params);
        //? Hoe stuur ik nu het RESULT terug naar het UserModel?
    }

    private function updateUserPassword($oldPassword, $password)
    {
        $sql = "UPDATE users SET password = :password WHERE id = :id and password = :oldPassword";
        $params = array('password' => $password, 'userId' => $userId, 'oldPassword' => $oldPassword);
        $this -> crud -> UpdateRow($sql, $params);
    }
}

?>