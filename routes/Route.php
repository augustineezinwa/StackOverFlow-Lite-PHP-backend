<?php

include_once './routes/Request.php';

Class Route extends Request {

    function  __construct() {
      
    }
    

    public function __call($methodName, $args) {

      $request = explode('/', trim($_SERVER['PATH_INFO'], '/'));

      $req = new Request();

      $route_url = explode('/', trim($args[0], '/'));
     

     if(count($route_url) === count($request) && strtolower($_SERVER['REQUEST_METHOD']) === $methodName ) {

      $new_array = array_combine($route_url, $request);

      $req->__params($new_array);

      $req->__body();

      $is_called = true;

      for($i =0; $i< count($request); $i+=2 ) {

        if($request[$i] !== $route_url[$i]) {

          $is_called = false;

        } 

      }

        if($is_called) $args[1]->__invoke($req);

    }

    }

    public static function set($route, $function) {

      if($_SERVER['REQUEST_URI'] === $route) {
        $function->__invoke();
      }
  
    }

}