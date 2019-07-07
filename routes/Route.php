<?php

Class Route {

    public static function set($route, $function) {

      if($_SERVER['REQUEST_URI'] === $route) {
        $function->__invoke();
      }
  
    }
}