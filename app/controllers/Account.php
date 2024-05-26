<?php


class Account extends Controller
{

    public $data = [];

    public $customer, $province, $district, $wards, $employee;

    public function __construct()
    {
        $this->province = $this->model('ProvinceModel');
        $this->district = $this->model('DistrictModel');
        $this->wards = $this->model('WardsModel');
        $this->customer = $this->model('CustomerModel');
        $this->employee = $this->model('EmployeeModel');
    }
    public function login()
    {
        $this->data['title'] = 'Trang đăng nhập';
        $this->data['content'] = 'account/login';

        $request = new Request();

        if ($request->isGet()) {
            if (isset($_GET['successmsg'])) {
                $this->data['sub_content']['successmsg'] = $_GET['successmsg'];
            }
        }

        if ($request->isPost()) {
            $request->rules([
                'Username' => 'required',
                'Password' => 'required',
            ]);

            $request->messages([
                'Username.required' => 'Tên tài khoản không được để trống',
                'Password.required' => 'Mật khẩu không được để trống',
            ]);
            $validate = $request->validate();
            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['errmsg'] = "Đã có lỗi xãy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['old'] = $request->getFields();
            } else {
                unset($_SESSION['user']);
                $data = $request->getFields();
                $customer = $this->customer->checkLogin($data['Username'], $data['Password']);
                if ($customer != null) {
                    $_SESSION['user'] = $customer;
                    header('Location: ' . _WEB_ROOT . '/customer');
                } else {
                    $this->data['sub_content']['errmsg'] = "Tên tài khoản hoặc mật khẩu không đúng!";
                }
            }
        }
        $this->render('layouts/client_layout', $this->data);
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: ' . _WEB_ROOT . '/account/login');
    }

    function validatePassword($value)
    {

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
    public function forgotPassword()
    {
        $request = new Request();
        if ($request->isPost()) {
            $request->rules([
                'Email' => 'required',
            ]);

            $request->messages([
                'Email.required' => 'Email không được để trống',
            ]);
            $validate = $request->validate();
            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = "Đã có lỗi xãy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['old'] = $request->getFields();
            } else {
                if ($this->customer->getCustomerByEmail($request->getFields()['Email']) == null) {
                    $this->data['sub_content']['msg'] = "Email không tồn tại trong hệ thống! Vui lòng tạo tài khoản mới!";
                } else {
                    $mailer = new Mailer();
                    $datafield = $request->getFields();
                    $code = substr(rand(0, 999999), 0, 6);
                    $title = 'Quên mật khẩu';
                    $content = 'Mã xác nhận của bạn là: <span style="color:green">' . $code . '</span>';
                    $addressMail = $datafield['Email'];
                    $mailer->sendMail($title, $content, $addressMail);
                    $_SESSION['code'] = $code;
                    $_SESSION['Email'] = $datafield['Email'];
                    header('Location: ' . _WEB_ROOT . '/account/verify');
                }
            }
        }

        $this->data['title'] = 'Trang quên mật khẩu';
        $this->data['content'] = 'account/forgotPassword';
        $this->render('layouts/client_layout', $this->data);
    }

    public function verify()
    {
        $this->data['title'] = 'Trang xác thực';
        $this->data['content'] = 'account/verify';
        if (!isset($_SESSION['code'])) {
            header('Location: ' . _WEB_ROOT . '/account/forgotPassword');
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
                    $_SESSION['verify'] = true;
                    if (isset($_SESSION['register'])) {
                        $this->customer->addCustomer($_SESSION['register']);
                        unset($_SESSION['register']);
                        header('Location: ' . _WEB_ROOT . '/Account/Login?successmsg=Đăng ký thành công! Vui lòng đăng nhập');
                    } else {
                        $customer = $this->customer->getCustomerByEmail($_SESSION['Email']);
                        if ($customer['Username'] == null && $customer['Password'] == null) {
                            $_SESSION['createAccount'] = true;
                            header('Location: ' . _WEB_ROOT . '/account/createAccount');
                        } else {
                            $_SESSION['resetPassword'] = true;
                            header('Location: ' . _WEB_ROOT . '/account/resetPassword');
                        }
                    }
                } else {
                    $this->data['sub_content']['msg'] = "Mã xác nhận không đúng!";
                }
            }
        }
        $this->render('layouts/client_layout', $this->data);
    }

    public function resetPassword()
    {
        if (isset($_SESSION['verify'])) {
            if (!isset($_SESSION['resetPassword'])) {
                header('Location: ' . _WEB_ROOT . '/account/createAccount');
            }
        } else {
            header('Location: ' . _WEB_ROOT . '/account/verify');
        }
        $request = new Request();
        if ($request->isPost()) {
            $request->rules([
                'Password' => 'required|callback_validatePassword',
                'ConfirmPassword' => 'required',
            ]);

            $request->messages([
                'Password.required' => 'Mật khẩu không được để trống',
                'Password.callback_validatePassword' => 'Mật khẩu phải có ít nhất 8 ký tự, chứa ít nhất một chữ cái viết hoa, một chữ cái viết thường, một số và một ký tự đặc biệt',
                'ConfirmPassword.required' => 'Mật khẩu xác nhận không được để trống',
            ]);
            $validate = $request->validate();
            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = "Đã có lỗi xãy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['old'] = $request->getFields();
            } else {
                $data = $request->getFields();
                if ($data['Password'] != $data['ConfirmPassword']) {
                    $this->data['sub_content']['msg'] = "Mật khẩu không trùng khớp!";
                } else {
                    $customer = $this->customer->getCustomerByEmail($_SESSION['Email']);
                    $this->customer->updatePassword($customer['MaKH'], $data['Password']);
                    unset($_SESSION['Email']);
                    unset($_SESSION['verify']);
                    unset($_SESSION['resetPassword']);
                    header('Location: ' . _WEB_ROOT . '/Account/Login?successmsg=Đặt lại mật khẩu thành công!');
                }
            }
        }
        $this->data['title'] = 'Trang đặt lại mật khẩu';
        $this->data['content'] = 'account/resetPassword';
        $this->render('layouts/client_layout', $this->data);
    }

    public function createAccount()
    {
        if (isset($_SESSION['verify'])) {
            if (!isset($_SESSION['createAccount'])) {
                header('Location: ' . _WEB_ROOT . '/account/resetPassword');
            }
        } else {
            header('Location: ' . _WEB_ROOT . '/account/verify');
        }

        $this->data['title'] = 'Trang tạo tài khoản';
        $this->data['content'] = 'account/createAccount';
        $request = new Request();
        if ($request->isPost()) {
            $request->rules([
                'Username' => 'required|min:5|max:60|unique:khachhang:Username',
                'Password' => 'required|callback_validatePassword',
            ]);

            $request->messages([
                'Username.required' => 'Tên tài khoản không được để trống',
                'Username.min' => 'Tên tài khoản phải lớn hơn 5 ký tự',
                'Username.max' => 'Tên tài khoản phải nhỏ hơn 60 ký tự',
                'Username.unique' => 'Tên tài khoản đã tồn tại. Vui lòng chọn tên khác!',
                'Password.required' => 'Mật khẩu không được để trống',
                'Password.callback_validatePassword' => 'Mật khẩu phải có ít nhất 8 ký tự, chứa ít nhất một chữ cái viết hoa, một chữ cái viết thường, một số và một ký tự đặc biệt',
            ]);
            $validate = $request->validate();
            if (!$validate) {
                $this->data['sub_content']['errors'] = $request->errors();
                $this->data['sub_content']['msg'] = "Đã có lỗi xãy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['old'] = $request->getFields();
            } else {
                $data = $request->getFields();
                $customer = $this->customer->getCustomerByEmail($_SESSION['Email']);
                $this->customer->updateCustomer($data, $customer['MaKH']);
                unset($_SESSION['Email']);
                unset($_SESSION['verify']);
                unset($_SESSION['createAccount']);
                header('Location: ' . _WEB_ROOT . '/Account/Login?successmsg=Tạo tài khoản thành công!');
            }
        }
        $this->render('layouts/client_layout', $this->data);
    }
    public function register()
    {
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
                'Email.unique' => 'Email đã tồn tại! vui lòng chọn email khác.',
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
                $mailer = new Mailer();
                $code = substr(rand(0, 999999), 0, 6);
                $title = 'Đăng ký tài khoản';
                $content = 'Mã xác nhận của bạn là: <span style="color:green">' . $code . '</span>';
                $addressMail = $data['Email'];
                $mailer->sendMail($title, $content, $addressMail);
                $_SESSION['code'] = $code;
                $data['DiaChi'] = $data['DiaChi'] . ', ' . $data['ward'] . ', ' . $data['district'] . ', ' . $data['province'];
                unset($data['province'], $data['district'], $data['ward'], $data['RepeatPassword']);
                $_SESSION['register'] = $data;
                header('Location: ' . _WEB_ROOT . '/account/verify');

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