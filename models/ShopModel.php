<?php
class ShopModel extends PageModel
{
    public $cart = array();
    public $isOrdered = false;
    public $items = array();
    private $shopCrud;
    private $itemId;
    private $id;
    private $orderNumber;
    private $userId;


    public function __construct($PageModel, $crud) 
    {
        $this -> crud = $crud;
        PARENT::__construct($PageModel);
    }

    public function getShopItems()
    {
        $this -> items = $this -> crud -> readAllItems();
    }

    public function getTop5()
    {
        $this -> itemId = $this -> crud -> readTop5();
        foreach ($this -> itemId as $object)
        {
            array_push($this -> items, $this -> crud -> readItemById($object -> item_id));
        }
    }
    
    public function getDetails()
    {   
        if ($this -> isPost) {
            $this -> id = $this -> getPostVar("id");
        } else {
            $this -> id = $this -> getUrlVar("id");
        }
        $this -> items = $this -> crud -> readItemById($this -> id);       
    }
    
    public function getCartItems()
    {
        $this -> cart = $this -> sessionManager -> getCart();
        foreach ($this -> cart as $key => $value)
        {
            $this -> items[$key] = $this -> crud -> readItemById($key);
        }
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
                    $orderDate = date("ymdHis"); 
                    $this -> userId = $this -> sessionManager -> getLoggedInUserId();
                    $this -> orderNumber = $orderDate . $this -> userId;
                    $this -> crud -> createOrder($this -> userId, $this -> orderNumber, $this -> cart);
                    $this -> sessionManager -> unsetCart();
                    $this -> isOrdered = true;
                }
                catch (Exception $ex) {
                        var_dump($ex);
                }
                    break;
        }
    }
    
    
}
?>