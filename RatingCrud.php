<?php

class RatingCrud
{
    //Properties
    private $crud;

    //Dependency Injection
    public function __construct($crud)
    {
        $this -> crud = $crud;
    }

    //Methods
    public function createRating($userId, $itemId, $stars)
    {
        $sql = "INSERT INTO ratings (user_id, item_id, stars)
                VALUES (:user_id, :item_id, :stars)";
        $params = array('user_id' => $userId, 'item_id' => $itemId, 'stars' => $stars);
        $this -> crud -> createRow($sql, $params);  
    }

    public function updateRating($userId, $itemId, $stars)
    {
        $sql = "UPDATE ratings SET stars = :stars
                WHERE user_id = :user_id and item_id = :item_id";
        $params = array('user_id' => $userId, 'item_id' => $itemId, 'stars' => $stars);
        $this -> crud -> updateRow($sql, $params);  
    }

    public function readRatingByItemId($itemId)
    {
        $sql = "SELECT AVG(stars) as AvgStars
                FROM ratings
                WHERE item_id = :item_id";
        $params = array('item_id' => $itemId);
        return $this -> crud -> readOneRow($sql, $params);
    }

    public function readRatingByUserId($userId, $itemId)
    {
        $sql = "SELECT stars,
                FROM ratings
                WHERE user_id = :user_id AND item_id = :item_id";
        $params = array();
        return $this -> crud -> readOneRow($sql, $params);
    }

    public function readAllAvgRatings()
    {
        $sql = "SELECT AVG(stars) as avgStars, item_id
                FROM ratings
                GROUP BY item_id
                ORDER BY item_id";
        $params = array();
        return $this -> crud -> readManyRows($sql, $params);
    }

    public function readAllRatingsByUserId($userId)
    {
        $sql = "SELECT stars, item_id
                FROM ratings
                WHERE user_id = :user_id";
        $params = array('user_id' => $userId);
        return $this -> crud -> readManyRows($sql, $params);
    }
}

?>