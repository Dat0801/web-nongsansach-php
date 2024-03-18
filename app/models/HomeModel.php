<?php 
// Kế thừa từ class Model
class HomeModel extends Model{
    protected $_table = 'products';
    public function getList() {
        $data = [
            'Item 1',
            'Item 2',
            'Item 3'
        ];
        return $data;
    }

    public function getDetail($id) {
        $data = [
            'Item 1',
            'Item 2',
            'Item 3'
        ];
        return $data[$id];
    }
}