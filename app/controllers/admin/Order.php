<?php
class Order extends Controller{

    public $data = [];
    public $order;

    public function __construct(){
        $this->order = $this->model('OrderModel');
    }

    public function index() {
        $this->data['content'] = '/admin/orders/ViewOrder';
        $this->data['title'] = 'Trang sản phẩm';
        $dataOrder = $this->order->getorderList();
        $this->data['sub_content']['order_list'] = $dataOrder;
        $this->render('layouts/admin_layout', $this->data);
    }

    public function editorder() {
        $this->data['content'] = '/admin/orders/EditOrder';
        $this->data['title'] = 'Trang sửa sản phẩm';
        $request = new Request();
        $MaHD = $request->getFields();
        $dataorder = $this->order->getDetail($MaHD["MaHD"]);
        $this->data['sub_content']['order'] = $dataorder;
        $this->render('layouts/admin_layout', $this->data); 
    }

    public function updateorder() {
        $request = new Request();
        $id = $_GET["MaHD"];
        $data = $request->getFields();
        $this->order->updateorder($data, $id);
        header('Location: '._WEB_ROOT.'/admin/order');
    }
    
}