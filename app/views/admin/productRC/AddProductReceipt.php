<?php if (!empty($msg)): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $msg; ?>
    </div>
<?php endif; ?>
<center>
    <h2>Thêm phiếu nhập</h2>
</center>
<form action="<?php echo _WEB_ROOT ?>/admin/productReceipt/addReceipt" method="post">
    <div class="row">
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">Mã phiếu nhập</label>
                <input type="text" name="MaPN" class="form-control" disabled />
            </div>
            <br />
            <div>
                <label for="">Mã nhân viên</label>
                <select name="MaNV" class="form-select">
                    <option value="<?php echo !empty($old["MaNV"]) ? $old["MaNV"] : false; ?>" selected hidden>--Chọn nhân viên--</option>
                    <?php foreach ($employee as $item) : ?>
                        <?php if (!empty($old["MaNV"]) && $old["MaNV"] == $item["MaNV"]) : ?>
                            <option value="<?= $item["MaNV"]; ?>" selected><?= $item["TenNV"]; ?></option>
                        <?php else : ?>
                            <option value="<?= $item["MaNV"]; ?>"><?= $item["TenNV"]; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?> 
                </select>
                <?php echo (!empty($errors) && array_key_exists('MaNV', $errors)) ? '<span class="text-danger">' . $errors["MaNV"] . '</span>' : false; ?>
            </div>
            <br />
            <div>
                <label for="">Mã nhà cung cấp</label>
                <select name="MaNCC" class="form-select">
                    <option value="<?php echo !empty($old["MaNCC"]) ? $old["MaNCC"] : false; ?>" selected hidden>--Chọn nhà cung cấp--</option>
                    <?php foreach ($supplier as $item) : ?>
                        <?php if (!empty($old["MaNCC"]) && $old["MaNCC"] == $item["MaNCC"]) : ?>
                            <option value="<?= $item["MaNCC"]; ?>" selected><?= $item["TenNCC"]; ?></option>
                        <?php else : ?>
                            <option value="<?= $item["MaNCC"]; ?>"><?= $item["TenNCC"]; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>                  
                </select>
                <?php echo (!empty($errors) && array_key_exists('MaNCC', $errors)) ? '<span class="text-danger">' . $errors["MaNCC"] . '</span>' : false; ?>
            </div>
            <br />
        </div>
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">Ngày nhập</label>
                <input type="text" name="NgayNhap" class="form-control"
                    value="<?php echo date('d-m-Y \ H:m:s'); ?>" disabled/>                
            </div>
            <br />
            <div>
                <label for="">Tổng tiền</label>
                <input type="text" name="TongTien" class="form-control" disabled/>                
            </div>
            <br />
            <div>
                <label for="">Trạng thái</label>
                <select name="TrangThai" class="form-select">
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>
                <?php echo (!empty($errors) && array_key_exists('TrangThai', $errors)) ? '<span class="text-danger">' . $errors["TrangThai"] . '</span>' : false; ?>
            </div>
            <br />
        </div>
        <br />        
    </div>
    <div>
        <center>
            <button type="submit" class="btn  btn-lg btn-success material-symbols-outlined">add_circle </button>
        </center>
        <a href="<?php echo _WEB_ROOT ?>/admin/productReceipt" style="margin: 0px 50px;"
            class="btn btn-lg btn-primary material-symbols-outlined">
            keyboard_return
        </a>
    </div>
</form>
