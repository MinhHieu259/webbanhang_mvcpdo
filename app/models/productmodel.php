<?php
class productmodel extends DModel{
    public function __construct()
    {
        parent::__construct();
    }
 public function product($table_product, $table_category)
 {
     $sql = "SELECT * FROM $table_product, $table_category WHERE $table_product.id_category_product
     = $table_category.id_category_product ORDER BY $table_product.id_product DESC";
     return $this->db->select($sql);
 }

 public function productbyid($table, $cond)
 {
    $sql = "SELECT * FROM $table WHERE $cond";
    return $this->db->select($sql);
 }

 public function insertproduct($tbl_product, $data)
 {
    return $this->db->insert($tbl_product, $data);
 }
 public function updateproduct($tbl_product, $data, $cond){
     return $this->db->update($tbl_product, $data, $cond);
 }
 public function deletecategory($tbl_category_product, $cond)
 {
     return $this->db->delete($tbl_category_product, $cond);
 }
 public function list_product_home($table_product)
 {
     $sql = "SELECT * FROM $table_product ORDER BY $table_product.id_product DESC";
     return $this->db->select($sql);
 }
 public function list_product_home_limit($table_product)
 {
     $sql = "SELECT * FROM $table_product ORDER BY id_product DESC";
     return $this->db->select($sql);
 }
 public function list_product_feature($table_product)
 {
     $sql = "SELECT * FROM $table_product WHERE noibat= 1 ORDER BY $table_product.id_product DESC";
     return $this->db->select($sql);
 }

 public function detail_product_home($table_product,$table_category_product, $cond)
 {
     $sql = "SELECT * FROM $table_product, $table_category_product WHERE $cond";
     return $this->db->select($sql);
 }
 public function relate_product_home($table_product,$table_category_product, $cond_relate)
 {
    $sql = "SELECT * FROM $table_product, $table_category_product WHERE $cond_relate";
    return $this->db->select($sql);
 }

 public function checkYeuthich($table, $id_customer, $id_product)
 {
     $sql = "SELECT * FROM $table WHERE id_customer= ? AND id_product = ?";
     return $this->db->affectedRows($sql, $id_customer, $id_product);
 }

 public function add_yeuthich($table, $data)
 {
    return $this->db->insert($table, $data);
 }

 public function list_yeuthich($table, $table_product, $cond)
 {
     $sql = "SELECT * FROM $table, $table_product WHERE $cond";
     return $this->db->select($sql);
 }
 public function delete_yeuthich($table, $cond)
 {
    return $this->db->delete($table, $cond);
 }
 public function checkComment($table, $id_customer, $id_product)
 {
     $sql = "SELECT * FROM $table WHERE id_customer= ? AND id_product = ?";
     return $this->db->affectedRows($sql, $id_customer, $id_product);
 }
 public function add_comment($table, $data)
 {
    return $this->db->insert($table, $data);
 }

 public function show_comment($table_customer, $table_comment, $cond )
 {
    $sql = "SELECT * FROM $table_customer, $table_comment WHERE $cond";
    return $this->db->select($sql);
 }
}
?>