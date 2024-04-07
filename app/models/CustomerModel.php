<?php
class CustomerModel extends Model{
    
    function tableFill() {
        return 'khachhang';
    }

    function fieldFill() {
        return '*';
    }

    function primaryKey(){
        return 'MaKH';
    }

    public function getCustomerList() {
        $data = $this->db->table('khachhang')->get();
        return $data;
    }

    public function getDetail($MaKH) {
        $data = $this->db->table('khachhang')->where('MaKH', '=', $MaKH)->first();
        return $data;
    }
    
    public function searchCustomer($searchStr) {
        $data = $this->db->table('khachhang')->where('TenKH', 'like', '%'.$searchStr.'%')->get();
        return $data;
    }

    public function addCustomer($data) {
        $this->db->table('khachhang')->insert($data);
    }

    public function deleteCustomer($id) {
        $this->db->table('khachhang')->where('MaKH', '=', $id)->delete();
    }

    public function updateCustomer($data, $id) {
        $this->db->table('khachhang')->where('MaKH', '=', $id)->update($data);
    }
    public function getListWithLimit($limit, $offset) {
        return $this->db->table('khachhang')->limit($limit, $offset)->get();
    }
}