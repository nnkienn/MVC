<?php
namespace App\Controllers\Admin;
use App\Middleware\Auth;

class ProductController extends Auth{
    public function __construct(){
        parent::__construct();

    }
    public function create(){
        return view('admin/main',[
            'title'=> 'Them danh muc moi',
            'template'=> 'products/add',
        
        ]);
    }
}