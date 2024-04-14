<center>
    <h2>THÊM NHÀ CUNG CẤP</h2>
</center>
<?php echo (!empty($msg)) ? $msg : false; ?>
<form action="<?php echo _WEB_ROOT ?>/admin/suppliers/addSuppliers" method="post">
    <div class="row">
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">Mã nhà cung cấp</label>
                <input type="text" name="MaNCC" class="form-control" disabled/>
            </div>
            <br />
            <div>
                <label for="">Tên nhà cung cấp</label>
                <input type="text" name="TenNCC" class="form-control" />
                <?php echo (!empty($errors) && array_key_exists('TenNCC', $errors)) ? '<span class="text-danger">' . $errors["TenNCC"] . '</span>' : false; ?>    
            </div>
            <br />
        </div>
        
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">Số điện thoại</label>
                <input type="text" name="SDT" class="form-control" />
                <?php echo (!empty($errors) && array_key_exists('SDT', $errors)) ? '<span class="text-danger">' . $errors["SDT"] . '</span>' : false; ?>
            </div>
            <br />
            <div>
                <label for="">Địa chỉ</label>
                <input type="text" name="DiaChi" class="form-control" />
                <?php echo (!empty($errors) && array_key_exists('DiaChi', $errors)) ? '<span class="text-danger">' . $errors["DiaChi"] . '</span>' : false; ?>
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