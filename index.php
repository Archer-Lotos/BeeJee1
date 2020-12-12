<?php

define("ROOT", dirname(__FILE__));

require_once 'autoload.php';

spl_autoload_register('autoload');
session_start();

if(!isset($_SESSION['isAdmin']))
{
    $_SESSION['isAdmin'] = 0;
    $_SESSION['Error'] = '';
}

$path = explode('/',$_SERVER['REQUEST_URI']);

$route = new Http\Routers\RouterTask($path);

$route->parse();