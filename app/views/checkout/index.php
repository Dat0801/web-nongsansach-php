<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Thanh Toán</h1>
</div>
<!-- Single Page Header End -->

<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container">
        <form action="<?php echo _WEB_ROOT ?>/checkout" method="post">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <h3 class="mb-4">Địa chỉ nhận hàng</h3>
                    <div class="form-item">
                        <label class="form-label my-3">Họ và tên<sup style="color: red"> (*)</sup></label>
                        <input type="text" class="form-control" name="TenKH" value="<?php
                        if (isset($_SESSION['user'])) {
                            echo $_SESSION['user']['TenKH'];
                        } else {
                            echo !empty($old["TenKH"]) ? $old["TenKH"] : false;
                        }
                        ?>">
                        <?php echo (!empty($errors) && array_key_exists('TenKH', $errors)) ? '<span class="text-danger">' . $errors["TenKH"] . '</span>' : false; ?>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Email<sup style="color: red"> (*)</sup></label>
                        <input type="email" class="form-control" name="Email" value="<?php
                        if (isset($_SESSION['user'])) {
                            echo $_SESSION['user']['Email'];
                        } else {
                            echo !empty($old["Email"]) ? $old["Email"] : false;
                        } ?>">
                        <?php echo (!empty($errors) && array_key_exists('Email', $errors)) ? '<span class="text-danger">' . $errors["Email"] . '</span>' : false; ?>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Số điện thoại<sup style="color: red"> (*)</sup></label>
                        <input type="tel" class="form-control" name="SDT" value="<?php
                        if (isset($_SESSION['user'])) {
                            echo $_SESSION['user']['SDT'];
                        } else {
                            echo !empty($old["SDT"]) ? $old["SDT"] : false;
                        } ?>">
                        <?php echo (!empty($errors) && array_key_exists('SDT', $errors)) ? '<span class="text-danger">' . $errors["SDT"] . '</span>' : false; ?>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Địa chỉ <sup style="color: red"> (*)</sup></label>
                        <input type="text" class="form-control" placeholder="" name="DiaChi" value="<?php
                        if (isset($_SESSION['user'])) {
                            echo $_SESSION['user']['DiaChi'];
                        } else {
                            echo !empty($old["DiaChi"]) ? $old["DiaChi"] : false;
                        } ?>">
                        <?php echo (!empty($errors) && array_key_exists('DiaChi', $errors)) ? '<span class="text-danger">' . $errors["DiaChi"] . '</span>' : false; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="country" class="form-label my-3">Tỉnh<sup style="color: red"> (*)</sup></label>
                            <select class="form-select" name="country" id="country">
                                <option value="">Choose...</option>
                                <option value="United States">United States</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state" class="form-label my-3">Quận/Huyện<sup style="color: red">
                                    (*)</sup></label>
                            <select class="form-select" name="state" id="state">
                                <option value="">Choose...</option>
                                <option value="California">California</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state" class="form-label my-3">Xã<sup style="color: red"> (*)</sup></label>
                            <select class="form-select" name="state" id="state">
                                <option value="">Choose...</option>
                                <option value="California">California</option>
                            </select>
                        </div>
                    </div>
                    <h5 class="mt-4">Hình thức thanh toán</h5>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom ">
                        <div class="col-12">
                            <div class="form-check text-start my-3">
                                <input type="radio" class="form-check-input bg-primary border-0" id="Delivery-1"
                                    name="payment" value="Delivery" checked>
                                <label class="form-check-label" for="Delivery-1">Thanh toán khi nhận hàng</label>
                            </div>
                            <div class="form-check text-start my-3">
                                <input type="radio" class="form-check-input bg-primary border-0" id="Paypal-1"
                                    name="payment" value="Paypal">
                                <label class="form-check-label" for="Paypal-1">Paypal</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="submit"
                            class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Đặt hàng</button>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 col-xl-5">
                    <h3 class="d-flex justify-content-between align-items-center mb-5">
                        <span>Giỏ hàng của bạn</span>
                        <span class="badge bg-primary badge-pill"><?php echo count($_SESSION['cart_items']); ?></span>
                    </h3>
                    <ul class="list-group mb-3">
                        <?php
                        $total = 0;
                        foreach ($_SESSION['cart_items'] as $cartItem) {
                            $total += $cartItem['total_price'];
                            ?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><?php echo $cartItem['product_name'] ?></h6>
                                    <small class="text-muted">Số lượng: <?php echo $cartItem['qty'] ?> X Giá:
                                        <?php echo number_format($cartItem['product_price']) ?><sup><small>đ</small></sup></small>
                                </div>
                                <span
                                    class="text-muted"><?php echo number_format($cartItem['total_price']); ?><sup><small>đ</small></sup></span>
                            </li>
                            <?php
                        }
                        ?>

                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Tổng (VNĐ)</strong>
                            <strong><?php echo number_format($total) ?><sup><small>đ</small></sup></strong>
                        </li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</div>