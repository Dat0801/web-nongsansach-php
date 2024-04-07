<center><h2>Sửa khách hàng</h2></center>
<form action="<?php echo _WEB_ROOT ?>/admin/customer/updateCustomers?MaKH=<?php echo $customer["MaKH"] ?>" method="post">
    <div style="width: 70%; margin-left: 50px">
        <div>
            Mã khách hàng
            <input type="text" name="MaKH" class="form-control" value="<?php echo $customer["MaKH"] ?>" disabled />
        </div>
        <br />
        <div>
            Tên khách hàng
            <input type="text" name="TenKH" class="form-control" value="<?php echo $customer['TenKH']?>" />
        </div>
        <br />
        <div>
            Tên đăng nhập
            <input type="text" name="Username" class="form-control" value="<?php echo $customer['Username']?>" />
        </div>
        <br />
        <div>
            Mật khẩu
            <input type="password" name="Password" class="form-control" value="<?php echo $customer['Password']?>" />
        </div>        
        <br />
        <div style="width:25%;">
            Email
            <input type="email" name="Email" class="form-control" value="<?php echo $customer['Email']?>" />
        </div><br />            
        <div style="width:25%;">
            Số điện thoại
            <input type="text" name="SDT" class="form-control" value="<?php echo $customer['SDT']?>" />
        </div><br />            
        <div style="width:25%;">
            Địa chỉ
            <input type="text" name="DiaChi" class="form-control" value="<?php echo $customer['DiaChi']?>" />
        </div><br />            
        
        <div style="width:25%;">
            TrangThai
            <input type="text" name="TrangThai" class="form-control" value="<?php echo $customer['TrangThai']?>" />
        </div><br />
        <div>
            <center><button type="submit" class="btn btn-success">Sửa</button></center>
        </div>
    </div>
</form>
<h5><a href="<?php echo _WEB_ROOT ?>/admin/customer" style="margin-left: 50px;">Trở lại trang khách hàng</a></h5>