<?php

define("RESULT_OK", 0);
define("RESULT_UNKNOWN_USER", -1);
define("RESULT_WRONG_PASSWORD", -2);
define("RESULT_USER_ALREADY_EXIST", -3);
define("RESULT_REGISTER_OK", -4);

class UserCrud
{
    //Properties
    private $crud;
    
    //Dependency Injection
    public function __construct($crud)
    {
        $this -> crud = $crud;
    }

    //Methods
    //Checken of het e-mailadres al bestaat
    public function readUserByEmail($email) 
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = array('email' => $email);
        $checkUserExist = $this -> crud -> readOneRow($sql, $params);
        //var_dump($checkUserExist);
        if (!$checkUserExist) {
            return array('result' => RESULT_OK);
        } else {
            return array('result' => RESULT_USER_ALREADY_EXIST);
        }
    }

    public function createUser($email, $name, $password) 
    {
        $sql = "INSERT INTO users (name, email, password)
                VALUES (:name, :email, :password)";
        $params = array('name' => $name, 'email' => $email, 'password' => $password);
        $this -> crud -> createRow($sql, $params);
    }

    //Checken of login klopt
    public function readUserPasswordByEmail($email, $password) 
    {
        $sql = "SELECT id, name, password FROM users WHERE email = :email";
        $params = array('email' => $email);
        $userData = $this -> crud -> readOneRow($sql, $params);
        if ($userData) {
            if ($userData -> password == $password) {
                return array('result' => RESULT_OK, 'name' => $userData -> name, 'id' => $userData -> id);
            } else {
                return array('result' => RESULT_WRONG_PASSWORD);
            }
        } else {
            return array('result' => RESULT_UNKNOWN_USER);
        }
    }
        //? Hoe stuur ik nu het RESULT terug naar het UserModel?
    
    public function readUserPasswordById($userId, $password)
    {
        $sql = "SELECT id, name, password FROM users WHERE id = :id";
        $params = array('id' => $userId);
        $userData = $this -> crud -> readOneRow($sql, $params);
        echo'hij komt hier';
        if ($userData) {
            if ($userData -> password == $password) {
                return array('result' => RESULT_OK);
            } else {
                return array('result' => RESULT_WRONG_PASSWORD);
            }
        }
    }

    public function updateUserPassword($oldPassword, $password, $userId)
    {
        $sql = "UPDATE users SET password = :password WHERE id = :id and password = :oldPassword";
        $params = array('password' => $password, 'userId' => $userId, 'oldPassword' => $oldPassword);
        $this -> crud -> updateRow($sql, $params);
    }
}

?>