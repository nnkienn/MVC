<?php

namespace App\Controllers\Admin;

use App\Middleware\Auth;

class SliderController extends Auth
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
       



        return view('admin/main',[
            'title' => 'Slider ',
            'template' => 'Sliders/add',
            
        ]);
    }

    
}