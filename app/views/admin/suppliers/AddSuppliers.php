<center>
    <h2>Thêm Nhà Cung Cấp</h2>
</center>
<form action="<?php echo _WEB_ROOT ?>/admin/suppliers/addSuppliers" method="post">
    <div class="row">
        <div style="margin: 0px 50px;" class="col">
            <div>
                MaNCC
                <input type="text" name="MaNCC" class="form-control" />
            </div>
            <br />
            <div>
                TenNCC
                <input type="text" name="TenNCC" class="form-control" />
            </div>
            <br />
        </div>
        <div style="margin: 0px 50px;" class="col">
            <div>
                SDT
                <input type="text" name="SDT" class="form-control" />
            </div>
            <br />
            <div>
                DiaChi
                <input type="text" name="DiaChi" class="form-control" />
            </div>
        </div>
    </div>
    <div>
        <center><button type="submit" class="btn  btn-lg btn-success material-symbols-outlined">add_circle </button>
        </center>
        <a href="<?php echo _WEB_ROOT ?>/admin/Suppliers" style="margin: 0px 50px;"
            class="btn btn-lg btn-primary material-symbols-outlined">
            keyboard_return
        </a>
    </div>
</form>