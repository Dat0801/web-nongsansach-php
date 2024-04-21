<?php
include_once "app/views/admin/pagination/pagination.php";
if (isset($_GET['searchStr'])) {
    $searchStr = trim($_GET['searchStr']);
} else {
    $searchStr = null;
}
    $suppliers_list = $suppliers_model->getListWithLimit($display, $position, $searchStr);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-pzjw8s+ekmvplp5f/ZxXnDQbcz0S7bJr6W2kcoFVGLsRakET4Qc5I2tG4LDA2tB" crossorigin="anonymous">
    <form class="d-flex" action="<?php echo _WEB_ROOT ?>/admin/suppliers" method="get">
        <div style="margin: 0 auto">
            <input class="form-control me-2" type="search" placeholder="Nhập tên nhà cung cấp..."
                aria-label="Tìm kiếm nhà cung cấp..." style="width:400px; margin: 0 auto" name="searchStr" id="searchStr">
            <center>
                <button class="btn btn-outline-success m-2" type="submit">Tìm kiếm</button>
            </center>
        </div>
    </form>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 my-3">
                <a href="<?php echo _WEB_ROOT ?>/admin/suppliers/Addsuppliers"
                    class="btn btn-primary material-symbols-outlined">
                    add_circle
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive container-fluid ">
        <table class="table table-secondary table-bordered"
            style="text-align: center; border-radius: 10px; overflow: hidden; color: black;">
            <thead>
                <tr>
                    <th scope="col">Mã nhà cung cấp</th>
                    <th scope="col">Tên nhà cung cấp</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col" colspan="2" style="text-align: center;">CRUD</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($suppliers_list as $suppliers) {
                    echo '<tr>';
                    echo "<td>" . $suppliers['MaNCC'] . "</td>";
                    echo "<td>" . $suppliers['TenNCC'] . "</td>";
                    echo "<td>" . $suppliers['SDT'] . "</td>";
                    echo "<td>" . $suppliers['DiaChi'] . "</td>";
                    echo "<td>" . $suppliers['TrangThai'] . "</td>";
                    echo "<td>
                    <a href=\"" . _WEB_ROOT . "/admin/suppliers/Editsuppliers?MaNCC=" . $suppliers["MaNCC"] . "\" class=\"btn btn-sm btn-success material-symbols-outlined\"\">edit</a>
                    <a class=\"btn-delete btn btn-sm btn-danger material-symbols-outlined\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\" data-suppliersid=\"" . $suppliers['MaNCC'] . "\" data-suppliersname=\"" . $suppliers['TenNCC'] . "\">delete</a>
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
<!-- Xử lý nút delete -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:black">Huỷ hợp tác với nhà cung cấp</h5>
            </div>
            <div class="modal-body">
                <p style="color: red">Bạn có muốn xoá tên nhà cung cấp ra khỏi danh sách?</p>
                <table class="table table-suppliers">
                    <tr>
                        <td>MaNCC</td>
                        <td><span id="DeletesuppliersIDSpan"></span></td>
                    </tr>
                    <tr>
                        <td>TenNCC</td>
                        <td><span id="DeletesuppliersNameSpan"></span></td>
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
        const suppliersid = $(event.target).attr('data-suppliersid');
        const suppliersname = $(event.target).attr('data-suppliersname');
        $('#DeletesuppliersIDSpan').html(suppliersid);
        $('#DeletesuppliersNameSpan').html(suppliersname);
        $("#btn-xoa").attr("href", "<?php echo _WEB_ROOT ?>/admin/suppliers/deletesuppliers?MaNCC=" + suppliersid);
    })
</script>