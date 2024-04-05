<?php
class SuppliersModel extends Model{
    
    function tableFill() {
        return 'nhacungcap';
    }

    function fieldFill() {
        return '*';
    }

    function primaryKey(){
        return 'MaNCC';
    }

    public function getSuppliersList() {
        $data = $this->db->table('nhacungcap')->get();
        return $data;
    }

    public function getDetail($mancc) {
        $data = $this->db->table('nhacungcap')->where('mancc', '=', $mancc)->first();
        return $data;
    }
    
    public function searchSuppliers($searchStr) {
        $data = $this->db->table('nhacungcap')->where('tenncc', 'like', '%'.$searchStr.'%')->get();
        return $data;
    }

    public function addSuppliers($data) {
        $this->db->table('nhacungcap')->insert($data);
    }

    public function deleteSuppliers($id) {
        $this->db->table('nhacungcap')->where('mancc', '=', $id)->delete();
    }

    public function updateSuppliers($data, $id) {
        $this->db->table('nhacungcap')->where('mancc', '=', $id)->update($data);
    }
}