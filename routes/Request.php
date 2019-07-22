<?php

class Request {

    private $params = [];


    private $body = [];

    function __construct() {

    }

    public function getParam($paramName) {

        return $this->params[$paramName] ?? [];

    }


    public function getBody($param = null ) {

        return  $this->body[$param] ?? $this->body;

    }

    public function __params($params) {
        $this->params = $params;
    }

    public function __body() {

        //make request made in url-x/encoded, application/json and form-data readable

        if($_SERVER['CONTENT_TYPE'] === 'application/json') {

            $this->body = json_decode( file_get_contents( 'php://input' ), true );

        } else {

            $this->body = $_REQUEST;

        }

    }


}