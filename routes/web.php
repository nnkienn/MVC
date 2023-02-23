
<?php

use App\Controllers\Admin\Users\LoginController;
use App\Controllers\Admin\MainController;
use App\Controllers\Admin\MenuController;
use App\Controllers\Admin\UploadController;
use App\Controllers\Admin\ProductController;
use App\Controllers\Admin\SliderController;



$_Routes['admin/users/login'] = [LoginController::class, 'login'];
$_Routes['admin/users/login/store'] = [LoginController::class, 'store'];
$_Routes['admin/main'] = [MainController::class,'index'];


$_Routes['admin/menus/add'] = [MenuController::class,'create'];
//admin

$_Routes['admin/menus/store'] = [MenuController::class,'store'];
$_Routes['admin/menus/lists']=[MenuController::class,'index'];
$_Routes['admin/menus/edit/{id}']=[MenuController::class,'edit'];
$_Routes['admin/menus/update/{id}']=[MenuController::class,'update'];
$_Routes['amdin/menus/delete']=[MenuController::class,'remove'];



$_Routes['admin/upload'] = [UploadController::class, 'upload'];


//product

$_Routes['admin/products/add']=[ProductController::class,'create'];
$_Routes['admin/products/store'] = [ProductController::class,'store'];
$_Routes['admin/products/list'] = [ProductController::class,'index'];


//slider


$_Routes['admin/sliders/add'] = [SliderController::class,'index'];
