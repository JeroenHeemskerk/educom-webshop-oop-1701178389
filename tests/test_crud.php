<?php
require_once '../Crud.php';
include_once ('../UserCrud.php');
include_once('../ShopCrud.php');

$crud = new Crud();
$shopCrud = new shopCrud($crud);
//$row = $crud -> createRow('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)', array(':name' => 'Test', ':email' => 't', ':password' => 'wachtwoord'));
//$row = $crud -> readOneRow('SELECT id, name, email FROM users WHERE id = :id', array(':id' => '1'));
$row = $crud -> readManyRows('SELECT id, name, email FROM users WHERE id > :id', array(':id' => '3'));
//$row = $crud -> updateRow('UPDATE users SET email = :email WHERE id = :id', array(':email' => 'test@test.nl', ':id' => '28'));
//$row = $crud -> deleteRow('DELETE FROM users WHERE password = :password', array(':password' => 'test@test.nl'));
$orderDate = date("ymdHis"); 

//$orderNumber = $orderDate . '30';
//$temp = $shopCrud -> createOrder(30, $orderNumber, array('1' =>'1', '2' => '43' ));

var_dump($row);

?> 