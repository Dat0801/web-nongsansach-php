<?php
class Customer extends Controller{

    public $data = [];
    public $customer;

    public function __construct(){
        $this->customer = $this->model('CustomerModel');
    }

    public function index() {
        $this->data['content'] = '/admin/customers/ViewCustomer';
        $this->data['title'] = 'Trang khách hàng';
        
        $dataCustomer = $this->customer->getCustomerList();

        $this->data['sub_content']['display'] = 5;
        $this->data['sub_content']['list'] = $dataCustomer;
        $this->data['sub_content']['customer_model'] = $this->customer;

        $this->render('layouts/admin_layout', $this->data);
    }

    public function editCustomer() {
        $this->data['content'] = '/admin/customers/EditCustomer';
        $this->data['title'] = 'Trang sửa khách hàng';

        $request = new Request();

        

        $id = $_GET["MaKH"];

        if ($request->isPost()) {

            $username = $_GET["Username"]; 

            $dataCustomer = $request->getFields(); 

            $dataCustomer["MaKH"] = $id;
            $dataCustomer["Username"] = $username;            

            $request->rules([
                'TenKH' => 'required|min:5|max:60',
                'Username' => 'required|min:5|max:60|unique:khachhang:Username:MaKH=' . $id . '',                
                'Password' => 'required|callback_validatePassword',
                'Email' => 'required|email',
                'SDT' => 'required|callback_validatePhoneNumber',                                
                'DiaChi' => 'required|min:5|max:100',
                'TrangThai' => 'required|check',                
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
                'Email.required' => 'Email không được để trống',
                'Email.email' => 'Email không hợp lệ',
                'SDT.required' => 'Số điện thoại không được để trống',
                'SDT.callback_validatePhoneNumber' => 'Số điện thoại không hợp lệ',
                'DiaChi.required' => 'Địa chỉ không được để trống',
                'DiaChi.min' => 'Địa chỉ phải lớn hơn 5 ký tự',
                'DiaChi.max' => 'Địa chỉ phải nhỏ hơn 100 ký tự',
                'TrangThai.required' => 'Trạng thái không được để trống',
                'TrangThai.check' => 'Trạng thái không hợp lệ',
            ]);

            $validate = $request->validate();
            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = "Đã có lỗi xãy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['customer'] = $dataCustomer;
            } else {
                $this->customer->updateCustomer($dataCustomer, $id);
                header('Location: ' . _WEB_ROOT . '/admin/Customer/index?msg=Thêm thành công!');
            }
        } else {
            $dataCustomer = $this->customer->getDetail($id);
            $this->data['sub_content']['customer'] = $dataCustomer;
        }
        $this->render('layouts/admin_layout', $this->data);
    }
    

    public function addCustomer() {
        $this->data['content'] = '/admin/customers/AddCustomer';
        $this->data['title'] = 'Trang thêm khách hàng';
        

        $request = new Request();

        if ($request->isPost()) {
            $request->rules([
                'TenKH' => 'required|min:5|max:60',
                'Username' => 'required|min:5|max:60|unique:khachhang:Username',                
                'Password' => 'required|callback_validatePassword',
                'Email' => 'required|email',
                'SDT' => 'required|callback_validatePhoneNumber',                                
                'DiaChi' => 'required|min:5|max:100',
                'TrangThai' => 'required|check',                
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
                'Email.required' => 'Email không được để trống',
                'Email.email' => 'Email không hợp lệ',
                'SDT.required' => 'Số điện thoại không được để trống',
                'SDT.callback_validatePhoneNumber' => 'Số điện thoại không hợp lệ',
                'DiaChi.required' => 'Địa chỉ không được để trống',
                'DiaChi.min' => 'Địa chỉ phải lớn hơn 5 ký tự',
                'DiaChi.max' => 'Địa chỉ phải nhỏ hơn 100 ký tự',
                'TrangThai.required' => 'Trạng thái không được để trống',
                'TrangThai.check' => 'Trạng thái không hợp lệ',
            ]);

            $validate = $request->validate();
            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = "Đã có lỗi xãy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['old'] = $request->getFields();
            } else {
                $data = $request->getFields();
                $this->customer->addCustomer($data);
                header('Location: ' . _WEB_ROOT . '/admin/Customer/index?msg=Thêm thành công!');
            }
        }
        $this->render('layouts/admin_layout', $this->data);
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

    
    
    // public function deleteProduct() {
    //     $id = $_GET["MaHang"];
    //     $this->customer->deleteProduct($id);
    //     header('Location: '._WEB_ROOT.'/admin/customer');
    // }

   
}