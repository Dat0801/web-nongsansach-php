<?php
class Dashboard extends AdminController
{

    public $data = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['title'] = 'Trang chủ admin';
        $this->data['content'] = 'admin/home/index';
        $this->render('layouts/admin_layout', $this->data);
    }

}