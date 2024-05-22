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
        $tableColumns = ['khachhang' => ['MaKH', 'TenKH', 'Username', 'Password', 'Email', 'SDT', 'DiaChi', 'TrangThai']];
        $data = $this->db->table('khachhang')->orWhereLikeAllColumns($searchStr, $tableColumns)->get();
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
    public function getListWithLimit($limit, $offset, $searchStr = null) {
        $tableColumns = ['khachhang' => ['MaKH', 'TenKH', 'Username', 'Password', 'Email', 'SDT', 'DiaChi', 'TrangThai']];
        if ($searchStr) {
            return $this->db->table('khachhang')->orWhereLikeAllColumns($searchStr, $tableColumns)->limit($limit, $offset)->get();
        }
        return $this->db->table('khachhang')->limit($limit, $offset)->get();
    }
    public function checkLogin($username, $password) {
        $data = $this->db->table('khachhang')->where('Username', '=', $username)->where('Password', '=', $password)->first();
        return $data;
    }

    public function changePassword($username, $newPassword) {
        $this->db->table('khachhang')->where('Username', '=', $username)->update(['Password' => $newPassword]);
    }

    public function updatePassword($id, $newPassword) {
        $this->db->table('khachhang')->where('MaKH', '=', $id)->update(['Password' => $newPassword]);
    }

    public function getCustomerByEmail($email) {
        $data = $this->db->table('khachhang')->where('Email', '=', $email)->first();
        return $data;
    }
}