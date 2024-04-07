<?php
include_once "app/views/admin/pagination/pagination.php";
$list_order = $order_model->getListWithLimit($display, $position);
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
            <th scope="col">MaHD</th>
            <th scope="col">MaNV</th>
            <th scope="col">MaKH</th>
            <th scope="col">NgayTao</th>
            <th scope="col">NgayGiao</th>
            <th scope="col">TongTien</th>
            <th scope="col">TrangThai</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($list_order as $order) {
                echo '<tr>';
                echo "<td>".$order['MaHD']."</td>";
                echo "<td>".$order['MaNV']."</td>";
                echo "<td>".$order['MaKH']."</td>";
                echo "<td>".$order['NgayTao']."</td>";
                echo "<td>".$order['NgayGiao']."</td>";
                echo "<td>".$order['TongTien']."</td>";
                echo "<td> ".$order['TrangThai']."</td>";
                echo "<td>
                <a href=\""._WEB_ROOT."/admin/order/Editorder?MaHD=".$order["MaHD"]."\" style=\"color:greenyellow\">Edit</a>
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