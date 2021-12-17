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
 }
?>