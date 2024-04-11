<center>
    <h2>CHI TIẾT HÓA ĐƠN</h2>
</center>
<div class="row">
    <div style="margin: 0px 50px" class="col">
        <div>
            <label for="">MaHD</label>
            <input type="text" name="MaHD" class="form-control" value="<?php echo $order["MaHD"] ?>" disabled />
        </div>
        <br />
        <div>
            <label for="">NgayTao</label>
            <input type="text" name="NgayTao" class="form-control" value="<?php echo $order['NgayTao'] ?>" />
        </div>
        <br />
        <div>
            <label for="">NgayGiao</label>
            <input type="text" name="NgayGiao" class="form-control" value="<?php echo $order['NgayGiao'] ?>" />
        </div><br />
    </div>
    <div style="margin: 0px 50px" class="col">
        <div>
            <label for="">TenKH</label>
            <input type="text" name="MaKH" class="form-control" value="<?php echo $customer['TenKH'] ?>" />
        </div>
        <br />
        <div>
            <label for="">NhanVien</label>
            <select name="MaNV" class="form-select">
                <?php
                foreach ($listEmployee as $nv) {
                    if ($nv["MaNV"] == $order["MaNV"]) {
                        echo '<option value="' . $nv["MaNV"] . '" selected>' . $nv["TenNV"] . '</option>';
                    } else {
                        echo '<option value="' . $nv["MaNV"] . '">' . $nv["TenNV"] . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <br />
        <div style="">
            <label for="">TrangThai</label>
            <input type="text" name="TrangThai" class="form-control" value="<?php echo $order['TrangThai'] ?>" />
        </div><br />
    </div>
</div>
<div class="table-responsive container">
    <table class="table table-secondary table-bordered" style="text-align: center; border-radius: 10px; overflow: hidden; color: black">
        <thead>
            <tr>
                <th scope="col">MaHang</th>
                <th scope="col">TenHang</th>
                <th scope="col">HinhAnh</th>
                <th scope="col">DVT</th>
                <th scope="col">SoLuong</th>
                <th scope="col">GiaBan</th>
                <th scope="col">ThanhTien</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listProduct as $product) {
                echo '<tr>';
                echo "<td>" . $product['MaHang'] . "</td>";
                echo "<td>" . $product['TenHang'] . "</td>";
                echo "<td> <img style=\"width:50px\" src=\"" . _WEB_ROOT . "/public/assets/client/img/" . $product['HinhAnh'] . "\"></td>";
                echo "<td>" . $product['DVT'] . "</td>";
                echo "<td>" . $product['SoLuong'] . "</td>";
                echo "<td>" . $product['GiaBan'] . "</td>";
                echo "<td>" . $product['ThanhTien'] . "</td>";
            }

            ?>
    </table>
</div>
<div>
    <a href="<?php echo _WEB_ROOT ?>/admin/order" style="margin: 0px 50px;"
        class="btn btn-primary material-symbols-outlined">
        keyboard_return
    </a>
</div>