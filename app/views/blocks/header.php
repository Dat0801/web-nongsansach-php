<!DOCTYPE html>

<head>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo _WEB_ROOT ?>/public/assets/client/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="<?php echo _WEB_ROOT ?>/public/assets/client/lib/owlcarousel/assets/owl.carousel.min.css"
        rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo _WEB_ROOT ?>/public/assets/client/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo _WEB_ROOT ?>/public/assets/client/css/style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo _WEB_ROOT ?>/public/assets/client/css/product.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                            class="text-white">140 Lê Trọng Tấn</a></small>
                    <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                            class="text-white">nongsansach12@gmail.com</a></small>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="<?php echo _WEB_ROOT ?>/home" class="navbar-brand">
                    <h1 class="text-primary display-6 text-uppercase">Nông sản sạch</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="<?php echo _WEB_ROOT ?>/home" class="nav-item nav-link text-uppercase">Trang chủ</a>
                        <a href="<?php echo _WEB_ROOT ?>/product" class="nav-item nav-link text-uppercase">Sản phẩm</a>
                        <a href="<?php echo _WEB_ROOT ?>/contact" class="nav-item nav-link text-uppercase">Liên hệ</a>
                        <?php
                        if (isset($_SESSION['user']['Username']) && isset($_SESSION['user']['Password'])) {
                            echo '<a href="' . _WEB_ROOT . '/profile" class="nav-item nav-link text-uppercase">Hồ sơ khách hàng</a>';
                        } else {
                            echo '<a href="' . _WEB_ROOT . '/account/login" class="nav-item nav-link text-uppercase">Đăng nhập</a>';
                            echo '<a href="' . _WEB_ROOT . '/account/register" class="nav-item nav-link text-uppercase">Đăng ký</a>';
                        }
                        ?>
                    </div>
                    <div class="d-flex m-3 me-0">
                        <a href="<?php echo _WEB_ROOT ?>/cart" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span id="cart-quantity"
                                class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                                <?php
                                if (isset($_SESSION['cart_items'])) {
                                    echo count($_SESSION['cart_items']) > 0 ? count($_SESSION['cart_items']) : '0';
                                } else {
                                    echo '0';
                                }
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
    <div class="toast bg-primary text-white" role="alert" aria-live="assertive" aria-atomic="true"
        style="position: fixed; top: 100px; right:10px; z-index: 1000;">
        <div class="toast-header">
            <strong class="me-auto">Thông báo</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Thêm sản phẩm vào giỏ hàng thành công!
        </div>
    </div>