<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 03.11.2016
 * Time: 0:09
 */

//Разруливаем статику
$twig->addFunction(new Twig_SimpleFunction('static', function ($static) {

    //Убираем левый /
    $static = ltrim($static, '/');

    //Определяем есть ли фаил и его размер
    $size = filesize('static/'.$static);

    return (($size > 0) ? sprintf('/static/%s', ltrim($static."?".$size, '/')) : null);

}));


//Base64 convert
$twig->addFunction(new Twig_SimpleFunction('base64_decode', function ($base64) {

    return strlen($base64) > 0 ? base64_decode($base64) : null;

}));

//Add leading zero to digit
$twig->addFunction(new Twig_SimpleFunction('addLeadingZero', function ($digit) {

    return (intval($digit) <= 9 && intval($digit) >= 0) ? "0".$digit : $digit;

}));