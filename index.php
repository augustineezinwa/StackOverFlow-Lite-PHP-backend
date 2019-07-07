 <?php

//  include_once './App.php';

//  $app = new App();

//  $app->init();

// echo $_GET['url'];




require_once './routes/Routes.php';

// require_once './routes/Route.php';


function __autoload($className) {
  
  require_once './routes/' .$className . '.php';
}

