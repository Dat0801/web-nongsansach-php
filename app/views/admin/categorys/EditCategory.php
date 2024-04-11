<center><h2>SỬA DANH MỤC SẢN PHẨM</h2></center>
<form action="<?php echo _WEB_ROOT ?>/admin/category/updatecategory?MaNhomHang=<?php echo $category["MaNhomHang"] ?>" method="post">
    <div class="row">
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">MaNhomHang</label>
                <input type="text" name="MaNhomHang" class="form-control" value="<?php echo $category['MaNhomHang']?>"/>
            </div>
            <br />
        </div>
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">TenNhomHang</label>
                <input type="text" name="TenNhomHang" class="form-control" value="<?php echo $category['TenNhomHang']?>"  />
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