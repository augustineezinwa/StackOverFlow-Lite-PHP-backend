 <?php


require_once './routes/Routes.php';


function __autoload($className) {
  
  require_once './routes/' .$className . '.php';
}


