<?php

class ShopCrud
{
    //Properties
    private $crud;

    //Dependency Injection
    public function __construct($crud)
    {
        $this -> crud = $crud;
    }

    //Methods
    public function readAllItems()
    {
        $sql = "SELECT * FROM items";
        $params = array();
        return $this -> crud -> readManyRows($sql, $params);
    }

    public function readTop5()
    {
        $sql =  "SELECT item_id, SUM(quantity) 
            FROM order_line 
            LEFT JOIN orders ON orders.id = order_line.order_id 
            WHERE order_date > ADDDATE(CURDATE(), -5)
            GROUP BY item_id 
            ORDER BY SUM(quantity) DESC 
            LIMIT 5";
        $params = array();
        return $this -> crud -> readManyRows($sql, $params);
    }

    public function readItemById($itemId)
    {
        $sql = "SELECT * FROM items WHERE id = :id";
        $params = array('id' => $itemId);
        return $this -> crud -> readOneRow($sql, $params);

    }

    public function createOrder($userId, $orderNumber, $cart)
    {
        $sql = "INSERT INTO orders (user_id, order_nr) VALUES (:user_id, :order_number)";
        $params = array('user_id' => $userId, 'order_number' => $orderNumber);
        var_dump($sql);
        var_dump($params);
        $orderId = $this -> crud -> createRow($sql, $params);
        var_dump($orderId);
        $sql = "INSERT INTO order_line (order_id, item_id, quantity) VALUE (:order_id, :item_id, :quantity)";
        foreach ($cart as $itemId => $quantity)
        {
            $params = array('order_id' => $orderId, 'item_id' => $itemId, 'quantity' => $quantity);
            $this -> crud -> createRow($sql, $params);
        }
    }
}

?>