<center>
    <h2>Sửa khách hàng</h2>
</center>
<form action="<?php echo _WEB_ROOT ?>/admin/customer/updateCustomers?MaKH=<?php echo $customer["MaKH"] ?>"
    method="post">
    <div class="row">
        <div style="margin: 0px 50px;" class="col">
            <div>
                Mã khách hàng
                <input type="text" name="MaKH" class="form-control" value="<?php echo $customer["MaKH"] ?>" disabled />
            </div>
            <br />
            <div>
                Tên khách hàng
                <input type="text" name="TenKH" class="form-control" value="<?php echo $customer['TenKH'] ?>" />
            </div>
            <br />
            <div>
                Tên đăng nhập
                <input type="text" name="Username" class="form-control" value="<?php echo $customer['Username'] ?>" />
            </div>
            <br />
            <div>
                Mật khẩu
                <input type="password" name="Password" class="form-control"
                    value="<?php echo $customer['Password'] ?>" />
            </div>
            <br />
        </div>
        <div style="margin: 0px 50px;" class="col">
            <div>
                Email
                <input type="email" name="Email" class="form-control" value="<?php echo $customer['Email'] ?>" />
            </div><br />
            <div>
                Số điện thoại
                <input type="text" name="SDT" class="form-control" value="<?php echo $customer['SDT'] ?>" />
            </div><br />
            <div>
                Địa chỉ
                <input type="text" name="DiaChi" class="form-control" value="<?php echo $customer['DiaChi'] ?>" />
            </div><br />

            <div>
                <label for="">TrangThai</label>
                <select name="TrangThai" class="form-select">
                    <option value="1" <?= $customer['TrangThai'] == 1 ? 'selected' : '' ?>>1</option>
                    <option value="0" <?= $customer['TrangThai'] == 0 ? 'selected' : '' ?>>0</option>
                </select>
            </div><br />
        </div>
    </div>
    <div>
        <center><button type="submit" class="btn  btn-lg btn-success material-symbols-outlined">edit</button>
        </center>
        <a href="<?php echo _WEB_ROOT ?>/admin/customer" style="margin: 0px 50px;"
            class="btn btn-lg btn-primary material-symbols-outlined">
            keyboard_return
        </a>
    </div>
</form>