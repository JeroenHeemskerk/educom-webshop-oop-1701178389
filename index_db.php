<?php
session_start();
$page = getRequestedPage ();
$data = processRequest ($page);
showResponsePage($data);

function getRequestedPage () 
{
    $requested_type = $_SERVER['REQUEST_METHOD'];
    if ($requested_type == 'POST')
    {
        $requested_page = getPostVar('page', 'home');
    }
    else 
    {
        $requested_page = getUrlVar('page', 'home');
    }
    return $requested_page;
}

function processRequest($page) 
{
    switch ($page) 
    {
        case "contact":
            require_once ('validation.php');
            $data = validateContact();
            if ($data['valid']){                                                
                $page = 'thanks';
            }
            break;
        case "register":
            require_once ('validation.php');
            $data = validateRegister();
            if ($data['valid']){                                                
                require_once ('file_repository.php');
                storeUser($data['email'], $data['name'], $data['password']);          
                $page = 'login';
            }
            break;  
        case "login":
            require_once ('validation.php');
            $data = validateLogin();
            if ($data['valid']){                                               
                $page = 'home';
                require_once('session_manager.php');
                doLoginUser($data['name'], $data['id']);
            }
            break;
        case "logout":
            require_once('session_manager.php');
            doLogoutUser();
            $page = 'home';
            break;
        case "password":
            require_once ('validation.php');
            $data = validatePassword();
            if ($data['valid']){
                $page = 'confirmed';               
                require_once("file_repository.php");
                $data = updatePassword($data);
            }    
            break;
        case "shop":
                handleActions();
                $requested_type = $_SERVER['REQUEST_METHOD'];
                if ($requested_type == 'POST') {
                    $id = getPostvar('id');
                } else {
                    $id = getUrlvar('id');
                }
                require_once('file_repository.php');
                $data['items'] = getItemDetails ($id);
                break;
        case "top5":
                handleActions();
                require_once("file_repository.php");
                $data['items'] = getTop5();
                break;
        case "details":      
                handleActions();
                $requested_type = $_SERVER['REQUEST_METHOD'];
                if ($requested_type == 'POST') {
                    $id = getPostvar('id');
                } else {
                    $id = getUrlvar('id');
                }
                require_once('file_repository.php');
                $data['item'] = getItemDetails ($id);
            break;
        case "cart":
            handleActions();
            break;
        case "succeed":
            handleActions($_SESSION['cart']);   
            break; 
    }
    require_once ('session_manager.php');
    $data['login'] = isUserLoggedIn();                                       
    $data['page']= $page;
    $data['menu']= array('home' => 'Startpagina', 'about' => 'Over mij', 'contact' => 'Contact', 'shop' => 'Spellenwinkel', 'top5' => 'Top 5 spellen');  //nieuwe pagina's kunnen hier toegevoegd worden
    if ($data["login"]) {                                                                          
        $data['menu']['password'] = 'Instellingen'; $data['menu']['cart'] = 'Winkelwagen'; $data['menu']['logout'] = getLoggedInUserName() . ' uitloggen'; 
    } else {
        $data['menu']['register'] = 'Aanmelden' ; $data['menu']['login'] = 'Inloggen'; 
    }
    return $data;
    
}

function handleActions ()
{
    $action = getPostVar("action");
    switch ($action) {
        case "storeItemInSession":
            $id = getPostVar("id");
            require_once ('session_manager.php');
            storeItemInSession ($id);
            break;
        case "insertOrderInDb":
            $cart = [$_SESSION['cart']];
            include_once('file_repository.php');
            insertOrderInDb($cart);
            include_once('session_manager.php');
            unsetCart();
            break;
    }
}

function showResponsePage($data)
{
    switch($data["page"])
        {
            case "home":
                require_once("views/HomeDoc.php");
                $view = new HomeDoc($data);
                break;
            case "about":
                require_once("views/AboutDoc.php");
                $view = new AboutDoc($data);
                break;
            case "contact":
                require_once("views/ContactDoc.php");
                $view = new ContactDoc($data);
                break;
            case "register":
                require_once("views/RegisterDoc.php");
                $view = new RegisterDoc($data);
                break;
            case "login":
                require_once("views/LoginDoc.php");
                $view = new LoginDoc($data);
                break;
            case "thanks":
                require_once("views/ThanksDoc.php");
                $view = new ThanksDoc($data);
                break;
            case "password":
                require_once("views/PasswordDoc.php");
                $view = new PasswordDoc($data);
                break;
            case "confirmed":
                require_once("views/ConfirmedDoc.php");
                $view = new ConfirmedDoc($data);
                break;
            case "shop":
                require_once("views/ShopDoc.php");
                $view = new ShopDoc($data);
                break;
            case "top5":
                require_once("views/Top5Doc.php");
                $view = new Top5Doc($data);
                break;
            case "details":
                require_once("views/DetailsDoc.php");
                $view = new DetailsDoc($data);
                break;
            case "cart":
                require_once("views/CartDoc.php");
                $view = new CartDoc($data);
                break;
            case "succeed":
                require_once("views/SucceedDoc.php");
                $view = new SucceedDoc($data);
                break;
            default:
                require_once("views/NotFoundDoc.php");
                $view = new NotFoundDoc($data);
                break;
        }
    $view -> show();
}

function getArrayVar($array, $key, $default=' ')
{
    return isset($array[$key]) ? $array[$key] : $default;
}

function getPostVar($key, $default=' ')
{
    return getArrayVar($_POST, $key, $default);
} 

function getUrlVar($key, $default=' ')              
{
    return getArrayVar($_GET, $key, $default);
} 

?>