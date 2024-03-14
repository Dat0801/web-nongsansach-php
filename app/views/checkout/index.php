<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Thanh Toán</h1>
</div>
<!-- Single Page Header End -->

<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Chi tiết hóa đơn</h1>
        <form action="#">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="form-item">
                        <label class="form-label my-3">Họ và tên<sup>*</sup></label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Địa chỉ <sup>*</sup></label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Số điện thoại<sup>*</sup></label>
                        <input type="tel" class="form-control">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Địa chỉ email<sup>*</sup></label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="form-item my-3">
                        <textarea name="text" class="form-control" spellcheck="false" cols="30" rows="11"
                            placeholder="Ghi chú"></textarea>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/vegetable-item-2.jpg" class="img-fluid rounded-circle"
                                                style="width: 90px; height: 90px;" alt="">
                                        </div>
                                    </th>
                                    <td class="py-5">Awesome Brocoli</td>
                                    <td class="py-5">$69.00</td>
                                    <td class="py-5">2</td>
                                    <td class="py-5">$138.00</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/vegetable-item-5.jpg" class="img-fluid rounded-circle"
                                                style="width: 90px; height: 90px;" alt="">
                                        </div>
                                    </th>
                                    <td class="py-5">Potatoes</td>
                                    <td class="py-5">$69.00</td>
                                    <td class="py-5">2</td>
                                    <td class="py-5">$138.00</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/vegetable-item-3.png" class="img-fluid rounded-circle"
                                                style="width: 90px; height: 90px;" alt="">
                                        </div>
                                    </th>
                                    <td class="py-5">Big Banana</td>
                                    <td class="py-5">$69.00</td>
                                    <td class="py-5">2</td>
                                    <td class="py-5">$138.00</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td class="py-5"></td>
                                    <td colspan="2" class="py-5">
                                        <p class="mb-0 text-dark py-3">Tổng tiền sản phẩm:</p>
                                    </td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark">$414.00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    </th>

                                    <td class="py-5"></td>
                                    <td colspan="2" class="py-5">
                                        <p class="mb-0 text-dark py-4">Phí giao hàng:</p>
                                    </td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark">$3.00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                    </th>
                                    <td class="py-5">
                                        <p class="mb-0 text-dark text-uppercase py-3">Tổng</p>
                                    </td>
                                    <td class="py-5"></td>
                                    <td class="py-5"></td>
                                    <td class="py-5">
                                        <div class="py-3 border-bottom border-top">
                                            <p class="mb-0 text-dark">$417.00</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">
                            <div class="form-check text-start my-3">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1"
                                    name="Delivery" value="Delivery">
                                <label class="form-check-label" for="Delivery-1">Thanh toán khi nhận hàng</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">
                            <div class="form-check text-start my-3">
                                <input type="checkbox" class="form-check-input bg-primary border-0" id="Paypal-1"
                                    name="Paypal" value="Paypal">
                                <label class="form-check-label" for="Paypal-1">Paypal</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <button type="button"
                            class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>