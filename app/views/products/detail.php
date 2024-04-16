<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Chi tiết sản phẩm</h1>
</div>
<!-- Single Page Header End -->
<div class="container-fluid mt-5" style="padding: 0;">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a href="#">
                                <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/<?php echo $product["HinhAnh"] ?>"
                                    class="img-fluid rounded w-100" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3"><?php echo $product["TenHang"] ?></h4>
                        <p class="mb-3">Danh Mục: <?php echo $category["TenNhomHang"] ?></p>
                        <h5 class="fw-bold mb-3">
                            <?php echo number_format($product["GiaBan"]) . "<sup><small>đ</small></sup><sub>/<small>" . $product["DVT"] . " "
                                . $product["TrongLuong"] . $product["DonViTrongLuong"] . "</small></sub>"; ?>
                        </h5>
                        <div class="d-flex mb-4">
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star text-primary"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <!-- <p class="mb-4">The generated Lorem Ipsum is therefore always free from repetition injected
                            humour, or non-characteristic words etc.</p>
                        <p class="mb-4">Susp endisse ultricies nisi vel quam suscipit. Sabertooth peacock flounder;
                            chain pickerel hatchetfish, pencilfish snailfish</p> -->
                        <div class="input-group mb-5" style="width: 100px;">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-minus rounded-circle bg-light border"
                                    onclick="decreaseQuantity()">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control form-control-sm text-center border-0" value="1"
                                id="quantity" onchange="validateQuantity()">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-plus rounded-circle bg-light border"
                                    onclick="increaseQuantity()">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <script>
                            function decreaseQuantity() {
                                let quantityInput = document.getElementById('quantity');
                                let quantity = parseInt(quantityInput.value);
                                if (quantity > 1) {
                                    quantityInput.value = quantity - 1;
                                } else {
                                    quantityInput.value = 1;
                                }
                            }

                            function increaseQuantity() {
                                let quantityInput = document.getElementById('quantity');
                                let quantity = parseInt(quantityInput.value);
                                let maxQuantity = <?php echo $product["SoLuongTon"] ?>;
                                if (quantity < maxQuantity) {
                                    quantityInput.value = quantity + 1;
                                } else {
                                    quantityInput.value = maxQuantity;
                                }
                            }

                            function validateQuantity() {
                                let quantityInput = document.getElementById('quantity');
                                let quantity = parseInt(quantityInput.value);
                                let maxQuantity = <?php echo $product["SoLuongTon"] ?>;
                                if (quantity < 1) {
                                    quantityInput.value = 1;
                                } else if (quantity > maxQuantity) {
                                    quantityInput.value = maxQuantity;
                                }
                            }
                        </script>
                        <?php if ($product["SoLuongTon"] > 0): ?>
                            <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Thêm vào giỏ hàng</a>
                        <?php else: ?>
                            <a href="<?php echo _WEB_ROOT ?>/contact"
                                class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-primary"></i> Liên hệ shop</a>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                    id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                    aria-controls="nav-about" aria-selected="true">Mô Tả</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                    id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                    aria-controls="nav-mission" aria-selected="false">Đánh Giá</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <!-- <p>The generated Lorem Ipsum is therefore always free from repetition injected humour,
                                    or non-characteristic words etc.
                                    Susp endisse ultricies nisi vel quam suscipit </p>
                                <p>Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish
                                    filefish Antarctic
                                    icefish goldeye aholehole trumpetfish pilot fish airbreathing catfish, electric ray
                                    sweeper.</p> -->
                                <div class="px-2">
                                    <div class="row g-4">
                                        <div class="col-6">
                                            <div
                                                class="row bg-light align-items-center text-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Đơn vị tính</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0"><?php echo $product["DVT"] ?></p>
                                                </div>
                                            </div>
                                            <div class="row text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Trọng lượng</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">
                                                        <?php echo $product["TrongLuong"] . $product["DonViTrongLuong"] ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div
                                                class="row bg-light align-items-center text-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Nhà cung cấp</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0"><?php echo $supplier["TenNCC"] ?></p>
                                                </div>
                                            </div>
                                            <div class="row align-items-center text-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0">Số lượng còn lại</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0">
                                                        <?php echo ($product["SoLuongTon"] > 0) ? $product["SoLuongTon"] : "Hết hàng" ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <div class="d-flex">
                                    <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/avatar.jpg"
                                        class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;"
                                        alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Hoàng Phúc</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p>The generated Lorem Ipsum is therefore always free from repetition injected
                                            humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/avatar.jpg"
                                        class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;"
                                        alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Thuận Quang</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p class="text-dark">The generated Lorem Ipsum is therefore always free from
                                            repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-vision" role="tabpanel">
                                <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor
                                    sit. Aliqu diam
                                    amet diam et eos labore. 3</p>
                                <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                    Clita erat ipsum et lorem et sit</p>
                            </div>
                        </div>
                    </div>
                    <form action="#">
                        <h4 class="mb-5 fw-bold">Để lại đánh giá</h4>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="text" class="form-control border-0 me-4" placeholder="Tên của bạn *">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="email" class="form-control border-0" placeholder="Email của bạn *">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="border-bottom rounded my-4">
                                    <textarea name="" id="" class="form-control border-0" cols="30" rows="8"
                                        placeholder="Đánh giá của bạn *" spellcheck="false"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between py-3 mb-5">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 me-3">Đánh giá: </p>
                                        <div class="d-flex align-items-center" style="font-size: 12px;">
                                            <i class="fa fa-star text-muted"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <a href="#" class="btn border border-secondary text-primary rounded-pill px-4 py-3">
                                        Đăng bình luận</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <h1 class="fw-bold mb-0">Các sản phẩm liên quan</h1>
            <div class="vesitable">
                <div class="owl-carousel vegetable-carousel justify-content-center">
                    <?php foreach ($productsByCategory as $product): ?>
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img">
                                <a href="<?php echo _WEB_ROOT ?>/product/detail?productid=<?php echo $product["MaHang"] ?>">
                                    <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/<?php echo $product["HinhAnh"] ?>"
                                        class="img-fluid w-100 rounded-top carousel-image" alt="">
                                </a>
                            </div>
                            <?php foreach ($categories as $category): ?>
                                <?php if ($category["MaNhomHang"] == $product["MaNhomHang"]): ?>
                                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                        style="top: 10px; left: 10px;">
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
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i>Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product End -->