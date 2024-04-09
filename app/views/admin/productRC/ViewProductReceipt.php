<?php
include_once "app/views/admin/pagination/pagination.php";
$list_productRC = $productRC_model->getListWithLimit($display, $position);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-pzjw8s+ekmvplp5f/ZxXnDQbcz0S7bJr6W2kcoFVGLsRakET4Qc5I2tG4LDA2tB" crossorigin="anonymous">
<form class="d-flex" action="" method="post">
    <div style="margin: 0 auto">
        <input class="form-control me-2" type="search" placeholder="Tìm kiếm phiếu nhập" aria-label="Tìm kiếm..."
            style="width:400px; margin: 0 auto" name="searchStr" id="searchStr">
        <center>
            <button class="btn btn-outline-success m-2" type="submit">Search</button>
        </center>
    </div>
</form>
<table class="table table-dark table-bordered">
    <thead>
        <tr>
            <th scope="col">Mã phiếu nhập</th>
            <th scope="col">Mã nhân viên</th>
            <th scope="col">Mã nhà cung cấp</th>
            <th scope="col">Ngày nhập</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Trạng thái</th>            
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($list_productRC as $productRC) {
            echo '<tr>';
            echo "<td>" . $productRC['MaPN'] . "</td>";
            echo "<td>" . $productRC['MaNV'] . "</td>";
            echo "<td>" . $productRC['MaNCC'] . "</td>";
            echo "<td>" . $productRC['NgayNhap'] . "</td>";
            echo "<td>" . $productRC['TongTien'] . "</td>";
            echo "<td>" . $productRC['TrangThai'] . "</td>";            
            echo "<td>
                <a href=\"" . _WEB_ROOT . "/admin/productReceipt/editProductRC?MaPN=" . $productRC["MaPN"] . "\" style=\"color:greenyellow\">Edit</a>
                <a class=\"btn-delete\" style=\"color:greenyellow\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\" data-productRCid=\"" . $productRC['MaPN'] . "\" data-empID=\"" . $productRC['MaNV'] . "\" data-supID=\"" . $productRC['MaNCC'] . "\" data-date=\"" . $productRC['NgayNhap'] . "\">Delete</a>
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
                <h5 class="modal-title" id="exampleModalLabel" style="color:black">Xóa phiếu nhập</h5>
            </div>
            <div class="modal-body">
                <p style="color: red">Bạn có chắc muốn xóa phiếu nhập?</p>
                <table class="table table-product">
                    <tr>
                        <td>Mã phiếu nhập</td>
                        <td><span id="DeleteProductRCIDSpan"></span></td>
                    </tr>
                    <tr>
                        <td>Mã nhân viên</td>
                        <td><span id="DeleteEmpIDSpan"></span></td>
                    </tr>
                    <tr>
                        <td>Mã nhà cung cấp</td>
                        <td><span id="DeleteSupplierIDSpan"></span></td>
                    </tr>
                    <tr>
                        <td>Ngày nhập</td>
                        <td><span id="DeleteDateSpan"></span></td>
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
        const productRCID = $(event.target).attr('data-productRCid');
        const empID = $(event.target).attr('data-empID');
        const supID = $(event.target).attr('data-supID'); 
        const date = $(event.target).attr('data-date'); 
               
        $('#DeleteProductRCIDSpan').html(productid);
        $('#DeleteEmpIDSpan').html(empID);
        $('#DeleteSupplierIDSpan').html(supID);
        $('#DeleteDateSpan').html(date);        
        $("#btn-xoa").attr("href", "<?php echo _WEB_ROOT ?>/admin/productReceipt/deleteProductRC?MaPN=" + productRCID);
    })
</script>