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
                $this->data['sub_content']['msg'] = "Đã có lỗi xãy ra. Vui lòng kiểm tra lại!";
                $this->data['sub_content']['old'] = $request->getFields();
            } else {
                unset($_SESSION['user']);
                $data = $request->getFields();
                $customer = $this->customer->checkLogin($data['Username'], $data['Password']);
                if ($customer != null) {
                    $_SESSION['user'] = $customer;
                    header('Location: ' . _WEB_ROOT . '/customer');
                } else {
                    $this->data['sub_content']['msg'] = "Tên tài khoản hoặc mật khẩu không đúng!";
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
                $mailer = new Mailer();
                $datafield = $request->getFields();
                $code = substr(rand(0, 999999), 0, 6);
                $title = 'Quên mật khẩu';
                $content = 'Mật khẩu xác nhận của bạn là: <span style="color:green">' . $code . '</span>';
                $addressMail = $datafield['Email'];
                $mailer->sendMail($title, $content, $addressMail);
                $_SESSION['code'] = $code;
                $_SESSION['Email'] = $datafield['Email'];
                header('Location: ' . _WEB_ROOT . '/account/verify');
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
                    header('Location: ' . _WEB_ROOT . '/account/resetPassword');
                } else {
                    $this->data['sub_content']['msg'] = "Mã xác nhận không đúng!";
                }
            }
        }
        $this->render('layouts/client_layout', $this->data);
    }

    public function resetPassword()
    {
        $request = new Request();
        if ($request->isPost()) {
            $request->rules([
                'Password' => 'required',
                'ConfirmPassword' => 'required',
            ]);

            $request->messages([
                'Password.required' => 'Mật khẩu không được để trống',
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
                    header('Location: ' . _WEB_ROOT . '/account/login');
                }
            }
        }
        $this->data['title'] = 'Trang đặt lại mật khẩu';
        $this->data['content'] = 'account/resetPassword';
        $this->render('layouts/client_layout', $this->data);
    }

    public function register()
    {
        $this->data['title'] = 'Trang đăng ký';
        $this->data['content'] = 'account/register';

        $this->data['sub_content']['province_list'] = $this->province->getProvinceList();
        $this->data['sub_content']['district_model'] = $this->district;
        $this->data['sub_content']['wards_model'] = $this->wards;

        $this->render('layouts/client_layout', $this->data);
    }
}