<?php

return array(


    //Регистрация
    'user/register' => 'user/register', //actionRegister в UserController

    //Вход
    'user/login' => 'user/login',

    //Выход
    'user/logout' => 'user/logout',

    //Личный кабинет
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    //Работник
    'worker/([0-9]+)' => 'worker/view/$1', //actionView в WorkerController



    'user/worker/edit/([0-9]+)' => 'userWorker/edit/$1',
    'user/worker/add' => 'userWorker/add',
    'user/worker/delete/([0-9]+)' => 'userWorker/delete/$1',
    'user/worker' => 'userWorker/index',

    'admin' => 'admin/index',

    //Главаня страница
    'index.php' => 'index/index', //вызываем actionIndex в IndexController
    '' => 'index/index'  //вызываем actionIndex в IndexController
);