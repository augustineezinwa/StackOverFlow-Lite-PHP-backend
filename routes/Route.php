<?php

include_once './routes/Request.php';
// include_once '../api/controllers/QuestionController.php';

Class Route extends Request {

    function  __construct() {
      
    }
    

    public function __call($methodName, $args) {

      $request = explode('/', trim($_SERVER['PATH_INFO'], '/'));

      $req = new Request();

      array_push($req->params, $request[1]);

      // print_r($req->params);
      // print_r($args);

      switch($methodName) {
        case 'get':
  
        // print_r($args[0]);
        // print_r($request);
        
        // print_r($request);

        if($_SERVER['REQUEST_URI'] === '/'.$request[0].'/'.$request[1]) {
         
          $args[1]->__invoke($req);
        }
        break;
        case 'post':
        echo 'post';
        break;
        case 'put':
        echo 'put';
        break;
        case 'delete':
        echo 'delete';
        break;
      }
    }

    public static function set($route, $function) {

      if($_SERVER['REQUEST_URI'] === $route) {
        $function->__invoke();
      }
  
    }

}