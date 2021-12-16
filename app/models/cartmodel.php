<?php
class cartmodel extends DModel{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertcart($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function checkCart($table_detail, $id_cart, $id_product)
    {
        $sql = "SELECT * FROM $table_detail WHERE id_cart= ? AND id_product = ?";
        return $this->db->affectedRows($sql, $id_cart, $id_product);
    }
    public function getItemCartById($table_detail, $id_cart, $id_product)
    {
        $sql = "SELECT * FROM $table_detail WHERE id_cart = $id_cart AND id_product = $id_product";
        return $this->db->select($sql);
    }
    public function update_quantity($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }
    public function getItemCart($table_cart_detail, $table_product , $id_cart)
    {
        $sql = "SELECT * FROM $table_cart_detail, $table_product WHERE $table_cart_detail.id_cart = $id_cart AND $table_cart_detail.id_product = $table_product.id_product ORDER BY $table_cart_detail.id_cart_detail DESC";
        return $this->db->select($sql);
    }
    public function delete($table_detail, $cond)
    {
        return $this->db->delete($table_detail, $cond);
    }
    public function update_cart($table, $data, $cond)
    {
        return $this->db->update($table, $data, $cond);
    }
    public function update_so_am($table, $cond)
    {
        return $this->db->delete($table, $cond);
    }
}
?>