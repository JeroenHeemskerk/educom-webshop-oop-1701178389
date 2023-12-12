<?php
require_once("models/PageModel.php");
require_once("UserCrud.php");

class ModelFactory 
{
    //Properties
    private $crud;
    private $model;

    //Methods
    public function createCrud($name)
    {
        switch ($name)
        {
            case "User":            
                return new UserCrud($this -> crud);
        }
    }

    public function createModel($name)
    {   
        switch ($name)
        {
            case "Page":
                return $this -> model = new PageModel(NULL);
            case "User":
                $userCrud = $this -> createCrud($name);
                return (new UserModel($this -> model, $userCrud));
        }
    }
}
?>