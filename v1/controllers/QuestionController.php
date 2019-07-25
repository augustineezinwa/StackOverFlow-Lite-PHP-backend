<?php

include_once './v1/controllers/Controller.php';
include_once './config/Database.php';
include_once './models/Question.php';

class QuestionController extends Controller {

    private $db;
    
    private $conn;

    

    function __construct(Request $request) {

        $this->request = $request;
        $this->db = new Database();
        $this->conn = $this->db->connect();

    }


    public function getAllQuestions() {


        //instantiate question object
        $question = new Question($this->conn);

        $response = $question->getQuestions();

        $rowCount = $response->rowCount();
    
        if($rowCount > 0) {

        $questions = $response->fetchAll(PDO::FETCH_OBJ); 
        $this->conn = null;

        echo json_encode($questions, JSON_PRETTY_PRINT);
        
    }
        else 
        {
                http_response_code(404);
                echo json_encode(
                    array('message' => 'No Posts found')
                );
    
        };

    }


    public function getAQuestion($id) {

        $question = new Question($this->conn);
    
        $response = $question->getAQuestion($id);

        $rowCount = $response->rowCount();

        if($rowCount > 0 ) {

            $question = $response->fetch(PDO::FETCH_OBJ);

            echo json_encode(
                 
                 [ 
                     'id' => $question->id,
                     'questionTitle' => $question->question_title,
                     'questionDescription' => $question->question_description,
                     'createdAt' => $question->created_at

                   ]
                );

        } else {

            http_response_code(404);
            echo json_encode(
                [
                    'message' => 'This question does not exist'
                ]
                );
        }

    }

}
