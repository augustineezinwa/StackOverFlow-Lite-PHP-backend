<?php

//add headers
Header('Access-Control-Allow-Origin: *');
Header('Content-Type: application/json');

include_once '../../models/Question.php';
include_once '../config/Database.php';


//instantiate DB and connect

$database = new Database();

$db = $database->connect();

//instatiate Question object
$question = new Question($db);

$response = $question->getQuestions();

$rowCount = $response->rowCount();

if($rowCount > 0) {

    $question_arr = array();
    
    while($row = $response->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $question_item = array(
            'questionId' => $id,
            'questionTitle' => $question_title,
            'questionDescription' => $question_description,
            'createdAt' => $created_at
        );
        
        $question_arr['data'] = array();
        
        array_push($question_arr['data'], $question_item);

        echo json_encode($question_arr);
    }
} else {
        echo json_encode(
            array('message' => 'No Posts found')
        );
}