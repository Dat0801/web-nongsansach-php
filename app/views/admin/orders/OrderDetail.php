<center>
    <h2>CHI TIẾT HÓA ĐƠN</h2>
</center>
<?php
    $sessionVar = 'listDetailOrder_' . $order["MaHD"];
    $listDetailOrder = $_SESSION[$sessionVar];
?>
<div class="row">
    <div style="margin: 0px 50px" class="col">
        <div>
            <label for="">Mã hóa đơn</label>
            <input type="text" name="MaHD" class="form-control" value="<?php echo $order["MaHD"] ?>" disabled />
        </div>
        <br />
        <div>
            <label for="">Ngày tạo</label>
            <input type="text" name="NgayTao" class="form-control" value="<?php echo $order['NgayTao'] ?>" disabled />
        </div>
        <br />
        <div>
            <label for="">Ngày giao</label>
            <input type="text" name="NgayGiao" class="form-control" value="<?php echo $order['NgayGiao'] ?>" disabled />
        </div><br />
    </div>
    <div style="margin: 0px 50px" class="col">
        <div>
            <label for="">Tên khách hàng</label>
            <input type="text" name="MaKH" class="form-control" value="<?php echo $customer['TenKH'] ?>" disabled />
        </div>
        <br />
        <div>
            <label for="">Tên nhân viên</label>
            <input type="text" name="MaNV" class="form-control" value="<?php echo $employee['TenNV'] ?>" disabled />
        </div>
        <br />
        <div style="">
            <label for="">Trạng thái</label>
            <input type="text" name="TrangThai" class="form-control" value="<?php echo $order['TrangThai'] ?>" disabled/>
        </div><br />
    </div>
</div>
<div class="table-responsive container">
    <table class="table table-secondary table-bordered"
        style="text-align: center; border-radius: 10px; overflow: hidden; color: black">
        <thead>
            <tr>
                <th scope="col">Mã hàng</th>
                <th scope="col">Tên hàng</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Đơn vị tính</th>
                <th scope="col">Trọng lượng</th>
                <th scope="col">Đơn vị trọng lượng</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá bán</th>
                <th scope="col">Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($listDetailOrder as $detailOrder) {
                echo '<tr>';
                echo "<td>" . $detailOrder['MaHang'] . "</td>";
                echo "<td>" . $detailOrder['TenHang'] . "</td>";
                echo "<td> <img style=\"width:50px\" src=\"" . _WEB_ROOT . "/public/assets/client/img/" . $detailOrder['HinhAnh'] . "\"></td>";
                echo "<td>" . $detailOrder['DVT'] . "</td>";
                echo "<td>" . $detailOrder['TrongLuong'] . "</td>";
                echo "<td>" . $detailOrder['DonViTrongLuong'] . "</td>";
                echo "<td>" . $detailOrder['SoLuong'] . "</td>";
                echo "<td>" . $detailOrder['GiaBan'] . "</td>";
                echo "<td>" . $detailOrder['ThanhTien'] . "</td>";
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