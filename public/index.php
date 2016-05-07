<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 06/03/16
 * Time: 11:26
 */



//AutoLoader do Composer
$loader = require dirname(__DIR__).'/vendor/autoload.php';

// Create Router instance
$router = new \SexCode\Lib\Router();


// Define routes
require dirname(__DIR__).'/conf.php';


// Run it!
$router->run();

