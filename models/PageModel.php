<?php
class PageModel
{
    public $page;
    protected $isPost = false;
    public $menu;
    public $genericErr = '';
    //protected $sessionManager;

    public function __construct($copy) 
    {
        if(empty($copy)) 
        {
      //      $this -> sessionManager = new SessionManager();
        } else {
            $this -> page = $copy -> page;
            $this -> isPost = $copy -> isPost;
            $this -> menu = $copy -> menu;
            $this -> genericErr = $copy -> genericErr;
    //        $this -> sessionManager = $copy -> sessionManager;
        }
    }

    public function getRequestedPage()
    {
        $this -> isPost = ($_SERVER['REQUEST_METHOD'] == 'POST');
        if ($this -> isPost)
        {
            $this -> setPage($this -> getPostVar("page", "home"));
        } else {
            $this -> setPage($this -> getUrlVar("page", "home"));
        }
    }

    protected function setPage($newPage)
    {
        $this -> page = $newPage;
    }

    protected function getPostVar($key, $default='')
    {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    protected function getUrlVar($key, $default='')
    {
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    public function createMenu()
    {
        $menu = array('home' => 'Startpagina', 'about' => 'Over mij', 'contact' => 'Contact', 'shop' => 'Spellenwinkel', 'top5' => 'Top 5 spellen');
        
        /*if ($this -> isUserLoggedIn()) {
            $menu['password'] = 'Instellingen';
            $menu['cart'] = 'Winkelwagen';
            $menu['logout'] = $this -> getLoggedInUserName() . ' uitloggen';
        } else {
            $menu['register'] = 'Aanmelden';
            $menu['login'] = 'Inloggen';
        }*/
        $this -> menu = $menu;
    }
}
?>