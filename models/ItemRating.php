<?php

class ItemRating
{
    public $itemId;
    public $stars;

    public function __construct($itemId, $stars){
        $this -> itemId = $itemId;
        $this -> stars = $stars;
    }
}