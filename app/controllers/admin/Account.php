<?php
class Account extends AdminController
{

    public $data = [];
    public $employee;

    public function __construct()
    {
        $this->employee = $this->model('EmployeeModel');
    }

    public function login()
    {
        $this->data['title'] = 'Trang đăng nhập';

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
                $this->data['errors'] = $request->errors();
                $this->data['msg'] = "Đã có lỗi xãy ra. Vui lòng kiểm tra lại!";
                $this->data['old'] = $request->getFields();
            } else {
                $data = $request->getFields();
                $employee = $this->employee->checkLogin($data['Username'], $data['Password']);
                if($employee != null) {
                    $_SESSION['employee'] = $employee;
                    header('Location: ' . _WEB_ROOT . '/admin/dashboard');
                }
                else {
                    $this->data['msg'] = "Tên tài khoản hoặc mật khẩu không đúng!";
                }
            }
        }
        $this->render("admin/account/login", $this->data);
    }

    public function logout()
    {
        unset($_SESSION['employee']);
        header('Location: ' . _WEB_ROOT . '/admin/account/login');
    }
}