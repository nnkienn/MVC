<?php
namespace App\Controllers\Admin;
use App\Middleware\Auth;
use App\Models\MenuModel;
use System\Src\Session;
use  App\Services\Products\ProductService;
use App\Models\ProductModel;
class ProductController extends Auth{
    protected $menuModel ;
    protected $productService;

    protected $productModel;
    public function __construct(){
        parent::__construct();
        $this->menuModel = new MenuModel;
        $this->productService = new ProductService;
        $this->productModel = new ProductModel;

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

        $isValidatePrice = $this->productService->handlePrice((int)$this->input('price'),(int)$this->input('price_sale'));
        if($isValidatePrice == false){
            return redirect('/admin/products/add');

        }

        $product = $this->productModel->insert($this->input());

        if($product){
            Session::flash('success','Thành công');
            return redirect('/admin/products/add');
        }

        Session::flash('errors','thêm sản phảm lỗi');
        return redirect('/admin/products/add');
    }
}