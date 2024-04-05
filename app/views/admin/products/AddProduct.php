<center><h2>Thêm Sản Phẩm</h2></center>
<form action="<?php echo _WEB_ROOT ?>/admin/product/addProduct" method="post">
    <div style="width: 70%; margin-left: 50px">
        <div>
            MaHang
            <input type="text" name="MaHang" class="form-control" disabled />
        </div>
        <br />
        <div>
            MaNhomHang
            <input type="text" name="MaNhomHang" class="form-control" />
        </div>
        <br />
        <div>
            MaNCC
            <input type="text" name="MaNCC" class="form-control"/>
        </div>
        <br />
        <div>
            TenHang
            <input type="text" name="TenHang" class="form-control" />
        </div>
        <!-- <br />
        <div>
            MoTa
            <input type="text" name="MoTa" class="form-control"         </div> -->
        <br />
        <div>
            Hình ảnh sản phẩm
            <img src="~/Content/img/product/@Model.MetaKeywords/@Model.ProductImage" width="150" style="margin: 10px;"/>
            <input type="text" name="HinhAnh" class="form-control" />
        </div>
        <br />
        <div style="width:25%;">
            GiaBan
            <input type="number" name="GiaBan" class="form-control" />
        </div><br />
        <div style="width:25%;">
            GiaNhap
            <input type="number" name="GiaNhap" class="form-control" />
        </div><br />
        <div style="width:25%;">
            SoLuongTon
            <input type="number" name="SoLuongTon" class="form-control" />
        </div><br />
        <div style="width:25%;">
            TrangThai
            <input type="number" name="TrangThai" class="form-control" />
        </div><br />
        <div>
            <center><button type="submit" class="btn btn-success">Thêm</button></center>
        </div>
    </div>
</form>
<h5><a href="<?php echo _WEB_ROOT ?>/admin/product" style="margin-left: 50px;">Trở lại trang sản phẩm</a></h5>