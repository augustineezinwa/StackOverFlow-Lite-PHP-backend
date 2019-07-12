<?php

include_once './api/controllers/QuestionController.php';
include_once './routes/Route.php';

$route = new Route();




$route->set('/about-us', function () {
    echo 'about-us';
});


$route->set('/contact-us', function () {
    echo 'contact-us---';
});

$route->get('/questions/$1',  function ($request) {
    // print_r($request->params);
    $questions = new QuestionController($request);
    return $questions->getAllQuestions();
});