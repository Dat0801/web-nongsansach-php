<?php 
class Home extends Controller{

    public $model_home;
    public $data = [];

    public function __construct() {
        $this->model_home = $this->model('HomeModel');
    }

    public function index() {
        $this->data['title'] = 'Trang chủ';
        $this->data['content'] = 'home/index';
        $this->render('layouts/client_layout', $this->data);
    }
    

}