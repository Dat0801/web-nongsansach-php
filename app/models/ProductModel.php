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
        //$data = $this->db->query("SELECT * FROM $this->_table")->fetchAll(PDO::FETCH_ASSOC);
        $data = $this->db->table('hanghoa')->where('SoLuongTon', '>', 20)->select('MaHH,TenHH')->get();
        return $data;
    }

    public function getDetail($id) {
        $data = [
            'Sản phẩm 1',
            'Sản phẩm 2',
            'Sản phẩm 3'
        ];
        return $data[$id];
    }
}