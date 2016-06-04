<?php


$router->respond('get',  '/home',    'SexCode\Controller\HomeController::index');
$router->respond('get',  '/home/list',    'SexCode\Controller\HomeController::list');
$router->respond('post',  '/home/post',    'SexCode\Controller\HomeController::insert');
$router->respond('post',  '/home/update/{id}',    'SexCode\Controller\HomeController::update');
$router->respond('get',  '/delete/{id}',    'SexCode\Controller\HomeController::delete');


?>