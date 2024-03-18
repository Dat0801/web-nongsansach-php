<?php 
class Account extends Controller{

    public $data = [];

    public function __construct() {

    }

    public function login() {
        $this->data['title'] = 'Trang đăng nhập';
        $this->data['content'] = 'account/login';
        $this->render('layouts/client_layout', $this->data);
    }
    public function register() {
        $this->data['title'] = 'Trang đăng ký';
        $this->data['content'] = 'account/register';
        $this->render('layouts/client_layout', $this->data);
    }
}