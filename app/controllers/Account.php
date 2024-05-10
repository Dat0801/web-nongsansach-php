<?php 
class Account extends Controller{

    public $data = [];
    public $province, $district, $wards;
    public function __construct() {
        $this->province = $this->model('ProvinceModel');
        $this->district = $this->model('DistrictModel');
        $this->wards = $this->model('WardsModel');
    }

    public function login() {
        $this->data['title'] = 'Trang đăng nhập';
        $this->data['content'] = 'account/login';
        $this->render('layouts/client_layout', $this->data);
    }
    public function register() {
        $this->data['title'] = 'Trang đăng ký';
        $this->data['content'] = 'account/register';
                
        $this->data['sub_content']['province_list'] = $this->province->getProvinceList();        
        $this->data['sub_content']['district_model'] = $this->district;
        $this->data['sub_content']['wards_model'] = $this->wards;
        
        $this->render('layouts/client_layout', $this->data);
    }
}