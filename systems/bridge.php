<?php

session_start();
ob_start();
define('__PUBLIC__', __DIR__ . '/../public');

define('__VIEW__', __DIR__ . '/../app/Views/');
if($_ENV['APP_DEBUG' ]== 'false'){
    error_reporting(0);
    ini_set('display_errors', 0);
};



$routesConfigArray = ['helpers'];
foreach( $routesConfigArray as $routesConfigArray){
    require_once __DIR__ . '/../config/' . $routesConfigArray . '.php';
}



$routesConfigArray = ['web', 'api'];
foreach( $routesConfigArray as $routesConfigArray){
    require_once __DIR__ . '/../routes/' . $routesConfigArray . '.php';
}