<?php
class customermodel extends DModel{
    public function __construct()
    {
        parent::__construct();
    }
 public function dangky($table, $data)
 {
    return $this->db->insert($table, $data);
 }

 public function dangnhap($table_customer, $username, $password)
 {
     $sql = "SELECT * FROM $table_customer WHERE customer_email = ? AND customer_password = ?";
     return $this->db->affectedRows($sql, $username, $password);
 }
 public function getLogin($table_customer, $table_cart, $username, $password)
 {
    $sql = "SELECT * FROM $table_customer, $table_cart WHERE $table_customer.customer_id = $table_cart.user_id AND $table_customer.customer_email = ? AND $table_customer.customer_password = ?";
    return $this->db->selectUser($sql, $username, $password);
 }
 public function getAllUser($table_customer)
 {
    $sql = "SELECT * FROM $table_customer ORDER BY customer_id DESC";
    return $this->db->select($sql);
 }
 public function insert_cart($table_cart, $data)
 {
    return $this->db->insert($table_cart, $data);
 }
 public function getInforUser($sql){
   return $this->db->select($sql);
 }
}
?>