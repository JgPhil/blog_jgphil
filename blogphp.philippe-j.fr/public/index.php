<?php

use App\Framework\Router;

require '../vendor/autoload.php';

session_start();
$router = new Router;
$router->run();
