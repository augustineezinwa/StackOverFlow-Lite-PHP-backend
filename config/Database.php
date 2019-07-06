<?php
Class Database {

    //define Database Parameters
    private $host = 'localhost';
    private $database_name = 'StackOverFlow-Lite_DB';
    private $username = 'root';
    private $password = 'inieef';
    private $conn;

    //connect database;
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO('pgsql:host=' . $this->host .';dbname=' . $this->database_name, $this->username, $this->password );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch(PDOException $error) {
            echo 'Connection Error: '. $error->getMessage();
        }
        return $this->conn;
    }

}