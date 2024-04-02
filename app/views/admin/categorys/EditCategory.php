<center><h2>Sửa Sản Phẩm</h2></center>
<form action="<?php echo _WEB_ROOT ?>/admin/category/updatecategory?manhh=<?php echo $category["MaNHH"] ?>" method="post">
    <div style="width: 70%; margin-left: 50px">
       
        <div>
            MaNHH
            <input type="text" name="MaNHH" class="form-control" value="<?php echo $category['MaNHH']?>" />
        </div>
        <br />

        <div>
            TenNHH
            <input type="text" name="TenNHH" class="form-control" value="<?php echo $category['TenNHH']?>" />
        </div>
        <br />
        
        <div>
            <center><button type="submit" class="btn btn-success">Sửa</button></center>
        </div>
    </div>
</form>
<h5><a href="<?php echo _WEB_ROOT ?>/admin/category" style="margin-left: 50px;">Trở lại trang sản phẩm</a></h5>