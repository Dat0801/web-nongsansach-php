<center><h2>Sửa Sản Phẩm</h2></center>
<form action="<?php echo _WEB_ROOT ?>/admin/category/updatecategory?MaNhomHang=<?php echo $category["MaNhomHang"] ?>" method="post">
    <div style="width: 70%; margin-left: 50px">
       
        <div>
            MaNhomHang
            <input type="text" name="MaNhomHang" class="form-control" value="<?php echo $category['MaNhomHang']?>" />
        </div>
        <br />

        <div>
            TenNhomHang
            <input type="text" name="TenNhomHang" class="form-control" value="<?php echo $category['TenNhomHang']?>" />
        </div>
        <br />
        
        <div>
            <center><button type="submit" class="btn btn-success">Sửa</button></center>
        </div>
    </div>
</form>
<h5><a href="<?php echo _WEB_ROOT ?>/admin/category" style="margin-left: 50px;">Trở lại trang sản phẩm</a></h5>