<link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/client/css/profile.css">
<body>
    <!-- PROFILE -->
    <div class="container hero-header emp-profile">
        <div method="post">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="profile-head">
                        <div class="row">
                            <div class="col-md-10">
                                <h5>Hồ Sơ Của Bạn</h5>
                            </div>
                            <div class="col-md-2">
                                
                                    <input type="submit" class="btn btn-primary" name="btnAddMore"
                                    value="Đăng xuất" />
                            </div>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button"
                                        role="tab" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                        aria-controls="nav-about" aria-selected="true">Thông tin người dùng</button>
                                    <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                        id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                        aria-controls="nav-mission" aria-selected="false">Lịch sử mua hàng</button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel"
                                    aria-labelledby="nav-about-tab">
                                    <div class="px-2">
                                        <div class="row g-4">
                                            <form class="col-6">
                                                <div
                                                    class="row align-items-center text-center justify-content-center py-2">
                                                    <div class="col-4">
                                                        <p class="mb-0">Tên khách hàng:</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="text" value="<?php echo $_SESSION['user']['TenKH'] ?>" class="form-control mb-0">
                                                    </div>
                                                </div>
                                                <div
                                                    class="row text-center align-items-center justify-content-center py-2">
                                                    <div class="col-4">
                                                        <p class="mb-0">Tên tài khoản:</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="text" value="<?php echo $_SESSION['user']['Username'] ?>" class="form-control mb-0" disabled>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row text-center align-items-center justify-content-center py-2">
                                                    <div class="col-4">
                                                        <p class="mb-0">Email:</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="text" value="<?php echo $_SESSION['user']['Email'] ?>" class="form-control mb-0" disabled>
                                                    </div>
                                                </div>
                                                <div
                                                    class="row align-items-center text-center justify-content-center py-2">
                                                    <div class="col-4">
                                                        <p class="mb-0">Địa chỉ:</p>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="text" value="<?php echo $_SESSION['user']['DiaChi'] ?>" class="form-control mb-0" disabled>
                                                    </div>
                                                </div>
                                                <div
                                                    class="align-items-center text-center justify-content-center py-3">
                                                    <input type="submit" class="btn btn-primary" name="btnAddMore"
                                                value="Chỉnh sửa hồ sơ" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="nav-mission" role="tabpanel"
                                    aria-labelledby="nav-mission-tab">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Sản phẩm</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Đơn vị tính</th>
                                                <th scope="col">Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody id="order">
                                            <?php
                                            $totalCounter = 0;
                                            $itemCounter = 0;
                                            foreach ($purchasing_history as $key => $item) {
                                                $total = $item['GiaBan'] * $item['SoLuong'];
                                                $totalCounter += $total;
                                                $itemCounter += $item['SoLuong'];
                                                ?>
                                                <tr>
                                                    <th scope="row">
                                                        <div class="d-flex align-items-center">
                                                            <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/<?php echo $item["HinhAnh"] ?>"
                                                                class="img-fluid rounded-circle"
                                                                style="width: 80px; height: 80px; object-fit: contain;"
                                                                alt="">
                                                            <p class="mb-0"><?php echo $item['TenHang']; ?></p>
                                                        </div>

                                                    </th>
                                                    <td>
                                                        <p class="mb-0 mt-4">
                                                            <?php echo number_format($item['GiaBan']); ?><sup><small>đ</small></sup>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 mt-4">
                                                            <?php echo $item['DVT']; ?>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <input type="text" value="<?php echo $item["SoLuong"] ?>"
                                                            disabled class="mb-0 mt-4" size="5">
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 mt-4">
                                                            <?php echo number_format($total); ?><sup><small>đ</small></sup>
                                                        </p>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <p class="mb-0 mt-2">
                                                        <strong>
                                                            <?php
                                                            echo $itemCounter . ' Sản Phẩm' ?>
                                                        </strong>
                                                    </p>

                                                </td>
                                                <td>
                                                    <p class="mb-0 mt-2">
                                                        <strong>
                                                            <?php echo number_format($totalCounter); ?><sup><small>đ</small></sup>
                                                        </strong>
                                                    </p>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
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