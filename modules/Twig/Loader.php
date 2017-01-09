<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 03.11.2016
 * Time: 17:14
 */

try {

    // подключаем Twig
    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, []);

    //Подключаем расширения twig
    require_once "Functions.php";
    require_once "Extensions.php";

} catch (Exception $e){

    echo $e;

}