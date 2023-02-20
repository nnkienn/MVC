
<?php

use App\Controllers\Admin\Users\LoginController;
use App\Controllers\Admin\MainController;
use App\Controllers\Admin\MenuController;
use App\Controllers\Admin\UploadController;

$_Routes['admin/users/login'] = [LoginController::class, 'login'];
$_Routes['admin/users/login/store'] = [LoginController::class, 'store'];
$_Routes['admin/main'] = [MainController::class,'index'];


$_Routes['admin/menus/add'] = [MenuController::class,'create'];


$_Routes['admin/menus/store'] = [MenuController::class,'store'];
$_Routes['admin/menus/lists']=[MenuController::class,'index'];


$_Routes['admin/upload'] = [UploadController::class, 'upload'];
