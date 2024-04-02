<?php
class CategoryModel extends Model{
    
    function tableFill() {
        return 'nhomhanghoa';
    }

    function fieldFill() {
        return '*';
    }

    function primaryKey(){
        return 'MaNHH';
    }

    public function getCategoryList() {
        $data = $this->db->table('nhomhanghoa')->get();
        return $data;
    }

    public function getDetail($manhh) {
        $data = $this->db->table('nhomhanghoa')->where('manhh', '=', $manhh)->first();
        return $data;
    }
    
    public function searchCategory($searchStr) {
        $data = $this->db->table('nhomhanghoa')->where('tennhh', 'like', '%'.$searchStr.'%')->get();
        return $data;
    }

    public function addCategory($data) {
        $this->db->table('nhomhanghoa')->insert($data);
    }

    public function deleteCategory($id) {
        $this->db->table('nhomhanghoa')->where('manhh', '=', $id)->delete();
    }

    public function updateCategory($data, $id) {
        $this->db->table('nhomhanghoa')->where('manhh', '=', $id)->update($data);
    }
}