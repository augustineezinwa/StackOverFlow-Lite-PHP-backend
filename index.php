 <?php

//  include_once './App.php';

//  $app = new App();

//  $app->init();






require_once './routes/Routes.php';


function __autoload($className) {
  
  require_once './routes/' .$className . '.php';
}


