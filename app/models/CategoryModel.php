<?php
class CategoryModel extends Model
{

    function tableFill()
    {
        return 'nhomhang';
    }

    function fieldFill()
    {
        return '*';
    }

    function primaryKey()
    {
        return 'MaNhomHang';
    }

    public function getCategoryList()
    {
        $data = $this->db->table('nhomhang')->get();
        return $data;
    }

    public function getDetail($MaNhomHang)
    {
        $data = $this->db->table('nhomhang')->where('MaNhomHang', '=', $MaNhomHang)->first();
        return $data;
    }

    public function searchCategory($searchStr)
    {
        $tableColumns = ['nhomhang' => ['MaNhomHang', 'TenNhomHang']];
        $data = $this->db->table('nhomhang')->orWhereLikeAllColumns($searchStr, $tableColumns)->get();
        return $data;
    }

    public function addCategory($data)
    {
        $this->db->table('nhomhang')->insert($data);
    }

    public function deleteCategory($id)
    {
        $this->db->table('nhomhang')->where('MaNhomHang', '=', $id)->delete();
    }

    public function updateCategory($data, $id)
    {
        $this->db->table('nhomhang')->where('MaNhomHang', '=', $id)->update($data);
    }
    public function getListWithLimit($limit, $offset, $searchStr = null)
    {
        $tableColumns = ['nhomhang' => ['MaNhomHang', 'TenNhomHang']];
        if ($searchStr) {
            return $this->db->table('nhomhang')->orWhereLikeAllColumns($searchStr, $tableColumns)->limit($limit, $offset)->get();
        }
        return $this->db->table('nhomhang')->limit($limit, $offset)->get();
    }

    public function countProductsInCategory($categoryid)
    {
        $data = $this->db->table('hanghoa')->where('MaNhomHang', '=', $categoryid)->get();
        return count($data);
    }

    public function getProductByCategory($categoryid)
    {
        $data = $this->db->table('hanghoa')->where('MaNhomHang', '=', $categoryid)->get();
        return $data;
    }
}
