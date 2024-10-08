<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/banner-fruits.jpg"
                                    style="width: 100%; height: 100%">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản</h1>
                                    </div>
                                    <form action="<?php echo _WEB_ROOT ?>/Account/createAccount" method="POST" class="user">
                                        <div class="form-group mb-4">
                                            <input type="text" class="form-control" id="exampleInputEmail"
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
                                        <button type="submit" class="btn btn-primary btn-block form-control">
                                            Tạo tài khoản
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo _WEB_ROOT ?>/account/forgotPassword">Bạn đã
                                            quên mật khẩu?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo _WEB_ROOT ?>/account/register">Tạo tài khoản
                                            mới tại đây!</a>
                                    </div>
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