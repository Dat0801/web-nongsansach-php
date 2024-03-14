<?php 
class Checkout extends Controller{

    public $data = [];

    public function __construct() {

    }

    public function index() {
        $this->data['title'] = 'Trang thanh toán';
        $this->data['content'] = 'checkout/index';
        $this->render('layouts/client_layout', $this->data);
    }
    

}