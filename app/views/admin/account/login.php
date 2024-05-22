<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo _WEB_ROOT ?>/public/assets/admin/Content/css/sb-admin-2.css" rel="stylesheet" />

</head>

<body class="bg-gradient-dark">
    <div class="container hero-header">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <?php if (!empty($msg)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $msg; ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/banner-fruits.jpg"
                                    style="width: 100%; height: 100%">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Chào mừng bạn trở lại!</h1>
                                    </div>
                                    <form action="<?php echo _WEB_ROOT ?>/admin/account/login" method="POST" class="user">
                                        <div class="form-group mb-4">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                                aria-describedby="emailHelp" placeholder="Nhập username"
                                                name="Username">
                                            <?php echo (!empty($errors) && array_key_exists('Username', $errors)) ? '<span class="text-danger">' . $errors["Username"] . '</span>' : false; ?>
                                        </div>
                                        <div class="form-group mb-4">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Nhập mật khẩu tại đây"
                                                name="Password">
                                            <?php echo (!empty($errors) && array_key_exists('Password', $errors)) ? '<span class="text-danger">' . $errors["Password"] . '</span>' : false; ?>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Ghi nhớ thông tin
                                                    đăng nhập của tôi</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Đăng nhập
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</body>

</html>