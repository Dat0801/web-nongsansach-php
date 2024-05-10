<?php
class ProvinceModel extends Model
{

    function tableFill()
    {
        return 'province';
    }

    function fieldFill()
    {
        return '*';
    }

    function primaryKey()
    {
        return 'province_id';
    }

    public function getProvinceList()
    {
        $data = $this->db->table('province')->getList();              
        return $data;
    }    
}