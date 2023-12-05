<?php
class PageController
{
    private $model;
    public function __construct()
    {
        require_once("models/PageModel.php");
        $this -> model = new PageModel(NULL);
    }
    public function handleRequest() 
    {
        $this -> getRequest();
        $this -> processRequest();
        $this -> showResponse();
    }
    //From client
    private function getRequest()
    {
        $this -> model -> getRequestedPage();
    }

    //Business
    private function processRequest()
    {
        switch ($this -> model -> page)
        {
            case "contact":
                require_once("models/UserModel.php");
                $this -> model = new UserModel($this -> model);
                $this -> model -> validateContact();
                if ($this -> model -> valid) 
                {
                    $this -> model -> setPage('thanks');
                }
                break;
            case "register":
                require_once("models/UserModel.php");
                $this -> model = new UserModel($this -> model);
                $this -> model -> validateRegister();
                if ($this -> model -> valid) 
                {
                    $this -> model -> storeUser();
                    $this -> model -> setPage("login");
                }
                break;  
            case "login":
                require_once("models/UserModel.php");
                $this -> model = new UserModel($this -> model);
                $this -> model -> validateLogin();
                if ($this -> model -> valid) 
                {
                    //$this -> model -> doLoginUser();
                    $this -> model -> setPage("home");
                }
                break;
            case "logout":
                require_once("models/UserModel.php");
                $this -> model = new UserModel($this -> model);
                $this -> model -> doLogoutUser();
                $this -> model -> setPage("home");
                break;
            case "password":
                require_once("models/UserModel.php");
                $this -> model = new UserModel($this -> model);
                $this -> model -> validatePassword();
                if ($this -> model -> valid) 
                {
                    $this -> model -> updatePassword();
                    $this -> model -> setPage("confirmed");
                }  
                break;
        }
    }

    //To client
    private function showResponse() 
    {
        $this -> model -> createMenu();

        switch($this -> model -> page)
        {
            case "home":
                require_once("views/HomeDoc.php");
                $view = new HomeDoc($this -> model);
                break;
            case "about":
                require_once("views/AboutDoc.php");
                $view = new AboutDoc($this -> model);
                break;
            case "contact":
                require_once("views/ContactDoc.php");
                $view = new ContactDoc($this -> model);
                break;
            case "register":
                require_once("views/RegisterDoc.php");
                $view = new RegisterDoc($this -> model);
                break;
            case "login":
                require_once("views/LoginDoc.php");
                $view = new LoginDoc($this -> model);
                break;
            default:
                require_once("views/NotFoundDoc.php");
                $view = new NotFoundDoc($this -> model);
                break;
        }
        $view -> show();
    }
}
?>