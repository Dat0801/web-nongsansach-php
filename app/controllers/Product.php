<?php
class Product extends Controller{

    public $data = [];
    public $product;

    public function __construct(){
        $this->product = $this->model('ProductModel');
    }

    public function index() {
        $this->data['content'] = 'products/index';
        $this->data['title'] = 'Trang sản phẩm';
        $this->data['sub_content']['name'] = 'Sản Phẩm';
        $this->render('layouts/client_layout', $this->data);
    }

    public function list_product() {
       // $dataProduct = $this->product->getProductList();
        //$dataProduct = $this->product->get();
        $dataProduct = $this->db->table('hanghoa')->get();
        $this->data['product_list'] = $dataProduct;
        //Render View
        $this->render('products/list', $this->data);
    }

    public function detail($id=0) {
        $product = $this->model('ProductModel');
        //$this->data['sub-content']['info'] = $product->getDetail($id);
        $this->data['content'] = 'products/detail';
        $this->data['title'] = 'Trang chi tiết sản phẩm';
        $this->render('layouts/client_layout', $this->data);
    }

    public function get_category() {
        $request = new Request();
        $request->getMethod();
    }

    public function post_category() {
        $request = new Request();
        $request->getFields();
    }
}