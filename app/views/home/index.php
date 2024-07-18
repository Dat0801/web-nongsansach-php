<div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <h4 class="mb-3 text-secondary">100% Nông sản sạch</h4>
                <h1 class="mb-5 display-3 text-primary">Nông sản hữu cơ</h1>
                <form class="position-relative mx-auto" action="<?php echo _WEB_ROOT ?>/product" method="get">
                    <input class="form-control border-2 border-secondary w-100 py-3 px-4 rounded-pill" type="search"
                        placeholder="Từ khóa" name="searchStr">
                    <button type="submit"
                        class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100"
                        style="top: 0; right: 0;">Tìm kiếm</button>
                </form>
            </div>
            <div class="col-md-12 col-lg-5">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active rounded">
                            <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/hero-img-1.png"
                                class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Trái Cây</a>
                        </div>
                        <div class="carousel-item rounded">
                            <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/hero-img-2.jpg"
                                class="img-fluid w-100 h-100 rounded" alt="Second slide">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Rau Củ</a>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featurs Section Start -->
<div class="container-fluid featurs py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-car-side fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Miễn phí vận chuyển</h5>
                        <p class="mb-0">Miễn phí từ 300.000VNĐ</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-user-shield fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Thanh toán bảo mật</h5>
                        <p class="mb-0">100% an toàn khi thanh toán</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-exchange-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Hoàn trả trong 30 ngày</h5>
                        <p class="mb-0">Đảm bảo hoàn tiền</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fa fa-phone-alt fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>Hỗ trợ 24/7</h5>
                        <p class="mb-0">Hỗ trợ nhanh chóng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Vesitable Shop Start-->
<div class="container-fluid vesitable py-5">
    <div class="container py-5">
        <h1 class="mb-0">Sản Phẩm</h1>
        <div class="owl-carousel vegetable-carousel justify-content-center">
            <?php foreach ($products as $product): ?>
                <div class="border border-primary rounded position-relative" style="transition: 0.5s;">
                    <div class="vesitable-img">
                        <a href="<?php echo _WEB_ROOT ?>/product/detail?productid=<?php echo $product["MaHang"] ?>">
                            <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/<?php echo $product["HinhAnh"] ?>"
                                class="img-fluid w-100 rounded-top carousel-image" alt="">
                        </a>
                    </div>
                    <?php foreach ($categories as $category): ?>
                        <?php if ($category["MaNhomHang"] == $product["MaNhomHang"]): ?>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                                <?php echo $category["TenNhomHang"] ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="p-4 rounded-bottom">
                        <h4 class="mb-4 product-name">
                            <?php echo $product["TenHang"] ?>
                        </h4>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-4">
                                <?php echo number_format($product["GiaBan"]) . "<sup><small>đ</small></sup><sub>/<small>" . $product["DVT"] . " "
                                    . $product["TrongLuong"] . $product["DonViTrongLuong"] . "</small></sub>"; ?>
                            </p>
                            <button class="add-cart btn border border-secondary rounded-pill px-3 text-primary"
                                data-url-base="<?php echo _WEB_ROOT ?>" data-product-id="<?php echo $product['MaHang'] ?>"
                                data-product-qty="1" data-product-dvt="<?php echo $product['DVT'] ?>"
                                data-product-price="<?php echo $product['GiaBan'] ?>"
                                data-product-name="<?php echo $product['TenHang'] ?>"
                                data-product-img="<?php echo $product['HinhAnh'] ?>"
                                data-product-quantity="<?php echo $product['SoLuongTon'] ?>">
                                <i class="fa fa-shopping-bag text-primary"></i>
                                <span class="d-none d-sm-inline ms-2">Thêm vào giỏ hàng</span>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div style="position: relative;">
            <a href="<?php echo _WEB_ROOT ?>/product" style="position: absolute;
                    right: 0;
                    color: var(--bs-primary);
                    padding: 5px 25px;
                    border: 1px solid var(--bs-secondary);
                    border-radius: 20px;
                    transition: 0.5s;">Xem thêm</a>
        </div>

    </div>
</div>
<!-- Vesitable Shop End -->

<!-- Bestsaler Product Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-4">Sản Phẩm Bán Chạy</h1>
        </div>
        <div class="row g-4">
            <?php foreach ($productsBestSelling as $product): ?>
                <div class="col-lg-6 col-xl-4">
                    <div class="p-4 rounded bg-light">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/<?php echo $product["HinhAnh"]; ?>"
                                    class="img-fluid rounded-circle w-100 img best-seller-img" alt="">
                            </div>
                            <div class="col-6">
                                <a href="<?php echo _WEB_ROOT ?>/product/detail?productid=<?php echo $product["MaHang"] ?>"
                                    class="h5 product-name"><?php echo $product["TenHang"] ?></a>
                                <div class="d-flex my-3">
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star text-primary"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="mb-3">
                                    <?php echo number_format($product["GiaBan"]) . "<sup><small>VNĐ</small></sup>" ?>
                                </h4>
                                <?php if ($product["SoLuongTon"] > 0): ?>
                                    <button class="add-cart btn border border-secondary rounded-pill px-3 text-primary"
                                        data-url-base="<?php echo _WEB_ROOT ?>"
                                        data-product-id="<?php echo $product['MaHang'] ?>" data-product-qty="1"
                                        data-product-dvt="<?php echo $product['DVT'] ?>"
                                        data-product-price="<?php echo $product['GiaBan'] ?>"
                                        data-product-name="<?php echo $product['TenHang'] ?>"
                                        data-product-img="<?php echo $product['HinhAnh'] ?>"
                                        data-product-quantity="<?php echo $product['SoLuongTon'] ?>">
                                        <i class="fa fa-shopping-bag text-primary"></i>
                                        <span class="d-none d-sm-inline ms-2">Thêm vào giỏ</span>

                                    </button>
                                <?php else: ?>
                                    <button class="btn border border-secondary rounded-pill px-3 text-primary">
                                        <a href="<?php echo _WEB_ROOT ?>/contact"><i
                                                class="fa fa-shopping-bag me-2 text-primary"></i>Liên hệ shop</a>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Bestsaler Product End -->

<!-- Tastimonial Start -->
<div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="testimonial-header text-center">
            <h1 class="display-5 text-dark" style="margin-bottom: 4.5rem">Đánh Giá Của Khách Hàng</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                        style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">
                            Sản phẩm chất lượng quá!
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/avatar.jpg"
                                class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Hoàng Phúc</h4>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                        style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">
                            Sản phẩm rất tươi ngon!
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/avatar.jpg"
                                class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Thuận Quang</h4>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item img-border-radius bg-light rounded p-4">
                <div class="position-relative">
                    <i class="fa fa-quote-right fa-2x text-secondary position-absolute"
                        style="bottom: 30px; right: 0;"></i>
                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">
                            Sản phẩm rất tốt!
                        </p>
                    </div>
                    <div class="d-flex align-items-center flex-nowrap">
                        <div class="bg-secondary rounded">
                            <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/avatar.jpg"
                                class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                        </div>
                        <div class="ms-4 d-block">
                            <h4 class="text-dark">Thành Đạt</h4>
                            <div class="d-flex pe-5">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>