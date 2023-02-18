<?php

use App\Controllers\MainController;



require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ .'/../');
$dotenv->load();
require_once __DIR__ . '/../systems/bridge.php';

$app = new \System\Src\App();
