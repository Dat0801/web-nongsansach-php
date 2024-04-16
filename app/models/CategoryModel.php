<?php
class CategoryModel extends Model{
    
    function tableFill() {
        return 'NhomHang';
    }

    function fieldFill() {
        return '*';
    }

    function primaryKey(){
        return 'MaNhomHang';
    }

    public function getCategoryList() {
        $data = $this->db->table('NhomHang')->get();
        return $data;
    }

    public function getDetail($MaNhomHang) {
        $data = $this->db->table('NhomHang')->where('MaNhomHang', '=', $MaNhomHang)->first();
        return $data;
    }
    
    public function searchCategory($searchStr) {
        $data = $this->db->table('NhomHang')->where('TenNhomHang', 'like', '%'.$searchStr.'%')->get();
        return $data;
    }

    public function addCategory($data) {
        $this->db->table('NhomHang')->insert($data);
    }

    public function deleteCategory($id) {
        $this->db->table('NhomHang')->where('MaNhomHang', '=', $id)->delete();
    }

    public function updateCategory($data, $id) {
        $this->db->table('NhomHang')->where('MaNhomHang', '=', $id)->update($data);
    }
    public function getListWithLimit($limit, $offset) {
        return $this->db->table('NhomHang')->limit($limit, $offset)->get();
    }   

    public function countProductsInCategory($categoryid) {
        $data = $this->db->table('hanghoa')->where('MaNhomHang', '=', $categoryid)->get();
        return count($data);
    }

    public function getProductByCategory($categoryid) {
        $data = $this->db->table('hanghoa')->where('MaNhomHang', '=', $categoryid)->get();
        return $data;
    }
}
