<?php
/**
 * Created by PhpStorm.
 * User: Павел
 * Date: 04.11.2016
 * Time: 14:08
 */


function render ($template, $data = []) {
    global $twig, $user, $act_par, $breadcrumbs;

    //Всегда отправляем в шаблон инфу по пользователю
   // $data['core']['user'] = ($user ?: null);

    //Всегда отправляем в шаблон глобальные перемнные
    //$data['core']['vars'] = include 'modules/Core/Variables.php';

    //Меню
    //TODO: Проверка прав
   // $data['core']['menu'] = include 'modules/Core/Menu.php';

    //Информация по странице
    /*$data['core']['page'] = [
        'url' => [
            'full' => $act_par,
            'parent' => $act_par[1],
            'submenu' => rtrim(implode('/',[$act_par[2], $act_par[3]]),'/')
        ],
        'breadcrumbs' => $breadcrumbs
    ];*/

    try {

        echo $twig->render($template, $data);

    } catch (Exception $e) {

        echo $e;
    }

}