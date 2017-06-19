<?php

//FRONT CONTROLLER

//Вывод ошибок
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

//session_destroy();
//Подключение файлов
define ('ROOT', dirname(__FILE__));
require_once (ROOT . '/components/Router.php');
require_once (ROOT . '/components/DB.php');


//Вызов Router.php
$router = new Router();
$router->run();