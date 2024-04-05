<center><h2>Sửa Thông Tin Nhà Cung Cấp</h2></center>
<form action="<?php echo _WEB_ROOT ?>/admin/suppliers/updatesuppliers?mancc=<?php echo $suppliers["MaNCC"] ?>" method="post">
    <div style="width: 70%; margin-left: 50px">
        <div>
            MaNCC
            <input type="text" name="MaNCC" class="form-control" value="<?php echo $suppliers['MaNCC']?>"/>
        </div>
        <br />
        <div>
            TenNCC
            <input type="text" name="TenNCC" class="form-control" value="<?php echo $suppliers['TenNCC']?>" />
        </div>
        <br />
        <div>
            SDT
            <input type="text" name="SDT" class="form-control" value="<?php echo $suppliers['SDT']?>" />
        </div>
        <br />
        <div>
            DiaChi
            <input type="text" name="DiaChi" class="form-control" value="<?php echo $suppliers['DiaChi']?>" />
        </div>
        
        <div>
            <center><button type="submit" class="btn btn-success">Sửa</button></center>
        </div>
    </div>
</form>
<h5><a href="<?php echo _WEB_ROOT ?>/admin/suppliers" style="margin-left: 50px;">Trở lại trang sản phẩm</a></h5>