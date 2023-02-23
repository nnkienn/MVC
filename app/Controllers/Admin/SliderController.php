<?php

namespace App\Controllers\Admin;

use App\Middleware\Auth;
use System\Src\Session;
use App\Models\SliderModel;
class SliderController extends Auth
{
    protected $sliderModel;
    public function __construct()
    {
        parent::__construct();
        $this->sliderModel = new SliderModel;
    }
    public function create(){
       



        return view('admin/main',[
            'title' => 'Slider ',
            'template' => 'Sliders/add',
            
        ]);
    }

    public function store(){
        if($this->isMethod('post')){
            if(! $this->isMethod('POST')){
                Session::flash('errors','phương thức không chính xác');
                return redirect('/admin/sliders/add');
            }

            if($this->input('title')== null && $this->input('thumb')==null ){
                Session::flash('errors','tiêu đề và ảnh không trống');
                return redirect('/admin/sliders/add');
            }
            $slider = $this->sliderModel->insert($this->input());
            if($slider){
                Session::flash('success','Thành công');
                return redirect('/admin/sliders/add');
            }
            
        Session::flash('errors','thêm sản phảm lỗi');
        return redirect('/admin/sliders/add');
    
        }
    }

    public function index(){




        return view('admin/main',[
            'title' => 'Danh sách sản phẩm ',
            'template' => 'sliders/list',
            'sliders' => $this->sliderModel->get(),

       
        ]);
    }
    
}