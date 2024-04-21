<?php
class ProductReceiptModel extends Model{
    
    function tableFill() {
        return 'phieunhap';
    }

    function fieldFill() {
        return '*';
    }

    function primaryKey(){
        return 'MaPN';
    }

    public function getProductRCList() {
        $data = $this->db->table('phieunhap')->get();
        return $data;
    }

    public function getDetail($MaPN) {
        $data = $this->db->table('phieunhap')->where('MaPN', '=', $MaPN)->first();
        return $data;
    }
    
    public function searchProductRC($searchStr)
    {
        $tableColumns = [
            'phieunhap' => ['MaPN', 'MaNV', 'MaNCC', 'NgayNhap', 'TongTien', 'TrangThai']
        ];
        $data = $this->db->table('phieunhap')->orWhereLikeAllColumns($searchStr, $tableColumns)->get();
        return $data;
    }

    public function addProductReceipt($data) {
        $this->db->table('phieunhap')->insert($data);
    }

    public function deleteProductReceipt($id) {
        $this->db->table('phieunhap')->where('MaPN', '=', $id)->delete();
    }

    public function updateProductReceipt($data, $id) {
        $this->db->table('phieunhap')->where('MaPN', '=', $id)->update($data);
    }
    public function getListWithLimit($limit, $offset) {
        return $this->db->table('phieunhap')->limit($limit, $offset)->get();
    }
    public function getListWithLimitSearch($limit, $offset, $searchStr = null)
    {
        $tableColumns = [
            'phieunhap' => ['MaPN', 'MaNV', 'MaNCC', 'NgayNhap', 'TongTien', 'TrangThai']
        ];
        if ($searchStr) {
            return $this->db->table('phieunhap')->orWhereLikeAllColumns($searchStr, $tableColumns)->limit($limit, $offset)->get();
        }
        return $this->db->table('phieunhap')->limit($limit, $offset)->get();
    }
}