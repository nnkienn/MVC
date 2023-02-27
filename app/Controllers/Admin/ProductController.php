<?php

namespace App\Controllers\Admin;

use App\Middleware\Auth;
use App\Models\MenuModel;
use App\Models\ProductModel;
use System\Src\Session;
use App\Services\Products\ProductService;
use System\Src\Paginate;

class ProductController extends Auth
{
    protected $menuModel;
    protected $productService;
    protected $productModel;

    public function __construct()
    {
        parent::__construct();
        $this->menuModel = new MenuModel;
        $this->productService = new ProductService;
        $this->productModel = new ProductModel;
    }

    public function create()
    {
        return view('admin/main', [
            'title' => 'Thêm Sản Phẩm',
            'template' => 'products/add',
            'menus' => $this->menuModel->getAllMenuIsActive()
        ]);
    }

    public function store()
    {
        if (! $this->isMethod('post')) {
            Session::flash('error', 'Phương thức không hổ trợ');
            return redirect('/admin/products/add');
        }

        if ($this->input('title') == null || $this->input('thumb') == null) {
            Session::flash('error', 'Tiêu đề hoặc Ảnh không được trống');
            return redirect('/admin/products/add');
        }

        #Kiểm tra giá tiền
        $isValidatePrice = $this->productService->handlePrice(
            (float) $this->input('price'), 
            (float) $this->input('price_sale')
        );

        if ($isValidatePrice == false) return redirect('/admin/products/add');

        $product = $this->productModel->insert($this->input());
        if ($product) {
            Session::flash('success', 'Thêm sản phẩm mới thành công');
            return redirect('/admin/products/add');
        }

        Session::flash('errors', 'Có lỗi vui lòng thử lại');
        return redirect('/admin/products/add');
    }

    public function index()
    {
        $page = (int)$this->input('page');
        $page = $page > 1 ? $page : 1;
        $limit = 10;
        $offset = ($page - 1) * $limit;
        $numRows = $this->productModel->countRows();

        return view('admin/main', [
            'title' => 'Danh Sách Sản Phẩm - Trang ' . $page,
            'template' => 'products/list',
            'products' => $this->productModel->get($limit, $offset),
            'pages' => Paginate::view($numRows, $limit, $page, '/admin/products/lists')
        ]);
    }
    public function edit(int $id = 0)
    {
        //Lấy thông tin của id
        $products = $this->productModel->show($id);
        if ($products == null) {
            Session::flash('errors', 'Id không tồn tại');
            return redirect('/admin/products/lists');
        }

        return view('admin/main', [
            'title' => 'Chỉnh sửa sản phẩm: ' . $products['title'],
            'template' => 'products/edit',
            'products' => $products,
        ]);
    }
    public function update(int $id = 0)
    {
        #kiểm tra phương thức
        if (! $this->isMethod('post')) {
            Session::flash('errors', 'Phương thức không chính xác');
            return redirect('/admin/products/lists');
        }

        if ($this->input('title') == null) {
            Session::flash('errors', 'Tiêu đề không được trống');
            return redirect('/admin/products/lists');
        }
     //Lấy thông tin của id
     $products = $this->productModel->show($id);
     if ($products == null) {
         Session::flash('errors', 'Id không tồn tại');
         return redirect('/admin/products/lists');
     }

        $data = $this->input();
        if ($this->input('thumb') == null) {
            unset($data['thumb']);//xóa đi
        }

        $result = $this->productModel->update($data, $id);
        if ($result) {
            Session::flash('success', 'Cập nhật thành công');
            return redirect('/admin/products/lists');
        }

        Session::flash('errors', 'Cập nhật lỗi');
        return redirect('/admin/products/lists');
    }
    public function remove()
    {
        if (! $this->isMethod('post')) {
            return json(['error' => true, 'message' => 'Phương thức không chính xác']);
        }

        $id = (int)$this->input('id');
        $products = $this->productModel->show($id);
        if ($products == null) {
            return json(['error' => true, 'message' => 'Id không tồn tại']);
        }

        //Xóa ảnh /uploads/2022/10/01/name.jpg_delete
        if (file_exists(__PUBLIC__ . $products['thumb'])) {
            unlink(__PUBLIC__ . $products['thumb']);
        }

        $result = $this->productModel->delete($id);

        return $result 
            ? json(['error' => false, 'message' => 'Xóa thành công'])
            : json(['error' => true, 'message' => 'Xóa lỗi']);
    }
}