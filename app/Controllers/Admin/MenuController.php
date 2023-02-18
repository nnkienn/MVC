<?php

namespace App\Controllers\Admin;

use App\Middleware\Auth;
use System\Src\Controller;
use System\Src\Session;
class MenuController extends Auth {
    public function __construct() {
        Parent::__construct();
    }

    public function create(){
        return view('admin/main',[
            'title'=> 'Them danh muc moi',
            'template'=> 'menus/add'
        ]);
    }
    public function store(){

        dd($_FILES);
    }

   
}