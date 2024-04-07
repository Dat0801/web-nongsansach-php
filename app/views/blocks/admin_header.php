<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trang Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Custom styles for this template-->

    <link href="<?php echo _WEB_ROOT ?>/public/assets/admin/Content/css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="<?php echo _WEB_ROOT ?>/public/assets/admin/Content/css/sb-admin-2.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="DashBoard/index">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="far fa-bookmark"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Trang Admin </div>
            </a>
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo _WEB_ROOT ?>/admin/DashBoard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Bảng điều khiển</span>
                </a>
            </li>
            <!-- Divider -->
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Quản lý trang -->
            <div class="sidebar-heading">
                Trang
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLTrang"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Quản lý trang</span>
                </a>
                <div id="collapseQLTrang" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../index.php">Trang người dùng</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

            <!-- Quản lý sản phẩm -->
            <div class="sidebar-heading">
                Sản phẩm
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLSanPham"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Quản lý sản phẩm</span>
                </a>
                <div id="collapseQLSanPham" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo _WEB_ROOT ?>/admin/product">Xem sản phẩm</a>
                        <a class="collapse-item" href="<?php echo _WEB_ROOT ?>/admin/product/viewaddproduct">Thêm sản phẩm</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <!-- Quản lý danh mục -->
            <div class="sidebar-heading">
                Danh mục
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLDanhMuc"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Quản lý danh mục</span>
                </a>
                <div id="collapseQLDanhMuc" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo _WEB_ROOT ?>/admin/category">Xem danh mục</a>
                        <a class="collapse-item" href="Category/ThemDanhMuc">Thêm danh mục</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <!-- Quản lý đơn hàng -->
            <div class="sidebar-heading">
                Đơn hàng
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLBrand"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Quản lý đơn hàng</span>
                </a>
                <div id="collapseQLBrand" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo _WEB_ROOT ?>/admin/order">Xem đơn hàng</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <!-- Quản lý khách hàng -->
            <div class="sidebar-heading">
                Khách hàng
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLNguoiDung"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Quản lý khách hàng</span>
                </a>
                <div id="collapseQLNguoiDung" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="Users/XemUser">Xem khách hàng</a>
                        <a class="collapse-item" href="Users/ThemUser">Thêm khách hàng</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Quản lý nhà cung cấp -->
            <div class="sidebar-heading">
                Nhà cung cấp
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLHoaDon"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Quản lý nhà cung cấp</span>
                </a>
                <div id="collapseQLHoaDon" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo _WEB_ROOT ?>/admin/suppliers">Xem nhà cung cấp</a>
                        <a class="collapse-item" href="Orders/ThemOrder">Thêm nhà cung cấp</a>
                    </div>
                </div>
            </li>

            <!-- Quản lý phiếu nhập -->
            <div class="sidebar-heading">
                Phiếu nhập
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLPhieuNhap"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Quản lý phiếu nhập</span>
                </a>
                <div id="collapseQLPhieuNhap" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="Orders/XemOrders">Xem phiếu nhập</a>
                        <a class="collapse-item" href="Orders/ThemOrder">Thêm phiếu nhập</a>
                    </div>
                </div>
            </li>

            <!-- Quản lý phiếu nhập -->
            <div class="sidebar-heading">
                Phiếu chi
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLPhieuChi"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Quản lý phiếu chi</span>
                </a>
                <div id="collapseQLPhieuChi" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="Orders/XemOrders">Xem phiếu chi</a>
                        <a class="collapse-item" href="Orders/ThemOrder">Thêm phiếu chi</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hồ sơ</span>

                            <img class="img-profile rounded-circle" src="<?php echo _WEB_ROOT ?>/public/assets/admin/Content/img/th1.jpg" />
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Trang cá nhân
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cài đặt
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Lịch sử đăng nhập
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="Dashboard/DangXuat" data-toggle="modal"
                                data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Đăng xuất
                            </a>
                        </div>
                    </li>

                </ul>
            </nav>
            <!-- End of Topbar -->