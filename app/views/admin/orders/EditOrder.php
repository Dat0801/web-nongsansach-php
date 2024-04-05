<center><h2>Sửa Sản Phẩm</h2></center>
<form action="<?php echo _WEB_ROOT ?>/admin/order/updateorder?MaHD=<?php echo $order["MaHD"] ?>" method="post">
    <div style="width: 70%; margin-left: 50px">
        <div>
            MaHD
            <input type="text" name="MaHD" class="form-control" value="<?php echo $order["MaHD"] ?>" disabled />
        </div>
        <br />
        <div>
            MaNV
            <input type="text" name="MaNV" class="form-control" value="<?php echo $order['MaNV']?>" />
        </div>
        <br />
        <div>
            MaKH
            <input type="text" name="MaKH" class="form-control" value="<?php echo $order['MaKH']?>" />
        </div>
        <br />
        <div>
            NgayTao
            <input type="text" name="NgayTao" class="form-control" value="<?php echo $order['NgayTao']?>" />
        </div>
        <br />
        <div style="width:25%;">
            NgayGiao
            <input type="text" name="NgayGiao" class="form-control" value="<?php echo $order['NgayGiao']?>" />
        </div><br />
        <div style="width:25%;">
            TongTien
            <input type="number" name="TongTien" class="form-control" value="<?php echo $order['TongTien']?>" />
        </div><br />
        <div style="width:25%;">
            TrangThai
            <input type="text" name="TrangThai" class="form-control" value="<?php echo $order['TrangThai']?>" />
        </div><br />
        <div>
            <center><button type="submit" class="btn btn-success">Sửa</button></center>
        </div>
    </div>
</form>
<h5><a href="<?php echo _WEB_ROOT ?>/admin/order" style="margin-left: 50px;">Trở lại trang sản phẩm</a></h5>