<?php 
class Cart extends Controller{

    public $data = [];

    public function __construct() {

    }

    public function index() {
        $this->data['title'] = 'Trang giỏ hàng';
        $this->data['content'] = 'cart/index';
        $this->render('layouts/client_layout', $this->data);
    }
    

}