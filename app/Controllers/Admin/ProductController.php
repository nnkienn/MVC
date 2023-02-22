<?php
namespace App\Controllers\Admin;
use App\Middleware\Auth;
use App\Models\MenuModel;
use System\Src\Session;
use  App\Services\Products\ProductService;

class ProductController extends Auth{
    protected $menuModel ;
    protected $productService;

    public function __construct(){
        parent::__construct();
        $this->menuModel = new MenuModel;
        $this->productService = new ProductService;

    }
    public function create(){
        return view('admin/main',[
            'title'=> 'Thêm danh muc moi',
            'template'=> 'products/add',
            'menus' => $this->menuModel->getAllMenuIsActive()
        
        ]);
    }
    public function store(){
        if(! $this->isMethod('POST')){
            Session::flash('errors','phương thức không chính xác');
            return redirect('/admin/products/add');
        }

        if($this->input('title')== null && $this->input('thumb')==null ){
            Session::flash('errors','tiêu đề và ảnh không trống');
            return redirect('/admin/products/add');
        }

        $isValidatePrice = $this->productService->handlePrice($this->input('price'),$this->input('price_sale'));
        if($isValidatePrice == false){
            return redirect('/admin/products/add');

        }
    }
}