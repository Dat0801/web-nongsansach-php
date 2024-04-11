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
        
    }

    public function post_category() {
        $request = new Request();
        $data = $request->getFields();
        print_r($data);

        $request->rules([
            'fullname' => 'required|min:5|max:30',
            'email' => 'required|email|min:6',
        ]);

        $request->messages([
            'fullname.required' => 'Họ tên không được để trống',
            'fullname.min' => 'Họ tên phải lớn hơn 5 ký tự',
            'fullname.max' => 'Họ tên phải nhỏ hơn 30 ký tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.min' => 'Email phải lớn hơn 6 ký tự',
        ]);

        $validate = $request->validate();
    }
}