<center>
    <h2>Sửa Sản Phẩm</h2>
</center>
<form
    action="<?php echo _WEB_ROOT ?>/admin/order/updateorder?MaHD=<?php echo $order["MaHD"] ?>&MaKH=<?php echo $order["MaKH"] ?>"
    method="post">
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
                <label for="">MaKH</label>
                <input type="text" name="MaKH" class="form-control" value="<?php echo $order['MaKH'] ?>" disabled />
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
    <div>
        <center><button type="submit" class="btn  btn-lg btn-success material-symbols-outlined">edit</button></center>
        <a href="<?php echo _WEB_ROOT ?>/admin/order" style="margin: 0px 50px;"
            class="btn btn-primary material-symbols-outlined">
            keyboard_return
        </a>
    </div>
</form>