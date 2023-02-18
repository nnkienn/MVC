<?php

namespace App\Controllers\Admin;

use App\Middleware\Auth;
use System\Src\Controller;
use System\Src\Session;
class MainController extends Auth {
    public function __construct() {
        Parent::__construct();
    }

    public function index(){
        return view('admin/main',[
            'title'=> 'Trang quan tri',
            'template'=> 'home'
        ]);
    }
   
}