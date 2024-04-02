<center><h2>Sửa Sản Phẩm</h2></center>
<form action="<?php echo _WEB_ROOT ?>/admin/product/updateProduct?mahh=<?php echo $product["MaHH"] ?>" method="post">
    <div style="width: 70%; margin-left: 50px">
        <div>
            MaHH
            <input type="text" name="MaHH" class="form-control" value="<?php echo $product["MaHH"] ?>" disabled />
        </div>
        <br />
        <div>
            MaNHH
            <input type="text" name="MANHH" class="form-control" value="<?php echo $product['MANHH']?>" />
        </div>
        <br />
        <div>
            TenHH
            <input type="text" name="TenHH" class="form-control" value="<?php echo $product['TenHH']?>" />
        </div>
        <br />
        <div>
            MoTa
            <input type="text" name="MoTa" class="form-control" value="<?php echo $product['MoTa']?>" />
        </div>
        <br />
        <div>
            Hình ảnh sản phẩm
            <img src="~/Content/img/product/@Model.MetaKeywords/@Model.ProductImage" width="150" style="margin: 10px;"/>
            <input type="text" name="HinhAnh" class="form-control" value="<?php echo $product['HinhAnh']?>" />
        </div>
        <br />
        <div style="width:25%;">
            GiaBan
            <input type="number" name="GiaBan" class="form-control" value="<?php echo $product['GiaBan']?>" />
        </div><br />
        <div style="width:25%;">
            GiaNhap
            <input type="number" name="GiaNhap" class="form-control" value="<?php echo $product['GiaNhap']?>" />
        </div><br />
        <div style="width:25%;">
            SoLuongTon
            <input type="number" name="SoLuongTon" class="form-control" value="<?php echo $product['SoLuongTon']?>" />
        </div><br />
        <div>
            <center><button type="submit" class="btn btn-success">Sửa</button></center>
        </div>
    </div>
</form>
<h5><a href="<?php echo _WEB_ROOT ?>/admin/product" style="margin-left: 50px;">Trở lại trang sản phẩm</a></h5>