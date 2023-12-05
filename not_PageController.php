<?php
class not_PageController
{
    private $model;
    public function__construct()
    {
        $this -> model = new PageModel(NULL);
    }
    public function handleRequest() 
    {
        $this -> getRequest();
        $this -> processRequest();
        $this -> showResponse();
    }
    //From client
    private getRequest()
    {
        $this -> model -> getRequestedPage();
    }

    //Busniness 
    private processRequest()
    {
        switch ($this -> model -> page)
        {
            case "contact":
                $this -> model = new UserModel($this -> model);
                $model -> validateContact();
                if ($model ->valid) 
                {
                    $this -> model -> setPage("thanks");
                }
                break;
            case "register":
                $this -> model = new UserModel($this -> model);
                $model -> validateRegister();
                if ($model ->valid) 
                {
                    $this -> model -> storeUser();
                    $this -> model -> setPage("login");
                }
                break;  
            case "login":
                $this -> model = new UserModel($this -> model);
                $model -> validateLogin();
                if ($model ->valid) 
                {
                    $this -> model -> doLoginUser();
                    $this -> model -> setPage("home");
                }
                break;
            case "logout":
                $this -> model = new UserModel($this -> model);
                $this -> model -> doLogoutUser();
                $this -> model -> setPage("home");
                break;
            case "password":
                $this -> model = new UserModel($this -> model);
                $model -> validatePassword();
                if ($model ->valid) 
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
            case "Home":
                require_once("views/HomeDoc.php");
                $view = new HomeDoc($this -> model);
                break;
            case "About":
                require_once("views/AboutDoc.php");
                $view = new AboutDoc($this -> model);
                break;
            case "Contact":
                require_once("views/ContactDoc.php");
                $view = new ContactDoc($this -> model);
                break;
            case "Register":
                require_once("views/RegisterDoc.php");
                $view = new RegisterDoc($this -> model);
                break;
            case "Login":
                require_once("views/LoginDoc.php");
                $view = new LoginDoc($this -> model);
                break;
            case "Thanks":
                require_once("views/ThanksDoc.php");
                $view = new ThanksDoc($this -> model);
                break;
            case "Password":
                require_once("views/PasswordDoc.php");
                $view = new PasswordDoc($this -> model);
                break;
            case "Confirmed":
                require_once("views/ConfirmedDoc.php");
                $view = new ConfirmedDoc($this -> model);
                break;
            case "Shop":
                require_once("views/ShopDoc.php");
                $view = new ShopDoc($this -> model);
                break;
            case "Top5":
                require_once("views/Top5Doc.php");
                $view = new Top5Doc($this -> model);
                break;
            case "Details":
                require_once("views/DetailsDoc.php");
                $view = new DetailsDoc($this -> model);
                break;
            case "Cart":
                require_once("views/CartDoc.php");
                $view = new CartDoc($this -> model);
                break;
            case "Succeed":
                require_once("views/SucceedDoc.php");
                $view = new SucceedDoc($this -> model);
                break;
            default:
                require_once("views/NotFoundDoc.php")
                $view = new NotFoundDoc($this -> model);
                break;
        }
        $view -> show();
    }
}
?>