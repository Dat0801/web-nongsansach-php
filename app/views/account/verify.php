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
                                        <h1 class="h4 text-gray-900 mb-4">Nhập mã xác nhận</h1>
                                    </div>
                                    <form action="<?php echo _WEB_ROOT ?>/Account/verify" method="POST" class="user">
                                        <div class="form-group mb-4">
                                            <input type="text" class="form-control" aria-describedby=""
                                                placeholder="Nhập mã xác nhận" name="code">
                                            <?php echo (!empty($errors) && array_key_exists('code', $errors)) ? '<span class="text-danger">' . $errors["code"] . '</span>' : false; ?>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-block form-control"
                                            style="margin: 0 auto">
                                            Gửi
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo _WEB_ROOT ?>/account/login">Bạn đã
                                            có tài khoản?</a>
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