<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
class Account extends Controller{

    public $data = [];
    public $customer, $province, $district, $wards;

    public function __construct() {
        $this->province = $this->model('ProvinceModel');
        $this->district = $this->model('DistrictModel');
        $this->wards = $this->model('WardsModel');
        $this->customer = $this->model('CustomerModel');
    }
    public function login() {
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
                'Username.min' => 'Tên tài khoản phải lớn hơn 5 ký tự',
                'Username.max' => 'Tên tài khoản phải nhỏ hơn 60 ký tự',
                'Username.unique' => 'Tên tài khoản đã tồn tại. Vui lòng chọn tên khác!',
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
                if($customer != null) {
                    $_SESSION['user'] = $customer;
                }
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
    public function forgotPassword() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["email"])) {
                echo "Email is required";
            } else {
                $email = $_POST["email"];
                // TODO: Add validation for the email (e.g., check if it's a valid email format)
    
                // TODO: Check if the email exists in your database
    
                // If the email is valid and exists in your database, send the password recovery email
                $mail = new PHPMailer(true);
    
                try {
                    //Server settings
                    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'aphuc1313@gmail.com';        // SMTP username
                    $mail->Password = 'secret';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to
    
                    //Recipients
                    $mail->setFrom('aphuc1313@gmail.com', 'Mailer');
                    $mail->addAddress($email, 'Joe User');     // Add a recipient
    
                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Password recovery';
                    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
            }
        }
    
        $this->data['title'] = 'Trang quên mật khẩu';
        $this->data['content'] = 'account/forgot-password';
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