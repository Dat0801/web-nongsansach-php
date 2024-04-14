<?php
class ReceiptDetailModel extends Model{
    
    function tableFill() {
        return 'chitietphieunhap';
    }

    function fieldFill() {
        return '*';
    }

    function primaryKey(){
        $primarykey = ['MaPN', 'MaHang'];
        return $primarykey;
    }

    public function getList() {
        $data = $this->db->table('chitietphieunhap')->get();
        return $data;
    }

    public function getDetail($MaPN) {
        $data = $this->db->table('chitietphieunhap')->where('MaPN', '=', $MaPN)->get();
        return $data;
    }
    
}