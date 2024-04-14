<?php if (!empty($msg)): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $msg; ?>
    </div>
<?php endif; ?>
<center>
    <h2>Thêm khách hàng</h2>
</center>
<form action="<?php echo _WEB_ROOT ?>/admin/Customer/addCustomer" method="post">
    <div class="row">
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">Mã khách hàng</label>
                <input type="text" name="MaKH" class="form-control" disabled />
            </div>
            <br />
            <div>
                <label for="">Tên khách hàng</label>
                <input type="text" name="TenKH" class="form-control"
                    value="<?php echo !empty($old["TenKH"]) ? $old["TenKH"] : false; ?>" />
                <?php echo (!empty($errors) && array_key_exists('TenKH', $errors)) ? '<span class="text-danger">' . $errors["TenKH"] . '</span>' : false; ?>
            </div>
            <br />
            <div>
                <label for="">Tên tài khoản</label>
                <input type="text" name="Username" class="form-control"
                    value="<?php echo !empty($old["Username"]) ? $old["Username"] : false; ?>" />
                <?php echo (!empty($errors) && array_key_exists('Username', $errors)) ? '<span class="text-danger">' . $errors["Username"] . '</span>' : false; ?>
            </div>
            <br />
            <div>
                <label for="">Mật khẩu</label>
                <input type="password" name="Password" class="form-control"
                    value="<?php echo !empty($old["Password"]) ? $old["Password"] : false; ?>" />
                <?php echo (!empty($errors) && array_key_exists('Password', $errors)) ? '<span class="text-danger">' . $errors["Password"] . '</span>' : false; ?>
            </div>
            <br />
        </div>                            
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">Email</label>
                <input type="email" name="Email" class="form-control"
                    value="<?php echo !empty($old["Email"]) ? $old["Email"] : false; ?>" />
                <?php echo (!empty($errors) && array_key_exists('Email', $errors)) ? '<span class="text-danger">' . $errors["Email"] . '</span>' : false; ?>
            </div>
            <br />  
            <div>
                <label for="">Số điện thoại</label>
                <input type="text" name="SDT" class="form-control"
                    value="<?php echo !empty($old["SDT"]) ? $old["SDT"] : false; ?>" />
                <?php echo (!empty($errors) && array_key_exists('SDT', $errors)) ? '<span class="text-danger">' . $errors["SDT"] . '</span>' : false; ?>
            </div>
            <br />
            <div>
                <label for="">Địa chỉ</label>
                <input type="text" name="DiaChi" class="form-control"
                    value="<?php echo !empty($old["DiaChi"]) ? $old["DiaChi"] : false; ?>" />
                <?php echo (!empty($errors) && array_key_exists('DiaChi', $errors)) ? '<span class="text-danger">' . $errors["DiaChi"] . '</span>' : false; ?>
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
    </div>
    <div>
        <center>
            <button type="submit" class="btn  btn-lg btn-success material-symbols-outlined">add_circle </button>
        </center>
        <a href="<?php echo _WEB_ROOT ?>/admin/Customer" style="margin: 0px 50px;"
            class="btn btn-lg btn-primary material-symbols-outlined">
            keyboard_return
        </a>
    </div>
</form>
