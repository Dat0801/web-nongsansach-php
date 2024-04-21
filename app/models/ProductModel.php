<?php
class ProductModel extends Model
{

    function tableFill()
    {
        return 'hanghoa';
    }

    function fieldFill()
    {
        return '*';
    }

    function primaryKey()
    {
        return 'MaHang';
    }

    public function getProductList()
    {
        $data = $this->db->table('hanghoa')->get();
        return $data;
    }

    public function getProductByCategory($categoryid)
    {
        $data = $this->db->table('hanghoa')->where('MaNhomHang', '=', $categoryid)->get();
        return $data;
    }

    public function getDetail($MaHang)
    {
        $data = $this->db->table('hanghoa')->where('MaHang', '=', $MaHang)->first();
        return $data;
    }

    public function searchProduct($searchStr)
    {
        $tableColumns = [
            'hanghoa' => ['MaHang', 'MaNhomHang', 'MaNCC', 'TenHang', 'DVT', 'TrongLuong', 'DonViTrongLuong', 'GiaBan', 'HeSo', 'GiaNhap', 'HinhAnh', 'SoLuongTon', 'TrangThai']
        ];
        $data = $this->db->table('hanghoa')->orWhereLikeAllColumns($searchStr, $tableColumns)->get();
        return $data;
    }

    public function searchProductClient($searchStr)
    {
        $tableColumns = [
            'hanghoa' => ['TenHang', 'DVT', 'TrongLuong', 'DonViTrongLuong', 'GiaBan']
        ];
        $data = $this->db->table('hanghoa')->orWhereLikeAllColumns($searchStr, $tableColumns)->get();
        return $data;
    }

    public function addProduct($data)
    {
        $this->db->table('hanghoa')->insert($data);
    }

    public function deleteProduct($id)
    {
        $this->db->table('hanghoa')->where('MaHang', '=', $id)->delete();
    }

    public function updateProduct($data, $id)
    {
        $this->db->table('hanghoa')->where('MaHang', '=', $id)->update($data);
    }
    public function getListWithLimit($limit, $offset, $categoryid = null, $searchStr = null)
    {
        if ($categoryid != null && $searchStr == null) {
            return $this->db->table('hanghoa')->where('MaNhomHang', '=', $categoryid)->limit($limit, $offset)->get();
        } else if ($searchStr != null) {
            $tableColumns = [
                'hanghoa' => ['TenHang', 'DVT', 'TrongLuong', 'DonViTrongLuong', 'GiaBan']
            ];
            return $this->db->table('hanghoa')->orWhereLikeAllColumns($searchStr, $tableColumns)->limit($limit, $offset)->get();
        } else {
            return $this->db->table('hanghoa')->limit($limit, $offset)->get();
        }
    }

    public function getListWithLimitSearch($limit, $offset, $searchStr = null)
    {
        $tableColumns = [
            'hanghoa' => ['MaHang', 'MaNhomHang', 'MaNCC', 'TenHang', 'DVT', 'TrongLuong', 'DonViTrongLuong', 'GiaBan', 'HeSo', 'GiaNhap', 'HinhAnh', 'SoLuongTon', 'TrangThai']
        ];
        if ($searchStr) {
            return $this->db->table('hanghoa')->orWhereLikeAllColumns($searchStr, $tableColumns)->limit($limit, $offset)->get();
        }
        return $this->db->table('hanghoa')->limit($limit, $offset)->get();
    }

    public function getListRecycleWithLimit($limit, $offset)
    {
        return $this->db->table('hanghoa')->limit($limit, $offset)->get(0);
    }
    public function getRecycleProductList()
    {
        $data = $this->db->table('hanghoa')->get(0);
        return $data;
    }

    public function recoverProduct($id)
    {
        $this->db->table('hanghoa')->where('MaHang', '=', $id)->update(['TrangThai' => 1]);
    }

    public function deletePermanentProduct($id)
    {
        $this->db->table('hanghoa')->where('MaHang', '=', $id)->delete(true);
    }
}