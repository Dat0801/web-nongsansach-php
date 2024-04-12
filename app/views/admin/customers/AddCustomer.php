<center>
    <h2>Thêm Khách Hàng</h2>
</center>
<form action="<?php echo _WEB_ROOT ?>/admin/Customer/addCustomer" method="post">
    <div class="row">
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">Mã khách hàng</label>
                <input type="text" name="MaKH" class="form-control" disabled/>
            </div>
            <br />
            <div>
                <label for="">Tên khách hàng</label>
                <input type="text" name="TenKH" class="form-control" />
            </div>
            <br />
            <div>
                <label for="">Tên tài khoản</label>
                <input type="text" name="Username" class="form-control" />
            </div>
            <br />            
            <div>
                <label for="">Mật khẩu</label>
                <input type="password" name="Password" class="form-control" />
            </div>
            <br />            
            
        </div>
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">Email</label>
                <input type="email" name="Email" class="form-control" />
            </div>
            <br />
            <div>
                <label for="">Số điện thoại</label>
                <input type="text" name="SDT" class="form-control" />
            </div>
            <br />
            <div>
                <label for="">Địa chỉ</label>
                <input type="text" name="DiaChi" class="form-control" />
            </div>
            <br />            
            <div>
                <label for="">Trạng thái</label>
                <input type="number" name="TrangThai" class="form-control" />
            </div>
        </div>
    </div>
    <div>
        <center><button type="submit" class="btn  btn-lg btn-success material-symbols-outlined">add_circle </button>
        </center>
        <a href="<?php echo _WEB_ROOT ?>/admin/Customer" style="margin: 0px 50px;"
            class="btn btn-lg btn-primary material-symbols-outlined">
            keyboard_return
        </a>
    </div>
</form>