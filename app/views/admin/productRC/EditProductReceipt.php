<center><h2>Sửa phiếu nhập</h2></center>
<form action="<?php echo _WEB_ROOT ?>/admin/productReceipt/updateProductRC?MaPN=<?php echo $productRC["MaPN"] ?>" method="post">
    <div style="width: 70%; margin-left: 50px">
        <div>
            Mã phiếu nhập
            <input type="text" name="MaPN" class="form-control" value="<?php echo $productRC["MaPN"] ?>" disabled />
        </div>
        <br />
        <div>
            Mã nhân viên
            <input type="text" name="MaNV" class="form-control" value="<?php echo $productRC['MaNV']?>" />
        </div>
        <br />
        <div>
            Mã nhà cung cấp
            <input type="text" name="MaNCC" class="form-control" value="<?php echo $productRC['MaNCC']?>" />
        </div>
        <br />
        <div>
            Ngày nhập
            <input type="datetime-local" name="NgayNhap" class="form-control" value="<?php echo $productRC['NgayNhap']?>" disabled />
        </div>        
        <br />
        <div style="width:25%;">
            Tổng tiền
            <input type="text" name="TongTien" class="form-control" value="<?php echo $productRC['TongTien']?>" />
        </div><br />            
        <div style="width:25%;">
            TrangThai
            <input type="text" name="TrangThai" class="form-control" value="<?php echo $productRC['TrangThai']?>" />
        </div><br />
        <div>
            <center><button type="submit" class="btn btn-success">Sửa</button></center>
        </div>
    </div>
</form>
<h5><a href="<?php echo _WEB_ROOT ?>/admin/productReceipt" style="margin-left: 50px;">Trở lại trang phiếu nhập</a></h5>