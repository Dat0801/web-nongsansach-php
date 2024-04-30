<?php
class Checkout extends Controller
{

    public $data = [];
    public $customer;

    public function __construct()
    {
        $this->customer = $this->model('CustomerModel');
    }

    public function index()
    {
        $this->data['title'] = 'Trang thanh toán';
        $this->data['content'] = 'checkout/index';

        $request = new Request();
        if ($request->isPost()) {
            $request->rules([
                'TenKH' => 'required|min:5|max:60',
                'Email' => 'required|email',
                'SDT' => 'required|callback_validatePhoneNumber',
                'DiaChi' => 'required|min:5|max:100',
            ]);

            $request->messages([
                'TenKH.required' => 'Tên khách hàng không được để trống',
                'TenKH.min' => 'Tên khách hàng phải lớn hơn 5 ký tự',
                'TenKH.max' => 'Tên khách hàng phải nhỏ hơn 60 ký tự',
                'Email.required' => 'Email không được để trống',
                'Email.email' => 'Email không hợp lệ',
                'SDT.required' => 'Số điện thoại không được để trống',
                'SDT.callback_validatePhoneNumber' => 'Số điện thoại không hợp lệ',
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
                $this->customer->addCustomer($data);
            }
        }

        $this->render('layouts/client_layout', $this->data);
    }

    public function validatePhoneNumber($value)
    {
        $pattern = "/^(0|\+84)(3[2-9]|5[2689]|7[06-9]|8[1-689]|9[0-9])\d{7}$/";
        if (!preg_match($pattern, $value)) {
            return false;
        }
        return true;
    }
}