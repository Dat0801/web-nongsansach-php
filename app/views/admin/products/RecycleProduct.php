<?php
include_once "app/views/admin/pagination/pagination.php";
$list_product = $product_model->getListRecycleWithLimit($display, $position);
?>
<?php if (!empty($msg)): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $msg; ?>
    </div>
<?php endif; ?>
<form class="d-flex" action="" method="post">
    <div style="margin: 0 auto">
        <input class="form-control me-2" type="search" placeholder="Tìm kiếm hàng hóa" aria-label="Tìm kiếm hàng hóa..."
            style="width:400px; margin: 0 auto" name="searchStr" id="searchStr">
        <center>
            <button class="btn btn-outline-success m-2 material-symbols-outlined" type="submit">
                search
            </button>
        </center>
    </div>
</form>
<div class="table-responsive container-fluid ">
    <table class="table table-secondary table-bordered"
        style="text-align: center; border-radius: 10px; overflow: hidden; color: black;">
        <thead>
            <tr>
                <th scope="col">Mã hàng</th>
                <th scope="col">Mã nhóm hàng</th>
                <th scope="col">Mã nhà cung cấp</th>
                <th scope="col">Tên hàng</th>
                <th scope="col">Đơn vị tính</th>
                <th scope="col">Trọng lượng</th>
                <th scope="col">Đơn vị trọng lượng</th>
                <th scope="col">Giá bán</th>
                <th scope="col">Hệ số</th>
                <th scope="col">Giá nhập</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Số lượng tồn</th>
                <th scope="col">Trạng thái</th>
                <th scope="col" colspan="2" style="text-align: center;">CRUD</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list_product as $product) {
                echo '<tr>';
                echo "<td>" . $product['MaHang'] . "</td>";
                echo "<td>" . $product['MaNhomHang'] . "</td>";
                echo "<td>" . $product['MaNCC'] . "</td>";
                echo "<td>" . $product['TenHang'] . "</td>";
                echo "<td>" . $product['DVT'] . "</td>";
                echo "<td>" . $product['GiaBan'] . "</td>";
                echo "<td>" . $product['HeSo'] . "</td>";
                echo "<td>" . $product['GiaNhap'] . "</td>";
                echo "<td> <img style=\"width:50px\" src=\"" . _WEB_ROOT . "/public/assets/client/img/" . $product['HinhAnh'] . "\"></td>";
                echo "<td> " . $product['SoLuongTon'] . "</td>";
                echo "<td> " . $product['TrangThai'] . "</td>";
                echo "<td><a href=\"" . _WEB_ROOT . "/admin/product/recoverProduct?MaHang=" . $product["MaHang"] . "\" class=\"btn btn-sm btn-success material-symbols-outlined\"\">cycle</a></td>";
                echo "<td>
                <a class=\"btn-delete btn btn-sm btn-danger material-symbols-outlined\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\" data-productid=\"" . $product['MaHang'] . "\"
                data-productname=\"" . $product['TenHang'] . "\" data-productimg=\"" . $product['HinhAnh'] . "\">delete</a>
                </td>";
                echo '</tr>';
            }
            ?>
    </table>
</div>
<?php if ($total_pages > 1): ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination" style="justify-content: center; padding: 20px;">
            <?php if ($curr_page > 1):
                $prev_page = $curr_page - 1;
                $first_page = 1;
                ?>
                <li class="page-item" style="margin-right: 10px;">
                    <a class="page-link" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?page=$first_page" ?>"
                        aria-label="Previous">
                        <span aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-bar-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.854 3.646a.5.5 0 0 1 0 .708L8.207 8l3.647 3.646a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 0 1 .708 0M4.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 1 0v-13a.5.5 0 0 0-.5-.5" />
                            </svg>
                        </span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?page=$prev_page" ?>"
                        aria-label="Previous">
                        <span aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                            </svg>
                        </span>
                    </a>
                </li>
            <?php endif; ?>
            <?php
            for ($page_item = $start; $page_item <= $end; $page_item++):
                $isActive = ($curr_page == $page_item) ? 'active' : '';
                ?>
                <li class="page-item <?php echo $isActive; ?>">
                    <a class="page-link" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?page=$page_item" ?>">
                        <?php echo $page_item ?>
                    </a>
                </li>
            <?php endfor; ?>
            <?php
            if ($curr_page < $total_pages):
                $next_page = $curr_page + 1;
                $last_page = $total_pages;
                ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?page=$next_page" ?>"
                        aria-label="Next">
                        <span aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                        </span>
                    </a>
                </li>
                <li class="page-item" style="margin-left: 10px;">
                    <a class="page-link" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?page=$last_page" ?>"
                        aria-label="Next">
                        <span aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-bar-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.146 3.646a.5.5 0 0 0 0 .708L7.793 8l-3.647 3.646a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708 0M11.5 1a.5.5 0 0 1 .5.5v13a.5.5 0 0 1-1 0v-13a.5.5 0 0 1 .5-.5" />
                            </svg>
                        </span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
<div>
    <a href="<?php echo _WEB_ROOT ?>/admin/product" style="margin: 0px 50px;"
        class="btn btn-lg btn-primary material-symbols-outlined">
        keyboard_return
    </a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:black">Xóa sản phẩm</h5>
            </div>
            <div class="modal-body">
                <p style="color: red">Bạn có chắc muốn xóa vĩnh viễn sản phẩm?</p>
                <table class="table table-product">
                    <tr>
                        <td>MaHang</td>
                        <td><span id="DeleteProductIDSpan"></span></td>
                    </tr>
                    <tr>
                        <td>TenHang</td>
                        <td><span id="DeleteProductNameSpan"></span></td>
                    </tr>
                    <tr>
                        <td>HinhAnh</td>
                        <td><span id="DeleteProductImgSpan"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <a href="" id="btn-xoa" class="btn btn-danger">Xóa</a>
            </div>
        </div>
    </div>
</div>
<script>
    $('.btn-delete').click((event) => {
        const productid = $(event.target).attr('data-productid');
        const productname = $(event.target).attr('data-productname');
        const productimg = $(event.target).attr('data-productimg');
        $('#DeleteProductIDSpan').html(productid);
        $('#DeleteProductNameSpan').html(productname);
        $('#DeleteProductImgSpan').html(`<img style="width:150px" src="<?php echo _WEB_ROOT ?>/public/assets/client/img/${productimg}">`);
        $("#btn-xoa").attr("href", "<?php echo _WEB_ROOT ?>/admin/product/deletePermanentProduct?MaHang=" + productid);
    })
</script>