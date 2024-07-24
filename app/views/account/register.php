<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="<?php echo _WEB_ROOT ?>/public/assets/admin/Content/vendor/fontawesome-free/css/all.min.css"
        rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
</head>
<?php
if (isset($_SESSION['user'])) {
    $address = explode(',', $_SESSION['user']['DiaChi']);
    $address = array_map('trim', $address);
}
?>

<body>

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
                                        <h1 class="h4 text-gray-900 mb-4">Đăng ký tài khoản mới tại đây!</h1>
                                    </div>
                                    <form class="user" method="post" action="<?php echo _WEB_ROOT ?>/Account/register">
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <input type="text" name="TenKH" class="form-control form-control-user"
                                                    id="TenKH" placeholder="Nhập họ tên của bạn" value="<?php
                                                    if (isset($_SESSION['user'])) {
                                                        echo $_SESSION['user']['TenKH'] ?? '';
                                                    } else {
                                                        echo !empty($old["TenKH"]) ? $old["TenKH"] : false;
                                                    }
                                                    ?>">
                                                <?php echo (!empty($errors) && array_key_exists('TenKH', $errors)) ? '<span class="text-danger">' . $errors["TenKH"] . '</span>' : false; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12">
                                                <input type="text" name="Username"
                                                    class="form-control form-control-user" id="Username"
                                                    placeholder="Nhập tên tài khoản"
                                                    value="<?php echo !empty($old["Username"]) ? $old["Username"] : false; ?>">
                                                <?php echo (!empty($errors) && array_key_exists('Username', $errors)) ? '<span class="text-danger">' . $errors["Username"] . '</span>' : false; ?>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <input type="email" name="Email" class="form-control form-control-user"
                                                    id="exampleInputEmail" placeholder="Địa chỉ Email" value="<?php
                                                    if (isset($_SESSION['user'])) {
                                                        echo $_SESSION['user']['Email'] ?? '';
                                                    } else {
                                                        echo !empty($old["Email"]) ? $old["Email"] : false;
                                                    }
                                                    ?>">
                                                <?php echo (!empty($errors) && array_key_exists('Email', $errors)) ? '<span class="text-danger">' . $errors["Email"] . '</span>' : false; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12">
                                                <input type="text" name="SDT" class="form-control form-control-user"
                                                    id="SDT" placeholder="Nhập số điện thoại" value="<?php
                                                    if (isset($_SESSION['user'])) {
                                                        echo $_SESSION['user']['SDT'] ?? '';
                                                    } else {
                                                        echo !empty($old["SDT"]) ? $old["SDT"] : false;
                                                    }
                                                    ?>">
                                                <?php echo (!empty($errors) && array_key_exists('SDT', $errors)) ? '<span class="text-danger">' . $errors["SDT"] . '</span>' : false; ?>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <select id="province" name="province" class="form-select">
                                                <option value="">Chọn tỉnh thành</option>
                                                <?php
                                                if (isset($_SESSION['user'])) {
                                                    echo '<option value="' . $address[3] . '" id="provinceSelected">' . $address[3] . '</option>';
                                                } else {
                                                    if (!empty($old["province"])) {
                                                        echo '<option value="' . $old["province"] . '" selected id="provinceSelected">' . $old["province"] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <?php echo (!empty($errors) && array_key_exists('province', $errors)) ? '<span class="text-danger">' . $errors["province"] . '</span>' : false; ?>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <select id="district" name="district"
                                                    class="form-select form-control-user">
                                                    <option value="">Chọn quận/huyện</option>
                                                    <?php
                                                    if (isset($_SESSION['user'])) {
                                                        echo '<option value="' . $address[2] . '" selected id="districtSelected">' . $address[2] . '</option>';
                                                    } else {
                                                        echo '<option value="' . $old["district"] . '" selected id="districtSelected">' . $old["district"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <?php echo (!empty($errors) && array_key_exists('district', $errors)) ? '<span class="text-danger">' . $errors["district"] . '</span>' : false; ?>
                                            </div>
                                            <div class="col-sm-6">
                                                <select id="ward" name="ward" class="form-select"
                                                    style="background-color: #fff;">
                                                    <option value="">Chọn phường/xã</option>
                                                    <?php
                                                    if (isset($_SESSION['user'])) {
                                                        echo '<option value="' . $address[1] . '" selected id="wardSelected">' . $address[1] . '</option>';
                                                    } else {
                                                        if (!empty($old["ward"])) {
                                                            echo '<option value="' . $old["ward"] . '" selected id="wardSelected">' . $old["ward"] . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <?php echo (!empty($errors) && array_key_exists('ward', $errors)) ? '<span class="text-danger">' . $errors["ward"] . '</span>' : false; ?>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <input type="text" name="DiaChi" class="form-control form-control-user"
                                                id="DiaChi" placeholder="Địa chỉ nhận hàng" value="<?php
                                                if (isset($_SESSION['user'])) {
                                                    echo $address[0];
                                                } else {
                                                    echo !empty($old["DiaChi"]) ? $old["DiaChi"] : false;
                                                }
                                                ?>">
                                            <?php echo (!empty($errors) && array_key_exists('DiaChi', $errors)) ? '<span class="text-danger">' . $errors["DiaChi"] . '</span>' : false; ?>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user"
                                                    id="Password" name="Password" placeholder="Mật khẩu"
                                                    value="<?php echo !empty($old["Password"]) ? $old["Password"] : false; ?>">
                                                <?php echo (!empty($errors) && array_key_exists('Password', $errors)) ? '<span class="text-danger">' . $errors["Password"] . '</span>' : false; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <div class="col-sm-12">
                                                <input type="password" class="form-control form-control-user"
                                                    id="RepeatPassword" name="RepeatPassword"
                                                    placeholder="Xác nhận mật khẩu">
                                                <?php echo (!empty($errors) && array_key_exists('RepeatPassword', $errors)) ? '<span class="text-danger">' . $errors["RepeatPassword"] . '</span>' : false; ?>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block form-control">
                                            Đăng Ký
                                        </button>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="<?php echo _WEB_ROOT ?>/account/forgotPassword">Bạn
                                                đã
                                                quên mật khẩu?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="<?php echo _WEB_ROOT ?>/account/login">Bạn đã có tài
                                                khoản?</a>
                                        </div>
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