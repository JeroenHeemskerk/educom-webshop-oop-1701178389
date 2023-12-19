<?php
require_once "ItemRating.php";

class RatingModel extends PageModel
{
    //Properties
    public $avgRatings = array();
    public $myRatings = array();
    public $loggedIn;
    public $function;
    public $newRating;
    public $itemId;
    public $output;


    //Methods
    public function __construct($PageModel, $ratingCrud)
    {
        $this -> crud = $ratingCrud;
        PARENT::__construct($PageModel);
    }

    public function getRequestedFunction()
    {
        $this -> isPost = ($_SERVER['REQUEST_METHOD'] == 'POST');
        $this -> loggedIn = $this -> sessionManager -> isUserLoggedIn();
        if ($this -> isPost)
        {
            $this -> function = $this -> getPostVar('function', '');
            $this -> newRating = $this -> getPostVar('stars', 0);
            $this -> itemId = $this -> getPostVar('itemId', 0);
            $this -> user['id'] = $this -> sessionManager -> getLoggedInUserId();
        } else {
            $this -> function = $this -> getUrlVar('function', '');
            $this -> newRating = $this -> getUrlVar('stars', 0);
            $this -> itemId = $this -> getUrlVar('itemId', 0);
            $this -> user['id'] = $this -> sessionManager -> getLoggedInUserId();
        }
    }

    public function getRatings()
    {
        if ($this -> loggedIn)
        {
            $this -> getMyRatings();
        }
        $this -> getAvgRatings();
        $this -> output = array($this -> avgRatings, $this -> myRatings);
    }

    public function getMyRatings()
    {
        foreach ($this -> crud -> readAllRatingsByUserId($this -> sessionManager -> getLoggedInUserId()) as $value)
        {
            $this -> myRatings[] = new ItemRating($value -> item_id, $value -> stars);
        }
    }

    public function getAvgRatings()
    {
        foreach ($this -> crud -> readAllAvgRatings() as $value)
        {
            $this -> avgRatings[] = new ItemRating($value -> item_id, $value -> avgStars);
        }
    }

    public function rateItem()
    {
        if (isset($this -> myRatings[$this -> itemId]))
        {
            $this -> crud -> updateRating($this -> sessionManager -> getLoggedInUserId(), $this -> itemId, $this -> newRating);
        } else {
            $this -> crud -> createRating($this -> sessionManager -> getLoggedInUserId(), $this -> itemId, $this -> newRating);
        }
        $this -> myRatings[$this -> itemId] = $this -> newRating;
    }

}
?>

