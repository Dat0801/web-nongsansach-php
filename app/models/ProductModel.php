<?php
class ProductModel extends Model{
    
    function tableFill() {
        return 'hanghoa';
    }

    function fieldFill() {
        return '*';
    }

    function primaryKey(){
        return 'MaHH';
    }

    public function getProductList() {
        $data = $this->db->table('hanghoa')->get();
        return $data;
    }

    public function getDetail($mahh) {
        $data = $this->db->table('hanghoa')->where('mahh', '=', $mahh)->first();
        return $data;
    }
    
    public function searchProduct($searchStr) {
        $data = $this->db->table('hanghoa')->where('tenhh', 'like', '%'.$searchStr.'%')->get();
        return $data;
    }

    public function addProduct($data) {
        $this->db->table('hanghoa')->insert($data);
    }

    public function deleteProduct($id) {
        $this->db->table('hanghoa')->where('mahh', '=', $id)->delete();
    }

    public function updateProduct($data, $id) {
        $this->db->table('hanghoa')->where('mahh', '=', $id)->update($data);
    }
}