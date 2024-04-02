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
            <th scope="col">NgayDat</th>
            <th scope="col">NgayGiao</th>
            <th scope="col">TongTien</th>
            <th scope="col">TinhTrang</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($order_list as $order) {
                echo '<tr>';
                echo "<td>".$order['MaHD']."</td>";
                echo "<td>".$order['MaNV']."</td>";
                echo "<td>".$order['MaKH']."</td>";
                echo "<td>".$order['NgayDat']."</td>";
                echo "<td>".$order['NgayGiao']."</td>";
                echo "<td>".$order['TongTien']."</td>";
                echo "<td> ".$order['TinhTrang']."</td>";
                echo "<td>
                <a href=\""._WEB_ROOT."/admin/order/Editorder?mahh=".$order["MaHD"]."\" style=\"color:greenyellow\">Edit</a>
                <a class=\"btn-delete\" style=\"color:greenyellow\">Delete</a>
                </td>";
                echo '</tr>';
            }
            
        ?>
</table>