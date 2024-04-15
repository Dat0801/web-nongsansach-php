<?php
class EmployeeModel extends Model{
    
    function tableFill() {
        return 'nhanvien';
    }

    function fieldFill() {
        return '*';
    }

    function primaryKey(){
        return  'MaNV';
    }

    public function getList() {
        $data = $this->db->table('nhanvien')->get();
        return $data;
    }

    public function getDetail($MaNV) {
        $data = $this->db->table('nhanvien')->where('MaNV', '=', $MaNV)->first();
        return $data;
    }
    public function updateEmployee($data, $id) {
        $this->db->table('nhanvien')->where('MaNV', '=', $id)->update($data);        
    }
}