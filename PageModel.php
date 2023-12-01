<?php
class PageModel
{
    public $page;
    protected $isPost = false;
    public $menu;
    public $errors = array();
    public $genericErr = '';
    protected $sessionManager;

    public function __construct($copy) 
    {
        if(empty($copy)) 
        {
            $this -> sessionManager = new SessionManager();
        } else {
            $this -> page = $copy -> page;
            $this -> isPost = $copy -> isPost;
            $this -> menu = $copy -> menu;
            $this -> genericErr = $copy -> genericErr;
            $this -> sessionManager = $copy -> sessionManager;
        }
    }

    public function getRequestedPage()
    {
        $this -> isPost = ($_SERVER['REQUEST_METHOD'] == 'POST');
        if ($this -> isPost)
        {
            $this -> setPage(Util::getPostVar("page", "home"));
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

    }
    protected function createMenu()
    {
        
    }
}
?>