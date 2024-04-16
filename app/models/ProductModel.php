<?php
class ProductModel extends Model{
    
    function tableFill() {
        return 'hanghoa';
    }

    function fieldFill() {
        return '*';
    }

    function primaryKey(){
        return 'MaHang';
    }

    public function getProductList() {
        $data = $this->db->table('hanghoa')->get();
        return $data;
    }

    public function getProductByCategory($categoryid) {
        $data = $this->db->table('hanghoa')->where('MaNhomHang', '=', $categoryid)->get();
        return $data;
    }

    public function getDetail($MaHang) {
        $data = $this->db->table('hanghoa')->where('MaHang', '=', $MaHang)->first();
        return $data;
    }
    
    public function searchProduct($searchStr) {
        $data = $this->db->table('hanghoa')->where('TenHang', 'like', '%'.$searchStr.'%')->get();
        return $data;
    }

    public function addProduct($data) {
        $this->db->table('hanghoa')->insert($data);
    }

    public function deleteProduct($id) {
        $this->db->table('hanghoa')->where('MaHang', '=', $id)->delete();
    }

    public function updateProduct($data, $id) {
        $this->db->table('hanghoa')->where('MaHang', '=', $id)->update($data);
    }
    public function getListWithLimit($limit, $offset, $categoryid = null) {
        if($categoryid == null) {
            return $this->db->table('hanghoa')->limit($limit, $offset)->get();
        }
        return $this->db->table('hanghoa')->where('MaNhomHang', '=', $categoryid)->limit($limit, $offset)->get();
    }
    public function getListRecycleWithLimit($limit, $offset) {
        return $this->db->table('hanghoa')->limit($limit, $offset)->get(0);
    }
    public function getRecycleProductList() {
        $data = $this->db->table('hanghoa')->get(0);
        return $data;
    }

    public function recoverProduct($id) {
        $this->db->table('hanghoa')->where('MaHang', '=', $id)->update(['TrangThai' => 1]);
    }

    public function deletePermanentProduct($id) {
        $this->db->table('hanghoa')->where('MaHang', '=', $id)->delete(true);
    }
}