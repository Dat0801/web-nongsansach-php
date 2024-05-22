<?php
class Customer extends Controller
{

    public $data = [];
    public $product, $order, $orderDetail, $customer;
    public function __construct()
    {
        $this->product = $this->model('ProductModel');
        $this->order = $this->model('OrderModel');
        $this->orderDetail = $this->model('OrderDetailModel');
        $this->customer = $this->model('CustomerModel');
    }

    public function index()
    {

        $this->data['title'] = 'Hồ sơ khách hàng';
        $this->data['content'] = 'customer/index';
        if (isset($_SESSION['user'])) {
            $listOrder = $this->order->getOrderListByCustomer($_SESSION['user']['MaKH']);
            foreach ($listOrder as $key => $value) {
                $listOrder[$key]['detail'] = $this->orderDetail->getDetail($value['MaHD']);
                foreach ($listOrder[$key]['detail'] as $detailKey => $detailValue) {
                    if (isset($detailValue['MaHang'])) {
                        $product = $this->product->getDetail($detailValue['MaHang']);
                        $listOrder[$key]['detail'][$detailKey]['product'] = $product;
                    }
                }
            }
            $this->data['sub_content']['purchasing_history'] = $listOrder;
        }

        $request = new Request();

        if ($request->isPost()) {
            //change password
            $field = $request->getFields();

            if (isset($field["btnChangePassword"])) {
                if ($field['oldpassword'] != $_SESSION['user']['Password']) {
                    $this->data['sub_content']['errormsg'] = 'Mật khẩu cũ không đúng';
                } else {
                    if ($field['newpassword'] != $field['renewpassword']) {
                        $this->data['sub_content']['errormsg'] = 'Mật khẩu mới không khớp';
                    } else {
                        $this->customer->changePassword($_SESSION['user']['Username'], $field['newpassword']);
                        $_SESSION['user']['Password'] = $field['newpassword'];
                        $this->data['sub_content']['successmsg'] = 'Đổi mật khẩu thành công';
                    }
                }
            }

            //validate client data
            $request->rules([
                'TenKH' => 'required|min:5|max:60',
            ]);

            $request->messages([
                'TenKH.required' => 'Tên khách hàng không được để trống',
                'TenKH.min' => 'Tên khách hàng phải lớn hơn 5 ký tự',
                'TenKH.max' => 'Tên khách hàng phải nhỏ hơn 60 ký tự',
            ]);

            $validate = $request->validate();

            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['errormsg'] = "Đã có lỗi xãy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['old'] = $request->getFields();
            } else {
                $data = $request->getFields();
                $_SESSION['user']['TenKH'] = $data["TenKH"];
                $this->customer->updateCustomer($_SESSION['user'], $_SESSION['user']['MaKH']);
                $this->data['sub_content']['successmsg'] = 'Cập nhật thông tin thành công';
            }
        }



        $this->render('layouts/client_layout', $this->data);
    }
}
