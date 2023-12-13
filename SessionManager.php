<?php
  class SessionManager {
    public function doLoginUser($name, $userId) { 
      $_SESSION["name"] = $name; 
      $_SESSION["userId"] = $userId;
    }
    public function setCart(){
        $_SESSION['cart'] = array();
    }
    public function doLogoutUser() {
      unset($_SESSION["name"]);
      unset($_SESSION["cart"]);
    }
    public function isUserLoggedIn() {
      return isset($_SESSION["name"]); 
    } 
    
    public function getLoggedInUserName() {
      return $_SESSION["name"];
    } 
    public function getLoggedInUserId() {
      return $_SESSION["userId"];
    } 

  public function storeItemInSession($id)
  {
    if (!(isset($_SESSION['cart'])))
    {
      $_SESSION['cart'] = array();
    }
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] += 1;
    } else {
      $_SESSION['cart'][$id] = 1;
    }
  ;}

  public function unsetCart ()
  {
    unset($_SESSION['cart']);
  }

  public function getCart()
  {
    return $_SESSION['cart'];
  }
}
?>