<?php

use app\core\Router;
use app\support\RequestType;

require '../vendor/autoload.php';

session_start();

Router::run();
