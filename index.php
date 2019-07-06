<?php

include_once './routes/Route.php';

$router = new Route();

$router->get('/donkey', function() {
  echo 'hello';
});
