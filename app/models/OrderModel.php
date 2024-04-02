<?php
class OrderModel extends Model{
    
    function tableFill() {
        return 'hoadon';
    }

    function fieldFill() {
        return '*';
    }

    function primaryKey(){
        return 'MaHD';
    }

    public function getOrderList() {
        $data = $this->db->table('hoadon')->get();
        return $data;
    }

    public function getDetail($mahd) {
        $data = $this->db->table('hoadon')->where('mahd', '=', $mahd)->first();
        return $data;
    }

    public function addOrder($data) {
        $this->db->table('hoadon')->insert($data);
    }

    public function deleteOrder($id) {
        $this->db->table('hoadon')->where('mahd', '=', $id)->delete();
    }

    public function updateOrder($data, $id) {
        $this->db->table('hoadon')->where('mahd', '=', $id)->update($data);
    }
}