<?php
//2. Поключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Autoload.php');
// FRONT CONTROLLER
if (function_exists('date_default_timezone_set'))
date_default_timezone_set('Europe/Moscow');
// 1. Общие настройки
//Запускаем сессию
@ob_start();
$_SESSION = array();
session_start();
ini_set('display_errors',1);
error_reporting(E_ALL);

//3. Запускаем маршрутизатор
$router = new Router();
$router->start();
