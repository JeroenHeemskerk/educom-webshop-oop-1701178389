<?php

class PageController
{
    //Properties
    public $model;
    public $factory;
        
    //Methods
    public function __construct($factory)
    {
        $this -> factory = $factory;
        $this -> model = $this -> factory -> createModel('Page');
    }

    public function handleRequest() 
    {
        $this -> checkAjax();
        $this -> getRequest();
        $this -> processRequest();
        $this -> showResponse();
    }

    private function checkAjax()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : (isset($_POST['action']) ? $_POST['action'] : '');

        if ($action == 'ajax') {
            require_once "AjaxController.php";
            $ajaxController = new AjaxController($this -> factory);
            $ajaxController -> handleRequest();
            exit;
        }
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
                $this -> model = $this -> factory -> createModel('User');
                $this -> model -> validateContact();
                if ($this -> model -> valid) 
                {
                    $this -> model -> setPage('thanks');
                }
                break;
            case "register":
                require_once("models/UserModel.php");
                $this -> model = $this -> factory -> createModel('User');
                $this -> model -> validateRegister();
                if ($this -> model -> valid) 
                {
                    $this -> model -> createUser();
                    $this -> model -> setPage("login");
                }
                break;  
            case "login":
                require_once("models/UserModel.php");
                $this -> model = $this -> factory -> createModel('User');
                $this -> model -> validateLogin();
                if ($this -> model -> valid) 
                {
                    $this -> model -> doLoginUser();
                    $this -> model -> setCart();
                    $this -> model -> setPage("home");
                }
                break;
            case "logout":
                require_once("models/UserModel.php");
                $this -> model = $this -> factory -> createModel('User');
                $this -> model -> doLogoutUser();
                $this -> model -> setPage("home");
                break;
            case "password":
                require_once("models/UserModel.php");
                $this -> model = $this -> factory -> createModel('User');
                $this -> model -> validatePassword();
                if ($this -> model -> valid) 
                {
                    $this -> model -> updatePassword();
                    $this -> model -> setPage("confirmed");
                } 
                break; 
            case "shop":
                require_once("models/ShopModel.php");
                $this -> model = $this -> factory -> createModel('Shop');
                $this -> model -> handleShopActions();
                $this -> model -> getShopItems();
                break;
            case "top5":
                require_once("models/ShopModel.php");
                $this -> model = $this -> factory -> createModel('Shop');
                $this -> model -> handleShopActions();
                $this -> model -> getTop5();
                break;
            case "details":
                require_once("models/ShopModel.php");
                $this -> model = $this -> factory -> createModel('Shop');
                $this -> model -> handleShopActions();
                $this -> model -> getDetails();
                break;
            case "cart":
                require_once("models/ShopModel.php");
                $this -> model = $this -> factory -> createModel('Shop');
                $this -> model -> handleShopActions();
                if ($this -> model -> isOrdered) 
                {
                    $this -> model -> setPage("succeed");
                } else {
                    $this -> model -> getCartItems();
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
            case "thanks":
                require_once("views/ThanksDoc.php");
                $view = new ThanksDoc($this -> model);
                break;
            case "password":
                require_once("views/PasswordDoc.php");
                $view = new PasswordDoc($this -> model);
                break;
            case "confirmed":
                require_once("views/ConfirmedDoc.php");
                $view = new ConfirmedDoc($this -> model);
                break;
            case "shop":
                require_once("views/ShopDoc.php");
                $view = new ShopDoc($this -> model);
                break;
            case "top5":
                require_once("views/Top5Doc.php");
                $view = new Top5Doc($this -> model);
                break;
            case "details":
                require_once("views/DetailsDoc.php");
                $view = new DetailsDoc($this -> model);
                break;
            case "cart":
                require_once("views/CartDoc.php");
                $view = new CartDoc($this -> model);
                break;
            case "succeed":
                require_once("views/SucceedDoc.php");
                $view = new SucceedDoc($this -> model);
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