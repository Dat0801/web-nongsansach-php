<?php 
class Dashboard extends Controller{

    public $data = [];

    public function __construct() {

    }

    public function index() {
        $this->data['title'] = 'Trang chủ admin';
        $this->data['content'] = 'admin/home/index';
        $this->render('layouts/admin_layout', $this->data);
    }
    

}