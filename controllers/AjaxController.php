<?php

require_once 'models/RatingModel.php';


class AjaxController
{
    //Properties
    public $factory;
    public $model;
    protected $sessionManager;

    //Methods
    public function __construct($factory)
    {
        $this -> factory = $factory;
    }
    
    public function handleRequest()
    {
        $this -> model = $this -> factory -> createModel('Ajax');
        $this -> getRequest();
        $this -> processRequest();
        $this -> showResponse();
    }

    private function getRequest()
    {
        $this -> model -> getRequestedFunction(); 
    }

    private function processRequest()
    {
        switch ($this -> model -> function)
        {
            case 'rateItem':
                $this -> model -> rateItem();
                break;
            case 'getRating':
                $this -> model -> getRating();
                break;
            case 'getRatings':
                $this -> model -> getRatings();
        }
    }
    private function showResponse()
    {
        require_once "views/AjaxView.php";
        $ajax = new AjaxView ($this -> model);
        $ajax -> show();
    }
    
}

?>