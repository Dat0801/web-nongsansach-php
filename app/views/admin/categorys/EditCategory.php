<center><h2>Sửa Danh Mục sản phẩm</h2></center>
<?php echo (!empty($msg)) ? $msg : false; ?>
<form action="<?php echo _WEB_ROOT ?>/admin/category/EditCategory?MaNhomHang=<?php echo $category["MaNhomHang"] ?>" method="post">
    <div class="row">
        <div style="margin: 0px 50px;" class="col">
            <label for="">MaNhomHang</label>
            <input type="text" name="MaNhomHang" class="form-control" value="<?php echo $category['MaNhomHang']?>" disabled/>
        </div>
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">TenNhomHang</label>
                <input type="text" name="TenNhomHang" class="form-control" value="<?php echo $category['TenNhomHang']?>"  />
                <?php echo (!empty($errors) && array_key_exists('TenNhomHang', $errors)) ? '<span class="text-danger">' . $errors["TenNhomHang"] . '</span>' : false; ?>
            </div>
            <br />

        </div>

    </div>
    <div>
        <center><button type="submit" class="btn  btn-lg btn-success material-symbols-outlined">edit</button>
        </center>
        <a href="<?php echo _WEB_ROOT ?>/admin/category" style="margin: 0px 50px;"
            class="btn btn-lg btn-primary material-symbols-outlined">
            keyboard_return
        </a>
    </div>
</form>
