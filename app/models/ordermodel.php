<?php
class ordermodel extends DModel{
    public function __construct()
    {
        parent::__construct();
    }
    public function getCartDetail($sql)
    {
        return $this->db->select($sql);
    }
    public function getOrderId($sql)
    {
        return $this->db->select($sql);
    }
    public function insert_order($table, $data)
    {
       return $this->db->insert($table, $data);
    }
    public function insert_order_detail($table, $data)
    {
       return $this->db->insert($table, $data);
    }
    public function insert_order_address($table, $data)
    {
       return $this->db->insert($table, $data);
    }
    public function deleteCartAfterOrder($table, $cond)
    {
        return $this->db->delete_many($table, $cond);
    }
    public function listorder_admin_chuaduyet($table_order)
    {
        $sql = "SELECT * FROM $table_order WHERE  order_status = 0 ORDER BY order_id DESC ";
        return $this->db->select($sql);
    }
    public function listorder_admin_daduyet($table_order)
    {
        $sql = "SELECT * FROM $table_order WHERE  order_status = 1 ORDER BY order_id DESC ";
        return $this->db->select($sql);
    }
    public function listorder_admin_hoantat($table_order)
    {
        $sql = "SELECT * FROM $table_order WHERE  order_status = 2 ORDER BY order_id DESC ";
        return $this->db->select($sql);
    }
    public function duyetdon($table, $data, $cond)
    {
        return $this->db->update($table,$data,$cond);
    }
    public function hoantat($table, $data, $cond)
    {
        return $this->db->update($table,$data,$cond);
    }
    public function order_detail($sql)
    {
        return $this->db->select($sql);
    }
    public function getOrderCho($sql)
    {
        return $this->db->select($sql);
    }
    public function getOrderDanggiao($sql)
    {
        return $this->db->select($sql);
    }
    public function getOrderDamua($sql)
    {
        return $this->db->select($sql);
    }
    public function chitietorder($sql)
    {
        return $this->db->select($sql);
    }
    public function huydon($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }
    public function xoachitietdon($table, $cond)
    {
        return $this->db->delete_many($table, $cond);
    }
    public function xoadiachidon($table, $cond)
    {
        return $this->db->delete_many($table, $cond);
    }
 }
?>