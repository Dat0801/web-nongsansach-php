<?php
class OrderDetailModel extends Model{
    
    function tableFill() {
        return 'chitiethoadon';
    }

    function fieldFill() {
        return '*';
    }

    function primaryKey(){
        $primarykey = ['MaHD', 'MaHang'];
        return $primarykey;
    }

    public function getOrderDetailList() {
        $data = $this->db->table('chitiethoadon')->get();
        return $data;
    }

    public function getDetail($MaHD) {
        $data = $this->db->table('chitiethoadon')->where('MaHD', '=', $MaHD)->get();
        return $data;
    }

    public function addOrder($data) {
        $this->db->table('chitiethoadon')->insert($data);
    }
    
}