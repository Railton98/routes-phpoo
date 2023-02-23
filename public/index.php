<?php

use Dotenv\Dotenv;
use app\core\Router;
use app\support\RequestType;

require '../vendor/autoload.php';

session_start();

$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

Router::run();
