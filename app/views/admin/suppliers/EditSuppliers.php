<center><h2>Sửa Thông Tin Nhà Cung Cấp</h2></center>
<form action="<?php echo _WEB_ROOT ?>/admin/suppliers/updatesuppliers?mancc=<?php echo $suppliers["MaNCC"] ?>" method="post">
    <div style="width: 70%; margin-left: 50px">
        <div>
            MaNCC
            <input type="text" name="MaNCC" class="form-control" value="{{suppliers.MaNCC}}"/>
        </div>
        <br />
        <div>
            TenNCC
            <input type="text" name="TenNCC" class="form-control" value="{{suppliers.TenNCC}}" />
        </div>
        <br />
        <div>
            SDTNCC
            <input type="text" name="SDTNCC" class="form-control" value="{{suppliers.SDTNCC}}" />
        </div>
        <br />
        <div>
            DiaChiNCC
            <input type="text" name="DiaChiNCC" class="form-control" value="{{suppliers.DiaChiNCC}}" />
        </div>
        
        <div>
            <center><button type="submit" class="btn btn-success">Sửa</button></center>
        </div>
    </div>
</form>
<h5><a href="{{_WEB_ROOT}}/admin/suppliers" style="margin-left: 50px;">Trở lại trang sản phẩm</a></h5>