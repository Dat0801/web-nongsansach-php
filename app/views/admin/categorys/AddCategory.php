<center>
    <h2>THÊM DANH MỤC HÀNG HÓA</h2>
</center>
<?php echo (!empty($msg)) ? $msg : false; ?>
<form action="<?php echo _WEB_ROOT ?>/admin/category/addCategory" method="post">
    <div class="row">
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">MaNhomHang</label>
                <input type="text" name="MaNhomHang" class="form-control" disabled/>
            </div>
            <br />
        </div>
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">TenNhomHang</label>
                <input type="text" name="TenNhomHang" class="form-control" />
                <?php echo (!empty($errors) && array_key_exists('TenNhomHang', $errors)) ? '<span class="text-danger">' . $errors["TenNhomHang"] . '</span>' : false; ?>
            </div>
            <br />

        </div>

    </div>
    <div>
        <center><button type="submit" class="btn  btn-lg btn-success material-symbols-outlined">add_circle </button>
        </center>
        <a href="<?php echo _WEB_ROOT ?>/admin/category" style="margin: 0px 50px;"
            class="btn btn-lg btn-primary material-symbols-outlined">
            keyboard_return
        </a>
    </div>
</form>
