<?php

include_once './v1/controllers/QuestionController.php';
include_once './routes/Route.php';

$route = new Route();




$route->set('/about-us', function () {
    echo 'about-us';
});


$route->set('/contact-us', function () {
    echo 'contact-us---';
});

$route->get('/api/v1/questions/$x',  function ($request) {
    
    $questions = new QuestionController($request);
    return $questions->getAQuestion($request->getParam('$x'));
    
});

$route->get('/api/v1/questions',  function ($request) {

    $questions = new QuestionController($request);
    return $questions->getAllQuestions();

});

$route->put('/api/v1/questions/$y/answers/$x',  function ($request) {

    // print_r($request->getBody());

});


