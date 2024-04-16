<?php if (!empty($msg)): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $msg; ?>
    </div>
<?php endif; ?>
<center>
    <h2>Thêm Sản Phẩm</h2>
</center>
<form action="<?php echo _WEB_ROOT ?>/admin/product/addProduct" method="post">
    <div class="row">
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">Mã hàng</label>
                <input type="text" name="MaHang" class="form-control" disabled />
            </div>
            <br />
            <div>
                <label for="">Mã nhóm hàng</label>
                <select name="MaNhomHang" class="form-select">
                    <?php
                    foreach ($category as $item) {
                        echo '<option value="' . $item["MaNhomHang"] . '">' . $item["TenNhomHang"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <br />
            <div>
                <label for="">Mã nhà cung cấp</label>
                <select name="MaNCC" class="form-select">
                    <?php
                    foreach ($suppliers as $item) {
                        echo '<option value="' . $item["MaNCC"] . '">' . $item["TenNCC"] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <br />
            <div>
                <label for="">Tên hàng</label>
                <input type="text" name="TenHang" class="form-control"
                    value="<?php echo !empty($old["TenHang"]) ? $old["TenHang"] : false; ?>" />
                <?php echo (!empty($errors) && array_key_exists('TenHang', $errors)) ? '<span class="text-danger">' . $errors["TenHang"] . '</span>' : false; ?>
            </div>
            <br />
            <label for="formFile" class="form-label">Hình ảnh sản phẩm</label>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="customFile" name="HinhAnh">
                <label class="custom-file-label" for="customFile">Chọn hình ảnh</label>
            </div>
            <div>
                <img src="" width="150" style="border-radius: 10px;" id="imghanghoa" />
            </div><br />
        </div>
        <br />
        <div style="margin: 0px 50px" class="col">
            <div>
                <label for="">Đơn vị tính</label>
                <input type="text" name="DVT" class="form-control"
                    value="<?php echo !empty($old["DVT"]) ? $old["DVT"] : false; ?>" />
                <?php echo (!empty($errors) && array_key_exists('DVT', $errors)) ? '<span class="text-danger">' . $errors["DVT"] . '</span>' : false; ?>
            </div><br />
            <div>
                <label for="">Trọng lượng</label>
                <input type="number" name="TrongLuong" class="form-control" />
                <?php echo (!empty($errors) && array_key_exists('TrongLuong', $errors)) ? '<span class="text-danger">' . $errors["TrongLuong"] . '</span>' : false; ?>
            </div><br />
            <div>
                <label for="">Đơn vị trọng lượng</label>
                <input type="text" name="DonViTrongLuong" class="form-control" />
                <?php echo (!empty($errors) && array_key_exists('DonViTrongLuong', $errors)) ? '<span class="text-danger">' . $errors["DonViTrongLuong"] . '</span>' : false; ?>
            </div><br />
            <div>
                <label for="">Giá nhập</label>
                <input type="number" name="GiaNhap" class="form-control"
                    value="<?php echo !empty($old["GiaNhap"]) ? $old["GiaNhap"] : false; ?>" />
                <?php echo (!empty($errors) && array_key_exists('GiaNhap', $errors)) ? '<span class="text-danger">' . $errors["GiaNhap"] . '</span>' : false; ?>
            </div><br />
            <div>
                <label for="">Hệ số</label>
                <input type="number" step="any" name="HeSo" class="form-control"
                    value="<?php echo !empty($old["HeSo"]) ? $old["HeSo"] : false; ?>" />
                <?php echo (!empty($errors) && array_key_exists('HeSo', $errors)) ? '<span class="text-danger">' . $errors["HeSo"] . '</span>' : false; ?>
            </div><br />
            <div>
                <label for="">Số lượng tồn</label>
                <input type="number" step="any" name="SoLuongTon" class="form-control"
                    value="<?php echo !empty($old["SoLuongTon"]) ? $old["SoLuongTon"] : false; ?>" />
                <?php echo (!empty($errors) && array_key_exists('SoLuongTon', $errors)) ? '<span class="text-danger">' . $errors["SoLuongTon"] . '</span>' : false; ?>
            </div><br />
            <div>
                <label for="">Trạng thái</label>
                <select name="TrangThai" class="form-select">
                    <option value="1">Hiển thị</option>
                    <option value="0">Ẩn đi</option>
                </select>
            </div><br />
        </div>
    </div>
    <div>
        <center><button type="submit" class="btn  btn-lg btn-success material-symbols-outlined">add_circle </button>
        </center>
        <a href="<?php echo _WEB_ROOT ?>/admin/product" style="margin: 0px 50px;"
            class="btn btn-lg btn-primary material-symbols-outlined">
            keyboard_return
        </a>
    </div>
</form>
<script>
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        var imgName = fileName.split(".")[0];
        var imgSrc = "<?php echo _WEB_ROOT ?>/public/assets/client/img/" + imgName + '.jpg';
        $("#imghanghoa").attr("src", imgSrc);
    });
</script>