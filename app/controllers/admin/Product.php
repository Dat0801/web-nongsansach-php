<?php
class Product extends Controller{

    public $data = [];
    public $product;

    public function __construct(){
        $this->product = $this->model('ProductModel');
    }

    public function index() {
        $this->data['content'] = '/admin/products/ViewProduct';
        $this->data['title'] = 'Trang sản phẩm';
        $dataProduct = $this->product->getProductList();
        $this->data['sub_content']['product_list'] = $dataProduct;
        $this->render('layouts/admin_layout', $this->data);
    }

    public function editProduct() {
        $this->data['content'] = '/admin/products/EditProduct';
        $this->data['title'] = 'Trang sửa sản phẩm';
        $request = new Request();
        $MaHang = $request->getFields();
        $dataProduct = $this->product->getDetail($MaHang["MaHang"]);
        $this->data['sub_content']['product'] = $dataProduct;
        $this->render('layouts/admin_layout', $this->data); 
    }

    public function viewAddProduct() {
        $this->data['content'] = '/admin/products/AddProduct';
        $this->data['title'] = 'Trang thêm sản phẩm';
        $this->render('layouts/admin_layout', $this->data);
    }

    public function addProduct() {
        $request = new Request();
        $data = $request->getFields();
        $this->product->addProduct($data);
        header('Location: '._WEB_ROOT.'/admin/product');
    }

    public function updateProduct() {
        $request = new Request();
        $id = $_GET["MaHang"];
        $data = $request->getFields();
        $this->product->updateProduct($data, $id);
        header('Location: '._WEB_ROOT.'/admin/product');
    }
    
    public function deleteProduct() {
        $request = new Request();
        $id = $_GET["MaHang"];
        $this->product->deleteProduct($id);
        header('Location: '._WEB_ROOT.'/admin/product');
    }

   
}