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
            <th scope="col">MaNhomHang</th>
            <th scope="col">TenNhomHang</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($category_list as $category) {
                echo '<tr>';
                echo "<td>".$category['MaNhomHang']."</td>";
                echo "<td>".$category['TenNhomHang']."</td>";
                echo "<td>
                <a href=\"" . _WEB_ROOT . "/admin/category/Editcategory?MaNhomHang=" . $category["MaNhomHang"] . "\" style=\"color:greenyellow\">Edit</a>
                <a class=\"btn-delete\" style=\"color:greenyellow\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\" data-categoryid=\"" . $category['MaNhomHang'] . "\" data-categoryname=\"" . $category['TenNhomHang'] . "\">Delete</a>
                </td>";
                echo '</tr>';
            }
            
        ?>
</table>
<?php
    include_once "app/views/admin/pagination/pagination.php";
    $category_list = $category_model->getListWithLimit($display, $position);
?>
<!-- Xử lý phân trang -->
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
<!-- Xử lý nút delete -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:black">Xoá danh mục hàng hoá</h5>
            </div>
            <div class="modal-body">
                <p style="color: red">Bạn có chắc muốn xoá danh mục hàng này không?</p>
                <table class="table table-category">
                    <tr>
                        <td>MaNhaCungCap</td>
                        <td><span id="DeletecategoryIDSpan"></span></td>
                    </tr>
                    <tr>
                        <td>TenNhaCungCap</td>
                        <td><span id="DeletecategoryNameSpan"></span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <a href="" id="btn-xoa" class="btn btn-success">Xóa</a>
            </div>
        </div>
    </div>
</div>
<script>
    $('.btn-delete').click((event) => {
        const categoryid = $(event.target).attr('data-categoryid');
        const categoryname = $(event.target).attr('data-categoryname');
        $('#DeletecategoryIDSpan').html(categoryid);
        $('#DeletecategoryNameSpan').html(categoryname);
        $("#btn-xoa").attr("href", "<?php echo _WEB_ROOT ?>/admin/category/deletecategory?MaNhomHang=" + categoryid);
    })
</script>