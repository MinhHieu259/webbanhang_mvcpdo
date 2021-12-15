<?php
class cart extends DController{
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {
        $this->cart();
    }
    public function cart()
    {
        $categorymodel = $this->load->model("categorymodel");
        $table_category_product = "tbl_category_product";
        $data['category'] = $categorymodel->category_home($table_category_product);
        Session::init();
        $this->load->view('header', $data);
        $this->load->view('cart');
        $this->load->view('footer');
    }
    public function addCart()
    {
        Session::init();
        $cartmodel = $this->load->model("cartmodel");
        $table_detail = "tbl_cart_deltails";
        $customer_id = Session::get("customer_id");
        $id_cart = Session::get('cart_id');
        $id_product = $_POST['product_id'];
        $product_quantity = $_POST['product_quantity'];
        $check_cart = $cartmodel->checkCart($table_detail, $id_cart, $id_product);
        if($customer_id == null){
            $message['msg'] = "Bạn chưa đăng nhập";
            header("Location:".BASE_URL."/index?msg=".urlencode(serialize($message)));
    
        }else if($customer_id != null && $check_cart == 1){
            $info_item = $cartmodel->getItemCartById($table_detail, $id_cart, $id_product);
            $cond = "id_cart='$id_cart' AND id_product = $id_product";
            $data_quan = array(
                'quantity_product' => $info_item[0]['quantity_product'] + 1
               
            );
            $result = $cartmodel->update_quantity($table_detail, $data_quan, $cond);
        } else{
        
        $data = array(
            'id_cart' => $id_cart,
            'id_product' => $id_product,
            'quantity_product' => $product_quantity
        );
        
        $result = $cartmodel->insertcart($table_detail, $data);
        if($result == 1 ){
            $message['msg'] = "Thêm giỏ hàng sản phẩm thành công";
            header("Location:".BASE_URL."/cart?msg=".urlencode(serialize($message)));
        }else {
            $message['msg'] = "Thêm giỏ hàng sản phẩm thất bại";
            header("Location:".BASE_URL."/cart?msg=".urlencode(serialize($message)));
        }
        }
        
    }

}