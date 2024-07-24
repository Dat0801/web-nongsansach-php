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
        if (!isset($_SESSION['cart_items']) || count($_SESSION['cart_items']) == 0) {
            header('Location: ' . _WEB_ROOT . '/cart');
        }
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
                    if (isset($data['redirect'])) {
                        $_SESSION['payment'] = true;
                        unset($data['redirect']);
                    }
                    $_SESSION['user'] = $data;
                    header('Location: ' . _WEB_ROOT . '/checkout/verify');
                } else {
                    $_SESSION['user']['DiaChi'] = $data['DiaChi'] . ', ' . $data['ward'] . ', ' . $data['district'] . ', ' . $data['province'];
                    $data = [
                        'MaKH' => $_SESSION['user']['MaKH'],
                    ];
                    $this->order->addOrder($data);
                    $MaHD = $this->order->lastInsertId();
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['redirect'])) {
                        $_SESSION['payment'] = true;
                        $payment = new payment;
                        $total = 0;
                        foreach ($_SESSION['cart_items'] as $cartItem) {
                            $cartItem["product_id"];
                            $data = [
                                'MaHang' => $cartItem["product_id"],
                                'MaHD' => $MaHD,
                                'SoLuong' => $cartItem["qty"],
                                'ThanhTien' => $cartItem["total_price"],
                            ];
                            $this->orderDetail->addOrder($data);
                            $total += $cartItem['total_price'];
                        }
                        $order_id = $MaHD;
                        $order_price = $total;
                        $_SESSION['orderPaid'] = $MaHD;
                        $_SESSION['verifyCheckout'] = true;
                        $payment->vnpay_payment($order_id, $order_price);
                    } else {
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
                        $_SESSION['verifyCheckout'] = true;
                        header('Location: ' . _WEB_ROOT . '/checkout/success');
                        exit;
                    }
                }

            }
        }

        $this->render('layouts/client_layout', $this->data);
    }

    public function verify()
    {
        $this->data['title'] = 'Trang xác thực';
        $this->data['content'] = 'checkout/verify';
        if (!isset($_SESSION['code'])) {
            header('Location: ' . _WEB_ROOT . '/checkout');
        }
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
                    $_SESSION['verifyCheckout'] = true;
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
                        if (isset($_SESSION['payment'])) {
                            $payment = new payment;
                            $total = 0;
                            foreach ($_SESSION['cart_items'] as $cartItem) {
                                $cartItem["product_id"];
                                $data = [
                                    'MaHang' => $cartItem["product_id"],
                                    'MaHD' => $MaHD,
                                    'SoLuong' => $cartItem["qty"],
                                    'ThanhTien' => $cartItem["total_price"],
                                ];
                                $this->orderDetail->addOrder($data);
                                $total += $cartItem['total_price'];
                            }
                            $order_id = $MaHD;
                            $order_price = $total;
                            $_SESSION['orderPaid'] = $MaHD;
                            $_SESSION['verifyCheckout'] = true;
                            $payment->vnpay_payment($order_id, $order_price);
                        } else {
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
        unset($_SESSION['payment']);
        if (!isset($_SESSION['verifyCheckout'])) {
            header('Location: ' . _WEB_ROOT . '/checkout/verify');
        } else {
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
            unset($_SESSION['verifyCheckout']);
            $this->render('layouts/client_layout', $this->data);
        }
    }
    //create payment
    public function payment()
    {
        $this->data['title'] = 'Thanh toán';
        $this->data['content'] = 'checkout/payment';
        if (!isset($_SESSION['verifyCheckout'])) {
            header('Location: ' . _WEB_ROOT . '/checkout/verify');
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if ($_GET['vnp_ResponseCode'] == '00') {
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
                    unset($_SESSION['verifyCheckout']);
                    $this->data['sub_content']['success_msg'] = "Giao dịch thành công";
                } else {
                    $this->data['sub_content']['error_msg'] = "Giao dịch thất bại";
                }
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