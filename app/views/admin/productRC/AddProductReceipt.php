<center>
    <h2>Thêm Phiếu Nhập</h2>
</center>
<form action="<?php echo _WEB_ROOT ?>/admin/ProductReceipt/addReceipt" method="post">
    <div class="row">
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">Mã phiếu nhập</label>
                <input type="text" name="MaPN" class="form-control" disabled/>
            </div>
            <br />
            <div>
                <label for="">Mã nhân viên</label>
                <input type="text" name="MaNV" class="form-control" />
            </div>
            <br />
            <div>
                <label for="">Mã nhà cung cấp</label>
                <input type="text" name="MaNCC" class="form-control" />
            </div>
            <br />            
        </div>
        <div style="margin: 0px 50px;" class="col">
            <div>
                <label for="">Ngày nhập</label>
                <input type="text" name="NgayNhap" value="<?php echo date('d-m-Y\ : H:m:s') ?>" class="form-control" disabled/>
            </div>
            <br />
            <div>
                <label for="">Tổng tiền</label>
                <input type="text" name="TongTien" class="form-control" />
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
        <a href="<?php echo _WEB_ROOT ?>/admin/ProductReceipt" style="margin: 0px 50px;"
            class="btn btn-lg btn-primary material-symbols-outlined">
            keyboard_return
        </a>
    </div>
</form>