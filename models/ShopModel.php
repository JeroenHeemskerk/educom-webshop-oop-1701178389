<?php
class ShopModel extends PageModel
{
    public $cart = array();
    public $isOrdered = false;

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
        if ($this -> isPost) {
            $id = $this -> getPostVar("id");
        } else {
            $id = $this -> getUrlVar("id");
        }
            require_once('file_repository.php');
            return getDetails($id);          
    }

    public function handleShopActions()
    {
        $action = $this -> getPostVar("action");
        switch ($action) {
            case "storeItemInSession":
                $id = $this -> getPostVar("id");
                $this -> sessionManager -> storeItemInSession ($id);
                break;
            case "createOrder":
                    $this -> cart = $this -> sessionManager -> getCart(); 
                try {
                    require_once('file_repository.php');
                    createOrder($this -> cart);
                    $this -> sessionManager -> unsetCart();
                    $this -> isOrdered = true;
                }
                catch (Exception $ex) {

                }
                    break;
        }
    }
    
    
}
?>