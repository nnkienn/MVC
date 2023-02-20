<?php

namespace App\Controllers\Admin;
use App\Middleware\Auth;
use App\Models\MenuModel;
use System\Src\Session;

class MenuController extends Auth {
    protected $menuModel ;

    public function __construct() {
        Parent::__construct();
        $this->menuModel = new MenuModel;
        
    }

    public function create(){
        return view('admin/main',[
            'title'=> 'Them danh muc moi',
            'template'=> 'menus/add',
            'menusParent' => $this->menuModel->get(0)
        ]);
    }
    public function store(){

       
        if(! $this->isMethod('POST')){
            Session::flash('errors','phương thức không chính xác');
            return redirect('/admin/menus/add');
        }

        if($this->input('title')== null && $this->input('thumb')==null ){
            Session::flash('errors','tiêu đề và ảnh không trống');
            return redirect('/admin/menus/add');
        }
        $menu =$this->menuModel->insert($this->input());

        if ($menu) {
            Session::flash('success', 'Thêm danh mục mới thành công');
            return redirect('/admin/menus/add');
        }

        Session::flash('errors', 'Thêm danh mục mới lỗi');
        return redirect('/admin/menus/add');
    }

    public function index(){
        return view('admin/main',
        ['title'=>'danh sách danh mục',
        'template' => 'menus/list',
        'menus' => $this->menuModel->get()
        ]
    );
    }
   
}