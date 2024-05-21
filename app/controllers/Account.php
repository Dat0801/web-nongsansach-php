<?php 
class Account extends Controller{

    public $data = [];
    public $customer;
    public function __construct() {
        $this->customer = $this->model('CustomerModel');
    }

    public function login() {
        $this->data['title'] = 'Trang đăng nhập';
        $this->data['content'] = 'account/login';
        $this->render('layouts/client_layout', $this->data);
    }
    public function register() {
        $this->data['title'] = 'Trang đăng ký';
        $this->data['content'] = 'account/Register';

        $request = new Request();
        
        if ($request->isPost()) {
            $request->rules([
                'TenKH' => 'required|min:5|max:60',
                'Username' => 'required|min:5|max:60|unique:khachhang:Username',                
                'Password' => 'required|callback_validatePassword',
                'RepeatPassword' => 'required|same:Password',
                'Email' => 'required|email|unique:khachhang:Email',
                'SDT' => 'required|callback_validatePhoneNumber',
                'province' => 'required',
                'district' => 'required',
                'ward' => 'required',                              
                'DiaChi' => 'required|min:5|max:100',                             
            ]);

            $request->messages([
                'TenKH.required' => 'Tên khách hàng không được để trống',
                'TenKH.min' => 'Tên khách hàng phải lớn hơn 5 ký tự',
                'TenKH.max' => 'Tên khách hàng phải nhỏ hơn 60 ký tự',
                'Username.required' => 'Tên tài khoản không được để trống',
                'Username.min' => 'Tên tài khoản phải lớn hơn 5 ký tự',
                'Username.max' => 'Tên tài khoản phải nhỏ hơn 60 ký tự',
                'Username.unique' => 'Tên tài khoản đã tồn tại. Vui lòng chọn tên khác!',
                'Password.required' => 'Mật khẩu không được để trống',                
                'Password.callback_validatePassword' => 'Mật khẩu phải có ít nhất 8 ký tự, chứa ít nhất một chữ cái viết hoa, một chữ cái viết thường, một số và một ký tự đặc biệt',
                'RepeatPassword.required' => 'Vui lòng nhập lại mật khẩu',  
                'RepeatPassword.same' => 'Mật khẩu không khớp',              
                'Email.required' => 'Email không được để trống',
                'Email.email' => 'Email không hợp lệ',
                'SDT.required' => 'Số điện thoại không được để trống',
                'SDT.callback_validatePhoneNumber' => 'Số điện thoại không hợp lệ',
                'province.required' => 'Vui lòng chọn tỉnh thành',
                'district.required' => 'Vui lòng chọn quận/huyện',
                'ward.required' => 'Vui lòng chọn phường/xã',
                'DiaChi.required' => 'Địa chỉ không được để trống',
                'DiaChi.min' => 'Địa chỉ phải lớn hơn 5 ký tự',
                'DiaChi.max' => 'Địa chỉ phải nhỏ hơn 100 ký tự',                
            ]);

            $validate = $request->validate();
            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = "Đã có lỗi xãy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['old'] = $request->getFields();
            } else {                                
                $data = $request->getFields();
                $data['DiaChi'] = $data['DiaChi'] . ', ' . $data['province'] . ', ' . $data['district'] . ', ' . $data['ward'];
                unset($data['province'], $data['district'], $data['ward'], $data['RepeatPassword']);
                $this->customer->addCustomer($data);
                header('Location: ' . _WEB_ROOT . '/Account/Login?msg=Đăng ký thành công! Vui lòng đăng nhập');
            }
        }
        $this->render('layouts/client_layout', $this->data);
    }
    function validatePassword($value) {        
            
        if (strlen($value) < 8) {
            return false;
        }
            
        if (!preg_match("/[A-Z]/", $value)) {
            return false;
        }
            
        if (!preg_match("/[a-z]/", $value)) {
            return false;
        }
        
        if (!preg_match("/[0-9]/", $value)) {
            return false;
        }
        
        if (!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $value)) {
            return false;
        }
        return true;
    }
    

    public function validatePhoneNumber($value) {
        $pattern = "/^(0|\+84)(3[2-9]|5[2689]|7[06-9]|8[1-689]|9[0-9])\d{7}$/";
        if (!preg_match($pattern, $value)) {
            return false;
        }
        return true;
    }   
         
}