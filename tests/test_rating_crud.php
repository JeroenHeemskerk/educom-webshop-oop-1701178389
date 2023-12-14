<?php
require_once '../Crud.php';
include_once('../RatingCrud.php');

$crud = new Crud();
$ratingCrud = new ratingCrud($crud);

//$test = $ratingCrud -> createRating(5, 1, 5);     //werkend getest
//$test = $ratingCrud -> updateRating(31, 3, 5);    //werkend getest
//$test = $ratingCrud -> readRatingByItemId(3);     //werkend getest
//$test = $ratingCrud -> readAllRatings();          //werkend getest

var_dump($test);

?> 