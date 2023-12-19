<?php
require_once '../Crud.php';
include_once('../RatingCrud.php');
include_once('../RatingModel.php';)

$crud = new Crud();
$ratingCrud = new ratingCrud($crud);

//$test = $ratingCrud -> createRating(5, 1, 5);     //werkend getest
//$test = $ratingCrud -> updateRating(31, 3, 5);    //werkend getest
//$test = $ratingCrud -> readRatingByItemId(3);     //werkend getest
//$test = $ratingCrud -> readAllAvgRatings();       //werkend getest
$test = $ratingCrud -> readRatingByUserId(31, 2);

var_dump($test);
//var_dump(json_encode($test));

?> 