<?php

use App\Controllers\API\V1\MenuController;
use App\Controllers\API\V1\Users\LoginController;

$_Routes['api/users/login'] = [LoginController::class, 'store'];
$_Routes['api/users/get-token'] = [LoginController::class, 'refreshToken'];


$_Routes['api/menus/list'] = [MenuController::class, 'index'];