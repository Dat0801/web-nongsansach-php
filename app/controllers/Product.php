<?php
class Product extends Controller{

    public $data = [];

    public function index() {
        $this->data['content'] = 'products/index';
        $this->data['title'] = 'Trang sản phẩm';
        $this->render('layouts/client_layout', $this->data);
    }

    public function list_product() {
        $product = $this->model('ProductModel');
        $dataProduct = $product->getProductList();
        $this->data['product_list'] = $dataProduct;
        //Render View
        $this->render('products/list', $this->data);
    }

    public function detail($id=0) {
        $product = $this->model('ProductModel');
        $this->data['sub-content']['info'] = $product->getDetail($id);
        $this->data['content'] = 'products/detail';
        $this->data['title'] = 'Trang chi tiết sản phẩm';
        $this->render('layouts/client_layout', $this->data);
    }

}