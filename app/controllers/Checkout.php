<?php
class Checkout extends Controller
{

    public $data = [];
    public $customer, $order, $orderDetail;

    public function __construct()
    {
        $this->customer = $this->model('CustomerModel');
        $this->order = $this->model('OrderModel');
        $this->orderDetail = $this->model('OrderDetailModel');
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
                'province' => 'required',
                'district' => 'required',
                'ward' => 'required',
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
                'province.required' => 'Vui lòng chọn tỉnh thành',
                'district.required' => 'Vui lòng chọn quận/huyện',
                'ward.required' => 'Vui lòng chọn phường/xã',
            ]);

            $validate = $request->validate();

            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['old'] = $request->getFields();
            } else {
                $data = $request->getFields();
                if (!isset($_SESSION['user'])) {
                    $mailer = new Mailer();
                    $datafield = $request->getFields();
                    $code = substr(rand(0, 999999), 0, 6);
                    $title = 'Xác nhận đơn hàng';
                    $content = 'Mã xác nhận của bạn là: <span style="color:green">' . $code . '</span>';
                    $addressMail = $datafield['Email'];
                    $mailer->sendMail($title, $content, $addressMail);
                    $_SESSION['code'] = $code;
                    $data['Username'] = '';
                    $data['Password'] = '';
                    $data['DiaChi'] = $data['DiaChi'] . ', ' . $data['ward'] . ', ' . $data['district'] . ', ' . $data['province'];
                    unset($data['province'], $data['district'], $data['ward']);
                    $_SESSION['user'] = $data;
                    header('Location: ' . _WEB_ROOT . '/checkout/verify');
                } else {
                    $_SESSION['user']['DiaChi'] = $data['DiaChi'] . ', ' . $data['ward'] . ', ' . $data['district'] . ', ' . $data['province'];
                    $data = [
                        'MaKH' => $_SESSION['user']['MaKH'],
                    ];
                    $this->order->addOrder($data);
                    $MaHD = $this->order->lastInsertId();
                    foreach ($_SESSION['cart_items'] as $cartItem) {
                        $cartItem["product_id"];
                        $data = [
                            'MaHang' => $cartItem["product_id"],
                            'MaHD' => $MaHD,
                            'SoLuong' => $cartItem["qty"],
                            'ThanhTien' => $cartItem["total_price"],
                        ];
                        $this->orderDetail->addOrder($data);
                    }
                    header('Location: ' . _WEB_ROOT . '/checkout/success');
                }
            }
        }

        $this->render('layouts/client_layout', $this->data);
    }

    public function verify()
    {
        $this->data['title'] = 'Trang xác thực';
        $this->data['content'] = 'Checkout/verify';
        $request = new Request();
        if ($request->isPost()) {
            $request->rules([
                'code' => 'required',
            ]);

            $request->messages([
                'code.required' => 'Mã xác nhận không được để trống',
            ]);
            $validate = $request->validate();
            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = "Đã có lỗi xãy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['old'] = $request->getFields();
            } else {
                $data = $request->getFields();
                if ($data['code'] == $_SESSION['code']) {
                    unset($_SESSION['code']);
                    $customer = $this->customer->getCustomerByEmail($_SESSION['user']['Email']);
                    if ($customer == null) {
                        $this->customer->addCustomer($_SESSION['user']);
                        $_SESSION['user']['MaKH'] = $this->customer->lastInsertId();
                    } else {
                        $_SESSION['user'] = $customer;
                    }
                    if (isset($_SESSION['user'])) {
                        $data = [
                            'MaKH' => $_SESSION['user']['MaKH'],
                        ];
                        $this->order->addOrder($data);
                        $MaHD = $this->order->lastInsertId();
                        foreach ($_SESSION['cart_items'] as $cartItem) {
                            $cartItem["product_id"];
                            $data = [
                                'MaHang' => $cartItem["product_id"],
                                'MaHD' => $MaHD,
                                'SoLuong' => $cartItem["qty"],
                                'ThanhTien' => $cartItem["total_price"],
                            ];
                            $this->orderDetail->addOrder($data);
                        }
                        header('Location: ' . _WEB_ROOT . '/checkout/success');
                    }
                } else {
                    unset($_SESSION['user']);
                    $this->data['sub_content']['msg'] = "Mã xác nhận không đúng!";
                }
            }
        }
        $this->render('layouts/client_layout', $this->data);
    }


    public function success()
    {
        $this->data['title'] = 'Đặt hàng thành công';
        $this->data['content'] = 'checkout/success';
        $content = 'Dưới đây là danh sách sản phẩm bạn đã đặt:<br>';
        $total = 0;
        foreach ($_SESSION['cart_items'] as $cartItem) {
            $total += $cartItem['total_price'];
            $cartItem["product_id"];
            $content .= 'Sản phẩm: ' . $cartItem["product_name"] . ', Đơn vị tính: ' . $cartItem['product_dvt'] . ', Số lượng: ' .
                $cartItem["qty"] . ', Thành tiền: ' . $cartItem["total_price"] . '<br>';
        }
        $content .= 'Tổng tiền: ' . $total;
        $mailer = new Mailer();
        $title = 'Đặt hàng thành công';
        $mailer->sendMail($title, $content, $_SESSION['user']['Email']);
        unset($_SESSION['cart_items']);
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