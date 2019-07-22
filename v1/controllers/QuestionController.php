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

            $question_arr = array();

            $question_arr['data'] = array();
            
            while($row = $response->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
        
                $question_item = array(
                    'questionId' => $id,
                    'questionTitle' => $question_title,
                    'questionDescription' => $question_description,
                    'createdAt' => $created_at
                );
                
                array_push( $question_arr['data'], $question_item);
        
                echo json_encode($question_arr, JSON_PRETTY_PRINT);
    
        } 
    }
        else 
        {
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

            $question_arr = array();

            while($row = $response->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                $question_item = array(
                    'questionId' => $id,
                    'questionTitle' => $question_title,
                    'questionDescription' => $question_description,
                    'createdAt' => $created_at
                );

            }

            $question_arr['data'] = array();

            array_push($question_arr['data'], $question_item);

            echo json_encode($question_arr);

        } else {

            echo json_encode(
                [
                    'message' => 'This question does not exist'
                ], 404
                );
        }

    }
}