<?php
class WardsModel extends Model
{

    function tableFill()
    {
        return 'wards';
    }

    function fieldFill()
    {
        return '*';
    }

    function primaryKey()
    {
        return 'wards_id';
    }

    public function getWardsList()
    {
        $data = $this->db->table('wards')->getList();
        return $data;
    }

    public function getWardsByID($wards_id)
    {
        $data = $this->db->table('wards')->getPlaces($wards_id);
        return $data;
    }
}