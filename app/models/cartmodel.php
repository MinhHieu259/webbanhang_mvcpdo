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
    public function get_name_category_byid($table_category_product, $table_product, $id)
    {
        $sql = "SELECT * FROM $table_category_product, $table_product WHERE
        $table_category_product.id_category_product = $table_product.id_category_product 
        AND $table_product.id_category_product = '$id' ORDER BY $table_product.id_product DESC LIMIT 1";
        return $this->db->select($sql);
    }
}
?>