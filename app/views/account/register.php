<?php    
    // $list_province = $province_model->getProvinceList();
    // $list_district = $district_model->getPlaces($_GET['province_id']);
    // $list_ward = $wards_model->getPlaces($_GET['district_id']);
    var_dump($province_list);
    // if (isset($_POST['add_sale'])) {
    //     echo "<pre>";
    //     print_r($_POST);
    //     die();
    // }
?>
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
                                    <form class="user" method="post" action="">
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="FirstName" class="form-control form-control-user"
                                                    id="exampleFirstName" placeholder="Tên của bạn">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="LastName" class="form-control form-control-user"
                                                    id="exampleLastName" placeholder="Họ của bạn">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" placeholder="Địa chỉ Email">
                                        </div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <div class="form-group">
                                                    <label for="province">Tỉnh/Thành phố</label>
                                                    <select id="province" name="province" class="form-control">
                                                        <option value="">Chọn một tỉnh</option>
                                                        <!-- populate options with data from your database or API -->
                                                        <?php
                                                        foreach($province_list as $row) {
                                                        ?>
                                                            <option value="<?php echo $row['province_id'] ?>"><?php echo $row['name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="district">Quận/Huyện</label>
                                                    <select id="district" name="district" class="form-control">
                                                        <option value="">Chọn một quận/huyện</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Mật khẩu">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleRepeatPassword" placeholder="Xác nhận mật khẩu">
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-primary btn-user btn-block">
                                            Đăng Ký
                                        </a>
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
</body>
</html>