<?php
class PageModel
{
    public $page;
    protected $isPost = false;
    public $menu;

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