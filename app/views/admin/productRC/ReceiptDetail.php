<center>
    <h2>CHI TIẾT PHIẾU NHẬP</h2>
</center>
<div class="row">
    <div style="margin: 0px 50px" class="col">
        <div>
            <label for="">Mã phiếu nhập</label>
            <input type="text" name="MaPN" class="form-control" value="<?php echo $productRC["MaPN"] ?>" disabled />
        </div>
        <br />
        <div>
            <label for="">Ngày nhập</label>
            <input type="text" name="NgayNhap" class="form-control" value="<?php echo $productRC['NgayNhap'] ?>" disabled/>
        </div>
        <br />
        <div>
            <label for="">Nhà cung cấp</label>
            <input type="text" class="form-control" value="<?php echo $supplier['TenNCC'] ?>" disabled/>
        </div>
        <br />
    </div>
    <div style="margin: 0px 50px" class="col">
        <div>
            <label for="">Tên nhân viên</label>
            <input type="text" class="form-control" value="<?php echo $employee['TenNV'] ?>" disabled/>
        </div>
        <br />
        <div style="">
            <label for="">Trạng thái</label>
            <input type="text" name="TrangThai" class="form-control" value="<?php echo $productRC['TrangThai'] ?>" disabled/>
        </div><br />
    </div>
</div>
<div class="table-responsive container">
    <table class="table table-secondary table-bproductRCed" style="text-align: center; bproductRC-radius: 10px; overflow: hidden; color: black">
        <thead>
            <tr>
                <th scope="col">MaHang</th>
                <th scope="col">TenHang</th>
                <th scope="col">HinhAnh</th>
                <th scope="col">DVT</th>
                <th scope="col">SoLuong</th>
                <th scope="col">GiaNhap</th>
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
                echo "<td>" . $product['GiaNhap'] . "</td>";
                echo "<td>" . $product['ThanhTien'] . "</td>";
            }
            ?>
    </table>
</div>
<div>
    <a href="<?php echo _WEB_ROOT ?>/admin/productReceipt" style="margin: 0px 50px;"
        class="btn btn-primary material-symbols-outlined">
        keyboard_return
    </a>
</div>