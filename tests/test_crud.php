<?php
require_once '../Crud.php';
include_once ('../UserCrud.php');

$crud = new Crud();
$userCrud = new userCrud($crud);
//$row = $crud -> createRow('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)', array(':name' => 'Test', ':email' => 't', ':password' => 'wachtwoord'));
//$row = $crud -> readOneRow('SELECT id, name, email FROM users WHERE id = :id', array(':id' => '1'));
//$row = $crud -> readManyRows('SELECT id, name, email FROM users WHERE id > :id', array(':id' => '3'));
//$row = $crud -> updateRow('UPDATE users SET email = :email WHERE id = :id', array(':email' => 'test@test.nl', ':id' => '28'));
//$row = $crud -> deleteRow('DELETE FROM users WHERE password = :password', array(':password' => 'test@test.nl'));
$temp = $userCrud -> readUserPasswordByEmail('i@i.i');
var_dump($temp);

?> 