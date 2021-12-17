<?php 
    class order extends DController
    {
        function __construct()
        {
            $data = array();
           parent::__construct();
        }
        public function index(){
          $this->order();
        }
    
       public function order()
       {
        Session::init();
        $customermodel = $this->load->model("customermodel");
        $cartmodel = $this->load->model("cartmodel");
        $categorymodel = $this->load->model("categorymodel");
        $table_category_product = "tbl_category_product";
        $data['category'] = $categorymodel->category_home($table_category_product);
        $table_detail = "tbl_cart_deltails";
        $table_product = "tbl_product";
        $id_cart = Session::get('cart_id');
        if($id_cart != NULL){
            $data['cart'] = $cartmodel->getItemCart($table_detail, $table_product, $id_cart);
        }else{
            $data['cart'] = NULL;
        }
        $cus_id = Session::get("customer_id");
        $sql = "SELECT * FROM tbl_customer WHERE customer_id = '$cus_id'";
        $data['user_infor'] = $customermodel->getInforUser($sql);
        $this->load->view('header', $data);
        $this->load->view('order', $data);
        $this->load->view('footer');
       }
       
}
    
?>