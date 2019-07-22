<?php

Class Question {
    //DB parameters

    private $conn;
    private $table = 'Questions';


    //Question parameters
    public $id;
    public $question_title;
    public $question_description;
    public $created_at;
    public $updated_at;


    //DB constructor
    public function __construct($database) {
        $this->conn = $database;
    }

    //Get all Questions from the database
    public function getQuestions() {

        //create query for getting questions
        $query = 'SELECT * from ' . $this->table;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;

    }

     //Get all Questions from the database
     public function getAQuestion($id) {

        //create query for getting questions
        $query = "SELECT * from  $this->table  WHERE id =  $id";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;

    }
}