<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-pzjw8s+ekmvplp5f/ZxXnDQbcz0S7bJr6W2kcoFVGLsRakET4Qc5I2tG4LDA2tB" crossorigin="anonymous">
<form class="d-flex" action="" method="post">
    <div style="margin: 0 auto">
        <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Tìm kiếm sản phẩm..."
            style="width:400px; margin: 0 auto" name="searchStr" id="searchStr">
        <center>
            <button class="btn btn-outline-success m-2" type="submit">Search</button>
        </center>
    </div>
</form>
<table class="table table-dark table-bordered">
    <thead>
        <tr>
            <th scope="col">MaHH</th>
            <th scope="col">MaNHH</th>
            <th scope="col">TenHH</th>
            <th scope="col">DVT</th>
            <th scope="col">GiaBan</th>
            <th scope="col">GiaNhap</th>
            <th scope="col">HinhAnh</th>
            <th scope="col">SoLuongTon</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach($product_list as $product) {
                echo '<tr>';
                echo "<td>".$product['MaHH']."</td>";
                echo "<td>".$product['MANHH']."</td>";
                echo "<td>".$product['TenHH']."</td>";
                echo "<td>".$product['DVT']."</td>";
                echo "<td>".$product['GiaBan']."</td>";
                echo "<td>".$product['GiaNhap']."</td>";
                echo "<td> <img src=\"".$product['HinhAnh']."\"></td>";
                echo "<td> ".$product['SoLuongTon']."</td>";
                echo "<td>
                <a href=\""._WEB_ROOT."/admin/product/EditProduct?mahh=".$product["MaHH"]."\" style=\"color:greenyellow\">Edit</a>
                <a class=\"btn-delete\" style=\"color:greenyellow\">Delete</a>
                </td>";
                echo '</tr>';
            }
            
        ?>
</table>