<?php
include_once "app/views/admin/pagination/pagination.php";
if (isset($_GET['searchStr'])) {
    $searchStr = trim($_GET['searchStr']);
} else {
    $searchStr = null;
}
$products = $product_model->getListWithLimit($display, $position, $categoryid, $searchStr);
?>
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6"><?php echo $name ?></h1>
</div>
<!-- Single Page Header End -->
<div class="toast bg-primary text-white" role="alert" aria-live="assertive" aria-atomic="true"
    style="position: fixed; top: 100px; right:10px; z-index: 9999;">
    <div class="toast-header">
        <strong class="me-auto">Thông báo</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        Thêm sản phẩm vào giỏ hàng thành công!
    </div>
</div>
<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="row g-4" style="padding-bottom: 20px;">
                <div class="col-xl-3">
                    <form class="input-group w-100 mx-auto d-flex" action="<?php echo _WEB_ROOT ?>/product"
                        method="get">
                        <input type="search" class="form-control p-3" placeholder="Từ khóa"
                            aria-describedby="search-icon-1" name="searchStr">
                        <button id="search-icon-1" class="input-group-text p-3" type="submit"><i
                                class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <h4>Danh Mục</h4>
                            <ul class="list-unstyled fruite-categorie">
                                <?php foreach ($categories as $category): ?>
                                    <li>
                                        <div class="d-flex justify-content-between fruite-name">
                                            <a
                                                href="<?php echo _WEB_ROOT ?>/Product?categoryid=<?php echo $category["MaNhomHang"] ?>"><i
                                                    class="fas fa-apple-alt me-2"></i><?php echo $category["TenNhomHang"] ?></a>
                                            <span><?php echo '(' . $category['productCount'] . ')' ?></span>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h4 class="mb-3">Sản phẩm nổi bật</h4>
                        <?php foreach ($productsBestSelling as $product): ?>
                            <div class="d-flex align-items-center justify-content-start">
                                <div class="rounded me-4" style="width: 100px; height: 100px;">
                                    <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/<?php echo $product["HinhAnh"] ?>"
                                        class="img-fluid rounded" alt="">
                                </div>
                                <div>
                                    <h6 class="mb-2"><?php echo $product["TenHang"] ?></h6>
                                    <div class="d-flex mb-2">
                                        <i class="fa fa-star text-primary"></i>
                                        <i class="fa fa-star text-primary"></i>
                                        <i class="fa fa-star text-primary"></i>
                                        <i class="fa fa-star text-primary"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <h5 class="fw-bold me-2">
                                            <?php echo number_format($product["GiaBan"]) . " <small>VNĐ</small>" ?>
                                        </h5>
                                        <!-- <h5 class="text-danger text-decoration-line-through"><?php echo $product["GiaBan"] ?></h5> -->
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="d-flex justify-content-center my-4">
                            <a href="#"
                                class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Xem
                                Thêm</a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="position-relative">
                            <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/banner-fruits.jpg"
                                class="img-fluid w-100 rounded" alt="">
                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                <h3 class="text-secondary fw-bold">Nông <br> Sản <br> Sạch</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row g-4 justify-content-center">
                    <?php foreach ($products as $product): ?>
                        <div class="col-md-6 col-lg-6 col-xl-4">
                            <div class="rounded position-relative fruite-item">
                                <div>
                                    <a
                                        href="<?php echo _WEB_ROOT ?>/product/detail?productid=<?php echo $product["MaHang"] ?>">
                                        <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/<?php echo $product["HinhAnh"] ?>"
                                            class="img-fluid w-100 rounded-top fruite-img" alt="">
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
                                <div class="p-4 border border-primary border-top-0 rounded-bottom">
                                    <h4 class="product-name mb-4"><?php echo $product["TenHang"] ?></h4>
                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                        <p class="text-dark fs-5 fw-bold mb-4">
                                            <?php echo number_format($product["GiaBan"]) . "<sup><small>đ</small></sup><sub>/<small>" . $product["DVT"] . " "
                                                . $product["TrongLuong"] . $product["DonViTrongLuong"] . "</small></sub>"; ?>
                                        </p>
                                        <?php if ($product["SoLuongTon"] > 0): ?>
                                            <button class="add-cart btn border border-secondary rounded-pill px-3 text-primary"
                                                data-url-base="<?php echo _WEB_ROOT ?>"
                                                data-product-id="<?php echo $product['MaHang'] ?>" data-product-qty="1"
                                                data-product-dvt="<?php echo $product['DVT'] ?>"
                                                data-product-price="<?php echo $product['GiaBan'] ?>"
                                                data-product-name="<?php echo $product['TenHang'] ?>"
                                                data-product-img="<?php echo $product['HinhAnh'] ?>"
                                                data-product-quantity="<?php echo $product['SoLuongTon'] ?>">
                                                <i class="fa fa-shopping-bag me-2 text-primary"></i> Thêm vào giỏ hàng
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
                    <?php if ($total_pages > 1): ?>
                        <div class="col-12">
                            <div class="pagination d-flex justify-content-center mt-5">
                                <?php if ($curr_page > 1):
                                    $first_page = 1;
                                    ?>
                                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?page=$first_page" . (!empty($categoryid) ? "&categoryid=$categoryid" : "") . (!empty($searchStr) ? "&searchStr=$searchStr" : "") ?>"
                                        class="rounded">&laquo;</a>
                                <?php endif; ?>
                                <?php
                                for ($page_item = $start; $page_item <= $end; $page_item++):
                                    $isActive = ($curr_page == $page_item) ? 'active' : '';
                                    ?>
                                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?page=$page_item" . (!empty($categoryid) ? "&categoryid=$categoryid" : "") . (!empty($searchStr) ? "&searchStr=$searchStr" : "") ?>"
                                        class="<?php echo $isActive; ?> rounded">
                                        <?php echo $page_item ?>
                                    </a>
                                <?php endfor; ?>
                                <?php
                                if ($curr_page < $total_pages):
                                    $last_page = $total_pages;
                                    ?>
                                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?page=$last_page" . (!empty($categoryid) ? "&categoryid=$categoryid" : "") . (!empty($searchStr) ? "&searchStr=$searchStr" : "") ?>"
                                        class="rounded">&raquo;</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>