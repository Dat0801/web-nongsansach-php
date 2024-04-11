<?php
class Customer extends Controller{

    public $data = [];
    public $customer;

    public function __construct(){
        $this->customer = $this->model('CustomerModel');
    }

    public function index() {
        $this->data['content'] = '/admin/customers/ViewCustomer';
        $this->data['title'] = 'Trang khách hàng';
        $dataProduct = $this->customer->getCustomerList();
        $this->data['sub_content']['list'] = $dataProduct;
        $this->data['sub_content']['customer_model'] = $this->customer;
        $this->render('layouts/admin_layout', $this->data);
    }

    public function editCustomer() {
        $this->data['content'] = '/admin/customers/EditCustomer';
        $this->data['title'] = 'Trang sửa khách hàng';
        $request = new Request();
        $MaHang = $request->getFields();
        $dataProduct = $this->customer->getDetail($MaHang["MaKH"]);
        $this->data['sub_content']['customer'] = $dataProduct;
        $this->render('layouts/admin_layout', $this->data); 
    }

    // public function viewAddProduct() {
    //     $this->data['content'] = '/admin/customers/AddProduct';
    //     $this->data['title'] = 'Trang thêm sản phẩm';
    //     $this->render('layouts/admin_layout', $this->data);
    // }

    // public function addProduct() {
    //     $request = new Request();
    //     $data = $request->getFields();
    //     $this->customer->addProduct($data);
    //     header('Location: '._WEB_ROOT.'/admin/customer');
    // }

    public function updateCustomers() {
        $request = new Request();
        $id = $_GET["MaKH"];
        $data = $request->getFields();
        $this->customer->updateCustomer($data, $id);
        header('Location: '._WEB_ROOT.'/admin/customer');
    }   
    
    // public function deleteProduct() {
    //     $id = $_GET["MaHang"];
    //     $this->customer->deleteProduct($id);
    //     header('Location: '._WEB_ROOT.'/admin/customer');
    // }

   
}