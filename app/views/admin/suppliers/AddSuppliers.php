<center><h2>Thêm Nhà Cung Cấp</h2></center>
<form action="<?php echo _WEB_ROOT ?>/admin/suppliers/addSuppliers" method="post">
    <div style="width: 70%; margin-left: 50px">
    <div>
            MaNCC
            <input type="text" name="MaNCC" class="form-control"/>
        </div>
        <br />
        <div>
            TenNCC
            <input type="text" name="TenNCC" class="form-control"/>
        </div>
        <br />
        <div>
            SDT
            <input type="text" name="SDT" class="form-control"/>
        </div>
        <br />
        <div>
            DiaChi
            <input type="text" name="DiaChi" class="form-control"/>
        </div>
        <div>
            <center><button type="submit" class="btn btn-success">Thêm</button></center>
        </div>
    </div>
</form>
<h5><a href="<?php echo _WEB_ROOT ?>/admin/Suppliers" style="margin-left: 50px;">Trở lại trang sản phẩm</a></h5>