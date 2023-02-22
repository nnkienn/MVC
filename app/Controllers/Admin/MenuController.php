<?php

namespace App\Controllers\Admin;
use App\Middleware\Auth;
use App\Models\MenuModel;
use System\Src\Session;
use System\Src\Paginate;

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
        $page = (int) $this->input('page');
        $page=$page > 1 ? $page : 1;
        $limit = 2 ;
        $offset = ($page - 1 )* $limit;

        $numRows = $this->menuModel->countRows();

        return view('admin/main',
        ['title'=>'danh sách danh mục',
        'template' => 'menus/list',
        'menus' => $this->menuModel->get(),
        'pages' => Paginate::view($numRows,$limit,$page)

        ]
    );
    }
    
    public function edit(int $id = 0){
        $menu = $this->menuModel->show($id);
        if($menu == null){
            Session::has('errors','id not found');
            return redirect('/admin/menu/list');
        }
        return view('admin/main',[
         'title' => 'chỉnh sửa danh mục : ' . $menu['title'],
         'template' =>'menus/edit',
         'menu' => $menu,
         'menusParent' => $this->menuModel->get(0)         ]
        );
    }
    public function update(int $id=0){
        if(! $this->isMethod('POST')){
            Session::flash('errors','phương thức không chính xác');
            return redirect('/admin/menus/lists');
        }

        
        if($this->input('title')== null  ){
            Session::flash('errors','tiêu đề không trống');
            return redirect('/admin/menus/lists');
        }
        $menu = $this->menuModel->show($id);
        if($menu == null){
            Session::has('errors','id not found');
            return redirect('/admin/menus/lists');
        }
        $data = $this->input();
       
        $result =$this->menuModel->update($data,$id);
        if($result){
            Session::flash('success','cập nhập thành công');
            return redirect('/admin/menus/lists');
        }
        Session::flash('error','cập nhật lỗi');
        return redirect('/admin/menus/lists');
    }

    public function remove(){
        if(! $this->isMethod('POST')){
            return json(['error'=> true,'message'=>'Error']);

        }
        $id=(int)$this->input('id');
        $menu = $this->menuModel->show($id);
        if($menu == null){
            return json(['error'=> true,'message'=>'Error']);
        }
        if(file_exists (__PUBLIC__ . $menu['thumb'])){
            unlink(__PUBLIC__ . $menu['thumb']);
        
          
        }
        $result = $this->menuModel->delete($id);

        return $result
        ? json(['error'=> true,'message'=>'xóa thành công'])
        : json(['error'=> false,'message'=>'xóa không thành công']);

    }

    
}