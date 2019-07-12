<?php

class QuestionController {

    function __construct(Request $request) {
        $this->request = $request;
    }


    public function getAllQuestions() {
        // print_r($this->request->params[0]);
        header('Content-Type: application/json');
        echo json_encode([
            'questionId' => $this->request->params[0],
            'message' => 'question fetched successfully',
            'questionTitle' => 'The title of my questions',
            'questionDescription' => 'I want to ask a question?'
        ], JSON_PRETTY_PRINT);
    }
}