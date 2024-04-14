<?php
class OrderModel extends Model
{

    function tableFill()
    {
        return 'hoadon';
    }

    function fieldFill()
    {
        return '*';
    }

    function primaryKey()
    {
        return 'MaHD';
    }

    public function getOrderList()
    {
        $data = $this->db->table('hoadon')->get();
        return $data;
    }

    public function getDetail($MaHD)
    {
        $data = $this->db->table('hoadon')->where('MaHD', '=', $MaHD)->first();
        return $data;
    }

    public function addOrder($data)
    {
        $this->db->table('hoadon')->insert($data);
    }

    public function deleteOrder($id)
    {
        $this->db->table('hoadon')->where('MaHD', '=', $id)->delete();
    }

    public function updateOrder($data, $id)
    {
        $this->db->table('hoadon')->where('MaHD', '=', $id)->update($data);
    }

    public function acceptOrder($id)
    {
        $this->db->table('hoadon')->where('MaHD', '=', $id)->update(['TrangThai' => 'Đang giao hàng']);
    }

    public function completeOrder($id)
    {
        $this->db->table('hoadon')->where('MaHD', '=', $id)->update(['TrangThai' => 'Đã giao hàng']);
    }

    public function cancelOrder($id)
    {
        $this->db->table('hoadon')->where('MaHD', '=', $id)->update(['TrangThai' => 'Đã hủy']);
    }

    public function getListWithLimit($limit, $offset)
    {
        return $this->db->table('hoadon')->limit($limit, $offset)->get();
    }
}