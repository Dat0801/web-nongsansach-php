
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo _WEB_ROOT ?>/public/assets/admin/Content/vendor/fontawesome-free/css/all.min.css"
        rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">        
</head>

<body>

    <div class="container hero-header">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block "></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Đăng ký tài khoản mới tại đây!</h1>
                                    </div>
                                    <form class="user" method="post" action="<?php echo _WEB_ROOT ?>/Account/register">
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="TenKH" class="form-control form-control-user"
                                                    id="TenKH" placeholder="Nhập họ tên của bạn"
                                                    value="<?php echo !empty($old["TenKH"]) ? $old["TenKH"] : false; ?>" >
                                                    <?php echo (!empty($errors) && array_key_exists('TenKH', $errors)) ? '<span class="text-danger">' . $errors["TenKH"] . '</span>' : false; ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="Username" class="form-control form-control-user"
                                                    id="Username" placeholder="Nhập tên tài khoản"
                                                    value="<?php echo !empty($old["Username"]) ? $old["Username"] : false; ?>">
                                                    <?php echo (!empty($errors) && array_key_exists('Username', $errors)) ? '<span class="text-danger">' . $errors["Username"] . '</span>' : false; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="email" name="Email" class="form-control form-control-user"
                                                    id="exampleInputEmail" placeholder="Địa chỉ Email"
                                                    value="<?php echo !empty($old["Email"]) ? $old["Email"] : false; ?>">
                                                    <?php echo (!empty($errors) && array_key_exists('Email', $errors)) ? '<span class="text-danger">' . $errors["Email"] . '</span>' : false; ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="SDT" class="form-control form-control-user"
                                                    id="SDT" placeholder="Nhập số điện thoại"
                                                    value="<?php echo !empty($old["SDT"]) ? $old["SDT"] : false; ?>">
                                                    <?php echo (!empty($errors) && array_key_exists('SDT', $errors)) ? '<span class="text-danger">' . $errors["SDT"] . '</span>' : false; ?>
                                            </div>
                                        </div>                                        
                                        <div class="form-group mb-4">                                                                                         
                                            <select id="province" name="province" class="form-control form-control-user">
                                                <option value="">Chọn tỉnh thành</option>                                                        
                                            </select>  
                                            <?php echo (!empty($errors) && array_key_exists('province', $errors)) ? '<span class="text-danger">' . $errors["province"] . '</span>' : false; ?>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-6 mb-3 mb-sm-0">                                                
                                                <select id="district" name="district" class="form-control form-control-user">
                                                    <option value="">Chọn quận/huyện</option>
                                                </select>  
                                                <?php echo (!empty($errors) && array_key_exists('district', $errors)) ? '<span class="text-danger">' . $errors["district"] . '</span>' : false; ?>                                              
                                            </div>
                                            <div class="col-sm-6">                                                
                                                <select id="ward" name="ward" class="form-control form-control-user">
                                                    <option value="">Chọn phường/xã</option>
                                                </select> 
                                                <?php echo (!empty($errors) && array_key_exists('ward', $errors)) ? '<span class="text-danger">' . $errors["ward"] . '</span>' : false; ?>                                               
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <input type="text" name="DiaChi" class="form-control form-control-user"
                                                id="DiaChi" placeholder="Địa chỉ nhận hàng"
                                                value="<?php echo !empty($old["DiaChi"]) ? $old["DiaChi"] : false; ?>">
                                                <?php echo (!empty($errors) && array_key_exists('DiaChi', $errors)) ? '<span class="text-danger">' . $errors["DiaChi"] . '</span>' : false; ?>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user"
                                                    id="Password" name="Password" placeholder="Mật khẩu"
                                                    value="<?php echo !empty($old["Password"]) ? $old["Password"] : false; ?>">
                                                    <?php echo (!empty($errors) && array_key_exists('Password', $errors)) ? '<span class="text-danger">' . $errors["Password"] . '</span>' : false; ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user"
                                                    id="RepeatPassword" name="RepeatPassword" placeholder="Xác nhận mật khẩu">
                                                    <?php echo (!empty($errors) && array_key_exists('RepeatPassword', $errors)) ? '<span class="text-danger">' . $errors["RepeatPassword"] . '</span>' : false; ?>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Đăng Ký
                                        </button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Đăng ký bằng Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Đăng ký bằng Facebook
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/Content/vendor/jquery/jquery.min.js"></script>
    <script
        src="<?php echo _WEB_ROOT ?>/public/assets/admin/Content/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script
        src="<?php echo _WEB_ROOT ?>/public/assets/admin/Content/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo _WEB_ROOT ?>/public/assets/admin/Content/js/sb-admin-2.min.js"></script>
    <script src="js/app.js"></script>
    <!-- Ajax with API-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo _WEB_ROOT ?>/app/js/index.js"></script>

    
</body>
</html>