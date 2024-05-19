<?php
class DistrictModel extends Model
{

    function tableFill()
    {
        return 'district';
    }

    function fieldFill()
    {
        return '*';
    }

    function primaryKey()
    {
        return 'district_id';
    }

    public function getDistrictList()
    {
        $data = $this->db->table('district')->getList();
        return $data;
    }

    public function getDistrictByID($district_id)
    {
        $data = $this->db->table('district')->getPlaces($district_id);
        return $data;
    }
}