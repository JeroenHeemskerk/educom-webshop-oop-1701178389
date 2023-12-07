<?php
class ShopModel extends PageModel
{
    public function __construct($PageModel) {
        PARENT::__construct($PageModel);
    }

    public function getShopItems()
    {
        require_once('file_repository.php');
        return getShopItems();
    }

    public function getCartItems()
    {
        require_once('file_repository.php');
        return getCartItems();
    }
    
    public function getTop5()
    {
        require_once('file_repository.php');
        return getTop5();
    }
    
    public function getDetails()
    {   
        $id = $this -> getUrlVar("id");
        require_once('file_repository.php');
        return getDetails($id);          
    }

    public function handleShopActions()
    {
        $action = $this -> getPostVar("action");
        switch ($action) {
            case "storeItemInSession":
                $id = $this -> getPostVar("id");
                //var_dump($id);
                require_once ('session_manager.php');
                storeItemInSession ($id);
                break;
            case "insertOrderInDb":
                $cart = $this -> $_SESSION['cart'];
                require_once('file_repository.php');
                insertOrderInDb($cart);
                require_once('session_manager.php');
                unsetCart();
                break;
        }
    }
    
    
}
?>