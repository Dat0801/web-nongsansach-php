<?php 
class Customer extends Controller{

    public $data = [];
    public function __construct() {
    }

    public function index() {
        $this->data['title'] = 'Hồ sơ khách hàng';
        $this->data['content'] = 'customer/index';
        $this->render('layouts/client_layout', $this->data);
    }
    
}
