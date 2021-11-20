<?php
class categorymodel extends DModel{
    public function __construct()
    {
        parent::__construct();
    }
 public function category($tbl_category_product)
 {
     $sql = "SELECT * FROM $tbl_category_product ORDER BY id_category_product DESC";
     return $this->db->select($sql);
 }
 public function category_home($tbl_category_product)
 {
     $sql = "SELECT * FROM $tbl_category_product ORDER BY id_category_product DESC";
     return $this->db->select($sql);
 }
 public function categorybyid($table, $cond)
 {
    $sql = "SELECT * FROM $table WHERE $cond";
    return $this->db->select($sql);
 }

 public function insertcategory($tbl_category_product, $data)
 {
    return $this->db->insert($tbl_category_product, $data);
 }
 public function updatecategory($tbl_category_product, $data, $cond){
     return $this->db->update($tbl_category_product, $data, $cond);
 }
 public function deletecategory($tbl_category_product, $cond)
 {
     return $this->db->delete($tbl_category_product, $cond);
 }
 public function category_by_id_home($table_category_product, $table_product, $id)
 {
     $sql = "SELECT * FROM $table_category_product, $table_product WHERE
      $table_category_product.id_category_product = $table_product.id_category_product 
       AND $table_product.id_category_product = '$id' ORDER BY $table_product.id_product DESC";
       return $this->db->select($sql);
 }
}
?>