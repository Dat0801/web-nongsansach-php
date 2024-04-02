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
        $mahh = $request->getFields();
        $dataProduct = $this->product->getDetail($mahh["mahh"]);
        $this->data['sub_content']['product'] = $dataProduct;
        $this->render('layouts/admin_layout', $this->data); 
    }

    public function updateProduct() {
        $request = new Request();
        $id = $_GET["mahh"];
        $data = $request->getFields();
        $this->product->updateProduct($data, $id);
        header('Location: '._WEB_ROOT.'/admin/product');
    }
    
}