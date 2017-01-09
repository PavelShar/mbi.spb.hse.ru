<?php

/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 09.01.2017
 * Time: 21:30
 */

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

mb_internal_encoding("UTF-8");
ini_set("date.timezone", "Europe/Moscow");

//Выставляем заголовки кэширования
Header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); //Дата в прошлом
Header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
Header("Pragma: no-cache"); // HTTP/1.1
Header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
Header("X-Frame-Options: SAMEORIGIN");

ini_set('output_buffering', 1);
ob_start();

//Подключаем класс для работы с БД
//require_once "modules/DB/DB.php";

//Подключаем composer
require_once "../vendor/autoload.php";


//Стандартный запуск
$act_par = explode("/", (strpos($_SERVER['REQUEST_URI'], "?") === false ? $_SERVER['REQUEST_URI'] : substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], "?"))));


//Определяем, есть ли такой модуль
$ACTUAL_PAGE = "2015";
$page_file_name = $act_par[1] ?: $ACTUAL_PAGE;

if (!file_exists("../pages/" . $page_file_name . ".php")) {
    $page_file_name = "404";
}


//Подключаем Twig
require_once "../modules/Twig/Loader.php";


//Запрашиваем страницу
require "../pages/" . $page_file_name . ".php";


ob_end_flush();



