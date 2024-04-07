<?php
include_once "app/views/admin/pagination/pagination.php";
$list_product = $product_model->getProductListWithLimit($display, $position);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-pzjw8s+ekmvplp5f/ZxXnDQbcz0S7bJr6W2kcoFVGLsRakET4Qc5I2tG4LDA2tB" crossorigin="anonymous">
<form class="d-flex" action="" method="post">
    <div style="margin: 0 auto">
        <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Tìm kiếm sản phẩm..."
            style="width:400px; margin: 0 auto" name="searchStr" id="searchStr">
        <center>
            <button class="btn btn-outline-success m-2" type="submit">Search</button>
        </center>
    </div>
</form>
<table class="table table-dark table-bordered">
    <thead>
        <tr>
            <th scope="col">MaHang</th>
            <th scope="col">MaNhomHang</th>
            <th scope="col">MaNCC</th>
            <th scope="col">TenHang</th>
            <th scope="col">DVT</th>
            <th scope="col">GiaBan</th>
            <th scope="col">HeSo</th>
            <th scope="col">GiaNhap</th>
            <th scope="col">HinhAnh</th>
            <th scope="col">SoLuongTon</th>
            <th scope="col">TrangThai</th>
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
            echo "<td> <img src=\"" . $product['HinhAnh'] . "\"></td>";
            echo "<td> " . $product['SoLuongTon'] . "</td>";
            echo "<td> " . $product['TrangThai'] . "</td>";
            echo "<td>
                <a href=\"" . _WEB_ROOT . "/admin/product/EditProduct?MaHang=" . $product["MaHang"] . "\" style=\"color:greenyellow\">Edit</a>
                <a class=\"btn-delete\" style=\"color:greenyellow\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\" data-productid=" . $product['MaHang'] . ">Delete</a>
                </td>";
            echo '</tr>';
        }

        ?>
</table>
<nav aria-label="Page navigation example">
    <ul class="pagination" style="justify-content: center; padding: 20px;">
        <?php if ($curr_page > 1):
            $prev_page = $curr_page - 1;
        ?>
        <li class="page-item">
            <a class="page-link" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?page=$prev_page" ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
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
        ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?page=$next_page" ?>"
                    aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:black">Xóa sản phẩm</h5>
            </div>
            <div class="modal-body">
                <p style="color: red">Bạn có chắc muốn xóa sản phẩm?</p>
                <table class="table table-product">
                    <tr>
                        <td>MaHang</td>
                        <td><span id="DeleteProductIDSpan"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <a href="/Admin/Product/XoaSP?ProductID" id="btn-xoa" class="btn btn-success">Xóa</a>
            </div>
        </div>
    </div>
</div>
<script>
    $('.btn-delete').click((event) => {
        const productid = $(event.target).attr('data-productid');
        $('#DeleteProductIDSpan').html(productid);
        $("#btn-xoa").attr("href", "<?php echo _WEB_ROOT ?>/admin/product/deleteProduct?MaHang=" + productid);
    })
</script>