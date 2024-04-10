<?php echo (!empty($msg)) ? $msg : false; ?>
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<center>
    <h2>Thêm Sản Phẩm</h2>
</center>
<form action="<?php echo _WEB_ROOT ?>/admin/product/addProduct" method="post">
    <div class="row">
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">MaHang</label>
                <input type="text" name="MaHang" class="form-control" disabled />
            </div>
            <br />
            <div>
                <label for="">MaNhomHang</label>
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
                <label for="">MaNCC</label>
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
                <label for="">TenHang</label>
                <input type="text" name="TenHang" class="form-control"
                    value="<?php echo !empty($old["TenHang"]) ? $old["TenHang"] : false; ?>" />
                <?php echo (!empty($errors) && array_key_exists('TenHang', $errors)) ? '<span>' . $errors["TenHang"] . '</span>' : false; ?>
            </div>
            <br />
            <label for="formFile" class="form-label">Hình ảnh sản phẩm</label>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="customFile" name="HinhAnh">
                <label class="custom-file-label" for="customFile">Chọn hình ảnh</label>
            </div>
            <div>
                <img src="" width="150" style="border-radius: 10px;" id="imghanghoa"/>
            </div><br />
        </div>
        <br />
        <div style="margin: 0px 50px" class="col">
            <div>
                <label for="">Đơn vị tính</label>
                <input type="text" name="GiaBan" class="form-control" />
            </div><br />
            <div>
                <label for="">GiaNhap</label>
                <input type="text" name="GiaNhap" class="form-control" />
            </div><br />
            <div>
                <label for="">HeSo</label>
                <input type="text" name="HeSo" class="form-control" />
            </div><br />
            <div>
                <label for="">GiaBan</label>
                <input type="text" name="GiaBan" class="form-control" disabled/>
            </div><br />
            <div>
                <label for="">SoLuongTon</label>
                <input type="number" name="SoLuongTon" class="form-control" />
            </div><br />
            <div>
                <label for="">TrangThai</label>
                <select name="TrangThai" class="form-select">
                    <option value="1">1</option>
                    <option value="0">0</option>
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