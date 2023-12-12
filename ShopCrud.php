<?php

class ShopCrud
{
    //Properties
    private $crud;

    //Dependency Injection
    public function __construct()
    {
        require_once("Crud.php");
        $this -> crud = new crud();
    }

    //Methods
    protected function readAllItems()       // !! DEZE NAAM NOG AANPASSEN IN SHOPMODEL !!
    {
        $sql = "SELECT * FROM items";
        $params = '';
        $this -> crud -> readManyRows($sql, $params);
        //Hoe vertaal ik het nu naar het ShopModel?
    }

    protected function readItemById($itemId)        // !! DEZE NAAM NOG AANPASSEN IN SHOPMODEL !!   
    {
        $sql = "SELECT * FROM items WHERE id = :id";
        $params = array('id' => $itemId);
        $this -> crud -> readOneRow($sql, $params);

    }

    protected function createOrder($itemId, $orderNumber)
    {
        $sql = "INSERT INTO orders (item_id, order_nr) VALUES (':item_id', ':order_number')";
        $params = array('item_id' => $itemId, 'order_number' => $orderNumber);
        $this -> crud -> createRow($sql, $params);
        
    }
}

?>