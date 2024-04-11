<?php echo (!empty($msg)) ? $msg : false; ?>

<center>
    <h2>Sửa Sản Phẩm</h2>
</center>
<form
    action="<?php echo _WEB_ROOT ?>/admin/product/EditProduct?MaHang=<?php echo $product["MaHang"];?>&GiaBan=<?php echo $product["GiaBan"];?>&HinhAnh=<?php echo $product["HinhAnh"];?>"
    method="post">
    <div class="row">
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">MaHang</label>
                <input type="text" name="MaHang" class="form-control" value="<?php echo $product["MaHang"] ?>"
                    disabled />
            </div>
            <br />
            <div>
                <label for="">MaNhomHang</label>
                <select name="MaNhomHang" class="form-select">
                    <?php
                    foreach ($category as $item) {
                        if ($item["MaNhomHang"] == $product["MaNhomHang"]) {
                            echo '<option value="' . $item["MaNhomHang"] . '" selected>' . $item["TenNhomHang"] . '</option>';
                        } else {
                            echo '<option value="' . $item["MaNhomHang"] . '">' . $item["TenNhomHang"] . '</option>';
                        }
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
                        if ($item["MaNCC"] == $product["MaNCC"]) {
                            echo '<option value="' . $item["MaNCC"] . '" selected>' . $item["TenNCC"] . '</option>';
                        } else {
                            echo '<option value="' . $item["MaNCC"] . '">' . $item["TenNCC"] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <br />
            <div>
                <label for="">TenHang</label>
                <input type="text" name="TenHang" class="form-control" value="<?php echo $product["TenHang"] ?>" />
                <?php echo (!empty($errors) && array_key_exists('TenHang', $errors)) ? '<span>' . $errors["TenHang"] . '</span>' : false; ?>
            </div>
            <br />
            <div>
                <label for="formFile" class="form-label">Hình ảnh sản phẩm</label>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="customFile" name="HinhAnh">
                    <label class="custom-file-label" for="customFile"><?php echo $product["HinhAnh"] ?></label>
                </div>
            </div>
            <div>
                <img src="<?php echo _WEB_ROOT ?>/public/assets/client/img/<?php echo $product['HinhAnh'] ?>"
                    width="150" style="border-radius: 10px;" id="imghanghoa" />
            </div><br />
        </div>
        <br />
        <div style="margin: 0px 50px" class="col">
            <div>
                <label for="">Đơn vị tính</label>
                <input type="text" name="DVT" class="form-control" value="<?php echo $product['DVT'] ?>" />
            </div><br />
            <div>
                <label for="">GiaNhap</label>
                <input type="text" name="GiaNhap" class="form-control" value="<?php echo $product['GiaNhap'] ?>" />
            </div><br />
            <div>
                <label for="">HeSo</label>
                <input type="text" name="HeSo" class="form-control" value="<?php echo $product['HeSo'] ?>" />
            </div><br />
            <div>
                <label for="">GiaBan</label>
                <input type="text" name="GiaBan" class="form-control" value="<?php echo $product['GiaBan'] ?>"
                    disabled />
            </div><br />
            <div>
                <label for="">SoLuongTon</label>
                <input type="number" name="SoLuongTon" class="form-control"
                    value="<?php echo $product['SoLuongTon'] ?>" />
            </div><br />
            <div>
                <label for="">TrangThai</label>
                <select name="TrangThai" class="form-select">
                    <option value="1" <?= $product['TrangThai'] == 1 ? 'selected' : '' ?>>1</option>
                    <option value="0" <?= $product['TrangThai'] == 0 ? 'selected' : '' ?>>0</option>
                </select>
            </div><br />
        </div>
    </div>
    <div>
        <center><button type="submit" class="btn  btn-lg btn-success material-symbols-outlined">edit</button></center>
        <a href="<?php echo _WEB_ROOT ?>/admin/product" style="margin: 0px 50px;"
            class="btn btn-primary material-symbols-outlined">
            keyboard_return
        </a>
    </div>
</form>

<script>
    $(".custom-file-input").on("change", function () {
        fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        var imgName = fileName.split(".")[0];
        var imgSrc = "<?php echo _WEB_ROOT ?>/public/assets/client/img/" + imgName + '.jpg';
        $("#imghanghoa").attr("src", imgSrc);
    });
</script>