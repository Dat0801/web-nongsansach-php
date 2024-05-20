<?php 
class Customer extends Controller{

    public $data = [];
    public $product, $order, $orderDetail;
    public function __construct() {
        $this->product = $this->model('ProductModel');
        $this->order = $this->model('OrderModel');
        $this->orderDetail = $this->model('OrderDetailModel');
    }

    public function index() {
        $this->data['title'] = 'Hồ sơ khách hàng';
        $this->data['content'] = 'customer/index';
        if(isset($_SESSION['user'])) {
            $listOrder = $this->order->getOrderListByCustomer($_SESSION['user']['MaKH']);
            $listProduct = null;
            foreach ($listOrder as $key => $value) {
                $listOrder[$key]['detail'] = $this->orderDetail->getDetail($value['MaHD']);
                foreach ($listOrder[$key]['detail'] as $detailKey => $detailValue) {
                    if (isset($detailValue['MaHang'])) {
                        $product = $this->product->getDetail($detailValue['MaHang']);
                        $product['SoLuong'] = $detailValue['SoLuong'];
                        $listProduct[$detailKey] = $product;
                    }
                }
            }
            var_dump($listProduct);
            $this->data['sub_content']['purchasing_history'] = $listProduct;
        }
        $this->render('layouts/client_layout', $this->data);
    }
    
}
